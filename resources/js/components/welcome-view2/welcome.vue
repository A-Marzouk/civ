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
        <!-- watermark text -->
        <div class="float-github">
          <img src="/images/welcome_landing_page/icons/social_icons/github.png" alt="github" />
        </div>
        <div class="make-your-resume">ake you</div>

        <!-- watermark text -->

        <v-row justify="center" align="center" class="resume-row">
          <v-col md="6" sm="12" cols="12">
            <v-card color="transparent" flat tile class="card-resume">
              <div class="float-upwork">
                <img src="/images/welcome_landing_page/icons/upwork.png" alt="upwork" />
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

            <v-card color="transparent" flat tile class="mt-5">
              <v-card-title class="reserve-title">Reserve your own online webpage</v-card-title>
              <v-card-subtitle class="reserve-input">
                <v-text-field outlined placeholder="www.civ.ie/yourname" background-color="#ffffff">
                  <template slot="append">
                    <img src="/images/welcome_landing_page/icons/input-success.png" />
                  </template>
                </v-text-field>
              </v-card-subtitle>
            </v-card>

            <!-- play store ios buttons -->
            <v-card color="transparent" tile flat>
              <v-card-text>
                <v-row align="center">
                  <v-col cols="6">
                    <div class="download-text">Download for ios and android:</div>
                  </v-col>
                  <v-col cols="3">
                    <a href="#">
                      <img
                        class="app-store-logo"
                        src="/images/welcome_landing_page/icons/app-store.png"
                        alt
                      />
                    </a>
                  </v-col>
                  <v-col cols="3">
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
          <v-col md="6" sm="12" cols="12">
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
              <v-card-subtitle class="singin-email">or Sign Up with Email</v-card-subtitle>
              <!-- Login Form -->
              <v-card-subtitle>
                <v-form>
                  <v-text-field outlined background-color="#ffffff" label="Name"></v-text-field>
                  <v-text-field outlined background-color="#ffffff" label="Email Adddress"></v-text-field>
                  <v-text-field
                    type="password"
                    outlined
                    background-color="#ffffff"
                    label="Password"
                  ></v-text-field>

                  <v-text-field
                    type="password"
                    outlined
                    background-color="#ffffff"
                    label="Confirm Password"
                  ></v-text-field>

                  <v-checkbox dense>
                    <template slot="label">
                      <div class="agree-text">
                        I accept your
                        <span>Terms of Use</span> &
                        <span>Privacy Policy.</span>
                      </div>
                    </template>
                  </v-checkbox>

                  <v-btn color="#0046FE" class="btn-signup">
                    <span>Sign Up</span>
                  </v-btn>
                </v-form>
              </v-card-subtitle>
              <!-- Login Form -->
              <v-card-subtitle class="account-exists">
                Already have account?
                <span>Login</span>
              </v-card-subtitle>
            </v-card>
          </v-col>
        </v-row>
      </v-container>
      <!-- 1st inner container ends here -->

      <!-- 2nd inner container starts here -->
      <v-container style="width:100%">
        <v-row align="center" justify="center">
          <v-col cols="12" align="center">
            <!-- 1st card -->
            <v-card flat tile color="transparent">
              <v-card-subtitle class="build-resume-title">
                Build a resume that you
                <br />can be proud of
              </v-card-subtitle>
              <v-card-subtitle
                class="build-resume-subtitle"
              >100+ Integrations. Ensure your clients can easily contract, hire and pay you.</v-card-subtitle>
            </v-card>
            <!-- 1st card -->
            <!-- 2nd card -->
            <v-card class="card-video" color="transparent" flat tile>
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
      <v-container style="width:100%">
        <v-row align="center" justify="center">
          <v-col cols="12">
            <v-card flat tile color="transparent">
              <v-card-title class="build-resume-title">
                40+ Beautiful Themes
                <br />to choose from
              </v-card-title>
              <v-card-subtitle
                class="build-resume-subtitle mt-1"
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
            </v-card>
          </v-col>
        </v-row>
      </v-container>
      <!-- 3rd inner container starts here -->
      <!-- 3rd inner container -->
      <v-container style="width:100%">
        <v-row align="center" justify="center">
          <v-col cols="12" align="center">
            <v-card flat tile color="transparent">
              <v-card-subtitle class="build-resume-title">Integrations</v-card-subtitle>
              <v-card-subtitle
                class="build-resume-subtitle mt-n8"
              >Link social networks, online profiles, easly accepton line payments</v-card-subtitle>
              <v-card-text>
                <slick class="integrationSlides" ref="slick" :options="slickOptions">
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
  width: 169px;
  height: auto;
}

