<template>
<!-- Developer: Jose Quintero -->
    <v-app id="theme107" style="width: 100%">
        <ThemeHeader></ThemeHeader>

        <div class="theme-body">
            <img src="/images/resume_themes/theme107/bg-decoImg.png" class="bg-decoImg img1" />
            <img src="/images/resume_themes/theme107/bg-decoImg.png" class="bg-decoImg img2" />
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
                            <a href="javascript:;" v-scroll-to="'#theme107'">
                                Scroll
                                <font-awesome-icon size="2x" class="icon" :icon="['fas', 'arrow-right']"></font-awesome-icon> 
                            </a>
                        </div>
                    </v-col>
                </v-row>
            </div>
        </div>
    </v-app>
</template>

<script>
import EducationTab from './theme107/education'
import WorkExperienceTab from './theme107/work-experience'
import PortfolioTab from './theme107/portfolio'
import AboutTab from './theme107/about'
import SkillsTab from './theme107/skills-and-languages'
import ThemeHeader from './theme107/header'

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

$mainColor: #28404A;
$tabTextColor: #4D2F2D;
$purple: #335E5E;

#theme107 {
    font-family: 'Muli', sans-serif;
    width: 100%;
    min-height: 100vh;
    color: $mainColor;
    position: relative;
    background-color: #DBDEC4;
    background-image: url("/images/resume_themes/theme107/bg-header.png");
    background-repeat: repeat-y;
    
    .v-application--wrap {
        overflow: hidden;
        height: 100%;
        min-height: 100vh !important;
        display: flex;
        flex-direction: column;
    }

    .theme-body {
        height: auto;
        background: white;
        border-radius: 100px 100px 0 0;
        border-top: 16px solid $purple;
        position: relative;
        flex: 1;
        width: 100%;
        height: 100%;
        padding-bottom: 100px;

        .bg-decoImg {
            position: absolute;
            
            @media (max-width: 1200px) {
                width: 349px;
            }
            
            @media (max-width: 600px) {
                display: none;
            }

            &.img1 {
                right: -316.5px;
                top: 160px;

                @media (max-width: 1200px) {
                    right: calc(-349px/2);
                }
            }

            &.img2 {
                left: -340px;
                bottom: -300px;
                
                @media (max-width: 1200px) {
                    left: calc(-349px/2);
                    bottom: calc(-349px/2);
                }
            }
        }

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
                overflow: 0 auto;
                width: 95%;
                margin: 0 auto;
                padding: 0 40px;
                width: 100%;
                margin-top: 61px;
                margin-bottom: 61px;

                .v-slide-group__prev {
                    display: none;
                }
                
                .v-tab {
                    padding: 12px 40px;
                    text-transform: none;
                    font-size: 20px;
                    color: #000000;
                    // margin-right: 50px;

                    &--active {
                        color: $mainColor !important;
                        font-weight: 700;
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
                        border-radius: 8px;
                        border: 2px solid #DBDFC3;
                    }
                }

                @media (max-width: 1200px) {
                    margin-top: 29px;
                    margin-bottom: 47px;
                }
                
                @media (max-width: 768px) {
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

                @media (max-width: 768px) {
                    padding: 0 17px;
                    padding-bottom: 30px;
                }

                @media (max-width: 600px) {
                    width: 100%;
                }
            }
        }

        @media (max-width: 600px) {
            border-radius: 38px 38px 0 0;
            border-top: 10px solid $purple;
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
            font-size: 20px;
            font-weight: 700;

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
                margin-left: 9px;
            }
        }
    }

    .hideOnMobile {
        @media (max-width: 600px) {
            display: none !important;
        }
    }
}
    
</style>