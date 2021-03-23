import Vue from 'vue'
import Vuetify from "./vuetify"
import VueRouter from 'vue-router';
import Routes from './routes';
import AudioVisual from 'vue-audio-visual';



Vue.use(AudioVisual)


require('./bootstrap');

window.Vue = require('vue').default;
window.EventBus = new Vue();

Vue.component('index', require('./Index').default);

Vue.use(VueRouter)


const app = new Vue({
    el: '#index',
    router: new VueRouter(Routes),
    vuetify: Vuetify,

});