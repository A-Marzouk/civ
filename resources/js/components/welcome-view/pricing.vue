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
              <v-col md="4" v-for="plan in plans" :key="plan.id">
                <v-card class="price-card1 mt-10 pa-5">
                  <v-card-subtitle class="price-title" align="center">{{plan.title}}</v-card-subtitle>
                  <v-card-subtitle align="center">
                    <span class="usd">
                      <sup>$</sup>
                      <span class="amount">{{plan.price}}</span>
                    </span>

                    <span class="usd ml-2">{{plan.frequency}}</span>
                  </v-card-subtitle>

                  <v-card-subtitle align="center">
                    <v-btn outlined class="btn-free-sub">{{plan.btn_title}}</v-btn>
                  </v-card-subtitle>
                  <v-card-text>
                    <ul class="features">
                      <li v-for="(feature,index) in plan.features" :key="index">{{feature}}</li>
                    </ul>
                  </v-card-text>
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

<script>
export default {
  data() {
    return {
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

  .usd {
    font-family: "Montserrat" !important;
    font-weight: bold;
    font-size: 18px;
    line-height: $line-height55;
    color: #0a1e56 !important;
    sup {
      top: -1.5em !important;
    }
  }
  .amount {
    font-family: "Montserrat" !important;
    font-weight: bold;
    font-size: 36px;
    line-height: $line-height55;
    color: #0a1e56 !important;
  }

  .btn-free-sub {
    width: 270px !important;
    height: 59.65px !important;
    border: 2px solid #0046fe;
    box-sizing: border-box;
    box-shadow: 0px 4px 40px rgba(0, 70, 254, 0.2);
    border-radius: 10px;
    font-family: Montserrat;
    font-style: normal;
    font-weight: bold;
    font-size: 12px;
    line-height: 0px;
    letter-spacing: 0.2em;
    text-transform: uppercase;
    color: #0046fe;
  }

  ul {
    list-style: none !important;
    margin-left: 4vw;
    margin-top: 10px;
  }
  ul li::before {
    content: "\2022";
    color: #0046fe;
    display: inline-block;
    width: 8px;
    height: 8px;
    margin-left: -1em;
    margin-right: 5px;
  }
  .features {
    font-family: "Open Sans" !important;
    font-weight: 600;
    font-size: 18px;
    line-height: 36px;
    color: #0a1e56 !important;
  }
}
</style>