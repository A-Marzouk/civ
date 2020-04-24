<template>
  <v-app style="width:100%; background:#212529;">
    <v-container fluid ma-0 pa-0 style="width:100%; ">
      <!-- For Desktop and Tablet -->
      <v-app-bar color="#272B2F" height="260" dark>
        <v-avatar size="200" class="custom-avatar" left tile>
          <v-img src="/images/resume_themes/theme207/avatar.png"></v-img>
        </v-avatar>
        <div class="half-circle"></div>
        <v-container fluid pa-0 ma-0 style="width:100%">
          <v-row class align="center" justify="center" dense>
            <v-col md="4" sm="7">
              <v-card class="pa-0" align="center" color="transparent" flat>
                <div class="custom-profile-title">{{ personalData.name }}</div>
                <div class="custom-profile-subtitle">{{ personalData.designation }}</div>
                <div class="hr-line"></div>
              </v-card>

              <v-card class="pa-0 mt-3" align="center" color="transparent" flat>
                <v-row justify="center" align="center">
                  <v-col cols="6">
                    <div class="hour-rate">
                      <v-avatar left class="mt-n2 mr-n1">
                        <img src="/images/resume_themes/theme207/icons/usd.png" />
                      </v-avatar>
                      <span>$20</span>
                    </div>
                    <div class="hour-rate-text">Hour Rate</div>
                  </v-col>
                  <v-col cols="6">
                    <div class="hour-rate">
                      <v-avatar left class="mt-n2 mr-n1">
                        <img src="/images/resume_themes/theme207/icons/time.png" />
                      </v-avatar>
                      <span>25</span>
                    </div>
                    <div class="hour-rate-text">Weekly Availibility</div>
                  </v-col>
                </v-row>
              </v-card>
            </v-col>

            <!-- Social Buttons for tablet only -->
            <v-col sm="5" class="d-none d-sm-flex d-md-none">
              <v-card flat color="transparent" class="pa-0 hire-me-card">
                <v-btn color="#FAFAFA" class="btn-hire-me hidden-sm-and-down" x-large>
                  <v-icon color="#5843BE" left>mdi-email</v-icon>Hire Me
                </v-btn>

                <!-- social buttons -->
                <v-btn
                  class="custom-social-btn mx-2"
                  v-for="item in socialIcons"
                  :key="item.title"
                  color="#FAFAFA"
                >
                  <img
                    :width="item.title == 'facebook'? '12' : '20' "
                    x-large
                    :src="getSocialIcon(item.title)"
                  />
                </v-btn>
                <!-- social buttons -->
              </v-card>
            </v-col>
            <!-- Social Button for tablet only -->

            <!-- 3rd column -->
            <v-col md="7" class="hidden-sm-and-down" align="right">
              <v-card flat color="transparent" class="pa-0 hire-me-card">
                <!-- social buttons -->
                <v-btn
                  class="custom-social-btn mx-2 elevation-12"
                  v-for="item in socialIcons"
                  :key="item.title"
                  color="#272B2F"
                >
                  <img
                    :width="item.title == 'facebook'? '12' : '20' "
                    x-large
                    :src="getSocialIcon(item.title)"
                  />
                </v-btn>
                <!-- social buttons -->
                <v-btn color="#272B2F" class="btn-hire-me hidden-sm-and-down elevation-12" x-large>
                  <v-icon color="#FC413C" left>mdi-email-outline</v-icon>
                </v-btn>
              </v-card>
            </v-col>
            <!-- 3rd column -->

            <!-- 4th column for tablet only -->
            <v-col sm="1" class="d-none d-sm-flex d-md-none"></v-col>
            <v-col sm="5" class="d-none d-sm-flex d-md-none">
              <v-card flat color="tranparent" class="ml-2 mt-0 mt-n5">
                <v-btn color="#FAFAFA" class="btn-hire-me" x-large>
                  <v-icon color="#5843BE" left>mdi-email</v-icon>Hire Me
                </v-btn>
              </v-card>
            </v-col>
            <!-- 4th column for tablet only -->
          </v-row>
        </v-container>
      </v-app-bar>
      <!-- For Desktop and Tablet Version -->
      <!-- ........................................................................................................ -->

      <!-- ....................................................................................................... -->

      <!-- Tab Container -->
      <v-container fluid style="width:100%;" class="mt-10">
        <v-row justify="center" align="center">
          <v-col cols="12" md="11">
            <!-- for mobile version  -->
            <v-tabs v-model="mainDataTab" fixed-tabs hide-slider class="hidden-sm-and-up">
              <v-tab
                v-for="tab in tabItems"
                :key="tab.id"
                @click="currentTab=tab.id"
                :class="[
                  currentTab == tab.id ? 'active-mobile-tab' : ''
                ]"
              >
                <v-avatar tile size="16">
                  <img :src="getTabIcon(tab.id)" width="16" />
                </v-avatar>
                <span class="ml-2" v-if="currentTab == tab.id">{{tab.title}}</span>
              </v-tab>
            </v-tabs>
            <!-- for mobile version  -->
            <!-- tab for desktop and tablet -->
            <v-tabs
              v-model="mainDataTab"
              centered
              grow
              class="hidden-xs-only"
              slider-color="#FC413C"
              background-color="transparent"
            >
              <v-tab
                v-for="tab in tabItems"
                :key="tab.id"
                @click="currentTab=tab.id"
                class="mx-md-2 mx-sm-2 text-capitalize"
                :class="[
                currentTab == tab.id ? 'custom-active-tab' : '', 'ct-tab',
              ]"
              >
                <v-avatar tile>
                  <img
                    :src="currentTab == tab.id ? getTabActiveIcon(tab.id): getTabIcon(tab.id)"
                    class="mr-md-4"
                  />
                </v-avatar>
                <span>{{ tab.title }}</span>
              </v-tab>
            </v-tabs>
            <!-- Tab for desktop and tablet -->
          </v-col>
        </v-row>
        <!-- Main tab ends here -->
      </v-container>
      <!--Tab Container  -->
      <!-- tab items container -->
      <v-container fluid pa-md-10 mt-n12 style="width:100%">
        <v-row align="center" justify="center">
          <v-col cols="12">
            <v-card flat color="transparent">
              <v-tabs-items v-model="mainDataTab" style="background: transparent;">
                <!-- Portfolio -->
                <v-tab-item>
                  <v-card color="transparent" flat>
                    <v-card-text>
                      <v-row>
                        <!-- column 1 -->
                        <v-col md="3">
                          <v-card color="transparent" class="card-portfolio" hover>
                            <v-speed-dial top right absolute>
                              <template v-slot:activator>
                                <v-btn icon color="transparent">
                                  <img
                                    width="20"
                                    src="/images/resume_themes/theme207/icons/zoom.png"
                                    alt
                                  />
                                </v-btn>
                              </template>
                            </v-speed-dial>
                            <v-img
                              src="/images/resume_themes/theme207/portfolio/1.png"
                              alt="Portfolio Image"
                            ></v-img>
                          </v-card>
                        </v-col>
                        <!-- Column 1 -->
                        <!-- column 2 -->
                        <v-col md="4">
                          <v-row>
                            <v-col cols="6" v-for="n in 4" :key="n">
                              <v-card class="card-portfolio mt-n3 mb-3" hover>
                                <v-speed-dial top right absolute>
                                  <template v-slot:activator>
                                    <v-btn icon color="transparent">
                                      <img
                                        width="20"
                                        src="/images/resume_themes/theme207/icons/zoom.png"
                                        alt
                                      />
                                    </v-btn>
                                  </template>
                                </v-speed-dial>
                                <v-img :src="getPortfolio(n+1)" alt="Portfolio Image"></v-img>
                              </v-card>
                            </v-col>
                          </v-row>
                        </v-col>
                        <!-- Column 2 -->
                        <!-- column 3 -->
                        <v-col md="3">
                          <v-card color="transparent" class="card-portfolio" hover>
                            <v-speed-dial top right absolute>
                              <template v-slot:activator>
                                <v-btn icon color="transparent">
                                  <img
                                    width="20"
                                    src="/images/resume_themes/theme207/icons/zoom.png"
                                    alt
                                  />
                                </v-btn>
                              </template>
                            </v-speed-dial>
                            <v-img
                              src="/images/resume_themes/theme207/portfolio/1.png"
                              alt="Portfolio Image"
                            ></v-img>
                          </v-card>
                        </v-col>
                        <!-- Column 3 -->
                        <!-- column 4 -->
                        <v-col md="2">
                          <v-row>
                            <v-col cols="12" v-for="n in 2" :key="n">
                              <v-card class="card-portfolio mt-n3 mb-3" hover>
                                <v-speed-dial top right absolute>
                                  <template v-slot:activator>
                                    <v-btn icon color="transparent">
                                      <img
                                        width="20"
                                        src="/images/resume_themes/theme207/icons/zoom.png"
                                        alt
                                      />
                                    </v-btn>
                                  </template>
                                </v-speed-dial>
                                <v-img :src="getPortfolio(n+1)" alt="Portfolio Image"></v-img>
                              </v-card>
                            </v-col>
                          </v-row>
                        </v-col>
                        <!-- Column 4 -->
                      </v-row>
                    </v-card-text>
                  </v-card>
                </v-tab-item>
                <!-- Portfolio -->
                <!-- Education -->
                <v-tab-item>
                  <v-row>
                    <v-col cols="12" sm="6" md="4" v-for="n in 6" :key="n">
                      <v-card class="pa-5 card-education" hover color="#272B2F">
                        <div class="d-flex flex-no-wrap justify-space-between">
                          <v-avatar
                            class="mt-6"
                            tile
                            size="100"
                            height="120"
                            color="rgba(252, 65, 60, 0.1)"
                          >
                            <v-img
                              max-width="50"
                              max-height="50"
                              src="/images/resume_themes/theme207/tabs/active/2.png"
                            ></v-img>
                          </v-avatar>
                          <div>
                            <v-card-title class="education-title mb-2">Ryerson University</v-card-title>
                            <v-card-subtitle
                              class="education-subtitle"
                            >Parallel to the Potsgraduate degree in computer security, I studied Digital Marketing.</v-card-subtitle>
                            <v-card-subtitle class="education-session mt-n6" align="right">2010-2013</v-card-subtitle>
                          </div>
                        </div>
                      </v-card>
                    </v-col>
                  </v-row>
                </v-tab-item>
                <!-- Education -->

                <!-- Experience -->
                <v-tab-item>
                  <v-row>
                    <v-col cols="12" sm="6" md="4" v-for="n in 6" :key="n">
                      <v-card class="pa-5 card-education" hover color="#272B2F">
                        <div class="d-flex flex-no-wrap justify-space-between">
                          <v-avatar
                            class="mt-6"
                            tile
                            size="100"
                            height="120"
                            color="rgba(252, 65, 60, 0.1)"
                          >
                            <v-img
                              max-width="50"
                              max-height="50"
                              src="/images/resume_themes/theme207/tabs/active/3.png"
                            ></v-img>
                          </v-avatar>
                          <div>
                            <v-card-title class="education-title mb-2">Ryerson University</v-card-title>
                            <v-card-subtitle
                              class="education-subtitle"
                            >Parallel to the Potsgraduate degree in computer security, I studied Digital Marketing.</v-card-subtitle>
                            <v-card-subtitle class="education-session mt-n6" align="right">2010-2013</v-card-subtitle>
                          </div>
                        </div>
                      </v-card>
                    </v-col>
                  </v-row>
                </v-tab-item>
                <!-- Experience -->

                <!-- Skills -->
                <v-tab-item>
                  <v-row>
                    <v-col cols="12">
                      <v-card color="transparent" flat>
                        <v-tabs
                          v-model="skillTab"
                          centered
                          background-color="transparent"
                          color="#fc413c"
                        >
                          <v-tab
                            class="custom-skill-tab"
                            v-for="skill in skills"
                            :key="skill.id"
                            @click="currentSkillTab = skill.id"
                            :class="[currentSkillTab == skill.id ? 'skill-child-tab-active':'skill-child-tab' ]"
                          >{{skill.title}}</v-tab>
                        </v-tabs>
                      </v-card>
                      <!-- Child Tabs -->
                    </v-col>
                  </v-row>
                  <v-row>
                    <v-col cols="12">
                      <!-- Child Tab Items -->
                      <v-tabs-items v-model="skillTab" style="background:transparent;">
                        <!-- All Programming Languges -->
                        <v-tab-item v-for="n in 4" :key="n">
                          <v-card flat color="transparent">
                            <v-card-text>
                              <v-row>
                                <v-col
                                  md="4"
                                  sm="6"
                                  cols="12"
                                  v-for="item in childSkills"
                                  :key="item.id"
                                >
                                  <v-card class="pa-5 card-education" hover color="#272B2F">
                                    <div class="d-flex flex-no-wrap">
                                      <v-avatar
                                        class
                                        tile
                                        size="100"
                                        height="120"
                                        color="rgba(252, 65, 60, 0.1)"
                                      >
                                        <v-img
                                          max-width="50"
                                          max-height="50"
                                          src="/images/resume_themes/theme207/tabs/active/4.png"
                                        ></v-img>
                                      </v-avatar>
                                      <div class="flex-fill">
                                        <v-card-title
                                          class="education-title mb-2"
                                          style="margin-top:-22px;"
                                        >PHP</v-card-title>
                                        <div class="ml-3">
                                          <v-progress-linear
                                            style="border:3px solid #272B2F; border-radius:12px;"
                                            class="custom-progress-bar"
                                            color="#eeeeee"
                                            rounded
                                            background-color="#FC413C"
                                            height="15"
                                            :value="item.value"
                                          ></v-progress-linear>
                                        </div>
                                      </div>
                                    </div>
                                  </v-card>
                                </v-col>
                              </v-row>
                            </v-card-text>
                          </v-card>
                        </v-tab-item>
                      </v-tabs-items>
                      <!-- All Programming Languages -->
                      <!-- Child tab items -->
                    </v-col>
                  </v-row>
                </v-tab-item>
                <!-- Skills -->
                <!-- Media -->
                <v-tab-item>
                  <v-card flat color="transparent"></v-card>
                </v-tab-item>
                <!-- Media -->
                <!-- About Me -->
                <v-tab-item>
                  <v-card flat color="transparent" class="mt-5">
                    <div class="d-flex flex-no-wrap">
                      <v-avatar size="250" class="about-me-photo" tile>
                        <v-img src="/images/resume_themes/theme207/avatar.png"></v-img>
                      </v-avatar>
                      <div class="flex-fill">
                        <v-card-text
                          class="about-me-text"
                        >Donec a augue gravida, vulputate ligula et, pellentesque arcu. Morbi feugiat eros nec sem ultrices, et venenatis velit posuere. Donec bibendum commodo dui, eget sollicitudin urna sagittis non. Donec ac commodo tortor. Interdum et malesuada fames ac ante ipsum primis in faucibus. Mauris gravida laoreet lacus, non hendrerit elit suscipit a. Nunc ut ultricies massa, eu sollicitudin enim. Praesent quis ultrices nibh. Donec bibendum elit sed erat convallis, at feugiat arcu mollis. Nunc quam eros, venenatis id tristique malesuada, ornare eu augue. Aliquam volutpat eros id libero posuere vestibulum.</v-card-text>
                      </div>
                    </div>
                  </v-card>
                </v-tab-item>
                <!-- About Me -->
              </v-tabs-items>
            </v-card>
          </v-col>
        </v-row>
      </v-container>
      <!-- Tab items container -->

      <v-card height="50" v-show="currentTab==5" tile>
        <v-footer absolute class="font-weight-medium" color="#272B2F">
          <v-col class="text-center" cols="12">
            <div class="d-flex">
              <div class="p-2">Avatar</div>
              <div class="p-2">Audio Name</div>
              <div class="p-2">Avatar</div>
              <div class="p-2">Player Controls</div>
            </div>
          </v-col>
        </v-footer>
      </v-card>
    </v-container>
    <!-- Main container -->
  </v-app>
