<template>
    <div class="work-container" id="worksSection">

        <!-- Tabs -->
        <v-tabs class="resume-builder__tab-bar" hide-slider>
            <v-tab class="resume-builder__tab tabName" v-for="tab in tabs" :key="tab" @click="setLinkCategory(tab)">
                {{tab}}
            </v-tab>
        </v-tabs>

        <div class="links-content resume-builder__scroll" v-if="works">
            <div class="link-inputs-row">
                <div class="inputs">
                    <div class="left">
                        <v-text-field
                                class="resume-builder__input civie-input"
                                outlined
                                color="#001CE2"
                                placeholder="Company"
                                :class="{'resume-builder__input--disabled': false}"
                                :disabled="false"
                                label="Company Name"
                                :error="!!errors.company_name"
                                v-model="newWork.company_name"
                        >
                        </v-text-field>

                        <v-text-field
                                class="resume-builder__input civie-input"
                                outlined
                                color="#001CE2"
                                placeholder="Job title"
                                :class="{'resume-builder__input--disabled': false}"
                                :disabled="false"
                                label="Job title"
                                :error="!!errors.job_title"
                                v-model="newWork.job_title"
                        >
                        </v-text-field>

                        <v-text-field
                                class="resume-builder__input civie-input"
                                outlined
                                color="#001CE2"
                                placeholder="Website"
                                :class="{'resume-builder__input--disabled': false}"
                                :disabled="false"
                                label="Website"
                                :error="!!errors.website"
                                v-model="newWork.website"
                        >
                        </v-text-field>

                        <div class="date-group">
                            <div class="date-input">
                                <label for="dateFrom">Date</label>
                                <input type="date"  v-model="newWork.date_from">
                                <div class="error" v-if="errors.new.date_from">
                                    {{ Array.isArray(errors.new.date_from) ? errors.new.date_from[0] : errors.new.date_from}}
                                </div>
                            </div>
                            <div class="date-text">
                                -
                            </div>
                            <div class="date-input">
                                <label for="dateTo" class="light d-flex align-items-center">
                                    <input type="checkbox" class="checkbox" v-model="newWork.present"> I currently work here.
                                </label>
                                <input type="date"  v-model="newWork.date_to" :disabled="newWork.present">
                                <div class="error" v-if="errors.new.date_to">
                                    {{ Array.isArray(errors.new.date_to) ? errors.new.date_to[0] : errors.new.date_to}}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="right">
                        <v-textarea
                                class="resume-builder__input profile-input civie-textarea"
                                outlined
                                color="#001CE2"
                                :class="{'resume-builder__input--disabled': false}"
                                :disabled="false"
                                :error="!!errors.description"
                                v-model="newWork.description"
                                label="Description"
                        >
                        </v-textarea>
                    </div>
                </div>

                <div class="btns">
                    <v-btn class="resume-builder__btn civie-btn filled" raised @click="addWorkEx">
                        Add New
                    </v-btn>
                </div>


                <div class="work-ex-list">
                    <div class="work-ex-item mt-5 flex-column" v-for="(work,index) in works" :key="index + '_workEx'">
                        <div class="item-grid">
                            <div class="work-icon">
                                <img src="/images/resume_builder/work-ex/work-icon-bag.png" alt="work-icon">
                            </div>
                            <div class="work-ex-info">
                                <div class="work-ex-title">
                                    {{work.company_name}}
                                </div>
                                <div class="work-ex-sub-title">
                                    {{work.job_title}},<br/>
                                    Duration: {{work.date_from}} - {{work.present ? "present" : work.date_to}}
                                </div>
                                <div class="work-ex-detials">
                                    {{work.description}}
                                </div>
                                <div class="optionsBtns showOnMd">
                                    <a href="javascript:;" @click="editWork(work)">
                                        <svg-vue class='icon' :icon="'edit-icon'"></svg-vue>
                                    </a>

                                    <a href="javascript:;" @click="deleteWork(work)">
                                        <svg-vue class='icon' :icon="'trash-delete-icon'"></svg-vue>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="options hideOnMd">
                            <div class="options-btn NoDecor"
                                 @click="optionWorkId === work.id ? optionWorkId=0 : optionWorkId=work.id">
                                <a href="javascript:void(0)" :class="{'opened':optionWorkId === work.id}">
                                    Options
                                    <img src="/images/resume_builder/arrow-down.png" alt=""
                                         :class="{'optionsOpened':optionWorkId === work.id}">
                                </a>
                            </div>
                            <div class="extended-options" v-show="optionWorkId === work.id"
                                 :class="{'opened':optionWorkId === work.id}">
                                <div class="edit-btn NoDecor" @click="editWork(work)">
                                    <img src="/images/resume_builder/edit-icon.png" alt="edit icon">
                                    Edit
                                </div>
                                <div class="delete-btn NoDecor" @click="deleteWork(work)">
                                    <img src="/images/resume_builder/delete-icon.png" alt="delete icon">
                                    Delete
                                </div>
                            </div>
                        </div>
                        <div class="work-ex-form flex-column" v-show="work.id === editedWork.id">
                            <div class="d-flex flex-row flex-wrap justify-content-between">
                                <div class="work-ex-form-input input-field">
                                    <label for="companyName">Company name</label>
                                    <input type="text" v-model="editedWork.company_name">
                                    <div class="error" v-if="errors.edit.company_name">
                                        {{ Array.isArray(errors.edit.company_name) ? errors.edit.company_name[0] : errors.edit.company_name}}
                                    </div>
                                </div>
                                <div class="work-ex-form-input input-field">
                                    <label for="jobTitle">Job title</label>
                                    <input type="text" v-model="editedWork.job_title">
                                    <div class="error" v-if="errors.edit.job_title">
                                        {{ Array.isArray(errors.edit.job_title) ? errors.edit.job_title[0] : errors.edit.job_title}}
                                    </div>
                                </div>
                                <div class="work-ex-form-input input-field">
                                    <label for="description">Description</label>
                                    <textarea type="text"  v-model="editedWork.description"></textarea>
                                    <div class="error" v-if="errors.edit.description">
                                        {{ Array.isArray(errors.edit.description) ? errors.edit.description[0] : errors.edit.description}}
                                    </div>
                                </div>
                                <div class="work-ex-form-group">
                                    <div class="work-ex-form-input input-field">
                                        <label for="website">Website (optional)</label>
                                        <input type="text"  v-model="editedWork.website">
                                        <div class="error" v-if="errors.edit.website">
                                            {{ Array.isArray(errors.edit.website) ? errors.edit.website[0] : errors.edit.website}}
                                        </div>
                                    </div>
                                    <div class="date-group">
                                        <div class="date-input">
                                            <label for="dateFrom">Date</label>
                                            <input type="date"  v-model="editedWork.date_from">
                                            <div class="error" v-if="errors.edit.date_from">
                                                {{ Array.isArray(errors.edit.date_from) ? errors.edit.date_from[0] : errors.edit.date_from}}
                                            </div>
                                        </div>
                                        <div class="date-text">
                                            to
                                        </div>
                                        <div class="date-input">
                                            <label for="dateTo" class="light d-flex align-items-center">
                                                <input type="checkbox" class="checkbox" v-model="editedWork.present"> I currently work here.
                                            </label>
                                            <input type="date"  v-model="editedWork.date_to" :disabled="editedWork.present">
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
                                <a class="btn btn-outline" href="javascript:void(0)" @click="clearEditedWork">
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
    export default {
        name: "WorkExperience",
        data() {
            return {
                tabs: [
                    'paid',
                    'voluntary',
                    'internship'
                ],
                optionWorkId: 0,
                editedWork: {},
                newWork: {
                    company_name:'',
                    job_title:'',
                    description:'',
                    website:'',
                    date_from:'',
                    date_to:'',
                    present:false,
                },
                errors: {
                    new: {},
                    edit: {}
                },
                addNewWork:false
            }
        },
        computed: {
            works() {
                return this.$store.state.user.work_experience;
            }
        },
        methods: {
            editWork(work) {
                this.editedWork = {
                    id: work.id,
                    company_name:work.company_name,
                    job_title:work.job_title,
                    description:work.description,
                    website:work.website,
                    date_from:work.date_from,
                    date_to:work.date_to,
                    present:work.present,
                };
                this.closeOptionsBtn();
            },
            applyEdit() {
                axios.put('/api/user/work-experience', this.editedWork)
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
            EditedSuccessfully(editedWork) {
                this.clearEditedWork();
                this.$store.dispatch('fullScreenNotification');
                // replace the edited skill with the new one:
                this.works.forEach((work, index) => {
                    if (work.id === editedWork.id) {
                        this.works[index] = editedWork;
                    }
                });
            },
            clearEditedWork() {
                this.editedWork = {};
            },
            deleteWork(work){
                if (!confirm('Do you want to delete this work ?')) {
                    return;
                }
                axios.delete('/api/user/work-experience/' + work.id)
                    .then((response) => {
                        this.$store.dispatch('flyingNotificationDelete');
                        this.works.forEach( (myWork,index) => {
                            if(myWork.id === response.data.data.id){
                                this.works.splice(index,1);
                            }
                        });

                        this.closeOptionsBtn();
                    })
                    .catch(error => {
                        console.log(error);
                    })
            },
            addWorkEx(){
                this.errors = {  new: {}, edit: {}};
                this.newWork.user_id = this.$store.state.user.id;
                axios.post('/api/user/work-experience', this.newWork)
                    .then((response) => {
                        this.works.unshift(response.data.data);
                        this.clearWorkEx();
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
            clearWorkEx(){
                this.addNewWork = false;
                this.newWork = {
                    company_name:'',
                    job_title:'',
                    description:'',
                    website:'',
                    date_from:'',
                    date_to:'',
                    present:'',
                }
            },
            closeOptionsBtn() {
                this.optionWorkId = 0;
            },
        },
        mounted() {

        }
    }
</script>

<style scoped lang="scss">
    @import '../../../../../sass/media-queries';
    $mainBlue: #001CE2;


    .work-container {
        width: 100%;
    }

    .section-body {
        margin-top: 20px;
        width: 100%;

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
                    width: 100%;
                    max-width: 100%;
                    min-width: auto;
                    flex-direction: row;
                    flex-wrap: wrap;
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

    #worksSection {
        .links-content {
            height: 350px;
            background: #fff;
            box-shadow: 0px 5px 100px rgba(0, 16, 131, 0.1);
            padding: 50px;
            margin-bottom: 70px;
        }

        .tabName {
            text-transform: capitalize;
        }

        .link-inputs-row {
            display: flex;
            margin-top: 12px;
            flex-wrap: wrap;
            display: flex;
            flex-direction: column;

            .inputs{
                display: flex;

                .left{
                    max-width: 775px;
                    display: flex;
                    flex-wrap: wrap;

                    .date-group {
                        display: flex;
                        justify-content: space-between;
                        margin-top: 28px;

                        @include lt-lg {


                        }

                        @include lt-md {

                        }

                        .date-text {
                            font: 500 26px/26px Noto Sans;
                            letter-spacing: 0;
                            color: #888DB1;
                            opacity: 1;
                            margin: 0 18px;

                            @include lt-lg {

                            }

                            @include lt-md {
                                font-size: 16px;
                            }

                            @include lt-sm {
                                font-size: 12px;

                            }
                        }

                        .date-input {
                            display: flex;
                            flex-direction: column;
                            width: 155px;
                            position: relative;

                            @include lt-sm {

                            }

                            label {
                                text-align: left;
                                position: absolute;
                                top: -29px;
                                letter-spacing: 0;
                                font-weight: 500;
                                font-size: 18px;
                                line-height: 25px;
                                color: #888DB1;
                                opacity: 1;

                                @include lt-md {
                                    font-size: 18px;
                                    color: #888DB1;
                                }

                                @include lt-sm {
                                    font-size: 15px;
                                }
                            }

                            label.light {
                                font-size: 12px;
                                letter-spacing: 0;
                                opacity: 1;

                                @include lt-lg {
                                    font-size: 15px;
                                }

                                @include lt-md {
                                    font-size: 11px;
                                    color: #888DB1;
                                }
                            }

                            input {
                                height: 50px;
                                border: 2px solid #C4C9F5 !important;
                                border-radius: 10px;
                                opacity: 1;
                                color: #c4c9f5;
                                padding-left: 12px;

                                @include lt-lg {

                                }

                                @include lt-md {

                                }
                            }

                            input:focus{
                                outline: none;
                            }

                            input.checkbox {
                                width: 14px;
                                height: 14px;
                                padding-left: 0;
                                margin-right: 8px;
                            }
                        }
                    }
                }
            }

            .civie-select {
                max-width: 210px;
                margin-right: 30px;

                .v-input__slot {
                    padding-left: 30px !important;
                }

                .input-prepended-icon {
                    position: absolute;
                    top: 13px;
                    left: 5px;

                    img {
                        width: 33px;
                    }
                }
            }

            .civie-input {
                max-width: 350px;
                min-width: 300px;
                margin-right: 30px;
            }
            .civie-textarea{
                min-width: 300px;
            }

            .civie-btn {
                min-height: 54px;
            }
        }

        .links-items {
            .link-item {
                width: 100%;
                height: 50px;
                display: flex;
                margin-bottom: 30px;
                align-items: center;
                justify-content: space-between;
                background: white;
                box-shadow: 0 5px 20px rgba(0, 16, 131, 0.15);

                .link-data {
                    display: flex;
                    height: 50px;

                    .mover {
                        width: 50px;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        border-right: 1px solid #E6E8FC;

                        img {
                            width: 12px;
                            height: 16px;
                        }

                        &:hover {
                            cursor: grab;
                        }
                    }

                    .link-text {
                        display: flex;
                        align-items: center;
                        margin-left: 10px;
                        font-size: 18px;
                        line-height: 25px;
                        color: #888DB1;

                        img {
                            width: 45px;
                            height: auto;
                        }
                    }
                }

                .action-btns {
                    margin-right: 10px;

                    .resume-builder__action-buttons-container {
                        position: static;
                    }
                }
            }

        }

        ::-webkit-calendar-picker-indicator {
            color:red;
        }
    }

</style>
