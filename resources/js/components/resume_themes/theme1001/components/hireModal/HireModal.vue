<template>
  <div class="hireme" v-show="hireMeModal">
    <div class="hireme__content">
      <div class="close-button-section">
        <a href="#" class="close-button" @click.prevent="closeHireMeModal()">
          <img
            src="/images/resume_themes/theme203/icons/close.svg"
            alt="close button"
        /></a>
      </div>
      <div class="heading">Book Conor on an</div>
      <div class="tab my-2 my-sm-3">
        <ul class="nav nav-pills" id="pills-tab" role="tablist">
          <li class="nav-item">
            <a
              class="nav-link-hourly active"
              id="pills-home-tab"
              data-toggle="pill"
              href="#pills-home"
              role="tab"
              aria-controls="pills-home"
              aria-selected="true"
              >Hourly</a
            >
          </li>
          <li class="nav-item">
            <a
              class="nav-link-weekly"
              id="pills-profile-tab"
              data-toggle="pill"
              href="#pills-profile"
              role="tab"
              aria-controls="pills-profile"
              aria-selected="false"
              >Weekly</a
            >
          </li>
          <li class="nav-item">
            <a
              class="nav-link-monthly"
              id="pills-contact-tab"
              data-toggle="pill"
              href="#pills-contact"
              role="tab"
              aria-controls="pills-contact"
              aria-selected="false"
              >Monthly</a
            >
          </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
          <div
            class="tab-pane fade show active"
            id="pills-home"
            role="tabpanel"
            aria-labelledby="pills-home-tab"
          >
            $10
          </div>
          <div
            class="tab-pane fade"
            id="pills-profile"
            role="tabpanel"
            aria-labelledby="pills-profile-tab"
          >
            $20
          </div>
          <div
            class="tab-pane fade"
            id="pills-contact"
            role="tabpanel"
            aria-labelledby="pills-contact-tab"
          >
            $100
          </div>
        </div>
      </div>
      <div class="hourly">
        <div class="label">Select the number of Hours you need per week:</div>
        <div class="hourly-section">
          <div class="change-button-section">
            <a href="#" class="change-button" @click="decreamentHours()">
              <img
                src="/images/resume_themes/theme203/icons/tick-minus.svg"
                alt
              />
            </a>
          </div>
          <div class="input">
            <input
              type="text"
              class="input-field"
              :value="inputHour + ' hours'"
            />
          </div>
          <div class="change-button-section">
            <a href="#" class="change-button" @click="increamentHours()">
              <img
                src="/images/resume_themes/theme203/icons/tick-plus.svg"
                alt
              />
            </a>
          </div>
        </div>
      </div>
      <div class="hourly">
        <div class="label">How many weeks would you like to book for?</div>
        <div class="hourly-section">
          <div class="change-button-section">
            <a href="#" class="change-button" @click="decreamentWeek()">
              <img
                src="/images/resume_themes/theme203/icons/tick-minus.svg"
                alt
              />
            </a>
          </div>
          <div class="input">
            <input
              type="text"
              class="input-field"
              :value="inputWeek + ' weeks'"
            />
          </div>
          <div class="change-button-section">
            <a href="#" class="change-button" @click="increamentWeek()">
              <img
                src="/images/resume_themes/theme203/icons/tick-plus.svg"
                alt
              />
            </a>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-body">
          <div class="subtitle">Your total payment will be</div>
          <div class="title"><span>$</span>400</div>
          <div class="subtitle">10 usd per hour x 40 hours</div>
        </div>
      </div>
      <div class="payment-section">
        <div class="logos">
          <a href="#" class="logo">
            <img
              @mouseover="stripeHover = true"
              @mouseleave="stripeHover = false"
              :src="
                stripeHover
                  ? '/images/resume_themes/theme203/icons/stripe-active.svg'
                  : '/images/resume_themes/theme203/icons/stripe.svg'
              "
              alt="Stripe Logo"
            />
          </a>
          <a href="#" class="logo">
            <img
              @mouseover="paypalHover = true"
              @mouseleave="paypalHover = false"
              :src="
                paypalHover
                  ? '/images/resume_themes/theme203/icons/paypal-active.svg'
                  : '/images/resume_themes/theme203/icons/paypal.svg'
              "
              alt="Paypal Logo"
            />
          </a>
        </div>
        <div class="payment-button-section">
          <button type="button" class="payment-button button-text">
            Pay Now
          </button>
        </div>
      </div>
      <div class="logos-mobile">
        <a href="#" class="logo">
          <img
            @mouseover="stripeHover = true"
            @mouseleave="stripeHover = false"
            :src="
              stripeHover
                ? '/images/resume_themes/theme203/icons/stripe-active.svg'
                : '/images/resume_themes/theme203/icons/stripe.svg'
            "
            alt="Stripe Logo"
          />
        </a>
        <a href="#" class="logo">
          <img
            @mouseover="paypalHover = true"
            @mouseleave="paypalHover = false"
            :src="
              paypalHover
                ? '/images/resume_themes/theme203/icons/paypal-active.svg'
                : '/images/resume_themes/theme203/icons/paypal.svg'
            "
            alt="Paypal Logo"
          />
        </a>
      </div>
    </div>
  </div>
