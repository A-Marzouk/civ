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

<style lang="scss" scoped>
$mainColor: #001CE2;
    .section-body-wrapper {
        width: 1337px;
    }

    .hide-enter-active, .hide-leave-active {
        transition: opacity .5s;
    }
    .hide-enter, .hide-leave-to /* .fade-leave-active below version 2.1.8 */ {
        opacity: 0;
    }
</style>
