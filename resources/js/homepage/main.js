window.Vue = require('vue');

// cookies:  ( for login page )
import VueCookies from 'vue-cookies'
Vue.use(VueCookies);

// axios:
window.axios = require('axios');

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

// Home page components:
import homepageUsernameInput from '../components/homepage/UsernameInput';
import homepageVideo from '../components/homepage/homepageVideo';

if ($("#ah-homepage").length !== 0) {
    // username input
    new Vue({
        el: '#homepage_username_input',
        components: {
            'username-input': homepageUsernameInput
        }
    });

    // homepage video
    new Vue({
        el: '#homepage_video',
        components: {
            'homepage-video': homepageVideo
        }
    });
}
