<template>
<!-- Developer: Jose Quintero -->
    <v-app id="theme103" style="width: 100%">
        <div class="theme-header">

            <div class="bg-header">
            </div>

            <div class="user-info">
                <div class="left">
                    <div class="user-img">
                        <img src="/images/resume_builder/default-user.jpg" alt="">
                    </div>

                    <div class="user-data">
                        <div class="name">José Daniel Quintero</div>
                        <div class="profession">Fullstack Developer</div>
                        <ul class="speciallity">
                            <li class="item">Node js</li>
                            <li class="item">React js</li>
                            <li class="item">Laravel</li>
                        </ul>
                    </div>
                </div>

                <div class="right">
                    <div class="actions-wrapper">
                        <button class="action-btn">
                            <img class="icon" src="/images/resume_themes/theme103/chat-icon.png"> Start a chat
                        </button>
                        <button class="action-btn">
                            <img class="icon" src="/images/resume_themes/theme103/suitcase-icon.png">Upload interviews
                        </button>
                    </div>

                    <div class="payment-data">
                        <div class="hourly-rate">
                            $15
                            <small>Hourly rate</small>
                        </div>
                        <div class="hourly-availability">
                            40Hrs
                            <small>Weekly Availability</small>
                        </div>

                        <button class="hire-me-btn">
                            <img src="/images/resume_themes/theme103/hireMe-icon.png" alt="hire me icon" class="icon">
                            Hire Me
                        </button>
                    </div>
                </div>
            </div>
        </div>

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
                        <div class="theme-aside">
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
                        <div class="scroll-top">
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
import EducationTab from './theme103/education'
import WorkExperienceTab from './theme103/work-experience'
import PortfolioTab from './theme103/portfolio'
import AboutTab from './theme103/about'
import SkillsTab from './theme103/skills-and-languages'

export default {
    components: {
        AboutTab,
        EducationTab,
        PortfolioTab,
        WorkExperienceTab,
        SkillsTab
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

$mainColor: #2E77D1;
$tabTextColor: #4D2F2D;
$purple: #0556B6;

#theme103 {
    font-family: 'Muli', sans-serif;
    width: 100%;
    color: $mainColor;
    background: #FFF7F3;
    position: relative;

    .theme-header {
        width: 100%;
        position: relative;
        background-image: url("/images/resume_themes/theme103/bg-header.png");

        .left {
            display: flex;

        }

        .right {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            justify-content: center;

            .actions-wrapper {
                display: flex;
                justify-content: center;
                align-items: center;

                .action-btn {
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    padding: 22px 36px;
                    font-size: 18px;
                    font-weight: 400;
                    background: #fff;
                    outline: none;
                    border-radius: 9px;

                    &:first-child {
                        margin-right: 26px;
                    }

                    .icon {
                        margin-right: 10px;
                    }
                }
            }

            .payment-data {
                display: flex;
                justify-content: center;
                align-items: flex-end;
                margin-top: 46px;

                .hourly-rate,
                .hourly-availability {
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    font-size: 26px;
                    font-weight: 700;
                    margin-right: 35px;
                    color: $purple;

                    small {
                        font-size: 15px;
                        font-weight: normal;
                        color: $mainColor;
                    }
                }

                .hire-me-btn {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    background: $purple;
                    padding: 23px 62px;
                    font-size: 18px;
                    font-weight: 700;
                    color: white;
                    border-radius: 9px;

                    .icon {
                        margin-right: 10px;
                    }
                }
            }
        }

        .user-info {
            display: flex;
            justify-content: space-between;
            padding: 56px 80px;
            z-index: 1;
            position: relative;

            .user-img {
                display: inline-block;
                width: 232px;
                height: 232px;
                margin-right: 55px;

                img {
                    width: 100%;
                    border-radius: 50%;
                }
            }

            .user-data {
                display: flex;
                justify-content: center;
                flex-direction: column;
                font-size: 26px;
                font-weight: 400;

                .name {
                    font-weight: 700;
                    font-size: 30px;
                    margin-bottom: 20px;
                    color: $purple;
                }

                .profession {
                    margin-bottom: 30px;
                }

                .speciallity {
                    display: flex;
                    padding: 0;
                    
                    .item {
                        margin-right: 40px;
                        position: relative;

                        &:last-child {
                            margin-right: 0;

                            &::after {
                                display: none;
                            }
                        }

                        &::after {
                            content: "";
                            position: absolute;
                            width: 7px;
                            height: 7px;
                            background: $mainColor;
                            border-radius: 50%;
                            right: -20px;
                            top: calc(50% - 3.5px);
                        }
                    }
                }
            }
        }
    }

    .theme-body {
        height: auto;
        background: white;
        border-radius: 80px 80px 0 0;
        z-index: 1;
        position: relative;

        .wrapper {
            display: flex;
            flex-direction: column;
            justify-content: center;
            max-width: 1700px;
            margin: 0 auto;

            .v-tabs {
                font-family: 'Muli', sans-serif;
                color: $tabTextColor;
                margin-top: 61px;
                margin-bottom: 61px;
                
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
                }

                &-slider-wrapper {
                    height: 100% !important;
                    z-index: -1;

                    .v-tabs-slider {
                        background: $purple;
                        border-radius: 25px;
                    }
                }
            }

            .container {
                padding: 0 40px;
                padding-bottom: 100px;
                max-width: 1550px;
                margin: 0 auto;
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
        top: 400px;
        right: -95px;
        background: transparent;

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
    }

    .scroll-top {
        position: absolute;
        left: 45px;
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
                background: #D3D6E4;

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
    }
}
    
</style>