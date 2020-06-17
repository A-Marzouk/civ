
import {store} from './store/store';


// VueRouter
import VueRouter from 'vue-router';
Vue.use(VueRouter);

import UUID from 'vue-uuid';
Vue.use(UUID);

import adminResumeBuilder from './components/resume_builder/Main';

// main tabs
import ResumeBuilderMyAccount from './components/resume_builder/tabs/MyAccount'
import ResumeBuilderEditCV from './components/resume_builder/tabs/EditCV'
import ResumeBuilderViewCV from './components/resume_builder/tabs/ViewCV'

// edit inside components :
import ResumeBuilderEditCVProfile from './components/resume_builder/tabs/edit_tabs/Profile'
import ResumeBuilderEditCVSummary from './components/resume_builder/tabs/edit_tabs/Summary'
import ResumeBuilderEditCVWorkExperience from './components/resume_builder/tabs/edit_tabs/WorkExperience'
import ResumeBuilderEditCVEducation from './components/resume_builder/tabs/edit_tabs/Education'
import ResumeBuilderEditCVSkills from './components/resume_builder/tabs/edit_tabs/Skills'
import ResumeBuilderEditCVPortfolio from './components/resume_builder/tabs/edit_tabs/Portfolio'
import ResumeBuilderEditCVAchievement from './components/resume_builder/tabs/edit_tabs/Achievement'
import ResumeBuilderEditCVHobbies from './components/resume_builder/tabs/edit_tabs/Hobbies'
import ResumeBuilderEditCVAudioVideo from './components/resume_builder/tabs/edit_tabs/AudioVideo'
import ResumeBuilderEditCVPayAvailability  from './components/resume_builder/tabs/edit_tabs/PayAvailability'
import ResumeBuilderEditCVImports from './components/resume_builder/tabs/edit_tabs/Imports'
import ResumeBuilderEditCVReferences from './components/resume_builder/tabs/edit_tabs/References'

if ($("#adminResumeBuilder").length !== 0) {

    const routes = [
        {path: '/resume-builder', component: ResumeBuilderMyAccount, name:'my-account'},
        {
            path: '/resume-builder/edit',
            component: ResumeBuilderEditCV,
            name:'edit',
            children: [
                {
                    path: '/resume-builder/edit',
                    redirect: '/resume-builder/edit/profile'
                },
                {
                    path: '/resume-builder/edit/profile',
                    component: ResumeBuilderEditCVProfile
                },
                {
                    path: '/resume-builder/edit/summary',
                    component: ResumeBuilderEditCVSummary
                },
                {
                    path: '/resume-builder/edit/work-experience',
                    component: ResumeBuilderEditCVWorkExperience
                },
                {
                    path: '/resume-builder/edit/education',
                    component: ResumeBuilderEditCVEducation
                },
                {
                    path: '/resume-builder/edit/skills',
                    component: ResumeBuilderEditCVSkills
                },
                {
                    path: '/resume-builder/edit/portfolio',
                    component: ResumeBuilderEditCVPortfolio
                },
                {
                    path: '/resume-builder/edit/achievement',
                    component: ResumeBuilderEditCVAchievement
                },
                {
                    path: '/resume-builder/edit/hobbies',
                    component: ResumeBuilderEditCVHobbies
                },
                {
                    path: '/resume-builder/edit/audio-video',
                    component: ResumeBuilderEditCVAudioVideo
                },
                {
                    path: '/resume-builder/edit/pay-availability',
                    component: ResumeBuilderEditCVPayAvailability
                },
                {
                    path: '/resume-builder/edit/imports',
                    component: ResumeBuilderEditCVImports
                },
                {
                    path: '/resume-builder/edit/references',
                    component: ResumeBuilderEditCVReferences
                },
            ]

        },
        {path: '/resume-builder/view', component: ResumeBuilderViewCV, name:'view',}
    ];

    let currentUsername =  window.location.pathname.split('/')[2];
    let baseUrl = '/workforce-admin/' + currentUsername + '/' ;
    const router = new VueRouter({
        mode: 'history',
        base: baseUrl,
        routes,
    });

    new Vue({
        store,
        router,
        el: '#adminResumeBuilder',
        components:{
            'admin-resume-builder':adminResumeBuilder
        }
    });

}
