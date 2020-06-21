<template>
    <v-app>
        <v-content  style="background-color:rgb(245, 242, 237);background-image: unset;background-size: cover;min-height: 100vh" v-resize="onResize">
            <v-container fluid class="ma-0 pa-0">

                <payment :data="dialog"></payment>
                <payment_details :data="dialog2"></payment_details>
                <payment_success :data="dialog3"></payment_success>
                <v-row v-show="windowSize > 660" style="background-color:#FDDB69;" class="pb-10" dense no-gutters>
                    <v-col class="d-flex" cols="12" md="7" sm="8">
                        <div class="hidden-sm-and-up">
                            <v-card class="card_image mb-2 pb-8" style="border-radius: 15px;" flat>
                                <v-img
                                    class="profile_image ma-0 pa-0"
                                    src="/images/resume_themes/theme1101/profile.jpg"
                                    @click.stop="drawer = !drawer"
                                />
                            </v-card>
                            <button @click="dialog = true" style="margin-left: 30px;width: 110px"
                                    class="social_icon1 hidden-md-and-up">
                                <message style="display: inline-block;height: 16px;width: 16px" class="mr-2"></message>
                                <span style="color: white;font-weight: bold;font-size: 90%;display: inline-block"> Hire me</span>
                            </button>
                        </div>
                        <div class="hidden-xs-only">
                            <v-card class="card_image mb-2 pb-8" style="border-radius: 15px;" flat>
                                <v-img
                                    class="profile_image ma-0 pa-0"
                                    src="/images/resume_themes/theme1101/profile.jpg"

                                />
                            </v-card>
                            <button @click="dialog = true" style="margin-left: 30px;width: 110px"
                                    class="social_icon1 hidden-md-and-up">
                                <message style="display: inline-block;height: 16px;width: 16px" class="mr-2"></message>
                                <span style="color: white;font-weight: bold;font-size: 90%;display: inline-block"> Hire me</span>
                            </button>
                        </div>
                        <div class="about">
                            <div class="name">Samuel Raita</div>
                            <div class="professions">Backend Developer</div>
                            <div class="description text-justify"> paragraph is a series of
                                related sentences developing a central idea,
                                called the topic. paragraph is a series of
                                related sentences developing a central idea,
                            </div>
                            <div class="main" style="display: inline">
                                <div class="rate">Hour Rate</div>
                                <div class="rate1">$20</div>
                                <div class="avail">weekly Availability</div>
                                <div class="rate1">250</div>
                            </div>

                        </div>

                    </v-col>
                    <v-col class="d-flex " cols="12" md="5" sm="4">
                        <v-spacer>
                        </v-spacer>

                        <div class="social">
                            <button
                                class="social_icon mr-4">
                                <twitter style="height: 16px;width: 16px"></twitter>
                            </button>
                            <button class="social_icon mr-4">

                                <facebook style="height: 16px;width: 16px"></facebook>

                            </button>
                            <button class="social_icon mr-md-3">
                                <insta style="height: 16px;width: 16px"></insta>
                            </button>
                            <button @click="dialog = true" class="social_icon1 hidden-sm-and-down">
                                <message style="display: inline-block;height: 16px;width: 16px" class="mr-2"></message>
                                <span style="color: white;font-weight: bold;font-size: 90%;display: inline-block"> Hire me</span>
                            </button>
                        </div>

                    </v-col>

                </v-row>
                <v-row v-show="windowSize < 659" style="background-color:#FDDB69;" class="pb-10"
                       dense no-gutters>
                    <v-col class="d-flex" cols="12">

                        <v-card class="card_image mb-2 pb-8" style="border-radius: 10px;" flat>
                            <v-img
                                class="profile_image ma-0 pa-0"
                                src="/images/resume_themes/theme1101/profile.jpg"
                                @click.stop="drawer = !drawer"
                            />
                        </v-card>


                        <div class="about">
                            <p class="name">Samuel Raita</p>
                            <p class="professions">Backend Developer</p>

                        </div>
                        <v-spacer>
                        </v-spacer>
                        <button @click="dialog = true" class="social_icon">
                            <message style="display: inline-block;height: 16px;width: 16px" class="mr-2"></message>
                            <span
                                style="color: white;font-weight: bold;font-size: 90%;display: inline-block"> Hire me</span>
                        </button>

                    </v-col>


                </v-row>

                <div class="mb-12" style="border-radius: 30px 30px 0px 0px;background-color: #F5F2ED;margin-top: -20px">
                    <div class="body_element">
                        <v-tabs

                            background-color="#F5F2ED"
                            class="tabs m-0 pl-0"
                            dark
                            flat
                            height="42"
                            v-model="tab"
                            center-active
                            grow
                            slider-color="#052137"
                            slider-size="4"
                            color="color: #B3B3B3"


                        >
                            <v-tab class="tab_content">
                                <portfolio_icon class="icon_color mr-md-5 pr-sm-2"></portfolio_icon>
                                <div v-if="tab==0" class="tab_small hidden-md-and-up">Portfolio</div>
                                <div class="tab_small hidden-sm-and-down">Portfolio</div>

                            </v-tab>

                            <v-tab class="tab_content">
                                <education_icon class="icon_color mr-md-5 pr-sm-2"></education_icon>
                                <div v-if="tab==1" class="tab_small hidden-md-and-up">Education</div>
                                <div class="tab_small hidden-sm-and-down">Education</div>

                            </v-tab>
                            <v-tab class="tab_content">

                                <experience_icon class="icon_color mr-md-5 pr-sm-2"></experience_icon>

                                <div v-if="tab==2" class="tab_small hidden-md-and-up"> Experience</div>
                                <div class="tab_small hidden-sm-and-down"> Experience</div>

                            </v-tab>
                            <v-tab class="tab_content">
                                <skills_icon color="red" class="icon_color mr-md-5 pr-sm-2"></skills_icon>

                                <div v-if="tab==3" class="tab_small hidden-md-and-up">skills</div>
                                <div class="tab_small hidden-sm-and-down">skills</div>

                            </v-tab>
                            <v-tab class="tab_content">
                                <media_icon class="icon_color mr-md-5 pr-sm-2"></media_icon>
                                <div v-if="tab==4" class="tab_small hidden-md-and-up">Media</div>
                                <div class="tab_small hidden-sm-and-down ">Media</div>

                            </v-tab>

                            <v-tab class="tab_content">
                                <about_icon class="icon_color mr-md-5 pr-sm-2"></about_icon>
                                <div v-if="tab==5" class="tab_small hidden-md-and-up"> About me</div>
                                <div class="tab_small hidden-sm-and-down"> About me</div>

                            </v-tab>

                        </v-tabs>
                    </div>
                    <div class="body_about">
                        <v-tabs-items style="background-color:#F5F2ED" v-model="tab">
                            <v-tab-item
                                transition="fade-transition"
                                reverse-transition="fade-transition"
                                class="tab_items">
                                <portfolio></portfolio>
                            </v-tab-item>
                            <v-tab-item
                                transition="fade-transition"
                                reverse-transition="fade-transition"
                            >
                                <education></education>
                            </v-tab-item>
                            <v-tab-item
                                transition="fade-transition"
                                reverse-transition="fade-transition"
                            >
                                <experience></experience>
                            </v-tab-item>
                            <v-tab-item
                                transition="fade-transition"
                                reverse-transition="fade-transition"
                            >
                                <skills></skills>
                            </v-tab-item>
                            <v-tab-item
                                transition="fade-transition"
                                reverse-transition="fade-transition"
                            >
                                <media></media>
                            </v-tab-item>
                            <v-tab-item
                                transition="fade-transition"
                                reverse-transition="fade-transition"
                            >
                                <about></about>
                            </v-tab-item>
                        </v-tabs-items>
                    </div>
                </div>

                <v-navigation-drawer
                    v-model="drawer"
                    absolute
                    temporary
                    style="width: 80%;background-color:#F5F2ED"
                >
                    <navigation></navigation>
                </v-navigation-drawer>

            </v-container>
        </v-content>
    </v-app>
