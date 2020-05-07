// API

import vuetify from './vuetify';

// VueRouter
import VueRouter from 'vue-router';
Vue.use(VueRouter);


import apiView from './components/API/Docs';
// end points:
import apiAuth from './components/API/end_points/Auth';
import apiPersonalInfo from './components/API/end_points/PersonalInfo';
import apiAchievements from './components/API/end_points/Achievements';
import apiAvailabilityInfo from './components/API/end_points/AvailabilityInfo';
import apiEducation from './components/API/end_points/Education';
import apiHobbies from './components/API/end_points/Hobbies';
import apiImports from './components/API/end_points/Imports';
import apiLanguages from './components/API/end_points/Languages';
import apiLinks from './components/API/end_points/Links';
import apiMedia from './components/API/end_points/Media';
import piPaymentInfo from './components/API/end_points/PaymentInfo';
import apiProjects from './components/API/end_points/Projects';
import apiReferee from './components/API/end_points/Referee';
import apiReferences from './components/API/end_points/References';
import apiSkills from './components/API/end_points/Skills';
import apiSummary from './components/API/end_points/Summary';
import apiTestimonials from './components/API/end_points/Testimonials';
import apiWorkEx from './components/API/end_points/WorkEx';

// api views:

if ($("#apiView").length !== 0) {

    const routes = [
        {path: '/api/docs/', redirect:'/api/docs/auth'},
        {path: '/api/docs/auth', component: apiAuth, name:'Auth'},
        {path: '/api/docs/personal-info', component: apiPersonalInfo, name:'PersonalInfo'},
        {path: '/api/docs/achievements', component: apiAchievements, name:'Achievements'},
        {path: '/api/docs/availability-info', component: apiAvailabilityInfo, name:'AvailabilityInfo'},
        {path: '/api/docs/education', component: apiEducation, name:'Education'},
        {path: '/api/docs/hobbies', component: apiHobbies, name:'Hobbies'},
        {path: '/api/docs/imports', component: apiImports, name:'Imports'},
        {path: '/api/docs/media', component: apiMedia, name:'Media'},
        {path: '/api/docs/languages', component: apiLanguages, name:'Languages'},
        {path: '/api/docs/links', component: apiLinks, name:'Links'},
        {path: '/api/docs/payment-info', component: piPaymentInfo, name:'PaymentInfo'},
        {path: '/api/docs/projects', component: apiProjects, name:'Projects'},
        {path: '/api/docs/referee', component: apiReferee, name:'Referee'},
        {path: '/api/docs/references', component: apiReferences, name:'References'},
        {path: '/api/docs/skills', component: apiSkills, name:'Skills'},
        {path: '/api/docs/summary', component: apiSummary, name:'Summary'},
        {path: '/api/docs/testimonials', component: apiTestimonials, name:'Testimonials'},
        {path: '/api/docs/work-experience', component: apiWorkEx, name:'WorkEx'},

    ];

    const router = new VueRouter({
        mode: 'history',
        routes,
    });

    new Vue({
        el: '#apiView',
        vuetify,
        router,
        components:{
            'api-view':apiView
        }
    });
}
