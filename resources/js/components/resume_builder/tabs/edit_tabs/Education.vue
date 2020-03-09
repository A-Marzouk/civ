<template>
    <div>
        <div class="section-title">
            <div class="title-light">Add</div>
            <h2>Education</h2>
        </div>
        <div class="section-body">
            <div class="work-ex-form">
                <div class="work-ex-form-input">
                    <label for="institutionType">Institution type</label>
                    <input type="text" id="institutionType" class="shorter">
                </div>
                <div class="work-ex-form-input">
                    <label for="universityName">University name</label>
                    <input type="text" id="universityName">
                </div>
                <div class="work-ex-form-input">
                    <label for="degreeTitle">Degree title</label>
                    <input type="text" id="degreeTitle"  class="shorter">
                </div>
                <div class="work-ex-form-group">
                    <div class="date-group">
                        <div class="date-input">
                            <label for="dateFrom">Session</label>
                            <input type="date" id="dateFrom">
                        </div>
                        <div class="date-text">
                            to
                        </div>
                        <div class="date-input">
                            <label for="dateTo" class="light d-flex align-items-center">
                                <input type="checkbox" class="checkbox"> I currently study here.
                            </label>
                            <input type="date" id="dateTo">
                        </div>
                    </div>
                </div>
            </div>
            <div class="action-btns">
                <div class="add-work NoDecor">
                    <a href="javascript:void(0)">
                        <img src="/images/resume_builder/work-ex/mark.png" alt="">
                        Add Education Now
                    </a>
                </div>
                <div class="add-new-work NoDecor">
                    <a href="javascript:void(0)">
                        <img src="/images/resume_builder/work-ex/add-box.png" alt="">
                        Add new degree
                    </a>
                </div>
                <div class="auto-import NoDecor">
                    <a href="javascript:void(0)">
                        <img src="/images/resume_builder/work-ex/add-box.png" alt="">
                        Auto import
                    </a>
                </div>
            </div>
            <div class="work-ex-list">
                <div class="work-ex-item mt-5" v-for="(education,index) in educations" :key="index + '_education'">
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
                errors: {
                    new: {},
                    edit: {}
                }
            }
        },
        computed: {
            educations() {
                return this.$store.state.user.education;
            }
        },
        methods: {
            editEducation(education){},
            deleteEducation(education){},
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
</style>
