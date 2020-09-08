<template>
    <aside class="sidebar">
        <div class="sidebar-container ml-md-5 ml-sm-0 ml-1">
            <div class="sidebar-link-activator">
                <a href="#" @click.prevent="open=!open" class="activator-preview-link">
                    <div
                            class="link-icon profile-ixklwxz-link-icon-active"
                            :data-icon="currentSidebarLink.icon"
                    >
                        <svg-vue :icon="`edit-cv-sidebar/${currentSidebarLink.icon}`"></svg-vue>
                    </div>
                    {{ currentSidebarLink.label }}
                </a>

                <a
                        href="#"
                        @click.prevent="open=!open"
                        class="link-activator-caret"
                        :class="{'open' :open}"
                >
                    <svg
                            width="14"
                            height="8"
                            viewBox="0 0 14 8"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                                d="M1 1L7 7L13 1"
                                stroke="#001CE2"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                        />
                    </svg>
                </a>
            </div>

            <div class="sidebar-links" :class="{'open' :open}">
                <div
                        v-for="sidebarLink in sidebarLinks"
                        class="sidebar-link"
                        :class="{'active': activeTab === sidebarLink.icon}"
                        :key="sidebarLink.icon"
                >
                    <router-link
                            :to="sidebarLink.url"
                            @click.native="setActive(sidebarLink)"
                            @mouseover.native="hoverMenu(sidebarLink)"
                            @mouseleave.native="hoverMenu(null)"
                            class="d-flex justify-content-between w-100"
                    >
                        <div class="link-icon"
                             :class="[{'profile-ixklwxz-link-icon-active': activeTab === sidebarLink.icon}, {'profile-ixklwxz-link-icon-active':activeHoverMenu==sidebarLink.icon}]">
                            <svg-vue :icon="`edit-cv-sidebar/${sidebarLink.icon}`"></svg-vue>
                        </div>
                        <span style="flex:2;">
                            {{ sidebarLink.label }}
                        </span>
                        <div class="resume-builder__action-buttons-container" v-if="tabs">
                            <v-btn class="btn-icon civie-btn" depressed v-if="!structureTabs.includes(sidebarLink.icon)"
                                   style="border-radius: 50%;" @click="toggleTab(sidebarLink.title)">
                                <svg-vue icon="eye-icon" class="icon"
                                         :class="{'visible' : isTabActive(sidebarLink.title)}"></svg-vue>
                            </v-btn>
                        </div>
                    </router-link>

                    <hr v-if="sidebarLink.icon === 'pay-availability'"
                        style="margin-right: 20px; margin-top: 20px; margin-bottom: 15px;">
                </div>
            </div>
        </div>
    </aside>
</template>

