<template>
    <v-app style="width: 100%">
        <v-container style="max-width: 1920px;" class="hold_theme308">
            <v-row no-gutters class="wrap-head">
                <v-col lg="12" md="12" class="top-options">
                    <span class="init-title">My portfolio</span>
                    <a href=""><v-img width="24" src="/images/resume_themes/theme308/icons/start-chat.svg"></v-img>Start a Chat!</a>
                    <a href=""><v-img width="18.5" height="15.8" src="/images/resume_themes/theme308/icons/suitcase.svg"></v-img>Upload Interviews</a>
                </v-col>
                <v-col lg="6" md="6">
                    <v-card flat class="name-line">
                        I Am Rosalina Karen Product designer
                    </v-card>
                    <v-card flat class="top-line">
                        <v-row class="hire-info" no-gutters>
                            <v-col class="item-hire">
                                <span class="amount">$45</span>
                                <span class="name-hire">Hourly Rate</span>
                            </v-col>
                            <v-col class="item-hire">
                                <span class="amount">45 Hr</span>
                                <span class="name-hire">Weekly Avaibility</span>
                            </v-col>
                            <v-col class="action-hireme">
                                <v-btn text class="btn-hire"><v-img max-width="19" height="21" class="mr-2" src="/images/resume_themes/theme308/icons/avatar.svg"></v-img> Hire me</v-btn>
                            </v-col>
                        </v-row>
                    </v-card>
                </v-col>
                <v-col lg="6" md="6" class="icon-avatar">
                    <v-avatar size="405">
                        <v-img src="/images/resume_themes/theme308/profile.png"></v-img>
                    </v-avatar>
                </v-col>
            </v-row>
            <v-row no-gutters class="wrap-tabs">
                <v-col lg="12">
                    <v-tabs
                        v-model="currentTab"
                        hide-slider
                        background-color="transparent"
                        height="100%"
                        center-active
                        tile

                    >
                        <v-tab :ripple="false">Porfolio</v-tab>
                        <v-tab :ripple="false">Work Experience</v-tab>
                        <v-tab :ripple="false">Education</v-tab>
                        <v-tab :ripple="false">Skill and languages</v-tab>
                        <v-tab :ripple="false">About me &amp; Awards</v-tab>
                    </v-tabs>
                    <v-tabs-items v-model="currentTab">
                        <v-tab-item>
                            <v-container class="portfolio-section">
                                <v-row no-gutters>
                                    <v-col lg="12" md="12">
                                        <h3 class="title-section">
                                            <span class="title-subhead">
                                                Illustration
                                            </span>
                                            <span class="line-h"></span>
                                        </h3>
                                    </v-col>
                                    <v-col lg="12" md="12" class="box-items">
                                        <v-btn text class="next-lnk" @click="nextSlide('sl_i')">Next <v-img width="11.12" height="18" src="/images/resume_themes/theme308/icons/arrow-right.svg"></v-img></v-btn>
                                        <slick ref="slick_i" :options="slickOptions">
                                            <div v-for="i in [1,2,3,4,5,6]" :key="i" class="item">
                                                <v-img :src="`/images/resume_themes/theme308/cap${i+1}.png`"></v-img>
                                                <span class="category">Web design</span>
                                                <span class="name-item">Happily.you Mobile Application</span>
                                            </div>
                                            
                                        </slick>
                                    </v-col>                                    
                                   
                                    <v-col lg="12" md="12">
                                        <h3 class="title-section">
                                            <span class="title-subhead">Product Design</span>
                                            <span class="line-h"></span>
                                        </h3>
                                    </v-col>  
                                    <v-col lg="12" md="12" class="box-items">
                                        <v-btn text class="next-lnk" @click="nextSlide('sl_p')">Next <v-img width="11.12" height="18" src="/images/resume_themes/theme308/icons/arrow-right.svg"></v-img></v-btn>
                                        <slick ref="slick_p" :options="slickOptions">
                                            <div class="item">
                                                <v-img src="/images/resume_themes/theme308/cap4.png"></v-img>
                                                <span class="category">Web design</span>
                                                <span class="name-item">Happily.you Mobile Application</span>
                                            </div>
                                            <div class="item">
                                                <v-img src="/images/resume_themes/theme308/cap5.png"></v-img>
                                                <span class="category">Web design</span>
                                                <span class="name-item">Happily.you Mobile Application</span>
                                            </div>
                                            <div class="item">
                                                <v-img src="/images/resume_themes/theme308/cap6.png"></v-img>
                                                <span class="category">Web design</span>
                                                <span class="name-item">Happily.you Mobile Application</span>
                                            </div>
                                            <div class="item">
                                                <v-img src="/images/resume_themes/theme308/cap4.png"></v-img>
                                                <span class="category">Web design</span>
                                                <span class="name-item">Happily.you Mobile Application</span>
                                            </div>
                                            <div class="item">
                                                <v-img src="/images/resume_themes/theme308/cap5.png"></v-img>
                                                <span class="category">Web design</span>
                                                <span class="name-item">Happily.you Mobile Application</span>
                                            </div>
                                            <div class="item">
                                                <v-img src="/images/resume_themes/theme308/cap6.png"></v-img>
                                                <span class="category">Web design</span>
                                                <span class="name-item">Happily.you Mobile Application</span>
                                            </div>
                                        </slick>
                                    </v-col>                                
                                </v-row>
                            </v-container>
                        </v-tab-item>
                        <v-tab-item>
                           <v-container class="work-section">
                                <v-row no-gutters class="content-text">
                                    <v-col lg="4" md="4" class="item-text">
                                        <v-card flat>
                                            <div class="hold-category">
                                                <v-img src="/images/resume_themes/theme308/icons/suitcase-red.svg"></v-img>
                                            </div>                                            
                                            <h2 class="company-work">
                                                <span class="name-work">
                                                    Google
                                                    <span class="date-work">September 2017 - Present</span>
                                                </span>                                                
                                                <span class="available-time">Full time</span>
                                            </h2>
                                            <h3 class="work-name">Senior UX UI Designer</h3>
                                            <p class="work-description">
                                                Get, keoo and grow more customers with customer engagement Automation by kissmetrics. Get, keoo and grow more customers with customer engagement.
                                            </p>
                                        </v-card>
                      
                                    </v-col>
                                    <v-col lg="4" md="4" class="item-text centered">
                                        <v-card flat>
                                            <div class="hold-category">
                                                <v-img src="/images/resume_themes/theme308/icons/suitcase-white.svg"></v-img>
                                            </div> 
                                            <h2 class="company-work">
                                                <span class="name-work">
                                                    Google
                                                    <span class="date-work">September 2017 - Present</span>
                                                </span> 
                                                <span class="available-time">Full time</span>
                                            </h2>
                                            <h3 class="work-name">Senior UX UI Designer</h3>
                                            <p class="work-description">
                                                Get, keoo and grow more customers with customer engagement Automation by kissmetrics. Get, keoo and grow more customers with customer engagement.
                                            </p>
                                        </v-card>
                      
                                    </v-col>
                                    <v-col lg="4" md="4" class="item-text">
                                        <v-card flat>
                                            <div class="hold-category">
                                                <v-img src="/images/resume_themes/theme308/icons/suitcase-red.svg"></v-img>
                                            </div> 
                                            <h2 class="company-work">
                                                <span class="name-work">
                                                    Google
                                                    <span class="date-work">September 2017 - Present</span>
                                                </span>
                                                <span class="available-time">Full time</span>
                                            </h2>
                                            <h3 class="work-name">Senior UX UI Designer</h3>
                                            <p class="work-description">
                                                Get, keoo and grow more customers with customer engagement Automation by kissmetrics. Get, keoo and grow more customers with customer engagement.
                                            </p>
                                        </v-card>
                      
                                    </v-col>
                                    <v-col lg="4" md="4" class="item-text">
                                        <v-card flat>
                                            <div class="hold-category">
                                                <v-img src="/images/resume_themes/theme308/icons/suitcase-red.svg"></v-img>
                                            </div> 
                                            <h2 class="company-work">
                                                <span class="name-work">
                                                    Google
                                                    <span class="date-work">September 2017 - Present</span>
                                                </span> 
                                                <span class="available-time">Full time</span>
                                            </h2>
                                            <h3 class="work-name">Senior UX UI Designer</h3>
                                            <p class="work-description">
                                                Get, keoo and grow more customers with customer engagement Automation by kissmetrics. Get, keoo and grow more customers with customer engagement.
                                            </p>
                                        </v-card>
                      
                                    </v-col>
                                    <v-col lg="4" md="4" class="item-text">
                                        <v-card flat>
                                            <div class="hold-category">
                                                <v-img src="/images/resume_themes/theme308/icons/suitcase-red.svg"></v-img>
                                            </div> 
                                            <h2 class="company-work">
                                                <span class="name-work">
                                                    Google
                                                    <span class="date-work">September 2017 - Present</span>
                                                </span> 
                                                <span class="available-time">Full time</span>
                                            </h2>
                                            <h3 class="work-name">Senior UX UI Designer</h3>
                                            <p class="work-description">
                                                Get, keoo and grow more customers with customer engagement Automation by kissmetrics. Get, keoo and grow more customers with customer engagement.
                                            </p>
                                        </v-card>
                      
                                    </v-col>
                                </v-row>
                           </v-container>
                        </v-tab-item>
                        <v-tab-item>
                            <v-container class="education-section">
                                <v-row no-gutters class="content-text">
                                    <v-col lg="4" class="item-text">
                                        <v-card flat>
                                            <div class="hold-category">
                                                <v-img src="/images/resume_themes/theme308/icons/cap-red.svg"></v-img>
                                            </div>                                            
                                            <h2 class="company-work">
                                                <span class="name-work">
                                                    University of Cambridge
                                                </span>                                                
                                                <span class="available-time">2012 - 2015</span>
                                            </h2>
                                            <h3 class="work-name">Senior Seconday</h3>
                                            <p class="work-description">
                                                Get, keoo and grow more customers with customer engagement Automation by kissmetrics. Get, keoo and grow more customers with customer engagement.
                                            </p>
                                        </v-card>                      
                                    </v-col>
                                    <v-col lg="4" class="item-text centered">
                                        <v-card flat>
                                            <div class="hold-category">
                                                <v-img src="/images/resume_themes/theme308/icons/cap-white.svg"></v-img>
                                            </div> 
                                            <h2 class="company-work">
                                                <span class="name-work">
                                                    University of Cambridge
                                                </span>                                                
                                                <span class="available-time">2012 - 2015</span>
                                            </h2>
                                            <h3 class="work-name">Senior Seconday</h3>
                                            <p class="work-description">
                                                Get, keoo and grow more customers with customer engagement Automation by kissmetrics. Get, keoo and grow more customers with customer engagement.
                                            </p>
                                        </v-card>
                      
                                    </v-col>
                                    <v-col lg="4" class="item-text">
                                        <v-card flat>
                                            <div class="hold-category">
                                                <v-img src="/images/resume_themes/theme308/icons/cap-red.svg"></v-img>
                                            </div> 
                                            <h2 class="company-work">
                                                <span class="name-work">
                                                    University of Cambridge
                                                </span>                                                
                                                <span class="available-time">2012 - 2015</span>
                                            </h2>
                                            <h3 class="work-name">Senior Seconday</h3>
                                            <p class="work-description">
                                                Get, keoo and grow more customers with customer engagement Automation by kissmetrics. Get, keoo and grow more customers with customer engagement.
                                            </p>
                                        </v-card>
                      
                                    </v-col>
                           
                                </v-row>
                           </v-container>
                        </v-tab-item>
                        <v-tab-item>
                            <v-container class="skill-section">
                                <v-row no-gutters>
                                    <v-col xl="3" v-for="(item_skill,i) in skill_values" :key="i" class="skill-item">
                                        <v-card flat class="skill-box">
                                            <div class="percent-skill">
                                                <span class="value-percent" :style="{ 'height': item_skill+'%' }" ></span>
                                            </div>
                                            <div class="info-skill">
                                                <span class="value">{{item_skill}}</span>
                                                <span class="name-skill">UX Designer</span>
                                                <span class="name-company">Romada LLC Company</span>
                                            </div>
                                        </v-card>
                                    </v-col>
                                </v-row>
                            </v-container>
                        </v-tab-item>
                        <v-tab-item>
                            <v-container class="about-section">
                                <v-row no-gutters>
                                    <v-col xl="5">
                                        <v-img max-width="662" src="/images/resume_themes/theme308/caption-about.svg"></v-img>
                                    </v-col>
                                    <v-col xl="4" class="about-content">
                                        <span class="subtitle">About me</span>
                                        <h2>Designing WithThe  Passion While.</h2>
                                        <span class="note">I work to create innovative solutions that inspire, and foster memorable relationships between brands and their clients. With </span>
                                        <p>I work to create innovative solutions that inspire, and foster memorable relationships between brands and their clients. With a focus on branding and UI / Web, I strive to create usable and polished products through passionate and deliberate design<br><br>
                                        I work to create innovative solutions that inspire, and foster memorable relationships between brands and their clients. With a focus on branding and UI / Web, I strive to create usable and polished products through passionate and deliberate designI work t
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam repudiandae, nemo adipisci quo id repellendus vitae, illum beatae qui facilis necessitatibus nesciunt maiores reiciendis ea ipsa quisquam incidunt cum rem quaerat ullam? Illo, doloribus asperiores iusto ullam iste perferendis laborum facere corrupti quidem aspernatur minus amet eaque voluptatibus beatae alias!</p>
                                    </v-col>
                                    <v-col xl="3" class="about-contact">
                                        <v-list two-line subheader flat tile>
                                            <v-list-item>
                                                <v-list-item-avatar size="72" class="fullname">
                                                    <v-img src="/images/resume_themes/theme308/icons/person.svg" contain max-width="24"></v-img>                                                
                                                </v-list-item-avatar>
                                                <v-list-item-content>
                                                    <v-list-item-title>Full Name</v-list-item-title>
                                                    <v-list-item-subtitle>Rosalina D. Williamson</v-list-item-subtitle>
                                                </v-list-item-content>
                                            </v-list-item>
                                            <v-list-item>
                                                <v-list-item-avatar size="72" class="phone">
                                                    <v-img src="/images/resume_themes/theme308/icons/phone.svg" contain max-width="27.5"></v-img>
                                                </v-list-item-avatar>
                                                <v-list-item-content>
                                                    <v-list-item-title>Phone Number</v-list-item-title>
                                                    <v-list-item-subtitle>12345678912</v-list-item-subtitle>
                                                </v-list-item-content>
                                            </v-list-item>
                                            <v-list-item>
                                                <v-list-item-avatar size="72" class="website">
                                                    <v-img src="/images/resume_themes/theme308/icons/website.svg" contain max-width="24.5" ></v-img>
                                                </v-list-item-avatar>
                                                <v-list-item-content>
                                                    <v-list-item-title>Website</v-list-item-title>
                                                    <v-list-item-subtitle>Rosalina D. Williamson</v-list-item-subtitle>
                                                </v-list-item-content>
                                            </v-list-item>
                                            <v-list-item>
                                                <v-list-item-avatar size="72" class="email">
                                                    <v-img src="/images/resume_themes/theme308/icons/email.svg" contain max-width="28.2" ></v-img>
                                                </v-list-item-avatar>
                                                <v-list-item-content>
                                                    <v-list-item-title>Email Address</v-list-item-title>
                                                    <v-list-item-subtitle>Rosalina D. Williamson</v-list-item-subtitle>
                                                </v-list-item-content>
                                            </v-list-item>
                                        </v-list>

                                        
                                    </v-col>
                                </v-row>
                            </v-container>
                        </v-tab-item>
                    </v-tabs-items>
                    
                </v-col>
                
            </v-row>
            <v-footer fixed height="63">
                <v-card flat class="social-icons">
                    <a href=""><v-img src="/images/resume_themes/theme308/social_icons/facebook.webp"></v-img></a>
                    <a href=""><v-img src="/images/resume_themes/theme308/social_icons/linkedin.webp"></v-img></a>
                    <a href=""><v-img src="/images/resume_themes/theme308/social_icons/behance.webp"></v-img></a>
                    <a href=""><v-img src="/images/resume_themes/theme308/social_icons/twitter.webp"></v-img></a>
                    <a href=""><v-img src="/images/resume_themes/theme308/social_icons/dribbble.webp"></v-img></a>
                </v-card>
            </v-footer>
        </v-container>
    </v-app>
