<template>
  <v-app style="width:100%">
    <v-container
      fluid
      ma-0
      pa-0
      style="background-color:rgba(16, 78, 251, 0.06); max-width:100% !important; "
    >
      <v-row no-gutters>
        <v-col cols="12">
          <v-card color="#104EFB" class="custom-parent-card" style="border-radius:0px;">
            <v-card-text>
              <div class="circle1"></div>
              <div class="circle2"></div>
              <v-container class="themeWrapperBlue">
                <v-row no-gutters align="center" justify="center">
                  <!-- Profile Pic -->
                  <v-col cols="12" sm="6" md="3" class>
                    <v-card color="transparent" dark flat class="ml-md-0 ml-sm-0 ml-n10">
                      <v-card-text>
                        <v-list-item>
                          <v-list-item-avatar color="grey darken-3" size="120" max-width="120">
                            <v-img
                              class="elevation-6 avatar-border"
                              src="https://avataaars.io/?avatarStyle=Transparent&topType=ShortHairShortCurly&accessoriesType=Prescription02&hairColor=Black&facialHairType=Blank&clotheType=Hoodie&clotheColor=White&eyeType=Default&eyebrowType=DefaultNatural&mouthType=Default&skinColor=Light"
                            ></v-img>
                          </v-list-item-avatar>
                          <v-list color="transparent" class="ml-n10 ml-md-n5 ml-sm-n5">
                            <v-list-item v-model="item" color="primary">
                              <v-list-item>
                                <v-list-item-content>
                                  <v-list-item-title class="headline">
                                    <span class="title-text">Conor</span>
                                    <span class="ml-12">
                                      <v-btn
                                        btn
                                        icon
                                        small
                                        dark
                                        color="#104EFB"
                                        depressed
                                        class="custom-message-btn"
                                      >
                                        <img
                                          width="20"
                                          src="/images/resume_themes/theme202/icons/message.png"
                                        />
                                      </v-btn>
                                    </span>
                                  </v-list-item-title>
                                </v-list-item-content>
                              </v-list-item>
                            </v-list-item>
                            <!-- Designation Group -->
                            <v-list-item v-model="item2" color="primary" class="mt-n6">
                              <v-list-item>
                                <v-list-item-content>
                                  <v-list-item-subtitle class="subtitle-text">Web Designer</v-list-item-subtitle>
                                </v-list-item-content>
                              </v-list-item>
                            </v-list-item>
                            <!-- Designation group -->
                            <!-- Interview -->
                            <v-list-item color="primary">
                              <v-list-item>
                                <v-list-item-content>
                                  <v-list-item-subtitle class="interview-text mr-2">
                                    Interview
                                    <span style="margin-left:15px;">
                                      <v-btn depressed icon small dark color="#104EFB">
                                        <img
                                          width="20"
                                          src="/images/resume_themes/theme202/icons/audio-speaker-on.png"
                                        />
                                      </v-btn>
                                      <v-btn
                                        depressed
                                        icon
                                        small
                                        dark
                                        color="#104EFB"
                                        class="custom-video-btn"
                                      >
                                        <img
                                          width="20"
                                          src="/images/resume_themes/theme202/icons/video-camera.png"
                                          style="margin-top:-4px;"
                                        />
                                      </v-btn>
                                    </span>
                                  </v-list-item-subtitle>
                                </v-list-item-content>
                              </v-list-item>
                            </v-list-item>
                            <!-- Interview -->
                          </v-list>
                        </v-list-item>
                      </v-card-text>
                    </v-card>
                  </v-col>
                  <!-- Profile Pic -->

                  <!-- Social Icons -->
                  <v-col class cols="12" sm="6" md="5">
                    <v-card color="transparent" flat class="custom-social-media-card">
                      <v-card-text class="custom-card-text" align="center">
                        <v-btn depressed class="mr-1 custom-social-btn hidden-sm-and-up">
                          <img
                            width="16"
                            src="/images/resume_themes/theme202/social_icons/behance.webp"
                          />
                        </v-btn>
                        <v-btn depressed class="mr-1 custom-social-btn">
                          <img
                            width="16"
                            src="/images/resume_themes/theme202/social_icons/dribbble.webp"
                          />
                        </v-btn>
                        <v-btn depressed class="mr-1 custom-social-btn">
                          <img
                            width="16"
                            src="/images/resume_themes/theme202/social_icons/pinterest.webp"
                          />
                        </v-btn>
                        <v-btn depressed class="mr-1 custom-social-btn">
                          <img
                            width="16"
                            src="/images/resume_themes/theme202/social_icons/instagram.webp"
                          />
                        </v-btn>

                        <v-btn depressed class="mr-1 custom-social-btn">
                          <img
                            width="16"
                            src="/images/resume_themes/theme202/social_icons/linkedin.webp"
                          />
                        </v-btn>
                      </v-card-text>
                    </v-card>
                  </v-col>
                  <!-- Social Icons -->

                  <v-col cols="12" md="10" class="hidden-sm-and-up mb-md-1 mb-sm-1"></v-col>

                  <!-- Availability -->
                  <v-col
                    cols="12"
                    sm="12"
                    md="4"
                    align="center"
                    justify="center"
                    class="mt-10 mt-md-0 mt-sm-0 mb-md-0 mb-sm-12"
                  >
                    <v-card flat class="hire-me pa-0 ml-md-n12 mt-md-0 mt-sm-0 mt-n8">
                      <v-card-text>
                        <v-row justify="center" align="center">
                          <v-col cols="6" sm="4" md="3" class="mt-md-0 mt-sm-0 mt-4">
                            <v-card flat color="transparent" class="ml-md-0 ml-sm-0 ml-n6">
                              <div class="caption hire-me-title-text">$10</div>
                              <div class="hire-me-subtitle-text">Hourly Rate</div>
                            </v-card>
                          </v-col>
                          <v-col cols="6" sm="4" md="4" class="mt-md-0 mt-sm-0 mt-4">
                            <v-card flat color="transparent" class="ml-sm-n11 ml-md-0 ml-0">
                              <div class="caption hire-me-title-text">35 HOURS</div>
                              <div class="hire-me-subtitle-text">Weekly availibility</div>
                            </v-card>
                          </v-col>
                          <v-col
                            cols="5"
                            sm="4"
                            md="4"
                            class="mb-md-0 mb-sm-0 mb-n1 mt-md-0 mt-sm-0 mt-n5"
                          >
                            <div class="circle3 hidden-sm-and-down"></div>
                            <div class="circle4 hidden-sm-and-down"></div>
                            <div class="mt-10 hidden-sm-and-up"></div>
                            <!-- Hire Me Button -->
                            <div class="caption ml-md-3 mr-md-n3">
                              <v-btn
                                block
                                color="#104EFB"
                                height="45"
                                dark
                                class="btn-hire-me"
                              >HIRE ME</v-btn>
                            </div>
                            <!-- Hire Me Buton -->
                          </v-col>
                        </v-row>
                      </v-card-text>
                    </v-card>
                  </v-col>
                  <!-- Social  -->
                </v-row>
              </v-container>
            </v-card-text>
          </v-card>
        </v-col>
      </v-row>

      <!-- Tabs -->
      <v-container class="themeWrapperBlue">
        <v-row no-gutters class="tab-layout my-md-n11 my-sm-n11" justify="center" align="center">
          <v-col cols="10" md="11" sm="10">
            <v-card flat class="card-tab">
              <!-- Main Tab -->
              <v-tabs
                v-model="tab"
                centered
                background-color="white"
                color="#104EFB"
                show-arrows
                hide-slider
              >
                <v-tab
                  class="tab-text text-capitalize"
                  v-for="item in tabs"
                  :key="item.id"
                  @click="currentTab = item.id"
                  :class="[
                  currentTab == item.id ? 'active-tab': ''
                ]"
                >{{ item.title }}</v-tab>
              </v-tabs>
              <!-- Main Tab -->
            </v-card>

            <v-tabs-items v-model="tab" class="mt-12 mt-xs-10">
              <!-- Skills -->
              <v-tab-item>
                <v-card flat tile color="rgba(16, 78, 251, 0.06)">
                  <v-card-text>
                    <!-- Skills Tabs-->
                    <v-tabs
                      v-model="skillTab"
                      centered
                      grow
                      background-color="transparent"
                      show-arrows
                      hide-slider
                    >
                      <v-tab class="text-capitalize child-tab-text">Programming</v-tab>
                      <v-tab class="text-capitalize child-tab-text">Frameworks/Databases</v-tab>
                      <v-tab class="text-capitalize child-tab-text">Design Skills</v-tab>
                      <v-tab class="text-capitalize child-tab-text">Software</v-tab>
                    </v-tabs>
                    <hr class="separator-line mt-5" />

                    <v-tabs-items v-model="skillTab" class="my-8">
                      <!-- Programming -->
                      <v-tab-item v-for="i in 4" :key="i">
                        <v-card flat color="rgba(16, 78, 251, 0.06)">
                          <v-card-text class="card-text-center">
                            <v-container fluid ma-0 pa-0>
                              <v-row justify="center" align="center">
                                <!-- Photoshop Skill -->
                                <v-col
                                  cols="2"
                                  align="center"
                                  v-for="item in skills"
                                  :key="item.title"
                                  class="mr-md-0 mr-sm-0 mr-2"
                                >
                                  <div class="caption">
                                    <v-progress-circular
                                      class="custom-progress-bar"
                                      size="45"
                                      rotate="180"
                                      :value="item.value"
                                      color="#104EFB"
                                    >
                                      <span class="progress-value-text">{{ item.value_text }}</span>
                                    </v-progress-circular>
                                  </div>
                                  <div class="my-10">
                                    <img class="skill-img" :src="getSkillIcon(item.title)" />
                                  </div>
                                </v-col>
                                <!-- Photoshop skill -->
                              </v-row>
                            </v-container>
                          </v-card-text>
                        </v-card>
                      </v-tab-item>
                      <!-- Programming -->
                    </v-tabs-items>

                    <!-- Skills Tabs -->
                  </v-card-text>
                </v-card>
              </v-tab-item>
              <!-- Skills -->

              <!-- ................................................Portfolio........................................ -->
              <!-- Portfolio -->
              <v-tab-item>
                <v-card flat color="rgba(16, 78, 251, 0.06)">
                  <v-card-text>
                    <v-row align="center" justify="center">
                      <v-col cols="12" sm="10" md="6" class="pa-md-8 mb-sm-10 mb-10">
                        <v-card elevation="6" class="card-portfolio">
                          <v-toolbar color="#104EFB" dark height="100">
                            <v-toolbar-title>
                              <div style="text-align:left;" class="ml-10">
                                <div class="title">
                                  <span class="portfolio-title">Mobile App "Join"</span>
                                </div>
                                <div class="caption">
                                  <span class="portifolio-subtitle">Web Design, Ui/Ux</span>
                                </div>
                              </div>
                            </v-toolbar-title>
                            <v-spacer></v-spacer>
                            <v-btn icon>
                              <v-icon>mdi-dots-vertical</v-icon>
                            </v-btn>
                          </v-toolbar>

                          <v-card-text align="center">
                            <v-img
                              aspect-ratio="1.4"
                              src="/images/resume_themes/theme202/portfolio/1.png"
                            ></v-img>
                          </v-card-text>
                        </v-card>
                      </v-col>

                      <v-col cols="12" sm="10" md="6" class="pa-md-8 mb-sm-10">
                        <v-card elevation="6" class="card-portfolio">
                          <v-toolbar color="#104EFB" dark height="100">
                            <v-toolbar-title>
                              <div style="text-align:left;" class="ml-10">
                                <div class="title">
                                  <span class="portfolio-title">Mobile App "Join"</span>
                                </div>
                                <div class="caption">
                                  <span class="portifolio-subtitle">Web Design, Ui/Ux</span>
                                </div>
                              </div>
                            </v-toolbar-title>
                            <v-spacer></v-spacer>
                            <v-btn icon>
                              <v-icon>mdi-dots-vertical</v-icon>
                            </v-btn>
                          </v-toolbar>

                          <v-card-text align="center">
                            <v-img
                              aspect-ratio="1.4"
                              src="/images/resume_themes/theme202/portfolio/2.png"
                            ></v-img>
                          </v-card-text>
                        </v-card>
                      </v-col>
                    </v-row>
                  </v-card-text>
                  <v-card-text class="card-text-center">
                    <v-btn icon class="mr-5" color="primary">
                      <v-icon>mdi-arrow-left</v-icon>
                    </v-btn>
                    <v-btn icon class="ml-5" color="primary">
                      <v-icon>mdi-arrow-right</v-icon>
                    </v-btn>
                  </v-card-text>
                </v-card>
              </v-tab-item>
              <!-- Portfolio -->
              <!-- ...................................Portfoilo................................................... -->

              <!-- .............................. Work ............................................-->
              <v-tab-item>
                <v-card flat color="rgba(16, 78, 251, 0.06)">
                  <v-card-text>
                    <v-row align="center" justify="center">
                      <!-- 1st Card -->
                      <v-col cols="12" md="6" class="ma-0 pa-5 mb-10" v-for="i in 4" :key="i">
                        <v-card elevation="6" class="card-portfolio">
                          <v-card-text>
                            <v-row justify="center" align="center">
                              <v-col cols="12" class="hidden-sm-and-down mt-5 mb-5">
                                <div align="center">
                                  <v-img
                                    width="32"
                                    height="30"
                                    src="/images/resume_themes/theme202/icons/work.png"
                                  ></v-img>
                                </div>
                              </v-col>
                              <v-col cols="12" md="4" class="hidden-sm-and-down">
                                <v-card flat>
                                  <v-card-text>
                                    <v-list-item three-line>
                                      <v-list-item-content>
                                        <v-list-item-title class="mb-12 card-work-title-left">
                                          <span class>
                                            Graphic &
                                            <br />Web Designer
                                          </span>
                                        </v-list-item-title>
                                        <v-list-item-subtitle class="card-work-subtitle">2018-2019</v-list-item-subtitle>
                                      </v-list-item-content>
                                    </v-list-item>
                                  </v-card-text>
                                </v-card>
                              </v-col>
                              <!-- This potion is only shows on sm and xs devices -->
                              <v-col cols="12" class="hidden-md-and-up">
                                <v-card color="transparent" flat>
                                  <v-card-text class>
                                    <v-container class="mx-sm-6">
                                      <v-row>
                                        <v-col cols="2" sm="2" class>
                                          <img
                                            width="25"
                                            src="/images/resume_themes/theme202/icons/work.png"
                                          />
                                        </v-col>
                                        <v-col cols="8" sm="6" class="mt-1">
                                          <span
                                            class="card-work-title-left text-center"
                                          >Graphic & Web Designer</span>
                                        </v-col>
                                        <v-col cols="6" sm="4" class="mt-sm-1 offset-2 offset-sm-0">
                                          <span class="card-work-subtitle">2018-2019</span>
                                        </v-col>
                                      </v-row>
                                    </v-container>
                                  </v-card-text>
                                </v-card>
                              </v-col>
                              <!-- This potion is only shows on sm and xs devices -->

                              <v-col cols="12" md="8">
                                <v-card flat class="mx-sm-5">
                                  <v-list-item three-line>
                                    <v-list-item-content>
                                      <v-list-item-title class="caption">
                                        <span class="card-work-title-right">Company "React"</span>
                                      </v-list-item-title>

                                      <v-list-item-subtitle
                                        class="card-work-details"
                                      >- Turning creative concepts into finished websites.</v-list-item-subtitle>
                                      <v-list-item-subtitle
                                        class="card-work-details"
                                      >- Drawing up detailed website s pecifications.</v-list-item-subtitle>
                                      <v-list-item-subtitle
                                        class="card-work-details"
                                      >- Building websites that are easy to understand, navigate and use.</v-list-item-subtitle>
                                      <v-list-item-subtitle
                                        class="card-work-details"
                                      >- Designing sample page layouts.</v-list-item-subtitle>
                                      <v-list-item-subtitle
                                        class="card-work-details"
                                      >- Ensuring that the website complies with the company’s brand guidelines.</v-list-item-subtitle>
                                    </v-list-item-content>
                                  </v-list-item>
                                </v-card>
                              </v-col>
                            </v-row>
                          </v-card-text>
                        </v-card>
                      </v-col>
                      <!-- 1st card -->

                      <!-- 4th Card -->
                    </v-row>
                  </v-card-text>
                </v-card>
              </v-tab-item>
              <!-- ........................Work........................................... -->

              <!-- ......................................Education..................................... -->
              <v-tab-item>
                <v-card flat color="rgba(16, 78, 251, 0.06)">
                  <v-card-text>
                    <v-row align="center" justify="center">
                      <!-- 1st Card -->
                      <v-col cols="12" md="6" class="ma-0 pa-5 mb-10" v-for="i in 4" :key="i">
                        <v-card elevation="6" class="card-portfolio">
                          <v-card-text>
                            <v-row justify="center" align="center">
                              <!-- Hidden in sm and down -->
                              <v-col cols="12" mt-5 mb-5 class="hidden-sm-and-down">
                                <div align="center">
                                  <v-img
                                    width="32"
                                    height="30"
                                    src="/images/resume_themes/theme202/icons/education.png"
                                  ></v-img>
                                </div>
                              </v-col>
                              <v-col cols="12" md="4" class="hidden-sm-and-down mt-md-n12">
                                <v-card flat>
                                  <v-card-text>
                                    <div class="card-work-title-left mb-8 mx-2">
                                      Master in
                                      <br />Web Developer
                                    </div>
                                    <p class="card-work-subtitle mx-2">2015-2016</p>
                                  </v-card-text>
                                </v-card>
                              </v-col>
                              <!-- Hidden and sm and down -->

                              <!-- Hidden in md and up -->
                              <v-col cols="12" class="hidden-md-and-up">
                                <v-card color="transparent" flat>
                                  <v-card-text class>
                                    <v-container class="mx-sm-6 grid-list-xs">
                                      <v-row>
                                        <v-col cols="2" sm="2" class>
                                          <img
                                            width="25"
                                            src="/images/resume_themes/theme202/icons/education.png"
                                          />
                                        </v-col>
                                        <v-col cols="8" sm="6" class="mt-1">
                                          <span
                                            class="card-work-title-left text-center"
                                          >Master in Web Developer</span>
                                        </v-col>
                                        <v-col cols="6" sm="4" class="mt-sm-1 offset-2 offset-sm-0">
                                          <span class="card-work-subtitle">2015-2016</span>
                                        </v-col>
                                      </v-row>
                                    </v-container>
                                  </v-card-text>
                                </v-card>
                              </v-col>
                              <!-- Hidden in md and up -->

                              <v-col cols="12" md="8">
                                <v-card flat>
                                  <v-card-text>
                                    <v-list-item three-line>
                                      <v-list-item-content>
                                        <v-list-item-title class="caption">
                                          <span
                                            class="card-work-title-right"
                                          >Envision Media, Inc., Santa Cruz, CA</span>
                                        </v-list-item-title>

                                        <v-list-item-subtitle
                                          class="card-work-details"
                                        >- Turning creative concepts into finished websites.</v-list-item-subtitle>
                                        <v-list-item-subtitle
                                          class="card-work-details"
                                        >- Drawing up detailed website s pecifications.</v-list-item-subtitle>
                                        <v-list-item-subtitle
                                          class="card-work-details"
                                        >- Building websites that are easy to understand, navigate and use.</v-list-item-subtitle>
                                        <v-list-item-subtitle
                                          class="card-work-details"
                                        >- Designing sample page layouts.</v-list-item-subtitle>
                                        <v-list-item-subtitle
                                          class="card-work-details"
                                        >- Ensuring that the website complies with the company’s brand guidelines.</v-list-item-subtitle>
                                      </v-list-item-content>
                                    </v-list-item>
                                  </v-card-text>
                                </v-card>
                              </v-col>
                            </v-row>
                          </v-card-text>
                        </v-card>
                      </v-col>
                      <!-- 1st card -->
                    </v-row>
                  </v-card-text>
                </v-card>
              </v-tab-item>
              <!-- .....................................Education................................................. -->
            </v-tabs-items>
          </v-col>
        </v-row>
      </v-container>
      <!-- Tabs -->
    </v-container>
  </v-app>
