<template>
  <v-app style="width:100%;">
    <div class="triangle-top-left"></div>
    <div class="verical-sidebar"></div>
    <v-container ma-0 pa-0 fluid style="max-width:100% !important;">
      <!-- Header Row -->
      <v-row no-gutters>
        <v-col cols="12">
          <!-- Main header card -->
          <v-card flat color="transparent" tile>
            <!-- Child Row -->
            <v-container fluid ma-0 pa-0 style="max-width:100%">
              <v-row no-gutters align="center" justify="center">
                <!-- 1st column profile pic and icons -->
                <v-col md="8" cols="12" sm="7">
                  <v-card color="transparent" tile flat style="z-index:2;" class="pa-0 ma-0">
                    <v-card-text>
                      <v-list-item two-line>
                        <v-list-item-avatar class="hidden-xs-only custom-avatar">
                          <v-img :src="user.personal_info.profile_pic"></v-img>
                        </v-list-item-avatar>
                        <v-list-item-avatar size="80" class="hidden-sm-and-up mr-2">
                          <v-img :src="user.personal_info.profile_pic"></v-img>
                        </v-list-item-avatar>
                        <v-list-item-content>
                          <v-list-item-title class="profile-title">
                            <v-card class="pa-0" flat color="transparent" tile>
                              {{ user.personal_info.full_name }}
                              <span
                                class="mx-8 hidden-sm-and-down email-icon-block"
                              >
                                <v-btn
                                  fab
                                  color="#FCD259"
                                  small
                                  depressed
                                  class="mx-md-auto mx-sm-2 btn-email"
                                  :href="'mailto:' + user.personal_info.email"
                                >
                                  <v-icon class="icon-email">mdi-email</v-icon>
                                </v-btn>

                                <v-btn
                                  fab
                                  color="#FCD259"
                                  x-small
                                  depressed
                                  class="mx-md-auto mx-sm-2 btn-video-player"
                                >
                                  <img
                                    width="15"
                                    src="/images/resume_themes/theme203/icons/video-player.webp"
                                  />
                                </v-btn>

                                <v-btn
                                  fab
                                  color="#FCD259"
                                  x-small
                                  depressed
                                  class="btn-headphone mx-auto mx-sm-2 mx-md-auto"
                                  align="center"
                                >
                                  <img
                                    width="15"
                                    src="/images/resume_themes/theme203/icons/headphones.webp"
                                  />
                                </v-btn>
                              </span>
                              <span class="social-media-block hidden-sm-and-down">
                                <v-btn
                                  fab
                                  color="#FCD259"
                                  small
                                  class="mx-md-1 mx-sm-2 social-btn"
                                  depressed
                                  v-for="item in socialIcons"
                                  :key="item.id"
                                >
                                  <img width="15" :src="getSocialIcon(item.title)" />
                                </v-btn>
                              </span>
                            </v-card>
                          </v-list-item-title>
                          <v-list-item-title>
                            <v-card flat color="transparent" tile>
                              <span class="profile-subtitle">{{ user.personal_info.designation }}</span>
                            </v-card>
                          </v-list-item-title>
                        </v-list-item-content>
                      </v-list-item>
                    </v-card-text>
                  </v-card>
                </v-col>
                <!-- 1st column profile pic and icons -->

                <!-- 2nd column only for tab and mobile version version -->
                <v-col sm="5" cols="12" class="tablet-audio-video-flex">
                  <v-card
                    flat
                    color="transparent"
                    tile
                    class="mr-sm-5 mt-sm-n5 my-sm-0 my-10 mt-n8 audio-video-card"
                    style="z-index:2"
                  >
                    <v-btn
                      fab
                      color="#FCD259"
                      small
                      depressed
                      class="mx-md-1 mx-sm-2 mx-1 btn-email"
                    >
                      <v-icon class="icon-email">mdi-email</v-icon>
                    </v-btn>

                    <v-btn
                      fab
                      color="#FCD259"
                      x-small
                      depressed
                      class="mx-md-0 mx-sm-2 mx-1 btn-video-player"
                    >
                      <img width="15" src="/images/resume_themes/theme203/icons/video-player.webp" />
                    </v-btn>

                    <v-btn fab color="#FCD259" x-small depressed class="btn-headphone mx-1 mx-sm-2">
                      <img
                        width="15"
                        style="margin-left:1px;"
                        class
                        src="/images/resume_themes/theme203/icons/headphones.webp"
                      />
                    </v-btn>
                  </v-card>
                </v-col>
                <!-- 2nd column only for tab and mobile version version -->

                <!-- 2nd column social media icons -->
                <v-col md="3" sm="12" cols="12" class="mt-n3 pa-0 hidden-md-and-up" align="center">
                  <v-card flat color="tranparent">
                    <v-card-text class>
                      <v-btn
                        fab
                        color="#FCD259"
                        small
                        class="mx-md-1 mx-sm-2 mx-1 social-btn"
                        depressed
                        v-for="item in socialIcons"
                        :key="item.id"
                      >
                        <img width="15" :src="getSocialIcon(item.title)" />
                      </v-btn>
                    </v-card-text>
                  </v-card>
                </v-col>
                <!-- Social media icons -->

                <v-col md="4" sm="8" cols="12">
                  <v-card flat color="transparent" tile class="ma-0 pa-0">
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
                          <v-card flat class="text-center" color="transparent" tile>
                            <v-card-title class="hire-me-title">Available for</v-card-title>
                            <v-card-subtitle class="hire-me-subtitle">8 Hours</v-card-subtitle>
                          </v-card>
                        </v-col>

                        <v-col cols="3" class="d-flex">
                          <v-card flat color="transparent" tile>
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
      <v-container style="width:100%">
        <!-- main Navigation tab -->
        <v-row no-gutters align="center" justify="center">
          <v-col cols="12" md="10">
            <v-card flat color="transparent" tile>
              <v-card-text>
                <v-tabs v-model="mainDataTab" color="black" centered grow show-arrows hide-slider>
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
      <v-container style="width:100%">
        <v-row class="mx-md-10 mx-sm-10 mx-1">
          <v-col cols="12">
            <v-card flat color="transparent" tile style="z-index:1;">
              <v-tabs-items v-model="mainDataTab" style="background-color:transparent;">
                <!-- ................Portfolio............................... -->
                <v-tab-item>
                  <div class="watermark-text text-center">Portfolio</div>
                  <v-card flat color="transparent" tile align="center">
                    <v-row align="center" justify="center">
                      <v-col cols="12">
                        <masonry
                          :cols="{default: 4, 959: 1, 599: 1}"
                          :gutter="{default: '30px', 700: '15px'}"
                        >
                          <v-card
                            v-for="item in portfolioItems"
                            :key="item.id"
                            class="mb-2"
                            align="left"
                            flat
                            color="transparent"
                            tile
                          >
                            <v-img class="custom-portfolio-img" :src="getPortfolioItems(item.id)"></v-img>
                            <v-card-title class="custom-portfolio-title">{{item.title}}</v-card-title>
                            <v-card-subtitle class="custom-portfolio-subtitle">{{item.subtitle}}</v-card-subtitle>
                          </v-card>
                        </masonry>
                      </v-col>
                    </v-row>
                  </v-card>
                </v-tab-item>
                <!-- .......................Portfolio.................................. -->

                <!-- ...................Tab Item Work............................. -->
                <v-tab-item>
                  <div class="watermark-text text-center">Work</div>
                  <v-card color="transparent" tile flat>
                    <v-card-text class>
                      <v-container fluid ma-0 pa-0 style="width:100%">
                        <v-row align="center" justify="center">
                          <v-col cols="12" sm="12" md="6" class="mb-12" v-for="n in 4" :key="n">
                            <v-card flat color="transparent" tile>
                              <v-list-item three-line>
                                <v-list-item-icon>
                                  <img
                                    class="work-icon"
                                    src="/images/resume_themes/theme203/images/ellipse.png"
                                  />
                                </v-list-item-icon>
                                <v-list-item-content>
                                  <v-list-item-title class="custom-work-title">
                                    <v-card
                                      flat
                                      color="transparent"
                                      tile
                                    >Google Inc. Introduction Google</v-card>
                                  </v-list-item-title>
                                  <v-list-item-subtitle class="custom-work-subtitle">
                                    <v-card flat color="transparent" tile>User interface designer</v-card>
                                  </v-list-item-subtitle>
                                  <v-list-item-subtitle class="custom-work-duration mt-6">
                                    <v-card color="transparent" tile flat>2012- Current</v-card>
                                  </v-list-item-subtitle>
                                </v-list-item-content>
                              </v-list-item>
                            </v-card>
                          </v-col>
                        </v-row>
                      </v-container>
                    </v-card-text>
                  </v-card>
                </v-tab-item>
                <!--................... Tab item Work............................... -->

                <!-- ...................Tab Item Education............................. -->
                <v-tab-item>
                  <div class="watermark-text text-center">Education</div>
                  <v-card color="transparent" tile flat>
                    <v-container ma-0 pa-0 fluid style="width:100%">
                      <v-row align="center" justify="center">
                        <v-col cols="12" sm="12" md="6" class="mb-12" v-for="n in 4" :key="n">
                          <v-card flat color="transparent" tile>
                            <v-list-item three-line>
                              <v-list-item-icon>
                                <img
                                  class="work-icon"
                                  src="/images/resume_themes/theme203/images/ellipse.png"
                                />
                              </v-list-item-icon>
                              <v-list-item-content>
                                <v-list-item-title class="custom-work-title">
                                  <v-card
                                    flat
                                    color="transparent"
                                    tile
                                  >California Insitute of Technology</v-card>
                                </v-list-item-title>
                                <v-list-item-subtitle class="custom-education-subtitle">
                                  <v-card flat color="transparent" tile style="color:#fbd76d;">
                                    M.Sc in HCI,
                                    <span class="ml-5">Dec 19 - Present</span>
                                  </v-card>
                                </v-list-item-subtitle>
                                <v-list-item-subtitle class="mt-6">
                                  <v-card
                                    color="transparent"
                                    tile
                                    flat
                                    class="custom-education-details"
                                  >I'm a paragraph. Click here to add your own text and edit me. It’s easy. Just click “Edit Text” or double click me to add your own content and make changes.</v-card>
                                </v-list-item-subtitle>
                              </v-list-item-content>
                            </v-list-item>
                          </v-card>
                        </v-col>
                      </v-row>
                    </v-container>
                  </v-card>
                </v-tab-item>
                <!--................... Tab item Education............................... -->

                <!-- ...................Tab Item Skills............................. -->
                <v-tab-item>
                  <div class="watermark-text text-center">Skills</div>
                  <v-card color="transparent" tile flat>
                    <v-row align="center" justify="center">
                      <v-col
                        cols="12"
                        sm="12"
                        md="5"
                        class="mb-12"
                        v-for="skill in skills"
                        :key="skill.id"
                      >
                        <v-card flat color="transparent" tile class="mx-auto">
                          <v-card-text>
                            <v-list-item>
                              <v-list-item-avatar
                                class="skill-circle mr-n1 mt-sm-2"
                                style="z-index:1;"
                              >
                                <span>{{skill.icon_text}}</span>
                              </v-list-item-avatar>
                              <v-list-item-content class="mt-n6">
                                <v-list-item-subtitle>
                                  <v-row no-gutters>
                                    <v-col cols="6" class="skill-title-text">
                                      <span class="ml-2">{{ skill.title }}</span>
                                    </v-col>
                                    <v-col
                                      cols="6"
                                      align="right"
                                      class="skill-title-text"
                                    >{{skill.skill_value_text}}</v-col>
                                  </v-row>
                                </v-list-item-subtitle>
                                <v-list-item-subtitle>
                                  <v-progress-linear
                                    color="#FCD259"
                                    height="12"
                                    rounded
                                    :value="skill.skill_value"
                                  ></v-progress-linear>
                                </v-list-item-subtitle>
                              </v-list-item-content>
                            </v-list-item>
                          </v-card-text>
                        </v-card>
                      </v-col>
                    </v-row>
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
  name: "ResumeTheme203",
  props: ["user"],
  data() {
    return {
      socialIcons: [
        { id: 1, title: "behance" },
        { id: 2, title: "dribbble" },
        { id: 3, title: "instagram" },
        { id: 4, title: "linkedin" },
        { id: 5, title: "google-plus" }
      ],
      mainDataTab: null,
      progressBarColor: "yellow",
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
      ],
      portfolioItems: [
        {
          id: 1,
          title: "Mobile App-Ice Cream",
          subtitle: "Mobile app concept"
        },
        {
          id: 2,
          title: "Mobile App-Ice Cream",
          subtitle: "Mobile app concept"
        },
        {
          id: 3,
          title: "Made market Concept",
          subtitle: "Made market concept"
        },
        {
          id: 4,
          title: "Tracking App-Traq",
          subtitle: "Tracking App-Traq"
        },
        {
          id: 5,
          title: "Made market Concept",
          subtitle: "Made market concept"
        },

        {
          id: 6,
          title: "Made market Concept",
          subtitle: "Made market concept"
        },
        {
          id: 7,
          title: "Made market Concept",
          subtitle: "Made market concept"
        },
        {
          id: 8,
          title: "Love custom app",
          subtitle: "Love custom app"
        },
        {
          id: 9,
          title: "Love custom app",
          subtitle: "Love custom app"
        }
      ],
      skills: [
        {
          id: 1,
          title: "Photoshop",
          skill_value: 90,
          skill_value_text: "90%",
          icon_text: "ph"
        },
        {
          id: 2,
          title: "Photoshop",
          skill_value: 90,
          skill_value_text: "90%",
          icon_text: "ph"
        },
        {
          id: 3,
          title: "Illustrator",
          skill_value: 90,
          skill_value_text: "90%",
          icon_text: "ill"
        },
        {
          id: 4,
          title: "Illustrator",
          skill_value: 90,
          skill_value_text: "90%",
          icon_text: "ill"
        },
        {
          id: 5,
          title: "Figma",
          skill_value: 90,
          skill_value_text: "90%",
          icon_text: "fig"
        },
        {
          id: 6,
          title: "Figma",
          skill_value: 50,
          skill_value_text: "80%",
          icon_text: "fig"
        }
      ],
      user: this.user
    };
  },
  mounted() {
    // if there is no user or the preview is true, set dummy user
    if (!this.user || this.is_preview) {
      this.setDummyUser();
    }

    // let user accessible in included components.
    this.$store.dispatch("updateThemeUser", this.user);
  },
  methods: {
    getSocialIcon(name) {
      return `/images/resume_themes/theme203/social_icons/${name}.webp`;
    },
    getPortfolioItems(id) {
      return `/images/resume_themes/theme203/portfolio/${id}.png`;
    },
    setDummyUser() {
      this.user = this.$store.state.dummyUser;
    }
  }
};
</script>

