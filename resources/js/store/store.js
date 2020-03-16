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
        },
        showFullScreenNotification:(state, data) => {
            let modal = $('#fullScreenNotificationModal');

            // change to needed content
            let notificationText = $('#notificationText');
            let notificationIconSrc = $('#notificationIconSrc');
            data.message ? notificationText.text(data.message) : notificationText.text('Data saved successfully');
            data.iconSrc ? notificationIconSrc.prop('src',data.iconSrc) : notificationIconSrc.prop('src','/images/resume_builder/tick.png') ;

            // toggle modal
            modal.modal('show');
            modal.css('display','flex');
            setTimeout( () => {modal.modal('hide')},2000);
        },
        showFlyingNotification:(state, data) => {
            let notificationElement = $('#flyingNotification');
            notificationElement.slideToggle(true);
            setTimeout(() => {
                notificationElement.slideToggle(false)
            }, 2000);
        }

    },
    actions: {
        getCurrentUser: (store) => {
            axios.get('/api/user').then((response) => {
                store.commit('getCurrentUser', response.data);
            }).catch((error) => {
                // if unauthorized : logout user [it means the cookie has been deleted or changed]
                console.log( 'token is : ' + store.state.access_token);
                return;
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
        },
        fullScreenNotification(store,payload = {}){
           store.commit('showFullScreenNotification',payload);
        },
        flyingNotification(store,payload = {}){
            store.commit('showFlyingNotification',payload);
        }
    }
});
