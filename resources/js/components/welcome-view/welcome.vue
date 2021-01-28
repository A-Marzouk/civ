<template>
  <div style="width:100%; background-color: #ffffff;" class="app-container">
    <div class="main-container">
      <div style="width:100%;">
        <div align="center">
          <div>
            <div>
              <div align="center">
                <div>
                  <div class="mt-n5">
                    <div class="reserve-title" align="center">
                      Reserve your own online webpage
                    </div>
                    <div class="homepage-input">
                      <span class="inner-text">civ.ie/</span>
                      <input
                        type="text"
                        class="input-av"
                        placeholder="john-doe"
                        v-model="username"
                        @keyup="validateUsername"
                      />
                      <a class="inner-link" href="/register" v-show="is_username_valid">Sign up</a>
                      <img src="/icons/check-circle.svg" v-show="is_username_valid" alt="check icon">
                      <img src="/icons/close-circle.svg" v-show="!is_username_valid && is_username_valid !== null" alt="close icon">
                    </div>
                  </div>
                </div>
                <div >
                  <div style="z-index:3;">
                    <img
                            src="/images/welcome_landing_page/imgs/edit-cv.webp"
                            style="box-shadow: 0px 4px 40px rgba(0, 28, 226, 0.1); width: 95%; max-width: 1230px;"
                    />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div style="width:100%" class="build-resume-container">
        <div align="center">
          <div :align="windowWidth>959 ? 'center':'left'">
            <!-- 1st card -->

            <div class="build-resume-text">
              <div class="build-resume-title">
                Build a resume that you
                <br />can be proud of
              </div>
              <div class="build-resume-subtitle">
                With
                <a href="https://civ.ie">civ.ie</a> you can create design-perfect, beautiful , interactive Resume's .. in less than 5 minutes.
                <br />Your Digital Resume
                <span style="color: #0046fe;">www.civ.ie/yourname</span> can be easily shared and updated.
              </div>
            </div>
            <!-- 1st card -->
            <!-- 2nd card -->
            <div class="card-video pa-md-8 pa-sm-0 mt-md-0 mt-sm-5" align="center">
              <video id="introVideo" width="95%" height="100%" controls v-show="videoOn">
                <source src="/videos/civ_intro_video.mp4" type="video/mp4" />Your browser does not support the video tag.
              </video>

              <div v-show="!videoOn" class="video-image-holder">
                <img  src="/images/welcome_landing_page/icons/poster-video.webp" class="align-center"/>

                <a href="javascript:void(0)">
                  <img src="/images/welcome_landing_page/icons/play.webp" @click="playIntroVideo" />
                </a>
              </div>

            </div>

            <!-- 2nd card -->
          </div>
        </div>
      </div>
    </div>
    <home-footer :windowWidth="windowWidth"></home-footer>
  </div>
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


