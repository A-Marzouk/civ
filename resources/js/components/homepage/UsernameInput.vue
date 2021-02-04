<template>
    <div class="username-input-wrapper">
        <div class="username-input-group">
            <div class="username-input-field">
                <span class="fixed-text">civ.ie <span>/</span></span>
                <input type="text" v-model="username" @blur="selfWritingText" @focus="removePlaceHolder" @keyup="validateUsername">
                <span class="placeholderText">{{placeholderCurrentText}} <span class="blinking-curser"></span> </span>
                <img src="/images/homepage/correct_icon.png" alt="feedback icon" v-show="is_username_valid">
                <img src="/images/homepage/wrong_icon.png" alt="feedback icon"   v-show="!is_username_valid && is_username_valid !== null && username !== ''">
                <div class="input-hint-text">
                    Choose your resume page address... its free and easy to start
                </div>
            </div>
            <div class="username-input-btn">
                <a href="#">
                    Start My Page
                    <img src="/images/homepage/white_right_arrow.png" alt="right arrow">
                </a>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        name: "UsernameInput",
        data(){
            return{
                username: '',
                validUserName: "",
                is_username_valid: null,
                placeholderOriginalText: 'yournamehere',
                placeholderCurrentText: '',
                timer: null
            }
        },
        methods:{
            validateUsername() {
                axios
                    .post("/validate-username", { username: this.username })
                    .then(() => {
                        this.validUserName = this.username;
                        this.is_username_valid = true;
                    })
                    .catch(() => {
                        this.validUserName = "";
                        this.is_username_valid = false;
                    });
            },
            async selfWritingText() {
                this.placeholderCurrentText = '';

                if(this.username.length > 0){
                    return;
                }
                $('.placeholderText').css('opacity',1);

                let textAsArray = this.placeholderOriginalText.split("");

                for (let i = 0; i < textAsArray.length; i++) {
                    this.placeholderCurrentText += textAsArray[i];
                    await this.timer(100);
                }
            },
            removePlaceHolder(){
                this.placeholderCurrentText = '';
                $('.placeholderText').css('opacity',0);
            }
        },
        mounted() {
            this.timer = ms => new Promise(res => setTimeout(res, ms));
            this.selfWritingText();
        }
    }
</script>

