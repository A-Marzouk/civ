<template>
    <div class="d-flex justify-content-center w-100" v-if="user">
        <div class="themeWrapper">
            <div class="mainThemeBar d-flex justify-content-between align-items-center">
                <div class="left">
                    <div class="d-flex">
                        <div class="avatar">
                            <img :src="personalInfo.profile_pic" alt="profile pic">
                        </div>
                        <div class="info">
                            <div class="user-name">
                                {{personalInfo.full_name}}
                            </div>
                            <div class="job-title d-flex">
                                <div>
                                   {{personalInfo.designation}}
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
                            ${{paymentInfo.salary}}
                        </div>
                        <div class="hourly-rate-text light text-center">
                            {{paymentInfo.salary_frequency}} Rate
                        </div>
                    </div>
                    <div class="weekly-availability">
                        <div class="hourly-rate-text">
                            {{paymentInfo.available_hours}} hours
                        </div>
                        <div class="hourly-rate-text light text-center">
                            {{paymentInfo.available_hours_frequency}} Availability
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
                <div  class="portfolio" v-show="activeTab === 'portfolio'">
                    <slick class="portfolioSlides" ref="slick" :options="slickOptions">
                        <div class="d-flex flex-column align-items-center" v-for="(project,index) in projects" :key="project.id">
                            <img :src="getProjectMainImage(project)" alt="portfolio image">
                            <div class="slide-text">
                                {{project.name}}
                            </div>
                        </div>
                    </slick>
                </div>
                <div  class="skills" v-show="activeTab === 'skills' ">
                    <div class="w-100 d-flex flex-column align-items-center justify-content-center">
                        <div class="skills-tabs d-flex justify-content between">
                            <div class="skills-tab-text" :class="{active : activeSkillTab === 'Programming_languages'}"
                                 @click="setActiveSkillTab('Programming_languages')">
                                Programming Languages
                            </div>
                            <div class="skills-tab-text" :class="{active : activeSkillTab === 'Frameworks'}"
                                 @click="setActiveSkillTab('Frameworks')">
                                Frameworks
                            </div>
                            <div class="skills-tab-text" :class="{active : activeSkillTab === 'Design'}"
                                 @click="setActiveSkillTab('Design')">
                                Design Skills
                            </div>
                            <div class="skills-tab-text mr-0" :class="{active : activeSkillTab === 'Software'}"
                                 @click="setActiveSkillTab('Software')">
                                Software
                            </div>
                        </div>

                        <div class="skills">
                            <div class="skill-item" v-for="(skill,index) in skills" :key="skill.id" v-show="activeSkillTab === skill.category">
                                <img :src="getSkillIcon(skill.title)" alt=""> {{skill.title}}
                            </div>
                        </div>

                    </div>
                </div>
                <div  class="work" v-show="activeTab === 'work'">
                    <div class="work-item" v-for="(work,index) in works" :key="work.id + '_work'">
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
                                        {{work.date_from}} - {{work.present ? "present" : work.date_to}}
                                    </div>
                                    <div class="work-title">
                                        {{work.job_title}}
                                    </div>
                                </div>
                            </div>
                            <div class="work-details">
                                <div class="company-name">
                                   {{work.company_name}}
                                </div>
                                <div class="job-roles">
                                   {{work.description}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div  class="work" v-show="activeTab === 'education'">
                    <div class="work-item" v-for="(education,index) in educations" :key="educations.id + '_edu'">
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
                                        {{education.date_from}} - {{education.present ? "present" : education.date_to}}
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
                                   -  {{education.institution_type}}
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
        props: ['user'],
        components: {
            Slick
        },
        data() {
            return {
                activeTab: 'portfolio',
                activeSkillTab: 'Programming_languages',
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
                // user info
                personalInfo:this.user.personal_info,
                paymentInfo:this.user.payment_info,
                projects:this.user.projects,
                skills:this.user.skills,
                works:this.user.work_experience,
                educations:this.user.education,
            }
        },
        methods: {
            setActiveTab(tabName) {
                this.activeTab = tabName;
            },
            setActiveSkillTab(tabName) {
                this.activeSkillTab = tabName;
            },
            getProjectMainImage(project){
                let mainImage = '';

                let images = project.images;
                images.forEach((image) => {
                    if (image.is_main){
                        mainImage = image;
                    }
                });

                return mainImage.src;
            },
            getSkillIcon(skill_title) {
                let arrayOfSkillImages = {
                    'ui design': '/images/skills_icons/user_interface.png',
                    'ux design': '/images/skills_icons/user_experience.png',
                    'logo design': '/images/skills_icons/logo_design.png',
                    'animation': '/images/skills_icons/animation.jpg',
                    'motion graphics': '/images/skills_icons/motion_graphics.png',
                    'illustration': '/images/skills_icons/illustration.png',
                    'advertising': '/images/skills_icons/advertising.png',
                    'branding': '/images/skills_icons/branding.png',
                    'brochure Design': '/images/skills_icons/brochure_design.png',
                    'website design': '/images/skills_icons/web_design.png',
                    'game designer': '/images/skills_icons/game_designer.png',
                    'character design': '/images/skills_icons/character_design.png',
                    'digital painting': '/images/skills_icons/digital_painting.png',
                    'creative director': '/images/skills_icons/creative_director.png',
                    'html / css': '/images/skills_icons/HTML.png',
                    // 2-

                    'adobe after effects': '/images/skills_icons/AE.png',
                    'sketch': '/images/skills_icons/Sketch.png',
                    'adobe illustrator': '/images/skills_icons/Illustrator.png',
                    'adobe xd': '/images/skills_icons/AdobeXD.png',
                    'photoshop': '/images/skills_icons/Photoshop.png',
                    'autocad': '/images/skills_icons/autocad.png',
                    'solidworks': '/images/skills_icons/solid_works.png',
                    'adobe flash': '/images/skills_icons/adobe_flash.png',
                    'digital drawing Tablet': '/images/skills_icons/digital_drawing_tablet.png',
                    'adobe indesign': '/images/skills_icons/indesign.png',
                    'coreldraw': '/images/skills_icons/corel_draw.png',
                    '3d max': '/images/skills_icons/3d_max.png',

                    // developer :
                    // 1-
                    'javascript': '/images/skills_icons/javascript.png',
                    'sql': '/images/skills_icons/mysql.png',
                    'java': 'resumeApp/resources/assets/images/skills_icons/java.png',
                    'c#': '/images/skills_icons/c#.png',
                    'python': '/images/skills_icons/python.png',
                    'php': '/images/skills_icons/php.png',
                    'c++': '/images/skills_icons/c_language.png',
                    'c': '/images/skills_icons/c_language.png',
                    'typescript': '/images/skills_icons/typescript.png',
                    'ruby': '/images/skills_icons/ruby.png',
                    'objective-C': '/images/skills_icons/objective_c.png',
                    'swift': '/images/skills_icons/swift.png',
                    'vb.net': '/images/skills_icons/vb_net.png',
                    'go': '/images/skills_icons/go.png',
                    'perl': '/images/skills_icons/perl.png',
                    'scala': '/images/skills_icons/scala.png',
                    'groovy': '/images/skills_icons/groovy.png',
                    'assembly': '/images/skills_icons/assembly.png',
                    'coffeescript': '/images/skills_icons/coffeeScript.png',
                    'vba': '/images/skills_icons/vba.png',
                    'r': '/images/skills_icons/r_lang.png',
                    'matlab': '/images/skills_icons/matlab.png',
                    'visual basic 6': '/images/skills_icons/matlab.png',
                    'lua': '/images/skills_icons/lua.png',
                    'haskell': '/images/skills_icons/haskell.png',
                    'html': '/images/skills_icons/HTML.png',
                    'css': '/images/skills_icons/CSS.png',
                    'laravel': '/images/skills_icons/laravel.png',
                    'phpstorm': '/images/skills_icons/phpstorm.png',

                    //2-
                    'angularjs': '/images/skills_icons/Angularjs.png',
                    'angular.js': '/images/skills_icons/Angularjs.png',
                    'node.js': '/images/skills_icons/node_js.png',
                    'nodejs': '/images/skills_icons/node_js.png',
                    '.net Core': '/images/skills_icons/netcore.png',
                    'react': '/images/skills_icons/react.png',
                    'cordova': '/images/skills_icons/cordava.png',
                    'firebase': '',
                    'xamarin': '',
                    'hadoop': '/images/skills_icons/hadoop.png',
                    'spark': '/images/skills_icons/spark.png',
                    'mysql': '/images/skills_icons/mysql.png',
                    'sql server': '/images/skills_icons/sql server.png',
                    'postgresql': '/images/skills_icons/postgreSQL.png',
                    'sqlite': '/images/skills_icons/SQLite.png',
                    'mongodb': '/images/skills_icons/mongoDB.png',
                    'oracle': '/images/skills_icons/Oracle.png',
                    'redis': '/images/skills_icons/redis.png',
                    'cassandra': '/images/skills_icons/cassandra.png'
                };
                if (arrayOfSkillImages.hasOwnProperty(skill_title.toLowerCase())) {
                    return arrayOfSkillImages[skill_title.toLowerCase()];
                }
                return '/images/skills_icons/skill.png';
            },
        },
        mounted() {

        }
    }
</script>

<style lang="scss" scoped>
    @import "resources/sass/themes/theme3.scss";

    .skills{
        margin-top: 40px;
        display: flex;
        .skill-item{
            margin-right:20px;
            font-size: 20px;
            color: black;
            font-weight: 600;
            display: flex;
            align-items: center;

            &:first-letter{
                text-transform: uppercase;
            }

            img{
                width: 30px;
                height: auto;
                margin-right: 8px;
            }
        }
    }

</style>
