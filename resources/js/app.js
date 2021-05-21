

require('./bootstrap');

//window.Vue = require('vue').default;
import Vue from "vue";
import VueRouter from 'vue-router';

import routes from "./routes";

Vue.use(VueRouter);

const router = new VueRouter({
    history : true,
    mode : 'history',
    routes
})


new Vue({
    el : '#app',
    router,
})

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
// Vue.component('movie-component',require('./components/movieComponent.vue').default);

// const app = new Vue({
//     el: '#app',
// });
