<template>
    <div style='width: 100%'>
        <div class="section-title">
            <div class="title-light">Edit</div>
            <h2>Summary</h2>
        </div>

        <div class="section-body-wrapper">
            <div class="achievements-bar" id='summaryLinksWrapper'>
                <div class="bar-item" v-for="(tabName,i) in tabs" :key="i" :index="i" :item="tabName" :class="{ active : activeTab === tabName}" :data-target="tabName" @click="changeTab">
                    {{tabName}}
                </div>
                <div class="decorator"></div>
            </div>

            <div v-if="summary">
                <div class="about-section" v-show="activeTab === 'Objective'">
                    <div class="about-input">
                        <label for="objective" class="d-flex justify-content-between">
                            <span class="label-text">Add Objective</span>
                        </label>
                        <textarea name="about" id="objective" v-model="summary.objective" @blur="updateSummary('auto')">></textarea>
                        <div class="error" v-if="errors.objective">
                            {{ Array.isArray(errors.objective) ? errors.objective[0] : errors.objective}}
                        </div>
                    </div>
                    <div class="action-btns">
                        <a class='btn btn-outfilled short btn-filled-md btn-fullWidth--md' href="javascript:void(0)" @click="updateSummary('manual')">
                            <svg-vue class='icon' :icon="'add-icon'"></svg-vue>
                            Save
                        </a>
                        <!--<div class="auto-import-btn NoDecor">-->
                        <!--<a href="javascript:void(0)">-->
                        <!--<img src="/images/resume_builder/work-ex/add-box.png" alt="add">-->
                        <!--Auto import-->
                        <!--</a>-->
                        <!--</div>-->
                    </div>
                </div>
                <div class="about-section"  v-show="activeTab === 'Overview'">
                    <div class="about-input">
                        <label for="overview" class="d-flex justify-content-between">
                            <span class="label-text">Add Overview</span>
                        </label>
                        <textarea name="about" id="overview" v-model="summary.overview" @blur="updateSummary('auto')"></textarea>
                        <div class="error" v-if="errors.overview">
                            {{ Array.isArray(errors.overview) ? errors.overview[0] : errors.overview}}
                        </div>
                    </div>
                    <div class="action-btns">
                        <a class='btn btn-outfilled short btn-filled-md btn-fullWidth--md' href="javascript:void(0)"  @click="updateSummary('manual')">
                            <svg-vue class='icon' :icon="'add-icon'"></svg-vue>
                            Save
                        </a>
                        <!--<div class="auto-import-btn NoDecor">-->
                        <!--<a href="javascript:void(0)">-->
                        <!--<img src="/images/resume_builder/work-ex/add-box.png" alt="add">-->
                        <!--Auto import-->
                        <!--</a>-->
                        <!--</div>-->
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
import { moveTabsHelper } from '../../helpers/tab-animations'

    export default {
        name: "Summary",
        data() {
            return {
                tabs: [
                    'Objective',
                    'Overview'
                ],
                activeTab: 'Objective',
                errors:{}
            }
        },
        computed: {
            summary() {
                return this.$store.state.user.summary;
            }
        },
        methods: {
            setActiveTab (tab) {
                this.activeTab = tab
            },
            changeTab (e) {
                moveTabsHelper(e, 'summaryLinksWrapper', this)
            },
            updateSummary(savingType){
                this.errors = {};
                axios.put('/api/user/summary', this.summary)
                    .then((response) => {
                        savingType === 'manual' ? this.$store.dispatch('fullScreenNotification') :  this.$store.dispatch('flyingNotification')
                    })
                    .catch((error) => {
                        if (typeof error.response.data === 'object') {
                            this.errors = error.response.data.errors;
                        } else {
                            this.errors = 'Something went wrong. Please try again.';
                        }
                    });
            }
        },        
        mounted() {
            this.changeTab({ target: document.querySelector(`.bar-item[data-target=${this.activeTab}]`)});
        }
    }
</script>

<style scoped lang="scss">
    @import '../../../../../sass/media-queries';

    $mainBlue: #001CE2;

    .section-body-wrapper {
        max-width: 1337px;
        width: 100%;

        .achievements-bar{
            justify-content: flex-start;
            width: fit-content;

            @include lt-md {
                width: 100%;
                justify-content: space-between;
            }

            .bar-item{
                padding-right:30px;
            }
        }

        .about-section {
            margin-top: 47px;
            width: 100%;

            .about-input {
                display: flex;
                flex-direction: column;
                width: 100%;

                textarea {
                    max-width: 815px;
                    width: 100%;
                    height: 274px;
                    border: 1.5px solid #9F9E9E;
                    border-radius: 10px;
                    opacity: 1;
                    padding-left: 18px;
                    padding-top: 18px;
                }

                textarea:focus {
                    outline: none;

                    @include lt-md {
                        border-color: $mainBlue;
                    }
                }

                label {
                    margin-bottom:17px;

                    .label-text {
                        text-align: left;
                        font: 600 20px Noto Sans;
                        letter-spacing: 0;
                        opacity: 1;
                        font-size: 20px;
                        color: #9f9e9e;

                        @include lt-md {
                            font-size: 14px;
                            color: $mainBlue;
                        }
                    }

                    .note-text {
                        font: 500 13px Noto Sans;
                        color: #1f5de4;
                        opacity: 0.7;
                    }
                }
            }
        }

        .action-btns {
            margin-top: 45px;
            display: flex;

            .auto-import-btn {
                a {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    width: 226px;
                    height: 62px;

                    border: 1.5px solid $mainBlue;
                    border-radius: 8px;
                    opacity: 1;

                    font: 600 19px Noto Sans;
                    letter-spacing: 0;
                    color: $mainBlue;

                    img {
                        width: 27px;
                        height: 27px;
                        margin-right: 14px;
                    }
                }
            }

            .short {
                margin-right: 38px;
            }
        }
    }

    .error {
        color: red;
        margin-left: 5px;
    }

</style>