</template>

<script>
export default {
  data() {
    return {
      drawer: false,
      mainDataTab: "",
      skillTab: "",
      currentTab: 1,
      currentSkillTab: 1,
      personalData: {
        name: "Liam McDevitt",
        designation: "FrontEnd Developer",
        detail:
          "Donec a augue gravida, vulputate ligula et, pellentesque arcu. Morbi feugiat eros nec sem ultrices..."
      },
      socialIcons: [
        { id: 1, title: "twitter" },
        { id: 2, title: "facebook" },
        { id: 3, title: "instagram" }
      ],
      tabItems: [
        { id: 1, title: "Portfolio" },
        { id: 2, title: "Education" },
        { id: 3, title: "Experience" },
        { id: 4, title: "Skills" },
        { id: 5, title: "Media" },
        { id: 6, title: "About Me" }
      ],
      portfolioItems: [
        { id: 1, image: 1 },
        { id: 2, image: 2 },
        { id: 3, image: 3 },
        { id: 4, image: 4 },
        { id: 5, image: 1 },
        { id: 6, image: 2 },
        { id: 7, image: 3 },
        { id: 8, image: 4 }
      ],
      experienceItems: [
        {
          id: 1,
          title: "Front End Developer",
          detail:
            "Parallel to the Potsgraduate degree in computer security, I studied Digital Marketing.",
          session: "2010-2013"
        },
        {
          id: 2,
          title: "UX/UI Designer",
          detail:
            "Parallel to the Potsgraduate degree in computer security, I studied Digital Marketing.",
          session: "2010-2013"
        },
        {
          id: 2,
          title: "Graphic Design",
          detail:
            "Parallel to the Potsgraduate degree in computer security, I studied Digital Marketing.",
          session: "2010-2013"
        }
      ],
      skills: [
        { id: 1, title: "Programming Languages" },
        { id: 2, title: "Frameworks" },
        { id: 3, title: "Design Skills" },
        { id: 4, title: "Software" }
      ],
      childSkills: [
        { id: 1, title: "Flutter", value: 85, value_text: "85%" },
        { id: 2, title: "Angular", value: 85, value_text: "85%" },
        { id: 3, title: "React", value: 85, value_text: "85%" }
      ]
    };
  },
  methods: {
    getSocialIcon(title) {
      return `/images/resume_themes/theme207/social_icons/${title}.webp`;
    },
    getTabIcon(id) {
      return `/images/resume_themes/theme207/tabs/${id}.png`;
    },
    getTabActiveIcon(id) {
      return `/images/resume_themes/theme207/tabs/active/${id}.png`;
    },
    getTabIconMobile(id) {
      return `/images/resume_themes/theme207/tabs-mobile/${id}.png`;
    },
    getPortfolio(image) {
      return `/images/resume_themes/theme207/portfolio/${image}.png`;
    }
  }
};
</script>

