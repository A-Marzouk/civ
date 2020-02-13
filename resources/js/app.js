require('./modules');



// welcome page view

import welcomeView from './components/welcome-view/welcome';
new Vue({
    el: '#welcomeView',
    components:{
        'welcome-view':welcomeView
    }
});
