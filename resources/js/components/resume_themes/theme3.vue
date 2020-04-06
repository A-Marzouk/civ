<template>
    <div class="d-flex justify-content-center w-100">
        <div class="themeWrapper">
            <div class="mainThemeBar d-flex justify-content-between align-items-center">
                <div class="left">
                    <div class="d-flex">
                        <div class="avatar">
                            <img src="/images/resume_themes/theme3/person.png" alt="profile pic">
                        </div>
                        <div class="info">
                            <div class="user-name">
                                Micheal Fields
                            </div>
                            <div class="job-title d-flex">
                                <div>
                                    Web Developer
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="menu-icon">
                        <img src="/images/resume_themes/theme3/menu.svg" alt="menu" class="hideOnDesktop">
                    </div>
                </div>
                <div class="right d-flex align-items-center">
                    <div class="hourly-rate">
                        <div class="hourly-rate-text">
                            $10
                        </div>
                        <div class="hourly-rate-text light text-center">
                            Hourly Rate
                        </div>
                    </div>
                    <div class="weekly-availability">
                        <div class="hourly-rate-text">
                            35 hours
                        </div>
                        <div class="hourly-rate-text light text-center">
                            Weekly Availability
                        </div>
                    </div>
                    <div class="hire-me-btn">
                        <a href="javascript:void(0)">
                            Hire me
                        </a>
                    </div>
                </div>
            </div>

            <div class="w-100 d-flex flex-column align-items-center justify-content-center">
                <div class="tabs-bar d-flex">
                    <div class="tab-text" @click="setActiveTab('portfolio')"
                         :class="{active : activeTab === 'portfolio'}">
                        Portfolio
                    </div>
                    <div class="tab-text" @click="setActiveTab('skills')"
                         :class="{active : activeTab === 'skills'}">
                        Skills
                    </div>
                    <div class="tab-text" @click="setActiveTab('work')" :class="{active : activeTab === 'work'}">
                        Work
                    </div>
                    <div class="tab-text" @click="setActiveTab('education')"
                         :class="{active : activeTab === 'education'}">
                        Education
                    </div>
                </div>
            </div>

            <div class="main-tab-content">
                <div class="portfolio" v-show="activeTab === 'portfolio'">
                    <slick class="portfolioSlides" ref="slick" :options="slickOptions">
                        <div class="d-flex flex-column align-items-center">
                            <img src="/images/resume_themes/theme3/portfolio1.png" alt="portfolio image">
                            <div class="slide-text">
                                🛒 Lorem ipsum dolor sit amet, consectetur elit.
                            </div>
                        </div>

                        <div class="d-flex flex-column align-items-center">
                            <img src="/images/resume_themes/theme3/portfolio2.png" alt="portfolio image">
                            <div class="slide-text">
                                📊 Lorem ipsum dolor sit amet, consectetur elit.
                            </div>
                        </div>
                        <div class="d-flex flex-column align-items-center">
                            <img src="/images/resume_themes/theme3/portfolio3.png" alt="portfolio image">
                            <div class="slide-text">
                                🛒 Lorem ipsum dolor sit amet, consectetur elit.
                            </div>
                        </div>

                        <div class="d-flex flex-column align-items-center">
                            <img src="/images/resume_themes/theme3/portfolio1.png" alt="portfolio image">
                            <div class="slide-text">
                                📊 Lorem ipsum dolor sit amet, consectetur elit.
                            </div>
                        </div>

                        <div class="d-flex flex-column align-items-center">
                            <img src="/images/resume_themes/theme3/portfolio2.png" alt="portfolio image">
                            <div class="slide-text">
                                🛒 Lorem ipsum dolor sit amet, consectetur elit.
                            </div>
                        </div>

                        <div class="d-flex flex-column align-items-center">
                            <img src="/images/resume_themes/theme3/portfolio2.png" alt="portfolio image">
                            <div class="slide-text">
                                🛒 Lorem ipsum dolor sit amet, consectetur elit.
                            </div>
                        </div>

                        <div class="d-flex flex-column align-items-center">
                            <img src="/images/resume_themes/theme3/portfolio2.png" alt="portfolio image">
                            <div class="slide-text">
                                🛒 Lorem ipsum dolor sit amet, consectetur elit.
                            </div>
                        </div>
                    </slick>
                </div>
                <div class="skills" v-show="activeTab === 'skills' ">
                    <div class="w-100 d-flex flex-column align-items-center justify-content-center">
                        <div class="skills-tabs d-flex justify-content between">
                            <div class="skills-tab-text" :class="{active : activeSkillTab === 'programming-languages'}"
                                 @click="setActiveSkillTab('programming-languages')">
                                Programming Languages
                            </div>
                            <div class="skills-tab-text" :class="{active : activeSkillTab === 'framewroks-databases'}"
                                 @click="setActiveSkillTab('framewroks-databases')">
                                Frameworks
                            </div>
                            <div class="skills-tab-text" :class="{active : activeSkillTab === 'design-skills'}"
                                 @click="setActiveSkillTab('design-skills')">
                                Design Skills
                            </div>
                            <div class="skills-tab-text mr-0" :class="{active : activeSkillTab === 'software'}"
                                 @click="setActiveSkillTab('software')">
                                Software
                            </div>
                        </div>

                        <div class="skills-icons-bar" id="style-1">
                            <img class="icon" src="/images/resume_themes/theme3/html.svg" alt="skill-icon">
                            <img class="icon" src="/images/resume_themes/theme3/python.svg" alt="skill-icon">
                            <img class="icon" src="/images/resume_themes/theme3/skill.svg" alt="skill-icon">
                        </div>
                    </div>
                </div>
                <div class="work" v-show="activeTab === 'work'">
                    <div class="work-item">
                        <div class="work-icon hideOnPhone">
                            <img src="/images/resume_themes/theme3/work-icon.svg" alt="work-icon">
                        </div>
                        <div class="work-info">
                            <div class="d-flex">
                                <div class="work-icon hideOnNotPhone">
                                    <img src="/images/resume_themes/theme3/work-icon.svg" alt="work-icon">
                                </div>
                                <div>
                                    <div class="date">
                                        2018 - 2019
                                    </div>
                                    <div class="work-title">
                                        Graphic & web designer
                                    </div>
                                </div>
                            </div>
                            <div class="work-details">
                                <div class="company-name">
                                    Company "React"
                                </div>
                                <div class="job-roles">
                                    - Company "React" - Turning creative concepts into finished websites.
                                    - Drawing up detailed website s pecifications.
                                    - Building websites that are easy to understand, navigate and use.
                                    - Designing sample page layouts. - Ensuring that the website complies with the
                                    company’s brand guidelines.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="work-item">
                        <div class="work-icon hideOnPhone">
                            <img src="/images/resume_themes/theme3/work-icon.svg" alt="work-icon">
                        </div>
                        <div class="work-info">
                            <div class="d-flex">
                                <div class="work-icon hideOnNotPhone">
                                    <img src="/images/resume_themes/theme3/work-icon.svg" alt="work-icon">
                                </div>
                                <div>
                                    <div class="date">
                                        2018 - 2019
                                    </div>
                                    <div class="work-title">
                                        Graphic & web designer
                                    </div>
                                </div>
                            </div>
                            <div class="work-details">
                                <div class="company-name">
                                    Company "React"
                                </div>
                                <div class="job-roles">
                                    - Company "React" - Turning creative concepts into finished websites.
                                    - Drawing up detailed website s pecifications.
                                    - Building websites that are easy to understand, navigate and use.
                                    - Designing sample page layouts. - Ensuring that the website complies with the
                                    company’s brand guidelines.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="work-item">
                        <div class="work-icon hideOnPhone">
                            <img src="/images/resume_themes/theme3/work-icon.svg" alt="work-icon">
                        </div>
                        <div class="work-info">
                            <div class="d-flex">
                                <div class="work-icon hideOnNotPhone">
                                    <img src="/images/resume_themes/theme3/work-icon.svg" alt="work-icon">
                                </div>
                                <div>
                                    <div class="date">
                                        2018 - 2019
                                    </div>
                                    <div class="work-title">
                                        Graphic & web designer
                                    </div>
                                </div>
                            </div>
                            <div class="work-details">
                                <div class="company-name">
                                    Company "React"
                                </div>
                                <div class="job-roles">
                                    - Company "React" - Turning creative concepts into finished websites.
                                    - Drawing up detailed website s pecifications.
                                    - Building websites that are easy to understand, navigate and use.
                                    - Designing sample page layouts. - Ensuring that the website complies with the
                                    company’s brand guidelines.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="work-item">
                        <div class="work-icon hideOnPhone">
                            <img src="/images/resume_themes/theme3/work-icon.svg" alt="work-icon">
                        </div>
                        <div class="work-info">
                            <div class="d-flex">
                                <div class="work-icon hideOnNotPhone">
                                    <img src="/images/resume_themes/theme3/work-icon.svg" alt="work-icon">
                                </div>
                                <div>
                                    <div class="date">
                                        2018 - 2019
                                    </div>
                                    <div class="work-title">
                                        Graphic & web designer
                                    </div>
                                </div>
                            </div>
                            <div class="work-details">
                                <div class="company-name">
                                    Company "React"
                                </div>
                                <div class="job-roles">
                                    - Company "React" - Turning creative concepts into finished websites.
                                    - Drawing up detailed website s pecifications.
                                    - Building websites that are easy to understand, navigate and use.
                                    - Designing sample page layouts. - Ensuring that the website complies with the
                                    company’s brand guidelines.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="work" v-show="activeTab === 'education'">
                    <div class="work-item">
                        <div class="work-icon hideOnPhone">
                            <img src="/images/resume_themes/theme3/education-icon.svg" alt="work-icon">
                        </div>
                        <div class="work-info">
                            <div class="d-flex">
                                <div class="work-icon hideOnNotPhone">
                                    <img src="/images/resume_themes/theme3/education-icon.svg" alt="work-icon">
                                </div>
                                <div>
                                    <div class="date">
                                        2015 - 2016
                                    </div>
                                    <div class="work-title">
                                        Master in web development
                                    </div>
                                </div>
                            </div>
                            <div class="work-details">
                                <div class="company-name">
                                    Envision Media, Inc., Santa Cruz
                                </div>
                                <div class="job-roles">
                                    - Envision Media, Inc., Santa Cruz, CA
                                    - Turning creative concepts into finished websites.
                                    - Drawing up detailed website s pecifications. - Building websites that are easy to
                                    understand, navigate and use.
                                    - Designing sample page layouts. - Ensuring that the website complies with the
                                    company’s brand guidelines.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="work-item">
                        <div class="work-icon hideOnPhone">
                            <img src="/images/resume_themes/theme3/education-icon.svg" alt="work-icon">
                        </div>
                        <div class="work-info">
                            <div class="d-flex">
                                <div class="work-icon hideOnNotPhone">
                                    <img src="/images/resume_themes/theme3/education-icon.svg" alt="work-icon">
                                </div>
                                <div>
                                    <div class="date">
                                        2015 - 2016
                                    </div>
                                    <div class="work-title">
                                        Master in web development
                                    </div>
                                </div>
                            </div>
                            <div class="work-details">
                                <div class="company-name">
                                    Envision Media, Inc., Santa Cruz
                                </div>
                                <div class="job-roles">
                                    - Envision Media, Inc., Santa Cruz, CA
                                    - Turning creative concepts into finished websites.
                                    - Drawing up detailed website s pecifications. - Building websites that are easy to
                                    understand, navigate and use.
                                    - Designing sample page layouts. - Ensuring that the website complies with the
                                    company’s brand guidelines.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="work-item">
                        <div class="work-icon hideOnPhone">
                            <img src="/images/resume_themes/theme3/education-icon.svg" alt="work-icon">
                        </div>
                        <div class="work-info">
                            <div class="d-flex">
                                <div class="work-icon hideOnNotPhone">
                                    <img src="/images/resume_themes/theme3/education-icon.svg" alt="work-icon">
                                </div>
                                <div>
                                    <div class="date">
                                        2015 - 2016
                                    </div>
                                    <div class="work-title">
                                        Master in web development
                                    </div>
                                </div>
                            </div>
                            <div class="work-details">
                                <div class="company-name">
                                    Envision Media, Inc., Santa Cruz
                                </div>
                                <div class="job-roles">
                                    - Envision Media, Inc., Santa Cruz, CA
                                    - Turning creative concepts into finished websites.
                                    - Drawing up detailed website s pecifications. - Building websites that are easy to
                                    understand, navigate and use.
                                    - Designing sample page layouts. - Ensuring that the website complies with the
                                    company’s brand guidelines.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="work-item">
                        <div class="work-icon hideOnPhone">
                            <img src="/images/resume_themes/theme3/education-icon.svg" alt="work-icon">
                        </div>
                        <div class="work-info">
                            <div class="d-flex">
                                <div class="work-icon hideOnNotPhone">
                                    <img src="/images/resume_themes/theme3/education-icon.svg" alt="work-icon">
                                </div>
                                <div>
                                    <div class="date">
                                        2015 - 2016
                                    </div>
                                    <div class="work-title">
                                        Master in web development
                                    </div>
                                </div>
                            </div>
                            <div class="work-details">
                                <div class="company-name">
                                    Envision Media, Inc., Santa Cruz
                                </div>
                                <div class="job-roles">
                                    - Envision Media, Inc., Santa Cruz, CA
                                    - Turning creative concepts into finished websites.
                                    - Drawing up detailed website s pecifications. - Building websites that are easy to
                                    understand, navigate and use.
                                    - Designing sample page layouts. - Ensuring that the website complies with the
                                    company’s brand guidelines.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
    import Slick from 'vue-slick';

    export default {
        name: "theme3",
        props:['user','is_preview'],
        components: {
            Slick
        },
        data() {
            return {
                activeTab: 'portfolio',
                activeSkillTab: 'programming-languages',
                slickOptions: {
                    infinite: false,
                    dots: true,
                    arrows: false,
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    responsive: [
                        {
                            breakpoint: 786,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1,
                                rows: 3,
                            }
                        },
                        {
                            breakpoint: 1600,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 1,
                            }
                        }
                    ]
                },
                currentUser : this.user
            }
        },
        methods: {
            setActiveTab(tabName) {
                this.activeTab = tabName;
            },
            setActiveSkillTab(tabName) {
                this.activeSkillTab = tabName;
            },
            setDummyUser(){
                this.currentUser = this.$store.state.dummyUser;
            }
        },
        mounted() {
            // if there is no user or the preview is true, set dummy user
            if (!this.currentUser || this.is_preview) {
                this.setDummyUser();
            }
        }
    }
</script>

<style lang="scss" scoped>
    @import "resources/sass/themes/theme3.scss";
</style>
