<template>
    <div>
        <v-row class="hidden-sm-and-up" dense no-gutters>
            <hr class="mt-2" style="height: 0.5px;border: 0.5px solid #5e507c">

            <v-avatar class="ma-0 ml-5" color="#5e507c" size="22" style="border: 5px solid #1a2947;display: inline">
            </v-avatar>

            <v-divider class="mt-2 ml-4" style="border: 0.5px solid #5e507c"></v-divider>


        </v-row>
        <v-row class="hidden-lg-and-up hidden-xs-only" dense no-gutters>
            <hr class="mt-2" style="width: 32%;height: 0.5px;border: 0.5px solid #5e507c">

            <v-avatar class="ma-0 ml-5" color="#5e507c" size="22" style="border: 5px solid #1a2947;display: inline">
            </v-avatar>

            <v-divider class="mt-2 ml-4" style="border: 0.5px solid #5e507c"></v-divider>


        </v-row>
        <v-row class="hidden-md-and-down" dense no-gutters>
            <hr style="width: 215px;height: 0.5px;border: 0.5px solid #5e507c" class="mt-2">

            <v-avatar style="border: 5px solid #1a2947;display: inline" color="#5e507c" size="22" class="ma-0 ml-5">
            </v-avatar>

            <v-divider class="mt-2 ml-4" style="border: 0.5px solid #5e507c"></v-divider>


        </v-row>
        <v-row
                class="mt-10 ml-md-12 pl-md-6 mr-md-12 pr-md-6"
                no-gutters
                dense
                align-content="center"
        >
            <v-col class="d-flex mb-8" cols="12" md="3" sm="6">
                <v-card style="border-radius: 15px" flat class="mx-auto" max-width="95%" max-height="300">
                    <v-img src="/images/resume_themes/theme1100/app_01.jpg"></v-img>
                </v-card>
            </v-col>
            <v-col class="d-flex mb-8" cols="12" md="3" sm="6">
                <v-card style="border-radius: 15px" flat class="mx-auto" max-width="95%" max-height="300">
                    <v-img src="/images/resume_themes/theme1100/fitness_club-statics_schedule_2x.jpg"></v-img>
                </v-card>
            </v-col>
            <v-col class="d-flex mb-8" cols="12" md="3" sm="6">
                <v-card style="border-radius: 15px" flat class="mx-auto" max-width="95%" max-height="300">
                    <v-img src="/images/resume_themes/theme1100/dribbble_fitness_2x_2x.jpg"></v-img>
                </v-card>
            </v-col>
            <v-col class="d-flex mb-8" cols="12" md="3" sm="6">
                <v-card style="border-radius: 15px" flat class="mx-auto" max-width="95%" max-height="300">
                    <v-img src="/images/resume_themes/theme1100/hello.jpg"></v-img>
                </v-card>
            </v-col>

        </v-row>
    </div>
</template>
<style scoped>
    @media only screen and (max-width: 650px) {
        hr {
            width: 160px;
        }
    }
    @media only screen and (max-width: 523px) {
        hr {
            width: 115px;
        }
    }
    @media only screen and (max-width: 478px) {
        hr {
            width: 165px;
        }
    }
    @media only screen and (max-width: 335px) {
        hr {
            width: 150px;
        }
    }
</style>


