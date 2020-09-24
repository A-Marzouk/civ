<template>
  <div id="wrapper_theme1001">
    <header id="header">
      <div class="header-profile">
        <div class="profile-actions">
          <a href="#" class="actions-toggle-button" @click.prevent="open">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22 20">
              <g transform="translate(-318.538 -40)">
                <circle
                  cx="4"
                  cy="4"
                  r="4"
                  transform="translate(318.538 40)"
                  fill="#f8ab29"
                />
                <circle
                  cx="4"
                  cy="4"
                  r="4"
                  transform="translate(332.538 40)"
                  fill="#f8ab29"
                />
                <circle
                  cx="4"
                  cy="4"
                  r="4"
                  transform="translate(332.538 52)"
                  fill="#f8ab29"
                />
                <circle
                  cx="4"
                  cy="4"
                  r="4"
                  transform="translate(318.538 52)"
                  fill="#f8ab29"
                />
              </g>
            </svg>
          </a>

          <div
            class="profile-actions__links"
            :class="{ open: isOpen }"
            @click="stopProp"
          >
            <a
              class="action__button"
              href="#"
              @click.prevent="chatToggle = !chatToggle"
            >
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 13 13">
                <g transform="translate(0.347 0.201)">
                  <rect
                    width="13"
                    height="13"
                    transform="translate(-0.347 -0.201)"
                    fill="none"
                  />
                  <path
                    d="M1.535,3.07a.505.505,0,0,1-.358-.154L.154,1.893a.5.5,0,0,1,0-.716.494.494,0,0,1,.716,0l.665.665L3.224.154a.5.5,0,0,1,.716,0,.5.5,0,0,1,0,.716L1.893,2.917A.505.505,0,0,1,1.535,3.07Z"
                    transform="translate(1.068 8.009)"
                    fill="#fff"
                  />
                  <path
                    d="M8,7H4.991A4.122,4.122,0,0,0,.833,3.231,4.327,4.327,0,0,0,0,3.312V2A2,2,0,0,1,2,0H8a2,2,0,0,1,2,2V5A2,2,0,0,1,8,7ZM1.389.942a.418.418,0,0,0-.367.212.389.389,0,0,0-.034.3.405.405,0,0,0,.2.244L4.8,3.587a.433.433,0,0,0,.4,0L8.808,1.7a.4.4,0,0,0,.2-.243.39.39,0,0,0-.033-.3A.42.42,0,0,0,8.611.942a.429.429,0,0,0-.2.049L5,2.772,1.587.991A.426.426,0,0,0,1.389.942Z"
                    transform="translate(1.653 2.799)"
                    fill="#fff"
                  />
                </g>
              </svg>
              <span>Start A Chat!</span>
            </a>
            <a class="action__button" href="#">
              <svg
                width="18"
                height="19"
                xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink"
                xmlns:svgjs="http://svgjs.com/svgjs"
                viewBox="0 0.5 20 20"
                fill="#fff"
              >
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="18"
                  height="19"
                  viewBox="0 0 20 20"
                >
                  <path
                    paint-order="stroke fill markers"
                    fill-rule="evenodd"
                    d="M18.91 1.09A3.7 3.7 0 0 0 16.275 0H3.723A3.728 3.728 0 0 0 0 3.724v12.552A3.728 3.728 0 0 0 3.723 20h12.553a3.728 3.728 0 0 0 3.723-3.724V3.724a3.7 3.7 0 0 0-1.09-2.633zM6.478 8.497a.586.586 0 0 1 .829 0l2.106 2.106v-6.25a.586.586 0 0 1 1.171 0v6.25l2.107-2.106a.586.586 0 1 1 .828.828l-3.107 3.107a.584.584 0 0 1-.828 0L6.479 9.324a.585.585 0 0 1 0-.828zm9.17 7.738H4.35a.586.586 0 1 1 0-1.172h11.297a.586.586 0 1 1 0 1.172z"
                  />
                </svg>
              </svg>
              <span>Download PDF </span>
            </a>
          </div>
        </div>

        <Avatar :src="currentUser.personal_info.profile_pic" />

        <div class="profile-detail">
          <h3 class="title">
            {{ currentUser.personal_info.first_name }}
            {{ currentUser.personal_info.last_name }}
          </h3>
          <h4
            class="sub-title"
            v-text="currentUser.personal_info.designation"
          ></h4>

          <div
            class="profile__hireme"
            v-if="currentUser.payment_info && currentUser.availability_info"
          >
            <div class="hireme">
              <!--hourly rate -->
              <div class="hireme-rate">
                <div>
                  Rate
                  <div
                    v-for="(payment_Info, index) in currentUser.payment_info"
                    :key="index"
                    v-show="payment_Info.is_public"
                    class="d-inline-block ml-2"
                  >
                    <strong v-if="paymentInfo == index"
                      >${{ payment_Info.salary }}</strong
                    >
                  </div>
                </div>
                <div class="text-capitalize">
                  <v-icon large dark @click="paymentInfoPrev()"
                    >navigate_before</v-icon
                  >
                  <div
                    v-for="(payment_Info, index) in currentUser.payment_info"
                    :key="index"
                    v-show="payment_Info.is_public"
                    class="d-inline-block"
                  >
                    <span v-if="paymentInfo == index" class="hourly-title">{{
                      payment_Info.salary_frequency
                    }}</span>
                  </div>
                  <v-icon large dark @click="paymentInfoNext()"
                    >navigate_next</v-icon
                  >
                </div>
              </div>
              <!--hourly rate -->
              <!--weekly avblty -->
              <div class="hireme-rate">
                <div>
                  Availability

                  <div
                    v-for="(availability_info,
                    index) in currentUser.availability_info"
                    :key="index"
                    v-show="availability_info.is_public"
                    class="d-inline-block ml-2"
                  >
                    <strong v-if="available == index">
                      {{ availability_info.available_hours }} hrs
                    </strong>
                  </div>
                </div>
                <div>
                  <v-icon large dark @click="availablePrev()"
                    >navigate_before</v-icon
                  >
                  <div
                    v-for="(availability_info,
                    index) in currentUser.availability_info"
                    :key="index"
                    v-show="availability_info.is_public"
                    class="d-inline-block"
                  >
                    <span class="hourly-title" v-if="available == index">
                      {{ availability_info.available_hours_frequency }}
                    </span>
                  </div>
                  <v-icon large dark @click="availableNext()"
                    >navigate_next</v-icon
                  >
                </div>
              </div>
              <!--weekly avblty -->
            </div>
            <div>
              <a
                class="hireme-button"
                href="#"
                @click.prevent="hireMeModal = !hireMeModal"
              >
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 10.969 12.124"
                >
                  <path
                    d="M7.969,12.124H3a3,3,0,0,1-3-3V3A3,3,0,0,1,3,0H7.969a3,3,0,0,1,3,3V9.123A3,3,0,0,1,7.969,12.124ZM5.479,6.062a3.17,3.17,0,0,0-2.071.686,2.848,2.848,0,0,0-.97,2.042.376.376,0,0,0,.114.217.229.229,0,0,0,.132.086H8.276a.246.246,0,0,0,.186-.068.319.319,0,0,0,.068-.235,2.764,2.764,0,0,0-.956-2.061A3.254,3.254,0,0,0,5.479,6.062Zm.005-3.03A1.212,1.212,0,1,0,6.7,4.244,1.217,1.217,0,0,0,5.485,3.031Z"
                    transform="translate(0 0)"
                    fill="#fff"
                  />
                </svg>

                <span>Hire Me</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!--<HireModal-->
      <!--:hireMeModal.sync="hireMeModal"-->
      <!--:closeHireMeModal="closeHireMeModal"-->
    <!--/>-->

    <updated-hire-modal @modalClosed="hireMeModal = false" :hireMeModal.sync="hireMeModal" :closeHireMeModal="closeHireMeModal" :user="currentUser"></updated-hire-modal>
    <ChatModal :chatToggle="chatToggle" :closeChat="closeChat" />
    <TabsNavigation
      :currentUser="currentUser"
      @tab-changed="tabChanged"
      :builderCurrentTabTitle="activeTab"
    />

    <TabsContent
      :builderCurrentTabTitle="activeTab"
      :currentUser="currentUser"
    />
  </div>
