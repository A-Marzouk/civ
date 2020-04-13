<template>
  <v-app style="width:100%;">
    <v-container fluid ma-0 pa-0 style="width:100%;">
      <!-- For Desktop and Tablet -->
      <v-app-bar color="#fafafa" height="250" class="hidden-xs-only">
        <v-avatar size="120" class="mr-5">
          <v-img src="/images/resume_themes/theme206/avatar.png"></v-img>
        </v-avatar>
        <div class="half-circle"></div>
        <v-container fluid pa-0 ma-0 style="width:100%">
          <v-row class align="center" justify="center" dense>
            <v-col md="4" sm="7">
              <v-card flat color="transparent" class="pa-0">
                <v-card-title class="custom-profile-title">{{personalData.name}}</v-card-title>
                <v-card-subtitle class="custom-profile-subtitle">{{personalData.designation}}</v-card-subtitle>
                <v-card-text class="custom-profile-text hidden-sm-and-down">{{personalData.detail}}</v-card-text>
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

            <!-- Availibility -->
            <v-col md="3" sm="6">
              <!-- Hour rate -->
              <v-card
                class="d-flex flex-row hour-card mt-0 mt-sm-n5 mt-md-n10"
                color="transparent"
                flat
              >
                <v-list-item two-line class>
                  <v-list-item-avatar size="18">
                    <img width="18" src="/images/resume_themes/theme206/icons/usd.png" />
                  </v-list-item-avatar>
                  <v-list-item-content>
                    <v-list-item-subtitle>
                      <v-card color="transparent" flat class="pa-0 ma-0">
                        <span class="hour-rate">Hour Rate</span>
                      </v-card>
                    </v-list-item-subtitle>
                    <v-list-item-subtitle>
                      <v-card color="transparent" flat>
                        <span class="rate">20</span>
                      </v-card>
                    </v-list-item-subtitle>
                  </v-list-item-content>
                </v-list-item>

                <!-- Hour Rate -->
                <!-- Weekly availibility -->

                <v-list-item two-line class="ml-n10">
                  <v-list-item-avatar size="16">
                    <img width="16" src="/images/resume_themes/theme206/icons/watch.png" />
                  </v-list-item-avatar>
                  <v-list-item-content>
                    <v-list-item-subtitle>
                      <v-card color="transparent" flat>
                        <span class="hour-rate">Weekly availibility</span>
                      </v-card>
                    </v-list-item-subtitle>
                    <v-list-item-subtitle>
                      <v-card color="transparent" class="pa-0 ma-0" flat>
                        <span class="rate">250</span>
                      </v-card>
                    </v-list-item-subtitle>
                  </v-list-item-content>
                </v-list-item>
                <!-- Weekly availibility -->
              </v-card>
            </v-col>
            <!-- Availibility  -->

            <!-- 3rd column -->
            <v-col md="5" class="hidden-sm-and-down">
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
      <!-- For mobile version only -->
      <v-app-bar class="hidden-sm-and-up" color="#fafafa">
        <v-btn icon color="#333333" @click.stop="drawer = !drawer">
          <v-app-bar-nav-icon color="#333333"></v-app-bar-nav-icon>
        </v-btn>
        <v-toolbar-title class="custom-toolbar-title-mobile">{{personalData.name}}</v-toolbar-title>
      </v-app-bar>
      <v-navigation-drawer app color="#fafafa" v-model="drawer" temporary absolute width="350">
        <v-card flat color="transparent">
          <v-card-title class="profile-text-mobile">Profile</v-card-title>
          <v-list-item class="mt-n12">
            <v-list-item-avatar size="80">
              <v-img src="/images/resume_themes/theme206/avatar.png"></v-img>
            </v-list-item-avatar>
            <div class="half-circle-mobile"></div>
            <v-list-item-content class="mt-12">
              <v-list-item-title>
                <v-card color="transparent" class="pa-2" flat>
                  <span class="profile-title-mobile">{{ personalData.name }}</span>
                </v-card>
              </v-list-item-title>
              <v-list-item-subtitle>
                <v-card flat color="transparent" class="pa-2 mt-n5">
                  <span class="profile-subtitle-mobile">{{ personalData.designation }}</span>
                </v-card>
              </v-list-item-subtitle>
              <v-list-item-title>
                <v-card height="50" flat color="transparent" class="mt-2">
                  <v-btn
                    x-small
                    class="custom-social-btn mx-2"
                    v-for="item in socialIcons"
                    :key="item.title"
                    color="#FAFAFA"
                    height="40"
                  >
                    <img
                      :width="item.title == 'facebook'? '8' : '14' "
                      :src="getSocialIcon(item.title)"
                    />
                  </v-btn>
                </v-card>
              </v-list-item-title>
            </v-list-item-content>
          </v-list-item>
          <v-card-text>
            <v-btn color="#FAFAFA" class="btn-hire-me" block>
              <v-icon color="#5843BE" left>mdi-email-outline</v-icon>Hire Me
            </v-btn>
          </v-card-text>
        </v-card>
        <v-card flat color="transparent">
          <v-card-title class="about-me-title-mobile">About Me</v-card-title>
          <v-card-text
            class="about-me-text-mobile"
          >Donec a augue gravida, vulputate ligula et, pellentesque arcu. Morbi feugiat eros nec sem ultrices, et venenatis velit posuere. Donec bibendum commodo dui, eget sollicitudin urna sagittis non. Donec ac commodo tortor..</v-card-text>
        </v-card>
      </v-navigation-drawer>
      <!-- For mobile version only -->
      <!-- ....................................................................................................... -->

      <!-- Tab Container -->
      <v-container fluid style="width:100%">
        <v-row justify="center" align="center">
          <v-col cols="12" md="11">
            <!-- for mobile version  -->
            <v-tabs v-model="mainDataTab" fixed-tabs hide-slider>
              <v-tab
                class="hidden-sm-and-up"
                v-for="tab in tabItems"
                :key="tab.id"
                @click="currentTab=tab.id"
                :class="[
                  currentTab == tab.id ? 'active-mobile-tab' : ''
                ]"
              >
                <v-avatar tile size="16">
                  <img
                    :src="getTabIcon(tab.id)"
                    width="16"
                  />
                </v-avatar>
                <span class="ml-2" v-if="currentTab == tab.id">{{tab.title}}</span>
              </v-tab>
            </v-tabs>
            <!-- for mobile version  -->
            <!-- tab for desktop and tablet -->
            <v-tabs v-model="mainDataTab" centered hide-slider grow class="hidden-xs-only">
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
                  <img :src="getTabIcon(tab.id)" class="mr-md-4" />
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
              <v-tabs-items v-model="mainDataTab">
                <!-- Portfolio -->
                <v-tab-item>
                  <v-card color="transparent" flat>
                    <v-card-text>
                      <v-row>
                        <v-col
                          cols="12"
                          sm="6"
                          md="3"
                          v-for="item in portfolioItems"
                          :key="item.id"
                        >
                          <v-card class="card-portfolio" hover>
                            <v-img :src="getPortfolio(item.image)"></v-img>
                          </v-card>
                        </v-col>
                      </v-row>
                    </v-card-text>
                  </v-card>
                </v-tab-item>
                <!-- Portfolio -->
                <!-- Education -->
                <v-tab-item>
                  <v-row>
                    <v-col cols="12" sm="6" md="4" v-for="n in 3" :key="n">
                      <v-card class="card-education pa-5" hover>
                        <v-card-title class="education-title">
                          Ryerson University
                          <v-spacer></v-spacer>
                          <span class="ml-12">
                            <img src="/images/resume_themes/theme206/tabs/2.png" alt />
                          </span>
                        </v-card-title>
                        <v-card-text
                          class="education-subtitle"
                        >Parallel to the Potsgraduate degree in computer security, I studied Digital Marketing.</v-card-text>
                        <v-card-actions class="education-session">2010-2013</v-card-actions>
                      </v-card>
                    </v-col>
                  </v-row>
                </v-tab-item>
                <!-- Education -->

                <!-- Experience -->
                <v-tab-item>
                  <v-row>
                    <v-col cols="12" sm="6" md="4" v-for="item in experienceItems" :key="item.id">
                      <v-card class="card-education pa-5" hover>
                        <v-card-title class="experience-title">
                          {{item.title}}
                          <v-spacer></v-spacer>
                          <span class="ml-12">
                            <img src="/images/resume_themes/theme206/tabs/3.png" alt />
                          </span>
                        </v-card-title>
                        <v-card-text class="education-subtitle">{{item.detail}}</v-card-text>
                        <v-card-actions class="education-session">{{item.session}}</v-card-actions>
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
                        <v-tabs v-model="skillTab" hide-slider centered>
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
                      <v-tabs-items v-model="skillTab">
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
                                  <v-card color="#FAFAFA">
                                    <v-card-text>
                                      <v-row>
                                        <v-col cols="6" class="skill-title">{{item.title}}</v-col>
                                        <v-col
                                          cols="6"
                                          align="right"
                                          class="skill-title"
                                        >{{item.value_text}}</v-col>
                                        <v-col cols="12">
                                          <v-progress-linear
                                            style="border:3px solid #F0F0F3; border-radius:12px;"
                                            class="custom-progress-bar"
                                            color="#5843BE"
                                            rounded
                                            background-color="#eeeeee"
                                            height="15"
                                            :value="item.value"
                                          ></v-progress-linear>
                                        </v-col>
                                      </v-row>
                                    </v-card-text>
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
                  <v-card flat color="transparent">
                    <v-card-text>
                      <v-row>
                        <v-col cols="12" sm="6" md="4" v-for="n in 6" :key="n">
                          <v-card color="#F0F0F3" style="border-radius:9px;" hover>
                            <v-card-text>
                              <v-list-item>
                                <v-list-content>
                                  <v-list-title class="audio-title">AUDIO 02 - 07/04/2020</v-list-title>
                                  <v-list-item-subtitle class="audio-duration">1:05:00</v-list-item-subtitle>
                                </v-list-content>
                                <v-spacer></v-spacer>
                                <v-list-item-icon>
                                  <v-btn class="play-btn" color="#5843BE" depressed fab small>
                                    <v-icon color="white">mdi-play</v-icon>
                                  </v-btn>
                                </v-list-item-icon>
                              </v-list-item>
                            </v-card-text>
                            <v-card-text class="ml-3 mt-n10">
                              <v-row>
                                <v-col cols="9">
                                  <v-progress-linear
                                    style="border:3px solid #EEEEEE; border-radius:12px;"
                                    class="custom-progress-bar"
                                    color="#5843BE"
                                    rounded
                                    background-color="#eeeeee"
                                    height="15"
                                    :value="60"
                                  ></v-progress-linear>
                                </v-col>
                              </v-row>
                            </v-card-text>
                          </v-card>
                        </v-col>
                      </v-row>
                    </v-card-text>
                  </v-card>
                </v-tab-item>
                <!-- Media -->
                <!-- About Me -->
                <v-tab-item>
                  <v-card flat color="transparent">
                    <v-card-title class="about-me-title">About Me</v-card-title>
                    <v-card-text
                      class="about-me-text"
                    >Donec a augue gravida, vulputate ligula et, pellentesque arcu. Morbi feugiat eros nec sem ultrices, et venenatis velit posuere. Donec bibendum commodo dui, eget sollicitudin urna sagittis non. Donec ac commodo tortor. Interdum et malesuada fames ac ante ipsum primis in faucibus. Mauris gravida laoreet lacus, non hendrerit elit suscipit a. Nunc ut ultricies massa, eu sollicitudin enim. Praesent quis ultrices nibh. Donec bibendum elit sed erat convallis, at feugiat arcu mollis. Nunc quam eros, venenatis id tristique malesuada, ornare eu augue. Aliquam volutpat eros id libero posuere vestibulum.</v-card-text>
                  </v-card>
                </v-tab-item>
                <!-- About Me -->
              </v-tabs-items>
            </v-card>
          </v-col>
        </v-row>
      </v-container>
      <!-- Tab items container -->
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
        name: "Hean Prinsloo",
        designation: "Graphic Designer",
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
      return `/images/resume_themes/theme206/social_icons/${title}.webp`;
    },
    getTabIcon(id) {
      return `/images/resume_themes/theme206/tabs/${id}.png`;
    },
    getTabIconMobile(id) {
      return `/images/resume_themes/theme206/tabs-mobile/${id}.png`;
    },
    getPortfolio(image) {
      return `/images/resume_themes/theme206/portfolio/${image}.png`;
    }
  }
};
</script>

