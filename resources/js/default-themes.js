import vuetify from './vuetify';
import {store} from './store/store';



import resumeTheme2 from './components/resume_themes/theme2';
if ($("#resumeTheme2").length !== 0) {
    new Vue({
        el: '#resumeTheme2',
        components: {
            'resume-theme-2': resumeTheme2
        }
    });
}


import resumeTheme3 from './components/resume_themes/theme3';
if ($("#resumeTheme3").length !== 0) {
    new Vue({
        el: '#resumeTheme3',
        components: {
            'resume-theme-3': resumeTheme3
        }
    });
}


import resumeTheme4 from './components/resume_themes/theme4';
if ($("#resumeTheme4").length !== 0) {
    new Vue({
        el: '#resumeTheme4',
        components: {
            'resume-theme-4': resumeTheme4
        }
    });
}

import resumeTheme5 from './components/resume_themes/theme5';
if ($("#resumeTheme5").length !== 0) {
    new Vue({
        el: '#resumeTheme5',
        components: {
            'resume-theme-5': resumeTheme5
        }
    });
}

import resumeTheme6 from './components/resume_themes/theme6';
if ($("#resumeTheme6").length !== 0) {
    new Vue({
        el: '#resumeTheme6',
        components: {
            'resume-theme-6': resumeTheme6
        }
    });
}

import resumeTheme7 from './components/resume_themes/theme7';
if ($("#resumeTheme7").length !== 0) {
    new Vue({
        el: '#resumeTheme7',
        components: {
            'resume-theme-7': resumeTheme7
        }
    });
}

import resumeTheme8 from './components/resume_themes/theme8';
if ($("#resumeTheme8").length !== 0) {
    new Vue({
        el: '#resumeTheme8',
        store,
        components: {
            'resume-theme-8': resumeTheme8
        }
    });
}

import resumeTheme10 from './components/resume_themes/theme10';
if ($("#resumeTheme10").length !== 0) {
    new Vue({
        el: '#resumeTheme10',
        components: {
            'resume-theme-10': resumeTheme10
        }
    });
}


import resumeTheme201 from './components/resume_themes/theme201/Main';
if ($("#resumeTheme201").length !== 0) {

    new Vue({
        el: '#resumeTheme201',
        vuetify,
        store,
        iconfont: 'fa4',
        components: {
            'resume-theme-201': resumeTheme201
        }
    });

}

// theme 202
import resumeTheme202 from './components/resume_themes/theme202';
if ($("#resumeTheme202").length !== 0) {

    new Vue({
        el: '#resumeTheme202',
        vuetify,
        iconfont: 'fa4',
        components: {
            'resume-theme-202': resumeTheme202
        }
    });

}
// theme 202


import resumeTheme300 from './components/resume_themes/theme300';
if ($("#resumeTheme300").length !== 0) {

    new Vue({
        el: '#resumeTheme300',
        vuetify,
        components: {
            'resume-theme-300': resumeTheme300
        }
    });

}

import resumeTheme200 from './components/resume_themes/theme200/Main';
if ($("#resumeTheme200").length !== 0) {

    new Vue({
        el: '#resumeTheme200',
        vuetify,
        store,
        iconfont: 'fa4',
        components: {
            'resume-theme-200': resumeTheme200
        }
    });
}


import resumeTheme401 from './components/resume_themes/theme401';
if ($("#resumeTheme401").length !== 0) {

    new Vue({
        el: '#resumeTheme401',
        vuetify,
        iconfont: 'mdi',
        components: {
            'resume-theme-401': resumeTheme401
        }
    });

}

import resumeTheme402 from './components/resume_themes/theme402';
if ($("#resumeTheme402").length !== 0) {

    new Vue({
        el: '#resumeTheme402',
        vuetify,
        iconfont: 'mdi',
        components: {
            'resume-theme-402': resumeTheme402
        }
    });

}

import resumeTheme403 from './components/resume_themes/theme403';
if ($("#resumeTheme403").length !== 0) {

    new Vue({
        el: '#resumeTheme403',
        vuetify,
        iconfont: 'mdi',
        components: {
            'resume-theme-403': resumeTheme403
        }
    });

}
