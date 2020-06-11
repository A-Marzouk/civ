<template>
    <v-app class="resume-builder__scroll">
        <div class="data-container">
            <v-tabs
                class="resume-builder__tab-bar"
                hide-slider
            >
                <v-tab
                    class="resume-builder__tab"
                    v-for="tab in tabs"
                    :key="tab"
                    @click="activeTab = tab"
                >{{ tab }}</v-tab>
            </v-tabs>

            <SchoolView v-if="activeTab === 'School'"></SchoolView>
            <div v-else>No thing to show here</div>
        </div>
    </v-app>  
</template>

<script>
import SchoolView from './education_tabs/school'

    export default {
        name: "Education",
        components: {
            SchoolView
        },
        data: (vm) => {
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
                addNewEducation: false,
                tabs: [
                    'School',
                    'University / College',
                    'Courses',
                    'Seminars / Training'
                ],
                tabViews: [

                ],
                activeTab: 'School'
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
                this.editedEducation.user_id = this.educations[0].user_id ;
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
                /*max-width: 757px;*/
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

    .data-container {
        padding: 0;
        margin-bottom: 70px;
    }
</style>
