<template>
    <v-container style="width:100%" id="createAccount">
        <v-row align="center" justify="center">
            <v-col lg="6" xl="5" md="6" sm="11" cols="12">
                <v-card color="transparent" tile flat class="mt-md-0 mt-sm-0 mt-n5">
                    <v-card class="pa-xl-10 pa-lg-5 pa-md-5 pa-sm-5 card-login">
                        <v-card-subtitle align="center" class="create-new-account-text">Reset Password</v-card-subtitle>

                        <v-card-subtitle>
                            <v-form ref="form" :lazy-validation="lazy" class="login-form" v-show="!isPasswordSet">
                                <div class="input-div reset">
                                    <label>Email Address</label>
                                    <v-text-field
                                            dark
                                            color="primary"
                                            class="login-input"
                                            type="email"
                                            outlined
                                            :error="!!errors.email"
                                            :error-messages="errors.email"
                                            background-color="#ffffff"
                                            v-model="formData.email"
                                            :height="windowWidth<=599 ? '33.44' : '60'"
                                    ></v-text-field>
                                </div>
                                <div class="input-div reset">
                                    <label>Password</label>
                                    <v-text-field
                                            dark
                                            color="primary"
                                            class="login-input"
                                            type="password"
                                            outlined
                                            :error="!!errors.password"
                                            :error-messages="errors.password"
                                            background-color="#ffffff"
                                            v-model="formData.password"
                                            :height="windowWidth<=599 ? '33.44' : '60'"
                                    ></v-text-field>
                                </div>

                                <div class="input-div reset">
                                    <label>Confirm Password</label>
                                    <v-text-field
                                            dark
                                            color="primary"
                                            class="login-input"
                                            type="password"
                                            outlined
                                            :error="!!errors.password"
                                            background-color="#ffffff"
                                            v-model="formData.password_confirmation"
                                            :height="windowWidth<=599 ? '33.44' : '60'"
                                    ></v-text-field>
                                </div>

                                <v-btn color="#0046FE" class="btn-signup reset" style="width: fit-content !important;"
                                       @click="resetPassword">
                                    <span>{{isResetting ? 'Resetting...' : 'Reset Password'}}</span>
                                </v-btn>
                            </v-form>
                            <div v-show="isPasswordSet" class="success-message">
                                Password has been successfully changed | <a href="/login" class="ml-1"> Login</a>
                            </div>
                        </v-card-subtitle>
                    </v-card>
                </v-card>
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
    export default {
        name: "password_reset_form",
        data() {
            return {
                windowWidth: window.innerWidth,
                agreeCheck: false,
                formData: {
                    token: '',
                    email: '',
                    password: '',
                    password_confirmation: '',
                },
                errors: {},
                lazy: false,
                isPasswordSet: false,
                isResetting: false,
            }
        },
        methods: {
            resetPassword() {
                if (this.isResetting) {
                    return;
                }
                this.isResetting = true;
                this.errors = {};
                axios.post('/password/reset', this.formData)
                    .then(() => {
                        this.logoutUser();
                    })
                    .catch(error => {
                        this.isResetting = false;
                        if (typeof error.response.data === 'object') {
                            this.errors = error.response.data.errors;
                        } else {
                            this.errors = ['Something went wrong. Please try again.'];
                        }
                    });
            },
            logoutUser() {
                axios.post('/logout').then(() => {
                        // remove access token from cookies:
                        Vue.$cookies.remove('access_token');
                        this.isPasswordSet = true;
                        this.isResetting = false;
                    }
                )
            },
            getParameterByName(name) {
                let match = RegExp('[?&]' + name + '=([^&]*)').exec(window.location.search);
                return match && decodeURIComponent(match[1].replace(/\+/g, ' '));
            }
        },
        mounted() {
            // get data from the url:
            this.formData.email = this.getParameterByName('email');
            this.formData.token = window.location.pathname.split("/")[3];

        }
    }
</script>

<style lang="scss" scoped>

    @import "../../../../../sass/media-queries";

    .success-message {
        font-size: 24px;
        width: 100%;
        display: flex;
        padding-top: 25px;
        padding-bottom: 25px;
        justify-content: center;
        color: forestgreen;
    }

    .input-div.reset {
        position: relative;
        margin-top: 30px;

        label {
            position: absolute;
            top: -25px;
        }
    }

    .btn-signup.reset {
        span {
            @include lt-sm {
                font-size: 12px !important;
            }
        }
    }
</style>
