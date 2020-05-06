<template>
  <v-app style="width:100%; background-color: #f8f8f8;">
    <!-- main container -->
    <v-container style="width:100%; ">
      <v-app-bar color="transparent" flat tile height="100">
        <img
          class="logo mx-auto"
          src="/images/welcome_landing_page/logo/civie_logo-blue.png"
          alt="logo"
        />
        <v-spacer></v-spacer>
        <v-btn text color="#0046FE" class="btn-appbar-login">
          Log
          <span>&nbsp;in</span>
        </v-btn>
      </v-app-bar>
      <!-- 1st inner container -->
      <v-container style="width:100%" class="container-resume">
        <v-row justify="center" align="center" class="resume-row">
          <v-col md="6" sm="12" cols="12">
            <v-card color="transparent" flat tile class="card-resume">
              <div class="top-layer-background">
                <img
                  src="/images/welcome_landing_page/imgs/background-images/top-background-img.png"
                />
              </div>
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

            <v-card color="transparent" flat tile>
              <div class="top-make-resume">
                <img
                  src="/images/welcome_landing_page/imgs/background-images/make-your-resume-now.png"
                  alt
                />
              </div>
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
                    <v-icon color="#1DBF73" v-show="userFound == true">mdi-check-circle</v-icon>
                    <v-icon color="#E91E63" v-show="userFound == false">mdi-close-circle</v-icon>
                  </template>
                </v-text-field>
              </v-card-subtitle>
            </v-card>

            <!-- play store ios buttons -->
            <v-card color="transparent" tile flat class="card-download">
              <v-card-text>
                <v-row align="center">
                  <v-col xl="5" cols="6">
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
            <v-card color="#F8F8F8" elevation="12" class="card-login-form pa-5" align="center">
              <v-card-subtitle class="login-title">Create new account</v-card-subtitle>
              <v-card-subtitle>
                <v-btn
                  class="social-icon mx-2"
                  color="#ffffff"
                  v-for="icon in socialMediaIcons"
                  :key="icon.title"
                >
                  <img :src="getSocialIcon(icon.title)" alt />
                </v-btn>
              </v-card-subtitle>
              <v-card-subtitle class="signin-email mt-n3">or Sign Up with Email</v-card-subtitle>
              <!-- Login Form -->
              <v-card-subtitle>
                <v-form ref="form" v-model="valid" :lazy-validation="lazy">
                  <v-text-field
                    type="text"
                    outlined
                    background-color="#ffffff"
                    placeholder="Name"
                    :rules="nameRules"
                  ></v-text-field>
                  <v-text-field
                    type="email"
                    outlined
                    background-color="#ffffff"
                    placeholder="Email Address"
                    :rules="emailRules"
                  ></v-text-field>
                  <v-text-field
                    type="password"
                    outlined
                    placeholder="Password"
                    background-color="#ffffff"
                    v-model="password"
                    :rules="passwordRules"
                  ></v-text-field>

                  <v-text-field
                    type="password"
                    placeholder="Confirm Password"
                    outlined
                    background-color="#ffffff"
                    v-model="confirmPassword"
                    :rules="confirmPasswordRules"
                  ></v-text-field>

                  <v-checkbox dense v-model="agreeCheck" :rules="agreeCheckRules" class>
                    <template slot="label">
                      <div class="agree-text">
                        I accept your
                        <span>Terms of Use</span> &
                        <span>Privacy Policy.</span>
                      </div>
                    </template>
                  </v-checkbox>

                  <v-btn color="#0046FE" class="btn-signup" @click="validate">
                    <span>Sign Up</span>
                  </v-btn>
                </v-form>
              </v-card-subtitle>
              <!-- Login Form -->
              <v-card-subtitle class="account-exists">
                Already have account?
                <a href="#">Login</a>
              </v-card-subtitle>
            </v-card>
          </v-col>
          <v-col md="1"></v-col>
        </v-row>
      </v-container>
      <!-- 1st inner container ends here -->

      <!-- 2nd inner container starts here -->
      <v-container style="width:100%" class="build-resume-container">
        <v-row align="center" justify="center">
          <v-col cols="10" align="center">
            <!-- 1st card -->
            <v-card flat tile color="transparent">
              <div class="middle-layer-background1">
                <img src="/images/welcome_landing_page/imgs/background-images/middle-layer1.svg" />
              </div>

              <v-card-subtitle class="build-resume-title">
                Build a resume that you
                <br />can be proud of
              </v-card-subtitle>
              <v-card-subtitle
                class="build-resume-subtitle mt-n5 mb-5"
              >100+ Integrations. Ensure your clients can easily contract, hire and pay you.</v-card-subtitle>
              <div class="middle-layer-background2">
                <img src="/images/welcome_landing_page/imgs/background-images/middle-layer2.svg" />
              </div>
            </v-card>
            <!-- 1st card -->
            <!-- 2nd card -->
            <v-card class="card-video pa-8" color="transparent" flat tile>
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
          <v-col cols="12">
            <v-card flat tile color="transparent">
              <v-card-title class="build-resume-title">
                40+ Beautiful Themes
                <br />to choose from
              </v-card-title>
              <v-card-subtitle
                class="build-resume-subtitle build-resume-width mt-1"
              >Add your data and then apply any theme tj make your resume visually amazing. Ensure that you stand out and make a great first impression with any hiring manager.</v-card-subtitle>
            </v-card>

            <v-card tile flat color="transparent">
              <v-row>
                <template v-for="n in 6">
                  <v-col md="4" :key="n">
                    <v-card flat tile color="transparent" class="card-gallery">
                      <img :src="getGalleryImages(n)" alt="gallery" />
                    </v-card>
                  </v-col>
                </template>
              </v-row>
              <div class="middle-layer-background3">
                <img src="/images/welcome_landing_page/imgs/background-images/middle-layer3.png" />
              </div>
            </v-card>
          </v-col>
        </v-row>
      </v-container>
      <!-- 3rd inner container starts here -->
      <!-- 3rd inner container -->
      <v-container style="width:100%;" class="mt-md-10 mt-sm-0 mt-0">
        <v-row align="center" justify="center">
          <v-col cols="12" align="center">
            <v-card flat tile color="transparent">
              <div class="middle-layer-background4">
                <img src="/images/welcome_landing_page/imgs/background-images/middle-layer4.svg" />
              </div>
              <v-card-subtitle class="build-resume-title">Integrations</v-card-subtitle>
              <v-card-subtitle
                class="build-resume-subtitle mt-n8 mb-3"
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
      <div class="middle-layer-background5">
        <img src="/images/welcome_landing_page/imgs/background-images/middle-layer5.svg" />
      </div>
    </v-container>
    <!-- main container -->
    <!-- Footer -->
    <v-footer color="#0F4CEE">
      <v-container>
        <v-row justify="center" align="center" class="justify-space-around">
          <v-col md="2" cols="6">
            <v-card flat color="transparent" tile>
              <img class="logo-footer" src="/images/welcome_landing_page/logo/civie_logo-01.png" />
            </v-card>
          </v-col>
          <v-col md="6" cols="6" align="right">
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

          <v-col md="4" cols="12" align="right">
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
      username: "civ.ie/",
      userFound: null,
      valid: false,
      lazy: false,
      name: "",
      nameRules: [
        v => !!v || "Name is required",
        v => (v && v.length >= 3) || "Name must be less than 3 characters"
      ],
      email: "",
      emailRules: [
        v => !!v || "E-mail is required",
        v => /.+@.+\..+/.test(v) || "E-mail must be valid"
      ],
      password: "",
      passwordRules: [
        v => !!v || "Password is required",
        v => (v && v.length >= 6) || "Password must be less than 6 characters"
      ],
      confirmPassword: "",
      confirmPasswordRules: [
        v => !!v || "Confirm password is required",
        v => (v && v == this.password) || "Password must match"
      ],
      agreeCheck: false,
      agreeCheckRules: [v => (v && v == false) || ""],

      socialMediaIcons: [
        { id: 1, title: "instagram" },
        { id: 2, title: "linkedin" },
        { id: 3, title: "google" },
        { id: 4, title: "facebook" },
        { id: 5, title: "github" }
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
      slickOptions: {
        centerMode: false,
        infinite: true,
        dots: true,
        arrows: false,
        slidesToShow: 3,
        slidesToScroll: 1,
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
@font-face {
  font-family: "Segoe UI Bold";
  font-style: normal;
  font-weight: normal;
  src: local("Segoe UI Bold"),
    url("/fonts/segoe/Segoe UI Bold.woff") format("woff");
}

//logo
.logo {
  width: 163px;
  height: 69px;
}

//..................Upper Left Block.................
//appbar login btn
.btn-appbar-login {
  font-family: "Montserrat" !important;
  font-size: 16px !important;
  font-weight: bold !important;
  text-transform: capitalize !important;
  span {
    text-transform: lowercase !important;
  }
}

.container-resume {
  margin-top: -50px;
}

.card-resume {
  margin-top: 150px;
}
//resume title
.resume-title {
  font-family: "Montserrat" !important;
  color: #0046fe !important;
  font-weight: bold;
  font-size: 3.72vw;
  line-height: 4.13vw;
  margin-bottom: 10px;

  // @media screen and (min-width: 960px) and (max-width: 1024px) {
  //   font-size: 40px;
  //   line-height: 40px;
  // }
}

//resume subtitle
.resume-subtitle {
  margin-top: 2vh;
  font-family: "Open Sans" !important;
  font-size: 1.4vw !important;
  line-height: 1.85vw;
  color: #828282 !important;
  @media screen and (max-width: 1440px) {
    font-size: 17px !important;
  }
  // @media screen and (min-width: 1681px) {
  //   font-size: 24px !important;
  // }
  // @media screen and (min-width: 960px) and (max-width: 1024px) {
  //   font-size: 12px !important;
  //   line-height: 30px;
  // }
}

.btn-get-started {
  margin-top: 2.35vh;
  font-family: "Montserrat" !important;
  font-weight: bold;
  line-height: 10px;
  box-shadow: -6px -6px 16px #ffffff, 6px 6px 16px rgba(221, 219, 216, 0.4),
    4px 4px 50px rgba(233, 30, 99, 0.2) !important;
  border-radius: 10px !important;
  width: 9.4vw;
  height: 3vw !important;
  font-size: 0.74vw !important;
}
//reserve title
.reserve-title {
  margin-top: 3.52vh;
  font-family: "Open Sans" !important;
  font-weight: bold;
  font-size: 1.27vw !important;
  line-height: 1.9vw;
  color: #313131 !important;
  margin-bottom: 20px;
  @media screen and (max-width: 1280px) {
    margin-top: 4.52vh;
  }
}

//card download
.card-download {
  @media screen and (min-width: 1720px) {
    margin-top: -35px;
  }
  @media screen and (max-width: 1440px) {
    margin-top: -14px;
  }
}
//Download text
.download-text {
  font-family: "Open Sans" !important;
  font-size: 1.05vw;
  color: #313131;
}
.app-store-logo {
  margin-left: -20px;
  width: 170px;
  height: auto;
  max-width: 127% !important;
}
// .... upper left block..............

//upper right block
.card-login-form {
  border-radius: 15px !important;
  padding-left: 2.01vw !important;
  padding-right: 2.01vw !important;
}

.login-title {
  font-family: "Montserrat" !important;
  color: #0046fe !important;
  font-size: 1.27vw;
}
.social-icon {
  border-radius: 10px !important;
  height: 39px !important;
  width: 39px !important;
  min-width: 39px !important;
  box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.08) !important;
  margin-top: 0.5vw;
  margin-bottom: 0.8vw;
  img {
    width: 14px;
    height: auto;
  }
  @media screen and (min-width: 960px) and (max-width: 1024px) {
    margin-left: 2px !important;
  }
}
//upper right block

.signin-email {
  font-family: "Montserrat" !important;
  color: #616161 !important;
  line-height: 1.02vh;
  font-size: 0.85vw !important;
  font-weight: 500;
}
.label-text {
  font-family: "Montserrat" !important;
  font-size: 12px !important;
  text-align: left !important;
  font-weight: 500;
  color: #616161;
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
}

.btn-signup {
  box-shadow: -6px -6px 16px #ffffff, 6px 6px 16px rgba(221, 219, 216, 0.4),
    4px 4px 20px rgba(25, 0, 180, 0.2) !important;
  border-radius: 10px !important;
  width: 9.43vw !important;
  height: 3vw !important;
  span {
    font-family: "Montserrat" !important;
    font-weight: bold;
    color: #ffffff !important;
    letter-spacing: 0.2em !important;
    font-size: 0.72vw !important;
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
}

// build resume section
.build-resume-container {
  margin-top: 130px;
  @media screen and (max-width: 1440px) {
    margin-top: 80px;
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
  font-size: 2.5vw;
  line-height: 2.84vw;
  color: #0046fe !important;
  @media screen and (max-width: 1440px) {
    font-size: 34px;
  }
}

.build-resume-subtitle {
  font-family: "Open Sans" !important;
  font-size: 0.93vw !important;
  line-height: 36px;
  color: #575757 !important;
  width: 60%;
  @media screen and (max-width: 1440px){
    font-size: 16px !important;
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
  img {
    border-radius: 10px !important;
  }
}
// build resume section

//integration section
.integration-title {
  font-family: "Montserrat" !important;
  font-weight: bold;
  font-size: 22px;
  line-height: 29px;
  color: #575757 !important;
}
.integrationImg {
  height: 226px;
  width: auto;
  @media screen and (max-width: 959px) {
    height: auto;
  }
}
//integration section
//footer
.follow-us-text {
  font-family: "Montserrat" !important;
  font-weight: bold;
  font-size: 20px;
  color: #ffffff !important;
  span {
    font-family: "Open Sans" !important;
    font-size: 14px;
  }
}
.footer-logo {
  width: 201px;
  height: auto;
}
.footer-social-icon {
  img {
    width: 14px;
    height: auto;
  }
}
//footer

// backgrounds
.top-layer-background {
  position: absolute;
  width: 1920px;
  top: -18.5%;
  left: -11%;
  right: 0;
  margin-right: auto;
  margin-left: auto;
  @media screen and (max-width: 1440px) {
    width: 1440px;
    left: -27%;
  }
  @media screen and (max-width: 1366px) {
    width: 1366px;
    left: -20%;
  }
  @media screen and (max-width: 1280px) {
    width: 1280px;
    top: -10%;
    left: -10%;
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
  top: -43%;
  left: -12%;
  img {
    width: 100%;
  }
  @media screen and (max-width: 1440px) {
    width: 1440px;
    top: -27%;
    left: -27%;

    img {
      width: 95%;
    }
  }

  @media screen and (max-width: 1280px) {
    top: -20%;
    left: -12%;
    img {
      width: 88%;
    }
  }
}

.middle-layer-background1 {
  position: absolute;
  width: 1920px;
  top: -83%;
  left: -18%;
  right: 0;
  margin-left: auto;
  margin-right: auto;
  @media screen and (max-width: 1440px) {
    width: 1440px;
    left: -28%;
    top: -80%;
  }
  @media screen and (max-width: 1280px) {
    width: 1280px;
    left: -18%;
    top: -80%;
  }
}

.middle-layer-background2 {
  position: absolute;
  float: left;
  width: 1920px;
  top: 260%;
  left: -17.5%;
  right: 0;
  margin-left: auto;
  margin-right: auto;

  @media screen and (max-width: 1440px) {
    width: 1440px;
    top: 182%;
    left: -25.5%;
  }

  @media screen and (max-width: 1280px) {
    width: 1280px;
    top: 216%;
    left: -17.5%;
  }
}

.middle-layer-background3 {
  position: absolute;
  width: 1920px;
  top: 5%;
  left: -5.5%;
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
  left: -5%;
  right: 0;
  margin-left: auto;
  margin-right: auto;
  z-index: 0;
  @media screen and (max-width: 1440px) {
    width: 1440px;
    top: 3%;
    left: -13%;
  }
  @media screen and (max-width: 1280px) {
    width: 1280px;
    left: -6.5%;
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
  @media screen and (max-width: 1280px) {
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
  min-height: 3.1vw !important;
}

@media screen and (min-width: 1700px) {
  #welcomeView2 .v-text-field .v-input__control .v-input__slot {
    max-width: 700px !important;
  }
}
</style>
