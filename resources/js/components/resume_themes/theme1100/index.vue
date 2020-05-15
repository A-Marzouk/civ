<template>
    <v-app v-resize="onResize">
        <v-content style="background-color: #001935;background-image: unset">
            <v-container fluid>
                <v-row align="center" v-if="windowSize<=650" dense no-gutters>
                    <v-col align-self="center" class="d-flex" cols="12">
                        <v-avatar class="avatarBorder " size="125">
                            <v-avatar class="avatar" size="100">

                                <img
                                    alt="John"
                                    src="https://cdn.vuetifyjs.com/images/john.jpg">

                            </v-avatar>
                        </v-avatar>
                        <div class="name mt-8 ml-3">
                            <div class="name1" style="font-size: 4.7vw">Timothy Brewer</div>
                            <div class="profession1 font-weight-bold" style="font-size: 2.7vw;">User interface
                                designer
                            </div>
                        </div>
                    </v-col>

                    <v-col align-self="center" style="padding-left: 10%;padding-right: 7%" class="d-flex mt-4" cols="12"
                           xs="12">


                        <div class="description">
                            <h4 class="ml-3" style="font-size: 3.7vw">I can Work for</h4>
                            <h3 style="font-size: 4.3vw">35 Hours/week</h3>
                        </div>
                        <v-spacer></v-spacer>
                        <div class="description1">
                            <h4 class="ml-3" style="font-size: 3.7vw">I Work for</h4>
                            <h3 style="font-size: 4.3vw">17 USD/Hour</h3>
                        </div>
                    </v-col>
                </v-row>
                <v-row align="center" v-if="windowSize<=650" class="mt-6" dense no-gutters>
                    <v-col class="d-flex" cols="12" xs="12">
                        <v-btn class="hire  white--text" color="#5e507c" depressed
                               min-height="60" min-width="45%"
                               style="text-transform: none;border-radius: 10px;margin-right: 3%">Hire
                            me
                            now
                        </v-btn>
                        <v-spacer></v-spacer>
                        <v-btn class="white--text" color="#383a60" depressed
                               min-height="60" min-width="25%"
                               style="text-transform: none;border-radius: 10px;margin-right: 2%">
                            <call class="mr-2"></call>
                            call
                        </v-btn>
                        <v-btn class="video" color="#5e507c" depressed min-height="60" min-width="15%"
                               outlined style="border-radius: 10px">
                            <video_call></video_call>
                        </v-btn>
                    </v-col>
                </v-row>
                <v-row align="center" class="ml-12 pl-6 mr-12 pr-6 hidden-md-and-down" dense no-gutters>
                    <v-col align-self="center" class="d-flex" cols="12" md="4" sm="6" xs="12">
                        <v-avatar size="135" class="avatarBorder ">
                            <v-avatar size="110" class="avatar">

                                <img
                                    src="https://cdn.vuetifyjs.com/images/john.jpg"
                                    alt="John">

                            </v-avatar>
                        </v-avatar>
                        <div class="name mt-8 ml-3">
                            <div class="name1" style="font-size: 160%">Timothy Brewer</div>
                            <div class="profession1 font-weight-bold" style="font-size: 92%;">User interface designer
                            </div>
                        </div>
                    </v-col>

                    <v-col align-self="center" class="d-flex pr-md-12" cols="12" md="4" sm="6">
                        <v-spacer class="hidden-xs-only"></v-spacer>

                        <div class="description mr-md-8 ">
                            <h4 style="font-size: 110%">I can Work for</h4>
                            <h3 style="font-size: 140%">35 Hours/week</h3>
                        </div>
                        <div class="description1 pr-md-6 ">
                            <h4 style="font-size: 110%">I Work for</h4>
                            <h3 style="font-size: 140%">17 USD/Hour</h3>
                        </div>
                    </v-col>


                    <v-col align-self="center" class="text-right hidden-sm-and-down" cols="12" md="4">
                        <v-spacer></v-spacer>
                        <v-btn style="text-transform: none" class="hire  white--text mr-md-6" depressed large
                               color="#5e507c">Hire
                            me
                            now
                        </v-btn>
                        <v-btn style="text-transform: none" class="hire1  white--text mr-md-3" large depressed
                               color="#383a60">
                            <call class="mr-2"></call>
                            Audio Call

                        </v-btn>
                        <v-btn large min-width="1" max-width="15" outlined class="video" depressed color="#5e507c">
                            <video_call></video_call>
                        </v-btn>
                    </v-col>
                    <v-row align="center" class="hidden-md-and-up hidden-xs-only" dense no-gutters>
                        <v-col align-self="center" cols="12" offset="2" sm="4">
                            <v-btn class="hire  white--text ml-md-12" color="#5e507c" depressed
                                   min-height="60" min-width="230"
                                   style="text-transform: none;border-radius: 10px">Hire
                                me
                                now
                            </v-btn>
                        </v-col>

                        <v-col align-self="center" class="text-right" cols="12" sm="6">
                            <v-btn class="white--text mr-sm-3" color="#383a60" depressed
                                   min-height="60" min-width="160"
                                   style="text-transform: none;border-radius: 10px">
                                <v-icon left>call</v-icon>
                                Audio call
                            </v-btn>
                            <v-btn class="video" color="#5e507c" depressed min-height="60" min-width="90"
                                   outlined style="border-radius: 10px">
                                <video_call></video_call>
                            </v-btn>
                        </v-col>

                    </v-row>
                </v-row>
                <v-row align="center" v-if="windowSize >650" class="ml-12 pl-6 mr-12 pr-6 hidden-lg-and-up" dense
                       no-gutters>
                    <v-col align-self="center" class="d-flex" cols="12" md="6" sm="6" xs="12">
                        <v-avatar size="110" class="avatarBorder ">
                            <v-avatar size="85" class="avatar">

                                <img
                                    src="https://cdn.vuetifyjs.com/images/john.jpg"
                                    alt="John">

                            </v-avatar>
                        </v-avatar>
                        <div class="name mt-8 ml-3">
                            <div class="name1" style="font-size:2.5vw">Timothy Brewer</div>
                            <div class="font-weight-bold profession1" style="font-size: 1.5vw;">User interface
                                designer
                            </div>
                        </div>
                    </v-col>

                    <v-col align-self="center" class="d-flex" cols="12" sm="6" md="6">
                        <v-spacer></v-spacer>

                        <div class="description" style="margin-right: 16%">
                            <h4 style="font-size: 110%">I can Work for</h4>
                            <h3 style="font-size: 140%">35 Hours/week</h3>
                        </div>
                        <div class="description1">
                            <h4 style="font-size: 110%">I Work for</h4>
                            <h3 style="font-size: 140%">17 USD/Hour</h3>
                        </div>
                    </v-col>


                    <v-row dense no-gutters>
                        <v-col style="padding-left: 120px" cols="12" sm="6">
                            <v-btn class="hire  white--text" color="#5e507c" depressed
                                   min-height="60" min-width="70%"
                                   style="text-transform: none;border-radius: 10px;font-size: 90% ">Hire
                                me
                                now
                            </v-btn>
                        </v-col>

                        <v-col align-self="center" class="text-right" cols="12" sm="6">
                            <v-btn class="white--text mr-sm-3" color="#383a60" depressed
                                   min-width="35%" min-height="60"
                                   style="text-transform: none;border-radius: 10px;font-size: 90% ">
                                <call class="mr-2"></call>
                                Audio call
                            </v-btn>
                            <v-btn class="video" color="#5e507c" depressed min-height="60" min-width="80"
                                   outlined style="border-radius: 10px">
                                <video_call></video_call>
                            </v-btn>
                        </v-col>

                    </v-row>
                </v-row>

                <v-row align="center" v-if="windowSize<=650" class="mt-5"
                       color="#001935" dense flat
                       no-gutters>
                <span class="text-center  font-weight-bold mb-1"
                      style="color: #9b87ac;font-size: 3vw;padding-left: 44%">Follow me</span>
                    <v-col cols="12">
                        <v-row justify="center">
                            <facebook class="icon_hover mr-2"></facebook>
                            <twitter class="mr-2"></twitter>


                            <linkden
                                class="mr-2"
                            >


                            </linkden>
                            <insta
                                class="mr-2"
                            >

                            </insta>
                            <round
                                class="mr-2"
                            >

                            </round>
                            <bg>
                            </bg>
                        </v-row>
                    </v-col>

                </v-row>

                <v-row align="center" v-if="windowSize >650" class="ml-12 pl-6 mr-12 mt-4 pr-6 hidden-lg-and-up " color="#001935"
                       dense
                       flat
                       no-gutters>
                    <v-col style="padding-left: 28%" align-self="center" class="d-flex  pt-2" cols="12" sm="12">

                        <span class="mr-6 font-weight-bold" style="color: #9b87ac;font-size: 1.7vw; margin-top: 5px">Follow me</span>

                        <facebook class="icon_hover mr-2" style="height: 8%;width: 8%"></facebook>
                        <twitter class="mr-2" style="height: 8%;width: 8%"></twitter>


                        <linkden
                            class="mr-2"
                            style="height: 8%;width: 8%"

                        >

                        </linkden
                        >
                        <insta
                            class="mr-2"
                            style="height: 8%;width: 8%"
                        >

                        </insta>
                        <round
                            class="mr-2"
                            style="height: 8%;width: 8%"
                        >

                        </round>
                        <bg style="height: 8%;width: 8%">
                        </bg>

                    </v-col>

                </v-row>
                <v-divider class="divide mt-2 mb-0 hidden-lg-and-up" light></v-divider>
                <v-row align="center" v-if="windowSize<=650" dense no-gutters>
                    <v-col class="mobile_tab d-flex" cols="12">
                        <v-tabs

                            background-color="#001935"
                            class="tabs m-0 pl-0"
                            dark
                            flat
                            height="42"
                            hide-slider
                            ripple
                            v-model="tab"
                            center-active


                        >
                            <v-tab class="ml-0 pl-0 font-weight-bold"
                                   style="text-transform: none;width: 15%;padding: 0px;">
                                About me
                            </v-tab>
                            <v-tab class="font-weight-bold" style="text-transform: none;width: 15%;padding: 0px;">
                                Portfolios
                            </v-tab>
                            <v-tab class="font-weight-bold" style="text-transform: none;width: 15%;padding: 0px;">
                                Skills
                            </v-tab>
                            <v-tab class="font-weight-bold" style="text-transform: none;width: 15%;padding: 0px;">
                                Education
                            </v-tab>
                            <v-tab class="font-weight-bold" style="text-transform: none;padding: 0px;">
                                Activities
                            </v-tab>
                        </v-tabs>
                    </v-col>
                </v-row>
                <v-row align="center" v-if="windowSize >650" class="hidden-lg-and-up" color="#001935" dense flat
                       no-gutters>
                    <v-col style="padding-left: 15%;" cols="12">
                        <v-tabs

                            background-color="#001935"

                            class="tabs ma-0 pa-0"
                            dark
                            flat
                            height="42"
                            hide-slider
                            v-model="tab"


                        >
                            <v-tab class="ml-0 pl-0 font-weight-bold"
                                   style="text-transform: none;width: 15%;padding: 0px;">
                                <span>About me</span>
                            </v-tab>
                            <v-tab class="font-weight-bold" style="text-transform: none;width: 15%;padding: 0px">
                                Portfolios
                            </v-tab>
                            <v-tab class="font-weight-bold" style="text-transform: none;width: 15%;padding: 0px">
                                Skills
                            </v-tab>
                            <v-tab class="font-weight-bold" style="text-transform: none;width: 15%;padding: 0px">
                                Education
                            </v-tab>
                            <v-tab class="font-weight-bold" style="text-transform: none;padding: 0px;width: 15%;">
                                Activities
                            </v-tab>
                        </v-tabs>
                    </v-col>
                </v-row>

                <v-divider class="divide mt-2 mb-0 hidden-md-and-down" light></v-divider>
                <v-row align="center" class="ml-12 pl-6 mr-7 hidden-md-and-down pr-9" color="#001935" dense flat
                       no-gutters>

                    <v-col cols="12" md="8">
                        <v-tabs

                            background-color="#001935"
                            dark
                            hide-slider
                            flat
                            centered
                            class="tabs pr-12"
                            height="42"
                            v-model="tab"


                        >
                            <v-tab style="text-transform: none;" class="ml-0 pl-0  mr-8 font-weight-bold">
                                About me
                            </v-tab>
                            <v-tab class="font-weight-bold   mr-8" style="text-transform: none ">
                                Portfolios
                            </v-tab>
                            <v-tab class="font-weight-bold mr-8" style="text-transform: none">
                                Skills
                            </v-tab>
                            <v-tab class="font-weight-bold  mr-8" style="text-transform: none">
                                Education
                            </v-tab>
                            <v-tab class="font-weight-bold" style="text-transform: none">
                                Activities
                            </v-tab>
                        </v-tabs>
                    </v-col>


                    <v-col class="d-flex text-right pt-2 " cols="12" md="4">
                        <v-spacer></v-spacer>

                        <span class="mr-6 font-weight-bold mt-2" style="color: #9b87ac;font-size:1vw">Follow me</span>

                        <facebook class="mr-2"></facebook>
                        <twitter class="mr-2"></twitter>


                        <linkden
                            class="mr-2"
                        >

                        </linkden>
                        <insta
                            class="mr-2"
                        >

                        </insta>
                        <round
                            class="mr-2"
                        >

                        </round>
                        <bg
                            class="mr-2">
                        </bg>

                    </v-col>

                </v-row>
                <v-tabs-items style="background-color:#001935" v-model="tab">
                    <v-tab-item>
                        <about></about>
                    </v-tab-item>
                    <v-tab-item>
                        <portfolio></portfolio>
                    </v-tab-item>
                    <v-tab-item>

                        <skills></skills>
                    </v-tab-item>
                    <v-tab-item>
                        <education></education>
                    </v-tab-item>
                    <v-tab-item>
                        <activities></activities>
                    </v-tab-item>
                </v-tabs-items>

            </v-container>
        </v-content>
    </v-app>
