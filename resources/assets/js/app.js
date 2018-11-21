
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
import {Form, HasError, AlertError } from 'vform'
window.form =Form;
Vue.use(VueRouter)
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.use(HasError.name, HasError);
Vue.use(AlertError.name, AlertError);
const router = new VueRouter({
    mode: 'history',
    routes: [
        {
             path: '/cli',
             name: 'clinic',
             component: require('./components/complete/clinic.vue')
        },
       
    ],
});
Vue.component('clinic', require('./components/complete/clinic.vue'));
const app = new Vue({
    el: '#app',
    components: {
        'clinic': require('./components/complete/clinic.vue'),
        'vmod':vModal
    },
    router
});