</template>

<script>
export default {
  name: "ResumeTheme202",
  data() {
    return {
      tab: null,
      item: null,
      item2: null,
      skillTab: null,
      currentTab: 1,
      tabs: [
        { id: 1, title: "Skills" },
        { id: 2, title: "Portfolio" },
        { id: 3, title: "Work" },
        { id: 4, title: "Education" }
      ],
      skills: [
        {
          title: "photoshop",
          value_text: "65%",
          value: 65
        },
        {
          title: "illustrator",
          value_text: "76%",
          value: 76
        },
        {
          title: "sketch",
          value_text: "60%",
          value: 60
        },
        {
          title: "xd",
          value_text: "70%",
          value: 70
        },
        {
          title: "figma",
          value_text: "97%",
          value: 97
        }
      ]
    };
  },
  methods: {
    getSkillIcon(icon) {
      return `/images/resume_themes/theme202/skills/${icon}.png`;
    }
  }
};
</script>

<style scoped lang="scss">
@import url("https://fonts.googleapis.com/css?family=Actor&display=swap");
@import url("https://fonts.googleapis.com/css?family=Raleway&display=swap");
/* Theme Wrapper */
.themeWrapperBlue {
  max-width: 100%;
}
/* Theme wrapper*/

/* tab */
.active-tab {
  background-color: #ffffff !important;
  border-radius: 30px !important;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24) !important;
  height: 2.5rem;
  margin-top: 4px;
  overflow: hidden !important;
}