<style scoped lang="scss">
@import url("https://fonts.googleapis.com/css?family=Open+Sans&display=swap");
@import url("https://fonts.googleapis.com/css2?family=Poppins&display=swap");
@import url("https://fonts.googleapis.com/css2?family=Roboto&display=swap");

.hr-line {
  margin-top: 20px;
  width: 85%;
  border: 1px solid #ffffff;
  opacity: 0.1;
}
.custom-avatar {
  background: #272b2f;
  border: 10px solid #272b2f;
  box-shadow: 5px 5px 9px rgba(0, 0, 0, 0.2);
  border-radius: 9px;
}

.custom-profile-title {
  font-family: "Open Sans" !important;
  font-weight: bold;
  font-size: 2.5rem;
  line-height: 3.375rem;
  color: #ffffff !important;
  @media screen and(max-width:959px) {
    font-size: 1.5rem;
  }
}

.custom-profile-subtitle {
  font-family: "Poppins", sans-serif !important;
  color: #fc413c !important;
  font-size: 1.25rem !important;
  font-weight: bold;
  line-height: 1.875rem;
  @media screen and(max-width:959px) {
    font-size: 1rem !important;
  }
}

.custom-profile-text {
  font-family: "Poppins", sans-serif !important;
  color: #000000 !important;
  font-size: 0.9rem;
  line-height: 1.6888rem;
}
// Availibility
.hour-rate {
  font-family: "Poppins", sans-serif !important;
  font-size: 2rem;
  color: #febc2c;
  img {
    width: 35px;
    height: 35px;
  }
}
.hour-rate-text {
  font-family: "Poppins", sans-serif !important;
  font-size: 0.875rem;
  color: #febc2c;
}
// Availibilty

