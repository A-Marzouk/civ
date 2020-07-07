<template>
    <v-app>
        <v-container fluid class="pa-xl-0 pa-lg-0 pa-md-8 pa-sm-5 pa-6">
            <v-row>
                <!-- side menu -->
                <v-col xl="3" lg="3" md="5" sm="5" cols="12">
                    <v-select
                            class="resume-builder__input civie-select hidden-lg-and-up"
                            outlined
                            placeholder="Select an option"
                            :items="themeCategories"
                            item-text="title"
                            item-value="id"
                            color="#001CE2"
                            height="60"
                    >
                        <template slot="append">
                            <v-btn class="eye-btn ml-n7 mr-4 mt-n2" depressed>
                                <img width="35.59" height="35" src="/icons/count-icon.svg" alt="icon"/>
                            </v-btn>
                        </template>
                        <button class="dropdown-icon icon" slot="append" style="margin-top:2px;">
                            <svg-vue :icon="`dropdown-caret`"></svg-vue>
                        </button>
                    </v-select>
                    <v-navigation-drawer permanent width="330" class="hidden-md-and-down ml-xl-12">
                        <v-card flat color="transparent" class="pa-5 mt-n12">
                            <v-text-field
                                    class="resume-builder__input civie-input custom-border-radius"
                                    outlined
                                    color="#001CE2"
                                    :class="{'resume-builder__input--disabled': disabledInput}"
                                    :disabled="disabledInput"
                                    label
                                    height="55"
                                    placeholder="Current Theme"
                            >
                                <template slot="append">
                                    <v-btn class="eye-btn mt-n1 ml-n2" depressed>
                                        <img width="35.59" height="35" src="/icons/count-icon.svg" alt="icon"/>
                                    </v-btn>
                                </template>
                            </v-text-field>
                        </v-card>
                        <v-card color="transparent" flat tile class="ml-2 mt-n6">
                            <v-tabs
                                    vertical
                                    fixed-tabs
                                    active-class="custom-active-tab"
                                    slider-size="5"
                                    v-model="themeTab"
                            >
                                <v-tab
                                        v-for="category in themeCategories"
                                        :key="category.id"
                                        class="custom-tab mb-3"
                                >
                                    <v-row>
                                        <v-col cols="6" align="left">{{category.title}}</v-col>
                                        <v-col cols="5" align="right">
                                            <v-card
                                                    class="card-counter"
                                                    flat
                                                    height="35"
                                                    width="35.9"
                                                    color="#E6E8FC"
                                                    align="center"
                                            >
                                                <span class="counter">{{category.count}}</span>
                                            </v-card>
                                        </v-col>
                                    </v-row>
                                </v-tab>
                            </v-tabs>
                        </v-card>
                    </v-navigation-drawer>
                </v-col>
                <v-col
                        xl="9"
                        lg="9"
                        md="12"
                        sm="12"
                        cols="12"
                        align="left"
                        class="col-theme-preview ml-xl-n12"
                >
                    <!-- tab bar -->
                    <v-card class="card-themes-wrapper main-content resume-builder__scroll pa-10">
                        <div class="themes-wrapper-title mb-4">Choose the CV template you love</div>
                        <v-row align="center" v-if="user.theme">
                            <v-col md="4" sm="4" cols="6" v-for="theme in availableThemes" :key="theme.id">
                                <v-hover>
                                    <template v-slot:default="{ hover }">
                                        <v-card class="card-theme-holder" flat color="transparent">
                                            <v-row justify="center">
                                                <img :src="theme.image" alt="themes" class
                                                    />
                                                <v-fade-transition>
                                                    <v-overlay
                                                            v-if="hover"
                                                            absolute
                                                            color="#ffffff"
                                                            opacity="0.5"
                                                            class="custom-overlay"
                                                    >
                                                        <v-btn color="#001CE2" absolute class="btn-activate"  @click="activateTheme(theme.id)">
                                                            Activate
                                                            <img src="/icons/check.svg"/>
                                                        </v-btn>
                                                        <v-row>
                                                            <v-col cols="12" align="center">
                                                                <v-btn color="#001CE2" class="btn-my-data mb-n3"
                                                                       outlined depressed>
                                                                    Play Video
                                                                    <img src="/icons/youtube.svg"/>
                                                                </v-btn>
                                                            </v-col>
                                                            <v-col cols="12" align="center">
                                                                <v-btn color="#001CE2" class="btn-my-data mb-n3" @click="openTheme(theme.id, 'true')"
                                                                       outlined depressed>
                                                                    My Data
                                                                    <img src="/icons/eye-icon-blue.svg"/>
                                                                </v-btn>
                                                            </v-col>
                                                            <v-col cols="12" align="center">
                                                                <v-btn color="#001CE2" class="btn-preview-data" @click="openTheme(theme.id, 'false')"
                                                                       depressed>
                                                                    Preview
                                                                    <img src="/icons/eye-icon-white.svg"/>
                                                                </v-btn>
                                                            </v-col>
                                                        </v-row>
                                                    </v-overlay>
                                                </v-fade-transition>
                                            </v-row>
                                        </v-card>
                                    </template>
                                </v-hover>
                            </v-col>
                        </v-row>
                    </v-card>
                    <v-card flat tile color="transparent"></v-card>

                    <div class="cv-content-preview-wrapper">
                        <div class="cv-content-preview">
                            <div class="cv-preview-link">
                                <a
                                        v-if="user.username"
                                        :href="`https://civ.ie/${user.username}`"
                                        target="_blank"
                                        v-text="`https://civ.ie/${user.username}`"
                                ></a>
                            </div>
                            <div class="cv-preview-theme-wrapper">
                                <div class="cv-preview-theme">
                                    <component :is="userTheme" v-if="user.personal_info" :user="user" :is_preview="false"></component>
                                </div>
                            </div>
                        </div>
                    </div>
                </v-col>
            </v-row>
            <v-dialog
                    v-model="viewThemeModal"
                    class="view-theme-modal"
                    max-width="964"
                    max-height="678"
                    style="border-radius:10px;"
            >
                <v-card class="view-theme-modal-card">
                    <img
                            src="/images/new_resume_builder/themes-wrapper.svg"
                            alt="themes"
                            class="theme-img-modal"
                    />
                </v-card>
            </v-dialog>
        </v-container>
    </v-app>
