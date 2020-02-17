import $ from "jquery";

import resumeTheme2 from './components/resume_themes/theme2';
if ($("#resumeTheme2").length !== 0) {
    new Vue({
        el: '#resumeTheme2',
        components:{
            'resume-theme-2':resumeTheme2
        }
    });
}


import resumeTheme3 from './components/resume_themes/theme3';
if ($("#resumeTheme3").length !== 0) {
    new Vue({
        el: '#resumeTheme3',
        components:{
            'resume-theme-3':resumeTheme3
        }
    });
}


import resumeTheme4 from './components/resume_themes/theme4';
if ($("#resumeTheme4").length !== 0) {
    new Vue({
        el: '#resumeTheme4',
        components:{
            'resume-theme-4':resumeTheme4
        }
    });
}






