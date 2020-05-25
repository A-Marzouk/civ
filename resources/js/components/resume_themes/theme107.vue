<template>
<!-- Developer: Jose Quintero -->
    <v-app id="theme107" style="width: 100%">
        <div class="theme-header">

            <div class="bg-header">
                <img class='left-bg' src="/images/resume_themes/theme105/bg-left.png" alt="">
                <img src="/images/resume_themes/theme105/bg-top1.png" alt="" class="bg-top1">
                <img src="/images/resume_themes/theme105/bg-top2.png" alt="" class="bg-top2">
                <img src="/images/resume_themes/theme105/bg-right.png" alt="" class="bg-right">
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

                    <div class="more-icon">
                        <img @click="showMore = !showMore" :class="{hide: showMore}" src="/images/resume_themes/theme107/more-icon.png" alt="">
                        <font-awesome-icon @click="showMore = !showMore" :class="{hide: !showMore}" :icon="['fas', 'times']"></font-awesome-icon>
                    </div>
                </div>

                <div class="right">
                    <div class="actions-wrapper" :class="{hide: !showMore}">
                        <button class="action-btn">
                            <img class="icon" src="/images/resume_themes/theme105/chat-icon.png"> Start a chat
                        </button>
                        <button class="action-btn">
                            <img class="icon" src="/images/resume_themes/theme105/suitcase-icon.png">Upload interviews
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
                            <img src="/images/resume_themes/theme105/hireMe-icon.png" alt="hire me icon" class="icon">
                            Hire Me
                        </button>
                    </div>
                </div>
            </div>
        </div>

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
        ],
        showMore: false
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
    color: $mainColor;
    background: #DBDEC4;
    position: relative;
    overflow-x: hidden;

    .theme-header {
        width: 100%;
        position: relative;
        background-image: url("/images/resume_themes/theme107/bg-header.png");

        .left {
            display: flex;
            position: relative;

            .more-icon {
                display: none;
                position: relative;
                
                @media (max-width: 700px) {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    position: absolute;
                    top: 15px;
                    right: 17px;
                }

                img,
                svg {
                    opacity: 1;
                    transition: opacity .4s ease;
                    position: absolute;

                    &.hide {
                        opacity: 0;
                        transition: opacity .4s ease;
                    }
                }

                img {
                    max-width: 100px !important;
                }
            }
            
            @media (max-width: 700px) {
                width: 100%;
            }
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

                    @media (max-width: 1400px) {
                        font-size: 16px;

                        .icon {
                            height: 20px;
                        }
                    }
                    
                    @media (max-width: 1200px) {
                        padding: 13px 14px;
                        font-size: 10px;

                        .icon {
                            height: 10px;
                        }
                    }
                }

                @media (max-width: 700px) {
                    position: absolute;
                    opacity: 1;
                    transform: translateY(50px);
                    transition: all .4s ease;
                    flex-direction: column;
                    padding: 44px 36px;
                    background: white;
                    width: 90%;
                    border-radius: 25px;
                    z-index: 100;
                    box-shadow: 0 30px 30px rgba(16, 44, 44, 0.1);

                    .action-btn {
                        width: 100%;
                        font-size: 18px;
                        border-radius: 0;
                        background: transparent;
                        margin: 0 !important;
                        justify-content: flex-start;
                        padding: 0;

                        &:first-child {
                            margin-bottom: 35px !important;
                        }

                        .icon {
                            height: 16px;
                        }
                    }

                    &.hide {
                        transition: all .4s ease;                        
                        transform: translateY(-200px);
                        opacity: 0;
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

                    @media (max-width: 1400px) {
                        font-size: 22px;

                        small {
                            font-size: 13px;
                        }
                    }
                    
                    @media (max-width: 1200px) {
                        font-size: 15px;

                        small {
                            font-size: 8px;
                        }
                    }
                    
                    @media (max-width: 700px) {
                        margin-right: 0;
                        align-items: flex-start;
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

                    @media (max-width: 1400px) {
                        font-size: 16px;
                        padding: 23px 42px;
                        min-width: 144px;

                        .icon {
                            height: 20px;
                        }
                    }
                    
                    @media (max-width: 1200px) {
                        font-size: 11px;
                        padding: 14px 40px;

                        .icon {
                            height: 12px;
                        }
                    }
                    
                    @media (max-width: 700px) {
                        font-size: 10px;
                        padding: 14px 24px;
                        min-width: 80px;

                        .icon {
                            height: 12px;
                        }
                    }
                }

                @media (max-width: 1200px) {
                    margin-top: 27px;
                }

                @media (max-width: 700px) {
                    margin-top: 0;
                    padding-left: 60px;
                    justify-content: space-between;
                    width: 100%;
                }
            }

            @media (max-width: 700px) {
                width: 100%;
            }
        }

        .user-info {
            display: flex;
            justify-content: space-between;
            padding: 56px 80px;
            z-index: 1;
            position: relative;

            @media (max-width: 1400px) {
                padding: 56px;
            }
            
            @media (max-width: 1200px) {
                padding: 37px 40px;
            }
            
            @media (max-width: 700px) {
                flex-wrap: wrap;
                padding: 30px 17px;
            }

            .user-img {
                display: inline-block;
                width: 232px;
                height: 232px;
                margin-right: 55px;                

                img {
                    width: 100%;
                    border-radius: 50%;
                }

                @media (max-width: 1400px) {
                    width: 184px;
                    height: 184px;
                    margin-right: 33px;
                }
                
                @media (max-width: 1200px) {
                    width: 141px;
                    height: 141px;
                }
                
                @media (max-width: 876px) {
                    margin-right: 20px;
                }

                @media (max-width: 700px) {
                    width: 50px;
                    height: 50px;
                    margin-right: 12px;
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
                    font-size: 35px;
                    margin-bottom: 20px;
                    color: #28404A;

                    
                }

                .profession {
                    margin-bottom: 30px;

                    @media (max-width: 1200px) {
                        margin-bottom: 20px;
                    }
                }

                .speciallity {
                    display: flex;
                    padding: 0;
                    
                    .item {
                        margin-right: 25px;
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
                            right: -12.5px;
                            top: calc(50% - 3.5px);
                        }

                        @media (max-width: 1200px) {

                            &::after {
                                height: 5px;
                                width: 5px;
                            }
                        }
                    }

                    @media (max-width: 876px) {
                        flex-wrap: wrap;
                    }
                }

                @media (max-width: 1400px) {
                    font-size: 22px;

                    .name {
                        font-size: 28px;
                    }
                }
                
                @media (max-width: 1200px) {
                    font-size: 15px;

                    .name {
                        font-size: 17px;
                        margin-bottom: 13px;
                    }
                }

                @media (max-width: 700px) {

                    .name {
                        font-size: 12px;
                        margin-bottom: 5px;
                    }

                    .profession {
                        font-size: 10px;
                        margin-bottom: 18px;
                    }

                    .speciallity {
                        display: none;
                    }
                }
            }
        }
    }

    .theme-body {
        height: auto;
        background: white;
        border-radius: 100px 100px 0 0;
        border-top: 16px solid $purple;
        position: relative;
        width: 100%;
        overflow: hidden;

        .bg-decoImg {
            position: absolute;
            
            @media (max-width: 1200px) {
                width: 349px;
                z-index: -1;
            }
            
            @media (max-width: 700px) {
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

            .v-tabs {
                font-family: 'Muli', sans-serif;
                color: $mainColor;
                overflow: 0 auto;
                width: 95%;
                margin: 0 auto;
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
                        background: transparent;
                        border-radius: 8px;
                        border: 2px solid #DBDFC3;
                    }
                }

                @media (max-width: 1200px) {
                    margin-top: 29px;
                    margin-bottom: 47px;
                }
                
                @media (max-width: 700px) {
                    margin: 29px 0;

                    .v-item-group {
                        padding: 0 13px;
                    }
                }
            }

            .container {
                padding: 0 40px;
                padding-bottom: 100px;
                max-width: 1550px;
                width: 90%;
                margin: 0 auto;
                background: #f6f6f6;

                @media (max-width: 700px) {
                    padding: 0;
                    padding-bottom: 30px;

                }
            }
        }

        @media (max-width: 756px) {
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
        top: 400px;
        right: -120px;
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

        @media (max-width: 1200px) {
            right: -50px;
            top: 238px;
            transform: rotateZ(90deg);
            
            &, a {
                font-size: 7px;
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
        left: 1%;
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
                font-size: 9px;
            }

            .icon {
                height: 7px;
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