<template>
    <div style="width: 100%">
        <div class="section-title">
            <div class="title-light">Add</div>
            <h2>Skills</h2>
        </div>
        <div class="section-body-wrapper">
            <div class="achievements-bar" id="skillLinksWrapper">
                <div class="bar-item" v-for="(tabName,i) in tabs" :key="i" :index="i" :item="tabName" :data-target="tabName" @click="changeTab" :class="{ active : activeTab === tabName}">
                    {{ tabName.replace('_', ' ') }}
                </div>
                
                <div class="decorator"></div>
            </div>

            <div class="add-award-section hideOnMd">
                <div class="add-skill-container">
                    <div class="input-field">
                        <label for="title">Skill/ tools/ software name</label>
                        <input type="text" v-model="skill.title" required>
                        <div class="error" v-if="errors.new.title">
                            {{ Array.isArray(errors.new.title) ? errors.new.title[0] : errors.new.title}}
                        </div>
                    </div>
                    <div class="input-field">
                        <label for="percentage">How much your skill on (Percentage) over this software?</label>
                        <input type="number" min="30" max="100" step="1" v-model="skill.percentage">
                        <div class="error" v-if="errors.new.percentage">
                            {{ Array.isArray(errors.new.percentage) ? errors.new.percentage[0] : errors.new.percentage}}
                        </div>
                    </div>
                </div>
                <div class="action-btns">
                    <a class="add-award-btn btn btn-filled" href="javascript:void(0)" @click="addSkill">
                        <svg-vue class='icon' :icon="'add-icon'"></svg-vue>
                        Add skill now
                    </a>
                    <a class="btn btn-outline" href="">
                        <img class='icon' src="/images/resume_builder/work-ex/add-box.png" alt="add">
                        Auto import
                    </a>
                </div>
            </div>
            

            <transition class="showOnMd" name="fadeCustom" mode="out-in">            
                <div v-if="!addNewSkill" class="action-btns">
                    <a class="btn btn-filled" href="javascript:void(0)" @click="addNewSkill = true">
                        <svg-vue class='icon' :icon="'add-icon'"></svg-vue>
                        Add skill now
                    </a>
                    <a class="btn btn-outline" href="javascript:void(0)">
                        <img class='icon' src="/images/resume_builder/work-ex/add-box.png" alt="add">
                        Auto import
                    </a>
                </div>
                <div v-else class="addSkillForm">
                    <div class="add-award-section">
                        <div class="input-field">
                            <label for="title">Skill/ tools/ software name</label>
                            <input type="text" v-model="skill.title" required>
                            <div class="error" v-if="errors.new.title">
                                {{ Array.isArray(errors.new.title) ? errors.new.title[0] : errors.new.title}}
                            </div>
                        </div>
                        <div class="input-field">
                            <label for="percentage">How much your skill on (Percentage) over this software?</label>
                            <input type="number" min="30" max="100" step="1" v-model="skill.percentage">
                            <div class="error" v-if="errors.new.percentage">
                                {{ Array.isArray(errors.new.percentage) ? errors.new.percentage[0] : errors.new.percentage}}
                            </div>
                        </div>
                        <div class="action-btns">
                            <a class="btn btn-filled" href="javascript:void(0)" @click="addSkill">
                                <svg-vue class='icon' :icon="'add-icon'"></svg-vue>
                                Add new skill
                            </a>
                            <a class="btn btn-outline" href="javascript:void(0)" @click="addNewSkill = false">
                                Cancel
                            </a>
                        </div>
                    </div>
                </div>
            </transition>

            <div class="skills-list">
                <div class="skills-item" v-for="(skill,index) in skills" :key="index + '_skill'"
                     v-show="skill.category === activeTab">
                    <div class="options">
                        <div class="options-btn NoDecor"
                             @click="optionSkillId === skill.id ? optionSkillId=0 : optionSkillId=skill.id">
                            <a href="javascript:void(0)" :class="{'opened':optionSkillId === skill.id}">
                                Options
                                <img src="/images/resume_builder/arrow-down.png" alt=""
                                     :class="{'optionsOpened':optionSkillId === skill.id}">
                            </a>
                        </div>
                        <div class="extended-options" v-show="optionSkillId === skill.id"
                             :class="{'opened':optionSkillId === skill.id}">
                            <div class="edit-btn NoDecor" @click="editSkill(skill)">
                                <img src="/images/resume_builder/edit-icon.png" alt="edit icon">
                                Edit
                            </div>
                            <div class="delete-btn NoDecor" @click="deleteSkill(skill)">
                                <img src="/images/resume_builder/delete-icon.png" alt="delete icon">
                                Delete
                            </div>
                        </div>
                    </div>
                    <div class="skill-title">
                        {{skill.title}}
                    </div>
                    <div class="percentage">
                        <div class="percentage-bar">
                            <div class="progress-wrap progress" :id="'skill_' + skill.id"
                                 :data-progress-percent="skill.percentage">
                                <div class="progress-bar progress" :id="'progress-bar_' + skill.id"></div>
                            </div>
                        </div>
                        <div class="percentage-text">
                            {{skill.percentage}}%
                        </div>
                    </div>
                    <div class="editForm">
                        <div class="add-award-section" v-show="editedSkill.id === skill.id">
                            <div class="award-input">
                                <label for="title">Skill/ tools/ software name</label>
                                <input type="text" v-model="editedSkill.title" required>
                                <div class="error" v-if="errors.edit.title">
                                    {{ Array.isArray(errors.edit.title) ? errors.edit.title[0] : errors.edit.title}}
                                </div>
                            </div>
                            <div class="award-input">
                                <label for="percentage">How much your skill on (Percentage) over this software?</label>
                                <input type="number" min="30" max="100" step="1" v-model="editedSkill.percentage">
                                <div class="error" v-if="errors.edit.percentage">
                                    {{ Array.isArray(errors.edit.percentage) ? errors.edit.percentage[0] :
                                    errors.edit.percentage}}
                                </div>
                            </div>
                            <div class="action-btns">
                                <a class="btn btn-filled" href="javascript:void(0)" @click="applyEdit">
                                    <img src="/images/resume_builder/work-ex/mark.png" alt="mark" class="icon">
                                    Save
                                </a>
                                <a class="btn btn-outline" href="javascript:void(0)" @click="cancelEdit">
                                    Cancel
                                </a>
                            </div>

                            
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
import { moveTabsHelper } from '../../helpers/tab-animations';
    export default {
        name: "Skills",
        data() {
            return {
                activeTab: 'programming_languages',
                tabs: [
                    'programming_languages',
                    'software',
                    'design',
                    'frameworks'
                ],
                skill: {
                    category: '',
                    title: '',
                    percentage: '',
                    user_id: this.$store.state.user.id,
                },
                addNewSkill: false,
                optionSkillId: 0,
                editedSkill: {},
                errors: {
                    new: {},
                    edit: {}
                }
            }
        },
        computed: {
            skills() {
                return this.$store.state.user.skills;
            }
        },
        methods: {
            moveProgressBar() {
                this.skills.forEach((skill) => {
                    this.progressBarSingleSkill(skill);
                });
            },
            progressBarSingleSkill(skill) {
                let skillIdSelector = $('#skill_' + skill.id);
                let progressBarSelector = $('#progress-bar_' + skill.id);
                let getPercent = skill.percentage / 100;
                let getProgressWrapWidth = skillIdSelector.width();
                let progressTotal = getPercent * getProgressWrapWidth;
                let animationLength = 2000;
                // on page load, animate percentage bar to data percentage length
                // .stop() used to prevent animation queueing
                progressBarSelector.stop().animate({
                    left: progressTotal
                }, animationLength);
            },
            addSkill() {
                if (this.validateSkill()) {
                    // set skill category & add new
                    this.skill.category = this.activeTab;
                    axios.post('/api/user/skills', this.skill)
                        .then((response) => {
                            let addedSkill = response.data.data;
                            this.skills.push(addedSkill);
                            this.clearSkill();
                            setTimeout(() => { // give time to the skill to be loaded
                                this.progressBarSingleSkill(addedSkill);
                            }, 1500)
                            this.$store.dispatch('fullScreenNotification');
                        })
                        .catch((error) => {
                            if (typeof error.response.data === 'object') {
                                this.errors.new = error.response.data.errors;
                            } else {
                                this.errors.new  = 'Something went wrong. Please try again.';
                            }
                        });
                }
            },
            validateSkill() {
                this.errors = {
                    new:{},
                    edit:{}
                };

                if (this.skill.title && this.skill.percentage) {
                    return true;
                }

                if (!this.skill.title) {
                    this.errors.new.title = 'Title required.';
                }
                if (!this.skill.percentage) {
                    this.errors.new.percentage = 'Percentage required.';
                }

                return false;
            },
            clearSkill() {
                this.skill = {
                    category: '',
                    title: '',
                    percentage: ''
                };
            },

            editSkill(skill) {
                this.editedSkill = {
                    id: skill.id,
                    category: skill.category,
                    title: skill.title,
                    percentage: skill.percentage
                };
                this.closeOptionsBtn();
            },
            applyEdit() {
                axios.put('/api/user/skills', this.editedSkill)
                    .then((response) => {
                        this.EditedSuccessfully(response.data.data);
                    })
                    .catch((error) => {
                        if (typeof error.response.data === 'object') {
                            this.errors.edit = error.response.data.errors;
                        } else {
                            this.errors = 'Something went wrong. Please try again.';
                        }
                    });
            },
            deleteSkill(skill) {
                if (!confirm('Do you want to delete this skill [' + skill.title + '] ?')) {
                   return;
                }
                axios.delete('/api/user/skills/' + skill.id)
                    .then((response) => {
                        this.$store.dispatch('flyingNotificationDelete');
                        this.skills.forEach( (skill,index) => {
                            if(skill.id === response.data.data.id){
                                this.skills.splice(index,1);
                            }
                        });

                        this.closeOptionsBtn();
                    })
                    .catch(error => {
                        console.log(error);
                    })
            },
            EditedSuccessfully(editedSkill) {
                this.clearEditedSkill();
                this.$store.dispatch('fullScreenNotification');
                // replace the edited skill with the new one:
                this.skills.forEach((skill, index) => {
                    if (skill.id === editedSkill.id) {
                        this.skills[index] = editedSkill;
                        this.progressBarSingleSkill(editedSkill);
                    }
                });
            },
            closeOptionsBtn() {
                this.optionSkillId = 0;
            },
            clearEditedSkill() {
                this.editedSkill = {};
            },
            cancelEdit() {
                this.clearEditedSkill();
                this.closeOptionsBtn();
            },
            setActiveTab (tab) {
                this.activeTab = tab
            },
            changeTab (e) {

                // Here will be the animations between transitions
                
                moveTabsHelper(e, 'skillLinksWrapper', this)
            }
        },
        mounted() {
            setTimeout(() => { // give time to skills to be loaded
                this.moveProgressBar();
            }, 2000)

            this.changeTab({ target: document.querySelector(`.bar-item[data-target=${this.activeTab}]`)})
        }

    }
