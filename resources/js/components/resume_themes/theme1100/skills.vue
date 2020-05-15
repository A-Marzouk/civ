<template>
    <div>
        <v-row class="hidden-sm-and-up" dense>
            <hr class="mt-2" style="height: 0.5px;border: 0.5px solid #5e507c">

            <v-avatar class="ma-0 ml-5" color="#5e507c" size="22" style="border: 5px solid #1a2947;display: inline">
            </v-avatar>
            <v-divider class="mt-2 ml-4" style="border: 0.5px solid #5e507c"></v-divider>


        </v-row>
        <v-row class="hidden-lg-and-up hidden-xs-only" dense>
            <hr class="mt-2" style="width: 44%;height: 0.5px;border: 0.5px solid #5e507c">

            <v-avatar class="ma-0 ml-5" color="#5e507c" size="22" style="border: 5px solid #1a2947;display: inline">
            </v-avatar>
            <v-divider class="mt-2 ml-4" style="border: 0.5px solid #5e507c"></v-divider>


        </v-row>
        <v-row class="hidden-md-and-down" dense>
            <hr style="width: 345px;height: 0.5px;border: 0.5px solid #5e507c" class="mt-2">

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
            <v-btn class="mr-4 mb-4 hidden-sm-and-up" height="62" max-width="62" min-width="1" style="border-radius: 10px">
                <cod></cod>
            </v-btn>
            <v-col class="d-flex pr-md-12 mb-6" cols="12" md="6" sm="12">
                <v-btn class=" hidden-xs-only mr-4 " height="62" max-width="62" min-width="1" style="border-radius: 10px">
                    <cod></cod>
                </v-btn>

                <v-card
                        class="card_size mx-auto pa-5"

                        style="border-radius: 15px"
                        max-width="100%"
                        min-width="90%"

                >
                    <v-card-text>
                        <v-btn style="text-transform: none" depressed color="#e6e2e9" small><span
                                style="color: #5e507c" class="font-weight-bold">Progamming</span>
                        </v-btn>
                        <br>
                        <br>
                        <div class="mb-4">
                            <div style="width: 95%">
                                <div class="font-weight-bold" style="color: #2f3458;display: inline;font-size: 17px">
                                    C/C+
                                </div>
                                <div style="font-size: 90%;display: inline;float: right;"
                                     class="arrow_box font-weight-bold">
                                    90%
                                </div>
                            </div>
                            <div class="Progress">
                                <progress max="100" value="90" class="Progress-main" aria-labelledby="Progress-id">
                                    <div class="Progress-bar" role="presentation">
                                        <span class="Progress-value" style="width: 90%;">&nbsp;</span>
                                    </div>
                                </progress>
                            </div>
                        </div>
                        <div class="mb-4">
                            <div style="width: 85%">
                                <div class="font-weight-bold" style="color: #2f3458;display: inline;font-size: 17px">
                                    Java
                                </div>
                                <div style="font-size: 90%;display: inline;float: right;"
                                     class="arrow_box font-weight-bold">
                                    80%
                                </div>
                            </div>
                            <div class="Progress">
                                <progress max="100" value="80" class="Progress-main" aria-labelledby="Progress-id">
                                    <div class="Progress-bar" role="presentation">
                                        <span class="Progress-value" style="width: 80%;">&nbsp;</span>
                                    </div>
                                </progress>
                            </div>
                        </div>
                        <div class="mb-4">
                            <div style="width: 90%">
                                <div class="font-weight-bold" style="color: #2f3458;display: inline;font-size: 17px">
                                   Python
                                </div>
                                <div style="font-size: 90%;display: inline;float: right;"
                                     class="arrow_box font-weight-bold">
                                    85%
                                </div>
                            </div>

                            <div class="Progress">
                                <progress max="100" value="85" class="Progress-main" aria-labelledby="Progress-id">
                                    <div class="Progress-bar" role="presentation">
                                        <span class="Progress-value" style="width: 85%;">&nbsp;</span>
                                    </div>
                                </progress>
                            </div>
                        </div>

                        <div style="width: 80%">
                            <div class="font-weight-bold" style="color: #2f3458;display: inline;font-size: 17px"> Php
                            </div>
                            <div style="font-size: 90%;display: inline;float: right;"
                                 class="arrow_box font-weight-bold">
                                75%
                            </div>
                        </div>

                        <div class="Progress">
                            <progress max="100" value="75" class="Progress-main" aria-labelledby="Progress-id">
                                <div class="Progress-bar" role="presentation">
                                    <span class="Progress-value" style="width: 75%;"></span>
                                </div>
                            </progress>
                        </div>
                    </v-card-text>

                </v-card>

            </v-col>

            <v-btn class="mr-4 mb-4 hidden-sm-and-up" height="62" max-width="62" min-width="1"
                   style="border-radius: 10px">
                <monitor></monitor>
            </v-btn>
            <v-col class="d-flex pl-md-12 mb-6" cols="12" md="6">

                <v-btn class="mr-4 hidden-xs-only" height="62" max-width="62" min-width="1" style="border-radius: 10px">
                    <monitor></monitor>
                </v-btn>
                <v-card
                        class="card_size mx-auto pa-5"
                        style="border-radius: 15px"
                        max-width="100%"
                        min-width="90%"
                >
                    <v-card-text>
                        <v-btn style="text-transform: none" depressed color="#e6e2e9" small><span
                                style="color: #5e507c" class="font-weight-bold">Software skills</span>
                        </v-btn>
                        <br>
                        <br>
                        <div class="mb-4">
                            <div style="width: 95%">
                                <div class="font-weight-bold" style="color: #2f3458;display: inline;font-size: 17px">
                                    Photoshop
                                </div>
                                <div style="font-size: 90%;display: inline;float: right;"
                                     class="arrow_box font-weight-bold">
                                    90%
                                </div>
                            </div>
                            <div class="Progress">
                                <progress max="100" value="90" class="Progress-main" aria-labelledby="Progress-id">
                                    <div class="Progress-bar" role="presentation">
                                        <span class="Progress-value" style="width: 90%;">&nbsp;</span>
                                    </div>
                                </progress>
                            </div>
                        </div>
                        <div class="mb-4">
                            <div style="width: 85%">
                                <div class="font-weight-bold" style="color: #2f3458;display: inline;font-size: 17px">
                                    Illustrator
                                </div>
                                <div style="font-size: 90%;display: inline;float: right;"
                                     class="arrow_box font-weight-bold">
                                    80%
                                </div>
                            </div>
                            <div class="Progress">
                                <progress max="100" value="80" class="Progress-main" aria-labelledby="Progress-id">
                                    <div class="Progress-bar" role="presentation">
                                        <span class="Progress-value" style="width: 80%;">&nbsp;</span>
                                    </div>
                                </progress>
                            </div>
                        </div>
                        <div class="mb-4">
                            <div style="width: 90%">
                                <div class="font-weight-bold" style="color: #2f3458;display: inline;font-size: 17px">
                                    Adobe
                                    xd
                                </div>
                                <div style="font-size: 90%;display: inline;float: right;"
                                     class="arrow_box font-weight-bold">
                                    85%
                                </div>
                            </div>

                            <div class="Progress">
                                <progress max="100" value="85" class="Progress-main" aria-labelledby="Progress-id">
                                    <div class="Progress-bar" role="presentation">
                                        <span class="Progress-value" style="width: 85%;">&nbsp;</span>
                                    </div>
                                </progress>
                            </div>
                        </div>

                        <div style="width: 80%">
                            <div class="font-weight-bold" style="color: #2f3458;display: inline;font-size: 17px"> Figma
                            </div>
                            <div style="font-size: 90%;display: inline;float: right;"
                                 class="arrow_box font-weight-bold">
                                75%
                            </div>
                        </div>

                        <div class="Progress">
                            <progress max="100" value="75" class="Progress-main" aria-labelledby="Progress-id">
                                <div class="Progress-bar" role="presentation">
                                    <span class="Progress-value" style="width: 75%;"></span>
                                </div>
                            </progress>
                        </div>

                    </v-card-text>

                </v-card>

            </v-col>

        </v-row>
    </div>
