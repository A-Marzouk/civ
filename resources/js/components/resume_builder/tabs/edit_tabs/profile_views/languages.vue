<template>
    <div>
        <div class="hold-tab">
            <!-- <div class="input-field">
                
                <select name="language"  id="language" v-model="selectedLanguage">
                    <option value="selected" selected disabled>Select language</option>
                    <option :value="language.id" v-for="(language,index) in languagesList" :key="index + '_language'">
                        {{language.label}}
                    </option>
                </select>
                <div class="error" v-if="errors.language">
                    {{errors.language}}
                </div>
            </div> -->

            <div class="civ-input mb-0">
                <label for="language">New language</label>
                <div class="civ-custom-select">
                    <div class="civ-select-input" @click="showLanguageOptions = !showLanguageOptions">
                        <input type="text" id="category" disabled placeholder="English"
                                v-model="selectedLanguage.label"
                                :class="{'with-border' : !showLanguageOptions}">
                        <img src="/images/resume_builder/arrow-down.png" alt="arrow"
                                :class="{'toggled':showLanguageOptions}">
                    </div>
                    <div class="civ-custom-options" v-show="showLanguageOptions">
                        <div v-for="(language,index) in languagesList" :key="index + '_language'"
                                @click="selectLanguage(language)">
                            {{language.label}}
                        </div>
                    </div>
                </div>
                <div class="error" v-if="errors.language">
                    {{errors.language}}
                </div>
            </div>

            <div class="buttons-wrapper">
                <a href="javascript:void(0)" @click="saveLanguage" class="btn btn-filled"><img class='icon' src="/images/resume_builder/profile/icon-check.png">Add language now</a>
                <a href="javascript:void(0)" class="btn btn-outline">Auto import</a>
            </div>
        </div>
        <div v-if="languages.length" class="lang-items">
            <div class="lang-item mt-4" v-for="(language,index) in languages" :key="index + '_language'">
                <div class="lang">
                    <img class="LangIcon" src="/images/resume_builder/language-icon.png" alt="">
                    <span class="nameLang">{{language.label}}</span>
                    <div class="optionsBtns showOnMd justify-content-center">
                        <a href="javascript:;" @click="deleteLanguage(language)">
                            <svg-vue class='icon' :icon="'trash-delete-icon'"></svg-vue>
                        </a>
                    </div>
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
</template>

<script>
    export default {
        data() {
            return {
                optionLanguageId: 0,
                editedLanguage: {},
                errors: {},
                languagesList:[],
                selectedLanguage:'selected',
                showLanguageOptions: false
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
                let language_id = this.selectedLanguage.id;
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
            },
            selectLanguage(language) {
                this.selectedLanguage = language;
                this.showLanguageOptions = false;
            },
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

    .civ-input {

        margin-right: 30px;
        margin-bottom: 1rem;

        @include lt-sm {
            width: 100%;
            margin-right: 0;
            // margin-bottom: 15px;
        }

        label {
            font-size: 22px;
            line-height: 30px;
            color: #505050;
            font-family: "Noto Sans";
            font-weight: 700;
            
            @include lt-md {
                color: $mainBlue;
                font-size: 18px;
            }

            .hint-message {
                font-size: 18px;
                float: right;
                font-style: normal;

                &.left {
                    float: none;
                    margin-top: 7px;
                    margin-bottom: 16px;
                }

                @include lt-sm {
                    font-size: 9px;
                }
            }

            @include lt-sm {
                font-size: 13px;
            }
        }

        .civ-custom-select{

            position: relative;


            @include lt-md {

                border-color: $mainBlue;
            }

            .civ-select-input{
                img{
                    width:24px ;
                    height:12px;
                    position: absolute;
                    top: 35px;
                    right: 20px;

                    &.toggled{
                        -webkit-transform: scaleY(-1);
                        transform: scaleY(-1);
                    }

                    @include lt-sm {
                        height: 9px;
                        width: 18px;
                        top: 15px;
                        right: 15px;
                    }
                }

                ::placeholder {
                    opacity: .3;
                    font-weight: normal;
                }

                input{
                    width: 100%;
                    height:76px;
                    border: 1.5px #505050 solid;
                    padding-left:23px;
                    border-radius: 10px 10px 0 0;
                    border-bottom: 0;
                    color: black;
                    font-weight: bold;
                    font-size: 22px;
                    background: white;

                    @include lt-md {
                        border-color: $mainBlue;
                    }

                    @include lt-sm {
                        font-size: 14px;
                        height: 38px
                    }

                    &:focus{
                        outline: none !important;
                    }
                    &:hover{
                        cursor: pointer;
                    }

                    &.with-border{
                        border-bottom: 1.5px #505050 solid;
                        border-radius: 10px;

                        @include lt-md {

                            border-color: $mainBlue;
                        }
                    }
                }

            }

            .civ-custom-options{
                background: #f8fafc;
                position: absolute;
                border: 1.5px #505050 solid;
                border-radius: 0 0 10px 10px;
                opacity: 1;
                margin-top: 0;
                width: 100%;
                border-top: 0;
                height: auto;
                max-height: 300px;
                overflow-y: auto;
                z-index: 30;

                @include lt-md {
                    border-color: $mainBlue;
                }

                div{
                    font-size: 22px;
                    padding-left: 23px;
                    margin-left: 1px;

                    @include lt-sm {
                        font-size: 14px;
                    }

                    &:hover{
                        cursor: pointer;
                        background: lightcyan;
                    }

                    &:last-child:hover{
                        border-radius:0 0 10px 10px ;
                    }
                }
            }
        }

    }

    .lang-item{
        position: relative;
        width: 400px;

        @include lt-sm {
            justify-content: space-between !important;
            width: 100%;
        }
    }

    .hold-tab {
        align-items: flex-end !important;
    }

    .buttons-wrapper {
        display: flex;
        width: 100%;
        max-width: 616px;
        justify-content: space-between;
        flex-wrap: wrap;
        margin-top: 1rem;

        @include lt-md {
            .btn {
                width: 48%;
                min-width: 100px;
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
