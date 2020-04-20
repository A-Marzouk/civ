window.Vue = require('vue');


// audio recorder:
import AudioRecorder from 'vue-audio-recorder'
Vue.use(AudioRecorder);

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

//bootstrap vue
import { BootstrapVue } from 'bootstrap-vue'
import 'bootstrap-vue/dist/bootstrap-vue.css'
Vue.use(BootstrapVue)

//fontawesome
import { library } from '@fortawesome/fontawesome-svg-core'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { fab } from '@fortawesome/free-brands-svg-icons'

library.add(fab)
Vue.component('font-awesome-icon', FontAwesomeIcon)

// apex charts
import VueApexCharts from 'vue-apexcharts'
Vue.component('Apexchart', VueApexCharts)
