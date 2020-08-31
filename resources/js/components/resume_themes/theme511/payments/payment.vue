<template>
  <div class="pay" v-show="paymentToggle">
    <div class="pay__content">
      <v-container pa-0>
        <v-row class="px-10" no-gutters>
          <v-col cols="12" align="end" class="mt-6">
            <v-icon @click="closePayment()">mdi-close</v-icon>
          </v-col>
          <v-col cols="12">
            <div class="pay-title">Book Conor on an</div>
          </v-col>
          <v-col cols="12" sm="11" lg="10" class="my-6">
            <v-tabs
              fixed-tabs
              hide-slider
              background-color="white"
              dark
              height="60"
              class="hourlyTab"
              v-model="tab"
            >
              <v-tab class="hourly-tab" href="#tab-1">
                <div class="tab-title text-capitalize">
                  Hourly
                </div>
              </v-tab>
              <v-tab class="weekly-tab" href="#tab-2">
                <div class="tab-title text-capitalize">
                  Weekly
                </div>
              </v-tab>
              <v-tab class="monthly-tab" href="#tab-3">
                <div class="tab-title text-capitalize">
                  Monthly
                </div>
              </v-tab>
            </v-tabs>
            <v-tabs-items v-model="tab">
              <v-tab-item value="tab-1">
                <div class="tab-value">$10</div>
              </v-tab-item>
              <v-tab-item value="tab-2">
                <div class="tab-value">$200</div>
              </v-tab-item>
              <v-tab-item value="tab-3">
                <div class="tab-value">$1000</div>
              </v-tab-item>
            </v-tabs-items>
          </v-col>
          <v-col cols="12" class="mb-3">
            <div class="tab-title">
              Select the number of Hours you need per week:
            </div>
            <v-row no-gutters class="my-6">
              <v-col cols="auto" class="click-btn-bgc">
                <v-btn fab x-small class="click-btn ma-3">
                  <v-icon color="#001ce2">mdi-plus</v-icon>
                </v-btn>
              </v-col>
              <v-col cols="auto" class="mx-4">
                <input class="tab-title info-field" value="40 hours" />
              </v-col>
              <v-col cols="auto" class="click-btn-bgc">
                <v-btn fab x-small class="click-btn ma-3">
                  <v-icon color="#001ce2">mdi-plus</v-icon>
                </v-btn>
              </v-col>
            </v-row>
          </v-col>
          <v-col cols="12" class="mb-3">
            <div class="tab-title">
              How many weeks would you like to book for?
            </div>
            <v-row no-gutters class="my-6">
              <v-col cols="auto" class="click-btn-bgc">
                <v-btn fab x-small class="click-btn ma-3">
                  <v-icon color="#001ce2">mdi-plus</v-icon>
                </v-btn>
              </v-col>
              <v-col cols="auto" class="mx-4">
                <input class="tab-title info-field" value="10 weeks" />
              </v-col>
              <v-col cols="auto" class="click-btn-bgc">
                <v-btn fab x-small class="click-btn ma-3">
                  <v-icon color="#001ce2">mdi-plus</v-icon>
                </v-btn>
              </v-col>
            </v-row>
          </v-col>
          <v-col cols="12" class="mb-3">
            <div class="total-card px-8 py-6">
              <div class="tab-title">Your total payment will be</div>
              <div class="total-title"><span>$</span>400</div>
              <div class="tab-title">10 usd per hour x 40 hours</div>
            </div>
          </v-col>
          <v-col cols="12">
            <v-row no-gutters>
              <v-col cols="3">
                <v-img src="/images/resume_themes/theme511/stripe.svg"></v-img>
              </v-col>
              <v-col cols="3">
                <v-img src="/images/resume_themes/theme511/paypal.svg"></v-img>
              </v-col>
              <v-col cols="6"></v-col>
            </v-row>
          </v-col>
        </v-row>
      </v-container>
    </div>
  </div>
</template>

<script>
export default {
    props:["paymentToggle","closePayment","currentUser"],
    data(){
      return {
        tab: null,
      }
    }
    
    
}
</script>

