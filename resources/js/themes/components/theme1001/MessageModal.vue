<template>
    <div>
        <img class="message-icon" src="/images/themes/theme1001/message.png" alt="message icon"
             @click="openMessageModal">

        <div class="chatModal" id="chatModal" :class="{'opened' : messageModal}">
            <div class="chat-body">
                <template v-if="!isMessageSent">
                    <div class="content-wrapper">
                        <div class="title">Message</div>
                        <div class="input">
                            <input class="chat-input-field" v-model="postData.message.name" placeholder="Name"/>
                            <span v-if="errors.name" class="client-input-error">
            {{ errors.name }}
          </span>
                        </div>
                        <div class="input">
                            <input class="chat-input-field" v-model="postData.message.email" placeholder="Email"/>
                            <span v-if="errors.email" class="client-input-error">
            {{ errors.email }}
          </span>
                        </div>
                        <div class="input">
                            <textarea placeholder="Message" v-model="postData.message.body" class="message"></textarea>
                            <span v-if="errors.body" class="client-input-error">
            {{ errors.body }}
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
                                <a href="javascript:void(0)" class="close-button" @click.prevent="closeMessageModal">
                                    Cancel </a>
                            </div>
                        </div>
                    </div>
                </template>
                <template v-else>
                    <div class="success-message">Your message has been sent successfully!</div>
                    <div class="message-cancel-btn">
                        <a href="javascript:void(0)" class="close-button" @click.prevent="closeMessageModal">
                            Close </a>
                    </div>
                </template>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        props: ['user'],
        data() {
            return {
                messageModal: false,
                postData: {
                    message: {
                        name: '',
                        email: '',
                        body: ''
                    },
                    resumeURL: '',
                    receiver: {}
                },
                workforceReceiver: {
                    name: 'Civ.ie Admin',
                    email: 'conor@123workforce.com'
                },
                errors: {},
                isMessageSent: false
            };
        },
        methods: {
            sendMessage() {
                if (!this.validateInputs()) {
                    return;
                }

                this.postData.resumeURL = 'https://civ.ie/' + this.user.username + '/' + this.user.default_resume_link.url;
                this.setReceiver();

                // send message from public theme.
                axios
                    .post('/resume/send-message', this.postData)
                    .then(response => {
                        this.isMessageSent = true;
                    })
                    .catch(error => {
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
            setReceiver() {
                if (this.user.username === '123workforce') {
                    this.postData.receiver = this.workforceReceiver;
                }

                this.postData.receiver = {
                    name: this.user.username,
                    email: this.user.email
                };
            },
            openMessageModal(){
                this.messageModal = true;
                this.stopBodyScrolling();
            },
            closeMessageModal(){
                this.messageModal = false;
                this.startBodyScrolling();
            },
            stopBodyScrolling() {
                let body = $('body');
                body.addClass('stop-scrolling');
            },

            startBodyScrolling() {
                let body = $('body');
                body.removeClass('stop-scrolling')
            }
        }
    };
</script>
<style lang="scss" scoped>

    .chatModal {
        &.opened {
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.7);

            .chat-body {
                left: calc(50% - 750px / 2);
            }
        }

        transition: all 1s;

        .chat-body {
            font-family: Roboto, sans-serif;

            background: white;
            width: 750px;
            border-radius: 25px;
            position: absolute;
            left: -1650px;
            top: 150px;
            transition: all 1s;
            max-height: 100vh;
            overflow-y: auto;

            display: flex;
            flex-direction: column;
            align-items: center;

            .content-wrapper {
                width: 100%;
                display: flex;
                flex-direction: column;
                align-items: center;

                .title {
                    font-size: 24px;
                    color: #172C7A;
                    font-weight: bold;
                    font-family: Roboto, sans-serif;
                    margin-top: 36px;
                    margin-bottom: 40px;
                }

                .input {
                    width: 100%;
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    margin-bottom: 40px;

                    input, textarea {
                        width: 100%;
                        max-width: 450px;
                        height: 55px;
                        border-radius: 8px;
                        font-size: 18px;
                        background: #F1F4FF;
                        padding-left: 30px;
                        border: none;

                        &:focus {
                            outline: none;
                        }
                    }

                    textarea {
                        height: 150px;
                        padding-top: 15px;
                    }
                }

                .button-section {
                    display: flex;
                    align-items: center;
                    padding-bottom: 35px;

                    .left {
                        margin-right: 30px;

                        a {
                            color: white;
                            border-radius: 10px;
                            height: 60px;
                            width: 200px;
                            font-size: 18px;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            background: #3D5ED4;
                            text-decoration: none;
                        }
                    }

                    .right {
                        a {
                            color: #3D5ED4;
                            background: white;
                            border: 1.5px solid #3D5ED4;
                            border-radius: 10px;
                            height: 60px;
                            width: 200px;
                            font-size: 18px;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            text-decoration: none;
                        }
                    }
                }

                .client-input-error{
                    color: red;
                    font-size: 14px;
                    margin-top: 3px;
                    margin-left: 3px;
                    text-align: left;
                    width: 100%;
                    max-width: 480px;
                }

            }
        }

    }

    @media screen and (max-width: 400px){
        .chatModal {
            &.opened {
                .chat-body {
                    left: calc(50% - 300px / 2) !important;
                }
            }
            .chat-body {
                width: 300px !important;

                .button-section {
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    flex-direction: column;
                    flex-wrap: wrap;
                    padding-bottom: 30px;
                    .left {
                        margin-bottom: 30px;
                        margin-right: 0 !important;
                        a {
                            color: white;
                            border-radius: 10px;
                            height: 40px;
                            width: 150px;
                            border: 1.5px solid #3D5ED4;
                            font-size: 16px;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            background: #3D5ED4;
                            text-decoration: none;
                        }
                    }
                    .right {
                        a {
                            color: #3D5ED4;
                            background: white;
                            border: 1.5px solid #3D5ED4;
                            border-radius: 10px;
                            height: 40px;
                            width: 150px;
                            font-size: 16px;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            text-decoration: none;
                        }
                    }
                }
            }


        }
    }

    @media screen and (max-width: 599px) {
        .chatModal {
            &.opened {
                .chat-body {
                    left: calc(50% - 400px / 2);
                }
            }
            transition: all 1s;

            .chat-body {
                width: 400px;
                border-radius: 15px;
                position: absolute;
                left: -1650px;
                top: 50px;
                transition: all 1s;
                max-height: 100vh;
                .content-wrapper {
                    .title {
                        font-size: 20px;
                        margin-top: 20px;
                        margin-bottom: 20px;
                    }
                    .input {
                        width: 80%;
                        display: flex;
                        flex-direction: column;
                        align-items: center;
                        margin-bottom: 25px;
                        input, textarea {
                            width: 100%;
                            height: 45px;
                            border-radius: 8px;
                            font-size: 16px;
                            background: #F1F4FF;
                            padding-left: 15px;
                        }
                        textarea {
                            height: 120px;
                            padding-top: 10px;
                        }
                    }

                    .button-section {
                        display: flex;
                        align-items: center;
                        flex-wrap: wrap;
                        padding-bottom: 30px;

                        .left {
                            margin-right: 10px;

                            a {
                                color: white;
                                border-radius: 10px;
                                height: 40px;
                                width: 140px;
                                font-size: 14px;
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                background: #3D5ED4;
                                text-decoration: none;
                            }
                        }

                        .right {
                            a {
                                color: #3D5ED4;
                                background: white;
                                border: 1.5px solid #3D5ED4;
                                border-radius: 10px;
                                height: 40px;
                                width: 140px;
                                font-size: 14px;
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                text-decoration: none;
                            }
                        }
                    }

                    .client-input-error{
                        color: red;
                        font-size: 12px;
                        margin-top: 3px;
                        margin-left: 3px;
                        text-align: left;
                        width: 100%;
                        max-width: 480px;
                    }

                }
            }

        }
    }

</style>