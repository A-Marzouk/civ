<template>
  <v-app style="width: 100%;">
    <!-- main container starts here -->
    <v-container class="main-container">
      <v-row align="center" justify="center">
        <v-col xl="11" lg="11" md="11" sm="11" cols="12">
          <v-app-bar color="transparent" flat tile height="100">
            <transition name="back-btn-slide slide-fade">
              <div class="div-back-btn" v-if="show">
                <v-btn fab color="#0046FE" depressed dark class="btn-back">
                  <img src="/images/pricing/icons/left-arrow.svg" />
                </v-btn>
                <a href="/" class="link-back">Back</a>
              </div>
            </transition>
            <v-spacer></v-spacer>
            <transition name="home-btn-slide slide-fade">
              <a href="/" class="link-back2" v-if="show">Home</a>
            </transition>
          </v-app-bar>
          <v-container style="width: 100%;">
            <!-- For Desktop -->
            <v-row align="center" justify="center">
              <v-col xl="12" lg="12">
                <transition name="choose-plan slide-fade">
                  <v-card flat tile color="transparent" align="center" v-if="show">
                    <v-card-subtitle class="choose-plan-text">Choose Your Plan</v-card-subtitle>
                  </v-card>
                </transition>
              </v-col>
              <v-col
                md="4"
                sm="12"
                cols="12"
                v-for="(plan,index) in plans"
                :key="plan.id"
                class="hidden-md-and-down"
              >
                <transition :name="'slide-fade-price'+index">
                  <v-card
                    v-if="show"
                    class="price-card mt-10 pa-5"
                    :class="plan.title == 'Standard'?'box-shadow-standard': 'box-shadow-regular'"
                  >
                    <v-card-subtitle class="price-title" align="center">{{plan.title}}</v-card-subtitle>
                    <v-card-subtitle
                      align="center"
                      :class="plan.title == 'Free' ? 'mt-n6': 'subtitle-pro mt-n6' "
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
                        @click="paymentModal=true"
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
                </transition>
              </v-col>
            </v-row>
            <!-- For Desktop -->
            <!-- For tablet and mobile -->
            <v-row class="hidden-lg-and-up" align="center" justify="center">
              <v-col md="12" sm="12" cols="12">
                <transition name="slide-fade-price1">
                  <v-tabs
                    active-class="custom-active-class"
                    background-color="transparent"
                    centered
                    hide-slider
                    center-active
                    grow
                    v-model="price_tab"
                    :height="windowWidth < 599 ? '80' : '120'"
                    v-if="show"
                  >
                    <v-tab
                      active-class="custom-active-tab"
                      v-for="plan in plans"
                      :key="plan.id"
                      @click="currentTab=plan.id"
                      class="mx-md-3 mx-sm-3 mx-1 ct-tab"
                    >{{plan.title}}</v-tab>
                  </v-tabs>
                </transition>
              </v-col>
              <v-col md="12" sm="12" cols="12">
                <transition name="slide-fade-price1">
                  <v-card color="transparent" flat tile v-if="show">
                    <v-tabs-items v-model="price_tab">
                      <v-tab-item v-for="plan in plans" :key="plan.id" align="center">
                        <v-card class="price-card mt-1 pa-5 box-shadow-standard">
                          <v-card-subtitle class="price-title" align="center">{{plan.title}}</v-card-subtitle>
                          <v-card-subtitle
                            align="center"
                            :class="plan.title == 'Free' ? 'mt-n6': 'subtitle-pro mt-n6' "
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
                              @click="paymentModal=true"
                            >{{plan.btn_title}}</v-btn>
                          </v-card-subtitle>
                          <v-card-text class="mt-n5">
                            <v-row align="center" justify="center">
                              <v-col md="9" sm="9" cols="11" offset-md="2" offset-sm="2" offset="1">
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
                </transition>
              </v-col>
            </v-row>
            <!-- for tablet and mobile -->
          </v-container>
        </v-col>
      </v-row>
    </v-container>
    <!-- main container ends here -->
    <!-- Payment Dialog -->
    <v-dialog
      class="paymentModal"
      v-model="paymentModal"
      max-width="999"
      style="overflow-x: hidden !important; border-radius:20px;"
      persistent
    >
      <v-card class="card-payment-modal" style="overflow-x:hidden !important;">
        <v-app-bar flat color="transparent" tile :height="windowWidth>600?'100':'66'">
          <v-spacer></v-spacer>
          <v-btn fab color="#0046FE" dark depressed class="btn-close" @click="paymentModal=false">
            <img src="/images/pricing/icons/close.svg" />
          </v-btn>
        </v-app-bar>
        <v-card
          color="transparent"
          tile
          flat
          align="center"
          class="mt-xl-0 mt-lg-0 mt-md-0 mt-sm-0 mt-1"
        >
          <v-row align="center" justify="center">
            <v-col cols="4">
              <a href="#" class="payment-link">
                <img
                  :src="stripeHover==false?stripeInactive:stripeActive"
                  @mouseover="stripeHover=true"
                  @mouseleave="stripeHover=false"
                  alt="Stripe Logo"
                />
              </a>
            </v-col>
            <v-col cols="4">
              <a href="#" class="payment-link">
                  <img
                    :src="paypalHover == false? paypalInactive : paypalActive"
                    @mouseover="paypalHover=true"
                    @mouseleave="paypalHover=false"
                    alt="Paypal Logo"
                  />
              </a>
            </v-col>
          </v-row>
        </v-card>
      </v-card>
    </v-dialog>
    <!-- Payment Dialog -->
  </v-app>
</template>

