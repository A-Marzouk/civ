require('./modules');

// welcome page view component registration:
import welcomeView from './components/welcome-view/welcome';
if ($("#welcomeView").length !== 0) {
    new Vue({
        el: '#welcomeView',
        components:{
            'welcome-view':welcomeView
        }
    });
}


// Default themes preview components registrations:
require('./default-themes');
