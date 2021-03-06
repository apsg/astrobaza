/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('cover', require('./components/Cover.vue').default);
Vue.component('gallery', require('./components/Gallery.vue').default);
Vue.component('openings', require('./components/Openings.vue').default);
Vue.component('gradient', require('./components/Gradient.vue').default);
Vue.component('edit-gallery', require('./components/EditGallery.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',

    methods: {
        editGallery(id) {
            this.$refs.edit.loadGallery(id);
            $("#galleryModal").modal('show');
        }
    }
});

$(document).ready(function () {
    $(".menu-icon").on("click", function () {
        $("nav ul").toggleClass("showing");
    });
});

// Scrolling Effect

$(window).on("scroll", function () {
    if ($(window).scrollTop()) {
        $('#nav').removeClass('nav-transparent')
            .removeClass('navbar-dark')
            .addClass('navbar-light');
    } else {
        $('#nav').addClass('nav-transparent')
            .removeClass('navbar-light')
            .addClass('navbar-dark');
    }
})
