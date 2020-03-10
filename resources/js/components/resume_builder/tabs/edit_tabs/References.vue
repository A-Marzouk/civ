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

            <div class="references" v-show="activeTab === 'References'" v-if="reference">
                <div class="reference-input">
                    <label for="name">
                        My full-name
                    </label>
                    <input type="text" placeholder="John smith" id="name" v-model="reference.name">
                    <div class="error" v-if="errors.name">
                        {{ Array.isArray(errors.name) ? errors.name[0] : errors.name}}
                    </div>
                </div>
                <div class="reference-input">
                    <label for="title">
                        Title / Position
                    </label>
                    <input type="text" placeholder="Head of Operations" id="title" v-model="reference.title">
                    <div class="error" v-if="errors.title">
                        {{ Array.isArray(errors.title) ? errors.title[0] : errors.title}}
                    </div>
                </div>
                <div class="reference-input">
                    <label for="phone">
                        Phone
                    </label>
                    <input type="text"  id="phone" placeholder="(678) 757 9413" v-model="reference.phone">
                    <div class="error" v-if="errors.phone">
                        {{ Array.isArray(errors.phone) ? errors.phone[0] : errors.phone}}
                    </div>
                </div>
                <div class="reference-input">
                    <label for="email">
                        Contact Email
                    </label>
                    <input type="text" placeholder="joelle.smith@swiftbanking.com" id="email" v-model="reference.email">
                    <div class="error" v-if="errors.email">
                        {{ Array.isArray(errors.email) ? errors.email[0] : errors.email}}
                    </div>
                </div>
                <div class="reference-input">
                    <label for="company">
                        Company
                    </label>
                    <input type="text"  id="company" placeholder="SwiftBanking.com" v-model="reference.company">
                    <div class="error" v-if="errors.company">
                        {{ Array.isArray(errors.company) ? errors.company[0] : errors.company}}
                    </div>
                </div>
                <div class="reference-input">
                    <label for="adresse">
                        Address
                    </label>
                    <input type="text" placeholder="134 Rightward Way (Address) Portland, ME, 04019" id="adresse" v-model="reference.address">
                    <div class="error" v-if="errors.address">
                        {{ Array.isArray(errors.address) ? errors.address[0] : errors.address}}
                    </div>
                </div>

                <a href="javascript:void(0)" @click="applyReferenceEdit" class="btn-blue">
                    <img src="/images/resume_builder/profile/icon-save2.png">
                    Save reference
                </a>
            </div>

            <div class="references" v-show="activeTab === 'Referee'">
                <div class="reference-input">
                    <label for="nameReferee">
                        Name
                    </label>
                    <input type="text" placeholder="John smith" id="nameReferee">
                </div>
                <div class="reference-input">
                    <label for="titleReferee">
                        Title / Position
                    </label>
                    <input type="text" placeholder="Head of Operations " id="titleReferee">
                </div>
                <div class="reference-input">
                    <label for="emailReferee">
                        Contact Email
                    </label>
                    <input type="text" placeholder="joelle.smith@swiftbanking.com" id="emailReferee">
                </div>

                <div class="reference-input">
                    <label for="companyReferee">
                        Company
                    </label>
                    <input type="text"  id="companyReferee" placeholder="SwiftBanking.com">
                </div>
                <div class="reference-input">
                    <label for="phoneReferee">
                        Phone number
                    </label>
                    <input type="text"  id="phoneReferee" placeholder="(678) 757 9413">
                </div>
                <div class="reference-input">
                    <label for="emailReferee2">
                        Email
                    </label>
                    <input type="text" placeholder="joelle.smith@swiftbanking.com" id="emailReferee2">
                </div>

                <div class="reference-input">
                    <label for="notesReferee">
                        Notes
                    </label>
                    <textarea id="notesReferee" name="notesReferee"></textarea>
                </div>
            </div>

            <div class="about-section" v-show="activeTab === 'Testimonials'">
                <div class="about-input">
                    <label for="about" class="d-flex justify-content-between">
                        <span class="label-text">Add Testimonials</span>
                    </label>
                    <textarea name="about" id="about"></textarea>
                </div>
                <div class="action-btns">
                    <div class="auto-import-btn short NoDecor">
                        <a href="javascript:void(0)">
                            <img src="/images/resume_builder/work-ex/add-box.png" alt="add">
                            Add
                        </a>
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
                errors:{}
            }
        },
        computed: {
            reference() {
                return this.$store.state.user.reference;
            },
            referee() {
                return this.$store.state.user.referee;
            }
        },
        methods: {
            setActiveTab (tab) {
                this.activeTab = tab
            },
            changeTab (e) {
                moveTabsHelper(e, 'referencesLinksWrapper', this)
            },
            applyReferenceEdit() {
                this.errors={};

                axios.put('/api/user/reference',this.reference)
                    .then((response) => {
                        console.log(response.data);
                    })
                    .catch((error) => {
                        if (typeof error.response.data === 'object') {
                            console.log(error.response.data.errors);
                            this.errors = error.response.data.errors;
                        } else {
                            this.errors = 'Something went wrong. Please try again.';
                        }
                    });
            },
        },
        mounted() {
            this.changeTab({ target: document.querySelector(`.bar-item[data-target=${this.activeTab}]`)})
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
                }
                textarea{
                    height: 154.59px;
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
                }
            }
        }

        .about-section {
            margin-top: 45px;

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
    .error{
        color:red;
        padding-top:5px;
        padding-left:3px;
    }
</style>