.active-tab:hover {
  border-radius: 30px !important;
  overflow: hidden !important;
}

.tab-text.active-tab {
  color: #104efb !important;
  border-radius: 30px !important;
}

.tab-text:hover {
  color: #104efb !important;
}

.active-tab:active {
  background-color: #ffffff !important;
  height: 100% !important;
}

/* tab */
.separator-line {
  border: 1px solid rgba(16, 78, 251, 0.12);
}
.portifolio-subtitle {
  font-family: Raleway !important;
}
.title-text {
  font-size: 25px !important;
  font-family: Raleway !important;
  font-style: normal;
}

.v-btn .hire-me-rounded-btn {
  font-size: 65px !important;
}

.subtitle-text {
  font-family: Raleway !important;
  font-style: normal;
  font-weight: normal;
  font-size: 18px !important;
  color: #ffffff !important;
}

.interview-text {
  font-family: Raleway !important;
  font-style: normal;
  font-weight: normal;
  font-size: 14px !important;
  color: #ffffff !important;
}

.hire-me {
  // width: 700px;
  text-align: center !important;
  box-shadow: 0px 7px 9px rgba(16, 78, 251, 0.03) !important;
  border-radius: 50px !important;
}

.btn-hire-me {
  border-radius: 40px !important;
  height: 45px !important;
  margin-top: 0px !important;
}