</template>
<script>
    import facebook from './icons/facebook.vue'
    import insta from './icons/insta.vue'
    import twitter from './icons/twitter.vue'
    import message from './icons/message.vue'
    import portfolio_icon from './icons/portfolio.vue'
    import skills_icon from './icons/skills.vue'
    import experience_icon from './icons/experience.vue'
    import media_icon from './icons/media.vue'
    import about_icon from './icons/about.vue'
    import education_icon from './icons/education.vue'
    import contact_message from './icons/contact_nessage.vue'
    import link from "./icons/link.vue";
    import phone from "./icons/phone.vue"



    import portfolio from './portfolio.vue'
    import skills from './skills.vue'
    import experience from './experience.vue'
    import media from './media.vue'
    import about from './about.vue'
    import navigation from './navigation.vue'
    import education from './education.vue'
    import payment from "./payment.vue";
    import payment_details from "./payment_details.vue";
    import payment_success from "./payment success.vue"


    export default {
        components: {
            facebook,
            insta,
            twitter,
            message,
            education,
            portfolio,
            skills,
            experience,
            media,
            about,
            payment,
            payment_details,
            payment_success,
            navigation,
            portfolio_icon,
            skills_icon,
            experience_icon,
            media_icon,
            about_icon,
            education_icon,
            contact_message,
            link,
            phone,
        },
        data() {
            return {
                tab: null,
                active: 0,
                dialog: false,
                dialog2: false,
                dialog3: false,
                drawer: null,
                windowSize: 0,


            }
        },
        mounted() {
            this.onResize()
        },
        created() {
            this.listen();
        },
        methods: {
            onResize() {
                this.windowSize = window.innerWidth
            },

            listen() {
                EventBus.$on('newdialog', (ann) => {
                    this.dialog = false;
                    this.dialog2 = false;
                    this.dialog3 = false;

                })
                EventBus.$on('newPayment', (ann1) => {
                    this.dialog = false;
                    this.dialog2 = true;
                })
                EventBus.$on('newPay', (ann1) => {

                    this.dialog2 = false;
                    this.dialog3 = true;
                })
                EventBus.$on('newdrawer', (ann) => {
                    this.drawer = false;

                })
                EventBus.$on('newPayOpen', (ann) => {
                    this.drawer = false;
                    this.dialog = true;

                })
            },
        }
    }
