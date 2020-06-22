<template>
<!-- Developer: Jose Quintero -->
    <v-app id="theme104" style="width: 100%">
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
                            <a href="javascript:;">
                                Dribble
                            </a>
                            <a href="javascript:;">
                                LinkedIn
                            </a>
                            <a href="javascript:;">
                                Instagram
                            </a>
                            <a href="javascript:;">
                                Behance
                            </a>
                        </div>
                        <div class="theme-aside showOnTablet hideOnMobile">
                            Social links
                            <span></span>
                            <a href="javascript:;">
                                <font-awesome-icon :icon="['fab', 'behance']"></font-awesome-icon>
                            </a>
                            <a href="javascript:;">
                                <font-awesome-icon :icon="['fab', 'facebook']"></font-awesome-icon>
                            </a>
                            <a href="javascript:;">
                                <font-awesome-icon :icon="['fab', 'instagram']"></font-awesome-icon>
                            </a>
                            <a href="javascript:;">
                                <font-awesome-icon :icon="['fab', 'linkedin']"></font-awesome-icon>
                            </a>
                        </div>
                        <div class="scroll-top hideOnMobile">
                            <a href="javascript:;" v-scroll-to="'#theme104'">
                                Scroll
                                <font-awesome-icon class="icon" :icon="['fas', 'arrow-right']"></font-awesome-icon> 
                            </a>
                        </div>
                    </v-col>
                </v-row>
            </div>
        </div>
    </v-app>
</template>

<script>
import EducationTab from './theme104/education'
import WorkExperienceTab from './theme104/work-experience'
import PortfolioTab from './theme104/portfolio'
import AboutTab from './theme104/about'
import ThemeHeader from './theme104/header'
import SkillsTab from './theme104/skills-and-languages'

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

$mainColor: #172C7A;
$tabTextColor: #4D2F2D;
$purple: #FB423A;

#theme104 {
    font-family: 'Muli', sans-serif;
    width: 100%;
    min-height: 100vh;
    color: $mainColor;
    background: white;
    position: relative;

    .v-application--wrap {
        overflow: hidden;
        height: 100%;
    }    

    .theme-body {
        background: white;
        border-radius: 80px 80px 0 0;
        position: relative;
        width: 100%;
        height: 100%;
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
                color: $mainColor;
                padding: 0 40px;
                width: 100%;
                margin-top: 61px;
                margin-bottom: 61px;
                overflow: 0 auto;
                width: 95%;

                .v-slide-group__prev {
                    display: none;
                }
                
                .v-tab {
                    padding: 12px 40px;
                    text-transform: none;
                    font-size: 20px;
                    color: $mainColor;
                    // margin-right: 50px;

                    &--active {
                        color: white;
                        font-weight: 700;
                    }

                    &::before {
                        display: none !important;
                    }

                    @media (max-width: 1400px) {
                        font-size: 18px;
                        padding: 12px 28px;
                    }
                    
                    @media (max-width: 1200px) {
                        font-size: 11px;
                        padding: 12px 22px;
                    }

                    @media (max-width: 756px) {
                        font-size: 15px;
                        padding: 13px 17px;
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
                        background: $purple;
                        border-radius: 25px;
                    }
                }

                @media (max-width: 1200px) {
                    margin-top: 29px;
                    margin-bottom: 47px;
                }
                
                @media (max-width: 700px) {
                    margin: 29px 0;
                    padding: 0 17px;

                    
                }
            }

            .container {
                padding: 0 40px;
                padding-bottom: 100px;
                max-width: 1550px;
                width: 90%;
                margin: 0 auto;
                z-index: 0;
                height: 100%;
                align-items: flex-start;

                @media (max-width: 700px) {
                    padding: 0;
                    padding-bottom: 30px;
                    width: 85%;
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
        right: -120px;
        background: transparent;

        &.showOnTablet {
            display: none;
        }

        a {
            height: 14px;
            display: block;
            margin: 7px;
            color: $mainColor;
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
            font-size: 20px;
            font-weight: 700;

        }

        .icon {
            margin-left: 17px;
        }

        @media (max-width: 1200px) {
            a {
                font-size: 14px;
            }

            .icon {
                margin-left: 9px;
            }
        }
    }

    .hideOnMobile {
        @media (max-width: 876px) {
            display: none !important;
        }
    }
}
    
</style>