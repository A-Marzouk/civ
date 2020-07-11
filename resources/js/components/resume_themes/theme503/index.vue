//theme-41-v2
<template>
  <v-app id="theme503">
    <v-row class="mt-6" no-gutters>
      <v-col
        xl="9"
        lg="9"
        md="9"
        sm="12"
        cols="12"
        :class="{ 'active-indicator': currentTab === 'profile' }"
      >
        <v-row align="center" no-gutters>
          <v-col
            cols="3"
            sm="2"
            md="3"
            lg="2"
            xl="2"
            class="ml-md-0 ml-sm-12 ml-4"
          >
            <v-img
              :src="currentUser.personal_info.profile_pic"
              :aspect-ratio="0.92"
              class="avatar mt-1"
              style="border-radius: 0px 1rem 2rem 0px ;"
            ></v-img>
          </v-col>
          <v-col
            cols="7"
            sm="9"
            md="7"
            lg="9"
            xl="9"
            class="pl-sm-6 pl-md-3 pl-lg-6 pl-3"
          >
            <div class="head font-weight-bold">
              {{ currentUser.personal_info.full_name }}
              <div
                class="text-left d-md-inline-block hidden-sm-and-down ml-lg-4"
              >
                <v-btn fab color="#3E56CD" small elevation="0">
                  <v-img
                    src="/images/resume_themes/theme502/location.svg"
                    width="16"
                    height="16"
                    contain
                  ></v-img>
                </v-btn>
                <v-btn fab color="#3E56CD" small class="mx-3" elevation="0">
                  <v-img
                    src="/images/resume_themes/theme502/socail_icons/whatsapp.svg"
                    width="16"
                    height="16"
                    contain
                  ></v-img>
                </v-btn>
                <v-btn fab color="#3E56CD" small elevation="0">
                  <v-img
                    src="/images/resume_themes/theme502/socail_icons/google-plus.svg"
                    width="18"
                    height="18"
                    contain
                  ></v-img>
                </v-btn>
              </div>
              <div
                class="text-left d-sm-inline-block d-lg-none d-xl-none hidden-md-and-up d-none"
              >
                <v-btn class="px-0 ml-8 mr-6" color="#3E56CD" fab elevation="0">
                  <v-img
                    width="18"
                    height="18"
                    contain
                    src="/images/resume_themes/theme502/email.svg"
                  ></v-img>
                </v-btn>
                <v-btn
                  class="px-0 mr-6"
                  color="#3E56CD"
                  small
                  fab
                  elevation="0"
                >
                  <v-img
                    width="24"
                    height="24"
                    contain
                    src="/images/resume_themes/theme502/pdf.svg"
                  ></v-img>
                </v-btn>
              </div>
            </div>

            <div class="subhead grey--text text--darken-1 pb-sm-8 pb-4">
              {{ currentUser.personal_info.designation }}
            </div>

            <div class="text-left hidden-sm-only">
              <v-btn class="px-0 mr-4" color="#3E56CD" fab elevation="0">
                <v-img
                  width="18"
                  height="18"
                  contain
                  src="/images/resume_themes/theme502/email.svg"
                ></v-img>
              </v-btn>
              <v-btn class="px-0 mr-4" color="#3E56CD" small fab elevation="0">
                <v-img
                  width="24"
                  height="24"
                  contain
                  src="/images/resume_themes/theme502/pdf.svg"
                ></v-img>
              </v-btn>
            </div>
          </v-col>
        </v-row>
      </v-col>

      <v-col
        xl="3"
        lg="3"
        md="3"
        sm="10"
        cols="12"
        class="padicon mt-8 mt-xl-12 mt-lg-7 ml-lg-auto ml-md-auto ml-xl-auto ml-sm-12 ml-auto pr-xl-0 pr-lg-0 pr-md-0 pr-sm-12 mt-sm-12 ml-sm-0"
      >
        <div class="text-right hidden-sm-and-down">
          <v-btn
            class="px-0 mr-4"
            color="#3E56CD"
            fab
            :href="Userlink.link"
            v-for="Userlink in currentUser.links"
            :key="Userlink.id + '_link'"
            target="_blank"
            v-show="Userlink.is_active && Userlink.is_public"
            small
            elevation="0"
          >
            <v-img
              width="18"
              height="18"
              contain
              :src="
                `/images/resume_themes/theme502/social_icons/${Userlink.link_title.toLowerCase()}.svg`
              "
            ></v-img>
          </v-btn>
        </div>
      </v-col>
      <v-col cols="12" class="mt-12 mt-sm-0">
        <v-sheet
          class="iconmarg hidden-md-and-up"
          width="auto"
          color="transparent"
        >
          <v-slide-group multiple>
            <v-slide-item
              :href="Userlink.link"
              v-for="Userlink in currentUser.links"
              :key="Userlink.id + '_link'"
              target="_blank"
              v-show="Userlink.is_active && Userlink.is_public"
              class="mx-6 hidden-md-and-up"
            >
              <v-btn class fab small color="#3E56CD" elevation="0">
                <v-img
                  width="18"
                  height="18"
                  contain
                  :src="
                    `/images/resume_themes/theme502/social_icons/${Userlink.link_title.toLowerCase()}.svg`
                  "
                ></v-img>
              </v-btn>
            </v-slide-item>
          </v-slide-group>
        </v-sheet>
      </v-col>
    </v-row>
    <v-row
      class="mt-sm-12 mt-md-6 mt-6 mt-lg-4 pt-md-0 pt-6 pt-lg-0 margleft"
      justify="start"
      no-gutters
    >
      <v-col
        lg="8"
        sm="12"
        cols="12"
        xl="8"
        class="tablet mr-xl-12 mr-sm-0 mt-sm-12"
      >
        <v-tabs background-color="transparent" hide-arrows grow class="helo">
          <v-tab
            class="text-center"
            v-for="(tab, tabIndex) in tabs"
            :key="tabIndex"
            @click="activeTab = tab.value"
            :class="[{ 'active-indicator': currentTab === tab.value }]"
          >
            <div class="tabtitle textcol font-weight-bold text-capitalize">
              {{ tab.text }}
            </div>
          </v-tab>
        </v-tabs>
      </v-col>
    </v-row>

    <v-row no-gutters>
      <v-slide-x-reverse-transition>
        <v-col
          md="12"
          cols="12"
          xl="12"
          lg="12"
          sm="12"
          v-if="activeTab == 'about'"
          key="two"
          style="height:100vh;"
        >
          <v-row no-gutters class="padding">
            <v-col xl="12" sm="12" cols="12">
              <h1
                class="textcol head mb-xl-6 mt-xl-12 mb-sm-4 mt-sm-8 mt-6 mb-4"
              >
                About
              </h1>
            </v-col>
            <v-col xl="12" sm="12" cols="12" class="py-xl-4 py-sm-4 py-4">
              <div class="subtitle-2 text-xl-left">
                {{ currentUser.personal_info.about }}
              </div>
              <div class="subtitle-2 text-xl-left">
                {{ currentUser.personal_info.overview }}
              </div>
            </v-col>
          </v-row>
        </v-col>
      </v-slide-x-reverse-transition>
      <v-slide-x-reverse-transition>
        <v-col
          md="12"
          cols="12"
          xl="12"
          lg="12"
          sm="12"
          v-if="activeTab == 'portfolio'"
          key="one"
          style="height:100vh;"
        >
          <v-row
            justify="center"
            align="center"
            class="padleft mt-lg-12 mt-2 mt-sm-6"
            no-gutters
          >
            <v-col
              xl="3"
              md="4"
              lg="4"
              cols="12"
              sm="12"
              class="mx-xl-3 px-lg-3 px-sm-4 py-xl-6 py-sm-2 px-4 py-2"
              v-for="project in currentUser.projects"
              :key="project.id + '_project'"
              v-show="project.is_public"
            >
              <v-img
                :src="getProjectMainImage(project)"
                :aspect-ratio="1.2"
                style="box-shadow: 0px 4px 30px rgba(0, 0, 0, 0.15);border-radius:20px;"
              ></v-img>
            </v-col>
          </v-row>
        </v-col>
      </v-slide-x-reverse-transition>
      <v-slide-x-reverse-transition>
        <v-col
          md="12"
          cols="12"
          xl="12"
          lg="11"
          sm="12"
          v-if="activeTab == 'work-experience'"
          key="two"
          style="height:100vh;"
        >
          <v-row no-gutters class="px-4 px-lg-0 mt-6 px-sm-6">
            <v-col
              md="6"
              sm="12"
              cols="12"
              lg="6"
              v-for="work in currentUser.work_experience"
              :key="work.id"
              v-show="work.is_public"
              class="mt-4 padleft"
            >
              <v-row class="mt-4" no-gutters>
                <v-col md="12" sm="12" cols="12">
                  <h1 class="textcol headline font-weight-bold">
                    {{ work.job_title }}
                  </h1>
                </v-col>
                <v-col md="6" sm="6" cols="6" class="text-md-left mt-2">
                  <h1
                    class="caption font-weight-bold pb-2 mr-lg-12 grey--text text--darken-4"
                  >
                    {{ work.company_name }}
                  </h1>
                </v-col>

                <v-col md="6" sm="6" cols="6" class="mt-2">
                  <h1
                    class="caption font-weight-bold text-right grey--text text--darken-4"
                  >
                    {{ work.date_from }} - {{ work.date_to }}
                  </h1>
                </v-col>
                <v-col md="12" sm="12" cols="12" xl="12" class="my-6">
                  <div
                    class="grey--text text--darken-1 sfont pb-2 font-weight-thin"
                  >
                    {{ work.description }}
                  </div>
                </v-col>
              </v-row>
            </v-col>
          </v-row>
        </v-col>
      </v-slide-x-reverse-transition>
      <v-slide-x-reverse-transition>
        <v-col
          md="12"
          cols="12"
          xl="12"
          lg="12"
          sm="12"
          v-if="activeTab == 'education'"
          key="three"
          style="height:100vh;"
        >
          <v-row justify="start" no-gutters class="px-4 px-lg-0 px-sm-6 mt-6">
            <v-col
              md="6"
              sm="12"
              cols="12"
              lg="6"
              v-for="education in currentUser.education"
              :key="education.id"
              v-show="education.is_public"
              class="mt-4 padleft"
            >
              <v-row justify="start" class no-gutters>
                <v-row class="mt-md-4 mt-4" no-gutters>
                  <v-col md="12" sm="12" cols="12">
                    <h1 class="textcol headline font-weight-bold">
                      {{ education.university_name }}
                    </h1>
                  </v-col>
                  <v-col md="12" sm="12" cols="12" class="text-md-left my-6">
                    <h1
                      class="caption font-weight-bold pb-2 mr-12 grey--text text--darken-4"
                    >
                      {{ education.date_from }} - {{ education.date_to }}
                    </h1>
                  </v-col>

                  <v-col md="12" sm="12" cols="12" xl="12">
                    <div
                      class="grey--text text--darken-1 sfont pb-2 font-weight-thin"
                    >
                      {{ education.degree_title }}
                    </div>
                  </v-col>
                </v-row>
              </v-row>
            </v-col>
          </v-row>
        </v-col>
      </v-slide-x-reverse-transition>
      <v-slide-x-reverse-transition>
        <v-col
          md="12"
          cols="12"
          xl="12"
          lg="12"
          sm="12"
          v-if="activeTab == 'skills'"
          key="four"
          style="height:100vh;"
        >
          <v-row no-gutters justify="start" class="padleft">
            <v-col md="12" lg="12" class="mt-md-8 mt-sm-4">
              <v-tabs
                v-model="tabskill"
                background-color="transparent"
                height="60"
                color="#C10FA0"
                center-active
                hide-arrows
                grow
              >
                <v-tabs-slider
                  style="height:0px;padding:0 0 !important;"
                ></v-tabs-slider>
                <v-tab
                  v-for="item in items"
                  :key="item.id"
                  v-show="
                    currentUser.skills.find(s => s.category == item.value)
                  "
                  exact
                  class="subtitle-1 text-capitalize textcol skilltab"
                  >{{ item.name }}</v-tab
                >
              </v-tabs>

              <v-row no-gutters class="mt-4">
                <v-col md="12" sm="12" cols="12">
                  <v-tabs-items
                    v-model="tabskill"
                    style="background-color:transparent;"
                  >
                    <v-tab-item
                      v-for="item in items"
                      :key="item.id"
                      v-show="
                        currentUser.skills.find(s => s.category == item.value)
                      "
                    >
                      <v-row
                        class="justify-center py-2"
                        align="center"
                        no-gutters
                      >
                        <v-col
                          xl="8"
                          lg="8"
                          md="8"
                          sm="12"
                          cols="12"
                          v-for="(s, index) in currentUser.skills"
                          :key="index"
                          v-show="s.category == item.value"
                          class="px-md-6 my-4 px-2 mx-2"
                        >
                          <v-row
                            no-gutters
                            class="mx-md-0 mx-lg-0 mx-xl-0 mx-sm-12 mx-4"
                            justify="center"
                            align="center"
                          >
                            <v-col cols="12" sm="12" md="3" lg="4" xl="3">
                              <div
                                class="skilltext text-left font-weight-bold mb-sm-1 mb-xs-1"
                              >
                                {{ s.title }} - {{ s.percentage }}
                              </div>
                            </v-col>

                            <v-col cols="12" sm="12" md="9" lg="8">
                              <div class="pro-back ml-md-11 my-5">
                                <div
                                  class="progress"
                                  :style="'width:' + s.percentage"
                                ></div>
                              </div>
                            </v-col>
                          </v-row>
                        </v-col>
                      </v-row>
                    </v-tab-item>
                  </v-tabs-items>
                </v-col>
              </v-row>
            </v-col>
          </v-row>
        </v-col>
      </v-slide-x-reverse-transition>
    </v-row>
  </v-app>
