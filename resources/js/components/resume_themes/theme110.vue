<template>
<!-- Developer: Jose Quintero -->
    <v-app id="theme110" style="width: 100%">
        <ThemeHeader></ThemeHeader>

        <div class="theme-body">
            <div class="wrapper">

                <v-row
                    justify="space-around"
                >
                    <v-col lg="12">
                        <v-tabs
                            v-model="tab"
                            centered
                            :center="true"
                        >
                            <v-tabs-slider></v-tabs-slider>
                            <v-tab
                                v-for="(tabItem) in viewTabs"
                                :key="tabItem"
                                :ripple="false"
                            >
                                {{ formatTab(tabItem) }}
                            </v-tab>
                        </v-tabs>
                        <transition>
                            <EducationTab v-if="viewTabs[tab] === 'education'" />
                            <PortfolioTab v-else-if="viewTabs[tab] === 'portfolio'" />
                            <WorkExperienceTab v-else-if="viewTabs[tab] === 'work-experience'" />
                            <AboutTab v-else-if="viewTabs[tab] === 'about-me-&-awards'" />
                            <SkillsTab v-else />
                        </transition>
                        <div class="theme-aside hideOnTablet">
                            Follow me - 
                            <a :href="link.link" target="_blank" v-for="(link, i) in currentUser.links.filter(l => l.category === 'social' && l.is_active)" :key="link.link_title + i">
                                {{ link.link_title }}
                            </a>
                        </div>

                        <div class="theme-aside showOnTablet hideOnMobile">
                            Social links
                            <span></span>
                            <a :href="link.link" target="_blank" v-for="(link, i) in currentUser.links.filter(l => l.category === 'social' && l.is_active)" :key="link.link_title + '-' + i">
                                <font-awesome-icon :icon="['fab', link.link_title.toLowerCase()]"></font-awesome-icon>
                            </a>
                        </div>

                        <div class="scroll-top hideOnMobile">
                            <a href="javascript:;" v-scroll-to="'#theme110'">
                                <span class="decorator"></span>    
                                Scroll to top
                            </a>
                        </div>
                    </v-col>
                </v-row>
            </div>
        </div>
    </v-app>
</template>

<script>
import EducationTab from './theme110/education'
import WorkExperienceTab from './theme110/work-experience'
import PortfolioTab from './theme110/portfolio'
import AboutTab from './theme110/about'
import SkillsTab from './theme110/skills-and-languages'
import ThemeHeader from './theme110/header'

export default {
    components: {
        AboutTab,
        EducationTab,
        PortfolioTab,
        WorkExperienceTab,
        SkillsTab,
        ThemeHeader
    },
    data: (vm) => ({
        tab: 0,
        viewTabs: [
            'portfolio',
            'work-experience',
            'education',
            'skills-and-language',
            'about-me-&-awards'
        ],
        currentUser: vm.user
    }),
    methods: {
        formatTab(tab) {
            let tabArray = tab.split('-').map(t => t.charAt(0).toUpperCase() + t.slice(1))
            return tabArray.join(" ")
        },
        /**
         * @description
         * Set the currentUser from dummyUser in the store state
         */
        setDummyUser() {
            this.currentUser = this.$store.state.dummyUser;
        }
    },
    mounted () {
        // if there is no user or the preview is true, set dummy user
        if (!this.currentUser || this.is_preview) {
            this.setDummyUser();
        }

        // let user accessible in included components.
        this.$store.dispatch("updateThemeUser", this.currentUser);
    }
}
</script>


<style lang="scss">

