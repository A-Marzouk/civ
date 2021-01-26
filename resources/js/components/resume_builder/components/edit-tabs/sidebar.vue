<template>
    <aside class="sidebar">
        <div class="sidebar-container ml-sm-0 ml-1">
            <div class="sidebar-link-activator">
                <a href="#" @mouseover="openMenu" @mouseleave="closeMenu" class="activator-preview-link">
                    <img class="menu-img" :src="iconSrc" alt="menu icon" />
                </a>
            </div>
            <div class="sidebar-links" @mouseover="openMenu" @mouseleave="closeMenu" :class="{'open' :open}" v-if="tabs">
                <div
                        v-for="sidebarLink in sidebarLinks"
                        class="sidebar-link"
                        :class="{'active': activeTab === sidebarLink.title}"
                        :key="sidebarLink.title"
                >
                    <router-link
                            :to="sidebarLink.url"
                            @click.native="setActive(sidebarLink)"
                            @mouseover.native="hoverMenu(sidebarLink)"
                            @mouseleave.native="hoverMenu(null)"
                            class="d-flex justify-content-between w-100"
                            :class="{'half-opacity' : !isTabActive(sidebarLink.title)}"
                    >
                        <div class="link-icon" @click="setActive(sidebarLink)"
                             :class="[{'profile-ixklwxz-link-icon-active': activeTab === sidebarLink.title}, {'profile-ixklwxz-link-icon-active':activeHoverMenu==sidebarLink.title}]">
                            <svg-vue :icon="`edit-cv-sidebar/${sidebarLink.icon}`"></svg-vue>
                        </div>
                        <span style="flex:2;" @click="setActive(sidebarLink)">
                            {{ sidebarLink.label }}
                        </span>
                    </router-link>

                    <hr v-if="sidebarLink.title === 'references'"
                        style="margin-right: 20px; margin-top: 20px; margin-bottom: 15px;">
                </div>
            </div>
            <div class="arrow-icon" v-if="currentSidebarLink.title !== 'imports' ">
                <img src="/images/new_resume_builder/arrow_down.svg" alt="arrow icon">
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
                iconSrc: '/icons/edit-cv-sidebar/main-menu-grey.svg',
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
                        url: "/resume-builder/edit/skills",
                        icon: "skills",
                        label: "Skills",
                        title: "skills",
                    },
                    {
                        url: "/resume-builder/edit/pay-availability",
                        icon: "pay-availability",
                        label: "Pay availability",
                        title: "pay_availability",
                    },
                    {
                        url: "/resume-builder/edit/work-experience",
                        icon: "work-experience",
                        label: "Work experience",
                        title: "work_experience",
                    },
                    {
                        url: "/resume-builder/edit/portfolio",
                        icon: "portfolio",
                        label: "Portfolio/Projects",
                        title: "portfolio",
                    },
                    {
                        url: "/resume-builder/edit/education",
                        icon: "education",
                        label: "Education",
                        title: "education",
                    },
                    {
                        url: "/resume-builder/edit/achievements",
                        icon: "achievement",
                        label: "Achievements",
                        title: "achievements",
                    },

                    {
                        url: "/resume-builder/edit/hobbies",
                        icon: "hobbies",
                        label: "Hobbies",
                        title: "hobbies",
                    },
                    {
                        url: "/resume-builder/edit/media",
                        icon: "audio-video",
                        label: "Audio/Video",
                        title: "media",
                    },
                    {
                        url: "/resume-builder/edit/references",
                        icon: "references",
                        label: "References",
                        title: "references",
                    },


                    {
                        url: "/resume-builder/edit/themes",
                        icon: "themes",
                        label: "Themes",
                        title: "themes",
                    },
                    {
                        url: "/resume-builder/edit/manager",
                        icon: "manager",
                        label: "Manager",
                        title: "manager"
                    },
                    {
                        url: "/resume-builder/edit/structure",
                        icon: "structure",
                        label: "Structure",
                        title: "structure",
                    },
                    {
                        url: "/resume-builder/edit/imports",
                        icon: "imports",
                        label: "Imports",
                        title: "imports",
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
                    title: "profile"
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
                this.$emit("onChange", activeLink.title);
            },
            openMenu(){
                this.open = true;
                this.iconSrc = '/icons/edit-cv-sidebar/main-menu.svg' ;

            },
            closeMenu(){
                this.open = false;
                this.iconSrc = '/icons/edit-cv-sidebar/main-menu-grey.svg' ;
            },
            hoverMenu(sidebarLink) {
                if (sidebarLink !== null) {
                    this.activeHoverMenu = sidebarLink.title;
                } else {
                    this.activeHoverMenu = null;
                }
            },
            isTabActive(tabTitle) {
                let active = false;
                this.tabs.forEach((tab) => {
                    if ((tab.title === tabTitle && tab.is_public) || this.structureTabs.includes(tabTitle)) {
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

        watch:{
          activeTab: function (val) {
              let link = this.sidebarLinks.find( (link) => {return link.title === val} );
              if(this.$router.currentRoute.fullPath !== link.url){
                  this.$router.push(link.url);
              }
          }
        },
        mounted() {
            // Set the correct activeTab on refresh, and on changing the view
            const pathSplit = this.$route.path.split("/"),
                activeTab = pathSplit[pathSplit.length - 1];

            let activeLink = {};

            this.sidebarLinks.forEach((link) => {
                if (link.title === activeTab.replace('-', '_')) {
                    activeLink = link;
                }
                if(activeTab === 'about'){
                    activeLink = {
                        url: "/resume-builder/edit/about",
                        icon: "about",
                        label: "About",
                        title: "about_me",
                    };
                }

            });

            this.setActive(activeLink);
        },
    };
</script>

<style lang="scss" scoped>
    @import "../../../../../sass/media-queries";

    .sidebar {

        .sidebar-container {
            position: relative;

            background: #ffffff;
            font-family: Noto Sans, "sans-serif";
            margin-left: auto;
            margin-right: auto;

            .arrow-icon{
                display: none;
            }
            .sidebar-links,
            .sidebar-link-activator {
                a {
                    display: flex;
                    align-items: center;
                    font-size: 20px;
                    line-height: 20px;
                    color: #001ce2;

                    .link-icon {
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
                    display: flex;
                    align-items: center;
                    border-radius: 10px;
                    padding-left: 10px;

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
                    height: 0;
                    overflow: hidden;
                    position: absolute;
                    top: 74px;
                    left: -10px;
                    padding-left: 10px;
                    width: 100%;
                    z-index: 30;
                    min-width: 320px;
                    background: #FFFFFF;
                    box-shadow: 0px 0px 50px rgba(0, 19, 156, 0.05);
                    border-radius: 0px 0px 10px 0px;
                    transition: all 400ms;
                    &.open {
                        height: calc(100vh - 180px);
                        overflow-y: scroll;
                        opacity: 1;
                    }

                    .sidebar-link {
                        padding-bottom: 4px;

                        a {
                            padding: 7.5px 15px;
                            transition: all 100ms;
                            color: #888DB1;

                            &:hover {
                                background-color: #f9f9f9;
                                color: #001ce2;
                                text-decoration: none;
                            }
                        }

                        &.active a {
                            color: #001ce2;
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

            top:62px;
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
                padding-left: unset;
                padding-right: unset;
            }
        }
    }

    .menu-img{
        width: 35px;
        margin-right: 50px;
        @media screen and (max-width: 550px) {
            margin-right: 20px;
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