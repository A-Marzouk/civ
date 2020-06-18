window.Vue = require('vue');

import Vuex from 'vuex'

Vue.use(Vuex);

// cookies:
import VueCookies from 'vue-cookies'

Vue.use(VueCookies);

export const store = new Vuex.Store({
    state: {
        user: {},
        dummyUser: {
            id: 'dummy',
            personal_info: {
                full_name: 'Beverly Andrews',
                email: 'beverly@andrews.com',
                profile_pic: '/images/resume_themes/theme200/images/about-me/men.png',
                designation: 'User interface designer',
                phone: '+990000000',
                location: 'London',
                about: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            },
            payment_info: [
                {
                    salary: '10',
                    salary_frequency: 'hourly',
                    currency: 'usd'
                },
                {
                    salary: '100',
                    salary_frequency: 'weekly',
                    currency: 'usd'
                },
                {
                    salary: '1000',
                    salary_frequency: 'monthly',
                    currency: 'usd'
                },
                {
                    salary: '10000',
                    salary_frequency: 'yearly',
                    currency: 'usd'
                },
            ],
            availability_info:[
                {
                    available_hours: '40',
                    available_hours_frequency: 'weekly'
                },
                {
                    available_hours: '400',
                    available_hours_frequency: 'monthly'
                },
                {
                    available_hours: '4000',
                    available_hours_frequency: 'yearly'
                }
            ],
            skills: [
                {
                    id: Math.random(),
                    title: 'photoshop',
                    category: 'design',
                    percentage: '90',
                },
                {
                    id: Math.random(),
                    title: 'phpstorm',
                    category: 'software',
                    percentage: '90',
                },
                {
                    id: Math.random(),
                    title: 'photoshop',
                    category: 'programming_languages',
                    percentage: '90',
                },
            ],
            achievements: [
                {
                    title: 'Hubspot Design Certification',
                    category: 'certificates',
                    description: 'The bearer of this certificate is hereby deemed proficient in crafting responsive, styled templates using HubSpot\'s design tools. The bearer has demonstrated that he/she can effectively apply template and style knowledge to HubSpot blog, page, landing page and email templates and is approved to sell these assets in the HubSpot Marketplace. Certification is active for 13 months after month issued.',
                    image_src: '/images/resume_themes/theme200/images/about-me/certification.png',
                    url: '',
                },
                {
                    title: 'Hubspot Design Certification',
                    category: 'certificates',
                    description: 'The bearer of this certificate is hereby deemed proficient in crafting responsive, styled templates using HubSpot\'s design tools. The bearer has demonstrated that he/she can effectively apply template and style knowledge to HubSpot blog, page, landing page and email templates and is approved to sell these assets in the HubSpot Marketplace. Certification is active for 13 months after month issued.',
                    image_src: '/images/resume_themes/theme200/images/about-me/certification.png',
                    url: '',
                }
            ],
            education: [
                {
                    id: Math.random(),
                    institution_type: 'I\'m a paragraph. Click here to add your own text and edit me. It’s easy. Just click “Edit Text” or double click me to add your own content and make changes.',
                    university_name: 'California Institute Of Technology',
                    degree_title: 'M.Sc',
                    date_from: '12/2019',
                    date_to: '12/2020',
                    present: true
                },
                {
                    id: Math.random(),
                    institution_type: 'I\'m a paragraph. Click here to add your own text and edit me. It’s easy. Just click “Edit Text” or double click me to add your own content and make changes.',
                    university_name: 'California Institute Of Technology',
                    degree_title: 'M.Sc',
                    date_from: '12/2019',
                    date_to: '12/2020',
                    present: true
                },
                {
                    id: Math.random(),
                    institution_type: 'I\'m a paragraph. Click here to add your own text and edit me. It’s easy. Just click “Edit Text” or double click me to add your own content and make changes.',
                    university_name: 'California Institute Of Technology',
                    degree_title: 'M.Sc',
                    date_from: '12/2019',
                    date_to: '12/2020',
                    present: true
                }
            ],
            work_experience: [
                {
                    id: Math.random(), company_name: 'Google',
                    job_title: 'User interface designer',
                    description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ',
                    website: 'Google.com',
                    date_from: '2018',
                    date_to: '22',
                    present: true
                },
                {
                    id: Math.random(), company_name: 'Google',
                    job_title: 'User interface designer',
                    description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ',
                    website: 'Google.com',
                    date_from: '2018',
                    date_to: '2022',
                    present: false
                },
                {
                    id: Math.random(), company_name: 'Google',
                    job_title: 'User interface designer',
                    description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ',
                    website: 'Google.com',
                    date_from: '2018',
                    date_to: '2022',
                    present: false
                }
            ],
            projects: [
                {

                    id: Math.random(), name: 'Website development',
                    description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis',
                    link: 'website.com',
                    skills: 'HTML, CSS and JS',
                    software: 'Vue.js',
                    images: [
                        {
                            src: '/images/resume_themes/theme201/fitness_club-statics_schedule_2x 1.png',
                            is_main: true
                        },
                    ]
                },
                {

                    id: Math.random(), name: 'Website development',
                    description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis',
                    link: 'website.com',
                    skills: 'HTML, CSS and JS',
                    software: 'Vue.js',
                    images: [
                        {
                            src: '/images/resume_themes/theme201/dribbble_fitness_2x_2x 1.png',
                            is_main: true
                        },
                    ]
                },
                {

                    id: Math.random(), name: 'Website development',
                    description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis',
                    link: 'website.com',
                    skills: 'HTML, CSS and JS',
                    software: 'Vue.js',
                    images: [
                        {
                            src: '/images/resume_themes/theme201/fitness2_2x_2x 1.png',
                            is_main: true
                        },
                    ]
                },
                {

                    id: Math.random(), name: 'Website development',
                    description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis',
                    link: 'website.com',
                    skills: 'HTML, CSS and JS',
                    software: 'Vue.js',
                    images: [
                        {
                            src: '/images/resume_themes/theme201/fitness_club-statics_schedule_2x 1.png',
                            is_main: true
                        },
                    ]
                },
                {

                    id: Math.random(), name: 'Website development',
                    description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis',
                    link: 'website.com',
                    skills: 'HTML, CSS and JS',
                    software: 'Vue.js',
                    images: [
                        {
                            src: '/images/resume_themes/theme201/fitness2_2x_2x 1.png',
                            is_main: true
                        },
                    ]
                },
                {

                    id: Math.random(), name: 'Website development',
                    description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis',
                    link: 'website.com',
                    skills: 'HTML, CSS and JS',
                    software: 'Vue.js',
                    images: [
                        {
                            src: '/images/resume_themes/theme201/fitness_club-statics_schedule_2x 1.png',
                            is_main: true
                        },
                    ]
                },
            ],
            links: [
                {
                    id: Math.random(),
                    category: 'social_link',
                    link: 'https://instagram.com',
                    link_title: 'Instagram',
                    is_active: true
                },
                {
                    id: Math.random(),
                    category: 'social_link',
                    link: 'https://instagram.com',
                    link_title: 'Behance',
                    is_active: false
                },
                {
                    id: Math.random(),
                    category: 'social_link',
                    link: 'https://instagram.com',
                    link_title: 'Linkedin',
                    is_active: true
                }
            ]
        },
        themeUser: {},
        access_token: Vue.$cookies.get('access_token') || null
    },
    mutations: {
        setCurrentUser: (state, data) => {
            state.user = data;
        },
        updateThemeUser(state, themeUser) {
            state.themeUser = themeUser;
        },
        updateActivity(state) {
            axios.post('/api/user/update-last-activity',{user_id: state.user.id}).then((response) => {
                console.log(response.data);
            }).catch((error) => {
                console.log('Error - last activity');
            });
        },
        updateLinks(state, links){
            state.user.links = links;
            axios.post('/api/user/links/update-order', {links : links})
                .then( response => {
                    this.dispatch('flyingNotification');
                })
                .catch();
        },
        updateWorks(state, works){
            state.user.work_experience = works;
            axios.post('/api/user/work-experience/update-order', {works : works})
                .then( response => {
                    this.dispatch('flyingNotification');
                })
                .catch();
        },
        updateEducation(state, educations){
            state.user.education = educations;
            axios.post('/api/user/education/update-order', {works : educations})
                .then( response => {
                    this.dispatch('flyingNotification');
                })
                .catch();
        },
        showFullScreenNotification: (state, data) => {
            let modal = $('#fullScreenNotificationModal');

            // change to needed content
            let notificationText = $('#notificationText');
            let notificationIconSrc = $('#notificationIconSrc');
            data.message ? notificationText.text(data.message) : notificationText.text('Data saved successfully');
            data.iconSrc ? notificationIconSrc.prop('src', data.iconSrc) : notificationIconSrc.prop('src', '/images/resume_builder/tick.svg');

            // toggle modal
            modal.modal('show');
            modal.css('display', 'flex');
            setTimeout(() => {
                modal.modal('hide')
            }, 2000);

            store.commit('updateActivity');
        },
        showFlyingNotification: (state, data) => {
            let notificationElement = $('#flyingNotification');

            let notificationText = $('#flyingNotificationText');
            let notificationIconSrc = $('#flyingNotificationIconSrc');
            data.message ? notificationText.text(data.message) : notificationText.text('Saved');
            data.iconSrc ? notificationIconSrc.prop('src', data.iconSrc) : notificationIconSrc.prop('src', '/images/resume_builder/tick.svg');

            if (notificationElement.is(':visible')) {
                return;
            }
            notificationElement.slideToggle('slow');
            setTimeout(() => {
                notificationElement.slideToggle('slow');
            }, 2000);

            store.commit('updateActivity');

        },
        showFlyingNotificationDelete: (state, data) => {
            let notificationElement = $('#flyingNotificationDelete');
            if (notificationElement.is(':visible')) {
                return;
            }
            notificationElement.slideToggle('slow');
            setTimeout(() => {
                notificationElement.slideToggle('slow');
            }, 2000);

            store.commit('updateActivity');
        }

    },
    actions: {
        setCurrentUser: (store,payload = {}) => {
            if(payload.id){
                store.commit('setCurrentUser', payload);
            }else{
                let param = '';
                if(store.state.user.id !== undefined){
                    param = '?user_id=' + store.state.user.id;
                }
                axios.get('/api/user' + param).then((response) => {
                    store.commit('setCurrentUser', response.data);
                }).catch((error) => {
                    // if unauthorized : logout user [it means the cookie has been deleted or changed]
                    if (error.response.status === 401) {
                        store.dispatch('logoutUnauthorizedUser');
                    }
                });
            }
        },
        logoutUnauthorizedUser() {
            axios.post('/logout').then((response) => {
                    // remove access token from cookies:
                    if (Vue.$cookies.isKey('access_token')) {
                        Vue.$cookies.remove('access_token');
                    }
                    window.location.href = '/login';
                }
            )
        },
        fullScreenNotification(store, payload = {}) {
            store.commit('showFullScreenNotification', payload);
        },
        flyingNotification(store, payload = {}) {
            store.commit('showFlyingNotification', payload);
        },
        flyingNotificationDelete(store, payload = {}) {
            store.commit('showFlyingNotificationDelete', payload);
        },
        updateThemeUser(store, themeUser) {
            store.commit('updateThemeUser', themeUser);
        },
        updateLastActivity(store) {
            store.commit('updateActivity');
        },
    }
});
