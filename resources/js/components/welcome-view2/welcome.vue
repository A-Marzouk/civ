<template>
  <v-app style="width:100%; background-color: #ffffff;" class="app-container">
    <!-- main container -->
    <v-container class="main-container">
      <v-app-bar color="transparent" flat tile :height="windowWidth<=599?'80':'100'">
        <img class="logo" src="/images/welcome_landing_page/logo/civie_logo-blue.png" alt="logo" />
        <v-spacer></v-spacer>
        <a  class="btn-appbar-login">
          Log
          <span>&nbsp;in</span>
        </a>
      </v-app-bar>
      <!-- 1st inner container -->
      <v-container style="width:100%" class="container-resume">
        <v-row justify="center" align="center" class="resume-row">
          <v-col xl="5" md="6" sm="12" cols="12">
            <div class="tablet-layer1 hidden-md-and-up">
              <img
                class="hidden-xs-only"
                src="/images/welcome_landing_page/imgs/background-images/tablet/layer1.png"
                alt
              />
              <img
                :width="windowWidth"
                class="hidden-sm-and-up"
                src="/images/welcome_landing_page/imgs/background-images/mobile/layer1.png"
                alt
              />
            </div>
            <v-card color="transparent" flat tile class="card-resume">
              <v-card-title class="resume-title">
                Make Your
                <br />Online Resume
              </v-card-title>
              <v-card-subtitle
                class="resume-subtitle"
              >We believe that resume’s can look beautiful, we help freelancers, contractors & jobseekers create stunning online resume’s.</v-card-subtitle>
              <v-card-subtitle>
                <v-btn class="btn-get-started" x-large dark color="#E91E63">GET STARTED</v-btn>
              </v-card-subtitle>
            </v-card>
            <div class="tablet-layer2 hidden-md-and-up">
              <img
                class="hidden-xs-only"
                src="/images/welcome_landing_page/imgs/background-images/tablet/layer2.png"
              />
              <img
                :width="windowWidth"
                class="hidden-sm-and-up"
                src="/images/welcome_landing_page/imgs/background-images/mobile/layer2.png"
              />
            </div>

            <div class="top-layer-background hidden-sm-and-down">
              <img src="/images/welcome_landing_page/imgs/background-images/top-background-img.png" />
            </div>
            <div class="top-make-resume hidden-sm-and-down">
              <img
                src="/images/welcome_landing_page/imgs/background-images/make-your-resume-now.png"
                alt
              />
            </div>

            <v-card color="transparent" flat tile style="z-index:1;">
              <v-card-title class="reserve-title">Reserve your own online webpage</v-card-title>
              <v-card-subtitle class="reserve-input">
                <v-text-field
                  outlined
                  placeholder="civ.ie/yourname"
                  v-model="username"
                  background-color="#ffffff"
                  @keyup="checkUser"
                  :height="windowWidth <= 959 && windowWidth >599 ? '75': windowWidth<=599 ? '60':''"
                >
                  <template slot="append">
                    <v-icon
                      color="#1DBF73"
                      class="custom-append-icon"
                      v-show="userFound == true"
                    >mdi-check-circle</v-icon>
                    <v-icon
                      color="#E91E63"
                      class="custom-append-icon"
                      v-show="userFound == false"
                    >mdi-close-circle</v-icon>
                  </template>
                </v-text-field>
              </v-card-subtitle>
            </v-card>

            <!-- play store ios buttons -->
            <v-card color="transparent" tile flat class="card-download hidden-sm-and-down">
              <v-card-text>
                <v-row align="center">
                  <v-col xl="6" cols="6">
                    <div class="download-text">Download for ios and android:</div>
                  </v-col>
                  <v-col xl="3" cols="3">
                    <a href="#">
                      <img
                        class="app-store-logo"
                        src="/images/welcome_landing_page/icons/app-store.png"
                        alt
                      />
                    </a>
                  </v-col>
                  <v-col xl="3" cols="3">
                    <a href="#">
                      <img
                        class="app-store-logo"
                        src="/images/welcome_landing_page/icons/play-store.png"
                        alt
                      />
                    </a>
                  </v-col>
                </v-row>
              </v-card-text>
            </v-card>
            <!-- play store ios buttons -->
          </v-col>
          <v-col md="5" sm="12" cols="12">
            <div class="make-resume-background hidden-md-and-up">
              <img
                src="/images/welcome_landing_page/imgs/background-images/tablet/make-resume-background.png"
              />
            </div>
            <v-card color="#F8F8F8" elevation="8" class="card-login-form pa-xl-5 pa-md-0">
              <v-card color="transparent" flat tile class="card-login-child">
                <v-card-subtitle class="login-title" align="center">Create new account</v-card-subtitle>
                <v-card-subtitle align="center">
                  <v-btn
                    class="social-icon mx-md-2 mx-sm-3 mx-2"
                    color="#ffffff"
                    v-for="icon in socialMediaIcons"
                    :key="icon.title"
                  >
                    <img
                      :width="windowWidth>599 && windowWidth<=959?icon.tablet_width:icon.width"
                      :src="getSocialIcon(icon.title)"
                      alt
                    />
                  </v-btn>
                </v-card-subtitle>
                <v-card-subtitle class="signin-email mt-n3" align="center">or Sign Up with Email</v-card-subtitle>
              </v-card>
              <!-- Login Form -->
              <v-card-subtitle class="login-form">
                <v-form ref="form" v-model="valid" :lazy-validation="lazy">
                  <div class="input-div">
                    <label for="name">Name</label>
                    <v-text-field
                      class="login-input-field"
                      type="text"
                      outlined
                      background-color="#ffffff"
                      :rules="nameRules"
                      v-model="name"
                    ></v-text-field>
                  </div>
                  <div class="input-div">
                    <label for="email">Email Address</label>
                    <v-text-field
                      type="email"
                      outlined
                      background-color="#ffffff"
                      :rules="emailRules"
                      v-model="email"
                    ></v-text-field>
                  </div>
                  <div class="input-div">
                    <label for="password">Password</label>
                    <v-text-field
                      type="password"
                      outlined
                      background-color="#ffffff"
                      v-model="password"
                      :rules="passwordRules"
                    ></v-text-field>
                  </div>
                  <div class="input-div">
                    <label for="confirmPassword">Confirm Password</label>
                    <v-text-field
                      type="password"
                      outlined
                      background-color="#ffffff"
                      v-model="confirmPassword"
                      :rules="confirmPasswordRules"
                    ></v-text-field>
                  </div>

                  <v-checkbox
                    dense
                    v-model="agreeCheck"
                    :rules="agreeCheckRules"
                    class="hidden-sm-only mt-n5"
                  >
                    <template slot="label">
                      <div class="agree-text">
                        I accept your
                        <span>Terms of Use</span> &
                        <span>Privacy Policy.</span>
                      </div>
                    </template>
                  </v-checkbox>

                  <v-checkbox
                    v-model="agreeCheck"
                    :rules="agreeCheckRules"
                    class="d-none d-sm-flex d-md-none"
                  >
                    <template slot="label">
                      <div class="agree-text">
                        I accept your
                        <span>Terms of Use</span> &
                        <span>Privacy Policy.</span>
                      </div>
                    </template>
                  </v-checkbox>

                  <v-card-text align="center">
                    <v-btn color="#0046FE" class="btn-signup" @click="validate">
                      <span>Sign Up</span>
                    </v-btn>
                  </v-card-text>
                </v-form>
              </v-card-subtitle>
              <!-- Login Form -->
              <v-card-subtitle class="account-exists mt-md-n3 mt-sm-0 mt-0" align="center">
                Already have account?
                <a href="#">Login</a>
              </v-card-subtitle>
            </v-card>
            <div class="tablet-layer3 hidden-md-and-up">
              <img
                class="hidden-xs-only"
                src="/images/welcome_landing_page/imgs/background-images/tablet/layer3.png"
              />
              <img
                :width="windowWidth"
                class="hidden-sm-and-up"
                src="/images/welcome_landing_page/imgs/background-images/mobile/layer3.png"
              />
            </div>
          </v-col>
          <v-col md="1" class="hidden-sm-and-down"></v-col>

          <!-- for tab and mobile -->
          <v-col cols="7" class="hidden-md-and-up" align="center">
            <v-card color="transparent" flat tile class="card-download">
              <v-card-subtitle class="download-text">Download for ios and android:</v-card-subtitle>
              <v-card-subtitle>
                <v-row>
                  <v-col sm="6" cols="6">
                    <a href="#">
                      <img
                        class="app-store-logo"
                        src="/images/welcome_landing_page/icons/app-store.png"
                        alt
                      />
                    </a>
                  </v-col>

                  <v-col sm="6" cols="6">
                    <a href="#">
                      <img
                        class="app-store-logo"
                        src="/images/welcome_landing_page/icons/play-store.png"
                        alt
                      />
                    </a>
                  </v-col>
                </v-row>
              </v-card-subtitle>
            </v-card>
          </v-col>
          <!-- for tab and mobile -->
        </v-row>
      </v-container>
      <!-- 1st inner container ends here -->

      <!-- 2nd inner container starts here -->
      <v-container style="width:100%" class="build-resume-container">
        <v-row align="center" justify="center">
          <v-col xl="9" md="10" sm="12" cols="12" :align="windowWidth>959 ? 'center':'left'">
            <!-- 1st card -->
            <div class="tablet-layer4 hidden-md-and-up">
              <img
                class="hidden-xs-only"
                src="/images/welcome_landing_page/imgs/background-images/tablet/layer4.png"
              />
              <img
                :width="windowWidth"
                class="hidden-sm-and-up"
                src="/images/welcome_landing_page/imgs/background-images/mobile/layer4.png"
              />
            </div>
            <v-card flat tile color="transparent">
              <div class="middle-layer-background1 hidden-sm-and-down">
                <img src="/images/welcome_landing_page/imgs/background-images/middle-layer1.png" />
              </div>

              <v-card-subtitle class="build-resume-title mt-lg-0 mt-md-0 mt-sm-0 mt-7">
                Build a resume that you
                <br />can be proud of
              </v-card-subtitle>
              <v-card-subtitle
                class="build-resume-subtitle mt-md-n5 mb-md-5 mb-sm-12 mb-4 mt-n4"
              >100+ Integrations. Ensure your clients can easily contract, hire and pay you.</v-card-subtitle>
              <div class="middle-layer-background2 hidden-sm-and-down">
                <img src="/images/welcome_landing_page/imgs/background-images/middle-layer2.png" />
              </div>
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
      <v-container style="width:100%" class="gallery-container">
        <v-row align="center" justify="center">
          <v-col xl="11" cols="12">
            <div class="tablet-layer5 hidden-md-and-up">
              <img
                class="hidden-xs-only"
                src="/images/welcome_landing_page/imgs/background-images/tablet/layer5.png"
              />
            </div>
            <div class="tablet-layer6 hidden-md-and-up">
              <img
                :width="windowWidth"
                class="hidden-xs-only"
                src="/images/welcome_landing_page/imgs/background-images/tablet/layer6.png"
              />
            </div>
            <v-card flat tile color="transparent" class="card-choose-theme margin-0">
              <div class="tablet-layer6 hidden-sm-and-up">
                <img
                  :width="windowWidth"
                  class="hidden-sm-and-up"
                  src="/images/welcome_landing_page/imgs/background-images/mobile/layer6.png"
                />
              </div>
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
                    <div class="tablet-layer5 hidden-sm-and-up">
                      <img
                        :width="windowWidth"
                        class="hidden-sm-and-up"
                        src="/images/welcome_landing_page/imgs/background-images/mobile/layer5.png"
                      />
                    </div>
                    <v-btn color="#E91E63" class="btn-get-started-middle">Get Started</v-btn>
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
              <v-row>
                <template v-for="n in 6">
                  <v-col md="4" :key="n">
                    <v-card flat tile color="transparent" class="card-gallery">
                      <img :src="getGalleryImages(n)" alt="gallery" />
                    </v-card>
                  </v-col>
                </template>
              </v-row>
              <div class="middle-layer-background3 hidden-sm-and-down">
                <img src="/images/welcome_landing_page/imgs/background-images/middle-layer3.svg" />
              </div>
            </v-card>
          </v-col>
        </v-row>
      </v-container>
      <!-- 3rd inner container starts here -->
      <!-- 3rd inner container -->
      <v-container style="width:100%;" class="mt-md-7 mt-sm-0 mt-0 container-integration">
        <v-row align="center" justify="center">
          <v-col cols="12" :align="windowWidth <=959 ? 'left' : 'center'">
            <div class="middle-layer-background4 hidden-sm-and-down">
              <img src="/images/welcome_landing_page/imgs/background-images/middle-layer4.svg" />
            </div>

            <v-card flat tile color="transparent" style="z-index:1;">
              <v-card-subtitle class="build-resume-title margin-n50">Integrations</v-card-subtitle>
              <v-card-subtitle
                class="build-resume-subtitle mt-md-n8 mb-md-3 mt-sm-n0 mt-n5 mb-sm-0 mb-n11"
              >Link social networks, online profiles, easly accepton line payments</v-card-subtitle>
              <v-card-text style="z-index:2;" class="mt-md-0 mt-sm-12 mt-12">
                <slick
                  class="integrationSlides"
                  ref="slick"
                  :options="slickOptions"
                  style="z-index:2;"
                >
                  <v-card color="transparent" flat tile v-for="item in integrations" :key="item.id">
                    <v-card-subtitle class="integration-title" v-html="item.title"></v-card-subtitle>
                    <v-card-text>
                      <img
                        width="auto"
                        :class="item.id== 4 ?'integrationImg':''"
                        :src="getIntegrationImage(item.id)"
                      />
                    </v-card-text>
                  </v-card>
                </slick>
              </v-card-text>
            </v-card>
            <div class="tablet-layer7 hidden-md-and-up">
              <img
                class="hidden-xs-only"
                :width="windowWidth"
                src="/images/welcome_landing_page/imgs/background-images/tablet/layer7.png"
              />
            </div>
          </v-col>
        </v-row>
      </v-container>
      <!-- 3rd inner container -->
      <div class="middle-layer-background5 hidden-sm-and-down">
        <img src="/images/welcome_landing_page/imgs/background-images/middle-layer5.svg" />
      </div>
    </v-container>
    <!-- main container -->
    <!-- Footer -->
    <v-footer color="#0F4CEE" :height="windowWidth <= 599 ? '125':'auto'">
      <v-container>
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
            <v-card flat tile color="transparent" align="center">
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
            <v-card flat tile color="transparent">
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
export default {
  components: {
    Slick
  },
  data() {
    return {
      windowWidth: window.innerWidth,
      username: "civ.ie/",
      userFound: null,
      valid: false,
      lazy: false,
      name: "",
      nameRules: [v => !!v || "", v => (v && v.length >= 3) || ""],
      email: "",
      emailRules: [v => !!v || "", v => /.+@.+\..+/.test(v) || ""],
      password: "",
      passwordRules: [v => !!v || "", v => (v && v.length >= 6) || ""],
      confirmPassword: "",
      confirmPasswordRules: [
        v => !!v || "",
        v => (v && v == this.password) || ""
      ],
      agreeCheck: false,
      agreeCheckRules: [v => (v && v == false) || ""],

      socialMediaIcons: [
        { id: 1, title: "instagram", width: 18, tablet_width: 30 },
        { id: 2, title: "linkedin", width: 16, tablet_width: 28 },
        { id: 3, title: "google", width: 14, tablet_width: 22 },
        { id: 4, title: "facebook", width: 18, tablet_width: 28 },
        { id: 5, title: "github", width: 22, tablet_width: 36 }
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
      slickOptionsGallery: {
        centerMode: true,
        infinite: true,
        dots: true,
        arrows: false,
        slidesToShow: 3,
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
              centerPadding: "30px",
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
        ]
      },
      slickOptions: {
        centerMode: false,
        infinite: true,
        dots: true,
        arrows: false,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 5000,
        pauseOnDotsHover: true,
        responsive: [
          {
            breakpoint: 959,
            settings: {
              centerMode: true,
              centerPadding: "80px",
              slidesToShow: 1,
              slidesToScroll: 1
            }
          },
          {
            breakpoint: 599,
            settings: {
              centerMode: true,
              centerPadding: "40px",
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
        ]
      }
    };
  },
  //mounted
  mounted() {
    window.onresize = () => {
      this.windowWidth = window.innerWidth;
    };
  },
  methods: {
    validate() {
      this.$refs.form.validate();
    },
    checkUser() {
      if (this.username == "") {
        this.userFound = null;
      } else {
        let index = this.username.search("/");
        if (index >= 0) {
          let splitStr = this.username.split("/");
          var found = this.users.indexOf(splitStr[1]);
          found > -1 ? (this.userFound = true) : (this.userFound = false);
        }
      }
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
    }
  }
};
</script>
<style scoped lang="scss">
@import url("https://fonts.googleapis.com/css?family=Montserrat");
@import url("https://fonts.googleapis.com/css?family=Open+Sans");
.gallery-slides {
  @media screen and (max-width: 599px){

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

.custom-append-icon {
  @media screen and (min-width: 960px) and (max-width: 1440px) {
    margin-top: -6px;
  }
  @media screen and (max-width: 959px) {
    margin-top: 9px;
  }
  @media screen and (max-width: 599px) {
    margin-top: 0px;
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
  .input-div {
    margin-top: -20px;
  }

  @media screen and (max-width: 959px) {
    .input-div {
      margin-top: 0px;
    }
  }
  @media screen and (max-width: 599px) {
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
  font-size: 1rem !important;
  font-weight: bold !important;
  text-transform: capitalize !important;
  color:#0046FE !important;
  span {
    text-transform: lowercase !important;
  }
  
  @media screen and (min-width: 1600px) {
    margin-right: 100px;
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
  color: #0046fe !important;
  font-weight: bold;
  font-size: 4.2rem;
  line-height: 5rem;
  margin-bottom: 10px;
  @media screen and (max-width: 1440px) {
    font-size: 3.3rem;
    line-height: 4rem;
  }

  @media screen and (min-width: 960px) and (max-width: 1024px) {
    font-size: 2.5rem;
    line-height: 3rem;
  }

  @media screen and (max-width: 959px) {
    font-size: 4rem;
    line-height: 4.375rem;
  }
  @media screen and (max-width: 599px) {
    font-size: 2.625rem;
    line-height: 2.813rem;
    margin-bottom: 20px;
  }
  @media screen and (max-width: 400px) {
    font-size: 2rem;
    line-height: 2.1rem;
  }
}

//resume subtitle
.resume-subtitle {
  font-family: "Open Sans" !important;
  font-size: 1.375rem !important;
  line-height: 2.25rem;
  color: #828282 !important;
  @media screen and (max-width: 1440px) {
    font-size: 17px !important;
  }
  @media screen and (min-width: 960px) and (max-width: 1024px) {
    font-size: 14px !important;
    line-height: 1.8rem;
  }
  @media screen and (max-width: 959px) {
    font-size: 1.125rem !important;
    line-height: 1.875rem;
  }
  @media screen and (max-width: 599px) {
    font-size: 0.875rem !important;
    line-height: 1.375rem;
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
  z-index: 1;
  @media screen and (max-width: 1440px) {
    font-size: 1rem !important;
  }
  @media screen and (max-width: 959px) {
    margin-top: 80px;
    font-weight: 600;
  }
  @media screen and (max-width: 599px) {
    margin-top: 0px;
    margin-bottom: 5px;
  }
}

//card download

.card-download {
  margin-top: 32px;
  @media screen and (max-width: 1440px) {
    margin-top: -19px;
  }
  @media screen and (max-width: 959px) {
    margin-top: 36px;
  }
  @media screen and (max-width: 599px) {
    margin-top: 0px;
  }
}
//Download text
.download-text {
  font-family: "Open Sans" !important;
  font-size: 1.25rem;
  color: #313131;
  @media screen and (max-width: 1440px) {
    font-size: 1rem;
  }
  @media screen and (min-width: 960px) and (max-width: 1024px) {
    font-size: 0.7rem;
  }
  @media screen and (max-width: 599px) {
    font-size: 12px !important;
  }

  // @media screen and (max-width: 959px) {
  //   font-size: 1rem !important;
  // }
}
.app-store-logo {
  margin-left: -20px;
  width: 170px;
  height: auto;
  max-width: 127% !important;
  @media screen and (min-width: 1600px) {
    margin-left: 0px;
  }
  @media screen and (max-width: 599px) {
    max-width: 130% !important;
    margin-top: -35px;
  }
}
// .... upper left block..............

//upper right block
.card-login-form {
  border-radius: 15px !important;
  padding-left: 2.38rem !important;
  padding-right: 2.38rem !important;
  box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1) !important;
  z-index: 1;
  @media screen and (max-width: 1440px) {
    padding-left: 1.5rem !important;
    padding-right: 1.5rem !important;
  }
  @media screen and (max-width: 959px) {
    height: 960px;
    margin-top: 80px;
    padding-left: 0px !important;
    padding-right: 0px !important;
    .card-login-child {
      padding: 10px;
    }
  }
  @media screen and (max-width: 599px) {
    margin-top: 0px;
    height: 818px;
    margin-left: 0 !important;
    margin-right: 0 !important;
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
.social-icon {
  border-radius: 10px !important;
  height: 39px !important;
  width: 39px !important;
  min-width: 39px !important;
  box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.08) !important;
  margin-top: 10px;
  margin-bottom: 15px;
  @media screen and (max-width: 1440px) {
    margin-top: -10px;
    margin-bottom: -5px;
  }

  @media screen and (min-width: 960px) and (max-width: 1024px) {
    margin-left: 2px !important;
  }
  @media screen and (max-width: 959px) {
    width: 66px !important;
    height: 66px !important;
    margin-top: 0px;
    margin-bottom: 20px;
  }

  @media screen and (max-width: 599px) {
    width: 42px !important;
    height: 42px !important;
    margin-top: -10px;
    margin-bottom: 0px;
  }
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
  font-size: 12px;
  font-weight: 500;
  span {
    color: #0046fe !important;
  }
  @media screen and (min-width: 960px) and (max-width: 1024px) {
    font-size: 10px;
  }
  @media screen and (max-width: 959px) {
    font-size: 12px !important;
  }
}

.btn-signup {
  box-shadow: -6px -6px 16px #ffffff, 6px 6px 16px rgba(221, 219, 216, 0.4),
    4px 4px 20px rgba(25, 0, 180, 0.2) !important;
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
  @media screen and (max-width: 599px) {
    width: 157px !important;
    height: 48.76px !important;
  }
}

.account-exists {
  font-family: "Montserrat" !important;
  font-style: normal;
  font-weight: normal;
  font-size: 14px;
  line-height: 22px;
  color: #000000;
  a {
    color: #0046fe !important;
    font-weight: 500;
  }

  @media screen and (max-width: 959px) {
    font-size: 1.375rem;
  }

  @media screen and (max-width: 599px) {
    font-size: 1.125rem;
  }
}

// build resume section
.build-resume-container {
  margin-top: 130px;
  @media screen and (max-width: 1440px) {
    margin-top: 80px;
  }
  @media screen and (max-width: 599px) {
    margin: 0 !important;
    padding: 0 !important;
  }
}

.btn-get-started-middle {
  margin-top: -90px;
  width: 200px !important;
  height: 57px !important;
  font-family: "Montserrat" !important;
  font-weight: bold;
  font-size: 0.875rem !important;
  box-shadow: -6px -6px 16px #ffffff, 6px 6px 16px rgba(221, 219, 216, 0.4),
    4px 4px 50px rgba(233, 30, 99, 0.2) !important;
  border-radius: 10px !important;
  letter-spacing: 0.2em;
  line-height: 0;
  text-transform: uppercase;
  color: #ffffff !important;
  @media screen and (max-width: 1440px) {
  }
  @media screen and (max-width: 959px) {
    margin-top: 20px;
    margin-bottom: 20px;
  }

  @media screen and (max-width: 599px) {
    width: 157px !important;
    height: 48.76px !important;
    font-size: 0.75rem !important;
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
  color: #0046fe !important;
  @media screen and (max-width: 1440px) {
    font-size: 34px;
    line-height: 2.438rem;
  }
  @media screen and (max-width: 959px) {
    font-size: 3rem;
    line-height: 3.25rem;
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
  @media screen and (max-width: 1440px) {
    font-size: 14px !important;
    line-height: 1.5rem;
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
}
// build resume section

//integration section
.container-integration {
  @media screen and (max-width: 1440px) {
    margin-top: 15px;
  }
  @media screen and (max-width: 959px) {
    margin-top: 80px !important;
  }
  @media screen and (max-width: 599px) {
    margin-top: 30px;
    padding: 0 !important;
  }
}
.integration-title {
  font-family: "Montserrat" !important;
  font-weight: bold;
  font-size: 22px;
  line-height: 29px;
  color: #575757 !important;
  @media screen and (max-width: 959px) {
    font-size: 1.125rem;
  }
  @media screen and (max-width: 599px) {
    font-size: 10px;
    line-height: 15px;
  }
}
.integrationImg {
  height: 226px;
  width: auto;
  @media screen and (min-width: 1600px) {
    height: 300px;
  }
  @media screen and (max-width: 959px) {
    height: 350px !important;
    height: auto;
  }

  @media screen and (max-width: 599px) {
    width: 160px !important;
    height: auto !important;
  }
  @media screen and (max-width: 380px) {
    width: 130px !important;
    height: auto !important;
  }
}
.integrationSlides {
  @media screen and (max-width: 959px) {
    img {
      width: 85%;
    }
  }
}
//integration section
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

  @media screen and (max-width: 1440px) {
    font-size: 20px;
    span {
      font-size: 14px;
    }
  }

  @media screen and (max-width: 959px) {
    font-size: 1.125rem;
  }
  @media screen and (min-width: 960px) and (max-width: 1024px){
    label{
      display: none;
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

}
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
  img {
    width: 14px;
    height: auto;
  }
  @media screen and (min-width: 1600px) {
    width: 41px !important;
    height: 41px !important;
    img {
      width: 18.25px;
      height: auto;
    }
  }
  @media screen and (max-width: 959px) {
    width: 69.07px;
    height: 69.07px;
    img {
      width: 25px;
    }
  }
  @media screen and (max-width: 599px) {
    width: 28px;
    height: 28px;
    margin-top: 9px !important;
    margin-bottom: -28px;
    img {
      width: 12px;
    }
  }

  @media screen and (max-width: 400px) {
    width: 24px;
    height: 24px;
    img {
      width: 10px;
    }
  }

  @media screen and (max-width: 380px) {
    width: 22px;
    height: 22px;
    img {
      width: 10px;
    }
  }

  @media screen and (max-width: 360px) {
    width: 20px;
    height: 20px;
    img {
      width: 9px;
    }
  }
}
//footer

// backgrounds
.top-layer-background {
  position: absolute;
  width: 1920px;
  top: 3.7rem;
  left: 0;
  right: 0;
  margin-right: auto;
  margin-left: auto;
  img {
    width: 95%;
  }
  @media screen and (max-width: 1440px) {
    width: 1440px;
    left: 0;
    top: 3.9rem;
    img {
      width: 100%;
    }
  }

  @media screen and (max-width: 1366px) {
    left: 0;
    width: 1366px;
    top: 4.8rem;
    img {
      width: 100%;
    }
  }
  @media screen and (max-width: 1280px) {
    width: 1280px;
    left: 0;
    top: 5.7rem;
    img {
      width: 100%;
    }
  }
  @media screen and (max-width: 1024px) {
    img {
      width: 79%;
    }
  }
}

.top-make-resume {
  position: absolute;
  width: 1920px;
  top: 32.7rem;
  left: -0.3rem;
  img {
    width: 100%;
  }
  @media screen and (max-width: 1440px) {
    width: 1440px;
    top: 31rem;
    left: 0;
  }
  @media screen and (max-width: 1366px) {
    width: 1366px;
    left: 0;
    top: 31.5rem;
  }

  @media screen and (max-width: 1280px) {
    width: 1280px;
    left: 0;
    top: 32rem;
  }
  @media screen and (max-width: 1024px) {
    img {
      width: 79%;
    }
  }
}

.middle-layer-background1 {
  position: absolute;
  width: 1920px;
  top: -17.8rem;
  left: -26%;
  right: 0;
  margin-left: auto;
  margin-right: auto;
  z-index: 0;
  img {
    width: 90%;
  }
  @media screen and (max-width: 1440px) {
    width: 1440px;
    left: -28%;
    top: -13.3rem;
  }
  @media screen and (max-width: 1280px) {
    width: 1280px;
    left: -18%;
    top: -13rem;
  }
  @media screen and (max-width: 1024px) {
    top: -9rem;
    left: -41%;
    img {
      width: 79%;
    }
  }
}

.middle-layer-background2 {
  position: absolute;
  float: left;
  width: 1920px;
  top: 25.8rem;
  left: -17.5%;
  right: 0;
  margin-left: auto;
  margin-right: auto;

  @media screen and (min-width: 1920px) {
    top: 215%;
    left: -24.5%;
  }

  @media screen and (max-width: 1900px) {
    width: 1440px;
    top: 219%;
    left: -26.5%;
    img {
      width: 94%;
    }
  }

  @media screen and (max-width: 1280px) {
    width: 1280px;
    top: 249%;
    left: -22%;
  }
  @media screen and (max-width: 1024px) {
    width: 1280px;
    top: 210%;
    left: -44%;
    img {
      width: 70%;
    }
  }
}

.middle-layer-background3 {
  position: absolute;
  width: 1920px;
  top: 5%;
  left: -10.5%;
  z-index: 1;
  img {
    width: 100%;
  }
  @media screen and (max-width: 1440px) {
    width: 1440px;
    left: -14.5%;
  }
  @media screen and (max-width: 1366px) {
    width: 1366px;
    left: -10%;
  }
  @media screen and (max-width: 1280px) {
    width: 1280px;
    left: -5%;
  }
  @media screen and (max-width: 1024px) {
    left: -10%;
  }
}

.middle-layer-background4 {
  position: absolute;
  width: 1920px;
  top: 76.6%;
  left: -0.2rem;
  right: 0;
  margin-left: auto;
  margin-right: auto;
  z-index: 0;
  @media screen and (max-width: 1440px) {
    width: 1440px;
    top: 76.6%;
    left: 3px;
  }
  @media screen and (max-width: 1366px) {
    width: 1366px;
    top: 76.8%;
    left: -2px;
  }
  @media screen and (max-width: 1280px) {
    top: 76.9%;
    width: 1280px;
    left: -0.8125rem;
  }
  @media screen and (max-width: 1024px) {
    top: 72%;
  }
}

.middle-layer-background5 {
  position: absolute;
  width: 1920px;
  top: 93%;
  left: 0;
  right: 0;
  margin-left: auto;
  margin-right: auto;
  @media screen and (max-width: 1440px) {
    width: 1440px;
  }
  @media screen and (max-width: 1366px) {
    width: 1366px;
    top: 92.5%;
  }
  @media screen and (max-width: 1280px) {
    top: 93%;
    width: 1280px;
  }
  @media screen and (max-width: 1024px) {
    top: 92%;
  }
}

// backgrounds
// background tablet and mobile
.tablet-layer1 {
  position: absolute;
  width: 100%;
  margin-left: auto;
  margin-right: auto;
  left: 0;
  right: 0;
  top: 1.5%;
  @media screen and (max-width: 599px) {
    top: 1.8%;
    width: 90%;
  }

  @media screen and (max-width: 414px) {
    top: 2%;
  }

  // @media screen and (max-width: 340px) {
  //   top: 2.3%;
  //   img {
  //     width: 88%;
  //   }
  // }
}

.tablet-layer2 {
  position: absolute;
  width: 100%;
  margin-left: auto;
  margin-right: auto;
  left: 0;
  right: 0;
  top: 7.9%;
  // @media screen and (max-width: 896px){
  //   top:6.4%
  // }
  @media screen and (max-width: 599px) {
    width: 80%;
    top: 7.5%;
    left: 10%;
  }
  @media screen and (max-width: 414px) {
    top: 7.8%;
  }
  @media screen and (max-width: 385px) {
    top: 8%;
  }

  // @media screen and (max-width: 340px) {
  //   top: 7.5%;
  // }
}

.make-resume-background {
  position: absolute;
  margin-left: auto;
  margin-right: auto;
  left: 0;
  right: 0;
  top: 19%;
}

.tablet-layer3 {
  position: absolute;
  width: 100%;
  margin-left: auto;
  margin-right: auto;
  left: 0;
  right: 0;
  top: 33.4%;
  // @media screen and (max-width: 896px){
  //   top:31.7%;
  // }
  @media screen and (max-width: 599px) {
    top: 41.3%;
    img {
      width: 97%;
    }
  }
  @media screen and (max-width: 414px) {
    top: 41.8%;
  }
  @media screen and (max-width: 400px) {
    top: 40.6%;
  }

  @media screen and (max-width: 380px) {
    top: 41.5%;
  }

  @media screen and (max-width: 360px) {
    top: 42.5%;
  }

  // @media screen and (max-width: 340px) {
  //   top: 40.1%;
  //   left: 20px;
  //   img {
  //     width: 89%;
  //   }
  // }
}

.tablet-layer4 {
  position: absolute;
  width: 100%;
  margin-left: auto;
  margin-right: auto;
  left: 0;
  right: 0;
  top: 47.7%;
  img {
    width: 95%;
  }
  // @media screen and (max-width: 896px){
  //   top: 46.5%;
  // }
  @media screen and (max-width: 599px) {
    top: 52.5%;
  }
  @media screen and (max-width: 414px) {
    top: 52.8%;
  }

  @media screen and (max-width: 400) {
    top: 51.7%;
  }

  @media screen and (max-width: 375px) {
    top: 53.1%;
  }
  @media screen and (max-width: 360px) {
    top: 53.7%;
  }
}

.tablet-layer5 {
  position: absolute;
  width: 100%;
  margin-left: auto;
  margin-right: auto;
  left: 3%;
  right: 0;
  top: 58.1%;
  // @media screen and (max-width: 896px){
  //   top: 59.5%;
  // }
  @media screen and (max-width: 599px) {
    top: 39.6%;
    left: 38%;
    img {
      width: 60%;
    }
  }
  @media screen and (max-width: 380px) {
    left: 49%;
    top: 47%;
  }
  @media screen and (max-width: 370px) {
    top: 52%;
  }

  // @media screen and (max-width: 340px) {
  //   top: 127rem;
  // }
}

.tablet-layer6 {
  position: absolute;
  width: 100%;
  margin-left: auto;
  margin-right: auto;
  left: 12.6%;
  right: 0;
  z-index: 0;
  top: 63%;
  img {
    width: 80%;
  }
  // @media screen and (max-width: 896px){
  //   top: 65%;
  // }
  @media screen and (max-width: 599px) {
    width: 80%;
    top: 190.8%;
    left: 32%;
    img {
      width: 80%;
    }
  }
  @media screen and (max-width: 380px) {
    top: 189%;
  }

  // @media screen and (max-width: 340px) {
  //   top: 157.3rem;
  // }
}

.tablet-layer7 {
  position: absolute;
  width: 100%;
  margin-left: auto;
  margin-right: auto;
  left: 9%;
  right: 0;
  top: 79%;
  img {
    width: 80%;
  }
}
//background tablet and mobile
</style>

<style>
#welcomeView2 .v-text-field {
  border-radius: 10px !important;
  border-color: #ffffff !important;
}

#welcomeView2 .v-text-field input {
  color: #aeaeae !important;
}

#welcomeView2
  .theme--light.v-text-field--outlined:not(.v-input--is-focused):not(.v-input--has-state)
  > .v-input__control
  > .v-input__slot
  fieldset {
  border: 2px solid #ffffff !important;
  box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.09) !important;
}

#welcomeView2 .v-text-field .v-input__control .v-input__slot {
  min-height: 60px !important;
}

#welcomeView2 .slick-dots li button {
  width: 110px;
  height: 6px;
  border-radius: 0px;
  margin-left: -10px;
}

#welcomeView2 .slick-dots li.slick-active button {
  background-color: #0f4cee;
  outline: none;
  transition: width 5s ease-out 0s;
}

#welcomeView2 .slick-dots li button:focus {
  outline: none !important;
}

@media screen and (min-width: 1700px) {
  #welcomeView2 .v-text-field .v-input__control .v-input__slot {
    max-width: 700px !important;
  }
}

@media screen and (max-width: 1440px) {
  #welcomeView2 .v-text-field .v-input__control .v-input__slot {
    min-height: 45px !important;
  }
}
/* tablet screen */
/* @media screen and (max-width: 959px) {
  #welcomeView2 .v-text-field .v-input__control .v-input__slot {
    min-height: 4.688rem !important;
  }
} */
/* tablet screen */
/* mobile screen */
@media screen and (max-width: 959px) {
  #welcomeView2 .v-text-field .v-input__control .v-input__slot {
    min-height: 60px !important;
  }
  #welcomeView2 .gallerySlides {
    margin-top: -120px;
  }
  #welcomeView2 .gallery-slides .slick-slide {
    margin-left: -78px;
  }
  #welcomeView2 .integrationSlides .slick-slide {
    margin-left: -35px !important;
  }
  #welcomeView2 .integrationSlides .slick-dots li button {
    width: 130px;
    height: 6px;
    border-radius: 0px;
    margin-left: -10px;
    margin-top: -30px;
  }
}
@media screen and (max-width: 599px) {
  #welcomeView2 .v-text-field .v-input__control .v-input__slot {
    min-height: 50px !important;
  }
  #welcomeView2 .gallery-slides .slick-dots li button {
    width: 40px;
    height: 6px;
    border-radius: 0px;
    margin-left: -10px;
    margin-top: -20px;
  }
  #welcomeView2 .integrationSlides .slick-dots li button {
    width: 50px;
    height: 6px;
    border-radius: 0px;
    margin-left: -10px;
  }
  #welcomeView2 .gallery-slides .slick-slide {
    margin-left: 34px;
    width: 300px !important;
  }
  #welcomeView2 .integrationSlides .slick-slide {
    margin-left: -55px !important;
    margin-top: 0px !important;
  }
}
@media screen and (max-width: 414px) {
  #welcomeView2 .gallery-slides .slick-slide {
    margin-left: 27px;
    width: 300px !important;
  }
}

@media screen and (max-width: 400px) {
  #welcomeView2 .gallery-slides .slick-slide {
    margin-left: 10px;
    width: 300px !important;
  }
}
@media screen and (max-width: 393px) {
  #welcomeView2 .gallery-slides .slick-slide {
    margin-left: 13px;
    width: 300px !important;
  }
}
@media screen and (max-width: 375px) {
  #welcomeView2 .gallery-slides .slick-slide {
    margin-left: 1px;
  }
}

@media screen and (max-width: 360px) {
  #welcomeView2 .gallery-slides .slick-slide {
    margin-left: -8px;
  }
}
/* mobile screen */
</style>
