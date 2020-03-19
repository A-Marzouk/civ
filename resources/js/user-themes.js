import vuetify from './vuetify';
import {store} from './store/store';




import userTheme201 from './components/user_themes/theme201/Main';
if ($("#userTheme201").length !== 0) {

    new Vue({
        el: '#userTheme201',
        vuetify,
        store,
        iconfont: 'fa4',
        components:{
            'user-theme-201':userTheme201
        }
    });

}








