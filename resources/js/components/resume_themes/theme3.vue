<template>
    <div class="d-flex justify-content-center w-100">
        <div class="themeWrapper" v-if="currentUser">
            <div class="mainThemeBar d-flex justify-content-between align-items-center">
                <div class="left">
                    <div class="d-flex align-items-center">
                        <div class="avatar">
                            <img :src="currentUser.personal_info.profile_pic" alt="profile pic">
                        </div>
                        <div class="info">
                            <div class="user-name">
                                {{currentUser.personal_info.full_name}}
                            </div>
                            <div class="job-title d-flex">
                                <div>
                                    {{currentUser.personal_info.designation}}
                                </div>
                            </div>
                        </div>
                        <div class="media-btns">
                            <div class="audio-btn NoDecor">
                                <a href="javascript:void(0)">
                                    <img src="/images/resume_themes/theme3/audio.svg" alt="audio">
                                    <span class="hideOnPhone">Audio</span>
                                </a>
                            </div>
                            <div class="video-btn NoDecor">
                                <a href="javascript:void(0)">
                                    <img src="/images/resume_themes/theme3/video.svg" alt="video">
                                    <span class="hideOnPhone">Video</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="menu-icon">
                        <img src="/images/resume_themes/theme3/menu.svg" alt="menu" class="hideOnDesktop">
                    </div>
                </div>
                <div class="right d-flex align-items-center hideOnPhone">
                    <div class="hourly-rate">
                        <div class="rate-options">
                            <span  @click="selectCurrentPayment('hourly')" :class="{active:currentPayment.salary_frequency === 'hourly'}">Hourly</span>
                            <span  @click="selectCurrentPayment('weekly')" :class="{active:currentPayment.salary_frequency === 'weekly'}">Weekly</span>
                            <span  @click="selectCurrentPayment('monthly')" :class="{active:currentPayment.salary_frequency === 'monthly'}">Monthly</span>
                        </div>
                       <div>
                           <div class="hourly-rate-text">
                               ${{currentPayment.salary}}
                           </div>
                           <div class="hourly-rate-text light text-center">
                               Rate
                           </div>
                       </div>
                    </div>
                    <div class="weekly-availability">
                        <div class="rate-options">
                            <span  @click="selectCurrentAvailability('weekly')" :class="{active:currentAvailability.available_hours_frequency === 'weekly'}">Weekly</span>
                            <span  @click="selectCurrentAvailability('monthly')" :class="{active:currentAvailability.available_hours_frequency === 'monthly'}">Monthly</span>
                            <span  @click="selectCurrentAvailability('yearly')" :class="{active:currentAvailability.available_hours_frequency === 'yearly'}">Yearly</span>
                        </div>
                        <div>
                            <div class="hourly-rate-text">
                                {{currentAvailability.available_hours}} hours
                            </div>
                            <div class="hourly-rate-text light text-center">
                                Availability
                            </div>
                        </div>
                    </div>
                    <div class="hire-me-btn NoDecor">
                        <a href="javascript:void(0)">
                            Hire me
                        </a>
                    </div>
                </div>
                <!-- Shows only on phone -->
                <div class="right d-flex justify-content-center hideOnNotPhone">
                    <div class="d-flex flex-column justify-content-center">
                        <div>
                            <ul class="nav" id="myTab" role="tablist">
                                <li class="nav-item" v-for="item in availibilityRateItems" :key="item.id">
                                    <a 
                                        @click="selectCurrentPayment(item.title)"
                                        class="nav-link"
                                        id="home-tab" 
                                        data-toggle="tab" 
                                        href="#home" 
                                    >
                                        <span class="text-capitalize mobile-frequency" :class="currentTab == item.title ? 'active' : ''">{{item.title}}</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="text-center mobile-rate-text">
                            ${{currentPayment.salary}}
                        </div>
                        <div class="text-center mobile-frequency-rate-usd">
                            Rate $ USD
                        </div>
                    </div>
                </div>

                <div class="right d-flex justify-content-center hideOnNotPhone">
                    <div class="d-flex flex-column justify-content-center">
                        <div>
                            <ul class="nav" id="myTab" role="tablist">
                                <li class="nav-item" v-for="item in availabilityHourItems" :key="item.id">
                                    <a 
                                        @click="selectCurrentAvailability(item.title)"
                                        class="nav-link"
                                        id="home-tab" 
                                        data-toggle="tab" 
                                        href="#home" 
                                    >
                                        <span class="text-capitalize mobile-frequency" :class="currentAvailableTab == item.title ? 'active' : ''">{{item.title}}</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="text-center mobile-rate-text">
                            {{currentAvailability.available_hours}} hours
                        </div>
                        <div class="text-center mobile-frequency-rate-usd">
                            Availibility Hours
                        </div>
                    </div>
                </div>
                <div class="right d-flex justify-content-center hideOnNotPhone">
                    <div class="d-flex flex-column justify-content-center">
                        <div class="hire-me-btn NoDecor">
                            <a href="javascript:void(0)">
                                Hire me
                            </a>
                        </div>
                    </div>
                </div>
                <!-- shows only on phone -->
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
                <div class="transition-line"></div> 
            </div>

            <div class="main-tab-content">
                <div class="portfolio" v-show="activeTab === 'portfolio'">
                    <slick class="portfolioSlides" ref="slick" :options="slickOptions">
                        <div class="d-flex flex-column align-items-center" v-for="project in currentUser.projects" :key="project.id + '_projectImage' ">
                            <img :src="getProjectMainImage(project)" alt="portfolio image">
                            <div class="slide-text">
                                {{project.name}}.
                            </div>
                        </div>
                    </slick>
                </div>
                <div class="skills" v-show="activeTab === 'skills' ">
                    <div class="w-100 d-flex flex-column align-items-center justify-content-center">
                        <div class="skills-tabs d-flex justify-content between">
                            <div class="skills-tab-text" :class="{active : activeSkillTab === 'programming_languages'}"
                                 @click="setActiveSkillTab('programming_languages')">
                                Programming Languages
                            </div>
                            <div class="skills-tab-text" :class="{active : activeSkillTab === 'frameworks'}"
                                 @click="setActiveSkillTab('frameworks')">
                                Frameworks
                            </div>
                            <div class="skills-tab-text" :class="{active : activeSkillTab === 'design'}"
                                 @click="setActiveSkillTab('design')">
                                Design Skills
                            </div>
                            <div class="skills-tab-text mr-0" :class="{active : activeSkillTab === 'software'}"
                                 @click="setActiveSkillTab('software')">
                                Software
                            </div>
                        </div>

                        <div class="skills-icons-bar" id="style-1">
                            <div v-for="skill in currentUser.skills" :key="skill.id + '_skill'" class="skill-item" v-show="skill.category === activeSkillTab ">
                                <img class="icon" :src="getSkillIcon(skill.title)" alt="skill-icon" >
                                <span>{{skill.title}}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="work" v-show="activeTab === 'work'">
                    <div class="work-item" v-for="work in currentUser.work_experience" :key="work.id + 'work'">
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
                                       {{work.date_from}} - {{work.present ? 'Present' : work.date_to}}
                                    </div>
                                    <div class="work-title">
                                       {{work.job_title}}
                                    </div>
                                </div>
                            </div>
                            <div class="work-details">
                                <div class="company-name">
                                    Company: "{{work.company_name}}"
                                </div>
                                <div class="job-roles">
                                    {{work.description}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="work" v-show="activeTab === 'education'">
                    <div class="work-item" v-for="education in currentUser.education" :key="education.id + '_education'">
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
                                        {{education.date_from}} - {{education.present ? 'Present' : education.date_to}}
                                    </div>
                                    <div class="work-title">
                                        {{education.degree_title}}
                                    </div>
                                </div>
                            </div>
                            <div class="work-details">
                                <div class="company-name">
                                   {{education.university_name}}
                                </div>
                                <div class="job-roles">
                                    {{education.institution_type}}
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
        props: ['user', 'is_preview'],
        components: {
            Slick
        },
        data() {
            return {
                currentTab:"hourly",
                currentAvailableTab:"weekly",
                availibilityRateItems:[
                    {id:1, title: "hourly"},
                    {id:2, title: "weekly"},
                    {id:3, title: "monthly"},
                ],
                availabilityHourItems:[
                    {id:1, title: "weekly"},
                    {id:2, title: "monthly"},
                    {id:3, title: "yearly"},
                ],

                activeTab: 'portfolio',
                activeSkillTab: 'programming_languages',
                slickOptions: {
                    infinite: false,
                    dots: true,
                    arrows: false,
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    responsive: [{
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            rows: 2,
                        }
                    }, {
                        breakpoint: 1200,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                        }
                    }, {
                        breakpoint: 1600,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1,
                        }
                    }, ]
                },
                currentUser: this.user,
                currentPayment: {},
                currentAvailability: {},
            }
        },
        methods: {
            setActiveTab(tabName) {
                this.activeTab = tabName;
            },
            setActiveSkillTab(tabName) {
                this.activeSkillTab = tabName;
            },
            selectCurrentPayment(frequency) {
                this.currentTab = frequency;
                this.currentUser.payment_info.forEach(payment => {
                    if (payment.salary_frequency === frequency) {
                        this.currentPayment = payment;
                    }
                });
            },
            selectCurrentAvailability(frequency) {
                this.currentAvailableTab = frequency;
                this.currentUser.availability_info.forEach(availability => {
                    if (availability.available_hours_frequency === frequency) {
                        this.currentAvailability = availability;
                    }
                });
            },
            getSkillIcon(skill_title) {
                let arrayOfSkillImages = {
                    "ui design": "/images/skills_icons/user_interface.png",
                    "ux design": "/images/skills_icons/user_experience.png",
                    "logo design": "/images/skills_icons/logo_design.png",
                    animation: "/images/skills_icons/animation.jpg",
                    "motion graphics": "/images/skills_icons/motion_graphics.png",
                    illustration: "/images/skills_icons/illustration.png",
                    advertising: "/images/skills_icons/advertising.png",
                    branding: "/images/skills_icons/branding.png",
                    "brochure Design": "/images/skills_icons/brochure_design.png",
                    "website design": "/images/skills_icons/web_design.png",
                    "game designer": "/images/skills_icons/game_designer.png",
                    "character design": "/images/skills_icons/character_design.png",
                    "digital painting": "/images/skills_icons/digital_painting.png",
                    "creative director": "/images/skills_icons/creative_director.png",
                    "html / css": "/images/skills_icons/HTML.png",
                    // 2-

                    "adobe after effects": "/images/skills_icons/AE.png",
                    sketch: "/images/skills_icons/Sketch.png",
                    "adobe illustrator": "/images/skills_icons/Illustrator.png",
                    "adobe xd": "/images/skills_icons/AdobeXD.png",
                    photoshop: "/images/skills_icons/Photoshop.png",
                    autocad: "/images/skills_icons/autocad.png",
                    solidworks: "/images/skills_icons/solid_works.png",
                    "adobe flash": "/images/skills_icons/adobe_flash.png",
                    "digital drawing Tablet": "/images/skills_icons/digital_drawing_tablet.png",
                    "adobe indesign": "/images/skills_icons/indesign.png",
                    coreldraw: "/images/skills_icons/corel_draw.png",
                    "3d max": "/images/skills_icons/3d_max.png",

                    // developer :
                    // 1-
                    javascript: "/images/skills_icons/javascript.png",
                    sql: "/images/skills_icons/mysql.png",
                    java: "resumeApp/resources/assets/images/skills_icons/java.png",
                    "c#": "/images/skills_icons/c#.png",
                    python: "/images/skills_icons/python.png",
                    php: "/images/skills_icons/php.png",
                    "c++": "/images/skills_icons/c_language.png",
                    c: "/images/skills_icons/c_language.png",
                    typescript: "/images/skills_icons/typescript.png",
                    ruby: "/images/skills_icons/ruby.png",
                    "objective-C": "/images/skills_icons/objective_c.png",
                    swift: "/images/skills_icons/swift.png",
                    "vb.net": "/images/skills_icons/vb_net.png",
                    go: "/images/skills_icons/go.png",
                    perl: "/images/skills_icons/perl.png",
                    scala: "/images/skills_icons/scala.png",
                    groovy: "/images/skills_icons/groovy.png",
                    assembly: "/images/skills_icons/assembly.png",
                    coffeescript: "/images/skills_icons/coffeeScript.png",
                    vba: "/images/skills_icons/vba.png",
                    r: "/images/skills_icons/r_lang.png",
                    matlab: "/images/skills_icons/matlab.png",
                    "visual basic 6": "/images/skills_icons/matlab.png",
                    lua: "/images/skills_icons/lua.png",
                    haskell: "/images/skills_icons/haskell.png",
                    html: "/images/skills_icons/HTML.png",
                    css: "/images/skills_icons/CSS.png",
                    laravel: "/images/skills_icons/laravel.png",
                    phpstorm: "/images/skills_icons/phpstorm.png",

                    //2-
                    angularjs: "/images/skills_icons/Angularjs.png",
                    "angular.js": "/images/skills_icons/Angularjs.png",
                    "node.js": "/images/skills_icons/node_js.png",
                    nodejs: "/images/skills_icons/node_js.png",
                    ".net Core": "/images/skills_icons/netcore.png",
                    react: "/images/skills_icons/react.png",
                    cordova: "/images/skills_icons/cordava.png",
                    firebase: "",
                    xamarin: "",
                    hadoop: "/images/skills_icons/hadoop.png",
                    spark: "/images/skills_icons/spark.png",
                    mysql: "/images/skills_icons/mysql.png",
                    "sql server": "/images/skills_icons/sql server.png",
                    postgresql: "/images/skills_icons/postgreSQL.png",
                    sqlite: "/images/skills_icons/SQLite.png",
                    mongodb: "/images/skills_icons/mongoDB.png",
                    oracle: "/images/skills_icons/Oracle.png",
                    redis: "/images/skills_icons/redis.png",
                    cassandra: "/images/skills_icons/cassandra.png"
                };
                if (arrayOfSkillImages.hasOwnProperty(skill_title.toLowerCase())) {
                    return arrayOfSkillImages[skill_title.toLowerCase()];
                }
                return "/images/skills_icons/skill.png";
            },
            getProjectMainImage(project) {
                let mainImage = "";

                let images = project.images;
                images.forEach(image => {
                    if (image.is_main) {
                        mainImage = image;
                    }
                });

                return mainImage.src;
            },
            setDummyUser() {
                this.currentUser = this.$store.state.dummyUser;
            },
            setDefaultRates() {
                if (this.currentUser) {
                    this.currentPayment = this.currentUser.payment_info[0];
                    this.currentAvailability = this.currentUser.availability_info[0];
                }
            }
        },
        mounted() {
            // if there is no user or the preview is true, set dummy user
            if (!this.currentUser || this.is_preview) {
                this.setDummyUser();
            }

            // set default payment and availability:
            this.setDefaultRates();
        }
    }
