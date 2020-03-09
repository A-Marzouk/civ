<template>
    <div>
        <div class="add-award-section">
            <div class="award-input">
                <label for="awardTitle">New Awards</label>
                <input type="text" id="awardTitle" v-model="newAward.title">
                <div class="error" v-if="errors.title">
                    {{errors.title}}
                </div>
            </div>
            <div class="add-award-btn NoDecor">
                <a href="javascript:void(0)" @click="addAward">
                    <img src="/images/resume_builder/work-ex/mark.png" alt="mark">
                    Add awards now
                </a>
            </div>
            <!--<div class="auto-import-btn NoDecor">-->
            <!--<a href="">-->
            <!--<img src="/images/resume_builder/work-ex/add-box.png" alt="add">-->
            <!--Auto import-->
            <!--</a>-->
            <!--</div>-->
        </div>
        <div class="awards-list">
            <div class="awards-item" v-for="(achievement,index) in achievements" :key="index + '_achievement'" v-show="achievement.category === 'awards'">
               <div>
                   {{index+1}} - {{achievement.title}}
               </div>

                <div class="options">
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
                errors:{}
            }
        },
        methods: {
            async addAward() {
                this.errors = {}
                if(this.newAward.title.length < 3){
                    this.errors = {
                      title : 'Award title should be more than 3 symbols.'
                    };
                }
                await this.$emit('achievementAdded', this.newAward);
                this.newAward.title= '';
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
