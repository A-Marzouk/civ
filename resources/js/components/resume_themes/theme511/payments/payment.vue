<template>
  <v-container fluid>
    <v-row justify="center">
      <v-col cols="12" lg="8" class="pt-12">
        <v-tabs
          v-model="tab"
          background-color="transparent"
          color="white"
          centered
          slider-size="4"
          height="75"
        >
          <v-tab v-for="(item,i) in items" :key="i" class="mx-auto">
            <div class="paytitle text-capitalize white--text">{{item.tab}}</div>
          </v-tab>
        </v-tabs>
      </v-col>
      <v-col cols="12" class="mt-8">
        <div class="fill-details">Fill in your details</div>
        <v-tabs-items v-model="tab" style="background-color:transparent;">
          <v-tab-item v-for="(item,i) in items" :key="i">
            <v-row justify="center" class="py-3">
              <v-col cols="12" sm="8" lg="5">
                <div class="input--label ml-6 pb-1">{{item.email}}</div>
                <v-text-field
                  class="input--field"
                  elevation="0"
                  placeholder="exampla@civie.con"
                  solo
                ></v-text-field>
              </v-col>
            </v-row>
            <v-row justify="center" class="py-3">
              <v-col cols="12" sm="8" lg="5">
                <div class="input--label ml-6 pb-1">{{item.pass}}</div>
                <v-text-field
                  class="input--field"
                  elevation="0"
                  :label="item.pass"
                  solo
                  type="password"
                ></v-text-field>
              </v-col>
            </v-row>
            <v-row justify="center" class="py-5">
              <v-col cols="12" sm="8" lg="5">
                <v-btn class="button--payment" height="58">
                  <div>{{item.button}}</div>
                  <v-btn
                    class="button--payment-icon"
                    height="50"
                    min-width="50"
                    max-width="50"
                    elevation="0"
                    color="#39e1aa"
                  >
                    <v-img :src="item.icon"></v-img>
                  </v-btn>
                </v-btn>
              </v-col>
            </v-row>
          </v-tab-item>
        </v-tabs-items>
        <div class="py-lg-12"></div>
        <div class="py-lg-12"></div>
        <div class="py-lg-2"></div>
      </v-col>
    </v-row>
  </v-container>
</template>
<script>
export default {
  data: () => ({
    tab: null,
    items: [
      {
        tab: "Pay with Paypal",
        email: "E-mail",
        pass: "Password",
        button: "Pay",
        icon: "/images/resume_themes/theme511/payment-grey.svg"
      },

      {
        tab: "Pay with Stripe",
        email: "E-mail",
        pass: "Password",
        button: "Pay",
        icon: "/images/resume_themes/theme511/payment-grey.svg"
      }
    ]
  })
};
</script>
<style lang="scss" scoped>
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
.fill-details {
  text-align: center;
  font-family: Poppins;
  font-style: normal;
  font-weight: 800;
  font-size: 40px;
  line-height: 60px;
  color: #ffffff;
}
.input--field {
  border-radius: 50px;
  box-sizing: border-box;
  height: 58px;
  border: 5px solid #39e1aa;
}
.button--payment {
  border-radius: 50px;
  box-sizing: border-box;
  height: 58px;
  border: 5px solid #39e1aa;
  width: 100%;
}
.button--payment-icon {
  position: absolute;
  background: #39e1aa;
  border-radius: 50px;
  right: -16px;
}
.paytitle {
  font-family: Poppins;
  font-style: normal;
  font-weight: bold;
  font-size: 1.2rem;
  line-height: 45px;
  color: #ffffff;
}

.v-tab {
  align-items: center;
  display: flex;
  flex: 0 1 auto;
  font-size: 0.875rem;
  font-weight: 500;
  justify-content: center;
  letter-spacing: 0.0892857143em;
  line-height: normal;
  min-width: 90px;
  max-width: 360px;
  outline: none;
  padding: 0 16px;
  position: relative;
  text-align: center;
  text-decoration: none;
  text-transform: uppercase;
  transition: none;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}
.v-tabs-slider {
  background-color: currentColor;
  height: 100%;
  width: 80% !important;
  margin: auto !important;
}
@media screen and (max-width: 699px) and (min-width: 200px) {
  .fill-details {
    text-align: center;
    font-family: Poppins;
    font-style: normal;
    font-weight: 800;
    font-size: 24px;
    line-height: 60px;
    color: #ffffff;
  }
}
</style>