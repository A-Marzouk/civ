<template>
  <v-app id="theme511" v-if="currentUser">
    <v-container fluid>
      <v-row justify="center" class="px-lg-6 px-sm-4" dense>
        <v-col cols="12" lg="12" class="layer my-lg-5 my-2 my-sm-4">
          <v-container fluid>
            <v-row dense>
              <v-col cols="2" lg="2" sm="3" align="center" align-self="center">
                <v-img
                  @click.stop="drawer = !drawer"
                  :src="currentUser.personal_info.profile_pic"
                  alt="avatar"
                  style="border-radius:50%;"
                  contain
                ></v-img>

                <v-navigation-drawer
                  color="rgba(103, 100, 200, 0.95)"
                  v-model="drawer"
                  absolute
                  hide-overlay
                  temporary
                  class="hidden-sm-and-up"
                >
                  <div class="text-right mt-4">
                    <v-btn text small>
                      <v-icon color="#fff" @click.stop="drawer = !drawer"
                        >close</v-icon
                      >
                    </v-btn>
                  </div>
                  <v-list-item>
                    <v-list-item-content>
                      <v-list-item-title class="menu text-left"
                        >Menu</v-list-item-title
                      >
                    </v-list-item-content>
                  </v-list-item>

                  <v-divider></v-divider>

                  <v-list>
                    <v-list-item
                      v-for="(tab, i) in tabs"
                      :key="i"
                      @click="activeTab = tab.value"
                    >
                      <v-list-item-content
                        :class="[
                          activeTab === tab.value
                            ? 'drawer--tab-active'
                            : 'drawer--tab-disable',
                          'menu--tabs white--text text-left'
                        ]"
                      >
                        <v-list-item-title>{{ tab.name }}</v-list-item-title>
                      </v-list-item-content>
                    </v-list-item>
                  </v-list>
                </v-navigation-drawer>
              </v-col>
              <v-col
                cols="auto"
                lg="4"
                class="pl-lg-8"
                sm="6"
                align-self="center"
                :class="{ 'active-indicator': currentTab === 'profile' }"
              >
                <div class="head">
                  {{ currentUser.personal_info.full_name }}
                </div>
                <div class="subhead">
                  {{ currentUser.personal_info.designation }}
                </div>
                <div
                  class="details hidden-xs-only"
                  v-if="currentUser.personal_info.overview"
                >
                  {{ currentUser.personal_info.overview }}
                </div>
                <div
                  class="hidden-xs-only"
                  :class="{
                    'active-indicator': currentTab === 'pay-availability'
                  }"
                >
                  <div class="info-text d-inline-block mr-6 mr-sm-2">
                    hour rate
                    <div
                      class="info-rate d-inline-block mx-2 mx-sm-1"
                      v-if="currentUser.payment_info"
                    >
                      {{ currentUser.payment_info[0].salary }}
                      {{ currentUser.payment_info[0].currency }}
                    </div>
                  </div>
                  <div class="info-text d-inline-block">
                    Weekly availability
                    <div
                      class="info-rate d-inline-block mx-2 mx-sm-1"
                      v-if="currentUser.availability_info"
                    >
                      {{ currentUser.availability_info[0].available_hours }}
                      Hours
                    </div>
                  </div>
                </div>
              </v-col>
              <v-col
                cols="auto"
                sm="3"
                lg="4"
                class="ml-auto align-self-sm-start"
                align-self="center"
              >
                <div class="text-right mt-lg-4 hidden-md-and-down">
                  <v-btn
                    v-for="Userlink in currentUser.links"
                    :key="Userlink.id + '_link'"
                    v-show="Userlink.is_active && Userlink.is_public"
                    :href="Userlink.link"
                    target="_blank"
                    class="social mx-3"
                    fab
                    elevation="0"
                  >
                    <v-img
                      :src="
                        `/images/resume_themes/theme511/social_icons/${Userlink.link_title.toLowerCase()}Red.svg`
                      "
                      contain
                      max-width="24"
                      height="24"
                    ></v-img>
                  </v-btn>

                  <v-btn
                    class="hire text-right ml-1 mr-lg-8"
                    height="60"
                    width="200"
                    min-width="60"
                    elevation="0"
                    @click.stop="paymentToggle = !paymentToggle"
                  >
                    <div class="text-capitalize hire-text mr-lg-8">hire me</div>
                    <v-btn
                      color="#39E1AA"
                      class="email"
                      height="50"
                      min-width="50"
                      max-width="50"
                      elevation="0"
                      @click.stop="paymentToggle = !paymentToggle"
                    >
                      <v-img
                        src="/images/resume_themes/theme511/email.svg"
                        contain
                        max-width="24"
                        height="24"
                      ></v-img>
                    </v-btn>
                  </v-btn>
                </div>
                <div class="text-sm-center text-right mt-sm-4 hidden-lg-and-up">
                  <v-btn
                    class="hire"
                    height="40"
                    width="135"
                    min-width="40"
                    elevation="0"
                    @click.stop="paymentToggle = !paymentToggle"
                  >
                    <div class="text-capitalize hire-text mr-6">hire me</div>

                    <v-btn
                      color="#39e1aa"
                      class="email hidden-xs-only"
                      height="40"
                      min-width="40"
                      max-width="40"
                      elevation="0"
                      @click.stop="paymentToggle = !paymentToggle"
                    >
                      <v-img
                        src="/images/resume_themes/theme511/email.svg"
                        contain
                        max-width="24"
                        height="24"
                      ></v-img>
                    </v-btn>
                    <v-btn
                      color="#ffff"
                      class="email hidden-sm-and-up"
                      height="40"
                      min-width="40"
                      max-width="40"
                      elevation="0"
                      @click.stop="paymentToggle = !paymentToggle"
                    >
                      <v-img
                        src="/images/resume_themes/theme511/emailmob.svg"
                        contain
                        max-width="24"
                        height="24"
                      ></v-img>
                    </v-btn>
                  </v-btn>
                </div>
              </v-col>
            </v-row>
          </v-container>
        </v-col>
        <!-- Payment-dialog-box   -->
        <div>
          <v-dialog
            v-model="paymentToggle"
            fullscreen
            hide-overlay
            transition="slide-y-transition"
          >
            <v-card class="pa-6">
              <div class="text-right">
                <v-btn text fab absolute top right small class="margBtn">
                  <v-icon
                    :color="lightMobile"
                    @click.stop="paymentToggle = !paymentToggle"
                    >close</v-icon
                  >
                </v-btn>
              </div>
              <v-container fluid>
                <v-row no-gutters justify="center">
                  <v-col cols="12" sm="12" lg="5" class="pa-4">
                    <div class="paymentBack pt-lg-12 pt-10" align="center">
                      <v-img
                        class="pt-lg-12 payment-avatar"
                        src="/images/resume_themes/theme511/avatar.png"
                        alt="avatar"
                        contain
                      ></v-img>
                      <div class="pt-lg-12 pt-8 send_payment">
                        Send payment to
                      </div>
                      <div class="pb-lg-12 pb-12 payment_head">
                        {{ currentUser.personal_info.full_name }}
                      </div>
                      <div class="py-lg-12"></div>
                      <div class="py-lg-12"></div>
                      <div class="py-lg-6"></div>
                    </div>
                  </v-col>
                  <v-col cols="12" sm="12" lg="7" class="pa-4">
                    <div class="payment--form-back">
                      <payment></payment>
                    </div>
                  </v-col>
                </v-row>
              </v-container>
            </v-card>
          </v-dialog>
        </div>
        <v-col cols="12" lg="12" class="layer my-lg-5 my-2 my-sm-4 mainheight">
          <v-container fluid>
            <v-row justify="center">
              <v-col lg="10" sm="12" class="hidden-xs-only">
                <v-tabs
                  background-color="transparent"
                  :slider-color="sliderColor()"
                  slider-size="5"
                  color="#000"
                  center-active
                  centered
                >
                  <v-tab
                    v-for="(tab, i) in tabs"
                    :key="i"
                    @click="activeTab = tab.value"
                    class="mx-auto"
                    :class="[{ 'active-indicator': currentTab === tab.value }]"
                  >
                    <div class="text-capitalize tabtitle">{{ tab.name }}</div>
                  </v-tab>
                </v-tabs>
              </v-col>
              <v-col lg="11">
                <Portfolio
                  :projects="currentUser.projects"
                  :activeTab="activeTab"
                />
                <Experience
                  :works="currentUser.work_experience"
                  :activeTab="activeTab"
                />
                <Skills :skills="currentUser.skills" :activeTab="activeTab" />
                <Education
                  :education="currentUser.education"
                  :activeTab="activeTab"
                />
                <Media :activeTab="activeTab" :media="currentUser.media" />
                <About :activeTab="activeTab" :user="currentUser" />
              </v-col>
            </v-row>
          </v-container>
        </v-col>
      </v-row>
    </v-container>
  </v-app>
