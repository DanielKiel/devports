
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


window.Vue = require('vue');

import VueMaterial from 'vue-material';

window.events = new Vue();

Vue.use(VueMaterial);

window.Bus = new Vue({

});


window.flash = function(message, type = 'primary', title = 'Important message') {
    //window.ui.showNotification(message, type)

    window.events.$emit('flash', message)
}; // flash new message


Vue.component('newsstream-list', require('./components/newsstream/List.vue'));

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


const app = new Vue({
    el: '#app'
});