//..................Upper Left Block.................
//appbar login btn
.btn-appbar-login {
  font-family: "Montserrat" sans-serif !important;
  font-size: 1.125rem !important;
  font-weight: bold !important;
  text-transform: capitalize !important;
  span {
    text-transform: lowercase !important;
  }
}

.container-resume {
  margin-top: -80px;
}

.card-resume {
  margin-top: 152px;
}
//resume title
.resume-title {
  font-family: "Montserrat" sans-serif !important;
  color: #0046fe !important;
  font-weight: bold;
  font-size: 60px;
  line-height: 80px;
}

//resume subtitle
.resume-subtitle {
  margin-top: 10px;
  font-family: "Open Sans" sans-serif !important;
  font-size: 18px !important;
  line-height: 36px;
  color: #828282 !important;
}

.btn-get-started {
  font-family: "Montserrat" sans-serif !important;
  font-weight: bold;
  line-height: 10px;
  box-shadow: -6px -6px 16px #ffffff, 6px 6px 16px rgba(221, 219, 216, 0.4),
    4px 4px 50px rgba(233, 30, 99, 0.2) !important;
  border-radius: 10px !important;
}
//reserve title
.reserve-title {
  font-family: "Open Sans" sans-serif !important;
  font-weight: bold;
  font-size: 18px !important;
  line-height: 36px;
  color: #313131 !important;
  margin-bottom: 20px;
}
//reserve input
.reserve-input {
  img {
    width: auto;
    height: 20px;
  }
}
//Download text
.download-text {
  font-family: "Open Sans" sans-serif !important;
  font-size: 16px;
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
}

.login-title {
  font-family: "Montserrat" sans-serif !important;
  color: #0046fe !important;
  font-size: 18px;
}
.social-icon {
  border-radius: 10px !important;
  height: 39px !important;
  width: 39px !important;
  min-width: 39px !important;
  box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.08) !important;
  img {
    width: 14px;
    height: auto;
  }
}
//upper right block

.signin-email {
  font-family: "Montserrat" sans-serif !important;
  color: #616161 !important;
  line-height: 20px;
  font-size: 16px;
  font-weight: 500;
}

.agree-text {
  font-family: "Montserrat" sans-serif !important;
  color: #838ca3 !important;
  font-size: 14px;
  font-weight: 500;
  span {
    color: #0046fe !important;
  }
}

.btn-signup {
  box-shadow: -6px -6px 16px #ffffff, 6px 6px 16px rgba(221, 219, 216, 0.4),
    4px 4px 20px rgba(25, 0, 180, 0.2) !important;
  border-radius: 10px !important;
  width: 181px !important;
  height: 58px !important;
  span {
    font-family: "Montserrat" sans-serif !important;
    color: #ffffff !important;
    letter-spacing: 0.2em !important;
    font-size: 14px !important;
  }
}

.account-exists {
  font-family: "Montserrat" sans-serif !important;
  font-style: normal;
  font-weight: normal;
  font-size: 16px;
  line-height: 22px;
  color: #000000;
  span {
    color: #0046fe !important;
  }
}

// build resume section
.build-resume-title {
  font-family: "Montserrat" sans-serif !important;
  font-weight: bold;
  font-size: 48px;
  line-height: 55px;
  color: #0046fe !important;
}

.build-resume-subtitle {
  font-family: "Open Sans" sans-serif !important;
  font-size: 18px !important;
  line-height: 36px;
  color: #575757 !important;
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
  font-family: "Montserrat" sans-serif !important;
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
  font-family: "Montserrat" sans-serif !important;
  font-weight: bold;
  font-size: 24px;
  color: #ffffff !important;
  span {
    font-family: "Open Sans" sans-serif !important;
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

//...............Watermark text......................... 693384524//
.make-your-resume {
  font-family: "Segoe UI Bold";
  position: absolute;
  float: left;
  top: 226px;
  left: -10px;
  font-size: 260px;
  line-height: 80px;
  color: rgba(236, 236, 236, 0.2);
}

.make-your-resume::selection {
  color: rgba(236, 236, 236, 0.2);
}

.float-github {
  position: absolute;
  top: 200px;
  left: 15px;
  transform: rotate(5deg);
  img {
    width: 40px;
    height: auto;
  }
}
.float-upwork {
  position: absolute;
  top: 77px;
  left: 449px;
  transform: rotate(-8deg);
  img {
    width: 60px;
    height: auto;
  }
}
//...............Watermark Text.........................//
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
</style>