.hire-me-title-text {
  font-weight: bold !important;
  font-size: 12px !important;
  line-height: 0.75rem !important;
  color: #104efb;
  @media screen and (max-width: 959px) {
    font-size: 24px !important;
    line-height: 40px !important;
  }
  @media screen and (max-width: 599px) {
    font-size: 22px !important;
  }
}

.hire-me-subtitle-text {
  font-family: Raleway !important;
  font-size: 12px !important;
  color: #104efb;
}

.social-media-block {
  padding: 0px;
}

.custom-social-btn {
  height: 45px !important;
  min-width: 40px !important;
  border-radius: 15px !important;
  box-shadow: 0px 7px 9px rgba(0, 31, 118, 0.08) !important;
  offset: 0px, 7px rgba(0, 31, 118, 0.08) !important;
}

.card-tab {
  box-shadow: 0px 7px 9px rgba(16, 78, 251, 0.03) !important;
  border-radius: 50px !important;
  padding: 7px;
}

.skill-img {
  width: 38.36px;
  height: 38.36px;
}

.card-text-center {
  text-align: center !important;
}

.card-portfolio {
  border-radius: 20px !important;
}

.card-work-title-left {
  color: #104efb !important;
  font-size: 16px !important;
}

.card-work-title-right {
  font-family: "Actor" !important;
  color: #104efb !important;
  font-size: 18px !important;
  font-weight: bold !important;
}

