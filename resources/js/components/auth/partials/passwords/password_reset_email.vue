<template>
    <v-container style="width:100%" id="createAccount">
        <v-row align="center" justify="center">
            <v-col lg="6" xl="5" md="6" sm="11" cols="12">
                <v-card color="transparent" tile flat class="mt-md-0 mt-sm-0 mt-n5">
                    <v-card class="pa-xl-10 pa-lg-5 pa-md-5 pa-sm-5 card-login">
                        <v-card-subtitle align="center" class="create-new-account-text">Reset Password</v-card-subtitle>

                        <v-card-subtitle>
                            <v-form ref="form" :lazy-validation="lazy" class="login-form" v-show="!isEmailSent">
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

                                <v-btn color="#0046FE" class="btn-signup reset" style="width: fit-content !important;"
                                       @click="sendPasswordRestLink">
                                    <span>{{isSending ? 'Sending...' : 'Send Reset Link'}}</span>
                                </v-btn>
                            </v-form>
                            <div v-show="isEmailSent" class="success-message">
                                Password reset link has been successfully sent.
                            </div>
                        </v-card-subtitle>
                        <v-card-subtitle class="account-exists NoDecor">
                            Already reset password?
                            <a href="/login">Login</a>
                        </v-card-subtitle>
                    </v-card>
                </v-card>
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
    export default {
        name: "password_reset_email",
        data() {
            return {
                windowWidth: window.innerWidth,
                agreeCheck: false,
                formData: {
                    email: ''
                },
                errors: {},
                lazy: false,
                isEmailSent: false,
                isSending: false,
            }
        },
        methods: {
            sendPasswordRestLink() {
                if (this.isSending) {
                    return;
                }
                this.isSending = true;
                this.errors = {};
                axios.post('/password/email', this.formData)
                    .then(response => {
                        this.isEmailSent = true;
                        this.isSending = false;
                    })
                    .catch(error => {
                        this.isSending = false;
                        if (typeof error.response.data === 'object') {
                            this.errors = error.response.data.errors;
                        } else {
                            this.errors = ['Something went wrong. Please try again.'];
                        }
                    });
            },
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
