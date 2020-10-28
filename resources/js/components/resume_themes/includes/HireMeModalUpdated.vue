<template>
    <div data-app>
        <!-- dialog -->
        <v-dialog
                v-model="isModalOpened"
                max-width="772"
                style="box-shadow: 0px 0px 130px rgba(0, 16, 133, 0.07);border-radius: 10px; z-index:1000; overflow-y:hidden;"
        >
            <div class="hire-main-wrapper" v-if="user">
                <div class="steps-wrapper">
                    <div class="single-step-wrapper one" v-if="isStepActive(1)">
                        <template v-if="paymentMethods.length > 0">
                            <div class="step-header">
                                Choose Payment Method

                                <img src="/icons/hire-modal/close.svg" alt="close btn" class="close-modal"
                                     @click="closeModal">
                            </div>
                            <div class="step-content">

                                <template v-if="paymentMethods.length > 0">
                                    <div class="payment-methods-wrapper">
                                        <template v-for="paymentMethod in paymentMethods">
                                            <div v-show="paymentMethod.name === 'Stripe' " class="payment-method"
                                                 @click="currentPaymentMethod = 'stripe'"
                                                 :class="{active : currentPaymentMethod === 'stripe'}">
                                                <img src="/icons/hire-modal/stripe-logo.svg" alt="stripe icon">
                                            </div>
                                            <div v-show="paymentMethod.name === 'PayPal' " class="payment-method"
                                                 @click="currentPaymentMethod = 'paypal'"
                                                 :class="{active : currentPaymentMethod === 'paypal'}">
                                                <img src="/icons/hire-modal/paypal-logo.svg" alt="paypal icon">
                                            </div>
                                        </template>
                                    </div>

                                    <div class="step-footer" style="justify-content: flex-end">

                                        <div class="action-btn">
                                            <a href="javascript:void(0)" @click="goToNextStep">
                                                Confirm
                                                <img src="/icons/hire-modal/white-arrow.svg" alt="arrow right">
                                            </a>
                                        </div>
                                    </div>
                                </template>
                            </div>
                        </template>

                        <div v-else class="no-payment-methods">
                            <img src="/icons/hire-modal/close.svg" alt="close btn" class="close-modal"
                                 @click="closeModal">

                            <div class="message" :class="{'full-height' : !isContactFormOpened && !isMessageSent}">
                                <div class="text">
                                    Current user has no payment<br/>methods set up
                                    <img src="/icons/hire-modal/sad-emoj.svg" alt="sad icon"> .
                                </div>
                                <div class="hire-modal-footer">
                                    <div class="action-btn contact">
                                        <a href="javascript:void(0)" @click="showContactForm">
                                            Contact Freelancer
                                            <img src="/icons/hire-modal/arrow-up.svg" alt="arrow right">
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="contact-form" :class="{'full-height' : isContactFormOpened}">
                                <div class="contact-form-header">
                                    <div class="text">
                                        Message
                                    </div>
                                    <div class="avatar">
                                        Send to <img :src="user.personal_info.profile_pic" alt="user avatar">
                                    </div>
                                </div>
                                <div class="input-row">
                                    <textarea v-model="messageBody">
                                    </textarea>
                                </div>
                                <div class="send-btn">
                                    <a href="javascript:void(0)" @click="sendMessage">
                                        Send <img src="/icons/hire-modal/arrow-up.svg" alt="arrow">
                                    </a>
                                </div>
                            </div>

                            <div class="success-message"
                                 :class="{'full-height' : !isContactFormOpened && isMessageSent}">
                                <div class="message-content">
                                    <img src="/icons/hire-modal/verified.svg" alt="verified icon">
                                    <div class="text">
                                        Successfully Sent!
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="single-step-wrapper two" v-if="isStepActive(2)">
                        <div class="step-header">
                            <div class="back" @click="goToPreviousStep">
                                <img src="/icons/hire-modal/back.svg" alt="back icon"
                                     v-show="isStepActive(2)">
                            </div>


                            Payment Type

                            <img src="/icons/hire-modal/close.svg" alt="close btn" class="close-modal"
                                 @click="closeModal">

                        </div>
                        <div class="step-content">

                            <!-- Payment type -->
                            <div class="payment-types">
                                <div class="single-payment-type" :class="{'active' : isPaymentTypeActive('hourly')}"
                                     @click="setPaymentType('hourly')">
                                    Hourly
                                </div>
                                <div class="single-payment-type" :class="{'active' : isPaymentTypeActive('weekly')}"
                                     @click="setPaymentType('weekly')">
                                    Weekly
                                </div>
                                <div class="single-payment-type" :class="{'active' : isPaymentTypeActive('monthly')}"
                                     @click="setPaymentType('monthly')">
                                    Monthly
                                </div>
                            </div>

                            <!-- if recurring payment -->
                            <div class="interval-input"
                                 v-if="currentPaymentType === 'weekly' || currentPaymentType === 'monthly' ">
                                <input type="number" :placeholder="'Number of ' + typeOfRecurringInterval + 's'" min="2"
                                       max="12" v-model="iterations">
                            </div>


                            <div class="select-hours" :class="{'full-height' : currentPaymentType !== '' }">
                                <div class="percentage-select">
                                    <div class="label">
                                        {{getHoursLabel()}}
                                    </div>

                                    <div class="percentage-input-wrapper">
                                        <span class="max" v-show="currentSelectedHours < 40">50</span>
                                        <span class="current" :style="{right: currentHoursPosition + '%'}">{{currentSelectedHours}}</span>
                                        <input type="range" class="range" min="0" max="50" step="1"
                                               v-model="currentSelectedHours"
                                               style="width: 100%;">
                                    </div>
                                </div>
                                <div class="payment-details">
                                    {{currentSelectedHours}} hours x {{userHourlyRate}} Hourly rate x Percentage
                                    {{percentage}}% = {{Math.round(currentPaymentAmount)}}
                                </div>

                                <div class="percentage-select">
                                    <div class="label">
                                        Percentage
                                    </div>

                                    <div class="percentage-input-wrapper">
                                        <span class="max" v-show="percentage < 90">100%</span>
                                        <span class="current"
                                              :style="{right: currentPosition + '%'}">{{percentage}}%</span>
                                        <input type="range" class="range" min="0" max="100" step="10"
                                               v-model="percentage"
                                               style="width: 100%;">
                                    </div>
                                </div>
                            </div>

                            <div class="step-footer">

                                <div class="total-payment">
                                    ${{Math.round(currentPaymentAmount)}}
                                </div>

                                <div class="action-btn" v-if="currentPaymentType !== '' ">
                                    <a href="javascript:void(0)" @click="goToNextStep">
                                        Confirm
                                        <img src="/icons/hire-modal/white-arrow.svg" alt="arrow right">
                                    </a>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="single-step-wrapper three" v-if="isStepActive(3)">
                        <div class="step-header">
                            <div class="back" @click="goToPreviousStep">
                                <img src="/icons/hire-modal/back.svg" alt="back icon"
                                     v-show="isStepActive(3)">
                            </div>
                            Total Payment

                            <img src="/icons/hire-modal/close.svg" alt="close btn" class="close-modal"
                                 @click="closeModal">

                        </div>
                        <div class="step-content" v-show="isStepActive(3)">


                            <div style="width: 100%; border-bottom: 1px solid lightgray; padding-bottom: 25px; margin-bottom:25px;">
                                <div class="step-header sub">
                                    Your current payment will be
                                </div>
                                <div class="d-flex justify-content-start" style="width: 100%">
                                    <div class="total-payment">
                                        ${{Math.round(currentPaymentAmount)}}
                                    </div>
                                </div>
                            </div>


                            <template v-if="percentage < 100">
                                <div class="step-header sub">
                                    Auto pay balance of (${{Math.round(totalPaymentAmount - currentPaymentAmount)}})
                                </div>
                                <div class="payment-types">
                                    <div class="single-payment-type sub"
                                         :class="{'active-blue' : isAutoPaymentTypeActive('7-days')}"
                                         @click="setAutoPaymentType('7-days')">
                                        7 Days
                                    </div>
                                    <div class="single-payment-type sub"
                                         v-if="currentPaymentType === 'monthly' "
                                         :class="{'active-blue' : isAutoPaymentTypeActive('14-days')}"
                                         @click="setAutoPaymentType('14-days')">
                                        14 Days
                                    </div>
                                    <div class="single-payment-type sub date"
                                         :class="{'active-blue': isAutoPaymentTypeActive('custom-date')}"
                                         @click="pickDateSelected">
                                    <span v-if="isDateChanged">
                                        {{datePicker}}
                                    </span>

                                        <template v-else>
                                            <img src="/icons/hire-modal/date.svg" alt="date">
                                            Pick a date
                                        </template>
                                    </div>

                                    <div class="date-picker" v-show="isDatePickerOpened">
                                        <v-date-picker full-width v-model="datePicker" :show-current="false"
                                                       :min="currentDate"
                                                       :max="futureDate" color="green lighten-1" header-color="primary"
                                                       @change="dateChanged"></v-date-picker>
                                    </div>
                                </div>
                            </template>


                            <div class="step-footer" style="justify-content: flex-end;">
                                <div class="action-btn">
                                    <a href="javascript:void(0)" @click="goToNextStep">
                                        Confirm
                                        <img src="/icons/hire-modal/white-arrow.svg" alt="arrow right">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="single-step-wrapper three" v-if="isStepActive(4)">
                        <div class="step-header">
                            <div class="back" @click="goToPreviousStep">
                                <img src="/icons/hire-modal/back.svg" alt="back icon"
                                     v-show="isStepActive(4)">
                            </div>
                            Required Information

                            <img src="/icons/hire-modal/close.svg" alt="close btn" class="close-modal"
                                 @click="closeModal">
                        </div>
                        <div class="step-content" v-show="isStepActive(4)">
                            <div class="client-inputs" style="width: 100%; padding-bottom: 25px; margin-bottom:25px;">
                                <div class="client-input-group">
                                    <label>Name</label>
                                    <input type="text" placeholder="John Doe" v-model="client.name" required>
                                    <span v-if="errors.name" class="error">
                                        {{errors.name}}
                                    </span>
                                </div>
                                <div class="client-input-group">
                                    <label>Email</label>
                                    <input type="email" placeholder="John@Doe.com" v-model="client.email" required>
                                    <span v-if="errors.email" class="error">
                                        {{errors.email}}
                                    </span>
                                </div>
                                <div class="client-input-group">
                                    <label>Phone Number</label>
                                    <input type="tel" placeholder="+123 00 0000 000" v-model="client.phone" required>
                                    <span v-if="errors.phone" class="error">
                                        {{errors.phone}}
                                    </span>
                                </div>
                            </div>
                            <div class="step-footer" style="justify-content: center;">
                                <div class="action-btn">
                                    <a href="javascript:void(0)" @click="pay">
                                        Pay Now
                                        <img src="/icons/hire-modal/white-arrow.svg" alt="arrow right">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </v-dialog>
        <!-- dialog -->
    </div>
