// admin dash board
import {store} from './store/store';
import vuetify from './vuetify';



import adminDashboard from './components/admin/Dashboard';
if ($("#adminDashboard").length !== 0) {
    new Vue({
        el: '#adminDashboard',
        store,
        vuetify,
        components:{
            'admin-dashboard':adminDashboard
        }
    });
}
