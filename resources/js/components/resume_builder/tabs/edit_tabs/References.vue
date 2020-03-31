<template>
    <div>
        <div class="section-title">
            <div class="title-light">Add</div>
            <h2>References</h2>
        </div>
        <div class="section-body-wrapper">
            <div class="achievements-bar" id="referencesLinksWrapper">
                <div class="bar-item" v-for="(tabName,i) in tabs" :key="i" :index="i" :item="tabName" :data-target="tabName" @click="changeTab" :class="{ active : activeTab === tabName}">
                    {{ tabName }}
                </div>

                <div class="decorator"></div>
            </div>

            <div class="references" v-show="activeTab === 'References'" v-if="this.reference">
                <div class="reference-input">
                    <label for="reference_name">
                        My full-name
                    </label>
                    <input type="text" placeholder="John smith" id="reference_name" v-model="reference.name" @blur="applyReferenceEdit('auto')">
                    <div class="error" v-if="errors.name">
                        {{ Array.isArray(errors.name) ? errors.name[0] : errors.name}}
                    </div>
                </div>
                <div class="reference-input">
                    <label for="reference_title">
                        Title / Position
                    </label>
                    <input type="text" placeholder="Head of Operations" id="reference_title" v-model="reference.title" @blur="applyReferenceEdit('auto')">
                    <div class="error" v-if="errors.title">
                        {{ Array.isArray(errors.title) ? errors.title[0] : errors.title}}
                    </div>
                </div>
                <div class="reference-input">
                    <label for="reference_phone">
                        Phone
                    </label>
                    <input type="text"  id="reference_phone" placeholder="(678) 757 9413" v-model="reference.phone" @blur="applyReferenceEdit('auto')">
                    <div class="error" v-if="errors.phone">
                        {{ Array.isArray(errors.phone) ? errors.phone[0] : errors.phone}}
                    </div>
                </div>
                <div class="reference-input">
                    <label for="reference_email">
                        Contact Email
                    </label>
                    <input type="text" placeholder="joelle.smith@swiftbanking.com" id="reference_email" v-model="reference.email" @blur="applyReferenceEdit('auto')">
                    <div class="error" v-if="errors.email">
                        {{ Array.isArray(errors.email) ? errors.email[0] : errors.email}}
                    </div>
                </div>
                <div class="reference-input">
                    <label for="reference_company">
                        Company
                    </label>
                    <input type="text"  id="reference_company" placeholder="SwiftBanking.com" v-model="reference.company" @blur="applyReferenceEdit('auto')">
                    <div class="error" v-if="errors.company">
                        {{ Array.isArray(errors.company) ? errors.company[0] : errors.company}}
                    </div>
                </div>
                <div class="reference-input">
                    <label for="reference_adresse">
                        Address
                    </label>
                    <input type="text" placeholder="134 Rightward Way (Address) Portland, ME, 04019" id="reference_adresse" v-model="reference.address" @blur="applyReferenceEdit('auto')">
                    <div class="error" v-if="errors.address">
                        {{ Array.isArray(errors.address) ? errors.address[0] : errors.address}}
                    </div>
                </div>

                <a href="javascript:void(0)" @click="applyReferenceEdit('manual')" class="btn btn-filled">
                    <img src="/images/resume_builder/profile/icon-save2.png">
                    Save reference
                </a>
            </div>

            <div class="references d-flex flex-column" v-if="activeTab === 'Referee'">
               <div class="d-flex flex-wrap justify-content-between">
                   <div class="reference-input">
                       <label for="nameReferee">
                           Name
                       </label>
                       <input type="text" placeholder="John smith" id="nameReferee" v-model="referee.name" @blur="applyRefereeEdit('auto')">
                       <div class="error" v-if="errors.name">
                           {{ Array.isArray(errors.name) ? errors.name[0] : errors.name}}
                       </div>
                   </div>
                   <div class="reference-input">
                       <label for="titleReferee">
                           Title / Position
                       </label>
                       <input type="text" placeholder="Head of Operations " id="titleReferee" v-model="referee.title" @blur="applyRefereeEdit('auto')">
                       <div class="error" v-if="errors.title">
                           {{ Array.isArray(errors.title) ? errors.title[0] : errors.title}}
                       </div>
                   </div>
                   <div class="reference-input">
                       <label for="emailReferee">
                           Contact Email
                       </label>
                       <input type="text" placeholder="joelle.smith@swiftbanking.com" id="emailReferee" v-model="referee.contact_email" @blur="applyRefereeEdit('auto')">
                       <div class="error" v-if="errors.contact_email">
                           {{ Array.isArray(errors.contact_email) ? errors.contact_email[0] : errors.contact_email}}
                       </div>
                   </div>

                   <div class="reference-input">
                       <label for="companyReferee">
                           Company
                       </label>
                       <input type="text"  id="companyReferee" placeholder="SwiftBanking.com" v-model="referee.company" @blur="applyRefereeEdit('auto')">
                       <div class="error" v-if="errors.company">
                           {{ Array.isArray(errors.company) ? errors.company[0] : errors.company}}
                       </div>
                   </div>
                   <div class="reference-input">
                       <label for="phoneReferee">
                           Phone number
                       </label>
                       <input type="text"  id="phoneReferee" placeholder="(678) 757 9413" v-model="referee.phone" @blur="applyRefereeEdit('auto')">
                       <div class="error" v-if="errors.phone">
                           {{ Array.isArray(errors.phone) ? errors.phone[0] : errors.phone}}
                       </div>
                   </div>
                   <div class="reference-input">
                       <label for="emailReferee2">
                           Email
                       </label>
                       <input type="email" placeholder="joelle.smith@swiftbanking.com" id="emailReferee2" v-model="referee.email" @blur="applyRefereeEdit('auto')">
                       <div class="error" v-if="errors.email">
                           {{ Array.isArray(errors.email) ? errors.email[0] : errors.email}}
                       </div>
                   </div>

                   <div class="reference-input">
                       <label for="notesReferee">
                           Notes
                       </label>
                       <textarea id="notesReferee" name="notesReferee"  v-model="referee.notes"  @blur="applyRefereeEdit('auto')"></textarea>
                       <div class="error" v-if="errors.notes">
                           {{ Array.isArray(errors.notes) ? errors.notes[0] : errors.notes}}
                       </div>
                   </div>
               </div>

                <a href="javascript:void(0)" @click="applyRefereeEdit('manual')" class="btn btn-filled">
                    <img src="/images/resume_builder/profile/icon-save2.png">
                    Save referee
                </a>
            </div>

            <div class="about-section references d-flex flex-column" v-if="activeTab === 'Testimonials'">
                <div>
                    <div v-show="addNewTestimonial">
                        <div class="reference-input mb-3 mt-3" >
                            <label for="emailReferee2" class="grey">
                                Title
                            </label>
                            <input type="text" class="grey-border" v-model="newTestimonial.title">
                            <div class="error" v-if="errors.new.title">
                                {{ Array.isArray(errors.new.title) ? errors.new.title[0] : errors.new.title}}
                            </div>
                        </div>
                        <div class="about-input">
                            <label for="about" class="d-flex justify-content-between">
                                <span class="label-text">Description</span>
                            </label>
                            <textarea name="about" id="about" v-model="newTestimonial.description"></textarea>
                            <div class="error" v-if="errors.new.description">
                                {{ Array.isArray(errors.new.description) ? errors.new.description[0] : errors.new.description}}
                            </div>
                        </div>
                    </div>
                    <div class="action-btns">
                        <div class="auto-import-btn  NoDecor" v-show="!addNewTestimonial">
                            <a href="javascript:void(0)" @click="addNewTestimonial = true">
                                <img src="/images/resume_builder/work-ex/add-box.png" alt="add">
                                Add Testimonial
                            </a>
                        </div>
                        <div class="add-work NoDecor mr-0">
                            <a href="javascript:void(0)" v-show="addNewTestimonial" @click="addTestimonial">
                                <img src="/images/resume_builder/work-ex/mark.png" alt="">
                                Save Testimonial
                            </a>
                        </div>
                        <div class="add-new-work NoDecor ml-5">
                            <a href="javascript:void(0)" @click="addNewTestimonial = false" v-show="addNewTestimonial">
                                Cancel
                            </a>
                        </div>
                    </div>
                </div>

                <div class="work-ex-list mt-3">
                    <div class="work-ex-item mt-5 flex-column" v-for="(testimonial,index) in testimonials" :key="index + '_testimonial'">
                        <div class="d-flex">
                            <div class="work-icon">
                                <img src="/images/resume_builder/references/review.png" alt="work-icon">
                            </div>
                            <div class="work-ex-info">
                                <div class="work-ex-title">
                                    {{testimonial.title}}
                                </div>
                                <div class="work-ex-detials">
                                    {{testimonial.description}}
                                </div>
                            </div>
                        </div>
                        <div class="options">
                            <div class="options-btn NoDecor"
                                 @click="optionTestimonialId === testimonial.id ? optionTestimonialId=0 : optionTestimonialId=testimonial.id">
                                <a href="javascript:void(0)" :class="{'opened':optionTestimonialId === testimonial.id}">
                                    Options
                                    <img src="/images/resume_builder/arrow-down.png" alt=""
                                         :class="{'optionsOpened':optionTestimonialId === testimonial.id}">
                                </a>
                            </div>
                            <div class="extended-options" v-show="optionTestimonialId === testimonial.id"
                                 :class="{'opened':optionTestimonialId === testimonial.id}">
                                <div class="edit-btn NoDecor" @click="editTestimonial(testimonial)">
                                    <img src="/images/resume_builder/edit-icon.png" alt="edit icon">
                                    Edit
                                </div>
                                <div class="delete-btn NoDecor" @click="deleteTestimonial(testimonial)">
                                    <img src="/images/resume_builder/delete-icon.png" alt="delete icon">
                                    Delete
                                </div>
                            </div>
                        </div>
                       <div v-show="testimonial.id === editedTestimonial.id">
                           <div>
                               <div class="reference-input mb-3 mt-3">
                                   <label for="emailReferee2" class="grey">
                                       Title
                                   </label>
                                   <input type="email"  class="grey-border" v-model="editedTestimonial.title">
                                   <div class="error" v-if="errors.edit.title">
                                       {{ Array.isArray(errors.edit.title) ? errors.edit.title[0] : errors.edit.title}}
                                   </div>
                               </div>
                               <div class="about-input">
                                   <label for="about" class="d-flex justify-content-between">
                                       <span class="label-text">Description</span>
                                   </label>
                                   <textarea name="about" v-model="editedTestimonial.description"></textarea>
                                   <div class="error" v-if="errors.edit.description">
                                       {{ Array.isArray(errors.edit.description) ? errors.edit.description[0] : errors.edit.description}}
                                   </div>
                               </div>
                           </div>
                           <div class="action-btns">
                               <div class="add-work NoDecor mr-0">
                                   <a href="javascript:void(0)" @click="applyEdit">
                                       <img src="/images/resume_builder/work-ex/mark.png" alt="">
                                       Save Edit
                                   </a>
                               </div>
                               <div class="add-new-work NoDecor ml-5">
                                   <a href="javascript:void(0)" @click="editedTestimonial = {}">
                                       Cancel
                                   </a>
                               </div>
                           </div>

                       </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
