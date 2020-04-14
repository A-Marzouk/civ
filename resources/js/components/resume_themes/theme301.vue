<template>
    <v-app style="width: 100%">
        <v-container class="hold_theme21" style="max-width: 1920px;">
            <v-row class="freelancerCard">
                <v-col lg="12" md="12" cols="12" class="resumeCardRight">
                    <div class="showOnlyOnmd">
                        <v-row class="head-section">
                            <v-col lg="2" md="2" sm="2" cols="3" class="imageCol">
                                <span class="img_profile bs__superInset">
                                    <img src="/images/resume_themes/theme301/profile.jpg" alt="">    
                                </span> 
                                <a href="#" @click.prevent="dialogMessage = true">Tap to chat</a>
                            </v-col>
                            <v-col lg="2" md="9" sm="9" cols="4" class="profileCol">
                               <div class="head-name">Andres Perez</div>
                               <div class="head-profile">UI Designer</div>
                               <a href="#" @click.prevent="dialogMessage = true" class="showOnProfile">Tap to chat</a>
                               <div class="option-wrap">
                                    <a href="#" @click.prevent="dialogAudio = true"><img src="/images/resume_themes/theme301/icons/headphones.png" alt=""></a>
                                    <a href="#" @click.prevent="dialogVideo = true"><img src="/images/resume_themes/theme301/icons/video-player.png" alt=""></a>
                                </div>
                               
                            </v-col>
                            <v-col lg="3" md="12" sm="12" cols="5" class="interviewSection">
                                <div class="social-wrap">
                                    <a href="" alt="Behance" title="Behance">
                                        <img src="/images/resume_themes/theme301/social_icons/behance.webp" alt="">
                                    </a>
                                    <a href="" alt="dribbble" title="dribbble">
                                        <img src="/images/resume_themes/theme301/social_icons/dribbble.webp" alt="">
                                    </a>
                                    <a href="" alt="Instagram" title="Instagram">
                                        <img src="/images/resume_themes/theme301/social_icons/instagram.webp" alt="">
                                    </a>
                                    <a href="" alt="Linkedin" title="Linkedin">
                                        <img src="/images/resume_themes/theme301/social_icons/linkedin.webp" alt="">
                                    </a>
                                    <a href="" alt="Google" title="Google">
                                        <img src="/images/resume_themes/theme301/social_icons/google.webp" alt="">
                                    </a>

                               </div>
                                
                            </v-col>
                            <v-col lg="5" md="12" sm="12" class="rateSection">
                                <a href="#" @click.prevent="dialogShare = true" class="shareOption"><img src="/images/resume_themes/theme301/icons/share.png" alt=""></a>
                                <v-row class="rate-wrap">
                                    <v-col lg="4" sm="4" cols="4">
                                        <span class="price">
                                            20
                                        </span>
                                        <span class="text_price">
                                            Hourly rate
                                        </span>
                                    </v-col>
                                    <v-col lg="4" sm="4" cols="4">
                                        <span class="hours">
                                           40 HOURS
                                        </span>
                                        <span class="text_hours">
                                            Weekly Availability
                                        </span>
                                    </v-col>
                                    <v-col lg="4" sm="4" cols="4">
                                        <a href="#" class="btn-action" @click.prevent="dialogHireme = true">Hire Me</a>
                                    </v-col>
                                </v-row>                     
                            </v-col>
                        </v-row>
                    </div>
                    <div class="hold-tabs">
                        <v-tabs
                            class="main-tabs_theme21"
                            v-model="activeTab"
                            :slider-color="colorTab"
                            :hide-slider="true"
                        >
                            <v-tab
                                v-for="(tab,index) in this.itemsTab"
                                :key="index"
                                :href="`#tab-${index}`"
                                @click="setTab(tab)"
                                :ripple="false"
                            >
                                {{getTabName(tab)}}                                   
                            </v-tab>                       
                        </v-tabs>
                    </div>                    
                    <div class="hold-contents">
                        <v-tabs-items v-model="activeTab">
                            <v-tab-item class="portfolio-section" value="tab-0" transition="fade-transition" reverse-transition="fade-transition">
                                <v-row class="portfolio-wrap"> 
                                    <v-col lg="6" sm="12" cols="12">
                                        <div class="box-photo">
                                            <img src="/images/resume_themes/theme301/item-portfolio.png"/>
                                            <span class="title-photo">My Work Art Gallery</span>  
                                        </div>
                                    </v-col>
                                    <v-col lg="6" sm="12" cols="12">
                                        <div class="box-photo">
                                            <img src="/images/resume_themes/theme301/item-portfolio.png"/>
                                            <span class="title-photo">My Work Art Gallery</span> 
                                        </div>
                                    </v-col>
                                    <v-col lg="6" sm="12" cols="12">
                                        <div class="box-photo">
                                            <img src="/images/resume_themes/theme301/item-portfolio.png"/>
                                            <span class="title-photo">My Work Art Gallery</span> 
                                        </div>
                                    </v-col>
                                    <v-col lg="6" sm="12" cols="12">
                                        <div class="box-photo">
                                            <img src="/images/resume_themes/theme301/item-portfolio.png"/>
                                            <span class="title-photo">My Work Art Gallery</span> 
                                        </div>
                                    </v-col>
                                </v-row>
                            </v-tab-item>
                            <v-tab-item class="work-section" value="tab-1" transition="fade-transition" reverse-transition="fade-transition">
                                <v-row class="work-wrap">
                                    <v-col v-for="(work, index) in 4" :key="index+'W'" lg="6" sm="12" cols="12">
                                        <v-card class="item-work">
                                            <v-card-subtitle>
                                                2005
                                                <span>&nbsp;-&nbsp;2019</span>
                                            </v-card-subtitle>
                                            <v-card-title>
                                                Web designer
                                            </v-card-title>
                                            <v-card-text>
                                                <h5>Grovvy Company</h5>
                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora ea animi aliquid. Placeat tenetur recusandae cum repellat doloremque unde consequatur eius dolor magnam vitae veritatis corrupti animi, nam ullam optio sed, officiis blanditiis dolorum rerum. Assumenda accusantium in facere saepe praesentium? Ut in voluptates quas nulla. Ut alias, sed magnam enim blanditiis vitae ipsam asperiores vel fugiat, iusto animi aspernatur quaerat at facere unde quidem sint, quam rerum laudantium nesciunt nihil. Asperiores deleniti consequuntur commodi corrupti aspernatur atque aliquam nobis inventore et consectetur fuga dignissimos amet deserunt sed eligendi possimus veniam ipsa, adipisci ullam sint? Assumenda minus similique nulla sit explicabo autem? Excepturi, repudiandae velit sed sequi quo adipisci delectus libero recusandae labore, sit aut aspernatur nobis asperiores magni. Tenetur aut minus error? Adipisci aperiam earum ad sequi, amet deserunt nam? Quam commodi tempore officiis culpa asperiores aspernatur adipisci, maxime nam quasi quis quae, praesentium facilis recusandae hic amet explicabo ea enim. Commodi rem dolore necessitatibus, eius, cupiditate ullam saepe vitae omnis delectus minima quo neque accusantium. Excepturi maiores placeat totam deleniti libero illum ducimus atque incidunt exercitationem consequuntur, suscipit quidem recusandae repellat nostrum temporibus a hic labore perferendis unde aliquid? Nulla maxime asperiores debitis dolor eos quae quia adipisci.</p>
                                            </v-card-text>
                                        </v-card>
                                    </v-col>
                                </v-row>
                                
                                
                            </v-tab-item>
                            <v-tab-item class="education-section" value="tab-2" transition="fade-transition" reverse-transition="fade-transition">
                                <v-row class="work-wrap">
                                    <v-col v-for="(education, index) in 4"
                                        :key="index + 'E'" lg="6" sm="12" cols="12">
                                        <v-card class="item-work">
                                            <v-card-subtitle>
                                                2005
                                                <span>&nbsp;-&nbsp;2019</span>
                                            </v-card-subtitle>
                                            <v-card-title>
                                                School high domestik
                                            </v-card-title>
                                            <v-card-text>
                                                <h5>School high domestik</h5>
                                                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Pariatur, similique quia quo mollitia in culpa. Sit enim omnis culpa consequuntur aspernatur asperiores quasi ullam veritatis. Doloremque eius ea eaque. Quaerat deleniti rerum expedita eveniet a unde obcaecati natus corrupti! Laudantium cumque obcaecati accusantium eaque pariatur labore in commodi inventore architecto quia error aliquid excepturi quod recusandae doloribus cum quis, repellendus adipisci, magnam odio? Consequatur fuga, unde numquam libero provident quis quae sequi eum et nulla dignissimos cupiditate commodi odit esse. Voluptatibus similique accusamus assumenda temporibus odit aspernatur neque cumque excepturi esse minus illum magnam perferendis fugit, sunt, exercitationem, quidem expedita.</p>
                                            </v-card-text>
                                        </v-card>
                                    </v-col>
                                </v-row>
                            </v-tab-item>
                            <v-tab-item class="skills-section" value="tab-3" transition="fade-transition" reverse-transition="fade-transition">
                                <v-row class="skills-wrap">
                                    <v-col lg="12">
                                        <v-tabs
                                            class="main-subtabs_skills"
                                            v-model="activeTabSkill"
                                            :centered="true"
                                            :hide-slider="true"
                                            :center-active="true"
                                        >
                                            <v-tab
                                                v-for="(skill,index) in skillsItems"
                                                :key="index"
                                                :href="`#skill_tab-${index}`"
                                                :ripple="false"
                                            >
                                                {{skill}}                                   
                                            </v-tab>                       
                                        </v-tabs>
                                        <v-tabs-items v-model="activeTabSkill" class="mc-subtabs_skills">
                                            <v-tab-item value="skill_tab-0">
                                                <v-row>
                                                    <v-col class="item-skill">
                                                        <img src="/images/resume_themes/theme301/icons/illustrator.png" alt="">
                                                    </v-col>
                                                    <v-col class="item-skill">
                                                        <img src="/images/resume_themes/theme301/icons/photoshop.png" alt="">
                                                    </v-col>
                                                    <v-col class="item-skill">
                                                        <img src="/images/resume_themes/theme301/icons/sketch.png" alt="">
                                                    </v-col>
                                                    <v-col class="item-skill">
                                                        <img src="/images/resume_themes/theme301/icons/icon-ui.png" alt="">
                                                    </v-col>
                                                    <v-col class="item-skill">
                                                        <img src="/images/resume_themes/theme301/icons/icon-ux.png" alt="">
                                                    </v-col>
                                                </v-row>
                                            </v-tab-item>
                                            <v-tab-item value="skill_tab-1">
                                                <v-row>
                                                    <v-col class="item-skill">
                                                        <img src="/images/resume_themes/theme301/icons/illustrator.png" alt="">
                                                    </v-col>
                                                    <v-col class="item-skill">
                                                        <img src="/images/resume_themes/theme301/icons/photoshop.png" alt="">
                                                    </v-col>
                                                    <v-col class="item-skill">
                                                        <img src="/images/resume_themes/theme301/icons/sketch.png" alt="">
                                                    </v-col>
                                                    <v-col class="item-skill">
                                                        <img src="/images/resume_themes/theme301/icons/icon-ui.png" alt="">
                                                    </v-col>
                                                    <v-col class="item-skill">
                                                        <img src="/images/resume_themes/theme301/icons/icon-ux.png" alt="">
                                                    </v-col>
                                                </v-row>
                                            </v-tab-item>
                                            <v-tab-item value="skill_tab-2">
                                                <v-row>
                                                    <v-col class="item-skill">
                                                        <img src="/images/resume_themes/theme301/icons/illustrator.png" alt="">
                                                    </v-col>
                                                    <v-col class="item-skill">
                                                        <img src="/images/resume_themes/theme301/icons/photoshop.png" alt="">
                                                    </v-col>
                                                    <v-col class="item-skill">
                                                        <img src="/images/resume_themes/theme301/icons/sketch.png" alt="">
                                                    </v-col>
                                                    <v-col class="item-skill">
                                                        <img src="/images/resume_themes/theme301/icons/icon-ui.png" alt="">
                                                    </v-col>
                                                    <v-col class="item-skill">
                                                        <img src="/images/resume_themes/theme301/icons/icon-ux.png" alt="">
                                                    </v-col>
                                                </v-row>
                                            </v-tab-item>
                                            <v-tab-item value="skill_tab-3">
                                               <v-row>
                                                    <v-col class="item-skill">
                                                        <img src="/images/resume_themes/theme301/icons/illustrator.png" alt="">
                                                    </v-col>
                                                    <v-col class="item-skill">
                                                        <img src="/images/resume_themes/theme301/icons/photoshop.png" alt="">
                                                    </v-col>
                                                    <v-col class="item-skill">
                                                        <img src="/images/resume_themes/theme301/icons/sketch.png" alt="">
                                                    </v-col>
                                                    <v-col class="item-skill">
                                                        <img src="/images/resume_themes/theme301/icons/icon-ui.png" alt="">
                                                    </v-col>
                                                    <v-col class="item-skill">
                                                        <img src="/images/resume_themes/theme301/icons/icon-ux.png" alt="">
                                                    </v-col>
                                                </v-row>
                                            </v-tab-item>
                                        </v-tabs-items> 
                                    </v-col>
                                </v-row>
                            </v-tab-item>                        
                        </v-tabs-items>
                    </div>
                    
                    
                </v-col>
            </v-row>
        </v-container>
        <v-dialog attach="#resumeTheme301" v-model="dialogMessage" persistent max-width="1269" overlay-opacity="0.9" overlay-color="#f8f8f8">
            <v-card class="form-wrap">
                <v-card-actions>
                    <v-icon class="close-icon" @click="cancelForm">mdi-close</v-icon>
                </v-card-actions>
                <v-form ref="formMessages" class="form-messages inset-style" v-show="!formSent" v-model="isValid">
                    <v-container>
                        <v-row>
                            <v-col lg="6" sm="12" cols="12">
                                <v-text-field
                                    v-model="formMessage.name"
                                    :rules="formMessage.nameRules"
                                    placeholder="Your Name"
                                    required
                                    color="#202124"
                                ></v-text-field>
                            </v-col>
                            <v-col lg="6" sm="12" cols="12">
                                <v-text-field
                                    v-model="formMessage.email"
                                    :rules="formMessage.emailRules"
                                    placeholder="Your Email"
                                    required
                                    color="#202124"
                                ></v-text-field>
                            </v-col>
                            <v-col lg="12" sm="12" cols="12">
                                <v-textarea
                                    v-model="formMessage.message"
                                    height="280"
                                    :no-resize="true"
                                    color="#202124"
                                    placeholder="Your Messages Here"
                                ></v-textarea>
                            </v-col>
                        </v-row>
                        <v-row>
                            <v-col lg="12" sm="12" cols="12" class="actions-wrap">
                                <a href="#" @click.prevent="submitForm" class="btn-action">Sent</a>
                            </v-col>
                        </v-row>                        
                    </v-container>                    
                </v-form>
                <div class="message-sent" v-show="formSent">
                    <v-icon>mdi-check-circle</v-icon>
                    <span>Successfully Sent</span>
                </div>
            </v-card>
        </v-dialog>
        <v-dialog attach="#resumeTheme301" v-model="dialogAudio" persistent max-width="1269" overlay-opacity="0.9" overlay-color="#f8f8f8">
             <v-card>
                <v-card-actions>
                    <v-icon class="close-icon" @click="dialogAudio = false || pauseAudio()">mdi-close</v-icon>
                </v-card-actions>
                <div class="player">
                    <span>play audio</span>
                    <a @click.prevent="!playing ? playAudio() : pauseAudio()" title="Play/Pause" href="#">
                        <v-icon v-if="!playing">mdi-play-circle</v-icon>
                        <v-icon v-else>mdi-pause-circle</v-icon>
                    </a>
                    <div class="hold-spectre" @click.prevent="!playing ? playAudio() : pauseAudio()">
                        <img src="/images/resume_themes/theme301/icons/audio-wave.png" alt="">
                    </div>
                    <audio style="display:none" ref="audioElem" id="audioElem" src="" @ended="playing = !playing"></audio>
                </div>
            </v-card>
        </v-dialog>
        <v-dialog attach="#resumeTheme301" v-model="dialogVideo" persistent max-width="1269" overlay-opacity="0.9" overlay-color="#f8f8f8">
            <v-card>
                <v-card-actions>
                    <v-icon class="close-icon" @click="dialogVideo = false">mdi-close</v-icon>
                </v-card-actions>
                <div class="hold-video">
                    <span>play video</span>
                    <div class="poster-video" ref="videoPoster">
                        <a href="#" @click.prevent="playVideo()">
                            <v-icon>mdi-play-circle</v-icon>
                        </a>                        
                    </div>
                    <video ref="videoElem" controls src=""></video>
                </div>
            </v-card>
        </v-dialog>
        <v-dialog attach="#resumeTheme301" content-class="modal__rt" v-model="dialogShare" persistent max-width="1269" overlay-opacity="0.9" overlay-color="#f8f8f8">
            <v-card>
                <v-card-actions>
                    <v-icon class="close-icon" @click="dialogShare = false">mdi-close</v-icon>
                    <img src="/images/resume_themes/theme301/icons/share-active.png" alt="">
                </v-card-actions>
                <div class="hold-share">
                    <v-row class="share-wrap">
                        <v-col lg="6">
                            <span>Share url</span>
                            <div class="social-wrap">
                                <a href="" alt="Behance" title="Behance">
                                    <img src="/images/resume_themes/theme301/social_icons/behance.webp" alt="">
                                </a>
                                <a href="" alt="dribbble" title="dribbble">
                                    <img src="/images/resume_themes/theme301/social_icons/dribbble.webp" alt="">
                                </a>
                                <a href="" alt="Instagram" title="Instagram">
                                    <img src="/images/resume_themes/theme301/social_icons/instagram.webp" alt="">
                                </a>
                                <a href="" alt="Linkedin" title="Linkedin">
                                    <img src="/images/resume_themes/theme301/social_icons/linkedin.webp" alt="">
                                </a>
                                <a href="" alt="Google" title="Google">
                                    <img src="/images/resume_themes/theme301/social_icons/google.webp" alt="">
                                </a>
                            </div>
                        </v-col>
                        <v-col lg="6">
                            <span>Download pdf</span>
                            <a href="#" class="dl-pdf"><v-icon>mdi-arrow-down-bold-circle</v-icon></a>
                        </v-col>
                    </v-row>
                    
                </div>
            </v-card>
        </v-dialog>
        <v-dialog attach="#resumeTheme301" v-model="dialogHireme" persistent max-width="1269" overlay-opacity="0.9" overlay-color="#f8f8f8">
            <v-card class="payment-wrap">
                <v-card-actions>
                    <v-icon class="close-icon" @click="dialogHireme = false">mdi-close</v-icon>
                </v-card-actions>
                <v-container>
                    <v-row class="hold-payment">
                        <v-col cols="12" lg="12">
                            <v-radio-group v-model="radioGroup" :row="true" class="pay-method">
                                <span class="item-pay">
                                    <v-radio
                                        color="#d8d8d8"
                                        value="1"
                                        name="opt-stripe"
                                        :ripple="false"
                                    >
                                    </v-radio>
                                    <img src="/images/resume_themes/theme301/icons/stripe.png" alt="">
                                </span>
                                <span class="item-pay">
                                    <v-radio
                                        color="#d8d8d8"
                                        value="2"
                                        name="opt-paypal"
                                        :ripple="false"
                                    >  
                                    </v-radio>
                                    <img src="/images/resume_themes/theme301/icons/paypal.png" alt="">
                                </span>
                            </v-radio-group>
                            
                        </v-col>
                    </v-row> 
                </v-container>                         
                
            </v-card>
        </v-dialog>
    </v-app>