</template>
<script>
    import monitor from './icon/monitor.vue'
    import cod from './icon/code.vue'

    export default {
        components: {monitor, cod}
    }
</script>
<style scoped>

    .arrow_box {
        position: relative;
        background: #f9f9f9;
        border: 1px solid transparent;
        width: 40px;
        height: 20px;
        text-align: center;
        border-radius: 5px;
        box-shadow: 0px 2px 3px #BFAFB2;
    }

    .arrow_box:after, .arrow_box:before {
        top: 100%;
        left: 50%;
        border: solid transparent;
        content: " ";
        height: 0;
        width: 0;
        position: absolute;
        pointer-events: none;

    }

    .arrow_box:after {
        border-color: rgba(136, 183, 213, 0);
        border-top-color: #f9f9f9;
        border-width: 6px;
        margin-left: -6px;


    }

    .arrow_box:before {
        border-color: rgba(101, 117, 128, 0);
        border-top-color: transparent;
        border-width: 7px;
        margin-left: -7px;

    }


    .Progress-main {
        background-color: red;
        display: block;
        width: 100%;
        height: 0.7em;
        margin-top: 0.75em;
        border: 0.7px solid #5e507c;
        border-radius: 25px;
    }

    .Progress-main::-moz-progress-bar {
        background: #5e507c;
    }

    .Progress-main::-webkit-progress-bar {
        background: #ddd9e2;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2) inset;
    }

    .Progress-main::-webkit-progress-value {
        background: #5e507c;
    }

    .Progress-main::-ms-fill {
        background: #5e507c;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2) inset;
    }

    .Progress-bar {
        margin-top: 0.95em;
        background-color: #ddd9e2;
        height: 0.3em;
    }

    .Progress-value {
        background-color: #5e507c;
        display: block;
        height: 0.3em;
    }
    @media only screen and (max-width: 650px) {
        hr {
            width: 251px;
        }
        .card_size {
            width: 100%;
        }
    }
    @media only screen and (max-width: 523px) {
        hr {
            width: 207px;
        }
    }
    @media only screen and (max-width: 478px) {
        hr {
            width: 50%;
        }
    }

</style>

