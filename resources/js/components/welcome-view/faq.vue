<template>
  <v-app style="width:100%; background-color: #ffffff;" class="app-container">
    <!-- main container -->
    <v-container class="main-container">
      <!-- main navigation bar -->
      <home-navbar :windowWidth="windowWidth"></home-navbar>
      <!-- main navigation bar -->
      <v-container class="faq-main-container">
        <v-row align="center" justify="center">
          <v-col xl="9" lg="10" md="10" sm="10" cols="12">
            <h1 class="faq-header my-12">Frequently Asked Questions</h1>
            <v-expansion-panels
              focusable
              class="custom-expansion-panels"
              active-class="custom-expansion-panels-active"
              flat
              v-model="faqPanel"
            >
              <v-expansion-panel
                v-for="(item,i) in faqData"
                :key="i"
                class="mb-5 custom-expansion-panel"
                @click="clickPanelHeader(item.id)"
              >
                <v-expansion-panel-header class="custom-panel-header" disable-icon-rotate>
                  {{ item.title }}
                  <template v-slot:actions>
                    <img
                      :src="currentPanel == item.id ? '/images/welcome_landing_page/icons/chevron-down.svg' : '/images/welcome_landing_page/icons/chevron-right.svg'"
                      alt
                    />
                  </template>
                </v-expansion-panel-header>
                <v-expansion-panel-content class="custom-panel-content">{{item.content}}</v-expansion-panel-content>
              </v-expansion-panel>
            </v-expansion-panels>
          </v-col>
        </v-row>
      </v-container>
    </v-container>
    <!-- main container -->
    <!-- Footer -->
    <home-footer :windowWidth="windowWidth"></home-footer>
    <!-- footer -->
  </v-app>
</template>

<script>
import HomeFooter from "../auth/partials/HomeFooter";
import HomeNavbar from "../auth/partials/HomeNavbar";
export default {
  components: {
    "home-footer": HomeFooter,
    "home-navbar": HomeNavbar,
  },
  data() {
    return {
      windowWidth: window.innerWidth,
      faqPanel: null,
      currentPanel: "",
      faqData: [
        {
          id: 1,
          title: "What is cv builder",
          content:
            "A resume is a document created and used by a person to present their background, skills, and accomplishments. Resumes can be used for a variety of reasons, but most often they are used to secure new employment.A typical resume contains a summary of relevant job experience and education.",
        },
        {
          id: 2,
          title: "What is cv builder",
          content:
            "A resume is a document created and used by a person to present their background, skills, and accomplishments. Resumes can be used for a variety of reasons, but most often they are used to secure new employment.A typical resume contains a summary of relevant job experience and education.",
        },
        {
          id: 3,
          title: "What is cv builder",
          content:
            "A resume is a document created and used by a person to present their background, skills, and accomplishments. Resumes can be used for a variety of reasons, but most often they are used to secure new employment.A typical resume contains a summary of relevant job experience and education.",
        },
        {
          id: 4,
          title: "What is cv builder",
          content:
            "A resume is a document created and used by a person to present their background, skills, and accomplishments. Resumes can be used for a variety of reasons, but most often they are used to secure new employment.A typical resume contains a summary of relevant job experience and education.",
        },
        {
          id: 5,
          title: "What is cv builder",
          content:
            "A resume is a document created and used by a person to present their background, skills, and accomplishments. Resumes can be used for a variety of reasons, but most often they are used to secure new employment.A typical resume contains a summary of relevant job experience and education.",
        },
      ],
    };
  },
  //mounted
  mounted() {
    window.onresize = () => {
      this.windowWidth = window.innerWidth;
    };
  },
  methods: {
    clickPanelHeader(id) {
      if (this.currentPanel == id) {
        this.currentPanel = null;
      } else {
        this.currentPanel = id;
      }
    },
  },
};
</script>

<style lang="scss">
// Here I am using ID SCOPING #welcomeView ID wrapping all styles

@import url("https://fonts.googleapis.com/css?family=Montserrat");
@import url("https://fonts.googleapis.com/css?family=Open+Sans");

