<template>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row" @click="cardclick">
                    <div v-for="movie in movies" v-bind:key="movie.id"  class="col-sm-6">
                          <div class="card-deck">
                                <div class="card">
                                  <div class="card-body">
                                         <h5 class="card-title">{{movie.title}}</h5>
                                         <p class="card-text">{{movie.overview}}</p>
                                         <p class="card-text">{{movie.release_year}}</p>
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
    data(){
        return{
            movies :{},
            id:'',
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
                console.log(response.data);
                this.movies = response.data;
            });
        },
        cardclick(){
            this.$router.push('/moviedetail');
        }
    }
}
</script>

<style scoped>

</style>
