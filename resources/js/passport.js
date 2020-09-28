// Vuetify
import vuetify from './vuetify';

import passportClients from './components/passport/Clients.vue';
if ($("#passportClients").length !== 0) {
    new Vue({
        el: '#passportClients',
        components:{
            'passport-clients':passportClients
        }
    });
}

import passportAuthorizedClients from './components/passport/AuthorizedClients.vue';
if ($("#passportAuthorizedClients").length !== 0) {
    new Vue({
        el: '#passportAuthorizedClients',
        components:{
            'passport-authorized-clients':passportAuthorizedClients
        }
    });
}

import passportPersonalAccessTokens from './components/passport/PersonalAccessTokens.vue';
if ($("#passportPersonalAccessTokens").length !== 0) {
    new Vue({
        el: '#passportPersonalAccessTokens',
        components:{
            'passport-personal-access-tokens':passportPersonalAccessTokens
        }
    });
}


// Auth components

import loginForm from './components/auth/Login';
if ($("#loginForm").length !== 0) {
    new Vue({
        el: '#loginForm',
        vuetify,
        components:{
            'login-form':loginForm
        }
    });
}


import registerForm from './components/auth/Register';
if ($("#registerForm").length !== 0) {
    new Vue({
        el: '#registerForm',
        vuetify,
        components:{
            'register-form':registerForm
        }
    });
}


import resetPasswordForm from './components/auth/passwords/password_reset';
if ($("#resetPasswordForm").length !== 0) {
    new Vue({
        el: '#resetPasswordForm',
        vuetify,
        components:{
            'password-reset-form':resetPasswordForm
        }
    });
}




