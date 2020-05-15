<template>
    <div v-resize="onResize">
        <div style="margin-top: 50px;
            margin-left: 5%;margin-right: 5% ">
            <div>
                <v-row justify="space-between" class="d-flex rowfixing" no-gutters dense>
                    <v-col class="d-flex mb-5 pr-lg-3" style="height: 130px" cols="12" lg="4">

                        <h1 class="number mr-3 mt-7">
                            01
                        </h1>
                        <div class="audio_card pa-4 ">
                            <v-row class="mt-4">

                                <v-avatar size="60" style="border-radius: 50%" class="mt-1 ml-2">
                                    <img
                                        src="https://cdn.vuetifyjs.com/images/john.jpg"
                                        alt="John"
                                    >
                                </v-avatar>
                                <div class="ml-3">
                                    <h5 class="audio">Aud17/04/20</h5>
                                    <h6 style="color: rgba(0, 0, 0, 0.55);">Hean Prinsio</h6>
                                    <h6>1:05:00</h6>
                                </div>
                                <v-spacer></v-spacer>

                                <v-avatar size="60" color="#052137" style="border-radius: 50%" class="mt-1 mr-2">
                                    <player class="player_icon"></player>
                                </v-avatar>

                            </v-row>
                        </div>
                    </v-col>
                    <v-col class="d-flex mb-5 column " cols="12" lg="2">

                        <h1 class="number number1 mr-3 mt-lg-7">
                            01
                        </h1>
                        <div class="audio_card1">

                            <v-img
                                style="overflow: hidden;"
                                class="audio_card1 audio_card2 ma-0 pa-0"
                                src="/images/resume_themes/theme1101/Rectangle 27.jpg"

                            />
                            <div class="icon_middle">
                                <v-avatar size="60" color="#052137" style="border-radius: 50%;"
                                          class="mt-1 mr-2">
                                    <player class="player_icon"></player>

                                </v-avatar>
                            </div>
                        </div>

                    </v-col>
                    <v-col class="d-flex mb-5 column" cols="12" lg="2">

                        <h1 class="number number1 mr-3 mt-lg-7 ml-lg-3">
                            01
                        </h1>
                        <div class="audio_card1">

                            <v-img

                                class="audio_card1 audio_card2 ma-0 pa-0"
                                src="/images/resume_themes/theme1101/Rectangle 27.jpg"

                            />
                            <div class="icon_middle">
                                <v-avatar size="60" color="#052137" style="border-radius: 50%;"
                                          class="mt-1 mr-2">
                                    <player class="player_icon"></player>

                                </v-avatar>
                            </div>
                        </div>
                    </v-col>
                    <v-col class="d-flex mb-5 pl-lg-2 " style="height: 130px" cols="12" lg="4">

                        <h1 class="number mr-3 mt-7 ml-lg-4">
                            01
                        </h1>
                        <div class="audio_card pa-4 ">
                            <v-row class="mt-4">

                                <v-avatar size="60" style="border-radius: 50%" class="mt-1 ml-2">
                                    <img
                                        src="https://cdn.vuetifyjs.com/images/john.jpg"
                                        alt="John"
                                    >
                                </v-avatar>
                                <div class="ml-3">
                                    <h5 class="audio">Aud17/04/20</h5>
                                    <h6 style="color: rgba(0, 0, 0, 0.55);">Hean Prinsio</h6>
                                    <h6>1:05:00</h6>
                                </div>
                                <v-spacer></v-spacer>

                                <v-avatar size="60" color="#052137" style="border-radius: 50%" class="mt-1 mr-2">
                                    <player class="player_icon"></player>
                                </v-avatar>

                            </v-row>
                        </div>
                    </v-col>
                    <v-col class="d-flex mb-5 pr-lg-8 column1 " cols="12" lg="4">

                        <h1 class="number number1 number2 mr-3 ">
                            01
                        </h1>
                        <div class="video_card">

                            <v-img
                                style="overflow: hidden;"
                                class="video_card audio_card2 ma-0 pa-0"
                                src="/images/resume_themes/theme1101/Rectangle 27.jpg"

                            />
                            <div class="icon_middle icon_middle2">
                                <v-avatar size="60" color="#052137" style="border-radius: 50%;"
                                          class="mt-1 mr-2">
                                    <player class="player_icon"></player>

                                </v-avatar>
                            </div>
                        </div>

                    </v-col>
                    <v-col class="d-flex mb-5 " style="height: 130px" cols="12" lg="4">

                        <h1 class="number mr-3 mt-10">
                            01
                        </h1>
                        <div class="audio_card audio_card5 pa-4 ">
                            <v-row class="mt-4">

                                <v-avatar size="60" style="border-radius: 50%" class="mt-1 ml-2">
                                    <img
                                        src="https://cdn.vuetifyjs.com/images/john.jpg"
                                        alt="John"
                                    >
                                </v-avatar>
                                <div class="ml-3">
                                    <h5 class="audio">Aud17/04/20</h5>
                                    <h6 style="color: rgba(0, 0, 0, 0.55);">Hean Prinsio</h6>
                                    <h6>1:05:00</h6>
                                </div>
                                <v-spacer></v-spacer>

                                <v-avatar size="60" color="#052137" style="border-radius: 50%" class="mt-1 mr-2">
                                    <player class="player_icon"></player>
                                </v-avatar>

                            </v-row>
                        </div>
                    </v-col>
                    <v-col class="d-flex mb-5 column1 pl-lg-7 pr-lg-8" cols="12" lg="4">

                        <h1 class="number number1 number2 mr-3">
                            01
                        </h1>
                        <div class="video_card">

                            <v-img
                                style="overflow: hidden;"
                                class="video_card video_card2 ma-0 pa-0"
                                src="/images/resume_themes/theme1101/Rectangle 27.jpg"

                            />
                            <div class="icon_middle icon_middle2">
                                <v-avatar size="60" color="#052137" style="border-radius: 50%;"
                                          class="mt-1 mr-2">
                                    <player class="player_icon"></player>

                                </v-avatar>
                            </div>
                        </div>

                    </v-col>


                </v-row>
            </div>

        </div>
        <v-footer color="#FFFFFF;" fixed>

            <v-row class="mb-2 mt-2" dense no-gutters>
                <v-col class="d-flex mb-sm-1" cols="5" lg="3" sm="12">

                    <h1 class="audio_font2 number number_footer text-center pr-lg-4 mr-sm-8 pr-3 pt-2 ">
                        01
                    </h1>
                    <div class="audio_file">
                        <h2 class="audio_font" style="font-weight: 900">Audio_04/09/2020</h2>
                        <h4 class="audio_font1" style="color:  rgba(0, 0, 0, 0.55);">Hean Prinsioo</h4>
                    </div>

                </v-col>
                <v-col class="d-flex  pl-sm-9" cols="7" lg="5" sm="5">
                    <div class="wave">
                        <wave class="wave_styling"></wave>
                        <v-row class="row_styling">
                            <span>0:00</span>
                            <v-spacer></v-spacer>
                            <span class="duration">5:38</span>
                        </v-row>
                    </div>
                </v-col>
                <v-col class="d-flex pl-lg-12 pl-sm-4 pb-sm-2" cols="12" lg="4" sm="7">
                    <v-row class="row_player hidden-xs-only">
                        <box2 class="box2 mr-4"></box2>
                        <button class="button_style">

                            <arrow_left style="display: inline-block" class="arrow_left1"></arrow_left>
                            <arrow_left style="display: inline-block" class="arrow_left arrow_left1"></arrow_left>


                        </button>
                        <button class="button_style2">

                            <arrow style="display: inline-block" class="arrow_left1"></arrow>
                            <arrow style="display: inline-block" class="arrow_left arrow_left1"></arrow>


                        </button>
                        <button class="button_style1">

                            <equal class="equal_icon"></equal>

                        </button>
                        <box1 class="box1"></box1>
                        <v-spacer></v-spacer>
                        <box class="mr-8 box"></box>
                    </v-row>
                    <v-row class="row_player hidden-sm-and-up">
                        <box2 class="box2 mr-4"></box2>
                        <button class="button_style">
                            <arrow_left style="display: inline-block" class="arrow_left1"></arrow_left>
                            <arrow_left style="display: inline-block" class="arrow_left arrow_left1"></arrow_left>


                        </button>
                        <button class="button_style2">
                            <arrow style="display: inline-block" class="arrow_left1"></arrow>
                            <arrow style="display:inline-block;" class="arrow_left arrow_left1"></arrow>

                        </button>
                        <button class="button_style1">
                            <equal class="equal_icon"></equal>


                        </button>

                        <box1 class="box1"></box1>

                        <v-spacer></v-spacer>
                        <box class="mr-8 box"></box>
                    </v-row>

                </v-col>
            </v-row>
        </v-footer>
    </div>