.portfolio-title {
  font-family: "Raleway" !important;
  font-weight: bold;
}

.card-work-subtitle {
  font-family: "Actor" !important;
  color: #104efb !important;
  font-size: 16px !important;
}

.card-work-details {
  font-family: Raleway !important;
  color: #104efb !important;
  font-size: 14px !important;
}

.tab-text {
  font-family: Raleway !important;
  font-size: 20px !important;
  margin-right: 2.8vw;
  color: rgba(16, 78, 251, 0.4) !important;
}

.child-tab-text {
  font-family: Raleway !important;
  font-size: 20px !important;
}

.avatar-border {
  border: 10px solid #1e86ff;
}

.circle1 {
  position: absolute;
  margin-top: -50px;
  width: 180px;
  height: 180px;
  border-radius: 50%;
  background: rgba(241, 244, 255, 0.1);
}

.circle2 {
  position: absolute;
  margin-left: -150px;
  width: 300px;
  height: 300px;
  border-radius: 50%;
  background: rgba(241, 244, 255, 0.1);
}

.circle3 {
  position: absolute;
  margin-top: -48px;
  margin-left: 173px;
  width: 150px;
  height: 150px;
  border-radius: 50%;
  background: rgba(241, 244, 255, 0.1);
}

.circle4 {
  position: absolute;
  margin-left: 93px;
  margin-top: -123px;
  width: 220px;
  height: 220px;
  border-radius: 50%;
  background: rgba(241, 244, 255, 0.1);
}

