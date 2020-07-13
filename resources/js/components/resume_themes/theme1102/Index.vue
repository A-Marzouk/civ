<template>

    <v-app >
        <div class="container1" >
            <header class="header1">
                <div class="header__profile">
                    <div class="profile">
                        <div class="profile__image-block">
                            <img src="/images/resume_themes/theme1102/profile.jpg" alt="profile image"
                                 class="profile__image">
                            <div class="profile__speech-block">
                                <img src="/images/resume_themes/theme1102/icon/speech-bubble.svg" alt="profile image"
                                     class="profile__speech-bubble">
                            </div>
                        </div>
                        <div class="profile__information">
                            <div class="profile__name">Jhone doe</div>
                            <h3 class="profile__profession">3d designer</h3>

                            <div class="profile__contact">
                                <button class="profile__chat">
                                    Tap to chat
                                </button>
                                <div class="profile__logo-border">
                                    <img class="profile__logo"
                                         src="/images/resume_themes/theme1102/icon/behance-network-logo.svg" alt="logo">
                                </div>
                                <div class="profile__logo-border">
                                    <img class="profile__logo"
                                         src="/images/resume_themes/theme1102/icon/dribbble-logo.svg" alt="logo">
                                </div>
                            </div>
                        </div>
                        <div class="profile__mobile-contact">
                            <img src="/images/resume_themes/theme1102/icon/Audio.svg" alt="audio_logo">
                            <img src="/images/resume_themes/theme1102/icon/video.svg" alt="video_logo">
                        </div>
                    </div>
                    <div class="basic_info">

                        <div class="basic_info__information">
                            <h2 class="basic_info__interview"> Your Interviews :</h2>
                            <button class="basic_info__audio">
                                Upload audio
                                <img src="/images/resume_themes/theme1102/icon/Audio.svg" alt="audio_logo">
                            </button>
                            <button class="basic_info__video">
                                Upload video
                                <img src="/images/resume_themes/theme1102/icon/video.svg" alt="video_logo">
                            </button>
                        </div>
                        <div class="basic_info__rate">
                            <div class="basic_info__hourly">
                                10$ <span>Hourly rate</span>
                            </div>
                            <div class="basic_info__weekly">
                                35 hours <span>Weekly Availability</span>
                            </div>

                        </div>

                    </div>
                </div>
                <div class="line">
                    <div class="line__flex">

                    </div>
                    <div class="line__format">

                    </div>
                </div>
            </header>

            <div class="new__shadow">
                <div class="mobile__shadowU">
                    <div class="shadow-upper">

                    </div>
                </div>
                <div class="mobile-header">
                    <div class="mobile-header__hourly">
                        <div class="mobile-header__rate">
                            10$
                        </div>
                        <div class="mobile-header__description">
                            Hourly rate
                        </div>
                    </div>
                    <div class="mobile-header__hourly">
                        <div class="mobile-header__rate">
                            35 hours
                        </div>
                        <div class="mobile-header__description">
                            Weekly Availability
                        </div>
                    </div>
                </div>
                <div class="mobile__shadowD">
                    <div class="shadow-down">

                    </div>
                </div>
            </div>
            <section class="section__main">
                <v-tabs
                    v-model="tab"
                    background-color="rgba(0, 0, 0, 0)"
                    grow
                    center-active
                    centered
                    hide-slider
                    class="main-tabs"
                    height="150"
                    mobile-breakpoint="1024"
                    show-arrows

                >
                    <v-tab
                        class="index__tab-item"

                    >
                        <div class="logo__tab">
                            <div class="icon__box">

                                <portfolio_icon class="portfolio__icon common__icon"></portfolio_icon>
                            </div>

                            <div class="tab-item">

                            <div class="tab-item__text">
                                Portfolio
                            </div>
                                <div class="round">
                                    <div class="round__first">
                                        <div class="round__second">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </v-tab>
                    <v-tab

                    >
                        <div class="logo__tab">

                        <div class="icon__box">
                            <work_icon class="work__icon common__icon"></work_icon>
                        </div>
                        <div class="tab-item">
                            <div class="tab-item__text">
                                Work
                            </div>
                            <div class="round1">
                                <div class="round1__first">
                                    <div class="round1__second">

                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </v-tab>
                    <v-tab

                    >
                        <div class="logo__tab">

                        <div class="icon__box">
                            <skills_icon class="skills__icon common__icon"></skills_icon>
                        </div>
                        <div class="tab-item">
                            <div class="tab-item__text">
                               Skills
                            </div>
                            <div class="round1">
                                <div class="round1__first">
                                    <div class="round1__second">

                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </v-tab>
                    <v-tab

                    >
                        <div class="logo__tab">

                        <div class="icon__box education">
                            <education_icon class="education__icon common__icon"></education_icon>
                        </div>
                        <div class="tab-item">
                            <div class="tab-item__text">
                               Education
                            </div>
                            <div class="round">
                                <div class="round__first">
                                    <div class="round__second">

                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </v-tab>


                </v-tabs>
                <v-tabs-items class="main-tab-items" v-model="tab">
                    <v-tab-item
                        class="portfolio tab__item"
                        transition="fade-transition"
                        reverse-transition="fade-transition"
                    >
                        <portfolio></portfolio>
                        <!--                        <div>-->

                        <!--                            <button @click="next" class="portfolio__right-arrow">-->
                        <!--                                <img src="/images/resume_themes/theme1102/icon/right_arrow.svg" alt="next Arrow">-->
                        <!--                            </button>-->
                        <!--                            <button @click="prev" class="portfolio__left-arrow">-->
                        <!--                                <img src="/images/resume_themes/theme1102/icon/left_arrow.svg" alt="previous Arrow">-->
                        <!--                            </button>-->

                        <!--                            <slick class="portfolioSlides" ref="slick" :options="slickOptions">-->
                        <!--                                <div class="d-flex flex-column align-items-center">-->
                        <!--                                    <img src="/images/resume_themes/theme1102/portfolio/1.jpg" alt="portfolio image">-->
                        <!--                                    <div class="slide-text">-->
                        <!--                                        hello-->
                        <!--                                    </div>-->
                        <!--                                </div>-->
                        <!--                                <div class="d-flex flex-column align-items-center">-->
                        <!--                                    <img src="/images/resume_themes/theme1102/portfolio/1.jpg" alt="portfolio image">-->
                        <!--                                    <div class="slide-text">-->
                        <!--                                        hello-->
                        <!--                                    </div>-->
                        <!--                                </div>-->
                        <!--                                <div class="d-flex flex-column align-items-center">-->
                        <!--                                    <img src="/images/resume_themes/theme1102/portfolio/1.jpg" alt="portfolio image">-->
                        <!--                                    <div class="slide-text">-->
                        <!--                                        hello-->
                        <!--                                    </div>-->
                        <!--                                </div>-->
                        <!--                                <div class="d-flex flex-column align-items-center">-->
                        <!--                                    <img src="/images/resume_themes/theme1102/portfolio/1.jpg" alt="portfolio image">-->
                        <!--                                    <div class="slide-text">-->
                        <!--                                        hello-->
                        <!--                                    </div>-->
                        <!--                                </div>-->
                        <!--                                <div class="d-flex flex-column align-items-center">-->
                        <!--                                    <img src="/images/resume_themes/theme1102/portfolio/1.jpg" alt="portfolio image">-->
                        <!--                                    <div class="slide-text">-->
                        <!--                                        hello-->
                        <!--                                    </div>-->
                        <!--                                </div>-->
                        <!--                                <div class="d-flex flex-column align-items-center">-->
                        <!--                                    <img src="/images/resume_themes/theme1102/portfolio/1.jpg" alt="portfolio image">-->
                        <!--                                    <div class="slide-text">-->
                        <!--                                        hello-->
                        <!--                                    </div>-->
                        <!--                                </div>-->
                        <!--                                <div class="d-flex flex-column align-items-center">-->
                        <!--                                    <img src="/images/resume_themes/theme1102/portfolio/1.jpg" alt="portfolio image">-->
                        <!--                                    <div class="slide-text">-->
                        <!--                                        hello-->
                        <!--                                    </div>-->
                        <!--                                </div>-->
                        <!--                                <div class="d-flex flex-column align-items-center">-->
                        <!--                                    <img src="/images/resume_themes/theme1102/portfolio/1.jpg" alt="portfolio image">-->
                        <!--                                    <div class="slide-text">-->
                        <!--                                        hello-->
                        <!--                                    </div>-->
                        <!--                                </div>-->
                        <!--                            </slick>-->


                        <!--                        </div>-->

                    </v-tab-item>
                    <v-tab-item
                        class="tab__item"
                        transition="fade-transition"
                        reverse-transition="fade-transition"
                    >

                        <div class="work">
                            <div class="work__details">
                                <div class="work__header">
                                    UI/UX designer

                                    <div class="box__first">

                                    </div>
                                    <div class="box__second">

                                    </div>

                                </div>
                                <div class="work__para">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab accusantium
                                    laudantium
                                    quasi quis temporibus. Cum dicta dolores ex fuga impedit iusto quo similique,
                                    sit
                                    soluta tempora tenetur unde voluptate voluptatum?
                                </div>
                                <hr>
                            </div>
                            <div class="work__details">
                                <div class="work__header">
                                    Graphic designer

                                    <div class="box__first">

                                    </div>
                                    <div class="box__second">

                                    </div>

                                </div>
                                <div class="work__para">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab accusantium
                                    laudantium
                                    quasi quis temporibus. Cum dicta dolores ex fuga impedit iusto quo similique,
                                    sit
                                    soluta tempora tenetur unde voluptate voluptatum?
                                </div>
                                <hr>
                            </div>
                            <div class="work__details">
                                <div class="work__header">
                                    UI Designer

                                    <div class="box__first">

                                    </div>
                                    <div class="box__second">

                                    </div>

                                </div>
                                <div class="work__para">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab accusantium
                                    laudantium
                                    quasi quis temporibus. Cum dicta dolores ex fuga impedit iusto quo similique,
                                    sit
                                    soluta tempora tenetur unde voluptate voluptatum?
                                </div>
                                <hr>
                            </div>
                            <div class="work__details">
                                <div class="work__header">
                                    UI/UX designer

                                    <div class="box__first">

                                    </div>
                                    <div class="box__second">

                                    </div>

                                </div>
                                <div class="work__para">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab accusantium
                                    laudantium
                                    quasi quis temporibus. Cum dicta dolores ex fuga impedit iusto quo similique,
                                    sit
                                    soluta tempora tenetur unde voluptate voluptatum?
                                </div>
                                <hr>
                            </div>

                        </div>


                    </v-tab-item>
                    <v-tab-item
                        class="tab__item"
                        transition="fade-transition"
                        reverse-transition="fade-transition"
                    >
                        <skills></skills>
                    </v-tab-item>
                    <v-tab-item
                        class="tab__item"
                        transition="fade-transition"
                        reverse-transition="fade-transition"
                    >

                        <div class="work">
                            <div class="work__details">
                                <div class="work__header">
                                    UDemy
                                    <div class="box__first">

                                    </div>
                                    <div class="box__second">

                                    </div>

                                </div>
                                <div class="work__para">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab accusantium
                                    laudantium
                                    quasi quis temporibus. Cum dicta dolores ex fuga impedit iusto quo similique,
                                    sit
                                    soluta tempora tenetur unde voluptate voluptatum?
                                </div>
                                <hr>
                            </div>
                            <div class="work__details">
                                <div class="work__header">
                                    OXford universe

                                    <div class="box__first">

                                    </div>
                                    <div class="box__second">

                                    </div>

                                </div>
                                <div class="work__para">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab accusantium
                                    laudantium
                                    quasi quis temporibus. Cum dicta dolores ex fuga impedit iusto quo similique,
                                    sit
                                    soluta tempora tenetur unde voluptate voluptatum?
                                </div>
                                <hr>
                            </div>
                            <div class="work__details">
                                <div class="work__header">
                                    UI SCHOOL

                                    <div class="box__first">

                                    </div>
                                    <div class="box__second">

                                    </div>

                                </div>
                                <div class="work__para">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab accusantium
                                    laudantium
                                    quasi quis temporibus. Cum dicta dolores ex fuga impedit iusto quo similique,
                                    sit
                                    soluta tempora tenetur unde voluptate voluptatum?
                                </div>
                                <hr>
                            </div>
                            <div class="work__details">
                                <div class="work__header">
                                    UI/UX designer

                                    <div class="box__first">

                                    </div>
                                    <div class="box__second">

                                    </div>

                                </div>
                                <div class="work__para">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab accusantium
                                    laudantium
                                    quasi quis temporibus. Cum dicta dolores ex fuga impedit iusto quo similique,
                                    sit
                                    soluta tempora tenetur unde voluptate voluptatum?
                                </div>
                                <hr>
                            </div>

                        </div>


                    </v-tab-item>
                </v-tabs-items>
                <!--                                <ul class="nav nav-pills nav-fill" role="tablist">-->
                <!--                                    <li class="nav-item">-->
                <!--                                        <a class="nav-link active" data-toggle="tab" href="#portfolio">Portfolio</a>-->

                <!--                                        <div class="round">-->
                <!--                                            <div class="round__first">-->
                <!--                                                <div class="round__second">-->

                <!--                                                </div>-->
                <!--                                            </div>-->
                <!--                                        </div>-->
                <!--                                    </li>-->
                <!--                                    <li class="nav-item">-->
                <!--                                        <a class="nav-link" data-toggle="tab" href="#work">Work</a>-->
                <!--                                        <div class="round1">-->
                <!--                                            <div class="round1__first1">-->
                <!--                                                <div class="round1__second1">-->

                <!--                                                </div>-->
                <!--                                            </div>-->
                <!--                                        </div>-->
                <!--                                    </li>-->
                <!--                                    <li class="nav-item">-->
                <!--                                        <a class="nav-link" data-toggle="tab" href="#skills">Skills-->

                <!--                                        </a>-->
                <!--                                        <div class="round1">-->
                <!--                                            <div class="round1__first1">-->
                <!--                                                <div class="round1__second1">-->

                <!--                                                </div>-->
                <!--                                            </div>-->
                <!--                                        </div>-->
                <!--                                    </li>-->
                <!--                                    <li class="nav-item">-->
                <!--                                        <a class="nav-link" data-toggle="tab" href="#education">Education</a>-->
                <!--                                        <div class="round">-->
                <!--                                            <div class="round__first">-->
                <!--                                                <div class="round__second">-->

                <!--                                                </div>-->
                <!--                                            </div>-->
                <!--                                        </div>-->
                <!--                                    </li>-->
                <!--                                </ul>-->

                <!--                                <div class="tab-content">-->
                <!--                                    <div id="portfolio" class="tab-pane active portfolio">-->

                <!--                                        <button @click="next" class="portfolio__right-arrow">-->
                <!--                                            <img src="/images/resume_themes/theme1102/icon/right_arrow.svg" alt="next Arrow">-->
                <!--                                        </button>-->
                <!--                                        <button @click="prev" class="portfolio__left-arrow">-->
                <!--                                            <img src="/images/resume_themes/theme1102/icon/left_arrow.svg" alt="previous Arrow">-->
                <!--                                        </button>-->

                <!--                                        <slick class="portfolioSlides" ref="slick" :options="slickOptions">-->
                <!--                                            <div class="d-flex flex-column align-items-center">-->
                <!--                                                <img src="/images/resume_themes/theme1102/portfolio/1.jpg" alt="portfolio image">-->
                <!--                                                <div class="slide-text">-->
                <!--                                                    hello-->
                <!--                                                </div>-->
                <!--                                            </div>-->
                <!--                                            <div class="d-flex flex-column align-items-center">-->
                <!--                                                <img src="/images/resume_themes/theme1102/portfolio/1.jpg" alt="portfolio image">-->
                <!--                                                <div class="slide-text">-->
                <!--                                                    hello-->
                <!--                                                </div>-->
                <!--                                            </div>-->
                <!--                                            <div class="d-flex flex-column align-items-center">-->
                <!--                                                <img src="/images/resume_themes/theme1102/portfolio/1.jpg" alt="portfolio image">-->
                <!--                                                <div class="slide-text">-->
                <!--                                                    hello-->
                <!--                                                </div>-->
                <!--                                            </div>-->
                <!--                                            <div class="d-flex flex-column align-items-center">-->
                <!--                                                <img src="/images/resume_themes/theme1102/portfolio/1.jpg" alt="portfolio image">-->
                <!--                                                <div class="slide-text">-->
                <!--                                                    hello-->
                <!--                                                </div>-->
                <!--                                            </div>-->
                <!--                                            <div class="d-flex flex-column align-items-center">-->
                <!--                                                <img src="/images/resume_themes/theme1102/portfolio/1.jpg" alt="portfolio image">-->
                <!--                                                <div class="slide-text">-->
                <!--                                                    hello-->
                <!--                                                </div>-->
                <!--                                            </div>-->
                <!--                                            <div class="d-flex flex-column align-items-center">-->
                <!--                                                <img src="/images/resume_themes/theme1102/portfolio/1.jpg" alt="portfolio image">-->
                <!--                                                <div class="slide-text">-->
                <!--                                                    hello-->
                <!--                                                </div>-->
                <!--                                            </div>-->
                <!--                                            <div class="d-flex flex-column align-items-center">-->
                <!--                                                <img src="/images/resume_themes/theme1102/portfolio/1.jpg" alt="portfolio image">-->
                <!--                                                <div class="slide-text">-->
                <!--                                                    hello-->
                <!--                                                </div>-->
                <!--                                            </div>-->
                <!--                                            <div class="d-flex flex-column align-items-center">-->
                <!--                                                <img src="/images/resume_themes/theme1102/portfolio/1.jpg" alt="portfolio image">-->
                <!--                                                <div class="slide-text">-->
                <!--                                                    hello-->
                <!--                                                </div>-->
                <!--                                            </div>-->
                <!--                                        </slick>-->


                <!--                                    </div>-->
                <!--                                    <div id="work" class="tab-pane fade">-->
                <!--                                        <div class="work">-->
                <!--                                            <div class="work__details">-->
                <!--                                                <div class="work__header">-->
                <!--                                                    UI/UX designer-->

                <!--                                                    <div class="box__first">-->

                <!--                                                    </div>-->
                <!--                                                    <div class="box__second">-->

                <!--                                                    </div>-->

                <!--                                                </div>-->
                <!--                                                <div class="work__para">-->
                <!--                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab accusantium laudantium-->
                <!--                                                    quasi quis temporibus. Cum dicta dolores ex fuga impedit iusto quo similique, sit-->
                <!--                                                    soluta tempora tenetur unde voluptate voluptatum?-->
                <!--                                                </div>-->
                <!--                                                <hr>-->
                <!--                                            </div>-->
                <!--                                            <div class="work__details">-->
                <!--                                                <div class="work__header">-->
                <!--                                                    UI/UX designer-->

                <!--                                                    <div class="box__first">-->

                <!--                                                    </div>-->
                <!--                                                    <div class="box__second">-->

                <!--                                                    </div>-->

                <!--                                                </div>-->
                <!--                                                <div class="work__para">-->
                <!--                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab accusantium laudantium-->
                <!--                                                    quasi quis temporibus. Cum dicta dolores ex fuga impedit iusto quo similique, sit-->
                <!--                                                    soluta tempora tenetur unde voluptate voluptatum?-->
                <!--                                                </div>-->
                <!--                                                <hr>-->
                <!--                                            </div>-->
                <!--                                            <div class="work__details">-->
                <!--                                                <div class="work__header">-->
                <!--                                                    UI/UX designer-->

                <!--                                                    <div class="box__first">-->

                <!--                                                    </div>-->
                <!--                                                    <div class="box__second">-->

                <!--                                                    </div>-->

                <!--                                                </div>-->
                <!--                                                <div class="work__para">-->
                <!--                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab accusantium laudantium-->
                <!--                                                    quasi quis temporibus. Cum dicta dolores ex fuga impedit iusto quo similique, sit-->
                <!--                                                    soluta tempora tenetur unde voluptate voluptatum?-->
                <!--                                                </div>-->
                <!--                                                <hr>-->
                <!--                                            </div>-->
                <!--                                            <div class="work__details">-->
                <!--                                                <div class="work__header">-->
                <!--                                                    UI/UX designer-->

                <!--                                                    <div class="box__first">-->

                <!--                                                    </div>-->
                <!--                                                    <div class="box__second">-->

                <!--                                                    </div>-->

                <!--                                                </div>-->
                <!--                                                <div class="work__para">-->
                <!--                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab accusantium laudantium-->
                <!--                                                    quasi quis temporibus. Cum dicta dolores ex fuga impedit iusto quo similique, sit-->
                <!--                                                    soluta tempora tenetur unde voluptate voluptatum?-->
                <!--                                                </div>-->
                <!--                                                <hr>-->
                <!--                                            </div>-->

                <!--                                        </div>-->
                <!--                                    </div>-->
                <!--                                    <div id="skills" class="tab-pane fade">-->
                <!--                                        <div class="skill">-->
                <!--                                            <ul class="skill__tab">-->
                <!--                                                <li>-->
                <!--                                                    progaming Languages-->

                <!--                                                </li>-->
                <!--                                                <li>-->
                <!--                                                    progaming Languages-->

                <!--                                                </li> <li>-->
                <!--                                                progaming Languages-->

                <!--                                            </li> <li>-->
                <!--                                                progaming Languages-->

                <!--                                            </li>-->
                <!--                                            </ul>-->
                <!--                                        </div>-->
                <!--                                    </div>-->
                <!--                                    <div id="education" class="tab-pane fade">-->
                <!--                                        <h3>Menu 3</h3>-->
                <!--                                        <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt-->
                <!--                                            explicabo.</p>-->
                <!--                                    </div>-->
                <!--                                </div>-->
            </section>
        </div>
    </v-app>
