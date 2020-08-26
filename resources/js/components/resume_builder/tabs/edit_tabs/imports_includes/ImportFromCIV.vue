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
                    v-model="civResumeURL"
            >
                <template slot="prepend-inner">
                    <span class="inner-text" style="margin-top:-3px;">civ.ie/</span>
                </template>
            </v-text-field>
            <div class="import-btn">
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
                civResumeURL:'',
            }
        },
        methods:{
            importResumeFromCIV(){

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