<template>
    <v-app style="width: 100%">
        <v-container class="hold_theme3" style="max-width: 1920px;">
            <v-row class="freelancerCard" v-if="currentUser">
                <v-col lg="12" md="12" cols="12" class="resumeCardRight">
                    <div class="showOnlyOnmd">
                        <v-row class="head-section">
                            <v-col lg="2" md="2" sm="2" cols="2" class="imageCol">
                                <span class="profile-img" v-bind:style="{ backgroundImage: 'url(/images/resume_themes/theme300/profile.jpg)' }" /> 
                                <a href="#" class="chat-option" @click.prevent="dialogMessage = true"><v-icon>mdi-message-text</v-icon></a>
                            </v-col>
                            <v-col lg="2" md="5" sm="4" cols="5" class="profileCol">
                                <div class="head-name">{{currentUser.personal_info.full_name}}</div>
                                <div class="head-profile">{{currentUser.personal_info.designation}}</div>
                                <div class="social-wrap">
                                    <a :href="item.link" v-for="item in socialLinks" :key="item.id + '_link'" target="_blank" v-show="item.is_active">
                                        <img :src="`/images/resume_themes/theme300/social_icons/${stringToLowerCase(item.link_title)}.webp`"  alt="social icon">
                                    </a>
                                </div>
                            </v-col>
                            <v-col lg="5" md="4" sm="5" cols="3" class="interviewSection">
                                <span class="title-medium">View interviews</span>
                                <div class="option-wrap">
                                    <a href="#" class="btn-default" @click.prevent="dialogAudio = true"><v-icon>mdi-microphone</v-icon>Audio &amp; Text</a>
                                    <a href="#" class="btn-default" @click.prevent="dialogVideo = true"><v-icon>mdi-play-circle</v-icon>Video</a>
                                </div>
                            </v-col>
                            <v-col lg="3" md="12" sm="12" class="rateSection">
                                <v-container class="hold-rates">
                                    <v-row class="rate-wrap" no-gutters>
                                        <v-col lg="4" md="4" sm="4">
                                            <span class="price">
                                                ${{currentPayment.salary}}
                                            </span>
                                            <span class="text_price">
                                                Hourly Rate
                                            </span>
                                        </v-col>
                                        <v-col lg="6" md="4" sm="4">
                                            <span class="hours">
                                                {{currentAvailability.available_hours}} hrs
                                            </span>
                                            <span class="text_hours">
                                                Weekly Avaiablitys
                                            </span>
                                        </v-col>
                                        <v-col lg="auto" md="4" sm="4" class="hold-hireme">
                                            <a href="#" class="btn-action" @click.prevent="dialogHireme = true">Hire Me</a>
                                        </v-col> 
                                    </v-row>                          
                                </v-container>

                                                    
                            </v-col>
                        </v-row>
                    </div>
                    <div class="hold-tabs">
                        <v-tabs
                            class="main-tabs_theme3"
                            v-model="activeTab"
                            :slider-color="colorTab"
                        >

                            <v-tab @click="setTab('portfolio')" href="#tab-0" :ripple="false">
                                <v-icon>mdi-{{getTabIcon('portfolio')}}</v-icon>
                                {{getTabName('portfolio')}}  
                            </v-tab>
                            <v-tab @click="setTab('work')" href="#tab-1" :ripple="false">
                                <v-icon>mdi-{{getTabIcon('work')}}</v-icon>
                                {{getTabName('work')}}  
                            </v-tab>
                            <v-tab @click="setTab('education')" href="#tab-2" :ripple="false">
                                <v-icon>mdi-{{getTabIcon('education')}}</v-icon>
                                {{getTabName('education')}}  
                            </v-tab>
                            <v-tab @click="setTab('skills')" href="#tab-3" :ripple="false">
                                <v-icon>mdi-{{getTabIcon('skills')}}</v-icon>
                                {{getTabName('skills')}}  
                            </v-tab>                      
                        </v-tabs>
                    </div>                    
                    <div class="hold-contents">
                        <v-tabs-items v-model="activeTab">
                            <v-tab-item class="portfolio-section" value="tab-0" transition="fade-transition" reverse-transition="fade-transition">
                                <v-row class="portfolio-wrap"> 
                                    <v-col lg="6" sm="12" cols="12" v-for="project in currentUser.projects" :key="project.id + '_projectImage' ">
                                        <div class="box-photo">
                                            <img  :src="getProjectMainImage(project)"  />
                                        </div>
                                    </v-col>
                                </v-row>
                            </v-tab-item>

                            <v-tab-item class="work-section" value="tab-1" transition="fade-transition" reverse-transition="fade-transition">
                                <v-timeline :reverse="reverseTimeline">
                                    <v-timeline-item
                                        v-for="work in currentUser.work_experience" :key="work.id + 'work'"
                                        :small="smallTimeline"
                                        color="#fff"
                                        :hide-dot="false"                                        
                                    >
                                        <span slot="opposite">
                                            {{work.date_from}}
                                            <span>- {{work.present ? 'Present' : work.data_to}}</span>
                                        </span>
                                        <v-card class="">
                                            <v-card-title class="headline">
                                                <span class="title-job">
                                                   {{work.job_title}}
                                                </span>                                                
                                                <span class="title-mob">
                                                    {{work.date_from}}
                                                    <span>- {{work.present ? 'Present' : work.date_to}}</span>
                                                  
                                                </span>                                                
                                            </v-card-title>
                                            <v-card-text>
                                                {{work.description}}
                                            </v-card-text>
                                        </v-card>
                                    </v-timeline-item>
                                </v-timeline>
                            </v-tab-item>

                            <v-tab-item class="education-section" value="tab-2" transition="fade-transition" reverse-transition="fade-transition">
                                <v-timeline :reverse="reverseTimeline">
                                    <v-timeline-item
                                        v-for="(education, index) in currentUser.education"
                                        :key="education.id + '_education'"
                                        :small="smallTimeline"
                                        :hide-dot="false"
                                    >
                                        <span slot="opposite">
                                            {{education.date_from}}
                                            <span>- {{education.present ? 'Present' : education.data_to}}</span>
                                        </span>
                                        <v-card class="">
                                            <v-card-title class="headline">
                                                <span class="title-job">
                                                    {{education.university_name}}
                                                </span>                                                
                                                <span class="title-mob">
                                                 {{education.date_from}}
                                            <span>- {{education.present ? 'Present' : education.data_to}}</span>
                                                   
                                                </span>                                                
                                            </v-card-title>
                                            <v-card-text>
                                                {{education.institution_type}}
                                            </v-card-text>
                                        </v-card>
                                    </v-timeline-item>
                                </v-timeline>
                            </v-tab-item>

                            <v-tab-item class="skills-section" value="tab-3" transition="fade-transition" reverse-transition="fade-transition">
                                <v-row class="skills-wrap">
                                    <v-col class="box-skill" cols="12" lg="4" sm="12" v-for="skill in currentUser.skills" :key="skill.id + '_skill'">
                                        <img class="icon" :src="getSkillIcon(skill.title)" alt="skill-icon">
                                        <div class="info-skill">
                                            <div class="head-skill">
                                                <span class="nameSkill">{{skill.title}}</span>
                                                <span class="percentSkill">{{skill.percentage}}%</span>
                                            </div>
                                            <v-progress-linear
                                                buffer-value="100"
                                                height="7px"
                                                :value="skill.percentage"
                                                color="#2E9EF5"
                                                background-color="rgba(46, 158, 245, 0.25)"
                                                :rounded="true"
                                            ></v-progress-linear>
                                        </div>
                                    </v-col>
                                </v-row>
                            </v-tab-item>                        
                        </v-tabs-items>
                    </div>
                </v-col>
            </v-row>
        </v-container>
        <v-dialog v-model="dialogMessage" persistent max-width="850" overlay-opacity="0.5" overlay-color="#202124">
            <v-card class="form-wrap">
                <v-form ref="formMessages" class="form-messages">
                    <v-container>
                        <v-row>
                            <v-col lg="12" sm="12" cols="12" class="input-col">
                                <v-text-field
                                    v-model="formMessage.name"
                                    :rules="formMessage.nameRules"
                                    label="Name"
                                    required
                                    color="#202124"
                                ></v-text-field>
                            </v-col>
                            <v-col lg="12" sm="12" cols="12" class="input-col">
                                <v-text-field
                                    v-model="formMessage.email"
                                    :rules="formMessage.emailRules"
                                    label="E-mail"
                                    required
                                    color="#202124"
                                ></v-text-field>
                            </v-col>
                            <v-col lg="12" sm="12" cols="12" class="input-col">
                                <v-textarea
                                    v-model="formMessage.message"
                                    filled
                                    height="162"
                                    :no-resize="true"
                                    color="#202124"
                                    label="Message"
                                ></v-textarea>
                            </v-col>
                        </v-row>
                        <v-row>
                            <v-btn depressed small @click="submitForm" class="btn-send"><v-icon>mdi-message-text</v-icon>Send Message</v-btn>
                            <v-btn text small @click="cancelForm">Cancel</v-btn>
                        </v-row>                        
                    </v-container>                    
                </v-form>
            </v-card>
        </v-dialog>
        <v-dialog v-model="dialogAudio" persistent max-width="850" overlay-opacity="0.5" overlay-color="#202124">
                <v-card>
                <v-card-actions>
                    <v-icon class="close-icon" @click="dialogAudio = false || pauseAudio()">mdi-close</v-icon>
                </v-card-actions>
                <div class="player">
                    <div class="hold-spectre" @click.prevent="!playing ? playAudio() : pauseAudio()">
                        <img src="/images/resume_themes/theme300/icons/spectre.png" alt="">
                    </div>
                    <a @click.prevent="!playing ? playAudio() : pauseAudio()" title="Play/Pause" href="#">
                        <v-icon v-if="!playing">mdi-play-circle</v-icon>
                        <v-icon v-else>mdi-pause-circle</v-icon>
                    </a>
                    <audio style="display:none" ref="audioElem" id="audioElem" src="" @ended="playing = !playing"></audio>
                </div>
            </v-card>
        </v-dialog>
        <v-dialog v-model="dialogVideo" persistent max-width="850" overlay-opacity="0.5" overlay-color="#202124">
            <v-card>
                <v-card-actions>
                    <v-icon class="close-icon" @click="dialogVideo = false">mdi-close</v-icon>
                </v-card-actions>
                <div class="hold-video">
                    <div class="poster-video" ref="videoPoster">
                        <a href="#" @click.prevent="playVideo()">
                            <v-icon>mdi-play-circle</v-icon>
                        </a>                        
                    </div>
                    <video ref="videoElem" controls src=""></video>
                </div>
            </v-card>
        </v-dialog>
        <v-dialog v-model="dialogHireme" persistent max-width="850" overlay-opacity="0.5" overlay-color="#202124">
            <v-card class="payment-wrap">
                <v-card-actions>
                    <v-icon class="close-icon" @click="dialogHireme = false">mdi-close</v-icon>
                </v-card-actions>
                <v-card-text>
                    <h3>Select Payment Method :</h3>
                    <div class="hold-payment">
                        <v-radio-group v-model="radioGroup" :row="true" class="pay-method">
                            <span class="item-pay">
                                <v-radio
                                    color="#d8d8d8"
                                    value="1"
                                    name="opt-paypal"
                                    off-icon="mdi-checkbox-blank-circle"
                                    :ripple="false"
                                >
                                    
                                </v-radio>
                                <img src="/images/resume_themes/theme300/icons/icon-paypal.png" alt="">
                            </span>
                            <span class="item-pay">
                                <v-radio
                                    color="#d8d8d8"
                                    value="2"
                                    name="opt-payonner"
                                    off-icon="mdi-checkbox-blank-circle"
                                    :ripple="false"
                                >  
                                    
                                </v-radio>
                                <img src="/images/resume_themes/theme300/icons/icon-payonner.png" alt="">
                            </span>
                        </v-radio-group>
                    </div>
                </v-card-text>                
            </v-card>
        </v-dialog>
    </v-app>
