window.Vue = require('vue');

import Vuex from 'vuex'

Vue.use(Vuex);

// cookies:
import VueCookies from 'vue-cookies'

Vue.use(VueCookies);

export const store = new Vuex.Store({
    state: {
        user: {},
        dummyUser:{
            personalInfo:{
                full_name:'Beverly Andrews',
                email:'beverly@andrews.com',
                profile_pic:'/images/resume_themes/theme3/person.png',
                designation:'User interface designer',
                phone:'+990000000',
                location:'London',
                about:'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            },
            paymentInfo:{
                salary:'10',
                salary_frequency:'Hourly',
                available_hours:'40',
                available_hours_frequency:'Weekly'
            },
            skills: [
                {
                    title:'photoshop',
                    category:'design',
                    percentage:'90',
                }
            ],
            achievements: [
                {
                    title:'',
                    category:'',
                    description:'',
                    image_src:'',
                    url:'',
                }
            ],
            educations: [
                {
                    institution_type:'Institute',
                    university_name:'California Institute Of Technology',
                    degree_title:'M.Sc',
                    date_from:'12/2019',
                    date_to:'12/2020',
                    present:true
                }
            ],
            works: [
                {
                    company_name:'Google',
                    job_title:'User interface designer',
                    description:'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ',
                    website:'Google.com',
                    date_from:'12/2018',
                    date_to:'12/2022',
                    present: false
                }
            ],
            projects: [
                {
                    name:'Website development',
                    description:'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis',
                    link:'website.com',
                    skills:'HTML, CSS and JS',
                    software:'Vue.js',
                    images:[
                        {
                            src:'/images/resume_themes/theme201/fitness_club-statics_schedule_2x 1.png',
                            is_main: true
                        }
                    ]
                }
            ],
            links: [
                {
                    category:'social_link',
                    link:'https://instagram.com',
                    link_title:'Instagram',
                    is_active:true
                }
            ]
        },
        themeUser: {},
        access_token: Vue.$cookies.get('access_token') || null
    },
    mutations: {
        getCurrentUser: (state, data) => {
            state.user = data;
        },
        updateThemeUser(state, themeUser) {
            state.themeUser = themeUser;
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
        }

    },
    actions: {
        getCurrentUser: (store) => {
            axios.get('/api/user').then((response) => {
                store.commit('getCurrentUser', response.data);
            }).catch((error) => {
                // if unauthorized : logout user [it means the cookie has been deleted or changed]
                console.log('token is : ' + store.state.access_token);
                if (error.response.status === 401) {
                    store.dispatch('logoutUnauthorizedUser');
                }
            });
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
        }
    }
});
