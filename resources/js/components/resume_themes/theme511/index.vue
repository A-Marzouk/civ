<template>
  <v-app id="theme511" v-if="currentUser">
    <v-container fluid>
      <v-row justify="center" class="px-lg-6 px-sm-4" dense>
        <v-col cols="12" lg="12" class="layer my-lg-5 my-2 my-sm-4">
          <v-container fluid>
            <v-row dense>
              <v-col class="profile-picture" cols="2" lg="2" sm="3" align="center" align-self="center">
                <v-img :src="currentUser.personal_info.profile_pic" alt="avatar" style="border-radius: 50%" contain>
                </v-img>
                <v-btn fab color="#f56068" class="pdf-btn" elevation="0" v-if="findPreference('pdf_download')">
                  <v-img
                    src="/images/resume_themes/theme511/social_icons/pdfBtn.svg"
                    :max-width="pdfIconSize"
                    contain
                  ></v-img>
                </v-btn>
                <v-btn
                  fab
                  color="#39E1AA"
                  class="msg-btn hidden-sm-and-down"
                  @click.stop="messageToggle = !messageToggle"
                  v-if="findPreference('chat')"
                >
                  <v-img src="/images/resume_themes/theme511/email.svg" :max-width="pdfIconSize" contain></v-img>
                </v-btn>
              </v-col>
              <MessageDialog :messageToggle="messageToggle" :closeDialog="closeDialog"></MessageDialog>
              <v-navigation-drawer
                color="rgba(103, 100, 200, 0.95)"
                v-model="drawer"
                absolute
                hide-overlay
                temporary
                :width="drawerWidth"
                class="hidden-md-and-up"
              >
                <div class="text-right mt-4">
                  <v-btn text small>
                    <v-icon color="#fff" @click.stop="drawer = !drawer">close</v-icon>
                  </v-btn>
                </div>
                <v-list-item>
                  <v-list-item-content>
                    <v-list-item-title class="menu text-left">Menu</v-list-item-title>
                  </v-list-item-content>
                </v-list-item>

                <v-divider></v-divider>

                <v-list>
                  <v-list-item
                    v-for="(tab, i) in currentUser.tabs"
                    v-show="tab.is_public && !excludedTabs.includes(tab.title)"
                    :key="i"
                    @click="activeTab = tab.title"
                  >
                    <v-list-item-content
                      :class="[
                        activeTab === tab.title ? 'drawer--tab-active' : 'drawer--tab-disable',
                        'menu--tabs white--text text-left'
                      ]"
                    >
                      <v-list-item-title>{{ tab.label }}</v-list-item-title>
                    </v-list-item-content>
                  </v-list-item>
                </v-list>
              </v-navigation-drawer>
              <v-col cols="auto" xl="6" lg="6" class="pl-lg-8" sm="6" align-self="center">
                <div class="head">
                  {{ currentUser.personal_info.first_name }}
                  {{ currentUser.personal_info.last_name }}
                </div>
                <div class="subhead">
                  {{ currentUser.personal_info.designation }}
                </div>
                <div class="details hidden-xs-only" v-if="currentUser.personal_info.overview">
                  {{ currentUser.personal_info.overview }}
                </div>
                <v-row dense class="hidden-xs-only">
                  <!-- Pay Rate -->
                  <v-col cols="12" sm="12" lg="6" xl="5" v-if="findPreference('hourly_rate')">
                    <span class="info-text">Rate - </span>
                    <span class="info-text">
                      <v-icon color="#39E1AA" @click="paymentInfoPrev()">mdi-chevron-left</v-icon>
                      <a href="javascript:void(0)" class="info-text" @click="paymentInfoNext()">
                        {{ filterPaymentInfoList[paymentInfo].salary_frequency }}
                      </a>

                      <v-icon color="#39E1AA" @click="paymentInfoNext()">mdi-chevron-right</v-icon></span
                    >
                    <span class="info-rate">
                      {{ filterPaymentInfoList[paymentInfo].salary }}
                      {{ filterPaymentInfoList[paymentInfo].currency }}
                    </span>
                  </v-col>
                  <!-- Pay Rate -->
                  <!-- Availability -->
                  <v-col cols="12" sm="12" md="6" v-if="findPreference('weekly_availability')">
                    <span class="info-text">Availability - </span>
                    <span class="info-text">
                      <v-icon color="#39E1AA" @click="availableInfoPrev()">mdi-chevron-left</v-icon>
                      <a href="javascript:void(0)" class="info-text" @click="availableInfoNext()">
                        {{ filterAvailabilityInfoList[available].available_hours_frequency }}
                      </a>

                      <v-icon color="#39E1AA" @click="availableInfoNext()">mdi-chevron-right</v-icon></span
                    >
                    <span class="info-rate">
                      {{ filterAvailabilityInfoList[available].available_hours }}
                    </span>
                  </v-col>
                  <!-- Availability -->
                </v-row>
              </v-col>
              <v-col cols="auto" sm="3" lg="4" class="ml-auto align-self-sm-start" align-self="center">
                <div class="text-right mt-lg-4 hidden-md-and-down">
                  <!-- Social Icons -->
                  <IconCarousel
                    :currentUser="currentUser"
                    themeNumber="theme511"
                    btnWidth="45"
                    btnHeight="45"
                    iconWidth="24"
                    iconHeight="24"
                    border="5px solid #f56068"
                    borderRadius="100"
                    carouselHeight="55"
                    carouselWidth="215"
                    justifyContent="flex-end"
                    class="mr-lg-6 mb-2"
                    arrowColor="#39E1AA"
                  ></IconCarousel>

                  <!-- Social Icons -->
                  <!-- Hire Me Button -->
                  <v-btn
                    class="hire text-right ml-1 mr-lg-8"
                    height="60"
                    width="200"
                    min-width="60"
                    elevation="0"
                    @click.stop="hireMeModal = !hireMeModal"
                    v-if="findPreference('hire_me')"
                  >
                    <div class="text-capitalize hire-text">hire me</div>
                  </v-btn>
                  <!-- Hire Me Button -->
                </div>

                <div class="text-sm-center text-right mt-sm-4 hidden-lg-and-up">
                  <!-- message button -->
                  <v-btn
                    class="email hidden-md-and-up mr-2"
                    :height="buttonSize"
                    :max-width="buttonSize"
                    elevation="0"
                    fab
                    @click.stop="messageToggle = !messageToggle"
                    v-if="findPreference('chat')"
                  >
                    <v-img
                      src="/images/resume_themes/theme511/emailmob.svg"
                      contain
                      :max-width="pdfIconSize"
                      height="12"
                    ></v-img>
                  </v-btn>
                  <!-- message button -->
                  <!-- hire me button -->
                  <v-btn
                    class="hire"
                    height="40"
                    width="100"
                    min-width="40"
                    elevation="0"
                    @click.stop="hireMeModal = !hireMeModal"
                    v-if="findPreference('hire_me')"
                  >
                    <div class="text-capitalize hire-text">hire me</div>
                  </v-btn>
                  <!-- hire me button -->
                </div>
              </v-col>
            </v-row>
          </v-container>
        </v-col>
        <!-- Payment-dialog-box   -->

        <HireModal
          @modalClosed="hireMeModal = false"
          :hireMeModal.sync="hireMeModal"
          :closeHireMeModal="closePayment"
          :user="currentUser"
        />
        <!-- Payment-dialog-box   -->
        <v-col cols="12" lg="12" class="layer my-lg-5 my-2 my-sm-4 mainheight">
          <v-container fluid>
            <v-row justify="center">
              <v-col cols="12" class="text-center hidden-md-and-up">
                <div class="menuText" @click.stop="drawer = !drawer">Menu</div>
              </v-col>
              <v-col lg="10" sm="12" class="hidden-sm-and-down">
                <v-tabs
                  background-color="transparent"
                  :slider-color="sliderColor()"
                  v-model="indexOfActiveTab"
                  slider-size="5"
                  color="#000"
                  center-active
                  centered
                >
                  <v-tab
                    v-for="tab in currentUser.tabs"
                    v-show="tab.is_public && !excludedTabs.includes(tab.title)"
                    :key="tab.title"
                    @click="activeTab = tab.title"
                    class="mx-auto"
                  >
                    <div class="text-capitalize tabtitle">{{ tab.label }}</div>
                  </v-tab>
                </v-tabs>
              </v-col>
              <v-col lg="11">
                <Portfolio :projects="currentUser.projects" :activeTab="activeTab" />
                <Experience :works="currentUser.work_experience" :activeTab="activeTab" />
                <Skills :skills="currentUser.skills" :activeTab="activeTab" />
                <Education :education="currentUser.education" :activeTab="activeTab" />
                <Media
                  style="margin-bottom: 150px"
                  :activeTab="activeTab"
                  :media="currentUser.media"
                  :user_name="currentUser.full_name"
                />
                <About :activeTab="activeTab" :user="currentUser" />
                <Hobbies :activeTab="activeTab" :hobbies="currentUser.hobbies" />
                <References :activeTab="activeTab" :references="currentUser.references" />
                <Achievement :activeTab="activeTab" :achievements="currentUser.achievements" />
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
import Portfolio from './tabs/Portfolio';
import Experience from './tabs/Experience';
import Education from './tabs/Education';
import Skills from './tabs/Skills';
import Media from './tabs/Media';
import About from './tabs/About';
import payment from './payments/payment';
import Hobbies from './tabs/Hobbies';
import References from './tabs/References';
import Achievement from './tabs/Achievement';
import MessageDialog from './message/MessageDialog';
import HireModal from '../reusable/components/hireMe/hireMe';
import IconCarousel from '../reusable/IconCarousel';
import MainFunctions from '../reusable/functions/main.functions';
export default {
  extends: MainFunctions,
  components: {
    Portfolio,
    Experience,
    Education,
    Skills,
    Media,
    About,
    payment,
    Hobbies,
    References,
    Achievement,
    MessageDialog,
    HireModal,
    IconCarousel
  },
  data() {
    return {
      drawer: null,
      messageToggle: false,
      hireMeModal: false
    };
  },

  computed: {
    borderadius() {
      return document.querySelector('.v-tabs-slider').borderRadius('50px');
    },
    hireColor() {
      switch (this.$vuetify.breakpoint.name) {
        case 'xs':
          return '#ffff';
        case 'sm':
          return '#39E1AA';
        case 'md':
          return '#39E1AA';
      }
    },
    lightMobile() {
      switch (this.$vuetify.breakpoint.name) {
        case 'xs':
          return '#000';
        case 'sm':
          return '#000';
        case 'md':
          return '#000';
        case 'lg':
          return '#ffff';
        case 'xl':
          return '#ffff';
      }
    },
    pdfIconSize() {
      switch (this.$vuetify.breakpoint.name) {
        case 'xs':
          return '18';
        case 'sm':
          return '24';
        case 'md':
          return '24';
        case 'lg':
          return '24';
        case 'xl':
          return '26';
      }
    },
    buttonSize() {
      switch (this.$vuetify.breakpoint.name) {
        case 'xs':
          return '30px';
        case 'sm':
          return '40px';
        case 'md':
          return '40px';
        case 'lg':
          return '50px';
        case 'xl':
          return '50px';
      }
    },
    drawerWidth() {
      switch (this.$vuetify.breakpoint.name) {
        case 'xs':
          return '300';
        case 'sm':
          return '400';
        case 'md':
          return '500';
      }
    }
  },
  methods: {
    closeDialog() {
      this.messageToggle = false;
    },
    closePayment() {
      this.hireMeModal = false;
    },

    sliderColor() {
      if (this.activeTab === 'portfolio') {
        return '#F7B301';
      }
      if (this.activeTab === 'education') {
        return '#19AAC9';
      }
      if (this.activeTab === 'work') {
        return '#6764C8';
      }
      if (this.activeTab === 'skills') {
        return '#F56068';
      }
      if (this.activeTab === 'media') {
        return '#39E1AA';
      }
      if (this.activeTab === 'about') {
        return '#F7B301';
      }
      if (this.activeTab === 'hobbies') {
        return '#F7B301';
      }
      if (this.activeTab === 'references') {
        return '#F7B301';
      }
      if (this.activeTab === 'achievement') {
        return '#F7B301';
      }
    }
  }
};
</script>
<style lang="scss" scoped>
//index
#theme511 {
  background: url('/images/resume_themes/theme511/back.png');
  background-repeat: no-repeat;
  background-size: cover;
  background-attachment: fixed;
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
  background: url('/images/resume_themes/theme511/payback.png');
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
  content: '';
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

  .icon {
    height: 24px;
    width: 24px;
    fill: #f56068;
  }
}
.hire {
  background: #fbffff;
  border: 5px solid #39e1aa;
  box-sizing: border-box;
  border-radius: 50px;
  position: relative;
}
.email {
  background: #fff;
  border: 2px solid #f56068;
  border-radius: 50px;
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
  color: #000000;
}