<style scoped lang="scss">
@import url("https://fonts.googleapis.com/css?family=Montserrat&display=swap");
@import url("https://fonts.googleapis.com/css?family=Rubik&display=swap");
/*@import url("//db.onlinewebfonts.com/c/07a38bbad54db72a40b406bed1c72f53?family=Gotham+Pro");*/
@import url("https://fonts.googleapis.com/css?family=Montserrat");
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
  width: 27rem;
  -webkit-clip-path: polygon(100% 0, 0% 100%, 0 0);
  clip-path: polygon(100% 0, 0% 100%, 0 0);
  -webkit-box-shadow: 0px 0px 40px rgba(0, 0, 0, 0.1);
  box-shadow: 0px 0px 40px rgba(0, 0, 0, 0.1);
  z-index: 2;
  float: left;
  @media screen and (min-width: 960px) and (max-width: 1200px) {
    width: 17rem;
    height: 16rem;
  }

  @media screen and (max-width: 599px) {
    width: 15.5rem;
    height: 13.75rem;
  }
  @media screen and (max-width: 322px) {
    width: 14.5rem;
    height: 12.75rem;
  }
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
  @media screen and(max-width:959px) {
    width: 8rem;
    height: 7.75rem;
  }
}

.verical-sidebar {
  position: absolute;
  background: #e6bf4e;
  width: 2rem;
  height: 1000vh;
  z-index: 1;
  bottom: 0;
  @media screen and (max-width: 599px) {
    width: 1rem;
  }
}
/* Shapes */

