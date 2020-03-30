<template>
  <v-app style="width:100%;">
    <div class="triangle-top-left"></div>
    <div class="verical-sidebar"></div>
    <v-container ma-0 pa-0 fluid style="max-width:100% !important;">
      <!-- Header Row -->
      <v-row no-gutters>
        <v-col cols="12">
          <!-- Main header card -->
          <v-card flat>
            <!-- Child Row -->
            <v-container fluid ma-0 pa-0 style="max-width:100%">
              <v-row no-gutters align="center" justify="center">
                <!-- 1st column profile pic and icons -->
                <v-col md="5" cols="12" sm="12">
                  <v-card flat color="transparent" style="z-index:2;">
                    <v-card-text>
                      <v-list-item two-line>
                        <v-list-item-avatar size="120">
                          <v-img src="/images/resume_themes/theme203/images/avatar.png"></v-img>
                        </v-list-item-avatar>
                        <v-list-item-content>
                          <v-list-item-title class="profile-title">
                            Carla Pipin Ranga
                            <span class="ml-7">
                              <v-btn fab color="#FCD259" small depressed class="mx-auto btn-email">
                                <v-icon class="icon-email">mdi-email</v-icon>
                              </v-btn>

                              <v-btn
                                fab
                                color="#FCD259"
                                x-small
                                depressed
                                class="mx-auto btn-video-player"
                              >
                                <img
                                  width="14"
                                  src="/images/resume_themes/theme203/icons/video-player.webp"
                                />
                              </v-btn>

                              <v-btn
                                fab
                                color="#FCD259"
                                x-small
                                depressed
                                class="btn-headphone mx-auto"
                              >
                                <img
                                  width="14"
                                  src="/images/resume_themes/theme203/icons/headphones.webp"
                                />
                              </v-btn>
                            </span>
                          </v-list-item-title>
                          <v-list-item-title
                            class="profile-subtitle"
                          >Web Ui/Ux Designer, Graphiс Designer</v-list-item-title>
                        </v-list-item-content>
                      </v-list-item>
                    </v-card-text>
                  </v-card>
                </v-col>
                <!-- 1st column profile pic and icons -->

                <!-- 2nd column social media icons -->
                <v-col md="3" sm="6" cols="12" class="mt-n3 pa-0" align="center">
                  <v-card flat color="tranparent">
                    <v-card-text class>
                      <v-btn fab color="#FCD259" small class="mx-auto social-btn" depressed>
                        <img
                          width="14"
                          src="/images/resume_themes/theme203/social_icons/behance.webp"
                        />
                      </v-btn>
                      <v-btn fab color="#FCD259" small class="mx-auto social-btn" depressed>
                        <img
                          width="14"
                          src="/images/resume_themes/theme203/social_icons/dribbble.webp"
                        />
                      </v-btn>
                      <v-btn fab color="#FCD259" small class="mx-auto social-btn" depressed>
                        <img
                          width="14"
                          src="/images/resume_themes/theme203/social_icons/instagram.webp"
                        />
                      </v-btn>
                      <v-btn fab color="#FCD259" small class="mx-auto social-btn" depressed>
                        <img
                          width="14"
                          src="/images/resume_themes/theme203/social_icons/linikedin.webp"
                        />
                      </v-btn>
                      <v-btn fab color="#FCD259" small class="mx-auto social-btn" depressed>
                        <img
                          width="14"
                          src="/images/resume_themes/theme203/social_icons/google-plus.webp"
                        />
                      </v-btn>
                    </v-card-text>
                  </v-card>
                </v-col>
                <!-- Social media icons -->

                <v-col md="4" sm="8" cols="12">
                  <v-card flat color="transparent" class="ma-0 pa-0">
                    <v-card-text class="ml-md-n5">
                      <v-row no-gutters align="center" justify="center">
                        <v-col cols="4" class="d-flex">
                          <v-card flat class="text-center">
                            <v-card-title class="hire-me-title">Hourly rate</v-card-title>
                            <v-card-subtitle class="hire-me-subtitle">$25 USD</v-card-subtitle>
                          </v-card>
                        </v-col>
                        <div style="height:41px; border:1px solid #D7D7D7;"></div>
                        <v-col cols="4" class="d-flex">
                          <v-card flat class="text-center">
                            <v-card-title class="hire-me-title">Available for</v-card-title>
                            <v-card-subtitle class="hire-me-subtitle">8 Hours</v-card-subtitle>
                          </v-card>
                        </v-col>

                        <v-col cols="3" class="d-flex">
                          <v-card flat>
                            <v-card-text>
                              <v-btn
                                color="#FCD259"
                                class="mx-n6 btn-hire-me"
                                height="45"
                                depressed
                              >Hire Me</v-btn>
                            </v-card-text>
                          </v-card>
                        </v-col>
                      </v-row>
                    </v-card-text>
                  </v-card>
                </v-col>
              </v-row>
            </v-container>
            <!-- Child Row -->
          </v-card>
        </v-col>
        <!-- main header card -->
      </v-row>
      <!-- Header Row -->

      <!-- tab bar row -->
      <v-container>
        <v-row no-gutters align="center" justify="center">
          <v-col cols="12" md="10">
            <v-card flat color="transparent">
              <v-card-text>
                <v-tabs color="black" grow hide-slider>
                  <v-tab
                    v-for="item in mainTabs"
                    :key="item.id"
                    class="text-capitalize custom-tab-text"
                  >{{item.title}}</v-tab>
                </v-tabs>
              </v-card-text>
            </v-card>
          </v-col>
        </v-row>
      </v-container>
      <div class="triangle-bottom-right" style="text-align:right"></div>
      <!-- tab bar row -->
    </v-container>
  </v-app>
