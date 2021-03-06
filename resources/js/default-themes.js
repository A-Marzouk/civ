import vuetify from "./vuetify";

import { store } from "./store/store";

// VueRouter
import VueRouter from "vue-router";
Vue.use(VueRouter);

const router = new VueRouter({
    mode: "history"
});

import resumeTheme2 from "./components/resume_themes/theme2/index";
if ($("#resumeTheme2").length !== 0) {
    new Vue({
        el: "#resumeTheme2",
        components: {
            "resume-theme-2": resumeTheme2
        }
    });
}

import resumeTheme3 from "./components/resume_themes/theme3/index";
if ($("#resumeTheme3").length !== 0) {
    new Vue({
        store,
        el: "#resumeTheme3",
        components: {
            "resume-theme-3": resumeTheme3
        }
    });
}

import resumeTheme4 from "./components/resume_themes/theme4";
if ($("#resumeTheme4").length !== 0) {
    new Vue({
        el: "#resumeTheme4",
        components: {
            "resume-theme-4": resumeTheme4
        }
    });
}

import resumeTheme5 from "./components/resume_themes/theme5/index";
if ($("#resumeTheme5").length !== 0) {
    new Vue({
        el: "#resumeTheme5",
        vuetify,
        store,
        components: {
            "resume-theme-5": resumeTheme5
        }
    });
}

import resumeTheme6 from "./components/resume_themes/theme6";
if ($("#resumeTheme6").length !== 0) {
    new Vue({
        el: "#resumeTheme6",
        store,
        components: {
            "resume-theme-6": resumeTheme6
        }
    });
}

import resumeTheme7 from "./components/resume_themes/theme7";
if ($("#resumeTheme7").length !== 0) {
    new Vue({
        el: "#resumeTheme7",
        store,
        components: {
            "resume-theme-7": resumeTheme7
        }
    });
}

import resumeTheme8 from "./components/resume_themes/theme8/index";
if ($("#resumeTheme8").length !== 0) {
    new Vue({
        el: "#resumeTheme8",
        store,
        vuetify,
        iconfont: "fa4",
        components: {
            "resume-theme-8": resumeTheme8
        }
    });
}

import resumeTheme10 from "./components/resume_themes/theme10";
if ($("#resumeTheme10").length !== 0) {
    new Vue({
        el: "#resumeTheme10",
        store,
        components: {
            "resume-theme-10": resumeTheme10
        }
    });
}

// Jose's themes
import resumeTheme102 from "./components/resume_themes/theme102";
if ($("#resumeTheme102").length !== 0) {
    new Vue({
        el: "#resumeTheme102",
        vuetify,
        store,
        iconfont: "fa4",
        components: {
            "resume-theme-102": resumeTheme102
        }
    });
}

import resumeTheme103 from "./components/resume_themes/theme103/index";
if ($("#resumeTheme103").length !== 0) {
    new Vue({
        el: "#resumeTheme103",
        vuetify,
        store,
        iconfont: "fa4",
        components: {
            "resume-theme-103": resumeTheme103
        }
    });
}

import resumeTheme104 from "./components/resume_themes/theme104";
if ($("#resumeTheme104").length !== 0) {
    new Vue({
        el: "#resumeTheme104",
        vuetify,
        store,
        iconfont: "fa4",
        components: {
            "resume-theme-104": resumeTheme104
        }
    });
}

import resumeTheme105 from "./components/resume_themes/theme105";
if ($("#resumeTheme105").length !== 0) {
    new Vue({
        el: "#resumeTheme105",
        vuetify,
        store,
        iconfont: "fa4",
        components: {
            "resume-theme-105": resumeTheme105
        }
    });
}

import resumeTheme106 from "./components/resume_themes/theme106";
if ($("#resumeTheme106").length !== 0) {
    new Vue({
        el: "#resumeTheme106",
        vuetify,
        store,
        iconfont: "fa4",
        components: {
            "resume-theme-106": resumeTheme106
        }
    });
}

import resumeTheme107 from "./components/resume_themes/theme107";
if ($("#resumeTheme107").length !== 0) {
    new Vue({
        el: "#resumeTheme107",
        vuetify,
        store,
        iconfont: "fa4",
        components: {
            "resume-theme-107": resumeTheme107
        }
    });
}

import resumeTheme109 from "./components/resume_themes/theme109";
if ($("#resumeTheme109").length !== 0) {
    new Vue({
        el: "#resumeTheme109",
        vuetify,
        store,
        iconfont: "fa4",
        components: {
            "resume-theme-109": resumeTheme109
        }
    });
}

import resumeTheme110 from "./components/resume_themes/theme110";
if ($("#resumeTheme110").length !== 0) {
    new Vue({
        el: "#resumeTheme110",
        vuetify,
        store,
        iconfont: "fa4",
        components: {
            "resume-theme-110": resumeTheme110
        }
    });
}

