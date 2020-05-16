<template>
    <div>
        <v-row class="hidden-sm-and-up" dense>
            <hr class="mt-2" style="height: 0.5px;border: 0.5px solid #5e507c">

            <v-avatar class="ma-0 ml-5" color="#5e507c" size="22" style="border: 5px solid #1a2947;display: inline">
            </v-avatar>

            <v-divider class="mt-2 ml-4" style="border: 0.5px solid #5e507c"></v-divider>


        </v-row>
        <v-row class="hidden-lg-and-up hidden-xs-only" dense>
            <hr class="mt-2" style="width: 57%;height: 0.5px;border: 0.5px solid #5e507c">

            <v-avatar class="ma-0 ml-5" color="#5e507c" size="22" style="border: 5px solid #1a2947;display: inline">
            </v-avatar>

            <v-divider class="mt-2 ml-4" style="border: 0.5px solid #5e507c"></v-divider>


        </v-row>
        <v-row class="hidden-md-and-down" dense>
            <hr style="width: 475px;height: 0.5px;border: 0.5px solid #5e507c" class="mt-2">

            <v-avatar style="border: 5px solid #1a2947;display: inline" color="#5e507c" size="22" class="ma-0 ml-5">
            </v-avatar>

            <v-divider class="mt-2 ml-4" style="border: 0.5px solid #5e507c"></v-divider>


        </v-row>
        <v-row
                class="mt-10 ml-2 mr-2  ml-md-8 pl-md-12 mr-md-6 pr-md-6 ml-sm-8 pl-sm-12 mr-sm-6 pr-sm-12"
                no-gutters
                dense
                align-content="center"

        >
               <v-btn class="hidden-sm-and-up mr-4 mb-4" height="62" max-width="62" min-width="1" style="border-radius: 10px">
                    <graduation></graduation>
                </v-btn>
            <v-col class="d-flex pr-md-12 mb-6" cols="12" md="6" sm="12">
                <v-btn class="hidden-xs-only mr-4" height="62" max-width="62" min-width="1" style="border-radius: 10px">
                    <graduation></graduation>
                </v-btn>

                <v-card
                        class="card_size mx-auto pa-5"

                        style="border-radius: 15px"


                >
                    <v-card-text>
                        <div class="university mb-2" style="color:#2f3458;">California institute of technology</div>
                        <div style="color: #555b62" class="ma-0 mb-1">M.sc in cse 15 May 2018 to 20 Dec 2019</div>
                        <div style="color: #555b62"> CGPA-3.90</div>

                    </v-card-text>

                </v-card>
            </v-col>
            <v-btn class="hidden-sm-and-up mr-4 mb-4" height="62" max-width="62" min-width="1" style="border-radius: 10px">
                    <graduation></graduation>
                </v-btn>
            <v-col class="d-flex pr-md-12 mb-6" cols="12" md="6" sm="12">
                <v-btn class="hidden-xs-only mr-4" height="62" max-width="62" min-width="1" style="border-radius: 10px">
                    <graduation></graduation>
                </v-btn>

                <v-card
                        class="card_size mx-auto pa-5"

                        style="border-radius: 15px"


                >
                    <v-card-text>
                        <div class="university mb-2" style="color:#2f3458;">California institute of technology</div>
                        <div style="color: #555b62" class="ma-0 mb-1">M.sc in cse 15 May 2018 to 20 Dec 2019</div>
                        <div style="color: #555b62"> CGPA-3.90</div>

                    </v-card-text>

                </v-card>
            </v-col>

        </v-row>
        <v-row
                class="mt-md-10 ml-2 mr-2  ml-md-8 pl-md-12 mr-md-8 pr-md-12 ml-sm-8 pl-sm-12 mr-sm-6 pr-sm-12"
                no-gutters
                dense
                align-content="center"

        >
             <v-btn class="hidden-sm-and-up mr-4 mb-4" height="62" max-width="62" min-width="1" style="border-radius: 10px">
                    <graduation></graduation>
                </v-btn>
            <v-col class="d-flex pr-md-12 mb-6" cols="12" md="6" sm="12">
                <v-btn class="hidden-xs-only mr-4" height="62" max-width="62" min-width="1" style="border-radius: 10px">
                    <graduation></graduation>
                </v-btn>

                <v-card
                        class="card_size mx-auto pa-5"

                        style="border-radius: 15px"


                >
                    <v-card-text>
                        <div class="university mb-2" style="color:#2f3458;">California institute of technology</div>
                        <div style="color: #555b62" class="ma-0 mb-1">M.sc in cse 15 May 2018 to 20 Dec 2019</div>
                        <div style="color: #555b62"> CGPA-3.90</div>

                    </v-card-text>

                </v-card>
            </v-col>


        </v-row>
    </div>
</template>
<script>
    import graduation from './icon/graduation.vue'

    export default {
        components: {graduation}
    }
</script>


<style scoped>
    .university
    {
        font-size: 18px;
        font-weight: 900;
    }
    .card_size {
        max-width:100%;
        min-width:90%;
    }

    @media only screen and (max-width: 650px) {
        hr {
            width: 350px;
        }

        .card_size {
            max-width:100%;
            min-width:100%;
        }
    }
    @media only screen and (max-width: 523px) {
        hr {
            width: 290px;
        }
    }
    @media only screen and (max-width: 478px) {
        hr {
            width: 64%;
        }
    }
    @media only screen and (max-width: 415px) {
        hr {
            width: 57%;
        }
    }
    @media only screen and (max-width: 380px) {
        hr {
            width: 53%;
        }
    }
</style>