</template>
<script>
export default {
  name: "ResumeTheme40",
  data() {
    return {
      mainTabs: [
        {
          id: 1,
          title: "Portfolio"
        },
        {
          id: 2,
          title: "Work"
        },
        {
          id: 3,
          title: "Education"
        },
        {
          id: 4,
          title: "Skills"
        }
      ]
    };
  }
};
</script>

<style scoped lang="scss">
@import url("https://fonts.googleapis.com/css?family=Montserrat&display=swap");
/* prefixed by https://autoprefixer.github.io (PostCSS: v7.0.26, autoprefixer: v9.7.3) */

/* Shapes */
.triangle-top-left {
  left:0;
  top: 0;
  padding: 0;
  margin: 0;
  position: absolute;
  background: #fcd259;
  height: 18.75rem;
  width: 25.3rem;
  -webkit-clip-path: polygon(100% 0, 0% 100%, 0 0);
  clip-path: polygon(100% 0, 0% 100%, 0 0);
  -webkit-box-shadow: 0px 0px 40px rgba(0, 0, 0, 0.1);
  box-shadow: 0px 0px 40px rgba(0, 0, 0, 0.1);
  z-index: 2;
  float: left;
}

.triangle-bottom-right {
  position: fixed;
  right: 0;
  bottom: 0;
  margin: 0;
  padding: 0;
  background: #fcd259;
  height: 15.75rem;
  width: 10rem;
  background-position: right bottom !important;
  -webkit-clip-path: polygon(100% 0, 0% 100%, 100% 100%);
  clip-path: polygon(100% 0, 0% 100%, 100% 100%);
  -webkit-box-shadow: 0px 0px 40px rgba(0, 0, 0, 0.1);
  box-shadow: 0px 0px 40px rgba(0, 0, 0, 0.1);
  float: right;
}

.verical-sidebar {
  position: absolute;
  background: #e6bf4e;
  width: 3vw;
  height: 600vh;
  z-index: 1;
  bottom: 0;
}
/* Shapes */

.profile-title {
  font-family: "Gotham Pro" !important;
  font-size: 1.53rem !important;
}

.profile-subtitle {
  font-family: "Gotham Pro" !important;
  font-size: 0.8rem !important;
  color: #444444 !important;
}
.btn-email {
  width: 2.56rem !important;
  height: 2.56rem !important;
}
.icon-email {
  font-size: 1.25 !important;
}

.btn-video-player {
  width: 1.81rem !important;
  height: 1.81rem !important;
}

.btn-headphone {
  width: 1.87rem !important;
  height: 1.81rem !important;
}

/* Social Btn */
.social-btn {
  width: 2rem !important;
  height: 2rem !important;
}
/* Social Btn */

/* Hire Me card */
.hire-me-title {
  font-family: "Montserrat", sans-serif !important;
  font-size: 0.9rem !important;
  color: #8b8b8b !important;
  text-align: center !important;
}

.hire-me-subtitle {
  font-family: "Montserrat", sans-serif !important;
  font-size: 1rem !important;
  color: #000000 !important;
}

.btn-hire-me {
  width: 7.5rem;
  border-radius: 50px !important;
  font-weight: 100px !important;
}

/* Hire Me Card */

/* Profile */

// ............................ Main Navigation Tab...........................//
.custom-tab-text{
  font-size: 1.2rem;
}
// ............................ Main Navigation Tab ...........................//
</style>