<style scoped lang="scss">
@import url("https://fonts.googleapis.com/css?family=Open+Sans&display=swap");
@import url("https://fonts.googleapis.com/css2?family=Poppins&display=swap");
@import url("https://fonts.googleapis.com/css2?family=Roboto&display=swap");

.half-circle {
  position: absolute;
  width: 136px;
  height: 68px; /* as the half of the width */
  border-radius: 100px 100px 0px 0;
  border-left: 5px solid #5843be;
  border-right: 5px solid #5843be;
  border-top: 5px solid #5843be;
  margin-top: 19px;
  margin-left: 22px;
  transform: rotate(122deg);
  z-index: 1;

  @-moz-document url-prefix() {
    margin-top: 37px !important;
    margin-left: 23px !important;
  }
}

.half-circle-mobile {
  position: absolute;
  width: 100px;
  height: 50px; /* as the half of the width */
  border-radius: 100px 100px 0px 0;
  border-left: 3px solid #5843be;
  border-right: 3px solid #5843be;
  border-top: 3px solid #5843be;
  margin-top: 13px;
  margin-left: 10px;
  transform: rotate(122deg);
  z-index: 1;

  @-moz-document url-prefix() {
    margin-top: 23px !important;
    margin-left: 9px !important;
  }
}

.custom-profile-title {
  font-family: "Open Sans" !important;
  font-weight: bold;
  font-size: 2rem;
  line-height: 3.375rem;
  color: #333333 !important;
  @media screen and(max-width:959px) {
    font-size: 1.5rem;
  }
}

