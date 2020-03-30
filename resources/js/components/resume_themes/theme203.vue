<template>
  <v-app style="width:100%;">
    <div class="triangle-top-left"></div>
    <div class="verical-sidebar"></div>
    <v-container ma-0 pa-0 fluid style="max-width:100% !important;">
      <!-- Header Row -->
      <v-row no-gutters>
        <v-col cols="12">
          <!-- Main header card -->
          <v-card flat color="transparent">
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
                          <v-card flat class="text-center" color="tranparent">
                            <v-card-title class="hire-me-title">Hourly rate</v-card-title>
                            <v-card-subtitle class="hire-me-subtitle">$25 USD</v-card-subtitle>
                          </v-card>
                        </v-col>
                        <div style="height:41px; border:1px solid #D7D7D7;"></div>
                        <v-col cols="4" class="d-flex">
                          <v-card flat class="text-center" color="transparent">
                            <v-card-title class="hire-me-title">Available for</v-card-title>
                            <v-card-subtitle class="hire-me-subtitle">8 Hours</v-card-subtitle>
                          </v-card>
                        </v-col>

                        <v-col cols="3" class="d-flex">
                          <v-card flat color="transparent">
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
        <!-- main Navigation tab -->
        <v-row no-gutters align="center" justify="center">
          <v-col cols="12" md="10">
            <v-card flat color="transparent">
              <v-card-text>
                <v-tabs v-model="mainDataTab" color="black" grow hide-slider>
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
        <!-- Main navigation tab -->
      </v-container>
      <!-- ....................Tab Items ..........................-->
      <v-container fluid style="width:100%">
        <v-row class="mx-10">
          <v-col>
            <v-card flat color="transparent" style="z-index:1;">
              <v-tabs-items v-model="mainDataTab" style="background-color:transparent;">
                <!-- ................Portfolio............................... -->
                <v-tab-item>
                  <v-card flat color="transparent">
                    <div class="watermark-text text-center">Portfolio</div>
                    <v-card-text align="center">
                      <v-row align="center" justify="center">
                        <!-- 1st column -->
                        <v-col cols="12" sm="6" md="3">
                          <v-card class="pa-2" flat color="transparent">
                            <div class="my-md-5 image-box-custom">
                              <v-img
                                class="custom-portfolio-img"
                                src="/images/resume_themes/theme203/portfolio/1.png"
                              ></v-img>
                            </div>
                            <div class="my-md-2 image-box-custom">
                              <v-img
                                class="custom-portfolio-img"
                                src="/images/resume_themes/theme203/portfolio/2.png"
                              ></v-img>
                            </div>
                          </v-card>
                        </v-col>
                        <!-- 1st column -->

                        <!-- 2nd column -->
                        <v-col cols="12" sm="6" md="3">
                          <v-card class="pa-2" flat color="transparent">
                            <div class="my-md-5 image-box-custom">
                              <v-img
                                class="custom-portfolio-img"
                                src="/images/resume_themes/theme203/portfolio/3.png"
                              ></v-img>
                            </div>
                            <div class="my-md-2 image-box-custom">
                              <v-img
                                class="custom-portfolio-img"
                                src="/images/resume_themes/theme203/portfolio/4.png"
                              ></v-img>
                            </div>
                          </v-card>
                        </v-col>
                        <!-- 2nd column -->

                        <!-- 3rd column -->
                        <v-col cols="12" sm="6" md="3">
                          <v-card class="pa-2" flat color="transparent">
                            <div class="my-md-5 image-box-custom">
                              <v-img
                                class="custom-portfolio-img"
                                src="/images/resume_themes/theme203/portfolio/5.png"
                              ></v-img>
                            </div>
                            <div class="my-md-2 image-box-custom">
                              <v-img
                                class="custom-portfolio-img"
                                src="/images/resume_themes/theme203/portfolio/6.png"
                              ></v-img>
                            </div>
                          </v-card>
                        </v-col>
                        <!-- 3rd column -->

                        <!-- 4th Column -->
                        <v-col cols="12" sm="6" md="3">
                          <v-card class="pa-2" flat color="transparent">
                            <div class="my-md-5 image-box-custom">
                              <v-img
                                class="custom-portfolio-img"
                                src="/images/resume_themes/theme203/portfolio/7.png"
                              ></v-img>
                            </div>
                            <div class="my-md-2 image-box-custom">
                              <v-img
                                class="custom-portfolio-img"
                                src="/images/resume_themes/theme203/portfolio/8.png"
                              ></v-img>
                            </div>
                          </v-card>
                        </v-col>
                        <!-- 4th Cloumn -->
                      </v-row>
                    </v-card-text>
                  </v-card>
                </v-tab-item>
                <!-- .......................Portfolio.................................. -->

                <!-- ...................Tab Item Work............................. -->
                <v-tab-item>
                  <div class="watermark-text text-center">Work</div>
                  <v-card color="transparent" flat>
                    <v-card-text class>
                      <v-row align="center" justify="center">
                        <v-col cols="12" sm="12" md="6" class="mb-12" v-for="n in 4" :key="n">
                          <v-card flat color="transparent">
                            <v-card-title class="custom-work-title">
                              <img
                                class="mx-5"
                                src="/images/resume_themes/theme203/images/ellipse.png"
                              /> Google Inc. Introduction Google
                            </v-card-title>
                            <v-card-subtitle class="custom-work-subtitle">User interface designer</v-card-subtitle>
                            <v-card-action class="custom-work-duration">2012- Current</v-card-action>
                          </v-card>
                        </v-col>
                      </v-row>
                    </v-card-text>
                  </v-card>
                </v-tab-item>
                <!--................... Tab item Work............................... -->

                <!-- ...................Tab Item Education............................. -->
                <v-tab-item>
                  <div class="watermark-text text-center">Education</div>
                  <v-card color="transparent" flat>
                    <v-card-text class>
                      <v-row align="center" justify="center">
                        <v-col cols="12" sm="12" md="6" class="mb-12" v-for="n in 4" :key="n">
                          <v-card flat color="transparent">
                            <v-card-title class="custom-work-title">
                              <img
                                class="mx-5"
                                src="/images/resume_themes/theme203/images/ellipse.png"
                              /> Google Inc. Introduction Google
                            </v-card-title>
                            <v-card-subtitle class="custom-education-subtitle">
                              <span>M.Sc in HCI,</span>
                              <span class="mr-md-5">Dec 19 - Present</span>
                            </v-card-subtitle>
                            <v-card-text
                              class="custom-education-details"
                            >I'm a paragraph. Click here to add your own text and edit me. It’s easy. Just click “Edit Text” or double click me to add your own content and make changes.</v-card-text>
                          </v-card>
                        </v-col>
                      </v-row>
                    </v-card-text>
                  </v-card>
                </v-tab-item>
                <!--................... Tab item Education............................... -->

                <!-- ...................Tab Item Skills............................. -->
                <v-tab-item>
                  <div class="watermark-text text-center">Skills</div>
                  <v-card color="transparent" flat>
                    <v-card-text class>
                      <v-row align="center" justify="center">
                        <v-col cols="12" sm="12" md="6" class="mb-12" v-for="n in 4" :key="n">
                          <v-card flat color="transparent">
                            <v-card-text>
                              <div class="skill-circle">
                                <span>ph</span>
                              </div>
                            </v-card-text>
                          </v-card>
                        </v-col>
                      </v-row>
                    </v-card-text>
                  </v-card>
                </v-tab-item>
                <!--................... Tab item Skills............................... -->
              </v-tabs-items>
            </v-card>
          </v-col>
        </v-row>
      </v-container>
      <!-- ......................................Tab Items .........................-->

      <!-- tab bar row -->
      <!-- Right Bottom bar -->
      <div class="triangle-bottom-right" style="text-align:right"></div>
      <!-- Right bottom bar -->
    </v-container>
  </v-app>
