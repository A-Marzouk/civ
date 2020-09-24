<template>
    <v-app>
        <div class="main-subscription-container"></div>

        <!-- dialog -->
        <v-dialog
                v-model="hireMeModal"
                max-width="550"
                style="box-shadow: 0px 0px 130px rgba(0, 16, 133, 0.07);border-radius: 10px; z-index:1000; overflow-y:hidden;"
        >
            <div class="hire-main-wrapper">

                <div class="steps-wrapper">
                    <div class="single-step-wrapper one" :class="{'active' : isStepActive(1)}">
                        <div class="step-header">
                            Choose Payment Method
                            <img src="/icons/circle-tick.svg" class="tick" alt="tick icon" v-show="isStepDone(1)">
                        </div>
                        <div class="step-content">
                            <!-- specific user payment_methods -->
                            <v-radio-group v-model="currentPaymentMethod" row>
                                <v-radio v-for="paymentMethod in paymentMethods" :key="paymentMethod.name" :value="paymentMethod.name">
                                    <template v-slot:label>
                                        <div v-show="paymentMethod.name === 'Stripe' ">
                                            <img src="/icons/stripe-icon.svg" alt="stripe icon">
                                        </div>
                                        <div v-show="paymentMethod.name === 'PayPal' ">
                                            <img src="/icons/paypal-icon.svg" alt="paypal icon">
                                        </div>
                                    </template>
                                </v-radio>
                            </v-radio-group>

                            <div class="action-btn">
                                <a href="javascript:void(0)" @click="goToNextStep">
                                    Continue
                                </a>
                            </div>
                        </div>

                    </div>

                    <div class="single-step-wrapper two" :class="{'active' : isStepActive(2)}">
                        <div class="step-header">
                            Select the Number of Hours
                            <img src="/icons/circle-tick.svg" class="tick" alt="tick icon" v-show="isStepDone(2)">
                            <img src="/icons/back.svg" class="back" alt="back icon" @click="goToPreviousStep" v-show="isStepActive(2)">
                        </div>
                        <div class="step-content">

                             <!-- Payment type -->
                            <div class="payment-types">
                                <div class="single-payment-type" :class="{'active' : isPaymentTypeActive('hourly')}" @click="setPaymentType('hourly')">
                                    Hourly
                                </div>
                                <div class="single-payment-type" :class="{'active' : isPaymentTypeActive('weekly')}" @click="setPaymentType('weekly')">
                                    Weekly
                                </div>
                                <div class="single-payment-type" :class="{'active' : isPaymentTypeActive('monthly')}" @click="setPaymentType('monthly')">
                                    Monthly
                                </div>
                            </div>

                            <div class="action-btn">
                                <a href="javascript:void(0)" @click="goToNextStep">
                                    Continue
                                </a>
                            </div>

                        </div>

                    </div>

                    <div class="single-step-wrapper three" :class="{'active' : isStepActive(3)}">
                        <div class="step-header">
                            Choose Payment Method
                            <img src="/icons/circle-tick.svg" class="tick" alt="tick icon" v-show="isStepDone(3)">
                            <img src="/icons/back.svg" class="back" alt="back icon" @click="goToPreviousStep" v-show="isStepActive(3)">
                        </div>
                        <div class="step-content">
                            <!-- content of three-->
                            <div class="action-btn">
                                <a href="javascript:void(0)" @click="goToNextStep">
                                    Continue
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="single-step-wrapper four" :class="{'active' : isStepActive(4) }">
                        <div class="step-header">
                            Choose Payment Amount
                            <img src="/icons/circle-tick.svg" class="tick" alt="tick icon" v-show="isStepDone(4)">
                            <img src="/icons/back.svg" class="back" alt="back icon" @click="goToPreviousStep" v-show="isStepActive(4)">
                        </div>
                        <div class="step-content">

                            <!-- content of four -->

                            <div class="action-btn">
                                <a href="javascript:void(0)" @click="goToNextStep">
                                    Continue
                                </a>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <div class="total-payment-row">
                        <div class="label">
                            Your Total Payment Will Be
                        </div>
                        <div class="total-payment">
                            $10.00
                        </div>
                    </div>
                    <div class="action-btn">
                        <a href="javascript:void(0)">
                            Pay Now
                        </a>
                    </div>
                </div>

            </div>
        </v-dialog>
        <!-- dialog -->

    </v-app>
</template>

<script>
    export default {
        name: "HireMeModal",
        data(){
            return{
                hireMeModal: true,
                currentStep:2,
                currentPaymentMethod:'Stripe',
                currentPaymentType: 'hourly',
                paymentMethods:[
                    {
                        name:'Stripe'
                    },
                    {
                        name:'PayPal'
                    }
                ]
            }
        },
        methods:{
            goToNextStep(){
                this.currentStep++;
            },
            goToPreviousStep(){
                this.currentStep--;
            },
            isStepActive(step){
                return step === this.currentStep ;
            },
            isStepDone(step){
                return true;
            },

            // step2
            setPaymentType(payment_type){
                this.currentPaymentType = payment_type;
            },
            isPaymentTypeActive(payment_type){
                return this.currentPaymentType === payment_type;
            }
        },
        computed:{

        }
    }
</script>

<style lang="scss" scoped>
    .hire-main-wrapper{
        height: 700px;
        background: white;
        border-radius: 15px;
        padding: 50px;
        display: flex;
        flex-direction: column;
        align-items: center;

        .steps-wrapper{
            width: 100%;
            border-bottom: 1.5px solid #F2F3FD;
            margin-bottom: 20px;

            .single-step-wrapper{
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

                &.active{
                    height: 200px;
                    box-shadow: 0px 10px 150px rgba(0, 16, 131, 0.05);

                    .step-header{
                        background: #B4B8DE;
                        color: white;
                    }
                }

                .step-header{
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

                    position: relative;
                    img{
                        position: absolute;
                        &.tick{
                            right: 28px;
                        }
                        &.back{
                            left: 28px;
                            &:hover{
                                cursor: pointer;
                            }
                        }
                    }
                }
                .step-content{

                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    justify-content: center;

                    .action-btn{
                       a{
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
                           margin-bottom: 20px;
                       }
                    }
                }

                .payment-types{
                    display: flex;
                    justify-content: space-between;
                    margin-bottom: 20px;
                    margin-top: 20px;


                    .single-payment-type{
                        width: 110px;
                        height: 45px;
                        background: white;
                        border: 2px solid #E6E8FC;
                        border-radius: 5px;
                        color: #888DB1;
                        font-size: 18px;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        margin-right: 20px;

                        &:last-child{
                            margin-right: 0;
                        }

                        &.active{
                            background: #888DB1;
                            color: white;
                            border: 0;
                        }

                        &:hover{
                            cursor: pointer;
                        }

                    }
                }

            }
        }

        .modal-footer{
            width:100%;

            .total-payment-row{
                display: flex;
                justify-content: space-between;
                align-items: center;

                .label{
                    font-size: 18px;
                    line-height: 24px;
                    color: #888DB1;
                }

                .total-payment{
                    width: 110px;
                    height: 45px;
                    border: 2px solid #E6E8FC;
                    border-radius: 5px;

                    display: flex;
                    align-items: center;
                    justify-content: center;

                    color: #001CE2;
                    font-size: 18px;
                    font-weight: 600;
                }
            }

            .action-btn{
                width: 100%;
                display: flex;
                justify-content: center;
                margin-top: 40px;

                a{
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
                }

            }
        }
    }
</style>