</template>

<script>
export default {
    name: "theme300",
    props: ['user', 'is_preview'],
    components: {},
    data() {
        return {
            // worksHistory: this.freelancer.works_history,
            // educationsHistory: this.freelancer.educations_history,
            portfolio: true,
            activeTab: null,
            currentTab: 'portfolio',
            colorTab: '',
            formMessage: {
                name: '',
                nameRules: [
                    v => !!v || 'Name is required',
                    v => (v && v.length <= 10) || 'Name must be less than 10 characters',
                ],
                email: '',
                emailRules: [
                    v => !!v || 'E-mail is required',
                    v => /.+@.+\..+/.test(v) || 'E-mail must be valid',
                ],
                message: ''
            },
            formHasErrors: false,
            // --Timeline
            reverseTimeline: true,
            smallTimeline: true,
            // --Dialog
            dialogMessage: false,
            dialogAudio: false,
            dialogVideo: false,
            dialogHireme: false,
            // --Player
            playing: false,
            radioGroup: 1,

            currentUser: this.user,
            currentPayment:{},
            currentAvailability:{}
        }
    },
    watch: {
    },
    computed:{
        socialLinks(){
            return this.currentUser.links.filter( (link) => {return link.category === 'social_link' ? link : false});
        }
    },
    methods: {
        getFullYear(date){
            let newDate = new Date(date);
            let yyyy = newDate.getFullYear();
            return yyyy;
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
                "digital drawing Tablet":
                    "/images/skills_icons/digital_drawing_tablet.png",
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
        stringToLowerCase(string){
            if(string){
                return string.toLowerCase();
            }
            return 'social_icon';
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
        getTabName(label) {
            let arrayTabs = {
                'portfolio': 'Portfolio',
                'work': 'Works',
                'education': 'Education',
                'skills': 'Design Skill'
            }
            if (arrayTabs.hasOwnProperty(label.toLowerCase())) {
                return arrayTabs[label.toLowerCase()];
            }
        },
        getTabIcon(name) {
            let arrayIcons = {
                'portfolio': 'folder-multiple-image',
                'work': 'widgets',
                'education': 'library',
                'skills': 'star-circle'
            }
            if (arrayIcons.hasOwnProperty(name.toLowerCase())) {
                return arrayIcons[name.toLowerCase()];
            }
        },
        setTab(tabName) {
            this.currentTab = tabName;

            switch (tabName) {
                case "portfolio": 
                    this.colorTab = "tabRed";
                    break;
                case "work": 
                    this.colorTab = "tabGreen"; 
                    break;
                case "education": 
                    this.colorTab = "tabGold"; 
                    break;
                case "skills": 
                    this.colorTab = "tabBlue"; 
                    break;
                default: this.colorTab = "gray"; break;
            }
        },
        isMobile() {
            if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
                return true
            } else {
                return false
            }
        },
        playAudio() {
            this.playing = true;
            this.$refs.audioElem.play();
        },
        pauseAudio() {
            this.playing = false;
            this.$refs.audioElem.pause();
        },
        playVideo() {
            this.$refs.videoPoster.style.display = "none";
            this.$refs.videoElem.play();
        },
        submitForm() {
            /** Logic data send */
        },
        cancelForm() {
            this.dialogMessage = false;
            this.$refs.formMessages.reset();
        },
        setDummyUser() {
            this.currentUser = this.$store.state.dummyUser;
        },
        setDefaultRates(){
            if(this.currentUser){
                this.currentPayment      =  this.currentUser.payment_info[0] ;
                this.currentAvailability =  this.currentUser.availability_info[0] ;
            }
        }
    },
    beforeMount(){
        this.setTab('portfolio');
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
<style lang="scss">
    @import 'resources/sass/themes/theme300.scss';
</style>
<style lang="scss" scoped>

    $max_wTheme : 1420px;
    $tab_OneColor : #D93025;
    $tab_TwoColor : #0F9D58;
    $tab_ThreeColor : #F4B400;
    $tab_FourColor : #4285F4;

    .container{
        margin: 0 auto !important;

        .freelancerCard{
            width: 100%;
            background: #F5F7F7;
            margin: 0px auto;

            .resumeCardRight{
                padding: 0;
            }
        }

        &.hold_theme3{



            .showOnlyOnmd{
                justify-content: center;
                display: flex;
                align-items: center;
                border-bottom: 1px solid #E5E5E5;
                background: #ffffff;
            }

            @media screen and (max-width: 769px) {
                padding: 0;

                .showOnlyOnmd{
                    border: 0;
                    box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.07);
                    margin-bottom: 10px;
                }
            }
        }

    }
    
    .hold-contents{
        background: #F5F7F7;
        overflow: hidden;
        padding: 10px 0;
        margin-top: 10px;
        min-height: 100%;

        .v-tabs-items{
            max-width: $max_wTheme;
            margin: 0px auto;
            background: transparent;
        }
        @media screen and (max-width: 769px) {
            min-height: auto;
            padding: 0px 0px 110px 0px;

            .portfolio-section,.work-section,.education-section,.skills-section{
                max-width: 90%;
                margin: 0px auto;
            }
        }

    }
    .head-section{
        align-items: center;
        padding-top: 25px;
        padding-bottom: 60px;
        max-width: $max_wTheme;

        @media screen and (max-width: 769px) {
            max-width: 95%;
            padding-top: 30px;
            padding-bottom: 0;

            .imageCol{
                .profile-img{
                    max-width: 120px;
                    max-height: 120px;
                }
                .chat-option{
                    max-width: 34px;
                    max-height: 34px;
                    border-width: 3px;
                    left: 38%;
                    bottom: -3px;

                    i{
                        font-size: 15px;
                    }
                }
            }
            .profileCol{
                margin-left: 0;
                min-width: 42%;

                .head-name{
                    font-size: 20px;
                    line-height: 23px;
                }
                .head-profile{
                    font-size: 12px;
                }
                .social-wrap{

                    a{
                        min-width: 23px;
                        min-height: 23px;
                        line-height: 20px;
                        margin-right: 10px;

                        img{
                            max-width: 12px;
                        }
                    }
                }
            }

            .interviewSection{
                border: 0;
                margin-top: 0;
                align-items: flex-start;
                justify-content: flex-start;
                padding: 0px;
                height: 80px;
                max-width: 250px;

                .title-medium{
                    font-size: 0;
                    &::before{
                        content: "Interviews:";
                        font-size: 12px;
                        font-family: "Roboto Medium";
                    }
                }
                .option-wrap{
                    margin-top: 5px;
                    width: 100%;
                    justify-content: space-between;
                    display: flex;

                    .btn-default{
                        min-width: 116px;
                        min-height: 30px;
                        line-height: 30px;
                        margin: 0 0 5px 0;
                        border-width: 0.5px;
                        font-size: 10px;

                        i{
                            font-size: 15px;
                        }
                    }
                }
            }
            .rateSection{
                border-top: 1px solid #E5E5E5;
                margin-top: 15px;
                flex-flow: nowrap;
                min-height: 69px;
                padding: 0 28px 0 0;

                .hold-rates{
                    max-width: 60%;
                    justify-content: flex-end;
                    margin: 0 !important;
                    padding: 0;
                    align-items: center;

                    
                }

                .rate-wrap{

                    justify-content: space-between;

                    

                    .col-md-4{

                        justify-content: center;
                        display: flex;
                        padding: 0;

                        .price{
                            &::before{
                                content: "Hourly Rate:";
                                font-size: 10px;
                                font-style: italic;
                                font-weight: normal;
                                font-family: "Roboto";
                                color: #5F6368;
                                vertical-align: middle;
                            }
                            font-size: 16px;
                            font-weight: bold;
                        }
                        .hours{
                            &::before{
                                content: "Weekly Avaiablity:";
                                font-size: 10px;
                                font-style: italic;
                                font-weight: normal;
                                font-family: "Roboto";
                                color: #5F6368;
                                vertical-align: middle;
                            }
                            font-size: 16px;
                            font-weight: bold;
                        }
                        .text_price{
                            font-size: 0px;
                        }
                        .text_hours{
                            font-size: 0px;
                        }

                        &.hold-hireme{
                            align-items: flex-end;
                            max-width: 100px;
                        }
                    }
                    
                }

                .btn-action{
                    min-width: 95px;
                    min-height: 29px;
                    line-height: 29px;
                    font-size: 10px;
                }
            }
        }

        @media screen and (max-width: 480px) {

            .imageCol{

                padding: 0 1em 0 0;
                .profile-img{
                    max-width: 100px;
                    max-height: 100px;
                }
                .chat-option{
                    left: 28%;
                    bottom: -13px;
                }
            }
            .interviewSection{
                padding: 0px;

                .option-wrap{
                    display: block;
                }
            }

            .rateSection{
                padding: 0px;

                .hold-rates{
                    max-width: 100%;
                }


                .hire-wrap{
                    .col-12{
                        justify-content: flex-end;
                        padding: 0;
                    }
                }
            }
        }

        @media screen and (max-width: 375px) {

            .imageCol{
                padding: 0;
                .profile-img{
                    max-width: 79px;
                    max-height: 79px;
                }
                .chat-option{
                    left: 30%;
                    bottom: -15px;
                }
            }
            .profileCol{
                padding: 0;
                max-width: 132px;
                margin-left: 3%;
               
 
                .social-wrap{
                    a{
                        margin-right: 5px;
                    }
                }

                .head-name{
                    font-size: 18px;
                    line-height: 20px;
                }
            }

            .interviewSection{
                .option-wrap{
                    width: auto;
                    display: block;
                }
            }

            .rateSection{
                padding: 0px 0.5px;

                .rate-wrap{

                    

                    .col-sm-4{
                        justify-content: center;
                        display: flex;
                        padding: 0;

                        .price, .hours{
                            &::before{
                                content: "";
                            }
                        }
                        .text_price,.text_hours{
                            font-size: 10px;
                            font-style: italic;
                            font-weight: normal;
                            font-family: "Roboto";
                            color: #5F6368;
                        }

                        &.hold-hireme{
                            align-items: flex-end;
                        }
                    }
                }
            }
        }



    }
    .profileCol{
        padding: 0;
    }

    .imageCol{
        position: relative;
        align-items: center;
        justify-content: flex-start;
        display: flex;
        max-width: 190px;

        .profile-img{
            width: 8.8rem !important;
            height: 8.8rem !important;
            display: block;
            background-position: center;
            background-size: cover;
            border-radius: 100%;           
        }
        .chat-option{
            position:absolute;
            bottom: -15px;
            width: 55px;
            height: 55px;
            left: 30%;
            
            border-radius: 100%;
            text-decoration: none;  
            border: 5px solid #fff;
            background: #F1F3F4;
            justify-content: center;
            display: flex;
            align-items: center;

            i{
                color: #D93025;
                vertical-align: middle;

            }
        }
    }

    .head-name{
        font-family: 'Roboto Medium';
        font-size: 30px;
        line-height: 35px;
        color: #202124;
    }
    .head-profile{
        font-family: 'Roboto';
        font-size: 18px;
        color: #5F6368;
    }
    .social-wrap{
        justify-content: flex-start;
        margin: 12px 0 0 0;

        a{
            min-width: 35px;
            min-height: 35px;
            background: #F1F3F4;
            text-align: center;
            border-radius: 100%;
            margin: 0 12px 0 0;
            display: inline-flex;
            text-decoration: none;
            line-height: 32px;
            box-shadow: none;
            justify-content: center;
            align-items: center;

            img{
                max-width: 24px;
            }
        }
    }

    .interviewSection{
        display: flex;
        justify-content: center;
        align-items: center;
        flex-flow: column;
        margin-top: 20px;


        border-left: 1px solid #E5E5E5;
        border-right: 1px solid #E5E5E5;
        .option-wrap{
            margin-top: 25px;

            .btn-default{
                margin: 0 15px;
            }
        }
    }

    .rateSection{
        flex-wrap: wrap;
        justify-content: flex-end;
        display: flex;
        align-items: center;

        .hold-rates{
            padding: 0;
        }


        .rate-wrap{

            justify-content: flex-end;
            min-height: 132px;

            .col-md-2,.col-md-4{
                display: flex;
                justify-content: center;
                align-items: center;
                flex-flow: column;

                &:first-child{
                    max-width: 95px;
                }
                

                .price,.hours{
                    font-size: 30px;
                    font-family: 'Roboto Medium';
                    color: #202124;
                }
                .text_price,.text_hours{
                    font-size: 16px;
                    font-family: 'Roboto';
                    color: #5F6368;
                }



            }
        }

        .hireme-hold{
            margin-top: 1.5em;
        }

        >.row{
            justify-content: flex-end;

            .col-12{
                align-items: center;
                justify-content: center;
                display: flex;
            }
        }
        @media screen and (max-width: 769px) {

            .hold-rates{
                max-width: 60%;
            }

            .hireme-hold{
                margin: 0;
            }
        }

        @media screen and (max-width: 380px) {
            .hold-rates{
                max-width: 100%;
            }


            .rate-wrap{
                max-width: 100%;
                flex-flow: row;
                align-items: center;

                >div{
                    padding: 0;
                }

                .col-sm-4{
                    padding: 0px;
                }
            }
        }

        
    }

    
    .hold-tabs{
        box-shadow: 0px 3px 6px #d8d8d8;
        background: #fff;

        @media screen and (max-width: 769px) {
            box-shadow: none;
            position: relative;
            width: 100%;
        }
    }
    
    .main-tabs_theme3{

        max-width: $max_wTheme;
        margin: 0px auto;

        .v-tab{
            text-transform: capitalize;
            font-size: 24px;
            font-family: "Roboto Medium";
            padding: 0px;
            margin: 0 6%;
            text-decoration: none;

            i{
                margin-right: 30px;
            }

            &:hover{
                &::before{
                    opacity: 0;
                }
            }

            &::before{
                opacity: 0;
            }

            &:focus{
                &::before{
                    opacity: 0;
                }
            }
            

            &.v-tab--active{
                &:hover{
                    &::before{
                        opacity: 0;
                    }
                }
                &::before{
                    opacity: 0;
                }

                &:nth-child(2){
                    color: $tab_OneColor;
                    >i{
                        color: $tab_OneColor;
                    }
                }
                &:nth-child(3){
                    color: $tab_TwoColor;
                    >i{
                        color: $tab_TwoColor;
                    }
                }
                &:nth-child(4){
                    color: $tab_ThreeColor;
                    >i{
                        color: $tab_ThreeColor;
                    }
                }
                &:nth-child(5){
                    color: $tab_FourColor;
                    >i{
                        color: $tab_FourColor;
                    }
                }
            }
            
        }

        @media screen and (max-width: 769px) {

            min-height: 77px;

            .v-tab{
                flex-flow: column;
                min-width: 80px;
                max-height: 77px;
                margin: 0 5px;
                font-size: 10px;
                font-family: "Roboto";
                font-style: normal;


                i{
                    margin: 0 0 8px 0;
                    font-size: 22px;
                }
            }

        }
    }

    .v-timeline{
        padding-top: 0;

        &::before{
            background: #d8d8d8 !important;
        }
        .v-timeline-item{
            .v-card{
                box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.16);
                padding: 30px;

                .headline{
                    padding: 0;
                    font-size: 18px;

                    .title-mob{
                        display: none;
                    }

                    &::before{
                        content: "";
                        width: 40px;
                        height: 40px;
                        border: 3px solid #d8d8d8;
                        border-radius: 100%;
                        margin-right: 25px;
                        
                    }
                }
                .v-card__text{
                    font-size: 12px;
                    color: rgba(32, 33, 36, 0.5);
                }
                &::before{
                    border: 0;
                }
                &::after{
                    border: 0;
                }
            }

            .v-timeline-item__opposite{
                >span,span+span{
                    font-size: 20px;
                    color: #202124;
                    opacity: .5;
                }
            }
        }

        @media screen and (max-width: 769px) {
            .v-timeline-item{
                padding-bottom: 10px;
                .v-card{
                    padding: 25px;

                    .headline{
                        font-size: 14px !important;
                        font-family: "Roboto Medium" !important;
                        align-items: center;
                        line-height: 18px;
                        position: relative;

                        &::before{
                            margin-right: 20px;
                            border-width: 1px;
                        }

                        .title-mob{
                            font-size: 10px;
                            display: inline-block;
                            color: #5F6368;
                            line-height: 18px;                        
                        }
                    }
                    .v-card__text{
                        font-size: 10px;
                        line-height: 16px;
                    }
                }
            }
        }
        
    }  
    /** Icon timeline work */
    .work-section{
        .v-timeline{
            .v-timeline-item{
                .v-card{
                    .headline{
                        color: $tab_TwoColor;

                        &::before{
                            background: url('/images/resume_themes/theme300/icons/icon-designer.png') no-repeat;
                            background-position: center;
                            background-size: 50%;
                        }
                        .title-mob{
                            @media screen and (max-width: 769px) {
                                position: absolute;
                                right: 0;
                            }
                        }
                    }
                    .v-card__text{
                        padding: 20px 0 0 60px;
                        @media screen and (max-width: 769px) {
                            padding: 0 0 0 60px !important;
                        }
                                                
                    }
                }
            }
        }
    } 
    /** Icon timeline education */
    .education-section{
        .v-timeline{
            .v-timeline-item{
                .v-card{
                    .headline{
                        color: $tab_ThreeColor;
                        
                        &::before{
                            content: "";
                            display: none;
                        }
                        .title-mob{
                            @media screen and (max-width: 769px) {
                                position: relative;
                                width: 100%;
                                font-style: italic;
                            }                           
                        }
                    }
                    .v-card__text{
                        padding: 20px 0 0 0px;
                        @media screen and (max-width: 769px) {
                            padding: 0 0 0 0px !important;
                        }
                    }
                }
            }
        }
    } 


    .title-medium{
        font-size: 24px;
        font-family: 'Roboto Medium';
        color: #202124;
    }

    .btn-default{
        background: #F1F3F4;
        border: 1px solid #D8D8D8;
        text-align: center;
        border-radius: 3px;
        font-size: 14px;
        font-family: "Roboto Medium";
        text-decoration: none;
        color: #5F6368;
        min-width: 173px;
        min-height: 45px;
        line-height: 45px;
        display: inline-block;
        margin: 0px 5px;

        &:hover{
            opacity: 0.8;
        }


        i{
            margin-right: 10px;
            color: #000;
            opacity: 1;
        }
    }
    .btn-action{
        min-width: 267px;
        min-height: 50px;
        text-align: center;
        color: #fff;
        background: #D93025;
        border-radius: 3px;
        display: inline-block;
        line-height: 50px;
        padding: 0;
        text-decoration: none;
        font-size: 20px;
        font-family: "Roboto";

        &:hover{
            opacity: 0.8;
        }
    }
    .portfolio-wrap{

        justify-content: center;

        .col-12{
            max-width: 700px;
        }
        
        .box-photo{
            padding: 16px 15px;
            background: #fff;
            box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.16);
            margin-bottom: 20px;
            display: flex;
            justify-content: center;

            img{
                max-width: 100%;
            }
        }
        
        @media screen and (max-width: 960px) {
            .col-12{
                max-width: 100%;
            }

            .box-photo{
                max-height: 530px;
                max-width: 670px;
                padding: 0px;
                background: transparent;
                box-shadow: none;
                margin: 0px auto 10px auto;

                img{
                    width: 100%;
                    object-fit: contain;
                    object-position: center;
                }
            }
        }
        @media screen and (max-width: 380px) {
            .box-photo{
                padding: 5px;               
            }
        }
    }

    

    .skills-wrap{
        
        justify-content: space-between;

        .box-skill{
            display: flex;
            background: #ffffff;
            box-shadow: 0px 3px 6px 0px rgba(0, 0, 0, 0.16);
            padding: 25px 0px 25px 50px;
            margin-bottom: 2%;
            align-self: stretch;
            max-width: 460px;

            img{
                width: 63px;
                height: 63px;
            }

            .logo-skill{
                width: 63px;
                height: 63px;
                border-radius: 100%;
                background: #D8D8D8;
                color: #fff;
                text-align: center;
                font-size: 24px;
                line-height: 54px;
                font-family: 'Roboto Medium';
                border: 5px solid #D8D8D8;

                &.icon_ps{
                    background: #242B74;
                    border-color: #2E9EF5;
                }
                &.icon_ai{
                    background: #202124;
                    border-color: #F4B400;
                }
                &.icon_xd{
                    background: #202124;
                    border-color: #E535AB;
                }
                &.icon_id{
                    background: #242B74;
                    border-color: #FF00AB;
                }
            }

            .info-skill{
                margin-left: 30px;
                width: 277px;
                .head-skill{

                    width: 100%;
                    justify-content: space-between;
                    display: flex;
                    margin-bottom: 25px;

                    >span{
                        font-size: 20px;
                        font-family: "Roboto";
                        color: #202124;
                    }
                }
            }


            @media screen and (max-width: 960px) {
                max-width: 100%;

                .info-skill{
                    width: 80%;
                }
            }
        }
        @media screen and (max-width: 769px) {
            .box-skill{

                padding: 20px 30px;
                justify-content: space-between;
                margin-bottom: 10px;

                .logo-skill{
                    max-width: 52px;
                    max-height: 52px;
                    font-size: 19px;
                    line-height: 44px;
                }
                .info-skill{
                    width: 73%;
                    margin-left: 0px;

                    .head-skill{
                        margin-bottom: 15px;

                        > span{
                            font-size: 15px;
                        }
                    }
                    .v-progress-linear{
                        height: 6px !important;
                    }
                } 
            } 
        }
    }

    /** Modals styles */
    .v-dialog{
        .v-card{
            padding-bottom: 80px;

            &.form-wrap{
                padding: 0;
                justify-content: center;

                .v-btn{
                    &.btn-send{
                        max-width: 207px;
                        max-height: 48px;
                        height: 48px;
                        padding: 0 30px;
                        background: #D93025;
                        color: #fff;
                        text-transform: capitalize;
                        font-size: 16px;
                        font-family: "Roboto";

                        i{
                            font-size: 26px;
                            color: #fff;
                            margin-right: 20px;
                        }
                    }

                    padding: 0 30px;
                    max-height: 48px;
                    height: 48px;
                    color: #5F6368;
                    text-transform: capitalize;
                    font-size: 16px;
                    font-family: "Roboto";

                }

            }

            .v-card__actions{
                padding: 30px;
                display: flex;
                justify-content: flex-end;
            }
            .close-icon{
                color: #D93025;
                font-size: 46px;
            }

            .container{
                padding: 70px;

                @media screen and (max-width: 769px) {
                    padding: 35px 18px;
                }
            }
        }

        @media screen and (max-width: 769px) {
            

            .v-card{
                padding-bottom: 70px !important;
                border-radius: 10px !important;

                &.form-wrap{
                    padding-bottom: 0px !important;
                    .v-btn{
                        font-size: 14px;
                        padding: 0px 25px;
                        min-height: 36px;
                        height: 36px;

                        &.btn-send{
                            max-width: 157px;
                            max-height: 36px;
                            height: 36px;
                            font-size: 14px;

                            i{
                                font-size: 16.8px;
                                margin-right: 10px;
                            }
                        }
                    }
                }
                .close-icon{
                    font-size: 22.5px;
                }
                .v-card__actions{
                    padding: 18px 18px 35px 18px;
                }
            }
        }
    }


    /** Player styles */
    .player{
        justify-content: center;
        align-items:center;
        flex-direction: column;
        display: flex;

        .hold-spectre{
            background: #F5F7F7;
            padding: 15px 22px;
            margin-bottom: 50px;
            &:hover{
                cursor: pointer;
            }
        }

        a{
            text-decoration: none;
        }

        i{
            font-size: 76px;
            color: #202124;
        }

        @media screen and (max-width: 769px) {
            .hold-spectre{
                max-width: 334px;
                max-height: 205px;
                margin-bottom: 30px;

                img{
                    max-width: 100%;
                }
            }

            i{
                font-size: 50px;
            }
        }

    }
    .hold-video{
        position: relative;
        max-width: 613px;
        max-height: 373px;
        margin: 0 auto;

        .poster-video{
            position: absolute;
            z-index: 2;
            width: 100%;
            height: 100%;
            background: #000;
            justify-content: center;
            align-items: center;
            display: flex;
            a{
                text-decoration: none;
                i{
                    font-size: 65px;
                    color: #D8D8D8;
                }
            }
        }

        video{
            position: relative;
            z-index: 1;
            max-width: 100%;
        }

        @media screen and (max-width: 769px) {
            max-width: 334px;
        }
    }

    .payment-wrap{

        .container{
            padding: 0px 70px !important;
        }

        h3{
            font-size: 24px;
            font-family: "Roboto Medium";
            color: #5F6368;
            font-weight: normal;
        }

        .hold-payment{
            background: #F5F7F7;
            max-width: 710px;
            min-height: 160px;
            margin: 20px auto;

            .pay-method{

                .item-pay{
                    display: flex;
                }

                .v-radio{
                    margin-right: 0px;
                    margin-left: 0;
                }
            }

            .col-12{
                align-items: center;
                display: flex;
            }
        }
        @media screen and (max-width: 769px) {

            h3{
                font-size: 16px;
            }
            .container{
                padding: 0px 20px !important;
            }

            .hold-payment{
                margin-top: 10px;
                height: 147px;
                min-height: 100%;

                .pay-method{
                    .item-pay{
                        flex-flow: row;
                        display: flex;
                        margin-left: 0px;
                        margin-bottom: 0px;
                        width: 50%;
                        justify-content: center;

                        .v-radio{
                            margin: 0px;
                        }
                        img{
                            max-width: 60%;
                        }
                    }
                    
                }
            }
            
        }

    }
</style>
