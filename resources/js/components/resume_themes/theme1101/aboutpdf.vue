<template>
    <v-content style="background-color: #E5E5E5;width: 595px;height: 762px">
        <v-container fluid class="ma-0 pa-0">
            <v-row style="background-color:#FDDB69; padding-bottom: 35px;" dense no-gutters>


                <v-card class="card_image" style="border-radius: 15px;" flat>
                    <v-img
                            class="ma-0 pa-0"
                            src="../assets/images/profile.jpg"
                    />
                </v-card>
                <div>
                    <h1 class="name">Samuel Raita</h1>
                    <h1 class="profession">UXUI Designers and Frontend</h1>
                </div>


            </v-row>
            <div>
                <div class="about">About me</div>


                <div class="divider">

                </div>
                <div class="description text-justify pr-3">
                    Donec a augue gravida, vulputate ligula et, pellentesque arcu. Morbi feugiat eros nec sem ultrices,
                    et
                    venenatis velit posuere. Donec bibendum commodo dui, eget sollicitudin urna sagittis non. Donec ac
                    commodo tortor. Interdum et malesuada fames ac ante ipsum primis in faucibus. Mauris gravida laoreet
                    lacus, non hendrerit elit suscipit a. Nunc ut ultricies massa, eu sollicitudin enim. Praesent quis
                    ultrices nibh. Donec bibendum elit sed erat convallis, at feugiat arcu mollis. Nunc quam eros,
                    venenatis
                    id tristique malesuada, ornare eu augue. Aliquam volutpat eros id libero posuere vestibulum.
                </div>
            </div>
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
        </v-container>
    </v-content>
</template>
<script>
    import facebook from '../../icons/facebook.vue'
    import insta from '../../icons/insta.vue'
    import twitter from '../../icons/twitter.vue'
    import message from '../../icons/message.vue'

    import portfolio from '../components/portfolio.vue'
    import skills from '../components/skills.vue'
    import experience from '../components/experience.vue'
    import media from '../components/media.vue'
    import about from '../components/about.vue'
    import education from '../components/education.vue'


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
        margin-top: 35px;

        font-family: Poppins;
        font-style: normal;
        font-weight: bold;
        font-size: 20px;
        line-height: 30px;
        /* identical to box height */


        color: #052137;
    }

    .card_image {

        margin-left: 83px;
        margin-top: 35px;
        height: 80px;
        width: 80px;
        margin-right: 50px;

    }

    .name {

        width: 300px;
        height: 45px;
        margin-top: 28px;
        margin-right: 82px;

        font-family: Poppins;
        font-style: normal;
        font-weight: 800;
        font-size: 40px;
        line-height: 60px;

        color: #052137;
    }

    .profession {

        width: 287px;
        height: 30px;

        margin-top: 20px;

        font-family: Poppins;
        font-style: normal;
        font-weight: 500;
        font-size: 20px;
        line-height: 30px;
        /* identical to box height */


        color: #052137;
    }

    .about {

        width: 101px;
        height: 30px;
        margin-left: 248px;
        margin-top: 20px;

        font-family: Poppins;
        font-style: normal;
        font-weight: bold;
        font-size: 20px;
        line-height: 30px;
        /* identical to box height */


        color: #052137;
    }

    .divider {

        width: 416px;
        height: 0px;
        margin-left: 89px;
        margin-top: 15px;

        border: 1px solid #052137;
    }

    .description {

        width: 540px;
        height: 161px;
        margin-left: 35px;
        margin-top: 25px;

        font-family: Poppins;
        font-style: normal;
        font-weight: normal;
        font-size: 12px;
        line-height: 18px;
        text-align: center;

        color: #000000;
    }

</style>
