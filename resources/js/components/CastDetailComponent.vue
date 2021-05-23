<template>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <b>{{ cast.name }}</b>
            </div>
            <div class="card-body">
                <p class="card-text">Bio : {{ cast.bio }}</p>
                <p class="card-text">Date of Birth : {{ cast.dob }}</p>
            </div>
            <div class="card-footer">
                <h5 class="card-text">Cast Movies : </h5>
                <div class="container">
                    <div class="d-flex bd-highlight flex-wrap">
                        <div class="card border-dark m-3 flex-fill" v-for="(movie,index) in movies" :key="index">
                            <div class="card-body">
                                <h5 class="card-title">{{ movie.title }}</h5>
                                <p>{{ movie.overview }}</p>
                                <router-link :to="'/user/movie/'+movie.id" class="btn btn-primary">Read More</router-link>
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
        cast :{
            id : "",
            name : "",
            bio : "",
            birth_date : "",
        },
        movies :[],
        city :[],
    }
    },
    methods :{
    getallmovies(){
        axios.get('/getcast/' + this.$route.params.id)
        .then(res =>{
            this.cast.id = res.data.id;
            this.cast.name = res.data.name;
            this.cast.bio = res.data.bio;
            this.cast.birth_date = res.data.birth_date;
            this.getcast
        })
    }
    }
}
</script>

<style scoped>

</style>