</template>


<script>
export default {
  name: "HireModal",
  props: {
    hireMeModal: {
      type: Boolean,
    },
    closeHireMeModal: {
      type: Function,
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
.hireme {
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
    padding: 2rem;

    @media screen and (max-width: 475px) {
      width: 95%;
      height: auto;
      background: #f6f9ff;
      border-radius: 10px;
      overflow: auto;
      padding: 2rem;
    }
    .close-button-section {
      width: 100%;
      display: flex;
      justify-content: flex-end;
      text-align: right;
      .close-button {
        width: 20px;
        text-align: right;
      }
    }
    .heading {
      font-family: "Noto Sans";
      font-style: normal;
      font-weight: 500;
      font-size: 26px;
      line-height: 35px;
      color: #888db1;
    }
    .hourly {
      .label {
        font-family: "Noto Sans";
        font-style: normal;
        font-weight: normal;
        font-size: 18px;
        line-height: 25px;
        color: #888db1;
      }
      .hourly-section {
        display: flex;
        justify-content: flex-start;
        margin-top: 15px;
        @media (max-width: 600px) {
          justify-content: center;
        }
        .change-button-section {
          width: 50px;
          height: 50px;
          display: flex;
          justify-content: center;
          align-items: center;
          background: #f2f3fd;
          border-radius: 5px;
          .change-button {
            img {
              margin: auto;
            }
          }
        }
        .input {
          margin: 0px 10px;
          .input-field {
            background: #ffffff;
            border: 2px solid #e6e8fc;
            box-sizing: border-box;
            border-radius: 10px;
            text-align: center;
            width: 160px;
            height: 47px;
          }
        }
      }
    }
    .card {
      width: 16rem;
      background: #ffffff;
      box-shadow: 0px 0px 50px rgba(0, 19, 156, 0.05);
      border-radius: 10px;
      margin: 15px 0px;
      @media (max-width: 600px) {
        margin: 10px auto;
      }
      .title {
        font-family: Noto Sans;
        font-style: normal;
        font-weight: bold;
        font-size: 45px;
        line-height: 60px;
        color: #001ce2;
        span {
          font-size: 14px;
          line-height: 19px;
          margin-right: 5px;
        }
      }
      .subtitle {
        font-family: "Noto Sans";
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: 19px;
        color: #888db1;
      }
    }
    .payment-section {
      display: flex;
      justify-content: space-around;
      padding: 20px 0px;
      .logos {
        width: 45%;
        display: flex;
        justify-content: space-around;
        align-items: center;
        @media (max-width: 600px) {
          display: none;
        }
        .logo {
          width: 45%;
        }
      }

      .payment-button-section {
        width: 45%;
        @media (max-width: 600px) {
          width: 60%;
        }
        .payment-button {
          display: flex;
          width: 100%;
          height: 60px;
          align-items: center;
          justify-content: center;
          background: #001ce2;
          border-radius: 5px;
          font-family: Noto Sans;
          font-style: normal;
          font-weight: 500;
          font-size: 18px;
          line-height: 18px;
          color: #ffffff;
        }
      }
    }
    .logos-mobile {
      display: none;

      @media (max-width: 601px) {
        display: flex;
        justify-content: space-around;
        align-items: center;
      }
      .logo {
        width: 45%;
        img {
          margin: auto;
        }
      }
    }
  }
}
// hire me modal
//tab
.tab {
  width: 60%;
  @media (max-width: 600px) {
    width: 100%;
  }
}
.nav {
  display: flex;
  width: 100%;
}
.nav-item {
  width: 33.333%;
}
.nav-pills .nav-link-hourly {
  border-top-left-radius: 5px;

  display: block;
  padding: 0.8rem 1.2rem;
  background-color: #fff;
  border-bottom: 1px solid #e6e8fc;
  border-right: 1px solid #e6e8fc;
}
.nav-pills .nav-link-weekly {
  display: block;
  padding: 0.8rem 1.2rem;
  background-color: #fff;
  border-bottom: 1px solid #e6e8fc;
  border-right: 1px solid #e6e8fc;
}
.nav-pills .nav-link-monthly {
  border-top-right-radius: 5px;
  border-bottom: 1px solid #e6e8fc;
  display: block;
  padding: 0.8rem 1.2rem;
  background-color: #fff;
}
.nav-pills .nav-link-hourly.active {
  background-color: #001ce2;
  color: #fff;
}
.nav-pills .nav-link-weekly.active {
  background-color: #001ce2;
  color: #fff;
}
.nav-pills .nav-link-monthly.active {
  background-color: #001ce2;
  color: #fff;
}
.nav-link-hourly:hover,
.nav-link-hourly:focus {
  text-decoration: none;
}
.nav-link-weekly:hover,
.nav-link-weekly:focus {
  text-decoration: none;
}
.nav-link-monthly:hover,
.nav-link-monthly:focus {
  text-decoration: none;
}
.tab-content {
  background-color: #fff;
  .tab-pane {
    text-align: center;
    font-family: "Noto Sans";
    font-style: normal;
    font-weight: 500;
    font-size: 18px;
    line-height: 25px;
    color: #001ce2;
    padding: 10px 5px;
  }
}
//tab
</style>
