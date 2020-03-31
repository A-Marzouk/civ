<template>
    <div class="hold-form">
        <span class="title-form">
          Login
        </span>
        <div class="social-wrap">
            <a href="/register/instagram"><img src="/images/welcome_landing_page/icons/instagram.png" alt=""></a>
            <a href="/register/linkedin"><img src="/images/welcome_landing_page/icons/linkedin.png" alt=""></a>
            <a href="/register/google"><img src="/images/welcome_landing_page/icons/google.png" alt=""></a>
            <a href="/register/facebook"><img src="/images/welcome_landing_page/icons/facebook.png" alt=""></a>
            <a href="/register/github"><img src="/images/welcome_landing_page/icons/github.png" alt=""></a>
        </div>
        <span class="title-inline">
          or Login with Email
        </span>
        <div class="v-form" ref="formSignup">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-lg-12 col-12">
                        <div class="v-input v-input--has-state theme--light v-text-field v-text-field--is-booted v-text-field--placeholder error--text">
                            <div class="v-input__control">
                                <div class="v-input__slot">
                                    <div class="v-text-field__slot">
                                        <input name="email" required="required" id="input-9" class="w-100"
                                               placeholder="Email" type="text" style="padding-left: 20px;"
                                               v-model="formData.email"></div>
                                </div>
                                <div class="v-text-field__details" v-if="errors.email">
                                    <div class="v-messages theme--light error--text" role="alert">
                                        <div class="v-messages__wrapper">
                                            <div class="v-messages__message">{{errors.email[0]}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-12 col-12">
                        <div class="v-input v-input--has-state theme--light v-text-field v-text-field--is-booted v-text-field--placeholder error--text">
                            <div class="v-input__control">
                                <div class="v-input__slot">
                                    <div class="v-text-field__slot">
                                        <input name="password" required="required" id="input-10" placeholder="Password"
                                               type="password" v-model="formData.password" class="w-100"
                                               style="padding-left: 20px;"></div>
                                </div>
                                <div class="v-text-field__details" v-if="errors.password">
                                    <div class="v-messages theme--light error--text" role="alert">
                                        <div class="v-messages__wrapper">
                                            <div class="v-messages__message">{{errors.password[0]}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="ml-4 mb-3">
                        <input class="form-check-input" type="checkbox" name="remember"
                               id="remember" v-model="formData.remember">

                        <label class="form-check-label" for="remember">
                            Remember Me
                        </label>
                    </div>


                    <div class="col-sm-12 col-lg-12 col-12 NoDecor" :class="{'disabled':!canSubmit}">
                        <a href="javascript:void(0)" class="btn-inset light__blue full" @click="submitForm"><i>Login</i></a>
                    </div>
                </div>
            </div>
        </div>
        <span class="title-inline">Don't have an account? <a href="/register">Register</a></span>
    </div>
</template>

<script>
    export default {
        name: "Login",
        data() {
            return {
                formData: {
                    email: '',
                    password: '',
                    remember: false
                },
                canSubmit: true,
                errors: []
            }
        },
        methods: {
            submitForm() {
                if (!this.canSubmit) {
                    console.log('Please wait...');
                    return;
                }
                this.canSubmit = false;
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
                    });
            },
        },
        watch: {
            formData: {
                handler() {
                    // check if all formData values are filled
                    let values = Object.values(this.formData);
                    let isAll_filled = true;
                    for (const value of values) {
                        if (value.length < 1) {
                            isAll_filled = false;
                        }
                    }
                    this.canSubmit = isAll_filled;
                },
                deep: true
            }
        },
    }
</script>

<style scoped lang="scss">

    .disabled{
        a:hover {
            cursor: not-allowed;
        }
    }
</style>
