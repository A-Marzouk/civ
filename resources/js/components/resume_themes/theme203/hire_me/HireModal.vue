<template>
  <v-dialog v-model="hireModal" :hireMeModal="hireMeModal" max-width="567" persistent>
    <v-card color="#F6F9FF" class="card-hire-me-modal pa-sm-3 pa-5">
      <div align="right">
        <v-btn icon @click="hireMeModal = false">
          <img src="/images/resume_themes/theme203/icons/close.svg" alt="close button" />
        </v-btn>
      </div>
      <v-card-title class="title mt-n5">Book Conor on an</v-card-title>
      <v-card-subtitle>
        <!-- Hire me tab -->
        <v-row>
          <v-col xl="9" lg="9" cols="12">
            <v-tabs
              center-active
              grow
              hide-slider
              v-model="hireMeTab"
              active-class="hire-me-tab-active"
              background-color="transparent"
            >
              <v-tab
                v-for="tab in hireOptions"
                :key="tab.id"
                class="text-capitalize hire-me-tab-text"
                :class="[
                      tab.title == 'Hourly'?'custom-tab-round-left':'',
                      tab.title == 'Monthly'?'custom-tab-round-right':''
                    ]"
              >{{tab.title}}</v-tab>
            </v-tabs>
          </v-col>
          <v-col
            xl="9"
            lg="9"
            cols="12"
            class="mt-xl-n5 mt-lg-n5 mt-n5"
            :align="windowWidth<=599?'center':'left'"
          >
            <v-card flat align="center" height="43" class="pa-2">
              <v-tabs-items v-model="hireMeTab">
                <v-tab-item class="tab-item">$10</v-tab-item>
                <v-tab-item class="tab-item">$20</v-tab-item>
                <v-tab-item class="tab-item">$30</v-tab-item>
              </v-tabs-items>
            </v-card>
          </v-col>
        </v-row>
        <!-- hire me tab -->
      </v-card-subtitle>
      <v-card-subtitle class="select-hour mt-xl-5 mt-lg-2 mt-5">
        Select the number of Hours you need per week:
        <div
          class="d-flex flex-row align-items-center mt-xl-5 mt-lg-2 mt-5"
          :align="windowWidth<=599?'center':'left'"
        >
          <div class="align-self-center mx-xl-2 mx-lg-3 btn-holder">
            <v-btn color="#F2F3FD" class="btn-decreament" icon @click="decreamentHours()">
              <img src="/images/resume_themes/theme203/icons/tick-minus.svg" alt />
            </v-btn>
          </div>
          <div class="align-self-center mx-xl-2 mx-lg-3 mx-md-3 mx-sm-2 mx-2">
            <v-text-field
              background-color="#ffffff"
              class="input-hour"
              height="47"
              hide-details
              value="40 hours"
              outlined
              v-model="inputHour"
            ></v-text-field>
          </div>
          <div
            class="align-self-center mx-xl-2 mx-lg-3 mx-md-3 mx-sm-2 mx-2 btn-holder"
            @click="increamentHours()"
          >
            <v-btn color="#F2F3FD" class="btn-decreament" icon>
              <img src="/images/resume_themes/theme203/icons/tick-plus.svg" alt />
            </v-btn>
          </div>
        </div>
      </v-card-subtitle>
      <!-- Weekly -->
      <v-card-subtitle class="select-hour mt-xl-5 mt-lg-2 mt-5">
        How many weeks would you like to book for?
        <div
          class="d-flex flex-row align-items-center mt-5"
          :align="windowWidth<=599?'center':'left'"
        >
          <div class="align-self-center mx-xl-2 mx-lg-3 btn-holder">
            <v-btn color="#F2F3FD" class="btn-decreament" icon @click="decreamentWeek()">
              <img src="/images/resume_themes/theme203/icons/tick-minus.svg" alt />
            </v-btn>
          </div>
          <div class="align-self-center mx-xl-2 mx-lg-3 mx-md-3 mx-sm-2 mx-2">
            <v-text-field
              background-color="#ffffff"
              class="input-hour"
              height="47"
              hide-details
              value="10 weeks"
              outlined
              v-model="inputWeek"
            ></v-text-field>
          </div>
          <div class="align-self-center mx-xl-2 mx-lg-3 mx-md-3 mx-sm-2 mx-2 btn-holder">
            <v-btn color="#F2F3FD" class="btn-decreament" icon @click="increamentWeek()">
              <img src="/images/resume_themes/theme203/icons/tick-plus.svg" alt />
            </v-btn>
          </div>
        </div>
      </v-card-subtitle>
      <!-- Weekly -->

      <!-- Total Payment -->
      <v-card-subtitle
        class="total-payment mt-xl-5 mt-lg-2 mt-5"
        :align="windowWidth<=599?'center':'left'"
      >
        <v-card flat class="card-payment pa-5" align="left">
          <div class="subtitle">Your total payment will be</div>
          <div class="total-payment-text">
            <span class="mr-2">$</span>400
          </div>
          <div class="subtitle">10 usd per hour x 40 hours</div>
        </v-card>
      </v-card-subtitle>
      <!-- Total Payment -->
      <!-- Payment Method -->
      <v-card-subtitle class="hidden-xs-only">
        <div class="d-flex flex-row">
          <div class="payment-logo mx-2 align-self-center">
            <a href="#">
              <img
                @mouseover="stripeHover=true"
                @mouseleave="stripeHover=false"
                :src="stripeHover?'/images/resume_themes/theme203/icons/stripe-active.svg':'/images/resume_themes/theme203/icons/stripe.svg'"
                alt="Stripe Logo"
              />
            </a>
          </div>
          <div class="payment-logo mx-4 align-self-center">
            <a href="#">
              <img
                @mouseover="paypalHover=true"
                @mouseleave="paypalHover=false"
                :src="paypalHover?'/images/resume_themes/theme203/icons/paypal-active.svg':'/images/resume_themes/theme203/icons/paypal.svg'"
                alt="Paypal Logo"
              />
            </a>
          </div>
          <div class="mx-4">
            <v-btn class="payment-btn" depressed color="#001CE2">Pay Now</v-btn>
          </div>
        </div>
      </v-card-subtitle>
      <!-- payment method for mobile -->
      <v-card-subtitle class="hidden-sm-and-up" align="center">
        <div class="d-flex flex-column" align="center">
          <div class>
            <v-btn class="payment-btn" depressed color="#001CE2">Pay Now</v-btn>
          </div>

          <div class="d-flex flex-row mt-3 justify-content-center" align="center">
            <div class="payment-logo mx-3 align-self-center">
              <a href="#">
                <img
                  @mouseover="stripeHover=true"
                  @mouseleave="stripeHover=false"
                  :src="stripeHover?'/images/resume_themes/theme203/icons/stripe-active.svg':'/images/resume_themes/theme203/icons/stripe.svg'"
                  alt="Stripe Logo"
                />
              </a>
            </div>
            <div class="payment-logo mt-2 mx-5">
              <a href="#">
                <img
                  @mouseover="paypalHover=true"
                  @mouseleave="paypalHover=false"
                  :src="paypalHover?'/images/resume_themes/theme203/icons/paypal-active.svg':'/images/resume_themes/theme203/icons/paypal.svg'"
                  alt="Paypal Logo"
                />
              </a>
            </div>
          </div>
        </div>
      </v-card-subtitle>
      <!-- payment method for mobile -->
      <!-- Payment Method -->
    </v-card>
  </v-dialog>
