<template>
    <v-container style="max-width: 1785px;">
        <v-row wrap class="justify-content-between">
            <v-flex xs12 md5 mb-10 v-for="(work,index) in works" :key="index + '_work'">
                <v-layout row wrap>
                    <v-flex xs12 sm4 md6 lg4>
                        <v-card flat>
                            <v-card-text>
                                <h1 class="custom-header">{{work.company_name}}</h1>

                                <p class="custom-p">
                                    Duration:
                                    <br class="hidden-xs-only">
                                    <span style="color:black;">{{work.date_from}} - {{work.present ? "present" : work.date_to}}</span>
                                </p>
                            </v-card-text>
                        </v-card>
                    </v-flex>
                    <!-- 2nd column -->
                    <v-flex xs12 sm8 md6 lg8>
                        <v-card flat>
                            <v-card-text>
                                <h1 class="custom-header2">{{work.job_title}}</h1>

                                <p class="custom-p2">
                                    {{work.description}}
                                </p>
                            </v-card-text>
                        </v-card>
                    </v-flex>
                    <!-- 2nd column -->
                </v-layout>
            </v-flex>
        </v-row>
    </v-container>
</template>

<script>
    export default {
        name: "Work",
        data: () => ({}),
        computed: {
            works() {
                return this.$store.state.themeUser.work_experience;
            }
        }
    };
</script>

<style scoped lang="scss">
    .v-card__text {
        width: 101%;
    }

    .custom-header {
        font-size: 30px;
        line-height: 35px;
    }

    .custom-header2 {
        font-size: 20px;
        line-height: 30px;
        /* identical to box height */
        color: #6d6d6d;
        margin: 5px 0 40px;
    }

    .custom-p {
        margin: 40px auto;
        font-style: normal;
        font-weight: 300;
        font-size: 20px;
        line-height: 30px;
        /* or 158% */

        color: #575757;
    }

    .custom-p2 {
        font-family: Open Sans;
        font-style: normal;
        font-weight: 300;
        font-size: 12px;
        line-height: 23px;
        /* or 164% */

        color: #4e4e4e;
    }

    @media screen and (min-width: 960px) and (max-width: 1263px) {
        .custom-header2 {
            font-size: 20px;
            margin: 5px 0 18px;
        }
        .custom-p {
            margin: 47px auto;
        }
    }
</style>