</template>


<script>

    import skills from "../theme1102/tabs/skills";
    import portfolio from "../theme1102/tabs/Portfolio"
    import portfolio_icon from "../theme1102/components/icon/portfolio"
    import skills_icon from "../theme1102/components/icon/skills"
    import work_icon from "../theme1102/components/icon/work"
    import education_icon from "../theme1102/components/icon/education"

    export default {
        components: {skills, portfolio, portfolio_icon, skills_icon, education_icon, work_icon},
        data() {
            return {
                prevIcon: false,
                nextIcon: false,
                tab: null,
                // slickOptions: {
                //     infinite: false,
                //     dots: false,
                //     arrows: false,
                //     slidesToShow: 3,
                //     slidesToScroll: 1,
                //     responsive: [{
                //         breakpoint: 830,
                //         settings: {
                //             slidesToShow: 1,
                //             slidesToScroll: 1,
                //             rows: 1000,
                //         }
                //     }, {
                //         breakpoint: 1200,
                //         settings: {
                //             slidesToShow: 2,
                //             slidesToScroll: 1,
                //         }
                //     }, {
                //         breakpoint: 1600,
                //         settings: {
                //             slidesToShow: 3,
                //             slidesToScroll: 2,
                //         }
                //     },]
                // },
            }
        },
        // methods: {
        //     next() {
        //         this.$refs.slick.next();
        //     },
        //
        //     prev() {
        //         this.$refs.slick.prev();
        //     },
        //
        //     reInit() {
        //         // Helpful if you have to deal with v-for to update dynamic lists
        //         this.$nextTick(() => {
        //             this.$refs.slick.reSlick();
        //         });
        //     },
        // },
    }
