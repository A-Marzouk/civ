<template>
    <v-app>
        <v-container fluid>
            <v-row>
                <!-- side menu -->
                <v-col xl="12" lg="12" md="12" sm="12" cols="12" align="left" class>
                    <!-- tab bar -->
                    <v-card class="card-themes-wrapper main-content resume-builder__scroll">
                        <div class="themes-wrapper-title mb-4">Choose the CV template you love</div>
                        <div v-if="user.default_resume_link"  class="theme-container-wrapper">
                            <div v-for="theme in availableThemes" :key="theme.id" class="theme-container">
                                <v-hover>
                                    <template v-slot:default="{ hover }">
                                        <v-card class="card-theme-holder pa-0 ma-0" :style="{ backgroundImage: `url(${theme.image})` }" flat color="transparent">
                                            <div>
                                                <div class="theme-image holder" :class="theme.id == user.default_resume_link.theme_id? 'active': 'inactive'"></div>
                                                <v-fade-transition>
                                                    <v-overlay
                                                            v-if="hover"
                                                            absolute
                                                            color="#ffffff"
                                                            opacity="0.5"
                                                            class="custom-overlay"
                                                    >
                                                        <v-btn
                                                                color="#001CE2"
                                                                absolute
                                                                class="btn-activate"
                                                                :class="{active : theme.id === user.default_resume_link.theme_id}"
                                                                depressed
                                                                @click="activateTheme(theme.id)"
                                                        >
                                                            {{theme.id === user.default_resume_link.theme_id ? 'Active' : 'Activate'}}
                                                            <img
                                                                    src="/icons/check.svg"
                                                            />
                                                        </v-btn>
                                                    </v-overlay>
                                                </v-fade-transition>
                                            </div>
                                        </v-card>
                                    </template>
                                </v-hover>
                            </div>
                        </div>
                    </v-card>
                    <v-card flat tile color="transparent"></v-card>
                </v-col>
            </v-row>
        </v-container>
    </v-app>
</template>

