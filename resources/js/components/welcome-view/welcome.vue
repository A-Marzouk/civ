<template>
  <v-app style="width:100%; background-color: #ffffff;" class="app-container">
    <!-- main container -->
    <v-container class="main-container">
      <v-app-bar color="transparent" flat tile :height="windowWidth<=599?'80':'100'">
        <img class="logo" src="/images/welcome_landing_page/logo/civie_logo-blue.png" alt="logo" />
        <v-spacer></v-spacer>
        <a class="btn-appbar-login" href="/login">
          Log
          <span>&nbsp;in</span>
        </a>
      </v-app-bar>
      <!-- 1st inner container -->

      <!-- 1st inner container -->
      <v-container style="width:100%;">
        <v-row align="center" justify="center">
          <v-col md="10" cols="12">
            <v-card color="transparent" flat tile>
              <v-row align="center" justify="center">
                <v-col md="10" sm="10" cols="12">
                  <v-card color="transparent" flat tile>
                    <v-card-subtitle class="resume-title" align="center">Make Your Online Resume</v-card-subtitle>
                  </v-card>
                </v-col>
                <v-col md="7" sm="12" cols="12">
                  <v-card color="transparent" flat tile>
                    <v-card-subtitle
                      align="center"
                      class="resume-subtitle"
                    >We believe that resume’s can look beautiful, we help freelancers, contractors & jobseekers create stunning online resume’s.</v-card-subtitle>
                  </v-card>
                </v-col>
                <v-col xl="7" lg="8" md="8" sm="12" cols="12">
                  <v-card color="transparent" flat tile class="mt-n5">
                    <v-card-subtitle
                      class="reserve-title"
                      align="center"
                    >Reserve your own online webpage</v-card-subtitle>
                    <v-card-subtitle class="mt-n5 av-subtitle">
                      <v-text-field
                        class="input-av"
                        hide-details
                        outlined
                        placeholder="john-doe"
                        v-model="username"
                        background-color="#ffffff"
                        @keyup="validateUsername"
                        height="60"
                      >
                        <template slot="append">
                          <a
                            class="inner-link"
                            href="javascript:void(0)"
                            @click="scrollTo('createAccount')"
                            v-show="is_username_valid"
                          >Sign up</a>
                        </template>

                        <template slot="append">
                          <v-icon
                            color="#1DBF73"
                            class="custom-append-icon"
                            v-show="is_username_valid"
                          >mdi-check-circle</v-icon>
                          <v-icon
                            color="#E91E63"
                            class="custom-append-icon"
                            v-show="!is_username_valid && is_username_valid !== null"
                          >mdi-close-circle</v-icon>
                        </template>
                        <template slot="prepend-inner">
                          <span class="inner-text">civ.ie/</span>
                        </template>
                      </v-text-field>
                    </v-card-subtitle>
                  </v-card>
                </v-col>

                <v-col md="11" sm="12" cols="12">
                  <v-card flat color="transparent" tile style="z-index:3;">
                    <agile :options="agileOptions">
                      <div class="slide" v-for="i in 4" :key="i">
                        <img
                          src="/images/welcome_landing_page/imgs/edit-cv.png"
                          alt
                          style="box-shadow: 0px 4px 40px rgba(0, 28, 226, 0.1);"
                        />
                      </div>
                    </agile>
                  </v-card>
                </v-col>
              </v-row>
            </v-card>
          </v-col>
        </v-row>
      </v-container>
      <!-- 1st inner container ends here -->

      <!-- new 2nd layer -->
      <v-card-subtitle align="center" class="sign-up-text mb-12 mt-10">Want to sign-up</v-card-subtitle>
      <register-form :username="validUserName"></register-form>

      <!-- new 2nd layer -->

      <!-- 2nd inner container starts here -->
      <v-container style="width:100%" class="build-resume-container">
        <v-row align="center" justify="center">
          <v-col md="10" sm="12" cols="12" :align="windowWidth>959 ? 'center':'left'">
            <!-- 1st card -->

            <v-card flat tile color="transparent">
              <v-card-subtitle class="build-resume-title mt-lg-0 mt-md-0 mt-sm-0 mt-7">
                Build a resume that you
                <br />can be proud of
              </v-card-subtitle>
              <v-card-subtitle
                class="build-resume-subtitle mt-md-n5 mb-md-5 mb-sm-12 mb-4 mt-n4"
              >100+ Integrations. Ensure your clients can easily contract, hire and pay you.</v-card-subtitle>
            </v-card>
            <!-- 1st card -->
            <!-- 2nd card -->
            <v-card
              class="card-video pa-md-8 pa-sm-0 pa-0 mt-md-0 mt-sm-5"
              color="transparent"
              flat
              tile
              align="center"
            >
              <v-img
                src="/images/welcome_landing_page/icons/poster-video.png"
                class="align-center hidden-sm-and-down"
              >
                <v-btn fab color="#F8F8F8" class="btn-play" x-large>
                  <img src="/images/welcome_landing_page/icons/play.png" />
                </v-btn>
              </v-img>
              <v-img
                src="/images/welcome_landing_page/icons/poster-video-tablet.png"
                class="align-center hidden-md-and-up"
              >
                <v-btn fab color="#F8F8F8" class="btn-play" x-large>
                  <img src="/images/welcome_landing_page/icons/play.png" />
                </v-btn>
              </v-img>
            </v-card>

            <!-- 2nd card -->
          </v-col>
        </v-row>
      </v-container>
      <!-- 2nd inner container ends here -->

      <!-- 3rd inner container starts here -->
      <v-container style="width:100%" class="gallery-container mb-md-12">
        <v-row align="center" justify="center">
          <v-col xl="11" cols="12">
            <v-card flat tile color="transparent" class="card-choose-theme margin-0">
              <v-card-title class="build-resume-title margin-n30">
                40+ Beautiful Themes
                <br />to choose from
              </v-card-title>
              <v-card-subtitle class="build-resume-subtitle mt-1 margin-n10">
                <v-row>
                  <v-col md="6" cols="12">
                    <span
                      class="hidden-sm-only"
                    >Add your data and then apply any theme tj make your resume visually amazing. Ensure that you stand out and make a great first impression with any hiring manager.</span>
                    <span class="d-none d-sm-flex d-md-none">
                      Add your data and then apply any theme tj make your resume visually amazing. Ensure that you stand out
                      <br />and make a great first impression with any hiring manager.
                    </span>
                  </v-col>
                  <v-col md="6" cols="12" :align="windowWidth > 959 ? 'right' :'left'">
                    <v-btn color="#0046FE" href="/register" class="btn-view-themes">View All Themes</v-btn>
                  </v-col>
                </v-row>
              </v-card-subtitle>
            </v-card>

            <v-card tile color="transparet" flat class="card-gallery hidden-md-and-up">
              <slick
                class="gallery-slides"
                ref="slick"
                :options="slickOptionsGallery"
                style="z-index:2;"
              >
                <v-card
                  flat
                  tile
                  color="transparent"
                  v-for="n in 6"
                  :key="n"
                  class="card-gallery-items"
                >
                  <img :src="getGalleryImages(n)" alt="gallery" />
                </v-card>
              </slick>
            </v-card>

            <v-card tile flat color="transparent" class="hidden-sm-and-down">
              <v-row align="center" justify="center">
                <template v-for="n in 5">
                  <v-col md="4" :key="n">
                    <v-card flat tile color="transparent" class="card-gallery">
                      <img :src="getGalleryImages(n)" alt="gallery" />
                    </v-card>
                  </v-col>
                </template>
                <v-col cols="4">
                  <v-card align="center" color="transparent" flat tile>
                    <v-card-subtitle class="explore-number">+35</v-card-subtitle>
                    <v-card-subtitle class="explore-text">Themes you can explore</v-card-subtitle>
                    <v-card-subtitle class="explore-link mt-n10 NoDecor">
                      <a href="/register">EXPLORE ALL THEMES ></a>
                    </v-card-subtitle>
                  </v-card>
                </v-col>
              </v-row>
            </v-card>
          </v-col>
        </v-row>
      </v-container>
      <!-- 3rd inner container starts here -->
    </v-container>
    <!-- main container -->
    <!-- Footer -->
    <v-footer color="#0F4CEE" class="custom-footer">
      <v-container class="footer-container">
        <v-row justify="center" align="center" class="justify-space-around">
          <v-col md="2" cols="12" :align="windowWidth <=959 ?'center':'left' ">
            <v-card flat color="transparent" tile>
              <img
                class="logo-footer hidden-sm-and-down"
                src="/images/welcome_landing_page/logo/civie_logo-01.png"
              />
              <img
                class="logo-footer hidden-md-and-up"
                src="/images/welcome_landing_page/logo/civie_logo-01.png"
              />
            </v-card>
          </v-col>
          <v-col md="6" cols="6" align="right" class="hidden-sm-and-down">
            <v-card flat tile color="transparent">
              <v-card-text class="follow-us-text">
                <label>Follow Us:</label>
                <v-btn fab x-small color="#ffffff" class="footer-social-icon ml-md-2 ml-sm-0 ml-0">
                  <img
                    src="/images/welcome_landing_page/icons/social_icons/facebook.png"
                    alt="facebook"
                  />
                </v-btn>
                <span class="followers">14,044 Followers</span>
                <v-btn fab x-small color="#ffffff" class="footer-social-icon ml-md-1 ml-sm-0 ml-0">
                  <img
                    src="/images/welcome_landing_page/icons/social_icons/instagram.png"
                    alt="instagram"
                  />
                </v-btn>
                <span>733 Followers</span>
              </v-card-text>
            </v-card>
          </v-col>

          <v-col md="4" cols="12" align="right" class="hidden-sm-and-down">
            <v-card color="transparent" flat tile>
              <v-card-text class="follow-us-text">
                <label>Contact Us:</label>
                <v-btn
                  fab
                  x-small
                  color="#ffffff"
                  class="footer-social-icon mx-1"
                  v-for="i in contactIcons"
                  :key="i.title"
                >
                  <img :src="getContactIcons(i.title)" />
                </v-btn>
              </v-card-text>
            </v-card>
          </v-col>

          <v-col sm="4" cols="4" class="hidden-md-and-up mt-n12">
            <v-card flat tile color="transparent" align="center" class>
              <v-card-subtitle class="follow-us-text">Follow Us</v-card-subtitle>
              <v-card-subtitle>
                <v-btn fab x-small color="#ffffff" class="footer-social-icon mx-sm-2 mx-1 mt-n2">
                  <img
                    src="/images/welcome_landing_page/icons/social_icons/facebook.png"
                    alt="facebook"
                  />
                </v-btn>
                <v-btn fab x-small color="#ffffff" class="footer-social-icon mx-sm-2 mx-auto mt-n2">
                  <img
                    src="/images/welcome_landing_page/icons/social_icons/instagram.png"
                    alt="instagram"
                  />
                </v-btn>
              </v-card-subtitle>
            </v-card>
          </v-col>

          <v-col sm="8" cols="8" class="hidden-md-and-up mt-n12" align="right">
            <v-card flat tile color="transparent" class="ml-md-0 ml-sm-0 ml-8">
              <v-card-subtitle class="follow-us-text" align="center">Contact Us</v-card-subtitle>
              <v-card-subtitle align="center">
                <v-btn
                  fab
                  x-small
                  color="#ffffff"
                  class="footer-social-icon mx-sm-2 mx-1 mt-n2"
                  v-for="i in contactIcons"
                  :key="i.title"
                >
                  <img :src="getContactIcons(i.title)" />
                </v-btn>
              </v-card-subtitle>
            </v-card>
          </v-col>
        </v-row>
      </v-container>
    </v-footer>
    <!-- footer -->
  </v-app>