</script>

<style lang="scss" scoped>
    @import url(//db.onlinewebfonts.com/c/0be7748549934c0e481bdb7b8ba5270f?family=Gotham+Pro+Black);
    .hideOnPhone {
        @media only screen and (max-width: 765px) {
            display: none !important;
        }
    }
    
    .hideOnNotPhone {
        @media only screen and (min-width: 765px) {
            display: none !important;
        }
    }
    
    .hideOnDesktop {
        @media only screen and (min-width: 1280px) {
            display: none !important;
        }
    }
    
    .themeWrapper {
        width: 100%;
        max-width: 1920px;
        background: white;
        font-family: Roboto, sans-serif;
        .transition-line {
            position: relative;
            margin-top: -4px;
            width: 100%;
            height: 2px;
            background: #DEDEDE;
            border: 1px solid #DEDEDE;
            z-index: 0;
            @media screen and (max-width: 599px) {
                height: 1px;
                margin-top: -3px;
            }
        }
        //mobile frequency
        .mobile-frequency{
           font-family: Gotham Pro;
           font-style: normal;
            font-weight: 300;
            font-size: 14px;
            line-height: 13px;
            text-align: center;
            letter-spacing: 0.2em;
            text-transform: capitalize;
            color: #333333;
        }
        .mobile-frequency.active{
            font-size:18px;
            font-weight: bold;
        }
        .mobile-rate-text{
            margin-top:5px;
            font-family: Gotham Pro;
            font-size:24px;
            line-height: 14px;
        }
        .mobile-frequency-rate-usd{
            margin-top:9px;
            font-family: Gotham Pro;
            font-size: 14px;
            line-height: 14px;
        }
        //mobile frequency

        .mobileThemeBar {
            background: #FFFFFF;
            box-shadow: 1px 6px 6px rgba(0, 0, 0, 0.1);
            height: 80px;
            padding-left: 10px;
            padding-right: 10px;
            justify-content: space-between;
            .avatar {
                margin-right: 37px;
                border-radius: 24px;
                img {
                    width: 180px;
                    height: 180px;
                    border-radius: 50%;
                }
                @media only screen and (max-width: 765px) {
                    margin-right: 15px;
                    img {
                        width: 50px;
                        height: 50px;
                    }
                }
                @media only screen and (min-width: 1600px) {
                    img {
                        width: 197px;
                        height: 197px;
                        border-radius: 50%;
                    }
                }
            }
            .info {
                display: flex;
                flex-direction: column;
                @media only screen and (max-width: 765px) {
                    margin-top: 0;
                }
                .user-name {
                    margin-left: -2px;
                    font-style: normal;
                    font-weight: 700;
                    font-size: 30px;
                    color: #333333;
                    @media only screen and (max-width: 765px) {
                        font-size: 16px;
                    }
                    @media only screen and (min-width: 1600px) {
                        font-size: 50px;
                        line-height: normal;
                    }
                }
                .job-title {
                    font-style: normal;
                    font-weight: normal;
                    font-size: 25px;
                    color: #000000;
                    img {
                        width: 60px;
                        height: 60px;
                        margin-left: 20px;
                    }
                    @media only screen and (max-width: 765px) {
                        font-size: 12px;
                    }
                    @media only screen and (min-width: 1600px) {
                        font-size: 30px;
                    }
                }
                .social-icons {
                    margin-top: 42px;
                    width: 20vw;
                    display: flex;
                    justify-content: space-between;
                    overflow-x: auto;
                    @media only screen and (max-width: 765px) {
                        width: 100%;
                    }
                    img {
                        width: 24px;
                        height: 24px;
                        @media only screen and (max-width: 765px) {
                            margin-right: 25px;
                        }
                    }
                    img:last-child {
                        margin-right: 0;
                    }
                }
            }
            .hire-me-btn-mobile {
                a {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    height: 30px;
                    width: 90px;
                    background: white;
                    border: 1px solid #5289E7;
                    color: #5289E7;
                    font-size: 13px;
                    border-radius: 35px;
                }
            }
            .menu-icon {
                img {
                    width: 18px;
                    height: 12px;
                    margin-left: 5px;
                }
            }
        }
        .mainThemeBar {
            padding-top: 40px;
            padding-left: 5%;
            padding-right: 5%;
            flex-wrap: wrap;
            @media only screen and (max-width: 765px) {
                padding-top: 0;
            }
            .left {
                display: flex;
                align-items: center;
                @media only screen and (max-width: 765px) {
                    align-items: center;
                }
                .avatar {
                    margin-right: 37px;
                    border-radius: 24px;
                    img {
                        width: 180px;
                        height: 180px;
                        border-radius: 50%;
                    }
                    @media only screen and (max-width: 765px) {
                        margin-right: 15px;
                        img {
                            width: 50px;
                            height: 50px;
                        }
                    }
                    @media only screen and (min-width: 1600px) {
                        img {
                            width: 197px;
                            height: 197px;
                            border-radius: 50%;
                        }
                    }
                }
                .info {
                    display: flex;
                    flex-direction: column;
                    @media only screen and (max-width: 765px) {
                        margin-top: 5px;
                    }
                    .user-name {
                        margin-left: -2px;
                        font-style: normal;
                        font-weight: bold;
                        font-size: 30px;
                        color: #333333;
                        @media only screen and (max-width: 765px) {
                            font-size: 16px;
                        }
                        @media only screen and (min-width: 1600px) {
                            font-size: 50px;
                            line-height: normal;
                        }
                    }
                    .job-title {
                        font-style: normal;
                        font-weight: normal;
                        font-size: 25px;
                        color: #000000;
                        img {
                            width: 60px;
                            height: 60px;
                            margin-left: 20px;
                        }
                        @media only screen and (max-width: 765px) {
                            font-size: 12px;
                        }
                        @media only screen and (min-width: 1600px) {
                            font-size: 30px;
                        }
                    }
                    .social-icons {
                        margin-top: 42px;
                        width: 20vw;
                        display: flex;
                        justify-content: space-between;
                        overflow-x: auto;
                        @media only screen and (max-width: 765px) {
                            width: 100%;
                        }
                        img {
                            width: 24px;
                            height: 24px;
                            @media only screen and (max-width: 765px) {
                                margin-right: 25px;
                            }
                        }
                        img:last-child {
                            margin-right: 0;
                        }
                    }
                }
                .media-btns {
                    display: flex;
                    margin-left: 27px;
                    .audio-btn {
                        margin-right: 27px;
                        @media only screen and (max-width: 765px) {
                            margin-right: 10px;
                        }
                    }
                    .audio-btn,
                    .video-btn {
                        a {
                            width: 122px;
                            height: 43px;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            border-radius: 25px;
                            border: 1px solid #5289E7;
                            font-size: 19px;
                            color: #5289E7;
                            img {
                                width: 19px;
                                height: 15px;
                                margin-right: 6px;
                            }
                            @media only screen and (max-width: 600px) {
                                width: auto;
                                height: auto;
                                border: none;
                                img {
                                    margin-right: 0;
                                    width: 22px;
                                    height: 18px;
                                }
                            }
                        }
                    }
                }
            }
            .right {
                .hourly-rate {
                    margin-right: 66px;
                    @media only screen and (max-width: 765px) {
                        margin-right: 27px;
                    }
                }
                .rate-options {
                    span {
                        font-weight: 300;
                        font-size: 14px;
                        &:hover {
                            cursor: pointer;
                        }
                    }
                    span.active {
                        font-weight: bold;
                    }
                }
                .weekly-availability {
                    margin-right: 40px;
                    @media only screen and (max-width: 765px) {
                        margin-right: 19px;
                    }
                }
                .hourly-rate-text {
                    &:first-letter {
                        text-transform: uppercase;
                    }
                    text-align: left !important;
                    font-style: normal;
                    font-weight: normal;
                    font-size: 30px;
                    line-height: 60px;
                    @media only screen and (max-width: 765px) {
                        font-size: 12px;
                    }
                    @media only screen and (min-width: 1600px) {
                        font-size: 30px;
                        line-height: normal;
                    }
                }
                .hourly-rate-text.light {
                    font-style: normal;
                    font-weight: normal;
                    font-size: 16px;
                    line-height: 20px;
                    @media only screen and (min-width: 1600px) {
                        font-size: 20px;
                        line-height: 30px;
                    }
                }
                .hire-me-btn {
                    a {
                        font-size: 24px;
                        border-radius: 35px;
                        background: white;
                        border: 1px solid #5289E7;
                        color: #5289E7;
                        height: 67px;
                        width: 217px;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        @media only screen and (max-width: 765px) {
                            font-size: 12px;
                            height: 34px;
                            width: 105px;
                            border-radius: 35px;
                        }
                        @media only screen and (min-width: 1600px) {
                            font-size: 30px;
                            height: 67px;
                        }
                    }
                }
            }
        }
        .tabs-bar {
            margin-top: 30px;
            @media only screen and (max-width: 765px) {
                margin-top: 10px;
            }
            .tab-text {
                font-style: normal;
                font-weight: normal;
                font-size: 25px;
                line-height: 37px;
                color: #000000;
                padding-bottom: 9px;
                position: relative;
                @media only screen and (max-width: 765px) {
                    font-size: 12px;
                    margin-right: 10px;
                    margin-left: 10px;
                    padding-bottom: 0;
                }
            }
            .tab-text:not(:last-child) {
                margin-right: 70px;
            }
            .tab-text.active {
                opacity: 1;
                z-index: 1;
            }
            .tab-text.active:before {
                content: "";
                position: absolute;
                bottom: 0;
                height: 1px;
                width: 125%;
                margin-left: -12.5%;
                border: 3px solid #5289E7;
                border-radius: 5px;
                @media only screen and (max-width: 765px) {
                    border: 2px solid #5289E7;
                }
            }
            .tab-text:hover {
                cursor: pointer;
            }
            .arrow {
                img {
                    width: 30px;
                    height: 30px;
                }
            }
        }
        .main-tab-content {
            margin-top: 86px;
            min-height: 550px;
            padding-bottom: 45px;
            @media only screen and (max-width: 765px) {
                margin-top: 35px;
            }
            .portfolio {
                .portfolioSlides {
                    padding-left: 40px;
                    padding-right: 40px;
                    display: flex;
                    justify-content: center;
                    flex-direction: column;
                    @media only screen and (max-width: 765px) {
                        padding-left: 0px;
                        padding-right: 0px;
                    }
                    @media only screen and (min-width: 1600px) {
                        padding-left: 135px;
                        padding-right: 135px;
                    }
                    img {
                        margin-top: 25px;
                        margin-right: 25px;
                        margin-left: 25px;
                        width: 510px !important;
                        height: 400px;
                        border-radius: 30px;
                        @media only screen and (max-width: 765px) {
                            width: 177px !important;
                            height: 139px;
                        }
                    }
                    .slide-text {
                        margin-top: 15px;
                        font-style: normal;
                        font-weight: normal;
                        font-size: 20px;
                        line-height: 23px;
                        color: #333333;
                        @media only screen and (max-width: 765px) {
                            font-size: 10px;
                            line-height: 12px;
                            margin-bottom: 25px;
                        }
                    }
                }
            }
            .skills-tabs {
                display: flex;
                justify-content: center;
                overflow-x: auto;
                width: 100%;
                @media only screen and (max-width: 765px) {
                    justify-content: space-between;
                    margin-top: 30px;
                }
                .skills-tab-text {
                    font-style: normal;
                    font-weight: normal;
                    font-size: 25px;
                    line-height: 37px;
                    padding: 16px 33px;
                    color: #000000;
                    white-space: nowrap;
                    @media only screen and (max-width: 765px) {
                        font-size: 10px;
                        line-height: 15px;
                        padding: 13px 29px;
                    }
                }
                .skills-tab-text:hover {
                    cursor: pointer;
                }
                .skills-tab-text.active {
                    font-style: normal;
                    font-weight: normal;
                    background: #5289E7;
                    border-radius: 35px;
                    color: #FFFFFF;
                }
            }
            .skills-icons-bar {
                margin-top: 35.67px;
                padding-bottom: 10px;
                display: flex;
                justify-content: center;
                overflow-x: auto;
                .skill-item {
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    justify-content: center;
                    margin-right: 20px;
                    color: black;
                    font-weight: bold;
                    span {
                        margin-top: 7px;
                    }
                }
                img {
                    width: 30px;
                    height: 30px;
                    margin-top: 10px;
                    @media only screen and (max-width: 765px) {
                        width: 30px;
                        height: 30px;
                    }
                }
                img:last-child {
                    margin-right: 0;
                }
            }
            .work {
                display: flex;
                flex-wrap: wrap;
                justify-content: space-between;
                padding-left: 40px;
                padding-right: 40px;
                .work-item {
                    margin-bottom: 100px;
                    display: flex;
                    flex-basis: 48%;
                    .work-icon {
                        margin-right: 35px;
                        img {
                            width: 59px;
                            height: 59px;
                        }
                    }
                    .work-info {
                        .date {
                            margin-top: 6px;
                            font-weight: normal;
                            font-size: 16px;
                            line-height: 15px;
                            color: #000000;
                        }
                        .work-title {
                            margin-top: 10px;
                            font-weight: 300;
                            font-size: 16px;
                            line-height: 15px;
                            color: #000000;
                        }
                        .work-details {
                            margin-top: 35px;
                            .company-name {
                                font-size: 20px;
                                line-height: 14px;
                                color: #000000;
                            }
                            .job-roles {
                                font-size: 16px;
                                color: #000000;
                                white-space: pre-line;
                                line-height: 24px;
                                font-weight: 300;
                            }
                        }
                    }
                }
            }
            .education {}
        }

        
    }
    
    @media only screen and (max-width: 765px) {
        // all phone styles
        .themeWrapper {
            width: 100%;
            max-width: 1920px;
            background: white;
            border-radius: 15px;
            .mobileThemeBar {
                background: #FFFFFF;
                box-shadow: 1px 6px 6px rgba(0, 0, 0, 0.1);
                height: 80px;
                padding-left: 10px;
                padding-right: 10px;
                justify-content: space-between;
                .avatar {
                    margin-right: 37px;
                    border-radius: 24px;
                    img {
                        width: 180px;
                        height: 180px;
                        border-radius: 50%;
                    }
                    @media only screen and (max-width: 765px) {
                        margin-right: 15px;
                        img {
                            width: 50px;
                            height: 50px;
                        }
                    }
                    @media only screen and (min-width: 1600px) {
                        img {
                            width: 280px;
                            height: 280px;
                            border-radius: 50%;
                        }
                    }
                }
                .info {
                    display: flex;
                    flex-direction: column;
                    @media only screen and (max-width: 765px) {
                        margin-top: 0;
                    }
                    .user-name {
                        margin-left: -2px;
                        font-style: normal;
                        font-weight: bold;
                        font-size: 30px;
                        color: #333333;
                        @media only screen and (max-width: 765px) {
                            font-size: 16px;
                        }
                        @media only screen and (min-width: 1600px) {
                            font-size: 50px;
                            line-height: normal;
                        }
                    }
                    .job-title {
                        font-style: normal;
                        font-weight: normal;
                        font-size: 25px;
                        color: #000000;
                        img {
                            width: 60px;
                            height: 60px;
                            margin-left: 20px;
                        }
                        @media only screen and (max-width: 765px) {
                            font-size: 12px;
                        }
                        @media only screen and (min-width: 1600px) {
                            font-size: 30px;
                        }
                    }
                    .social-icons {
                        margin-top: 42px;
                        width: 20vw;
                        display: flex;
                        justify-content: space-between;
                        overflow-x: auto;
                        @media only screen and (max-width: 765px) {
                            width: 100%;
                        }
                        img {
                            width: 24px;
                            height: 24px;
                            @media only screen and (max-width: 765px) {
                                margin-right: 25px;
                            }
                        }
                        img:last-child {
                            margin-right: 0;
                        }
                    }
                }
                .hire-me-btn-mobile {
                    a {
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        border-radius: 35px;
                        height: 30px;
                        width: 90px;
                        font-size: 13px;
                        background: white;
                        border: 1px solid #5289E7;
                        color: #5289E7;
                    }
                }
                .menu-icon {
                    img {
                        width: 18px;
                        height: 12px;
                        margin-left: 5px;
                    }
                }
            }
            .mainThemeBar {
                padding-top: 40px;
                padding-left: 5%;
                padding-right: 5%;
                flex-wrap: wrap;
                box-shadow: 1px 6px 6px rgba(0, 0, 0, 0.1);
                padding-bottom: 18px;
                @media only screen and (max-width: 765px) {
                    padding-top: 16px;
                }
                .left {
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    width: 100%;
                    @media only screen and (max-width: 765px) {
                        align-items: center;
                    }
                    .avatar {
                        margin-right: 37px;
                        border-radius: 24px;
                        img {
                            width: 180px;
                            height: 180px;
                            border-radius: 50%;
                        }
                        @media only screen and (max-width: 765px) {
                            margin-right: 15px;
                            img {
                                width: 50px;
                                height: 50px;
                            }
                        }
                        @media only screen and (min-width: 1600px) {
                            img {
                                width: 280px;
                                height: 280px;
                                border-radius: 50%;
                            }
                        }
                    }
                    .info {
                        display: flex;
                        flex-direction: column;
                        @media only screen and (max-width: 765px) {
                            margin-top: 0;
                        }
                        .user-name {
                            margin-left: -2px;
                            font-style: normal;
                            font-weight: bold;
                            font-size: 30px;
                            color: #333333;
                            @media only screen and (max-width: 765px) {
                                font-size: 16px;
                            }
                            @media only screen and (min-width: 1600px) {
                                font-size: 50px;
                                line-height: normal;
                            }
                        }
                        .job-title {
                            font-style: normal;
                            font-weight: normal;
                            font-size: 25px;
                            color: #000000;
                            img {
                                width: 60px;
                                height: 60px;
                                margin-left: 20px;
                            }
                            @media only screen and (max-width: 765px) {
                                font-size: 12px;
                            }
                            @media only screen and (min-width: 1600px) {
                                font-size: 30px;
                            }
                        }
                        .social-icons {
                            margin-top: 42px;
                            width: 20vw;
                            display: flex;
                            justify-content: space-between;
                            overflow-x: auto;
                            @media only screen and (max-width: 765px) {
                                width: 100%;
                            }
                            img {
                                width: 24px;
                                height: 24px;
                                @media only screen and (max-width: 765px) {
                                    margin-right: 25px;
                                }
                            }
                            img:last-child {
                                margin-right: 0;
                            }
                        }
                    }
                }
                .right {
                    margin-top: 25px;
                    width: 100%;
                    justify-content: space-between;
                    .hourly-rate {
                        margin-right: 20px;
                    }
                    .weekly-availability {
                        margin-right: 40px;
                        @media only screen and (max-width: 765px) {
                            margin-right: 19px;
                        }
                    }
                    .hourly-rate-text {
                        font-size: 30px;
                        line-height: 16px;
                        font-weight: bold;
                        @media only screen and (max-width: 765px) {
                            font-size: 12px;
                        }
                        @media only screen and (min-width: 1600px) {
                            font-size: 30px;
                            line-height: normal;
                        }
                    }
                    .hourly-rate-text.light {
                        font-size: 16px;
                        line-height: 20px;
                        text-align: left !important;
                        @media only screen and (min-width: 1600px) {
                            font-size: 20px;
                            line-height: 30px;
                        }
                    }
                    .hire-me-btn {
                        a {
                            font-size: 24px;
                            background: white;
                            border: 1px solid #5289E7;
                            color: #5289E7;
                            border-radius: 35px;
                            height: 60px;
                            width: 250px;
                            display: flex;
                            justify-content: center;
                            align-items: center;
                            @media only screen and (max-width: 765px) {
                                font-size: 12px;
                                height: 34px;
                                width: 105px;
                                border-radius: 35px;
                            }
                            @media only screen and (min-width: 1600px) {
                                font-size: 30px;
                                height: 70px;
                            }
                        }
                    }
                }
            }
            .tabs-bar {
                margin-top: 30px;
                overflow: auto;
                padding-left: 16px;
                padding-right: 16px;
                @media only screen and (max-width: 765px) {
                    margin-top: 28px;
                }
                .tab-text {
                    font-style: normal;
                    font-weight: normal;
                    font-size: 25px;
                    line-height: 37px;
                    color: #000000;
                    padding-bottom: 9px;
                    position: relative;
                    @media only screen and (max-width: 765px) {
                        font-size: 12px;
                        margin-right: 10px;
                        margin-left: 10px;
                        padding-bottom: 0;
                    }
                }
                .tab-text:not(:last-child) {
                    margin-right: 37px;
                }
                .tab-text.active {
                    opacity: 1;
                    z-index: 1;
                }
                .tab-text.active:before {
                    content: "";
                    position: absolute;
                    bottom: 0;
                    height: 1px;
                    width: 125%;
                    margin-left: -12.5%;
                    border: 3px solid #5289E7;
                    border-radius: 5px;
                    @media only screen and (max-width: 765px) {
                        border: 2px solid #5289E7;
                    }
                }
                .tab-text:hover {
                    cursor: pointer;
                }
                .arrow {
                    img {
                        width: 30px;
                        height: 30px;
                    }
                }
            }
            .main-tab-content {
                margin-top: 86px;
                min-height: 550px;
                padding-bottom: 45px;
                @media only screen and (max-width: 765px) {
                    margin-top: 35px;
                }
                .portfolio {
                    .portfolioSlides {
                        padding-left: 40px;
                        padding-right: 40px;
                        @media only screen and (max-width: 765px) {
                            padding-left: 0px;
                            padding-right: 0px;
                        }
                        @media only screen and (min-width: 1600px) {
                            padding-left: 135px;
                            padding-right: 135px;
                        }
                        display: flex;
                        justify-content: center;
                        img {
                            margin-top: 25px;
                            margin-right: 25px;
                            margin-left: 25px;
                            width: 510px !important;
                            height: 400px;
                            @media only screen and (max-width: 765px) {
                                padding: 10px;
                                width: 500px !important;
                                height: auto;
                            }
                        }
                        .slide-text {
                            margin-top: 15px;
                            font-style: normal;
                            font-weight: normal;
                            font-size: 20px;
                            line-height: 23px;
                            color: #333333;
                            @media only screen and (max-width: 765px) {
                                font-size: 12px;
                                line-height: 12px;
                                margin-bottom: 25px;
                            }
                        }
                    }
                }
                .skills-tabs {
                    display: flex;
                    justify-content: center;
                    overflow-x: auto;
                    width: 100%;
                    @media only screen and (max-width: 765px) {
                        justify-content: space-between;
                        margin-top: 30px;
                    }
                    .skills-tab-text {
                        font-style: normal;
                        font-weight: normal;
                        font-size: 25px;
                        line-height: 37px;
                        padding: 16px 33px;
                        color: #000000;
                        white-space: nowrap;
                        @media only screen and (max-width: 765px) {
                            font-size: 10px;
                            line-height: 15px;
                            padding: 13px 29px;
                        }
                        @media only screen and (max-width: 599px){
                            margin-left:5px;
                        }
                    }
                    .skills-tab-text:hover {
                        cursor: pointer;
                    }
                    .skills-tab-text.active {
                        font-style: normal;
                        font-weight: normal;
                        background: #5289E7;
                        border-radius: 35px;
                        color: #FFFFFF;
                    }
                }
                .skills-icons-bar {
                    margin-top: 35.67px;
                    padding-bottom: 10px;
                    display: flex;
                    justify-content: center;
                    overflow-x: auto;
                    img {
                        width: 30px;
                        height: 30px;
                        @media only screen and (max-width: 765px) {
                            width: 30px;
                            height: 30px;
                        }
                    }
                    img:last-child {
                        margin-right: 0;
                    }
                }
                .work {
                    display: flex;
                    flex-wrap: wrap;
                    justify-content: space-between;
                    padding-left: 40px;
                    padding-right: 40px;
                    .work-item {
                        margin-bottom: 100px;
                        display: flex;
                        flex-basis: 100%;
                        .work-icon {
                            margin-right: 35px;
                            img {
                                width: 48px;
                                height: 48px;
                            }
                        }
                        .work-info {
                            .date {
                                font-weight: normal;
                                font-size: 16px;
                                line-height: 15px;
                                color: #000000;
                            }
                            .work-title {
                                margin-top: 10px;
                                font-weight: 300;
                                font-size: 16px;
                                line-height: 15px;
                                color: #000000;
                            }
                            .work-details {
                                margin-top: 35px;
                                .company-name {
                                    font-size: 20px;
                                    line-height: 14px;
                                    color: #000000;
                                }
                                .job-roles {
                                    font-size: 16px;
                                    color: #000000;
                                    white-space: pre-line;
                                    line-height: 24px;
                                    font-weight: 300;
                                }
                            }
                        }
                    }
                }
                .education {}
            }
        }
    }
    
    @media only screen and (max-width: 1280px) and (min-width: 765px) {
        .themeWrapper {
            .mainThemeBar {
                box-shadow: 1px 6px 6px rgba(0, 0, 0, 0.1);
                padding-bottom: 18px;
                margin-bottom: 15px;
                .left {
                    margin-bottom: 45px;
                    justify-content: space-between;
                    width: 100%;
                    .avatar {
                        img {
                            width: 100px;
                            height: 100px;
                        }
                    }
                    .info {
                        .user-name {
                            font-size: 32px;
                        }
                        .job-title {
                            font-size: 20px;
                            img {}
                        }
                        .social-icons {
                            img {}
                            img:last-child {}
                        }
                    }
                    .menu-icon {
                        img {
                            width: 25px;
                            height: 25px;
                            margin-top: 7px;
                        }
                    }
                }
                .right {
                    justify-content: space-between;
                    width: 100%;
                    .hourly-rate {}
                    .weekly-availability {}
                    .hourly-rate-text {}
                    .hourly-rate-text.light {}
                    .hire-me-btn {
                        a {}
                    }
                }
            }
            .tabs-bar {
                margin-top: 30px;
                overflow: auto;
                padding-left: 16px;
                padding-right: 16px;
                @media only screen and (max-width: 765px) {
                    margin-top: 28px;
                }
                .tab-text {
                    font-style: normal;
                    font-weight: normal;
                    font-size: 25px;
                    line-height: 37px;
                    color: #000000;
                    padding-bottom: 9px;
                    position: relative;
                    @media only screen and (max-width: 765px) {
                        font-size: 12px;
                        margin-right: 10px;
                        margin-left: 10px;
                        padding-bottom: 0;
                    }
                }
                .tab-text:not(:last-child) {
                    margin-right: 37px;
                }
                .tab-text.active {
                    opacity: 1;
                    z-index: 1;
                }
                .tab-text.active:before {
                    content: "";
                    position: absolute;
                    bottom: 0;
                    height: 1px;
                    width: 125%;
                    margin-left: -12.5%;
                    border: 3px solid #5289E7;
                    border-radius: 5px;
                    @media only screen and (max-width: 765px) {
                        border: 2px solid #5289E7;
                    }
                }
                .tab-text:hover {
                    cursor: pointer;
                }
                .arrow {
                    img {
                        width: 30px;
                        height: 30px;
                    }
                }
            }
            .main-tab-content {
                margin-top: 86px;
                min-height: 550px;
                padding-bottom: 45px;
                @media only screen and (max-width: 765px) {
                    margin-top: 35px;
                }
                .portfolio {
                    .portfolioSlides {
                        padding-left: 40px;
                        padding-right: 40px;
                        @media only screen and (max-width: 765px) {
                            padding-left: 0px;
                            padding-right: 0px;
                        }
                        @media only screen and (min-width: 1600px) {
                            padding-left: 135px;
                            padding-right: 135px;
                        }
                        display: flex;
                        justify-content: center;
                        img {
                            margin-top: 25px;
                            margin-right: 25px;
                            margin-left: 25px;
                            width: 510px !important;
                            height: 400px;
                            @media only screen and (max-width: 765px) {
                                width: 177px !important;
                                height: 139px;
                            }
                        }
                        .slide-text {
                            margin-top: 15px;
                            font-style: normal;
                            font-weight: normal;
                            font-size: 20px;
                            line-height: 23px;
                            color: #333333;
                            @media only screen and (max-width: 765px) {
                                font-size: 10px;
                                line-height: 12px;
                                margin-bottom: 25px;
                            }
                        }
                    }
                }
                .skills-tabs {
                    display: flex;
                    justify-content: center;
                    overflow-x: auto;
                    width: 100%;
                    @media only screen and (max-width: 765px) {
                        justify-content: space-between;
                        margin-top: 30px;
                    }
                    .skills-tab-text {
                        font-style: normal;
                        font-weight: normal;
                        font-size: 25px;
                        line-height: 37px;
                        padding: 16px 33px;
                        color: #000000;
                        white-space: nowrap;
                        @media only screen and (max-width: 959px) {
                            font-size: 18px;
                        }
                        @media only screen and (max-width: 765px) {
                            font-size: 10px;
                            line-height: 15px;
                            padding: 13px 29px;
                        }
                    }
                    .skills-tab-text:hover {
                        cursor: pointer;
                    }
                    .skills-tab-text.active {
                        font-style: normal;
                        font-weight: normal;
                        background: #5289E7;
                        border-radius: 35px;
                        color: #FFFFFF;
                    }
                }
                .skills-icons-bar {
                    margin-top: 35.67px;
                    padding-bottom: 10px;
                    display: flex;
                    justify-content: center;
                    overflow-x: auto;
                    img {
                        width: 30px;
                        height: 30px;
                        @media only screen and (max-width: 765px) {
                            width: 30px;
                            height: 30px;
                        }
                    }
                    img:last-child {
                        margin-right: 0;
                    }
                }
                .work {
                    display: flex;
                    flex-wrap: wrap;
                    justify-content: space-between;
                    padding-left: 40px;
                    padding-right: 40px;
                    .work-item {
                        margin-bottom: 100px;
                        display: flex;
                        flex-basis: 100%;
                        .work-icon {
                            margin-right: 35px;
                            img {
                                width: 48px;
                                height: 48px;
                            }
                        }
                        .work-info {
                            .date {
                                font-weight: normal;
                                font-size: 16px;
                                line-height: 15px;
                                color: #000000;
                            }
                            .work-title {
                                margin-top: 10px;
                                font-weight: 300;
                                font-size: 16px;
                                line-height: 15px;
                                color: #000000;
                            }
                            .work-details {
                                margin-top: 35px;
                                .company-name {
                                    font-size: 20px;
                                    line-height: 14px;
                                    color: #000000;
                                }
                                .job-roles {
                                    font-size: 16px;
                                    color: #000000;
                                    white-space: pre-line;
                                    line-height: 24px;
                                    font-weight: 300;
                                }
                            }
                        }
                    }
                }
                .education {}
            }
        }
    }
    /* scroll bar styles */
    
    #style-2::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        border-radius: 0;
    }
    
    #style-2::-webkit-scrollbar {
        width: 4px;
        background-color: rgba(255, 255, 255, 0.35);
    }
    
    #style-2::-webkit-scrollbar-thumb {
        border-radius: 1px;
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, .1);
        background-color: white;
    }
    
    #style-1::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        border-radius: 0;
    }
    
    #style-1::-webkit-scrollbar {
        height: 4px;
        background-color: rgba(255, 255, 255, 0.35);
    }
    
    #style-1::-webkit-scrollbar-thumb {
        border-radius: 1px;
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, .1);
        background-color: white;
    }
</style>

<style lang="scss">
    /*slick slides*/
    
    .slick-dots {
        bottom: -40px !important;
        margin-top: 20px;
    }
    
    .slick-dots li button:before {
        font-size: 10px !important;
        @media only screen and (max-width: 765px) {
            font-size: 6px !important;
        }
    }
    
    .slick-dots li.slick-active button:before {
        opacity: 1;
        color: #5289E7;
    }
    
    .slick-dots li.slick-active button {
        background-color: #5289E7;
    }
    
    .slick-dots li button {
        background-color: #DEDEDE;
        border: none;
        width: 12px;
        height: 12px;
    }
</style>