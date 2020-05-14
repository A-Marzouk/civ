// admin dash board
import {store} from './store/store';
import vuetify from './vuetify';

// VueRouter
import VueRouter from 'vue-router';
Vue.use(VueRouter);



import adminDashboard from './components/admin/Dashboard';

import General from './components/admin/tabs/General';
import accountSettings from './components/admin/tabs/Settings';
import Users from './components/admin/tabs/UsersTable';
import Themes from './components/admin/tabs/Themes';

if ($("#adminDashboard").length !== 0) {

    const routes = [
        {path: '/', component: General, name:'general'},
        {path: '/account-settings', component: accountSettings, name:'acc_settings'},
        {path: '/users', component: Users, name:'users'},
        {path: '/themes', component: Themes, name:'themes'}
    ];

    const router = new VueRouter({
        mode: 'history',
        base: '/workforce-admin/',
        routes,
    });

    new Vue({
        el: '#adminDashboard',
        store,
        router,
        vuetify,
        components:{
            'admin-dashboard':adminDashboard
        }
    });
}