</template>

<script>
import TabsNavigation from "./components/TabsNavigation";
import TabsContent from "./components/TabsContent";
import Avatar from "./components/header/Avatar";
import HireModal from "./components/hireModal/HireModal";
import UpdatedHireModal from "../includes/HireMeModal";
import ChatModal from "./components/chatModal/ChatModal";

export default {
  name: "resume-theme-1001",

  components: { TabsNavigation, TabsContent, Avatar, HireModal, ChatModal, 'updated-hire-modal' : UpdatedHireModal},
  props: ["user", "is_preview", "builderCurrentTabTitle"],
  data() {
    return {
      activeTab: "portfolio",
      currentUser: this.user,
      hireMeModal: false,
      chatToggle: false,
      isOpen: false,
      available: 0,
      paymentInfo: 0,
    };
  },
  watch: {
    // if current tab changed, change the active tab as well.
    builderCurrentTabTitle: function (val) {
      if (!this.defaultTabs.includes(val)) {
        this.activeTab = this.getFirstActiveTabTitle();
      } else {
        this.activeTab = val;
      }
    },
  },
  methods: {
    tabChanged(value) {
      this.activeTab = value;
    },
    closeHireMeModal() {
      this.hireMeModal = false;
    },
    closeChat() {
      console.log("closeHireMeModal");
      this.chatToggle = false;
    },
    open(e) {
      if (!this.isOpen) {
        this.stopProp(e);
      }

      this.isOpen = true;
    },

    close() {
      this.isOpen = false;
    },
    availableNext() {
      if (this.available == 2) {
        this.available = 0;
      } else this.available++;
    },
    availablePrev() {
      if (this.available == 0) {
        this.available = 0;
      } else this.available--;
    },
    paymentInfoNext() {
      if (this.paymentInfo == 2) {
        this.paymentInfo = 0;
      } else this.paymentInfo++;
    },
    paymentInfoPrev() {
      if (this.paymentInfo == 0) {
        this.paymentInfo = 0;
      } else this.paymentInfo--;
    },
    stopProp(e) {
      e.stopPropagation();
    },
    setDummyUser() {
      this.currentUser = this.$store.state.dummyUser;
    },
    setActiveTabByURL() {
      const pathSplit = this.$route.path.split("/");
      let currentActiveTab = pathSplit[pathSplit.length - 1];
      if (!this.defaultTabs.includes(currentActiveTab)) {
        this.activeTab = this.getFirstActiveTabTitle();
      } else {
        this.activeTab = currentActiveTab;
      }
    },
    getFirstActiveTabTitle() {
      let title = "";
      this.currentUser.tabs.forEach((tab) => {
        if (tab.is_public && !this.excludedTabs.includes(tab.title)) {
          if (title === "") {
            title = tab.title;
          }
        }
      });

      return title;
    },
  },
  mounted() {
    // if there is no user or the preview is true, set dummy user
    if (!this.currentUser || this.is_preview) {
      this.setDummyUser();
    }

    // let user accessible in included components.
    this.$store.dispatch("updateThemeUser", this.currentUser);

    // set active tab
    this.setActiveTabByURL();
    window.addEventListener("click", this.close);
  },
  destroyed() {
    window.removeEventListener("click", this.close);
  },
  computed: {
    defaultTabs() {
      return this.$store.state.defaultTabs;
    },
    excludedTabs() {
      return this.$store.state.excludedTabs;
    },
    popupAnimation() {
      return this.isOpen ? "open" : "close";
    },
  },
};
</script>
<style lang="scss" scoped>
@import "./scss/variables";
//header
#header {
  font-family: $muli;
  font-weight: 300;
  padding: 20px;
  padding-bottom: 25px;
  color: #ffffff;
  background-image: url("/images/resume_themes/theme1001/bg-header.png"),
    linear-gradient(#4870fc 100%, #4870fc 100%);
  background-size: cover;

  background-repeat: repeat-x;
}

