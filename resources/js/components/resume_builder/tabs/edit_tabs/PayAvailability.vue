<template>
    <div class="pay-wrap">
        <div class="section-title">
            <div class="title-light">Add</div>
            <h2>Pay Availability</h2>
        </div>
        <div class="section-body-wrapper">

            <div class="rates">
                <div class="hourly-rate">
                    <div class="title">
                        Hourly rate
                    </div>
                    <div class="pay-input">
                        <label for="hourly-rate">My rate is: (USD)</label>
                        <div class="input_wselect">
                            <input type="number" min="3" max="100000" step="1" id="hourly-rate" v-model="paymentInfo.salary" @blur="updatePaymentInfo('auto')">
                            <div class="sel-wrap">
                                <div class="sel-wrap-input" @click="showCurrencyOptions = !showCurrencyOptions">
                                    <input type="text" id="currency_option" disabled placeholder="usd" v-model="currency.title">
                                    <img src="/images/resume_builder/arrow-down.png" alt="arrow" :class="{'toggled':showCurrencyOptions}">
                                </div>
                                <div class="sel-wrap-options" v-show="showCurrencyOptions">
                                    <div v-for="(currency,index) in currencyList" :key="index + '_currency'" @click="selectCurrency(currency)">
                                        {{currency}}
                                    </div>
                                </div>
                            </div>
                            <a href="#" class="save-option"><img src="/images/resume_builder/mark-white.svg" alt=""></a>
                        </div>
                        

                        
                        <div class="error" v-if="errors.salary">
                            {{ Array.isArray(errors.salary) ? errors.salary[0] : errors.salary}}
                        </div>
                    </div>

                    <div class="rate-per">
                        <div :class="{active : paymentInfo.salary_frequency === 'monthly'}" @click="updateSalaryFrequency('monthly')">
                            Monthly
                        </div>
                        <div :class="{active : paymentInfo.salary_frequency === 'hourly'}" @click="updateSalaryFrequency('hourly')">
                            Hourly
                        </div>
                        <div :class="{active : paymentInfo.salary_frequency === 'yearly'}" @click="updateSalaryFrequency('yearly')">Yearly</div>
                        <div :class="{active : paymentInfo.salary_frequency === 'weekly'}" @click="updateSalaryFrequency('weekly')">Weekly</div>
                    </div>
                    <div class="rate-per-tab">
                        <div class="nav-scrollbox">
                            <a href="#" @click.prevent="prevRate"><img src="/images/resume_builder/arrow-left.svg" alt=""></a>
                            <a href="#" @click.prevent="nextRate"><img src="/images/resume_builder/arrow-right.svg" alt=""></a>
                        </div>  
                        <slick ref="slickRate" :options="slickOptions" class="slider-rate">
                            <div :class="{active : paymentInfo.salary_frequency === 'monthly'}" class="item-slide" @click="updateSalaryFrequency('monthly')">Monthly</div>
                            <div :class="{active : paymentInfo.salary_frequency === 'hourly'}" class="item-slide" @click="updateSalaryFrequency('hourly')">Hourly</div>
                            <div :class="{active : paymentInfo.salary_frequency === 'yearly'}" class="item-slide" @click="updateSalaryFrequency('yearly')">Yearly</div>
                            <div :class="{active : paymentInfo.salary_frequency === 'weekly'}" class="item-slide" @click="updateSalaryFrequency('weekly')">Weekly</div>
                        </slick>              
                    </div>
                </div>
                <div class="hourly-rate">
                    <div class="title">
                        I am available for
                    </div>
                    <div class="pay-input">
                        <label for="available">Available working hours:</label>
                        <div class="input_wselect">
                            <input type="text" id="available" value="6 hours"  v-model="paymentInfo.available_hours" @blur="updatePaymentInfo('auto')">
                            <a href="#" class="save-option"><img src="/images/resume_builder/mark-white.svg" alt=""></a>
                        </div>
                        
                        <div class="error" v-if="errors.available_hours">
                            {{ Array.isArray(errors.available_hours) ? errors.available_hours[0] : errors.available_hours}}
                        </div>
                    </div>

                    <div class="rate-per">
                        <div  :class="{active : paymentInfo.available_hours_frequency === 'weekly'}" @click="updateHoursAvailabilityFrequency('weekly')">Weekly</div>
                        <div :class="{active : paymentInfo.available_hours_frequency === 'monthly'}" @click="updateHoursAvailabilityFrequency('monthly')">Monthly</div>
                        <div :class="{active : paymentInfo.available_hours_frequency === 'yearly'}" @click="updateHoursAvailabilityFrequency('yearly')">Yearly</div>
                    </div>
                    <div class="rate-per-tab">
                        <div class="nav-scrollbox">
                            <a href="#" @click.prevent="prevHourFrequency"><img src="/images/resume_builder/arrow-left.svg" alt=""></a>
                            <a href="#" @click.prevent="nextHourFrequency"><img src="/images/resume_builder/arrow-right.svg" alt=""></a>
                        </div>  
                        <slick ref="slickAvailableHours" :options="slickOptions" class="slider-rate">
                            <div  :class="{active : paymentInfo.available_hours_frequency === 'weekly'}" class="item-slide" @click="updateHoursAvailabilityFrequency('weekly')">Weekly</div>
                            <div :class="{active : paymentInfo.available_hours_frequency === 'monthly'}" class="item-slide" @click="updateHoursAvailabilityFrequency('monthly')">Monthly</div>
                            <div :class="{active : paymentInfo.available_hours_frequency === 'yearly'}" class="item-slide" @click="updateHoursAvailabilityFrequency('yearly')">Yearly</div>
                        </slick>              
                    </div>
                </div>
            </div>

            <div class="save-btn NoDecor">
                <a href="javascript:void(0)" @click="updatePaymentInfo('manual')">
                    <img src="/images/resume_builder/availability/Icon material-save.png" alt="save icon">
                    Save all information
                </a>
            </div>
        </div>
    </div>
