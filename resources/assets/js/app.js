
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./../files/fancy/jquery-ui.custom.js');
require('./bootstrap');
window.Vue = require('vue');
import VueRouter from 'vue-router'
import vModal from './components/modal.vue'
Vue.use(VueRouter)
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/vue',
            name: 'vue',
            component: require('./components/test.vue')
        },
       
    ],
});

Vue.component('vuetest', require('./components/test.vue'));
Vue.component('clinic', require('./components/complete/clinic.vue'));

const app = new Vue({
    el: '#app',
    components: {
        'navbar': require('./components/test.vue'),
        'clinic': require('./components/complete/clinic.vue'),
        'vmod':vModal
    },
    router
});
