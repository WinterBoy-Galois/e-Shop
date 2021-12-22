require('./bootstrap');

window.Vue = require('vue');

//Components
Vue.component('products', require('./components/products/products.vue').default); //products Dashboard
Vue.component('categories', require('./components/products/categories.vue').default); //categories Dashboard
Vue.component('cart', require('./components/purchase/cart.vue').default); //cart
Vue.component('dashboard', require('./components/customer/dashboard.vue').default); //customer profile
Vue.component('credit', require('./components/customer/credit.vue').default); //customer credits profile
Vue.component('payment', require('./components/purchase/payment.vue').default); //payment page
Vue.component('account', require('./components/customer/account.vue').default); //payment page
Vue.component('admin-dashboard', require('./components/Admin/dashboard.vue').default); //Admin Dashboard
Vue.component('pagination', require('./components/Products/pagination.vue').default); //Pagination Component
Vue.component('loading', require('./components/App/loading.vue').default); //Loading Component
Vue.component('carrier', require('./components/App/carrier.vue').default); //Loading Component
Vue.component('load-control', require('./components/App/Load-control.vue').default); //Loading Control
Vue.component('shoporcheckout', require('./components/purchase/shoporcheckout.vue').default); //Shop or checkout
Vue.component('autosignin', require('./components/customer/autosignin.vue').default); //payment page
Vue.component('logo_load', require('./components/App/logo_load.vue').default); //Inner Logo Component
Vue.component('learn-jq', require('./components/App/learn-jq.vue').default); //learn jq
Vue.component('editor', require('./components/Products/Editor.vue').default); //Rich text editor for e-shop, for PRODUCTS SEO
Vue.component('about', require('./components/Products/about.vue').default); //Products About Data


//Admin Dashboard
Vue.component('admindashboard', require('./components/Admin/dashboard.vue').default); //Admin Dashboard


//Imports

import common from './common/common.js'; //common js
Vue.mixin(common); //compile commonjs

import Swal from "vue-sweetalert2"; //Swalt Msgs
Vue.use(Swal);

import VueToast from 'vue-toast-notification';
// Import one of available themes
import 'vue-toast-notification/dist/theme-default.css';
//import 'vue-toast-notification/dist/theme-sugar.css';

Vue.use(VueToast, {
    // One of the options
    position: 'top'
});
//let instance = Vue.$toast.open('You did it!');

//import vuex
import {store} from './store/store.js';

//Global class
import global from "./Global/gloabal.js";
Vue.prototype.$global = new global();

//App imports
import routes from './routes/routes.js';

//Mounts app components
import VueRouter from "vue-router";
Vue.use(VueRouter);
const router = new VueRouter({
    //mode: 'history',
    routes,
});


//Event bus
var Event = new Vue();
window.Event = Event;

//Rich Text Editor Imports
import Editor from './components/Products/Editor/Editor'
Vue.prototype.$Editor = new Editor();

//Media Uploader

import Uploader from './components/Products/Editor/MediaUpload/Uploader';
Vue.prototype.$Uploader = new Uploader();

//chart app event bus
Vue.prototype.EventBus = new Vue();

const app = new Vue({
    store: store,
    router,
    el: '#app',
});