<template>
  <v-app style="width:100%;">
    <v-container fluid ma-0 pa-0 style="width:100%;">
      <v-app-bar color="#fafafa" height="250">
        <v-avatar size="120" class="mr-5">
          <v-img src="/images/resume_themes/theme206/avatar.png"></v-img>
        </v-avatar>
        <div class="half-circle"></div>
        <v-container fluid pa-0 ma-0 style="width:100%">
          <v-row class align="center" justify="center">
            <v-col md="4">
              <v-card flat color="transparent" class="pa-0">
                <v-card-title class="custom-profile-title">Hean Prinsloo</v-card-title>
                <v-card-subtitle class="custom-profile-subtitle">Graphic Designer</v-card-subtitle>
                <v-card-text
                  class="custom-profile-text"
                >Donec a augue gravida, vulputate ligula et, pellentesque arcu. Morbi feugiat eros nec sem ultrices...</v-card-text>
              </v-card>
            </v-col>
            <v-col md="3">
              <!-- Hour rate -->
              <v-card class="d-flex flex-row hour-card" color="transparent" flat>
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

            <!-- 3rd column -->
            <v-col md="5">
              <v-card flat color="transparent" class="pa-0 hire-me-card">
                <v-btn color="#FAFAFA" class="btn-hire-me" x-large>
                  <v-icon color="#5843BE" left>mdi-email</v-icon>Hire Me
                </v-btn>

                <!-- social buttons -->
                <v-btn
                  class="custom-social-btn mx-md-2"
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
          </v-row>
        </v-container>
      </v-app-bar>
      <!-- Tab Container -->
      <v-container fluid style="width:100%">
        <v-row justify="center" align="center">
          <v-col cols="12" md="11">
            <v-tabs v-model="mainDataTab" centered hide-slider grow>
              <v-tab
                v-for="tab in tabItems"
                :key="tab.id"
                @click="currentTab=tab.id"
                class="mx-md-2 text-capitalize"
                :class="[
                currentTab == tab.id ? 'custom-active-tab' : '', 'ct-tab',
              ]"
              >
                <v-avatar tile>
                  <img :src="getTabIcon(tab.id)" class="mr-4" />
                </v-avatar>
                {{ tab.title }}
              </v-tab>
            </v-tabs>
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
                          <v-card class="card-portfolio">
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
                      <v-card class="card-education pa-5">
                        <v-card-title class="education-title">
                          Ryerson University
                          <v-spacer></v-spacer>
                          <span class="ml-12">
                            <img  src="/images/resume_themes/theme206/tabs/2.png" alt />
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
                      <v-card class="card-education pa-5">
                        <v-card-title class="education-title">
                          {{item.title}}
                          <v-spacer></v-spacer>
                          <span class="ml-12">
                            <img  src="/images/resume_themes/theme206/tabs/3.png" alt="" />
                          </span>
                        </v-card-title>
                        <v-card-text
                          class="education-subtitle"
                        >{{item.detail}}</v-card-text>
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
                        <v-tab-item>
                          <v-card flat>
                            <v-card-text>Item 1</v-card-text>
                          </v-card>
                        </v-tab-item>
                      </v-tabs-items>
                      <!-- Child tab items -->
                    </v-col>
                  </v-row>
                </v-tab-item>
                <!-- Skills -->
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
      mainDataTab: "",
      skillTab: "",
      currentTab: 1,
      currentSkillTab: 1,
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
}
.custom-profile-title {
  font-family: "Open Sans" !important;
  font-weight: bold;
  font-size: 2rem;
  line-height: 3.375rem;
  color: #333333 !important;
}

.custom-profile-subtitle {
  font-family: "Poppins", sans-serif !important;
  color: #333333 !important;
  font-size: 1.25rem !important;
  font-weight: bold;
  line-height: 1.875rem;
}

.custom-profile-text {
  font-family: "Poppins", sans-serif !important;
  color: #000000 !important;
  font-size: 0.9rem;
  line-height: 1.6888rem;
}

.hour-card {
  margin-top: -100px;
}
.hire-me-card {
  margin-top: -70px;
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
}
.custom-social-btn {
  max-width: 40px !important;
  height: 51px !important;
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
}
.custom-active-tab {
  font-family: "Poppins", sans-serif !important;
  background: #eeeeee;
  border: 3px solid #eeeeee;
  box-shadow: inset 1.5px 1.5px 1px rgba(174, 174, 192, 0.2),
    inset -1px -1px 1px rgba(255, 255, 255, 0.7);
  border-radius: 5px;
  img {
    width: 24px;
    height: 24px;
    transition: 1s;
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
  img{
    width:40px;
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
// Skill tab
</style>