import {store} from './store/store';

// Vuetify
import vuetify from './vuetify';

// VueRouter
import VueRouter from 'vue-router';
Vue.use(VueRouter);

import UUID from 'vue-uuid';
Vue.use(UUID);

import VueFriendlyIframe from 'vue-friendly-iframe';
Vue.use(VueFriendlyIframe);

import resumeBuilder from './components/resume_builder/Main';

// main tabs
import ResumeBuilderMyAccount from './components/resume_builder/tabs/MyAccount'
import ResumeBuilderEditCV from './components/resume_builder/tabs/EditCV'
import ResumeBuilderJobsAlert from './components/resume_builder/tabs/Jobs'
import ResumeBuilderCoverLetter from './components/resume_builder/tabs/CoverLetter'

// edit inside components :
import ResumeBuilderEditCVProfile from './components/resume_builder/tabs/edit_tabs/Profile'
import ResumeBuilderEditCVAbout from './components/resume_builder/tabs/edit_tabs/About'
import ResumeBuilderEditCVLinks from './components/resume_builder/tabs/edit_tabs/Links'
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
import ResumeBuilderEditCVManager from './components/resume_builder/tabs/edit_tabs/Manager'
import ResumeBuilderEditCVStructure from './components/resume_builder/tabs/edit_tabs/Structure'
import ResumeBuilderEditCVSThemes from './components/resume_builder/tabs/edit_tabs/Themes'
import ResumeBuilderEditCVReferences from './components/resume_builder/tabs/edit_tabs/References'

// Test components view
import ResumeBuilderComponentsView from './components/resume_builder/components/utils/index'

if ($("#resumeBuilder").length !== 0) {

    const routes = [
        {path: '/resume-builder/account', component: ResumeBuilderMyAccount, name:'my-account'},
        {
            path: '/resume-builder',
            component: ResumeBuilderEditCV,
            redirect: '/resume-builder/edit/profile',
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
                    path: '/resume-builder/edit/about',
                    component: ResumeBuilderEditCVAbout
                },
                {
                    path: '/resume-builder/edit/links',
                    component: ResumeBuilderEditCVLinks
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
                    path: '/resume-builder/edit/achievements',
                    component: ResumeBuilderEditCVAchievement
                },
                {
                    path: '/resume-builder/edit/hobbies',
                    component: ResumeBuilderEditCVHobbies
                },
                {
                    path: '/resume-builder/edit/media',
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
                    path: '/resume-builder/edit/manager',
                    component: ResumeBuilderEditCVManager
                },
                {
                    path: '/resume-builder/edit/structure',
                    component: ResumeBuilderEditCVStructure
                },
                {
                    path: '/resume-builder/edit/references',
                    component: ResumeBuilderEditCVReferences
                },
                {
                    path: '/resume-builder/edit/themes',
                    component: ResumeBuilderEditCVSThemes
                },
            ]

        },
        {path: '/resume-builder/jobs', component: ResumeBuilderJobsAlert, name:'jobAlert'},
        {path: '/resume-builder/cover-letter', component: ResumeBuilderCoverLetter, name:'coverLetter'},
        {path: '/resume-builder/components', component: ResumeBuilderComponentsView, name: 'components'}
    ];

    const router = new VueRouter({
        mode: 'history',
        routes,
    });

    new Vue({
        store,
        router,
        vuetify,
        el: '#resumeBuilder',
        components:{
            'resume-builder':resumeBuilder
        }
    });

}
