<template>
<!-- Developer: Jose Quintero -->
    <v-app id="theme112" style="width: 100%">
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
                            <a href="javascript:;" v-scroll-to="'#theme112'">Scroll to top</a>
                        </div>
                    </v-col>
                </v-row>
            </div>
        </div>
    </v-app>
</template>

<script>
import EducationTab from './theme112/education'
import WorkExperienceTab from './theme112/work-experience'
import PortfolioTab from './theme112/portfolio'
import AboutTab from './theme112/about'
import SkillsTab from './theme112/skills-and-languages'
import ThemeHeader from './theme112/header'

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

$mainColor: #fff;
$tabTextColor: #4D2F2D;
$purple: #686299;

$gradient: linear-gradient(to right, #9434CD, #EE3DC6);

#theme112 {
    font-family: 'Muli', sans-serif;
    width: 100%;
    min-height: 100vh;
    color: $mainColor;
    background: #1B1F28;
    position: relative;

    .v-application--wrap {
        overflow: hidden;
        height: 100%;
    }

    .theme-body {
        background: transparent;
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
                color: white;
                padding: 0 40px;
                width: 100%;
                margin-top: 61px;
                margin-bottom: 61px;
                overflow: 0 auto;
                width: 95%;

                &-bar {
                    background-color: transparent !important;
                }

                .v-slide-group__prev {
                    display: none;
                }
                
                .v-tab {
                    padding: 12px 40px;
                    text-transform: none;
                    font-size: 20px;
                    color: white !important;
                    // margin-right: 50px;

                    &--active {
                        color: white !important;
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
                        font-size: 15px;
                        justify-content: flex-start;
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
                        background: $gradient;
                        border-radius: 25px;
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

        &.showOnTablet {
            display: none;
        }

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
            color: white;

            &::after {
                position: absolute;
                content: "";
                left: -89px;
                height: 3px;
                width: 63px;
                background: #B6B6B7;
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
    }

    .hideOnMobile {
        @media (max-width: 600px) {
            display: none !important;
        }
    }
}
    
</style>