</template>
<script>
// import Header from "./Header";
// import Main from "./Main";
import Portfolio from "./tabs/Portfolio";
import Experience from "./tabs/Experience";
import Education from "./tabs/Education";
import Skills from "./tabs/Skills";
import Media from "./tabs/Media";
import About from "./tabs/About";
import payment from "./payments/payment";
export default {
  components: {
    Portfolio,
    Experience,
    Education,
    Skills,
    Media,
    About,
    payment
  },
  props: ["user", "is_preview", "currentTab"],
  data() {
    return {
      drawer: null,
      currentUser: this.user,
      activeTab: "portfolio",
      paymentToggle: false,
      tabs: [
        { name: "Portfolio", value: "portfolio" },
        { name: "Education", value: "education" },
        { name: "Experience", value: "work-experience" },
        { name: "Skills", value: "skills" },
        { name: "Media", value: "media" },
        { name: "About Me", value: "about" }
      ]
    };
  },
  watch: {
    // if current tab changed, change the active tab as well.
    currentTab: function(val) {
      this.activeTab = val;
    }
  },
  computed: {
    borderadius() {
      var border = document
        .querySelector(".v-tabs-slider")
        .borderRadius("50px");
      return border;
      console.log(border);
    },
    hireColor() {
      switch (this.$vuetify.breakpoint.name) {
        case "xs":
          return "#ffff";
        case "sm":
          return "#39E1AA";
        case "md":
          return "#39E1AA";
      }
    },
    lightMobile() {
      switch (this.$vuetify.breakpoint.name) {
        case "xs":
          return "#000";
        case "sm":
          return "#000";
        case "md":
          return "#000";
        case "lg":
          return "#ffff";
        case "xl":
          return "#ffff";
      }
    }
  },

  methods: {
    setDummyUser() {
      this.currentUser = this.$store.state.dummyUser;
    },
    sliderColor() {
      if (this.activeTab == "portfolio") {
        return "#F7B301";
      }
      if (this.activeTab == "education") {
        return "#19AAC9";
      }
      if (this.activeTab == "work") {
        return "#6764C8";
      }
      if (this.activeTab == "skills") {
        return "#F56068";
      }
      if (this.activeTab == "media") {
        return "#39E1AA";
      }
      if (this.activeTab == "about") {
        return "#F7B301";
      }
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
<style lang="scss" scoped>
//index
#theme511 {
  background: url("/images/resume_themes/theme511/back.png");
  background-repeat: no-repeat;
  background-size: cover;
}
.layer {
  background: #faf7f1;
  box-shadow: 0px 10px 8px rgba(0, 0, 0, 0.1);
  border-radius: 50px;
}
.mainheight {
  min-height: 500px;
}
.paymentBack {
  background: url("/images/resume_themes/theme511/payback.png");
  background-repeat: no-repeat;
  background-size: cover;
  height: 100%;
  // background: #faf7f1;
  // box-shadow: 0px 10px 8px rgba(0, 0, 0, 0.1);
  border-radius: 50px;
}
.payment-avatar {
  width: 300px;
}
.send_payment {
  font-family: Poppins;
  font-style: normal;
  font-weight: 600;
  font-size: 30px;
  line-height: 45px;
  /* identical to box height */
  color: #000000;
}
.payment_head {
  font-family: Poppins;
  font-style: normal;
  font-weight: 600;
  font-size: 60px;
  line-height: 90px;
  /* identical to box height */
  color: #000000;
}
.payment--form-back {
  background: #6764c8;
  box-shadow: 0px 10px 8px rgba(0, 0, 0, 0.1);
  border-radius: 50px;
}
.margBtn {
  margin-top: 75px;
  margin-right: 30px;
}
@media screen and (max-width: 1024px) and (min-width: 700px) {
  .layer {
    background: #faf7f1;
    box-shadow: 0px 10px 8px rgba(0, 0, 0, 0.1);
    border-radius: 30px;
  }
  .mainheight {
    height: 100%;
  }
  .payment-avatar {
    width: 150px;
  }
}
@media screen and (max-width: 699px) and (min-width: 200px) {
  .payment-avatar {
    width: 150px;
  }
  .layer {
    background: #faf7f1;
    box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
    border-radius: 20px;
  }
  .mainheight {
    height: 100%;
  }
  .payment_head {
    font-family: Poppins;
    font-style: normal;
    font-weight: 600;
    font-size: 36px;
    line-height: 90px;
    color: #000000;
  }
}

//header
.drawer--tab-active {
  position: relative;
}
.drawer--tab-active:after {
  content: "";
  position: absolute;
  background-color: #39e1aa;
  width: 90px;
  height: 4px;
  bottom: 0;
}
.menu {
  font-family: Poppins;
  font-style: normal;
  font-weight: 500;
  font-size: 1rem;
  line-height: 30px;
  /* identical to box height */

  color: #ffffff;

  opacity: 0.5;
}
.menu--tabs {
  font-family: Poppins;
  font-style: normal;
  font-weight: normal;
  font-size: 1rem;
  line-height: 27px;
  /* identical to box height */

  color: #ffffff;
}
.social {
  background: #fbffff;
  border: 5px solid #f56068;
  box-sizing: border-box;
  border-radius: 50px;
}
.hire {
  background: #fbffff;
  border: 5px solid #39e1aa;
  box-sizing: border-box;
  border-radius: 50px;
  position: relative;
}
.email {
  position: absolute;
  background: #39e1aa;
  border-radius: 50px;
  right: -17px;
}

.hire-text {
  font-family: Poppins;
  font-style: normal;
  font-weight: bold;
  font-size: 20px;
  line-height: 30px;
  /* identical to box height */

  color: #39e1aa;
}
.head {
  font-family: Poppins;
  font-style: normal;
  font-weight: 600;
  font-size: 2.5rem;
  line-height: 90px;
  /* identical to box height */
  color: #000000;
}
.subhead {
  font-family: Poppins;
  font-style: normal;
  font-weight: 500;
  font-size: 1.2rem;
  line-height: 45px;
  /* identical to box height */
  color: #000000;
}
.details {
  font-family: Poppins;
  font-style: normal;
  font-weight: normal;
  font-size: 1rem;
  line-height: 30px;

  color: #000000;
}
.info-text {
  display: inline-block;
  font-family: Poppins;
  font-style: normal;
  font-weight: normal;
  font-size: 1rem;
  line-height: 27px;
  display: flex;
  align-items: center;
  text-transform: uppercase;
  color: #000000;
}
.info-rate {
  display: inline-block;
  font-family: Poppins;
  font-style: normal;
  font-weight: bold;
  font-size: 1.5rem;
  line-height: 45px;
  display: flex;
  align-items: center;
  color: #000000;
}

@media screen and (max-width: 1024px) and (min-width: 700px) {
  .head {
    font-family: Poppins;
    font-style: normal;
    font-weight: 500;
    font-size: 24px;
    line-height: 40px;
  }
  .subhead {
    font-family: Poppins;
    font-style: normal;
    font-weight: 500;
    font-size: 12px;
    line-height: 24px;
    /* identical to box height */

    color: #000000;
  }
  .details {
    font-family: Poppins;
    font-style: normal;
    font-weight: normal;
    font-size: 12px;
    line-height: 24px;

    color: #000000;
  }
  .hire {
    background: #ffffff;
    border: 2px solid #39e1aa;
    box-sizing: border-box;
    border-radius: 50px;
  }
  .hire-text {
    font-family: Poppins;
    font-style: normal;
    font-weight: bold;
    font-size: 12px;
    line-height: 18px;
    /* identical to box height */

    color: #39e1aa;
  }
  .info-text {
    font-family: Poppins;
    font-style: normal;
    font-weight: normal;
    font-size: 14px;
    line-height: 21px;
    display: flex;
    align-items: center;
    text-transform: uppercase;

    color: #000000;
  }
  .info-rate {
    font-family: Poppins;
    font-style: normal;
    font-weight: bold;
    font-size: 20px;
    line-height: 30px;
    display: flex;
    align-items: center;

    color: #000000;
  }
}
@media screen and (max-width: 699px) and (min-width: 200px) {
  .head {
    font-family: Poppins;
    font-style: normal;
    font-weight: 800;
    font-size: 16px;
    line-height: 24px;
    color: #000000;
  }
  .subhead {
    font-family: Poppins;
    font-style: normal;
    font-weight: normal;
    font-size: 10px;
    line-height: 15px;
    /* identical to box height */

    color: #000000;
  }
  .details {
    font-family: Poppins;
    font-style: normal;
    font-weight: normal;
    font-size: 12px;
    line-height: 24px;

    color: #000000;
  }
  .hire {
    background: #f56068 !important;
    border-radius: 50px;
    border: 2px solid #f56068;
  }
  .hire-text {
    font-family: Poppins;
    font-style: normal;
    font-weight: bold;
    font-size: 14px;
    line-height: 21px;
    display: flex;
    align-items: center;

    color: #faf7f1;
  }
  .email {
    position: absolute;
    background: #39e1aa;
    border-radius: 50px;
    right: -19px;
  }
  .info-text {
    font-family: Poppins;
    font-style: normal;
    font-weight: normal;
    font-size: 14px;
    line-height: 21px;
    display: flex;
    align-items: center;
    text-transform: uppercase;

    color: #000000;
  }
  .info-rate {
    font-family: Poppins;
    font-style: normal;
    font-weight: bold;
    font-size: 20px;
    line-height: 30px;
    display: flex;
    align-items: center;

    color: #000000;
  }
}
//main
.tabtitle {
  font-family: Poppins;
  font-style: normal;
  font-weight: bold;
  font-size: 20px;
  line-height: 30px;
}
.v-tabs-slider {
  border-radius: 50px !important;
}
</style>