</template>

<script>
    import moment from 'moment'

    export default {
        name: "HireMeModalUpdated.vue",
        props: {
            hireMeModal: {
                type: Boolean,
            },
            closeHireMeModal: {
                type: Function,
            },
            user: {
                type: undefined
            }
        },
        data() {
            return {
                isModalOpened: true,
                currentStep: 1,
                iterations: '',
                typeOfRecurringInterval: 'week',
                currentPaymentMethod: 'paypal',
                currentPaymentType: '',
                currentAutoPaymentType: '7-days',
                currentHoursType: 'week',
                // payment calculations:
                userHourlyRate: 10,
                percentage: 100,
                currentSelectedHours: 25,
                finishedSteps: [],
                datePicker: this.currentDate,
                isDatePickerOpened: false,
                isDateChanged: false,
                isContactFormOpened: false,
                isMessageSent: false,
                client: {
                    email: '',
                    name: '',
                    phone: '',
                },
                paymentData: {},
                errors: {},
                messageBody: 'Hi, can you please setup your payment details to start working with you.'
            }
        },
        watch: {
            hireMeModal: function (value) {
                this.isModalOpened = value;
            },
            isModalOpened: function (value) {
                if (!value) {
                    this.$emit('modalClosed');
                }
            },
            currentPaymentType: function (value) {
                this.typeOfRecurringInterval = value.replace('ly', '');
            }
        },
        methods: {
            showContactForm() {
                this.isContactFormOpened = true;
            },
            sendMessage() {
                this.isContactFormOpened = false;
                this.isMessageSent = true;
            },
            dateChanged() {
                // close the date picker
                this.isDatePickerOpened = false;
                this.isDateChanged = true;
            },
            getHoursLabel() {
                if (this.currentPaymentType === 'weekly') {
                    return 'Weekly';

                }
                if (this.currentPaymentType === 'monthly') {
                    return 'Monthly';
                }
                return 'Hours';
            },
            goToNextStep() {
                if (this.currentPaymentType === '') {
                    this.currentPaymentType = 'hourly';
                }
                if (this.currentStep > 4) {
                    return;
                }
                this.finishedSteps.push(this.currentStep);
                this.currentStep++;
            },
            goToPreviousStep() {
                if (this.currentStep < 2) {
                    return;
                }
                this.currentStep--;
            },
            isStepActive(step) {
                return step === this.currentStep;
            },
            isStepDone(step) {
                return this.finishedSteps.includes(step);
            },

            // step 2
            setPaymentType(payment_type) {
                this.currentPaymentType = payment_type;
            },
            isPaymentTypeActive(payment_type) {
                return this.currentPaymentType === payment_type;
            },
            // step 3-
            setAutoPaymentType(payment_type) {
                this.currentAutoPaymentType = payment_type;
            },
            isAutoPaymentTypeActive(payment_type) {
                return this.currentAutoPaymentType === payment_type;
            },
            pickDateSelected() {
                this.currentAutoPaymentType = 'custom-date';
                this.isDatePickerOpened = true;
            },

            // step 3
            subtractHours() {
                if (this.currentSelectedHours < 10) {
                    return;
                }
                this.currentSelectedHours -= 5;

            },
            addHours() {
                if (this.currentSelectedHours > 1000) {
                    return;
                }
                this.currentSelectedHours += 5;

            },
            isHoursTypeActive(hours_type) {
                return this.currentHoursType === hours_type;
            },
            setHoursType(hours_type) {
                this.currentHoursType = hours_type;
            },
            reset() {
                this.currentStep = 1;
                this.finishedSteps = [];
                this.currentSelectedHours = 40;
                this.closeModal();
            },
            pay() {
                if (this.validateInputs()) {
                    this.paymentData = {
                        client: this.client,
                        freelancer: this.user,
                        payment_info: {
                            numberOfHours: this.currentSelectedHours,
                            totalAmount: this.totalPaymentAmount,
                            percentage: this.percentage,
                            toPayNowAmount: this.currentPaymentAmount,
                            toPayLaterAmount: this.totalPaymentAmount - this.currentPaymentAmount,
                            toPayLaterDate: this.payLaterDate,
                            iterations: this.iterations,
                            isRecurring: this.currentPaymentType === 'weekly' || this.currentPaymentType === 'monthly',
                            interval: this.currentPaymentType === 'weekly' ? 'week' : 'month',
                        }
                    };

                    axios.post('/custom-stripe-payment', this.paymentData)
                        .then( (response) => {
                            let session_id = response.data ;
                            window.location = '/subscription?session_id=' + session_id ;
                        })
                        .catch( (error) => {
                            console.log(error)
                        });
                }


            },
            validateInputs() {
                let isValid = true;
                this.errors = {};

                if (this.client.name.length < 2 || this.client.name.length > 200) {
                    isValid = false;
                    this.errors.name = 'Name should be at least 2 characters';
                }
                if (!this.validateEmail(this.client.email)) {
                    isValid = false;
                    this.errors.email = 'Email should be a valid format';
                }

                if (!this.validatePhone(this.client.phone)) {
                    isValid = false;
                    this.errors.phone = 'Phone should be a valid format';
                }

                return isValid;

            },
            validateEmail(email) {
                const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                return re.test(String(email).toLowerCase());
            },

            validatePhone(phone) {
                const re = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;
                return re.test(String(phone));
            },
            closeModal() {
                this.hireMeModal = false;
            },

            // step4
            getPayLink() {
                let paymentMethod = this.user.payment_methods.find(
                    i => i.name.toLowerCase() === this.currentPaymentMethod.toLowerCase()
                );
                if (paymentMethod) {
                    return paymentMethod.link;
                }
                return '#';
            },
            moment: function () {
                return moment();
            },


        },
        computed: {
            currentPaymentAmount() {
                return this.user.payment_info[0].salary * this.percentage / 100 * this.currentSelectedHours;
            },
            totalPaymentAmount() {
                return this.user.payment_info[0].salary * this.currentSelectedHours;
            },
            payLaterDate() {
                if (this.currentAutoPaymentType === '7-days') {
                    return moment().add(7, 'days').format('YYYY-MM-DD');
                } else if (this.currentAutoPaymentType === '14-days') {
                    return moment().add(14, 'days').format('YYYY-MM-DD');
                }

                return this.datePicker;
            },
            currentPosition() {
                return (100 - this.percentage - 10);
            },
            currentHoursPosition() {
                return (100 - this.currentSelectedHours * 2 - 10);
            },
            paymentMethods() {
                return this.user.payment_methods;
            },
            currentDate() {
                return moment().add(1, 'days').format('YYYY-MM-DD');
            },
            futureDate() {
                if (this.currentPaymentType === 'monthly') {
                    return moment().add(31, 'days').format('YYYY-MM-DD');
                }
                return moment().add(7, 'days').format('YYYY-MM-DD');
            }

        }
    }