import resumeTheme111 from "./components/resume_themes/theme111";
if ($("#resumeTheme111").length !== 0) {
    new Vue({
        el: "#resumeTheme111",
        vuetify,
        store,
        iconfont: "fa4",
        components: {
            "resume-theme-111": resumeTheme111
        }
    });
}

import resumeTheme112 from "./components/resume_themes/theme112";
if ($("#resumeTheme112").length !== 0) {
    new Vue({
        el: "#resumeTheme112",
        vuetify,
        store,
        iconfont: "fa4",
        components: {
            "resume-theme-112": resumeTheme112
        }
    });
}

import resumeTheme113 from "./components/resume_themes/theme113";
if ($("#resumeTheme113").length !== 0) {
    new Vue({
        el: "#resumeTheme113",
        vuetify,
        store,
        iconfont: "fa4",
        components: {
            "resume-theme-113": resumeTheme113
        }
    });
}

import resumeTheme201 from "./components/resume_themes/theme201/index";
if ($("#resumeTheme201").length !== 0) {
    new Vue({
        el: "#resumeTheme201",
        vuetify,
        store,
        iconfont: "fa4",
        components: {
            "resume-theme-201": resumeTheme201
        }
    });
}

// theme 202
import resumeTheme202 from "./components/resume_themes/theme202/index";
if ($("#resumeTheme202").length !== 0) {
    new Vue({
        el: "#resumeTheme202",
        vuetify,
        iconfont: "fa4",
        components: {
            "resume-theme-202": resumeTheme202
        }
    });
}
// theme 202

import resumeTheme300 from "./components/resume_themes/theme300/index.vue";
if ($("#resumeTheme300").length !== 0) {
    new Vue({
        el: "#resumeTheme300",
        store,
        vuetify,
        components: {
            "resume-theme-300": resumeTheme300
        }
    });
}

import resumeTheme200 from "./components/resume_themes/theme200/index";
if ($("#resumeTheme200").length !== 0) {
    new Vue({
        el: "#resumeTheme200",
        vuetify,
        store,
        iconfont: "fa4",
        components: {
            "resume-theme-200": resumeTheme200
        }
    });
}

import resumeTheme401 from "./components/resume_themes/theme401";
if ($("#resumeTheme401").length !== 0) {
    new Vue({
        el: "#resumeTheme401",
        vuetify,
        iconfont: "mdi",
        components: {
            "resume-theme-401": resumeTheme401
        }
    });
}

import resumeTheme402 from "./components/resume_themes/theme402";
if ($("#resumeTheme402").length !== 0) {
    new Vue({
        el: "#resumeTheme402",
        vuetify,
        iconfont: "mdi",
        components: {
            "resume-theme-402": resumeTheme402
        }
    });
}

import resumeTheme403 from "./components/resume_themes/theme403";
if ($("#resumeTheme403").length !== 0) {
    new Vue({
        el: "#resumeTheme403",
        vuetify,
        iconfont: "mdi",
        components: {
            "resume-theme-403": resumeTheme403
        }
    });
}

import resumeTheme203 from "./components/resume_themes/theme203/index";
if ($("#resumeTheme203").length !== 0) {
    new Vue({
        el: "#resumeTheme203",
        vuetify,
        store,
        router,
        iconfont: "fa4",
        components: {
            "resume-theme-203": resumeTheme203
        }
    });
}

import resumeTheme204 from "./components/resume_themes/theme204/index";
if ($("#resumeTheme204").length !== 0) {
    new Vue({
        el: "#resumeTheme204",
        vuetify,
        store,
        iconfont: "fa4",
        components: {
            "resume-theme-204": resumeTheme204
        }
    });
}

import resumeTheme205 from "./components/resume_themes/theme205/index";
if ($("#resumeTheme205").length !== 0) {
    new Vue({
        el: "#resumeTheme205",
        vuetify,
        store,
        iconfont: "fa4",
        components: {
            "resume-theme-205": resumeTheme205
        }
    });
}

import resumeTheme301 from "./components/resume_themes/theme301";
if ($("#resumeTheme301").length !== 0) {
    new Vue({
        el: "#resumeTheme301",
        vuetify,
        components: {
            "resume-theme-301": resumeTheme301
        }
    });
}

import resumeTheme700 from "./components/resume_themes/theme700/index";
if ($("#resumeTheme700").length !== 0) {
    new Vue({
        el: "#resumeTheme700",
        vuetify,
        iconfont: "mdi",
        components: {
            "resume-theme-700": resumeTheme700
        }
    });
}

