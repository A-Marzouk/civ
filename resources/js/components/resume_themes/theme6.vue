<template>
    <div class="d-flex justify-content-center w-100" v-if="currentUser">
        <div class="freelancerCard w-100">
            <div class="row">

                <div class="col-lg-12 col-md-12 col-12 resumeCardRight">
                    <div class="showOnlyOnmd">
                        <!-- main card info -->
                        <div class="nameRow nameRowScoped" >

                            <div class="d-flex align-items-center">
                                <div class="imageCol">
                                    <div class="imageContainer" style="padding: 10px;">
                                        <img :src="currentUser.personal_info.profile_pic" alt="freelancer"
                                             class="freelancerImg"
                                             width="120" height="120">
                                    </div>
                                </div>

                                <div class="freelancerCardLeft">
                                    <div class="nameArea">
                                        <div class="nameCard">
                                            {{currentUser.personal_info.full_name}}
                                        </div>
                                        <div class="jobTitle" style="color: white; font-size: 14px; padding-top: 7px;"
                                             :id="'animatedText'+currentUser.id">
                                            {{currentUser.personal_info.about}}
                                        </div>

                                        <form action="/chat-room/start_conversation" method="post">
                                            <input type="hidden" name="freelancer_id" :value="currentUser.id">
                                            <input type="submit" value="TAP TO CHAT"
                                                   class="tap-to-chat cursorPointerOnHover"
                                                   style="background: none; border:none; outline: none;">
                                        </form>


                                        <div :id="'welcomeText'+currentUser.id" class="d-none">
                                            Hi, I am {{currentUser.personal_info.full_name}}, I am a {{currentUser.personal_info.designation}}, How
                                            can I help
                                            you ?
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="freelancerCardRight d-flex align-items-center">

                                <div class="row hireRow hireRowScoped w-100">
                                    <div class="col-md-4 text-center" style="font-size: 15px; color: white;">
                                    <span style="font-weight: bold;">
                                        {{Math.ceil(currentPayment.salary)}}
                                    </span>
                                        <div class="cardLabel" style="font-size: 13px; font-weight: normal;">Hourly
                                            rate
                                        </div>
                                    </div>

                                    <div class="col-md-4 text-center" style="font-size: 15px; color: white;">
                                        <span style="font-weight: bold;">
                                            <span>{{currentAvailability.available_hours }}</span>hours</span>
                                        <div class="cardLabel" style="font-size: 13px; font-weight: normal;">Weekly
                                            Availability
                                        </div>
                                    </div>

                                    <div class="col-md-4" style="padding: 0;">

                                        <div class="row text-center cardRow NoDecor">
                                            <a class="hireCardBtn btn-block showHireSection" href="javascript:void(0)"
                                               @click="showHireSection()">
                                                Hire me
                                            </a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- end of main card info -->
                    </div>


                    <div class="showOnlyOnsm">
                        <!-- main card info -->
                        <div class="row cardMainInfo_mob">
                            <div class="col-6">
                                <div class="imageContainer" style="padding: 20px 10px 10px 10px;">
                                    <img :src="getImageSrc(currentUser.personal_info.profile_pic)" alt="freelancer"
                                         class="freelancerImg"
                                         width="120" height="120">
                                </div>
                            </div>
                            <div class="col-6 resumeCardRight">
                                <div class="nameArea">
                                    <div class="nameCard">
                                        {{currentUser.personal_info.full_name}}
                                    </div>
                                    <div class="jobTitle" style="font-size: 17px; padding-left: 0; color: #c1d1ff"
                                         :id="'animatedText' + currentUser.id">
                                        {{currentUser.personal_info.designation}}
                                    </div>
                                    <div class="text-left" style="font-size: 15px; color: white; padding-top: 5px;">
                                        <div class="cardLabel" style="font-weight: 300; font-size:14px ;">Hourly rate :
                                            <span style="font-weight: bold;">
                                            $ {{Math.ceil(currentPayment.salary)}}
                                        </span>
                                        </div>
                                    </div>
                                    <div class="text-left" style="font-size: 15px; color: white; padding-top: 5px;">
                                        <div class="cardLabel" style="font-weight: 300; font-size:14px ;">Availability :
                                            <span style="font-weight: bold;">
                                                <span v-if="currentAvailability.available_hours !== null">{{currentAvailability.available_hours}}</span>
                                                h/week</span>
                                        </div>
                                    </div>
                                    <div :id="'welcomeText'+currentUser.id" class="d-none">
                                        Hi, I am {{currentUser.personal_info.full_name}}, I am a {{currentUser.personal_info.designation}}, How
                                        can I help
                                        you ?
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6" style="margin-top: -39px; padding-left: 28px;">
                                    <form action="/chat-room/start_conversation" method="post">
                                        <input type="hidden" name="freelancer_id" :value="currentUser.id">
                                        <input type="submit" value="TAP TO CHAT"
                                               class="tap-to-chat cursorPointerOnHover"
                                               style="background: none; border:none; outline: none;">
                                    </form>
                                </div>
                            </div>

                            <div class="col-12" style="padding: 10px 20px 16px 20px;">
                                <div class="text-center cardRow NoDecor">
                                    <a class="hireCardBtn btn-block showHireSection" href="javascript:void(0)"
                                       @click="showHireSection()">
                                        Hire me
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- end of main card info -->
                    </div>

                    <transition name="slide-fade">
                        <div v-show="portfolio">
                            <!-- nav row section -->

                            <div class="row navRow">
                                <div class="col-md-2 offset-md-3 col-4 text-center"
                                     style="border-right:1px solid #EBEDEF;" @click="setTab('skills')">
                                    <div class="navTab NoDecor" :class="{active: currentTab === 'skills' }">
                                        <a href="javascript:void(0)">
                                            Skills
                                        </a>
                                    </div>
                                </div>

                                <div class="col-md-2 col-4 text-center" style="border-right:1px solid #EBEDEF;"
                                     @click="setTab('work')">
                                    <div class="navTab NoDecor" :class="{active: currentTab === 'work' }">
                                        <a href="javascript:void(0)">
                                            Work
                                        </a>
                                    </div>
                                </div>

                                <div class="col-md-2 col-4 text-center" @click="setTab('education')">
                                    <div class="navTab NoDecor" :class="{active: currentTab === 'education' }">
                                        <a href="javascript:void(0)">
                                            Education
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- portfolio section -->

                            <div v-show="currentTab === 'skills'">
                                <div id="nav-taps-resume" style="padding-top:2px">
                                    <ul class="nav nav-tabs display: flex;justify-content: center !important; pl-0" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link text-center active"
                                               :href="'#languagesTab' + currentUser.id" role="tab" data-toggle="tab">
                                                Programming Languages
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link text-center" :href="'#databases' + currentUser.id "
                                               role="tab" data-toggle="tab">
                                                Frameworks / Databases
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link text-center" :href="'#skillsTab' + currentUser.id "
                                               role="tab" data-toggle="tab">
                                                Design Skills
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link text-center" :href="'#software' + currentUser.id "
                                               role="tab" data-toggle="tab">
                                                Software
                                            </a>
                                        </li>
                                    </ul>
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane active firstItem"
                                             :id="'languagesTab' + currentUser.id">
                                            <div class="row"
                                                 style="padding-top: 17px;padding-bottom: 16px;background: #fdfdfd;">
                                                <div class="col-md-12  text-center">
                                                    <div class="d-flex flex-column align-items-start"
                                                         style="padding-top: 15px;">
                                                        <div @mouseover="highlightSkill(skill,0)"
                                                             @mouseleave="highlightSkill(skill,100)"
                                                             v-for="(skill,index) in currentUser.skills" :key="index"
                                                             v-show="skill.category === 'programming_languages'"
                                                             class="highlightSkill skills">
                                                            <!-- skill -->
                                                            <div class="skill text-left">
                                                                <!-- title -->
                                                                <div class="skill-title">
                                                                    <img style="width: 17px;padding-bottom: 3px;"
                                                                         :src="getSkillIconSrc(skill.title)"
                                                                         alt="skill" :id="'skillImage_' + skill.id">
                                                                    {{skill.title}}
                                                                </div>
                                                                <!-- bar -->
                                                                <div class="skill-bar" :data-bar="skill.percentage">
                                                                    <span></span></div>
                                                            </div>
                                                            <!-- #skill -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane " :id="'databases' + currentUser.id">
                                            <div class="row"
                                                 style="padding-top: 17px;padding-bottom: 16px;background: #fdfdfd;">
                                                <div class="col-md-12  text-center">
                                                    <div class="d-flex flex-column align-items-start"
                                                         style="padding-top: 15px;">
                                                        <div @mouseover="highlightSkill(skill,0)"
                                                             @mouseleave="highlightSkill(skill,100)"
                                                             v-for="(skill,index) in currentUser.skills" :key="index"
                                                             v-show="skill.category === 'frameworks'"
                                                             class="highlightSkill skills">
                                                            <!-- skill -->
                                                            <div class="skill text-left">
                                                                <!-- title -->
                                                                <div class="skill-title">
                                                                    <img style="width: 17px;padding-bottom: 3px;"
                                                                         :src="getSkillIconSrc(skill.title)"
                                                                         alt="skill" :id="'skillImage_' + skill.id">
                                                                    {{skill.title}}
                                                                </div>
                                                                <!-- bar -->
                                                                <div class="skill-bar" :data-bar="skill.percentage">
                                                                    <span></span></div>
                                                            </div>
                                                            <!-- #skill -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane" :id="'skillsTab' + currentUser.id">
                                            <div class="row"
                                                 style="padding-top: 17px;padding-bottom: 16px;background: #fdfdfd;">
                                                <div class="col-md-12  text-center">
                                                    <div class="d-flex flex-column align-items-start"
                                                         style="padding-top: 15px;">
                                                        <div @mouseover="highlightSkill(skill,0)"
                                                             @mouseleave="highlightSkill(skill,100)"
                                                             v-for="(skill,index) in currentUser.skills" :key="index"
                                                             v-show="skill.category === 'design'"
                                                             class="highlightSkill skills">
                                                            <!-- skill -->
                                                            <div class="skill text-left">
                                                                <!-- title -->
                                                                <div class="skill-title">
                                                                    <img style="width: 17px;padding-bottom: 3px;"
                                                                         :src="getSkillIconSrc(skill.title)"
                                                                         alt="skill" :id="'skillImage_' + skill.id">
                                                                    {{skill.title}}
                                                                </div>
                                                                <!-- bar -->
                                                                <div class="skill-bar" :data-bar="skill.percentage">
                                                                    <span></span></div>
                                                            </div>
                                                            <!-- #skill -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane" :id="'software' + currentUser.id">
                                            <div class="row"
                                                 style="padding-top: 17px;padding-bottom: 16px;background: #fdfdfd;">
                                                <div class="col-md-12  text-center">
                                                    <div class="d-flex flex-column align-items-start"
                                                         style="padding-top: 15px;">
                                                        <div @mouseover="highlightSkill(skill,0)"
                                                             @mouseleave="highlightSkill(skill,100)"
                                                             v-for="(skill,index) in currentUser.skills" :key="index"
                                                             v-show="skill.category === 'software'"
                                                             class="highlightSkill skills">
                                                            <!-- skill -->
                                                            <div class="skill text-left">
                                                                <!-- title -->
                                                                <div class="skill-title">
                                                                    <img style="width: 17px;padding-bottom: 3px;"
                                                                         :src="getSkillIconSrc(skill.title)"
                                                                         alt="skill" :id="'skillImage_' + skill.id">
                                                                    {{skill.title}}
                                                                </div>
                                                                <!-- bar -->
                                                                <div class="skill-bar" :data-bar="skill.percentage">
                                                                    <span></span></div>
                                                            </div>
                                                            <!-- #skill -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div v-show="currentTab === 'work'">
                                <!-- work section -->

                                <div class="row" style="padding-top: 10px;">
                                    <div class="col-12 educationSection">
                                        <div class="aboutText">
                                            <div class="row" v-for="(work, index) in currentUser.work_experience" :key="index + 'V'">
                                                <div class="col-md-12 aboutSubText">
                                                    <div class="title work d-flex">
                                                        <span class="circle"></span>
                                                        <span class="seduHeader">{{work.job_title}}</span>
                                                    </div>
                                                    <div class="company">{{work.company_name}}</div>
                                                    <div class="year">
                                                        <span class="work">
                                                            {{getDate(work.date_from)}}
                                                            <span v-if="work.present"> - Present </span>
                                                            <span v-else> - {{getDate(work.date_to)}}</span>
                                                        </span>
                                                    </div>
                                                    <div class="desc">{{work.description}}</div>
                                                </div>

                                                <!-- related projects list -->

                                                <!-- portfolio section -->
                                                <div class="w-100">
                                                    <slick class="portfolioSlides" ref="slick" :options="slickOptions">
                                                        <div class="d-flex flex-column align-items-center" v-for="project in currentUser.projects" :key="project.id + '_projectImage' ">
                                                            <img :src="getProjectMainImage(project)" alt="portfolio image">
                                                            <div class="slide-text">
                                                                {{project.name}}.
                                                            </div>
                                                        </div>
                                                    </slick>
                                                </div>

                                                <!-- end of portfolio section -->

                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div v-show="currentTab === 'education'">
                                <!-- education section -->

                                <div class="row" style="padding-top: 10px;">
                                    <div class="col-12 educationSection">
                                        <div class="aboutText">
                                            <div class="row" v-for="(education, index) in currentUser.education"
                                                 :key="index + 'E'">
                                                <div class="col-md-12 aboutSubText">
                                                    <div class="title work d-flex">
                                                        <span class="circle"></span>
                                                        <span class="seduHeader">
                                                        {{education.degree_title}}
                                                        </span>
                                                    </div>
                                                    <div class="year">
                                                        <span class="work">
                                                            {{getDate(education.date_from)}}
                                                            <span v-if="education.present"> - Present </span>
                                                            <span v-else> - {{getDate(education.date_to)}}</span>
                                                        </span>
                                                    </div>
                                                    <div class="desc">{{education.institution_type}}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- end of portfolio section -->
                        </div>
                    </transition>


                    <transition name="slide-fade-left">
                        <div v-show="hire">
                            <div style="border-top: 1px solid #EBEDEF; ">
                                <div class="row">
                                    <div class="offset-md-4 col-md-4 col-12">
                                        <div class="hireText">
                                            Select the number of Hours you need per week:
                                        </div>
                                        <div class="hoursBtn NoDecor">
                                            <a href="javascript:void(0)">
                                                <img src="/images/newResume/minus.png"
                                                     style="width: 18px; padding-right: 8px;" alt="minus"
                                                     @click="subtractHours">
                                            </a>
                                            <span>{{hours}}</span> hours
                                            <a href="javascript:void(0)">
                                                <img src="/images/newResume/plus.png"
                                                     style="width: 18px; padding-left: 8px;" alt="plus"
                                                     @click="addHours">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="offset-md-4 col-md-4 col-12">
                                        <div class="hireText">
                                            How many weeks would you like to book for?
                                        </div>
                                        <div class="hoursBtn NoDecor">
                                            <a href="javascript:void(0)">
                                                <img src="/images/newResume/minus.png"
                                                     style="width: 18px; padding-right: 8px;" alt="minus"
                                                     @click="subtractWeeks">
                                            </a>
                                            <span>{{weeks}}</span> weeks
                                            <a href="javascript:void(0)">
                                                <img src="/images/newResume/plus.png"
                                                     style="width: 18px; padding-left: 8px;" alt="plus"
                                                     @click="addWeeks">
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="row" style="padding-top:50px; padding-bottom: 50px;">
                                    <div class="offset-md-2 col-12 col-md-8" style="border-top: 1px solid #EBEDEF;">
                                        <div class="row">
                                            <div class="col-md-2 col-4 text-left jobTitle"
                                                 style="font-size: 12px; color: #30323D;">
                                                Monthly rate
                                            </div>
                                            <div class="col-md-2 col-3 offset-5 offset-md-8 text-right jobTitle"
                                                 style="font-weight: bold;font-size: 12px; color: #30323D;">
                                                {{currentPayment.salary}} $
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="border-top: 1px solid #EBEDEF;">
                                    <div class="col-md-4 offset-md-2 col-12 NoDecor" style="padding-top: 17px;">
                                        <a href="javascript:void(0)"
                                           class="justify-content-center d-flex btn-block cancelBtn"
                                           @click="hideHireSection">Cancel Booking</a>
                                    </div>
                                    <div class="col-md-4 col-12 NoDecor whiteOnHover"
                                         style="padding-top: 17px; padding-bottom: 30px;">
                                        <a class="btn d-flex btn-block summaryBtn"
                                           :href="'/stripe/hire?freelancerID=' + currentUser.id + '&hours=' + hours + '&weeks=' + weeks ">Booking
                                            Summary</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </transition>


                </div>

            </div>
        </div>
    </div>