.header-profile {
  position: relative;
  display: flex;
  font-family: inherit;
}
.hourly-title {
  font-size: 1rem;
  color: #ffffff;
  font-weight: 700;
}
@media (min-width: $sm) {
  #header {
    padding: 25px;
    padding-bottom: 30px;
  }
}

@media (min-width: $md) {
  #header {
    background-image: url("/images/resume_themes/theme1001/bg-header.png"),
      linear-gradient(#4870ff 100%, #4870ff 100%);
    background-size: contain;

    background-repeat: repeat-x;
  }

  .header-profile {
    align-items: center;
  }
}

@media (min-width: $lg) {
  #header {
    padding: 30px 50px;
  }

  .header-profile {
    max-width: $lg;
    margin: 0 auto;
  }
}

@media (min-width: 1600px) {
  #header {
    padding: 50px 100px;
  }

  .header-profile {
    max-width: 1600px;
  }
}

@media (min-width: $xl) {
  .header-profile {
    max-width: $xl;
  }
}
//header

//profile-actions
.profile-actions .actions-toggle-button {
  display: block;
  height: 20px;
  width: 22px;
  position: absolute;
  top: 0;
  right: 0;
}

.profile-actions .profile-actions__links {
  position: absolute;
  top: -100vh;
  right: 0;
  z-index: 9999;
  background: #ffffff;
  width: 100%;
  opacity: 0;
  user-select: none;
  border-radius: 25px;
  padding: 45px 35px;
  box-shadow: 0 30px 30px rgba(16, 44, 44, 0.1);
  transition: opacity 0.5s;

  &.open {
    top: 37px;
    opacity: 1;
  }
}

