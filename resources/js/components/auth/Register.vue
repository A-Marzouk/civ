<template>
    <v-app style="width:100%; background-image: url(/images/welcome_landing_page/icons/new-background.png);" class="app-container">
        <!-- main container -->
        <v-container class="main-container">

            <v-container style="width:100%" id="createAccount">
                <v-row align="center" justify="center">
                    <v-col lg="6" xl="5" md="6" sm="11" cols="12">
                        <v-card color="transparent" tile flat class="mt-md-0 mt-sm-0 mt-n5">
                            <v-card class="pa-xl-10 pa-lg-5 pa-md-5 pa-sm-5 card-login">
                                <v-card-subtitle align="center" class="create-new-account-text">Create New Account</v-card-subtitle>
                                <v-card-subtitle>
                                    <v-form ref="form" :lazy-validation="lazy" class="login-form">
                                        <div class="input-div">
                                            <label>Name</label>
                                            <v-text-field
                                                    dark
                                                    color="primary"
                                                    class="login-input"
                                                    type="text"
                                                    outlined
                                                    :error="errors.name"
                                                    background-color="#ffffff"
                                                    v-model="formData.name"
                                                    :height="windowWidth<=599 ? '33.44' : '60'"
                                            ></v-text-field>
                                            <div
                                                    class="error--text error-custom-margin"
                                                    v-if="errors.name"
                                            >{{errors.name[0]}}</div>
                                        </div>

                                        <div class="input-div mt-md-0 mt-sm-0 mt-n3">
                                            <label>Email Address</label>
                                            <v-text-field
                                                    dark
                                                    color="primary"
                                                    class="login-input"
                                                    type="email"
                                                    outlined
                                                    :error="errors.email"
                                                    background-color="#ffffff"
                                                    v-model="formData.email"
                                                    :height="windowWidth<=599 ? '33.44' : '60'"
                                            ></v-text-field>
                                            <div
                                                    class="error--text error-custom-margin"
                                                    v-if="errors.email"
                                            >{{errors.email[0]}}</div>
                                        </div>

                                        <div class="input-div mt-md-0 mt-sm-0 mt-n3">
                                            <label>Password</label>
                                            <v-text-field
                                                    dark
                                                    color="primary"
                                                    class="login-input"
                                                    type="password"
                                                    outlined
                                                    :error="errors.password"
                                                    background-color="#ffffff"
                                                    v-model="formData.password"
                                                    :height="windowWidth<=599 ? '33.44' : '60'"
                                            ></v-text-field>
                                            <div
                                                    class="error--text error-custom-margin"
                                                    v-if="errors.password"
                                            >{{errors.password[0]}}</div>
                                        </div>

                                        <div class="input-div">
                                            <label>Confirm Password</label>
                                            <v-text-field
                                                    dark
                                                    color="primary"
                                                    class="login-input"
                                                    type="password"
                                                    outlined
                                                    background-color="#ffffff"
                                                    v-model="formData.password_confirmation"
                                                    :min-height="windowWidth<=599 ? '33.44' : '60'"
                                            ></v-text-field>
                                        </div>

                                        <v-checkbox dense v-model="agreeCheck" class="hidden-sm-only mt-n2">
                                            <template slot="label">
                                                <div class="agree-text">
                                                    I accept your
                                                    <span>Terms of Use</span> &
                                                    <span>Privacy Policy.</span>
                                                </div>
                                            </template>
                                        </v-checkbox>

                                        <v-checkbox v-model="agreeCheck" class="d-none d-sm-flex d-md-none">
                                            <template slot="label">
                                                <div class="agree-text">
                                                    I accept your
                                                    <span>Terms of Use</span> &
                                                    <span>Privacy Policy.</span>
                                                </div>
                                            </template>
                                        </v-checkbox>
                                        <div class="error--text error-custom-margin">{{errors.agreeCheck}}</div>

                                        <v-btn color="#0046FE" class="btn-signup" @click="register">
                                            <span>Sign Up</span>
                                        </v-btn>
                                    </v-form>
                                </v-card-subtitle>
                                <v-card-subtitle class="account-exists NoDecor">
                                    Already registered?
                                    <a href="/login">Sign In</a>
                                </v-card-subtitle>
                                <v-card-subtitle align="center" class="separator text--black">Or</v-card-subtitle>
                                <!-- social icons -->
                                <v-card-subtitle align="center">
                                    <v-btn
                                            class="social-icon mx-md-2 mx-sm-3 mx-2"
                                            color="#ffffff"
                                            v-for="icon in socialMediaIcons"
                                            :key="icon.title"
                                            :href="icon.link"
                                    >
                                        <img
                                                :width="windowWidth>599 && windowWidth<=959?icon.tablet_width:icon.width"
                                                :src="getSocialIcon(icon.title)"
                                                alt
                                        />
                                    </v-btn>
                                </v-card-subtitle>
                                <!-- social icons -->
                            </v-card>
                        </v-card>
                    </v-col>
                </v-row>
            </v-container>

        </v-container>
    </v-app>
