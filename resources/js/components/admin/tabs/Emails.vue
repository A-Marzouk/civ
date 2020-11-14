<template>
    <div class="container">

        <h1>
            Sender email:
        </h1>

        <div class="d-flex mt-2 mb-4" style="align-items: center;">
            <input style="height: 50px; border-radius: 5px;" type="text" v-model="email.sender"> @civ.ie
        </div>

        <div class="emails-list">
            <h1>Send to:</h1>

            <div class="add-receiver">
                <div class="mail-inputs" v-show="addReceiverOpened">
                    <div class="mail-input-group">
                        <label>Receiver's name</label>
                        <input type="text" v-model="newReceiver.name" required placeholder="john doe">
                        <span v-if="errors.name" class="rec-error">
                            {{errors.name}}
                        </span>
                    </div>
                    <div class="mail-input-group">
                        <label>Receiver's email</label>
                        <input type="email" v-model="newReceiver.email" placeholder="john@doe.com">
                        <span v-if="errors.email" class="rec-error">
                            {{errors.email}}
                        </span>
                    </div>
                </div>

                <div class="my-btn-primary" v-show="addReceiverOpened">
                    <a href="javascript:void(0)" @click="addReceiver">Add</a>
                </div>

                <div class="my-btn-primary" v-show="!addReceiverOpened">
                    <a href="javascript:void(0)" @click="addReceiverOpened= true"> Add receiver + </a>
                </div>

                <div class="receivers-list">
                    <div class="email-chip" v-for="receiver in email.receivers" :key="receiver.email">
                        {{receiver.name}} ({{receiver.email}})
                    </div>
                </div>

            </div>

        </div>

        <div class="email-data">
            <h1>Email data</h1>

            <div class="mail-inputs">
                <div class="mail-input-group mb-4">
                    <label>Subject</label>
                    <input type="text" v-model="email.subject" placeholder="Job application | From civ">
                    <span v-if="errors.subject" class="rec-error">
                        {{errors.subject}}
                    </span>
                </div>

                <hr>

                <div class="mail-input-group">
                    <label>Header</label>
                    <input type="text" v-model="email.data.header" placeholder="Hello!">
                    <span v-if="errors.header" class="rec-error">
                    {{errors.header}}
                </span>
                </div>
                <div class="mail-input-group">
                    <label>Body</label>
                    <textarea name="body" v-model="email.data.body" rows="4"></textarea>
                    <span v-if="errors.body" class="rec-error">
                    {{errors.body}}
                </span>
                </div>
                <div class="mail-input-group">
                    <label>Action button text</label>
                    <input type="text" v-model="email.data.actionText" placeholder="View profile">
                    <span v-if="errors.actionText" class="rec-error">
                    {{errors.actionText}}
                </span>
                </div>
                <div class="mail-input-group">
                    <label>Action button URL</label>
                    <input type="url" v-model="email.data.actionURL" placeholder="https://civ.ie/profile">
                    <span v-if="errors.actionURL" class="rec-error">
                    {{errors.actionURL}}
                </span>
                </div>
                <div class="mail-input-group">
                    <label>Footer</label>
                    <input type="text" v-model="email.data.footer" placeholder="civ.ie Freelancer">
                    <span v-if="errors.footer" class="rec-error">
                    {{errors.footer}}
                </span>
                </div>
            </div>

        </div>


        <div class="email-review">
            <h1 class="mb-3">Email preview</h1>
            <vue-friendly-iframe :src=" baseUrl() + `workforce-admin/mail/preview?${encodeQueryData()}` "  @load="onLoad" class="vue-iframe"></vue-friendly-iframe>
        </div>

        <div class="my-btn-primary">
            <a href="javascript:void(0)" @click="sendMail">Send email</a>
        </div>

        <div v-if="errors.receivers" class="rec-error mt-2">
            {{errors.receivers}}
        </div>

        <div v-if="errors.sender" class="rec-error mt-2">
            {{errors.sender}}
        </div>

    </div>
</template>

