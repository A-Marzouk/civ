window.Vue = require('vue');

import Vuex from 'vuex'
Vue.use(Vuex);

// cookies:
import VueCookies from 'vue-cookies'
Vue.use(VueCookies);

export const store = new Vuex.Store({
    state:{
        user:{},
        access_token: Vue.$cookies.get('access_token') || null
    },
    mutations:{
      getCurrentUser: (state,data)=>{
          state.user = data ;
      }
    },
    actions:{
        getCurrentUser: (store) => {
            axios.get('/user/current').then( (response) => {
                store.commit('getCurrentUser',response.data);
            });
        }
    }
});
