window.Vue = require('vue');

import Vuex from 'vuex'

Vue.use(Vuex);

// cookies:
import VueCookies from 'vue-cookies'

Vue.use(VueCookies);

export const store = new Vuex.Store({
    state: {
        user: {},
        access_token: Vue.$cookies.get('access_token') || null
    },
    mutations: {
        getCurrentUser: (state, data) => {
            state.user = data;
        }
    },
    actions: {
        getCurrentUser: (store) => {
            axios.get('/api/user').then((response) => {
                store.commit('getCurrentUser', response.data);
            }).catch((error) => {
                // if unauthorized : logout user [it means the cookie has been deleted or changed]
                if (error.response.status === 401) {
                    store.dispatch('logoutUnauthorizedUser');
                }
            });
        },
        logoutUnauthorizedUser() {
            axios.post('/logout').then((response) => {
                    // remove access token from cookies:
                    if (Vue.$cookies.isKey('access_token')) {
                        Vue.$cookies.remove('access_token');
                    }
                    window.location.href = '/login';
                }
            )
        }
    }
});