@import '../../../sass/media-queries';
@import url('https://fonts.googleapis.com/css2?family=Muli:wght@400;700&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

$mainColor: #492163;
$tabTextColor: #4D2F2D;
$purple: #686299;

$gradient: linear-gradient(to right, #9434CD, #EE3DC6);

#theme110 {
    font-family: 'Muli', sans-serif;
    width: 100%;
    min-height: 100vh;
    color: $mainColor;
    background-color: #ECEDF4;
    background-image: url('/images/resume_themes/theme110/bg-img.png');
    background-size: 111% auto;
    background-position: center -70px;
    background-repeat: no-repeat;
    position: relative;

    .v-application--wrap {
        overflow: hidden;
        height: 100%;
        min-height: 100vh !important;
        display: flex;
        flex-direction: column;
        justify-content: stretch;
    }

    .theme-body {
        height: 100%;
        background: white;
        border-radius: 80px 80px 0 0;
        flex: 1;
        position: relative;
        width: 100%;
        padding-bottom: 100px;

        .wrapper {
            display: flex;
            flex-direction: column;
            justify-content: center;
            max-width: 1700px;
            margin: 0 auto;
            height: 100%;

            .v-tabs {
                font-family: 'Muli', sans-serif;
                color: white;
                padding: 0 40px;
                width: 100%;
                margin-top: 61px;
                margin-bottom: 61px;

                &-bar {
                    background: none;
                }

                .v-slide-group__prev {
                    display: none;
                }
                
                .v-tab {
                    padding: 12px 40px;
                    text-transform: none;
                    font-size: 20px;
                    color: #A88EB9 !important;

                    &--active {
                        color: $mainColor !important;
                        font-weight: 700;
                        background: none;
                    }

                    &::before {
                        display: none !important;
                    }

                    @media (max-width: 1400px) {
                        font-size: 18px;
                        padding: 12px 34px;
                    }
                    
                    @media (max-width: 1200px) {
                        padding: 12px 22px;
                    }

                    @media (max-width: 600px) {
                        font-size: 15px;
                        margin-right: 27px;

                        &:last-child {
                            margin-right: 0;
                        }
                    }
                }

                &-slider-wrapper {
                    height: 100% !important;
                    z-index: -1;

                    .v-tabs-slider {
                        background: transparent;
                        border-radius: 25px;
                        position: relative;

                        &::after {
                            position: absolute;
                            content: "";
                            left: 35px;
                            top: 5px;
                            transform: rotateZ(-45deg);
                            height: 50px;
                            width: 25px;
                            border-radius: 50px 0 0 50px;
                            background: rgba(73, 33, 99, 0.1);
                        }
                    }
                }

                @media (max-width: 1200px) {
                    margin-top: 29px;
                    margin-bottom: 47px;

                    &-bar {
                        height: 28px;
                    }

                    .v-tabs-slider::after {
                        left: 15px;
                        height: 24px;
                        width: 12px;
                    }
                }
                
                @media (max-width: 768px) {
                    margin: 29px 0;
                    padding: 0 17px;

                    &-bar {
                        height: 36px;
                    }

                    .v-tabs-slider::after {
                        left: 10px;
                        height: 30px;
                        width: 15px;
                    }

                    
                }
            }

            .container {
                padding: 0 40px;
                padding-bottom: 100px;
                max-width: 1550px;
                margin: 0 auto;
                width: 90%;
                z-index: 0;
                height: 100%;
                align-items: flex-start;

                @media (max-width: 768px) {
                    padding: 0 17px;
                    padding-bottom: 30px;
                }

                @media (max-width: 600px) {
                    width: 100%;
                }
            }
        }
    }

    .theme-aside {
        display: flex;
        justify-content: center;
        height: 20px;
        z-index: 5;
        transform: rotateZ(-90deg);
	    transform-origin: right;
        align-items: center;
        position: absolute;
        top: 300px;
        right: 45px;
        background: transparent;

        &.showOnTablet {
            display: none;
        }

        a {
            height: 14px;
            display: flex;
	        align-items: center;
            margin: 0 7px;
            color: $mainColor;
            position: relative;

            &::after {
                content: "/";
                position: absolute;
                right: -8px;
                bottom: -6px;
            }

            &:last-child {
                &::after {
                    display: none;
                }
            }
        }

        @media (max-width: 1200px) {
            right: -100px;
            top: 272px;
            transform: rotateZ(90deg);
            
            &, a {
                font-size: 14px;
            }

            a {
                &::after {
                    display: none;
                }
            }

            &.hideOnTablet {
                display: none;
            }

            &.showOnTablet {
                display: flex;
                justify-content: center;
                align-items: center;

                span {
                    display: block;
                    width: 62px;
                    height: 1px;
                    background: #BEC2D4;
                    margin: 0 15px 0 27px;
                }
            }
        }

        @media (max-width: 768px) {
            right: -115px;
        }
    }

    .scroll-top {
        position: absolute;
        left: -10px;
        bottom: 250px;
        transform: rotateZ(-90deg);

        a {
            position: relative;
            display: flex;
            align-items: center;
            color: $mainColor;

            .decorator {
                width: 80px;
                height: 3px;
                left: -16.5px;
                position: relative;
                background: rgba(73, 33, 99, 0.1);

                &::after {
                    position: absolute;
                    content: "";
                    right: 0;
                    height: 3px;
                    width: 17px;
                    background: $mainColor;
                }
            }

        }

        @media (max-width: 1200px) {
            a {
                font-size: 14px;
            }

            .icon {
                height: 7px;
                margin-left: 9px;
            }
        }

        @media (max-width: 768px) {
            left: -50px;
        }
    }

    .hideOnMobile {
        @media (max-width: 600px) {
            display: none !important;
        }
    }
}
    
</style>