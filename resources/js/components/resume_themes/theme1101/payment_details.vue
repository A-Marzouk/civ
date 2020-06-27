<template>
    <div>
        <v-row justify="center"
        >

            <v-dialog v-model="dialog4"
                      persistent
                      width="700"


            >
                <v-card height="500" class="background"
                        tile>
                    <v-toolbar
                            flat
                            color="#FDDB69"
                            class="hidden-md-and-up"
                    >

                        <v-spacer></v-spacer>

                        <v-btn
                                icon

                                @click="send"

                        >

                            <v-icon small color="#052137">mdi-close</v-icon>
                        </v-btn>
                    </v-toolbar>
                    <v-toolbar
                            flat
                            color="#F5F2ED"
                            class="hidden-sm-and-down"


                    >


                        <v-spacer></v-spacer>

                        <v-btn
                                icon

                                @click="send"

                        >

                            <v-icon small color="#052137">mdi-close</v-icon>
                        </v-btn>
                    </v-toolbar>
                    <v-card-text>
                        <h1 class="choose text-center mt-2">Fill in your details</h1>
                    </v-card-text>
                    <div class="text-center ">
                        <v-row style="padding-top: 7%" class="ml-12 mr-12 pr-2 pl-2" justify="center" dense no-gutters>
                            <v-col cols="12" md="6" sm="12" align-self="center">
                                <div style="color:#1D1D1D;font-weight: 700" class="text-left ml-6 mb-2">E-mail</div>
                                <v-text-field

                                        outlined
                                        class="hidden-md-and-up pr-md-2"
                                        placeholder="example@civie.com"
                                        type="email"
                                        background-color="white"
                                ></v-text-field>
                                <v-text-field

                                        outlined
                                        class="hidden-sm-and-down pr-md-2"
                                        placeholder="example@civie.com"
                                        type="email"

                                ></v-text-field>

                            </v-col>
                            <v-col cols="12" md="6" sm="12">
                                <div style="color:#1D1D1D;font-weight: 700" class="text-left ml-6 ml-md-8 mb-2">
                                    Password
                                </div>
                                <v-text-field
                                        placeholder="password"
                                        outlined
                                        class="pl-md-2 hidden-md-and-up"
                                        type="password"
                                        background-color="white"

                                ></v-text-field>
                                <v-text-field
                                        placeholder="password"
                                        outlined
                                        class="pl-md-2 hidden-sm-and-down"
                                        type="password"


                                ></v-text-field>

                            </v-col>
                        </v-row>
                    </div>
                    <div class="text-center">
                        <v-btn @click="payment" depressed
                               style="padding-left: 70px;padding-right: 70px;"
                               class="choose"> Pay
                        </v-btn>
                    </div>
                    <div style="flex: 1 1 auto;"></div>
                </v-card>
            </v-dialog>

        </v-row>
        {{dialog}}
    </div>
</template>
<script>
    export default {
        props: ['data'],
        data() {
            return {
                dialog4: false,
                dialog5:false,

            }
        },
        methods:
            {
                send() {
                    this.dialog4 = false;
                    EventBus.$emit('newdialog', this.dialog4);
                },
                payment()
                {

                    this.dialog4 = false;
                    this.dialog5=false;
                    EventBus.$emit('newPay', this.dialog5);
                },
            },
        computed: {
            dialog() {
                this.dialog4 = this.data;
            }
        },
    }
</script>
<style scoped>
    h1
    {

        font-size: 32px;

    }
    .choose {
        font-family: Poppins;
        font-style: normal;
        font-weight: 900;

        color: #052137;
        text-transform: none;
        letter-spacing: -0.5px;
        line-height: 30px;
        margin-top: 10%

    }

    .background {
        background-color: #F5F2ED!important;
    }

    .theme--light.v-btn:not(.v-btn--flat):not(.v-btn--text):not(.v-btn--outlined) {
        background-color: #FDDB69!important;
    }

    @media only screen and (max-width: 960px) {

        .background {
            background-color: #FDDB69!important;
        }

        .theme--light.v-btn:not(.v-btn--flat):not(.v-btn--text):not(.v-btn--outlined) {
            background-color: #FFFFFF!important;
        }

        .choose {

            margin-top: 10px;

        }
    }
</style>
