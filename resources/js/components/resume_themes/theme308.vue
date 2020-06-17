<template>
    <v-app style="width: 100%">
        <v-container style="max-width: 1920px;" class="hold_theme308">
            <v-row no-gutters class="wrap-head">
                <v-col lg="12" md="12" sm="12" class="top-options">
                    <span class="init-title">My portfolio</span>
                    <a href=""><v-img width="24" src="/images/resume_themes/theme308/icons/start-chat.svg"></v-img>Start a Chat!</a>
                    <a href=""><v-img width="18.5" height="15.8" src="/images/resume_themes/theme308/icons/suitcase.svg"></v-img>Upload Interviews</a>
                </v-col>
                <v-col lg="6" md="6" sm="6">
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
                <v-col lg="6" md="6" sm="6" class="icon-avatar">
                    <v-avatar size="405">
                        <v-img src="/images/resume_themes/theme308/profile.png"></v-img>
                    </v-avatar>
                </v-col>
               

            </v-row>
            <v-row no-gutters class="wrap-head_mob">
                <v-col sm="12">
                    <div class="wrap-top_mob">
                        <div class="info-user">
                            <v-avatar size="50">
                                <v-img src="/images/resume_themes/theme308/profile.png"></v-img>
                            </v-avatar>
                            <v-card flat>
                                <span class="name_mob">
                                    Rosalina Karen
                                </span>
                                <span class="profile_mob">
                                    Product designer
                                </span>
                            </v-card>
                        </div>
                        <div class="more-options">
                            <v-img class="open-over" @click.prevent="show_overmenu = !show_overmenu" src="/images/resume_themes/theme308/icons/more-options.svg"></v-img>
                            <div class="over_menu" :class="{show: show_overmenu}">
                                <a href="#"><v-img src="/images/resume_themes/theme308/icons/init-chat.svg"></v-img>Start A Chat!</a>
                                <a href="#"><v-img src="/images/resume_themes/theme308/icons/suitcase-gray.svg"></v-img>Upload Interviews</a>
                            </div>
                        </div>
                    </div>
                    <div class="wrap-bottom_mob">
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
                    </div>
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
                                    <v-col lg="12" md="12" sm="12" class="d-none d-sm-flex">
                                        <h3 class="title-section">
                                            <span class="title-subhead">
                                                Illustration
                                            </span>
                                            <span class="line-h"></span>
                                        </h3>
                                    </v-col>
                                    <v-col lg="12" md="12" sm="12" cols="12" class="box-items">
                                        <v-btn text class="next-lnk" @click="nextSlide('sl_i')">Next <v-img width="11.12" height="18" src="/images/resume_themes/theme308/icons/arrow-right.svg"></v-img></v-btn>
                                        <slick ref="slick_i" :options="slickOptions">
                                            <div v-for="i in [1,2,3,4,5,6]" :key="i" class="item">
                                                <v-img :src="`/images/resume_themes/theme308/cap${i}.png`"></v-img>
                                                <span class="category">Web design</span>
                                                <span class="name-item">Happily.you Mobile Application</span>
                                            </div>
                                            
                                        </slick>
                                    </v-col>                                    
                                   
                                    <v-col lg="12" md="12" sm="12" class="d-none d-sm-flex">
                                        <h3 class="title-section">
                                            <span class="title-subhead">Product Design</span>
                                            <span class="line-h"></span>
                                        </h3>
                                    </v-col>  
                                    <v-col lg="12" md="12" sm="12" cols="12" class="box-items">
                                        <v-btn text class="next-lnk" @click="nextSlide('sl_p')">Next <v-img width="11.12" height="18" src="/images/resume_themes/theme308/icons/arrow-right.svg"></v-img></v-btn>
                                        <slick ref="slick_p" :options="slickOptions">
                                            <div v-for="i in [1,2,3,4,5,6]" :key="i" class="item">
                                                <v-img :src="`/images/resume_themes/theme308/cap${i}.png`"></v-img>
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
                                    <v-col lg="4" md="4" sm="12" class="item-text">
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
                                    <v-col lg="4" md="4" sm="12" class="item-text centered">
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
                                    <v-col lg="4" md="4" sm="12" class="item-text">
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
                                    <v-col lg="4" md="4" sm="12" class="item-text">
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
                                    <v-col lg="4" md="4" sm="12" class="item-text">
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
                                    <v-col lg="4" md="4" sm="12" class="item-text">
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
                                    <v-col lg="4" md="4" sm="12" class="item-text centered">
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
                                    <v-col lg="4" md="4" sm="12" class="item-text">
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
                                    <v-col xl="3" lg="4" md="4" sm="5" cols="12" v-for="(item_skill,i) in skill_values" :key="i" class="skill-item">
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
                                    <v-col xl="5" lg="4" md="4" sm="4" cols="12" >
                                        <v-img max-width="662" class="caption_about" src="/images/resume_themes/theme308/caption-about.svg"></v-img>
                                    </v-col>
                                    <v-col xl="4" lg="6" md="4" sm="5" cols="12"  class="about-content">
                                        <span class="subtitle">About me</span>
                                        <h2>Designing WithThe  Passion While.</h2>
                                        <span class="note">I work to create innovative solutions that inspire, and foster memorable relationships between brands and their clients. With </span>
                                        <p>I work to create innovative solutions that inspire, and foster memorable relationships between brands and their clients. With a focus on branding and UI / Web, I strive to create usable and polished products through passionate and deliberate design<br><br>
                                        I work to create innovative solutions that inspire, and foster memorable relationships between brands and their clients. With a focus on branding and UI / Web, I strive to create usable and polished products through passionate and deliberate designI work t
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam repudiandae, nemo adipisci quo id repellendus vitae, illum beatae qui facilis necessitatibus nesciunt maiores reiciendis ea ipsa quisquam incidunt cum rem quaerat ullam? Illo, doloribus asperiores iusto ullam iste perferendis laborum facere corrupti quidem aspernatur minus amet eaque voluptatibus beatae alias!</p>
                                    </v-col>
                                    <v-col xl="3" lg="2" md="3" sm="3" cols="12" class="about-contact">
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
                responsive: [
                    {
                        breakpoint: 480,
                        settings: "unslick"
                    }
                ]
            },
            skill_values: {
                skill_a: 90,
                skill_b: 45,
                skill_c: 70,
                skill_d: 65
            },
            show_overmenu: false
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

        @media (max-width: 800px){
            background-size: 41%;
        }

        @media (max-width: 500px){
            background: url('/images/resume_themes/theme308/bg-lines.svg') top center no-repeat;
            background-color: #FD6562;
            background-size: contain;
            padding:0;
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

            @media (max-width: 500px){
                display: none;
            }
        }

        .wrap-head_mob{

            width: 100%;
            display: block;
            padding: 50px 6% 24px 5%;

            .wrap-top_mob{
                width: 100%;
                display: flex;
                justify-content: space-between;

                .info-user{
                    max-width: 220px;
                    display: flex;

                    .v-card{

                        display: flex;
                        flex-flow: column;
                        margin-left: 12px;
                        padding-top: 5px;

                        .name_mob{
                            font-family: "Muli";
                            font-size: 12px;
                            font-weight: bold;
                            line-height: 16px;
                            color: #fff;
                            letter-spacing: 0;
                        }

                        .profile_mob{
                            font-family: "Muli";
                            font-size: 10px;
                            font-weight: normal;
                            line-height: 15px;
                            color: #fff;
                            letter-spacing: 0;
                        }

                    }

                }

                .more-options{
                    position: relative;

                    .open-over{
                        width: 22px;
                        height: 20px;
                    }

                    .over_menu{
                        position: absolute;
                        background: #fff;
                        min-width: 90vw;
                        max-width: 400px;
                        min-height: 171px;
                        padding: 0 40px;
                        top: -250px;
                        transition: all ease-in 0.3s;
                        opacity: 0;
                        right: 2%;
                        z-index: 10;
                        border: 0;
                        border-radius: 25px;
                        box-shadow: 0px 30px 30px rgba(16, 44, 44, 0.1);
                        display: flex;
                        flex-flow: column;
                        align-items: flex-start;
                        justify-content: space-evenly;

                        &.show{
                            opacity: 1;
                            top: 35px;
                        }

                        a{
                            font-family: "Muli";
                            font-size: 18px;
                            font-weight: normal;
                            line-height: 23px;
                            color: #28404A;
                            display: inline-flex;

                            .v-image{
                                width: 24px;
                                height: 24px;
                                margin-right: 9px;
                            }
                        }
                    }
                }
            }

            .wrap-bottom_mob{
                width: 100%;
                display: flex;
                justify-content: space-between;

                .hire-info{
                    margin: 0;
                    padding-left: 20%;

                    .item-hire{
                        max-width: 65px;

                        .amount{
                            font-family: 'Muli';
                            font-weight: bold;
                            font-size: 15px;
                            color: #FFF2F2;
                        }
                        .name-hire{
                            font-family: 'Muli';
                            font-weight: normal;
                            font-size: 8px;
                            color: #FFF2F2;
                        }
                    }

                    .action-hireme{
                        justify-content: flex-end;
                        max-width: 100%; 

                        .btn-hire{
                            width: 100px;
                            height: 39px !important;
                            font-size: 10px;
                        }
                    }
                }
            }


            @media (min-width: 500px){
                display: none;
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

            @media (max-width: 1200px){
                .v-tabs{
                    padding: 0 26px;

                    
                }
            }

            @media (max-width: 500px){
                background: #FFF2F2;
                border-top-left-radius: 38px;
                border-top-right-radius: 38px;
                height: 100%;

                .v-tabs{

                    height: 36px;
                    padding: 0px 15px;
                    margin-top: 46px;
                    margin-bottom: 35px;

                    .v-tab{
                        font-size: 13px;
                        font-family: "Muli";
                        min-width: 102px;
                        margin: 0px;
                        padding: 0 15px;
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

            @media (max-width: 1200px){
                margin: 40px auto;
            }

            @media (max-width: 500px){
                margin: 10px auto;
            }


        }

        .btn-hire{
            background: #22D2C1;
            color: #fff;
            font-size: 18px;
            font-family: 'Muli';
            font-weight: bold;
            width: 219px;
            height: 68px !important;
            text-transform: capitalize;
            border-radius: 9px;
            letter-spacing: 0;
            display: flex;
            align-items: center;
            justify-content: center;

            @include lt-lg{
                width: 117.6px;
                height: 36.5px !important;
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

                @media (max-width: 500px){
                    display: none;
                }

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


                @media (max-width: 1200px){
                    margin-top: 24.7px;
                    margin-bottom: 52.3px;
                }

                @media (max-width: 500px){
                    justify-content: center;
                    overflow: hidden;
                }




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
                            height: 10px !important;
                            width: 5px !important;
                            max-width: 5px;
                            margin-top: 2px;
                        }
                    }

                    @media (max-width: 500px) {
                        display: none;
                    }

                }

                .item{

                    @media (max-width: 500px){
                        max-width: 100%;
                        margin: 0px auto 34px auto;

                        .v-image{
                            max-width: 100%;
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
                        margin-top: 13.7px;
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

                        @media (max-width: 1200px) {
                            font-size: 9px;
                            line-height: 13px;
                        }
                    }

                    .work-description{
                        margin: 0;
                        font-family: 'Muli';
                        font-size: 17px;
                        line-height: 27px;
                        color: #5F7389;

                        @media (max-width: 1200px) {
                            font-size: 14px;
                            line-height: 17px;
                        }
                    }

                    

                    
                }

                @media (max-width: 1200px){
                    margin: 0px 10px 40px 10px;
                }

                @media (max-width: 800px){
                    margin: 0px 10px 40px 10px !important;
                }

                @media (max-width: 500px){
                    max-width: 85% !important;
                    margin: 0px auto 56px auto !important;
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

            @media (max-width: 800px){
                padding: 0 5%;
            }

            @media (max-width: 500px){
                padding: 0;
            }


        }

        .skill-section{
            padding: 0 3%;

            @media (max-width: 800px){
                padding: 0 6%;
            }

            .skill-item{
                margin: 0 6% 0 0;
                max-width: 230px;

                @media (max-width: 1200px){
                    margin: 0 0 50px 0;
                }

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

                    @media (max-width: 1200px){
                        height: 129px;
                        width: 5px;
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

                        @media (max-width: 1200px){
                            font-size: 82px;
                            line-height: 100px;
                            margin-bottom: 0px;

                            &::after{
                                font-size: 16px;
                                line-height: 22px;
                            }

                        }
                    }
                    .name-skill{
                        font-family: 'PT Serif';
                        font-size: 19px;
                        line-height: 20px;
                        font-weight: bold;
                        color: #011B38;

                        @media (max-width: 1200px){
                            font-size: 12px;
                        }
                    }
                    .name-company{
                        font-family: 'PT Serif';
                        font-size: 19px;
                        line-height: 25px;
                        font-weight: normal;
                        color: #72869B;

                        @media (max-width: 1200px){
                            font-size: 12px;
                            line-height: 13px;
                        }
                    }
                }
            }

            @media (max-width: 500px){

                max-width: 280px;


                div{
                    &.row{
                        display: flex;
                        justify-content: space-around;

                        .skill-item{
                            max-width: 40%;
                            margin: 0 0 40px 0;
                        }
                    }
                }

                .skill-box{

                    .percent-skill{
                        width: 4px;
                        height: 92px;
                    }
                    .info-skill{
                        .value{
                            font-size: 59px;
                            line-height: 81px;

                        }

                        .name-skill{
                            font-size: 8px;
                            line-height: 10px;
                        }
                        .name-company{
                            font-size: 8px;
                            line-height: 10px;
                        }
                    }
                }


            }



        }

        .about-section{
            padding: 0;

            .caption_about{


                @media (max-width: 1200px){
                    max-width: 309px !important;
                    margin: 0 10%;
                }
            }

            .about-content{

                @media (max-width: 1200px){
                    margin-left: 5%;
                }

                @media (max-width: 800px){
                    margin-left: 0px;
                }

                @media (max-width: 500px){
                    margin: 0px auto;
                    max-width: 300px;
                }

                .subtitle{
                    font-family: 'PT Serif';
                    font-size: 16px;
                    font-weight: normal;
                    color: #FD6562;

                    @media (max-width: 1200px){
                        font-size: 7px;
                    }
                }
                h2{
                    font-family: 'PT Serif';
                    font-size: 56px;
                    line-height: 67px;
                    font-weight: bold;
                    color: #011B38;

                    @media (max-width: 1200px){
                        font-size: 25px;
                        line-height: 30px;
                    }

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

                    @media (max-width: 1200px){
                        font-size: 13px;
                        line-height: 17px;
                        max-height: 100%;
                        background-size: 13px;
                        margin: 20px auto;
                        padding-left: 20px;
                    }
                }
                p{
                    font-family: 'Muli';
                    font-size: 17px;
                    line-height: 27px;
                    font-weight: normal;
                    color: #5F7389;

                    @media (max-width: 1200px){
                        font-size: 13px;
                        line-height: 17px;
                    }

                }
            }
            .about-contact{
                display: flex;
                justify-content: flex-end;
                padding-top: 75px;

                @media (max-width: 800px){
                    justify-content: center;
                }

                @media (max-width: 500px){
                    display: flex;
                    justify-content: center;
                    padding: 3% 0px 2% 0px;
                    height: auto;
                    background: #FD6562;
                    bottom: 0px;
                    position: fixed;
                }

                

                .v-list{
                    background-color: transparent;
                    max-width: 62%;

                    @media (max-width: 1200px){
                        max-width: 58%;
                    }

                    @media (max-width: 800px){
                        max-width: 85%;
                    }

                    @media (max-width: 500px){
                        max-width: 85%;
                        display: flex;
                        flex-flow: wrap;
                        justify-content: space-between;
                    }

                    .v-list-item{
                        padding: 0;
                        margin-bottom: 50px;

                        @media (max-width: 1200px){
                            margin-bottom: 20px;
                        }
                        @media (max-width: 800px){
                            margin-bottom: 12px;
                            min-height: 50px;
                        }

                        @media (max-width: 500px){
                            margin-bottom: 8px;
                            max-width: 50%;
                        }

                        .v-avatar{

                            margin: 0 19px 0 0;

                            @media (max-width: 1200px){
                                width: 41px !important;
                                height: 41px !important;
                                min-width: 41px !important;
                                margin: 0 10px 0 0;
                            }

                            &.fullname{
                                background: #fff;

                                .v-image{


                                    @media (max-width: 1200px){
                                        max-width: 13.5px !important;
                                    }
                                }
                            }
                            &.phone{
                                background: #22D2C1;

                                .v-image{


                                    @media (max-width: 1200px){
                                        max-width: 15.6px !important;
                                    }
                                }
                            }
                            &.website{
                                background: #0524AD;

                                .v-image{


                                    @media (max-width: 1200px){
                                        max-width: 13.8px !important;
                                    }
                                }
                            }
                            &.email{
                                background: #FEAC29;

                                .v-image{


                                    @media (max-width: 1200px){
                                        max-width: 15.9px !important;
                                    }
                                }
                            } 
                        }

                        .v-list-item__content{
                            .v-list-item__title{
                                font-family: 'PT Serif';
                                font-size: 25px;
                                font-weight: bold;
                                margin-bottom: 10px;
                                color: #fff;

                                @media (max-width: 1200px){
                                    font-size: 14px;
                                }

                            }
                            .v-list-item__subtitle{
                                font-family: 'PT Serif';
                                font-size: 16px;
                                font-weight: normal;
                                color: #fff;

                                @media (max-width: 1200px){
                                    font-size: 9px;
                                }
                            }
                        }
                    }

                    
                }
            }

            @media (max-width: 1200px){
                max-width: 100%;
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
                            
                            @media (max-width: 1200px){
                                width: 5.2px;
                                height: 9.8px;
                            }

                        }
                        
                    }
                    &:nth-child(2){

                        .v-image{
                            width: 16.0px;
                            height: 16.0px;

                            @media (max-width: 1200px){
                                width: 8.6px;
                                height: 8.6px;
                            }
                        }
                        
                    }
                    &:nth-child(3){

                        .v-image{
                            width: 20.59px;
                            height: 12.91px;

                            @media (max-width: 1200px){
                                width: 11px;
                                height: 6.9px;
                            }
                        }
                        
                    }
                    &:nth-child(4){

                        .v-image{
                            width: 18.3px;
                            height: 14.86px;

                            @media (max-width: 1200px){
                                width: 9.8px;
                                height: 7.9px;
                            }
                        }
                        
                    }
                    &:nth-child(5){

                        .v-image{
                            width: 17.73px;
                            height: 17.73px;

                            @media (max-width: 1200px){
                                width: 9.5px;
                                height: 9.5px;
                            }
                        }
                        
                    }

                    @media (max-width: 1200px){
                        margin: 0 10.3px;
                    }
                }
            }

            @media (max-width: 1200px){
                height: 34px !important;
            }

            @media (max-width: 500px){
                max-width: 85%;
                display: none;
            }


        }
    }
</style>