<template>
  <v-app style="width: 100%;">
    <!-- main container starts here -->
    <v-container class="main-container">
      <v-row align="center" justify="center">
        <v-col xl="10" lg="11" md="12">
          <v-app-bar color="transparent" flat tile height="100">
            <div class="div-back-btn">
              <v-btn fab color="#0046FE" depressed dark class="btn-back">
                <img src="/images/pricing/icons/left-arrow.svg" />
              </v-btn>
              <a href="#" class="link-back">Back</a>
            </div>
            <v-spacer></v-spacer>
            <a href="/" class="link-back2">Home</a>
          </v-app-bar>
          <v-container style="width: 100%;">
            <v-row align="center" justify="center">
              <v-col cols="12">
                <v-card flat tile color="transparent" align="center">
                  <v-card-subtitle class="choose-plan-text">Choose Your Plan</v-card-subtitle>
                </v-card>
              </v-col>
              <v-col md="4">
                <v-card class="price-card1" align="center">
                  <v-card-subtitle class="price-title">Free</v-card-subtitle>
                  <v-card-subtitle>
                    <span class="usd"><sup>$</sup></span>
                    <span class="amount">0</span>
                    <span class="usd ml-2">USD/month</span>
                  </v-card-subtitle>
                </v-card>
              </v-col>
              <v-col md="4">1</v-col>
              <v-col md="4">1</v-col>
            </v-row>
          </v-container>
        </v-col>
      </v-row>
    </v-container>
    <!-- main container ends here -->
  </v-app>
</template>

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
  }

  .price-card1 {
    box-shadow: 0px 4px 40px rgba(0, 70, 254, 0.08) !important;
    border-radius: 15px !important;
    height: 600px !important;
  }
  .price-title {
    font-family: "Montserrat" !important;
    font-size: 36px;
    font-weight: bold;
    line-height: $line-height55;
    color: #0a1e56 !important;
  }

  .usd{
    font-family: "Montserrat" !important;
    font-weight: bold;
    font-size: 18px;
    line-height: $line-height55;
    color: #0A1E56 !important;
  }
  .amount{
    font-family: "Montserrat" !important;
    font-weight: bold;
    font-size: 36px;
    line-height: $line-height55;
    color: #0a1e56 !important;
  }

} //main container ends here
</style>