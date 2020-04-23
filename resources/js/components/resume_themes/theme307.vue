<template>
    <v-app style="width: 100%">
        <v-container style="max-width: 1920px;" class="hold_theme307">
            <v-row no-gutters class="head-bar">
                <v-col lg="6">
                    <v-card flat class="user-details">
                        <h3>Isabella Abigail</h3>
                        <span>UI/UX Designer</span>
                    </v-card>
                </v-col>
                <v-col lg="3" class="m-center">
                    <v-card flat class="hire-options">
                        <div class="item-hire">
                            <span class="value">15$</span>
                            <span>Hourly rate</span>
                        </div>
                        <span class="vl"></span>
                        <div class="item-hire">
                            <span class="value">35hr</span>
                            <span>Weekly Availability</span>
                        </div>                        
                    </v-card>
                </v-col>
                <v-col lg="3">
                    <v-card flat class="interview-section">
                        <span>Your interviews:</span>
                        <v-btn icon>
                            <img src="/images/resume_themes/theme307/icons/icon-audio.svg" alt="">
                        </v-btn>
                        <v-btn icon>
                            <img src="/images/resume_themes/theme307/icons/icon-video.svg" alt="">
                        </v-btn>
                    </v-card>
                </v-col>
            </v-row>
            <v-row no-gutters class="mid-bar">
                <v-col lg="2">
                    <v-card flat class="user-profile">
                        <img src="/images/resume_themes/theme307/profile.svg" alt="">
                    </v-card>                    
                </v-col>
                <v-col lg="4">
                    <v-card flat class="hold-section user-hireme">
                        <div class="col-section">
                            <span>Follow me:</span>
                            <div class="social-hold">
                                <a href="" class="icon">
                                    <img src="/images/resume_themes/theme307/social_icons/behance.webp" alt="">
                                </a>
                                <a href="" class="icon">
                                    <img src="/images/resume_themes/theme307/social_icons/dribbble.webp" alt="">
                                </a>
                                <a href="" class="icon">
                                    <img src="/images/resume_themes/theme307/social_icons/instagram.webp" alt="">
                                </a>
                                <a href="" class="icon">
                                    <img src="/images/resume_themes/theme307/social_icons/instagram.webp" alt="">
                                </a>
                            </div>
                            
                        </div>
                        <div class="col-section">
                            <v-btn text class="btn-flat">
                                Hire me
                            </v-btn>
                        </div>
                        
                    </v-card>                
                </v-col>
                <v-col lg="6" class="m-end">
                    <v-card flat class="user-skills">
                        <a href="" class="skill-item">ps</a>
                        <a href="" class="skill-item">ai</a>
                        <a href="" class="skill-item">xd</a>
                        <a href="" class="skill-item">ae</a>
                        <a href="" class="skill-item">pr</a>
                    </v-card>
                </v-col>
            </v-row>
            <v-row no-gutters class="wrap-tabs">
                <v-col lg="12">
                    <v-tabs
                        v-model="currentTab"
                        centered
                        hide-slider
                        background-color="transparent"
                        height="100%"
                    >
                        <v-tab :ripple="false">Porfolio</v-tab>
                        <v-tab :ripple="false">Work Experience</v-tab>
                        <v-tab :ripple="false">Education</v-tab>
                        <v-tab :ripple="false">About</v-tab>
                    </v-tabs>
                    <v-tabs-items v-model="currentTab">
                        <v-tab-item :transition="false" :reverse-transition="false">
                            <v-container py-3 px-0>
                                <v-row no-gutters>
                                    <v-col lg="3" v-for="(item,i) in portfolioItems" :key="i" >
                                        <img :src="`${basePath+item.src}`" alt="" class="mx-auto mt-8">                                 
                                    </v-col>
                                    <v-col lg="12">
                                        <v-card flat class="load-more" ma-auto>
                                            <v-btn flat class="btn-wshadow size-lg" text-center>
                                                load more...
                                            </v-btn>
                                        </v-card>                                        
                                    </v-col>
                                </v-row>
                            </v-container>
                        </v-tab-item>
                        <v-tab-item :transition="false" :reverse-transition="false">
                            <v-list flat>
                                <v-list-item v-for="(work,i) in 3" :key="i">
                                    <v-card flat>
                                        <div class="info-work">
                                            <span class="title-work">Creative lead</span>
                                            <span class="company">Big bang design</span>
                                            <span class="date">May 2018 - Present</span>
                                        </div>
                                        <div class="description-work">
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam, eum officia harum culpa officiis dolorem nisi quis suscipit similique, animi quas ratione reiciendis tempore aspernatur illum iure architecto incidunt minus consequatur minima iste recusandae, voluptatem eos. Laboriosam laborum ad neque?</p>
                                        </div>
                                    </v-card>
                                </v-list-item>
                            </v-list>
                        </v-tab-item>
                        <v-tab-item :transition="false" :reverse-transition="false">
                            <v-list flat>
                                <v-list-item v-for="(education,i) in 3" :key="i">
                                    <v-card flat>
                                        <div class="info-work">
                                            <span class="title-work">Udemy</span>
                                            <span class="company">PROFESSIONAL UI/UX DESIGN COURSE</span>
                                            <span class="date">September 2015 - December 2015</span>
                                        </div>
                                        <div class="description-work">
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Id esse possimus debitis voluptatum? Quia, consectetur eius quibusdam repellat, accusantium ab natus exercitationem vitae quae libero nulla id voluptas eligendi fuga eaque vero dolores! Eveniet explicabo rerum officia dolor ducimus. Officia.</p>
                                        </div>
                                    </v-card>
                                </v-list-item>
                            </v-list>
                        </v-tab-item>
                        <v-tab-item :transition="false" :reverse-transition="false">
                            <v-card flat class="about-section">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem doloribus ipsum, aliquam sequi asperiores quos deleniti quisquam laboriosam? Facilis facere error maxime deleniti adipisci animi consectetur, assumenda blanditiis hic. Corporis incidunt dolores doloribus impedit unde. Ea repudiandae suscipit natus corrupti dolorem quae quibusdam rerum ex aliquam animi. Ab, dolores vero. Modi ad cum ratione, optio nulla unde, voluptatibus accusamus aperiam aliquid quae error nam maiores odit facilis! Asperiores quos aliquam autem pariatur voluptate ipsam et laboriosam molestias, commodi corporis praesentium repellendus soluta officiis? Eum nihil temporibus quibusdam dicta aliquid vero. Ex quisquam fuga explicabo ducimus ipsum assumenda beatae sed laboriosam.</p>
                            </v-card>
                        </v-tab-item>
                    </v-tabs-items>
                    
                </v-col>
            </v-row>

        </v-container>
    </v-app>
