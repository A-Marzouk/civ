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

            <div class="buttons-wrapper">
                <a href="javascript:void(0)" @click="saveLanguage" class="btn btn-filled"><img class='icon' src="/images/resume_builder/profile/icon-check.png">Add language now</a>
                <a href="javascript:void(0)" class="btn btn-outline">Auto import</a>
            </div>
            <div v-if="languages.length" class="lang-items">
                <div class="lang-item mt-4" v-for="(language,index) in languages" :key="index + '_language'">
                    <div class="lang">
                        <img class="LangIcon" src="/images/resume_builder/language-icon.png" alt="">
                        <span class="nameLang">{{language.label}}</span>
                    </div>
                    <div class="options-mob">
                        <a href="">
                            <svg-vue class="opt-icon" :icon="`edit-icon`"></svg-vue>
                        </a>
                        <a href="">
                            <svg-vue class="opt-icon" :icon="`trash-delete-icon`"></svg-vue>
                        </a>
                    </div>
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
                        this.$store.dispatch('flyingNotificationDelete');
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
                        this.$store.dispatch('fullScreenNotification');
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
                    this.languagesList.sort((a,b)=> (a.label>b.label)*2-1);
                })
                .catch( (error) => {
                    console.log(error)
                });
        }
    }
</script>

<style scoped lang="scss">
@import '../../../../../../sass/media-queries';

    $mainBlue: #001CE2;

    .lang-item{
        position: relative;
        width: 400px;

        @include lt-sm {
            justify-content: space-between !important;
            width: 100%;
        }
    }

    .hold-tab {
        align-items: flex-start !important;
    }

    .buttons-wrapper {
        display: flex;
        width: 100%;
        max-width: 616px;
        justify-content: space-between;
        flex-wrap: wrap;
    }

    .options-mob {
        display: none;
        width: 119px;
        height: 38px;
        background: #F9F9F9;
        box-shadow: 0 9px 12px rgab(0, 0, 0, 0.06);
        border-radius: 6px;
        align-self: flex-end;
        position: relative;
        margin-left: 10px;
        padding: 5px;

        @include lt-sm {
            display: flex;
            justify-content: space-around;
            align-items: center;
        }

        a {
            height: 14px;
            display: flex;
            justify-content: center;
            align-items: center;

            svg {
                height: 100%;
                fill: $mainBlue !important;

                path, circle {
                    fill: $mainBlue !important;
                }
            }
        }
    }

    .options {
        position: absolute;
        right: -50px;
        top: 18px;

        @include lt-sm {
            display: none;
        }

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
        @include lt-sm {
            width: 100%;
        }
        // select{
        // }
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
