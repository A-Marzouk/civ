<template>
    <div>
        <div class="hold-tab wrapp">
            <div class="input-field">
                <label for="language">New language</label>
                <select name="language"  id="language" v-model="selectedLanguage">
                    <option value="selected" selected disabled>Select language</option>
                    <option :value="language.id" v-for="(language,index) in languagesList" :key="index + '_language'">
                        {{language.label}}
                    </option>
                </select>
                <div class="error" v-if="errors.language">
                    {{errors.language}}
                </div>
            </div>
            <a href="javascript:void(0)" @click="saveLanguage" class="btn-blue"><img src="/images/resume_builder/profile/icon-check.png">Add language now</a>
            <a href="javascript:void(0)" class="btn-outline ml-5">Auto import</a>
            <div class="lang-items">
                <div class="lang-item mt-4" v-for="(language,index) in languages" :key="index + '_language'">
                    <img class="LangIcon" src="/images/resume_builder/language-icon.png" alt="">
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
                errors: {},
                languagesList:[],
                selectedLanguage:'selected'
            }
        },
        methods:{
            deleteLanguage(lang){
                if (!confirm('Do you want to delete this language [' + lang.label + '] ?')) {
                    return;
                }

                axios.delete('/api/user/languages/' + lang.id)
                    .then((response) => {
                        this.languages.forEach( (language,index) => {
                            if(language.id === lang.id){
                                this.languages.splice(index,1);
                            }
                        });

                        this.closeOptionsBtn();
                    })
                    .catch(error => {
                        console.log(error);
                    })
            },
            editLanguage(){

            },
            saveLanguage() {
                let language_id = this.selectedLanguage;
                this.errors = {};
                axios.post('/api/user/languages', {language_id})
                    .then((response) => {
                        this.languages.unshift(response.data.language);
                        this.selectedLanguage = 'selected'
                        // changes saved pop-up
                        this.$store.dispatch('successMessage');
                    })
                    .catch((error) => {
                        this.errors = {
                            language: 'This language already exists.'
                        };
                    });
            },
            closeOptionsBtn(){
                this.optionLanguageId = 0 ;
            }
        },
        computed: {
            languages() {
                return this.$store.state.user.languages;
            }
        },
        mounted() {
            axios.get('/api/user/languages-list')
                .then( (response) => {
                    this.languagesList = response.data.data ;
                })
                .catch( (error) => {
                    console.log(error)
                });
        }
    }
</script>

<style scoped lang="scss">

    .lang-item{
        position: relative;
        width: 400px;
    }
    .options {
        position: absolute;
        right: -50px;
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
            height: 45px;
            padding-top: 5px;
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

    .input-field{
        select{
            border: 1.5px solid #505050;
            border-radius: 8px;
            padding: 0px 0px 0px 16.8px;

            &:focus{
                outline:none;
            }
        }
    }

    .error {
        color: red;
        margin-left: 5px;
    }

    .LangIcon{
        width:40px;
        height:40px;
        margin-right: 20px;
    }
</style>
