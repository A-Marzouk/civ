<template>
    <div class="view-cv-wrapper">
        <div class="actions-wrapper d-flex justify-content-between align-items-start">
            <div class="change-theme-text">
                <svg-vue class="icon" :icon="'grid'"></svg-vue>
                <h2>Change Theme</h2>
            </div>
            <div class="preview-theme d-flex">
                <div class="preview-text hideOnMd">
                    <h2>Your Current Theme</h2>

                    <div class="btn btn-filled">
                        <svg-vue class="icon" :icon="'eye-icon'"></svg-vue>
                        View Theme
                    </div>
                </div>

                <img :src="`/images/resume_themes/theme${activeTheme}/preview.png`" alt="theme-preview" class="active-theme-img">
                <a :href="'/' + user.username " target="_blank" class="preview-mobile-bar showOnMd justify-content-center">
                    Active Theme <svg-vue class='icon' :icon="'eye-icon'"></svg-vue>
                </a>
            </div>
        </div>

        <div class="filters-wrapper d-flex justify-content-between">
            <div class="civ-input">
                <div class="civ-custom-select">
                    <div class="civ-select-input profession-input" @click="showProfessionOptions = !showProfessionOptions">
                        <input type="text" id="category" disabled v-model="professionOptions[selectedProfession].name" :class="{'with-border' : !showProfessionOptions}">
                        <img src="/images/resume_builder/arrow-down.png" alt="arrow" :class="{'toggled':showProfessionOptions}">
                    </div>
                    <div class="civ-custom-options" v-show="showProfessionOptions">
                        <div v-for="(profession,index) in professionOptions" :key="index + '_profession'" @click="selectProfession(index)">
                            {{profession.name}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="civ-input">
                <div class="civ-custom-select">
                    <div class="civ-select-input speciality-input" @click="showSpecialityOptions = !showSpecialityOptions">
                        <input type="text" id="category" disabled v-model="specialityOptions[selectedSpeciality].name" :class="{'with-border' : !showSpecialityOptions}">
                        <img src="/images/resume_builder/arrow-down.png" alt="arrow" :class="{'toggled':showSpecialityOptions}">
                    </div>
                    <div class="civ-custom-options" v-show="showSpecialityOptions">
                        <div v-for="(speciality,index) in specialityOptions" :key="index + '_speciality'" @click="selectSpeciality(index)">
                            {{speciality.name}}
                        </div>
                    </div>
                </div>
            </div>

            <svg-vue class="grid-icon" :icon="'open-grid-icon'"></svg-vue>
        </div>
        
        <div class="themes">
            <div class="theme-item" v-for="(theme,index) in availableThemes" :key="theme.code">
                <img @click="openTheme(theme)" class="theme-image" :src="`/images/resume_themes/theme${theme.code}/preview.png`" alt="theme-preview" :class="{ 'active' :  parseInt(user.theme_code) === theme.code}">

                <div class="theme-action-btns" v-if="parseInt(user.theme_code) === theme.code">
                    <a :href="'/' + user.username " target="_blank" class="active-btn">
                        Open
                        <img src="/images/resume_builder/viewCV/checkmark.png" alt="checkmark">
                    </a>
                </div>

                <div class="theme-action-btns-wrapper" v-else>
                    <div class="left">
                        <div class="activate-btn NoDecor">
                            <a href="javascript:void(0)" @click="activateTheme(theme.code)">
                                Activate
                                <img src="/images/resume_builder/viewCV/checkmark.png" alt="checkmark">
                            </a>
                        </div>
                    </div>
                    <div class="right">
                        <div class="my-data-btn NoDecor">
                            <a :href="'/preview/theme' + theme.code +'?real=true'" target="_blank">
                                My data
                                <img src="/images/resume_builder/viewCV/eye.png" alt="eye">
                            </a>
                        </div>
                        <div class="preview-btn NoDecor">
                            <a href="javascript:;" @click='showPreviewModal(theme.code)'>
                                Preview
                                <img src="/images/resume_builder/viewCV/eye-white.png" alt="eye-white">
                            </a>
                        </div>


                    </div>
                </div>

            </div>
        </div>

        <b-modal size="xl" centered id="previewModalContainer" ref="previewModal" title="Theme preview" hide-footer>
            <iframe :src="`/preview/theme${previewCode}`"></iframe>
        </b-modal>
        
    </div>
</template>

<script>
    export default {
        name: "ViewCV",
        data(){
            return{
                availableThemes:[
                    {
                        code:201
                    },
                    {
                        code:3
                    },
                    {
                        code:200
                    },
                    {
                        code:8
                    },
                    {
                        code:300
                    },
                ],
                activeTheme: 201,
                showProfessionOptions: false,
                showSpecialityOptions: false,
                selectedProfession: 0,
                selectedSpeciality: 0,
                previewCode: null,
                professionOptions: [
                    {
                        name: "Select a profession"
                    },
                    {
                        name: "Fullstack Developer",
                    },
                    {
                        name: "Frontend Developer",
                    },
                    {
                        name: "Database Specialist",
                    },
                    {
                        name: "Big Data"
                    },
                    {
                        name: "UX/UI Designer",
                    },
                    {
                        name: "Graphic Designer"
                    }
                ],
                specialityOptions: [
                    {
                        name: "Select a speciality"
                    },
                    {
                        name: "Fullstack Developer",
                    },
                    {
                        name: "Frontend Developer",
                    },
                    {
                        name: "Database Specialist",
                    },
                    {
                        name: "Big Data"
                    },
                    {
                        name: "UX/UI Designer",
                    },
                    {
                        name: "Graphic Designer"
                    }
                ]
            }
        },
        computed:{
            user(){
                return this.$store.state.user;
            }
        },
        methods:{
            showPreviewModal (code) {
                this.previewCode = code;
                this.$refs.previewModal.show();
            },
            openTheme(theme){
                let url  = '/preview/theme'+theme.code ;
                window.open(url, "_blank") || window.location.replace(url);

            },
            activateTheme(theme_code){
                if(this.user.theme_code === theme_code){
                    return;
                }
                axios.put('/api/user/update-theme',{theme_code : theme_code})
                    .then((response) => {
                        this.user.theme_code  = theme_code ;
                        this.$store.dispatch('flyingNotification');
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
            selectProfession (index) {
                // Search profession on db using index
                // axios request
                this.selectedProfession = index;
                this.showProfessionOptions = false;
            },
            selectSpeciality (index) {
                // Search speciality on db using index
                // axios request
                this.selectedSpeciality = index;
                this.showSpecialityOptions = false;
            }
        }
    }
</script>

<style scoped lang="scss">
@import '../../../../sass/media-queries';
$mainBlue: #001CE2;

    .filters-wrapper {

        max-width: 740px;
        align-items: center;

        @include lt-md {
            margin-top: 2rem;

        }

        @include lt-sm {
            flex-wrap: wrap;
        }

        .civ-input {
            max-width: 300px;
            width: 48%;
            margin: 0;

            .civ-select-input {
                input {
                    border: $mainBlue;
                }
            }

            @include lt-sm {
                margin-bottom: 1rem;
                min-width: 200px;
            }
        }

        .grid-icon {
            height: 36px;

            @include lt-md {
                display: none;
            }
        }
    }

    .view-cv-wrapper{

        .actions-wrapper {
            margin-top: 40px;
        }

        .preview-theme {

            position: relative;

            @include lt-lg {
                flex-wrap: wrap;
            }

            .preview-text {
                font-size: 30px;
                color: #747474;
                margin-bottom: 1rem;

                h2 {
                    margin-bottom: 20px;
                    max-width: 197px;   
                }

                .btn {
                    width: 100% !important;
                    min-width: 200px !important;
                }
            }

            .active-theme-img {
                width: 394px;
                margin-left: 50px;
                border: solid 3px $mainBlue;
                border-radius: 15px;

                @include lt-lg {
                    margin: 2rem 0;

                }

                @include lt-md {
                    margin: 0;
                    width: 280px;
                }

                @include lt-sm {
                    margin: 0;
                    width: 220px;
                }
            }

            .preview-mobile-bar {
                background: $mainBlue;
                color: white;
                border-radius: 15px;

                svg, path, circle {
                    fill: white;
                }

                .icon {
                    width: 15px;
                    margin-left: 9.5px;
                }

                @include lt-md {
                    position: absolute;
                    display: flex !important;
                    width: 100%;
                    bottom: 0;
                    left: 0;
                    padding: 5px;
                }
            }
        }
        .change-theme-text{
            display: flex;
            justify-content: flex-start;
            align-items: center;
            font-family: "Noto Sans", sans-serif;
            font-weight: 500;
            font-size: 53px;
            text-align: left;
            color: #001ce2;

            @include lt-md {
                font-size: 30px;
            }

            .icon {
                width:56px;
                height:56px;
                margin-right: 55px;

                @include lt-lg {
                    margin-right: 30px;
                }

                @include lt-md {
                    width: 24px;
                    height: auto;
                    margin-right: 10px;
                }
            }
        }
        .themes{
            display: grid;
            grid-gap: 3rem;
            grid-template-columns: repeat(12, 1fr);
            width: 100%;

            @include lt-md {
                grid-gap: 0;
            }

            .theme-item{
                margin-top:100px;
                grid-column: span 4;
                display: flex;
                align-items: center;
                justify-content: center;
                flex-direction: column;
                max-width: 540px;

                @include lt-lg {
                    grid-column: span 6;
                }

                @include lt-md {
                    grid-column: span 12;
                    max-width: 100%;
                }

                img.theme-image{
                    border: 1px solid black;
                    border-radius:20px;
                    transition: all 2s;
                    width: 100%;
                    height: 100%;
                    -webkit-box-shadow: 0px 35px 70px -20px rgba(25, 69, 213, 0.3);
                    -moz-box-shadow:  0px 35px 70px -20px rgba(25, 69, 213, 0.3);
                    box-shadow:   0px 35px 70px -20px rgba(25, 69, 213, 0.3);

                    &.active{
                        -webkit-box-shadow: 0px 35px 70px -20px rgba(7, 211, 38, 0.3);
                        -moz-box-shadow: 0px 35px 70px -20px rgba(7, 211, 38, 0.3);
                        box-shadow:  0px 35px 70px -20px rgba(7, 211, 38, 0.3);
                    }

                    &:hover{
                        cursor: pointer;
                    }
                }

                .theme-action-btns{
                    display: flex;
                    align-items: center;
                    justify-content: center;
                   

                    a.active-btn{
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        margin-top: -23px;
                        height: 47.19px;
                        width: 113.67px;
                        font-weight: 500;
                        font-size: 21px;
                        text-align: left;
                        color: #fff;
                        background-color: #07D326;

                        img{
                            width:17.06px;
                            height:13.33px;
                            margin-left: 15px;
                        }
                    }


                    a{
                        width: auto;
                        padding-left: 15px;
                        padding-right: 15px;
                        height: 50px;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        border-radius: 10px;
                        margin-right: 20px;
                        background: blue;
                        color: white;

                        &:hover{
                            text-decoration: none;
                        }
                    }
                }

                .theme-action-btns-wrapper{
                    display: flex;
                    align-items: center;
                    justify-content: space-between;
                    padding-left:32px;
                    padding-right:23px;
                    background: whitesmoke;
                    border-radius: 10px;
                    height: 70px;
                    margin-top: -35px;
                    width: 95%;
                    background: linear-gradient(#f8f8f8 0%, #f4f4f4 100%);

                    @include lt-md {
                        padding: 5px 10px;
                    }

                    .left{
                        .activate-btn{
                           a{
                               display: flex;
                               align-items: center;
                               justify-content: center;
                               width:112px;
                               height:34px;
                               font-size: 12px;
                               border-radius: 8px;
                               background: #1945D5;
                               font-weight: 600;
                               text-align: left;
                               color: #fff;

                               @include lt-md {
                                   width: 100px;
                                   font-size: 10px;
                               }

                               img{
                                   width:15.72px;
                                   height:12.28px;
                                   margin-left: 24.7px;
                               }
                           }
                        }
                    }

                    .right{
                        display: flex;
                        .my-data-btn{
                            margin-right: 19px;
                            
                           a{
                               display: flex;
                               align-items: center;
                               justify-content: center;
                               width:112px;
                               height:34px;
                               font-size: 12px;
                               border-radius: 8px;
                               font-weight: 600;
                               letter-spacing: 0.01em;
                               text-align: left;
                               color: #1b4bd2;
                               background: white;
                               border: 1px solid #1945d5;

                               @include lt-md {
                                   width: 100px;
                                   font-size: 10px;
                                   margin-right: 0;
                               }

                               img{
                                   width:22.51px;
                                   height:14.35px;
                                   margin-left: 22.9px;
                               }
                           }
                        }

                        .preview-btn{
                          a{
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                width:112px;
                                height:34px;
                                font-size: 12px;
                                border-radius: 8px;
                                background: #1945D5;
                                font-weight: 600;
                                text-align: left;
                                color: #fff;

                                @include lt-md {
                                   width: 100px;
                                   font-size: 10px;
                               }

                              img{
                                  width:22.51px;
                                  height:14.35px;
                                  margin-left: 19.9px;
                              }
                          }
                        }
                    }


                }

            }

            margin-bottom: 100px;
        }
    }

    #previewModalContainer {
        width: 80%;

        iframe { 
            width: 90%;
            height: 80vh;
        }
    }
</style>
