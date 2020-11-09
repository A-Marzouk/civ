<template>
    <div class="main-container">
        <div class="header-panel">
            <!-- profile pic -->
            <div class="profile-picture">
                <img
                    class="profile-img"
                    :src="currentUser.personal_info.profile_pic"
                    alt
                />
                <a
                    href="/pdf-theme-preview-by-code-8"
                    class="pdf-btn"
                    target="_blank"
                >
                    <svg-vue
                        class="pdf-icon"
                        :icon="'themes.pdf-button-theme8'"
                    ></svg-vue>
                </a>
            </div>

            <!-- info container -->
            <div class="info-container ct-sm-padding">
                <div class="stack-one">
                    <!-- user name -->
                    <div class="user-name">
                        {{ currentUser.personal_info.first_name }}
                        {{ currentUser.personal_info.last_name }}
                    </div>

                    <!-- addition buttons -->
                    <div class="hide__sm-screen mb-3">
                        <div class="interviews">
                            <div class="text hideMeOnPhone pr-2">
                                Interview:
                            </div>

                            <div class="video-btn">
                                <a
                                    href="javascript:void(0)"
                                    @click.prevent="openVideoModal"
                                >
                                    <img
                                        src="/images/resume_themes/theme8/video-player.svg"
                                        alt="video icon"
                                    />
                                    <span>Video</span>
                                </a>
                            </div>
                            <div class="audio-btn">
                                <a
                                    href="javascript:void(0)"
                                    @click.prevent="openAudioModal"
                                >
                                    <img
                                        src="/images/resume_themes/theme8/headphones.svg"
                                        alt="audio icon"
                                    />
                                    <span>Audio</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="stack-two d-flex justify-space-between">
                    <!-- left card -->
                    <div class="left-card">
                        <div class="job-title">
                            {{ currentUser.personal_info.designation }}
                        </div>
                        <div class="social">
                            <div class="d-flex">
                                <div class="message-btn d-flex">
                                    <a
                                        href="javascript:void(0)"
                                        @click.prevent="openChatModal"
                                    >
                                        <img
                                            src="/images/resume_themes/theme8/Icon material-email.svg"
                                            alt="mail icon"
                                        />
                                        <span>Message</span>
                                    </a>
                                </div>
                            </div>

                            <SocialLinks :links="currentUser.links" />
                        </div>
                    </div>

                    <!-- right card -->
                    <div class="hide__sm-screen">
                        <div class="right-card grey-box">
                            <!-- Header -->
                            <div class="prof-left">
                                <div class="hours text-center">
                                    <!-- first value -->
                                    <div
                                        class="text"
                                        style="text-transform: capitalize"
                                    >
                                        <v-icon
                                            small
                                            dark
                                            @click="paymentInfoPrev()"
                                            >navigate_before</v-icon
                                        >
                                        <div
                                            v-for="(payment_Info,
                                            index) in currentUser.payment_info"
                                            :key="index"
                                            v-show="payment_Info.is_public"
                                            class="d-inline-block"
                                        >
                                            <span
                                                class="payment-title"
                                                v-if="paymentInfo == index"
                                            >
                                                {{
                                                    payment_Info.salary_frequency
                                                }}
                                                rate
                                            </span>
                                        </div>
                                        <v-icon
                                            small
                                            dark
                                            @click="paymentInfoNext()"
                                            >navigate_next</v-icon
                                        >
                                    </div>

                                    <!-- second value -->
                                    <div class="number">
                                        <div
                                            v-for="(payment_Info,
                                            index) in currentUser.payment_info"
                                            :key="index"
                                            v-show="payment_Info.is_public"
                                        >
                                            <span
                                                class="payment-title"
                                                v-if="paymentInfo == index"
                                            >
                                                {{
                                                    formatSalary(
                                                        payment_Info.salary,
                                                        payment_Info.currency.toUpperCase()
                                                    )
                                                }}
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <!-- divider -->
                                <div class="horizontal-divider"></div>

                                <!-- Available info -->
                                <div class="rate text-center">
                                    <div class="text">
                                        Available (<v-icon
                                            small
                                            dark
                                            @click="availablePrev()"
                                            >navigate_before</v-icon
                                        >
                                        <div
                                            v-for="(availability_info,
                                            index) in currentUser.availability_info"
                                            :key="index"
                                            v-show="availability_info.is_public"
                                            class="d-inline-block"
                                        >
                                            <span
                                                class="hours-title"
                                                v-if="available == index"
                                            >
                                                {{
                                                    availability_info.available_hours_frequency
                                                }}
                                            </span>
                                        </div>
                                        <v-icon
                                            small
                                            dark
                                            @click="availableNext()"
                                            >navigate_next</v-icon
                                        >)
                                    </div>

                                    <div
                                        class="number"
                                        style="text-transform: capitalize"
                                    >
                                        <div
                                            v-for="(availability_info,
                                            index) in currentUser.availability_info"
                                            :key="index"
                                            v-show="availability_info.is_public"
                                        >
                                            <span
                                                class="hours-title"
                                                v-if="available == index"
                                            >
                                                {{
                                                    availability_info.available_hours
                                                }}
                                                Hours
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- buttom -->
                            <div class="prof-right">
                                <div
                                    class="hire-me-btn d-flex justify-content-center"
                                >
                                    <a
                                        href="javascript:void(0)"
                                        @click.prevent="openHireModal"
                                        >Hire Me</a
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- audio/video for sm screen -->
        <div class="show__sm-screen">
            <div class="interviews mt-8">
                <div class="video-btn">
                    <a
                        href="javascript:void(0)"
                        @click.prevent="openVideoModal"
                    >
                        <img
                            src="/images/resume_themes/theme8/video-player.svg"
                            alt="video icon"
                        />
                        <span>Video</span>
                    </a>
                </div>
                <div class="audio-btn">
                    <a
                        href="javascript:void(0)"
                        @click.prevent="openAudioModal"
                    >
                        <img
                            src="/images/resume_themes/theme8/headphones.svg"
                            alt="audio icon"
                        />
                        <span>Audio</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- grey box for sm screen -->
        <div class="right-card mt-6 grey-box show__sm-screen">
            <!-- Header -->
            <div class="prof-left">
                <div class="hours text-center">
                    <!-- first value -->
                    <div class="text" style="text-transform: capitalize">
                        <v-icon small dark @click="paymentInfoPrev()"
                            >navigate_before</v-icon
                        >
                        <div
                            v-for="(payment_Info,
                            index) in currentUser.payment_info"
                            :key="index"
                            v-show="payment_Info.is_public"
                            class="d-inline-block"
                        >
                            <span
                                class="payment-title"
                                v-if="paymentInfo == index"
                            >
                                {{ payment_Info.salary_frequency }} rate
                            </span>
                        </div>
                        <v-icon small dark @click="paymentInfoNext()"
                            >navigate_next</v-icon
                        >
                    </div>

                    <!-- second value -->
                    <div class="number">
                        <div
                            v-for="(payment_Info,
                            index) in currentUser.payment_info"
                            :key="index"
                            v-show="payment_Info.is_public"
                        >
                            <span
                                class="payment-title"
                                v-if="paymentInfo == index"
                            >
                                {{
                                    formatSalary(
                                        payment_Info.salary,
                                        payment_Info.currency.toUpperCase()
                                    )
                                }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- divider -->
                <div class="horizontal-divider"></div>

                <!-- Available info -->
                <div class="rate text-center">
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
                            <span class="hours-title" v-if="available == index">
                                {{
                                    availability_info.available_hours_frequency
                                }}
                            </span>
                        </div>
                        <v-icon small dark @click="availableNext()"
                            >navigate_next</v-icon
                        >)
                    </div>

                    <div class="number" style="text-transform: capitalize">
                        <div
                            v-for="(availability_info,
                            index) in currentUser.availability_info"
                            :key="index"
                            v-show="availability_info.is_public"
                        >
                            <span class="hours-title" v-if="available == index">
                                {{ availability_info.available_hours }} Hours
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- buttom -->
            <div class="prof-right">
                <div class="hire-me-btn d-flex justify-content-center">
                    <a href="javascript:void(0)" @click.prevent="openHireModal"
                        >Hire Me</a
                    >
                </div>
            </div>
        </div>
    </div>
