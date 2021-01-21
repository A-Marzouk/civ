<template>
    <div>
        <div class="edit-cv" :class="{'imports-tab' : activeTab === 'imports' }">
            <sidebar :activeTab="activeTab" class="sidebar-component" @onChange="activeTab=$event"/>

            <main class="edit-cv-content">

                <div class="save-bar">
                    <div v-if="savingStatus === 'normal'" class="status">
                        Last save <img src="/icons/clock-icon.svg" alt="clock icon"> {{justSaved ? 'a few moments ago' : lastActivity}} | <span v-if="user.username">{{user.default_resume_link.url}}</span>
                    </div>
                    <div v-else-if="savingStatus === 'saving'" class="saving">
                        Saving...
                    </div>
                    <div v-else-if="savingStatus === 'saved'" class="saved">
                        Saved <img src="/icons/saved-icon.svg" alt="saved icon">
                    </div>
                    <div v-else class="error">
                        Error
                    </div>
                </div>

                <transition name="fade" mode="out-in" class="d-flex flex-column">
                    <router-view></router-view>
                </transition>
            </main>
        </div>
        <div class="preview-rows-wrapper">
            <div class="cv-content-preview-wrapper" v-if="activeTab !== 'imports'">
                <div class="cv-content-preview">
                    <div class="cv-preview-link">
                        <a v-if="user.username"
                           :href="`https://civ.ie/${user.username}/${user.default_resume_link.url}`" target="_blank">
                            https://civ.ie/{{user.username}}/{{user.default_resume_link.url}}
                        </a>
                    </div>
                    <div class="cv-preview-theme-wrapper">
                        <div class="cv-preview-theme">
                            <component :is="userTheme" :builderCurrentTabTitle="activeTab" v-if="user.personal_info" :user="user"
                                       :is_preview="false"></component>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    import sidebar from "./../components/edit-tabs/sidebar";

    export default {
        name: "EditCV",

        components: {
            sidebar: sidebar,
        },

        data: () => ({
            activeTab: "profile",
            baseUrl: '',
            cvAutoUpdate: true,
            isFrameLoaded: false,
            availableThemes: [],
        }),

        computed: {
            user() {
                return this.$store.state.user;
            },
            userTheme: function () {
                let id = this.$store.state.user.default_resume_link.theme_id;
                if (id) {
                    return this.importComponent(id);
                }
            },
            savingStatus(){
                return this.$store.state.savingStatus;
            },
            justSaved(){
                return this.$store.state.justSaved;
            },
            lastActivity(){
                return this.$store.state.user.last_activity;
            },
            globalTab(){
                return this.$store.state.currentGlobalTab;
            }
        },
        watch: {
            globalTab: function (val) {
                this.activeTab = val;
            },
        },
        methods: {
            getThemesList() {
                axios.get("/api/user/themes-list")
                    .then(response => {
                        this.availableThemes = response.data.data;
                    })
                    .catch(error => {
                        console.log(error);
                    });
            },
            importComponent(id) {
                let myTheme = {
                    code: 1001
                };
                this.availableThemes.forEach( (theme) => {
                    if(theme.id === id){
                        myTheme = theme;
                    }
                });
                return () => import('../../resume_themes/theme' + myTheme.code + '/index.vue');
            },
            getThemeUrl() {
                // refresh iframe src:
                this.baseUrl = '';
                setTimeout(() => {
                    this.setBaseURL();
                }, 0)

            },
            setBaseURL() {
                let getUrl = window.location;
                this.baseUrl = getUrl.protocol + "//" + getUrl.host + "/";
            },
            onLoad() {
                // remove the spinner loader.
                this.isFrameLoaded = true;
            },
            updateIframe(force = 'false') {
                if (this.cvAutoUpdate || force === 'true') {
                    this.isFrameLoaded = false;
                    setTimeout(() => {
                        this.rotateImageEffect();
                        this.getThemeUrl();
                    }, 0);
                }
            },
            rotateImageEffect() {
                let refreshButton = $('#refreshImage');
                refreshButton.addClass('rotate');
                setTimeout(() => {
                    refreshButton.removeClass('rotate');
                }, 4000);
            }
        },

        created() {
            this.activeTab = window.location.pathname.split("/")[3];
        },
        mounted() {
            this.setBaseURL();
            this.getThemesList();
        }
    };
</script>