#faq,
#registerForm,
#external_reference,
#loginForm {
  .main-container {
    width: 100%;
    min-height: 100vh;
    @media screen and (max-width: 599px) {
      overflow-x: hidden !important;
      margin: 0 !important;
      padding: 0 !important;
    }
  }

  //..................Upper Left Block.................
  //appbar login btn
  .btn-appbar-register {
    font-family: "Montserrat" !important;
    padding: 0.76rem 2.6rem;
    border-radius: 7px;
    box-shadow: 0 10px 15px -3px rgba(0, 72, 254, 0.335);
    letter-spacing: 2px;
    background-color: rgb(0, 70, 254);
    font-size: 12px !important;
    font-weight: bold !important;
    text-transform: uppercase !important;
    color: white !important;

    @media screen and (min-width: 1600px) {
      margin-right: 100px;
    }
    @media screen and (max-width: 1263px) {
      padding: 0.5rem 1.6rem;
      font-size: 12px !important;
    }
  }

  //footer
  .footer-container {
    @media screen and (max-width: 599px) {
      width: 100%;
      padding: 0px !important;
      margin: 0px !important;
    }
  }
  .follow-us-text {
    font-family: "Montserrat" !important;
    font-weight: bold;
    font-size: 32px;
    color: #ffffff !important;
    span {
      font-family: "Open Sans" !important;
      font-size: 18px;
    }

    @media screen and (max-width: 1903px) {
      font-size: 24px;
      span {
        font-size: 12px;
      }
    }

    @media screen and (max-width: 959px) {
      font-size: 1.125rem;
    }
    @media screen and (min-width: 960px) and (max-width: 1263px) {
      label {
        font-size: 12px;
      }
      span {
        font-size: 10px;
      }
    }
    @media screen and (max-width: 599px) {
      font-size: 12px;
      margin-bottom: -47px;
      margin-top: 0px;
    }
    @media screen and (max-width: 380px) {
      font-size: 10px;
    }
    @media screen and (max-width: 329px) {
      font-size: 8px;
    }
  }

  //explore
  .explore-number {
    font-family: "Montserrat" !important;
    font-style: normal;
    font-weight: bold;
    font-size: 64px;
    line-height: 55px;
    color: #061f5a !important;
    @media screen and (max-width: 1903px) {
      font-size: 48px;
      line-height: 36px;
      margin-bottom: -15px;
    }
    @media screen and (min-width: 960px) and (max-width: 1263px) {
      font-size: 32px;
      line-height: 24px;
      margin-bottom: -24px;
    }
  }

  .explore-text {
    font-family: "Montserrat" !important;
    font-style: normal;
    font-weight: bold;
    font-size: 18px;
    line-height: 55px;
    color: #061f5a !important;
    @media screen and (max-width: 1903px) {
      margin-bottom: -10px;
      line-height: 40px;
    }
    @media screen and (min-width: 960px) and (max-width: 1263px) {
      font-size: 14px;
      line-height: 36px;
    }
  }

  .explore-link {
    font-family: "Montserrat" !important;
    font-style: normal;
    font-weight: bold;
    font-size: 18px;
    line-height: 55px;
    color: #0f4cee !important;
    @media screen and (min-width: 960px) and (max-width: 1903px) {
      line-height: 40px;
    }
    @media screen and (min-width: 960px) and (max-width: 1263px) {
      font-size: 14px;
      line-height: 36px;
    }
  }

  //explore
  .logo-footer {
    width: 201px;
    height: auto;

    @media screen and (max-width: 959px) {
      width: 223px;
    }
    @media screen and (max-width: 599px) {
      width: 123px;
      margin-top: -18px;
    }
  }
  .footer-social-icon {
    width: 42.81px !important;
    height: 42.82px !important;

    img {
      width: 20px;
      height: auto;
    }

    @media screen and (max-width: 1903px) {
      width: 28px !important;
      height: 28px !important;
      img {
        width: 14px;
      }
    }
    @media screen and (min-width: 960px) and (max-width: 1263px) {
      width: 24px !important;
      height: 24px !important;
      img {
        width: 10px;
      }
    }

    @media screen and (max-width: 959px) {
      width: 69.07px !important;
      height: 69.07px !important;
      img {
        width: 27px;
      }
    }

    @media screen and (min-width: 600px) and (max-width: 753px) {
      width: 48px !important;
      height: 48px !important;
      img {
        width: 20px;
      }
    }
    @media screen and (max-width: 599px) {
      width: 28px !important;
      height: 28px !important;
      margin-top: 9px !important;
      margin-bottom: -28px;
      img {
        width: 12px;
      }
    }

    @media screen and (max-width: 409px) {
      width: 24px !important;
      height: 24px !important;
      img {
        width: 10px;
      }
    }

    @media screen and (max-width: 380px) {
      width: 22px !important;
      height: 22px !important;
      img {
        width: 10px;
      }
    }

    @media screen and (max-width: 361px) {
      width: 20px !important;
      height: 20px !important;
      img {
        width: 8px;
      }
    }

    @media screen and (max-width: 350px) {
      width: 18px !important;
      height: 18px !important;
      img {
        width: 8px;
      }
    }
    @media screen and (max-width: 335px) {
      width: 16px !important;
      height: 16px !important;
      img {
        width: 6px;
      }
    }
  }

  .custom-footer {
    height: auto !important;
    @media screen and (max-width: 599px) {
      height: 125px;
    }
  }
  //footer

  // faq container
  .faq-main-container {
    .faq-header {
      font-family: "Montserrat" !important;
      font-style: normal;
      font-weight: bold;
      font-size: 52px;
      line-height: 64px;
      text-align: center;
      color: #001d68 !important;
      @media screen and (max-width: 604px){
        font-size: 30px;
        line-height: 40px;
      }
    }
    .custom-panel-header {
      font-family: "Noto Sans" !important;
      font-style: normal;
      font-weight: 600;
      font-size: 20px;
      line-height: 30px;
      color: #687494;
    }
    .custom-panel-content {
      font-family: "Noto Sans" !important;
      font-style: normal;
      font-weight: normal;
      font-size: 16px;
      line-height: 28px;
      color: #687494 !important;
      padding-top: 15px;
    }

    .custom-expansion-panel {
      background: #f6f9ff;
      border-radius: 6px !important;
      box-shadow: none !important;
    }

    .custom-expansion-panels-active {
      border-radius: 6px;
      box-shadow: 0px 4px 70px rgba(0, 0, 0, 0.07) !important;
      background: #ffffff;
      .custom-panel-header {
        background: #1917ef;
        color: #ffffff !important;
      }
    }
  }
  //faq container
}
</style>
