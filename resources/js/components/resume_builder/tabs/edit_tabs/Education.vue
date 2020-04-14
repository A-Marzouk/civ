<template>
    <div class="work-container">
        <div class="section-title">
            <div class="title-light">Add</div>
            <h2>Education</h2>
        </div>
        <div class="section-body">
            <transition name='fadeCustom' mode="out-in">
                <div class="work-ex-form"  v-show="addNewEducation">
                    <div class="work-ex-form-input input-field">
                        <label for="institutionType">Institution type</label>
                        <input type="text" id="institutionType" class="shorter" v-model="newEducation.institution_type">
                        <div class="error" v-if="errors.new.institution_type">
                            {{ Array.isArray(errors.new.institution_type) ? errors.new.institution_type[0] : errors.new.institution_type}}
                        </div>
                    </div>
                    <div class="work-ex-form-input input-field">
                        <label for="universityName">University name</label>
                        <input type="text" id="universityName" v-model="newEducation.university_name">
                        <div class="error" v-if="errors.new.university_name">
                            {{ Array.isArray(errors.new.university_name) ? errors.new.university_name[0] : errors.new.university_name}}
                        </div>
                    </div>
                    <div class="work-ex-form-input input-field">
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
            </transition>
            <div class="action-btns" :class='{"justify-content-between": addNewEducation}'>
                <a v-if="addNewEducation" class="btn btn-filled" href="javascript:void(0)" @click="addEducation">
                    <img class="icon" src="/images/resume_builder/work-ex/mark.png" alt="">
                    Save
                </a>
                <a v-if="!addNewEducation" class="btn btn-outline" href="javascript:void(0)" @click="addNewEducation = true">
                    <img class="icon" src="/images/resume_builder/work-ex/add-box.png" alt="">
                    Add new degree
                </a>
                <a v-if="addNewEducation" class="btn btn-outline cancel-btn" href="javascript:void(0)" @click="addNewEducation = false" >
                    Cancel
                </a>
                <!--<div class="auto-import NoDecor">-->
                    <!--<a href="javascript:void(0)">-->
                        <!--<img src="/images/resume_builder/work-ex/add-box.png" alt="">-->
                        <!--Auto import-->
                    <!--</a>-->
                <!--</div>-->
            </div>
            <div class="work-ex-list">
                <div class="work-ex-item mt-5 flex-column" v-for="(education,index) in educations" :key="index + '_education'">
                    <div class="item-grid">
                        <div class="work-icon">
                            <img src="/images/resume_builder/work-ex/college-hat.png" alt="work-icon">
                        </div>
                        <div class="work-ex-info">
                            <div class="work-ex-title">
                                {{education.university_name}}
                            </div>
                            <div class="work-ex-sub-title">
                                {{education.degree_title}}<br/>
                                Duration: {{education.date_from}} - {{education.present ? "present" : education.date_to}}
                            </div>
                            <div class="work-ex-detials">
                                {{education.description || 'Dolor consectetur exercitation irure veniam pariatur laborum proident anim cupidatat anim duis et veniam. Irure non reprehenderit nisi in voluptate ad. Do consectetur consequat esse duis minim mollit exercitation nisi. Enim proident in excepteur commodo minim voluptate aliqua commodo ut. Duis dolore id in pariatur sit aliquip esse ut veniam. Velit est culpa tempor ullamco elit.'}}
                            </div>
                            <div class="optionsBtns showOnMd">
                                <a href="javascript:;" @click="editEducation(education)">
                                    <svg-vue class='icon' :icon="'edit-icon'"></svg-vue>
                                </a>

                                <a href="javascript:;" @click="deleteEducation(education)">
                                    <svg-vue class='icon' :icon="'trash-delete-icon'"></svg-vue>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="options hideOnMd">
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
                            <div class="work-ex-form-input input-field">
                                <label for="institutionType">Institution type</label>
                                <input type="text" class="shorter" v-model="editedEducation.institution_type">
                                <div class="error" v-if="errors.edit.institution_type">
                                    {{ Array.isArray(errors.edit.institution_type) ? errors.edit.institution_type[0] : errors.edit.institution_type}}
                                </div>
                            </div>
                            <div class="work-ex-form-input input-field">
                                <label for="universityName">University name</label>
                                <input type="text" v-model="editedEducation.university_name">
                                <div class="error" v-if="errors.edit.university_name">
                                    {{ Array.isArray(errors.edit.university_name) ? errors.edit.university_name[0] : errors.edit.university_name}}
                                </div>
                            </div>
                            <div class="work-ex-form-input input-field">
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
                            <a class="btn btn-filled" href="javascript:void(0)" @click="applyEdit">
                                <img class="icon" src="/images/resume_builder/work-ex/mark.png" alt="">
                                Save
                            </a>
                            <a class="btn btn-outline" href="javascript:void(0)" @click="clearEditedEducation">
                                Cancel
                            </a>
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
        name: "Education",
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
                    present: false
                },
                errors: {
                    new: {},
                    edit: {}
                },
                addNewEducation: false
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
                        this.$store.dispatch('flyingNotification', {
                            message: 'Error',
                            iconSrc: '/images/resume_builder/error.png'
                        });
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
                this.newEducation.user_id = this.$store.state.user.id
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
                        this.$store.dispatch('flyingNotification', {
                            message: 'Error',
                            iconSrc: '/images/resume_builder/error.png'
                        });
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
@import '../../../../../sass/media-queries';
$mainBlue: #001CE2;

    .section-body {
        margin-top: 20px;

        .work-ex-form {
            display: flex;
            flex-wrap: wrap;
            max-width: 1302px;
            width: 100%;
            justify-content: space-between;

            @include lt-md {
                padding: 0 62px;
            }

            @include lt-sm {
                padding: 0;
            }

            .work-ex-form-input.input-field {
                display: flex;
                flex-direction: column;
                margin-top: 42px;
                width: 49%;
                min-width: 524px;

                @include lt-lg {
                    width: 48%;
                    max-width: 637px;
                    min-width: auto;
                }

                @include lt-md {
                    margin-top: 5px;
                    width: 100%;
                    max-width: 100%;
                }

                &.description-field {
                    margin-bottom: 0;

                    @include lt-lg {
                        max-width: 100% !important;
                        margin-bottom: 25px;
                        width: 100%;
                    }
                }

                label {
                    text-align: left;
                    font: 600 22px/30px Noto Sans;
                    letter-spacing: 0;
                    opacity: 1;

                    @include lt-md {
                        font-size: 18px;
                    }

                    @include lt-sm {
                        font-size: 15px;
                    }
                }

                input {
                    height: 76px;
                    border-radius: 10px;
                    opacity: 1;
                    padding-left: 18px;

                    &.shorter {
                        max-width: 571px;
                        width: 90%;

                        // Forced breakpoint
                        @media (max-width: 1556px) {
                            width: 100%;
                            max-width: 100%;
                        }
                    }

                    @include lt-md {
                        height: 47px;
                        width: 100%;
                        max-width: 100%;
                    }
                }

                input:focus {
                    outline: none;
                }

                textarea {
                    max-width: 637px;
                    width: 100%;
                    height: 201px;
                    // border: 2px solid #505050;
                    border-radius: 10px;
                    opacity: 1;
                    padding-left: 18px;
                    padding-top: 18px;

                    @include lt-lg {
                        max-width: 100% !important;
                    }

                    @include lt-md {
                        height: 131px;
                    }
                }

                textarea:focus{
                    outline: none;
                }
            }

            .work-ex-form-group {
                display: flex;
                flex-direction: column;
                justify-content: space-between;
                width: 48%;
                max-width: 637px;
                min-width: 524px;

                @include lt-lg {
                    min-width: auto;
                    // flex-direction: row;
                    // flex-wrap: wrap;
                    margin-top: 42px;
                    margin-bottom: 25px;
                }

                @include lt-md {
                    width: 100%;
                    max-width: 100%;
                }

                .input-field {
                    width: 100%;
                    @include lt-lg {
                            width: 48%;
                        margin-bottom: 0 !important;
                    }

                    @include lt-md {
                        width: 100%;
                        max-width: 100%;
                        margin-bottom: 25px !important;
                        
                        input {
                            max-width: 100%;
                        }
                    }
                }

                .date-group {
                    display: flex;
                    justify-content: space-between;
                    align-items: flex-end;
                    min-width: 637px;
                    width: 100%;

                    @include lt-lg {
                        // width: 48%;
                        min-width: 200px;
                    }

                    @include lt-md {
                        width: 100%;
                        margin-bottom: 0;
                    }

                    .date-text {
                        font: 600 19px/26px Noto Sans;
                        letter-spacing: 0;
                        color: #001CE2;
                        opacity: 1;
                        margin: 0 33px 18px;

                        @include lt-lg {
                            margin: 0 15px 18px;
                        }

                        @include lt-md {
                            font-size: 16px;
                        }

                        @include lt-sm {
                            font-size: 12px;
                            margin: 0 6px 10px;
                        }
                    }

                    .date-input {
                        display: flex;
                        flex-direction: column;
                        max-width: 275px;
                        width: calc(50% - 44px);

                        @include lt-sm {
                            width: 50%;
                        }

                        label {
                            text-align: left;
                            font: 600 22px/30px Noto Sans;
                            letter-spacing: 0;
                            color: #505050;
                            opacity: 1;

                            @include lt-md {
                                font-size: 18px;
                                color: $mainBlue;
                            }

                            @include lt-sm {
                                font-size: 15px;
                            }
                        }

                        label.light {
                            font: 500 18px/24px Noto Sans;
                            letter-spacing: 0;
                            opacity: 1;

                            @include lt-lg {
                                font-size: 15px;
                            }

                            @include lt-md {
                                font-size: 11px;
                                color: $mainBlue;
                            }
                        }

                        input {
                            width: 100%;
                            height: 62px;
                            border: 2px solid #505050;
                            border-radius: 8px;
                            opacity: 1;
                            padding-left: 18px;

                            @include lt-lg {
                                height: 76px;
                                border-width: 0;
                                background: #F5F5F5;
                            }

                            @include lt-md {
                                height: 47px;
                            }
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
            max-width: 600px;
            justify-content: space-between;

            @include lt-md {
                max-width: 100%;
            }

            .btn {
                font-size: 14px !important;

                 @include lt-md {
                    width: 46%;
                    min-width: 100px;
                }
            }

            .add-work {
                margin-right: 29px;

                @include lt-md {
                    width: 45%;
                }

                &.save-btn {
                    @include lt-md {
                        width: 32%;
                        min-width: 100px;
                        margin-left: 62px;
                    }
                    
                    @include lt-sm {
                        width: 49%;
                        margin-left: 0;
                    }
                }

                &.cancel-btn {
                    @include lt-md {
                        width: 32%;
                        min-width: 100px;
                        margin-right: 62px;
                    }

                    @include lt-sm {
                        width: 30%;
                        margin-right: 0;
                    }
                }

                a {
                    // display: flex;
                    // justify-content: center;
                    // align-items: center;

                    max-width: 247px;
                    height: 62px;
                    // background: #001CE2 0% 0% no-repeat padding-box;
                    border-radius: 8px;
                    opacity: 1;

                    font: 600 19px/26px Noto Sans;
                    // letter-spacing: 0;
                    // color: #FFFFFF;

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
                    // display: flex;
                    // justify-content: center;
                    // align-items: center;

                    width: 226px;
                    height: 62px;
                    // border: 2px solid #001CE2;
                    border-radius: 8px;
                    opacity: 1;

                    font: 600 19px/26px Noto Sans;
                    letter-spacing: 0;
                    // color: #001CE2;

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
                position: relative;
                display: flex;
                justify-content: flex-start;
                max-width: 757px;
                width: 100%;
                margin-bottom: 30px;

                .item-grid {
                    width: 100%;
                    display: grid;
                    grid-template-columns: 38px 1fr;
                    grid-gap: 18px;

                    @include lt-sm {
                        grid-gap: 6px;
                    }
                }

                .work-icon{
                    width: 100%;
                    margin-top: 10px;

                    img {
                        width: 100%;
                        height: auto;
                    }

                    @include lt-md {
                        img {
                            width: 34px;
                        }
                    }

                    @include lt-sm {
                        grid-gap: 12px;
                        
                        img {
                            width: 28px;
                        }
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
                            font-size: 24px;
                        }

                        @include lt-md {
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
                            font-size: 18px;
                        }

                        @include lt-md {
                            font-size: 14px;
                        }
                    }
                    .work-ex-detials{
                        font: 500 16px Noto Sans;
                        letter-spacing: 0;
                        color: #555060;
                        opacity: 1;

                        @include lt-md {
                            font-size: 12px;
                        }

                        @include lt-md {
                            font-size: 11px;
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