</template>

<style lang="scss" scoped>
.main-container {
    padding: 78px;

    .header-panel {
        display: grid;
        position: relative;
        z-index: 1;
        grid-template-columns: 15% 85%;
        grid-gap: 10px;
        font-family: "Thabit", "Courier New", Courier, monospace;

        // profile picture
        .profile-picture {
            max-width: 200px;
            max-height: 200px;
            position: relative;
            @media screen and (max-width: 475px) {
                max-width: 100px;
                max-height: 100px;
            }
            img {
                width: 100%;
                border-radius: 50%;
            }
            .pdf-btn {
                position: absolute;
                bottom: 0;
                right: 0;
                width: 60px;
                height: 60px;
                @media screen and (max-width: 1024px) {
                    bottom: 75px;
                    right: -10px;
                }
                @media screen and (max-width: 475px) {
                    bottom: -10px;
                    right: -15px;
                }
                .pdf-icon {
                    width: 60px;
                    height: 60px;
                }
            }
        }

        //info-container

        .stack-one {
            display: flex;
            justify-content: space-between;
        }

        //left
        .user-name {
            font-size: 40px;
            line-height: 53px;
            color: #005bd1 !important;
            font-weight: bold;
            opacity: 1;
            padding-bottom: 13px;
            display: flex;
        }

        .job-title {
            font-weight: 500;
            font-size: 21px;
            line-height: 27px;
            color: #ffffff;
            @media screen and (max-width: 500px) {
                font-size: 16px;
                line-height: 25px;
            }
        }

        .social {
            display: flex;
            margin-top: 54px;
            padding-bottom: 5px;

            @media (max-width: 500px) {
                margin-top: 20px;
            }

            .message-btn {
                margin-right: 30px;

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
                        @media screen and (max-width: 500px) {
                            width: 15px;
                            height: 15px;
                            margin-right: 5px;
                        }
                    }
                    @media screen and (max-width: 500px) {
                        width: 110px;
                        height: 35px;
                        font-size: 14px;
                        line-height: 16px;
                    }
                }
            }

            @media (max-width: 1400px) {
                // flex-wrap: wrap;
            }
        }
    }
}

