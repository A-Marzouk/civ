// admin dash board
import adminDashboard from './components/admin/Dashboard';
if ($("#adminDashboard").length !== 0) {
    new Vue({
        el: '#adminDashboard',
        components:{
            'admin-dashboard':adminDashboard
        }
    });
}
