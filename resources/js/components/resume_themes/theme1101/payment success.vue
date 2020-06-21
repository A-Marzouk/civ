<template>
    <div>
        <v-row justify="center"
        >

            <v-dialog v-model="d"
                      persistent
                      width="700"


            >
                <v-card height="500" class="text-center background"
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

                    <h2 style="margin-top: 170px;font-size: 30px" class="choose text-center">Thank You, your payment was
                        successful</h2>

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
                d: false,

            }
        },
        methods:
            {
                send() {
                    this.d = false;
                    EventBus.$emit('newdialog', this.d);
                },
            },
        computed: {
            dialog() {
                this.d = this.data;
            }
        },
    }
</script>
<style scoped>

    .choose {
        font-family: Poppins;
        font-style: normal;
        font-weight: 900;

        color: #052137;
        text-transform: none;
        letter-spacing: -0.5px;
        line-height: 30px;


    }

    .background {
        background-color: #F5F2ED!important;
    }

    @media only screen and (max-width: 960px) {

        .background {
            background-color: #FDDB69!important;
        }
    }
</style>
