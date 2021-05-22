<template>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row">
                    <div v-for="movie in movies" v-bind:key="movie.id"  class="col-sm-6">
                          <div class="card-deck">
                                <div class="card">
                                  <div class="card-body">
<!--                                      <h5 class="card-title">{{movie.id}}</h5>-->
                                         <h5 class="card-title"> Movie name  :  {{movie.title}}</h5>
                                         <p class="card-text"> Overview :  {{movie.overview}}</p>
                                         <p class="card-text"> Release year :  {{movie.release_year}}</p>
                                  </div>
                                    <div class="card-footer">
                                        <router-link :to = "'/moviedetail/'+movie.id" class="card-link btn btn-primary m-0 p-2">Movie detail</router-link>
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
    name: "ShowMovieComponent",
    props :["showmovie"],
    data(){
        return{
            movies :{},
            id:'',
            movie_id : '',
            title:'',
            overview:'',
            release_year :'',
        }
    },
    mounted() {
        this.getMovies();
    },
    methods:{
        getMovies(){
            axios.get('all_movies')
            .then(response =>{
               // console.log(response.data);
                this.movies = response.data;
            });
        },
        cardclick(id){

            this.$router.push('/moviedetail' );
        }
    }
}
</script>

<style scoped>

</style>