</template>
<script>
    import portfolio from './portfolio.vue'
    import skills from './skills.vue'
    import education from './education.vue'
    import activities from './Activities.vue'
    import about from './about.vue'
    import bg from './icon/bg.vue'
    import facebook from './icon/facebook.vue'
    import insta from './icon/insta.vue'
    import linkden from './icon/linkden.vue'
    import round from './icon/round.vue'
    import twitter from './icon/twitter.vue'
    import call from './icon/call.vue'
    import video_call from './icon/video.vue'


    export default {
        name: 'resumeTheme1100',
        components: {
            portfolio,
            skills,
            education,
            activities,
            about,
            bg,
            facebook,
            insta,
            linkden,
            round,
            twitter,
            call,
            video_call
        },
        data() {
            return {
                tab: null,
                windowSize: 0,


            }
        },
        mounted() {
            this.onResize()
        },
        methods: {
            onResize() {
                this.windowSize = window.innerWidth
            },
        },
    }
</script>

<style scoped>
    @import url('https://fonts.googleapis.com/css?family=Cabin');

    *,
    *::before,
    *::after {

        font-family: 'Cabin', sans-serif;

    }

    html {

        font-family: 'Cabin', sans-serif;
    }

    body {
        font-family: 'Cabin', sans-serif;
    }


    .avatar {
        border: 2px solid #9472a0;

    }

    .avatarBorder {
        border: 2px solid #1f1c44;


    }


    .name1 {
        color: #dedede;
        font-size: 120%;

    }

    .profession1 {
        color: #b1a9b9;
        font-weight: normal;
        font-size: 80%;


    }

    .description {
        font-size: 70%;


    }

    .description h4 {
        color: #b1a9b9;


        font-weight: normal;
    }

    .description h3 {

        color: #dedede;
        font-weight: unset;


    }

    .description1 {
        font-size: 70%;


    }

    .description1 h4 {
        color: #b1a9b9;

        font-weight: normal;
    }

    .description1 h3 {


        color: #dedede;
        font-weight: unset;

    }


    .v-btn:not(.v-btn--round).v-size--x-large {
        height: 52px;
        min-width: 92px;
        padding: 0 23.1111111111px;

    }

    .video {

        border: 1px solid #5e507c;


    }

    .divide {
        background-color: #5e507c;
    }

    .theme--dark.v-tabs > .v-tabs-bar .v-tab:not(.v-tab--active) {
        color: #5e507c;
    }

    @media only screen and (max-width: 650px) {
        .mobile_tab {
            padding-left: 10%;
        }
    }

    @media only screen and (max-width: 523px) {
        .mobile_tab {
            padding-left: 1%;
        }
    }


</style>
