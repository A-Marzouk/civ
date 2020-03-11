<template>
    <div>
        <div class="section-title">
            <div class="title-light">Add</div>
            <h2>Work Experience</h2>
        </div>
        <div class="section-body">
            <div class="work-ex-form" v-show="addNewWork">
                <div class="work-ex-form-input">
                    <label for="companyName">Company name</label>
                    <input type="text" id="companyName" class="shorter" v-model="newWork.company_name">
                    <div class="error" v-if="errors.new.company_name">
                        {{ Array.isArray(errors.new.company_name) ? errors.new.company_name[0] : errors.new.company_name}}
                    </div>
                </div>
                <div class="work-ex-form-input">
                    <label for="jobTitle">Job title</label>
                    <input type="text" id="jobTitle" v-model="newWork.job_title">
                    <div class="error" v-if="errors.new.job_title">
                        {{ Array.isArray(errors.new.job_title) ? errors.new.job_title[0] : errors.new.job_title}}
                    </div>
                </div>
                <div class="work-ex-form-input">
                    <label for="description">Description</label>
                    <textarea type="text" id="description" v-model="newWork.description"></textarea>
                    <div class="error" v-if="errors.new.description">
                        {{ Array.isArray(errors.new.description) ? errors.new.description[0] : errors.new.description}}
                    </div>
                </div>
                <div class="work-ex-form-group">
                    <div class="work-ex-form-input">
                        <label for="website">Website (optional)</label>
                        <input type="text" id="website" v-model="newWork.website">
                        <div class="error" v-if="errors.new.website">
                            {{ Array.isArray(errors.new.website) ? errors.new.website[0] : errors.new.website}}
                        </div>
                    </div>
                    <div class="date-group">
                        <div class="date-input">
                            <label for="dateFrom">Date</label>
                            <input type="date" id="dateFrom" v-model="newWork.date_from">
                            <div class="error" v-if="errors.new.date_from">
                                {{ Array.isArray(errors.new.date_from) ? errors.new.date_from[0] : errors.new.date_from}}
                            </div>
                        </div>
                        <div class="date-text">
                            to
                        </div>
                        <div class="date-input">
                            <label for="dateTo" class="light d-flex align-items-center">
                                <input type="checkbox" class="checkbox" v-model="newWork.present"> I currently work here.
                            </label>
                            <input type="date" id="dateTo" v-model="newWork.date_to" :disabled="newWork.present">
                            <div class="error" v-if="errors.new.date_to">
                                {{ Array.isArray(errors.new.date_to) ? errors.new.date_to[0] : errors.new.date_to}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="action-btns">
                <div class="add-work NoDecor mr-0">
                    <a href="javascript:void(0)" v-show="addNewWork" @click="addWorkEx">
                        <img src="/images/resume_builder/work-ex/mark.png" alt="">
                        Save
                    </a>
                </div>
                <div class="add-new-work NoDecor">
                    <a href="javascript:void(0)" @click="addNewWork = true" v-show="!addNewWork">
                        <img src="/images/resume_builder/work-ex/add-box.png" alt="">
                        Add new work
                    </a>
                </div>
                <div class="add-new-work NoDecor">
                    <a href="javascript:void(0)" @click="addNewWork = false" v-show="addNewWork">
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
                <div class="work-ex-item mt-5 flex-column" v-for="(work,index) in works" :key="index + '_workEx'">
                    <div class="d-flex">
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
                        </div>
                    </div>
                    <div class="options">
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
                            <div class="work-ex-form-input">
                                <label for="companyName">Company name</label>
                                <input type="text" class="shorter" v-model="editedWork.company_name">
                                <div class="error" v-if="errors.edit.company_name">
                                    {{ Array.isArray(errors.edit.company_name) ? errors.edit.company_name[0] : errors.edit.company_name}}
                                </div>
                            </div>
                            <div class="work-ex-form-input">
                                <label for="jobTitle">Job title</label>
                                <input type="text" v-model="editedWork.job_title">
                                <div class="error" v-if="errors.edit.job_title">
                                    {{ Array.isArray(errors.edit.job_title) ? errors.edit.job_title[0] : errors.edit.job_title}}
                                </div>
                            </div>
                            <div class="work-ex-form-input">
                                <label for="description">Description</label>
                                <textarea type="text"  v-model="editedWork.description"></textarea>
                                <div class="error" v-if="errors.edit.description">
                                    {{ Array.isArray(errors.edit.description) ? errors.edit.description[0] : errors.edit.description}}
                                </div>
                            </div>
                            <div class="work-ex-form-group">
                                <div class="work-ex-form-input">
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
                            <div class="add-work NoDecor">
                                <a href="javascript:void(0)" @click="applyEdit">
                                    <img src="/images/resume_builder/work-ex/mark.png" alt="">
                                    Save
                                </a>
                            </div>
                            <div class="add-new-work NoDecor">
                                <a href="javascript:void(0)" @click="clearEditedWork">
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
                    });
            },
            EditedSuccessfully(editedWork) {
                this.clearEditedWork();
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
                axios.post('/api/user/work-experience', this.newWork)
                    .then((response) => {
                        this.works.unshift(response.data.data);
                        this.clearWorkEx();
                    })
                    .catch((error) => {
                        if (typeof error.response.data === 'object') {
                            this.errors.new = error.response.data.errors;
                        } else {
                            this.errors.new  = 'Something went wrong. Please try again.';
                        }
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
                    padding-top: 18px;
                }

                textarea:focus{
                    outline: none;
                }
            }

            .work-ex-form-group {
                display: flex;
                flex-direction: column;
                justify-content: space-between;

                .date-group {
                    display: flex;
                    justify-content: space-between;
                    align-items: flex-end;

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
                position: relative;
                display: flex;
                justify-content: flex-start;
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
                        color: #3C3748;
                        margin-bottom: 12px;
                        opacity: 1;
                    }
                    .work-ex-sub-title{
                        font: 700 19px Noto Sans;
                        letter-spacing: 0;
                        color: #3C3748;
                        opacity: 1;
                        margin-bottom: 16px;
                    }
                    .work-ex-detials{
                        font: 500 16px Noto Sans;
                        letter-spacing: 0;
                        color: #555060;
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
