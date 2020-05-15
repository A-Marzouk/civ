<template>
    <div>

        <v-row justify="center"
        >

            <v-dialog persistent v-model="data"

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
                        <h1 class="choose text-center mt-8">Choose Your Payment method</h1>
                    </v-card-text>
                    <div class="text-center">
                        <v-row style="padding-top: 20%" class="ml-12 mr-12 pr-md-12 pl-md-12" justify="center" dense
                               no-gutters>
                            <v-col cols="12" md="6" sm="12" align-self="center">

                                <v-btn @click="payment_option" depressed class="choose choose1"><span
                                    class="font-italic font-weight-bold"
                                    style="color: #003087;font-size: 8px">Pay</span> <span
                                    style="color: #009CDE;font-size: 8px"
                                    class="font-italic font-weight-bold mr-3">Pal</span>Pay
                                    with Paypal
                                </v-btn>
                            </v-col>
                            <v-col cols="12" md="6" sm="12">
                                <v-btn @click="payment_option" depressed class="choose pr-6">
                                    <stripe class="stripe_icon mr-3"></stripe>
                                    Pay with Stripe
                                </v-btn>
                            </v-col>
                        </v-row>
                    </div>
                    <div style="flex: 1 1 auto;"></div>
                </v-card>
            </v-dialog>

        </v-row>
    </div>
</template>
<script>
    import payment_details from "./payment_details.vue";
    import stripe from './icons/stripe.vue'

    export default {
        props: ['data'],
        components: {payment_details, stripe},


        data() {
            return {
                d: false,
                d2: false,


            }
        },

        computed: {
            dialog() {
                this.d = this.data;
            }
        },
        methods:
            {
                send() {
                    this.d = false;
                    EventBus.$emit('newdialog', this.d);
                },
                payment_option() {
                    this.d2 = true;
                    EventBus.$emit('newPayment', this.d2);
                },
            }
    }
</script>
<style scoped>
    h1 {
        font-size: unset;
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


    }

    .stripe_icon {
        height: 15px;
        width: 27px;
    }

    .background {
        background-color: #F5F2ED;
    }

    .theme--light.v-btn:not(.v-btn--flat):not(.v-btn--text):not(.v-btn--outlined) {
        background-color: #FDDB69;
    }

    @media only screen and (max-width: 960px) {
        .choose1 {
            margin-top: -80px;
        }

        .background {
            background-color: #FDDB69;
        }

        .theme--light.v-btn:not(.v-btn--flat):not(.v-btn--text):not(.v-btn--outlined) {
            background-color: #FFFFFF;
        }
    }
</style>
