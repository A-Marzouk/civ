<template>
    <div>
        <div class="add-award-section">
            <div class="award-input input-field d-flex flex-column w-100">
                <label for="awardTitle">New Awards</label>
                <div class="d-flex w-100 flex-input" style="justify-content: space-between; align-items: center;">
                    <input type="text" id="awardTitle" v-model="newAward.title">

                    <a class="btn btn-filled btn-fullWidth--md" href="javascript:void(0)" @click="addAward">
                        <img class='icon' src="/images/resume_builder/work-ex/mark.png" alt="mark">
                        Add awards now
                    </a>
                </div>
                <div class="error" v-if="errors.new.title">
                    {{errors.new.title[0]}}
                </div>
            </div>
        </div>
        <div class="work-ex-list mt-3">
            <div class="work-ex-item mt-5 flex-column" v-for="(achievement,index) in achievements" :key="index + '_achievement'" v-show="achievement.category === 'awards'">
                <div class="d-flex">
                    <div class="work-icon">
                        <img src="/images/resume_builder/achievements/award.png" alt="work-icon">
                    </div>
                    <div class="work-ex-info">
                        <div class="work-ex-title">
                            {{achievement.title}}
                        </div>
                    </div>
                </div>

                <div class="optionsBtns showOnMd justify-content-center">
                    <a href="javascript:;" class="delete-btn NoDecor" @click="deleteAward(achievement)">
                        <svg-vue class="icon" :icon='"trash-delete-icon"'></svg-vue>
                    </a>
                </div>

                <div class="options hideOnMd">
                    <div class="options-btn NoDecor"
                         @click="optionAchievementId === achievement.id ? optionAchievementId=0 : optionAchievementId=achievement.id">
                        <a href="javascript:void(0)" :class="{'opened':optionAchievementId === achievement.id}">
                            Options
                            <img src="/images/resume_builder/arrow-down.png" alt=""
                                 :class="{'optionsOpened':optionAchievementId === achievement.id}">
                        </a>
                    </div>
                    <div class="extended-options" v-show="optionAchievementId === achievement.id"
                         :class="{'opened':optionAchievementId === achievement.id}">
                        <div class="delete-btn NoDecor" @click="deleteAward(achievement)">
                            <img src="/images/resume_builder/delete-icon.png" alt="delete icon">
                            Delete
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>
</template>

<script>
    export default {
        props: ['achievements'],
        data() {
            return {
                newAward: {
                    category: 'awards',
                    title: ''
                },
                optionAchievementId:'',
                errors:{
                    new: {}, edit: {}
                }
            }
        },
        methods: {
            addAward () {
                // Axios request here
                this.errors= { new: {}, edit: {}};
                this.newAward.user_id = this.$store.state.user.id;

                axios.post('/api/user/achievements', this.newAward)
                    .then((response) => {
                        let addedAchievement = response.data.data;
                        this.$emit('achievementAdded',addedAchievement);
                        this.$store.dispatch('fullScreenNotification');
                        this.clearAward();
                    })
                    .catch((error) => {
                        if (typeof error.response.data === 'object') {
                            this.errors.new = error.response.data.errors;
                        } else {
                            this.errors.new  = 'Something went wrong. Please try again.';
                        }
                        this.$store.dispatch('flyingNotification',{message:'Error',iconSrc:'/images/resume_builder/error.png'});
                    });
            },
            clearAward(){
                this.newAward = {
                    category: 'awards',
                    title: '',
                };
            },
            deleteAward(award){
                this.$emit('achievementDeleted', award);
            }
        },
        mounted() {

        }
    }
