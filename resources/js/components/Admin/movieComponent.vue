<template>
    <div>
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" id="title"
                   placeholder="Enter title" class="form-control"
                   v-model="title">
        </div>
        <div class="form-group">
            <label for="overview">Overview</label>
            <input type="text" id="overview"
                   placeholder="Enter overview" class="form-control"
                   v-model="overview">
        </div>
        <div class="form-group">
            <label for="release_year">Release year</label>
            <input type="text" id="release_year"
                   placeholder="Enter release year" class="form-control"
                   v-model="release_year">
        </div>

        <div class="form-group">
            <label for="cast">Cast Members</label>
            <input type="text" id="cast"
                   placeholder="Enter cars members" class="form-control"
                   v-model="cast">
        </div>
        <button
            class="btn btn-success btn-block"
            @click="save">Save
        </button>
        <div class="col-md-12 mt-3" v-if="movies.length>0">
            <h2 class="text-center">Movies</h2>
            <ul class="list-group">
                <li class="list-group-item"
                    v-for="movie in movies" :key="movie.id">
                    {{movie.title}} - {{movie.overview}} - {{movie.release_year}} - {{movie.cast}}
                    <span class="float-right">
                     <button class="btn btn-warning btn-sm mr-2" type="button"
                             data-toggle="modal"     data-target="#exampleModal"  @click="editMovie(movie.id)">Update</button>
                     <button class="btn btn-danger btn-sm mr-2" @click="deleteMovie(movie.id)">Delete</button>
                 </span>
                </li>
            </ul>
        </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="edittitle">Title</label>
                                <input type="text" v-model="edittitle"  class="form-control" id="edittitle"  placeholder="Enter title">
                            </div>
                            <div class="form-group">
                                <label for="editoverview">Overview</label>
                                <input type="text"  v-model="editoverview"  class="form-control" id="editoverview" placeholder="Enter overview">
                            </div>
                            <div class="form-group">
                                <label for="edityear">Release year</label>
                                <input type="number" v-model="edityear" class="form-control" id="edityear"  placeholder="Enter year">
                            </div>
                            <div class="form-group">
                                <label for="editcast">Cast Members</label>
                                <input type="text" v-model="editcast" class="form-control" id="editcast"  placeholder="Enter cast">
                            </div>
                            <button type="submit"  @click.prevent="updatemovie" data-dismiss="modal" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "movieComponent",
    data(){
        return{
            movies :{},
            id: '',
            title:'',
            overview: '',
            cast : '',
            release_year:'',
            edittitle: '',
            editoverview :'',
            edityear:'',
            editcast :'',
        }
    },
    mounted() {
        this.fetchAll()
    },
    methods:{
        fetchAll(){
          axios.get('all_movies')
            .then(response =>{
                this.movies= response.data
            });
        },
        save(){
            axios.post('save_movies',{
                title :this.title,
                overview: this.overview,
                release_year:this.release_year,
                cast : this.cast,
            })
                .then(response => {
                    this.title = '';
                    this.overview = '';
                    this.release_year = '';
                    this.cast ='';
                    this.fetchAll();
                });
        },
        editMovie(id){
           axios.get('edit_movie/'+id)
            .then(response=>{
                this.id = response.data.id;
                this.edittitle = response.data.title;
                this.editoverview = response.data.overview;
                this.edityear = response.data.release_year;
                this.editcast = response.data.cast;
            })
        },
        updatemovie(){
            axios.put('update_movie',{
                id : this.id,
                title :this.edittitle,
                overview : this.editoverview,
                release_year: this.edityear,
                cast : this.editcast
            })
                .then(response => {
                    this.fetchAll();
                } );
        },
        deleteMovie(id){
            axios.delete('delete_movie/'+ id)
            .then(response =>{
                this.fetchAll();
            })
        }
    }

}
</script>

<style scoped>

</style>