<style lang="scss" scoped>
.tab-value {
  font-family: Noto Sans;
  font-style: normal;
  font-weight: 500;
  font-size: 18px;
  line-height: 25px;
  color: #001ce2;
  text-align: center;
  padding: 8px 0px;
}
.hourlyTab {
  border-top-left-radius: 10px;
  border-top-right-radius: 10px;
}
.weekly-tab {
  border-right: 1px solid #e6e8fc;
  border-left: 1px solid #e6e8fc;
  border-bottom: 1px solid #e6e8fc;
}
.hourly-tab {
  border-bottom: 1px solid #e6e8fc;
  border-top-left-radius: 10px;
}
.monthly-tab {
  border-bottom: 1px solid #e6e8fc;
  border-top-right-radius: 10px;
}
.tab-title {
  font-family: Noto Sans;
  font-style: normal;
  font-weight: normal;
  font-size: 15px;
  line-height: 25px;
  color: #888db1;
}
.v-tab--active {
  background-color: #001ce2;
  .weekly-tab {
    border-right: 1px solid #001ce2;
    border-left: 1px solid #001ce2;
    border-bottom: 1px solid #001ce2;
  }
  .hourly-tab {
    border-bottom: 1px solid #001ce2;
    border-top-left-radius: 10px;
  }
  .monthly-tab {
    border-bottom: 1px solid #001ce2;
    border-top-right-radius: 10px;
  }

  .tab-title {
    font-family: Noto Sans;
    font-style: normal;
    font-weight: normal;
    font-size: 15px;
    line-height: 25px;
    color: #ffffff;
  }
}
.click-btn {
  background: #ffffff;
  box-shadow: 0px 5px 10px rgba(0, 16, 131, 0.15);
  border-radius: 50px;
}
.click-btn-bgc {
  background: #f2f3fd;
  border-radius: 5px;
}
.info-field {
  width: 160px;
  height: 56px;
  background: #ffffff;
  border: 2px solid #e6e8fc;
  box-sizing: border-box;
  border-radius: 10px;
  text-align: center;
}
.total-card {
  width: 300px;

  background: #ffffff;
  box-shadow: 0px 0px 50px rgba(0, 19, 156, 0.05);
  border-radius: 10px;
}
.total-title {
  font-family: Noto Sans;
  font-style: normal;
  font-weight: bold;
  font-size: 50px;
  line-height: 60px;

  color: #001ce2;
  span {
    font-size: 14px;
    line-height: 19px;
    color: #001ce2;
    padding-right: 3px;
  }
}
.pay {
  height: 100vh;
  width: 100%;
  position: fixed;
  top: 0;
  left: 0;
  background-color: rgba(0, 0, 0, 0.6);
  z-index: 9999;
  &__content {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 500px;
    height: auto;
    background: #f6f9ff;
    border-radius: 10px;

    @media screen and (max-width: 475px) {
      width: 95%;
      height: auto;
      background: #f6f9ff;
      border-radius: 10px;
    }
  }
}

//message-modal-style
.v-label {
  color: #000000;

  opacity: 0.5 !important;
}
.input--label {
  font-family: Poppins;
  font-style: normal;
  font-weight: normal;
  font-size: 0.8rem;
  line-height: 24px;
  color: #ffffff;
}
.pay-title {
  font-family: Noto Sans;
  font-style: normal;
  font-weight: 500;
  font-size: 26px;
  line-height: 35px;

  color: #888db1;
}

.input--field {
  border-radius: 50px;
  box-sizing: border-box;
  height: 58px;
  border: 5px solid #39e1aa;
}
.input--field .message {
  border-radius: 50px;
  box-sizing: border-box;
  height: 147px;
  border: 5px solid #39e1aa;
}
.button--payment {
  border-radius: 50px;
  box-sizing: border-box;

  border: 5px solid #f56068;
  width: 233px;
}

.paytitle {
  font-family: Poppins;
  font-style: normal;
  font-weight: bold;
  font-size: 20px;
  line-height: 30px;

  color: #f56068;
}
//message-modal-style
</style>