.custom-avatar {
  border: 5px solid white;
  width: 120px !important;
  height: 120px !important;
  max-width: 120px;
  max-height: 120px;
  @media screen and (min-width: 960px) and (max-width: 1200px) {
    width: 60px !important;
    height: 60px !important;
  }
}

.profile-title {
  font-family: "Gotham Pro" !important;
  font-size: 1.53rem !important;
  @media screen and (min-width: 960px) and (max-width: 1200px) {
    font-size: 1rem !important;
    margin-bottom: -10px;
  }
  @media screen and(max-width:599px) {
    font-size: 1.12rem !important;
  }
}

.profile-subtitle {
  font-family: "Gotham Pro" !important;
  font-size: 0.8rem !important;
  color: #444444 !important;
  @media screen and (min-width: 960px) and (max-width: 1200px) {
    font-size: 0.6rem !important;
  }
  @media screen and(max-width:599px) {
    font-size: 0.5rem !important;
  }
}

.email-icon-block {
  @media screen and (min-width: 960px) and (max-width: 1200px) {
    margin-left: 30px;
  }
}
.btn-email {
  width: 2.56rem !important;
  height: 2.56rem !important;
}
.icon-email {
  font-size: 1.25 !important;
  margin-top: 1px;
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
.social-media-block {
  margin-left: 7vw;
  @media screen and (max-width: 1280px) {
    margin-left: 1vw;
  }
}
.social-btn {
  width: 2rem !important;
  height: 2rem !important;
  @media screen and (max-width: 959px) {
    width: 2.56rem !important;
    height: 2.56rem !important;
    img {
      width: 18px;
    }
  }

  @media screen and (max-width: 599px) {
    width: 2rem !important;
    height: 2rem !important;
    img {
      width: 14px;
    }
  }
}
/* Social Btn */

// audio video card

//audio video card

/* Hire Me card */
.hire-me-title {
  font-family: "Montserrat", sans-serif !important;
  font-size: 0.9rem !important;
  color: #8b8b8b !important;
  text-align: center !important;
  @media screen and (min-width: 960px) and (max-width: 1200px) {
    font-size: 0.6rem !important;
  }
  @media screen and (max-width: 959px) {
    font-size: 0.7rem !important;
  }
  @media screen and (max-width: 330px) {
    font-size: 0.6rem !important;
  }
}

.hire-me-subtitle {
  font-family: "Montserrat", sans-serif !important;
  font-size: 1rem !important;
  color: #000000 !important;
  @media screen and (max-width: 959px) {
    font-size: 0.8rem !important;
  }
  @media screen and (max-width: 330px) {
    font-size: 0.7rem !important;
  }
}

.btn-hire-me {
  width: 7.5rem;
  border-radius: 50px !important;
  font-weight: 100px !important;
  @media screen and (max-width: 599px) {
    width: 6.5rem;
    font-size: 12px;
  }

  @media screen and (max-width: 330px) {
    width: 5.5rem;
    font-size: 12px;
  }
}

/* Hire Me Card */

/* Profile */

// ............................ Main Navigation Tab...........................//
.custom-tab-text {
  font-size: 1.2rem;
  @media screen and (max-width: 599px) {
    font-size: 1rem;
  }
}
// ............................ Main Navigation Tab ...........................//
// ..........................Desktop Portfolio.........................
.custom-portfolio-img {
  border-radius: 10px;
  width: 100% !important;
  height: 100% !important;
}
.custom-portfolio-title {
  font-family: "Montserrat" !important;
  font-size: 16px !important;
  font-weight: bold;
  margin-bottom: -20px;
  margin-top: -20px;
  @media screen and (min-width: 960px) and (max-width: 1200px) {
    font-size: 12px !important;
  }
  @media screen and (max-width: 959px) {
    font-size: 16px !important;
  }
}
.custom-portfolio-subtitle {
  font-family: "Montserrat" !important;
  color: #000000 !important;
  font-size: 12px;
  @media screen and (min-width: 960px) and (max-width: 1200px) {
    font-size: 10px !important;
  }
}
// .........................Desktop Portfolio...........................

// ................... Work Desktop......................................
.work-icon {
  width: 16px;
  margin-top: 6px;
}
.custom-work-title {
  font-size: 24px;
  line-height: 2.6875rem;
}
.custom-work-subtitle {
  font-size: 12px;
  color: #000000 !important;
  text-align: left;
  text-transform: capitalize;
}
.custom-work-duration {
  font-size: 12px;
  color: #000000 !important;
  text-align: left !important;
}
//...................... Work Desktop.....................................

// ................ Education Desktop............................
.custom-education-subtitle {
  font-size: 0.875rem;
  color: #fbd76d !important;
  line-height: 1.4375rem;
  font-weight: bold;

  @media screen and (max-width: 599px) {
    font-size: 0.7rem;
  }
}
.custom-education-details {
  font-size: 0.75rem;
  line-height: 1.4375rem;
  font-weight: 300;
  color: #2d2d2d !important;
}
// ................ Education Desktop............................
// ................Skills Desktop..................................

.skill-circle {
  width: 3.1rem;
  height: 3rem;
  border-radius: 50%;
  background: #000000;
  border: 5px solid #e0bb4c;
  box-sizing: border-box;
  text-align: center;
  padding: 3px 8px 5px 8px;
  span {
    font-family: "Rubik", sans-serif;
    font-size: 0.9rem;
    color: #ffffff;
  }
}

.skill-title-text {
  font-family: "Rubik", sans-serif !important;
  font-size: 1rem;
  line-height: 1.6875rem;
  color: #222d68 !important;
  @media screen and (max-width: 599px) {
    font-size: 0.7rem;
  }
}
.tablet-audio-video-flex {
  display: none;
  @media screen and (max-width: 959px) {
    display: inline;
    text-align: right;
  }
  @media screen and (max-width: 599px) {
    display: inline;
    text-align: center;
  }
}

//..................Skills Desktop.....................................
// Watermark text
.watermark-text {
  position: absolute;
  font-size: 18vw;
  width: 100%;
  opacity: 0.1;
  white-space: nowrap;
  display: inline-block;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}
</style>

<style>
#resumeTheme203 .v-progress-linear__determinate {
  background-color: -moz-linear-gradient(
    138.05deg,
    #fcd259 1.07%,
    #e5bf4e 51.95%,
    #ffde81 89.88%
  ) !important;
  background-color: linear-gradient(
    138.05deg,
    #fcd259 1.07%,
    #e5bf4e 51.95%,
    #ffde81 89.88%
  ) !important;
}
</style>