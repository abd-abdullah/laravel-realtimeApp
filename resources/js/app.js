/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import Vue from 'vue'
import BootstrapVue from 'bootstrap-vue'

var utlt = [];
utlt['siteUrl'] = function(url){
    url = typeof url == "undefined" ? "" : url;
    return "<?php echo url('/'); ?>/"+url;
}

Vue.use(BootstrapVue)

import VueSimplemde from 'vue-simplemde'

Vue.component('vue-simplemde', VueSimplemde)
import md from 'marked'
window.md = md;
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('home-component', require('./components/layouts/AppHome').default);

import User from './helpers/User.js'
window.User = User;

import Exception from './helpers/Exception.js'
window.Exception = Exception;

window.EventBus = new Vue();


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import router from './router/router.js'
const app = new Vue({
    el: '#app',
    router,
});