</template>

<script>
    import Slick from 'vue-slick';
    export default {
        name: "PayAvailability",
        components: {
            Slick
        },
        data(){
            return{
                errors:{},
                currency:{
                    'title': 'usd'
                },
                currencyList:['usd','eur'],
                showCurrencyOptions: false,
                slickOptions: {
                    infinite: false,
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    appendDots: '.nav-scrollbox',
                    arrows: false,
                    // responsive: [
                    //     {
                    //         breakpoint: 480,
                    //         settings: {
                    //             slidesToShow: 1,
                    //             slidesToScroll: 1
                    //         }
                    //     }
                    // ]
                }                 
            }
        },
        computed: {
            paymentInfo() {
                return this.$store.state.user.payment_info;
            }
        },

        methods:{
            updatePaymentInfo(savingType){
                this.errors = {};
                axios.put('/api/user/payment-info',this.paymentInfo)
                    .then((response) => {
                        savingType === 'manual' ? this.$store.dispatch('fullScreenNotification') :  this.$store.dispatch('flyingNotification')
                    })
                    .catch((error) => {
                        if (typeof error.response.data === 'object') {
                            console.log(error.response.data.errors);
                            this.errors = error.response.data.errors;
                        } else {
                            this.errors = 'Something went wrong. Please try again.';
                        }
                    });
            },
            updateSalaryFrequency(frequency){
                this.paymentInfo.salary_frequency = frequency ;
                this.updatePaymentInfo('auto');
            },
            updateHoursAvailabilityFrequency(frequency){
                this.paymentInfo.available_hours_frequency = frequency ;
                this.updatePaymentInfo('auto');
            },
            selectCurrency(currency){
                this.currency.title = currency;
                this.showCurrencyOptions = false;
            },
            nextRate() {
                this.$refs.slickRate.next();
            },
            prevRate() {
                this.$refs.slickRate.prev();
            },
            nextHourFrequency() {
                this.$refs.slickAvailableHours.next();
            },
            prevHourFrequency() {
                this.$refs.slickAvailableHours.prev();
            }
        }
    }
