<template>
  <v-app class="hold-theme901">
    <div class="header-901">
      <div class="content-header-901">
        <v-row class="align-center">
          <v-col class="the-avatar-901" lg="1" md="2" sm="2" cols="4">
            <div style="width: 124px;">
              <img src="/images/resume_themes/theme901/profile.png" class="avatar-901" alt />
              <v-btn color="#fff" class="icon-avatar-901" bottom right fab small>
                <v-icon color="#5B5D60" size="25px">mdi-message-text</v-icon>
              </v-btn>
            </div>
          </v-col>
          <v-col lg="3" md="9" sm="9" cols="8">
            <div class="pofile-901">
              <p class="name-901">paul porter</p>
              <p class="job-901">web designer</p>
              <div class="social-901">
                <v-icon
                  v-for="(value, index) in social_media"
                  :key="index"
                  :color="value.color"
                  :class="mg_icon"
                  size="25px"
                >{{ value.icon }}</v-icon>
              </div>
            </div>
          </v-col>
          <v-col lg="8" sm="12" cols="12">
            <v-row class="info-901">
              <v-col class="first-one" lg="4" sm="5" cols="12">
                <v-row class="rate-tabs-901">
                  <v-col cols="5" style="padding:0px">
                    <v-tabs background-color="transparent" v-model="rate" hide-slider vertical>
                      <v-tab>mouthly</v-tab>
                      <v-tab>weekly</v-tab>
                      <v-tab>hourly</v-tab>
                    </v-tabs>
                  </v-col>
                  <v-col cols="7" style="padding:0px">
                    <v-row>
                      <v-col cols="12">
                        <span class="info-title-901">rate $ usd</span>
                      </v-col>
                      <v-col cols="12">
                        <v-tabs-items
                          class="rate-items-901"
                          mandatory
                          active-class="rate-item-901"
                          v-model="rate"
                        >
                          <v-tab-item>
                            <span>$ 40</span>
                          </v-tab-item>
                          <v-tab-item>
                            <span>$ 30</span>
                          </v-tab-item>
                          <v-tab-item>
                            <span>$ 200</span>
                          </v-tab-item>
                        </v-tabs-items>
                      </v-col>
                    </v-row>
                  </v-col>
                </v-row>
              </v-col>
              <v-col lg="5" sm="7" cols="12">
                <v-row class="rate-tabs-901">
                  <v-col lg="4" sm="4" cols="5" style="padding:0px">
                    <v-tabs
                      background-color="transparent"
                      v-model="availability"
                      hide-slider
                      vertical
                    >
                      <v-tab>mouthly</v-tab>
                      <v-tab>weekly</v-tab>
                      <v-tab>day</v-tab>
                    </v-tabs>
                  </v-col>
                  <v-col lg="8" md78 sm="8" cols="7" style="padding:0px">
                    <v-row>
                      <v-col cols="12">
                        <span class="info-title-901">availability hours</span>
                      </v-col>
                      <v-col cols="12">
                        <v-tabs-items
                          class="rate-items-901"
                          mandatory
                          active-class="rate-item-901"
                          v-model="availability"
                        >
                          <v-tab-item>
                            <span>40 hours</span>
                          </v-tab-item>
                          <v-tab-item>
                            <span>30 hours</span>
                          </v-tab-item>
                          <v-tab-item>
                            <span>200 hours</span>
                          </v-tab-item>
                        </v-tabs-items>
                      </v-col>
                    </v-row>
                  </v-col>
                </v-row>
              </v-col>
              <v-col class="btn-hirme-901" lg="3" sm="12">
                <v-btn color="#2176E5" class="hirme-901">hire me</v-btn>
              </v-col>
            </v-row>
          </v-col>
        </v-row>
      </div>
    </div>
    <div class="content-901">
      <v-tabs v-model="model" centered class="tabs-901" :slider-size="4" :show-arrows="false">
        <v-tabs-slider color="#2176E5"></v-tabs-slider>
        <v-tab v-for="value in tabs" :key="value" class="tab-901">{{ value }}</v-tab>
      </v-tabs>
      <v-tabs-items class="tabs-items-901" v-model="model">
        <v-tab-item key="Portfolio">
          <div class="portfolio-901">
            <VueSlickCarousel
              ref="carousel_portfolio"
              :slidesToShow="portfolioslide"
              :rows="portfoliorows"
              :arrows="false"
              :dots="false"
              :speed="500"
            >
              <div>
                <v-img class="ma-4" src="/images/resume_themes/theme901/image1.png" alt />
              </div>
              <div>
                <v-img class="ma-4" src="/images/resume_themes/theme901/image2.png" alt />
              </div>
              <div>
                <v-img class="ma-4" src="/images/resume_themes/theme901/image1.png" alt />
              </div>
              <div>
                <v-img class="ma-4" src="/images/resume_themes/theme901/image2.png" alt />
              </div>
            </VueSlickCarousel>
          </div>
          <div class="text-center mt-10">
            <v-btn @click="$refs.carousel_portfolio.prev()" class="mr-7" fab dark color="white">
              <v-icon size="50" color="#65676A">mdi-chevron-left</v-icon>
            </v-btn>
            <v-btn @click="$refs.carousel_portfolio.next()" class="ml-7" fab dark color="white">
              <v-icon size="50" color="#65676A">mdi-chevron-right</v-icon>
            </v-btn>
          </div>
        </v-tab-item>
        <v-tab-item key="skills">
          <v-tabs
            v-model="model_skills"
            centered
            class="tabs-skills-901"
            hide-slider
            :show-arrows="false"
          >
            <v-tab v-for="value in tabs_skills" :key="value" class="tab-skills-901">{{ value }}</v-tab>
          </v-tabs>
          <v-row justify="center">
            <v-col lg="8" cols="12">
              <v-divider color="#C7DDF9"></v-divider>
            </v-col>
          </v-row>
          <v-tabs-items class="tabs-skills-items-901" v-model="model_skills">
            <v-tab-item key="programming languages">
              <v-row
                class="programming-languages"
                v-for="(value,index) in programming_languages"
                :key="index"
                justify="center"
              >
                <v-col lg="1" sm="2" cols="12">
                  <img class="programing-languages-image" :src="value.img" alt />
                </v-col>
                <v-col class="programming-languages-linear" lg="6" sm="9" cols="12">
                  <v-progress-linear height="8" :value="value.level"></v-progress-linear>
                </v-col>
              </v-row>
            </v-tab-item>
          </v-tabs-items>
        </v-tab-item>
        <v-tab-item key="work">
          <v-container>
            <VueSlickCarousel
              ref="work_carousel"
              :slidesToShow="boxsslide"
              :rows="boxsrows"
              :arrows="false"
              :dots="false"
              :speed="500"
            >
              <div v-for="(value,index) in boxs_work" :key="index">
                <v-row class="box-tm901">
                  <v-col cols="3">
                    <p class="box-tm901-left">{{ value.title }}</p>
                    <p class="box-tm901-left">{{ value.date }}</p>
                  </v-col>
                  <v-col cols="7">
                    <p
                      class="box-tm901-right"
                      v-for="(value,index) in value.text"
                      :key="index"
                    >{{ value }}</p>
                  </v-col>
                </v-row>
              </div>
            </VueSlickCarousel>
          </v-container>
          <div class="text-center mt-10">
            <v-btn @click="$refs.work_carousel.prev()" class="mr-7" fab dark color="white">
              <v-icon size="50" color="#65676A">mdi-chevron-left</v-icon>
            </v-btn>
            <v-btn @click="$refs.work_carousel.next()" class="ml-7" fab dark color="white">
              <v-icon size="50" color="#65676A">mdi-chevron-right</v-icon>
            </v-btn>
          </div>
        </v-tab-item>
        <v-tab-item key="education">
          <v-container>
            <VueSlickCarousel
              ref="education_carousel"
              :slidesToShow="boxsslide"
              :rows="boxsrows"
              :arrows="false"
              :dots="false"
              :speed="500"
            >
              <div v-for="(value,index) in boxs_education" :key="index">
                <v-row class="box-tm901">
                  <v-col cols="2">
                    <p class="box-tm901-left">{{ value.title }}</p>
                    <p class="box-tm901-left">{{ value.date }}</p>
                  </v-col>
                  <v-col>
                    <p
                      class="box-tm901-right"
                      v-for="(value,index) in value.text"
                      :key="index"
                    >{{ value }}</p>
                  </v-col>
                </v-row>
              </div>
            </VueSlickCarousel>
          </v-container>
          <div class="text-center mt-10">
            <v-btn @click="$refs.education_carousel.prev()" class="mr-7" fab dark color="white">
              <v-icon size="50" color="#65676A">mdi-chevron-left</v-icon>
            </v-btn>
            <v-btn @click="$refs.education_carousel.next()" class="ml-7" fab dark color="white">
              <v-icon size="50" color="#65676A">mdi-chevron-right</v-icon>
            </v-btn>
          </div>
        </v-tab-item>
        <v-tab-item key="interview">
          <v-row>
            <v-col lg="6" cols="12">
              <p class="interview-title-901 mb-10">video</p>
              <Thevideo />
            </v-col>
            <v-col lg="6" cols="12">
              <p class="interview-title-901 mb-10">audio</p>
              <v-row>
                <v-col class="mb-8" cols="12">
                  <Theaudio :file="file" color="#5289E7" downloadable></Theaudio>
                </v-col>
                <v-col cols="12">
                  <Theaudio :file="file" color="#5289E7" downloadable></Theaudio>
                </v-col>
              </v-row>
            </v-col>
          </v-row>
        </v-tab-item>
      </v-tabs-items>
    </div>
  </v-app>
