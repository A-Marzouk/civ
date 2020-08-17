<template>
    <div class="main-info-bar">
      <div
        class="left"
      >
        <div class="profile-picture">
          <img :src="currentUser.personal_info.profile_pic" alt />
        </div>
        <div class="main-info">
          <div class="user-name">
            {{ currentUser.personal_info.full_name }}
            <a
              href="/pdf-theme-preview-by-code-8"
              class="pdf-btn"
              target="_blank"
            >
              <svg-vue :icon="'themes.pdf-button-theme8'"></svg-vue>
            </a>
          </div>
          <div class="job-title">
            {{ currentUser.personal_info.designation }}
          </div>
          <div class="social">
            <div class="d-flex">
              <div class="message-btn d-flex">
                <a href="javascript:void(0)">
                  <img
                    src="/images/resume_themes/theme8/Icon material-email.svg"
                    alt="mail icon"
                  />
                  <span>Message</span>
                </a>
              </div>
              <div class="video-btn hideOnNotTablet">
                <a href="javascript:void(0)">
                  <img
                    src="/images/resume_themes/theme8/video-player.svg"
                    alt="video icon"
                  />
                  <span>Video</span>
                </a>
              </div>
              <div class="audio-btn hideOnNotTablet">
                <a href="javascript:void(0)" @click.prevent="toogleAudio">
                  <img
                    src="/images/resume_themes/theme8/headphones.svg"
                    alt="audio icon"
                  />
                  <span>Audio</span>
                </a>
              </div>
            </div>

            <div class="icons NoDecor">
              <a
                v-for="item in currentUser.links"
                :key="item.id + '_link'"
                :href="item.link"
                target="_blank"
                v-show="item.is_active"
              >
                <img
                  :src="
                    `/images/resume_themes/theme8/social_icons/${stringToLowerCase(
                      item.link_title
                    )}.webp`
                  "
                  alt="social icon"
                />
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="right">
        <div class="interviews hideMeOnTablet">
          <div class="text hideMeOnPhone">Interview:</div>
          <div class="video-btn">
            <a href="javascript:void(0)">
              <img
                src="/images/resume_themes/theme8/video-player.svg"
                alt="video icon"
              />
              <span>Video</span>
            </a>
          </div>
          <div class="audio-btn">
            <a href="javascript:void(0)" @click.prevent="toogleAudio">
              <img
                src="/images/resume_themes/theme8/headphones.svg"
                alt="audio icon"
              />
              <span>Audio</span>
            </a>
          </div>
        </div>
        <div
          class="prof-info"
        >
          <div class="prof-left">
            <div class="hours">
              <div class="text" style="text-transform: capitalize;">
                <v-icon small dark @click="paymentInfoPrev()"
                  >navigate_before</v-icon
                >
                <div
                  v-for="(payment_Info, index) in currentUser.payment_info"
                  :key="index"
                  v-show="payment_Info.is_public"
                  class="d-inline-block"
                >
                  <span class="title" v-if="paymentInfo == index">
                    {{ payment_Info.salary_frequency }} rate
                  </span>
                </div>
                <v-icon small dark @click="paymentInfoNext()"
                  >navigate_next</v-icon
                >
              </div>
              <div class="number">
                <div
                  v-for="(payment_Info, index) in currentUser.payment_info"
                  :key="index"
                  v-show="payment_Info.is_public"
                >
                  <span class="title" v-if="paymentInfo == index">
                    {{ formatSalary(payment_Info.salary, payment_Info.currency.toUpperCase() ) }}
                  </span>
                </div>
              </div>
            </div>
            <div class="horizontal-divider"></div>
            <div class="rate">
              <div class="text">
                Available (<v-icon small dark @click="availablePrev()"
                  >navigate_before</v-icon
                >
                <div
                  v-for="(availability_info,
                  index) in currentUser.availability_info"
                  :key="index"
                  v-show="availability_info.is_public"
                  class="d-inline-block"
                >
                  <span class="title" v-if="available == index">
                    {{ availability_info.available_hours_frequency }}
                  </span>
                </div>
                <v-icon small dark @click="availableNext()"
                  >navigate_next</v-icon
                >)
              </div>
              <div class="number" style="text-transform: capitalize;">
                <div
                  v-for="(availability_info,
                  index) in currentUser.availability_info"
                  :key="index"
                  v-show="availability_info.is_public"
                >
                  <span class="title" v-if="available == index">
                    {{ availability_info.available_hours }} Hours
                  </span>
                </div>
              </div>
            </div>
          </div>
          <div class="prof-right">
            <div class="hire-me-btn">
              <a href="javascript:void(0)">Hire Me</a>
            </div>
          </div>
        </div>
      </div>
      <!-- Audio Modal -->
      <div class="media" v-if="isVisibleAudioPopup">
        <div class="media__content">
          <div class="media__content_close">
            <a href="javascript:void(0)" @click.prevent="toogleAudio"
              ><img
                src="/images/resume_themes/theme3/close.svg"
                alt="close-icon"
              />
            </a>
          </div>
          <span style="margin-top:6%;">
            Hello World
          </span>
        </div>
      </div>
    <!-- Audio Modal -->
    </div>
