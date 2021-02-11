import vuetify from "../vuetify";

import { store } from "../store/store";

import VueRouter from "vue-router";
Vue.use(VueRouter);

const router = new VueRouter({
    mode: "history"
});

import resumeTheme1001 from "../components/resume_themes/theme1001/index";

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