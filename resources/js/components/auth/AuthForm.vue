<template>
    <div>
        <div class="auth-main-wrapper" :style="`min-height:${formHeight+100}px;`">

            <div class="auth-form register" :class="{'show':activeTab === 'signup'}">

                <div class="auth-form-tabs">
                    <div class="tabs-wrapper">
                        <div class="tab first" :class="{'active': activeTab === 'signup'}" @click="changeTab('signup')">
                            SIGN UP
                        </div>
                        <div class="tab second" :class="{'active': activeTab === 'signin'}" @click="changeTab('signin')">
                            SIGN IN
                        </div>
                    </div>
                </div>

                <div class="sign-up-with-text">
                    Sign up with
                </div>

                <div class="auth-form-social-icons">
                    <a :href="icon.link" v-for="icon in socialIcons" :key="icon.id" class="icon-wrapper">
                        <img :src="`/images/welcome_landing_page/icons/social_icons/${icon.title}.png`" :alt="icon.title"/>
                    </a>
                </div>

                <div class="sign-up-with-text">
                    Or
                </div>

                <div class="auth-form-inputs">
                    <div class="auth-input-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" v-model="registerFormData.name">
                        <span class="error" v-if="errors.name">{{errors.name[0]}}</span>
                    </div>
                    <div class="auth-input-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" v-model="registerFormData.username">
                        <span class="error" v-if="errors.username">{{errors.username[0]}}</span>
                    </div>
                    <div class="auth-input-group">
                        <label for="email">Email Address</label>
                        <input type="email" name="email" id="email" v-model="registerFormData.email">
                        <span class="error" v-if="errors.email">{{errors.email[0]}}</span>
                    </div>
                    <div class="auth-input-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" v-model="registerFormData.password">
                        <span class="error" v-if="errors.password">{{errors.password[0]}}</span>
                    </div>
                    <div class="auth-input-group">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" v-model="registerFormData.password_confirmation">
                    </div>
                </div>

                <div class="accept-text" @click="acceptTerms = !acceptTerms">
                    <input type="checkbox" v-model="acceptTerms" >
                    <div>I accept your <a href="/">Terms of use</a> & <a href="/">Privacy Policy</a></div>
                    <span class="error" v-if="errors.acceptTerms">{{errors.acceptTerms}}</span>
                </div>

                <div class="auth-form-btn">
                    <a href="javascript:void(0)" @click="register">
                        <span v-if="isLoading" class="loader"></span>
                        <span v-else>
                        SIGN UP
                    </span>
                    </a>
                </div>

            </div>

            <div class="auth-form login" :class="{'show':activeTab === 'signin'}">

                <div class="auth-form-tabs">
                    <div class="tabs-wrapper">
                        <div class="tab first" :class="{'active': activeTab === 'signup'}" @click="changeTab('signup')">
                            SIGN UP
                        </div>
                        <div class="tab second" :class="{'active': activeTab === 'signin'}" @click="changeTab('signin')">
                            SIGN IN
                        </div>
                    </div>
                </div>

                <div class="sign-up-with-text">
                    Sign in with
                </div>

                <div class="auth-form-social-icons">
                    <a :href="icon.link" v-for="icon in socialIcons" :key="icon.id" class="icon-wrapper">
                        <img :src="`/images/welcome_landing_page/icons/social_icons/${icon.title}.png`" :alt="icon.title"/>
                    </a>
                </div>

                <div class="sign-up-with-text">
                    Or
                </div>

                <div class="auth-form-inputs">
                    <div class="auth-input-group">
                        <label for="email_login">
                            Email Address
                            <a href="/password/reset">Forgot?</a>
                        </label>
                        <input type="email" name="email" id="email_login" v-model="loginFormData.email">
                        <span class="error" v-if="errors.email">{{errors.email[0]}}</span>
                    </div>
                    <div class="auth-input-group">
                        <label for="password_login">Password</label>
                        <input type="password" name="password" id="password_login" v-model="loginFormData.password">
                        <span class="error" v-if="errors.password">{{errors.password[0]}}</span>
                    </div>
                </div>

                <div class="accept-text" @click="loginFormData.remember = !loginFormData.remember">
                    <input type="checkbox" v-model="loginFormData.remember">
                    <div>Remember me</div>
                </div>

                <div class="auth-form-btn">
                    <a href="javascript:void(0)" @click="login">
                        <span v-if="isLoading" class="loader"></span>
                        <span v-else>
                        SIGN IN
                    </span>
                    </a>
                </div>

            </div>

        </div>
    </div>
