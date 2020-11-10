<template>
    <div class="chat" v-show="chatToggle">
        <div class="chat__content">
            <template v-if=" ! isMessageSent">
                <div class="title">Message</div>
                <div class="input">
                    <div class="label">Name</div>
                    <input class="chat-input-field" v-model="postData.message.name" placeholder="Name"/>
                    <span v-if="errors.name" class="client-input-error">
                    {{errors.name}}
                </span>
                </div>
                <div class="input">
                    <div class="label">Email</div>
                    <input class="chat-input-field" v-model="postData.message.email" placeholder="Email"/>
                    <span v-if="errors.email" class="client-input-error">
                    {{errors.email}}
                </span>
                </div>
                <div class="input">
                    <div class="label">Message</div>
                    <textarea placeholder="Message" v-model="postData.message.body" class="message"></textarea>
                    <span v-if="errors.body" class="client-input-error">
                    {{errors.body}}
                </span>
                </div>
                <div class="button-section">
                    <div class="left">
                        <a href="javascript:void(0)" @click="sendMessage" class="send-button">
                            <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    focusable="false"
                                    width=".9em"
                                    height=".6em"
                                    style="
                -ms-transform: rotate(360deg);
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg);
                margin-right: 5px;
              "
                                    preserveAspectRatio="xMidYMid meet"
                                    viewBox="0 0 1792 1408"
                            >
                                <path
                                        d="M1792 454v794q0 66-47 113t-113 47H160q-66 0-113-47T0 1248V454q44 49 101 87q362 246 497 345q57 42 92.5 65.5t94.5 48t110 24.5h2q51 0 110-24.5t94.5-48T1194 886q170-123 498-345q57-39 100-87zm0-294q0 79-49 151t-122 123q-376 261-468 325q-10 7-42.5 30.5t-54 38t-52 32.5t-57.5 27t-50 9h-2q-23 0-50-9t-57.5-27t-52-32.5t-54-38T639 759q-91-64-262-182.5T172 434q-62-42-117-115.5T0 182q0-78 41.5-130T160 0h1472q65 0 112.5 47t47.5 113z"
                                        fill="#fff"
                                />
                            </svg>

                            Send message
                        </a>
                    </div>
                    <div class="right">
                        <a href="javascript:void(0)" class="close-button" @click.prevent="closeChat()">
                            Cancel
                        </a>
                    </div>
                </div>
            </template>
            <template v-else="isMessageSent">
                <div class="success-message">
                    Your message has been sent successfully!
                </div>
                <div class="message-cancel-btn">
                    <a href="javascript:void(0)" class="close-button" @click.prevent="closeChat()">
                        Close
                    </a>
                </div>
            </template>
        </div>

    </div>
</template>
<script>
    export default {
        props: ["chatToggle", "closeChat", "user"],
        data() {
            return {
                postData: {
                    message: {
                        name: '',
                        email: '',
                        body: ''
                    },
                    resumeURL: '',
                    receiver: {},
                },
                workforceReceiver:{
                    name: 'Civ.ie Admin',
                    email: 'conor@123workforce.com'
                },
                errors: {},
                isMessageSent: false
            }
        },
        methods: {
            sendMessage() {
                if (!this.validateInputs()) {
                    return;
                }

                this.postData.resumeURL = 'https://civ.ie/' + this.user.username + '/' + this.user.default_resume_link.url;
                this.setReceiver();

                // send message from public theme.
                axios.post('/resume/send-message', this.postData)
                    .then((response) => {
                        this.isMessageSent = true ;
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            },
            validateInputs() {
                let isValid = true;
                this.errors = {};

                if (this.postData.message.name.length < 2 || this.postData.message.name.length > 200) {
                    isValid = false;
                    this.errors.name = 'Name should be at least 2 characters';
                }
                if (this.postData.message.body.length < 12 || this.postData.message.body.length > 200) {
                    isValid = false;
                    this.errors.body = 'Message should be at least 12 characters';
                }
                if (!this.validateEmail(this.postData.message.email)) {
                    isValid = false;
                    this.errors.email = 'Email should be a valid format';
                }


                return isValid;

            },
            validateEmail(email) {
                const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                return re.test(String(email).toLowerCase());
            },
            setReceiver(){
                if(this.user.username === '123workforce'){
                    this.postData.receiver = this.workforceReceiver ;
                }

                this.postData.receiver = {
                  name: this.user.username,
                  email: this.user.email
                };
            }
        }
    };
</script>
<style lang="scss" scoped>
    @import "./../../scss/variables";

    .chat {
        height: 100vh;
        width: 100%;
        position: fixed;
        top: 0;
        left: 0;
        background-color: rgba(0, 0, 0, 0.6);
        z-index: 9999;

        &__content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 500px;
            height: auto;
            background: #f1f4ff;
            border-radius: 10px;
            padding: 2rem;

            @media screen and (max-width: 475px) {
                width: 95%;
                height: auto;
                background: #f1f4ff;
                border-radius: 10px;
            }

            .title {
                text-align: center;
                font-family: $muli;
                font-weight: bold;
                font-size: 29px;
                color: #172c7a;
            }

            .input {
                width: 100%;
                margin-bottom: 15px;

                .label {
                    font-family: "Muli-Regular", sans-serif;
                    color: #172c7a;
                    font-size: 14px;
                    /*padding-left: 15px;*/
                }

                .chat-input-field {
                    border-radius: 5px;
                    background-color: #fff;
                    padding: 10px;
                    width: 100%;
                }

                .message {
                    width: 100%;
                    height: 150px;
                    background-color: #ffff;
                    border-radius: 5px;
                    padding: 20px;
                }
            }

            .button-section {
                display: flex;
                width: 100%;
                justify-content: space-around;
                margin-top: 1rem;

                .left {
                    width: 45%;
                    float: left;
                    text-align: center;

                    .send-button {
                        height: 60px;
                        justify-content: center;
                        display: flex;
                        background-color: #3d5ed4;
                        border-radius: 5px;
                        text-align: center;
                        align-items: center;
                        color: #fff;
                        font-size: 16px;
                    }

                    a:hover {
                        color: #fff;
                        text-decoration: none;
                    }
                }

                .right {
                    width: 45%;
                    float: left;
                    text-align: center;

                    .close-button {
                        height: 60px;
                        text-align: center;
                        align-items: center;
                        justify-content: center;
                        display: flex;
                        background-color: #ffff;
                        border: 1px solid #3d5ed4;
                        color: #3d5ed4;
                        border-radius: 5px;
                        font-size: 16px;
                    }

                    a:hover {
                        color: #3d5ed4;
                        text-decoration: none;
                    }
                }
            }
        }
    }

    .client-input-error {
        color: red;
        font-size: 14px;
        font-weight: 500;
    }


    .success-message{
        display: flex;
        justify-content: center;
        color: lawngreen;
        font-size: 23px;
        font-weight: 600;
    }

    .message-cancel-btn{
        display: flex;
        justify-content: center;
        margin: 25px;
        background: #d4ddff;
        padding: 10px;
        border-radius: 25px;

        a{
            text-decoration: none;
            font-size: 18px;
            font-weight: 600;
            color: #3d5ed4;
            width: 100%;
            display: flex;
            justify-content: center;
        }
    }
</style>