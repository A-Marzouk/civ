<template>
    <div>
        <v-row class="hidden-sm-and-up" dense>
            <hr class=" mt-2" style="height: 0.5px;border: 0.5px solid #5e507c">

            <v-avatar class="ma-0 ml-5" color="#5e507c" size="22" style="border: 5px solid #1a2947;display: inline">
            </v-avatar>

            <v-divider class="mt-2 ml-4" style="border: 0.5px solid #5e507c"></v-divider>


        </v-row>
        <v-row class="hidden-lg-and-up hidden-xs-only" dense>
            <hr class="mt-2" style="width:18%;height: 0.5px;border: 0.5px solid #5e507c">

            <v-avatar class="ma-0 ml-5" color="#5e507c" size="22" style="border: 5px solid #1a2947;display: inline">
            </v-avatar>

            <v-divider class="mt-2 ml-4" style="border: 0.5px solid #5e507c"></v-divider>
        </v-row>
        <v-row class="hidden-md-and-down" dense>
            <hr style="width: 80px;height: 0.5px;border: 0.5px solid #5e507c" class="mt-2">

            <v-avatar style="border: 5px solid #1a2947;display: inline" color="#5e507c" size="22" class="ma-0 ml-5">
            </v-avatar>

            <v-divider class="mt-2 ml-4" style="border: 0.5px solid #5e507c"></v-divider>


        </v-row>
        <v-row
                class="mt-10 ml-2 mr-2  ml-md-6 pl-md-12 mr-md-12 pr-md-12 ml-sm-12 pl-sm-6 mr-sm-12 pr-sm-4"
                no-gutters
                dense
                align-content="center"


        >
            <v-btn class="mr-4 mb-4 hidden-sm-and-up" height="62" max-width="62" min-width="1"
                   style="border-radius: 10px">
                <tie></tie>
            </v-btn>

            <v-col class="d-flex  pr-md-12 mb-6 " cols="12" md="6" sm="12">
                <v-btn class="mr-4 hidden-xs-only" height="62" max-width="62" min-width="1"
                       style="border-radius: 10px">
                    <tie></tie>
                </v-btn>

                <v-card
                        class="mx-auto pa-5 "

                        style="border-radius: 15px"
                        max-width="100%"
                        min-width="90%"

                >
                    <v-card-text>
                        <h3 class=" text--primary text-justify">
                            Hi!
                        </h3>
                        <div style="color: #7c8084;font-size: 90%" class=" text-justify font-weight-medium">
                            I'm a paragraph. Click here to add your own text and edit me. It’s easy. Just click
                            “Edit Text” or double click me to add your own content and make changes to the font.
                            Feel free to drag and drop me anywhere you like on your page. I’m a great place for you
                            to tell a story and let your users know a little more about you.
                        </div>
                        <br>
                        <div style="color: #7c8084;font-size: 90%" class=" text-justify font-weight-medium">

                            This is a great space to write a long text about your company and your services. You can
                            use this space to go into a little more detail about your company. Talk about your team
                            and what services you provide. Tell your visitors the story of how you came up with the
                            idea for your business and what makes you different from your competitors. Make your
                            company stand out and show your visitors who you are.
                        </div>
                    </v-card-text>

                </v-card>

            </v-col>
            <v-btn class="mr-4 mb-4 hidden-sm-and-up" height="62" max-width="62" min-width="1"
                   style="border-radius: 10px">
                <contact></contact>
            </v-btn>

            <v-col class="d-flex pl-md-12 mb-6 hidden-sm-and-down" cols="12" md="6" sm="12">

                <v-btn class="hidden-xs-only mr-md-4 mr-sm-4 pb-4" height="62" max-width="62" min-width="1"
                       style="border-radius: 10px">
                    <contact></contact>
                </v-btn>
                <v-card
                        class="card_size mx-auto pa-5"
                        style="border-radius: 15px"
                        max-width="100%"
                        min-width="90%"

                >
                    <v-card-text>
                        <div>
                            <h4 class="text--primary text-justify mb-1">
                                Phone Number
                            </h4>
                            <v-divider class="mb-1" style="width: 35%; border: 0.6px solid #282828"></v-divider>
                            <div style="color: #7c8084;font-size: 90%;font-weight: bold" class=" text-justify">
                                +004 123 8896 222
                            </div>
                            <div style="color: #7c8084;font-size: 90%;font-weight: bold" class=" text-justify">
                                +004 123 8896 222
                            </div>
                        </div>
                        <br>

                        <div>
                            <h4 class="text--primary text-justify mb-1">
                                Email
                            </h4>
                            <v-divider class="mb-1" style="width: 35%; border: 0.6px solid #282828"></v-divider>
                            <div style="color: #7c8084;font-size: 90%;font-weight: bold" class=" text-justify">
                                timothi.brewer@gmail.com
                            </div>
                            <div style="color: #7c8084;font-size: 90%;font-weight: bold" class=" text-justify">
                                timothi.brower123@gmail.com
                            </div>
                        </div>
                        <br>
                        <div>
                            <h4 class="text--primary text-justify mb-1">
                                Social Ntwork
                            </h4>
                            <v-divider class="mb-1" style="width: 35%; border: 0.6px solid #282828"></v-divider>
                            <div style="color: #7c8084;font-size: 90%;font-weight: bold" class=" text-justify">
                                wwww.facebook.com/timothibrwer
                            </div>
                            <div style="color: #7c8084;font-size: 90%;font-weight: bold" class=" text-justify">
                                www.twitter.com/timothibrewer
                            </div>
                        </div>

                    </v-card-text>

                </v-card>

            </v-col>

        </v-row>

    </div>
</template>
<script>
    import contact from './icon/contact.vue'
    import tie from './icon/tie.vue'


    export default {
        components: {contact, tie},

    }
</script>
<style scoped>
    @media only screen and (max-width: 650px) {
        hr {
            width: 13%;
        }
        .card_size {
            width: 100%;
        }
    }
    @media only screen and (max-width: 523px) {
        hr {
            width: 30px;
        }
    }
    @media only screen and (max-width: 478px) {
        hr {
            width: 80px;
        }
    }
</style>
