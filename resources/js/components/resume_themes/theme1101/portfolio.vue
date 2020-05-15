<template>
    <div style="margin-top: 50px" class="margin_top">
        <image_size :data="dialog" :image="dataimage"></image_size>
        <v-row

            no-gutters
            dense
            class="hidden-sm-and-down"
        >
            <v-col cols="12" md="4" sm="6">
                <v-card style="border-radius: 15px" flat class="mx-auto ml-2" max-width="100%">
                    <v-img @click="imagebig(image)" :src="'/images/resume_themes/theme1101/'+this.image"></v-img>
                </v-card>
            </v-col>
            <v-col cols="12" md="8" sm="6">
                <v-row

                    no-gutters
                    dense

                >
                    <v-col class="pl-2 pb-4" cols="12" md="3" sm="6">
                        <v-card style="border-radius: 15px" flat class="mx-auto" max-width="100%">
                            <v-img @click="imagebig(image)"
                                   :src="'/images/resume_themes/theme1101/'+this.image"></v-img>
                        </v-card>
                    </v-col>
                    <v-col class="pl-2 pb-4" cols="12" md="3" sm="6">
                        <v-card style="border-radius: 15px" flat class="mx-auto" max-width="100%">
                            <v-img @click="imagebig(image28)"
                                   :src="'/images/resume_themes/theme1101/'+this.image28"></v-img>

                        </v-card>
                    </v-col>
                    <v-col class="pl-2 pb-4" cols="12" md="3" sm="6">
                        <v-card style="border-radius: 15px" flat class="mx-auto" max-width="100%">
                            <v-img @click="imagebig(image29)"
                                   :src="'/images/resume_themes/theme1101/'+this.image29"></v-img>

                        </v-card>
                    </v-col>
                    <v-col class="pl-2 pb-4" cols="12" md="3" sm="6">
                        <v-card style="border-radius: 15px" flat class="mx-auto" max-width="100%">
                            <v-img @click="imagebig(image32)"
                                   :src="'/images/resume_themes/theme1101/'+this.image32"></v-img>

                        </v-card>
                    </v-col>
                    <v-col class="pl-2 pb-4" cols="12" md="3" sm="3">
                        <v-card style="border-radius: 15px" flat class="mx-auto" max-width="100%">
                            <v-img @click="imagebig(image33)"
                                   :src="'/images/resume_themes/theme1101/'+this.image33"></v-img>

                        </v-card>
                    </v-col>
                    <v-col class="pl-2 pb-4" cols="12" md="3" sm="3">
                        <v-card style="border-radius: 15px" flat class="mx-auto" max-width="100%">

                            <v-img @click="imagebig(image122)"
                                   :src="'/images/resume_themes/theme1101/'+this.image122"></v-img>

                        </v-card>
                    </v-col>
                    <v-col class="pl-2 pb-4" cols="12" md="3" sm="3">
                        <v-card style="border-radius: 15px" flat class="mx-auto" max-width="100%">

                            <v-img @click="imagebig(image123)"
                                   :src="'/images/resume_themes/theme1101/'+this.image123"></v-img>

                        </v-card>
                    </v-col>
                    <v-col class="pl-2 pb-4" cols="12" md="3" sm="3">
                        <v-card style="border-radius: 15px" flat class="mx-auto" max-width="100%">
                            <v-img @click="imagebig(image124)"
                                   :src="'/images/resume_themes/theme1101/'+this.image124"></v-img>

                        </v-card>
                    </v-col>


                </v-row>
            </v-col>


        </v-row>
        <v-row

            no-gutters
            dense
            class="hidden-md-and-up hidden-xs-only"
        >
            <v-col cols="12" md="4" sm="6">
                <v-card style="border-radius: 15px" flat class="mx-auto ml-2" max-width="100%">
                    <v-img @click="imagebig(image)" :src="'/images/resume_themes/theme1101/'+this.image"></v-img>
                </v-card>
            </v-col>
            <v-col cols="12" md="8" sm="6">
                <v-row

                    no-gutters
                    dense

                >
                    <v-col class="pl-2 pb-4" cols="12" md="3" sm="6">
                        <v-card style="border-radius: 15px" flat class="mx-auto" max-width="100%">
                            <v-img @click="imagebig(image)"
                                   :src="'/images/resume_themes/theme1101/'+this.image"></v-img>

                        </v-card>
                    </v-col>
                    <v-col class="pl-2 pb-4" cols="12" md="3" sm="6">
                        <v-card style="border-radius: 15px" flat class="mx-auto" max-width="100%">
                            <v-img @click="imagebig(image28)"
                                   :src="'/images/resume_themes/theme1101/'+this.image28"></v-img>

                        </v-card>
                    </v-col>
                    <v-col class="pl-2 pb-4" cols="12" md="3" sm="6">
                        <v-card style="border-radius: 15px" flat class="mx-auto" max-width="100%">
                            <v-img @click="imagebig(image29)"
                                   :src="'/images/resume_themes/theme1101/'+this.image29"></v-img>

                        </v-card>
                    </v-col>
                    <v-col class="pl-2 pb-4" cols="12" md="3" sm="6">
                        <v-card style="border-radius: 15px" flat class="mx-auto" max-width="100%">
                            <v-img @click="imagebig(image32)"
                                   :src="'/images/resume_themes/theme1101/'+this.image32"></v-img>

                        </v-card>
                    </v-col>

                </v-row>
            </v-col>

            <v-col class="d-flex pl-2 pb-4" cols="12" md="3" sm="3">
                <v-card style="border-radius: 15px" flat class="mx-auto" max-width="100%">
                    <v-img @click="imagebig(image33)" :src="'/images/resume_themes/theme1101/'+this.image33"></v-img>

                </v-card>
            </v-col>
            <v-col class="d-flex pl-2 pb-4" cols="12" md="3" sm="3">
                <v-card style="border-radius: 15px" flat class="mx-auto" max-width="100%">
                    <v-img @click="imagebig(image122)" :src="'/images/resume_themes/theme1101/'+this.image122"></v-img>

                </v-card>
            </v-col>
            <v-col class="d-flex pl-2 pb-4" cols="12" md="3" sm="3">
                <v-card style="border-radius: 15px" flat class="mx-auto" max-width="100%">
                    <v-img @click="imagebig(image123)" :src="'/images/resume_themes/theme1101/'+this.image123"></v-img>

                </v-card>
            </v-col>
            <v-col class="d-flex pl-2 pb-4" cols="12" md="3" sm="3">
                <v-card style="border-radius: 15px" flat class="mx-auto" max-width="100%">
                    <v-img @click="imagebig(image124)" :src="'/images/resume_themes/theme1101/'+this.image124"></v-img>

                </v-card>
            </v-col>
            <v-col class="d-flex pl-2 pb-4" cols="12" md="3" sm="3">
                <v-card style="border-radius: 15px" flat class="mx-auto" max-width="100%">
                    <v-img @click="imagebig(image124)" :src="'/images/resume_themes/theme1101/'+this.image124"></v-img>


                </v-card>
            </v-col>
            <v-col class="d-flex pl-2 pb-4" cols="12" md="3" sm="3">
                <v-card style="border-radius: 15px" flat class="mx-auto" max-width="100%">
                    <v-img @click="imagebig(image124)" :src="'/images/resume_themes/theme1101/'+this.image124"></v-img>


                </v-card>
            </v-col>
            <v-col class="d-flex pl-2 pb-4" cols="12" md="3" sm="3">
                <v-card style="border-radius: 15px" flat class="mx-auto" max-width="100%">
                    <v-img @click="imagebig(image124)" :src="'/images/resume_themes/theme1101/'+this.image124"></v-img>


                </v-card>
            </v-col>
            <v-col class="d-flex pl-2 pb-4" cols="12" md="3" sm="3">
                <v-card style="border-radius: 15px" flat class="mx-auto" max-width="100%">
                    <v-img @click="imagebig(image124)" :src="'/images/resume_themes/theme1101/'+this.image124"></v-img>

                </v-card>
            </v-col>

        </v-row>
        <v-row

            no-gutters
            dense
            class="hidden-sm-and-up"
        >


            <v-col class="d-flex pl-2 pb-4" cols="4">
                <v-card style="border-radius: 15px" flat class="mx-auto" max-width="100%">
                    <v-img @click="imagebig(image33)" :src="'/images/resume_themes/theme1101/'+this.image33"></v-img>

                </v-card>
            </v-col>
            <v-col class="d-flex pl-2 pb-4" cols="4">
                <v-card style="border-radius: 15px" flat class="mx-auto" max-width="100%">
                    <v-img @click="imagebig(image122)" :src="'/images/resume_themes/theme1101/'+this.image122"></v-img>

                </v-card>
            </v-col>
            <v-col class="d-flex pl-2 pb-4" cols="4">
                <v-card style="border-radius: 15px" flat class="mx-auto" max-width="100%">
                    <v-img @click="imagebig(image123)" :src="'/images/resume_themes/theme1101/'+this.image123"></v-img>

                </v-card>
            </v-col>
            <v-col class="d-flex pl-2 pb-4" cols="4">
                <v-card style="border-radius: 15px" flat class="mx-auto" max-width="100%">
                    <v-img @click="imagebig(image33)" :src="'/images/resume_themes/theme1101/'+this.image33"></v-img>

                </v-card>
            </v-col>
            <v-col class="d-flex pl-2 pb-4" cols="4">
                <v-card style="border-radius: 15px" flat class="mx-auto" max-width="100%">
                    <v-img @click="imagebig(image122)" :src="'/images/resume_themes/theme1101/'+this.image122"></v-img>

                </v-card>
            </v-col>
            <v-col class="d-flex pl-2 pb-4" cols="4">
                <v-card style="border-radius: 15px" flat class="mx-auto" max-width="100%">
                    <v-img @click="imagebig(image123)" :src="'/images/resume_themes/theme1101/'+this.image123"></v-img>

                </v-card>
            </v-col>
            <v-col class="d-flex pl-2 pb-4" cols="4">
                <v-card style="border-radius: 15px" flat class="mx-auto" max-width="100%">
                    <v-img @click="imagebig(image33)" :src="'/images/resume_themes/theme1101/'+this.image33"></v-img>

                </v-card>
            </v-col>
            <v-col class="d-flex pl-2 pb-4" cols="4">
                <v-card style="border-radius: 15px" flat class="mx-auto" max-width="100%">
                    <v-img @click="imagebig(image122)" :src="'/images/resume_themes/theme1101/'+this.image122"></v-img>

                </v-card>
            </v-col>
            <v-col class="d-flex pl-2 pb-4" cols="4">
                <v-card style="border-radius: 15px" flat class="mx-auto" max-width="100%">
                    <v-img @click="imagebig(image123)" :src="'/images/resume_themes/theme1101/'+this.image123"></v-img>

                </v-card>
            </v-col>
            <v-col class="d-flex pl-2 pb-4" cols="4">
                <v-card style="border-radius: 15px" flat class="mx-auto" max-width="100%">
                    <v-img @click="imagebig(image33)" :src="'/images/resume_themes/theme1101/'+this.image33"></v-img>

                </v-card>
            </v-col>
            <v-col class="d-flex pl-2 pb-4" cols="4">
                <v-card style="border-radius: 15px" flat class="mx-auto" max-width="100%">
                    <v-img @click="imagebig(image122)" :src="'/images/resume_themes/theme1101/'+this.image122"></v-img>

                </v-card>
            </v-col>
            <v-col class="d-flex pl-2 pb-4" cols="4">
                <v-card style="border-radius: 15px" flat class="mx-auto" max-width="100%">
                    <v-img @click="imagebig(image123)" :src="'/images/resume_themes/theme1101/'+this.image123"></v-img>

                </v-card>
            </v-col>

        </v-row>
    </div>
</template>
<script>
    import image_size from "./image_size";

    export default {
        components: {image_size},
        data() {
            return {
                image: 'Rectangle 27.jpg',
                dialog: null,
                dataimage: null,
                image28: 'Rectangle 28.jpg',
                image29: 'Rectangle 29.jpg',
                image32: 'Rectangle 32.jpg',
                image33: 'Rectangle 33.jpg',
                image122: 'Rectangle 122.jpg',
                image123: 'Rectangle 123.jpg',
                image124: 'Rectangle 124.jpg',


            }
        },
        created() {
            this.listen();
        },
        methods:
            {
                listen() {
                    EventBus.$on('closeImage', (ann) => {
                        this.dialog = false;
                    })
                },
                imagebig(image) {
                    this.dialog = true;
                    this.dataimage = image;

                }
            }
    }
</script>
<style scoped>
    @media only screen and (max-width: 650px) {
        .margin_top {
            margin-top: -30px;
        }
    }
</style>