import { moveTabsHelper } from '../../helpers/tab-animations'
    export default {
        name: "References",
        data() {
            return {
                activeTab: 'References',
                tabs: [
                    'References',
                    'Referee',
                    'Testimonials'
                ],
                newTestimonial:{
                    title:'',
                    description:''
                },
                editedTestimonial:{},
                optionTestimonialId:0,
                errors:{
                    new:{},
                    edit:{},
                },
                addNewTestimonial: false
            }
        },
        computed: {
            reference() {
                return this.$store.state.user.reference;
            },
            referee() {
                return this.$store.state.user.referee;
            },
            testimonials() {
                return this.$store.state.user.testimonials;
            }
        },
        methods: {
            setActiveTab (tab) {
                this.activeTab = tab
            },
            changeTab (e) {
                this.errors={ new:{},
                    edit:{},};
                moveTabsHelper(e, 'referencesLinksWrapper', this)
            },
            applyReferenceEdit(savingType) {
                this.errors={  new:{}, edit:{},};
                let formData = {} ;
                $.each(this.reference, (field) => {
                    if(this.reference[field] !== null){
                        if(this.reference[field].length){
                            formData[field] = this.reference[field];
                        }
                    }
                });

                if(savingType === 'manual'){
                    formData = this.reference;
                }

                axios.put('/api/user/reference',formData)
                    .then((response) => {
                        savingType === 'manual' ? this.$store.dispatch('fullScreenNotification') :  this.$store.dispatch('flyingNotification')
                    })
                    .catch((error) => {
                        if (typeof error.response.data === 'object') {
                            this.errors = error.response.data.errors;
                        } else {
                            this.errors = 'Something went wrong. Please try again.';
                        }
                    });
            },
            applyRefereeEdit(savingType) {
                this.errors={};


                let formData = {} ;
                $.each(this.referee, (field) => {
                    if(this.referee[field] !== null){
                        if(this.referee[field].length){
                            formData[field] = this.referee[field];
                        }
                    }
                });

                if(savingType === 'manual'){
                    formData = this.referee;
                }

                axios.put('/api/user/referee',formData)
                    .then((response) => {
                        savingType === 'manual' ? this.$store.dispatch('fullScreenNotification') :  this.$store.dispatch('flyingNotification')
                    })
                    .catch((error) => {
                        if (typeof error.response.data === 'object') {
                            this.errors = error.response.data.errors;
                        } else {
                            this.errors = 'Something went wrong. Please try again.';
                        }
                    });
            },
            addTestimonial(){
                this.errors = { new:{}, edit:{}};
                axios.post('/api/user/testimonials', this.newTestimonial)
                    .then((response) => {
                        this.testimonials.unshift(response.data.data);
                        this.newTestimonial = {title:'', description:''};
                        this.addNewTestimonial = false;
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
            closeOptionsBtn() {
                this.optionTestimonialId = 0;
            },
            editTestimonial(testimonial) {
                this.editedTestimonial = {
                    id: testimonial.id,
                    title:testimonial.title,
                    description:testimonial.description,
                };
                this.closeOptionsBtn();
            },
            applyEdit() {
                this.errors = { new:{}, edit:{}};
                axios.put('/api/user/testimonials', this.editedTestimonial)
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
            EditedSuccessfully(editedTestimonial) {
                this.clearEditedTestimonial();
                this.$store.dispatch('fullScreenNotification');
                // replace the edited skill with the new one:
                this.testimonials.forEach((testimonial, index) => {
                    if (testimonial.id === editedTestimonial.id) {
                        this.testimonials[index] = editedTestimonial;
                    }
                });
            },
            clearEditedTestimonial() {
                this.editedTestimonial = {};
            },
            deleteTestimonial(testimonial){
                if (!confirm('Do you want to delete this testimonial ?')) {
                    return;
                }
                axios.delete('/api/user/testimonials/' + testimonial.id)
                    .then((response) => {
                        this.$store.dispatch('flyingNotificationDelete');
                        this.testimonials.forEach( (myTestimonial,index) => {
                            if(myTestimonial.id === response.data.data.id){
                                this.testimonials.splice(index,1);
                            }
                        });

                        this.closeOptionsBtn();
                    })
                    .catch(error => {
                        console.log(error);
                    })
            },
        },
        mounted() {
            this.changeTab({ target: document.querySelector(`.bar-item[data-target=${this.activeTab}]`)});
        }
    }
</script>

<style scoped lang="scss">

    .section-body-wrapper {
        width: 1337px;

        .references{
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            margin-top:45px;

            .reference-input{
                margin-bottom: 60px;
                display: flex;
                flex-direction: column;
                input,textarea {
                    width: 585px;
                    height: 68px;
                    border: 1.5px solid #001CE2;
                    border-radius: 10px;
                    opacity: 1;
                    padding-left: 18px;
                    &.grey-border{
                        border: 1.5px solid #9F9E9E;
                    }
                }

                textarea{
                    height: 154.59px;
                    padding-top: 12px;
                }
                input:focus,textarea:focus {
                    outline: none;
                }

                label {
                    text-align: left;
                    font: 600 20px Noto Sans;
                    letter-spacing: 0;
                    opacity: 1;
                    color: #001ce2;
                    &.grey{
                        color: #9F9E9E;
                    }
                }
            }
        }

        .about-section {
            margin-top: 10px;

            .about-input {
                display: flex;
                flex-direction: column;
                width: fit-content;
                textarea {
                    width: 815px;
                    height: 274px;
                    border: 1.5px solid #9F9E9E;
                    border-radius: 10px;
                    opacity: 1;
                    padding-left: 18px;
                    padding-top: 18px;
                }

                textarea:focus {
                    outline: none;
                }

                label {
                    margin-bottom:17px;
                    .label-text {
                        text-align: left;
                        font: 600 20px Noto Sans;
                        letter-spacing: 0;
                        opacity: 1;
                        font-size: 20px;
                        color: #9f9e9e;
                    }

                    .note-text {
                        font: 500 13px Noto Sans;
                        color: #1f5de4;
                        opacity: 0.7;
                    }
                }
            }
        }

        .action-btns {
            margin-top: 45px;
            display: flex;
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
            .auto-import-btn {
                a {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    width: 226px;
                    height: 62px;

                    border: 1.5px solid #001CE2;
                    border-radius: 8px;
                    opacity: 1;

                    font: 600 19px Noto Sans;
                    letter-spacing: 0;
                    color: #001CE2;

                    img {
                        width: 27px;
                        height: 27px;
                        margin-right: 14px;
                    }
                }
            }

            .auto-import-btn.short {
                margin-right: 38px;

                a {
                    width: 144px;
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
                right: -100px;
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

    .error{
        color:red;
        padding-top:5px;
        padding-left:3px;
    }
</style>
