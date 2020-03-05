<template>
    <div>
        <div class="section-title">
            <h2>Summary</h2>
        </div>

        <div class="section-body-wrapper">
            <div class="achievements-bar" id='summaryLinksWrapper'>
                <div class="bar-item" v-for="(tabName,i) in tabs" :key="i" :index="i" :item="tabName" :class="{ active : activeTab === tabName}" :data-target="tabName" @click="changeTab">
                    {{tabName}}
                </div>

                <div class="decorator"></div>
            </div>
            <div class="about-section">
                <div class="about-input">
                    <label for="about" class="d-flex justify-content-between">
                        <span class="label-text">About myself</span>
                        <span class="note-text">Maximum 80 words</span>
                    </label>
                    <textarea name="about" id="about"></textarea>
                </div>
                <div class="action-btns">
                    <div class="auto-import-btn short NoDecor">
                        <a href="">
                            <img src="/images/resume_builder/work-ex/add-box.png" alt="add">
                            Add
                        </a>
                    </div>
                    <div class="auto-import-btn NoDecor">
                        <a href="">
                            <img src="/images/resume_builder/work-ex/add-box.png" alt="add">
                            Auto import
                        </a>
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
                    'About',
                    'Objective',
                    'Overview'
                ],
                activeTab: 'About'
            }
        },
        methods: {
            setActiveTab (tab) {
                this.activeTab = tab
            },
            changeTab (e) {

                // Here will be the animations between transitions
                
                moveTabsHelper(e, 'summaryLinksWrapper', this)
            }
        },        
        mounted() {
            this.changeTab({ target: document.querySelector(`.bar-item[data-target=${this.activeTab}]`)})
        }
    }
</script>

<style scoped lang="scss">

    .section-body-wrapper {
        width: 1337px;

        .about-section {
            margin-top: 47px;

            .about-input {
                display: flex;
                flex-direction: column;
                width: fit-content;
                textarea {
                    width: 815px;
                    height: 274px;
                    border: 1.5px solid #9F9E9E;
                    border-radius: 10px;
                    opacity: 1;
                    padding-left: 18px;
                    padding-top: 18px;
                }

                textarea:focus {
                    outline: none;
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

                    border: 1.5px solid #001CE2;
                    border-radius: 8px;
                    opacity: 1;

                    font: 600 19px Noto Sans;
                    letter-spacing: 0;
                    color: #001CE2;

                    img {
                        width: 27px;
                        height: 27px;
                        margin-right: 14px;
                    }
                }
            }

            .auto-import-btn.short {
                margin-right: 38px;

                a {
                    width: 144px;
                }
            }
        }
    }

</style>