.custom-profile-subtitle {
  font-family: "Poppins", sans-serif !important;
  color: #333333 !important;
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

.hour-rate {
  font-family: "Poppins", sans-serif !important;
  color: rgba(88, 67, 190, 0.5) !important;
  font-size: 0.625rem;
  line-height: 1.313rem;
  text-transform: uppercase;
  @media screen and (max-width: 1280px) {
    font-size: 0.55rem;
  }
}
.rate {
  font-family: "Poppins", sans-serif !important;
  color: #5843be !important;
  font-size: 2.5rem;
  line-height: 3rem;
  font-weight: bold;
}
.btn-hire-me {
  text-transform: capitalize !important;
  width: 200px;
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
  background: #f0f0f3;
  box-shadow: 1.5px 1.5px 3px rgba(174, 174, 192, 0.4), -1px -1px 3px #ffffff;
  border-radius: 5px;
  color: #5843be !important;
  line-height: 30px;
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
  background: #eeeeee;
  border: 5px solid #eeeeee;
  box-shadow: inset 1.5px 1.5px 1px rgba(174, 174, 192, 0.2),
    inset -1px -1px 1px rgba(255, 255, 255, 0.7);
  border-radius: 5px;
  img {
    width: 24px;
    height: 24px;
    transition: 1s !important;
  }
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
  border-radius: 30px !important;
}
//Portfolio

//education
.card-education {
  background: linear-gradient(0deg, #fafafa, #fafafa) !important;
  box-shadow: 0px 6px 6px rgba(0, 0, 0, 0.1) !important;
  border-radius: 30px !important;
}
.education-title {
  font-family: "Roboto", sans-serif !important;
  color: #333333 !important;
  font-weight: bold !important;
  line-height: 30px !important;
  img {
    width: 40px;
  }
}
.experience-title {
  font-family: "Roboto", sans-serif !important;
  color: #333333 !important;
  font-weight: bold !important;
  line-height: 30px !important;
  img {
    width: 30px;
  }
}
.education-subtitle {
  font-family: "Roboto", sans-serif !important;
  color: #333333 !important;
  line-height: 23px;
  font-size: 1.125rem !important;
}
.education-session {
  font-family: "Roboto", sans-serif !important;
  color: rgba(51, 51, 51, 0.5) !important;
}
//education
// Skill tab
.skill-child-tab {
  font-family: "Poppins", sans-serif !important;
  color: #333333 !important;
}

.skill-child-tab-active {
  font-family: "Poppins", sans-serif !important;
  color: #5843be;
  font-weight: 600;
  background: #eeeeee;
  box-shadow: inset 1.5px 1.5px 1px rgba(174, 174, 192, 0.2),
    inset -1px -1px 1px rgba(255, 255, 255, 0.7);
  border-radius: 5px;
}

.skill-title {
  font-family: "Roboto", sans-serif !important;
  color: #333333 !important;
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
  color: #000000 !important;
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
</style>

<style>
#resumeTheme206 .v-progress-linear__determinate {
  border-color: #eeeeee !important;
}

#resumeTheme206 .v-progress-linear__background {
  background: #eeeeee !important;
  box-shadow: inset 1px 1px 2px rgba(174, 174, 192, 0.2),
    inset -1px -1px 1px rgba(255, 255, 255, 0.7) !important;
}

#resumeTheme206 .v-slide-group__prev.v-slide-group__prev--disabled {
  display: none !important;
}
</style>