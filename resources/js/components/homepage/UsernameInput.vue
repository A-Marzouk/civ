<template>
    <div class="username-input-wrapper">
        <div class="username-input-group">
            <div class="username-input-field">
                <span class="fixed-text">civ.ie <span>/</span></span>
                <input type="text" id="homepageInput" v-model="username" @blur="selfWritingText" @focus="removePlaceHolder">
                <span class="placeholderText">{{placeholderCurrentText}} <span class="blinking-curser"></span> </span>
                <img src="/images/homepage/correct_icon.png" alt="feedback icon" v-if="is_username_valid  && !isLoading">
                <img src="/images/homepage/wrong_icon.png" alt="feedback icon"   v-if="!is_username_valid && username !== '' && !isLoading">
                <div class="loader small" v-if="isLoading"></div>
                <div class="input-hint-text">
                    Choose your resume page address... its free and easy to start
                </div>
            </div>
            <div class="username-input-btn" >
                <a href="#" :class="{'correct-username' : is_username_valid}">
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
                timer: null,
                isLoading: false,
                typingTimer: '',
                doneTypingInterval: 800,
                isDisabled: false,
            }
        },
        methods:{
            validateUsername() {
                if(this.isLoading){
                    return;
                }

                this.isLoading = true ;

                console.log('request sent');
                axios
                    .post("/validate-username", { username: this.username })
                    .then(() => {
                        this.validUserName = this.username;
                        this.is_username_valid = true;
                        this.isLoading = false ;
                        console.log('Success');
                    })
                    .catch(() => {
                        this.validUserName = "";
                        this.is_username_valid = false;
                        this.isLoading = false ;
                        console.log('Error');
                    });
            },
            inputKeyUp(){
                clearTimeout(this.typingTimer);
                this.typingTimer = setTimeout(this.validateUsername, this.doneTypingInterval);
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

            let usernameInput = $('#homepageInput');

            usernameInput.on('input', () => {
               this.inputKeyUp();
            });

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
            // tablet:
            @media screen and (max-width: 1439px) and (min-width: 600px) {
                flex-direction: column;
            }

            // laptop:
            @media screen and (max-width: 1700px) and (min-width: 1440px) {


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
                @media screen and (max-width: 1439px) and (min-width: 600px) {



                }

                // laptop:
                @media screen and (max-width: 1700px) and (min-width: 1440px) {


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
                    @media screen and (max-width: 1439px) and (min-width: 600px) {



                    }

                    // laptop:
                    @media screen and (max-width: 1700px) and (min-width: 1440px) {


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
                    display: inline;
                    z-index: -1;
                    span.blinking-curser{
                        width: 1px;
                        height: 43px;
                        background: #14D627;
                        position: absolute;
                        margin-left: 2px;
                        opacity: 1;
                        animation: 1s linear 0s infinite normal none running blink;
                        display: inline;
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
                    @media screen and (max-width: 1439px) and (min-width: 600px) {



                    }

                    // laptop:
                    @media screen and (max-width: 1700px) and (min-width: 1440px) {


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
                    @media screen and (max-width: 1439px) and (min-width: 600px) {



                    }

                    // laptop:
                    @media screen and (max-width: 1700px) and (min-width: 1440px) {


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
                    @media screen and (max-width: 1439px) and (min-width: 600px) {



                    }

                    // laptop:
                    @media screen and (max-width: 1700px) and (min-width: 1440px) {


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
                    @media screen and (max-width: 1439px) and (min-width: 600px) {



                    }

                    // laptop:
                    @media screen and (max-width: 1700px) and (min-width: 1440px) {


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
                // tablet:
                @media screen and (max-width: 1439px) and (min-width: 600px) {
                    margin-left: -135px;
                    margin-top: 70px;
                }

                // laptop:
                @media screen and (max-width: 1700px) and (min-width: 1440px) {


                }
                a{
                    width: 320px;
                    height: 100px;

                    display: flex;
                    align-items: center;
                    justify-content: center;

                    background: #0046FE;

                    &.correct-username{
                        background: #14D627;

                        // mobile:
                        @media screen and (max-width: 599px) {

                        }
                        // tablet:
                        @media screen and (max-width: 1439px) and (min-width: 600px) {

                        }
                    }
                    border-radius: 10px;
                    font-family: NexaBold, sans-serif;
                    font-weight: bold;
                    font-size: 1.625rem;
                    color: #FFFFFF;
                    text-decoration: none;
                    transition: all 1s;

                    img{
                        margin-left: 14px;
                    }

                    // mobile:
                    @media screen and (max-width: 599px) {
                        width: 135px;
                        height: 42px;
                        font-size: 14px;
                        box-shadow: 0px 4px 15px rgba(0, 70, 254, 0.2);
                        img{
                            margin-left: 6px;
                            width: 18px;
                        }
                    }

                    // tablet:
                    @media screen and (max-width: 1439px) and (min-width: 600px) {
                        width: 285px;
                        height: 84px;
                        font-size: 24px;
                        box-shadow: 0px 4px 15px rgb(20 214 39 / 20%);
                        img{
                            margin-left: 12px;
                            width: 30px;
                        }
                    }

                    // laptop:
                    @media screen and (max-width: 1700px) and (min-width: 1440px) {


                    }
                }
            }
        }
    }

    .loader.small{
        position: absolute;
        top: 35px;
        right: 22px;
        border: 6px solid lightgrey;
        border-radius: 50%;
        border-top: 6px solid #0046FE;
        width: 25px;
        height: 25px;
        -webkit-animation: spin 1s linear infinite; /* Safari */
        animation: spin 1.5s linear infinite;
        @media screen and (max-width: 599px) {
            top: 19px;
            right: 12px;
            width: 15px;
            height: 15px;
        }
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