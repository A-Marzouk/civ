<template>
  <v-app style="width: 100%;">
    <!-- main container starts here -->
    <v-container class="main-container">
      <v-row align="center" justify="center">
        <v-col xl="11" lg="11" md="11" sm="11" cols="12">
          <v-app-bar color="transparent" flat tile height="100">
            <div class="div-back-btn">
              <v-btn fab color="#0046FE" depressed dark class="btn-back">
                <img src="/images/pricing/icons/left-arrow.svg" />
              </v-btn>
              <a href="/" class="link-back">Back</a>
            </div>
            <v-spacer></v-spacer>
            <a href="/" class="link-back2">Home</a>
          </v-app-bar>
          <v-container style="width: 100%;">
            <!-- For Desktop -->
            <v-row align="center" justify="center">
              <v-col xl="12" lg="12">
                <v-card flat tile color="transparent" align="center">
                  <v-card-subtitle class="choose-plan-text">Choose Your Plan</v-card-subtitle>
                </v-card>
              </v-col>
              <v-col
                md="4"
                sm="12"
                cols="12"
                v-for="plan in plans"
                :key="plan.id"
                class="hidden-md-and-down"
              >
                <v-card
                  class="price-card mt-10 pa-5"
                  :class="plan.title == 'Standard'?'box-shadow-standard': 'box-shadow-regular'"
                >
                  <v-card-subtitle class="price-title" align="center">{{plan.title}}</v-card-subtitle>
                  <v-card-subtitle
                    align="center"
                    :class="plan.title == 'Free' ? 'mt-n10': 'subtitle-pro mt-n10' "
                  >
                    <span class="usd">
                      <sup>$</sup>
                      <span class="amount">{{plan.price}}</span>
                    </span>

                    <span class="usd ml-2">{{plan.frequency}}</span>
                  </v-card-subtitle>

                  <v-card-subtitle align="center">
                    <v-btn
                      v-show="plan.title == 'Free'"
                      outlined
                      class="btn-free-sub"
                    >{{plan.btn_title}}</v-btn>
                    <v-btn
                      color="#0046FE"
                      v-show="plan.title != 'Free'"
                      class="btn-pro"
                    >{{plan.btn_title}}</v-btn>
                  </v-card-subtitle>
                  <v-card-text class="mt-lg-n5">
                    <v-row align="center" justify="center">
                      <v-col xl="8" lg="10" offset-xl="1">
                        <ul class="features mt-10">
                          <li v-for="(feature,index) in plan.features" :key="index">{{feature}}</li>
                        </ul>
                      </v-col>
                    </v-row>
                  </v-card-text>
                </v-card>
              </v-col>
            </v-row>
            <!-- For Desktop -->
            <!-- For tablet and mobile -->
            <v-row class="hidden-lg-and-up" align="center" justify="center">
              <v-col md="12" sm="12" cols="12">
                <v-tabs
                  active-class="custom-active-class"
                  background-color="transparent"
                  centered
                  hide-slider
                  center-active
                  grow
                  v-model="price_tab"
                  :height="windowWidth < 599 ? '60' : '90'"
                >
                  <v-tab
                    active-class="custom-active-tab"
                    v-for="plan in plans"
                    :key="plan.id"
                    @click="currentTab=plan.id"
                    class="mx-md-3 mx-sm-3 mx-1 ct-tab"
                  >{{plan.title}}</v-tab>
                </v-tabs>
              </v-col>
              <v-col md="12" sm="12" cols="12">
                <v-card color="transparent" flat tile>
                  <v-tabs-items v-model="price_tab">
                    <v-tab-item v-for="plan in plans" :key="plan.id" align="center">
                      <v-card class="price-card mt-1 pa-5 box-shadow-standard">
                        <v-card-subtitle class="price-title" align="center">{{plan.title}}</v-card-subtitle>
                        <v-card-subtitle
                          align="center"
                          :class="plan.title == 'Free' ? 'mt-n10': 'subtitle-pro mt-n10' "
                        >
                          <span class="usd">
                            <sup>$</sup>
                            <span class="amount">{{plan.price}}</span>
                          </span>

                          <span class="usd ml-2">{{plan.frequency}}</span>
                        </v-card-subtitle>

                        <v-card-subtitle align="center">
                          <v-btn
                            v-show="plan.title == 'Free'"
                            outlined
                            class="btn-free-sub"
                          >{{plan.btn_title}}</v-btn>
                          <v-btn
                            color="#0046FE"
                            v-show="plan.title != 'Free'"
                            class="btn-pro"
                          >{{plan.btn_title}}</v-btn>
                        </v-card-subtitle>
                        <v-card-text class="mt-n5">
                          <v-row align="center" justify="center">
                            <v-col md="9" sm="9" cols="11" offset-md="2" offset-sm="2" offset="1" >
                              <ul class="features mt-10" align="left">
                                <li
                                  v-for="(feature,index) in plan.features"
                                  :key="index"
                                >{{feature}}</li>
                              </ul>
                            </v-col>
                          </v-row>
                        </v-card-text>
                      </v-card>
                    </v-tab-item>
                  </v-tabs-items>
                </v-card>
              </v-col>
            </v-row>
            <!-- for tablet and mobile -->
          </v-container>
        </v-col>
      </v-row>
    </v-container>
    <!-- main container ends here -->
  </v-app>
