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




import userTheme3 from './components/user_themes/theme3';
if ($("#userTheme3").length !== 0) {

    new Vue({
        el: '#userTheme3',
        store,
        components:{
            'user-theme-3':userTheme3
        }
    });

}



import userTheme8 from './components/user_themes/theme8';
if ($("#userTheme8").length !== 0) {
    new Vue({
        el: '#userTheme8',
        store,
        components:{
            'user-theme-8':userTheme8
        }
    });
}








