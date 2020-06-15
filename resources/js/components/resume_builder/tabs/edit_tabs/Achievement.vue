<template>
    <v-app>
        <v-container style="width:100%;">
            <v-card></v-card>
        </v-container>
    </v-app>
</template>

<script>
    import AwardView from './achievements_views/awards';
    import CertificatesView from './achievements_views/certificates';
    import PublicView from './achievements_views/public';
    import EventsView from './achievements_views/events';

    import { moveTabsHelper } from '../../helpers/tab-animations';

    export default {
        components: {
        },
        name: "Achievement",
        data() {
            return {
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
                        this.$store.dispatch('flyingNotification', {
                            message: 'Error',
                            iconSrc: '/images/resume_builder/error.png'
                        });
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
        }
    }
</script>

<style lang="scss">
$mainBlue: #001CE2;
@import '../../../../../sass/media-queries';
    
</style>