<script>
    export default {
        name: "sidebar",

        props: {
            activeTab: {
                type: String,
                required: true,
            },
        },

        data() {
            return {
                open: false,
                menuHover: false,
                activeHoverMenu: null,
                sidebarLinks: [
                    {
                        url: "/resume-builder/edit/profile",
                        icon: "profile",
                        label: "Profile",
                        title: "profile",
                    },
                    {
                        url: "/resume-builder/edit/about",
                        icon: "about",
                        label: "About",
                        title: "about_me",
                    },
                    {
                        url: "/resume-builder/edit/links",
                        icon: "links",
                        label: "Links",
                        title: "links",
                    },
                    {
                        url: "/resume-builder/edit/work-experience",
                        icon: "work-experience",
                        label: "Work experience",
                        title: "work_experience",
                    },
                    {
                        url: "/resume-builder/edit/education",
                        icon: "education",
                        label: "Education",
                        title: "education",
                    },
                    {
                        url: "/resume-builder/edit/skills",
                        icon: "skills",
                        label: "Skills",
                        title: "skills",
                    },
                    {
                        url: "/resume-builder/edit/hobbies",
                        icon: "hobbies",
                        label: "Hobbies",
                        title: "hobbies",
                    },
                    {
                        url: "/resume-builder/edit/achievement",
                        icon: "achievement",
                        label: "Achievement",
                        title: "achievements",
                    },
                    {
                        url: "/resume-builder/edit/references",
                        icon: "references",
                        label: "References",
                        title: "references",
                    },
                    {
                        url: "/resume-builder/edit/audio-video",
                        icon: "audio-video",
                        label: "Audio/Video",
                        title: "media",
                    },
                    {
                        url: "/resume-builder/edit/portfolio",
                        icon: "portfolio",
                        label: "Portfolio",
                        title: "portfolio",
                    },
                    {
                        url: "/resume-builder/edit/pay-availability",
                        icon: "pay-availability",
                        label: "Pay availability",
                        title: "pay_availability",
                    },
                    {
                        url: "/resume-builder/edit/structure",
                        icon: "structure",
                        label: "Structure",
                    },
                    {
                        url: "/resume-builder/edit/imports",
                        icon: "imports",
                        label: "Imports",
                    },
                    {
                        url: "/resume-builder/edit/manager",
                        icon: "manager",
                        label: "Manager"
                    },
                    {
                        url: "/resume-builder/edit/themes",
                        icon: "themes",
                        label: "Themes",
                    },
                ],
                structureTabs: [
                    'structure',
                    'imports',
                    'manager',
                    'themes',
                    'profile' // main tab | can not be hidden
                ],

                currentSidebarLink: {
                    url: "/resume-builder/edit/profile",
                    icon: "profile",
                    label: "Profile",
                },
            };
        },

        computed: {
            tabs() {
                return this.$store.state.user.tabs;
            }
        },
        methods: {
            setActive(activeLink) {
                this.open = false;
                this.currentSidebarLink = activeLink;
                this.$emit("onChange", activeLink.icon);
            },
            hoverMenu(sidebarLink) {
                if (sidebarLink !== null) {
                    this.activeHoverMenu = sidebarLink.icon;
                } else {
                    this.activeHoverMenu = null;
                }
            },
            isTabActive(tabTitle) {
                let active = false;
                this.tabs.forEach((tab) => {
                    if (tab.title === tabTitle && tab.is_public) {
                        active = true;
                    }
                });
                return active;
            },
            toggleTab(tabTitle) {
                let currentTab = {};

                this.tabs.forEach((tab) => {
                    if (tab.title === tabTitle) {
                        currentTab = tab;
                        currentTab.is_public = !currentTab.is_public;
                    }
                });

                if (currentTab.id) {
                    axios.put('/api/user/tabs/toggle-tab', currentTab)
                        .then((response) => {
                            this.$store.dispatch('flyingNotification');
                        });
                }

            }
        },

        mounted() {
            // Set the correct activeTab on refresh, and on changing the view
            const pathSplit = this.$route.path.split("/"),
                activeTab = pathSplit[pathSplit.length - 1];

            let activeLink = {};

            this.sidebarLinks.forEach((link) => {
                if (link.icon === activeTab) {
                    activeLink = link;
                }
            });

            this.setActive(activeLink);
        },
    };
</script>