.profile-picture {
  position: relative;

  .pdf-btn {
    position: absolute;
    right: 0;
    bottom: 45px;
    height: 50px;
    width: 50px;
  }
  .msg-btn {
    position: absolute;
    right: 0;
    top: 45px;
    height: 50px;
    width: 50px;
  }
}

@media screen and (max-width: 1024px) and (min-width: 700px) {
  .profile-picture {
    position: relative;

    .pdf-btn {
      position: absolute;
      right: 0;
      bottom: 15px;
      height: 50px;
      width: 50px;
    }
    .msg-btn {
      position: absolute;
      right: 0;
      top: 15px;
      height: 50px;
      width: 50px;
    }
  }
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
    background: #f56068 !important;
    border: 2px solid #f56068;
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

    color: #faf7f1;
  }
  .menuText {
    font-family: Poppins;
    font-style: normal;
    font-weight: 500;
    font-size: 24px;
    line-height: 34px;
    color: #f56068;
  }
  .info-text {
    font-family: Poppins;
    font-style: normal;
    font-weight: normal;
    font-size: 14px;
    line-height: 21px;
    text-transform: uppercase;

    color: #000000;
  }
  .info-rate {
    font-family: Poppins;
    font-style: normal;
    font-weight: bold;
    font-size: 20px;
    line-height: 30px;
    color: #000000;
  }
}
@media screen and (max-width: 699px) and (min-width: 200px) {
  .menuText {
    font-family: Poppins;
    font-style: normal;
    font-weight: 500;
    font-size: 20px;
    line-height: 30px;
    color: #f56068;
  }
  .profile-picture {
    position: relative;

    .pdf-btn {
      position: absolute;
      right: 0;
      bottom: 0;
      height: 30px;
      width: 30px;
    }
  }
  .head {
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
    background: #fff;
    border: 2px solid #f56068;
    border-radius: 50px;
  }
  .info-text {
    font-family: Poppins;
    font-style: normal;
    font-weight: normal;
    font-size: 14px;
    line-height: 21px;
    text-transform: uppercase;

    color: #000000;
  }
  .info-rate {
    font-family: Poppins;
    font-style: normal;
    font-weight: bold;
    font-size: 20px;
    line-height: 30px;
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