import resumeTheme500 from "./components/resume_themes/theme500/index";
if ($("#resumeTheme500").length !== 0) {
    new Vue({
        el: "#resumeTheme500",
        vuetify,
        store,
        components: {
            "resume-theme-500": resumeTheme500
        }
    });
}
import resumeTheme501 from "./components/resume_themes/theme501/index";
if ($("#resumeTheme501").length !== 0) {
    new Vue({
        el: "#resumeTheme501",
        vuetify,
        store,
        components: {
            "resume-theme-501": resumeTheme501
        }
    });
}
import resumeTheme502 from "./components/resume_themes/theme502/index";
if ($("#resumeTheme502").length !== 0) {
    new Vue({
        el: "#resumeTheme502",
        vuetify,
        store,
        components: {
            "resume-theme-502": resumeTheme502
        }
    });
}

import resumeTheme302 from "./components/resume_themes/theme302/index";
if ($("#resumeTheme302").length !== 0) {
    new Vue({
        el: "#resumeTheme302",
        store,
        vuetify,
        components: {
            "resume-theme-302": resumeTheme302
        }
    });
}
import resumeTheme206 from "./components/resume_themes/theme206/index";
if ($("#resumeTheme206").length !== 0) {
    new Vue({
        el: "#resumeTheme206",
        vuetify,
        store,
        router,
        iconfont: "fa4",
        components: {
            "resume-theme-206": resumeTheme206
        }
    });
}
import resumeTheme307 from "./components/resume_themes/theme307";
if ($("#resumeTheme307").length !== 0) {
    new Vue({
        el: "#resumeTheme307",
        vuetify,
        components: {
            "resume-theme-307": resumeTheme307
        }
    });
}

import resumeTheme207 from "./components/resume_themes/theme207";
if ($("#resumeTheme207").length !== 0) {
    new Vue({
        el: "#resumeTheme207",
        vuetify,
        store,
        iconfont: "fa4",
        components: {
            "resume-theme-207": resumeTheme207
        }
    });
}

import resumeTheme701 from "./components/resume_themes/theme701/index";
if ($("#resumeTheme701").length !== 0) {
    new Vue({
        el: "#resumeTheme701",
        vuetify,
        iconfont: "mdi",
        components: {
            "resume-theme-701": resumeTheme701
        }
    });
}

import resumeTheme503 from "./components/resume_themes/theme503/index";
if ($("#resumeTheme503").length !== 0) {
    new Vue({
        el: "#resumeTheme503",
        vuetify,
        store,
        components: {
            "resume-theme-503": resumeTheme503
        }
    });
}
import resumeTheme504 from "./components/resume_themes/theme504/index";
if ($("#resumeTheme504").length !== 0) {
    new Vue({
        el: "#resumeTheme504",
        vuetify,
        store,
        components: {
            "resume-theme-504": resumeTheme504
        }
    });
}

import resumeTheme702 from "./components/resume_themes/theme702/index";
if ($("#resumeTheme702").length !== 0) {
    new Vue({
        el: "#resumeTheme702",
        vuetify,
        iconfont: "mdi",
        components: {
            "resume-theme-702": resumeTheme702
        }
    });
}
import resumeTheme505 from "./components/resume_themes/theme505";
if ($("#resumeTheme505").length !== 0) {
    new Vue({
        el: "#resumeTheme505",
        vuetify,
        store,
        components: {
            "resume-theme-505": resumeTheme505
        }
    });
}
import resumeTheme506 from "./components/resume_themes/theme506";
if ($("#resumeTheme506").length !== 0) {
    new Vue({
        el: "#resumeTheme506",
        vuetify,
        store,
        components: {
            "resume-theme-506": resumeTheme506
        }
    });
}

import resumeTheme507 from "./components/resume_themes/theme507";
if ($("#resumeTheme507").length !== 0) {
    new Vue({
        el: "#resumeTheme507",
        vuetify,
        store,
        components: {
            "resume-theme-507": resumeTheme507
        }
    });
}

import resumeTheme1000 from "./components/resume_themes/theme1000";
if ($("#resumeTheme1000").length !== 0) {
    new Vue({
        el: "#resumeTheme1000",
        components: {
            "resume-theme-1000": resumeTheme1000
        }
    });
}

import resumeTheme1002 from "./components/resume_themes/theme1002";
if ($("#resumeTheme1002").length !== 0) {
    new Vue({
        el: "#resumeTheme1002",
        components: {
            "resume-theme-1002": resumeTheme1002
        }
    });
}

import resumeTheme1003 from "./components/resume_themes/theme1003";
if ($("#resumeTheme1003").length !== 0) {
    new Vue({
        el: "#resumeTheme1003",
        store,
        components: {
            "resume-theme-1003": resumeTheme1003
        }
    });
}