</script>
<style scoped lang="scss">
@import '../../../../../../sass/media-queries';

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

    .work-ex-list{
        margin-top: 64px;
        width: 100%;
        max-width: 900px;

        .work-ex-item{
            position: relative;
            display: flex;
            justify-content: flex-start;
            max-width: 500px;
            width: 100%;

            .work-icon{
              img{
                  width: 38px;
                  height: auto;
                  margin-right: 33px;
              }
            }

            .work-ex-info{
                .work-ex-title{
                    font: 700 30px/41px Noto Sans;
                    letter-spacing: 0;
                    color: #3C3748;
                    margin-bottom: 12px;
                    opacity: 1;

                    @include lt-md {
                        font-size: 16px;
                    }

                    @include lt-sm {
                        font-size: 16px;
                    }
                }
                .work-ex-sub-title{
                    font: 700 19px Noto Sans;
                    letter-spacing: 0;
                    color: #3C3748;
                    opacity: 1;
                    margin-bottom: 16px;

                    @include lt-md {
                        font-size: 16px;
                    }

                    @include lt-sm {
                        font-size: 14px;
                    }
                }
                .work-ex-detials{
                    font: 500 16px Noto Sans;
                    letter-spacing: 0;
                    color: #555060;
                    opacity: 1;

                    @include lt-md {
                        font-size:14px;
                    }

                    @include lt-sm {
                        font-size:12px;
                    }
                }
            }

            .options {
                position: absolute;
                right: -50px;
                top: 0;

                .options-btn {
                    a {
                        width: 130px;
                        height: 44px;

                        display: flex;
                        justify-content: center;
                        align-items: center;

                        background: #FFFFFF 0 0 no-repeat padding-box;
                        border: 1px solid #505050;
                        border-radius: 5px;
                        opacity: 1;

                        font: 600 13px Noto Sans;
                        letter-spacing: 0;
                        color: #505050;

                        img {
                            width: 13.3px;
                            height: 6.8px;
                            margin-left: 8px;
                        }

                        img.optionsOpened {
                            -webkit-transform: scaleY(-1);
                            transform: scaleY(-1);
                        }
                    }

                    a.opened {
                        border: 1px solid #1F5DE4;
                    }

                    a:focus {
                        outline: none !important;
                        box-shadow: none !important;
                    }
                }

                .extended-options {
                    background: #FFFFFF 0 0 no-repeat padding-box;
                    border: 1px solid #505050;
                    border-radius: 5px;
                    opacity: 1;
                    margin-top: 6px;
                    width: 130px;
                    height: 45px;
                    padding-top: 5px;
                    padding-left: 8px;

                    .edit-btn, .delete-btn {
                        display: flex;
                        justify-content: flex-start;
                        align-items: center;
                        font: 600 13px Noto Sans;
                        letter-spacing: 0;
                        color: #505050;

                        img {
                            width: 15.75px;
                            height: 14px;
                            margin-right: 6px;
                        }

                        &:hover {
                            cursor: pointer;
                        }
                    }

                    .delete-btn {
                        margin-top: 8px;

                        img {
                            width: 10.89px;
                            height: 14px;
                            margin-right: 9.5px;
                        }
                    }
                }

                .extended-options.opened {
                    border: 1px solid #1F5DE4;
                }
            }
        }
    }


    .awards-list{
        margin-top:40px;
        .awards-item{
            position: relative;
            margin-bottom: 100px;
            width: 50%;
            font-weight: bold;
        }
    }

    .error{
        color: red;
        margin-top: 5px;
    }

    .options {
        position: absolute;
        right: -50px;
        top: 0;

        .options-btn {
            a {
                width: 110px;
                height: 44px;

                display: flex;
                justify-content: center;
                align-items: center;

                background: #FFFFFF 0 0 no-repeat padding-box;
                border: 1px solid #505050;
                border-radius: 5px;
                opacity: 1;

                font: 600 13px Noto Sans;
                letter-spacing: 0;
                color: #505050;

                img {
                    width: 13.3px;
                    height: 6.8px;
                    margin-left: 8px;
                }

                img.optionsOpened {
                    -webkit-transform: scaleY(-1);
                    transform: scaleY(-1);
                }
            }

            a.opened {
                border: 1px solid #1F5DE4;
            }

            a:focus {
                outline: none !important;
                box-shadow: none !important;
            }
        }

        .extended-options {
            background: #FFFFFF 0 0 no-repeat padding-box;
            border: 1px solid #505050;
            border-radius: 5px;
            opacity: 1;
            margin-top: 8px;
            width: 110px;
            height: 45px;
            padding-top: 5px;
            padding-left: 8px;

            .edit-btn, .delete-btn {
                display: flex;
                justify-content: flex-start;
                align-items: center;
                font: 600 13px Noto Sans;
                letter-spacing: 0;
                color: #505050;

                img {
                    width: 15.75px;
                    height: 14px;
                    margin-right: 6px;
                }

                &:hover {
                    cursor: pointer;
                }
            }

            .delete-btn {
                margin-top: 8px;

                img {
                    width: 10.89px;
                    height: 14px;
                    margin-right: 9.5px;
                }
            }
        }

        .extended-options.opened {
            border: 1px solid #1F5DE4;
        }
    }
</style>