.hour-card {
  margin-top: -92px !important;
  @media screen and (max-width: 959px) {
    margin-top: 0px !important;
  }
}
.hire-me-card {
  margin-top: -70px;
  @media screen and (max-width: 959px) {
    margin-top: 0px;
  }
}

.btn-hire-me {
  text-transform: capitalize !important;
  border-radius: 5px !important;
  width: 200px;
  @media screen and (max-width: 1024px) {
    width: 120px;
  }
  @media screen and (max-width: 959px) {
    width: 225px;
  }
  @media screen and (max-width: 599px) {
    color: #5843be !important;
  }
}
.custom-social-btn {
  max-width: 36px !important;
  height: 51px !important;
  border-radius: 5px !important;

  @media screen and (min-width: 960px) and (max-width: 1024px) {
    min-width: 45px !important;
  }

  @media screen and (max-width: 599px) {
    height: 30px !important;
    width: 30px !important;
    border-radius: 5px;
    box-shadow: 1.5px 1.5px 3px rgba(35, 35, 35, 0.4),
      -1px -1px 3px rgba(206, 206, 206, 0.24) !important;
  }
}
// Tabs
.ct-tab {
  font-family: "Poppins", sans-serif !important;
  font-weight: 500;
  line-height: 30px;
  color: #ffffff !important;
  img {
    width: 20px;
    height: 20px;
  }
  @media screen and (max-width: 959px) {
    span {
      display: none;
    }
  }
}
.custom-active-tab {
  font-family: "Poppins", sans-serif !important;
  font-weight: bold;
  color: #fc413c !important;
  @media screen and (max-width: 959px) {
    span {
      font-size: 14px !important;
      display: inline;
    }
    img {
      width: 16px;
      height: 16px;
    }
  }
}
// Tabs
// Portfolio
.card-portfolio {
  border-radius: 10px !important;
}
//Portfolio