</template>

<script>
    export default {
        name: "Register",
        data() {
            return {
                windowWidth: window.innerWidth,
                agreeCheck: false,
                socialMediaIcons: [
                    {
                        id: 1,
                        title: "instagram",
                        width: 18,
                        tablet_width: 18,
                        link: "/register/instagram"
                    },
                    {
                        id: 2,
                        title: "linkedin",
                        width: 16,
                        tablet_width: 16,
                        link: "/register/linkedin"
                    },
                    {
                        id: 3,
                        title: "google",
                        width: 14,
                        tablet_width: 14,
                        link: "/register/google"
                    },
                    {
                        id: 4,
                        title: "facebook",
                        width: 18,
                        tablet_width: 18,
                        link: "/register/facebook"
                    },
                    {
                        id: 5,
                        title: "github",
                        width: 22,
                        tablet_width: 22,
                        link: "/register/github"
                    }
                ],
                formData: {
                    name: '',
                    email: '',
                    password: '',
                    password_confirmation: '',
                },
                errors: {},
                lazy: false,
            }
        },
        methods:{
            register() {
                this.errors = {};
                if (!this.agreeCheck) {
                    this.errors.agreeCheck =
                        "You have to accept our Terms of Use & Privacy Police*";
                    return;
                }

                axios.post('/simple-register', this.formData)
                    .then(response => {
                        // save the access token then redirect:
                        Vue.$cookies.set('access_token', response.data.access_token, "3y");
                        if(response.data.is_admin){
                            window.location.href = '/workforce-admin';
                        }else{
                            window.location.href = '/resume-builder';
                        }
                    })
                    .catch(error => {
                        if (typeof error.response.data === 'object') {
                            this.errors = error.response.data.errors;
                        } else {
                            this.errors = ['Something went wrong. Please try again.'];
                        }
                        this.$store.dispatch('flyingNotification', {
                            message: 'Error',
                            iconSrc: '/images/resume_builder/error.png'
                        });
                    });
            },
            getSocialIcon(title) {
                return `/images/welcome_landing_page/icons/social_icons/${title}.png`;
            },
        }
    }
</script>