</template>
<script>
    import VueSlickCarousel from 'vue-slick-carousel'
    import 'vue-slick-carousel/dist/vue-slick-carousel.css'
    import Theaudio from './Theaudio'
    import Thevideo from './Thevideo'
export default {
  name: "hold-theme901",
  data() {
    return {
      file: "http://www.hochmuth.com/mp3/Boccherini_Concerto_478-1.mp3",
      rate: null,
      availability: null,
      model: null,
      model_skills: null,
      social_media: [
        { icon: "mdi-pinterest", color: "#2176E5" },
        { icon: "mdi-linkedin", color: "#5B5D60" },
        { icon: "mdi-instagram", color: "#5B5D60" },
        { icon: "mdi-facebook", color: "#5B5D60" },
        { icon: "mdi-google", color: "#5B5D60" }
      ],
      tabs: ["portfolio", "skills", "work", "education", "interview"],
      tabs_skills: [
        "programming languages",
        "frameworks/databases",
        "desiign skills",
        "software"
      ],
      boxs_education: [
        {
          title: "Master in Web Developer",
          date: "2015 - 2016",
          text: [
            "Envision Media, Inc., Santa Cruz, CA",
            "- Turning creative concepts into finished websites.",
            "- Drawing up detailed website s pecifications.",
            "- Drawing up detailed website s pecifications.",
            "- Building websites that are easy to understand, navigate and use.",
            "- Designing sample page layouts. ",
            "- Ensuring that the website complies with the company’s brand guidelines."
          ]
        },
        {
          title: "Master in Web Developer",
          date: "2015 - 2016",
          text: [
            "Envision Media, Inc., Santa Cruz, CA",
            "- Turning creative concepts into finished websites.",
            "- Drawing up detailed website s pecifications.",
            "- Drawing up detailed website s pecifications.",
            "- Building websites that are easy to understand, navigate and use.",
            "- Designing sample page layouts. ",
            "- Ensuring that the website complies with the company’s brand guidelines."
          ]
        },
        {
          title: "Master in Web Developer",
          date: "2015 - 2016",
          text: [
            "Envision Media, Inc., Santa Cruz, CA",
            "- Turning creative concepts into finished websites.",
            "- Drawing up detailed website s pecifications.",
            "- Drawing up detailed website s pecifications.",
            "- Building websites that are easy to understand, navigate and use.",
            "- Designing sample page layouts. ",
            "- Ensuring that the website complies with the company’s brand guidelines."
          ]
        },
        {
          title: "Master in Web Developer",
          date: "2015 - 2016",
          text: [
            "Envision Media, Inc., Santa Cruz, CA",
            "- Turning creative concepts into finished websites.",
            "- Drawing up detailed website s pecifications.",
            "- Drawing up detailed website s pecifications.",
            "- Building websites that are easy to understand, navigate and use.",
            "- Designing sample page layouts. ",
            "- Ensuring that the website complies with the company’s brand guidelines."
          ]
        },
        {
          title: "Master in Web Developer",
          date: "2015 - 2016",
          text: [
            "Envision Media, Inc., Santa Cruz, CA",
            "- Turning creative concepts into finished websites.",
            "- Drawing up detailed website s pecifications.",
            "- Drawing up detailed website s pecifications.",
            "- Building websites that are easy to understand, navigate and use.",
            "- Designing sample page layouts. ",
            "- Ensuring that the website complies with the company’s brand guidelines."
          ]
        }
      ],
      boxs_work: [
        {
          title: "Graphic & web design",
          date: "2018 - 2019",
          text: [
            'Company "React"',
            "- Turning creative concepts into finished websites.",
            "- Drawing up detailed website s pecifications.",
            "- Drawing up detailed website s pecifications.",
            "- Building websites that are easy to understand, navigate and use.",
            "- Designing sample page layouts. ",
            "- Ensuring that the website complies with the company’s brand guidelines."
          ]
        },
        {
          title: "Graphic & web design",
          date: "2018 - 2019",
          text: [
            'Company "React"',
            "- Turning creative concepts into finished websites.",
            "- Drawing up detailed website s pecifications.",
            "- Drawing up detailed website s pecifications.",
            "- Building websites that are easy to understand, navigate and use.",
            "- Designing sample page layouts. ",
            "- Ensuring that the website complies with the company’s brand guidelines."
          ]
        },
        {
          title: "Graphic & web design",
          date: "2018 - 2019",
          text: [
            'Company "React"',
            "- Turning creative concepts into finished websites.",
            "- Drawing up detailed website s pecifications.",
            "- Drawing up detailed website s pecifications.",
            "- Building websites that are easy to understand, navigate and use.",
            "- Designing sample page layouts. ",
            "- Ensuring that the website complies with the company’s brand guidelines."
          ]
        },
        {
          title: "Graphic & web design",
          date: "2018 - 2019",
          text: [
            'Company "React"',
            "- Turning creative concepts into finished websites.",
            "- Drawing up detailed website s pecifications.",
            "- Drawing up detailed website s pecifications.",
            "- Building websites that are easy to understand, navigate and use.",
            "- Designing sample page layouts. ",
            "- Ensuring that the website complies with the company’s brand guidelines."
          ]
        },
        {
          title: "Graphic & web design",
          date: "2018 - 2019",
          text: [
            'Company "React"',
            "- Turning creative concepts into finished websites.",
            "- Drawing up detailed website s pecifications.",
            "- Drawing up detailed website s pecifications.",
            "- Building websites that are easy to understand, navigate and use.",
            "- Designing sample page layouts. ",
            "- Ensuring that the website complies with the company’s brand guidelines."
          ]
        }
      ],
      programming_languages: [
        { img: "/images/resume_themes/theme901/php.png", level: "80" },
        { img: "/images/resume_themes/theme901/css3.png", level: "50" },
        { img: "/images/resume_themes/theme901/html5.png", level: "70" },
        { img: "/images/resume_themes/theme901/javascript.png", level: "90" }
      ],
      settings_boxs: {
        arrows: false,
        dots: false,
        speed: 500,
        slidesToShow: 2,
        rows: 2
      }
    };
  },
  components: { VueSlickCarousel, Theaudio, Thevideo },
  computed: {
    portfolioslide() {
      switch (this.$vuetify.breakpoint.name) {
        case "xs":
          return 1;
        case "sm":
          return 1;
        case "md":
          return 2;
        case "lg":
          return 2;
        case "xl":
          return 2;
      }
    },
    portfoliorows() {
      switch (this.$vuetify.breakpoint.name) {
        case "xs":
          return 2;
        case "sm":
          return 2;
        case "md":
          return 1;
        case "lg":
          return 1;
        case "xl":
          return 1;
      }
    },
    boxsslide() {
      switch (this.$vuetify.breakpoint.name) {
        case "xs":
          return 1;
        case "sm":
          return 1;
        case "md":
          return 2;
        case "lg":
          return 2;
        case "xl":
          return 2;
      }
    },
    boxsrows() {
      switch (this.$vuetify.breakpoint.name) {
        case "xs":
          return 2;
        case "sm":
          return 2;
        case "md":
          return 2;
        case "lg":
          return 2;
        case "xl":
          return 2;
      }
    },
    mg_icon() {
      switch (this.$vuetify.breakpoint.name) {
        case "xs":
          return "mr-5";
        case "sm":
          return "mr-10";
        case "md":
          return "mr-10";
        case "lg":
          return "mr-7";
        case "xl":
          return "mr-10";
      }
    }
  },
  methods: {
    showNext() {
      this.$refs.carousel.next();
    },
    showPrev() {
      this.$refs.carousel.prev();
    }
  }
};
</script>
<style lang="scss" scoped>
@import url("https://fonts.googleapis.com/css2?family=Lato&display=swap");
@import url("https://fonts.googleapis.com/css2?family=Lora&display=swap");

