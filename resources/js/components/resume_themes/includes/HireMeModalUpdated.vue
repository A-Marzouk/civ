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
                    <div class="single-step-wrapper one" v-if=" isStepActive(1)">
                        <div class="step-header">
                            Choose Payment Method

                            <img src="/icons/hire-modal/close.svg" alt="close btn" class="close-modal" @click="closeModal">
                        </div>
                        <div class="step-content" v-show="isStepActive(1)">

                            <div class="payment-methods-wrapper" v-if="paymentMethods.length > 0">
                                <template v-for="paymentMethod in paymentMethods">
                                    <div v-show="paymentMethod.name === 'Stripe' " class="payment-method" @click="currentPaymentMethod = 'stripe'" :class="{active : currentPaymentMethod === 'stripe'}">
                                        <img src="/icons/hire-modal/stripe-logo.svg" alt="stripe icon">
                                    </div>
                                    <div v-show="paymentMethod.name === 'PayPal' " class="payment-method" @click="currentPaymentMethod = 'paypal'" :class="{active : currentPaymentMethod === 'paypal'}">
                                        <img src="/icons/hire-modal/paypal-logo.svg" alt="paypal icon">
                                    </div>
                                </template>
                            </div>

                            <div class="step-footer">

                                <div class="total-payment">
                                    ${{Math.round(totalPaymentAmount)}}
                                </div>

                                <div class="action-btn">
                                    <a href="javascript:void(0)" @click="goToNextStep">
                                        Confirm
                                        <img src="/icons/hire-modal/whitr-arrow.svg" alt="arrow right">
                                    </a>
                                </div>
                            </div>

                            <div v-if="paymentMethods.length < 1" style="font-size: 18px; line-height: 24px;color: #888DB1;">
                                Current user has no payment methods set up.
                            </div>
                        </div>

                    </div>

                    <div class="single-step-wrapper two" v-if="isStepActive(2)">
                        <div class="step-header">
                            <div class="back">
                                <img src="/icons/hire-modal/back.svg" alt="back icon" @click="goToPreviousStep"
                                     v-show="isStepActive(2)">
                            </div>


                            Payment Type

                            <img src="/icons/hire-modal/close.svg" alt="close btn" class="close-modal" @click="closeModal">

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

                            <div class="select-hours" v-if="currentPaymentType !== '' ">
                                <div class="percentage-select">
                                    <div class="label">
                                        {{getHoursLabel()}}
                                    </div>

                                    <div class="percentage-input-wrapper">
                                        <span class="max" v-show="currentSelectedHours < 40">50</span>
                                        <span class="current" :style="{right: currentHoursPosition + '%'}">{{currentSelectedHours}}</span>
                                        <input type="range" class="range" min="0" max="50" step="5" v-model="currentSelectedHours"
                                               style="width: 100%;">
                                    </div>
                                </div>
                                <div class="payment-details">
                                    {{currentSelectedHours}} hours x {{userHourlyRate}} Hourly rate  x Percentage {{percentage}}% = {{totalPaymentAmount}}
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
                            </div>

                            <div class="step-footer">

                                <div class="total-payment">
                                    ${{Math.round(totalPaymentAmount)}}
                                </div>

                                <div class="action-btn">
                                    <a href="javascript:void(0)" @click="goToNextStep">
                                        Confirm
                                        <img src="/icons/hire-modal/whitr-arrow.svg" alt="arrow right">
                                    </a>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="single-step-wrapper three"  v-if="isStepActive(3)" >
                        <div class="step-header">
                            <div class="back">
                                <img src="/icons/hire-modal/back.svg" alt="back icon" @click="goToPreviousStep"
                                     v-show="isStepActive(3)">
                            </div>
                            Total Payment

                            <img src="/icons/hire-modal/close.svg" alt="close btn" class="close-modal" @click="closeModal">

                        </div>
                        <div class="step-content" v-show="isStepActive(3)">


                            <div style="width: 100%; border-bottom: 1px solid lightgray; padding-bottom: 25px; margin-bottom:25px;">
                                <div class="step-header sub">
                                    Your total payment will be
                                </div>
                                <div class="d-flex justify-content-start" style="width: 100%">
                                    <div class="total-payment">
                                        ${{Math.round(totalPaymentAmount)}}
                                    </div>
                                </div>
                            </div>


                            <div class="step-header sub">
                                Auto pay balance of (${{Math.round(totalPaymentAmount)}})
                            </div>
                            <div class="payment-types">
                                <div class="single-payment-type sub" :class="{'active-blue' : isPaymentTypeActive('hourly')}" @click="setPaymentType('hourly')">
                                    7 Days
                                </div>
                                <div class="single-payment-type sub" :class="{'active-blue' : isPaymentTypeActive('weekly')}" @click="setPaymentType('weekly')">
                                    14 Days
                                </div>
                                <div class="single-payment-type sub date" :class="{'active-blue': isPaymentTypeActive('monthly')}" @click="setPaymentType('monthly')">
                                    Pick a date
                                </div>
                            </div>


                            <div class="step-footer" style="justify-content: center;">
                                <div class="action-btn">
                                    <a href="javascript:void(0)" :href="getPayLink()" @click="reset">
                                        Pay Now
                                        <img src="/icons/hire-modal/whitr-arrow.svg" alt="arrow right">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="single-step-wrapper four" v-if="isStepActive(4)">
                        <div class="step-header">
                            Choose Payment Amount
                            <img src="/icons/back.svg" class="back" alt="back icon" @click="goToPreviousStep"
                                 v-show="isStepActive(4)">
                        </div>
                        <div class="step-content" v-show="isStepActive(4)">

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


                            <div class="action-btn align-content-end">
                                <a href="javascript:void(0)" @click="goToNextStep">
                                    Confirm
                                </a>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="hire-modal-footer" v-if="!isModalOpened">
                    <div class="total-payment-row">
                        <div class="label">
                            Your Total Payment Will Be
                        </div>
                        <div class="total-payment">
                            ${{Math.round(totalPaymentAmount)}}
                        </div>
                    </div>
                    <div class="action-btn" v-if="paymentMethods.length > 0">
                        <a :href="getPayLink()" @click="reset">
                            Pay Now
                        </a>
                    </div>
                </div>

            </div>
        </v-dialog>
        <!-- dialog -->
    </div>
