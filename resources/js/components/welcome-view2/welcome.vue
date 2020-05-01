<template>
  <v-app style="width:100%; background-color: #f8f8f8;">
    <!-- main container -->
    <v-container style="width:100%; ">
      <v-app-bar color="transparent" flat tile height="100">
        <img
          class="logo mx-auto"
          src="/images/welcome_landing_page/logo/civie_logo-01.png"
          alt="logo"
        />
        <v-spacer></v-spacer>
        <v-btn text color="#0046FE" class="btn-appbar-login">
          Log
          <span>&nbsp;in</span>
        </v-btn>
      </v-app-bar>
      <v-container style="width:100%">
        <v-row justify="center" align="center">
          <v-col md="6">
            <v-card color="transparent" flat tile>
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
          <v-col md="6">
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
              <!-- Login Form -->
              <v-card-subtitle>
                <v-form>
                  <v-text-field
                    dense
                    outlined
                    background-color="#ffffff"
                    label="Name"
                  >
                  </v-text-field>
                </v-form>
              </v-card-subtitle>
              <!-- Login Form -->
            </v-card>
          </v-col>
        </v-row>
      </v-container>
    </v-container>
    <!-- main container -->
  </v-app>
</template>
<script>
export default {
  data() {
    return {
      socialMediaIcons: [
        { id: 1, title: "instagram" },
        { id: 2, title: "linkedin" },
        { id: 3, title: "google" },
        { id: 4, title: "facebook" },
        { id: 5, title: "github" }
      ]
    };
  },
  methods: {
    getSocialIcon(title) {
      return `/images/welcome_landing_page/icons/social_icons/${title}.png`;
    }
  }
};
</script>
<style scoped lang="scss">
@import url("https://fonts.googleapis.com/css?family=Montserrat");
@import url("https://fonts.googleapis.com/css?family=Open+Sans");
$text-field-border-radius: 10px;
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

//resume title
.resume-title {
  font-family: "Montserrat" sans-serif !important;
  color: #0046fe !important;
  font-weight: bold;
  font-size: 72px;
  line-height: 80px;
}

//resume subtitle
.resume-subtitle {
  margin-top: 30px;
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