<script>
    export default {
        name: "Themes",
        data() {
            return {
                overlay: false,
                viewThemeModal: false,
                themeTab: 0,
                selectedTheme: 1,
                currentThemeComponent: "resumeTheme201",
                windowWidth: window.innerWidth,
                disabledInput: false,
                availableThemes: [],
                showProfessionOptions: false,
                showSpecialityOptions: false,
                selectedProfession: 0,
                selectedSpeciality: 0,
                previewThemeID: null,
                professionOptions: [
                    {
                        name: "Select a profession"
                    },
                    {
                        name: "Fullstack Developer"
                    },
                    {
                        name: "Frontend Developer"
                    },
                    {
                        name: "Database Specialist"
                    },
                    {
                        name: "Big Data"
                    },
                    {
                        name: "UX/UI Designer"
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
                        name: "Fullstack Developer"
                    },
                    {
                        name: "Frontend Developer"
                    },
                    {
                        name: "Database Specialist"
                    },
                    {
                        name: "Big Data"
                    },
                    {
                        name: "UX/UI Designer"
                    },
                    {
                        name: "Graphic Designer"
                    }
                ],
                themeCategories: [
                    { id: 1, title: "UI/UX Designer", count: 46 },
                    { id: 2, title: "Graphic Designer", count: 35 },
                    { id: 3, title: "Mobile App Designer", count: 22 },
                    { id: 4, title: "Front-end Developer", count: 88 },
                    { id: 5, title: "Full Stack Developer", count: 115 },
                    { id: 6, title: "Graphic Designer", count: 46 },
                    { id: 7, title: "Motion Designer", count: 19 },
                    { id: 8, title: "Database Specialist", count: 16 },
                    { id: 9, title: "Big Data", count: 75 }
                ],
                baseUrl:'',
                cvAutoUpdate: false
            };
        },
        computed: {
            user() {
                return this.$store.state.user;
            },
            themeUrl:{
                get() {
                    return this.baseUrl + this.$store.state.user.username;
                },
                set(newValue) {
                    this.baseUrl = newValue;
                }
            }
        },
        methods: {
            openTheme(id, is_real) {
                let url = "/preview/" + id + "?real=" + is_real;
                window.open(url, "_blank") || window.location.replace(url);
            },
            activateTheme(theme_id) {
                if (this.user.default_resume_link.theme_id === theme_id) {
                    return;
                }
                axios
                    .put("/api/user/update-theme", { theme_id: theme_id, user_id: this.user.id })
                    .then(response => {
                        this.user.default_resume_link.theme_id = theme_id;
                        this.setActiveTheme(theme_id);
                        this.updateIframe();
                        this.$store.dispatch("flyingNotification");
                    })
                    .catch(error => {
                        if (typeof error.response.data === "object") {
                            console.log(error.response.data.errors);
                            this.errors = error.response.data.errors;
                        } else {
                            this.errors = "Something went wrong. Please try again.";
                        }
                        this.$store.dispatch("flyingNotification", {
                            message: "Error",
                            iconSrc: "/images/resume_builder/error.png"
                        });
                    });
            },
            getThemesList() {
                axios
                    .get("/api/user/themes-list")
                    .then(response => {
                        this.availableThemes = response.data.data;
                    })
                    .catch(error => {
                        console.log(error);
                    });
            },
            setActiveTheme(theme_id) {
                this.availableThemes.forEach(theme => {
                    if (theme.id === theme_id) {
                        this.user.default_resume_link.theme_id = theme_id;
                    }
                });
            },
            getThemeUrl(){
                // refresh iframe src:
                this.baseUrl =  '';
                setTimeout(() => {
                    this.setBaseURL();
                }, 0)

            },
            setBaseURL() {
                let getUrl = window.location;
                this.baseUrl = getUrl.protocol + "//" + getUrl.host + "/";
            },
            onLoad(){
                // remove the spinner loader.


            },
            updateIframe(){
                console.log('Update');
                if(!this.cvAutoUpdate){
                    return;
                }
                setTimeout(() => {
                    this.getThemeUrl();
                },0);
            }
        },
        mounted() {
            this.getThemesList();
            window.onresize = () => {
                this.windowWidth = window.innerWidth;
            };
            this.setBaseURL();
        }
    };
</script>