<style lang="scss" scoped>
    @import "../../../../../sass/media-queries";

    .sidebar {
        margin-top: 40px;
        margin-bottom: 30px;
        padding-left: 10px;
        padding-right: 10px;

        .sidebar-container {
            position: relative;
            background: #ffffff;
            font-family: Noto Sans, "sans-serif";
            max-width: 350px;
            margin-left: auto;
            margin-right: auto;

            .sidebar-links,
            .sidebar-link-activator {
                a {
                    display: flex;
                    align-items: center;
                    font-size: 20px;
                    line-height: 20px;
                    color: #001ce2;

                    .link-icon {
                        background: #f2f3fd;
                        height: 35px;
                        width: 35px;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        border-radius: 5px;
                        margin-right: 10px;

                        svg {
                            fill: none;
                            height: 24px;
                            width: 24px;
                        }
                    }

                    &:hover {
                        text-decoration: none;
                    }
                }

                &.sidebar-link-activator {
                    height: 60px;
                    display: flex;
                    align-items: center;
                    border: 2px solid #e6e8fc;
                    border-radius: 10px;

                    .activator-preview-link {
                        flex: 1;
                        padding: 12px 15px;
                    }

                    .link-activator-caret {
                        height: 60px;
                        width: 60px;
                        display: flex;
                        align-items: center;
                        justify-content: center;

                        svg {
                            transition: all 100ms;
                        }

                        &.open svg {
                            transform: rotateX(180deg);
                        }
                    }
                }

                &.sidebar-links {
                    max-height: 0;
                    overflow: hidden;
                    position: absolute;
                    top: 67px;
                    left: 0;
                    background: white;
                    width: 100%;
                    z-index: 30;
                    border-radius: 8px 0 0 8px;
                    border: 0 solid #e6e8fc;
                    transition: all 100ms;

                    &.open {
                        max-height: 250px;
                        overflow-y: scroll;
                        opacity: 1;
                        border-width: 2px 0 2px 2px;
                    }

                    .sidebar-link {
                        padding: 3px;

                        a {
                            padding: 7.5px 15px;
                            border-radius: 10px;
                            transition: all 100ms;
                            border: 1px solid #e5e5e5;

                            &:hover {
                                background-color: #f9f9f9;
                                text-decoration: none;
                            }
                        }

                        &.active a {
                            background-color: #f9f9f9;
                        }
                    }

                    &::-webkit-scrollbar {
                        width: 8px;
                        background: #e5e5e5;
                        border-radius: 8px 0 0 8px;
                    }

                    &::-webkit-scrollbar-thumb {
                        background: #001ce2;
                        border-radius: 8px 0 0 8px;
                    }
                }
            }
        }

        @media screen and (min-width: 375px) {
            & {
                .sidebar-container {
                    padding-left: 10px;
                    padding-right: 10px;
                }
            }
        }

        @include gt-xs {
            padding-right: unset;
            padding-left: unset;
            margin-top: unset;

            .sidebar-container {
                // margin-left: unset;
                // margin-right: unset;
                padding-left: unset;
                padding-right: unset;
            }
        }

        @include gt-md {
            padding-left: unset;
            padding-right: unset;
            margin-bottom: unset;
            border-right: 1px solid rgba(0, 28, 226, 0.1);

            .sidebar-container {
                background: transparent;
                width: 300px;

                @media screen and (min-width: 1280px) and (max-width: 1520px) {
                    width: 200px;
                    margin-left: 20px !important;
                }
                @media screen and (min-width: 1520px) and (max-width: 1720px) {
                    width: 240px;
                    margin-left: 30px !important;
                }

                .sidebar-links,
                .sidebar-link-activator {
                    &.sidebar-link-activator {
                        display: none;
                    }

                    &.sidebar-links {
                        max-height: unset;
                        position: static;

                        .sidebar-link {
                            padding-left: unset;
                            padding-right: unset;

                            a {
                                color: #888db1;
                                padding-left: unset;
                                padding-right: 16px;
                                border-radius: unset;
                                border: unset;

                                &:hover {
                                    background-color: transparent;
                                    text-decoration: none;
                                    color: #001ce2;
                                }
                            }

                            &.active a {
                                position: relative;
                                background-color: transparent;
                                color: #001ce2;

                                &::after {
                                    content: "";
                                    display: block;
                                    background: #001ce2;
                                    position: absolute;
                                    right: 0;
                                    bottom: 0;
                                    height: 100%;
                                    width: 5px;
                                    border-radius: 10px 0px 0px 10px;
                                }
                            }
                        }
                    }
                }
            }
        }
    }
</style>


<style>
    .profile-ixklwxz-link-icon-active svg [stroke] {
        stroke: #001ce2;
    }
</style>

<style lang="scss">
    .profile-ixklwxz-link-icon-active {
        svg {
            g {
                fill: #001ce2 !important;
            }
        }
    }
</style>