</template>
<style lang="scss">
    @import 'resources/sass/themes/theme301.scss';
</style>
<style lang="scss" scoped>

    @import 'https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap';
    @import 'https://fonts.googleapis.com/css?family=Actor&display=swap';

    @font-face {
        font-family: "Gotham Medium";
        src: url("/fonts/gotham_ssv/Gotham-Medium.otf") format("opentype")
    }
    @font-face {
        font-family: "Gotham Light";
        src: url("/fonts/gotham_ssv/Gotham-Light.otf") format("opentype")
    }
    @font-face {
        font-family: "Gotham Thin";
        src: url("/fonts/gotham_ssv/Gotham-Thin.otf") format("opentype")
    }
    @font-face {
        font-family: "Gotham Ultra";
        src: url("/fonts/gotham_ssv/Gotham-Ultra.otf") format("opentype")
    }

    $max_wTheme : 1790px;
    $tab_OneColor : #D93025;
    $tab_TwoColor : #0F9D58;
    $tab_ThreeColor : #F4B400;
    $tab_FourColor : #4285F4;

    .showOnProfile{
        display: none !important;
    }

    #resumeTheme301{
        position: relative;
    }
    .container{
        margin: 0 auto !important;

        .freelancerCard{
            width: 100%;
            background: #FBFBFB;
            margin: 0px auto;
        }

        &.hold_theme21{
            padding: 0px;

            .showOnlyOnmd{
                justify-content: center;
                display: flex;
                align-items: center;
            }

            @media screen and (max-width: 769px) {
                padding: 0;

                .showOnlyOnmd{
                    border: 0;
                    box-shadow: none;
                    margin-bottom: 10px;
                }
            }
        }

    }
    
    .hold-contents{
        overflow: hidden;
        padding: 120px 0;
        margin-top: 0px;
        min-height: auto;

        .v-tabs-items{
            max-width: $max_wTheme;
            margin: 0px auto;
            background: transparent;
        }
        @media screen and (max-width: 769px) {
            min-height: auto;
            padding: 80px 0px 110px 0px;

            .portfolio-section,.work-section,.education-section,.skills-section{
                max-width: 96%;
                margin: 0px auto;
            }
        }

        @media only screen 
        and (min-device-width: 320px) 
        and (max-device-width: 480px)
        and (-webkit-min-device-pixel-ratio: 2) {
            padding-top: 50px;
        }

    }
    .head-section{
        align-items: center;
        padding: 70px 50px 30px 50px;
        justify-content: space-between;
        flex-flow: row;

        @media screen and (max-width: 769px) {
            max-width: 98%;
            padding-top: 40px;
            padding-bottom: 0;
            flex-wrap: wrap;
            justify-content: space-around;

            .showOnProfile{
                display: block !important;
            }

            .imageCol{


                .img_profile{
                    max-width: 133px;
                    max-height: 128px;

                    >img{
                        max-width: 113px;
                        max-height: 109px;
                    }
                }
                .chat-option{
                    max-width: 34px;
                    max-height: 34px;
                    border-width: 3px;
                    left: 28%;
                    bottom: -15px;

                    i{
                        font-size: 15px;
                    }
                }
                >a{
                    display: none;
                }
            }
            .profileCol{
                margin-left: 0;
                position: relative;
                min-height: 120px;

                
                .head-profile{
                    font-size: 12px !important;
                    padding-top: 0px !important;
                }
                .social-wrap{
                    a{
                        width: 67px;
                        height: 67px;
                        background: #F8F8F8;
                        box-shadow: -6px -6px 16px #FFFFFF, 
                        6px 6px 16px rgba(209, 205, 199, 0.4);
                        border-radius: 15px;
                        margin: 0px 2%;
                    }
                }

                .option-wrap{
                    position: absolute;
                    right: 5%;
                    top: 5%;
                    margin-top: 0px !important;
                    min-width: 168px;
                    justify-content: space-between !important;
                    display: flex;

                    a{
                        margin-right: 2% !important;
                    }
                }
                a.showOnProfile{
                    font-family: "Montserrat";
                    font-style: normal;
                    font-weight: bold;
                    font-size: 14px;
                    line-height: 14px;
                    letter-spacing: 0.1em;
                    text-transform: uppercase;
                    text-decoration: none;
                    color: #2410A4;
                    margin-top: 40px;
                }


            }

            .interviewSection{
                border: 0;
                align-items: center;
                margin: 75px auto;

                .title-medium{
                    font-size: 0;
                    &::before{
                        content: "Interviews:";
                        font-size: 12px;
                        font-family: "Roboto-Medium";
                    }
                }
                .option-wrap{
                    margin-top: 5px;

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
                margin: 0px;
                flex-flow: nowrap;
                min-height: 69px;
                max-height: 147px;
                max-width: 98%;

                .shareOption{
                    display: none;
                }

                .rate-wrap{

                    justify-content: center;

                    

                    .col-5,.col-7{

                        justify-content: center;
                        display: flex;
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
                    }
                    
                }
                .hire-wrap{
                    margin-top: 0px !important;

                    .col-12{
                        display: flex;
                        justify-content: flex-end;
                    }
                    
                }

                .btn-action{
                    line-height: 80px;
                    font-size: 18px;
                }
            }
        }

        @media only screen 
        and (min-device-width: 320px) 
        and (max-device-width: 480px)
        and (-webkit-min-device-pixel-ratio: 2) {

            padding-top: 35px;
            justify-content: center;
            white-space: nowrap;

            

            .profileCol{
                max-width: 100%;
                margin-left: 5%;

                .head-name{
                    font-size: 18px !important;
                }
                .option-wrap{
                    position: relative;
                    right: auto;
                    top: auto;
                    margin-top: 10px !important;
                    justify-content: flex-start !important;

                    a{
                        width: 44px !important;
                        height: 44px !important;
                        margin-right: 20px !important;

                        img{
                            max-width: 21px;
                        }
                    }
                }
                .showOnProfile{
                    display: none !important;
                }
            }

            .imageCol{

                .img_profile{
                    max-width: 117px;
                    max-height: 113px;

                    >img{
                        max-width: 99px;
                        max-height: 96px;
                    }
                }
                >a{
                    display: block;
                    font-size: 12px;
                }
            }

            .interviewSection{
                margin: 45px auto 30px auto;
                max-width: 100%;
            }

            .social-wrap{
                min-width: 320px;

                a{
                    margin: 0px 2%;
                    width: 55px;
                    height: 55px;

                    img{
                        max-width: 24px;
                        max-height: 24px;
                    }
                }
            }

            .rateSection{
                max-height: 100%;
               

                .rate-wrap{
                    padding: 20px 0px;

                    .col-4{
                        min-width: 50%;
                        max-height: 60px;
                        min-height: 60px !important;
                    }

                    .btn-action{
                        min-height: 50px;
                        font-size: 12px;
                        line-height: 50px;
                        border-radius: 15px;
                    }

                    .price,.hours{
                        font-size: 13px;
                        line-height: 24px;
                    }
                    .text_price,.text_hours{
                        font-size: 10px;
                    }
                }
            } 

            
        }

        .profileCol{
            display: flex;
            flex-flow: column;

            .head-name{
                font-family: "Montserrat";
                font-style: normal;
                font-weight: bold;
                font-size: 36px;
                line-height: 36px;
                letter-spacing: 0.2em;
                text-transform: uppercase;
                color: #575757;
            }

            .head-profile{
                font-family: "Montserrat";
                font-style: normal;
                font-weight: 500;
                font-size: 16px;
                line-height: 16px;
                letter-spacing: 0.2em;
                text-transform: uppercase;
                color: #575757;
                padding-top: 17px;
            }

            .option-wrap{
                margin-top: 10px;
                justify-content: flex-start;
                align-items: center;
                display: flex;

                .btn-default{
                    margin: 0 15px;
                }
                
                a{
                    width: 59px;
                    height: 59px;
                    background: #F8F8F8;
                    box-shadow: -6px -6px 16px #FFFFFF, 
                    6px 6px 16px rgba(209, 205, 199, 0.4);
                    border-radius: 40px;
                    display: block;
                    justify-content: center;
                    align-items: center;
                    display: flex;
                    margin-right: 15%;

                    &:hover{
                        box-shadow: -6px -6px 16px #FFFFFF, 
                        6px 6px 16px rgba(209, 205, 199, 0.4), 
                        inset 6px 4px 12px rgba(0, 0, 0, 0.25), 
                        inset -6px -4px 12px #FFFFFF;
                        border: 1px solid #fff;
                    }
                }
            }
            @media screen and (max-width: 769px) {
                .head-name{
                    font-size: 24px;
                }
            }


        }



    }

    .imageCol{
        position: relative;
        align-items: center;
        justify-content: center;
        display: flex;
        max-width: 156px;
        flex-flow: column;


        .img_profile{
            width: 156px;
            height: 150px;
            display: block;
            background: #f8f8f8;
            justify-content: center;
            align-items: center;
            display: flex;
            
            &.bs__superInset{
                box-shadow: -6px -6px 16px #FFFFFF, 
                6px 6px 16px rgba(209, 205, 199, 0.4), 
                inset 6px 4px 12px rgba(0, 0, 0, 0.25), 
                inset -6px -4px 12px #FFFFFF;
                border-radius: 15px;   
            }        

            >img{
                width: 133px;
                height: 128px;
                border-radius: 15px;
                background-position: center;
                background-size: cover;
            }
        }
        a{
            font-family: "Montserrat";
            font-style: normal;
            font-weight: bold;
            font-size: 14px;
            line-height: 14px;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: #515151;
            text-decoration: none;
            margin-top: 15px;
        }
    }

    .social-wrap{
        display: flex;
        justify-content: flex-start;
        align-items: center;

        a{
            min-width: 67px;
            height: 67px;
            background: #F8F8F8;
            box-shadow: -6px -6px 16px #FFFFFF, 
            6px 6px 16px rgba(209, 205, 199, 0.4);
            border-radius: 15px;
            margin: 0 14px;
            display: inline-flex;
            align-items: center;
            justify-content: center;

            &:hover{
                box-shadow: -6px -6px 16px #FFFFFF, 
                6px 6px 16px rgba(209, 205, 199, 0.4), 
                inset 6px 4px 12px rgba(0, 0, 0, 0.25),
                inset -6px -4px 12px #FFFFFF;
                border: 1px solid #fff;
            }
            

        }
    }

    .interviewSection{
        display: flex;
        justify-content: center;
        align-items: flex-start;
        flex-flow: column;
    }

    .rateSection{
        flex-wrap: wrap;
        justify-content: center;
        display: flex;
        align-items: center;
        position: relative;

        background: #F8F8F8;
        box-shadow: -6px -6px 16px #FFFFFF, 
        inset 6px 4px 12px rgba(0, 0, 0, 0.25), 
        inset -6px -4px 12px #FFFFFF;
        border-radius: 15px;
        max-width: 43.8%;
        
        .shareOption{
            width: 56px;
            height: 56px;
            position: absolute;
            top: -65px;
            right: 0px;
        }



        .rate-wrap{

            display: flex;
            justify-content: space-around;
            align-items: center;
            min-height: 154px;
            padding: 0px 25px;

            .col-4{
                max-width: 31.68%;
                justify-content: center;
                display: flex;
                flex-flow: column;
                align-items: center;

                &:nth-child(3){
                    background: #F8F8F8;
                    box-shadow: inset 6px 4px 10px rgba(185, 185, 185, 0.6), 
                    inset -6px -4px 16px #FFFFFF;
                    border-radius: 20px;
                    min-height: 105px;
                }
            }

            .price,.hours{
                font-family: "Montserrat";
                font-style: normal;
                font-weight: bold;
                font-size: 24px;
                line-height: 24px;
                text-align: center;
                letter-spacing: 0.2em;
                text-transform: uppercase;
                color: #515151;
            }
            .text_price,.text_hours{
                font-family: "Montserrat";
                font-style: normal;
                font-weight: 500;
                font-size: 14px;
                line-height: 24px;
                text-align: center;
                letter-spacing: 0.2em;
                text-transform: uppercase;
                color: #515151;
            }
        }
    }

    
    .hold-tabs{


        @media screen and (max-width: 769px) {
            box-shadow: none;
            position: relative;
            width: 100%;
        }
    }
    
    .main-tabs_theme21{

        max-width: $max_wTheme;
        margin: 0px auto;
        
        &::after{
            content: "";
            width: 100%;
            height: 4px;
            background: #F3F3F3;
            box-shadow: inset 0px 1px 1px rgba(202, 202, 202, 0.2);
            display: block;
        }

        .v-tab{
            display: flex;
            padding: 0px;
            margin: 0px 3%;
            width: 302px;
            height: 72px;
            background: #F8F8F8;
            box-shadow: -6px -6px 16px #FFFFFF, 6px 6px 16px rgba(209, 205, 199, 0.4);
            border-radius: 15px;
            
            font-family: 'Montserrat';
            font-style: normal;
            font-weight: 500;
            font-size: 24px;
            line-height: 24px;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: rgba(84, 84, 84, 0.2) !important;

            &:hover{
                text-decoration: none;
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

                color: #474747 !important;
                font-weight: bold;
                box-shadow: -6px -6px 16px #FFFFFF, 
                6px 6px 16px rgba(209, 205, 199, 0.4), 
                inset 6px 4px 12px rgba(0, 0, 0, 0.25), 
                inset -6px -4px 12px #FFFFFF;
                border: 1px solid #fff;

            }

            &:nth-child(1){
                order: 1;
            }
            &:nth-child(2){
                order: 3;
            }
            &:nth-child(3){
                order: 4;
            }
            &:nth-child(4){
                order: 2;
            }
            
        }

        @media screen and (max-width: 769px) {

            min-height: 77px;

            .v-tab{
                flex-flow: column;
                min-width: 80px;
                max-height: 77px;
                margin: 0 10px;
                font-weight: bold;
                font-size: 20px;
                line-height: 20px;
                color: #474747;


                i{
                    margin: 0 0 8px 0;
                    font-size: 22px;
                }
            }

        }

        @media only screen 
        and (min-device-width: 320px) 
        and (max-device-width: 480px)
        and (-webkit-min-device-pixel-ratio: 2) {
            .v-tab{
                max-width: 241px;
                max-height: 57px;
                font-size: 14px;
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
                        font-family: "Roboto-Medium" !important;
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
    /** Items tab work */
    .work-wrap{
        justify-content: space-around;

        .col-12{
            max-width: 42.8%;
            margin-bottom: 30px;
        }
        .item-work{
            width: 100%;
            background: #F8F8F8;
            box-shadow: -6px -6px 16px #FFFFFF, 6px 6px 16px rgba(209, 205, 199, 0.4), inset 6px 4px 12px rgba(0, 0, 0, 0.25), inset -6px -4px 12px #FFFFFF;
            border-radius: 15px;
            padding: 70px 54px;
            height: 100%;
            max-height: 335px;
            border: 2px solid #fff;

            

            .v-card__subtitle,.v-card__title,.v-card__text{
                padding: 0;
            }

            .v-card__title{
                
                font-family: "Gotham Medium";
                font-style: normal;
                font-weight: normal;
                font-size: 20px;
                line-height: 17px;
                color: #4F78E5;
                text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.15);
                margin-top: 15px;
            }



            .v-card__subtitle{

                font-family: "Montserrat";
                font-style: normal;
                font-weight: normal;
                font-size: 18px;
                line-height: 22px;
                color: #474747;
                text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.15);

                &::before{
                    content: "";
                    width: 16px;
                    height: 16px;
                    background: #4E75E7;
                    box-shadow: inset 0px 4px 4px rgba(0, 0, 0, 0.25);
                    display: inline-block;
                    border-radius: 100%;
                    margin-right: 36px;
                }
            }
            .v-card__title,.v-card__text{
                padding-left: 52px;

                
            }

            .v-card__text{
                margin-top: 35px;
                max-height: 135px;
                overflow: hidden;

                h5{
                    font-family: "Actor";
                    font-style: normal;
                    font-weight: normal;
                    font-size: 24px;
                    line-height: 24px;
                    color: #474747;
                    text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.15); 
                }

                p{
                    margin-top: 10px;
                    margin-bottom: 0px;
                    font-family: "Actor";
                    font-style: normal;
                    font-weight: normal;
                    color: #727272;
                    font-size: 18px;
                    line-height: 34px;
                    overflow: hidden;
                    padding: 0px;
                }
            }

        }

        @media screen and (max-width: 769px) {
            .col-12{
                max-width: 96%;
            }
            .item-work{
                max-height: 100%;
                padding: 60px 10%;
            }
        }

        @media only screen 
        and (min-device-width: 320px) 
        and (max-device-width: 480px)
        and (-webkit-min-device-pixel-ratio: 2) {
            .col-12{
                max-width: 96%;
            }

            .item-work{
                padding: 55px 20px;

                .v-card__title{
                    font-size: 18px;
                    padding-left: 36px;
                }

                .v-card__text{
                    margin-top: 20px;
                    padding-left: 36px;

                    p{
                        font-size: 16px;
                        line-height: 20px;
                    }   
                }
                .v-card__subtitle{

                    &::before{
                        margin-right: 16px;
                    }
                }
            }
        }
    }

    .skills-wrap{
        .main-subtabs_skills{
            .v-tab{
                position: relative;
                font-family: "Gotham Medium";
                font-style: normal;
                font-weight: normal;
                font-size: 14px;
                line-height: 16px;
                color: #5C5C5C;
                text-transform: capitalize;
                min-height: 30px;
                padding: 0px;
                margin: 0px 5% !important;

                &.v-tab--active{

                    &::after{
                        position: absolute;
                        content: "";
                        display: block;
                        width: 7em;
                        height: 5px;
                        background: #C5C5C5;
                        box-shadow: inset 0px 1px 5px rgba(28, 28, 28, 0.8);
                        bottom: 0px;
                        border-radius: 3px;
                    }

                    &:focus,&:hover{
                        &::before{
                            opacity: 0;
                        }
                    }
                }

                &:hover{
                    text-decoration: none;
                    &::before{
                        opacity: 0;
                    }
                }

                
            }
        }
        .mc-subtabs_skills{
            display: flex;
            justify-content: center;
            align-items: center;

            width: 100%;
            margin: 106px auto 0 auto;

            .item-skill{
                width: 76px;
                height: 76px;
                margin: 0px 17px;

                background: #F8F8F8;
                border: 2px solid #fff;
                box-shadow: -6px -6px 16px #FFFFFF, 
                6px 6px 16px rgba(209, 205, 199, 0.4);
                border-radius: 15px;
        
                justify-content: center;
                align-items: center;
                display: flex;

                &:hover{
                    
                    box-shadow: -6px -6px 16px #FFFFFF, 
                    6px 6px 16px rgba(209, 205, 199, 0.4), 
                    inset 6px 4px 12px rgba(0, 0, 0, 0.25), inset -6px -4px 12px #FFFFFF;
                }



                img{
                    width: 42.8px;
                    height: 42.8px;
                }
            }
           
        }
        @media only screen 
        and (min-device-width: 320px) 
        and (max-device-width: 480px)
        and (-webkit-min-device-pixel-ratio: 2) {
            .mc-subtabs_skills{
                .item-skill{
                    height: 57px;
                    padding: 0px;
                    margin: 0px 3%;
                }
            }
        }

    }

    .title-medium{
        font-size: 24px;
        font-family: 'Roboto-Medium';
        color: #202124;
    }

    .btn-default{
        background: #F1F3F4;
        border: 1px solid #D8D8D8;
        text-align: center;
        border-radius: 3px;
        font-size: 14px;
        font-family: "Roboto-Medium";
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
        }
    }
    .btn-action{
        display: block;
        min-width: 89%;
        min-height: 80px;
        text-align: center;
        background: #1900B4;
        box-shadow: -6px -6px 16px #FFFFFF, 
        6px 6px 16px rgba(221, 219, 216, 0.4), 
        4px 4px 20px rgba(25, 0, 180, 0.2);
        border-radius: 20px;
        font-family: "Montserrat";
        font-style: normal;
        font-weight: bold;
        font-size: 18px;
        line-height: 80px;
        letter-spacing: 0.2em;
        text-transform: uppercase;
        color: #FFFFFF;
        text-decoration: none;

        &:hover{
            opacity: 0.8;
        }
    }
    .portfolio-wrap{

        justify-content: space-evenly;

        .col-12{
            max-width: 42.8%;;
            background: #F8F8F8;
            margin-bottom: 75px;
        }
        
        .box-photo{
            display: flex;
            width: 100%;
            box-shadow: -6px -6px 16px #FFFFFF,
             6px 6px 16px rgba(209, 205, 199, 0.4), 
             inset 6px 4px 12px rgba(0, 0, 0, 0.25), 
             inset -6px -4px 12px #FFFFFF;
            border-radius: 15px;
            border: 2px solid #fff;
            flex-flow: wrap;
            padding-bottom: 45px;

            .title-photo{
                font-family: "Montserrat";
                font-style: normal;
                font-weight: normal;
                font-size: 24px;
                line-height: 25px;
                letter-spacing: 0.2em;
                text-transform: uppercase;
                display: flex;
                color: #4E4E4E;
                align-self: flex-start;
                padding-left: 42px;
            }

            img{
                margin: 0px auto;
                max-width: 100%;
            }
        }
        @media screen and (max-width: 769px) {
            .col-12{
                max-width: 100%;
                margin-bottom: 40px;
            }

            .box-photo{
                margin-bottom: 10px;
                padding: 0px 0px 50px 0px;
                max-height: 100%;

                img{
                    width: 100%;
                }

                .title-photo{
                    font-size: 16px;
                    padding-left: 5%;
                }
            }
        }

        @media only screen 
        and (min-device-width: 320px) 
        and (max-device-width: 480px)
        and (-webkit-min-device-pixel-ratio: 2) {

            .col-12{
                margin-bottom: 20px;
            }

            .box-photo{
                padding: 0px 0px 20px 0px;
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

            .logo-skill{
                width: 63px;
                height: 63px;
                border-radius: 100%;
                background: #D8D8D8;
                color: #fff;
                text-align: center;
                font-size: 24px;
                line-height: 54px;
                font-family: 'Roboto-Bold';
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
        
        &.modal__rt{

            .v-card{
                padding-bottom: 60px;

                .v-card__actions{
                    justify-content: space-between;
                }
            }

        }
        
        .v-card{
            background: #F9F9F9;
            box-shadow: -6px -6px 16px #FFFFFF, 
            inset 6px 4px 12px rgba(0, 0, 0, 0.25),
             inset -6px -4px 12px #FFFFFF;
            border-radius: 15px;   
            padding-bottom: 65px;
            border: 2px solid #fff;

            &.form-wrap{
                padding: 0 0 100px 0;
                
                .container{
                    max-width: 926px !important;
                    padding: 0px;

                    >.row{
                        justify-content: space-between;
                    }
                }

                .col-lg-6{
                    max-width: 420px;
                }

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

                .actions-wrap{
                    justify-content: center;
                    align-items: center;
                    display: flex;
                    background: #F8F8F8;
                    box-shadow: inset 6px 4px 10px rgba(185, 185, 185, 0.6), 
                    inset -6px -4px 16px #FFFFFF;
                    border-radius: 20px;
                    max-width: 378px;
                    min-height: 139px;
                    margin: 50px auto 0 auto;

                    .btn-action{
                        min-width: 336px;
                        min-height: 106px;
                        line-height: 106px;
                    }
                }

                .message-sent{
                    justify-content: center;
                    display: flex;
                    align-items: center;

                    i{
                        width: 76px;
                        height: 76px;
                        font-size: 48px;
                        padding: 28px;
                        background: #F9F9F9;
                        box-shadow: -6px -6px 16px #FFFFFF,
                         6px 6px 16px rgba(209, 205, 199, 0.4);
                        border-radius: 40px;
                        color: #1900B4;
                    }

                    span{
                        font-family: "Montserrat";
                        font-style: normal;
                        font-weight: bold;
                        font-size: 24px;
                        line-height: 24px;
                        letter-spacing: 0.2em;
                        text-transform: uppercase;
                        color: #575757;
                        margin-left: 4%;
                    }
                }



                

            }

            .v-card__actions{
                padding: 34px 37px 0px 37px;
                flex-wrap: wrap;
                justify-content: flex-end;
                display: flex;                
            }
            .close-icon{
                color: #2310A0;
                font-size: 30px;
                font-weight: bold;
                background: #F9F9F9;
                box-shadow: -6px -6px 16px #FFFFFF, 
                6px 6px 16px rgba(209, 205, 199, 0.4);
                border-radius: 40px;
                width: 62px;
                height: 62px;
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

                    .col-sm-12{
                        max-width: 90%;
                    }

                    .container{
                        padding: 20px 0px; 
                    }

                    .container > .row{
                        justify-content: center;
                    }

                    .actions-wrap{
                        margin-top: 0;
                        max-width: 35%;
                        min-height: 110px;

                        .btn-action{
                            min-width: 220px;
                            min-height: 80px;
                            line-height: 80px;
                        }
                    }
                    .message-sent{
                        margin-bottom: 50px;
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
        @media only screen 
        and (min-device-width: 320px) 
        and (max-device-width: 480px)
        and (-webkit-min-device-pixel-ratio: 2) {


                
            .v-card{
                .close-icon{
                    width: 40px;
                    height: 40px;
                    font-size: 18px;
                }

                &.form-wrap{
                    .actions-wrap{
                        max-width: 90%;
                    }
                }
            }


        }
    }


    /** Player styles */
    .player{
        justify-content: center;
        align-items:center;
        flex-flow: row;
        display: flex;

        .hold-spectre{
            padding: 0px 0px 0px 70px;
            

            img{
                background: url('/images/resume_themes/theme301/icons/audio-wave-shadow.png') no-repeat;
                background-position: 0px 8px;
            }

            &:hover{
                cursor: pointer;
            }
        }

        >span{
            font-family: "Montserrat";
            font-style: normal;
            font-weight: bold;
            font-size: 24px;
            line-height: 24px;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: #575757;
        }

        a{
            width: 76px;
            height: 76px;
            background: #F9F9F9;
            box-shadow: -6px -6px 16px #FFFFFF,
             6px 6px 16px rgba(209, 205, 199, 0.4);
            border-radius: 40px;
            text-decoration: none;
            align-items: center;
            justify-content: center;
            display: flex;
            margin-left: 2%;
        }

        i{
            font-size: 39px;
            color: #2410A4;
        }

        @media screen and (max-width: 769px) {
            justify-content: flex-start;
            flex-flow: column;
            align-items: center;

            a{
                margin: 20px 0 0 0;
            }


            .hold-spectre{
                max-width: 100%;
                margin-top: 10px;
                max-height: 205px;
                padding: 0px;

                img{
                    max-width: 100%;
                }
            }

            i{
                font-size: 50px;
            }
        }

        @media only screen 
        and (min-device-width: 320px) 
        and (max-device-width: 480px)
        and (-webkit-min-device-pixel-ratio: 2) {

            a{
                width: 60px;
                height: 60px;
            }

            i{
                font-size: 30px;
            }

            >span{
                font-size: 18px;
            }

            .hold-spectre{
                img{
                    background: none;
                }
            }
        }

    }
    .hold-video{
        position: relative;
        max-width: 1086px;
        height: 100%;
        max-height: 830px;
        margin: 0 auto;

        >span{
            font-family: "Montserrat";
            font-style: normal;
            font-weight: bold;
            font-size: 24px;
            line-height: 24px;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: #575757;
            margin-top: 65px;
            display: inline-block;
            margin-bottom: 102px;
        }

        .poster-video{
            position: absolute;
            z-index: 2;
            width: 100%;
            height: 100%;
            max-height: 75%;
            background: url('/images/resume_themes/theme301/poster.jpg') no-repeat;
            background-size: 100%;
            justify-content: center;
            align-items: center;
            display: flex;
            border-radius: 20px;

            a{
                text-decoration: none;
                i{
                    font-size: 97px;
                    color: #2410A4;
                }
            }
        }

        video{
            position: relative;
            z-index: 1;
            max-width: 100%;
            width: 100%;
            border-radius: 20px;
        }

        @media screen and (max-width: 769px) {
            max-width: 90%;

            >span{
                margin: 3% 0px;
            }

            .poster-video{
                max-height: 370px;
            }
        }
        @media only screen 
        and (min-device-width: 320px) 
        and (max-device-width: 480px)
        and (-webkit-min-device-pixel-ratio: 2) {
            > span{
                font-size: 18px;
            }

            .poster-video{
                max-height: 78%;

                a{
                    i{
                        font-size: 45px;
                    }
                }
            }
        }
    }

    .hold-share{
        .social-wrap{
            width: auto;
            max-width: 100%;
            margin-top: 70px;
        }
        .dl-pdf{
            margin-top: 70px;
            width: 67px;
            height: 67px;
            background: #F8F8F8;
            box-shadow: -6px -6px 16px #FFFFFF, 
            6px 6px 16px rgba(209, 205, 199, 0.4);
            border-radius: 15px;
            margin: 0 14px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            margin-top: 70px;

            &:hover{
                box-shadow: -6px -6px 16px #FFFFFF, 
                6px 6px 16px rgba(209, 205, 199, 0.4), 
                inset 6px 4px 12px rgba(0, 0, 0, 0.25),
                inset -6px -4px 12px #FFFFFF;
                border: 1px solid #fff;
            }

            i{
                color: #16009F;
                font-size: 34px;
            }
        }

        .share-wrap{

            .col,.col-6,.col-12{
                justify-content: flex-start;
                display: flex;
                flex-flow: column;
                align-items: center;
                padding-top: 80px;
                padding-bottom: 75px;
            }

            .col+.col,.col-6+.col-6,.col-12+.col-12{
                border-left: 5px solid #F3F3F3;
            }

            span{
                font-family: "Montserrat";
                font-style: normal;
                font-weight: bold;
                font-size: 24px;
                line-height: 24px;
                letter-spacing: 0.2em;
                text-transform: uppercase;
                color: #575757;
            }
        }
    }

    .payment-wrap{

        .container{
            padding: 0px 70px !important;
        }

        h3{
            font-size: 24px;
            font-family: "Roboto-Medium";
            color: #5F6368;
            font-weight: normal;
        }

        .hold-payment{

            max-width: 1020px;
            min-height: 160px;
            margin: 20px auto !important;

            .pay-method{

                .item-pay{
                    display: flex;
                    position: relative;
                    min-width: 475px;
                    min-height: 216px;
                    justify-content: center;
                    align-items: center;

                    img{
                        position: absolute;
                    }
                }
                .v-radio{
                    margin-right: 0px;
                    margin-left: 0;
                    width: 100%;
                    height: 100%;
                    position: absolute;
                    z-index: 1;
                    opacity: 1;
                    cursor: pointer;
                    

                    &.v-item--active{
                        box-shadow: -6px -6px 16px #FFFFFF, 
                        6px 6px 16px rgba(209, 205, 199, 0.4);
                        border-radius: 15px;
                    }

                    .v-input--selection-controls__input{
                        width: 100%;
                        height: 100%;
                    }

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
                margin: 0px auto !important;
                height: 147px;
                min-height: 100%;

                .pay-method{
                    .item-pay{
                        flex-flow: row;
                        display: flex;
                        min-width: 200px;
                        min-height: 80px;


                        .v-radio{
                            margin-left: 0px;
                        }
                        img{
                            max-width: 124px;
                        }
                    }
                    
                }
            }
            
        }

    }

    
    
    
</style>
<script>
    export default {
        name: "theme301",
        components: {},
        data() {
            return {
                // worksHistory: this.freelancer.works_history,
                // educationsHistory: this.freelancer.educations_history,
                itemsTab: [
                    "portfolio",
                    "work",
                    "education",
                    "skills"
                ],
                skillsItems: [
                    "Programming Languages",
                    "Frameworks/ Databases",
                    "Design Skills",
                    "Software"
                ],
                portfolio: true,
                activeTab: null,
                activeTabSkill: null,
                currentTab: 'portfolio',
                colorTab: '',
                formMessage: {
                    name: null,
                    nameRules: [
                        v => !!v || 'Name is required',
                        v => (v && v.length <= 10) || 'Name must be less than 10 characters',
                    ],
                    email: null,
                    emailRules: [
                        v => !!v || 'E-mail is required',
                        v => /.+@.+\..+/.test(v) || 'E-mail must be valid',
                    ],
                    message: null
                },
                formHasErrors: false,
                formSent: false,
                isValid: false,
                // --Timeline
                reverseTimeline: true,
                smallTimeline: true,
                // --Dialog
                dialogMessage: false,
                dialogAudio: false,
                dialogVideo: false,
                dialogHireme: false,
                dialogShare: false,
                // --Player
                playing: false,
                radioGroup: 1
            }
        },
        watch: {

            // freelancer: function () {
            //     // update freelancer data when prop changes
            //     this.skills = this.freelancer.skills;
            //     this.worksHistory = this.freelancer.works_history;
            //     this.educationsHistory = this.freelancer.educations_history;
            // }
            
        },
        methods: {
            getFullYear(date){
                let newDate = new Date(date);
                let yyyy = newDate.getFullYear();
                return yyyy;
            },
            getTabName(label) {
                let arrayTabs = {
                    'portfolio': 'Portfolio',
                    'work': 'Work',
                    'education': 'Education',
                    'skills': 'Skills'
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
                this.$refs.formMessages.validate();
                if(this.isValid){
                    this.formSent = true;
                }                
            },
            cancelForm() {
                this.dialogMessage = false;
                this.$refs.formMessages.reset();
                setTimeout(()=>{
                    this.formSent = false;
                },1000)                
            }
        },
        beforeMount(){},
        mounted(){},
        created() {
            this.setTab('portfolio');
        }
    }
</script>