</template>
<style lang="scss" scoped>
@import "resources/sass/themes/theme503.scss";
.v-tabs-bar.v-slide-group--is-overflowing.v-tabs-bar--is-mobile:not(.v-tabs-bar--show-arrows):not(.v-slide-group--has-affixes)
  .v-slide-group__prev {
  display: none !important;
  visibility: hidden;
}
</style>
<script>
export default {
  props: ["user", "is_preview", "currentTab"],
  data() {
    return {
      currentUser: this.user,
      activeTab: "about",

      tabs: [
        {
          text: "About",
          value: "about"
        },
        {
          text: "Portfolio",
          value: "portfolio"
        },
        {
          text: "Work",
          value: "work-experience"
        },
        {
          text: "Education",
          value: "education"
        },
        {
          text: "Skills",
          value: "skills"
        }
      ],
      media: [
        {
          id: 1,
          src: "/images/resume_themes/theme502/location.svg"
        },
        {
          id: 2,
          src: "/images/resume_themes/theme502/whatsapp.svg"
        },
        {
          id: 3,
          src: "/images/resume_themes/theme502/google-plus.svg"
        },
        {
          id: 4,
          src: "/images/resume_themes/theme502/linkedin.svg"
        },
        {
          id: 5,
          src: "/images/resume_themes/theme502/google-plus.svg"
        },
        {
          id: 6,
          src: "/images/resume_themes/theme502/behance.svg"
        },
        {
          id: 7,
          src: "/images/resume_themes/theme502/dribbble.svg"
        },
        {
          id: 8,
          src: "/images/resume_themes/theme502/instagram.svg"
        },
        {
          id: 9,
          src: "/images/resume_themes/theme502/linkedin.svg"
        },
        {
          id: 10,
          src: "/images/resume_themes/theme502/google-plus.svg"
        }
      ],
      icons: [
        {
          id: 1,
          src: "/images/resume_themes/theme502/behance.svg"
        },
        {
          id: 2,
          src: "/images/resume_themes/theme502/dribbble.svg"
        },
        {
          id: 3,
          src: "/images/resume_themes/theme502/instagram.svg"
        },
        {
          id: 4,
          src: "/images/resume_themes/theme502/linkedin.svg"
        },
        {
          id: 5,
          src: "/images/resume_themes/theme502/google-plus.svg"
        }
      ],

      tabskill: null,
      items: [
        {
          id: 1,
          name: "Programming Languages",
          value: "programming_languages"
        },
        {
          id: 2,
          name: "Frameworks/ Databases",
          value: "frameworks"
        },
        {
          id: 3,
          name: "Design Skills",
          value: "design"
        },
        {
          id: 4,
          name: "Software",
          value: "software"
        }
      ]
    };
  },
  watch: {
    // if current tab changed, change the active tab as well.
    currentTab: function(val) {
      this.activeTab = val;
    }
  },
  methods: {
    getProjectMainImage(project) {
      let mainImage = "";

      let images = project.images;
      images.forEach(image => {
        if (image.is_main) {
          mainImage = image;
        }
      });

      return mainImage.src;
    },
    setDummyUser() {
      this.currentUser = this.$store.state.dummyUser;
    }
  },
  mounted() {
    // if there is no user or the preview is true, set dummy user
    if (!this.currentUser || this.is_preview) {
      this.setDummyUser();
    }

    // let user accessible in included components.
    this.$store.dispatch("updateThemeUser", this.currentUser);
  }
};
</script>

