<template>
    <div>
        <v-row class="hidden-sm-and-up" dense>
            <hr class="mt-2" style="height: 0.5px;border: 0.5px solid #5e507c">

            <v-avatar class="ma-0 ml-5" color="#5e507c" size="22" style="border: 5px solid #1a2947;display: inline">
            </v-avatar>

            <v-divider class="mt-2 ml-4" style="border: 0.5px solid #5e507c"></v-divider>


        </v-row>
        <v-row class="hidden-lg-and-up hidden-xs-only" dense>
            <hr class="mt-2" style="width: 69%;height: 0.5px;border: 0.5px solid #5e507c">

            <v-avatar class="ma-0 ml-5" color="#5e507c" size="22" style="border: 5px solid #1a2947;display: inline">
            </v-avatar>

            <v-divider class="mt-2 ml-4" style="border: 0.5px solid #5e507c"></v-divider>


        </v-row>
        <v-row class="hidden-md-and-down" dense>
            <hr style="width: 605px;height: 0.5px;border: 0.5px solid #5e507c" class="mt-2">

            <v-avatar style="border: 5px solid #1a2947;display: inline" color="#5e507c" size="22" class="ma-0 ml-5">
            </v-avatar>

            <v-divider class="mt-2 ml-4" style="border: 0.5px solid #5e507c"></v-divider>


        </v-row>

        <v-row
                class="mt-10 ml-2 mr-2 ml-md-8 pl-md-12 mr-md-12 pr-md-12 ml-sm-8 pl-sm-12 mr-sm-6 pr-sm-12"
                no-gutters
                dense
                align-content="center"

        >
            <v-btn class="hidden-sm-and-up mr-4 mb-4" height="62" max-width="62" min-width="1"
                   style="border-radius: 10px">
                <debate></debate>
            </v-btn>
            <v-col class="d-flex pr-md-12 mb-6" cols="12" md="6" sm="12">
                <v-btn class="hidden-xs-only mr-4" height="62" max-width="62" min-width="1" style="border-radius: 10px">
                    <debate></debate>
                </v-btn>

                <v-card
                        class="card_size mx-auto pa-md-5 pa-sm-5 pr-4"

                        style="border-radius: 15px"


                >
                    <v-card-text>
                        <v-btn style="text-transform: none" depressed color="#e6e2e9" small><span
                                style="color: #5e507c">Debating</span>
                        </v-btn>
                        <br>
                        <br>
                        <v-row class="ml-1 mb-2">
                            <champion></champion>
                            <div class="ml-1">
                                <h3 class="mb-1 mt-1 ml-2 font-weight-bold" style="color: #2f3458">Champion,National Debate - 2008 </h3>
                                <div class="ml-2" style="color: #5e507c;font-weight:bold">Organized by ILO</div>

                            </div>
                        </v-row>
                        <v-row class="ml-1 mb-2">
                            <champion></champion>
                            <div class="ml-1">
                                <h3 class="mb-1 mt-1 ml-2 font-weight-bold" style="color: #2f3458">Champion,National Debate - 2008 </h3>
                                <div class="ml-2" style="color: #5e507c;font-weight:bold">Organized by ILO</div>

                            </div>
                        </v-row>


                    </v-card-text>

                </v-card>
            </v-col>

            <v-btn class="hidden-sm-and-up mr-4 mb-4" height="62" max-width="62" min-width="1"
                   style="border-radius: 10px">
                <drawing></drawing>
            </v-btn>
            <v-col class="d-flex pl-md-12 mb-6" cols="12" md="6" sm="12">
                <v-spacer class="hidden-xs-only"></v-spacer>
                <v-btn class="hidden-xs-only mr-4" height="62" max-width="62" min-width="1" style="border-radius: 10px">
                    <drawing></drawing>
                </v-btn>

                <v-card
                        class="card_size pa-md-5 pa-sm-5"

                        style="border-radius: 15px"


                >
                    <v-card-text>
                        <v-btn style="text-transform: none" depressed color="#e6e2e9" small><span
                                style="color: #5e507c">Drawing</span>
                        </v-btn>
                        <br>

                        <v-list class=" mt-2">

                            <v-list-item
                                    class="ma-0 pa-0"
                            >
                                <champion class="mb-md-8 mb-sm-8 mb-12" ></champion>

                                <v-list-item-content>
                                    <h3 class="ml-3 mb-2 font-weight-bold" style="color: #2f3458">Champion,Victory day art competition-2019</h3>
                                    <div class="ml-3" style="color: #5e507c;font-weight:bold">Bangla Academy,Dhaka </div>

                                </v-list-item-content>
                            </v-list-item>

                        </v-list>
                    </v-card-text>

                </v-card>

            </v-col>
        </v-row>
    </div>
</template>

<script>
    import drawing from './icon/drawing.vue'
    import champion from './icon/champion.vue'
    import debate from './icon/debate.vue'

    export default {
        components: {drawing, champion, debate}
    }
</script>

<style scoped>
    .card_size {
        max-width:100%;
        min-width:90%;
    }
    @media only screen and (max-width: 650px) {
        hr {
            width: 435px;
        }
        .card_size {
            max-width:100%;
            min-width:100%;
        }
    }
    @media only screen and (max-width: 523px) {
        hr {
            width: 385px;
        }
    }
    @media only screen and (max-width: 478px) {
        hr {
            width: 83%;
        }
    }
    @media only screen and (max-width: 415px) {
        hr {
            width: 80%;
        }
    }
    @media only screen and (max-width: 380px) {
        hr {
            width: 78%;
        }
    }
</style>

