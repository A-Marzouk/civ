<template>
    <div style="margin-top: 50px" class="margin_top">
        <v-row
            class="body_fix"
            no-gutters
            dense
            align-content="center"

        >

            <v-col class="d-flex pr-md-12  mb-6" cols="12" md="5" sm="12" xs="12">
                <v-btn class="first_button"
                       style="border-radius: 10px;background-color: #F1485B;">
                    <skills_icon class="skill_icon" style="fill: #F5F2ED;"></skills_icon>

                </v-btn>

                <v-card
                    class="card_size pl-2"

                    style="border-radius: 15px;"


                >
                    <v-card-text>
                        <v-row>
                            <v-col cols="9" md="9" sm="10" xs="9">
                                <h3>Java</h3>
                                <v-progress-linear

                                    height="13"
                                    class="progress"

                                    color="#052137"
                                    background-color="#F1485B"
                                    value="56"
                                >

                                </v-progress-linear>
                            </v-col>
                            <v-col class="d-flex ma-0 pa-0" cols="3" md="3" sm="2" xs="3">

                                <v-divider


                                    vertical
                                    dark
                                    class="divider"

                                ></v-divider>
                                <h1 class="percentage">58%</h1>
                            </v-col>
                        </v-row>
                    </v-card-text>

                </v-card>
            </v-col>

            <v-col class="d-flex  mb-6 pl-md-12" cols="12" md="5" sm="12" xs="12">
                <v-btn class="first_button1"
                       style="border-radius: 10px;background-color: #F1485B;">

                    <skills_icon class="skill_icon" style="fill: #F5F2ED;"></skills_icon>
                </v-btn>

                <v-card
                    class="card_size pl-2"

                    style="border-radius: 15px;"
                >
                    <v-card-text>
                        <v-row>
                            <v-col cols="9" md="9" sm="10" xs="9">
                                <h3>Java</h3>
                                <v-progress-linear

                                    height="13"
                                    class="progress"

                                    color="#052137"
                                    background-color="#F1485B"
                                    value="56"
                                >

                                </v-progress-linear>
                            </v-col>
                            <v-col class="d-flex ma-0 pa-0" cols="3" md="3" sm="2" xs="3">

                                <v-divider


                                    vertical
                                    dark
                                    class="divider"

                                ></v-divider>
                                <h1 class="percentage">58%</h1>
                            </v-col>
                        </v-row>
                    </v-card-text>

                </v-card>
            </v-col>

        </v-row>

    </div>
</template>
<script>

    import skills_icon from './icons/skills.vue'

    export default {
        components: {skills_icon},

    }
</script>


<style scoped>
    .skill_icon {
        height: 36px;
        width: 36px;
    }

    .divider {
        background-color: rgba(13, 0, 26, 0.2);
        border: 1.5px solid rgba(0, 0, 0, 0.2);
    }

    .progress {
        border-radius: 10px;
        margin-top: 20px
    }

    .percentage {
        font-family: Roboto;
        font-style: normal;
        font-weight: 900;
        font-size: 28px;
        line-height: 56px;
        color: rgba(13, 0, 26, 0.2);
        margin-top: 15px;
        margin-left: 5px;

    }

    .card_size {
        max-width: 100%;
        min-width: 80%;
        border-radius: 15px;
        max-height: 110px;

    }

    .first_button {
        min-height: 110px;
        width: 110px;
        margin-right: 15px;
    }

    .first_button1 {
        min-height: 110px;
        width: 110px;
        margin-right: 15px;
    }

    .margin_top {
        margin-top: 5%;
        padding-left: 60px;
        font-family: Roboto;

    }


    @media only screen and (max-width: 960px) {


        .card_size {
            max-width: 100%;
            min-width: 100%;
        }

        .margin_top {
            margin-top: 5%;
            padding-left: 60px;
            padding-right: 180px;

        }

    }


    @media only screen and (max-width: 650px) {


        .card_size {
            min-width: 100%;
            max-height: 90px;
            max-width: 100%;
        }

        .first_button {
            min-height: 90px;
            width: 90px;
            margin-right: 3vw;

        }

        .first_button1 {
            min-height: 90px;
            width: 90px;
            margin-right: 3vw;

        }


        .margin_top {
            margin-top: 5%;
            padding-left: 20px;
            padding-right: 130px;
            margin-bottom: 1vw;


        }

        .progress {

            margin-top: 15px
        }

        v-card__subtitle, .v-card__text, .v-card__title {
            padding: 13px;
            padding-bottom: 0px;
        }

        .percentage {

            font-size: 28px;


        }
    }

    @media only screen and (max-width: 500px) {


        .margin_top {

            padding-right: 120px;


        }

        .percentage {

            font-size: 6vw;


        }
    }


</style>
