<template>
    <div class="margin_top">
        <payment_details></payment_details>
        <v-row
            class="body_fix"
            no-gutters
            dense
            align-content="center"

        >

            <v-col class="d-flex pr-md-12  mb-6" cols="12" md="5" sm="12" xs="12">
                <v-btn class="first_button"
                       style="border-radius: 10px;background-color: #4C4F9E;">
                    <education_icon class="education_icon" style="fill: #F5F2ED;">

                    </education_icon>
                </v-btn>

                <v-card
                    class="card_size"

                    style="border-radius: 15px;"


                >
                    <v-card-text>
                        <v-row no-gutters dense>
                            <h2 class="name_check">Ryerson University</h2>
                            <v-spacer></v-spacer>
                            <span class="date" style="margin-top: -5px;color:#B2B2B2;">29/08/2017</span>
                        </v-row>
                        <div class="place_check"> IBM LAB</div>
                        <div class="text-justify description">About is a
                            preposition or an adverb. … About as a preposition. The
                            most common
                        </div>


                    </v-card-text>

                </v-card>
            </v-col>

            <v-col class="d-flex  mb-6 pl-md-12" cols="12" md="5" sm="12" xs="12">
                <v-btn class="first_button1"
                       style="border-radius: 10px;background-color: #4C4F9E;">

                    <education_icon class="education_icon" style="fill: #F5F2ED;">

                    </education_icon>
                </v-btn>

                <v-card
                    class="card_size pa-4"

                    style="border-radius: 15px;"


                >
                    <v-row no-gutters dense>
                        <h2 class="name_check mb-1">Ryerson University</h2>
                        <v-spacer></v-spacer>
                        <span class="date" style="color: #B2B2B2;">29/08/2017</span>
                    </v-row>

                    <div class="description text-justify">About is a
                        preposition or an adverb. … About as a preposition. The
                        most common meaning .About as a prepositi
                    </div>

                </v-card>
            </v-col>

        </v-row>

    </div>
</template>
<script>
    import graduation from './education.vue'
    import payment_details from "./payment_details.vue";
    import education_icon from './icons/education.vue'

    export default {
        components: {graduation, payment_details, education_icon}
    }
</script>


<style scoped>
    .education_icon {
        height: 36px;
        width: 36px;
    }

    .date {
        font-size: 80%;
    }

    .description {
        color: #000000;
        font-size: 80%;
        line-height: 15px;
        font-family: Roboto;
    }

    .place_check {
        color: #000000;
        font-size: 120%;
        margin-bottom: 1px;
    }

    .name_check {
        font-size: 120%;
        color: #000000;
        margin-bottom: 1px;
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
        margin-top: 50px;
        padding-left: 60px;

    }


    @media only screen and (max-width: 960px) {


        .card_size {
            max-width: 100%;
            min-width: 100%;
        }

        .margin_top {
            margin-top: 50px;
            padding-left: 60px;
            padding-right: 180px;

        }

    }


    @media only screen and (max-width: 650px) {

        .date {
            font-size: 1.8vw;
        }

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


        .description {
            color: #000000;
            font-size: 12px;
            font-family: Roboto;
            line-height: 13px;


        }

        .place_check {

            font-size: 14px;

        }

        .name_check {
            font-size: 18px;

        }

        .margin_top {
            margin-top: 50px;
            padding-left: 20px;
            padding-right: 130px;
            margin-bottom: 1vw;

        }

    }

    @media only screen and (max-width: 500px) {

        .description {
            color: #000000;
            font-size: 2.2vw;
            font-family: Roboto;
            line-height: 10px;


        }

        .place_check {
            color: #000000;
            font-size: 2.6vw;
            font-weight: 500;
            margin-bottom: 0px;
        }

        .name_check {
            font-size: 3.4vw;
            color: #000000;
            margin-bottom: 0px;
            line-height: unset;

        }

        .margin_top {

            padding-right: 120px;


        }
    }


</style>