</template>

<script>
import Slick from "vue-slick";
import RegisterForm from "../auth/partials/RegisterForm";
export default {
  components: {
    Slick,
    "register-form": RegisterForm
  },
  data() {
    return {
      windowWidth: window.innerWidth,
      username: "",
      valid: false,
      lazy: false,
      agreeCheck: false,
      errors: {},
      formData: {
        name: "",
        email: "",
        password: "",
        password_confirmation: ""
      },
      socialMediaIcons: [
        {
          id: 1,
          title: "instagram",
          width: 18,
          tablet_width: 18,
          link: "/register/instagram"
        },
        {
          id: 2,
          title: "linkedin",
          width: 16,
          tablet_width: 16,
          link: "/register/linkedin"
        },
        {
          id: 3,
          title: "google",
          width: 14,
          tablet_width: 14,
          link: "/register/google"
        },
        {
          id: 4,
          title: "facebook",
          width: 18,
          tablet_width: 18,
          link: "/register/facebook"
        },
        {
          id: 5,
          title: "github",
          width: 22,
          tablet_width: 22,
          link: "/register/github"
        }
      ],
      integrations: [
        { id: 1, title: "Connect your online profiles" },
        { id: 2, title: "Integrate your social account" },
        {
          id: 3,
          title: "Allow potential employers to <br /> contact you easly"
        },
        { id: 4, title: "Import your data/Export to PDF" },
        { id: 5, title: "Easy acception line payments" }
      ],
      contactIcons: [
        { id: 1, title: "email" },
        { id: 2, title: "messenger" },
        { id: 3, title: "skype" },
        { id: 4, title: "whatsapp" },
        { id: 5, title: "slack" }
      ],
      users: ["nishad", "ahmed", "anton", "gladwin"],

      //agile options
      agileOptions: {
        dots: false,
        fade: true,
        autoplay: true,
        navButtons: false,
        pauseOnHover: true
      },
      //agile options

      slickOptionsGallery: {
        centerMode: true,
        infinite: true,
        dots: true,
        arrows: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: false,
        autoplaySpeed: 5000,
        pauseOnDotsHover: true,
        responsive: [
          {
            breakpoint: 959,
            settings: {
              centerPadding: "75px",
              slidesPerRow: 1,
              slidesToShow: 1,
              slidesToScroll: 1
            }
          },
          {
            breakpoint: 599,
            settings: {
              centerPadding: "75px",
              slidesToShow: 1,
              slidesToScroll: 1
            }
          },
          {
            breakpoint: 400,
            settings: {
              centerPadding: "50px",
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
        ]
      },
      validUserName: "",
      is_username_valid: null
    };
  },
  //mounted
  mounted() {
    window.onresize = () => {
      this.windowWidth = window.innerWidth;
    };
  },
  methods: {
    validateUsername() {
      axios
        .post("/validate-username", { username: this.username })
        .then(response => {
          this.validUserName = this.username;
          this.is_username_valid = true;
        })
        .catch(response => {
          this.validUserName = "";
          this.is_username_valid = false;
        });
    },
    getSocialIcon(title) {
      return `/images/welcome_landing_page/icons/social_icons/${title}.png`;
    },
    getGalleryImages(id) {
      return `/images/welcome_landing_page/imgs/gallery/${id}.png`;
    },
    getIntegrationImage(id) {
      return `/images/welcome_landing_page/imgs/integration/${id}.png`;
    },
    getContactIcons(title) {
      return `/images/welcome_landing_page/icons/${title}.png`;
    },
    scrollTo(id) {
      $("html, body").animate(
        {
          scrollTop: $("#" + id).offset().top
        },
        1500
      );
    }
  }
};
</script>

<style lang="scss">
// Here I am using ID SCOPING #welcomeView ID wrapping all styles

@import url("https://fonts.googleapis.com/css?family=Montserrat");
@import url("https://fonts.googleapis.com/css?family=Open+Sans");

#welcomeView,
#registerForm,
#loginForm {
  .inner-text {
    padding-top: 6px;
    color: #aeaeae;
  }

  .inner-link {
    padding-top: 4px;
    padding-right: 10px;
    &:hover {
      text-decoration: none;
    }
  }

  .card-login {
    box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1) !important;
    border-radius: 15px !important;
    @media screen and (max-width: 959px) {
      margin-top: -15px;
    }
    @media screen and (max-width: 599px) {
      height: 812px;
      margin-top: -38px;
    }
  }

  .av-subtitle {
    padding-left: 10px;
    padding-right: 10px;
  }
  .separator {
    display: flex;
    align-items: center;
    text-align: center;
    font-family: "Montserrat" !important;
    font-size: 14px;
    line-height: 17px;
  }
  .separator::before,
  .separator::after {
    content: "";
    flex: 1;
    border-bottom: 1px solid lightgray;
  }
  .separator::before {
    margin-right: 2em;
  }
  .separator::after {
    margin-left: 2em;
  }
  // separator
  //input

  //input
  .footer-container {
    @media screen and (max-width: 599px) {
      width: 100%;
      padding: 0px !important;
      margin: 0px !important;
    }
  }
  .main-container {
    width: 100%;
    @media screen and (max-width: 599px) {
      overflow-x: hidden !important;
      margin: 0 !important;
      padding: 0 !important;
    }
    @media screen and (max-width: 400px) {
    }
  }
  .app-container {
    @media screen and (max-width: 599px) {
    }
  }

  .margin-n50 {
    @media screen and (max-width: 599px) {
      margin-top: -50px !important;
    }
  }
  .margin-n30 {
    @media screen and (max-width: 599px) {
      margin-top: -30px !important;
    }
    @media screen and (max-width: 400px) {
      margin-top: 30px !important;
    }
  }

  .margin-n10 {
    @media screen and (max-width: 599px) {
      margin-top: -10px !important;
    }
  }

  .margin-n15 {
    @media screen and (max-width: 599px) {
      margin-top: -20px !important;
    }
  }
  .margin-20 {
    @media screen and (max-width: 599px) {
      margin-top: 20px !important;
    }
  }

  .margin-0 {
    @media screen and (max-width: 400px) {
      margin-top: 0px !important;
    }
  }
  //logo
  .logo {
    width: 163px;
    height: 69px;
    @media screen and (min-width: 1600px) {
      margin-left: 78px;
    }
    @media screen and (max-width: 599px) {
      width: 126px;
      height: 53px;
    }
  }

  //form
  .login-form {
    label {
      font-family: "Montserrat" !important;
      font-size: 14px;
      text-align: left !important;
      font-weight: 500;
      color: #616161 !important;
    }
    @media screen and (max-width: 599px) {
      .login-input {
        margin-top: 5px;
      }
      label {
        font-size: 12px;
      }
    }
  }
  //form

  //..................Upper Left Block.................
  //appbar login btn
  .btn-appbar-login {
    font-family: "Montserrat" !important;
    font-size: 18px !important;
    font-weight: bold !important;
    text-transform: capitalize !important;
    color: #0046fe !important;
    span {
      text-transform: lowercase !important;
    }

    @media screen and (min-width: 1600px) {
      margin-right: 100px;
    }
    @media screen and (max-width: 1263px) {
      font-size: 16px !important;
    }
  }

  .container-resume {
    margin-top: -80px;
    @media screen and (max-width: 599px) {
      padding: 0px !important;
    }
  }

  .card-resume {
    margin-top: 90px;
    z-index: 1;
    @media screen and (min-width: 1600px) {
      margin-top: 121px;
    }
  }
  //resume
  .resume-title {
    font-family: "Montserrat" !important;
    font-weight: bold;
    font-size: 64px;
    line-height: 80px;
    color: #0046fe !important;
    @media screen and (max-width: 1903px) {
      font-size: 48px;
      line-height: 60px;
    }
    @media screen and (min-width: 960px) and (max-width: 1263px) {
      font-size: 36px;
      line-height: 50px;
    }
    @media screen and (max-width: 959px) {
      font-size: 64px;
      line-height: 75px;
    }
    @media screen and (min-width: 600px) and (max-width: 714px) {
      font-size: 48px;
      line-height: 60px;
    }
    @media screen and (max-width: 599px) {
      font-size: 36px;
      line-height: 45px;
    }
  }

  //resume subtitle
  .resume-subtitle {
    font-family: "Open Sans" !important;
    font-size: 18px !important;
    line-height: 24px;
    color: #828282 !important;
    margin-top: -42px;
    @media screen and (max-width: 1903px) {
      font-size: 14px !important;
      line-height: 22px;
    }
    @media screen and (min-width: 960px) and (max-width: 1263px) {
      font-size: 12px !important;
      line-height: 18px;
    }
    @media screen and (max-width: 959px) {
      font-size: 18px !important;
      line-height: 24px;
    }
    @media screen and (max-width: 599px) {
      font-size: 14px !important;
      line-height: 22px;
    }
  }

  .btn-get-started {
    //margin-top: 2.35vh;
    margin-top: 30px;
    font-family: "Montserrat" !important;
    font-weight: bold;
    line-height: 10px;
    box-shadow: -6px -6px 16px #ffffff, 6px 6px 16px rgba(221, 219, 216, 0.4),
      4px 4px 50px rgba(233, 30, 99, 0.2) !important;
    border-radius: 10px !important;
    width: 11.065rem;
    height: 3.55rem !important;
    font-size: 0.875rem !important;

    @media screen and (max-width: 959px) {
      margin-top: 0px;
    }

    @media screen and (max-width: 599px) {
      margin-top: 0px;
      width: 157px !important;
      height: 48.76px !important;
      font-size: 0.75rem !important;
    }
  }

  //reserve title
  .reserve-title {
    margin-top: 30px;
    font-family: "Open Sans" !important;
    font-weight: bold;
    font-size: 1.5rem !important;
    line-height: 2.25rem;
    color: #313131 !important;
    margin-bottom: 20px;
    @media screen and (max-width: 1903px) {
      font-size: 18px !important;
      margin-bottom: -10px;
      margin-top: -25px;
    }
    @media screen and (min-width: 960px) and (max-width: 1263px) {
      font-size: 14px !important;
    }
    @media screen and (max-width: 959px) {
      font-size: 24px !important;
    }
    @media screen and (min-width: 600px) and (max-width: 714px) {
      font-size: 18px !important;
    }
    @media screen and (max-width: 599px) {
      font-size: 16px !important;
      line-height: 36px;
    }
  }

  .login-title {
    font-family: "Montserrat" !important;
    color: #0046fe !important;
    font-size: 1.5rem;
    font-weight: 500;
    @media screen and (max-width: 1440px) {
      font-size: 1.2rem;
      margin-top: 10px;
    }
    @media screen and (max-width: 959px) {
      font-size: 1.875rem;
      line-height: 2.313rem;
    }
    @media screen and (max-width: 599px) {
      font-size: 1.125rem;
      line-height: 1.275rem;
    }
  }

  .sign-up-text {
    font-family: "Montserrat" !important;
    color: #0046fe !important;
    font-weight: bold;
    font-size: 64px !important;
    line-height: 55px;
    @media screen and (max-width: 1903px) {
      font-size: 48px !important;
      line-height: 36px;
    }
    @media screen and (max-width: 1263px) {
      font-size: 36px !important;
      line-height: 30px;
    }
    @media screen and (max-width: 959px) {
      font-size: 64px !important;
      line-height: 55px;
    }
    @media screen and (min-width: 600px) and (max-width: 714px) {
      font-size: 48px !important;
      line-height: 48px;
    }
    @media screen and (max-width: 599px) {
      font-size: 36px !important;
      line-height: 55px;
    }
    @media screen and (max-width: 364px) {
      font-size: 24px !important;
    }
  }

  .create-new-account-text {
    font-family: "Montserrat" !important;
    font-weight: 500;
    font-size: 24px;
    line-height: 29px;
    color: #0046fe !important;
    @media screen and (max-width: 599px) {
      font-size: 18px;
      line-height: 22px;
      padding-top: 32px;
    }
  }

  .social-icon {
    height: 39px !important;
    width: 39px !important;
    min-width: 39px !important;
    border: 1px solid #ebebeb !important;
    border-radius: 10px !important;
  }

  //upper right block

  .signin-email {
    font-family: "Montserrat" !important;
    color: #616161 !important;
    line-height: 1.25rem;
    font-size: 1rem !important;
    font-weight: 500;
    @media screen and (max-width: 599px) {
      font-size: 12px !important;
      line-height: 15px;
    }
  }

  .agree-text {
    font-family: "Montserrat" !important;
    color: #838ca3 !important;
    font-size: 14px;
    font-weight: 500;
    line-height: 17px;
    span {
      color: #0046fe !important;
    }
    @media screen and (max-width: 1263px) {
      font-size: 12px !important;
    }
  }

  .btn-signup {
    box-shadow: 0px 4px 40px rgba(0, 70, 254, 0.2);
    border-radius: 10px !important;
    width: 11.31rem !important;
    height: 3.625rem !important;
    span {
      font-family: "Montserrat" !important;
      font-weight: bold;
      color: #ffffff !important;
      letter-spacing: 0.2em !important;
      font-size: 0.875rem !important;
    }
    @media screen and (min-width: 1264px) and (max-width: 1903px) {
      width: 180px !important;
      height: 51.35px !important;
      font-size: 12px !important;
    }

    @media screen and (min-width: 960px) and (max-width: 1263px) {
      width: 160px !important;
      height: 51.35px !important;
      font-size: 10px !important;
    }
    @media screen and (max-width: 599px) {
      width: 173px !important;
      height: 52px !important;
      font-size: 12px !important;
    }
    @media screen and (max-width: 400px) {
      width: 154px !important;
      font-size: 10px !important;
    }
  }

  .account-exists {
    font-family: "Montserrat" !important;
    font-style: normal;
    font-weight: normal;
    font-size: 18px;
    line-height: 22px;
    color: #000000;
    a {
      color: #0046fe !important;
      font-weight: 500;
    }

    @media screen and (max-width: 959px) {
      font-size: 18px;
      line-height: 22px;
    }

    @media screen and (max-width: 599px) {
      font-size: 14px;
      line-height: 17px;
    }
  }

  // build resume section
  .build-resume-container {
    margin-top: 100px;
    @media screen and (max-width: 1440px) {
      margin-top: 80px;
    }
    @media screen and (max-width: 599px) {
      margin: 0 !important;
      padding: 0 !important;
    }
  }

  .btn-view-themes {
    margin-top: -90px;
    width: 200px !important;
    height: 57px !important;
    font-family: "Montserrat" !important;
    font-weight: bold;
    font-size: 0.875rem !important;
    background: #0046fe;
    box-shadow: 0px 4px 40px rgba(0, 70, 254, 0.2) !important;
    border-radius: 10px;
    letter-spacing: 0.2em;
    line-height: 0;
    text-transform: uppercase;
    color: #ffffff !important;
    @media screen and (min-width: 1264px) and (max-width: 1903px) {
      width: 180px !important;
      height: 51.35px !important;
      font-size: 12px !important;
    }

    @media screen and (min-width: 960px) and (max-width: 1263px) {
      width: 160px !important;
      height: 51.35px !important;
      font-size: 10px !important;
    }

    @media screen and (max-width: 959px) {
      margin-top: 20px;
      margin-bottom: 20px;
      width: 213.79px !important;
      height: 62px !important;
      font-size: 14px !important;
    }

    @media screen and (max-width: 599px) {
      width: 173px !important;
      height: 52px !important;
      font-size: 12px !important;
    }

    @media screen and (max-width: 400px) {
      width: 154px !important;
      font-size: 10px !important;
    }
  }

  .gallery-container {
    margin-top: 114px;
    @media screen and (max-width: 1440px) {
      margin-top: 52px;
    }
    @media screen and (max-width: 1280px) {
      margin-top: 26px;
    }
    @media screen and (max-width: 599px) {
      margin-top: -20px;
      padding: 0 !important;
      margin: 0 !important;
    }
  }

  .build-resume-title {
    font-family: "Montserrat" !important;
    font-weight: bold;
    font-size: 3rem;
    line-height: 3.438rem;
    color: #0a1e56 !important;
    @media screen and (max-width: 1903px) {
      font-size: 34px;
      line-height: 2.438rem;
    }

    @media screen and (max-width: 959px) {
      font-size: 3rem;
      line-height: 3.25rem;
    }
    @media screen and (min-width: 600px) and (max-width: 714px) {
      font-size: 36px;
      line-height: 40px;
    }
    @media screen and (max-width: 599px) {
      font-size: 1.5rem;
      line-height: 32px;
    }
    @media screen and (max-width: 400px) {
      font-size: 1.3rem;
      line-height: 30px;
    }
  }

  .card-choose-theme {
    @media screen and (max-width: 959px) {
      margin-top: 80px;
    }
  }

  .build-resume-subtitle {
    font-family: "Open Sans" !important;
    font-size: 1.125rem !important;
    line-height: 2.25rem;
    color: #575757 !important;
    @media screen and (max-width: 1903px) {
      font-size: 14px !important;
      line-height: 20px;
    }
    @media screen and (min-width: 960px) and (max-width: 1263px) {
      font-size: 12px !important;
      line-height: 16px;
    }
    @media screen and (max-width: 959px) {
      font-size: 1.125rem !important;
      line-height: 1.5rem;
    }
    @media screen and (max-width: 599px) {
      font-size: 14px !important;
      line-height: 24px;
    }
  }
  .card-video {
    border-radius: 20px !important;
  }
  .btn-play {
    width: 128px;
    height: 128px;
    box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.15) !important;
    img {
      width: 71px;
      height: auto;
    }
    @media screen and (max-width: 599px) {
      width: 57.02px;
      height: 56px;
      img {
        width: 30px;
      }
    }
  }

  .card-gallery {
    z-index: 2;
    img {
      border-radius: 10px !important;
    }
    @media screen and (max-width: 959px) {
      padding: 0;
    }
    @media screen and(max-width: 700px) {
      img {
        width: 80%;
      }
    }
  }
  // build resume section

  //footer
  .follow-us-text {
    font-family: "Montserrat" !important;
    font-weight: bold;
    font-size: 32px;
    color: #ffffff !important;
    span {
      font-family: "Open Sans" !important;
      font-size: 18px;
    }

    @media screen and (max-width: 1903px) {
      font-size: 24px;
      span {
        font-size: 12px;
      }
    }

    @media screen and (max-width: 959px) {
      font-size: 1.125rem;
    }
    @media screen and (min-width: 960px) and (max-width: 1263px) {
      label {
        font-size: 12px;
      }
      span {
        font-size: 10px;
      }
    }
    @media screen and (max-width: 599px) {
      font-size: 12px;
      margin-bottom: -47px;
      margin-top: 0px;
    }
    @media screen and (max-width: 380px) {
      font-size: 10px;
    }
    @media screen and (max-width: 329px) {
      font-size: 8px;
    }
  }

  //explore
  .explore-number {
    font-family: "Montserrat" !important;
    font-style: normal;
    font-weight: bold;
    font-size: 64px;
    line-height: 55px;
    color: #061f5a !important;
    @media screen and (max-width: 1903px) {
      font-size: 48px;
      line-height: 36px;
      margin-bottom: -15px;
    }
    @media screen and (min-width: 960px) and (max-width: 1263px) {
      font-size: 32px;
      line-height: 24px;
      margin-bottom: -24px;
    }
  }

  .explore-text {
    font-family: "Montserrat" !important;
    font-style: normal;
    font-weight: bold;
    font-size: 18px;
    line-height: 55px;
    color: #061f5a !important;
    @media screen and (max-width: 1903px) {
      margin-bottom: -10px;
      line-height: 40px;
    }
    @media screen and (min-width: 960px) and (max-width: 1263px) {
      font-size: 14px;
      line-height: 36px;
    }
  }

  .explore-link {
    font-family: "Montserrat" !important;
    font-style: normal;
    font-weight: bold;
    font-size: 18px;
    line-height: 55px;
    color: #0f4cee !important;
    @media screen and (min-width: 960px) and (max-width: 1903px) {
      line-height: 40px;
    }
    @media screen and (min-width: 960px) and (max-width: 1263px) {
      font-size: 14px;
      line-height: 36px;
    }
  }

  //explore
  .logo-footer {
    width: 201px;
    height: auto;

    @media screen and (max-width: 959px) {
      width: 223px;
    }
    @media screen and (max-width: 599px) {
      width: 123px;
      margin-top: -18px;
    }
  }
  .footer-social-icon {
    width: 42.81px !important;
    height: 42.82px !important;

    img {
      width: 20px;
      height: auto;
    }

    @media screen and (max-width: 1903px) {
      width: 28px !important;
      height: 28px !important;
      img {
        width: 14px;
      }
    }
    @media screen and (min-width: 960px) and (max-width: 1263px) {
      width: 24px !important;
      height: 24px !important;
      img {
        width: 10px;
      }
    }

    @media screen and (max-width: 959px) {
      width: 69.07px !important;
      height: 69.07px !important;
      img {
        width: 27px;
      }
    }

    @media screen and (min-width: 600px) and (max-width: 753px) {
      width: 48px !important;
      height: 48px !important;
      img {
        width: 20px;
      }
    }
    @media screen and (max-width: 599px) {
      width: 28px !important;
      height: 28px !important;
      margin-top: 9px !important;
      margin-bottom: -28px;
      img {
        width: 12px;
      }
    }

    @media screen and (max-width: 409px) {
      width: 24px !important;
      height: 24px !important;
      img {
        width: 10px;
      }
    }

    @media screen and (max-width: 380px) {
      width: 22px !important;
      height: 22px !important;
      img {
        width: 10px;
      }
    }

    @media screen and (max-width: 361px) {
      width: 20px !important;
      height: 20px !important;
      img {
        width: 8px;
      }
    }

    @media screen and (max-width: 350px) {
      width: 18px !important;
      height: 18px !important;
      img {
        width: 8px;
      }
    }
    @media screen and (max-width: 335px) {
      width: 16px !important;
      height: 16px !important;
      img {
        width: 6px;
      }
    }
  }

  .custom-footer {
    height: auto !important;
    @media screen and (max-width: 599px) {
      height: 125px;
    }
  }
  .v-text-field {
    border-radius: 10px !important;
  }
  .input-av.v-text-field {
    box-shadow: 0px 4px 40px rgba(0, 28, 226, 0.1) !important;
  }

  .error-custom-margin {
    margin-top: -15px;
    margin-bottom: 10px;
  }

  .v-text-field input {
    color: #aeaeae !important;
  }

  .theme--light.v-text-field--outlined:not(.v-input--is-focused):not(.v-input--has-state)
    > .v-input__control
    > .v-input__slot
    fieldset {
    border: 2px solid #ffffff !important;
  }

  .theme--dark.v-text-field--outlined:not(.v-input--is-focused):not(.v-input--has-state)
    > .v-input__control
    > .v-input__slot
    fieldset {
    border: 2px solid #ebebeb !important;
  }

  .slick-dots li button {
    width: 110px !important;
    height: 6px;
    border-radius: 0px;
    margin-left: -10px;
    background-color: #e5e5e5 !important;
  }

  .slick-dots li.slick-active button {
    background-color: #0f4cee !important;
    outline: none;
    transition: width 5s ease-out 0s;
  }
  .slick-dots li button:focus {
    outline: none !important;
  }

  @media screen and (max-width: 959px) {
    .slick-initialized .slick-slide {
      margin-left: -80px;
    }
  }

  @media screen and (max-width: 700px) {
    .slick-initialized .slick-slide {
      margin-left: -75px;
    }
    .slick-dots li button {
      width: 80px !important;
      height: 6px;
    }
  }

  @media screen and (max-width: 599px) {
    .slick-dots li button {
      width: 40px !important;
      height: 6px;
    }

    .theme--dark.v-text-field--outlined:not(.v-input--is-focused):not(.v-input--has-state)
      > .v-input__control
      > .v-input__slot {
      min-height: 48px !important;
      border-radius: 7px !important;
    }
    .slick-initialized .slick-slide {
      margin-left: -70px;
    }
    @media screen and (max-width: 410px) {
      .slick-initialized .slick-slide {
        margin-left: -69px;
      }
    }
  }
  @media screen and (max-width: 400px) {
    .slick-initialized .slick-slide {
      margin-left: -40px;
    }
  }
}
</style>