//education
.card-education {
  border-radius: 9px !important;
}
.education-title {
  font-family: "Roboto", sans-serif !important;
  color: #ffffff !important;
  font-weight: bold !important;
  line-height: 30px !important;
  img {
    width: 40px;
  }
}
.experience-title {
  font-family: "Roboto", sans-serif !important;
  color: #ffffff !important;
  font-weight: bold !important;
  line-height: 30px !important;
  img {
    width: 30px;
  }
}
.education-subtitle {
  font-family: "Roboto", sans-serif !important;
  color: #ffffff !important;
  line-height: 23px;
  font-size: 0.875rem !important;
}
.education-session {
  font-family: "Roboto", sans-serif !important;
  color: #ffffff !important;
  font-size: 0.75rem !important;
}
//education
// Skill tab
.skill-child-tab {
  font-family: "Poppins", sans-serif !important;
  color: #ffffff !important;
}

.skill-child-tab-active {
  font-family: "Poppins", sans-serif !important;
  color: #fc413c;
  font-weight: 600;
}

.skill-title {
  font-family: "Roboto", sans-serif !important;
  color: #ffffff !important;
  font-weight: bold;
  font-size: 1rem;
  line-height: 1.438rem;
}
.custom-progress-bar {
  background: #eeeeee !important;
  box-shadow: inset 1px 1px 2px rgba(174, 174, 192, 0.2),
    inset -1px -1px 1px rgba(255, 255, 255, 0.7) !important;
  border-radius: 12px !important;
}
// Skill tab
// about me
.about-me-title {
  font-family: "Poppins", sans-serif !important;
  color: #5843be !important;
  font-weight: bold !important;
}
.about-me-text {
  font-family: "Poppins", sans-serif !important;
  color: #ffffff !important;
}
// about me
//media
.audio-title {
  font-family: "Poppins", sans-serif !important;
  line-height: 27px;
}
.audio-duration {
  font-family: "Poppins", sans-serif !important;
  color: rgba(88, 67, 190, 0.55) !important;
  font-size: 0.75rem !important;
}
.video-duration {
  font-family: Poppins;
  position: absolute;
  bottom: 8px;
  left: 16px;
  font-size: 12px !important;
  border-radius: 3px;
}

