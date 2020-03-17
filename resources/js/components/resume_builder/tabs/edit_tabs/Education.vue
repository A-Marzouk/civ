<template>
    <div>
        <div class="section-title">
            <div class="title-light">Add</div>
            <h2>Education</h2>
        </div>
        <div class="section-body">
            <div class="work-ex-form"  v-show="addNewEducation">
                <div class="work-ex-form-input">
                    <label for="institutionType">Institution type</label>
                    <input type="text" id="institutionType" class="shorter" v-model="newEducation.institution_type">
                    <div class="error" v-if="errors.new.institution_type">
                        {{ Array.isArray(errors.new.institution_type) ? errors.new.institution_type[0] : errors.new.institution_type}}
                    </div>
                </div>
                <div class="work-ex-form-input">
                    <label for="universityName">University name</label>
                    <input type="text" id="universityName" v-model="newEducation.university_name">
                    <div class="error" v-if="errors.new.university_name">
                        {{ Array.isArray(errors.new.university_name) ? errors.new.university_name[0] : errors.new.university_name}}
                    </div>
                </div>
                <div class="work-ex-form-input">
                    <label for="degreeTitle">Degree title</label>
                    <input type="text" id="degreeTitle"  class="shorter" v-model="newEducation.degree_title">
                    <div class="error" v-if="errors.new.degree_title">
                        {{ Array.isArray(errors.new.degree_title) ? errors.new.degree_title[0] : errors.new.degree_title}}
                    </div>
                </div>
                <div class="work-ex-form-group">
                    <div class="date-group">
                        <div class="date-input">
                            <label for="dateFrom">Session</label>
                            <input type="date" id="dateFrom" v-model="newEducation.date_from">
                            <div class="error" v-if="errors.new.date_from">
                                {{ Array.isArray(errors.new.date_from) ? errors.new.date_from[0] : errors.new.date_from}}
                            </div>
                        </div>
                        <div class="date-text">
                            to
                        </div>
                        <div class="date-input">
                            <label for="dateTo" class="light d-flex align-items-center">
                                <input type="checkbox" class="checkbox" v-model="newEducation.present"> I currently study here.
                            </label>
                            <input type="date" id="dateTo" v-model="newEducation.date_to" :disabled="newEducation.present">
                            <div class="error" v-if="errors.new.date_to">
                                {{ Array.isArray(errors.new.date_to) ? errors.new.date_to[0] : errors.new.date_to}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="action-btns">
                <div class="add-work NoDecor mr-0">
                    <a href="javascript:void(0)" v-show="addNewEducation" @click="addEducation">
                        <img src="/images/resume_builder/work-ex/mark.png" alt="">
                        Save
                    </a>
                </div>
                <div class="add-new-work NoDecor">
                    <a href="javascript:void(0)" @click="addNewEducation = true" v-show="!addNewEducation">
                        <img src="/images/resume_builder/work-ex/add-box.png" alt="">
                        Add new degree
                    </a>
                </div>
                <div class="add-new-work NoDecor">
                    <a href="javascript:void(0)" @click="addNewEducation = false" v-show="addNewEducation">
                        Cancel
                    </a>
                </div>
                <!--<div class="auto-import NoDecor">-->
                    <!--<a href="javascript:void(0)">-->
                        <!--<img src="/images/resume_builder/work-ex/add-box.png" alt="">-->
                        <!--Auto import-->
                    <!--</a>-->
                <!--</div>-->
            </div>
            <div class="work-ex-list">
                <div class="work-ex-item mt-5 flex-column" v-for="(education,index) in educations" :key="index + '_education'">
                    <div class="d-flex">
                        <div class="work-icon">
                            <img src="/images/resume_builder/work-ex/work-icon-bag.png" alt="work-icon">
                        </div>
                        <div class="work-ex-info">
                            <div class="work-ex-title">
                                {{education.university_name}}
                            </div>
                            <div class="work-ex-sub-title">
                                {{education.degree_title}}<br/>
                            </div>
                            <div class="work-ex-detials">
                                {{education.date_from}} - {{education.present ? "present" : education.date_to}}
                            </div>
                        </div>
                    </div>
                    <div class="options">
                        <div class="options-btn NoDecor"
                             @click="optionEducationId === education.id ? optionEducationId=0 : optionEducationId=education.id">
                            <a href="javascript:void(0)" :class="{'opened':optionEducationId === education.id}">
                                Options
                                <img src="/images/resume_builder/arrow-down.png" alt=""
                                     :class="{'optionsOpened':optionEducationId === education.id}">
                            </a>
                        </div>
                        <div class="extended-options" v-show="optionEducationId === education.id"
                             :class="{'opened':optionEducationId === education.id}">
                            <div class="edit-btn NoDecor" @click="editEducation(education)">
                                <img src="/images/resume_builder/edit-icon.png" alt="edit icon">
                                Edit
                            </div>
                            <div class="delete-btn NoDecor" @click="deleteEducation(education)">
                                <img src="/images/resume_builder/delete-icon.png" alt="delete icon">
                                Delete
                            </div>
                        </div>
                    </div>
                    <div v-show="education.id === editedEducation.id">
                        <div class="work-ex-form">
                            <div class="work-ex-form-input">
                                <label for="institutionType">Institution type</label>
                                <input type="text" class="shorter" v-model="editedEducation.institution_type">
                                <div class="error" v-if="errors.edit.institution_type">
                                    {{ Array.isArray(errors.edit.institution_type) ? errors.edit.institution_type[0] : errors.edit.institution_type}}
                                </div>
                            </div>
                            <div class="work-ex-form-input">
                                <label for="universityName">University name</label>
                                <input type="text" v-model="editedEducation.university_name">
                                <div class="error" v-if="errors.edit.university_name">
                                    {{ Array.isArray(errors.edit.university_name) ? errors.edit.university_name[0] : errors.edit.university_name}}
                                </div>
                            </div>
                            <div class="work-ex-form-input">
                                <label for="degreeTitle">Degree title</label>
                                <input type="text"  class="shorter" v-model="editedEducation.degree_title">
                                <div class="error" v-if="errors.edit.degree_title">
                                    {{ Array.isArray(errors.edit.degree_title) ? errors.edit.degree_title[0] : errors.edit.degree_title}}
                                </div>
                            </div>
                            <div class="work-ex-form-group">
                                <div class="date-group">
                                    <div class="date-input">
                                        <label for="dateFrom">Session</label>
                                        <input type="date" v-model="editedEducation.date_from">
                                        <div class="error" v-if="errors.edit.date_from">
                                            {{ Array.isArray(errors.edit.date_from) ? errors.edit.date_from[0] : errors.edit.date_from}}
                                        </div>
                                    </div>
                                    <div class="date-text">
                                        to
                                    </div>
                                    <div class="date-input">
                                        <label for="dateTo" class="light d-flex align-items-center">
                                            <input type="checkbox" class="checkbox" v-model="editedEducation.present" > I currently study here.
                                        </label>
                                        <input type="date" v-model="editedEducation.date_to"  :disabled="editedEducation.present">
                                        <div class="error" v-if="errors.edit.date_to">
                                            {{ Array.isArray(errors.edit.date_to) ? errors.edit.date_to[0] : errors.edit.date_to}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="action-btns">
                            <div class="add-work NoDecor">
                                <a href="javascript:void(0)" @click="applyEdit">
                                    <img src="/images/resume_builder/work-ex/mark.png" alt="">
                                    Save
                                </a>
                            </div>
                            <div class="add-new-work NoDecor">
                                <a href="javascript:void(0)" @click="clearEditedEducation">
                                    Cancel
                                </a>
                            </div>
                            <!--<div class="auto-import NoDecor">-->
                            <!--<a href="javascript:void(0)">-->
                            <!--<img src="/images/resume_builder/work-ex/add-box.png" alt="">-->
                            <!--Auto import-->
                            <!--</a>-->
                            <!--</div>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "WorkExperience",
        data() {
            return {
                optionEducationId: 0,
                editedEducation: {},
                newEducation: {
                    institution_type:'',
                    university_name:'',
                    degree_title:'',
                    date_from:'',
                    date_to:'',
                    present:false,
                },
                errors: {
                    new: {},
                    edit: {}
                },
                addNewEducation:false
            }
        },
        computed: {
            educations() {
                return this.$store.state.user.education;
            }
        },
        methods: {
            editEducation(education) {
                this.editedEducation = {
                    id: education.id,
                    institution_type:education.institution_type,
                    university_name:education.university_name,
                    degree_title:education.degree_title,
                    date_from:education.date_from,
                    date_to:education.date_to,
                    present:education.present,
                };
                this.closeOptionsBtn();
            },
            applyEdit() {
                axios.put('/api/user/education', this.editedEducation)
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
            EditedSuccessfully(editedEducation) {
                this.clearEditedEducation();
                this.$store.dispatch('fullScreenNotification');
                // replace the edited skill with the new one:
                this.educations.forEach((education, index) => {
                    if (education.id === editedEducation.id) {
                        this.educations[index] = editedEducation;
                    }
                });
            },
            clearEditedEducation() {
                this.editedEducation = {};
            },
            deleteEducation(education){
                if (!confirm('Do you want to delete this education ?')) {
                    return;
                }
                axios.delete('/api/user/education/' + education.id)
                    .then((response) => {
                        this.$store.dispatch('flyingNotificationDelete');
                        this.educations.forEach( (myEducation,index) => {
                            if(myEducation.id === response.data.data.id){
                                this.educations.splice(index,1);
                            }
                        });

                        this.closeOptionsBtn();
                    })
                    .catch(error => {
                        console.log(error);
                    })
            },
            addEducation(){
                this.errors = {  new: {}, edit: {}};
                axios.post('/api/user/education', this.newEducation)
                    .then((response) => {
                        this.educations.unshift(response.data.data);
                        this.clearEducation();
                        this.$store.dispatch('fullScreenNotification');
                    })
                    .catch((error) => {
                        if (typeof error.response.data === 'object') {
                            this.errors.new = error.response.data.errors;
                        } else {
                            this.errors.new  = 'Something went wrong. Please try again.';
                        }
                    });
            },
            clearEducation(){
                this.addNewEducation = false;
                this.newEducation = {
                    institution_type:'',
                    university_name:'',
                    degree_title:'',
                    date_from:'',
                    date_to:'',
                    present:false,
                }
            },
            closeOptionsBtn() {
                this.optionEducationId = 0;
            },
        },
        mounted() {

        }
    }
</script>

<style scoped lang="scss">
    .section-body {
        margin-top: 20px;

        .work-ex-form {
            display: flex;
            flex-wrap: wrap;
            width: 1302px;
            justify-content: space-between;

            .work-ex-form-input {
                display: flex;
                flex-direction: column;
                margin-top: 42px;

                label {
                    text-align: left;
                    font: 600 22px/30px Noto Sans;
                    letter-spacing: 0;
                    color: #505050;
                    opacity: 1;
                }

                input.shorter {
                    width: 571px;
                }

                input {
                    width: 637px;
                    height: 76px;
                    border: 2px solid #505050;
                    border-radius: 10px;
                    opacity: 1;
                    padding-left: 18px;
                }

                input:focus {
                    outline: none;
                }

                textarea {
                    width: 617px;
                    height: 201px;
                    border: 2px solid #505050;
                    border-radius: 10px;
                    opacity: 1;
                    padding-left: 18px;
                }

                textarea:focus{
                    outline: none;
                }
            }

            .work-ex-form-group {
                display: flex;
                flex-direction: column;
                justify-content: flex-end;
                width: 637px;

                .date-group {
                    display: flex;
                    justify-content: space-between;
                    align-items: flex-end;
                    margin-bottom: 12px;

                    .date-text {
                        font: 600 19px/26px Noto Sans;
                        letter-spacing: 0;
                        color: #001CE2;
                        opacity: 1;
                        margin-bottom: 18px;
                    }

                    .date-input {
                        display: flex;
                        flex-direction: column;

                        label {
                            text-align: left;
                            font: 600 22px/30px Noto Sans;
                            letter-spacing: 0;
                            color: #505050;
                            opacity: 1;
                        }

                        label.light {
                            font: 500 18px/24px Noto Sans;
                            letter-spacing: 0;
                            color: #505050;
                            opacity: 1;
                        }

                        input {
                            width: 275px;
                            height: 62px;
                            border: 2px solid #505050;
                            border-radius: 8px;
                            opacity: 1;
                            padding-left: 18px;
                        }

                        input:focus{
                            outline: none;
                        }

                        input.checkbox {
                            width: 21px;
                            height: 21px;
                            padding-left: 0;
                            margin-right: 8px;
                        }
                    }
                }
            }
        }
        .action-btns {
            display: flex;
            margin-top: 42px;
            .add-work {
                margin-right: 29px;
                a{
                    display: flex;
                    justify-content: center;
                    align-items: center;

                    width: 247px;
                    height: 62px;
                    background: #001CE2 0% 0% no-repeat padding-box;
                    border-radius: 8px;
                    opacity: 1;

                    font: 600 19px/26px Noto Sans;
                    letter-spacing: 0;
                    color: #FFFFFF;

                    img{
                        width:27px;
                        height: 27px;
                        margin-right: 10px;
                    }
                }
            }

            .add-new-work {
                margin-right: 29px;

                a{
                    display: flex;
                    justify-content: center;
                    align-items: center;

                    width: 226px;
                    height: 62px;
                    border: 2px solid #001CE2;
                    border-radius: 8px;
                    opacity: 1;

                    font: 600 19px/26px Noto Sans;
                    letter-spacing: 0;
                    color: #001CE2;

                    img{
                        width:27px;
                        height: 27px;
                        margin-right: 10px;
                    }
                }
            }

            .auto-import {
                a{
                    display: flex;
                    justify-content: center;
                    align-items: center;

                    width: 226px;
                    height: 62px;
                    border: 2px solid #001CE2;
                    border-radius: 8px;
                    opacity: 1;

                    font: 600 19px/26px Noto Sans;
                    letter-spacing: 0;
                    color: #001CE2;

                    img{
                        width:27px;
                        height: 27px;
                        margin-right: 10px;
                    }
                }
            }
        }
        .work-ex-list{
            margin-top: 64px;
            .work-ex-item{
                display: flex;
                position: relative;
                justify-content: space-between;
                width: 757px;

                .work-icon{
                    width: 38px;
                    height: 27px;
                    margin-right: 33px;
                }

                .work-ex-info{
                    .work-ex-title{
                        font: 700 30px/41px Noto Sans;
                        letter-spacing: 0;
                        color: #001CE2;
                        margin-bottom: 12px;
                        opacity: 1;
                    }
                    .work-ex-sub-title{
                        font: 700 19px Noto Sans;
                        letter-spacing: 0;
                        color: #001CE2;
                        opacity: 1;
                        margin-bottom: 16px;
                    }
                    .work-ex-detials{
                        font: 500 16px Noto Sans;
                        letter-spacing: 0;
                        color: #001CE2;
                        opacity: 1;
                    }
                }

                .options {
                    position: absolute;
                    right: 14px;
                    top: 14px;

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
                        margin-top: 8px;
                        width: 130px;
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
                    }
                }
            }
        }
    }
    .error {
        color: red;
        margin-left: 5px;
    }
</style>
