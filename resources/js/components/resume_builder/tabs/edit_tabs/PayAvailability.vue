<template>
    <div>
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
                        <input type="number" min="3" max="100000" step="1" id="hourly-rate" v-model="paymentInfo.salary" @blur="updatePaymentInfo('auto')">
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
                </div>
                <div class="hourly-rate">
                    <div class="title">
                        I am available for
                    </div>
                    <div class="pay-input">
                        <label for="available">Available working hours:</label>
                        <input type="text" id="available" value="6 hours"  v-model="paymentInfo.available_hours" @blur="updatePaymentInfo('auto')">
                        <div class="error" v-if="errors.available_hours">
                            {{ Array.isArray(errors.available_hours) ? errors.available_hours[0] : errors.available_hours}}
                        </div>
                    </div>

                    <div class="rate-per">
                        <div  :class="{active : paymentInfo.available_hours_frequency === 'weekly'}" @click="updateHoursAvailabilityFrequency('weekly')">Weekly</div>
                        <div :class="{active : paymentInfo.available_hours_frequency === 'monthly'}" @click="updateHoursAvailabilityFrequency('monthly')">Monthly</div>
                        <div :class="{active : paymentInfo.available_hours_frequency === 'yearly'}" @click="updateHoursAvailabilityFrequency('yearly')">Yearly</div>
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
    export default {
        name: "PayAvailability",
        data(){
            return{
                errors:{}
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
            }
        }
    }
</script>

<style scoped lang="scss">
    .section-body-wrapper{
        width: 1337px;
        display: flex;
        flex-direction: column;
        align-items: center;

        .rates{
            display: flex;
            width:100%;
            margin-top: 85px;
            justify-content: space-between;
            .hourly-rate{
                .title{
                    font-weight: bold;
                    font-size: 40px;
                    text-align: center;
                    color: #001ce2;
                    padding-bottom:36px;
                    border-bottom: 1px solid #001ce2;
                }
                .pay-input{
                    margin-top:35px;
                    display: flex;
                    flex-direction: column;

                    input,select {
                        width: 490px;
                        height: 80px;
                        border: 1px solid #001CE2;
                        border-radius: 10px;
                        opacity: 1;
                        padding-left: 18px;
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
                    }
                }

                .rate-per{
                    display: flex;
                    justify-content: space-between;
                    margin-top:46px;
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
