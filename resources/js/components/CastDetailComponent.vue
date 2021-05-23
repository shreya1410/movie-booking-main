<template>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row" >
                    <div v-for="cast in casts" v-bind:key="cast.id"  class="col-sm-6">
                        <div class="card-deck">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title"> Cast name  :  {{cast.name}}</h5>
                                    <p class="card-text"> Cast Bio :  {{cast.bio}}</p>
                                    <p class="card-text"> Birth date :  {{cast.birth_date}}</p>
                                </div>
                                <div class="card-footer">
                                    <router-link :to = "'/showmovie'" class="card-link btn btn-primary m-0 p-2">Go Back</router-link>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "CastDetailComponent",
    data(){
        return{
            id :'',
            casts :{},
            name :'',
            bio :'',
            birth_date : '',
        }
    },
    mounted() {
        this.getcast();
    },
    methods:{
        getcast(){
            axios.get('all_cast')
                .then(response =>{
                    this.casts= response.data
                });
        }
    }
}
</script>

<style scoped>

</style>