<style scoped lang="scss">
    @import '../../../../../sass/media-queries';

    $mainBlue: #001ce2;
    .view-theme-modal {
        border-radius: 5px;
        border: 1px solid #888db1;
        width: 964px;
        max-width: 964px;
        @media screen and (max-width: 1903px) {
            width: 50% !important;
            max-width: 50% !important;
        }

        .view-theme-modal-card {
            border: 1px solid #888db1;
            border-radius: 5px;
            .theme-img-modal {
                width: 964px;
                height: 678px;
                @media screen and (min-width: 1264px) and (max-width: 1903px) {
                    width: 80%;
                }
            }
        }
    }
    .resume-builder__tab {
        font-family: "Noto Sans" !important;
        font-size: 18px !important;
        line-height: 25px;
        text-transform: capitalize !important;
    }
    .eye-btn {
        min-width: 35.59px !important;
        width: 35.59px !important;
        min-height: 35px !important;
        height: 35px !important;
        max-height: 35px !important;
    }

    .main-content {
        height: 460px;
        background: #fff;
        box-shadow: 0px 5px 100px rgba(0, 16, 131, 0.1);
        padding: 50px;
        margin-bottom: 70px;
        scroll-behavior: smooth;
        @include lt-md{
            padding: 25px;
        }
        @include lt-sm{
            padding: 25px;
        }
        @media screen and (min-width: 1904px) {
            max-width: 1480px !important;
        }
        @media screen and (min-width: 1264px) and (max-width: 1903px) {
            width: 98% !important;
        }
        @media screen and (max-width: 599px) {
            width: auto !important;
        }
    }
    .custom-ripple-class {
        background: transparent;
    }

    .custom-tab {
        font-family: "Noto Sans" !important;
        font-style: normal;
        font-weight: 500;
        font-size: 18px !important;
        line-height: 26px;
        color: #888db1 !important;
        text-transform: capitalize !important;
        @media screen and (min-width: 1264px) and (max-width: 1366px) {
            font-size: 16px !important;
        }
    }
    .custom-active-tab {
        font-family: "Noto Sans" !important;
        font-style: normal;
        font-weight: 500;
        font-size: 18px !important;
        line-height: 26px;
        color: #001ce2 !important;
        @media screen and (min-width: 1264px) and (max-width: 1366px) {
            font-size: 16px !important;
        }
    }
    .custom-active-tab::before {
        opacity: 0 !important;
    }
    .v-tab {
        justify-content: left !important;
    }
    .card-counter {
        border-radius: 5px;
        padding-top: 2px;
        .counter {
            font-family: "Noto Sans" !important;
            font-style: normal;
            font-weight: 600;
            font-size: 14px;
            line-height: 14px;
            text-align: center;
            color: #888db1 !important;
            justify-content: center;
            justify-items: center;
        }
    }
    .card-themes-wrapper {
        @media screen and (min-width: 1264px) and (max-width: 1903px) {
            max-width: 1431.25px;
            margin-left: 0;
        }
        .themes-wrapper-title {
            font-family: "Noto Sans" !important;
            font-style: normal;
            font-weight: 600;
            font-size: 40px;
            line-height: 54px;
            color: #001ce2 !important;
            @media screen and (max-width: 959px) {
                font-size: 22px;
                line-height: 28px;
            }
            @media screen and (max-width: 767px) {
                font-size: 18px;
                line-height: 25px;
            }
            @media screen and (max-width: 430px) {
                font-size: 15px;
                line-height: 25px;
            }
            @media screen and (max-width: 382px) {
                font-size: 13px;
            }
        }
        .theme-container-wrapper{

            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;

            @include lt-lg{
                justify-content: left;
            }

            @media screen and (min-width: 1280px) and (max-width: 1460px) {
                justify-content: left;
            }

            .theme-container{
                margin-top: 25px;
                width: 100%;
                max-width: 430px;

                @include lt-lg{
                    max-width: 310px;
                }

                @media screen and (min-width: 1280px) and (max-width: 1460px) {
                    max-width: 310px;
                }

                .card-theme-holder {
                    background-size: cover;
                    width: 417px;
                    height: 300px;
                    border-radius: 26px;

                    @include lt-lg{
                        width: 300px;
                        height:217px;
                    }

                    @media screen and (min-width: 1280px) and (max-width: 1460px) {
                        width: 300px;
                        height:217px;
                    }

                    @include lt-sm{
                        width: 100%;
                        height:217px;
                    }

                    .holder {
                        width: 100%;
                        height: 300px;
                        border-radius: 26px;

                        @include lt-lg{
                            height:217px;
                        }

                        @media screen and (min-width: 1280px) and (max-width: 1460px) {
                            height:217px;
                        }


                        @include lt-sm{
                            height:217px;
                        }
                    }


                    .custom-overlay {
                        background: none;
                        border: 1px solid #888db1 !important;
                        border-radius: 26px !important;
                    }
                    .btn-preview-data {
                        width: 120px;
                        height: 35px;
                        border-radius: 5px;
                        font-family: "Noto Sans" !important;
                        font-style: normal;
                        font-weight: 500;
                        font-size: 12px;
                        line-height: 12px;
                        text-transform: capitalize !important;
                        @media screen and (min-width: 960px) and (max-width: 1903px) {

                        }
                        @media screen and (min-width: 600px) and (max-width: 959px) {

                        }
                        img {
                            margin-left: 5px;
                            width: 12px;
                            height: 12px;
                            @media screen and (min-width: 960px) and (max-width: 1903px) {
                                width: 10px;
                                height: 10px;
                            }
                            @media screen and (min-width: 600px) and (max-width: 959px) {
                                width: 10px;
                                height: 10px;
                            }
                        }
                    }
                    .btn-my-data {
                        width: 120px;
                        height: 35px;
                        border-radius: 5px;
                        font-family: "Noto Sans" !important;
                        font-style: normal;
                        font-weight: 500;
                        font-size: 12px;
                        line-height: 12px;
                        text-transform: capitalize !important;
                        color: #001ce2 !important;
                        @media screen and (min-width: 960px) and (max-width: 1903px) {

                        }
                        @media screen and (min-width: 600px) and (max-width: 959px) {
                        }

                        img {
                            margin-left: 5px;
                            width: 12px;
                            height: 12px;
                            @media screen and (min-width: 960px) and (max-width: 1903px) {
                                width: 10px;
                                height: 10px;
                            }
                            @media screen and (min-width: 600px) and (max-width: 959px) {
                                width: 10px;
                                height: 10px;
                            }
                        }
                    }
                    .btn-activate {
                        &.active {
                            border: none;
                        }

                        top: 0;
                        right: 0;
                        width: 120px;
                        height: 35px;
                        border-radius: 5px 26px 5px 5px;
                        font-family: "Noto Sans", sans-serif !important;
                        font-style: normal;
                        font-weight: 500;
                        font-size: 12px;
                        line-height: 12px;
                        text-transform: capitalize !important;

                        img {
                            margin-left: 5px;
                            width: 10px;
                            height: 10px;
                        }
                    }


                    .active {
                        border: 3px solid #001ce2;
                    }

                    .inactive {
                        border: 1px solid #888db1;
                    }
                }

            }
        }

        .selected-theme {
            border: 3px solid #001ce2;
        }
    }

    #previewModalContainer {
        width: 80%;
        iframe {
            width: 100%;
            height: 80vh;
        }
    }

    .cv-content-preview-wrapper {
        overflow-y: scroll;
        margin-top: 40px;
        padding: 10px;
        max-height: 600px;
        max-width: 350px;
        margin-left: auto;
        margin-right: auto;
        @media screen and (min-width: 1904px) {
            max-width: 1480px;
            width: 1480px;
            margin-left: -81px !important;
        }
        @media screen and (min-width: 1264px) and (max-width: 1903px) {
            max-width: 99.2% !important;
        }
        @media screen and (max-width: 599px){
            max-width: 385px;
        }

        &::-webkit-scrollbar {
            width: 5px;
            height: 0;
            background: #e5e5e5;
            border-radius: 5px 0 0 5px;
        }

        &::-webkit-scrollbar-thumb {
            background: #001ce2;
            border-radius: 5px 0 0 5px;
        }

        .cv-content-preview {
            .cv-preview-link {
                height: 50px;
                display: flex;
                align-items: center;
                border-radius: 5px;
                padding-left: 25px;
                border: 1px solid #e6e8fc;

                a {
                    color: #888db1;
                    font-family: "Roboto", "sans-serif";
                    font-size: 20px;
                    line-height: 22px;

                    &:hover {
                        color: inherit;
                    }
                }
            }

            .cv-preview-theme-wrapper {
                .cv-preview-theme {
                    overflow-x: scroll;

                    &::-webkit-scrollbar {
                        height: 0;
                    }

                    &::-webkit-scrollbar-thumb {
                        height: 0;
                    }
                }
            }
        }

        @include gt-xs {
            padding: 10px;
            padding-right: 20px;
            max-width: unset;
            margin-left: -10px;

            &::-webkit-scrollbar {
                width: 10px;
                border-radius: 10px 0 0 10px;
            }

            &::-webkit-scrollbar-thumb {
                border-radius: 10px 0 0 10px;
            }
        }
    }
</style>
<style>
    #resumeBuilder .v-tabs-slider-wrapper {
        left: auto !important;
        right: 0 !important;
        width: 5px !important;
    }
    #resumeBuilder .v-tabs-slider {
        background: #001ce2 !important;
        border-radius: 10px 0px 0px 10px !important;
    }
</style>
<style lang="scss">
    .civie-input.custom-border-radius {
        .v-input__slot fieldset {
            border-radius: 5px !important;
        }
    }

    .custom-overlay{
        .v-overlay__scrim{
            opacity: 0 !important;
        }
        .v-overlay__content{
            height: 100%;
            width: 100%;
            display: flex;
            align-items: center;
        }
    }

    /* I frame styling */
    .vue-friendly-iframe{
        iframe{
            width:100%;
            min-height:1400px;
        }
    }
</style>