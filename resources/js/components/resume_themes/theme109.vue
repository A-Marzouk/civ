<template>
<!-- Developer: Jose Quintero -->
    <v-app id="theme109" style="width: 100%">
        <div class="theme-header">
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
                            <img class="icon" src="/images/resume_themes/theme109/chat-icon.png"> Start a chat
                        </button>
                        <button class="action-btn">
                            <img class="icon" src="/images/resume_themes/theme109/suitcase-icon.png">Upload interviews
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
                            <img src="/images/resume_themes/theme109/hireMe-icon.png" alt="hire me icon" class="icon">
                            Hire Me
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="theme-body">
            <div class="bg-body"></div>

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
                                <span v-if="tabItem === 'work-experience'">Where I've worked</span>
                                <span v-else-if="tabItem === 'education'">Where I've learned</span>
                                <span v-else-if="tabItem === 'skills-and-language'">What I Bring To The Table</span>
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
                            <a href="javascript:;" v-scroll-to="'#theme109'">Scroll to top</a>
                        </div>
                    </v-col>
                </v-row>
            </div>
        </div>
    </v-app>
</template>

<script>
import EducationTab from './theme109/education'
import WorkExperienceTab from './theme109/work-experience'
import PortfolioTab from './theme109/portfolio'
import AboutTab from './theme109/about'
import SkillsTab from './theme109/skills-and-languages'

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

$mainColor: #24325D;
$tabTextColor: #BEC2D4;
$purple: #24325D;

#theme109 {
    font-family: 'Muli', sans-serif;
    width: 100%;
    color: $mainColor;
    background-color: #F8CDCC;
    background-image: url('/images/resume_themes/theme109/bg-header.png');
    background-position: top center;
    position: relative;

    .theme-header {
        width: 100%;
        position: relative;

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
                    background: transparent;
                    border: 3px solid $mainColor;
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

                    small {
                        font-size: 15px;
                        font-weight: 400px;
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
                    border: 7px solid #24325D;
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
                            background: #28404A;
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
        background-color: $mainColor;
        border-radius: 80px 80px 0 0;
        z-index: 1;
        position: relative;

        .bg-body {
            position: absolute;
            z-index: -1;
            width: 100%;
            height: 100%;
            background-image: url("/images/resume_themes/theme109/bg-body.png");
            background-repeat: repeat;
            opacity: 0.02;
        }

        .wrapper {
            display: flex;
            flex-direction: column;
            justify-content: center;
            max-width: 1700px;
            margin: 0 auto;
            
            .v-slide-group__wrapper {
                height: 100px;
            }

            .v-tabs {
                font-family: 'Muli', sans-serif;
                color: $tabTextColor;
                margin-top: 61px;
                margin-bottom: 111px;

                &-bar {
                    background: transparent !important;

                }
                
                .v-tab {
                    padding: 12px 40px;
                    text-transform: none;
                    font-size: 20px;
                    color: $tabTextColor;
                    position: relative;
                    align-items: flex-start;
                    // margin-right: 50px;

                    &--active {
                        color: #5BFFFE !important;
                        font-weight: 700;
                        background: none;

                        span {
                            opacity: 1 !important;
                            transition: all .5s ease;
                        }
                    }

                    &::before {
                        display: none !important;
                    }

                    span {
                        opacity: 0;
                        transition: all .5s ease;
                        position: absolute;
                        color: #616887;
                        font-size: 20px;
                        display: block;
                        width: 100%;
                        top: 50px;
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
            }

            .container {
                padding-bottom: 100px;
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
        position: absolute;
        left: 45px;
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
                background: rgba(236, 237, 244, 0.15);
            }
        }
    }
}
    
</style>