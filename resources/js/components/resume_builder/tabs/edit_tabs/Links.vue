<template>
    <div id="linksSection" data-app>

        <!-- Tabs -->
        <v-tabs class="resume-builder__tab-bar" hide-slider>
            <v-tab class="resume-builder__tab tabName" v-for="tab in tabs" :key="tab">
                {{tab}}
            </v-tab>
        </v-tabs>

        <!-- Content -->

        <div class="links-content" v-if="links">

            <div class="link-inputs-row">
                <v-select
                        class="resume-builder__input civie-select"
                        outlined
                        placeholder="Github"
                        :items="professionalLinksCategories"
                        label="Name"
                        color="#001CE2"
                >
                    <button
                            class="dropdown-icon icon"
                            slot="append"
                    >
                        <svg-vue
                                :icon="`dropdown-caret`"
                        ></svg-vue>
                    </button>
                </v-select>

                <v-text-field
                        class="resume-builder__input civie-input"
                        outlined
                        color="#001CE2"
                        :class="{'resume-builder__input--disabled': false}"
                        :disabled="false"
                        label="URL"
                >
                </v-text-field>

                <v-btn class="resume-builder__btn civie-btn filled" raised>Add New</v-btn>

            </div>

            <div class="links-items">
                <div class="link-item" v-for="link in links" :key="link.id" v-show="link.link">
                    <div class="link-data">
                        <div class="mover">
                            <img src="/images/new_resume_builder/three-dots.svg" alt="mover icon">
                        </div>
                        <div class="link-text">
                            <img src="/images/resume_builder/professional_icons/github-1.svg" alt="link icon">
                            {{link.link}}
                        </div>
                    </div>
                    <div class="action-btns">
                        <div class="resume-builder__action-buttons-container">
                            <v-btn class="btn-icon civie-btn" depressed>
                                <svg-vue icon="eye-icon" class="icon"></svg-vue>
                            </v-btn>
                            <v-btn class="btn-icon civie-btn" depressed>
                                <svg-vue icon="edit-icon" class="icon"></svg-vue>
                            </v-btn>

                            <v-btn class="btn-icon civie-btn" depressed>
                                <svg-vue icon="trash-delete-icon" class="icon"></svg-vue>
                            </v-btn>
                        </div>
                    </div>
                </div>
            </div>


        </div>

    </div>
</template>

