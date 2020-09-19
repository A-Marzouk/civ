require('./modules');

let token = 'Bearer ' + (Vue.$cookies.get('access_token') || null);
axios.defaults.headers.Authorization = token;

// Vuetify
import vuetify from './vuetify';
window.EventBus = new Vue();
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


import pricing from './components/welcome-view/pricing';
if ($("#pricing").length !== 0) {
    new Vue({
        el: '#pricing',
        vuetify,
        components: {
            'pricing': pricing
        }
    });
}
//faq
import faq from './components/welcome-view/faq';
if ($("#faq").length !== 0) {
    new Vue({
        el: '#faq',
        vuetify,
        components: {
            'faq': faq
        }
    });
}



import subscriptionModal from './components/resume_builder/tabs/includes/SubscriptionModal';
if ($("#subscription_modal").length !== 0) {
    new Vue({
        el: '#subscription_modal',
        vuetify,
        components: {
            'subscription-modal': subscriptionModal
        }
    });
}

import externalReference from './components/resume_builder/externalReference';
if ($("#external_reference").length !== 0) {
    new Vue({
        el: '#external_reference',
        vuetify,
        components: {
            'external-reference': externalReference
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
