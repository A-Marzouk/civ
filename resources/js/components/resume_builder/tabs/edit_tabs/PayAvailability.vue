<template>
  <v-app>
    <v-container style="width:100%;">
      <v-tabs class="resume-builder__tab-bar" hide-slider v-model="payTab">
        <v-tab
          class="resume-builder__tab"
          v-for="(tabName,i) in tabs"
          :key="i"
        >{{tabName.replace('_',' ')}}</v-tab>
      </v-tabs>
      <v-card class="card-main pa-10 resume-builder__scroll pay-content" flat id="payContent">
        <v-tabs-items v-model="payTab">
          <v-tab-item v-for="i in 2" :key="i">
            <v-container style="width: 100%;">
              <v-form>
                <v-row align="center">
                  <v-col xl="3" lg="4" md="6" sm="6" cols="12">
                    <v-select
                      class="resume-builder__input civie-select"
                      outlined
                      placeholder="Select an option"
                      :items="payTypes"
                      label="Hourly"
                      color="#001CE2"
                      v-model="payType"
                    >
                      <button class="dropdown-icon icon" slot="append">
                        <svg-vue :icon="`dropdown-caret`"></svg-vue>
                      </button>
                    </v-select>
                  </v-col>

                  <v-col xl="3" lg="4" md="6" sm="6" cols="12">
                    <v-text-field
                      class="resume-builder__input civie-input"
                      outlined
                      color="#001CE2"
                      :rules="rules"
                      :class="{'resume-builder__input--disabled': disabledInput}"
                      :disabled="disabledInput"
                      label
                      v-model="arte"
                    >
                    <template slot="append">
                      <v-select class="mt-n4" filled :items="currencyList"></v-select>
                    </template>
                    </v-text-field>
                  </v-col>

                  <v-col xl="3" lg="4" md="6" sm="6" cols="12">
                    <v-btn class="resume-builder__btn civie-btn filled btn-add-new mt-n8">Add New</v-btn>
                  </v-col>
                </v-row>
              </v-form>
            </v-container>
          </v-tab-item>
        </v-tabs-items>
      </v-card>
    </v-container>
  </v-app>
</template>

<script>
import Slick from "vue-slick";
export default {
  name: "PayAvailability",
  components: {
    Slick
  },
  data() {
    return {
      payTab: 0,
      errors: {},
      tabs: ["Pay", "Availibility"],
      currency: {
        title: "usd"
      },
      payTypes: ["Hourly", "Weekly", "Monthly"],
      payType: "",
      currencyList: ["usd", "eur"],
      showCurrencyOptions: false,
      slickOptions: {
        infinite: false,
        slidesToShow: 3,
        slidesToScroll: 1,
        appendDots: ".nav-scrollbox",
        arrows: false
      },
      currentAvailability: {},
      currentPayment: {}
    };
  },
  computed: {
    paymentInfo() {
      let info = this.$store.state.user.payment_info;
      if (info) {
        this.currentPayment = info[0];
      }
      return info;
    },
    availabilityInfo() {
      let info = this.$store.state.user.availability_info;
      if (info) {
        this.currentAvailability = info[0];
      }
      return info;
    }
  },
  props: ["selectProps", "inputProps"],
  methods: {
    toggleSelect() {
      this.disabledSelect = !this.disabledSelect;
    },
    toggleInput() {
      this.disabledInput = !this.disabledInput;
    },
    updatePaymentInfo(savingType) {
      this.errors = {};
      axios
        .put("/api/user/payment-info", this.currentPayment)
        .then(response => {
          savingType === "manual"
            ? this.$store.dispatch("fullScreenNotification")
            : this.$store.dispatch("flyingNotification");
        })
        .catch(error => {
          if (typeof error.response.data === "object") {
            console.log(error.response.data.errors);
            this.errors = error.response.data.errors;
          } else {
            this.errors = "Something went wrong. Please try again.";
          }
          this.$store.dispatch("flyingNotification", {
            message: "Error",
            iconSrc: "/images/resume_builder/error.png"
          });
        });

      axios
        .put("/api/user/availability-info", this.currentAvailability)
        .then(response => {
          savingType === "manual"
            ? this.$store.dispatch("fullScreenNotification")
            : this.$store.dispatch("flyingNotification");
        })
        .catch(error => {
          if (typeof error.response.data === "object") {
            console.log(error.response.data.errors);
            this.errors = error.response.data.errors;
          } else {
            this.errors = "Something went wrong. Please try again.";
          }
          this.$store.dispatch("flyingNotification", {
            message: "Error",
            iconSrc: "/images/resume_builder/error.png"
          });
        });
    },
    selectCurrentPayment(frequency) {
      this.paymentInfo.forEach(payment => {
        if (payment.salary_frequency === frequency) {
          this.currentPayment = payment;
        }
      });
    },
    selectCurrentAvailability(frequency) {
      this.availabilityInfo.forEach(availability => {
        if (availability.available_hours_frequency === frequency) {
          this.currentAvailability = availability;
        }
      });
    },
    updateHoursAvailabilityFrequency(frequency) {
      this.paymentInfo.available_hours_frequency = frequency;
      this.updatePaymentInfo("auto");
    },
    selectCurrency(currency) {
      this.currentPayment.currency = currency;
      this.showCurrencyOptions = false;
      this.updatePaymentInfo("auto");
    },
    nextRate() {
      this.$refs.slickRate.next();
    },
    prevRate() {
      this.$refs.slickRate.prev();
    },
    nextHourFrequency() {
      this.$refs.slickAvailableHours.next();
    },
    prevHourFrequency() {
      this.$refs.slickAvailableHours.prev();
    }
  },

  mounted() {}
};
</script>

<style scoped lang="scss">
@import "../../../../../sass/media-queries";
.hobbies-content {
  height: 323px;
  background: #fff;
  box-shadow: 0px 5px 100px rgba(0, 16, 131, 0.1);
  padding: 50px;
  margin-bottom: 70px;
  scroll-behavior: smooth;
}
.card-main {
  box-shadow: 0px 5px 100px rgba(0, 16, 131, 0.1) !important;
  width: 1412px;
  @media screen and (max-width: 1903px) {
    width: auto;
  }
  .btn-add-new {
    font-family: "Noto Sans" !important;
    width: 120px !important;
    height: 50px !important;
    font-size: 18px !important;
    font-weight: 500;
    @media screen and (max-width: 767px) {
      width: 100px !important;
      height: 40px !important;
      font-size: 15px !important;
    }
  }
}
.error {
  color: red;
  margin-left: 5px;
}
</style>