.profile-actions__links .action__button {
  display: flex;
  color: #28404a;

  svg {
    height: 24px;
    fill: currentColor;

    path {
      fill: currentColor;
    }
  }

  span {
    color: inherit;
    font-family: $muli;
    font-size: 18px;
    margin-left: 10px;
  }

  &:nth-child(2) {
    margin-top: 35px;
  }
}

@media (min-width: $sm) {
  .profile-actions .profile-actions__links {
    padding: 50px 45px;
  }
}

@media (min-width: $md) {
  .profile-actions .actions-toggle-button {
    display: none;
  }

  .profile-actions .profile-actions__links {
    display: flex;
    opacity: 1;
    top: 0;
    background: unset;
    width: unset;
    border-radius: unset;
    padding: unset;
    box-shadow: unset;
  }

  .profile-actions__links .action__button {
    font-family: $muli;
    display: flex;
    font-size: 11px;
    font-weight: 300;
    color: #ffffff;
    background: #3d5ed4;
    justify-content: center;
    align-items: center;
    border-radius: 9px;
    width: 134px;
    height: 42px;
    transition: margin-top 0.1s;

    span {
      margin-left: 7px;
      color: inherit;
      font-size: inherit;
      font-weight: inherit;
    }

    svg {
      height: 15px;
    }

    &:nth-child(2) {
      margin-top: 0;
      margin-left: 15px;
    }

    &:hover {
      text-decoration: none;
      box-shadow: 0 3px 7px -4px rgba(0, 0, 0, 0.5);
    }
  }
}

@media (min-width: 1600px) {
  .profile-actions__links .action__button {
    font-size: 14px;
    width: 178px;
    height: 55px;
  }

  .profile-actions__links .action__button svg {
    height: 22px;
  }
}

@media (min-width: $lg) {
}
//profile-actions

//profile-details

.profile-detail {
  flex: 1;
  font-family: inherit;
  padding-left: 12px;
}

.title {
  font-family: inherit;
  font-size: 16px;
  line-height: 21px;
  font-weight: 700;
}

.sub-title {
  font-family: inherit;
  font-size: 13px;
  line-height: 20px;
  color: #ffffff;
}

@media (min-width: $sm) {
  .title {
    font-size: 18px;
    line-height: 24px;
  }

  .sub-title {
    font-size: 12px;
    line-height: 21px;
  }
}

