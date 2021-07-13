require('./bootstrap');
window.Vue = require('vue').default;


import { BootstrapVue } from 'bootstrap-vue'
import 'bootstrap-vue/dist/bootstrap-vue.css';
import 'bootstrap/dist/css/bootstrap.css';

Vue.use(BootstrapVue);
    
import store from './store/index';

Vue.component('pokemon-list', require('./components/Pokemon.vue').default);
// Vue.component('createPost', require('./components/CreatePost.vue'));

const app = new Vue({
    el: '#app',
    store
});