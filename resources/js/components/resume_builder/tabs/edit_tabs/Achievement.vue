<template>
    <div>
        <div class="section-title">
            <div class="title-light">Add</div>
            <h2>Achievement</h2>
        </div>
        <div class="section-body-wrapper">
            <div id="achievementTabs" class="achievements-bar">
                <div data-target="Awards" class="bar-item" :class="{ active : activeTab === 'Awards'}" @click="changeTab">
                    Awards
                </div>
                <div data-target="Certificates" class="bar-item" :class="{ active : activeTab === 'Certificates'}" @click="changeTab">
                    Certificates
                </div>
                <div data-target="Public" class="bar-item" :class="{ active : activeTab === 'Public'}" @click="changeTab">
                    Public Speaking
                </div>
                <div data-target="Events" class="bar-item" :class="{ active : activeTab === 'Events'}" @click="changeTab">
                    Events
                </div>

                <div class="decorator"></div>
            </div>

            <transition name="hide" mode="out-in">
                <award-view v-if="activeTab === 'Awards'"  :achievements="achievements" @achievementDeleted="deleteAchievement" @achievementAdded="addAchievement"></award-view>
                <certificates-view  v-else-if="activeTab === 'Certificates'" :achievements = "achievements" @achievementDeleted="deleteAchievement"></certificates-view>
                <public-view v-else-if="activeTab === 'Public'" @achievementAdded="addAchievement"></public-view>
                <events-view v-else @achievementAdded="addAchievement"></events-view>
            </transition>
            
        </div>
    </div>
</template>

<script>
    import AwardView from './achievements_views/awards';
    import CertificatesView from './achievements_views/certificates';
    import PublicView from './achievements_views/public';
    import EventsView from './achievements_views/events';

    import { moveTabsHelper } from '../../helpers/tab-animations';

    export default {
        components: {
            AwardView,
            CertificatesView,
            PublicView,
            EventsView
        },
        name: "Achievement",
        data() {
            return {
                activeTab: 'Awards',
                optionAchievementId: 0,
                editedAchievement: {},
                newAchievement: {

                },
                errors: {
                    new: {},
                    edit: {}
                },
                addNewAchievement:false
            }
        },
        computed: {
            achievements() {
                return this.$store.state.user.achievements;
            }
        },
        methods: {
            setActiveTab (tab) {
                this.activeTab = tab
            },
            changeTab (e) {
                let _this = this;
                moveTabsHelper(e, 'achievementTabs', _this);
            },
            editAchievement(achievement) {
                this.editedAchievement = {
                    id: achievement.id,
                   // TODO: continue fields
                };
                this.closeOptionsBtn();
            },
            applyEdit() {
                axios.put('/api/user/achievements', this.editedAchievement)
                    .then((response) => {
                        this.EditedSuccessfully(response.data.data);
                    })
                    .catch((error) => {
                        if (typeof error.response.data === 'object') {
                            this.errors.edit = error.response.data.errors;
                        } else {
                            this.errors.edit = 'Something went wrong. Please try again.';
                        }
                    });
            },
            EditedSuccessfully(editedAchievement) {
                this.clearEditedAchievement();
                // replace the edited skill with the new one:
                this.achievements.forEach((achievement, index) => {
                    if (achievement.id === editedAchievement.id) {
                        this.achievements[index] = editedAchievement;
                    }
                });
            },
            clearEditedAchievement() {
                this.editedAchievement = {};
            },
            deleteAchievement(achievement){
                if (!confirm('Do you want to delete this achievement ?')) {
                    return;
                }
                axios.delete('/api/user/achievements/' + achievement.id)
                    .then((response) => {
                        this.achievements.forEach( (myAchievement,index) => {
                            if(myAchievement.id === response.data.data.id){
                                this.achievements.splice(index,1);
                            }
                        });

                        this.closeOptionsBtn();
                    })
                    .catch(error => {
                        console.log(error);
                    })
            },
            addAchievement(newAchievement){
                console.log(newAchievement);
                this.errors = {  new: {}, edit: {}};
                axios.post('/api/user/achievements', newAchievement)
                    .then((response) => {
                        this.achievements.unshift(response.data.data);
                        this.clearAchievement();
                    })
                    .catch((error) => {
                        if (typeof error.response.data === 'object') {
                            this.errors.new = error.response.data.errors;
                        } else {
                            this.errors.new  = 'Something went wrong. Please try again.';
                        }
                    });
            },
            clearAchievement(){
                this.addNewAchievement = false;
                this.newAchievement = {
                    institution_type:'',
                    university_name:'',
                    degree_title:'',
                    date_from:'',
                    date_to:'',
                    present:false,
                }
            },
            closeOptionsBtn() {
                this.optionAchievementId = 0;
            },
        },
        mounted () {
            let _this = this;

            // Get active tab
            let activeTab = document.querySelector('.bar-item.active');
            moveTabsHelper({
                target: activeTab
            }, 'achievementTabs', _this);
        }
    }