<script>
    export default {
        name: "Emails",
        data() {
            return {
                email: {
                    sender:'',
                    data: {
                        header: '',
                        body: '',
                        actionText: '',
                        actionURL: '',
                        footer: ''
                    },
                    subject: '',
                    receivers: []
                },
                newReceiver: {
                    name: '',
                    email: ''
                },
                errors: {},
                addReceiverOpened: false
            }
        },
        methods: {
            encodeQueryData() {
                const ret = [];
                for (let d in this.email.data)
                    ret.push(encodeURIComponent(d) + '=' + encodeURIComponent(this.email.data[d]));
                return ret.join('&');
            },
            baseUrl() {
                let getUrl = window.location;
                return getUrl.protocol + "//" + getUrl.host + "/";
            },
            onLoad(){
                console.log('Loaded.')
            },
            sendMail() {
                if (this.validateEmailData() && this.receiversExist()) {
                    axios.post('/workforce-admin/send-mail', this.email)
                        .then(() => {
                            alert('Email sent successfully!');
                            this.resetEmailData();
                        })
                        .catch((error) => {
                            console.log(error);
                        });
                }
            },
            addReceiver() {
                if (this.validateReceiver()) {
                    this.email.receivers.push(this.newReceiver);
                    this.resetReceiver();
                }
            },
            validateReceiver() {
                this.errors = {};
                let valid = true;

                if (this.newReceiver.name.length < 2) {
                    valid = false;
                    this.errors.name = 'Name should be at least 2 characters';

                }
                if (!this.validateEmail(this.newReceiver.email)) {
                    valid = false;
                    this.errors.email = 'Email should be a valid format';
                }

                return valid;
            },
            validateEmail(email) {
                const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                return re.test(String(email).toLowerCase());
            },
            isValidURL(string) {
                let res = string.match(/(http(s)?:\/\/.)?(www\.)?[-a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_\+.~#?&//=]*)/g);
                return (res !== null)
            },
            resetReceiver() {
                this.addReceiverOpened = false;
                this.newReceiver = {
                    name: '',
                    email: ''
                }
            },
            resetEmailData() {
                this.email = {
                    data: {
                        header: '',
                        body: '',
                        actionText: '',
                        actionURL: '',
                        footer: ''
                    },
                    subject: ''
                };
            },

            validateEmailData() {
                this.errors = {};
                let valid = true;

                if (this.email.data.header < 10) {
                    valid = false;
                    this.errors.header = 'Name should be at least 10 characters';
                }

                if (this.email.subject < 10) {
                    valid = false;
                    this.errors.subject = 'Subject should be at least 10 characters';
                }

                if (this.email.data.body < 40) {
                    valid = false;
                    this.errors.body = 'Body should be at least 40 characters';
                }

                if (this.email.data.actionText < 4) {
                    valid = false;
                    this.errors.actionText = 'action text should be at least 4 characters';
                }

                if (this.email.data.footer < 10) {
                    valid = false;
                    this.errors.footer = 'action text should be at least 10 characters';
                }

                if (!this.isValidURL(this.email.data.actionURL)) {
                    valid = false;
                    this.errors.actionURL = 'URL should be a valid format';
                }

                if (!this.validateEmail(this.email.sender + '@civ.ie')) {
                    valid = false;
                    this.errors.sender = 'Sender email should be a valid format';
                }

                return valid;
            },
            receiversExist() {
                if (this.email.receivers.length > 0) {
                    return true;
                }

                this.errors.receivers = 'You should have at least one receiver for the email.';
                return false;
            }
        }
    }
</script>

<style lang="scss" scoped>
    h1 {
        font-size: 24px;
        font-weight: 600;
    }

    input, textarea {
        border-radius: 5px;
        border: solid 1px lightgray;
        padding-left: 15px;
    }

    textarea{
        padding-top:10px;
    }

    .emails-list {


        .add-receiver {
            a {
                &:hover {
                    text-decoration: none;
                }
            }
        }
    }


    .email-data {
        margin-top: 30px;
    }

    .email-review {
        margin-top: 30px;
    }

    .mail-inputs {

        .mail-input-group {
            display: flex;
            flex-direction: column;
            margin-top: 15px;

            label {
                font-size: 18px;
                color: #676B8B;
                margin-left: 3px;
                margin-bottom: 3px;
            }

            input {
                width: 100%;
                height: 50px;
                border: 1px solid #E6E8FC;
                color: #676B8B;
                padding-left: 20px;
                border-radius: 10px;

                &:focus {
                    outline: none;
                }
            }
        }
    }

    .receivers-list {
        display: flex;
        margin-left: -5px;
        margin-top: 25px;

        .email-chip {
            background: lightblue;
            color: white;
            border-radius: 10px;
            padding: 15px;
            margin: 5px;
            font-size: 16px;
            font-weight: 500;
        }
    }

    .rec-error {
        color: red;
        padding-left: 3px;
        font-size: 13px;
        font-weight: 500;
    }

    .my-btn-primary {
        margin-top: 25px;
        display: flex;

        a {
            width: 150px;
            height: 40px;
            display: flex;
            color: #1B33F2;
            border-radius: 5px;
            align-items: center;
            justify-content: center;
            border: 1px solid #1B33F2;
        }

    }

</style>

<style lang="scss">
    /* I frame styling */
    .vue-friendly-iframe{
        iframe{
            width:100%;
            min-height:605px;
        }
    }
</style>