<style lang="scss">

    .username-input-wrapper{
        width: 100%;
        display: flex;
        justify-content: center;

        .username-input-group{
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
            margin-left: 135px;
            width: 100%;
            // mobile:
            @media screen and (max-width: 599px) {
                margin-left: 0;
                width: 95%;
            }

            .username-input-field{
                position: relative;
                width: 100%;
                max-width: 685px;
                font-size: 34.8px;
                
                // mobile:
                @media screen and (max-width: 599px) {
                    font-size: 18px;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                }

                // tablet:
                @media screen and (max-width: 960px) and (min-width: 600px) {



                }

                // laptop:
                @media screen and (max-width: 1700px) and (min-width: 961px) {


                }
                span.fixed-text{
                    position: absolute;
                    font-family: NexaBold, sans-serif;
                    font-weight: bold;
                    font-size: 34.8px;
                    color: #0046FE;
                    top: 30px;
                    left: -110px;

                    span{
                        color: #000;
                    }

                    // mobile:
                    @media screen and (max-width: 599px) {
                        top: 21px;
                        left: 15px;
                        font-size: 18px;
                    }

                    // tablet:
                    @media screen and (max-width: 960px) and (min-width: 600px) {



                    }

                    // laptop:
                    @media screen and (max-width: 1700px) and (min-width: 961px) {


                    }
                }

                span.placeholderText{
                    position: absolute;
                    font-family: NexaBold, sans-serif;
                    font-weight: bold;
                    font-size: 34.8px;
                    color: rgb(196,196,196, 0.8);
                    top: 30px;
                    left: 0;
                    span.blinking-curser{
                        width: 1px;
                        height: 43px;
                        background: #14D627;
                        position: absolute;
                        margin-left: 2px;
                        opacity: 1;
                        animation: 1s linear 0s infinite normal none running blink;
                        // mobile:
                        @media screen and (max-width: 599px) {
                            height: 25px;
                        }

                    }

                    // mobile:
                    @media screen and (max-width: 599px) {
                        top: 20px;
                        left: 75px;
                        font-size: 18px;
                    }

                    // tablet:
                    @media screen and (max-width: 960px) and (min-width: 600px) {



                    }

                    // laptop:
                    @media screen and (max-width: 1700px) and (min-width: 961px) {


                    }

                    @keyframes blink {
                        0%{
                            opacity: 1;
                        }
                        49%{
                            opacity: 1;
                        }
                        50%{
                            opacity: 0;
                        }
                        99%{
                            opacity: 0;
                        }
                        100%{
                            opacity: 1;
                        }
                    }
                }

                input{
                    height: 100px;
                    width: 100%;
                    background: rgb(196,196,196, 0.13);
                    border-radius: 14.5px;
                    border: none;
                    padding-left: 135px;
                    margin-left: -135px;
                    font-family: NexaBold, sans-serif;
                    font-weight: bold;
                    font-size: inherit;
                    color: #14D627;
                    // mobile:
                    @media screen and (max-width: 599px) {
                        height: 60px;
                        padding-left: 75px;
                        margin-left: 0;
                        border-radius: 10px;
                    }

                    // tablet:
                    @media screen and (max-width: 960px) and (min-width: 600px) {



                    }

                    // laptop:
                    @media screen and (max-width: 1700px) and (min-width: 961px) {


                    }

                    &:focus{
                        outline: none;
                        span.placeholderText{
                            span.blinking-curser{
                                display: none;
                            }
                        }
                    }
                }

                img{
                    position: absolute;
                    top: 38px;
                    right: 25px;
                    // mobile:
                    @media screen and (max-width: 599px) {
                        top: 22px;
                        right: 15px;
                        width: 20px;
                    }

                    // tablet:
                    @media screen and (max-width: 960px) and (min-width: 600px) {



                    }

                    // laptop:
                    @media screen and (max-width: 1700px) and (min-width: 961px) {


                    }
                }

                .input-hint-text{
                    position: absolute;
                    font-family: NexaLight, sans-serif;
                    font-weight: 300;
                    font-size: 1.125rem;
                    line-height: 50px;
                    color: #0A1E56;
                    left: -110px;
                    // mobile:
                    @media screen and (max-width: 599px) {
                        font-size: 10px;
                        line-height: 50px;
                        left: 8px;
                        top: 50px;
                    }

                    // tablet:
                    @media screen and (max-width: 960px) and (min-width: 600px) {



                    }

                    // laptop:
                    @media screen and (max-width: 1700px) and (min-width: 961px) {


                    }
                }
            }

            .username-input-btn{
                margin-left: 25px;
                // mobile:
                @media screen and (max-width: 599px) {
                    margin-left: 0;
                    margin-top: 45px;
                }
                a{
                    width: 320px;
                    height: 100px;

                    display: flex;
                    align-items: center;
                    justify-content: center;

                    background: #14D627;
                    box-shadow: 0px 4px 40px rgba(20, 214, 39, 0.2);
                    border-radius: 10px;

                    font-family: NexaBold, sans-serif;
                    font-weight: bold;
                    font-size: 1.625rem;
                    color: #FFFFFF;
                    text-decoration: none;

                    img{
                        margin-left: 14px;
                    }

                    // mobile:
                    @media screen and (max-width: 599px) {
                        width: 135px;
                        height: 42px;
                        font-size: 14px;
                        box-shadow: 0px 4px 15px rgb(20 214 39 / 20%);
                        img{
                            margin-left: 6px;
                            width: 18px;
                        }
                    }

                    // tablet:
                    @media screen and (max-width: 960px) and (min-width: 600px) {



                    }

                    // laptop:
                    @media screen and (max-width: 1700px) and (min-width: 961px) {


                    }
                }
            }
        }
    }
</style>