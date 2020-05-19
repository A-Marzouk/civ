require('./modules');

let token = 'Bearer ' + (Vue.$cookies.get('access_token') || null);
axios.defaults.headers.Authorization = token;

// Vuetify
import vuetify from './vuetify';

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        'Accept': 'application/json'
    }
});

// welcome page view component registration:
import welcomeView from './components/welcome-view/welcome';
if ($("#welcomeView").length !== 0) {
    new Vue({
        el: '#welcomeView',
        vuetify,
        components: {
            'welcome-view': welcomeView
        }
    });
}


import welcomeView2 from './components/welcome-view2/welcome';
if ($("#welcomeView2").length !== 0) {
    new Vue({
        el: '#welcomeView2',
        vuetify,
        components: {
            'welcome-view2': welcomeView2
        }
    });
}


//api components
require('./API');

//admin components
require('./admin');

// Default themes preview components registrations:
require('./default-themes');

// Resume builder components register
require('./resume-builder');

// Admin Resume builder components register
require('./admin-resume-builder');

// passport and Auth components register
require('./passport');