</template>
<script>
export default {
  name: "ResumeTheme40",
  data() {
    return {
      mainDataTab: null,
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
@import url("https://fonts.googleapis.com/css?family=Rubik&display=swap");
/* prefixed by https://autoprefixer.github.io (PostCSS: v7.0.26, autoprefixer: v9.7.3) */

/* Shapes */
.triangle-top-left {
  left: 0;
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
.custom-tab-text {
  font-size: 1.2rem;
}
// ............................ Main Navigation Tab ...........................//
// ..........................Desktop Portfolio.........................
.custom-portfolio-img {
  border-radius: 10px;
}

// .........................Desktop Portfolio...........................

// ................... Work Desktop......................................
.custom-work-title {
  font-size: 24px;
  line-height: 2.6875rem;
  img {
    width: 20px !important;
  }
}
.custom-work-subtitle {
  font-size: 12px;
  color: #000000 !important;
  text-align: left;
  margin-left: 62px;
  text-transform: capitalize;
}
.custom-work-duration {
  font-size: 12px;
  color: #000000 !important;
  text-align: left !important;
  margin-left: 80px;
}
//...................... Work Desktop.....................................

// ................ Education Desktop............................
.custom-education-subtitle {
  font-size: 0.875rem;
  color: #fbd76d !important;
  line-height: 1.4375rem;
  font-weight: bold;
  margin-left: 62px;
}
.custom-education-details {
  font-size: 0.75rem;
  line-height: 1.4375rem;
  font-weight: 300;
  color: #2d2d2d !important;
  margin-left: 62px;
}
// ................ Education Desktop............................
// ................Skills Desktop..................................

.skill-circle {
  position: absolute;
  width: 4.5625rem;
  height: 4.5rem;
  border-radius: 50%;
  background: #000000;
  border: 5px solid #e0bb4c;
  box-sizing: border-box;
  text-align: center;
  justify-content: center;
  display: flex;
  margin:0;
  span {
    font-family: "Rubik", sans-serif;
    font-size: 2.25rem;
    color: #ffffff;
  }
}
//..................Skills Desktop.....................................
// Watermark text
.watermark-text {
  position: absolute;
  font-size: 20vw;
  width: 100%;
  opacity: 0.1;
}
</style>