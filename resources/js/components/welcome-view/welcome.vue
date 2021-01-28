<template>
  <v-app style="width:100%; background-color: #ffffff;" class="app-container">
    <!-- main container -->
    <v-container class="main-container">
      <!-- 1st inner container -->

      <!-- 1st inner container -->
      <v-container style="width:100%;">
        <v-row align="center" justify="center">
          <v-col md="10" cols="12">
            <v-card color="transparent" flat tile>
              <v-row align="center" justify="center">
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
                          <a class="inner-link" href="/register" v-show="is_username_valid">Sign up</a>
                        </template>

                        <template slot="append">
                          <img src="/icons/check-circle.svg" v-show="is_username_valid" alt="check icon">
                          <img src="/icons/close-circle.svg" v-show="!is_username_valid && is_username_valid !== null" alt="close icon">
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
                    <img
                            src="/images/welcome_landing_page/imgs/edit-cv.webp"
                            style="box-shadow: 0px 4px 40px rgba(0, 28, 226, 0.1); width: 100%;"
                    />
                  </v-card>
                </v-col>
              </v-row>
            </v-card>
          </v-col>
        </v-row>
      </v-container>
      <!-- 1st inner container ends here -->
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
              <v-card-subtitle class="build-resume-subtitle mt-md-n5 mb-md-5 mb-sm-12 mb-4 mt-n4">
                With
                <a href="https://civ.ie">civ.ie</a> you can create design-perfect, beautiful , interactive Resume's .. in less than 5 minutes.
                <br />Your Digital Resume
                <span style="color: #0046fe;">www.civ.ie/yourname</span> can be easily shared and updated.
              </v-card-subtitle>
            </v-card>
            <!-- 1st card -->
            <!-- 2nd card -->
            <v-card
              class="card-video pa-md-8 pa-sm-0 mt-md-0 mt-sm-5"
              color="transparent"
              flat
              tile
              align="center"
            >
              <video id="introVideo" width="95%" height="100%" controls v-show="videoOn">
                <source src="/videos/civ_intro_video.mp4" type="video/mp4" />Your browser does not support the video tag.
              </video>

              <v-img
                v-show="!videoOn"
                src="/images/welcome_landing_page/icons/poster-video.webp"
                class="align-center hidden-sm-and-down"
              >
                <v-btn fab color="#F8F8F8" class="btn-play" :ripple="false" x-large>
                  <img src="/images/welcome_landing_page/icons/play.webp" @click="playIntroVideo" />
                </v-btn>
              </v-img>
              <v-img
                v-show="!videoOn"
                src="/images/welcome_landing_page/icons/poster-video-tablet.webp"
                class="align-center hidden-md-and-up"
              >
                <v-btn fab color="#F8F8F8" class="btn-play" :ripple="false" x-large>
                  <img src="/images/welcome_landing_page/icons/play.webp" @click="playIntroVideo" />
                </v-btn>
              </v-img>
            </v-card>

            <!-- 2nd card -->
          </v-col>
        </v-row>
      </v-container>
      <!-- 2nd inner container ends here -->

    </v-container>
    <!-- main container -->
    <!-- Footer -->
    <home-footer :windowWidth="windowWidth"></home-footer>
    <!-- footer -->
  </v-app>
</template>

<script>
import HomeFooter from "../auth/partials/HomeFooter";
export default {
  components: {
    "home-footer": HomeFooter,
  },
  data() {
    return {
      videoOn: false,
      windowWidth: window.innerWidth,
      username: "",
      valid: false,
      validUserName: "",
      is_username_valid: null,
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
        .then((response) => {
          this.validUserName = this.username;
          this.is_username_valid = true;
        })
        .catch((response) => {
          this.validUserName = "";
          this.is_username_valid = false;
        });
    },
    playIntroVideo() {
      this.videoOn = true;
      document.getElementById("introVideo").play();
    },
  },
};
</script>