</script>

<style scoped lang="scss">

@import '../../../../../sass/media-queries';

    .section-body-wrapper {
        max-width: 1337px;
        width: 100%;

        .action-btns {
            margin-top: 15px;

            .btn {
                @include lt-sm {
                    width: 48%;
                    min-width: 90px;
                    max-width: 142px;
                }
            }

            @include lt-md {
                display: flex;
                justify-content: space-between;
                width: 100%;
                margin-top: 40px;
            }

            @include gt-sm{
                display: none;
            }

            .add-award-btn {
                margin-right: 31px;

                a {
                    display: flex;
                    justify-content: center;
                    align-items: center;

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

        .addSkillForm {

            @include lt-md {
                display: block !important;

                .input-field {
                    max-width: 100%;
                    width: 100%;

                    input {
                        max-width: 100%;
                    }
                }
            }
        }
        
        .add-award-section {
            display: flex;
            align-items: flex-start;
            flex-direction: column;
            margin-top: 55px;

            .award-input {
                display: flex;
                flex-direction: column;
                margin-bottom: 23px;

                input {
                    width: 572.82px;
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
                    font: 600 16px Noto Sans;
                    letter-spacing: 0;
                    color: #505050;
                    opacity: 1;
                }

                @include lt-md {
                    width: 100%;

                    input{
                        width: 100%;
                        max-height: 60px;
                    }
                }

            }


            .action-btns {
                display: flex;
                margin-top: 15px;

                @include lt-md {
                    justify-content: space-between;
                    width: 100%;
                }

                .add-award-btn {
                    margin-right: 31px;

                    a {
                        display: flex;
                        justify-content: center;
                        align-items: center;

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


        }

        .skills-list {
            margin-top: 60px;
            max-width: 861px;
            width: 100%;

            .skills-item {
                position: relative;
                background: whitesmoke;
                // margin-left: 43px;
                margin-bottom: 30px;
                display: flex;
                justify-content: center;
                flex-direction: column;
                width: 100%;
                min-height: 140px;
                padding: 10px 43px 30px 43px;
                border-radius: 8px; 

                @include lt-md {
                    padding: 1em 2em;
                }

                @include lt-sm {
                    padding: 1em;
                }


                .skill-title {
                    font-family: "Noto Sans", serif;
                    font-weight: bold;
                    font-size: 22px;
                    text-align: left;
                    color: #3c3748;
                }

                .percentage {
                    width: 100%;
                    display: flex;
                    justify-content: space-between;
                    align-items: center;

                    .percentage-bar {
                        width: 85%;

                        .progress {
                            width: 100%;
                            height: 15px;
                            border-radius: 23px;
                        }

                        .progress-wrap {
                            width: 100%;
                            background: #ff7c00;
                            margin: 12px 0;
                            overflow: hidden;
                            position: relative;

                            .progress-bar {
                                background: #FFD7B2;
                                left: 0;
                                position: absolute;
                                top: 0;
                                border-radius: 0;
                                border: 0;
                            }
                        }

                        .progress-wrap.color-blueviolet {
                            background: blueviolet;

                            .progress-bar {
                                background: #BF99E2;
                            }
                        }
                    }

                    .percentage-text {
                        font-family: "Noto Sans", serif;
                        font-weight: bold;
                        font-size: 22px;
                        text-align: right;
                        color: #ff7c00;
                    }

                    .percentage-text.color-blueviolet {
                        color: blueviolet;
                    }
                }

                .options {
                    position: absolute;
                    right: 14px;
                    top: 14px;

                    .options-btn {
                        a {
                            width: 88px;
                            height: 29px;

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
                        width: 88px;
                        height: 60px;
                        padding-top: 7px;
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
                        position: relative;
                        z-index: 2;
                    }
                }

                .editForm{
                    display: flex;
                    justify-content: center;
                    width: 100%;

                    .add-award-section{
                        width: 580px;

                        @include lt-md {
                            width: 100%;
                        }
                    }

                    .action-btns{
                        justify-content: space-between;
                        width: 100%;
                    }
                }
            }
        }

    }

    .error {
        color: red;
        font-weight: 600;
        margin-left: 5px;
    }
</style>