</template>

<script>
    export default {
        name: "ViewCV",
        data() {
            return {
                overlay: false,
                viewThemeModal: false,
                currentThemeComponent: 'resumeTheme5',
                themeTab: 0,
                selectedTheme: 1,
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
                    {id: 1, title: "UI/UX Designer", count: 46},
                    {id: 2, title: "Graphic Designer", count: 35},
                    {id: 3, title: "Mobile App Designer", count: 22},
                    {id: 4, title: "Front-end Developer", count: 88},
                    {id: 5, title: "Full Stack Developer", count: 115},
                    {id: 6, title: "Graphic Designer", count: 46},
                    {id: 7, title: "Motion Designer", count: 19},
                    {id: 8, title: "Database Specialist", count: 16},
                    {id: 9, title: "Big Data", count: 75}
                ]
            };
        },
        computed: {
            user() {
                return this.$store.state.user;
            },
            userTheme: function () {
                let code =  this.$store.state.user.theme.code ;
                if(code){
                    return this.importComponent(code);
                }
            }
        },
        methods: {
            importComponent(path) {
                return () => import('../../resume_themes/theme'+ path + '/index.vue');
            },

            showPreviewModal(theme_id) {
                this.previewThemeID = theme_id;
                this.$refs.previewModal.show();
            },

            openTheme(id, is_real) {
                let url = "/preview/" + id + "?real=" + is_real;
                window.open(url, "_blank") || window.location.replace(url);
            },

            activateTheme(theme_id) {
                if (this.user.theme_id === theme_id) {
                    return;
                }
                axios
                    .put("/api/user/update-theme", {theme_id: theme_id})
                    .then(response => {
                        this.user.theme_id = theme_id;
                        this.setActiveTheme(theme_id);
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

            selectProfession(index) {
                // Search profession on db using index
                // axios request
                this.selectedProfession = index;
                this.showProfessionOptions = false;
            },
            selectSpeciality(index) {
                // Search speciality on db using index
                // axios request
                this.selectedSpeciality = index;
                this.showSpecialityOptions = false;
            },
            selectTheme(index) {
                this.selectedTheme = index;
                this.viewThemeModal = true;
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
                        this.user.theme = theme;
                    }
                });
            }
        },
        mounted() {
            this.getThemesList();
            window.onresize = () => {
                this.windowWidth = window.innerWidth;
            };
        }
    };
</script>

<style scoped lang="scss">
    @import "../../../../sass/media-queries";

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
        height: 525px;
        background: #fff;
        box-shadow: 0px 5px 100px rgba(0, 16, 131, 0.1);
        padding: 50px;
        margin-bottom: 70px;
        scroll-behavior: smooth;
        @media screen and (min-width: 1264px) and (max-width: 1903px) {
            width: 95% !important;
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

        .card-theme-holder {
            max-width: 417px;
            max-height: 302.56px;

            img {
                max-width: 100%;
                min-height: 100%;
                width: 95%;
            }

            .custom-overlay {
                background: rgba(255, 255, 255, 0.95);
                border: 1px solid #888db1 !important;
                border-radius: 5px !important;
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

                img {
                    margin-left: 5px;
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

                img {
                    margin-left: 5px;
                    width: 12px;
                    height: 12px;
                }
            }

            .btn-activate {
                top: -73px;
                right: -3px;
                width: 120px;
                height: 35px;
                border-radius: 5px;
                font-family: "Noto Sans" !important;
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
        }

        .theme-img {
            img {
                width: 417px !important;
                height: 302.56px !important;
                @media screen and (max-width: 959px) {
                    width: 200px !important;
                    height: 145.11px !important;
                }
                @media screen and (max-width: 767px) {
                    width: 142px !important;
                    height: 103.03px !important;
                }
            }

            border-radius: 0px !important;
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
        margin-right: -10px;
        margin-left: -10px;
        overflow-y: scroll;
        margin-top: 40px;
        padding: 10px;
        max-height: 600px;
        max-width: 350px;
        margin-left: auto;
        margin-right: auto;

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
</style>