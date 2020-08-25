<template>
    <v-app>
        <div v-if="currentUser && personalInfo">
            <div id="myAccountTab" class="my-account-tab-wrapper">
                <div class="profile-pic-row" v-if="personalInfo">
                    <div class="info-my-account">
                        <div class="name">{{personalInfo.first_name}}</div>
                        <div class="job-title">{{personalInfo.designation}}</div>
                    </div>
                </div>

                <div class="profile-pic-row-holder" v-else></div>


                <div class="form-wrapper mt-n1">
                    <div class="content-wrapper">
                        <div class="mar-form">
                            <v-text-field v-if="personalInfo"
                                          class="resume-builder__input input-margin input-margin-3 ct-fix-input"
                                          label="First name"
                                          v-model="personalInfo.first_name"
                                          :outlined="true"
                                          :class="{'resume-builder__input--disabled': false}"
                                          :error="!!errors.name"
                                          :error-messages="errors.name"
                                          :disabled="false"
                            ></v-text-field>

                            <v-text-field
                                    class="resume-builder__input input-margin input-margin-3 mt-n3 ct-fix-input"
                                    label="Email"
                                    v-model="accountData.email"
                                    :outlined="true"
                                    :class="{'resume-builder__input--disabled': false}"
                                    :error="!!errors.email"
                                    :error-messages="errors.email"
                                    :disabled="canEditEmail()"
                            ></v-text-field>

                            <v-text-field
                                    class="resume-builder__input input-margin centered-input mt-n3 ct-fix-input"
                                    label="Password"
                                    type="password"
                                    v-model="accountData.password"
                                    placeholder="••••••••••"
                                    :outlined="true"
                                    :class="{'resume-builder__input--disabled': false}"
                                    :error="!!errors.password"
                                    :error-messages="errors.password"
                            ></v-text-field>

                            <v-text-field
                                    class="resume-builder__input centered-input mt-n3"
                                    label="Re-Type Password"
                                    type="password"
                                    v-model="accountData.password_confirmation"
                                    placeholder="••••••••••"
                                    :outlined="true"
                                    :class="{'resume-builder__input--disabled': false}"
                                    :error="!!errors.password"
                                    :error-messages="errors.password"
                            ></v-text-field>

                            <div v-if="accountData.subscription !== null">
                                <div class="my-subscription">
                                    <div class="form-title sub">My Subscription</div>
                                </div>

                                <div class="action-btns NoDecor" >
                                    <a class="purchase-btn mt-n3" href="javascript:void(0)"
                                       @click="subscriptionInfoModal = true">View Subscription</a>
                                </div>
                            </div>


                            <span class="v-label v-label--active theme--light" style="color: #888DB1;">
                                <!-- Added a label here due to prepend-inner slot change -->
                                My URL
                            </span>
                            <v-text-field
                                    class="resume-builder__input top-input-margin url mt-n6"
                                    v-model="accountData.username"
                                    :outlined="true"
                                    :class="{'resume-builder__input--disabled': false}"
                                    :error="!!errors.username"
                                    :error-messages="errors.username"
                            >
                                <template slot="prepend-inner">
                                    <span class="inner-text" style="margin-top:-4.8px;">www.civ.ie/</span>
                                </template>
                            </v-text-field>
                        </div>

                        <div class="action-btns NoDecor">
                            <a class="save-btn" href="javascript:void(0)" @click="submitForm">Save Changes</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- dialogs -->

        <v-dialog
                v-model="subscriptionInfoModal"
                max-width="550"
                style="box-shadow: 0px 0px 130px rgba(0, 16, 133, 0.07);
            border-radius: 10px; z-index:1000; overflow-y:hidden;"

        >

            <v-card>
                <v-card-subtitle align="right">
                    <v-btn icon class="btn-close-modal" absolute @click.stop="subscriptionInfoModal=false">
                        <img src="/images/new_resume_builder/icons/main/close.svg" alt="close icon"/>
                    </v-btn>
                </v-card-subtitle>
                <v-card-text align="center" class="padding-sm-1">
                    <v-row align="center" justify="center" class="p-5 d-flex flex-column" v-if="accountData.subscription">
                        <div>
                            You have a <b style="text-transform: capitalize;">{{accountData.subscription.sub_frequency}}</b> subscription
                        </div>
                        <div>
                            Price: <b style="text-transform: capitalize;">{{accountData.subscription.sub_frequency === 'monthly' ? '5 USD/month' : '50 USD/year'}}</b>
                        </div>
                        <div>
                            Expires at: <b style="text-transform: capitalize;">{{accountData.subscription.expires_at}}</b>
                        </div>
                        <div>
                            Payment method: <b style="text-transform: capitalize;">{{accountData.subscription.payment_method}}</b>
                        </div>
                    </v-row>
                    <hr class="hr-line"/>
                </v-card-text>
            </v-card>
        </v-dialog>
        <!-- dialogs -->
    </v-app>
