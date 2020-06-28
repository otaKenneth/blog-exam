/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import Vue from 'vue';
import Vuetify from 'vuetify';
import 'vuetify/dist/vuetify.min.css';


window.Vue = require('vue');
window.Vue.use(Vuetify)

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('home', require('./components/Home.vue').default);
Vue.component('search-bar', require('./components/SearchBar.vue').default);
Vue.component('create-blog', require('./components/Dialogs/CreateBlog.vue').default);
Vue.component('edit-blog', require('./components/Dialogs/EditBlog.vue').default);
Vue.component('profile', require('./components/Profile/Profile.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    vuetify: new Vuetify(),
    data () {
        return {
            search: '', records: [], posts: [],
        }
    },
    watch: {
        search (val) {
            console.log(val);
            this.posts = this.records.filter( data => {
                var s = val.toLowerCase();
                var title = data.title.toLowerCase();
                var d = data.description.toLowerCase();
                var uname = data.user.username.toLowerCase();
                return (title.match(s) || d.match(s) || uname.match(s));
            });
        }
    }
});