</script>

<style scoped lang="scss">
    @import "../../../../sass/media-queries";

    .error {
        font-size: 15px;
        margin-left: 4px;
    }

    .range {
        &:focus {
            border: none;
        }
    }

    .hire-main-wrapper {
        height: fit-content;
        background: white;
        border-radius: 25px;
        padding: 65px;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        position: relative;

        @include lt-sm {
            padding: 40px 20px 20px 20px;
        }

        .steps-wrapper {
            width: 100%;

            .single-step-wrapper {
                display: flex;
                flex-direction: column;
                align-items: center;
                transition: height 1s;

                .step-header {
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    width: 100%;
                    font-family: Poppins, sans-serif;
                    font-size: 36px;
                    letter-spacing: 0;
                    color: #5C6291;
                    margin-bottom: 60px;

                    &.sub {
                        font-size: 28px;
                        margin-bottom: 25px;

                        @include lt-sm {
                            font-size: 20px;
                        }
                    }

                    @include lt-sm {
                        font-size: 20px;
                    }

                    position: relative;

                    img {
                        box-shadow: 0px 13px 16px #0000000A;
                        border-radius: 50%;

                        &:hover {
                            cursor: pointer;
                        }
                    }

                    .back {
                        width: 55px;
                        height: 55px;
                        box-shadow: 0px 13px 16px #0000000A;
                        border-radius: 50%;
                        position: relative;

                        &:hover {
                            cursor: pointer;
                        }

                        img {
                            position: absolute;
                            top: 0;
                            bottom: 0;
                            left: 0;
                            right: 0;
                            margin: auto;
                        }
                    }

                }

                .step-content {
                    width: 100%;
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    justify-content: center;

                    .client-inputs {

                        .client-input-group {
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

                    .step-footer {

                        display: flex;
                        justify-content: space-between;
                        align-items: center;
                        width: 100%;
                        margin-top: 80px;


                        .total-payment {
                            width: 222px;
                            height: 75px;
                            border: 2px solid #E6E8FC;
                            border-radius: 5px;
                            @include lt-sm {
                                width: 125px;
                                height: 50px;
                            }
                            display: flex;
                            align-items: center;
                            justify-content: center;

                            color: #001CE2;
                            font-size: 26px;
                            font-weight: 600;
                        }

                        .action-btn {
                            a {
                                width: 222px;
                                height: 75px;
                                display: flex;
                                align-items: center;
                                background: #001CE2;
                                border-radius: 5px;
                                justify-content: center;
                                color: white;
                                font-size: 26px;
                                line-height: 25px;

                                &.contact {
                                    width: 320px;
                                }

                                img {
                                    margin-left: 25px;
                                    margin-top: 5px;
                                }

                                &:hover {
                                    text-decoration: none;
                                }

                                @include lt-sm {
                                    width: 125px;
                                    height: 50px;
                                    font-size: 21px;

                                    img {
                                        margin-left: 10px;
                                        width: 22px;
                                    }
                                }
                            }
                        }
                    }

                }

                .payment-methods-wrapper {
                    display: flex;
                    flex-wrap: wrap;
                    justify-content: center;

                    .payment-method {
                        width: 196px;
                        height: 109px;
                        margin-right: 12.5px;
                        margin-left: 12.5px;
                        border: 1px solid #70707046;
                        border-radius: 7px;
                        display: flex;
                        align-items: center;
                        justify-content: center;

                        @include lt-sm {
                            margin-bottom: 20px;
                        }

                        &:hover {
                            cursor: pointer;
                        }

                        &.active {
                            border: solid 1px #021DE2;
                        }
                    }
                }


                /*step 2*/
                .payment-types {
                    display: flex;
                    flex-wrap: wrap;
                    justify-content: space-between;
                    position: relative;
                    @include lt-sm {
                        justify-content: center;
                    }

                    .single-payment-type {
                        width: 196px;
                        height: 109px;
                        background: white;
                        border: 2px solid #E6E8FC;
                        border-radius: 7px;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        margin-right: 20px;
                        font-family: Poppins, sans-serif;
                        font-size: 26px;
                        letter-spacing: 0px;
                        color: #676B8B;
                        opacity: 1;

                        &.sub {
                            width: 188px;
                            height: 86px;
                            font-size: 22px;

                            &.date {
                                width: 196px;

                                img {
                                    margin-right: 10px;
                                }

                                @include lt-sm {
                                    width: 175px;
                                    margin-top: 15px;
                                }
                            }

                            @include lt-sm {
                                width: 80px;
                                height: 40px;
                                font-size: 16px;
                                margin-right: 15px;
                            }
                        }


                        @include lt-sm {
                            width: 80px;
                            height: 40px;
                            font-size: 16px;
                            margin-right: 15px;
                        }

                        &:last-child {
                            margin-right: 0;
                        }

                        &.active {
                            border: 2px solid #021DE2;
                            color: #021DE2;
                        }


                        &.active-blue {
                            border: none;
                            color: white;
                            background: #021DE2;
                        }

                        &:hover {
                            cursor: pointer;
                        }

                    }
                }

                /*step 3*/

                .hours-select {
                    width: 100%;
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    margin-top: 20px;

                    .hours {
                        width: 110px;
                        height: 45px;
                        display: flex;
                        align-items: center;
                        justify-content: center;

                        background: #F2F3FD;
                        border-radius: 5px;
                        font-weight: 600;
                        font-size: 18px;
                        color: #001CE2;

                        @include lt-sm {
                            width: 95px;
                        }

                    }

                    img {
                        height: 30px;
                        width: 30px;
                        box-shadow: 0px 4px 15px rgba(0, 28, 226, 0.07);
                        border-radius: 50%;

                        &:hover {
                            cursor: pointer;
                        }
                    }
                }

                .interval-input {
                    width: 100%;
                    margin-top: 40px;
                    padding-left: 8px;
                    padding-right: 8px;

                    input {
                        width: 100%;
                        height: 50px;
                        border: 1px solid #E6E8FC;
                        color: #676B8B;
                        padding-left: 20px;

                        &:focus {
                            outline: none;
                        }

                        border-radius: 10px;
                    }
                }

                .select-hours {
                    width: 100%;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    flex-direction: column;
                    height: 0;
                    overflow: hidden;
                    transition: height 1s;

                    &.full-height {
                        height: 250px;
                    }

                    .payment-details {
                        font-size: 22px;
                        font-family: Poppins, sans-serif;
                        color: #616588;
                        opacity: 1;
                        margin-top: 25px;

                        @include lt-sm {
                            font-size: 20px;
                        }
                    }
                }

                /* step 4 */
                .percentage-select {
                    width: 100%;
                    display: flex;
                    align-items: center;
                    margin-top: 50px;
                    margin-bottom: 20px;
                    padding-left: 20px;
                    padding-right: 50px;


                    .label {
                        font-size: 19px;
                        color: #001CE2;
                        white-space: nowrap;
                    }

                    .percentage-input-wrapper {
                        position: relative;
                        width: 100%;

                        span {
                            position: absolute;
                            color: #001CE2;

                            &.max {
                                top: -14px;
                                right: -40px;
                            }

                            &.current {
                                top: -14px;
                            }
                        }
                    }

                }
            }
        }

        .total-payment {
            width: 222px;
            height: 75px;
            border: 2px solid #E6E8FC;
            border-radius: 5px;
            @include lt-sm {
                width: 125px;
                height: 50px;
            }
            display: flex;
            align-items: center;
            justify-content: center;

            color: #001CE2;
            font-size: 26px;
            font-weight: 600;
        }

        .hire-modal-footer {
            width: 100%;

            .total-payment-row {
                display: flex;
                justify-content: space-between;
                align-items: center;

                .label {
                    font-size: 18px;
                    line-height: 24px;
                    color: #888DB1;
                    @include lt-sm {
                        font-size: 16px;
                    }
                }

                .total-payment {
                    width: 110px;
                    height: 45px;
                    border: 2px solid #E6E8FC;
                    border-radius: 5px;
                    @include lt-sm {
                        width: 125px;
                        height: 50px;
                    }
                    display: flex;
                    align-items: center;
                    justify-content: center;

                    color: #001CE2;
                    font-size: 18px;
                    font-weight: 600;
                }
            }

            .action-btn {
                width: 100%;
                display: flex;
                justify-content: center;
                margin-top: 40px;

                &.contact {
                    a {
                        width: 320px;

                        img {
                            margin-left: 12px;
                            margin-top: 7px;
                        }

                        @include lt-sm {
                            width: 196px;
                            height: 50px;
                            font-size: 17px;
                            font-weight: 600;
                            img {
                                margin-left: 6px;
                                width: 22px;
                            }
                        }
                    }
                }

                a {
                    width: 196px;
                    height: 80px;
                    display: flex;
                    align-items: center;
                    background: #001CE2;
                    border-radius: 5px;
                    justify-content: center;
                    color: white;
                    font-size: 22px;


                    &:hover {
                        text-decoration: none;
                    }

                }

            }
        }
    }

    .no-payment-methods {
        position: relative;

        .close-modal {
            position: absolute;
            box-shadow: 0px 13px 16px #0000000A;
            border-radius: 50%;
            top: -50px;
            right: -100px;

            @include lt-sm {
                top: -33px;
                right: -6px;
                width: 35px;
            }

        }

        .message {
            height: 0;
            overflow: hidden;
            transition: height 1s;

            &.full-height {
                height: 220px;
                @include lt-sm {
                    height: 250px;
                }
            }

            .text {
                font-size: 32px;
                font-family: Poppins, sans-serif;
                text-align: center;
                color: #5C6291;
                font-weight: 600;

                img {
                    display: inline-block;
                    margin-top: -7px;
                }

                @include lt-sm {
                    font-size: 26px;
                }
            }
        }

        .contact-form {
            height: 0;
            overflow: hidden;
            transition: height 1s;

            &.full-height {
                height: 330px;
            }

            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 100%;

            .contact-form-header {
                width: 100%;
                display: flex;
                justify-content: space-between;
                align-items: center;

                .text {
                    color: #5C6291;
                    font-size: 26px;
                    font-weight: 500;
                    font-family: Poppins, sans-serif;
                }

                .avatar {
                    display: flex;
                    align-items: center;
                    color: #5C6291;
                    font-size: 18px;

                    img {
                        width: 36px;
                        height: 36px;
                        border-radius: 50%;
                        margin-left: 10px;
                    }
                }
            }

            .input-row {
                width: 100%;
                margin-top: 24px;

                textarea {
                    width: 100%;
                    height: 220px;
                    border: 2px solid #8488AB34;
                    border-radius: 17px;
                    padding: 30px 20px 20px 25px;
                    resize: none;
                    color: #8488AB;
                    font-size: 19px;

                    &:focus {
                        outline: none;
                    }
                }
            }

            .send-btn {
                width: 100%;
                display: flex;
                justify-content: flex-end;
                margin-top: -35px;
                margin-right: 25px;

                a {
                    width: 130px;
                    height: 47px;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    font-size: 22px;
                    background: blue;
                    color: white;
                    box-shadow: 0px 6px 13px #081EE033;
                    border-radius: 5px;

                    img {
                        width: 18px;
                        margin-left: 10px;
                        margin-top: 8px;
                    }
                }
            }

        }

        .success-message {
            height: 0;
            overflow: hidden;
            transition: height 1s;

            &.full-height {
                height: 200px;
            }

            .message-content {
                display: flex;
                align-items: center;
                flex-direction: column;
                justify-content: center;

                img {
                    margin-bottom: 25px;
                }

                .text {
                    font-family: Poppins, sans-serif;
                    font-size: 36px;
                    font-weight: 500;
                    color: #2BAD03;
                }
            }


        }

    }

    .date-picker {
        position: absolute;
        top: -90px;
        left: -6px;
        right: -6px;

        @include lt-sm {
            top: -160px;
        }
    }
</style>

<style lang="scss">
    .v-picker {
        .v-picker__title.primary {
            background: #001CE2 !important;
        }

        .v-btn.v-btn--active.v-btn--rounded.theme--light.green.lighten-1 {
            background: #001CE2 !important;
        }
    }
</style>