.custom-video-btn {
  margin-left: 16px !important;
}

/* media query block */
@media screen and (min-width: 960px) and (max-width: 1263px) {
  .custom-social-media-card {
    margin-left: 90px;
  }
  .hire-me-subtitle-text {
    font-size: 10px !important;
  }
}

@media screen and (min-width: 600px) and (max-width: 959px) {
  .btn-hire-me {
    border-radius: 20px !important;
  }
  // .hire-me {
  //   margin-left: 30px;
  //   margin-right: 30px;
  // }
  .custom-social-btn {
    height: 45px;
  }
  .tab-text {
    font-size: 16px !important;
  }
  .child-tab-text {
    font-size: 18px !important;
  }
  /* Work */
  .card-work-title-left {
    text-align: center !important;
  }
  .card-work-subtitle {
    text-align: center !important;
  }
  /* Work */
  /* Circle */

  /* Circle */
}

@media screen and (max-width: 599px) {
  /* Active tab */
  .active-tab {
    height: 2rem;
    margin-top: 8px;
    padding: 0px !important;
  }
  /* Active tab */
  .custom-social-btn {
    height: 45px !important;
  }
  /* work/work portfolio */
  .card-work-title-left {
    text-align: center !important;
  }
  .card-work-subtitle {
    text-align: center !important;
  }
  /* Work/Portfolio */
  .custom-parent-card {
    height: 580px !important;
  }
  /* Parent tab text */
  .tab-layout {
    margin-top: -38px !important;
  }
  .tab-text {
    margin-right: 0px;
    font-size: 15px !important;
  }
  .child-tab-text {
    font-size: 14px !important;
  }
  .card-tab {
    padding: 0px;
  }
  /* Parent tab text  */
  /* circles */

  .v-btn.btn-hire-me {
    height: 60px !important;
    margin-top: -20px;
  }

  .btn-hire-me {
    border-radius: 20px !important;
  }
  /* circles */
  .skill-img {
    width: 30px;
    height: 20px;
  }

  .skill-img-figma {
    width: 40px;
    height: 30px;
  }

  .custom-progress-bar {
    height: 35px !important;
    width: 35px !important;
  }
  .progress-value-text {
    font-size: 8px !important;
  }
}
@media screen and (max-width: 370px) {
  .btn-hire-me {
    border-radius: 15px !important;
  }
  .custom-social-btn {
    margin-right: auto !important;
  }
}

@media screen and (max-width: 344px) {
  .custom-social-btn {
    width: 30px !important;
    height: 40px !important;
  }
}

/* media query block */
</style>