<style scoped lang="scss">
    @import url("https://fonts.googleapis.com/css?family=Montserrat");
    @import url("https://fonts.googleapis.com/css?family=Open+Sans");


    .inner-text{
        padding-top: 6px;
        color: #aeaeae;
    }

    .inner-link{
        padding-top: 4px;
        padding-right: 10px;
        &:hover{
            text-decoration: none;
        }
    }


    .card-login {
        box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1) !important;
        border-radius: 15px !important;
        @media screen and (max-width: 959px) {
            margin-top: -15px;
        }
        @media screen and (max-width: 599px) {
            height: 770px;
            margin-top: -38px;
        }
    }

    .separator {
        display: flex;
        align-items: center;
        text-align: center;
        font-family: "Montserrat" !important;
        font-size: 14px;
        line-height: 17px;
    }
    .separator::before,
    .separator::after {
        content: "";
        flex: 1;
        border-bottom: 1px solid lightgray;
    }
    .separator::before {
        margin-right: 2em;
    }
    .separator::after {
        margin-left: 2em;
    }
    .main-container {
        width: 100%;
        @media screen and (max-width: 599px) {
            overflow-x: hidden !important;
            margin: 0 !important;
            padding: 0 !important;
        }
        @media screen and (max-width: 400px) {
        }
    }
    .app-container {
        @media screen and (max-width: 599px) {
        }
    }

    //form
    .login-form {
        label {
            font-family: "Montserrat" !important;
            font-size: 14px;
            text-align: left !important;
            font-weight: 500;
            color: #616161 !important;
        }
        @media screen and (max-width: 599px) {
            .login-input {
                margin-top: 5px;
            }
            label {
                font-size: 12px;
            }
        }
    }
    //form

    .create-new-account-text {
        font-family: "Montserrat" !important;
        font-weight: 500;
        font-size: 24px;
        line-height: 29px;
        color: #0046fe !important;
        @media screen and (max-width: 599px) {
            font-size: 18px;
            line-height: 22px;
            padding-top: 32px;
        }
    }

    .social-icon {
        height: 39px !important;
        width: 39px !important;
        min-width: 39px !important;
        border: 1px solid #ebebeb !important;
        border-radius: 10px !important;
    }

    .agree-text {
        font-family: "Montserrat" !important;
        color: #838ca3 !important;
        font-size: 14px;
        font-weight: 500;
        line-height: 17px;
        span {
            color: #0046fe !important;
        }
        @media screen and (max-width: 1263px) {
            font-size: 12px !important;
        }
    }

    .btn-signup {
        box-shadow: 0px 4px 40px rgba(0, 70, 254, 0.2);
        border-radius: 10px !important;
        width: 11.31rem !important;
        height: 3.625rem !important;
        span {
            font-family: "Montserrat" !important;
            font-weight: bold;
            color: #ffffff !important;
            letter-spacing: 0.2em !important;
            font-size: 0.875rem !important;
        }
        @media screen and (min-width: 1264px) and (max-width: 1903px) {
            width: 180px !important;
            height: 51.35px !important;
            font-size: 12px !important;
        }

        @media screen and (min-width: 960px) and (max-width: 1263px) {
            width: 160px !important;
            height: 51.35px !important;
            font-size: 10px !important;
        }
        @media screen and (max-width: 599px) {
            width: 173px !important;
            height: 52px !important;
            font-size: 12px !important;
        }
        @media screen and (max-width: 400px) {
            width: 154px !important;
            font-size: 10px !important;
        }
    }

    .account-exists {
        font-family: "Montserrat" !important;
        font-style: normal;
        font-weight: normal;
        font-size: 18px;
        line-height: 22px;
        color: #000000;
        a {
            color: #0046fe !important;
            font-weight: 500;
        }

        @media screen and (max-width: 959px) {
            font-size: 18px;
            line-height: 22px;
        }

        @media screen and (max-width: 599px) {
            font-size: 14px;
            line-height: 17px;
        }
    }

    .v-text-field {
        border-radius: 10px !important;
    }
    .input-av.v-text-field {
        box-shadow: 0px 4px 40px rgba(0, 28, 226, 0.1) !important;
    }


    .error-custom-margin {
        margin-top: -15px;
        margin-bottom: 10px;
    }

</style>
<style>
    #registerForm .v-text-field input {
        color: #aeaeae !important;
    }

    #registerForm
    .theme--light.v-text-field--outlined:not(.v-input--is-focused):not(.v-input--has-state)
    > .v-input__control
    > .v-input__slot
    fieldset {
        border: 2px solid #ffffff !important;
    }

    #registerForm
    .theme--dark.v-text-field--outlined:not(.v-input--is-focused):not(.v-input--has-state)
    > .v-input__control
    > .v-input__slot
    fieldset {
        border: 2px solid #ebebeb !important;
    }

    #registerForm .slick-dots li button {
        width: 110px !important;
        height: 6px;
        border-radius: 0px;
        margin-left: -10px;
        background-color: #e5e5e5 !important;
    }

    #registerForm .slick-dots li.slick-active button {
        background-color: #0f4cee !important;
        outline: none;
        transition: width 5s ease-out 0s;
    }
    #registerForm .slick-dots li button:focus {
        outline: none !important;
    }

    @media screen and (max-width: 959px) {
        #registerForm .slick-initialized .slick-slide {
            margin-left: -80px;
        }
    }

    @media screen and (max-width: 700px) {
        #registerForm .slick-initialized .slick-slide {
            margin-left: -75px;
        }
    }

    @media screen and (max-width: 599px) {
        #registerForm .slick-dots li button {
            width: 40px !important;
            height: 6px;
        }
        #registerForm
        .theme--dark.v-text-field--outlined:not(.v-input--is-focused):not(.v-input--has-state)
        > .v-input__control
        > .v-input__slot {
            min-height: 48px !important;
            border-radius: 7px !important;
        }
        #registerForm .slick-initialized .slick-slide {
            margin-left: -70px;
        }
        @media screen and (max-width: 410px) {
            #registerForm .slick-initialized .slick-slide {
                margin-left: -69px;
            }
        }
    }
    @media screen and (max-width: 400px) {
        #registerForm .slick-initialized .slick-slide {
            margin-left: -40px;
        }
    }
</style>
