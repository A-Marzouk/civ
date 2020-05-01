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
          </v-col>
          <v-col md="6">Column2</v-col>
        </v-row>
      </v-container>
    </v-container>
    <!-- main container -->
  </v-app>
</template>

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
}
//reserve input
.reserve-input {
  img {
    width: auto;
    height: 20px;
  }
}

// .... upper left block..............
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