.play-btn {
  img {
    width: 16px;
  }
}
.video-play-btn {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  img {
    width: 16px;
  }
}

// Mobile version
.custom-toolbar-title-mobile {
  font-family: "Open Sans" !important;
  font-weight: bold !important;
  color: #333333;
  font-size: 1rem !important;
}
.profile-text-mobile {
  font-family: Poppins;
  font-style: normal;
  font-weight: normal;
  font-size: 20px;
  line-height: 30px;
  color: #5843be;
  opacity: 0.5;
}

.profile-title-mobile {
  font-family: "Open Sans" !important;
  font-style: normal;
  font-weight: bold;
  font-size: 1.25rem !important;
  line-height: 33px;
  color: #5843be !important;
}

.profile-subtitle-mobile {
  font-family: "Open Sans" !important;
  font-style: normal;
  font-weight: normal;
  font-size: 0.875rem !important;
  line-height: 33px;
  color: #5843be !important;
}
.about-me-photo {
  background: #272b2f;
  border: 15px solid #272b2f;
  box-shadow: 5px 5px 9px rgba(0, 0, 0, 0.2);
  border-radius: 9px;
}
.about-me-title-mobile {
  font-family: "Poppins" sans-serif !important;
  font-style: normal;
  font-weight: bold;
  font-size: 12px;
  line-height: 18px;
  color: #5843be;
}
.about-me-text-mobile {
  font-family: "Poppins" sans-serif !important;
  font-style: normal;
  font-weight: normal;
  font-size: 12px;
  line-height: 18px;
  color: #5843be !important;
}
.active-mobile-tab {
  background: #eeeeee;
  border: 3px solid #eeeeee;
  box-shadow: inset 1.5px 1.5px 1px rgba(174, 174, 192, 0.2),
    inset -1px -1px 1px rgba(255, 255, 255, 0.7);
  border-radius: 5px;
  span {
    font-family: "Poppins" sans-serif !important;
    color: #5843be;
    font-size: 10px !important;
    text-transform: capitalize;
  }
}

.custom-skill-tab {
  @media screen and (max-width: 599px) {
    font-size: 12px !important;
  }
}

.availibilty-col {
  @media screen and (min-width: 1025px) {
    margin-left: -52px;
  }
  @media screen and (max-width: 1024px) {
    margin-left: -20px;
  }
}
</style>

<style>
#resumetheme207 .v-progress-linear__determinate {
  border-color: #272b2f !important;
}

#resumetheme207 .v-progress-linear__background {
  background: #272b2f !important;
  box-shadow: inset 1px 1px 2px rgba(174, 174, 192, 0.2),
    inset -1px -1px 1px rgba(255, 255, 255, 0.7) !important;
}

#resumetheme207 .v-slide-group__prev.v-slide-group__prev--disabled {
  display: none !important;
}
</style>