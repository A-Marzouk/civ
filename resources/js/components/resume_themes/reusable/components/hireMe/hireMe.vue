<template>
  <div data-app>
    <v-row justify="center">
      <v-dialog v-model="isModalOpened" persistent max-width="600">
        <v-card>
          <v-toolbar dark color="#f2f3fd" flat>
            <v-toolbar-title class="main-color pl-4">Booking/ payment</v-toolbar-title>
            <v-spacer></v-spacer>
            <v-btn icon dark @click="closeModal">
              <v-icon color="#001D68">mdi-close</v-icon>
            </v-btn>
          </v-toolbar>
          <v-container>
            <v-row class="px-4">
              <v-col cols="12">
                <!-- Profile Info -->
                <v-row dense>
                  <v-col cols="auto"
                    ><v-avatar size="100">
                      <img :src="user.personal_info.profile_pic" :alt="user.personal_info.first_name" /> </v-avatar
                  ></v-col>
                  <v-col cols="9">
                    <div class="user-name">
                      {{ user.personal_info.first_name }} - {{ user.personal_info.designation }}
                    </div>
                    <div class="user-rate">${{ user.payment_info[0].salary }}/Hour</div>
                  </v-col>
                </v-row>
                <!-- Profile Info -->
              </v-col>
              <!-- Hire Me Section -->
              <v-col cols="12">
                <div class="hireMe-text pl-2">Hire Me</div>
                <div class="d-inline-block mx-4">
                  <v-btn fab width="18" height="18" class="elevation" color="white"
                    ><v-icon small color="#888DB1" @click="prevPaymentType()">mdi-chevron-left</v-icon></v-btn
                  >
                  <div class="monthly">
                    <div class="monthly_text">{{ paymentTypes[activePaymentTypeIndex] }}ly</div>
                  </div>
                  <v-btn fab width="18" height="18" class="elevation" color="white"
                    ><v-icon small color="#888DB1" @click="nextPaymentType()">mdi-chevron-right</v-icon></v-btn
                  >
                </div>
              </v-col>
              <!-- Hire Me Section -->

              <!-- Hour Selection -->
              <v-col cols="12">
                <v-container class="selectHour">
                  <v-row justify="center" align-content="center" dense>
                    <v-col cols="12">
                      <div class="d-inline-block select-text">Select Hours</div>
                      <div class="d-inline-block select-tag">Per day</div>
                    </v-col>
                    <v-col cols="12">
                      <div class="perDayNumber">
                        <div v-for="(n, i) in hours" :key="i" class="number">
                          {{ n }}
                        </div>
                      </div>

                      <v-slider
                        dense
                        hide-details
                        class="hourSlider"
                        track-color="#E6E8FC"
                        track-fill-color="#E6E8FC"
                        thumb-color="#001CE2"
                        :step="20"
                        :max="100"
                        :min="20"
                        v-model="selectHours"
                      ></v-slider>

                      <div class="perMonthNumber">
                        <div v-for="(n, i) in hours" :key="i" class="number">
                          {{ n * unitHours }}
                        </div>
                      </div>
                    </v-col>
                    <v-col cols="12">
                      <div class="d-inline-block select-tag">Per {{ paymentTypes[activePaymentTypeIndex] }}</div>
                    </v-col>
                  </v-row>
                </v-container>
              </v-col>
              <!-- Hour Selection -->

              <!-- Calculate Payment -->
              <v-col cols="12">
                <v-container class="calculate-payment">
                  <v-row>
                    <v-col cols="4" class="text-center">
                      <div class="rate-label mb-3">Hourly rate</div>
                      <input type="text" class="rate-input text" name="hourly_rate" :value="'$' + userHourlyRate" />
                      <div class="operators">x</div>
                    </v-col>
                    <v-col cols="4" class="text-center"
                      ><div class="rate-label mb-3">
                        No. of hours/
                        {{
                          paymentTypes[activePaymentTypeIndex] == 'hour' ? 'day' : paymentTypes[activePaymentTypeIndex]
                        }}
                      </div>
                      <input type="text" class="rate-input text" name="no_of_week" :value="totalHours" />
                      <div class="operators">=</div>
                    </v-col>
                    <v-col cols="4" class="text-center"
                      ><div class="rate-label mb-3">
                        <span class="text-capitalize">{{ paymentTypes[activePaymentTypeIndex] }}ly</span> payment
                      </div>

                      <input type="text" class="rate-input total" name="weekly-rate" :value="'$' + paymentTotal" />
                    </v-col>
                  </v-row>
                </v-container>
              </v-col>
              <!-- Calculate Payment -->
              <div class="divider"></div>
              <!-- Total Payment -->
              <v-col cols="12" class="total-payment">
                <v-row no-gutters>
                  <v-col cols="9">
                    <div class="total-payment_text pl-6">
                      Your {{ paymentTypes[activePaymentTypeIndex] }}ly payment will be
                    </div>
                  </v-col>
                  <v-col cols="2">
                    <div class="total-payment_value pl-3">${{ paymentTotal }}</div>
                  </v-col>
                </v-row>
              </v-col>
              <!-- Total Payment -->
              <!-- Payment Options -->
              <v-col cols="12">
                <v-btn :color="payToday ? '#001D68' : '#F2F3FD'" :dark="payToday" depressed @click="payableToday">
                  <div class="payment-text" :class="[payToday ? 'white--text' : 'main-color']">Payable today</div>
                </v-btn>
                <div class="d-inline-block or px-4">or</div>
                <v-btn
                  :color="isDatePickerOpened ? '#001D68' : '#F2F3FD'"
                  depressed
                  @click="pickDateSelected"
                  :dark="isDatePickerOpened"
                >
                  <div class="payment-text" :class="[isDatePickerOpened ? 'white--text' : 'main-color']">
                    Date picker
                  </div>
                </v-btn>
              </v-col>
              <!-- Payment Options -->
              <!-- Date Picker -->
              <v-col cols="12" v-show="isDatePickerOpened">
                <v-row dense>
                  <v-col cols="12">
                    <!-- <v-menu bottom origin="center center" transition="scale-transition">
                      <template v-slot:activator="{ on, attrs }">
                        <v-btn color="#001D68" dark v-bind="attrs" v-on="on" text class="px-0">
                          {{ getArrayOfMonths[0] }} <v-icon right>mdi-calendar-blank</v-icon>
                        </v-btn>
                      </template>

                      <v-list>
                        <v-list-item v-for="(item, i) in getArrayOfMonths" :key="i">
                          <v-list-item-title>{{ item }}</v-list-item-title>
                        </v-list-item>
                      </v-list>
                    </v-menu> -->
                    <v-btn color="#001D68" dark text class="px-0">
                      {{ currentWeekDays[6].month }}
                      <v-icon right>mdi-calendar-blank</v-icon>
                    </v-btn>
                  </v-col>
                  <v-col cols="auto">
                    <v-btn fab width="18" height="18" class="elevation" color="white"
                      ><v-icon small color="#888DB1" @click="decreaseCounter">mdi-chevron-left</v-icon></v-btn
                    >
                  </v-col>
                  <v-col cols="auto">
                    <div class="week-days">
                      <div
                        v-for="(day, i) in currentWeekDays"
                        :key="i"
                        class="week-days_single"
                        :class="currentDate == day.obj ? 'active' : 'inactive'"
                        @click="selectedDate(day.obj)"
                      >
                        <div class="weekday">
                          {{ day.weekday }}
                        </div>
                        <div class="day">{{ day.date }}</div>
                        <div v-show="currentDate == day.obj">●</div>
                      </div>
                    </div>
                    <!-- <div>{{ weekdayCounter }}</div> -->
                  </v-col>
                  <v-col cols="auto">
                    <v-btn fab width="18" height="18" class="elevation" color="white"
                      ><v-icon small color="#888DB1" @click="increaseCounter">mdi-chevron-right</v-icon></v-btn
                    >
                  </v-col>
                </v-row>
              </v-col>
              <!-- Date Picker -->
            </v-row>
            <!-- Payment Form -->
            <v-col cols="12">
              <v-row no-gutters v-show="activePaymentTypeIndex != 0">
                <v-col cols="auto">
                  <div class="month-numbers">Number of {{ paymentTypes[activePaymentTypeIndex] }}’s -</div>
                </v-col>
                <v-col cols="3">
                  <div style="max-width: 72%">
                    <v-select
                      v-model="select"
                      dense
                      color="#001CE2"
                      item-color="#001D68"
                      transition="slide-y-transition"
                      class="d-inline-block font-weight-bold text-capitalize month-numbers"
                      :items="totalNumber"
                      item-text="number"
                      item-value="number"
                      return-object
                      flat
                    ></v-select>
                  </div>
                </v-col>
              </v-row>

              <v-row no-gutters>
                <v-col cols="7">
                  <v-text-field
                    :rules="[rules.required]"
                    label="Name"
                    type="text"
                    single-line
                    color="#001CE2"
                  ></v-text-field>
                  <v-text-field
                    :rules="[rules.required, rules.email]"
                    label="Email"
                    type="email"
                    single-line
                    color="#001CE2"
                  ></v-text-field>
                </v-col>
              </v-row>
            </v-col>
            <!-- Payment Form -->

            <!-- Payment Methods -->
            <v-col cols="12">
              <v-row align="center">
                <v-col cols="3" align-self="center">
                  <v-img
                    src="/icons/hire-modal/stripe-logo.svg"
                    height="30"
                    alt="stripe icon"
                    contain
                    @click="currentActiveMethod = 'stripe'"
                    :class="[currentActiveMethod == 'stripe' ? 'active-method' : 'inactive-method']"
                  ></v-img>
                </v-col>
                <v-col cols="3" align-self="center">
                  <v-img
                    src="/icons/hire-modal/paypal-logo.svg"
                    height="30"
                    alt="paypal icon"
                    contain
                    @click="currentActiveMethod = 'paypal'"
                    :class="[currentActiveMethod == 'paypal' ? 'active-method' : 'inactive-method']"
                  ></v-img
                ></v-col>
                <v-spacer></v-spacer>
                <v-col cols="3">
                  <v-btn dark depressed color="#001CE2" height="50" class="text-captalize"> Confirm</v-btn>
                </v-col>
              </v-row>
            </v-col>
            <!-- Payment Methods -->
          </v-container>
        </v-card>
      </v-dialog>
    </v-row>
  </div>
</template>

<script>
import hireMefunctions from './hireMe.functions';

export default {
  name: 'HireMeModal',
  extends: hireMefunctions
};
</script>

<style lang="scss" scoped>
@import './hireMe.styles.scss';
</style>

<style lang="scss">
.hourSlider {
  .v-slider--horizontal {
    min-height: 25px !important;
    margin-left: 15px !important;
    margin-right: 30px !important;
    .v-slider__thumb {
      padding: 2px 15px !important;
    }
    .v-slider__thumb:before {
      width: 0px !important;
      height: 0px !important;
    }
    .v-slider__thumb,
    .v-slider__thumb:before {
      position: absolute;
      border-radius: 50px !important;
      transition: 0.3s cubic-bezier(0.25, 0.8, 0.5, 1);
    }
  }
}

.theme--light.v-select .v-select__selection--comma {
  color: #001d68 !important;
}
</style>