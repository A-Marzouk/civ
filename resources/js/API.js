// admin dash board
import vuetify from './vuetify';

// VueRouter
import VueRouter from 'vue-router';
Vue.use(VueRouter);


import apiView from './components/API/Docs';
// end points:
import apiAuth from './components/API/end_points/Auth';
import apiPersonalInfo from './components/API/end_points/PersonalInfo';

// api views:

if ($("#apiView").length !== 0) {

    const routes = [
        {path: '/api/docs/auth', component: apiAuth, name:'auth'},
        {path: '/api/docs/personal-info', component: apiPersonalInfo, name:'personal-info'},
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