<script>
export default {
  data() {
    return {
      show: false,
      windowWidth: window.innerWidth,
      price_tab: 1,
      currentTab: 2,
      paymentModal: false,
      stripeInactive: "/images/pricing/icons/stripe-logo-inactive.png",
      stripeActive: "/images/pricing/icons/stripe-logo-active.svg",
      paypalInactive: "/images/pricing/icons/paypal-logo-inactive.svg",
      paypalActive: "/images/pricing/icons/paypal-logo-active.png",
      paypalHover: false,
      stripeHover: false,
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
    (this.show = true),
      (window.onresize = () => {
        this.windowWidth = window.innerWidth;
      });
  },
  methods: {}
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
      font-size: 42px;
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
      @media screen and (max-width: 380px) {
        width: 220px;
      }
    }
    .btn-pro {
      width: 270px !important;
      height: 59.65px !important;
      box-sizing: border-box;
      box-shadow: 0px 4px 40px rgba(0, 70, 254, 0.2) !important;
      border-radius: 10px;
      font-family: "Montserrat" !important;
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
      @media screen and (max-width: 380px) {
        width: 240px !important;
      }
      @media screen and (max-width: 342px) {
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
      @media screen and (max-width: 342px) {
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
    color: rgba(10, 30, 86, 0.4) !important;
    text-transform: capitalize;
    border-radius: 15px 15px 0px 0px;
    box-shadow: 0px 4px 40px rgba(0, 70, 254, 0.15);
    margin-top: 30px;
    @media screen and (min-width: 600px) and (max-width: 750px) {
      width: 150px;
      font-size: 18px !important;
    }

    @media screen and (max-width: 599px) {
      width: 110px;
      height: 39px;
      font-size: 12px !important;
      margin-top: 23px;
    }
    @media screen and (max-width: 422px) {
      width: 80px;
      font-size: 10px !important;
    }
  }
  .custom-active-tab {
    font-size: 30px !important;
    height: 79px !important;
    margin-top: 14px;
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
.payment-modal {
  overflow-x: hidden !important;
  border-radius: 20px !important;
}
.card-payment-modal {
  height: 311px !important;
  box-shadow: 0px 4px 40px rgba(0, 0, 0, 0.15) !important;
  @media screen and (max-width: 599px) {
    height: 210px !important;
  }
  .payment-link:hover {
    cursor: pointer;
  }
}
.btn-close {
  min-width: 48px !important;
  min-height: 48px !important;
  width: 48px !important;
  height: 48px !important;
  border-radius: 100px !important;
  border: 5px solid #f8f8f8 !important;
  box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.15) !important;
  @media screen and (max-width: 599px) {
    min-width: 38px !important;
    min-height: 38px !important;
    width: 38px !important;
    height: 38px !important;
  }
}

// animations
// back btn
.back-btn-slide.slide-fade-enter-active {
  transition: all 0.8s ease;
}
.back-btn-slide.slide-fade-leave-active {
  transition: all 0.8s cubic-bezier(1, 0.5, 0.8, 1);
}
.back-btn-slide.slide-fade-enter, .slide-fade-leave-to
/* .slide-fade-leave-active below version 2.1.8 */ {
  transform: translateX(-100px);
  opacity: 0;
}
// back btn
// home btn
.home-btn-slide.slide-fade-enter-active {
  transition: all 0.8s ease;
}
.home-btn-slide.slide-fade-leave-active {
  transition: all 0.8s cubic-bezier(1, 0.5, 0.8, 1);
}
.home-btn-slide.slide-fade-enter, .slide-fade-leave-to
/* .slide-fade-leave-active below version 2.1.8 */ {
  transform: translateY(-100px);
  opacity: 0;
}
//home btn
//choose plan
.choose-plan.slide-fade-enter-active {
  transition: all 0.8s ease;
}
.choose-plan.slide-fade-leave-active {
  transition: all 0.8s cubic-bezier(1, 0.5, 0.8, 1);
}
.choose-plan.slide-fade-enter, .slide-fade-leave-to
/* .slide-fade-leave-active below version 2.1.8 */ {
  transform: translateY(-200px);
  opacity: 0;
}
// choose plan
//price card 1
.slide-fade-price0-enter-active {
  transition: all 0.8s ease;
}
.slide-fade-price0-leave-active {
  transition: all 0.8s cubic-bezier(1, 0.5, 0.8, 1);
}
.slide-fade-price0-enter, .slide-fade-price0-leave-to
/* .slide-fade-leave-active below version 2.1.8 */ {
  transform: translateY(100px);
  opacity: 0;
}
//price card 1
// price card2
.slide-fade-price1-enter-active {
  transition: all 1.5s ease;
}
.slide-fade-price1-leave-active {
  transition: all 0.8s cubic-bezier(1, 0.5, 0.8, 1);
}
.slide-fade-price1-enter, .slide-fade-price1-leave-to
/* .slide-fade-leave-active below version 2.1.8 */ {
  transform: translateY(100px);
  opacity: 0;
}

//price card2

//price card3
.slide-fade-price2-enter-active {
  transition: all 0.8s ease;
}
.slide-fade-price2-leave-active {
  transition: all 0.8s cubic-bezier(1, 0.5, 0.8, 1);
}
.slide-fade-price2-enter, .slide-fade-price2-leave-to
/* .slide-fade-leave-active below version 2.1.8 */ {
  transform: translateY(100px);
  opacity: 0;
}
//price card3
// animations
//modal animation

//modal animation
</style>

<style>
#pricing .v-slide-group__prev.v-slide-group__prev--disabled {
  display: none !important;
}
#pricing .v-dialog {
  border-radius: 20px !important;
}
</style>