</template>

<script>
import Slick from 'vue-slick';
export default {
    name: "theme308",
    components: {
        Slick
    },
    data(){
        return{
            currentTab: null,
            slickOptions: {
                slidesToShow: 3,
                slidesToScroll: 1,
                variableWidth: true,
                arrows: false,
                dots: false,
                swipe: true,
                speed: 500,
                // responsive: [
                //     {
                //         breakpoint: 786,
                //         settings: {
                //             slidesToShow: 2,
                //             slidesToScroll: 1,
                //             variableWidth: false,
                //             vertical: true,
                //             verticalSwiping: true,
                //             infinite: true
                //         }
                //     },
                //     {
                //         breakpoint: 480,
                //         settings: {
                //             slidesToShow: 3,
                //             slidesToScroll: 1,
                //             variableWidth: false,
                //             vertical: true,
                //             verticalSwiping: true,
                //             infinite: true
                //         }
                //     }
                // ]
            },
            skill_values: {
                skill_a: 90,
                skill_b: 45,
                skill_c: 70,
                skill_d: 65
            }
        }
    },
    methods: {
        nextSlide(sl) {
            switch(sl){
                case "sl_i":
                    this.$refs.slick_i.next();
                break;
                case "sl_p":
                    this.$refs.slick_p.next();
                break;
            }
        }
    }
}
</script>
<style lang="scss">
    @import 'resources/sass/themes/theme308.scss';
