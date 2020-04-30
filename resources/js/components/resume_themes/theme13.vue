<template>
<!-- Developer: Jose Quintero -->
    <v-app id="theme13" style="width: 100%">
        <div class="theme-header">

            <div class="bg-header">
                <img class='left-bg' src="/images/resume_themes/theme13/bg-left.png" alt="">
                <img src="/images/resume_themes/theme13/bg-top1.png" alt="" class="bg-top1">
                <img src="/images/resume_themes/theme13/bg-top2.png" alt="" class="bg-top2">
                <img src="/images/resume_themes/theme13/bg-right.png" alt="" class="bg-right">
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
                            <img class="icon" src="/images/resume_themes/theme13/chat-icon.png"> Start a chat
                        </button>
                        <button class="action-btn">
                            <img class="icon" src="/images/resume_themes/theme13/suitcase-icon.png">Upload interviews
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
                            <img src="/images/resume_themes/theme13/hireMe-icon.png" alt="hire me icon" class="icon">
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
import EducationTab from './theme13/education'
import WorkExperienceTab from './theme13/work-experience'
import PortfolioTab from './theme13/portfolio'
import AboutTab from './theme13/about'
import SkillsTab from './theme13/skills-and-languages'

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


<style lang="scss" scoped>

@import '../../../sass/media-queries';
@import url('https://fonts.googleapis.com/css2?family=Muli:wght@400;700&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

$mainColor: #28404A;
$tabTextColor: #4D2F2D;
$purple: #686299;

#theme13 {
    font-family: 'Muli', sans-serif;
    width: 100%;
    color: $mainColor;
    background: #FFF7F3;
    position: relative;

    .theme-header {
        width: 100%;
        position: relative;

        .bg-header {
            width: 100%;
            height: 100%;
            position: absolute;
            overflow: hidden;

            .left-bg {
                position: absolute;
                left: -88px;
            }

            .bg-top1 {
                position: absolute;
                top: -44px;
                right: 40%;
            }
            
            .bg-top2 {
                position: absolute;
                top: -21.7px;
                right: 39%;
            }

            .bg-right {
                position: absolute;
                top: -63.5px;
                right: -29.7px;
            }

            .bg-bottom {
                position: absolute;
                bottom: -13px;
                right: 46%;
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
                padding-bottom: 100px;
            }
        }
    }

    .theme-footer {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
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
    }
}
    
</style>