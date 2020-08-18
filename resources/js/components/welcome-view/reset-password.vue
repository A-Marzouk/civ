<template>
  <v-app style="width:100%;background-color: #F5F6FF;">
    <v-container class="main-container">
      <v-row align="center" justify="center">
        <v-col cols="12" align="center">
          <img src="/images/civie_logo-blue1.svg" alt="logo" />
        </v-col>
        <v-col cols="12" align="center">
          <v-card color="white" class="reset-card pa-xl-12 pa-lg-12" align="left">
            <v-card-title class="reset-title">Password Reset</v-card-title>
            <v-card-subtitle>
              <hr class="horizontal-line" />
            </v-card-subtitle>
            <v-card-subtitle class="reset-name">Hi John</v-card-subtitle>
            <v-card-text class="reset-desc mt-xl-5 mt-lg-5">
              You recently requested a link to reset your civ.ie password.
              Please set a new password by the link below:
            </v-card-text>
            <v-card-subtitle class="reset-link">
              <a href="#">http://www.civ.ie/password/reset/5dfg789sfsdrsfsfd/edit</a>
            </v-card-subtitle>
            <v-card-subtitle>
              <v-btn color="#0046fe" class="btn-change-password"></v-btn>
            </v-card-subtitle>
          </v-card>
        </v-col>
      </v-row>
    </v-container>
  </v-app>
</template>
<script>
export default {
  name: "passwordReset",
  data() {
    return {};
  },
};
</script>

<style scoped lang="scss">
@import url("https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap");
.main-container {
  width: 100%;
  font-family: "Noto Sans" !important;
  .reset-card {
    width: 700px;
    height: 506px;
    box-shadow: 0px 15px 70px rgba(0, 16, 131, 0.06) !important;
    .reset-title {
      font-weight: 600;
      font-size: 24px !important;
      line-height: 33px;
      color: #3c76ff !important;
    }
    .horizontal-line {
      margin-top: 25px;
      width: 600px;
      height: 2px;
      background: #e6e8fc;
      opacity: 0.5;
    }
    .reset-name {
      font-weight: normal;
      font-size: 20px !important;
      line-height: 27px;
      color: #888db1 !important;
    }
    .reset-desc {
      font-size: 16px !important;
      line-height: 28px;
      color: #888db1 !important;
    }
    .reset-link {
      a {
        font-size: 16px !important;
        line-height: 22px;
        color: #3c76ff !important;
      }
    }
    .btn-change-password {
      width: 180px;
      height: 45px;
      border-radius: 5px !important;
      font-weight: bold !important;
      font-size: 15px !important;
      line-height: 20px;
    }
  }
}
</style>