<script>
    import {moveTabsHelper} from '../../helpers/tab-animations';

    export default {
        data: () => ({
            tabs: [
                'professional',
                'social',
                'contact'
            ],
            professionalLinksCategories:[
                'GitHub',
                'LinkedIn',
                'Behance',
                'Dribbble',
                'Website',
                'PDF',
            ],
            activeTab: '',
            /** Add item list flow */

            socialLinks: [],
            professionalLinks: [],
            contactLinks: [],

            errors: {},

            // for link input select
            categoryOptions: [
                {
                    title: 'Linkedin',
                    value: 'Linkedin',
                    baseUrl: 'https://www.linkedin.com/in/'
                },
                {
                    title: 'Facebook',
                    value: 'Facebook',
                    baseUrl: 'https://www.facebook.com/'
                },
                {
                    title: 'Instagram',
                    value: 'Instagram',
                    baseUrl: 'https://www.instagram.com/'
                },
                {
                    title: 'Behance',
                    value: 'Behance',
                    baseUrl: 'https://www.behance.net/'
                },
                {
                    title: 'Dribbble',
                    value: 'Dribbble',
                    baseUrl: 'https://dribbble.com/'
                },
                {
                    title: 'GitHub',
                    value: 'GitHub',
                    baseUrl: 'https://github.com/'
                },
                {
                    title: 'Twitter',
                    value: 'Twitter',
                    baseUrl: 'https://twitter.com/'
                },
            ],

        }),
        methods: {
            toggleLink(link){
                link.is_active = !link.is_active;
                axios.put('/api/user/links', link)
                    .then((response) => {
                        this.$store.dispatch('flyingNotification');
                        this.closeOptionsBtn();
                    })
                    .catch((error) => {
                        if (typeof error.response.data === 'object') {
                            this.errors.edit = error.response.data.errors;
                        } else {
                            this.errors.edit = 'Something went wrong. Please try again.';
                        }
                        this.$store.dispatch('flyingNotification', {
                            message: 'Error',
                            iconSrc: '/images/resume_builder/error.png'
                        });
                    });
            },

            addPrefix(url){
                var prefix = 'http://';
                if (url.substr(0, prefix.length) !== prefix)
                {
                    url = prefix + url;
                }
                return url;
            },

            selectCategory(category) {
                this.currentBaseUrl = category.baseUrl;
                this.newSocialLink.link_title = category.title ;
                this.showCategoryOptions = false;
            },

            setActiveTab(tab) {
                this.activeTab = tab
            },

            deleteLink(link) {
                if (!confirm('Do you want to delete this link [' + link.link + '] ?')) {
                    return;
                }
                axios.delete('/api/user/links/' + link.id)
                    .then((response) => {
                        this.$store.dispatch('flyingNotificationDelete');
                        this.links.forEach((link, index) => {
                            if (link.id === response.data.data.id) {
                                this.links.splice(index, 1);
                            }
                        });

                        this.closeOptionsBtn();
                    })
                    .catch(error => {
                        console.log(error);
                    })
            },

            saveLink(link, base = '') {
                if(link.link.length){
                    link.link = base + link.link;
                }
                if (!this.validURL(link.link)) {
                    this.errors = {link: 'Not a valid link!'};
                    return;
                }

                if(link.category === 'social_link' && link.link_title.length < 1){
                    this.errors = {link: 'Please choose social site!'};
                    return;
                }

                link.user_id = this.$store.state.user.id
                axios.post('/api/user/links', link)
                    .then((response) => {
                        let addedLink = response.data.data;
                        this.links.push(addedLink);
                        this.clearLink();
                        // changes saved pop-up
                        this.$store.dispatch('fullScreenNotification');
                    })
                    .catch((error) => {
                        if (typeof error.response.data === 'object') {
                            this.errors = error.response.data.errors;
                        } else {
                            this.errors = 'Something went wrong. Please try again.';
                        }
                        this.$store.dispatch('flyingNotification', {
                            message: 'Error',
                            iconSrc: '/images/resume_builder/error.png'
                        });
                    });
            },


            validURL(str) {
                var pattern = new RegExp('^(https?:\\/\\/)?' + // protocol
                    '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|' + // domain name
                    '((\\d{1,3}\\.){3}\\d{1,3}))' + // OR ip (v4) address
                    '(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*' + // port and path
                    '(\\?[;&a-z\\d%_.~+=-]*)?' + // query string
                    '(\\#[-a-z\\d_]*)?$', 'i'); // fragment locator
                return !!pattern.test(str);
            }

        },

        computed: {
            links() {
                return this.$store.state.user.links;
            }
        },
        mounted() {

        }
    }
</script>

<style lang="scss" scoped>
    @import '../../../../../sass/media-queries';

    $mainBlue: #001CE2;


    #linksSection{
        .links-content{
            min-height:323px;
            background: #fff;
            box-shadow: 0px 5px 100px rgba(0, 16, 131, 0.1);
            padding:50px;
            margin-bottom:70px;
        }

        .tabName{
            text-transform: capitalize;
        }

        .link-inputs-row{
            display:flex;

            .civie-select{
                max-width:184px;
                margin-right:30px;
            }

            .civie-input{
                max-width:350px;
                margin-right:30px;
            }

            .civie-btn{
                min-height:54px;
            }
        }

        .links-items{
            .link-item{
                width: 100%;
                height: 50px;
                display: flex;
                margin-bottom: 30px;
                align-items: center;
                justify-content: space-between;
                background: white;
                box-shadow: 0 5px 20px rgba(0, 16, 131, 0.15);

                .link-data{
                    display: flex;
                    height: 50px;
                    .mover{
                        width:50px;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        border-right:1px solid #E6E8FC;
                        img{
                            width: 12px;
                            height: 16px;
                        }

                        &:hover{
                            cursor: grab;
                        }
                    }

                    .link-text{
                        display: flex;
                        align-items: center;
                        margin-left: 18px;
                        font-size: 18px;
                        line-height: 25px;
                        color: #888DB1;
                        img{
                            width:45px;
                            height:auto;
                        }
                    }
                }
            }

        }
    }

    .error {
        color: red;
        padding-top: 5px;
        padding-left: 3px;
    }

</style>
