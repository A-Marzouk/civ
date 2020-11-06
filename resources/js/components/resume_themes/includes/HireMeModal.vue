<template id="hireMeModal">
    <div data-app>
        <!-- dialog -->
        <v-dialog
                v-model="isModalOpened"
                max-width="600"
                style="box-shadow: 0px 0px 130px rgba(0, 16, 133, 0.07);border-radius: 10px; z-index:1000; overflow-y:hidden;"
        >
            <div class="hire-main-wrapper" v-if="user">

                <img src="/icons/close-grey.svg" alt="close btn" class="close-modal" @click="closeModal">

                <div class="steps-wrapper" v-if="paymentMethods.length > 0">
                    <div class="single-step-wrapper one" :class="{'active' : isStepActive(1)}">
                        <div class="step-header">
                            Choose Payment Method
                            <img src="/icons/circle-tick.svg" class="tick" alt="tick icon" v-show="isStepDone(1)">
                        </div>
                        <div class="step-content" v-show="isStepActive(1)">
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
                                            <img src="/icons/hire-modal/paypal-logo.svg" alt="paypal icon" class="paypal">
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
                        </div>
                    </div>

                    <div class="single-step-wrapper two" :class="{'active' : isStepActive(2)}">
                        <div class="step-header">
                            payment Type
                            <img src="/icons/circle-tick.svg" class="tick" alt="tick icon" v-show="isStepDone(2)">
                            <img src="/icons/back.svg" class="back" alt="back icon" @click="goToPreviousStep"
                                 v-show="isStepActive(2)">
                        </div>
                        <div class="step-content" v-show="isStepActive(2)">

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
                            <div class="interval-input">
                                <input type="number" :disabled="currentPaymentType === 'hourly'" :class="{'low-opacity' : currentPaymentType === 'hourly'}"
                                       :placeholder="intervalNumberPlaceHolder()" min="2"
                                       max="12" v-model="iterations">
                            </div>

                            <div class="percentage-select">
                                <div class="label">
                                    {{getHoursLabel()}}
                                </div>

                                <div class="percentage-input-wrapper">
                                    <span class="max" v-show="currentSelectedHours < 40">50</span>
                                    <span class="current" :style="{right: currentHoursPosition + '%'}">{{currentSelectedHours}}</span>
                                    <input type="range" class="range" min="0" max="50" step="1" v-model="currentSelectedHours"
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
                                    <span class="current" :style="{right: currentPosition + '%'}">{{percentage}}%</span>
                                    <input type="range" class="range" min="0" max="100" step="10" v-model="percentage"
                                           style="width: 100%;">
                                </div>
                            </div>

                            <div class="total-payment-row">
                                <div class="total-payment">
                                    ${{Math.round(currentPaymentAmount)}}
                                </div>

                                <div class="action-btn">
                                    <a href="javascript:void(0)" @click="goToNextStep">
                                        Confirm
                                        <img src="/icons/hire-modal/white-arrow.svg" alt="arrow right">
                                    </a>
                                </div>
                            </div>


                        </div>

                    </div>

                    <div class="single-step-wrapper three" :class="{'active' : isStepActive(3) , 'short' : percentage == 100}">
                        <div class="step-header">
                            Total Payment
                            <img src="/icons/circle-tick.svg" class="tick" alt="tick icon" v-show="isStepDone(3)">
                            <img src="/icons/back.svg" class="back" alt="back icon" @click="goToPreviousStep"
                                 v-show="isStepActive(3)">
                        </div>
                        <div class="step-content" v-show="isStepActive(3)">

                            <div class="header">
                                Your Current Payment Will Be
                            </div>

                            <div class="total-payment-row" style="border-bottom: 1px solid lightgray; padding-bottom: 20px; justify-content: center;">
                                <div class="total-payment">
                                    ${{Math.round(currentPaymentAmount)}}
                                </div>
                            </div>

                            <template v-if="percentage < 100">
                                <div class="header mb-0">
                                    Auto pay balance of (${{Math.round(totalPaymentAmount - currentPaymentAmount)}})
                                </div>

                                <div class="payment-types">
                                    <div class="single-payment-type"
                                         :class="{'active-blue' : isAutoPaymentTypeActive('7-days')}"
                                         @click="setAutoPaymentType('7-days')">
                                        7 Days
                                    </div>
                                    <div class="single-payment-type"
                                         v-if="currentPaymentType === 'monthly' "
                                         :class="{'active-blue' : isAutoPaymentTypeActive('14-days')}"
                                         @click="setAutoPaymentType('14-days')">
                                        14 Days
                                    </div>
                                    <div class="single-payment-type date"
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

                            <div class="action-btn mt-5">
                                <a href="javascript:void(0)" @click="goToNextStep">
                                    Confirm
                                    <img src="/icons/hire-modal/white-arrow.svg" alt="arrow right">
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="single-step-wrapper four" :class="{'active' : isStepActive(4) }">
                        <div class="step-header">
                            Required Information
                            <img src="/icons/circle-tick.svg" class="tick" alt="tick icon" v-show="isStepDone(4)">
                            <img src="/icons/back.svg" class="back" alt="back icon" @click="goToPreviousStep"
                                 v-show="isStepActive(4)">
                        </div>
                        <div class="step-content" v-show="isStepActive(4)">

                            <div class="client-inputs">
                                <div class="client-input-group">
                                    <label>Name</label>
                                    <input type="text" placeholder="John Doe" v-model="client.name" required>
                                    <span v-if="errors.name" class="client-input-error">
                                        {{errors.name}}
                                    </span>
                                </div>
                                <div class="client-input-group">
                                    <label>Email</label>
                                    <input type="email" placeholder="John@Doe.com" v-model="client.email" required>
                                    <span v-if="errors.email" class="client-input-error">
                                        {{errors.email}}
                                    </span>
                                </div>
                                <div class="client-input-group">
                                    <label>Phone Number</label>
                                    <input type="tel" placeholder="+123 00 0000 000" v-model="client.phone" required>
                                    <span v-if="errors.phone" class="client-input-error">
                                        {{errors.phone}}
                                    </span>
                                </div>
                            </div>

                            <div class="action-btn align-content-end">
                                <a href="javascript:void(0)" @click="pay">
                                    Pay Now
                                    <img src="/icons/hire-modal/white-arrow.svg" alt="arrow right">
                                </a>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="steps-wrapper" v-else>

                    <div class="single-step-wrapper one no-payment-method" :class="{'active' : isStepActive(1)}">
                        <div class="step-header">
                            No Payment Method
                        </div>
                        <div class="step-content" v-show="isStepActive(1)">
                            <div class="header">
                                Current user has no payment methods set up!
                            </div>

                            <div class="step-footer" style="justify-content: flex-end">
                                <div class="action-btn">
                                    <a href="javascript:void(0)" @click="goToNextStep" class="contact">
                                        Contact Freelancer
                                        <img src="/icons/hire-modal/white-arrow.svg" alt="arrow right">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="single-step-wrapper two no-payment-method" :class="{'active' : isStepActive(2) }">
                        <div class="step-header">
                            Required Information
                            <img src="/icons/circle-tick.svg" class="tick" alt="tick icon" v-show="isStepDone(2)">
                            <img src="/icons/back.svg" class="back" alt="back icon" @click="goToPreviousStep"
                                 v-show="isStepActive(2)">
                        </div>
                        <div class="step-content" v-show="isStepActive(2)">

                            <div class="client-inputs">
                                <div class="client-input-group">
                                    <label>Name</label>
                                    <input type="text" placeholder="John Doe" v-model="client.name" required>
                                    <span v-if="errors.name" class="client-input-error">
                                        {{errors.name}}
                                    </span>
                                </div>
                                <div class="client-input-group">
                                    <label>Email</label>
                                    <input type="email" placeholder="John@Doe.com" v-model="client.email" required>
                                    <span v-if="errors.email" class="client-input-error">
                                        {{errors.email}}
                                    </span>
                                </div>
                                <div class="client-input-group">
                                    <label>Phone Number</label>
                                    <input type="tel" placeholder="+123 00 0000 000" v-model="client.phone" required>
                                    <span v-if="errors.phone" class="client-input-error">
                                        {{errors.phone}}
                                    </span>
                                </div>
                            </div>

                            <div class="action-btn align-content-end">
                                <a href="javascript:void(0)" @click="validateAndGoToNextStep">
                                    Continue
                                    <img src="/icons/hire-modal/white-arrow.svg" alt="arrow right">
                                </a>
                            </div>

                        </div>
                    </div>

                    <div class="single-step-wrapper three no-payment-method" :class="{'active' : isStepActive(3)}">
                        <div class="step-header">
                            Contact Freelancer
                            <img src="/icons/circle-tick.svg" class="tick" alt="tick icon" v-show="isStepDone(3)">
                            <img src="/icons/back.svg" class="back" alt="back icon" @click="goToPreviousStep"
                                 v-show="isStepActive(3)">
                        </div>
                        <div class="step-content" v-show="isStepActive(3)">

                            <div class="contact-form">
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
                            </div>

                            <div class="step-footer" style="justify-content: flex-end">
                                <div class="action-btn">
                                    <a href="javascript:void(0)" @click="goToNextStep">
                                        Send
                                        <img src="/icons/hire-modal/white-arrow.svg" alt="arrow right">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="single-step-wrapper four no-payment-method" :class="{'active' : isStepActive(4)}">
                        <div class="step-content" v-show="isStepActive(4)">
                            <div class="success-message">
                                <div class="message-content">
                                    <img src="/icons/hire-modal/check-circle.svg" alt="verified icon">
                                    <div class="text">
                                        Successfully Sent!
                                    </div>
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
        name: "HireMeModal",
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
                isModalOpened: false,
                currentStep: 1,
                currentNoPaymentStep: 1,
                iterations: 2,
                typeOfRecurringInterval: 'week',
                currentPaymentMethod: 'stripe',
                currentPaymentType: 'hourly',
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
                if(! value){
                    this.$emit('modalClosed');
                }
            },
            currentPaymentType: function (value) {
                this.typeOfRecurringInterval = value.replace('ly', '');
            }
        },
        methods: {
            goToNextStep() {
                if (this.currentStep > 4) {
                    return;
                }
                this.finishedSteps.push(this.currentStep);
                this.currentStep++;
            },
            intervalNumberPlaceHolder(){
                if(this.currentPaymentType === 'hourly'){
                    return '';
                }
                return 'Number of ' + this.typeOfRecurringInterval + 's';
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
            continueToSend(){
                if (this.validateInputs()){
                    this.currentNoPaymentStep = 3 ;
                }
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
                            window.location = '/client-subscription?session_id=' + session_id ;
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
            isAutoPaymentTypeActive(payment_type) {
                return this.currentAutoPaymentType === payment_type;
            },
            setAutoPaymentType(payment_type) {
                this.currentAutoPaymentType = payment_type;
            },
            pickDateSelected() {
                this.currentAutoPaymentType = 'custom-date';
                this.isDatePickerOpened = true;
            },
            dateChanged() {
                // close the date picker
                this.isDatePickerOpened = false;
                this.isDateChanged = true;
            },
            validateAndGoToNextStep(){
                if(this.validateInputs()){
                    this.goToNextStep();
                }
            }

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

<style lang="scss" scoped>
    @import "../../../../sass/media-queries";

    .hire-main-wrapper {
        height: fit-content;
        background: white;
        border-radius: 5px;
        padding: 50px;
        display: flex;
        flex-direction: column;
        align-items: center;
        position: relative;

        .close-modal {
            position: absolute;
            top: 10px;
            right: 10px;

            &:hover {
                cursor: pointer;
            }
        }

        @include lt-sm {
            padding: 40px 20px 20px 20px;
        }

        .steps-wrapper {
            width: 100%;
            border-bottom: 1.5px solid #F2F3FD;
            margin-bottom: 20px;

            .single-step-wrapper {
                background: #FFFFFF;
                box-shadow: none;
                border-radius: 5px;
                margin-bottom: 20px;
                display: flex;
                flex-direction: column;
                align-items: center;
                height: 60px;
                overflow: hidden;
                transition: height 1s;

                &.active {
                    height: 220px;
                    box-shadow: 0px 10px 150px rgba(0, 16, 131, 0.05);

                    .step-header {
                        background: #B4B8DE;
                        color: white;
                    }
                }


                &.active.two {
                    height: 480px;
                }

                &.active.three {
                    height: 455px;
                }

                &.active.three.short {
                    height: 280px;
                }

                &.active.four {
                    height: 520px;
                }

                &.active.one.no-payment-method {
                    height: 235px;
                }

                &.active.two.no-payment-method{
                    height: 520px;
                }

                &.active.three.no-payment-method {
                    height: 370px;
                }

                &.active.four.no-payment-method {
                    height: 250px;
                }

                .step-header {
                    background: #F2F3FD;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    width: 100%;
                    font-size: 20px;
                    line-height: 24px;
                    min-height: 60px;
                    color: #888DB1;
                    transition: all 1.3s;
                    transition-property: background, color;

                    @include lt-sm {
                        font-size: 18px;
                    }

                    position: relative;

                    img {
                        position: absolute;

                        &.tick {
                            right: 28px;
                            @include lt-sm {
                                right: 10px;
                            }
                        }

                        &.back {
                            left: 28px;
                            @include lt-sm {
                                left: 10px;
                            }

                            &:hover {
                                cursor: pointer;
                            }
                        }
                    }
                }

                .step-content {

                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    justify-content: center;
                    width: 100%;
                    max-width: 360px;

                    .header{
                        font-weight: 500;
                        font-size: 24px;
                        margin-top: 20px;
                        text-align: center;
                        margin-bottom: 20px;
                        color: #888DB1;
                    }

                    .action-btn {
                        a {
                            width: 110px;
                            height: 45px;
                            display: flex;
                            align-items: center;
                            background: #001CE2;
                            border-radius: 5px;
                            justify-content: center;
                            color: white;
                            font-size: 15px;
                            line-height: 25px;

                            &:hover {
                                text-decoration: none;
                            }

                            @include lt-sm {
                                width: 95px;
                                height: 40px;
                            }

                            img{
                                width: 22px;
                                margin-left: 5px;
                            }

                            &.contact{
                                width: 180px;
                            }
                        }
                    }
                }

                /*step 2*/
                .payment-types {
                    display: flex;
                    justify-content: space-between;
                    margin-bottom: 20px;
                    margin-top: 20px;
                    position: relative;

                    .single-payment-type {
                        width: 110px;
                        height: 50px;
                        background: white;
                        border: 2px solid #E6E8FC;
                        border-radius: 5px;
                        color: #888DB1;
                        font-size: 18px;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        margin-right: 10px;
                        margin-left: 10px;

                        @include lt-sm {
                            width: 80px;
                            height: 40px;
                            font-size: 16px;
                            margin-right: 15px;
                        }

                        &:last-child {
                            margin-right: 0;
                        }

                        &:first-child {
                            margin-left: 0;
                        }

                        &.active {
                            background: #888DB1;
                            color: white;
                            border: 0;
                        }

                        &:hover {
                            cursor: pointer;
                        }

                        &.active-blue {
                            border: none;
                            color: white;
                            background: #021DE2;
                        }

                        &.date {
                            width: 160px;

                            img {
                                margin-right: 10px;
                            }

                            @include lt-sm {
                                width: 120px;
                            }
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

                /* step 4 */
                .percentage-select {
                    width: 100%;
                    display: flex;
                    align-items: center;
                    margin-top: 20px;
                    margin-bottom: 32px;
                    padding-left: 20px;
                    padding-right: 40px;


                    .label {
                        font-size: 16px;
                        color: #888DB1;
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

                .client-inputs {
                    margin-bottom: 40px;
                    width: 100%;

                    .client-input-group {
                        display: flex;
                        flex-direction: column;
                        margin-top: 15px;

                        label {
                            font-size: 16px;
                            color: #888DB1;
                            margin-bottom: 3px;
                        }

                        input {
                            width: 100%;
                            height: 50px;
                            border: 2px solid #E6E8FC;
                            border-radius: 5px;
                            color: grey;
                            padding-left: 15px;

                            &:focus {
                                outline: none;
                            }
                        }
                    }

                }
            }
        }

        .total-payment-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
        }

        .total-payment {
            width: 110px;
            height: 45px;
            border: 2px solid #E6E8FC;
            border-radius: 5px;
            @include lt-sm {
                width: 95px;
                height: 40px;
            }
            display: flex;
            align-items: center;
            justify-content: center;

            color: #001CE2;
            font-size: 18px;
            font-weight: 600;
        }
    }

    /* Updated design styles */

    .interval-input {
        width: 100%;
        margin-bottom: 20px;

        input {
            width: 100%;
            height: 50px;
            border: 2px solid #E6E8FC;
            color: #676B8B;
            padding-left: 15px;

            &:focus {
                outline: none;
            }

            border-radius: 5px;
        }
    }

    .payment-methods-wrapper {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        margin-top: 15px;
        margin-bottom: 15px;

        .payment-method {
            width: 150px;
            height: 65px;
            margin-right: 12.5px;
            margin-left: 12.5px;
            border: 2px solid #E6E8FC;
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: center;

            img{
                width: 65px;
                &.paypal{
                    width: 85px;
                }
            }

            @include lt-sm {
                margin-bottom: 20px;
            }

            &:hover {
                cursor: pointer;
            }

            &.active {
                border: 2px solid #888DB1;
            }
        }
    }

    .low-opacity{
        opacity: 0.3;
    }

    .payment-details{
        font-size: 15px;
        margin-top: 5px;
        margin-bottom: 20px;
        text-align: center;
        color: #888DB1;
    }

    .client-input-error{
        color: red;
        font-size: 14px;
        font-weight: 500;
    }

    .date-picker {
        position: absolute;
        top: -205px;
        left: -30px;
        right: -30px;

        @include lt-sm {
            left: -15px;
            right: -15px;
            top: -200px;
        }
    }

    .contact-form {
        margin-top: 25px;
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
                font-size: 18px;
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
            margin-top: 10px;
            margin-bottom: 25px;

            textarea {
                width: 100%;
                height: 140px;
                border: 2px solid #E6E8FC;
                border-radius: 5px;
                padding: 10px;
                resize: none;
                color: #8488AB;
                font-size: 15px;

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
        margin-top: 30px;

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
                font-size: 32px;
                font-weight: 500;
                color: #2BAD03;
            }
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