</script>

<style lang="scss">
$mainColor: #001CE2;
    .section-body-wrapper {
        width: 1337px;

        .add-award-section {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            margin-top: 71px;

            .award-input {
                input {
                    width: 807px;
                    height: 76px;
                    border: 2px solid #505050;
                    border-radius: 10px;
                    opacity: 1;
                    padding-left: 18px;
                }
                input:focus {
                    outline: none;
                }

                label {
                    text-align: left;
                    font: 600 22px Noto Sans;
                    letter-spacing: 0;
                    color: #505050;
                    opacity: 1;
                }
            }



            .add-award-btn {
                margin-right: 31px;
                margin-bottom: 7px;
                a {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    width: 247px;
                    height: 62px;

                    background: #001CE2 0% 0% no-repeat padding-box;
                    border-radius: 8px;

                    font: 600 19px Noto Sans;
                    letter-spacing: 0;
                    color: #FFFFFF;
                    opacity: 1;

                    img {
                        width: 27px;
                        height: 27px;
                        margin-right: 10px;
                    }
                }
            }

            .auto-import-btn {
                margin-bottom: 7px;
                a {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    width: 226px;
                    height: 62px;

                    border: 2px solid #001CE2;
                    border-radius: 8px;
                    opacity: 1;

                    font: 600 19px Noto Sans;
                    letter-spacing: 0;
                    color: #001CE2;

                    img {
                        width: 27px;
                        height: 27px;
                        margin-right: 10px;
                    }
                }
            }

        }

        .certificates-section{
            margin-top: 72.5px;

            .add-certificate{
                display: flex;
                justify-content: flex-start;

                .upload-image{
                    display: flex;
                    flex-direction: column;
                    margin-right: 45px;
                    .img-label{
                        font-family: "Noto Sans", serif;
                        font-weight: 600;
                        font-size: 22px;
                        text-align: left;
                        color: #505050;
                        margin-bottom: 12px;
                    }
                    .upload-image-box{
                        width:412px;
                        height:518px;
                        display: flex;
                        flex-direction: column;
                        justify-content: center;
                        align-items: center;
                        border: 2px solid #505050;
                        border-radius: 10px;
                        img{
                            width:95px;
                            height:89px;
                        }
                        .upload-text{
                            font-family: "Noto Sans", serif;
                            font-weight: bold;
                            font-size: 30px;
                            letter-spacing: 0.02em;
                            line-height: 67px;
                            text-align: left;
                            color: #747474;
                        }
                    }
                }

                .certification-details-form{
                    margin-top: 37px;
                    .certification-input{
                        display: flex;
                        flex-direction: column;
                        margin-bottom: 33px;
                        input,textarea {
                            width: 807px;
                            height: 76px;
                            border: 2px solid #505050;
                            border-radius: 10px;
                            opacity: 1;
                            padding-left: 18px;
                        }
                        textarea{
                            padding-top: 18px;
                            height: 190px;
                        }
                        input:focus,textarea:focus {
                            outline: none;
                        }

                        label {
                            text-align: left;
                            font: 600 22px Noto Sans;
                            letter-spacing: 0;
                            color: #505050;
                            opacity: 1;
                        }
                    }

                    .action-btns{
                        display: flex;
                        .add-award-btn{
                            margin-right: 20px;
                            a {
                                display: flex;
                                justify-content: center;
                                align-items: center;
                                width: 256px;
                                height: 62px;

                                background: #001CE2 0% 0% no-repeat padding-box;
                                border-radius: 8px;

                                font: 600 19px Noto Sans;
                                letter-spacing: 0;
                                color: #FFFFFF;
                                opacity: 1;

                                img {
                                    width: 27px;
                                    height: 27px;
                                    margin-right: 10px;
                                }
                            }

                            a.short{
                                width:163px;
                            }
                        }

                        .auto-import-btn{
                            a {
                                display: flex;
                                justify-content: center;
                                align-items: center;
                                width: 226px;
                                height: 62px;

                                border: 2px solid #001CE2;
                                border-radius: 8px;
                                opacity: 1;

                                font: 600 19px Noto Sans;
                                letter-spacing: 0;
                                color: #001CE2;

                                img {
                                    width: 27px;
                                    height: 27px;
                                    margin-right: 10px;
                                }
                            }
                        }
                    }
                }
            }
        }
    }

    .hide-enter-active, .hide-leave-active {
        transition: opacity .5s;
    }
    .hide-enter, .hide-leave-to /* .fade-leave-active below version 2.1.8 */ {
        opacity: 0;
    }
</style>
