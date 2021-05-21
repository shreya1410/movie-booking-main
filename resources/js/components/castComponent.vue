<template>
    <div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name"
                   placeholder="Enter name" class="form-control"
                   v-model="name">
        </div>
        <div class="form-group">
            <label for="bio">Bio</label>
            <input type="text" id="bio"
                   placeholder="Enter bio" class="form-control"
                   v-model="bio">
        </div>
        <div class="form-group">
            <label for="birth_date">Birth date</label>
            <input type="date" id="birth_date"
                   placeholder="Enter birth date" class="form-control"
                   v-model="birth_date">
        </div>
        <button
            class="btn btn-success btn-block"
            @click="save">Save
        </button>
        <div class="col-md-12 mt-3" v-if="casts.length>0">
            <h2 class="text-center">Casts</h2>
            <ul class="list-group">
                <li class="list-group-item"
                    v-for="cast in casts" :key="cast.id">
                    {{cast.name}} - {{cast.bio}} - {{cast.birth_date}}
                    <span class="float-right">
                     <button class="btn btn-warning btn-sm mr-2" type="button"
                             data-toggle="modal"     data-target="#exampleModal"  @click="editCast(cast.id)">Update</button>
                     <button class="btn btn-danger btn-sm mr-2" @click="deleteCast(cast.id)">Delete</button>
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
                                <label for="editname">Title</label>
                                <input type="text" v-model="editname"  class="form-control" id="editname"  placeholder="Enter name">
                            </div>
                            <div class="form-group">
                                <label for="editbio">Bio</label>
                                <input type="text"  v-model="editbio"  class="form-control" id="editbio" placeholder="Enter bio">
                            </div>
<!--                            <div class="form-group">-->
<!--                                <label for="editdate">birth date</label>-->
<!--                                <input type="date" v-model="editdate" class="form-control" id="editdate"  placeholder="Enter birth date">-->
<!--                            </div>-->
                            <button type="submit"  @click.prevent="updateCast" data-dismiss="modal" class="btn btn-primary">Submit</button>
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
name: "castComponent",
    data(){
        return{
            casts :{},
            id: '',
            name:'',
            bio: '',
            birth_date:'',
            editname: '',
            editbio :'',
         //   editdate:'',
        }
    },
    mounted() {
        this.fetchAll()
    },
    methods:{
        fetchAll(){
            axios.get('all_cast')
                .then(response =>{
                    this.casts= response.data
                });
        },
        save(){
            axios.post('save_cast',{
                name :this.name,
                bio: this.bio,
                birth_date:this.birth_date,
            })
                .then(response => {
                    this.name = '';
                    this.bio = '';
                    this.birth_date = '';
                    this.fetchAll();
                });
        },
        editCast(id){
            axios.get('edit_cast/'+id)
                .then(response=>{
                    this.id = response.data.id;
                    this.editname = response.data.name;
                    this.editbio = response.data.bio;
              //      this.editdate = response.data.birth_date;

                })
        },
        updateCast(){
            axios.put('update_cast',{
                id : this.id,
                name :this.editname,
                bio : this.editbio,
            //    birth_year: this.editdate
            })
                .then(response => {
                    this.fetchAll();
                } );
        },
        deleteCast(id){
            axios.delete('delete_cast/'+ id)
                .then(response =>{
                    this.fetchAll();
                })
        }
    }

}
</script>

<style scoped>

</style>
