<template id="hireMeModal">
    <div data-app>
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
                                        <div v-show="paymentMethod.name === 'Stripe' " class="ml-2">
                                            <img src="/icons/stripe-icon.svg" alt="stripe icon">
                                        </div>
                                        <div v-show="paymentMethod.name === 'PayPal' " class="ml-2">
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
                            Choose payment Type
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
                            Select the Number of Hours
                            <img src="/icons/circle-tick.svg" class="tick" alt="tick icon" v-show="isStepDone(3)">
                            <img src="/icons/back.svg" class="back" alt="back icon" @click="goToPreviousStep" v-show="isStepActive(3)">
                        </div>
                        <div class="step-content">
                           
                            <div class="hours-select">
                                <img src="/icons/minus.svg" alt="subtract hours" @click="subtractHours">
                                <div class="hours">{{currentSelectedHours}} Hours</div>
                                <img src="/icons/plus.svg" alt="add hours" @click="addHours">
                            </div>

                            <div class="payment-types">
                                <div class="single-payment-type" :class="{'active' : isHoursTypeActive('week')}" @click="setHoursType('week')">
                                    Week
                                </div>
                                <div class="single-payment-type" :class="{'active' : isHoursTypeActive('month')}" @click="setHoursType('month')">
                                    Month
                                </div>
                            </div>
                            
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

                            <div class="percentage-select">
                                <div class="label">
                                    Pay %
                                </div>

                                <div class="percentage-input-wrapper">
                                    <span class="max" v-show="percentage < 90">100%</span>
                                    <span class="current" :style="{right: currentPosition + '%'}">{{percentage}}%</span>
                                    <input type="range" class="range" min="0" max="100" step="10" v-model="percentage" style="width: 100%;">
                                </div>
                            </div>


                            <div class="action-btn align-content-end">
                                <a href="javascript:void(0)" @click="goToNextStep">
                                    Continue
                                </a>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="hire-modal-footer">
                    <div class="total-payment-row">
                        <div class="label">
                            Your Total Payment Will Be
                        </div>
                        <div class="total-payment">
                            ${{totalPaymentAmount}}
                        </div>
                    </div>
                    <div class="action-btn">
                        <a href="javascript:void(0)" @click="reset">
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
        name: "HireMeModal",
        props: {
            hireMeModal: {
                type: Boolean,
            },
            closeHireMeModal: {
                type: Function,
            },
        },
        data(){
            return{
                currentStep:1,
                currentPaymentMethod:'Stripe',
                currentPaymentType: 'hourly',
                currentHoursType: 'week',
                paymentMethods:[
                    {
                        name:'Stripe'
                    },
                    {
                        name:'PayPal'
                    }
                ],
                // payment calculations:
                userHourlyRate: 10,
                percentage: 10,
                currentSelectedHours: 40,
                finishedSteps:[]
            }
        },
        methods:{
            goToNextStep(){
                if(this.currentStep > 4){
                    return;
                }
                this.finishedSteps.push(this.currentStep);
                this.currentStep++;
            },
            goToPreviousStep(){
                if(this.currentStep > 2){
                    return;
                }
                this.currentStep--;
            },
            isStepActive(step){
                return step === this.currentStep ;
            },
            isStepDone(step){
                return this.finishedSteps.includes(step);
            },

            // step 2
            setPaymentType(payment_type){
                this.currentPaymentType = payment_type;
            },
            isPaymentTypeActive(payment_type){
                return this.currentPaymentType === payment_type;
            },

            // step 3
            subtractHours(){
                if(this.currentSelectedHours < 10){
                    return;
                }
                this.currentSelectedHours-=5 ;

            },
            addHours(){
                if(this.currentSelectedHours > 1000){
                    return;
                }
                this.currentSelectedHours+=5 ;

            },
            isHoursTypeActive(hours_type){
                return this.currentHoursType === hours_type;
            },
            setHoursType(hours_type){
                this.currentHoursType = hours_type;
            },
            reset(){
                this.currentStep = 1 ;
                this.finishedSteps = [] ;
                this.currentSelectedHours = 40;
                this.closeModal();
            },
            closeModal(){

            }

        // step4


        },
        computed:{
            totalPaymentAmount(){
                return this.userHourlyRate * this.percentage/100 * this.currentSelectedHours;
            },
            currentPosition(){
                return  (100 - this.percentage -15)   ;
            }
        }
    }
</script>

<style lang="scss" scoped>
    .hire-main-wrapper{
        height: fit-content;
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

                &.active.three{
                    height: 270px;
                }

                &.active.four{
                    height: 270px;
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
                           &:hover{
                               text-decoration: none;
                           }
                       }
                    }
                }

                 /*step 2*/
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

                /*step 3*/

                .hours-select{
                    width: 100%;
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    margin-top: 20px;

                    .hours{
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
                    }

                    img{
                        height: 30px;
                        width: 30px;
                        box-shadow: 0px 4px 15px rgba(0, 28, 226, 0.07);
                        border-radius: 50%;
                        &:hover{
                            cursor: pointer;
                        }
                    }
                }

                /* step 4 */
                .percentage-select{
                    width: 100%;
                    display: flex;
                    align-items: center;
                    margin-top: 20px;
                    margin-bottom: 20px;
                    padding-left:20px;
                    padding-right:40px;


                    .label{
                        font-size: 16px;
                        color: #888DB1;
                        white-space: nowrap;
                    }

                    .percentage-input-wrapper{
                        position: relative;
                        width: 100%;

                        span{
                            position: absolute;
                            color: #001CE2;
                            &.max{
                                top: -14px;
                                right: -40px;
                            }
                            &.current{
                                top: -14px;
                            }
                        }
                    }

                }
            }
        }

        .hire-modal-footer{
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
                    &:hover{
                        text-decoration: none;
                    }
                }

            }
        }
    }
</style>