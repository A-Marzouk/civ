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


// Auth components register

import loginForm from './components/auth/Login';
if ($("#loginForm").length !== 0) {
    new Vue({
        el: '#loginForm',
        components:{
            'login-form':loginForm
        }
    });
}


import registerForm from './components/auth/Register';
if ($("#registerForm").length !== 0) {
    new Vue({
        el: '#registerForm',
        components:{
            'register-form':registerForm
        }
    });
}