</template>

<script>
    export default {
        name: "AuthForm",
        data(){
            return{
                activeTab: 'signup',
                socialIcons: [
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
                acceptTerms: true,
                fieldType: 'password',
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
                registerFormData: {
                    name: '',
                    username: '',
                    email: '',
                    password: '',
                    password_confirmation: '',
                },
                loginFormData: {
                    email: '',
                    password: '',
                    remember: false,
                },

                errors: {},
                isLoading: false,
                formHeight: 0
            }
        },
        methods:{
            changeTab(tab) {
                this.errors = {};
                this.activeTab = tab;
            },
            login() {
                if(this.isLoading){
                    return;
                }

                this.isLoading = true ;
                this.errors = {};

                axios.post('/login', this.loginFormData)
                    .then(response => {
                        console.log(response.data);
                        // save the access token then redirect:
                        Vue.$cookies.set('access_token', response.data.access_token, "3y");

                        if(response.data.role == 'admin'){
                            window.location.href = '/workforce-admin';
                        }
                        else if(response.data.role == 'client'){
                            window.location.href = '/client';
                        }
                        else{
                            window.location.href = '/resume-builder';
                        }

                    })
                    .catch(error => {
                        this.isLoading = false ;

                        if (typeof error.response.data === 'object') {
                            this.errors = error.response.data.errors;
                        } else {
                            this.errors = ['Something went wrong. Please try again.'];
                        }
                    });
            },
            register() {

                if(this.isLoading){
                    return;
                }

                this.errors = {};

                if (!this.acceptTerms) {
                    this.errors.acceptTerms = "You have to accept our Terms of Use & Privacy Police*";
                    return;
                }

                this.isLoading = true ;

                this.sendRegisterRequest();
            },
            sendRegisterRequest(){
                axios.post('/simple-register', this.registerFormData)
                    .then(response => {
                        console.log(response.data);
                        // save the access token then redirect:
                        Vue.$cookies.set('access_token', response.data.access_token, "3y");
                        if(response.data.role === 'admin'){
                            window.location.href = '/workforce-admin';
                        }else if(response.data.role === 'client'){
                            window.location.href = '/client';
                        }
                        window.location.href = '/resume-builder';
                    })
                    .catch(error => {
                        this.isLoading = false ;
                        if (typeof error.response.data === 'object') {
                            this.errors = error.response.data.errors;
                        } else {
                            this.errors = ['Something went wrong. Please try again.'];
                        }
                    });
            },
            showPassword(){
                this.fieldType = 'text';
                setTimeout(()=> {
                    this.fieldType = 'password'
                },10000);
            },
            setFormHeight(){
                this.formHeight = $('.auth-form.register').innerHeight();
            }
        },
        created() {
            let uri = window.location.href.split('?');
            if (uri.length === 2) {
                let vars = uri[1].split('&');
                let params = {};
                let tmp = '';
                vars.forEach(function (v) {
                    tmp = v.split('=');
                    if (tmp.length === 2)
                        params[tmp[0]] = tmp[1];
                });
                if(params.tab && ( params.tab === 'signup' || params.tab === 'signin') ){
                    this.activeTab = params.tab;
                }
                if(params.username){
                    this.registerFormData.username = params.username ;
                }
            }
        },
        mounted() {
            this.setFormHeight();
            window.onresize = () => {
                this.setFormHeight();
            };
        },
    }
</script>

<style lang="scss" scoped>

    .auth-main-wrapper{
        display: flex;
        justify-content: center;
        margin-top:100px;


        .auth-form{
            width: 550px;
            height: auto;
            padding: 40px;
            background: #FFFFFF;
            box-shadow: 0 4.42136px 22.1068px rgba(0, 0, 0, 0.1);
            border-radius: 16.5px;
            font-family: Montserrat, sans-serif;
            opacity: 0;
            position: absolute;
            visibility: hidden;
            transition: opacity 0.5s ease-out, visibility 0.5s ease-out ;

            @media screen and (max-width: 660px) {
                width: 85%;
                padding: 30px 15px;
            }

            &.show{
                opacity: 1;
                visibility: visible;
            }

            .auth-form-tabs{
                padding: 0 60px;

                @media screen and (max-width: 660px) {
                    padding: 0 30px;
                }

                .tabs-wrapper{
                    display: flex;
                    margin: auto;
                    border: 2px solid #0046FE;
                    border-radius: 10px;
                    width: 100%;

                    .tab{
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        font-weight: bold;
                        font-size: 18px;
                        height: 60px;
                        letter-spacing: 0.2em;
                        text-transform: uppercase;
                        color: #0046FE;
                        background: white;
                        width: 100%;

                        @media screen and (max-width: 660px) {
                            font-size: 14px;
                            height: 50px;
                        }

                        &.first{
                            border-radius: 7px 0 0 7px;
                        }
                        &.second{
                            border-radius: 0 7px 7px 0;
                        }
                        &.active{
                            background: #0046FE;
                            color: white;
                        }
                        &:hover{
                            cursor: pointer;
                        }
                    }
                }
            }

            .sign-up-with-text{
                display: flex;
                justify-content: center;
                font-weight: 600;
                font-size: 16px;
                line-height: 22px;
                color: #616161;
                margin-top: 20px;
            }

            .auth-form-social-icons{
                display: flex;
                justify-content: center;
                margin-top: 20px;

                .icon-wrapper{
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    width: 50px;
                    height: 50px;
                    background: #FFFFFF;
                    border: 2px solid #EBEBEB;
                    box-sizing: border-box;
                    border-radius: 10px;
                    margin-left: 40px;
                    img{
                        width: 20px;
                    }
                }

                @media screen and (max-width: 660px) {
                    .icon-wrapper{
                        width: 40px;
                        height: 40px;
                        margin-left: 20px;
                    }
                }
            }

            .auth-form-inputs{
                .auth-input-group{
                    position: relative;
                    margin-top: 30px;
                    width: 100%;

                    label{
                        font-weight: 600;
                        font-size: 14px;
                        line-height: 25px;
                        color: #616161;

                        a{
                            text-decoration: none;
                            margin-left: 6px;
                            color: #0046FE;
                            font-size: 13px;
                        }
                    }

                    input{
                        height: 55px;
                        width: 100%;
                        background: #FFFFFF;
                        border: 2px solid #EBEBEB;
                        box-sizing: border-box;
                        border-radius: 10px;
                        padding-left: 12px;
                        &:focus{
                            outline: none;
                        }
                    }

                    span.error{
                        position: absolute;
                        bottom: -16px;
                        left: 2px;
                        color: orangered;
                        font-weight: 500;
                        font-size: 12px;
                    }
                }
            }

            .accept-text{
                display: flex;
                align-items: center;
                font-size: 14px;
                line-height: 19px;
                color: #838CA3;
                margin: 30px 0;
                position: relative;

                div{
                    margin-left: 6px;
                }
                a{
                    text-decoration: none;
                    color: #0046FE;
                }

                span.error{
                    position: absolute;
                    bottom: -20px;
                    left: 2px;
                    color: orangered;
                    font-weight: 500;
                    font-size: 12px;
                }
            }

            .auth-form-btn{
                width: fit-content;

                a{
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    width: 160px;
                    height: 60px;

                    background: #0046FE;
                    box-shadow: 0px 4.42136px 44.2136px rgba(0, 70, 254, 0.2);
                    border-radius: 10px;

                    font-weight: bold;
                    font-size: 18px;
                    letter-spacing: 0.2em;
                    text-transform: uppercase;
                    color: #FFFFFF;

                    text-decoration: none;

                    @media screen and (max-width: 660px) {
                        font-size: 14px;
                        width: 140px;
                        height: 50px;
                    }
                }

            }
        }
    }

    .loader {
        border: 6px solid #f3f3f3;
        border-radius: 50%;
        border-top: 6px solid #0046FE;
        width: 25px;
        height: 25px;
        -webkit-animation: spin 1.5s linear infinite; /* Safari */
        animation: spin 1.5s linear infinite;
    }
    /* Safari */
    @-webkit-keyframes spin {
        0% { -webkit-transform: rotate(0deg); }
        100% { -webkit-transform: rotate(360deg); }
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

</style>