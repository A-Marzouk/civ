<template>
<!-- Developer: Jose Quintero -->
    <v-app id="theme106" style="width: 100%">
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
                            <a href="javascript:;" v-scroll-to="'#theme106'">
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
import EducationTab from './theme106/education'
import WorkExperienceTab from './theme106/work-experience'
import PortfolioTab from './theme106/portfolio'
import AboutTab from './theme106/about'
import SkillsTab from './theme106/skills-and-languages'
import ThemeHeader from './theme106/header'

export default {
    components: {
        AboutTab,
        EducationTab,
        PortfolioTab,
        WorkExperienceTab,
        SkillsTab,
        ThemeHeader
    },
    data: () => ({
        tab: 0,
        viewTabs: [
            'portfolio',
            'work-experience',
            'education',
            'skills-and-language',
            'about-me-&-awards'
        ]
    }),
    methods: {
        formatTab(tab) {
            let tabArray = tab.split('-').map(t => t.charAt(0).toUpperCase() + t.slice(1))
            return tabArray.join(" ")
        }
    }
}
</script>


<style lang="scss">

@import '../../../sass/media-queries';
@import url('https://fonts.googleapis.com/css2?family=Muli:wght@400;700&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

$mainColor: #BE001A;
$tabTextColor: #4D2F2D;
$purple: #BE001A;

$gradient: linear-gradient(to right, #9434CD, #EE3DC6);

#theme106 {
    font-family: 'Muli', sans-serif;
    width: 100%;
    min-height: 100vh;
    color: white;
    background-color: #0E0C10;
    background-image: url("/images/resume_themes/theme106/bg-body.png");
    background-size: 119% auto;
    background-position: center -20px;
    background-repeat: repeat-y;
    position: relative;
    
    .v-application--wrap {
        overflow: hidden;
        height: 100%;
    }

    .theme-body {
        height: auto;
        background: transparent;
        border-radius: 80px 80px 0 0;
        height: 100%;
        padding-bottom: 100px;
        position: relative;

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
                overflow: 0 auto;
                width: 95%;
                margin: 0 auto;
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
                    color: white !important;
                    font-weight: normal;
                    // margin-right: 50px;

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
                        font-size: 16px;
                        padding: 12px 22px;
                    }

                    @media (max-width: 768px) {
                        padding: 12px 20px;
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
                    }
                }

                @media (max-width: 1200px) {
                    margin-top: 29px;
                    margin-bottom: 47px;
                }
                
                @media (max-width: 600px) {
                    margin: 29px 0;
                    padding: 0 17px;
                }
            }

            .container {
                padding: 0 40px;
                padding-bottom: 100px;
                max-width: 1750px;
                margin: 0 auto;
                z-index: 0;
                height: 100%;
                width: 90%;
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
        align-items: center;
        position: absolute;
        top: 365px;
        right: -115px;
        background: transparent;

        a {
            height: 14px;
            display: block;
            margin: 7px;
            color: white;
            position: relative;

            &::after {
                content: "/";
                position: absolute;
                right: -8px;
                bottom: -10px;
            }

            &:last-child {
                &::after {
                    display: none;
                }
            }
        }

        &.showOnTablet {
            display: none;
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
                background: rgba(236, 237, 244, 0.15);

                &::after {
                    position: absolute;
                    content: "";
                    right: 0;
                    height: 3px;
                    width: 17px;
                    background: white;
                }
            }

        }

        .icon {
            margin-left: 17px;
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