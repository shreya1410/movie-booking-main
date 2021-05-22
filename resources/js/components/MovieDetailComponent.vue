<template>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row">
                    <h1>hi</h1>
<!--                    <div v-for="(movie) in (movies)" v-bind:key="movie.id"  class="col-sm-6">-->

<!--                        <div class="card-deck">-->
<!--                            <div class="card">-->
<!--                                <div class="card-body">-->
<!--                                    <h5 class="card-title">Movie Name : {{movie.title}}</h5>-->
<!--                                    <p class="card-text"> Movie Overview :{{movie.overview}}</p>-->
<!--                                    <p class="card-text"> Release year : {{movie.release_year}}</p>-->
<!--                                    <a href="#" @click="castdata"> Cast : {{movie.cast}}</a>-->
<!--&lt;!&ndash;                                    <p class="card-text"> Cast Biodata : {{cast.bio}}</p>&ndash;&gt;-->

<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->

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
