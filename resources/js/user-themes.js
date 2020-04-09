import vuetify from './vuetify';
import {store} from './store/store';



import userTheme200 from './components/user_themes/theme200/Main';
if ($("#userTheme200").length !== 0) {

    new Vue({
        el: '#userTheme200',
        vuetify,
        store,
        iconfont: 'fa4',
        components:{
            'user-theme-200':userTheme200
        }
    });

}