</template>

<script>
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
        data(){
            return{
                isModalOpened: true,
                currentStep: 1,
                currentPaymentMethod: 'paypal',
                currentPaymentType: '',
                currentHoursType: 'week',
                // payment calculations:
                userHourlyRate: 10,
                percentage: 100,
                currentSelectedHours: 25,
                finishedSteps: []
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
            }
        },
        methods: {
            getHoursLabel(){
                if(this.currentPaymentType === 'weekly'){
                    return 'Weekly';

                }
                if(this.currentPaymentType === 'monthly'){
                    return 'Monthly';
                }
                return 'Hours';
            },
            goToNextStep() {
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
            }


        },
        computed: {
            totalPaymentAmount() {
                return this.user.payment_info[0].salary * this.percentage / 100 * this.currentSelectedHours;
            },
            currentPosition() {
                return (100 - this.percentage - 15);
            },
            currentHoursPosition() {
                return (100 - this.currentSelectedHours*2 - 15);
            },
            paymentMethods() {
                return this.user.payment_methods;
            }
        }
    }
</script>

<style scoped lang="scss">
    @import "../../../../sass/media-queries";

    .range{
        &:focus{
            border:none;
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
                    margin-bottom:60px;

                    &.sub{
                        font-size: 28px;
                        margin-bottom: 25px;
                    }

                    @include lt-sm {
                        font-size: 20px;
                    }

                    position: relative;

                    img{
                        box-shadow: 0px 13px 16px #0000000A;
                        border-radius: 50%;

                        &:hover {
                            cursor: pointer;
                        }
                    }

                    .back{
                        width:55px;
                        height:55px;
                        box-shadow: 0px 13px 16px #0000000A;
                        border-radius: 50%;
                        position: relative;

                        &:hover {
                            cursor: pointer;
                        }

                        img{
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

                    .step-footer{

                        display: flex;
                        justify-content: space-between;
                        align-items: center;
                        width:100%;
                        margin-top: 80px;


                        .total-payment{
                            width: 222px;
                            height: 75px;
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

                                img{
                                    margin-left:25px;
                                    margin-top:5px;
                                }

                                &:hover {
                                    text-decoration: none;
                                }

                                @include lt-sm {
                                    width: 95px;
                                    height: 40px;
                                }
                            }
                        }
                    }

                }

                .payment-methods-wrapper{
                    display: flex;

                    .payment-method{
                        width: 196px;
                        height: 109px;
                        margin-right: 12.5px;
                        margin-left: 12.5px;
                        border: 1px solid #70707046;
                        border-radius: 7px;
                        display: flex;
                        align-items: center;
                        justify-content: center;

                        &:hover{
                            cursor: pointer;
                        }

                        &.active{
                            border: solid 1px #021DE2;
                        }
                    }
                }



                /*step 2*/
                .payment-types {
                    display: flex;
                    justify-content: space-between;


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

                        &.sub{
                            width: 188px;
                            height: 86px;
                            font-size: 22px;
                            &.date{
                                width: 196px;
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
                            background: #021DE2 ;
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

                .select-hours{
                    width: 100%;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    flex-direction: column;


                    .payment-details{
                        font-size: 22px;
                        font-family:Poppins, sans-serif ;
                        color: #616588;
                        opacity: 1;
                        margin-top:25px;
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
                    padding-right: 40px;


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

        .total-payment{
            width: 222px;
            height: 75px;
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

            .action-btn {
                width: 100%;
                display: flex;
                justify-content: center;
                margin-top: 40px;

                a {
                    width: 110px;
                    height: 45px;
                    display: flex;
                    align-items: center;
                    background: #001CE2;
                    border-radius: 5px;
                    justify-content: center;
                    color: white;
                    font-size: 16px;
                    line-height: 25px;

                    &:hover {
                        text-decoration: none;
                    }

                    @include lt-sm {
                        width: 95px;
                        height: 40px;
                    }
                }

            }
        }
    }
</style>