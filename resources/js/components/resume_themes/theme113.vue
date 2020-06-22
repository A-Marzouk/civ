<template>
<!-- Developer: Jose Quintero -->
    <v-app id="theme113" style="width: 100%">
        
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
                        <footer class="theme-footer">
                            <a href="javascript:;">
                                <font-awesome-icon :icon="['fab', 'facebook-f']"></font-awesome-icon>
                            </a>
                            <a href="javascript:;">
                                <font-awesome-icon :icon="['fab', 'linkedin']"></font-awesome-icon>
                            </a>
                            <a href="javascript:;">
                                <font-awesome-icon :icon="['fab', 'behance']"></font-awesome-icon>
                            </a>
                            <a href="javascript:;">
                                <font-awesome-icon :icon="['fab', 'dribbble']"></font-awesome-icon>
                            </a>
                            <a href="javascript:;">
                                <font-awesome-icon :icon="['fab', 'twitter']"></font-awesome-icon>
                            </a>
                        </footer>
                    </v-col>
                </v-row>
            </div>
        </div>
    </v-app>
</template>

<script>
import EducationTab from './theme113/education'
import WorkExperienceTab from './theme113/work-experience'
import PortfolioTab from './theme113/portfolio'
import AboutTab from './theme113/about'
import SkillsTab from './theme113/skills-and-languages'
import ThemeHeader from './theme113/header'

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
$purple: #686299;

#theme113 {
    font-family: 'Muli', sans-serif;
    width: 100%;
    min-height: 100vh;
    color: $mainColor;
    background: #FFF7F3;
    position: relative;

    .v-application--wrap {
        overflow: hidden;
        height: 100%;
    }

    .theme-body {
        background: white;
        border-radius: 100px 100px 0 0;
        border-top: 16px solid $purple;
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
                color: $tabTextColor;
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
                    // margin-right: 50px;

                    &--active {
                        color: white !important;
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
                        padding: 0;
                    }

                    @media (max-width: 768px) {
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
                        background: $purple;
                        border-radius: 25px;
                    }
                }

                @media (max-width: 1200px) {
                    margin-top: 29px;
                    margin-bottom: 47px;

                    &-bar {
                        height: 28px;
                    }

                    .v-tabs-slider {
                        border-radius: 14px;
                    }
                }
                
                @media (max-width: 700px) {
                    margin: 29px 0;
                    padding: 0 17px;

                    &-bar {
                        height: 36px;
                    }

                    .v-tabs-slider {
                        border-radius: 22px;
                    }

                    .v-item-group {
                        padding: 0 30px 0 50px;
                    }
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

                @media (max-width: 876px) {
                    width: 100%;
                }

                @media (max-width: 700px) {
                    padding: 0 17px;
                    padding-bottom: 30px;
                    width: 100%;
                }
            }
        }
    }

    .theme-footer {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100vw;
        height: 63px;
        position: fixed;
        bottom: 0;
        left: 0;
        box-shadow: 0 -10px 25px rgba(0, 0, 0, 0.16);
        background: white;

        a {
            height: 14px;
            display: block;
            margin: 0 17.2px;

            &:hover {
                svg {
                    path, circle {
                        fill: #686299;
                    }
                }
            }

            svg {
                height: 100%;
                
                path, circle {
                    fill: #28404A;
                }
            }
        }

        @media (max-width: 700px) {
            display: none;
        }
    }
}
    
</style>