<template>
    <div>
        <div class="section-title">
            <h2>Imports</h2>
        </div>
        <div class="section-body-wrapper">
            <div class="achievements-bar" id="importLinksWrapper">
                <div class="bar-item" v-for="(tabName,i) in tabs" :key="i" :index="i" :item="tabName" :data-target="tabName" @click="changeTab" :class="{ active : activeTab === tabName}">
                    {{tabName.replace('_', ' ')}}
                </div>

                <div class="decorator"></div>
            </div>
            <div class="achievements-bar sub-bar" v-if="activeTab === 'Manage'">
                <div class="bar-item" :class="{ active : selectedSubTab === 'PDF'}" @click="selectedSubTab = 'PDF'">
                    PDF
                </div>
                <div class="bar-item" :class="{ active : selectedSubTab === 'Linkedin'}"
                     @click="selectedSubTab = 'Linkedin'">
                    Linkedin
                </div>
                <div class="bar-item" :class="{ active : selectedSubTab === 'Github'}"
                     @click="selectedSubTab = 'Github'">
                    Github
                </div>
                <div class="bar-item" :class="{ active : selectedSubTab === 'Behance'}"
                     @click="selectedSubTab = 'Behance'">
                    Behance
                </div>
                <div class="bar-item" :class="{ active : selectedSubTab === 'Word'}" @click="selectedSubTab = 'Word'">
                    Word/docs
                </div>
            </div>
            <transition name="component-fade" mode="out-in">
                <div class="imports-list" v-if="activeTab === 'Downloads'">
                    <div class="import-item">
                        <div class="import-name">
                           File 2
                        </div>
                        <div class="import-date">
                            01/17/2022
                        </div>
                        <div class="import-icon-view">
                            <img src="/images/resume_builder/imports/eye.png" alt="eye-icon">
                        </div>
                        <div class="import-delete-iceon">
                            <img src="/images/resume_builder/imports/trash.png" alt="eye-icon">
                        </div>
                    </div>
                    <div class="import-item">
                        <div class="import-name">
                            File 2
                        </div>
                        <div class="import-date">
                            01/17/2022
                        </div>
                        <div class="import-icon-view">
                            <img src="/images/resume_builder/imports/eye.png" alt="eye-icon">
                        </div>
                        <div class="import-delete-iceon">
                            <img src="/images/resume_builder/imports/trash.png" alt="eye-icon">
                        </div>
                    </div>
                </div>
                <div class="imports-list" v-else-if="activeTab === 'Manage'">
                    <div class="import-item">
                        <div class="import-name">
                            PDF import 1
                        </div>
                        <div class="import-date">
                            01/17/2022
                        </div>
                        <div class="import-icon-view">
                            <img src="/images/resume_builder/imports/eye.png" alt="eye-icon">
                        </div>
                        <div class="import-edit-icon">
                            <img src="/images/resume_builder/imports/edit.svg" alt="eye-icon">
                        </div>
                        <div class="import-delete-iceon">
                            <img src="/images/resume_builder/imports/trash.png" alt="eye-icon">
                        </div>
                    </div>
                    <div class="import-item">
                        <div class="import-name">
                            PDF import 2
                        </div>
                        <div class="import-date">
                            01/17/2022
                        </div>
                        <div class="import-icon-view">
                            <img src="/images/resume_builder/imports/eye.png" alt="eye-icon">
                        </div>
                        <div class="import-edit-icon">
                            <img src="/images/resume_builder/imports/edit.svg" alt="eye-icon">
                        </div>
                        <div class="import-delete-iceon">
                            <img src="/images/resume_builder/imports/trash.png" alt="eye-icon">
                        </div>
                    </div>
                    <div class="import-item">
                        <div class="import-name">
                            PDF import 3
                        </div>
                        <div class="import-date">
                            01/23/2022
                        </div>
                        <div class="import-icon-view">
                            <img src="/images/resume_builder/imports/eye.png" alt="eye-icon">
                        </div>
                        <div class="import-edit-icon">
                            <img src="/images/resume_builder/imports/edit.svg" alt="eye-icon">
                        </div>
                        <div class="import-delete-iceon">
                            <img src="/images/resume_builder/imports/trash.png" alt="eye-icon">
                        </div>
                    </div>
                </div>
                <div class="imports-list" v-else-if="activeTab === 'Import_CV'">
                    <import-cv></import-cv>
                </div>
                <div class="imports-list" v-else>
                    <div class="import-item">
                        <div class="import-name">
                            www.123workforce.com/Aymane
                        </div>
                        <div class="import-date">
                            01/17/2022
                        </div>
                        <div class="import-icon-view">
                            <img src="/images/resume_builder/imports/eye.png" alt="eye-icon">
                        </div>
                        <div class="import-edit-icon">
                            <img src="/images/resume_builder/imports/edit.svg" alt="eye-icon">
                        </div>
                        <div class="import-copy-icon">
                            <img src="/images/resume_builder/imports/copy.png" alt="copy-icon">
                        </div>
                        <div class="import-delete-iceon">
                            <img src="/images/resume_builder/imports/trash.png" alt="eye-icon">
                        </div>
                    </div>
                </div>
            </transition >
        </div>
    </div>
</template>

<script>
import { moveTabsHelper } from '../../helpers/tab-animations'
import  ImportCV  from '../../components/ImportCV'
    export default {
        components: {
            'import-cv': ImportCV
        },
        name: "imports",
        data() {
            return {
                activeTab: 'Downloads',
                selectedSubTab: 'PDF',
                tabs: [
                    'Downloads',
                    'Manage_imports',
                    'URL_links',
                    'Import_CV'
                ]
            }
        },
        methods: {
            setActiveTab (tab) {
                this.activeTab = tab
            },
            changeTab (e) {

                // Here will be the animations between transitions
                
                moveTabsHelper(e, 'importLinksWrapper', this)
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

        .achievements-bar.sub-bar {
            margin-top: 74px;
        }

        .imports-list {
            padding-right: 80px;

            .import-item {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-top: 63px;

                .import-name {
                    font: 600 30px Noto Sans;
                    font-size: 30px;
                    text-align: left;
                    color: #001ce2;
                }

                .import-date {
                    font: 600 30px Noto Sans;
                    font-size: 30px;
                    text-align: left;
                    color: #001ce2;
                }

                .import-view-icon {
                    img{
                        width: 42.75px;
                        height: 27.24px;
                    }
                }

                .import-edit-icon {
                   img{
                       width: 30.32px;
                       height: 30.17px;
                   }

                }

                .import-copy-icon {
                   img{
                       width: 29.5px;
                       height: 34px;
                   }
                }

                .import-delete-icon {
                   img{
                       width: 29px;
                       height: 31px;
                   }
                }
            }
        }

    }
</style>
