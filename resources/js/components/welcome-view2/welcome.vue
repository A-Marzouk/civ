<template>
  <v-app style="width:100%; background-color: #ffffff;">
    <!-- main container -->
    <v-container class="main-container">
      <v-app-bar color="transparent" flat tile height="100">
        <img class="logo" src="/images/welcome_landing_page/logo/civie_logo-blue.png" alt="logo" />
        <v-spacer></v-spacer>
        <v-btn text color="#0046FE" class="btn-appbar-login">
          Log
          <span>&nbsp;in</span>
        </v-btn>
      </v-app-bar>
      <!-- 1st inner container -->
      <v-container style="width:100%" class="container-resume">
        <v-row justify="center" align="center" class="resume-row">
          <v-col xl="5" md="6" sm="12" cols="12">
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
            <v-card color="#F8F8F8" elevation="8" class="card-login-form pa-xl-5 pa-md-0">
              <v-card-subtitle class="login-title" align="center">Create new account</v-card-subtitle>
              <v-card-subtitle align="center">
                <v-btn
                  class="social-icon mx-md-2 mx-sm-3 mx-2"
                  color="#ffffff"
                  v-for="icon in socialMediaIcons"
                  :key="icon.title"
                >
                  <img :width="icon.width" :src="getSocialIcon(icon.title)" alt />
                </v-btn>
              </v-card-subtitle>
              <v-card-subtitle class="signin-email mt-n3" align="center">or Sign Up with Email</v-card-subtitle>
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
                    class="d-none d-flex d-md-none"
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
          </v-col>
          <v-col md="1" class="hidden-sm-and-down"></v-col>

          <!-- for tab and mobile -->
          <v-col cols="7" class="hidden-md-and-up" align="center">
            <v-card color="transparent" flat tile>
              <v-card-subtitle class="download-text">Download for ios and android:</v-card-subtitle>
              <v-card-subtitle>
                <v-row>
                  <v-col cols="6">
                    <a href="#">
                      <img
                        class="app-store-logo"
                        src="/images/welcome_landing_page/icons/app-store.png"
                        alt
                      />
                    </a>
                  </v-col>

                  <v-col cols="6">
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
            <v-card flat tile color="transparent">
              <div class="middle-layer-background1 hidden-sm-and-down">
                <img src="/images/welcome_landing_page/imgs/background-images/middle-layer1.png" />
              </div>

              <v-card-subtitle class="build-resume-title">
                Build a resume that you
                <br />can be proud of
              </v-card-subtitle>
              <v-card-subtitle
                class="build-resume-subtitle mt-n5 mb-5"
              >100+ Integrations. Ensure your clients can easily contract, hire and pay you.</v-card-subtitle>
              <div class="middle-layer-background2 hidden-sm-and-down">
                <img src="/images/welcome_landing_page/imgs/background-images/middle-layer2.png" />
              </div>
            </v-card>
            <!-- 1st card -->
            <!-- 2nd card -->
            <v-card
              class="card-video pa-md-8 pa-sm-0 pa-0"
              color="transparent"
              flat
              tile
              align="center"
            >
              <v-img src="/images/welcome_landing_page/icons/poster-video.png" class="align-center">
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
            <v-card flat tile color="transparent">
              <v-card-title class="build-resume-title">
                40+ Beautiful Themes
                <br />to choose from
              </v-card-title>
              <v-card-subtitle class="build-resume-subtitle mt-1">
                <v-row>
                  <v-col
                    md="6"
                    cols="12"
                  >Add your data and then apply any theme tj make your resume visually amazing. Ensure that you stand out and make a great first impression with any hiring manager.</v-col>
                  <v-col md="6" cols="12" :align="windowWidth > 959 ? 'right' :'left'">
                    <v-btn color="#E91E63" class="btn-get-started-middle">Get Started</v-btn>
                  </v-col>
                </v-row>
              </v-card-subtitle>
            </v-card>

            <v-card tile color="transparet" flat class="card-gallery hidden-md-and-up">
              <slick
                class="integrationSlides"
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
          <v-col cols="12" align="center">
            <div class="middle-layer-background4 hidden-sm-and-down">
              <img src="/images/welcome_landing_page/imgs/background-images/middle-layer4.svg" />
            </div>
            <v-card flat tile color="transparent" style="z-index:1;">
              <v-card-subtitle class="build-resume-title">Integrations</v-card-subtitle>
              <v-card-subtitle
                class="build-resume-subtitle mt-md-n8 mb-md-3 mt-sm-n5 mt-n5"
              >Link social networks, online profiles, easly accepton line payments</v-card-subtitle>
              <v-card-text style="z-index:2;">
                <slick
                  class="integrationSlides"
                  ref="slick"
                  :options="slickOptions"
                  style="z-index:2;"
                >
                  <v-card color="transparent" flat tile v-for="item in integrations" :key="item.id">
                    <v-card-subtitle class="integration-title">{{item.title}}</v-card-subtitle>
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
    <v-footer color="#0F4CEE">
      <v-container>
        <v-row justify="center" align="center" class="justify-space-around">
          <v-col md="2" cols="12" :align="windowWidth <959 ?'center':'left' ">
            <v-card flat color="transparent" tile>
              <img class="logo-footer hidden-sm-and-down" src="/images/welcome_landing_page/logo/civie_logo-01.png" />
              <img class="logo-footer hidden-md-and-up" src="/images/welcome_landing_page/logo/civie_logo-01.png" />
            </v-card>
          </v-col>
          <v-col md="6" cols="6" align="right" class="hidden-sm-and-down">
            <v-card flat tile color="transparent">
              <v-card-text class="follow-us-text">
                Follow Us:
                <v-btn fab x-small color="#ffffff" class="footer-social-icon ml-md-2 ml-sm-0 ml-0">
                  <img
                    src="/images/welcome_landing_page/icons/social_icons/facebook.png"
                    alt="facebook"
                  />
                </v-btn>
                <span>14,044 Followers</span>
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
                Contact Us:
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

          <v-col cols="4" class="hidden-md-and-up">
            <v-card flat tile color="transparent" align="center">
              <v-card-subtitle class="follow-us-text">Follow Us</v-card-subtitle>
              <v-card-subtitle>
                <v-btn fab x-small color="#ffffff" class="footer-social-icon mx-sm-2 mx-1">
                  <img
                    src="/images/welcome_landing_page/icons/social_icons/facebook.png"
                    alt="facebook"
                  />
                </v-btn>
                <v-btn fab x-small color="#ffffff" class="footer-social-icon mx-sm-2 mx-1">
                  <img
                    src="/images/welcome_landing_page/icons/social_icons/instagram.png"
                    alt="instagram"
                  />
                </v-btn>
              </v-card-subtitle>
            </v-card>
          </v-col>

          <v-col cols="8" class="hidden-md-and-up">
            <v-card flat tile color="transparent">
              <v-card-subtitle class="follow-us-text" align="center">Contact Us</v-card-subtitle>
              <v-card-subtitle>
                <v-btn
                  fab
                  x-small
                  color="#ffffff"
                  class="footer-social-icon mx-sm-2 mx-1"
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
        { id: 1, title: "instagram", width: 18 },
        { id: 2, title: "linkedin", width: 16 },
        { id: 3, title: "google", width: 14 },
        { id: 4, title: "facebook", width: 18 },
        { id: 5, title: "github", width: 22 }
      ],
      integrations: [
        { id: 1, title: "Connect your online profiles" },
        { id: 2, title: "Integrate your social account" },
        { id: 3, title: "Allow potential employers to contact you easly" },
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
      users: ["nishad", "ahmed", "anton"],
      slickOptionsGallery: {
        centerMode: true,
        infinite: true,
        centerPadding: "0px",
        dots: true,
        arrows: false,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: false,
        autoplaySpeed: 5000,
        pauseOnDotsHover: true,
        variableWidt: true,
        responsive: [
          {
            breakpoint: 959,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          },
          {
            breakpoint: 599,
            settings: {
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
              slidesToShow: 1,
              slidesToScroll: 1
            }
          },
          {
            breakpoint: 599,
            settings: {
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
.main-container {
  width: 100%;
  @media screen and (max-width: 599px) {
    overflow-x: hidden !important;
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
}
//form

//..................Upper Left Block.................
//appbar login btn
.btn-appbar-login {
  font-family: "Montserrat" !important;
  font-size: 1rem !important;
  font-weight: bold !important;
  text-transform: capitalize !important;
  span {
    text-transform: lowercase !important;
  }
  @media screen and (min-width: 1600px) {
    margin-right: 100px;
  }
}

.container-resume {
  margin-top: -80px;
}

.card-resume {
  margin-top: 90px;
  z-index: 1;
  @media screen and (min-width: 1600px) {
    margin-top: 121px;
  }
}
//resume title
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
  @media screen and (max-width: 959px) {
    font-size: 4rem;
    line-height: 4.375rem;
  }
  @media screen and (max-width: 599px) {
    font-size: 2.625rem;
    line-height: 2.813rem;
    margin-bottom: 20px;
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
    margin-top: 20px;
    width: 9.5rem !important;
    height: 3.048rem !important;
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
}
//Download text
.download-text {
  font-family: "Open Sans" !important;
  font-size: 1.25rem;
  color: #313131;
  @media screen and (max-width: 1440px) {
    font-size: 1rem;
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
    padding-left: 0px !important;
    padding-right: 0px !important;
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
    margin-top: 15px;
    margin-bottom: 20px;
  }

  @media screen and (max-width: 599px) {
    widows: 42px !important;
    height: 42px !important;
  }
}

//upper right block

.signin-email {
  font-family: "Montserrat" !important;
  color: #616161 !important;
  line-height: 1.25rem;
  font-size: 1rem !important;
  font-weight: 500;
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
    font-size: 1.125rem;
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
}

// build resume section
.build-resume-container {
  margin-top: 130px;
  @media screen and (max-width: 1440px) {
    margin-top: 80px;
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
}

.card-gallery {
  z-index: 2;
  img {
    border-radius: 10px !important;
  }
  @media screen and (max-width: 959px) {
    padding: 0;
    img {
      width: 100%;
    }
  }
}
// build resume section

//integration section
.container-integration {
  @media screen and (max-width: 1440px) {
    margin-top: 15px;
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
}
.integrationImg {
  height: 226px;
  width: auto;
  @media screen and (min-width: 1600px) {
    height: 300px;
  }
  @media screen and (max-width: 959px) {
    height: auto;
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
}
.logo-footer {
  width: 201px;
  height: auto;

  @media screen and (max-width: 959px) {
    width: 223px;
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

  // @media screen and (min-width: 1300px) and (max-width: 1659px) {
  //   top: -16%;
  //   left: -27%;
  //   img {
  //     width: 76%;
  //   }
  // }

  // @media screen and (min-width: 1700px) and (max-width: 1920px) {
  //   top: -18%;
  //   left: -11%;
  //   img {
  //     width: 100%;
  //   }
  // }

  // @media screen and (min-width: 1025px) and (max-width: 1280px) {
  //   width: 1420px;
  //   top: -44px;
  //   left: -72px;
  //   img {
  //     width: 90%;
  //   }
  // }
  // @media screen and (min-width: 960px) and (max-width: 1024px) {
  //   top: -40px;
  //   left: -84px;
  //   img {
  //     width: 52%;
  //   }
  // }
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
}

// backgrounds
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
  min-height: 3.75rem !important;
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
    min-height: 2.812rem !important;
  }
}
/* tablet screen */
@media screen and (max-width: 959px) {
  #welcomeView2 .v-text-field .v-input__control .v-input__slot {
    min-height: 4.688rem !important;
  }
}
/* tablet screen */
/* mobile screen */
@media screen and (max-width: 959px) {
  #welcomeView2 .v-text-field .v-input__control .v-input__slot {
    min-height: 3.75rem !important;
  }
}
/* mobile screen */
</style>