</template>

<script>
export default {
    props: ["currentUser", "isVisibleAudioPopup"],
    data: () => ({
				available: 0,
      	paymentInfo: 0,
    }),
    methods: {
			availableNext() {
					if (this.available == 2) {
						this.available = 0;
					} else this.available++;
				},
				availablePrev() {
					if (this.available == 0) {
						this.available = 0;
					} else this.available--;
				},
				paymentInfoNext() {
					if (this.paymentInfo == 2) {
						this.paymentInfo = 0;
					} else this.paymentInfo++;
				},
				paymentInfoPrev() {
					if (this.paymentInfo == 0) {
						this.paymentInfo = 0;
					} else this.paymentInfo--;
				},
        stringToLowerCase(string) {
					if (string) {
							return string.toLowerCase();
					}
					return "social_icon";
				},
				formatSalary (salary, currency) {
					return new Intl.NumberFormat('en-US', { style: 'currency', currency, maximumFractionDigits: 2, minimumFractionDigits: 0 }).format(salary)
				},
				toggleAudio () {
					this.$emit('toggleAudioPofpup')                                        
				}
    }
}
</script>

<style lang="scss" scoped>
	.main-info-bar {
    display: flex;
    justify-content: space-between;
    position: relative;
    z-index: 1;
		overflow-x: hidden;
    width: 100%;
    padding: 78px;

    .left {
      display: flex;
      position: relative;
      margin-right: 15px;

      .profile-picture {
        width: 200px;

        img {
          width: 100%;
          border-radius: 50%;
        }
      }

      .main-info {
        margin-left: 33px;
        margin-top: 5px;

        .user-name {
          font-size: 40px;
          line-height: 53px;
          color: #005bd1 !important;
          font-weight: bold;
          opacity: 1;
          padding-bottom: 13px;
          display: flex;

          .pdf-btn {
            width: 60px;
            height: 60px;
            margin-top: -6px;
            margin-left: 10px;
          }
        }

        .job-title {
          font-weight: 500;
          font-size: 21px;
          line-height: 27px;
          color: #ffffff;
        }

        .social {
          display: flex;
          margin-top: 54px;

          .message-btn {
            margin-right: 56px;
            margin-bottom: 20px;

            a {
              background: #005bd1;
              box-shadow: 0px 0px 16px rgba(0, 91, 209, 0.5);
              border-radius: 30px;
              width: 139px;
              height: 41px;
              font-weight: bold;
              font-size: 18px;
              line-height: 24px;
              color: #ffffff;
              display: flex;
              justify-content: center;
              align-items: center;

              img {
                width: 22px;
                height: 17px;
                margin-right: 10px;
              }
            }
          }

          .icons {
            display: flex;
            align-items: center;
            padding-bottom: 5px;
            margin-bottom: 20px;

            a {
              img {
                width: 30px;
                height: auto;
              }
              margin-right: 30px;
            }
            a:last-child {
              margin-right: 0;
            }
          }

          @media (max-width: 1400px) {
            flex-wrap: wrap;
          }
        }
      }
    }

    .right {
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      max-width: 60%;

      .interviews {
        display: flex;
        justify-content: flex-end;
        align-items: center;
        // margin-right: 42px;
        .text {
          font-style: normal;
          font-weight: 500;
          font-size: 21px;
          line-height: 27px;
          color: #ffffff;
          margin-right: 16px;
        }

        .video-btn {
          margin-right: 9px;

          a {
            background: #005bd1;
            box-shadow: 0px 0px 16px rgba(0, 91, 209, 0.5);
            border-radius: 30px;
            width: 139px;
            height: 41px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: bold;
            font-size: 18px;
            line-height: 24px;
            color: #ffffff;

            img {
              width: 22px;
              height: 17px;
              margin-right: 11px;
            }
          }
        }

        .audio-btn {
          a {
            background: #005bd1;
            box-shadow: 0px 0px 16px rgba(0, 91, 209, 0.5);
            border-radius: 30px;
            width: 139px;
            height: 41px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: bold;
            font-size: 18px;
            line-height: 24px;
            color: #ffffff;

            img {
              width: 18px;
              height: 16px;
              margin-right: 12px;
            }
          }
        }
      }

      .prof-info {
        display: flex;
        align-items: center;
        justify-content: space-evenly;
        align-self: flex-end;
        margin-top: 15px;
        min-height: 175px;
        max-width: 900px;
        min-width: 635px;     
        padding: 30px;
        background: #333232;
        box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.1);
        border-radius: 30px;

        .prof-left {
          display: flex;

          .hours {
            display: flex;
            flex-direction: column;
            margin-right: 36px;
            align-items: center;

            .text {
              font-weight: 500;
              font-size: 20px;
              line-height: 26px;
              color: #ffffff;
              margin-bottom: 10px;
            }

            .number {
              font-weight: bold;
              font-size: 26px;
              line-height: 34px;
              color: #005bd1;
            }
          }

          .horizontal-divider {
            height: 41px;
            width: 1px;
            background: rgba(255, 255, 255, 0.38);
          }

          .rate {
            display: flex;
            flex-direction: column;
            margin-left: 36px;
            align-items: center;

            .text {
              font-weight: 500;
              font-size: 20px;
              line-height: 26px;
              color: #ffffff;
              margin-bottom: 10px;
            }
            .number {
              font-weight: bold;
              font-size: 26px;
              line-height: 34px;
              color: #005bd1;
            }
          }
        }

        .prof-right {
          .hire-me-btn {
            a {
              background: #005bd1;
              box-shadow: 0px 0px 16px rgba(0, 91, 209, 0.5);
              border-radius: 50px;

              font-weight: bold;
              font-size: 24px;
              line-height: 32px;
              color: #ffffff;

              display: flex;
              justify-content: center;
              align-items: center;
              width: 214px;
              height: 63px;
            }
          }
        }
      }

      @media (max-width: 1600px) {
        .prof-info {
          flex-wrap: wrap;

          .prof-right {
            .hire-me-btn {
              a {
                margin-top: 10px;
              }
            }
          }
        }
      }
    }

    @media (max-width: 1200px) {
      padding: 40px;      

      .left {
        .profile-picture {
          width: 160px;
        }

        .main-info {
          margin-left: 20px;

          .user-name {
            font-size: 33px;
          }

          .job-title {
            font-size: 18px;
          }

          .social {
            position: absolute;
            left: 0;
            bottom: 0;

            .message-btn {
              a {
                font-size: 16px;
              }
            }

            .icons {
              a {
                img {
                  width: 26px;
                }
              }
            }
          }
        }
      }

      .right {
        width: auto;
        max-width: 100%;

        .interviews {
          .text {
            font-size: 18px;
          }

          .video-btn,
          .audio-btn {
            a {
              font-size: 16px;
            }
          }
        }

        .prof-info {
          min-width: 600px;

          .prof-left {
            .hours,
            .rate {
              .text {
                font-size: 18px;
                margin-bottom: 8px;
              }

              .number {
                font-size: 24px;
              }
            }

            .hours {
              margin-right: 25px;
            }

            .rate {
              margin-left: 25px;
            }

            .horizontal-divider {
              height: 25px;
            }
          }

          .prof-right {
            .hire-me-btn {
              a {
                font-size: 20px;
                width: 180px;
                height: 50px;
              }
            }
          }
        }
      }
    }

    @media (max-width: 1024px) {
      flex-wrap: wrap;
      position: relative;

      .left,
      .right {
        width: 100%;
      }

      .left {
        .main-info {
          .user-name {
            padding-right: 400px;
          }

          .social {
            position: static;
          }
        }
      }

      .right {
        .interviews {
          position: absolute;
          top: 50px;
          right: 40px;
        }

        .prof-info {
          max-width: 100%;
          width: 100%;
        }
      }
    }
  }

	@media only screen and (max-width: 768px) {
		.main-info-bar {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;

      width: 100%;
      padding: 20px 20px 63px 20px;

      .left {
        display: flex;

        .profile-picture {
          width: 180px;

          img {
            border-radius: 50%;
          }
        }

        .main-info {
          margin-left: 20px;
          margin-top: 5px;

          .user-name {
            font-size: 32px;
            line-height: 42px;
            color: #005bd1 !important;
            font-weight: bold;
            opacity: 1;
            padding-right: 0;
            padding-bottom: 16px;
          }

          .job-title {
            font-weight: 500;
            font-size: 16px;
            line-height: 21px;
            color: #ffffff;
          }

          .social {
            display: flex;
            flex-direction: column;
            margin-top: 25px;

            .message-btn {
              margin-right: 15px;
              margin-bottom: 0;

              a {
                background: #005bd1;
                box-shadow: 0px 0px 16px rgba(0, 91, 209, 0.5);
                border-radius: 30px;
                width: 107px;
                height: 32px;
                font-weight: bold;
                font-size: 10px;
                line-height: 13px;
                color: #ffffff;
                display: flex;
                justify-content: center;
                align-items: center;

                img {
                  width: 16px;
                  height: 12px;
                  margin-right: 9px;
                }
              }
            }

            .icons {
              display: flex;
              align-items: center;
              margin-top: 25px;

              img {
                width: 27px;
                height: 17px;
                margin-right: 30px;
              }
              img:last-child {
                margin-right: 0;
              }
            }

            .video-btn {
              margin-right: 15px;
              a {
                background: #005bd1;
                box-shadow: 0px 0px 16px rgba(0, 91, 209, 0.5);
                border-radius: 30px;
                width: 107px;
                height: 32px;
                font-weight: bold;
                font-size: 10px;
                line-height: 13px;
                color: #ffffff;
                display: flex;
                justify-content: center;
                align-items: center;

                img {
                  width: 16px;
                  height: 12px;
                  margin-right: 9px;
                }
              }
            }

            .audio-btn {
              a {
                background: #005bd1;
                box-shadow: 0px 0px 16px rgba(0, 91, 209, 0.5);
                border-radius: 30px;
                width: 107px;
                height: 32px;
                font-weight: bold;
                font-size: 10px;
                line-height: 13px;
                color: #ffffff;
                display: flex;
                justify-content: center;
                align-items: center;

                img {
                  width: 16px;
                  height: 12px;
                  margin-right: 9px;
                }
              }
            }
          }
        }
      }

      .right {
        margin-top: 63px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;

        .interviews {
          display: flex;
          justify-content: flex-end;
          align-items: center;
          // margin-right: 42px;
          .text {
            font-style: normal;
            font-weight: 500;
            line-height: 27px;
            color: #ffffff;
            margin-right: 16px;
          }

          .video-btn {
            margin-right: 15px;
            margin-left: 15px;
            a {
              background: #005bd1;
              box-shadow: 0px 0px 16px rgba(0, 91, 209, 0.5);
              border-radius: 30px;
              width: 107px;
              height: 32px;
              font-weight: bold;
              font-size: 10px;
              line-height: 13px;
              color: #ffffff;
              display: flex;
              justify-content: center;
              align-items: center;

              img {
                width: 16px;
                height: 12px;
                margin-right: 9px;
              }
            }
          }

          .audio-btn {
            a {
              background: #005bd1;
              box-shadow: 0px 0px 16px rgba(0, 91, 209, 0.5);
              border-radius: 30px;
              width: 107px;
              height: 32px;
              font-weight: bold;
              font-size: 10px;
              line-height: 13px;
              color: #ffffff;
              display: flex;
              justify-content: center;
              align-items: center;

              img {
                width: 16px;
                height: 12px;
                margin-right: 9px;
              }
            }
          }
        }

        .prof-info {
          display: flex;
          flex-direction: column;
          align-items: center;
          justify-content: space-evenly;
          background: #333232;
          box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.1);
          border-radius: 30px;
          padding: 20px 15px;
          min-width: auto;

          .prof-left {
            display: flex;

            .hours {
              display: flex;
              flex-direction: column;
              align-items: center;
              .text {
                font-weight: 500;
                line-height: 31px;
                color: #ffffff;
                margin-bottom: 6px;
              }
              .number {
                font-weight: bold;
                line-height: 48px;
                color: #005bd1;
              }
            }

            .rate {
              display: flex;
              flex-direction: column;
              align-items: center;

              .text {
                font-weight: 500;
                line-height: 31px;
                color: #ffffff;
                margin-bottom: 6px;
              }
              .number {
                font-weight: bold;
                line-height: 48px;
                color: #005bd1;
              }
            }
          }

          .prof-right {
            .hire-me-btn {
              a {
                background: #005bd1;
                box-shadow: 0px 0px 16px rgba(0, 91, 209, 0.5);

                font-weight: bold;
                line-height: 32px;
                color: #ffffff;

                display: flex;
                justify-content: center;
                align-items: center;
              }
            }
          }
        }
      }
    }
	}

	@media only screen and (max-width: 610px) {
		.main-info-bar {
      display: flex;
      justify-content: space-between;
      position: relative;
      z-index: 1;
      width: 100%;

      .left {
        display: flex;
        padding-bottom: 140px;

        .profile-picture {
          img {
            min-width: 180px;
            border-radius: 50%;
          }
        }

        .main-info {
          margin-left: 33px;
          margin-top: 5px;

          .user-name {
            font-size: 28px;
            line-height: 37px;
            color: #005bd1 !important;
            font-weight: bold;
            opacity: 1;
            padding-bottom: 13px;
          }

          .job-title {
            font-weight: 500;
            font-size: 18px;
            line-height: 25px;
            color: #ffffff;
          }

          .social {
            position: absolute;
            margin-top: 54px;
            width: 100%;

            .d-flex {
              justify-content: space-between;
            }
          }
        }
      }

      .right {
        margin-top: 20px;

        .interviews {
          display: flex;
          justify-content: flex-end;
          align-items: center;
          // margin-right: 42px;
          .text {
            font-style: normal;
            font-weight: 500;
            font-size: 21px;
            line-height: 27px;
            color: #ffffff;
            margin-right: 16px;
          }

          .video-btn {
            margin-right: 9px;
            a {
              background: #005bd1;
              box-shadow: 0px 0px 16px rgba(0, 91, 209, 0.5);
              border-radius: 30px;
              width: 139px;
              height: 41px;
              display: flex;
              justify-content: center;
              align-items: center;
              font-weight: bold;
              font-size: 18px;
              line-height: 24px;

              color: #ffffff;
              img {
                width: 22px;
                height: 17px;
                margin-right: 11px;
              }
            }
          }

          .audio-btn {
            a {
              background: #005bd1;
              box-shadow: 0px 0px 16px rgba(0, 91, 209, 0.5);
              border-radius: 30px;
              width: 139px;
              height: 41px;
              display: flex;
              justify-content: center;
              align-items: center;
              font-weight: bold;
              font-size: 18px;
              line-height: 24px;

              color: #ffffff;
              img {
                width: 18px;
                height: 16px;
                margin-right: 12px;
              }
            }
          }
        }

        .prof-info {
          min-height: 135px;
          background: #333232;
          box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.1);
          border-radius: 30px;

          .prof-left {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;

            .hours,
            .rate {
              width: 100%;
              margin: 0;
              margin-bottom: 18px;

              .text {
                font-weight: 500;
                font-size: 20px;
                line-height: 20px;
                color: #ffffff;
                margin-bottom: 10px;
              }

              .number {
                font-weight: bold;
                font-size: 24px;
                line-height: 26px;
                color: #005bd1;
              }
            }

            .horizontal-divider {
              display: none;
            }
          }
        }
      }
    }
	}
</style>