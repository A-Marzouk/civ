require('./modules');

let token = 'Bearer ' + ( Vue.$cookies.get('access_token') || null );
axios.defaults.headers.Authorization = token;

// Vuetify
import vuetify from './vuetify';

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        'Accept':'application/json'
    }
});

// welcome page view component registration:
import welcomeView from './components/welcome-view/welcome';
if ($("#welcomeView").length !== 0) {
    new Vue({
        el: '#welcomeView',
        vuetify,
        components:{
            'welcome-view':welcomeView
        }
    });
}

//admin components
require('./admin');

// stripe payments
require('./stripe_payments');

// Default themes preview components registrations:
require('./default-themes');

// User themes components registrations:
require('./user-themes');

// Resume builder components register
require('./resume-builder');

// Admin Resume builder components register
require('./admin-resume-builder');

// passport and Auth components register
require('./passport');