</template>

<script>
    import Slick from 'vue-slick';
    import VueLoadImage from 'vue-load-image'

    export default {
        props: ['freelancer', 'hire', 'search'],
        components: {
            'vue-load-image': VueLoadImage,
            Slick
        },
        data() {
            return {
                currentUser: this.user,
                currentPayment: {},
                currentAvailability: {},
                currentTab: 'skills',
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
                weeks: 4,
                hours: 0,
                portfolio: !this.hire,
                showReferences: false,
            }
        },
        methods: {
            getResizedImage(src) {
                if(src === null){
                    src = '' ;
                }
                let resizedImage = this.getImageSrc(src).replace('/resumeApp/uploads', '/resumeApp/uploads/resized-images');
                if (this.search == false) {
                    return resizedImage;
                }
                return this.getImageSrc(src)
            },
            setTab(tabName) {
                this.currentTab = tabName;
                if (tabName === 'work') {
                    this.$nextTick(() => {
                        this.updateSlick();
                    });
                }
            },
            getDate(date) {
                let workDate = new Date(date);
                let dd = workDate.getDate();
                let mm = workDate.getMonth() + 1; //January is 0!

                let yyyy = workDate.getFullYear();
                if (dd < 10) {
                    dd = '0' + dd;
                }
                if (mm < 10) {
                    mm = '0' + mm;
                }

                return dd + '/' + mm + '/' + yyyy;
            },
            getSkillIconSrc(skill_title) {
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
            getImageSrc(src) {
                if (!src) {
                    return '/images/placeholder.png';
                }

                if (src.charAt(0) !== '/' && src.charAt(0) !== 'h') {
                    return '/' + src;
                }

                return src;
            },
            loadHDImage(project_id) {
                let projects = this.currentUser.projects;
                $.each(projects, function (i) {
                    if (projects[i].id === project_id) {
                        $('#projectModalPhoto' + project_id).attr('src', projects[i].mainImage);
                        return false;
                    }
                });
            },
            showHireSection() {
                setTimeout(() => {
                    this.hire = true;
                }, 800);
                this.portfolio = false;
                this.showReferences = false;
            },

            showReferencesSection() {
                setTimeout(() => {
                    this.showReferences = true;
                }, 800);
                this.portfolio = false;
                this.hire = false;

            },

            hideReferencesSection() {
                this.hire = false;
                this.showReferences = false;
                setTimeout(() => {
                    this.portfolio = true;
                }, 800);
            },
            hideHireSection() {
                this.hire = false;
                this.showReferences = false;
                setTimeout(() => {
                    this.portfolio = true;
                }, 800);
            },
            updateSlick() {
                this.$nextTick(() => {
                    $.each(this.$refs.slickSlide, (i) => {
                        if (this.$refs.slickSlide[i] !== undefined) {
                            this.$refs.slickSlide[i].reSlick();
                        }
                    });
                });
            },
            addHours() {
                this.hours++;
            },
            subtractHours() {
                this.hours--;
            },
            addWeeks() {
                this.weeks++;
            },
            subtractWeeks() {
                this.weeks--;
            },
            slidePrev(i) {
                this.$refs.slickSlide[i].prev();
                if (this.slides[i].number - 1 > 0) {
                    this.slides[i].number--;
                }
            },
            slideNext(i, maxprojects) {
                this.$refs.slickSlide[i].next();
                if (this.slides[i].number + 1 <= this.calculateNumberOfRelatedSlides(maxprojects)) {
                    this.slides[i].number++;
                }
            },
            calculateNumberOfSlides() {
                let numberOfProjects = this.currentUser.projects.length;
                var width = $(window).width();
                if (width < 991) {
                    return (numberOfProjects);
                }
                return (Math.ceil(numberOfProjects / 2));
            },

            calculateNumberOfRelatedSlides(numberOfProjects) {
                var width = $(window).width();
                if (width < 991) {
                    return (numberOfProjects);
                }
                return (Math.ceil(numberOfProjects / 2));
            },
            highlightSkill(skill, percent) {
                $('#skillImage_' + skill.id).css('filter', 'grayscale(' + percent + '%)');
            },
            skillsBar() {
                $(".skills").addClass("active");
                $(".skills .skill .skill-bar span").each(function () {
                    $(this).animate({
                        "width": $(this).parent().attr("data-bar") + "%"
                    }, 1000);
                });
                setTimeout(function () {
                    $(".skills .skill .skill-bar span b").animate({"opacity": "1"}, 1000);
                }, 2000);
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
            setDummyUser() {
                this.currentUser = this.$store.state.dummyUser;
            },
            setDefaultRates() {
                if (this.currentUser) {
                    this.currentPayment = this.currentUser.payment_info[0];
                    this.currentAvailability = this.currentUser.availability_info[0];
                }
            },
            stringToLowerCase(string){
                if(string){
                    return string.toLowerCase();
                }
                return 'social_icon';
            },

        },
        mounted() {
            this.skillsBar();

            // if there is no user or the preview is true, set dummy user
            if (!this.currentUser || this.is_preview) {
                this.setDummyUser();
            }

            // set default payment and availability:
            this.setDefaultRates();
        },
        created: function () {
            this.$parent.$on('update', this.updateSlick);
        }
    }
</script>

<style lang="scss" scoped>
    .projectsSection {
        margin-top: 1px;
        padding: 20px;
        margin-bottom: 18px;
        @media only screen and (max-width: 500px) {
            padding: 2px;
        }
    }

    .freelancerCard {
        margin-bottom: 12px;
        padding-bottom: 12px;
        margin-left: 10px;
        margin-right: 10px;
        height: 730px;
        max-width: 1920px;

        @media only screen and (max-width: 1200px) {
            width: 100%;
        }
        @media only screen and (max-width: 786px) {
            width: 710px;
            height: 815px;
        }
        @media only screen and (max-width: 500px) {
            width: 315px;
            height: 785px;
        }
    }

    .nameRowScoped{
        display: flex;
        justify-content: space-around;
        align-items: center;
    }
    .hireRowScoped{
        min-width: 540px;
    }

    .workCard {
        @media only screen and (max-width: 500px) {
            min-width: 290px;
        }

        min-width: 375px;
    }

    .slick-dots {
        display: flex;
        justify-content: center;
    }

    .fade-enter-active, .fade-leave-active {
        transition: opacity .7s;
    }

    .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */
    {
        opacity: 0;
    }


    .slide-fade-enter-active {
        transition: all .7s ease;
    }

    .slide-fade-leave-active {
        transition: all .7s cubic-bezier(1.0, 0.5, 0.8, 1.0);
    }

    .slide-fade-enter, .slide-fade-leave-to
        /* .slide-fade-leave-active below version 2.1.8 */
    {
        transform: translateX(10px);
        opacity: 0;
    }


    .slide-fade-left-enter-active {
        transition: all .7s ease;
    }

    .slide-fade-left-leave-active {
        transition: all .7s cubic-bezier(1.0, 0.5, 0.8, 1.0);
    }

    .slide-fade-left-enter, .slide-fade-left-leave-to
        /* .slide-fade-leave-active below version 2.1.8 */
    {
        transform: translateX(-10px);
        opacity: 0;
    }

    .importBtn {
        a:hover {
            color: white;
        }

        display: flex;
        justify-content: center;
        align-items: center;
        padding: 0;
    }

    .skillscard {
        padding-left: 35px;
        padding-top: 15px;
    }

    .tab-pane {
        height: 541px;
        overflow: auto;

    }

    // skills bar css :

    .skills,
    .skills .skill,
    .skills .skill .skill-title,
    .skills .skill .skill-bar {
        width: 100%;
        float: left;
    }

    .skills {
        padding: 0px 15px 10px 15px;
    }

    .skills .skill {
        margin-bottom: 30px;
    }

    .skills .skill .skill-title {
        color: #808080;
        margin-bottom: 15px;
        font-weight: 400;
        font-size: 14px;
    }

    .skills .skill .skill-bar {
        width: 0;
        height: 6px;
        background: #f0f0f0;
        transition: 1s cubic-bezier(1, 0, .5, 1);
        -webkit-transition: 1s cubic-bezier(1, 0, .5, 1);
        -ms-transition: 1s cubic-bezier(1, 0, .5, 1);
    }

    .skills.active .skill .skill-bar {
        width: 100%;
    }

    .skills .skill .skill-bar span {
        float: left;
        width: 0%;
        background: #1D91F2;
        height: 6px;
        position: relative;
        transition: 1s cubic-bezier(1, 0, .5, 1);
        -webkit-transition: 1s cubic-bezier(1, 0, .5, 1);
        -ms-transition: 1s cubic-bezier(1, 0, .5, 1);
    }

    .skills .skill .skill-bar span b {
        float: left;
        width: 100%;
        position: relative;
        text-align: right;
        opacity: 0;
        font-size: 14px;
        color: #1D91F2;
        font-weight: 400;
        top: -13px;
    }

    .container {
        width: 100%;
        max-width: 600px;
        padding: 0 15px;
        margin: 0 auto;
    }


    .educationSection {
        height: 506px;
        overflow: auto;
        @media only screen and (max-width: 500px) {
            width: 315px;
            height: 420px;
        }
        @media only screen and (max-width: 500px) {
            padding-left: 0;
            padding-right: 5px;
        }
    }

    .aboutText {
        @media only screen and (max-width: 500px) {
            padding-left: 0;
        }
    }

    .seduHeader {
        padding-left: 6px;
        @media only screen and (max-width: 500px) {
            padding-left: 5px;
        }
    }


    .carouselControls {
        padding-top: 0;
        padding-bottom: 20px;
    }

    .nav{
        display: flex!important;
        justify-content: center!important;
    }


</style>
