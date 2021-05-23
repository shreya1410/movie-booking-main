<template>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row">
                    <div v-for="movie in movies" v-bind:key="movie.id"  class="col-sm-6">
                        <div class="card-deck">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title"> Movie name  :  {{movie.title}}</h5>
                                    <p class="card-text"> Overview :  {{movie.overview}}</p>
                                    <p class="card-text"> Release year :  {{movie.release_year}}</p>
                                    <p class="card-text">Cast Members on this movie:  {{movie.cast}}</p>
                                </div>
                                <div class="card-footer">
                                    <router-link :to = "'/castdetail'" class="card-link btn btn-primary m-0 p-2">Cast detail</router-link>
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
    name: "MovieDetailComponent",
    data(){
        return{
            movies :{},
            cast_detail :{},
            id:'',
            name :'',
            bio :'',
            cast :'',
            movie_id : '',
            title:'',
            overview:'',
            release_year :'',
        }
    },
    mounted() {
        this.getMovies();
        this.getcast();
    },
    methods: {
        getMovies() {
            axios.get('all_movies')
                .then(response => {
                    // console.log(response.data);
                    this.movies = response.data;
                });
        },
        getcast(){
            axios.get('all_cast')
                .then(response =>{
                    console.log(response.data);
                    this.cast_detail= response.data
                });
        },
        castdata(){
            alert('hi');
        }
        }
}
</script>

<style scoped>

</style>