</template>

<script>
export default {
    name: "theme307",
    data(){
        return{
            currentTab: null,
            basePath: '/images/resume_themes/theme307/',
            activeloader: true,
            portfolioItems: [
                {   
                    id:1,
                    src: 'item1.svg'
                },
                {   
                    id:2,
                    src: 'item4.svg'
                },
                {   
                    id:3,
                    src: 'item3.svg'
                },
                {   
                    id:4,
                    src: 'item4.svg'
                },
                {   
                    id:5,
                    src: 'item1.svg'
                },
                {   
                    id:6,
                    src: 'item6.svg'
                },
                {   
                    id:7,
                    src: 'item4.svg'
                },
                {   
                    id:8,
                    src: 'item1.svg'
                }
            ]
        }
    },
    methods: {
        
    },
    mounted() {
        this.currentTab =  0;
    }
}
</script>

<style lang="scss" scoped>
    @import url('https://fonts.googleapis.com/css2?family=PT+Serif+Caption:ital@0;1&family=PT+Serif:ital@0;1&display=swap');
    @import 'resources/sass/media-queries';

    .hold_theme307{
        background: #E3EDF7;
        padding: 0px;
        min-height: 100%;

        
        h2,h3,h4,h5,p,span,em,a{
            font-family: 'PT Serif Caption', serif;
        }

        .v-card{
            background: none;
        }

        .m-end{
            display: flex;
            justify-content: flex-end;
            width: 100%;
        }
        .m-center{
            display: flex;
            justify-content: center;
            width: 100%;
        }

        .btn-wshadow{
            background: linear-gradient(0deg, #E3EDF7, #E3EDF7);
            box-shadow: 4px 2px 12px rgba(136, 165, 191, 0.54),
             -4px -2px 16px #FFFFFF;
            border-radius: 10px;
            text-transform: uppercase;
            font-family: 'PT Serif Caption', serif;
            font-size: 16px;
            line-height: 21px;
            color: #31456A;
            letter-spacing: 0.1em;

            &.size-lg{
                min-width: 500px;
                min-height: 70px;
            }
        }

        .vl{
            height: 100%;
            max-height: 84px;
            width: 1px;
            background: #759CCA;
            box-shadow: 2px 2px 5px rgba(105, 141, 173, 0.4);
        }

        .head-bar{
            padding: 39px 70px;
            mix-blend-mode: normal;
            box-shadow: -10px 2px 30px #FFFFFF, 
            16px 10px 48px rgba(136, 165, 191, 0.58);
        }

        .user-details{
            display: flex;
            flex-flow: column;
            align-items: flex-start;
            max-width: 310px;
            margin: 0 auto;
            background: none;

            h3{
                font-style: normal;
                font-weight: normal;
                font-size: 40px;
                line-height: 53px;
                color: #31456A;
            }
            span{
                font-family: 'PT Serif';
                font-style: italic;
                font-weight: normal;
                font-size: 18px;
                line-height: 24px;
                color: #31456A;
                justify-self: flex-start;
                display: flex;
            }
        }
        .hire-options{
            display: flex;
            justify-content: space-around;
            flex-flow: row;
            align-items: center;
            height: 100%;
            background: none;
            box-shadow: 4px 2px 16px rgba(136, 165, 191, 0.48), -4px -2px 16px #FFFFFF;
            min-height: 92px;
            width: 400px;
            border-radius: 6px;

            .item-hire{
                flex-flow: column;
                display: flex;

                span{
                    font-size: 18px;
                    color: #31456A;

                    &.value{
                        font-size: 24px;
                        
                    }
                }
            }
        }
        .interview-section{
            display: flex;
            justify-content: flex-end;
            height: 100%;
            align-items: center;
            background: none;
            
            span{
                font-size: 18px;
                line-height: 24px;
                color: #31456A;
            }
            button{
                width: 50px;
                height: 40px;
                background: #E3EDF7;
                box-shadow: 6px 2px 16px rgba(136, 165, 191, 0.48),
                 -6px -2px 16px rgba(255, 255, 255, 0.8);
                border-radius: 4px;
                margin: 0 5px;
            }
        }

        .mid-bar{
            padding: 0 70px;

            .user-profile{
                display: flex;
                justify-content: center;
                align-items: center;
                max-width: 270px;
                height: 270px;
                background: #E3EDF7;
                box-shadow: -16px -2px 56px #FFFFFF, 
                16px 10px 48px rgba(136, 165, 191, 0.58);
                border-radius: 100%;
                margin-top: -135px;

                img{
                    width: 100%;

                }
            }
        }

        .hold-section{
            display: flex;
            justify-content: space-between;


            &.user-hireme{
                max-width: 400px;
                display: flex;
                padding-top: 45px;
                background: none;
                align-items: center;
            }

            .col-section{
                display: flex;
                flex-flow: column;

                >span{
                    font-family: PT Serif Caption;
                    font-style: normal;
                    font-weight: normal;
                    font-size: 18px;
                    line-height: 24px;
                    text-transform: capitalize;
                    color: #31456A;
                }

                .btn-flat{
                    width: 170px;
                    height: 50px;
                    background: linear-gradient(0deg, #E3EDF7, #E3EDF7);
                    box-shadow: 4px 2px 12px rgba(136, 165, 191, 0.54),
                     -4px -2px 16px #FFFFFF;
                    border-radius: 10px;
                    font-family: 'PT Serif Caption', serif;
                    font-style: normal;
                    font-weight: normal;
                    font-size: 16px;
                    line-height: 21px;
                    display: flex;
                    align-items: center;
                    text-align: center;
                    text-transform: uppercase;
                    color: #31456A;
                }
            }
        }
        .social-hold{
            width: 180px;
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
            
            a{
                display: inline-flex;
                text-decoration: none;
                justify-content: center;
                
                &.icon{
                    width: 34px;
                    height: 34px;
                    background: linear-gradient(0deg, #E3EDF7, #E3EDF7);
                    box-shadow: 4px 2px 16px rgba(136, 165, 191, 0.48), -4px -2px 16px #FFFFFF;
                    border-radius: 12px;
                    display: flex;
                    justify-content: center;
                    align-items: center;

                    img{
                        max-width: 16px;
                        max-height: 16px;

                    }
                }
            }
        }
        .user-skills{
            width: 535px;
            justify-content: space-between;
            display: flex;
            align-items: center;
            background: none;

            .skill-item{
                font-family: 'PT Serif Caption', serif;
                font-size: 32px;
                line-height: 42px;
                color: #31456A;
                width: 80px;
                height: 80px;
                background: linear-gradient(0deg, #E3EDF7, #E3EDF7);
                box-shadow: 4px 2px 16px rgba(136, 165, 191, 0.48),
                 -4px -2px 16px #FFFFFF;
                border-radius: 500px;
                text-transform: capitalize;
                display: inline-flex;
                align-items: center;
                justify-content: center;
            }
        }
        .wrap-tabs{
            padding: 0px 70px;
            margin-top: 30px;

            .v-tabs{
                background: #E3EDF7;
                box-shadow: -6px 2px 16px rgba(255, 255, 255, 0.8),
                 6px 2px 16px rgba(136, 165, 191, 0.48);
                border-radius: 6px;
                max-height: 100%;
                height: 130px;

                .v-tab{
                    background: none;
                    padding: 0 2.8%;
                    font-family: 'PT Serif Caption';
                    font-size: 1.6em;
                    text-transform: capitalize;
                    color: #31456A !important;
                    letter-spacing: normal;

                    &.v-tab--active{
                        box-shadow: inset 3px 3px 7px rgba(136, 165, 191, 0.48),
                        inset -3px -3px 7px #FFFFFF;
                        border-radius: 12px;
                    }

                    &:hover{
                        &::before{
                            opacity: 0;
                        }
                    }
                }
            }

            .v-tabs-items{
                background: none;

            }

            .v-list{
                background: none;
                padding: 0;
                margin-top: 30px;

                .v-list-item{
                    padding: 0;
                    margin-bottom: 35.7px;

                    .v-card{
                        padding: 23.7px 20px;
                        border-radius: 0;
                        background: #E3EDF7;
                        box-shadow: inset 3px 3px 7px rgba(136, 165, 191, 0.48),
                            inset -3px -3px 7px #FFFFFF;
                        border-radius: 12px;
                        display: flex;
                        flex-flow: row;
                        justify-content: space-between;
                        align-items: center;
                    }

                    .info-work{
                        min-width: 269px;
                        height: 248.89px;
                        background: #E3EDF7;
                        box-shadow: -6px -2px 16px rgba(255, 255, 255, 0.8), 
                        6px 2px 16px rgba(136, 165, 191, 0.48);
                        border-radius: 6px;
                        display: flex;
                        flex-flow: column;
                        justify-content: center;
                        align-items: center;

                        .title-work{
                            font-family: 'PT Serif Caption';
                            font-size: 24px;
                            line-height: 32px;
                            text-transform: uppercase;
                            color: #31456A;
                            max-width: 200px;
                            width: 100%;
                        }
                        .company{
                            font-family: "PT Serif";
                            font-size: 16px;
                            line-height: 19px;
                            color: #7287AD;
                            text-transform: uppercase;
                            max-width: 200px;
                            width: 100%;
                            letter-spacing: 0;
                            font-style: normal;
                            margin: 8% 0;
                        }
                        .date{
                            font-family: "PT Serif";
                            font-style: italic;
                            font-weight: normal;
                            font-size: 16px;
                            line-height: 19px;
                            color: #31456A;
                            max-width: 200px;
                            width: 100%;
                            letter-spacing: -1px;                            
                        }
                    }
                    .description-work{
                        p{
                            padding: 0px 50px;
                            margin: 0;
                            font-family: "PT Serif";
                            font-size: 20px;
                            line-height: 32px;
                            color: #7287AD;
                        }
                    }
                }
            }            

        }

        .load-more{
            display: flex;
            justify-content: center;
            margin-top: 55px;
            margin-bottom: 88px;

            &.v-card{
                background: none;
            }
        }

        .about-section{
            padding: 30px 40px;

            p{
                font-family: PT Serif;
                font-size: 20px;
                line-height: 32px;
                color: #7287AD;
            }
        }
        
    }
</style>