.hold-theme901 {
  .header-901 {
    box-shadow: 0px 8px 6px rgba(0, 0, 0, 0.03);

    .content-header-901 {
      padding: 40px 50px 40px;

      @media only screen and (max-width: 764px) {
        padding: 20px 10px 0px;
      }
    }
    .the-avatar-901 {
      height: 141px;
      .avatar-901 {
        border-radius: 100%;
      }
    }
    .icon-avatar-901 {
      top: -40px;
      left: 70%;
    }
    .pofile-901 {
      margin-top: 20px;
      margin-left: 30px;
      .name-901 {
        font-family: Lato;
        font-style: normal;
        font-weight: bold;
        font-size: 24px;
        line-height: 0px;
        letter-spacing: 0.3em;
        text-transform: capitalize;
        color: #25272b;
        @media only screen and (max-width: 597px) {
          font-size: 20px;
        }
      }
      .job-901 {
        font-family: Lato;
        font-style: normal;
        font-weight: 300;
        font-size: 14px;
        letter-spacing: 0.3em;
        text-transform: capitalize;
        color: #25272b;
      }
    }
    .info-901 {
      background: #f9f9f9;
      box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.05);
      .rate-tabs-901 {
        .first-one {
          border-bottom: 1px solid rgba(16, 78, 251, 0.2);
        }
        .v-tabs--vertical > .v-tabs-bar .v-tab {
          height: 40px;
          @media only screen and (max-width: 597px) {
            height: 48px;
          }
        }
        .info-title-901 {
          font-family: Lato;
          font-style: normal;
          font-weight: 300;
          font-size: 24px;
          line-height: 29px;
          letter-spacing: 0.2em;
          text-transform: capitalize;
          color: #2176e5;
          @media only screen and (max-width: 1600px) {
            font-size: 19px;
          }
          @media only screen and (max-width: 597px) {
            font-size: 20px;
          }
        }
        .rate-items-901 {
          background: transparent;
        }
        .rate-item-901 {
          font-family: Lato;
          font-style: normal;
          font-weight: bold;
          font-size: 24px;
          line-height: 29px;
          letter-spacing: 0.2em;
          text-transform: uppercase;
          color: #5b5d60;
          @media only screen and (max-width: 597px) {
            font-size: 20px;
          }
        }
        .v-tab {
          font-family: Lato;
          font-style: normal;
          font-weight: 300;
          font-size: 14px;
          line-height: 17px;
          letter-spacing: 0.2em;
          text-transform: capitalize;
          color: #5b5d60;
          @media only screen and (max-width: 597px) {
            font-size: 15px;
          }
        }
        .v-tab--active {
          font-family: Lato;
          font-style: normal;
          font-weight: bold;
          font-size: 18px;
          line-height: 22px;
          letter-spacing: 0.2em;
          text-transform: capitalize;
          color: #5b5d60;
          @media only screen and (max-width: 597px) {
            font-size: 17px;
          }
        }
        // .v-tabs--vertical > .v-tabs-bar .v-tab {
        //     height: 30px;
        // }
      }
      .btn-hirme-901 {
        text-align: center;
        margin-top: auto;
        margin-bottom: auto;
        .hirme-901 {
          font-family: Lato;
          font-style: normal;
          font-weight: bold;
          font-size: 18px;
          letter-spacing: 0.3em;
          text-transform: capitalize;
          color: #ffffff;
          width: 100%;
          max-width: 216px;
          height: 68px;
          border-radius: 0px;
        }
      }
    }
  }
  .content-901 {
    padding: 70px 50px 40px;
    @media only screen and (max-width: 764px) {
      padding: 70px 10px 0px;
    }
    .tabs-901 {
      .tab-901 {
        margin-right: 80px;
        @media only screen and (max-width: 597px) {
          margin-right: 60px;
        }
      }
      .v-tabs-slider {
        width: 75%;
      }
      .v-tab {
        padding: 0 0;
        font-family: Lato;
        font-style: normal;
        font-weight: bold;
        font-size: 28px;
        line-height: 0px;
        letter-spacing: 0.25em;
        text-transform: capitalize;
        @media only screen and (max-width: 597px) {
          font-size: 20px;
        }
      }
      .v-tab:not(.v-tab--active) {
        color: #dbdef6;
      }
      .v-tab--active {
        color: #2176e5;
      }
    }
    .tabs-items-901 {
      margin-top: 90px;
      .interview-title-901 {
        font-family: Lato;
        font-style: normal;
        font-weight: bold;
        font-size: 24px;
        line-height: 0px;
        letter-spacing: 0.3em;
        text-transform: capitalize;
        color: #25272b;
      }
    }
    .tabs-skills-901 {
      .tab-skills-901 {
        margin-right: 115px;
        @media only screen and (max-width: 597px) {
          margin-right: 71px;
        }
      }
      .v-tab {
        padding: 0 0;
        font-family: Lato;
        font-style: normal;
        font-weight: 300;
        font-size: 24px;
        line-height: 23px;
        color: #104efb;
        opacity: 0.5;
        text-transform: capitalize;
        @media only screen and (max-width: 597px) {
          font-size: 18px;
          line-height: 17px;
          font-weight: normal;
        }
      }
      .v-tab--active {
        opacity: 1;
      }
    }
    .box-tm901 {
      margin-bottom: 50px;
      @media only screen and (max-width: 597px) {
        margin-bottom: 25px;
      }
      .box-tm901-left {
        font-family: Lato;
        font-style: normal;
        font-weight: normal;
        font-size: 16px;
        line-height: 20px;
        color: #5b5d60;
        @media only screen and (max-width: 992px) {
          color: #104efb;
        }
        @media only screen and (max-width: 597px) {
          font-size: 13px;
          color: #65676a;
        }
      }
      .box-tm901-right {
        font-family: Actor;
        font-style: normal;
        font-weight: normal;
        font-size: 20px;
        line-height: 20px;
        color: #5b5d60;
        @media only screen and (max-width: 992px) {
          color: #104efb;
        }
        @media only screen and (max-width: 597px) {
          font-size: 13px;
          color: #65676a;
        }
      }
    }
    .tabs-skills-items-901 {
      margin-top: 110px;
      @media only screen and (max-width: 597px) {
        margin-top: 20px;
      }
      .programming-languages {
        .programing-languages-image {
          margin-left: auto;
          margin-right: auto;
          max-width: 64px;
          max-height: 64px;
          @media only screen and (max-width: 597px) {
            margin-left: 0;
            margin-right: 0;
            margin-bottom: -15px;
          }
        }
        .programming-languages-linear {
          margin-top: auto;
          margin-bottom: auto;
        }
      }
    }
    .v-tabs:not(.v-tabs--vertical):not(.v-tabs--right)
      > .v-slide-group--is-overflowing.v-tabs-bar--is-mobile:not(.v-tabs-bar--show-arrows):not(.v-slide-group--has-affixes)
      .v-slide-group__prev {
      display: none;
    }
  }
  .portfolio-901 {
    img {
      box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
      width: 859.65px;
      height: 639.13px;
    }
  }
  .v-btn--fab.v-btn--contained {
    box-shadow: 0px 6px 6px rgba(0, 0, 0, 0.05);
  }
}
</style>
