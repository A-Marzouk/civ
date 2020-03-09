<template>
    <div>
        <div class="hold-tab wrapp">
            <div class="input-field">
                <label for="profilelink">New language</label>
                <input type="text" placeholder="" id="profilelink" name="profilelink">
            </div>
            <a href="#" class="btn-blue"><img src="/images/resume_builder/profile/icon-check.png">Add language now</a>
            <a href="" class="btn-outline ml-5">Auto import</a>
            <div class="lang-items">
                <div class="lang-item" v-for="(language,index) in languages" :key="index + '_language'">
                    <img class="flagLang" src="/images/resume_builder/profile/flag-france.png" alt="">
                    <span class="nameLang">{{language.label}}</span>
                    <div class="options">
                        <div class="options-btn NoDecor"
                             @click="optionLanguageId === language.id ? optionLanguageId=0 : optionLanguageId=language.id">
                            <a href="javascript:void(0)" :class="{'opened':optionLanguageId === language.id}">
                                Options
                                <img src="/images/resume_builder/arrow-down.png" alt=""
                                     :class="{'optionsOpened':optionLanguageId === language.id}">
                            </a>
                        </div>
                        <div class="extended-options" v-show="optionLanguageId === language.id"
                             :class="{'opened':optionLanguageId === language.id}">
                            <div class="edit-btn NoDecor" @click="editLanguage(language)">
                                <img src="/images/resume_builder/edit-icon.png" alt="edit icon">
                                Edit
                            </div>
                            <div class="delete-btn NoDecor" @click="deleteLanguage(language)">
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
        data() {
            return {
                optionLanguageId: 0,
                editedLanguage: {},
                errors: {
                    new: {},
                    edit: {}
                }
            }
        },
        methods:{
            deleteLanguage(){

            },
            editLanguage(){

            }
        },
        computed: {
            languages() {
                return this.$store.state.user.languages;
            }
        },
    }
</script>

<style scoped lang="scss">

    .lang-item{
        position: relative;
        width: 400px;
    }
    .options {
        position: absolute;
        right: 14px;
        top: 18px;

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
        }
    }
</style>
