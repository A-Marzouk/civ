window.Vue = require('vue');

// axios:
window.axios = require('axios');

// welcome page view component registration:
import welcomeView from '../components/welcome-view/welcome';

if ($("#welcomeView").length !== 0) {
    new Vue({
        el: '#welcomeView',
        components: {
            'welcome-view': welcomeView
        }
    });
}

// auth form ( in homepage and standalone page )
import AuthForm from '../components/auth/AuthForm';

if ($("#AuthForm").length !== 0) {
    new Vue({
        el: '#AuthForm',
        components: {
            'auth-form': AuthForm
        }
    });
}