</script>
<style scoped>
    @import url('https://fonts.googleapis.com/css?family=Poppins');

    *,
    *::before,
    *::after {

        font-family: 'Poppins', sans-serif;

    }

    html {

        font-family: 'Poppins', sans-serif;

    }

    body {
        font-family: 'Poppins', sans-serif;

    }

    .card_image {

        margin-left: 60px;
        margin-top: 30px;
        height: 125px;
        width: 125px;
    }

    .about {
        margin-left: 40px;
        margin-top: 35px;

    }

    .name {
        font-size: 150%;
        font-weight: 800;
        line-height: 6px;
        color: #052137;
        margin-bottom: 20px;
    }

    .professions {

        font-style: normal;
        font-weight: bold;
        font-size: 80%;
        color: #052137;
        margin-bottom: 15px;


    }

    .description {
        font-style: normal;
        font-weight: normal;
        font-size: 70%;
        color: #052137;
        margin-bottom: 8px;

    }

    .main {
        font-style: normal;
        align-items: center;
        text-transform: uppercase;
        color: #052137;
    }

    .rate {


        font-weight: normal;
        font-size: 80%;
        line-height: 21px;
        display: inline-flex;
        margin-right: 10px;
    }

    .rate1 {


        font-weight: bold;
        font-size: 80%;
        line-height: 30px;
        display: inline-flex;
        color: #052137;
        margin-right: 15px;
    }

    .avail {

        font-weight: normal;
        font-size: 80%;
        line-height: 21px;
        display: inline-flex;
        margin-right: 10px;

    }

    .social_icon {
        padding: 12px 12px 12px 12px;
        background: #052137;
        border-radius: 5px;

    }

    .social_icon1 {
        padding: 10px 12px 8px 12px;
        background: #052137;
        border-radius: 5px;

    }

    .social {
        padding-top: 30px;
        padding-right: 30px;
    }

    .body_element {
        padding-top: 33px;
        margin-left: 100px;
        margin-right: 105px;

    }

    .v-tab.v-tab {
        color: #052137;
        font-weight: 800;
        text-transform: none;

    }

    .theme--dark.v-tabs > .v-tabs-bar .v-tab:not(.v-tab--active) {
        color: #B3B3B3;
        font-weight: 800;
        text-transform: none;
    }

    .icon_color {
        fill: #B2B2B2;
    }

    .v-tab--active .icon_color {
        fill: #052137;
    }

    .tab_items {
        margin-top: 50px;
        margin-left: 100px;
        margin-right: 105px;
    }

    @media only screen and (max-width: 960px) {
        .profile_image {
            height: 100px;
            width: 100px;

        }

        .card_image {
            height: 100px;
            width: 100px;
            margin-left: 35px;
            margin-top: 45px;
        }

        .social {
            padding-top: 40px;
            padding-right: 35px;
        }


        .v-tab.v-tab[data-v-3d0b1749] .tab_small {
            font-size: 1.3vw;

        }

        .v-tab {

            padding: 0px;
            min-width: 70px;
        }


        .about {
            margin-left: 20px;
            margin-top: 55px;

        }

        .social_icon {
            padding: 8px 12px 8px 12px;
            background: #052137;
            border-radius: 5px;
        }

        .description {
            height: 50px;
        }

        .tab_items {

            margin-left: 20px;
            margin-right: 20px;
        }


    }

    @media only screen and (max-width: 700px) {
        .professions {

            margin-bottom: 7px;
        }

        .description {

            margin-bottom: 15px;
        }

        .rate {

            line-height: 21px;
        }

        .rate1 {

            font-size: 70%;
        }

        .avail {

            font-size: 70%;

        }

    }

    @media only screen and (max-width: 659px) {
        .body_element {
            padding-top: 33px;
            margin-left: 10px;
            margin-right: 10px;

        }

        .icon_color {
            padding-right: 4px;
            height: 20px;
            width: 20px;
        }

        .v-tab.v-tab[data-v-3d0b1749] .tab_small {
            font-size: 2vw;

        }

        .card_image {

            margin-left: 30px;
            margin-top: 30px;
            height: 60px;
            width: 60px;
        }

        .profile_image {
            height: 60px;
            width: 60px;

        }

        .social_icon {
            padding: 8px 12px 8px 12px;
            background: #052137;
            border-radius: 5px;
            height: 40px;
            margin-top: 30px;
            margin-right: 20px;
        }

        .about {
            margin-left: 10px;
            margin-top: 45px;

        }

        .name {
            font-size: 4.1vw;
            font-weight: 800;
            line-height: 3px;
            color: #052137;
            margin-bottom: 15px;
        }

        .professions {

            font-style: normal;
            font-weight: bold;
            font-size: 2.5vw;
            color: #052137;
            margin-bottom: 0px;


        }

    }

    @media only screen and (max-width: 439px) {
        .body_element {

            margin-left: 5px;

        }
    }

    @media only screen and (max-width: 400px) {
        .body_element {

            margin-left: -30px;
            margin-right: 20px;
        }
    }

</style>