</script>


<style lang="scss" scoped>

    @import "resources/sass/themes/theme1102/main.scss";


    /*.portfolio {*/

    /*    position: relative;*/

    /*    .portfolio__right-arrow {*/
    /*        position: absolute;*/
    /*        right: 20px;*/
    /*        top: 180px;*/
    /*        height: 50px;*/
    /*        width: 50px;*/
    /*        display: block;*/
    /*        padding: 15px 15px;*/
    /*        background-color: #fff;*/
    /*        border-radius: 50%;*/
    /*        cursor: pointer;*/
    /*        z-index: 1000;*/
    /*        border: none;*/

    /*    }*/

    /*    .portfolio__left-arrow {*/
    /*        position: absolute;*/
    /*        left: 20px;*/
    /*        top: 180px;*/
    /*        height: 50px;*/
    /*        width: 50px;*/
    /*        display: block;*/
    /*        padding: 15px 15px;*/
    /*        background-color: #fff;*/
    /*        border-radius: 50%;*/
    /*        cursor: pointer;*/
    /*        z-index: 1000;*/
    /*        border: none;*/

    /*    }*/

    /*    .portfolio__right-arrow:focus {*/
    /*        outline: none;*/
    /*    }*/

    /*    .portfolio__left-arrow:focus {*/
    /*        outline: none;*/
    /*    }*/

    /*    .portfolioSlides {*/
    /*        display: flex;*/
    /*        justify-content: center;*/
    /*        flex-direction: column;*/
    /*        padding-left: 40px;*/
    /*        padding-right: 40px;*/

    /*        @media only screen and (max-width: 765px) {*/
    /*            padding-left: 0px;*/
    /*            padding-right: 0px;*/
    /*        }*/
    /*        @media only screen and (min-width: 1600px) {*/
    /*            padding-left: 135px;*/
    /*            padding-right: 135px;*/
    /*        }*/

    /*        img {*/
    /*            margin-top: 25px;*/
    /*            margin-right: 25px;*/
    /*            margin-left: 25px;*/
    /*            width: 310px !important;*/
    /*            height: 400px;*/
    /*            border-radius: 30px;*/
    /*            @media only screen and (max-width: 765px) {*/
    /*                width: 177px !important;*/
    /*                height: 139px;*/
    /*            }*/
    /*        }*/

    /*        .slide-text {*/
    /*            margin-top: 15px;*/
    /*            font-style: normal;*/
    /*            font-weight: normal;*/
    /*            font-size: 20px;*/
    /*            line-height: 23px;*/
    /*            color: #333333;*/
    /*            @media only screen and (max-width: 765px) {*/
    /*                font-size: 10px;*/
    /*                line-height: 12px;*/
    /*                margin-bottom: 25px;*/
    /*            }*/
    /*        }*/
    /*    }*/
    /*}*/

    /*@media only screen and (max-width: 765px) {*/
    /*    .portfolio {*/
    /*        .portfolioSlides {*/
    /*            padding-left: 40px;*/
    /*            padding-right: 40px;*/
    /*            @media only screen and (max-width: 765px) {*/
    /*                padding-left: 0px;*/
    /*                padding-right: 0px;*/
    /*            }*/
    /*            @media only screen and (min-width: 1600px) {*/
    /*                padding-left: 135px;*/
    /*                padding-right: 135px;*/
    /*            }*/
    /*            display: flex;*/
    /*            justify-content: center;*/

    /*            img {*/
    /*                margin-top: 25px;*/
    /*                margin-right: 25px;*/
    /*                margin-left: 25px;*/
    /*                width: 310px !important;*/
    /*                height: 400px;*/
    /*                @media only screen and (max-width: 765px) {*/
    /*                    padding: 10px;*/
    /*                    width: 500px !important;*/
    /*                    height: auto;*/
    /*                }*/
    /*            }*/

    /*            .slide-text {*/
    /*                margin-top: 15px;*/
    /*                font-style: normal;*/
    /*                font-weight: normal;*/
    /*                font-size: 20px;*/
    /*                line-height: 23px;*/
    /*                color: #333333;*/
    /*                @media only screen and (max-width: 765px) {*/
    /*                    font-size: 12px;*/
    /*                    line-height: 12px;*/
    /*                    margin-bottom: 25px;*/
    /*                }*/
    /*            }*/
    /*        }*/
    /*    }*/
    /*}*/

    /*@media only screen and (max-width: 1280px) and (min-width: 765px) {*/
    /*    .portfolio {*/
    /*        .portfolioSlides {*/
    /*            padding-left: 40px;*/
    /*            padding-right: 40px;*/
    /*            @media only screen and (max-width: 765px) {*/
    /*                padding-left: 0px;*/
    /*                padding-right: 0px;*/
    /*            }*/
    /*            @media only screen and (min-width: 1600px) {*/
    /*                padding-left: 135px;*/
    /*                padding-right: 135px;*/
    /*            }*/
    /*            display: flex;*/
    /*            justify-content: center;*/

    /*            img {*/
    /*                margin-top: 25px;*/
    /*                margin-right: 25px;*/
    /*                margin-left: 25px;*/
    /*                width: 310px !important;*/
    /*                height: 400px;*/
    /*                @media only screen and (max-width: 765px) {*/
    /*                    width: 177px !important;*/
    /*                    height: 139px;*/
    /*                }*/
    /*            }*/

    /*            .slide-text {*/
    /*                margin-top: 15px;*/
    /*                font-style: normal;*/
    /*                font-weight: normal;*/
    /*                font-size: 20px;*/
    /*                line-height: 23px;*/
    /*                color: #333333;*/
    /*                @media only screen and (max-width: 765px) {*/
    /*                    font-size: 10px;*/
    /*                    line-height: 12px;*/
    /*                    margin-bottom: 25px;*/
    /*                }*/
    /*            }*/
    /*        }*/
    /*    }*/
    /*}*/

    /*@media only screen and (max-width: 840px) {*/
    /*    .portfolio__right-arrow {*/
    /*        display: none;*/
    /*        visibility: hidden;*/
    /*    }*/
    /*    .portfolio__left-arrow {*/
    /*        display: none;*/
    /*        visibility: hidden;*/
    /*    }*/
    /*}*/
</style>
