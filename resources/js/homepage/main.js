window.Vue = require('vue');

import vuetify from '../vuetify';

import VueAgile from 'vue-agile'
Vue.use(VueAgile)

// axios:
window.axios = require('axios');

// welcome page view component registration:
import welcomeView from '../components/welcome-view/welcome';

if ($("#welcomeView").length !== 0) {
    new Vue({
        el: '#welcomeView',
        vuetify,
        components: {
            'welcome-view': welcomeView
        }
    });
}