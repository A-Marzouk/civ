<template>
    <div>
        <div class="title">
            <img src="/icons/edit-cv-sidebar/imports-table.svg" alt="downloads icon">
            <span>Import from civ.ie</span>
        </div>
        <div class="dropzone-area">
                            <span class="v-label v-label--active theme--light" style="color: #888DB1;">
                            <!-- Added a label here due to prepend-inner slot change -->
                             URL
                            </span>
            <v-text-field
                    style="margin-top: -15px;"
                    class="resume-builder__input top-input-margin url mt-n6"
                    :outlined="true"
                    :error="!!errors.civResumeURL"
                    :error-messages="errors.civResumeURL"
                    v-model="civResumeURL"
            >
                <template slot="prepend-inner">
                    <span class="inner-text" style="margin-top:-3px;">civ.ie/</span>
                </template>
            </v-text-field>
            <div class="import-btn mt-3">
                <v-btn class="resume-builder__btn civie-btn filled" raised @click="importResumeFromCIV">
                    Import CV
                </v-btn>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ImportFromCIV",
        data(){
            return{
                errors:{},
                civResumeURL:'',
            }
        },
        methods:{
            importResumeFromCIV(){
                this.errors = {} ;
                let username = this.civResumeURL.split('/')[0];
                let version  = this.civResumeURL.split('/')[1];
                axios.post('/api/user/resume-links/import', { username, version, user_id: this.user.id})
                    .then( (response) => {
                        console.log(response.data);

                        if(response.data.errors !== undefined){
                            this.errors = response.data.errors;
                            this.$store.dispatch("flyingNotification", {
                                message: "Error",
                                iconSrc: "/images/resume_builder/error.png"
                            });
                        }else{
                            console.log(response.data);
                            this.$store.dispatch("flyingNotification");
                            this.civResumeURL = '';
                            // update user:
                            this.$store.dispatch("setCurrentUser", this.user.id);
                        }
                    })
                    .catch( (error) => {
                        if (typeof error.response.data === "object") {

                        } else {
                            this.errors = "Something went wrong. Please try again.";
                        }

                    });
            }
        },
        computed:{
            user(){
                return this.$store.state.user;
            }
        }
    }
</script>

<style scoped lang="scss">
    @import '../../../../../../sass/media-queries';
    .import-tab-item{
        .title {
            display: flex;
            align-items: center;

            @include lt-sm{
                align-items: flex-start;
                img{
                    margin-top: 6px;
                }
            }

            img {
                width: 24px;
                height: 24px;
                margin-right: 6px;
            }

            span {
                font-weight: 500;
                font-size: 22px;
                line-height: 30px;
                color: #888DB1;
            }
        }

        .dropzone-area{
            display: flex;
            flex-direction: column;
            padding: 30px;
            max-width: 600px;
            margin-top: 20px;
            background: #F8F8FF;
            border-radius: 10px;

            .import-btn{
                margin-bottom: 30px;
                .civie-btn{
                    width: 160px !important;
                }
            }
        }
    }
</style>