<template>
    <v-content style="background-color: #E5E5E5;width: 595px;height: 762px">
        <v-container fluid class="ma-0 pa-0">


            <div class="education">
                Education
            </div>
            <div class="divider1">

            </div>
            <div>

                <v-row style=" margin-left: 35px;
        margin-top: 20px;">

                    <div class="university">
                        Ryerson University
                    </div>
                    <div class="year">
                        2010-2013
                    </div>
                </v-row>


                <div class="location">
                    IBM LAB
                </div>
                <div class="description1">
                    Parallel to the Potsgraduate degree in computer security, I studied Digital Marketing.
                </div>
            </div>
            <div>

                <v-row style=" margin-left: 35px;
        margin-top: 20px;">

                    <div class="university">
                        Ryerson University
                    </div>
                    <div class="year">
                        2010-2013
                    </div>
                </v-row>


                <div class="location">
                    IBM LAB
                </div>
                <div class="description1">
                    Parallel to the Potsgraduate degree in computer security, I studied Digital Marketing.
                </div>
            </div>
            <div>
                <div class="skills">
                    Skills
                </div>
                <div class="divider1">

                </div>
                <div>
                    <v-row style="margin-left: 35px;margin-top: 53px" dense no-gutters>
                        <h3 class="skill_name">Java</h3>
                        <v-progress-linear

                            height="10"
                            class="progress"

                            color="#052137"
                            background-color="#F1485B"
                            value="58"
                        >

                        </v-progress-linear>
                        <v-divider


                            vertical
                            dark
                            class="divider"


                        ></v-divider>
                        <h1 class="percentage">58%</h1>

                    </v-row>
                </div>
                <div>
                    <v-row style="margin-left: 35px;margin-top: 53px" dense no-gutters>
                        <h3 class="skill_name">PHP</h3>
                        <v-progress-linear

                            height="10"
                            class="progress"

                            color="#052137"
                            background-color="#F1485B"
                            value="58"
                        >

                        </v-progress-linear>
                        <v-divider


                            vertical
                            dark
                            class="divider"


                        ></v-divider>
                        <h1 class="percentage">58%</h1>

                    </v-row>
                </div>
                <div class="contact">
                    Contact me
                </div>
                <div class="divider1">

                </div>

            </div>
            <div>
                <v-row style="margin-top: 30px;margin-left: 53px;" no-gutters dense>
                    <div class="button_div" style="background-color: #FDDB69;
        border-radius: 2px;">
                        <v-icon small class="icon_message">
                            $contact_message
                        </v-icon>
                    </div>
                    <div class="contact_email">
                        hean_prins@gmail.com
                    </div>
                    <div class="button_div" style="background-color: #FDDB69;
        border-radius: 2px;">
                        <v-icon small class="icon_message">
                            $link
                        </v-icon>
                    </div>
                    <div class="contact_link">
                        www.civie/heanprinsloo.com
                    </div>
                    <div class="button_div" style="background-color: #FDDB69;
        border-radius: 2px;">
                        <v-icon small class="icon_message">
                            $phone
                        </v-icon>
                    </div>
                    <div class="contact_email">
                        +366 010 101 001
                    </div>
                </v-row>
            </div>
        </v-container>
    </v-content>
</template>
<script>
    import facebook from '../../icons/facebook.vue'
    import insta from '../../icons/insta.vue'
    import twitter from '../../icons/twitter.vue'
    import message from '../../icons/message.vue'

    import portfolio from './portfolio.vue'
    import skills from './skills.vue'
    import experience from './experience.vue'
    import media from './media.vue'
    import about from './about.vue'
    import education from './education.vue'


    export default {
        components: {facebook, insta, twitter, message, education, portfolio, skills, experience, media, about},
        data() {
            return {
                tab: null,
                active: 0,

            }
        },
    }
</script>
<style scoped>
    .contact_link {

        width: 145px;
        height: 15px;
        margin-left: 7px;
        margin-top: 5px;

        font-family: Poppins;
        font-style: normal;
        font-weight: normal;
        font-size: 10px;
        line-height: 15px;
        /* identical to box height */
        color: #000000;
        margin-right: 10px;
    }

    .contact_email {

        width: 122px;
        height: 15px;
        margin-left: 7px;
        margin-top: 5px;

        font-family: Poppins;
        font-style: normal;
        font-weight: normal;
        font-size: 10px;
        line-height: 15px;
        margin-right: 10px;
        /* identical to box height */


        color: #000000;
    }

    .button_div {
        background-color: #FDDB69;
        border-radius: 2px;
    }

    .icon_message {
        margin-top: 5.62px;
        margin-bottom: 7.5px;
        margin-left: 6.25px;
        margin-right: 6.25px;
    }

    .contact {
        width: 122px;
        height: 30px;
        margin-left: 237px;
        margin-top: 62px;

        font-family: Poppins;
        font-style: normal;
        font-weight: bold;
        font-size: 20px;
        line-height: 30px;
        /* identical to box height */


        color: #052137;

    }

    .percentage {
        width: 35px;
        height: 20px;
        margin-left: 10px;
        margin-top: -2px;

        font-family: Roboto;
        font-style: normal;
        font-weight: 900;
        font-size: 18px;
        line-height: 21px;
        color: rgba(5, 33, 55, 0.2);

    }

    .divider {
        margin-left: 89px;

        height: 40px;
        margin-top: -18px;


        top: 462px;
        border: 2px solid rgba(5, 33, 55, 0.2);

    }

    .progress {

        width: 314px;

        margin-left: 28px;
        background: #F1485B;
        border-radius: 30px;
        margin-top: 3px;
    }

    .skill_name {

        width: 35px;
        height: 16px;
        font-family: Roboto;
        font-style: normal;
        font-weight: bold;
        font-size: 14px;
        line-height: 16px;

        color: #000000;
    }

    .skills {

        width: 54px;
        height: 30px;
        margin-left: 271px;
        margin-top: 50px;

        font-family: Poppins;
        font-style: normal;
        font-weight: bold;
        font-size: 20px;
        line-height: 30px;
        /* identical to box height */


        color: #052137;

    }

    .description1 {

        width: 417px;
        height: 40px;
        margin-left: 37px;
        margin-top: 10px;

        font-family: Roboto;
        font-style: normal;
        font-weight: normal;
        font-size: 12px;
        line-height: 14px;

        color: #000000;
    }

    .location {


        width: 97.79px;
        height: 16px;
        margin-left: 35px;
        margin-top: 10px;

        font-family: Roboto;
        font-style: normal;
        font-weight: 500;
        font-size: 14px;
        line-height: 16px;

        color: #000000;
    }

    .year {

        width: 65px;
        height: 14px;
        margin-left: 96px;
        font-family: Roboto;
        font-style: normal;
        font-weight: normal;
        font-size: 12px;
        line-height: 14px;
        /* identical to box height */


        color: #052137;

        opacity: 0.55;

    }

    .university {

        width: 369px;
        height: 16px;


        font-family: Roboto;
        font-style: normal;
        font-weight: bold;
        font-size: 14px;
        line-height: 16px;

        color: #000000;

    }

    .divider1 {

        width: 416px;
        height: 0px;
        margin-left: 89px;
        margin-top: 15px;

        border: 1px solid #052137;
    }

    .education {

        width: 104px;
        height: 30px;
        margin-left: 246px;
        margin-top: 60px;

        font-family: Poppins;
        font-style: normal;
        font-weight: bold;
        font-size: 20px;
        line-height: 30px;
        /* identical to box height */


        color: #052137;
    }

</style>
