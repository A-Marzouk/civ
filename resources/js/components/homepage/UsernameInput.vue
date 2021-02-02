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

        .username-input-group{
            display: flex;
            align-items: center;
            justify-content: center;
            margin-left: 135px;
            width: 100%;


            .username-input-field{
                position: relative;
                width: 100%;
                max-width: 685px;

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
                    font-size: 34.8px;
                    color: #14D627;

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
                }

                .input-hint-text{
                    position: absolute;
                    font-family: NexaLight, sans-serif;
                    font-weight: 300;
                    font-size: 18px;
                    line-height: 50px;
                    color: #0A1E56;
                    left: -110px;
                }

            }

            .username-input-btn{
                margin-left: 25px;

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
                    font-size: 26px;
                    color: #FFFFFF;
                    text-decoration: none;

                    img{
                        margin-left: 14px;
                    }
                }
            }
        }
    }
</style>