<template>
<!-- Developer: Jose Quintero -->
    <v-app id="theme110" style="width: 100%">
        <div class="theme-header">

            <!-- <div class="bg-header">
                <img src="/images/resume_themes/theme110/bg-header-bottom-right.svg" alt="" class="bg-header-bottom-right" />
            </div> -->

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
                            <img class="icon" src="/images/resume_themes/theme110/chat-icon.png"> Start a chat
                        </button>
                        <button class="action-btn">
                            <img class="icon" src="/images/resume_themes/theme110/suitcase-icon.png">Upload interviews
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
                            <img src="/images/resume_themes/theme110/hireMe-icon.png" alt="hire me icon" class="icon">
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
import EducationTab from './theme110/education'
import WorkExperienceTab from './theme110/work-experience'
import PortfolioTab from './theme110/portfolio'
import AboutTab from './theme110/about'
import SkillsTab from './theme110/skills-and-languages'

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

$mainColor: #492163;
$tabTextColor: #4D2F2D;
$purple: #686299;

$gradient: linear-gradient(to right, #9434CD, #EE3DC6);

#theme110 {
    font-family: 'Muli', sans-serif;
    width: 100%;
    color: $mainColor;
    background-color: #ECEDF4;
    background-image: url('/images/resume_themes/theme110/bg-img.png');
    background-size: 109% auto;
    background-position: center -70px;
    background-repeat: no-repeat;
    position: relative;
    overflow-x: hidden;

    .theme-header {
        width: 100%;
        position: relative;

        .bg-header {
            width: 100%;
            height: 100%;
            position: absolute;

            &-bottom-right {
                position: absolute;
                right: 0;
                opacity: 1;
                bottom: -100px;
            }
        }

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
                    color: $mainColor;
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

                    small {
                        font-size: 15px;
                        font-weight: 400px;
                        color: $mainColor;
                    }
                }

                .hire-me-btn {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    background: $mainColor;
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
                }

                .profession {
                    margin-bottom: 30px;
                    color: $mainColor;
                }

                .speciallity {
                    display: flex;
                    padding: 0;
                    color: $mainColor;
                    
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
                    color: #A88EB9 !important;

                    &--active {
                        color: $mainColor !important;
                        font-weight: 700;
                        background: none;
                    }

                    &::before {
                        display: none !important;
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
    }
}
    
</style>