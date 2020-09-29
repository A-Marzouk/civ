<template>
    <v-container style="width:100%" id="createAccount">
        <v-row align="center" justify="center">
            <v-col lg="6" xl="5" md="6" sm="11" cols="12">
                <v-card color="transparent" tile flat class="mt-md-0 mt-sm-0 mt-n5">
                    <v-card class="pa-xl-10 pa-lg-5 pa-md-5 pa-sm-5 card-login">
                        <v-card-subtitle align="center" class="create-new-account-text">Login</v-card-subtitle>
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
                        <v-card-subtitle align="center" class="text--black">Or Login with Email</v-card-subtitle>

                        <v-card-subtitle>
                            <v-form ref="form" :lazy-validation="lazy" class="login-form">
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
                                    <label>Password</label> <a href="/password/reset" class="ml-2">Forgot?</a>
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

                                <v-checkbox dense v-model="formData.remember" class="hidden-sm-only mt-n2">
                                    <template slot="label">
                                        <div class="agree-text">
                                            Remember Me
                                        </div>
                                    </template>
                                </v-checkbox>

                                <v-checkbox v-model="formData.remember"  class="d-none d-sm-flex d-md-none">
                                    <template slot="label">
                                        <div class="agree-text">
                                            Remember Me
                                        </div>
                                    </template>
                                </v-checkbox>
                                <div class="error--text error-custom-margin">{{errors.agreeCheck}}</div>

                                <v-btn color="#0046FE" class="btn-signup" @click="login">
                                    <span>Sign In</span>
                                </v-btn>
                            </v-form>
                        </v-card-subtitle>
                        <v-card-subtitle class="account-exists NoDecor">
                            Don't have an account?
                            <a href="/register">Register</a>
                        </v-card-subtitle>
                    </v-card>
                </v-card>
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
    export default {
        name: "LoginForm",
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
                    email: '',
                    password: '',
                    remember: false,
                },
                errors: {},
                lazy: false,
            }
        },
        methods:{
            login() {
                this.errors = {};
                axios.post('/login', this.formData)
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
                        this.canSubmit = true;
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

<style scoped>

</style>
