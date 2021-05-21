<template>
    <div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name"
                   placeholder="Enter Theatre name" class="form-control"
                   v-model="name">
        </div>
        <div class="form-group">
            <label for="show_timing">Overview</label>
            <input type="text" id="show_timing"
                   placeholder="Enter show Timing" class="form-control"
                   v-model="showtime">
        </div>
        <div class="form-group">
            <label for="city">City</label>
            <input type="text" id="city"
                   placeholder="Enter city" class="form-control"
                   v-model="city">
        </div>
        <button
            class="btn btn-success btn-block"
            @click="save">Save
        </button>
        <div class="col-md-12 mt-3" v-if="theatres.length>0">
            <h2 class="text-center">Theatres</h2>
            <ul class="list-group">
                <li class="list-group-item"
                    v-for="theatre in theatres" :key="theatre.id">
                    {{theatre.name}} - {{theatre.showtime}} - {{theatre.city}}
                    <span class="float-right">
                     <button class="btn btn-warning btn-sm mr-2" type="button"
                             data-toggle="modal"     data-target="#exampleModal"  @click="editTheatre(theatre.id)">Update</button>
                     <button class="btn btn-danger btn-sm mr-2" @click="deleteTheatre(theatre.id)">Delete</button>
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
                                <label for="editname">Theatre name</label>
                                <input type="text" v-model="editname"  class="form-control" id="editname"  placeholder="Enter name">
                            </div>
                            <div class="form-group">
                                <label for="editshowtiming">Show timing</label>
                                <input type="text"  v-model="editshowtiming"  class="form-control" id="editshowtiming" placeholder="Enter Show Timing">
                            </div>
                            <div class="form-group">
                                <label for="editcity">City</label>
                                <input type="text" v-model="editcity" class="form-control" id="editcity"  placeholder="Enter City">
                            </div>
                            <button type="submit"  @click.prevent="updateTheatre" data-dismiss="modal" class="btn btn-primary">Submit</button>
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
    name: "TheatreComponent",
    data(){
        return{
            theatres :{},
            id: '',
            name:'',
            showtime: '',
            city:'',
            editname: '',
            editshowtiming :'',
            editcity : '',
        }
    },
    mounted() {
        this.fetchAll()
    },
    methods:{
        fetchAll(){
            axios.get('all_theatre')
                .then(response =>{
                    this.theatres= response.data
                });
        },
        save(){
            axios.post('save_theatre',{
                name :this.name,
                showtime: this.showtime,
                city : this.city,
            })
                .then(response => {
                    this.name = '';
                    this.showtime = '';
                    this.city ='';
                    this.fetchAll();
                });
        },
        editTheatre(id){
            axios.get('edit_theatre/'+id)
                .then(response=>{
                    this.id = response.data.id;
                    this.editname = response.data.name;
                    this.editshowtiming = response.data.showtime;
                    this.editcity = response.data.city;

                })
        },
        updateTheatre(){
            axios.put('update_theatre',{
                id : this.id,
                name :this.editname,
                showtime : this.editshowtiming,
                city : this.editcity,
            })
                .then(response => {
                    this.fetchAll();
                } );
        },
        deleteTheatre(id){
            axios.delete('delete_theatre/'+ id)
                .then(response =>{
                    this.fetchAll();
                })
        }
    }
}
</script>

<style scoped>

</style>