</template>
<script>
    import wave from "./icons/wave.vue"
    import player from "./icons/player.vue"
    import box from "./icons/box.vue"
    import box1 from "./icons/box1.vue"
    import box2 from "./icons/box3.vue"
    import equal from "./icons/equal.vue"
    import arrow from "./icons/arrow.vue"
    import arrow_left from "./icons/arrow_left.vue"

    export default {
        components: {player, wave, box, box1, box2, equal, arrow_left, arrow},
        data() {
            return {
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


        }
    }
</script>
<style scoped>
    h1 {
        font-size: unset;
        font-size: 32px;

    }

    .arrow_left1 {
        width: 16px;
        height: 16px;
    }

    .equal_icon {
        width: 16px;
        height: 16px;
    }

    .player_icon {
        width: 16px;
    }


    .audio_font {
        font-size: 28px;

    }

    .audio_font1 {
        font-size: 23px;

    }


    .number[data-v-122eabf8] {
        font-family: unset;
    }

    .box {
        margin-top: 25px;
    }

    .wave_styling {
        width: 397px;
        height: 74px;
    }

    .box1 {
        margin-left: 85px;
        margin-top: 25px;

    }

    .box2 {
        margin-right: 1%;
        margin-top: 25px;
    }

    .wave {
        margin-right: 4%;


    }

    .number_footer {
        margin-left: 1%;
        margin-right: 1%;
    }

    .audio_file {
        margin-right: 2%;
    }

    .duration {
        padding-right: 6%;
    }

    .row_styling {
        margin-top: -30px
    }

    .button_style {
        background-color: #052137;
        padding: 16px 30px 16px 20px;
        border-radius: 10px;
        margin-top: 2.5px;
        margin-bottom: 2.5px;

    }

    .button_style2 {
        background-color: #052137;
        padding: 16px 20px 16px 80px;
        border-radius: 10px;
        margin-top: 2.5px;
        margin-bottom: 2.5px;

    }

    .button_style1 {
        background-color: #3E73FA;
        padding: 20px 30px 20px 30px;
        border-radius: 10px;
        margin-left: -150px;

    }

    .column1 {
        height: 355px;

    }

    .icon_middle {
        padding-left: 30%;
        margin-top: -98px;
    }

    .icon_middle2 {
        padding-left: 45%;
        margin-top: -215px;
    }

    .column {
        height: 130px;
        padding-right: 45px
    }

    .audio {
        font-family: Poppins;
        font-style: normal;
        font-weight: 600;
        line-height: 27px;
        /* identical to box height */

        color: #000000;
    }

    .number {


        font-family: Roboto;
        font-style: normal;
        font-weight: 900;
        text-align: center;

        color: rgba(13, 0, 26, 0.2);
    }

    .audio_card {

        width: 90%;
        height: 100%;
        background: #FFFFFF;
        box-shadow: 0px 6px 6px rgba(0, 0, 0, 0.1);
        border-radius: 20px;
        margin-right: 15px;
    }

    .audio_card5 {


        margin-right: 0px;
    }


    .audio_card1 {

        width: 90%;
        height: 100%;
        background: #FFFFFF;
        box-shadow: 0px 6px 6px rgba(0, 0, 0, 0.1);
        border-radius: 20px;
        margin-right: 15px;

    }

    .video_card {

        width: 90%;
        height: 100%;
        background: #FFFFFF;
        box-shadow: 0px 6px 6px rgba(0, 0, 0, 0.1);
        border-radius: 20px;


    }

    .audio_card2 {

        width: 100%;
        height: 100%;
        background: #FFFFFF;
        box-shadow: 0px 6px 6px rgba(0, 0, 0, 0.1);
        border-radius: 20px;
        margin-right: 15px;

    }

    .video_card2 {

        width: 100%;
        height: 100%;
        background: #FFFFFF;
        box-shadow: 0px 6px 6px rgba(0, 0, 0, 0.1);
        border-radius: 20px;


    }

    @media only screen and (max-width: 1260px) {
        .box {
            margin-top: 0px;
        }

        .wave {
            margin-right: -10%;


        }

        .duration {
            padding-right: 32%;
        }

        .wave_styling {
            width: 90%;
            height: 74px;
        }

        .rowfixing {
            margin-left: 55px;
            margin-right: 30px;
        }

        .column {
            height: 330px;
            padding-right: 0px
        }

        .audio_card1 {

            width: 90%;
            height: 100%;
            background: #FFFFFF;
            box-shadow: 0px 6px 6px rgba(0, 0, 0, 0.1);
            border-radius: 20px;
            margin-right: 15px;

        }

        .audio_card2 {
            width: 100%;
            height: 100%;
            background: #FFFFFF;
            box-shadow: 0px 6px 6px rgba(0, 0, 0, 0.1);
            border-radius: 20px;
            margin-right: 15px;

        }

        .icon_middle {
            padding-left: 45%;
            margin-top: -200px;
        }

        .icon_middle2 {
            padding-left: 40%;
            margin-top: -215px;
        }

        .number1 {
            margin-top: 140px;
        }


    }


    @media only screen and (max-width: 895px) {
        .row_player {
            margin-left: 25px;
        }
    }

    @media only screen and (max-width: 700px) {


        .button_style {
            background-color: #052137;
            padding: 16px 30px 16px 10px;
            border-radius: 10px;
            margin-top: 2.5px;
            margin-bottom: 2.5px;

        }

        .button_style2 {
            background-color: #052137;
            padding: 16px 3px 16px 50px;
            border-radius: 10px;
            margin-top: 2.5px;
            margin-bottom: 2.5px;


        }

        .button_style1 {
            background-color: #3E73FA;
            padding: 20px 20px 20px 20px;
            border-radius: 10px;
            margin-left: -107px;

        }
    }

    @media only screen and (max-width: 600px) {
        .duration {
            padding-right: 20%;
        }

        .box {
            margin-top: 40px;
        }

        .audio_font {
            font-size: 3vw;
            margin-bottom: 5px;
        }

        .audio_font1 {
            font-size: 2.3vw;

        }

        .audio_font2 {

            font-family: Poppins;
            margin-top: -30px;
        }

        .icon_middle2 {
            padding-left: 40%;
            margin-top: -215px;
        }

        .rowfixing {
            margin-left: 0px;
            margin-right: 15px;
        }

        .column {
            height: unset;
            padding-right: 0px
        }

        .audio_card1 {

            width: 90%;
            height: 100%;
            background: #FFFFFF;
            box-shadow: 0px 6px 6px rgba(0, 0, 0, 0.1);
            border-radius: 20px;
            margin-right: 15px;

        }

        .audio_card2 {
            width: 100%;
            height: 100%;
            background: #FFFFFF;
            box-shadow: 0px 6px 6px rgba(0, 0, 0, 0.1);
            border-radius: 20px;
            margin-right: 15px;

        }

        .icon_middle {
            padding-left: 43%;
            margin-top: -43%;
        }

        .number1 {
            margin-top: 27%;
        }

        .number2 {
            margin-top: 33%;
        }


        .button_style {
            background-color: #052137;
            padding: 16px 30px 16px 20px;
            border-radius: 10px;
            margin-top: 2.5px;
            margin-bottom: 2.5px;

        }

        .button_style2 {
            background-color: #052137;
            padding: 16px 20px 16px 80px;
            border-radius: 10px;
            margin-top: 2.5px;
            margin-bottom: 2.5px;


        }

        .button_style1 {
            background-color: #3E73FA;
            padding: 20px 30px 20px 30px;
            border-radius: 10px;
            margin-left: -155px;

        }
    }

    @media only screen and (max-width: 480px) {
        .wave {
            margin-top: -10px;
        }

        .audio_card {
            margin-right: -1.5%;

        }

        .icon_middle {
            padding-left: 43%;
            margin-top: -45%;
        }

        .icon_middle2 {
            padding-left: 43%;
            margin-top: -55%;
        }

        .number2 {
            margin-top: 40%;
        }
    }

    @media only screen and (max-width: 400px) {
        .button_style2 {
            background-color: #052137;
            padding: 10px 10px 10px 30px;
            border-radius: 10px;
            margin-top: 2.5px;
            margin-bottom: 2.5px;
        }

        .button_style1 {
            background-color: #3E73FA;
            padding: 10px 15px 10px 15px;
            border-radius: 10px;
            margin-left: -92.5px;


        }

        .button_style {
            background-color: #052137;
            padding: 10px 25px 10px 10px;
            border-radius: 10px;
            margin-top: 2.5px;
            margin-bottom: 2.5px;


        }

        .audio_card {
            margin-right: -4.5%;

        }

        .icon_middle {
            padding-left: 43%;
            margin-top: -48%;
        }

        .icon_middle2 {
            padding-left: 43%;
            margin-top: -72%;
        }

        .box1 {
            margin-left: 55px;
            margin-top: 20px;

        }

    }

</style>
