<template>
<!-- Developer: Jose Quintero -->
    <v-app id="theme12" style="width: 100%">
        <div class="theme-header">

            <div class="bg-header">
                <img src="/images/resume_themes/theme12/bg-header.png" alt="" class="bg-header-img" />
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
                            <img class="icon" src="/images/resume_themes/theme12/chat-icon.png"> Start a chat
                        </button>
                        <button class="action-btn">
                            <img class="icon" src="/images/resume_themes/theme12/suitcase-icon.png">Upload interviews
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
                            <img src="/images/resume_themes/theme12/hireMe-icon.png" alt="hire me icon" class="icon">
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
                            <a href="javascript:;" v-scroll-to="'#theme12'">Scroll to top</a>
                        </div>
                    </v-col>
                </v-row>
            </div>
        </div>
    </v-app>
</template>

<script>
import EducationTab from './theme12/education'
import WorkExperienceTab from './theme12/work-experience'
import PortfolioTab from './theme12/portfolio'
import AboutTab from './theme12/about'
import SkillsTab from './theme12/skills-and-languages'

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

$mainColor: #fff;
$tabTextColor: #4D2F2D;
$purple: #686299;

$gradient: linear-gradient(to right, #9434CD, #EE3DC6);

#theme12 {
    font-family: 'Muli', sans-serif;
    width: 100%;
    color: $mainColor;
    background: #1B1F28;
    position: relative;

    .theme-header {
        width: 100%;
        overflow-x: hidden;

        .bg-header {
            width: 100%;
            height: 100%;
            position: absolute;

            &-img {
                position: absolute;
                left: -30px;
                top: -100px;
                width: 140%;
            }
        }

        .left {
            display: flex;

        }

        .right {
            display: flex;
            flex-direction: column;
            align-items: flex-end;

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
                    background: #1B1F28;
                    outline: none;
                    color: white;
                    border-radius: 9px;
                    box-shadow: 7px 7px 12px rgba(0, 0, 0, .8);

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

                    small {
                        font-size: 15px;
                        font-weight: 400px;
                        color: #BEC2D4;
                    }
                }

                .hire-me-btn {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    background: $gradient;
                    box-shadow: 7px 7px 12px rgba(0, 0, 0, .8);
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
                display: inline-block;
                font-size: 26px;
                font-weight: 400;

                .name {
                    font-weight: 700;
                    font-size: 30px;
                    margin-bottom: 20px;
                }

                .profession {
                    margin-bottom: 30px;
                    color: #BEC2D4;
                }

                .speciallity {
                    display: flex;
                    padding: 0;
                    color: #BEC2D4;
                    
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
                            background: #FFFFFF;
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
        background: transparent;
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
                color: white;
                margin-top: 61px;
                margin-bottom: 61px;

                &-bar {
                    background: none;
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
                    }

                    &::before {
                        display: none !important;
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
            }

            .container {
                padding: 0 40px;
                padding-bottom: 100px;
                max-width: 1750px;
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
        position: fixed;
        bottom: 250px;
        right: -95px;
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
    }

    .scroll-top {
        position: fixed;
        left: 0;
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
    }
}
    
</style>