</script>

<style scoped lang="scss">

    @import '../../../../../sass/media-queries';


    .pay-wrap{

        width: 100%; 

        @include lt-md {
            width: 100%;
        }
    }

    .section-body-wrapper{
        width: 1337px;
        display: flex;
        flex-direction: column;
        align-items: center;

        @include lt-md {
            width: 100%;
        }

        .rates{
            display: flex;
            width:100%;
            margin-top: 85px;
            justify-content: space-between;

            @include lt-md {
                flex-direction: column;
                max-width: 414px;
                margin-top: 3.5em;
            }

            .hourly-rate{

                @include lt-md {
                    margin-bottom: 3em;
                }

                .title{
                    font-weight: bold;
                    font-size: 40px;
                    text-align: center;
                    color: #001ce2;
                    padding-bottom:36px;
                    border-bottom: 1px solid #001ce2;

                    @include lt-md {
                        font-size: 33px;
                        padding-bottom: 0;
                        border-bottom: 0;
                    }
                }
                .pay-input{
                    margin-top:35px;
                    display: flex;
                    flex-direction: column;

                    @include lt-md {
                        margin-top: 0;
                    }


                    input,select {
                        width: 490px;
                        height: 80px;
                        border: 1px solid #001CE2;
                        border-radius: 10px;
                        opacity: 1;
                        padding-left: 18px;

                        @include lt-md {
                            max-width: 100%;
                            max-height: 60px;
                        }

                    }
                    input:focus,select:focus {
                        outline: none;
                    }

                    label {
                        text-align: left;
                        font: 600 26px Noto Sans;
                        letter-spacing: 0;
                        color: #001CE2;
                        opacity: 1;
                        margin-bottom:10px;

                        @include lt-md {
                            text-align: center;
                            font-size: 15px;
                            margin-bottom: 28px;
                        }

                    }

                    .input_wselect{
                        position: relative;

                        .sel-wrap{
                            position: absolute;
                            width: 74px;
                            height: 46px;
                            background: #ECECEC;
                            color: #505050;
                            font-size: 11px;
                            text-transform: uppercase;
                            right: 78px;
                            top: 20%;
                            padding: 0px;
                            border: 0px;
                            border-radius: 5px;

                            @include lt-md {
                                width: 55.5px;
                                height: 32.8px;
                                right: 64.6px;
                            }

                            .sel-wrap-input{
                                position: relative;
                                
                                img{
                                    width: 13.8px;
                                    height: 6.9px;
                                    position: absolute;
                                    top: 42%;
                                    right: 7px;

                                    &.toggled{
                                        -webkit-transform: scaleY(-1);
                                        transform: scaleY(-1);
                                    }

                                    @include lt-md {
                                        width: 10.3px;
                                        height: 5px;
                                    }                                    
                                }

                                ::placeholder {
                                    opacity: .3;
                                    font-weight: normal;
                                }

                                input{
                                    
                                    color: #505050;
                                    font-size: 18px;
                                    line-height: 46px;
                                    border: 0;
                                    width: 100%;
                                    height: auto;
                                    border-radius: 5px;
                                    padding: 0px 11px;
                                    text-transform: uppercase;

                                    &:focus{
                                        outline: none !important;
                                    }
                                    &:hover{
                                        cursor: pointer;
                                    }

                                    @include lt-md {
                                        line-height: 32px;
                                        font-size: 11px;
                                    }                                  
                                }

                            }

                            .sel-wrap-options{
                                background: #fff;
                                position: absolute;
                                box-shadow: 0px 1px 5px #ececec;
                                opacity: 1;
                                left: 0px;
                                margin-top: 4px;
                                width: 75px;
                                height: auto;
                                border-radius: 0px 0px 5px 5px;
                                z-index: 10;

                                @include lt-md {
                                    width: 60px;
                                    margin-top: 2px;
                                }
                                

                                div{
                                    font-size: 18px;
                                    padding: 0px 10px;
                                    height: 30px;
                                    line-height: 30px;

                                    &:hover{
                                        cursor: pointer;
                                        background: #ECECEC;
                                    }
                                    &:last-child:hover{
                                        border-radius:0 0 5px 5px;
                                    }

                                    @include lt-md {
                                        font-size: 12px;
                                        padding: 0px 5px;
                                        height: 25px;
                                        line-height: 25px;
                                    }                                    
                                }
                            }
                        }

                        .save-option{
                            width: 47px;
                            height: 46px;
                            background: #001CE2;
                            border-radius: 7px;
                            position: absolute;
                            display: inline-flex;
                            right: 20px;
                            top: 20%;
                            justify-content: center;

                            @include lt-md {
                                max-width: 32.8px;
                                max-height: 32.8px;
                                right: 16px;
                            }


                            img{
                                max-width: 16.46px;
                            }
                        }
                        
                    }
                }

                .rate-per{
                    display: flex;
                    justify-content: space-between;
                    margin-top:46px;

                    @include lt-md{
                        display: none;
                    }

                    div{
                        font-weight: 500;
                        font-size: 27px;
                        text-align: left;
                        color: #c9cff8;
                    }

                    div.active{
                        color:#001CE2;
                        font-weight: 700;
                    }

                    div:hover{
                        cursor: pointer;
                    }
                }

                .rate-per-tab{
                    max-width: 320px;
                    margin: 17px auto 0 auto;
                    text-align: center;

                    @include gt-sm{
                        display: none;
                    }
                    @include lt-md {
                        display: block;
                    }
                    @include lt-sm {
                        max-width: 240px;
                        margin-top: 29px;
                    }
                    
                    .slider-rate{
                        border-radius: 24px;
                        box-shadow: 0px 9px 10px rgba(0, 0, 0, 0.03);
                        min-height: 71px;
                        line-height: 70px;

                        .item-slide{
                            text-align: center;
                            font-size: 13px;
                            font-weight: bold;
                            color: #C9CFF8;

                            @include lt-sm {
                                font-size: 11px;
                            }

                            &.active{
                                color: #001CE2;
                                font-size: 18px;

                                @include lt-sm {
                                    font-size: 14px;
                                }

                            }
                        }

                        @include lt-sm {
                            overflow: hidden;
                            min-height: 53px;
                            line-height: 50px;
                        }


                    }
                    .nav-scrollbox{
                        position: relative;

                        >a{
                            border-radius: 24px;
                            box-shadow: 0px 9px 10px rgba(0, 0, 0, 0.03);
                            min-height: 61px;
                            width: 28.3px;
                            display: flex;
                            justify-content: center;
                            position: absolute;
                            top: 10px;


                            &:nth-child(1){
                                left: -40px;
                            
                                @include lt-sm {
                                    left: -32px;
                                    top: 4px;
                                }
                            }
                            &:nth-child(2){
                                right: -40px;

                                @include lt-sm {
                                    right: -32px;
                                    top: 4px;
                                }
                            }

                            @include lt-sm {
                                width: 21px;
                                min-height: 46px;
                            }
                        }
                    }
                }
            }

        }
        .save-btn{
            margin-top: 63px;
            a {
                display: flex;
                justify-content: center;
                align-items: center;
                width: 239px;
                height: 63px;

                background: #001CE2 0% 0% no-repeat padding-box;
                border-radius: 8px;

                font: 600 18px Noto Sans;
                letter-spacing: 0;
                color: #FFFFFF;
                opacity: 1;

                img {
                    width: 18px;
                    height: 18px;
                    margin-right: 12px;
                }
            }
        }
        
    }

    .error {
        color: red;
        margin-left: 5px;
    }
</style>