//audio / video style
.interviews {
    display: flex;
    justify-content: flex-end;
    align-items: center;

    // margin-right: 42px;
}

.text {
    font-style: normal;
    font-weight: 500;
    font-size: 21px;
    line-height: 27px;
    color: #ffffff;
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

//grey box container

// first container
.prof-left {
    display: grid;
    grid-template-columns: 9fr 1fr 10fr;
}

.hours {
    padding: 0 !important;
}

.text {
    font-weight: 500;
    font-size: 20px;
    line-height: 26px;
    color: #ffffff;
}

.number {
    font-weight: bold;
    font-size: 26px;
    line-height: 34px;
    color: #005bd1;
}

.prof-right {
    margin-top: 1rem;
}

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

.horizontal-divider {
    height: 41px;
    width: 1px;
    background: rgba(255, 255, 255, 0.38);
}

.grey-box {
    background-color: #333232 !important;
    padding: 2rem;
    border-radius: 2rem;
}

// hidden visible element
.show__sm-screen {
    display: none;
}

hide__sm-screen {
    display: block;
}

// breakpoints

//large screen
@media (min-width: 1650px) {
    .grey-box {
        display: flex;
        align-items: center;
    }

    .prof-right {
        margin-left: 1rem;
        transform: translateY(-8px);
    }

    .show__sm-screen {
        display: none;
    }
}

@media (max-width: 1226px) {
    .main-container {
        padding: 40px;
    }

    .show__sm-screen {
        display: block;
        position: relative;
        z-index: 1;
    }

    .grey-box {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .prof-right {
        margin-left: 1rem;
        transform: translateY(-8px);
    }

    .hide__sm-screen {
        display: none;
    }

    .interviews {
        justify-content: center;
    }

    .ct-sm-padding {
        padding-left: 1rem;
    }
}

@media (max-width: 927px) {
    .grey-box {
        display: block;
        padding: 0.8rem;
    }

    .prof-left {
        display: block;
    }

    .profile-picture {
        min-width: 80px;
    }

    .header-panel {
        .user-name {
            font-size: 28px !important;
        }
    }

    .hide-pdf {
        display: none;
    }
}

@media (max-width: 550px) {
    .main-container {
        padding: 20px;

        .header-panel {
            grid-template-columns: 25% 70%;
            grid-gap: 0px;

            .user-name {
                font-size: 24px !important;
                line-height: 30px;
                padding-bottom: 5px;
            }
        }
    }
}
</style>

<script>
import SocialLinks from "./common/SocialLinks";

export default {
    props: [
        "currentUser",
        "chatToggle",
        "hireToggle",
        "audioToggle",
        "videoToggle"
    ],
    components: { SocialLinks },
    data() {
        return {
            available: 0,
            paymentInfo: 0,
            currentChat: !this.chatToggle,
            currentHire: !this.hireToggle,
            currentAudio: !this.audioToggle,
            currentVideo: !this.videoToggle
        };
    },

    methods: {
        openChatModal() {
            this.$emit("updateChatToggle", this.currentChat);
        },
        openHireModal() {
            this.$emit("updateHireToggle", this.currentHire);
        },
        openAudioModal() {
            this.$emit("updateAudioToggle", this.currentAudio);
        },
        openVideoModal() {
            this.$emit("updateVideoToggle", this.currentVideo);
        },
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
        formatSalary(salary, currency) {
            return new Intl.NumberFormat("en-US", {
                style: "currency",
                currency,
                maximumFractionDigits: 2,
                minimumFractionDigits: 0
            }).format(salary);
        }
    },

    created() {
        console.log(this.currentUser);
    }
};
</script>
