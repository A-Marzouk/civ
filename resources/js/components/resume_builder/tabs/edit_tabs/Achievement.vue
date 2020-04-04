<template>
    <div id="achievementsEdit" class="w-100">
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

            <transition class="w-100" name="hide" mode="out-in">
                <award-view v-if="activeTab === 'Awards'"
                     @achievementAdded="addAchievement"
                    :achievements="achievements && achievements.filter(achievement => achievement.category === 'awards')"
                    @achievementDeleted="deleteAchievement"
                ></award-view>
                <certificates-view  v-else-if="activeTab === 'Certificates'"
                    @achievementAdded="addAchievement"
                    :achievements="achievements && achievements.filter(achievement => achievement.category === 'certificates')"
                    @achievementDeleted="deleteAchievement"
                ></certificates-view>
                <public-view v-else-if="activeTab === 'Public'"
                     @achievementAdded="addAchievement"
                    :achievements="achievements && achievements.filter(achievement => achievement.category === 'public_speaking')"
                    @achievementDeleted="deleteAchievement"
                ></public-view>
                <events-view v-else
                     @achievementAdded="addAchievement"
                    :achievements="achievements && achievements.filter(achievement => achievement.category === 'events')"
                    @achievementDeleted="deleteAchievement"
                ></events-view>
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
            addAchievement(achievement){
                this.achievements.push(achievement);
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
                this.$store.dispatch('fullScreenNotification');

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
                        this.$store.dispatch('flyingNotificationDelete');
                        this.achievements.forEach( (myAchievement,index) => {
                            if(myAchievement.id === response.data.data.id){
                                console.log('found deleted');
                                this.achievements.splice(index,1);
                            }
                        });

                        this.closeOptionsBtn();
                    })
                    .catch(error => {
                        console.log(error);
                    })
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
$mainBlue: #001CE2;
@import '../../../../../sass/media-queries';
#achievementsEdit {
    .add-certificate-btn {
        justify-content: center;
        align-items: center;
        width: 100%;

        @include lt-sm {

            .btn {
                font-size: 17px !important;

                .icon {
                    height: 19px;
                }
            }
        }

        .btn-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
        }

        .btn {
            max-width: 500px;
            width: 100%;
        }

        &.showOnMd {
            @include lt-md {
                display: flex !important;
            }
        }
    }

    .section-body-wrapper {
        max-width: 1337px;
        width: 100%;

        .add-award-section {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            margin-top: 71px;

            .flex-input {
                @include lt-md {
                    flex-wrap: wrap;
                }
            }

            .award-input {

                @include lt-md {
                    width: 100%;
                }

                input {
                    max-width: 807px;
                    // height: 76px;
                    // border: 2px solid #505050;
                    // border-radius: 10px;
                    opacity: 1;
                    padding-left: 18px;
                    margin-right: 12px;

                    @include lt-md {
                        margin-bottom: 2rem;
                        margin-right: 0;
                    }

                    @include lt-sm {
                        margin-bottom: 3px;
                    }
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

                    @include lt-md {
                        font-size: 18px;
                        color: $mainBlue;
                    }
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

        .certificates-section {
            margin-top: 72.5px;

            .add-certificate{
                justify-content: flex-start;
                display: flex;

                &.showOnMd {
                    @include lt-md {
                        display: flex !important;
                        flex-wrap: wrap;
                        justify-content: space-between;
                    }
                }


                .thumbnail {
                    background-size: cover;
                    background-repeat: no-repeat;
                }

                .upload-image{
                    display: flex;
                    flex-direction: column;
                    margin-right: 45px;
                    width: 48%;
                    max-width:450px;

                    @include lt-md {
                        margin-right: 0;
                    }

                    @include lt-sm {
                        width: 100%;
                        margin-right: 0;
                    }

                    .img-label{
                        font-family: "Noto Sans", serif;
                        font-weight: 600;
                        font-size: 22px;
                        text-align: left;
                        color: #505050;
                        // margin-bottom: 12px;

                        @include lt-md {
                            // color: $mainBlue;
                            display: none;
                        }
                    }

                    .upload-image-box {
                        width: 100%;
                        max-height:518px;
                        height: 100%;
                        display: flex;
                        flex-direction: column;
                        justify-content: center;
                        align-items: center;
                        border: 2px solid #505050;
                        border-radius: 10px;

                        @include lt-md {
                            height: 196px;
                            margin-top: 24px;
                        }

                        @include lt-sm {
                            height: 196px;
                            margin-top: 0;
                            margin-bottom: 10px;
                            width: 100%;
                            border-width: 0.5px;
                        }

                        img{
                            width:95px;
                            height:89px;

                            @include lt-md {
                                height: 51px;
                                width: auto;
                            }
                        }

                        .dz-message {
                            img {
                                margin: 0 auto;
                            }
                        }

                        .upload-text{
                            font-family: "Noto Sans", serif;
                            font-weight: bold;
                            font-size: 30px;
                            letter-spacing: 0.02em;
                            line-height: 67px;
                            text-align: left;
                            color: #747474;

                            @include lt-md {
                                font-size: 17px;
                            }
                        }
                    }
                }

                .certification-details-form{
                    margin-top: 37px;
                    width: 48%;

                    @include lt-md {
                        margin-top: 0;
                    }

                    @include lt-sm {
                        width: 100%
                    }

                    .certification-input{
                        display: flex;
                        flex-direction: column;
                        margin-bottom: 33px;

                        @include lt-md {
                            margin-bottom: 5px;
                        }

                        input,textarea {
                            max-width: 807px;
                            width: 100%;
                            // border: 2px solid #505050;
                            border-radius: 10px;
                            opacity: 1;
                            padding-left: 18px;

                            @include lt-md {
                                height: 38px;
                                min-height: 20px;
                                margin-bottom: 10px;
                            }

                            @include lt-sm {
                                width: 100%;
                            }
                        }
                        textarea{
                            padding-top: 18px;
                            height: 190px;

                            @include lt-md {
                                height: 107px;
                                min-height: 80px;
                            }
                        }
                        input:focus,textarea:focus {
                            outline: none;
                        }

                        label {
                            text-align: left;
                            // font: 600 22px Noto Sans;
                            letter-spacing: 0;
                            // color: #505050;
                            opacity: 1;

                            @include lt-md {
                                margin-bottom: 0;
                                font-size: 15px;
                            }
                        }
                    }
                }
                .action-btns{
                    display: flex;

                    @include lt-md {
                        width: 50%;
                        min-width: 365px;
                        justify-content: space-between;

                        .btn {
                            width: 48%;
                            min-width: 160px;

                            font-size: 12px !important;

                            .icon {
                                width: 15px;
                            }
                        }
                    }

                    @include lt-sm {
                        flex-wrap: wrap;
                        width: 100%;
                        min-width: 10px;
                    }
                    
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

.optionsBtns {
    width: 100%;
    background: #F9F9F9;
    box-shadow: 0 9px 12px rgba(0,0,0,.03);
    justify-content: space-between;
    padding: 12px 37px;
    border-radius: 2px;
    margin: 1rem auto 0;

    @include lt-md {
        display: flex !important;
    }

    @include lt-sm {
        max-width: 250px;
    }

    a {
        height: 24px;
        display: block;

        @include lt-sm {
            height: 16px;
        }

        .icon {
            height: 100%;
            color: $mainBlue;
            fill: $mainBlue;

            path {
                fill: $mainBlue;
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
