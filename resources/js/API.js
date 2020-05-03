// admin dash board
import vuetify from './vuetify';

// VueRouter
import VueRouter from 'vue-router';
Vue.use(VueRouter);


import apiView from './components/API/Docs';
import apiAuth from './components/API/end_points/Auth';

// api views:

if ($("#apiView").length !== 0) {

    const routes = [
        {path: '/api/docs/auth', component: apiAuth, name:'auth',}
    ];

    const router = new VueRouter({
        mode: 'history',
        routes,
    });

    new Vue({
        el: '#apiView',
        vuetify,
        router,
        components:{
            'api-view':apiView
        }
    });
}