import resumeTheme508 from "./components/resume_themes/theme508/index";
if ($("#resumeTheme508").length !== 0) {
    new Vue({
        el: "#resumeTheme508",
        vuetify,
        iconfont: "mdi",
        components: {
            "resume-theme-508": resumeTheme508
        }
    });
}

import resumeTheme900 from "./components/resume_themes/theme900/index";
if ($("#resumeTheme900").length !== 0) {
    new Vue({
        el: "#resumeTheme900",
        vuetify,
        store,
        components: {
            "resume-theme-900": resumeTheme900
        }
    });
}
import resumeTheme901 from "./components/resume_themes/theme901/index";
if ($("#resumeTheme901").length !== 0) {
    new Vue({
        el: "#resumeTheme901",
        vuetify,
        store,
        components: {
            "resume-theme-901": resumeTheme901
        }
    });
}

import resumeTheme902 from "./components/resume_themes/theme902/index";
if ($("#resumeTheme902").length !== 0) {
    new Vue({
        el: "#resumeTheme902",
        vuetify,
        store,
        components: {
            "resume-theme-902": resumeTheme902
        }
    });
}
import resumeTheme1100 from "./components/resume_themes/theme1100";
if ($("#resumeTheme1100").length !== 0) {
    new Vue({
        el: "#resumeTheme1100",
        vuetify,
        store,
        iconfont: "mdi",
        components: {
            "resume-theme-1100": resumeTheme1100
        }
    });
}

import resumeTheme1101 from "./components/resume_themes/theme1101";
if ($("#resumeTheme1101").length !== 0) {
    new Vue({
        el: "#resumeTheme1101",
        vuetify,
        store,
        iconfont: "mdi",
        components: {
            "resume-theme-1101": resumeTheme1101
        }
    });
}
import resumeTheme1102 from "./components/resume_themes/theme1102";
if ($("#resumeTheme1102").length !== 0) {
    new Vue({
        el: "#resumeTheme1102",
        vuetify,
        store,
        iconfont: "mdi",
        components: {
            "resume-theme-1102": resumeTheme1102
        }
    });
}

import resumeTheme308 from "./components/resume_themes/theme308";
if ($("#resumeTheme308").length !== 0) {
    new Vue({
        el: "#resumeTheme308",
        vuetify,
        store,
        iconfont: "mdi",
        components: {
            "resume-theme-308": resumeTheme308
        }
    });
}

import resumeTheme600 from "./components/resume_themes/theme600";
if ($("#resumeTheme600").length !== 0) {
    new Vue({
        el: "#resumeTheme600",
        vuetify,
        store,
        iconfont: "mdi",
        components: {
            "resume-theme-600": resumeTheme600
        }
    });
}
import resumeTheme509 from "./components/resume_themes/theme509/index";
if ($("#resumeTheme509").length !== 0) {
    new Vue({
        el: "#resumeTheme509",
        vuetify,
        iconfont: "mdi",
        components: {
            "resume-theme-509": resumeTheme509
        }
    });
}
import resumeTheme510 from "./components/resume_themes/theme510/index";
if ($("#resumeTheme510").length !== 0) {
    new Vue({
        el: "#resumeTheme510",
        vuetify,
        iconfont: "mdi",
        components: {
            "resume-theme-510": resumeTheme510
        }
    });
}

import resumeTheme602 from "./components/resume_themes/theme602";
if ($("#resumeTheme602").length !== 0) {
    new Vue({
        el: "#resumeTheme602",
        vuetify,
        store,
        iconfont: "mdi",
        components: {
            "resume-theme-602": resumeTheme602
        }
    });
}

import resumeTheme1001 from "./components/resume_themes/theme1001/index";

if ($("#resumeTheme1001").length !== 0) {
    new Vue({
        el: "#resumeTheme1001",
        store,
        router,
        vuetify,
        components: {
            "resume-theme-1001": resumeTheme1001
        }
    });
}


import resumeTheme903 from "./components/resume_themes/theme903/index";
if ($("#resumeTheme903").length !== 0) {
    new Vue({
        el: "#resumeTheme903",
        vuetify,
        store,
        components: {
            "resume-theme-903": resumeTheme903
        }
    });
}

import resumeTheme511 from "./components/resume_themes/theme511/index";
if ($("#resumeTheme511").length !== 0) {
    new Vue({
        el: "#resumeTheme511",
        vuetify,
        store,
        router,
        components: {
            "resume-theme-511": resumeTheme511
        }
    });
}

import resumeTheme512 from "./components/resume_themes/theme512/index";
if ($("#resumeTheme512").length !== 0) {
    new Vue({
        el: "#resumeTheme512",
        vuetify,
        store,
        components: {
            "resume-theme-512": resumeTheme512
        }
    });
}