</template>

<script>
    export default {
        name: "MyAccount",
        data() {
            return {
                subscriptionInfoModal: false,
                priceTab: 0,
                stripeInactive: "/images/pricing/icons/stripe-logo-inactive.png",
                stripeActive: "/images/pricing/icons/stripe-logo-active.svg",
                paypalInactive: "/images/pricing/icons/paypal-logo-inactive.svg",
                paypalActive: "/images/pricing/icons/paypal-logo-active.png",
                paypalHover: false,
                stripeHover: false,
                selectedPlan: "monthly",
                selectedBtn: "monthly",
                subscription: "on",
                errors: {},
                successes: {},
                currentUser: {},
                isLoading: false,
                notificationMessage: "",
                usernameOldValue: "",
                fields: {
                    name: "",
                    email: "",
                    username: "",
                    password: ""
                },
                rules: {
                    required: value => !!value || "Required.",
                    min: v => v.length >= 3 || "Min 3 characters"
                },
                tempPic: "",
                profile_pic_error: "",
                price_options: [
                    "Online Resume",
                    "20+ Theme",
                    "Export PDF",
                    "Visual Builder",
                    "Free Domain URL"
                ],
                csrf_token: $('meta[name="csrf-token"]').attr('content'),
            };
        },
        computed: {
            accountData() {
                let user = (this.currentUser = this.$store.state.user);
                this.usernameOldValue = this.currentUser.username;

                return {
                    id: user.id,
                    name: user.name,
                    email: user.email,
                    username: user.username,
                    userNameChanged: false,
                    password: "",
                    password_confirmation: "",
                    subscription: user.subscription
                };
            },
            personalInfo() {
                return this.$store.state.user.personal_info;
            },
            user() {
                return this.$store.state.user;
            }
        },
        methods: {
            subscribe() {
                $('#subscribe_form').submit();
            },
            clickUploadInput() {
                $("#profile_picture").click();
            },
            handleProfilePictureUpload() {
                // validate uploaded file :
                let isValid = this.validateUploadedFile(
                    this.$refs.profile_picture.files[0]
                );
                if (isValid) {
                    this.personalInfo.profile_pic = this.$refs.profile_picture.files[0];
                    this.tempPic = URL.createObjectURL(this.$refs.profile_picture.files[0]);
                    this.profile_pic_error = "";
                    this.applyEdit();
                } else {
                    console.log("error in pic");
                    this.profile_pic_error = "Incorrect file chosen!";
                }
            },
            validateUploadedFile(file) {
                let isValid = true;
                if (file.type.search("image") === -1) {
                    isValid = false;
                }
                if (file.size > 25000000) {
                    isValid = false;
                }
                return isValid;
            },
            applyEdit() {
                let formData = new FormData();
                formData.append("_method", "put");
                formData.append("user_id", this.currentUser.id);

                $.each(this.personalInfo, field => {
                    if (this.personalInfo[field] !== null) {
                        if (field !== "email" && this.personalInfo[field].length) {
                            formData.append(field, this.personalInfo[field]);
                        }
                        if (field === "profile_pic_file") {
                            formData.append('profile_pic', this.personalInfo['profile_pic_file']);
                        }
                    }
                });

                this.errors = {};

                axios.post("/api/user/personal-info", formData, {
                    headers: {"Content-Type": "multipart/form-data"}
                })
                    .then(response => {
                        this.$store.dispatch('flyingNotification');
                        this.personalInfo.profile_pic = response.data.data.profile_pic;
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

            copyCivLink() {
                let $temp = $("<input>");
                $("body").append($temp);
                $temp.val(this.baseUrl() + this.accountData.username).select();
                document.execCommand("copy");
                $temp.remove();
                this.$store.dispatch("flyingNotification", {
                    message: "Copied",
                    iconSrc: "/images/resume_builder/tick.svg"
                });
            },
            openCivLink() {
                window.location = this.baseUrl() + this.accountData.username;
            },
            setPlan(plan) {
                this.selectedPlan = 0;
                this.selectedBtn = plan;
                setTimeout(() => {
                    this.selectedPlan = plan;
                }, 700);
            },

            focusFiledStyles(field_name) {
                let label = $("[for=" + field_name + "]");
                if (label.hasClass("labelFocused")) {
                    label.removeClass("labelFocused");
                } else {
                    label.addClass("labelFocused");
                }
            },

            submitForm() {
                this.clearErrors();
                this.isLoading = true;

                if (this.isUsernameChanged()) {
                    this.accountData.userNameChanged = true;
                    this.user.username = this.accountData.username;
                }

                axios.post("/api/user/account/submit", this.accountData)
                    .then((response) => {
                        this.applyEdit();
                        this.$router.push('/resume-builder/edit/profile');
                    })
                    .catch(error => {
                        if (typeof error.response.data === "object") {
                            this.errors = error.response.data.errors;
                            this.updateErrors(error.response.data.errors);
                        } else {
                            this.errors = ["Something went wrong. Please try again."];
                        }
                        this.$store.dispatch("flyingNotification", {
                            message: "Error",
                            iconSrc: "/images/resume_builder/error.png"
                        });
                    });
            },
            clearErrors() {
                $.each(this.errors, error => {
                    this.errors[error] = "";
                });
            },
            clearSuccesses() {
                $.each(this.fields, field => {
                    this.fields[field] = "";
                });
            },
            updateErrors(responseErrors) {
                $.each(this.errors, error => {
                    if (responseErrors[error]) {
                        this.errors[error] = responseErrors[error][0];
                    }
                });
            },
            baseUrl() {
                let getUrl = window.location;
                return getUrl.protocol + "//" + getUrl.host + "/";
            },
            canEditEmail() {
                return !(
                    this.currentUser.instagram_id !== null &&
                    !this.isEmail(this.currentUser.email)
                );
            },
            isUsernameChanged() {
                if (!this.currentUser.username) {
                    return;
                } else {
                    return (
                        this.usernameOldValue.trim() !== this.accountData.username.trim()
                    ); // return true if  changed
                }
            },
            isEmail(email) {
                var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                return re.test(String(email).toLowerCase());
            }
        },
        mounted() {
            let searchParams = new URLSearchParams(window.location.search);

            if (searchParams.has("redirect_from")) {
                let redirect_from = searchParams.get("redirect_from");
                let status = searchParams.get("status");
                if (status === "success") {
                    setTimeout(() => {
                        this.$store.dispatch("flyingNotification", {
                            message: "Subscribed",
                            iconSrc: "/images/resume_builder/tick.svg"
                        });
                    }, 1500);
                } else {
                    setTimeout(() => {
                        this.$store.dispatch("flyingNotification", {
                            message: "Error",
                            iconSrc: "/images/resume_builder/error.png"
                        });
                    }, 1500);
                }
            }
        }
    };
</script>
<style lang="scss" scoped>
    #input-29 {
        margin-top: 3px !important;
    }

    // custom fix 1.0
    .ct-fix-input {
        height: 5.8rem;
    }


</style>
<style lang="scss">
    @import "../../../../sass/media-queries";

    $text-color: #4374de;
    $primary: #1f5de4;
    $bg-color: white;
    $input-bg: #f1f8fc;
    $placeholder-color: #9ba1ad;

    .btn-close-modal {
        top: 20px;
        right: 20px;
        z-index: 100;
    }

    .subscription-modal {
        .v-dialog {
            max-width: 550px;
            @include lt-md {
                max-width: 500px;
            }
        }
    }

    .padding-sm-1 {
        @include lt-sm {
            padding: 5px !important;
        }
        @include lt-md {
            padding: 5px !important;
        }
    }

    .view-sub-btn {
        a {
            border: 1px solid $primary;
            width: 60px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: $primary;
            border-radius: 15px;
        }
    }

    .my-account-tab-wrapper {
        padding: 50px 100px;

        @include lt-sm {
            padding: 50px 30px;
        }

        .profile-pic-row-holder {
            height: 110px;
            width: 25%;
            margin-bottom: 40px;
            background: whitesmoke;
        }

        .profile-pic-row {
            display: flex;
            align-items: center;
            margin-bottom: 40px;

            .profile-pic {

                position: relative;
                overflow-y: hidden;
                border-radius: 50%;
                min-width: 110px;
                min-height: 110px;

                img {
                    width: 110px;
                    height: 110px;
                    border-radius: 50%;
                }

                .photo-cover {
                    &:hover {
                        cursor: pointer;
                    }

                    width: 110px;
                    height: 45px;
                    background: #001CE2;
                    opacity: 0.5;
                    position: absolute;
                    bottom: 0px;
                    display: flex;
                    align-items: center;
                    justify-content: center;

                    img {
                        width: 25px;
                        height: 25px;
                        opacity: 1;
                        border-radius: 0;
                    }
                }
            }

            .info-my-account {
                .name {
                    font-family: Noto Sans, sans-serif;
                    font-style: normal;
                    font-weight: 600;
                    font-size: 24px;
                    line-height: 36px;
                    color: #888db1;
                    @include lt-sm {
                        font-size: 18px;
                        line-height: 26px;
                    }
                }

                .job-title {
                    font-family: Noto Sans, sans-serif;
                    font-style: normal;
                    font-weight: 600;
                    font-size: 18px;
                    line-height: 25px;
                    color: #888db1;
                }
            }
        }

        .info-wrapper {
            display: flex;
            align-items: center;

            .avatar {
                margin-right: 32px;

                img {
                    width: 167px;
                    height: 167px;
                }
            }

            .name-title-wrapper {
                .user-name {
                    margin-bottom: 4px;
                    font: Bold 34px/46px Noto Sans;
                    letter-spacing: 0;
                    color: #413a5d;
                    opacity: 1;
                }

                .job-title {
                    margin-left: 4px;
                    font: Medium 18px/24px Noto Sans;
                    letter-spacing: 0;
                    color: #413a5d;
                    opacity: 1;
                }
            }
        }

        .form-wrapper {
            margin-top: 73px;
            display: flex;
            flex-direction: column;
            align-items: flex-start;

            .content-wrapper {
                width: 100%;
                max-width: 430px;

                .form-title {
                    margin-bottom: 44px;
                    font: 500 51px Noto Sans;
                    letter-spacing: 0;
                    color: #001ce2;
                    opacity: 1;

                    @include lt-md {
                        font-size: 37px;
                    }
                }

                .form-title.sub {
                    font-weight: 600;
                    font-size: 20px;
                    line-height: 18px;
                    color: #888db1;
                    margin-bottom: 0;

                    @include lt-md {
                        font-size: 15px;
                    }
                }

                .mar-form {
                    .input-margin {
                        margin-bottom: 20px;
                    }

                    .top-input-margin {
                        margin-top: 6px;
                    }

                    .input-field {
                        display: flex;
                        flex-direction: column-reverse;
                        margin-bottom: 25px;

                        label {
                            text-align: left;
                            font: 500 17px/23px Noto Sans;
                            line-height: 30px;
                            letter-spacing: 0;
                            color: #505050;
                            opacity: 1;

                            @include lt-md {
                                font-size: 15px;
                            }
                        }

                        label.labelFocused {
                            color: #001ce2;
                        }

                        input {
                            opacity: 1;
                        }

                        input:focus {
                            border: 2px solid #001ce2;
                            color: #001ce2;
                            outline: none;
                        }

                        img {
                            width: 36px;
                            height: 36px;
                            right: 20px;
                            position: absolute;
                        }
                    }

                    .input-field.active {
                        label {
                            color: #1ec300;
                            font: 600 17px/23px Noto Sans;
                        }

                        input {
                            border: 2px solid #1ec300;
                            color: #1ec300;
                        }
                    }

                    .input-field.error {
                        label {
                            color: #e20000;
                            font: 600 17px/23px Noto Sans;
                        }

                        input {
                            border: 2px solid #e20000;
                            color: #e20000;
                        }
                    }

                    .my-subscription {
                        display: flex;
                        justify-content: space-between;
                        align-items: center;
                        margin-bottom: 20px;

                        .toggle-label {
                            position: relative;
                            display: block;
                            width: 135px;
                            height: 55px;
                            margin-bottom: 0 !important;
                            border-radius: 41px;

                            input[type="checkbox"] {
                                opacity: 0;
                                position: absolute;
                                width: 100%;
                                height: 100%;

                                + .back {
                                    position: absolute;
                                    width: 100%;
                                    height: 100%;
                                    background: white;
                                    border-radius: 41px;
                                    transition: background 150ms linear;
                                }

                                &:checked {
                                    + .back {
                                        background: white;

                                        /*green*/
                                    }

                                    + .back .toggle {
                                        margin-left: 76px;
                                    }
                                }

                                + .back .toggle {
                                    display: block;
                                    position: absolute;
                                    content: " ";
                                    background: #001bde;
                                    width: 50%;
                                    height: 100%;
                                    transition: margin 150ms linear;
                                    border: none;
                                    border-radius: 41px;
                                }
                            }

                            .label {
                                display: block;
                                position: absolute;
                                width: 50%;
                                line-height: 54px;
                                margin-right: 6px;
                                text-align: center;
                                font-size: 18px;
                                font-weight: bold;
                                filter: grayscale(0%) !important;

                                &.on {
                                    left: 0;
                                    color: white;
                                    opacity: 1 !important;
                                }

                                &.off {
                                    right: 0;
                                    color: #001bde !important;
                                    opacity: 1 !important;
                                    margin-right: -6px;
                                }
                            }

                            input[type="checkbox"] {
                                &:checked {
                                    + .back .label.on {
                                        color: #001bde;
                                    }

                                    + .back .label.off {
                                        color: #fff !important;
                                    }
                                }

                                + .back .label.off {
                                    color: #fff;
                                }
                            }
                        }
                    }
                }

                .actions-row {
                    margin-bottom: 25px;
                    background: #f6f6f6;
                    border-radius: 8px;
                    padding: 10px 25px;
                    max-width: 218px;
                    display: flex;
                    justify-content: space-between;
                    // box-shadow: rgba(0,0,0,.16);

                    @include lt-md {
                        max-width: 100%;
                        // margin-top: 1rem;
                    }

                    img {
                        width: 35px;
                        height: 35px;
                        margin-right: 20px;

                        &:last-child {
                            margin: 0;
                        }

                        &:hover {
                            cursor: pointer;
                        }
                    }
                }

                .action-btns {
                    display: flex;
                    justify-content: space-between;
                    width: 100%;
                    margin-bottom: 20px;
                    margin-top: 20px;

                    @include lt-md {
                        .btn {
                            width: 48%;
                            min-width: 10px !important;
                        }
                    }

                    .save-btn {
                        width: 200px;
                        height: 50px;
                        display: flex;
                        justify-content: center;
                        align-items: center;

                        background: #001ce2;
                        border-radius: 5px;

                        font-family: Noto Sans, sans-serif;
                        font-style: normal;
                        font-weight: 500;
                        font-size: 18px;
                        line-height: 25px;
                        color: #ffffff;
                    }

                    .purchase-btn {
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        opacity: 1;
                        height: 50px;
                        width: 250px;
                        letter-spacing: 0;
                        padding: 0 !important;
                        border: 2px solid #001ce2;
                        box-sizing: border-box;
                        border-radius: 5px;
                        font-weight: 600;
                        font-size: 18px;
                        line-height: 25px;
                        color: #001ce2;
                        transition: 0.2s;
                    }

                    // custom fix 1.0
                    .purchase-btn:hover {
                        color: white;
                        background: #001ce2;
                    }
                }
            }
        }
    }

    .plans {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        position: relative;

        & > .dot-bg {
            position: absolute;
            bottom: -6rem;
            left: -18rem;
            z-index: 1;
            height: 160px;
        }
    }

    .toggle-panel.smaller {
        width: 110px;

        .aux-fill {
            width: 183%;
            position: absolute;
            background: #001CE2;
            border-radius: 20px;
            height: 38px;
            top: 0;
            z-index: 1;
        }
    }

    .toggle-panel {
        border: solid 1.3px #001CE2;
        border-radius: 50px;
        position: relative;
        overflow: hidden;
        padding: 5px 10px;
        height: 40px;
        width: 200px;
        display: flex;
        justify-content: center;
        align-items: center;

        .aux-fill {
            width: 100%;
            position: absolute;
            background: $primary;
            border-radius: 20px;
            height: 40px;
            top: 0;
            z-index: 1;

            &.left {
                animation-name: swipeToLeft;
                animation-duration: 0.3s;
                animation-timing-function: ease;
                animation-fill-mode: forwards;

                & ~ .buttons .monthly {
                    color: $bg-color;
                    transition: color 0.5s ease;
                }
            }

            &.right {
                animation-name: swipeToRight;
                animation-duration: 0.3s;
                animation-timing-function: ease;
                animation-fill-mode: forwards;

                & ~ .buttons .yearly {
                    color: $bg-color;
                    transition: color 0.5s ease;
                }
            }
        }

        .buttons {
            position: absolute;
            right: 0;
            height: 40px;
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 5px;
            z-index: 2;

            button {
                background: transparent;
                border: none;
                color: $primary;
                font-weight: 700;
                width: 100px;
                outline: none;
                transition: color 0.5s ease;

                &:hover {
                    cursor: pointer;
                }
            }
        }
    }

    @keyframes swipeToRight {
        from {
            transform: translateX(-95px);
        }
        to {
            transform: translateX(95px);
        }
    }

    @keyframes swipeToLeft {
        from {
            transform: translateX(95px);
        }
        to {
            transform: translateX(-95px);
        }
    }

    //dialog css
    .now-only-text {
        font-family: "Noto Sans" !important;
        font-size: 20px;
        line-height: 30px;
        color: #888db1 !important;
    }

    //dialog css

    // Transitions effects
    .fade-enter-active,
    .fade-leave-active {
        transition: opacity 0.5s ease;
    }

    .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */
    {
        opacity: 0;
    }

    .slide-fade-enter-active {
        transition: all 0.3s ease;
    }

    .slide-fade-leave-active {
        transition: all 0.8s cubic-bezier(1, 0.5, 0.8, 1);
    }

    .slide-fade-enter, .slide-fade-leave-to
        /* .slide-fade-leave-active below version 2.1.8 */
    {
        transform: translateX(10px);
        opacity: 0;
    }

    .plan-container {
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
        color: $text-color;
        margin-top: 15px;
        box-shadow: none !important;

        .dot-bg {
            position: absolute;
            top: -18px;
            right: -78px;
            display: none;
        }

        .circle-bg {
            position: absolute;
            bottom: -60px;
            right: -40px;
            display: none;
        }
    }

    .plan-details {
        background: white;
        padding: 0 !important;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        border-radius: 17px;
        position: relative;
        z-index: 1;

        .plan-original-price {
            position: relative;
            margin-top: 15px;
            font-size: 50px !important;

            img {
                position: absolute;
                right: 0;
                top: 0;
                height: 100%;
            }

            @media (max-width: 1480px) {
                right: 0;
            }
        }

        .plan-offer {
            color: $primary;
            font-size: 65px;
            position: relative;

            small,
            sup {
                font-size: 22px;
            }

            small {
                font-weight: 700;

                &:first-child {
                    margin-right: 10px;
                }

                &.not-bold {
                    font-weight: normal;
                }
            }

            sup {
                position: absolute;
                top: 25px;
                left: 92px;
            }

            @media (max-width: 1480px) {
                font-size: 42px;

                small,
                sup {
                    font-size: 20px;
                }

                sup {
                    top: 15px;
                    left: 90px;
                }
            }

            @media (max-width: 576px) {
                font-size: 36px;

                small,
                sup {
                    font-size: 16px;
                }

                sup {
                    left: 75px;
                }
            }
        }

        .btn {
            height: 60px;
            line-height: 1rem;

            small {
                display: block;
                font-size: 10px;
            }

            @media (max-width: 480px) {
                width: 100%;
            }
        }

        @media (max-width: 960px) {
            padding: 50px;
        }
    }

    .help-text {
        font-size: 22px;

        @media (max-width: 1480px) {
            font-size: 14px;
        }
    }

    .plan-info {
        width: 100%;
        padding: 3rem 5rem;

        img {
            height: 14px;
            margin-right: 5px;
        }

        @media (max-width: 576px) {
            padding: 2rem;
        }
    }

    .fade-enter-active,
    .fade-leave-active {
        transition: opacity 0.8s ease;
        opacity: 1 !important;

        .form-title,
        label,
        .section-title,
        .aside-bar {
            opacity: 1 !important;
            transition: all 0.8s ease;
        }
    }

    .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */
    {
        opacity: 1 !important;
        transition: opacity 0.8s ease;

        .form-title,
        label,
        .section-title,
        .aside-bar {
            opacity: 0 !important;
            transition: all 0.8s ease;
        }
    }

    // Main component transitions
    @for $j from 1 through 6 {
        @keyframes moveInput#{$j} {
            from {
                transform: translate(0);
            }
            to {
                transform: translate(
                                calc((-1) * (50vw - 50% - 380px - 3rem - 1.17%)),
                                375px
                );
            }
        }
    }

    .fade-leave-active {
        #myAccountTab {
            overflow: visible;

            @for $i from 1 through 6 {
                .input-field {
                    &:nth-child(#{ $i }) {
                        animation-name: moveInput#{$i};
                        animation-duration: 0.6s;
                        animation-fill-mode: forwards;
                        animation-timing-function: cubic-bezier(0.8, 0.6, 0.45, 0.4);
                    }
                }
            }
        }
    }

    /* new input styles */
    .inner-text {
        padding-top: 4px;
        white-space: nowrap;
        color: #aeaeae;
    }

    .error {
        color: red !important;
    }

    .custom-tab1 {
        border-top: 2px solid #001ce2 !important;
        border-bottom: 2px solid #001ce2 !important;
        border-left: 2px solid #001ce2 !important;
        font-family: "Noto Sans" !important;
        font-weight: 600;
        font-size: 14px;
        line-height: 18px;
        color: #001ce2 !important;
        text-transform: capitalize !important;
        border-top-left-radius: 10px;
        border-bottom-left-radius: 10px;
    }

    .custom-tab2 {
        border-top: 2px solid #001ce2 !important;
        border-bottom: 2px solid #001ce2 !important;
        border-right: 2px solid #001ce2 !important;
        font-family: "Noto Sans" !important;
        font-weight: 600;
        font-size: 14px;
        line-height: 18px;
        color: #001ce2 !important;
        text-transform: capitalize !important;
        border-top-right-radius: 10px;
        border-bottom-right-radius: 10px;
    }

    .custom-active {
        background: #001ce2 !important;
        color: #ffffff !important;
    }

    .now-only-text {
        font-family: "Noto Sans" !important;
        font-size: 20px !important;
        line-height: 30px;
        color: #888db1 !important;
        @media screen and (min-width: 1264px) and (max-width: 1903px) {
            font-size: 18px !important;
        }
        @media screen and (max-width: 599px) {
            font-size: 14px !important;
        }
    }

    .rate-text {
        font-family: "Noto Sans" !important;

        .old-price {
            font-weight: bold;
            font-size: 50px;
            line-height: 60px;
            color: #001ce2;
            opacity: 0.3;
            text-decoration: line-through;
            @media screen and (min-width: 1264px) and (max-width: 1903px) {
                font-size: 36px !important;
            }
            @media screen and(max-width: 599px) {
                font-size: 24px !important;
            }
        }

        .new-price {
            font-weight: bold;
            font-size: 70px;
            line-height: 50px;
            color: #001ce2 !important;
            @media screen and (min-width: 1264px) and (max-width: 1903px) {
                font-size: 50px !important;
            }
            @media screen and (max-width: 599px) {
                font-size: 36px !important;
            }
        }

        sub {
            font-weight: bold;
            font-size: 20px;
            line-height: 50px;
            color: #001ce2;
            margin-left: -5px;
            @media screen and (min-width: 1264px) and (max-width: 1903px) {
                font-size: 18px !important;
            }
            @media screen and (max-width: 599px) {
                font-size: 14px !important;
            }
        }
    }

    .hr-line {
        width: 80%;
        border: 2px solid #e6e8fc;
    }

    .save-text {
        font-family: "Noto Sans" !important;
        font-size: 20px !important;
        line-height: 30px;
        color: #888db1 !important;
        margin-left: -8px;
        @media screen and (max-width: 599px) {
            font-size: 14px !important;
        }
    }

    .price-option {
        font-family: "Noto Sans" !important;
        font-size: 20px !important;
        line-height: 32px;
        color: #888db1 !important;
        @media screen and (min-width: 1264px) and (max-width: 1903px) {
            margin-top: -10px;
            font-size: 18px !important;
            line-height: 0px;
        }
        @media screen and (max-width: 599px) {
            font-size: 14px !important;
            line-height: 0;
        }
    }

    .btn-modal-subscribe {
        width: 220px !important;
        height: 60px !important;
        border-radius: 5px !important;
        text-transform: capitalize !important;
        font-family: "Noto Sans", sans-serif !important;
        font-size: 18px !important;
        font-weight: 500;
        line-height: 18px;
    }

    .check-img {
        @media screen and (max-width: 599px) {
            width: 16px;
        }
    }

    .payment-link {
        .payment-logo-stripe {
        }

        .payment-logo-paypal {
        }
    }

    .payment-link:hover {
        cursor: pointer;
    }

    .v-dialog:not(.v-dialog--fullscreen) {
        max-height: 100% !important;
    }

    .centered-input input {
        margin-top: 6px !important;
    }

    .input-margin-3 input {
        margin-top: 0px !important;
    }
</style>

<style lang="scss">
    @import "../../../../sass/media-queries";

    // image crop styles not scoped
    .vue-image-crop-upload {
        .vicp-wrap {
            width: 95%;
            max-width: 600px;
            height: fit-content;
            min-height: 300px;

            @include lt-sm {
                min-height: 530px;
            }

            .vicp-close {
                right: 0 !important;
            }

            .vicp-step1 {
                .vicp-operate {
                    a {
                        color: #001ce2;
                        font-weight: 500;
                    }
                }
            }

            .vicp-step2 {

                .vicp-crop {
                    @include lt-sm {
                        display: flex;
                        flex-direction: column;
                        align-items: center;


                        .vicp-crop-right {
                            margin-top: 40px;
                        }
                    }

                }

                .vicp-operate {
                    a {
                        color: #001ce2;
                        font-weight: 500;
                    }
                }
            }
        }
    }
</style>