</style>
<style lang="scss" scoped>
    @import url('https://fonts.googleapis.com/css2?family=PT+Serif:wght@400;700&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Muli:wght@300;400;700&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;700&display=swap');
    @import 'resources/sass/media-queries';

    .hold_theme308{

        padding: 39px 0;
        margin: 0px auto;
        background: url('/images/resume_themes/theme308/back_decorator.png') repeat-y;
        background-color: #FFF2F2;
        background-size: 37%;
        background-position: 127%;
        min-height: 100%;

        @include lt-lg {
            padding: 21px 0px;
        }

        .m-end{
            justify-content: flex-end;
        }

        .v-card{
            background-color: transparent;
        }


        .top-options{
            display: flex;

            .init-title{
                text-transform: capitalize;
                font-family: 'Muli';
                font-size: 18px;
                font-weight: bold;
                margin-right: 57px;
            }
            a{
                text-transform: capitalize;
                font-family: 'Muli';
                font-size: 18px;
                color: #011B38;
                display: inline-flex;
                align-items: center;
                margin-right: 42px;

                .v-image{
                    margin: 0 9px 0 0;
                }
            }

            @include lt-lg{

                .init-title{
                    font-size: 9px;
                    line-height: 15px;
                    margin-right: 35px;
                }
                a{
                    font-size: 9px;

                    .v-image{
                        margin: 0 5px 0 0;
                        max-width: 9.9px !important;
                        height: 8.5px !important;
                    }
                    
                }
                
            }
        }


        .wrap-head{
            padding: 0 96px;

            @include lt-lg {
                padding: 0px 51px;
            }
        }
        .wrap-tabs{
            padding: 0 0px;

            .v-tabs{
                padding: 0 96px;
                height: 49px;
                margin-top: 2em;

                .v-tab{
                    font-family: 'PT Serif';
                    font-size: 20px;
                    color: #011B38;
                    text-transform: capitalize;
                    margin: 0px 1%;
                    padding: 0px 22px;
                    letter-spacing: 0px;

                    &:first-child{
                        margin-left: 0px;
                    }


                    &.v-tab--active{
                        background: #FD6562;
                        color: #fff;
                        font-weight: bold;
                        border-radius: 9px;
                    }
                    &:hover{
                        &::before{
                            opacity: 0;
                        }
                    }
                }
                
            }

            @include lt-lg{
                .v-tabs{
                    padding: 0 52px;
                    height: 27px;

                    .v-tab{
                        font-size: 10px;
                    }
                }
            }

        }

        .name-line,.top-line{
            max-width: 620px;
        }

        .name-line{
            font-family: 'PT Serif';
            font-size: 60px;
            font-weight: bold;
            line-height: 75px;
            padding-top: 1em;

            @include lt-lg{
                font-size: 32px;
                line-height: 44px;
                max-width: 320px;
            }
        }

        .hire-info{
            margin-top: 33px;

            .item-hire{
                flex-flow: column;
                display: flex;
                max-width: 120px;

                // &:first-child{
                //     margin-right: 2.5em;
                //     max-width: 85px;
                // }

                .amount{
                    font-family: 'Muli';
                    font-size: 26px;
                    font-weight: bold;
                }
                .name-hire{
                    font-family: 'Muli';
                    font-size: 15px;
                }
            }

            .action-hireme{
                justify-content: center;
                display: flex;
                max-width: 300px;


            }


            @include lt-lg {
                .item-hire{
                    max-width: 60px;

                    .amount{
                        font-size: 13px;
                    }
                    .name-hire{
                        font-size: 7px;
                    }
                }

                .action-hireme{
                    max-width: 170px;
                }
                
            }
        }

        .icon-avatar{
            display: flex;
            justify-content: flex-end;

            .v-avatar{
                margin-right: 6em;
                border: 30px solid #FFF2F2;
            }

            @include lt-lg {

                margin-top: -10px;

                .v-avatar{
                    width: 218px !important;
                    min-width: 218px !important;
                    height: 218px !important;
                    border: 16.5px solid #FFF2F2;
                    margin-right: 3em;
                }
                
            }

        }

        .v-tabs-items{
            background-color: transparent;
            padding: 0px;
            margin: 70px auto 150px auto;
        }

        .btn-hire{
            background: #22D2C1;
            color: #fff;
            font-size: 18px;
            font-family: 'Muli';
            font-weight: bold;
            width: 219px;
            height: 68px;
            text-transform: capitalize;
            border-radius: 9px;
            letter-spacing: 0;
            display: flex;
            align-items: center;
            justify-content: center;

            @include lt-lg{
                width: 117.6px;
                height: 36.5px;
                font-size: 9px;

                .v-image{
                    max-width: 10.2px !important;
                    height: 11.2px !important;
                }
            }

        }

        .portfolio-section{
            padding: 0 5%;
            max-width: 100%;

            .title-section{
                width: 100%;
                position: relative;
                justify-content: space-between;
                align-items: center;
                display: flex;

                .title-subhead{
                    width: auto;
                    background: #FFF2F2;
                    padding: 0 24.5px 0 0;
                    z-index: 2;
                    font-size: 30px;
                    font-family: 'PT Serif';
                    font-weight: bold;
                    color: #F5A09F;

                    @media (max-width: 1200px){
                        font-size: 16px;
                    }
                }

                .line-h{
                    display: inline-block;
                    height: 1px;
                    min-width: 82%;
                    background: #F5A09F;
                    vertical-align: middle;
                    position: absolute;
                    right: 17%;
                }
            }

            .box-items{
                position: relative;
                margin-top: 46px;
                margin-bottom: 95px;



                .next-lnk{
                    position: absolute;
                    z-index: 2;
                    right: 0px;
                    padding: 0;
                    top: 35%;
                    font-family: "PT Serif";
                    font-size: 30px;
                    font-weight: bold;
                    text-transform: capitalize;
                    color: #fff;
                    outline: none;

                    .v-image{
                        margin-left: 30px;
                    }

                    @media (max-width: 1200px) {
                        font-size: 16px;
                        top:28%;

                        .v-image{
                            margin-left: 5px;
                        }
                    }

                }
            }

            

            .item{
                display: flex !important;
                flex-flow: column;

                .category{
                    font-family: 'Muli';
                    font-size: 14px;
                    font-weight: bold;
                    color: #FD6562;
                    margin-top: 26px;

                    @media (max-width: 1200px) {
                        font-size: 7px;
                    }
                }
                .name-item{
                    font-family: 'PT Serif';
                    font-size: 22px;
                    font-weight: bold;
                    color: #011B38;

                    @media (max-width: 1200px) {
                        font-size: 11px;
                    }
                }
            }

            .col{
                display: flex;

                .v-image{
                    max-width: 500px;
                    border-radius: 9px;
                    object-fit: contain;

                    @media (max-width: 1200px) {
                        max-width: 268px;
                    }
                }
            }
        }
        .work-section,.education-section{

            .item-text{

                border-radius: 10px;
                margin: 0 2% 4%;               
                max-width: 515px;

                &.centered{
                    box-shadow: 0px 50px 56px rgba(59, 11, 11, 0.1);

                    .v-card{

                        .hold-category{
                            background: #FD6562;
                            border: 24px solid #FD6562;
                        }
                        .company-work{
                            .available-time{
                                background: #FD6562;
                                color: #fff;
                            }
                        }
                    }
                }
               

                .v-card{
                    background: #fff;
                    border-radius: 10px;
                    position: relative;
                    padding: 84px 48px 34px 48px;

                    .hold-category{
                        width: 84px;
                        height: 84px;
                        background: #FFF2F2;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        position: absolute;
                        border: 24px solid #FFF2F2;
                        border-radius: 100%;
                        top: -35px;
                        left: 58px;

                    }

                    .company-work{
                        display: flex;
                        align-items: center;
                        justify-content: space-between;

                        .name-work{
                            font-family: 'PT Serif';
                            font-size: 20px;
                            font-weight: bold;
                            color: #011B38;
                            min-width: 270px;

                            @media (max-width: 1200px) {
                                font-size: 10px;
                                min-width: 160px;
                            }
                        }

                        .date-work{
                            font-family: 'PT Serif';
                            font-size: 15px;
                            font-weight: normal;
                            color: #011B38;
                            padding: 0 0 0 3%;

                            @media (max-width: 1200px) {
                                font-size: 8px;
                            }
                        }
                        .available-time{
                            background: #FFF2F2;
                            border-radius: 34px;
                            font-family: 'Muli';
                            font-size: 12px;
                            line-height: 27px;
                            color: #FD6562;
                            text-transform: capitalize;
                            padding: 0 20px;

                            @media (max-width: 1200px) {
                                font-size: 6px;
                                padding: 0 11px;
                                line-height: 15px;
                            }
                        }
                    }

                    .work-name{
                        font-family: 'Poppins';
                        font-size: 17px;
                        line-height: 24px;
                        letter-spacing: 0px;
                        margin: 16.9px 0 19px 0;
                    }

                    .work-description{
                        margin: 0;
                        font-family: 'Muli';
                        font-size: 17px;
                        line-height: 27px;
                        color: #5F7389;
                    }

                    

                    
                }
            }

            @include lt-lg{
                padding: 0;
                max-width: 930px;

                .item-text{
                    max-width: 284px;
                    margin: 0 12px;

                    &.centered{
                        .v-card{
                            .hold-category{
                                border:13.5px solid #FD6562;
                            }
                        }
                    }

                    .v-card{
                        padding: 48px 20px 20px;

                        .hold-category{
                            width: 46px;
                            height: 46px;
                            top: -20px;
                            left: 35px;
                            border:13.5px solid #FFF2F2;
                        }
                    }
                }
            }
        }

        .skill-section{
            padding: 0 3%;

            .skill-item{
                margin: 0 6% 0 0;
                max-width: 230px;
            }

            .skill-box{
                display: flex;

                .percent-skill{
                    height: 188px;
                    width: 7px;
                    position: relative;
                    background: rgba(253, 101, 98, 0.25);
                    margin: 0 12% 0px 0px;

                    .value-percent{
                        background: #FD6562;
                        width: 100%;
                        height: 20px;
                        transition: all 0.5s linear;
                        position: absolute;
                        bottom: 0px;
                    }
                }

                .info-skill{
                    display: flex;
                    flex-flow: column;

                    .value{
                        font-family: 'PT Serif';
                        font-size: 121px;
                        line-height: 120px;
                        color: #FD6562;
                        font-weight: bold;
                        margin-bottom: 13%;

                        &::after{
                            content: '%';
                            font-size: 24px;
                            line-height: 24px;
                            vertical-align: baseline;
                            color: #FD6562;;
                        }
                    }
                    .name-skill{
                        font-family: 'PT Serif';
                        font-size: 19px;
                        line-height: 20px;
                        font-weight: bold;
                        color: #011B38;
                    }
                    .name-company{
                        font-family: 'PT Serif';
                        font-size: 19px;
                        line-height: 25px;
                        font-weight: normal;
                        color: #72869B;
                    }
                }
            }
        }

        .about-section{
            padding: 0;

            .about-content{
                .subtitle{
                    font-family: 'PT Serif';
                    font-size: 16px;
                    font-weight: normal;
                    color: #FD6562;
                }
                h2{
                    font-family: 'PT Serif';
                    font-size: 56px;
                    line-height: 67px;
                    font-weight: bold;
                    color: #011B38;
                }
                .note{
                    background: url(/images/resume_themes/theme308/cite-bg.svg) no-repeat;
                    background-position: left center;
                    font-family: "Muli";
                    font-size: 17px;
                    line-height: 27px;
                    font-weight: normal;
                    color: #5F7389;
                    margin: 40px auto;
                    padding-left: 50px;
                    max-height: 49px;
                    display: inline-block;
                    background-size: 40px;
                }
                p{
                    font-family: 'Muli';
                    font-size: 17px;
                    line-height: 27px;
                    font-weight: normal;
                    color: #5F7389;
                }
            }
            .about-contact{
                display: flex;
                justify-content: flex-end;
                padding-top: 75px;

                .v-list{
                    background-color: transparent;
                    max-width: 62%;

                    .v-list-item{
                        padding: 0;
                        margin-bottom: 50px;

                        .v-avatar{

                            margin: 0 19px 0 0;

                            &.fullname{
                                    background: #fff;
                            }
                            &.phone{
                                background: #22D2C1;
                            }
                            &.website{
                                background: #0524AD;
                            }
                            &.email{
                                background: #FEAC29;
                            }
                        }

                        .v-list-item__content{
                            .v-list-item__title{
                                font-family: 'PT Serif';
                                font-size: 25px;
                                font-weight: bold;
                                margin-bottom: 10px;
                                color: #fff;
                            }
                            .v-list-item__subtitle{
                                font-family: 'PT Serif';
                                font-size: 16px;
                                font-weight: normal;
                                color: #fff;
                            }
                        }
                    }

                    
                }
            }
        }

        

        .v-footer{
            justify-content: center;
            display: flex;
            background: #fff;
            box-shadow: 0px 0px 50px rgba(40, 64, 74, 0.15);

            .v-card{
                display: flex;
                flex-flow: nowrap;
                align-items: center;

                a{
                    margin: 0px 19px;

                    &:nth-child(1){

                        .v-image{
                            width: 9.8px;
                            height: 18.3px;
                        }
                        
                    }
                    &:nth-child(2){

                        .v-image{
                            width: 16.0px;
                            height: 16.0px;
                        }
                        
                    }
                    &:nth-child(3){

                        .v-image{
                            width: 20.59px;
                            height: 12.91px;
                        }
                        
                    }
                    &:nth-child(4){

                        .v-image{
                            width: 18.3px;
                            height: 14.86px;
                        }
                        
                    }
                    &:nth-child(5){

                        .v-image{
                            width: 17.73px;
                            height: 17.73px;
                        }
                        
                    }
                }
            }
        }
    }
</style>