@media (min-width: $md) {
  .profile-detail {
    padding-left: 30px;
  }

  .title {
    font-size: 20px;
    line-height: 34px;
  }

  .sub-title {
    color: #d3d6e4;
    font-size: 16px;
    line-height: 21px;
  }
}

@media (min-width: 1600px) {
  .title {
    font-size: 26px;
    line-height: 42px;
  }

  .sub-title {
    padding-top: 5px;
    font-size: 20px;
    line-height: 36px;
  }
}
//profile-details

//profile-hireme

.profile__hireme {
  font-family: $muli;
  padding-top: 18px;
  display: flex;
  align-items: center;
}

.hireme {
  display: flex;
  align-items: center;
  flex-direction: row;
  flex-wrap: wrap;
  flex: 1;
}

.hireme-rate {
  display: flex;
  flex-direction: column;
  font-family: $muli;
  padding-right: 15px;
}

.hireme-rate strong {
  font-family: inherit;
  font-size: 16px;
  line-height: 21px;
  font-weight: 700;
}

// .hireme-rate span {
//   font-family: inherit;
//   font-size: 9px;
//   font-weight: 300;
//   line-height: 10px;
//   white-space: nowrap;
//   color: #d3d6e4;
// }

@media (min-width: 375px) {
  .hireme-rate strong {
    font-size: 20px;
    line-height: 25px;
  }

  // .hireme-rate span {
  //   font-size: 11px;
  //   line-height: 13px;
  // }
}

@media (min-width: $sm) {
  .profile__hireme {
  }

  .hireme-rate {
    padding-right: 25px;
  }

  .hireme-rate strong {
    font-size: 18px;
    line-height: 21px;
  }

  // .hireme-rate span {
  //   font-size: 10px;
  //   line-height: 13px;
  // }
}

@media (min-width: $md) {
  .hireme {
    flex: unset;
  }

  .hireme-rate {
    padding-right: 30px;
  }

  .hireme-rate span {
  }
}

@media (min-width: $lg) {
  .profile__hireme {
    padding-top: 25px;
  }

  .hireme-rate strong {
    font-size: 20px;
    line-height: 26px;
  }

  // .hireme-rate span {
  //   font-size: 12px;
  //   line-height: 14px;
  // }
}

@media (min-width: 1600px) {
  .profile__hireme {
    padding-top: 30px;
  }

  .hireme-rate strong {
    font-size: 26px;
    line-height: 36px;
  }

  // .hireme-rate span {
  //   font-size: 14px;
  //   line-height: 18px;
  // }
}
//profile-hireme

//hireme-button

.hireme-button {
  font-family: $muli;
  display: flex;
  font-size: 11px;
  font-weight: 700;
  color: #ffffff;
  background: #f8ab08;
  justify-content: center;
  align-items: center;
  border-radius: 5px;
  width: 74px;
  height: 32px;

  &:hover {
    box-shadow: 0 3px 7px -4px rgba(0, 0, 0, 0.5);
    text-decoration: none;
  }
}

.hireme-button span {
  margin-left: 5px;
  color: inherit;
  font-size: inherit;
  font-weight: inherit;
}

.hireme-button svg {
  height: 13px;
}

@media (min-width: 375px) {
  .hireme-button {
    width: 100px;
    height: 38px;
  }
}

@media (min-width: $sm) {
  .hireme-button {
    width: 115px;
    height: 40px;
    font-size: 12px;

    svg {
      height: 13px;
    }

    span {
      margin-left: 7px;
    }
  }
}

@media (min-width: $md) {
  .hireme-button {
    border-radius: 9px;
    width: 129px;
  }

  .hireme-button svg {
    height: 13px;
  }

  .hireme-button span {
    font-size: 12px;
    line-height: 18px;
  }
}

@media (min-width: 1600px) {
  .hireme-button {
    height: 55px;
    width: 178px;
  }

  .hireme-button svg {
    height: 18px;
  }

  .hireme-button span {
    font-size: 16px;
    line-height: 20px;
  }
}

//hireme-button
</style>
