window.Vue = require('vue');

import Vuex from 'vuex';

Vue.use(Vuex);

// cookies:
import VueCookies from 'vue-cookies';

Vue.use(VueCookies);

export const store = new Vuex.Store({
  state: {
    user: {},
    dummyUser: {
      id: 'dummy',
      personal_info: {
        full_name: 'Beverly Andrews',
        first_name: 'Beverly',
        last_name: 'Andrews',
        email: 'beverly@andrews.com',
        profile_pic: '/images/resume_themes/theme200/images/about-me/men.png',
        designation: 'User interface designer',
        phone: '+990000000',
        location: 'London',
        date_of_birth: '2020-09-09',
        quote: 'anything here is a quote',
        overview: 'Cool overview is here',
        nationality: 'American',
        hometown: 'London',
        about:
          'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor.'
      },
      payment_methods: [
        {
          name: 'Stripe',
          link: 'https://stripe.com',
          is_active: true,
          is_primary: true,
          order: 1
        }
      ],
      languages: [
        {
          id: 6,
          label: 'Arabic',
          name: 'arabic'
        },
        {
          id: 8,
          label: 'English',
          name: 'english'
        }
      ],
      payment_info: [
        {
          salary: '10',
          salary_frequency: 'hourly',
          currency: 'usd',
          is_public: 1
        },
        {
          salary: '100',
          salary_frequency: 'weekly',
          currency: 'usd',
          is_public: 1
        },
        {
          salary: '1000',
          salary_frequency: 'monthly',
          currency: 'usd',
          is_public: 1
        },
        {
          salary: '10000',
          salary_frequency: 'yearly',
          currency: 'usd',
          is_public: 1
        }
      ],
      availability_info: [
        {
          available_hours: '40',
          available_hours_frequency: 'weekly',
          is_public: 1
        },
        {
          available_hours: '400',
          available_hours_frequency: 'monthly',
          is_public: 1
        },
        {
          available_hours: '4000',
          available_hours_frequency: 'yearly',
          is_public: 1
        }
      ],
      skills: [
        {
          id: Math.random(),
          title: 'photoshop',
          category: 'design',
          percentage: 90,
          is_public: 1
        },
        {
          id: Math.random(),
          title: 'phpstorm',
          category: 'software',
          percentage: 45,
          is_public: 1
        },
        {
          id: Math.random(),
          title: 'adobe illustrator',
          category: 'software',
          percentage: 50,
          is_public: 1
        },
        {
          id: Math.random(),
          title: 'java',
          category: 'programming_languages',
          percentage: 90,
          is_public: 1
        },
        {
          id: Math.random(),
          title: 'javascript',
          category: 'programming_languages',
          percentage: 65,
          is_public: 1
        }
      ],
      achievements: [
        {
          title: 'Hubspot Design Certification',
          category: 'certificates',
          description:
            "The bearer of this certificate is hereby deemed proficient in crafting responsive, styled templates using HubSpot's design tools. The bearer has demonstrated that he/she can effectively apply template and style knowledge to HubSpot blog, page, landing page and email templates and is approved to sell these assets in the HubSpot Marketplace. Certification is active for 13 months after month issued.",
          image_src: '/images/resume_themes/theme200/images/about-me/certification.png',
          url: '',
          is_public: 1
        },
        {
          title: 'Hubspot Design Certification',
          category: 'certificates',
          description:
            "The bearer of this certificate is hereby deemed proficient in crafting responsive, styled templates using HubSpot's design tools. The bearer has demonstrated that he/she can effectively apply template and style knowledge to HubSpot blog, page, landing page and email templates and is approved to sell these assets in the HubSpot Marketplace. Certification is active for 13 months after month issued.",
          image_src: '/images/resume_themes/theme200/images/about-me/certification.png',
          url: '',
          is_public: 1
        }
      ],
      education: [
        {
          id: Math.random(),
          institution_type: 'Paragraph',
          university_name: 'California Institute Of Technology',
          degree_title: 'M.Sc',
          date_from: '12/2019',
          date_to: '12/2020',
          present: true,
          is_public: 1
        },
        {
          id: Math.random(),
          institution_type: 'Paragraph',
          university_name: 'California Institute Of Technology',
          degree_title: 'M.Sc',
          date_from: '12/2019',
          date_to: '12/2020',
          present: true,
          is_public: 1
        },
        {
          id: Math.random(),
          institution_type: 'Paragraph',
          university_name: 'California Institute Of Technology',
          degree_title: 'M.Sc',
          date_from: '12/2019',
          date_to: '12/2020',
          present: true,
          is_public: 1
        }
      ],
      work_experience: [
        {
          id: Math.random(),
          company_name: 'Google',
          job_title: 'User interface designer',
          description:
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ',
          website: 'Google.com',
          date_from: '2018',
          date_to: '22',
          present: true,
          is_public: 1
        },
        {
          id: Math.random(),
          company_name: 'Google',
          job_title: 'User interface designer',
          description:
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ',
          website: 'Google.com',
          date_from: '2018',
          date_to: '2022',
          present: false,
          is_public: 1
        },
        {
          id: Math.random(),
          company_name: 'Google',
          job_title: 'User interface designer',
          description:
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ',
          website: 'Google.com',
          date_from: '2018',
          date_to: '2022',
          present: false,
          is_public: 1
        }
      ],
      preferences: [
        {
          title: 'hourly_rate',
          label: 'Hourly Rate',
          is_public: true
        },
        {
          title: 'weekly_availability',
          label: 'Weekly Availability',
          is_public: true
        },
        {
          title: 'hire_me',
          label: 'Hire Me',
          is_public: true
        },
        {
          title: 'chat',
          label: 'Chat',
          is_public: true
        },
        {
          title: 'pdf_download',
          label: 'Download PDF',
          is_public: true
        }
      ],
      projects: [
        {
          id: Math.random(),
          name: 'Website development',
          description:
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis',
          link: 'website.com',
          skills: 'HTML, CSS and JS',
          software: 'Vue.js',
          category: 'Development',
          images: [
            {
              src: '/images/resume_themes/theme201/fitness_club-statics_schedule_2x 1.png',
              is_main: true
            }
          ],
          is_public: 1
        },
        {
          id: Math.random(),
          name: 'Website development',
          description:
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis',
          link: 'website.com',
          skills: 'HTML, CSS and JS',
          software: 'Vue.js',
          category: 'Development',
          images: [
            {
              src: '/images/resume_themes/theme201/dribbble_fitness_2x_2x 1.png',
              is_main: true
            }
          ],
          is_public: 1
        },
        {
          id: Math.random(),
          name: 'Website development',
          description:
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis',
          link: 'website.com',
          skills: 'HTML, CSS and JS',
          software: 'Vue.js',
          category: 'Development',
          images: [
            {
              src: '/images/resume_themes/theme201/fitness2_2x_2x 1.png',
              is_main: true
            }
          ],
          is_public: 1
        },
        {
          id: Math.random(),
          name: 'Website development',
          description:
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis',
          link: 'website.com',
          skills: 'HTML, CSS and JS',
          software: 'Vue.js',
          category: 'Development',
          images: [
            {
              src: '/images/resume_themes/theme201/fitness_club-statics_schedule_2x 1.png',
              is_main: true
            }
          ],
          is_public: 1
        },
        {
          id: Math.random(),
          name: 'Website development',
          description:
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis',
          link: 'website.com',
          skills: 'HTML, CSS and JS',
          software: 'Vue.js',
          category: 'Development',
          images: [
            {
              src: '/images/resume_themes/theme201/fitness2_2x_2x 1.png',
              is_main: true
            }
          ],
          is_public: 1
        },
        {
          id: Math.random(),
          name: 'Website development',
          description:
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis',
          link: 'website.com',
          skills: 'HTML, CSS and JS',
          software: 'Vue.js',
          category: 'Development',
          images: [
            {
              src: '/images/resume_themes/theme201/fitness_club-statics_schedule_2x 1.png',
              is_main: true
            }
          ],
          is_public: 1
        }
      ],
      links: [
        {
          id: Math.random(),
          category: 'social_link',
          link: 'https://instagram.com',
          link_title: 'Instagram',
          is_active: true,
          is_public: 1
        },
        {
          id: Math.random(),
          category: 'social_link',
          link: 'https://behance.net',
          link_title: 'Behance',
          is_active: true,
          is_public: 1
        },
        {
          id: Math.random(),
          category: 'social_link',
          link: 'https://linkedin.com',
          link_title: 'Linkedin',
          is_active: true,
          is_public: 1
        },
        {
          id: Math.random(),
          category: 'social_link',
          link: 'https://twitter.com',
          link_title: 'Twitter',
          is_active: true,
          is_public: 1
        }
      ],
      references: [
        {
          id: '1',
          type: 'Reference',
          name: 'John Doe',
          title: 'UX DESINGER',
          phone: '+212634842495',
          email: 'john@doe.com',
          company: '123WORKEFORCE',
          address: 'London, UK',
          url: 'https://civ.ie',
          reference_text: 'John Doe, One of the greatest UX designers of all time.',
          notes: null,
          image: '/images/portfolio2.png',
          order: '1',
          is_public: '1',
          user_id: '2',
          created_at: '2020-06-23 09:34:43',
          updated_at: '2020-07-20 09:12:51'
        },
        {
          id: '1',
          type: 'Reference',
          name: 'John Doe',
          title: 'UX DESINGER',
          phone: '+212634842495',
          email: 'john@doe.com',
          company: '123WORKEFORCE',
          address: 'London, UK',
          url: 'https://civ.ie',
          reference_text: 'John Doe, One of the greatest UX designers of all time.',
          notes: null,
          image: '/images/portfolio2.png',
          order: '1',
          is_public: '1',
          user_id: '2',
          created_at: '2020-06-23 09:34:43',
          updated_at: '2020-07-20 09:12:51'
        },
        {
          id: '1',
          type: 'Reference',
          name: 'John Doe',
          title: 'UX DESINGER',
          phone: '+212634842495',
          email: 'john@doe.com',
          company: '123WORKEFORCE',
          address: 'London, UK',
          url: 'https://civ.ie',
          reference_text: 'John Doe, One of the greatest UX designers of all time.',
          notes: null,
          image: '/images/portfolio2.png',
          order: '1',
          is_public: '1',
          user_id: '2',
          created_at: '2020-06-23 09:34:43',
          updated_at: '2020-07-20 09:12:51'
        }
      ],
      hobbies: [
        {
          title: 'Football',
          category: 'Sports',
          order: '1',
          is_public: '1',
          user_id: '2',
          created_at: '2020-06-23 09:34:43',
          updated_at: '2020-07-20 09:12:51'
        },
        {
          title: 'Football',
          category: 'Sports',
          order: '1',
          is_public: '1',
          user_id: '2',
          created_at: '2020-06-23 09:34:43',
          updated_at: '2020-07-20 09:12:51'
        },
        {
          title: 'Football',
          category: 'Sports',
          order: '1',
          is_public: '1',
          user_id: '2',
          created_at: '2020-06-23 09:34:43',
          updated_at: '2020-07-20 09:12:51'
        }
      ],
      media: [
        {
          id: '1',
          type: 'audio',
          transcript: 'John Doe, One of the greatest UX designers of all time.',
          title: 'John Doe',
          resume_link_id: '4',
          url: 'https://file-examples-com.github.io/uploads/2017/11/file_example_MP3_700KB.mp3',
          order: '1',
          is_public: '1',
          user_id: '2',
          created_at: '2020-06-23 09:34:43',
          updated_at: '2020-07-20 09:12:51'
        },
        {
          id: '2',
          type: 'video',
          transcript: 'John Doe, One of the greatest UX designers of all time.',
          title: 'John Doe',
          resume_link_id: '4',
          url: 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4',
          media_preview: '/images/video-holder.svg',
          order: '1',
          is_public: '1',
          user_id: '2',
          created_at: '2020-06-23 09:34:43',
          updated_at: '2020-07-20 09:12:51'
        },
        {
          id: '3',
          type: 'audio',
          transcript: 'John Doe, One of the greatest UX designers of all time.',
          title: 'John Doe',
          resume_link_id: '4',
          url: 'https://file-examples-com.github.io/uploads/2017/11/file_example_MP3_700KB.mp3',
          order: '1',
          is_public: '1',
          user_id: '2',
          created_at: '2020-06-23 09:34:43',
          updated_at: '2020-07-20 09:12:51'
        },
        {
          id: '4',
          type: 'video',
          transcript: 'John Doe, One of the greatest UX designers of all time.',
          title: 'John Doe',
          resume_link_id: '4',
          url: 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4',
          media_preview: '/images/video-holder.svg',
          order: '1',
          is_public: '1',
          user_id: '2',
          created_at: '2020-06-23 09:34:43',
          updated_at: '2020-07-20 09:12:51'
        },
        {
          id: '5',
          type: 'audio',
          transcript: 'John Doe, One of the greatest UX designers of all time.',
          title: 'John Doe',
          resume_link_id: '4',
          url: 'https://file-examples-com.github.io/uploads/2017/11/file_example_MP3_700KB.mp3',
          order: '1',
          is_public: '1',
          user_id: '2',
          created_at: '2020-06-23 09:34:43',
          updated_at: '2020-07-20 09:12:51'
        },
        {
          id: '26',
          type: 'video',
          transcript: 'John Doe, One of the greatest UX designers of all time.',
          title: 'John Doe',
          resume_link_id: '4',
          url: 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4',
          media_preview: '/images/video-holder.svg',
          order: '1',
          is_public: '1',
          user_id: '2',
          created_at: '2020-06-23 09:34:43',
          updated_at: '2020-07-20 09:12:51'
        }
      ],
      tabs: [
        {
          title: 'work_experience',
          label: 'Work Experience',
          is_public: true,
          order: 1
        },
        {
          title: 'education',
          label: 'Education',
          is_public: true,
          order: 1
        },
        {
          title: 'about_me',
          label: 'About Me',
          is_public: true,
          order: 1
        },
        {
          title: 'portfolio',
          label: 'Portfolio',
          is_public: true,
          order: 1
        },
        {
          title: 'skills',
          label: 'Skills',
          is_public: true,
          order: 1
        },
        {
          title: 'media',
          label: 'Media',
          is_public: true,
          order: 1
        },
        {
          title: 'hobbies',
          label: 'Hobbies',
          is_public: true,
          order: 1
        },
        {
          title: 'references',
          label: 'References',
          is_public: true,
          order: 1
        },
        {
          title: 'achievements',
          label: 'Achievements',
          is_public: true,
          order: 1
        },
        {
          title: 'links',
          label: 'Links',
          is_public: true,
          order: 1
        },
        {
          title: 'pay_availability',
          label: 'Pay Availability',
          is_public: true,
          order: 1
        }
      ]
    },
    themeUser: {},
    currentGlobalTab: '',
    access_token: Vue.$cookies.get('access_token') || null,
    defaultTabs: [
      'work_experience',
      'education',
      'about_me',
      'portfolio',
      'skills',
      'media',
      'hobbies',
      'references',
      'achievements'
    ],
    excludedTabs: [
      'structure',
      'imports',
      'manager',
      'themes',
      'links',
      'pay_availability',
      'profile' // main tab | can not be hidden
    ],
    savingStatus: 'normal',
    justSaved: false,
    updateActivityTimer: false
  },
  mutations: {
    setCurrentUser: (state, data) => {
      state.user = data;
    },
    updateThemeUser(state, themeUser) {
      state.themeUser = themeUser;
    },

    // activity
    updateActivity(state) {
      state.savingStatus = 'saving';
      axios
        .post('/api/user/update-last-activity', { user_id: state.user.id })
        .then(response => {
          state.savingStatus = 'saved';
          setTimeout(() => {
            state.savingStatus = 'normal';
            state.justSaved = true;
          }, 2000);


          if(state.user.username === '123workforce'){
            axios.get('/api/search/send-invalidate-cache').then( () => { console.log('cache invalidated successfully')});
          }

          if (!state.updateActivityTimer) {
            state.updateActivityTimer = setInterval(() => {
              state.justSaved = false;
              axios.get('/api/user/last-activity/' + state.user.id).then(response => {
                state.user.last_activity = response.data.last_activity;
              });
            }, 60000);
          }
        })
        .catch(error => {
          state.savingStatus = 'error';
          setTimeout(() => {
            state.savingStatus = 'normal';
          }, 1500);
          console.log('Error - last activity');
        });

      // reload the iframe of exists:
      let updateIframeHolder = $('#updateIframe');
      if (updateIframeHolder.length) {
        updateIframeHolder.click();
      }
    },
    // theme tab globally
    updateThemeTabGlobally(state, tab_title) {
      state.currentGlobalTab = tab_title;
    },

    // updating order
    updateLinks(state, links) {
      state.user.links = links;
      axios
        .post('/api/user/links/update-order', { links: links })
        .then(response => {
          this.dispatch('flyingNotification');
        })
        .catch();
    },
    updateResumeLinks(state, resume_links) {
      state.user.resume_links = resume_links;
      axios
        .post('/api/user/resume-links/update-order', { resume_links: resume_links })
        .then(response => {
          this.dispatch('flyingNotification');
        })
        .catch();
    },
    updateReferences(state, references) {
      state.user.references = references;
      axios
        .post('/api/user/references/update-order', { references: references })
        .then(() => {
          this.dispatch('flyingNotification');
        })
        .catch();
    },
    updateTabs(state, tabs) {
      state.user.tabs = tabs;
      axios
        .post('/api/user/tabs/update-order', { tabs: tabs })
        .then(response => {
          this.dispatch('flyingNotification');
        })
        .catch();
    },
    updateDownloads(state, downloads) {
      state.user.downloads = downloads;
      axios
        .post('/api/user/downloads/update-order', { tabs: downloads })
        .then(response => {
          this.dispatch('flyingNotification');
        })
        .catch();
    },
    updateWorks(state, works) {
      state.user.work_experience = works;
      axios
        .post('/api/user/work-experience/update-order', { works: works })
        .then(response => {
          this.dispatch('flyingNotification');
        })
        .catch();
    },
    updateEducation(state, educations) {
      state.user.education = educations;
      axios
        .post('/api/user/education/update-order', { educations: educations })
        .then(response => {
          this.dispatch('flyingNotification');
        })
        .catch();
    },
    updateProjects(state, projects) {
      state.user.projects = projects;
      axios
        .post('/api/user/projects/update-order', { projects: projects })
        .then(response => {
          this.dispatch('flyingNotification');
        })
        .catch();
    },
    updateImports(state, imports) {
      state.user.imports = imports;
      axios
        .post('/api/user/imports/update-order', { imports: imports })
        .then(response => {
          this.dispatch('flyingNotification');
        })
        .catch();
    },
    updateMedia(state, medias) {
      state.user.media = medias;
      axios
        .post('/api/user/media/update-order', { medias: medias })
        .then(response => {
          this.dispatch('flyingNotification');
        })
        .catch();
    },
    updateSkills(state, skills) {
      state.user.skills = skills;
      axios
        .post('/api/user/skills/update-order', { skills: skills })
        .then(response => {
          this.dispatch('flyingNotification');
        })
        .catch();
    },
    updatePaymentMethods(state, paymentMethods) {
      state.user.payment_methods = paymentMethods;
      axios
        .post('/api/user/payment-methods/update-order', { paymentMethods: paymentMethods })
        .then(() => {
          this.dispatch('flyingNotification');
        })
        .catch();
    },
    updateHobbies(state, hobbies) {
      state.user.hobbies = hobbies;
      axios
        .post('/api/user/hobbies/update-order', { hobbies: hobbies })
        .then(response => {
          this.dispatch('flyingNotification');
        })
        .catch();
    },
    updateAchievements(state, achievements) {
      state.user.achievements = achievements;
      axios
        .post('/api/user/achievements/update-order', { achievements: achievements })
        .then(response => {
          this.dispatch('flyingNotification');
        })
        .catch();
    },

    // system notifications
    showFlyingNotification: (state, data) => {
      if (data.message === 'Error') {
        state.savingStatus = 'error';
      } else {
        store.commit('updateActivity');
      }
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
    setCurrentUser: (store, payload = {}) => {
      if (payload.id) {
        store.commit('setCurrentUser', payload);
      } else {
        let param = '';
        if (store.state.user.id !== undefined) {
          param = '?user_id=' + store.state.user.id;
        }
        axios
          .get('/api/user' + param)
          .then(response => {
            store.commit('setCurrentUser', response.data);
          })
          .catch(error => {
            // if unauthorized : logout user [it means the cookie has been deleted or changed]
            if (error.response.status === 401) {
              store.dispatch('logoutUnauthorizedUser');
            }
          });
      }
    },
    logoutUnauthorizedUser() {
      axios.post('/logout').then(response => {
        // remove access token from cookies:
        if (Vue.$cookies.isKey('access_token')) {
          Vue.$cookies.remove('access_token');
        }
        window.location.href = '/login';
      });
    },

    // notifications action
    flyingNotification(store, payload = {}) {
      store.commit('showFlyingNotification', payload);
    },
    flyingNotificationDelete(store, payload = {}) {
      store.commit('showFlyingNotificationDelete', payload);
    },

    // updates
    updateThemeUser(store, themeUser) {
      store.commit('updateThemeUser', themeUser);
    },
    updateLastActivity(store) {
      store.commit('updateActivity');
    },

    // update global theme tab:
    updateThemeTabGlobally(store, tab_title) {
      store.commit('updateThemeTabGlobally', tab_title);
    }
  }
});
