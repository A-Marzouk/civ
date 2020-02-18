require('./modules');

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

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

// Resume builder components register
require('./resume-builder');