</template>

<script>
export default {
  data() {
    return {
      windowWidth: window.innerWidth,
      price_tab: 1,
      currentTab: 2,
      plans: [
        {
          id: 1,
          title: "Free",
          price: "0",
          frequency: "USD/month",
          btn_title: "Continue for free",
          features: [
            "1 Theme",
            "1 civie domain name",
            "With civie advertising",
            "5 integrations"
          ]
        },
        {
          id: 2,
          title: "Standard",
          price: "5",
          frequency: "USD/month",
          btn_title: "Make me a civie standard",
          features: [
            "20 + Themes",
            "2 civie domain name",
            "Without advertising",
            "10 integrations",
            "Personalize domain name",
            "Real Time job alerts"
          ]
        },
        {
          id: 3,
          title: "Pro",
          price: "15",
          frequency: "USD/month",
          btn_title: "Make me a civie pro",
          features: [
            "50 + Themes",
            "5 civie domain name",
            "Without advertising",
            "30+ integrations",
            "Personalize domain name",
            "Real Time job alerts",
            "Highlight priority links"
          ]
        }
      ]
    };
  },
  //mounted
  mounted() {
    window.onresize = () => {
      this.windowWidth = window.innerWidth;
    };
  }
};
</script>

<style lang="scss" scoped>
@import url("https://fonts.googleapis.com/css?family=Montserrat");
@import url("https://fonts.googleapis.com/css?family=Open+Sans");

$line-height55: 55px;

