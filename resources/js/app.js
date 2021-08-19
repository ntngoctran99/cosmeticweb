/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./jquery-3.3.1.min');
require('./bootstrap.min');
require('./jquery.nice-select.min');
require('./jquery-ui.min');
require('./jquery.slicknav');
require('./mixitup.min');
require('./owl.carousel.min');
require('./main');

import '../sass/app.scss';
import '../sass/style.scss';

window.Vue = require('vue').default;

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import App from './components/App.vue';
import TypeProductList from '../js/components/typeproduct/TypeProductList.vue';
import AddTypeProduct from '../js/components/typeproduct/AddTypeProduct.vue';
import Home from '../js/components/Home.vue';

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);

import VueAxios from 'vue-axios';
import axios from 'axios';
import Vue from 'vue';
Vue.use(VueAxios,axios);

// const app = new Vue({
//     el: '#app',
// });

const routes = [
    {
        name: '/home',
        path: '/home',
        component: Home
    },
    {
        name: '/type-products',
        path: '/type-products',
        component: TypeProductList
    },
    {
        name: '/add-type-products',
        path: '/add-type-products',
        component: AddTypeProduct
    }
];

const router = new VueRouter({mode: 'history', routes: routes});
const app = new Vue(Vue.util.extend({ router }, App)).$mount('#app');