</template>


<script>
export default {
  name: "HireModal",
  props: {
    hireMeModal: {
      type: Boolean,
      default: true,
    },
  },
  data() {
    return {
      windowWidth: window.innerWidth,
      inputHour: 40,
      inputWeek: 10,
      stripeHover: false,
      paypalHover: false,
      hireMeTab: null,
      hireModal: false,
      hireOptions: [
        { id: 1, title: "Hourly" },
        { id: 2, title: "Weekly" },
        { id: 3, title: "Monthly" },
      ],
    };
  },
  watch: {
    hireMeModal: function (val) {
      if (val == true) {
        this.hireModal = true;
      } else {
        this.hireModal = false;
      }
    },
  },
  mounted() {
    window.onresize = () => {
      this.windowWidth = window.innerWidth;
    };
  },
  methods: {
    increamentHours() {
      this.inputHour++;
    },
    decreamentHours() {
      if (this.inputHour > 0) {
        this.inputHour--;
      }
    },

    increamentWeek() {
      this.inputWeek++;
    },

    decreamentWeek() {
      if (this.inputWeek > 0) {
        this.inputWeek--;
      }
    },
  },
};
</script>

<style lang="scss" scoped>
//hire me modal
.card-hire-me-modal {
  .title {
    font-family: "Noto Sans" !important;
    font-style: normal;
    font-weight: 500;
    font-size: 26px;
    line-height: 35px;
    color: #888db1 !important;
  }
  border-radius: 10px !important;
  .hire-me-tab-text {
    font-family: "Noto Sans" !important;
    font-style: normal;
    font-weight: normal;
    font-size: 18px;
    line-height: 25px;
    color: #888db1 !important;
    background: #ffffff;
    margin-left: 1px;
    margin-right: 1px;
    @media screen and (max-width: 667px) {
      font-size: 15px;
      line-height: 20px;
    }
  }
  .hire-me-tab-active {
    background: #001ce2 !important;
    font-family: "Noto Sans" !important;
    font-size: 18px;
    line-height: 25px;
    color: #ffffff !important;
    @media screen and (max-width: 667px) {
      font-size: 15px;
      line-height: 20px;
    }
  }
  .custom-tab-round-left {
    border-top-left-radius: 10px;
  }
  .custom-tab-round-right {
    border-top-right-radius: 10px;
  }
  .tab-item {
    font-family: "Noto Sans" !important;
    font-style: normal;
    font-weight: 500;
    font-size: 18px;
    line-height: 25px;
    color: #001ce2 !important;
  }

  .select-hour {
    font-family: "Noto Sans" !important;
    font-style: normal;
    font-weight: normal;
    font-size: 18px;
    line-height: 25px;
    color: #888db1 !important;
    .btn-holder {
      display: block;
      width: 47px;
      height: 47px;
      background: #f2f3fd;
      border-radius: 5px;
      padding: 6px;
      margin-top: 10px;
    }
    .input-hour {
      border-radius: 10px !important;
      width: 160px;
      height: 47px;
    }
  }
  // total payment
  .total-payment {
    .card-payment {
      width: 279px;
      height: 142px;
      box-shadow: 0px 0px 50px rgba(0, 19, 156, 0.05);
      border-radius: 10px;
      @media screen and (min-width: 960px) and (max-width: 1903px) {
        height: auto;
      }
      @media screen and (max-width: 667px) {
        width: 253px;
        height: auto;
      }
      .subtitle {
        font-family: "Noto Sans" !important;
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: 19px;
        color: #888db1 !important;
      }
      .total-payment-text {
        font-family: "Noto Sans" !important;
        font-weight: bold;
        font-size: 36px;
        line-height: 49px;
        color: #001ce2 !important;
        span {
          font-size: 14px;
          line-height: 19px;
        }
      }
    }
  }
  .payment-btn {
    width: 220px;
    height: 60px !important;
    border-radius: 5px !important;
    font-family: "Noto Sans" !important;
    font-style: normal;
    font-weight: 500;
    font-size: 18px;
    line-height: 18px;
    color: #ffffff !important;
    text-transform: capitalize !important;
    @media screen and (max-width: 667px) {
      width: 194px !important;
      height: 55.55px !important;
    }
  }
}
// hire me modal
</style>