<style lang="scss" scoped>
    $activeColor: #001ce2;
    $disabledColor: #9f9e9e;

    @import "../../../../sass/media-queries";

    .edit-cv {

        .edit-cv-content {
            padding: 5px 5px;
        }

        @include gt-xs {
            padding: 40px 30px 30px;

            .edit-cv-content {
                padding-left: unset;
                padding-right: unset;
            }
        }
    }

    .cv-content-preview-wrapper {
        overflow-y: hidden;
        max-height: fit-content;
        min-height: 900px;
        max-width: 94%;
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
            padding: 0px;
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

    .aside-link {
        font-size: 22px;
        padding-right: 32px;

        .icon {
            width: 45px;
            height: 45px;
            margin-right: 20px;
        }

        .aside-icon {
            path {
                fill: none;
                stroke: $disabledColor;
                transition: all 0.5s ease;
            }

            circle {
                fill: none;
                stroke: $disabledColor;
                transition: all 0.5s ease;
            }
        }

        &.active {
            a {
                color: $activeColor;
                transition: all 1s ease;
            }

            .aside-icon {
                path {
                    fill: $activeColor;
                    stroke: #fff;
                    transition: all 0.5s ease;
                }

                circle {
                    fill: $activeColor;
                    stroke: #fff;
                    transition: all 0.5s ease;
                }
            }
        }

        a {
            padding: 13px 0;
            justify-content: flex-start;
            color: $disabledColor;
            transition: all 1s ease;
            display: block;
            width: 100%;
            height: 100%;

            &:active,
            &:hover {
                text-decoration: none;
                cursor: pointer;
            }
        }
    }

    .aside-icon {
        margin-right: 22px;
        width: 40px;
    }

    .fade-enter-active {
        transition: all 0.6s ease;
    }

    .fade-leave-active {
        transition: all 0.6s cubic-bezier(1, 0.5, 0.8, 1);
    }

    .fade-enter, .fade-leave-to
        /* .fade-leave-active below version 2.1.8 */
    {
        opacity: 0;
    }

    .save-bar{

        font-size: 18px;
        margin-bottom: 8px;

        @include lt-sm{
            padding-left: 22px;
        }


        .status{
            color: #888DB1;
            display: flex;
            align-items: center;

            img{
                width: 21px;
                margin-left: 7px;
                margin-right: 6px;
            }
        }

        .saving{
            color: #888DB1;
        }

        .saved{
            color: #3fe23f;
            display: flex;
            align-items: center;

            img{
                width: 21px;
                margin-left: 7px;
            }
        }

        .error{
            color: red;
        }
    }
</style>

<style lang="scss">
    @import "../../../../sass/media-queries";

    .v-application--wrap {
        min-height: 450px !important;
    }

    .preview-rows-wrapper{
        width: 95%;
        margin: auto;
        @include lt-md {
            margin-top: 50px;
        }
    }

    .preview-action-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-direction: row;
        margin-top: 40px;
        height: 50px;

        font-style: normal;
        font-weight: 500;
        font-size: 18px;
        line-height: 22px;
        color: #888DB1 !important;

        padding-right: 30px;
        @include lt-sm {
            font-size: 14px;
            padding-right: 24px;
            padding-left: 24px;
        }

        .switch {
            display: flex;
            align-items: center;


            @include lt-sm {
                flex-wrap: wrap;
                justify-content: center;
                .v-input--selection-controls.v-input--switch {
                    margin-top: 0 !important;
                    padding-top: 0 !important;

                    .v-input__control {
                        height: 28px !important;

                        .v-input__slot {
                            margin-bottom: 0 !important;
                        }
                    }
                }
            }

            .text {
                margin-right: 10px;
                @include lt-sm {
                    max-width: 85px;
                    text-align: left;
                }
            }
        }

        .refresh {
            display: flex;
            align-items: center;
            @include lt-sm {
                flex-wrap: wrap;
                justify-content: center;
                span {
                    max-width: 65px;
                }
            }

            img {
                margin-left: 10px;
                transition: all 1s;
            }

            img.rotate {
                animation: rotation 2s 2 linear;
            }

            &:hover {
                cursor: pointer;
            }
        }
    }

    .theme-preview-loader {
        width: 100%;
        min-height: 1300px;

        .loader {
            max-width: 95%;
            margin-top: 25px;

            .v-skeleton-loader__list-item-avatar-three-line.v-skeleton-loader__bone {
                margin-top: 25px;
                margin-bottom: 20px;

                .v-skeleton-loader__avatar.v-skeleton-loader__bone {
                    margin-right: 12px;
                }
            }

            .v-skeleton-loader__image.v-skeleton-loader__bone {
                margin-top: 25px;
                margin-bottom: 20px;
            }

            .v-skeleton-loader__article.v-skeleton-loader__bone {
                margin-top: 25px;
                margin-bottom: 20px;
            }

            .v-skeleton-loader__actions.v-skeleton-loader__bone {
                margin-top: 20px;

                .v-skeleton-loader__button.v-skeleton-loader__bone {
                    margin-right: 30px;
                }
            }
        }
    }


    // keyframes:

    @keyframes rotation {
        100% {
            transform: rotate(359deg);
        }
    }
</style>