.main-container {
  width: 100% !important;

  .div-back-btn {
    .btn-back {
      width: 54px !important;
      height: 54px !important;
      border: 5px solid #f8f8f8 !important;
      box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.15) !important;
      margin-top: -7px;
      @media screen and (max-width: 599px) {
        width: 35px !important;
        height: 35px !important;
        img {
          width: 14px !important;
          height: 11px !important;
        }
      }
    }

    .link-back {
      font-family: "Montserrat" !important;
      font-weight: 500;
      font-size: 18px;
      line-height: 22px;
      color: #0046fe !important;
      margin-left: 8px;
    }
  }
  .link-back2 {
    font-family: "Montserrat" !important;
    font-weight: 500;
    font-size: 18px;
    line-height: 22px;
    color: #0046fe !important;
  }

  .choose-plan-text {
    font-family: "Montserrat" !important;
    font-weight: bold;
    font-size: 64px;
    line-height: $line-height55;
    color: #0046fe !important;
    @media screen and (min-width: 600px) and (max-width: 1263px) {
      font-size: 36px;
    }
    @media screen and (max-width: 599px) {
      font-size: 24px;
    }
  }

  .box-shadow-regular {
    box-shadow: 0px 4px 40px rgba(0, 70, 254, 0.08);
  }
  .box-shadow-standard {
    box-shadow: 0px 4px 40px rgba(0, 70, 254, 0.15);
  }

  .price-card {
    border-radius: 15px !important;
    width: 482px !important;
    height: 600px !important;
    @media screen and (min-width: 1264px) and (max-width: 1903px) {
      height: 540px !important;
    }

    @media screen and (min-width: 600px) and (max-width: 1263px) {
      height: 574px !important;
    }
    @media screen and (max-width: 599px) {
      width: auto !important;
      height: 548px !important;
    }

    .price-title {
      font-family: "Montserrat" !important;
      font-size: 36px;
      font-weight: bold;
      line-height: $line-height55;
      color: #0a1e56 !important;
      @media screen and (min-width: 1264px) and (max-width: 1903px) {
        font-size: 30px;
      }
      @media screen and (min-width: 600px) and (max-width: 1263px) {
        font-size: 36px;
      }
      @media screen and (max-width: 599px) {
        font-size: 24px;
      }
    }
    .subtitle-pro {
      span {
        color: #0046fe !important;
      }
    }

    .usd {
      font-family: "Montserrat" !important;
      font-weight: bold;
      font-size: 18px;
      line-height: $line-height55;
      color: #0a1e56 !important;
      sup {
        top: -1.5em !important;
      }
      @media screen and (min-width: 1264px) and (max-width: 1903px) {
        font-size: 14px;
      }
      @media screen and (min-width: 600px) and (max-width: 1263px) {
        font-size: 18px;
      }
    }
    .amount {
      font-family: "Montserrat" !important;
      font-weight: bold;
      font-size: 36px;
      line-height: $line-height55;
      color: #0a1e56 !important;
      @media screen and (min-width: 1264px) and (max-width: 1903px) {
        font-size: 30px;
      }
      @media screen and (max-width: 1263px) {
        font-size: 36px;
      }
    }

    .btn-free-sub {
      width: 270px !important;
      height: 59.65px !important;
      border: 2px solid #0046fe;
      box-sizing: border-box;
      box-shadow: 0px 4px 40px rgba(0, 70, 254, 0.2) !important;
      border-radius: 10px;
      font-family: Montserrat;
      font-style: normal;
      font-weight: bold;
      font-size: 12px;
      line-height: 0px;
      letter-spacing: 0.2em;
      text-transform: uppercase;
      color: #0046fe;
      @media screen and (min-width: 1264px) and (max-width: 1903px) {
        width: 250px !important;
        font-size: 10px;
      }

      @media screen and (min-width: 600px) and (max-width: 1263px) {
        width: 270px !important;
        height: 59.65px !important;
        font-size: 12px;
      }
      @media screen and (max-width: 599px) {
        width: 241px !important;
        height: 43px !important;
        font-size: 10px;
      }
      @media screen and (max-width: 380px){
        width: 220px;
      }
    }
    .btn-pro {
      width: 270px !important;
      height: 59.65px !important;
      box-sizing: border-box;
      box-shadow: 0px 4px 40px rgba(0, 70, 254, 0.2) !important;
      border-radius: 10px;
      font-family: Montserrat;
      font-style: normal;
      font-weight: bold;
      font-size: 12px;
      line-height: 0px;
      letter-spacing: 0.2em;
      text-transform: uppercase;
      color: #ffffff !important;
      @media screen and (min-width: 1264px) and (max-width: 1903px) {
        width: 250px !important;
        font-size: 10px;
      }
      @media screen and (min-width: 600px) and (max-width: 1263px) {
        width: 270px !important;
        height: 59.65px !important;
        font-size: 12px;
      }
      @media screen and (max-width: 599px) {
        width: 241px !important;
        height: 43px !important;
        font-size: 10px;
      }
      @media screen and (max-width: 380px){
        width: 240px !important;
      }
      @media screen and (max-width: 342px){
        font-size: 8px;
        width: 200px !important;
      }

    }

    ul {
      list-style: none !important;
      margin-top: 10px;
      // @media screen and (min-width: 1264px) and (max-width: 1903px) {
      //   margin-left: 1.5vw;
      // }
      // @media screen and (min-width: 960px) and (max-width: 1263px) {
      //   margin-left: 8vw;
      // }
      // @media screen and (min-width: 600px) and (max-width: 959px) {
      //   margin-left: 12vw;
      // }
      // @media screen and (max-width: 599px) {
      //   margin-left: 13vw;
      // }
    }
    ul li::before {
      content: "\2022";
      color: #0046fe;
      display: inline-block;
      width: 8px;
      height: 8px;
      margin-left: -1em;
      margin-right: 5px;
      @media screen and (max-width: 599px) {
        width: 4.13px;
        height: 4.13px;
      }
    }
    .features {
      font-family: "Open Sans" !important;
      font-weight: 600;
      font-size: 18px;
      line-height: 36px;
      color: #0a1e56 !important;
      @media screen and (min-width: 1264px) and (max-width: 1903px) {
        font-size: 14px;
        line-height: 30px;
      }
      @media screen and (min-width: 600px) and (max-width: 1263px) {
        font-size: 18px;
      }
      @media screen and (max-width: 599px) {
        font-size: 14px;
      }
      @media screen and (max-width: 342px){
        font-size: 12px;
      }
    }
  } //price card ends here
  .price-card:hover {
    box-shadow: 0px 4px 40px rgba(0, 70, 254, 0.2);
  }

  .ct-tab {
    width: 180px;
    height: 64px;
    font-family: "Montserrat" !important;
    font-weight: bold;
    font-size: 24px !important;
    line-height: $line-height55;
    margin-top: 15px;
    color: rgba(10, 30, 86, 0.4) !important;
    text-transform: capitalize;
    border-radius: 15px 15px 0px 0px;
    box-shadow: 0px 4px 40px rgba(0, 70, 254, 0.15);
    margin-top: 20px;
    @media screen and (min-width: 600px) and (max-width: 750px) {
      width: 150px;
      font-size: 18px !important;
    }

    @media screen and (max-width: 599px) {
      width: 110px;
      height: 39px;
      font-size: 12px !important;
      margin-top: 14px;
    }
    @media screen and (max-width: 422px) {
      width: 80px;
      font-size: 10px !important;
    }
  }
  .custom-active-tab {
    font-size: 30px !important;
    height: 79px !important;
    margin-top: 5px;
    background-color: #0046fe !important;
    color: #ffffff !important;
    border-radius: 15px 15px 0px 0px;
    @media screen and(min-width: 600px) and (max-width: 750px) {
      width: 150px;
      font-size: 18px !important;
    }
    @media screen and (max-width: 599px) {
      width: 135px !important;
      height: 48px !important;
      font-size: 18px !important;
    }
    @media screen and (max-width: 422px) {
      width: 100px;
      font-size: 14px !important;
    }
  }
  // .custom-active-class {
  //   height: 79px !important;
  // }
}
</style>

<style>
#pricing .v-slide-group__prev.v-slide-group__prev--disabled {
  display: none !important;
}
</style>