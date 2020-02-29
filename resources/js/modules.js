window.Vue = require('vue');

// Vuetify
import Vuetify from 'vuetify';
Vue.use(Vuetify);

// axios:
window.axios = require('axios');

// VueParticles
import VueParticles from 'vue-particles';
Vue.use(VueParticles);

// vue2Dropzone
import vue2Dropzone from 'vue2-dropzone'
Vue.component("vue2Dropzone", vue2Dropzone);
import 'vue2-dropzone/dist/vue2Dropzone.min.css';

// SvgVue
import SvgVue from 'svg-vue';
Vue.use(SvgVue);

// cookies:
import VueCookies from 'vue-cookies'
Vue.use(VueCookies);
