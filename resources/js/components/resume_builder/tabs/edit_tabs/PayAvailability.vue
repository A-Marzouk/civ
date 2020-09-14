<template>
    <v-app>
        <div style="width:100%;" class="main container pa-md-0 pa-sm-0 pa-3">
            <v-tabs class="resume-builder__tab-bar" hide-slider v-model="payTab" height="51">
                <v-tab
                        class="resume-builder__tab"
                        v-for="(tabName,i) in tabs"
                        :key="i"
                >{{tabName.replace('_',' ')}}
                </v-tab>
            </v-tabs>
            <v-card class="card-main pa-10 resume-builder__scroll pay-content" flat id="payContent">
                <v-tabs-items v-model="payTab">
                    <v-tab-item>
                        <v-container style="width: 100%;">
                            <v-form>
                                <v-row align="center">
                                    <v-col xl="3" lg="4" md="6" sm="6" cols="12">
                                        <v-select
                                                class="resume-builder__input civie-select"
                                                outlined
                                                placeholder="Select an option"
                                                :items="payFrequency"
                                                label="Frequency"
                                                color="#001CE2"
                                                @change="selectCurrentPayment(salary_frequency)"
                                                v-model="salary_frequency"
                                        >
                                            <button class="dropdown-icon icon" slot="append" @click.prevent>
                                                <svg-vue :icon="`dropdown-caret`"></svg-vue>
                                            </button>
                                        </v-select>
                                    </v-col>

                                    <v-col xl="3" lg="4" md="6" sm="6" cols="12">
                                        <v-text-field
                                                class="resume-builder__input civie-currency"
                                                outlined
                                                color="#001CE2"
                                                label="Amount"
                                                :error="!!errors.salary"
                                                :error-messages="errors.salary"
                                                v-model="currentPayment.salary"
                                        >
                                            <v-select
                                                    slot="append"
                                                    :items="currencies"
                                                    color="#001CE2"
                                                    v-model="currentPayment.currency"
                                                    outlined
                                                    class="mt-1"
                                            >
                                                <button class="dropdown-icon icon" slot="append" @click.prevent>
                                                    <svg-vue :icon="`dropdown-caret`"></svg-vue>
                                                </button>
                                            </v-select>
                                        </v-text-field>
                                    </v-col>

                                    <v-col xl="3" lg="4" md="6" sm="6" cols="12">
                                        <v-btn class="resume-builder__btn civie-btn filled btn-add-new"
                                               @click="updatePaymentInfo">Save
                                        </v-btn>
                                    </v-col>
                                </v-row>
                            </v-form>
                        </v-container>
                    </v-tab-item>
                    <v-tab-item>
                        <v-container style="width: 100%;">
                            <v-form>
                                <v-row align="center">
                                    <v-col xl="3" lg="4" md="6" sm="6" cols="12">
                                        <v-select
                                                class="resume-builder__input civie-select"
                                                outlined
                                                placeholder="Select an option"
                                                :items="hoursFrequency"
                                                @change="selectCurrentAvailability(availability_frequency)"
                                                label="Frequency"
                                                color="#001CE2"
                                                v-model="availability_frequency"
                                        >
                                            <button class="dropdown-icon icon" slot="append" @click.prevent>
                                                <svg-vue :icon="`dropdown-caret`"></svg-vue>
                                            </button>
                                        </v-select>
                                    </v-col>

                                    <v-col xl="3" lg="4" md="6" sm="6" cols="12">
                                        <v-text-field
                                                class="resume-builder__input civie-currency"
                                                outlined
                                                color="#001CE2"
                                                label="Hours"
                                                :error="!!errors.available_hours"
                                                :error-messages="errors.available_hours"
                                                v-model="currentAvailability.available_hours"
                                        >
                                        </v-text-field>
                                    </v-col>

                                    <v-col xl="3" lg="4" md="6" sm="6" cols="12">
                                        <v-btn class="resume-builder__btn civie-btn filled btn-add-new mt-md-0 mt-sm-0 mt-n5" @click="updateAvailabilityInfo">Save</v-btn>
                                    </v-col> 
                                </v-row>
                            </v-form>
                        </v-container>
                    </v-tab-item>
                </v-tabs-items>
            </v-card>
        </div>
    </v-app>
</template>

<script>
    import Slick from "vue-slick";

    export default {
        name: "PayAvailability",
        components: {
            Slick
        },
        data() {
            return {
                payTab: 0,
                salary_frequency: 'hourly',
                availability_frequency: 'weekly',
                errors: {},
                tabs: ["Payment", "Availability"],
                currencies: [
                    {
                        text: "USD",
                        value: "usd"
                    },
                    {
                        text: "EUR",
                        value: "eur"
                    },
                    {
                        text: "GBP",
                        value: "gbp"
                    },
                    {
                        text: "CAD",
                        value: "cad"
                    },
                    {
                        text: "COP",
                        value: "cop"
                    },
                    {
                        text: "INR",
                        value: "inr"
                    },

                ],
                payFrequency: [
                    {
                        text: "Hourly",
                        value: "hourly"
                    },
                    {
                        text: "Weekly",
                        value: "weekly"
                    },
                    {
                        text: "Monthly",
                        value: "monthly"
                    },
                    {
                        text: "Yearly",
                        value: "yearly"
                    }
                ],
                hoursFrequency: [
                    {
                        text: "Weekly",
                        value: "weekly"
                    },
                    {
                        text: "Monthly",
                        value: "monthly"
                    },
                    {
                        text: "Yearly",
                        value: "yearly"
                    }
                ],
                disabledInput: false,
                showCurrencyOptions: false,
                currentAvailability: {},
                currentPayment: {}
            };
        },
        computed: {
            paymentInfo() {
                let info = this.$store.state.user.payment_info;
                if (info) {
                    this.currentPayment = info[0];
                }
                return info;
            },
            availabilityInfo() {
                let info = this.$store.state.user.availability_info;
                if (info) {
                    this.currentAvailability = info[0];
                }
                return info;
            }
        },
        props: ["selectProps", "inputProps"],
        methods: {
            toggleSelect() {
                this.disabledSelect = !this.disabledSelect;
            },
            toggleInput() {
                this.disabledInput = !this.disabledInput;
            },

            updatePaymentInfo() {
                this.errors = {};

                axios.put("/api/user/payment-info", this.currentPayment)
                    .then( (response) => {
                        this.$store.dispatch("flyingNotification");
                    })
                    .catch(error => {
                        if (typeof error.response.data === "object") {
                            console.log(error.response.data.errors);
                            this.errors = error.response.data.errors;
                        } else {
                            this.errors = "Something went wrong. Please try again.";
                        }
                        this.$store.dispatch("flyingNotification", {
                            message: "Error",
                            iconSrc: "/images/resume_builder/error.png"
                        });
                    });

                axios.put("/api/user/availability-info", this.currentAvailability)
                    .then((response) => {
                        this.$store.dispatch("flyingNotification");
                    })
                    .catch(error => {
                        if (typeof error.response.data === "object") {
                            console.log(error.response.data.errors);
                            this.errors = error.response.data.errors;
                        } else {
                            this.errors = "Something went wrong. Please try again.";
                        }
                        this.$store.dispatch("flyingNotification", {
                            message: "Error",
                            iconSrc: "/images/resume_builder/error.png"
                        });
                    });
            },


            updateAvailabilityInfo() {
                this.errors = {};

                axios.put("/api/user/availability-info", this.currentAvailability)
                    .then((response) => {
                        this.$store.dispatch("flyingNotification");
                    })
                    .catch(error => {
                        if (typeof error.response.data === "object") {
                            console.log(error.response.data.errors);
                            this.errors = error.response.data.errors;
                        } else {
                            this.errors = "Something went wrong. Please try again.";
                        }
                        this.$store.dispatch("flyingNotification", {
                            message: "Error",
                            iconSrc: "/images/resume_builder/error.png"
                        });
                    });
            },

            selectCurrentPayment(frequency) {
                this.paymentInfo.forEach(payment => {
                    if (payment.salary_frequency.toLowerCase() === frequency.toLowerCase()) {
                        this.currentPayment = payment;
                    }
                });
            },


            selectCurrentAvailability(frequency) {
                this.availabilityInfo.forEach(availability => {
                    if (availability.available_hours_frequency === frequency) {
                        this.currentAvailability = availability;
                    }
                });
            }
        },

        mounted() {
            if(this.paymentInfo){
                this.selectCurrentPayment('hourly');
                this.selectCurrentAvailability('weekly');
            }
        }
    };
</script>

<style scoped lang="scss">
    @import "../../../../../sass/media-queries";
    .pay-content {
        height: 335px;
        background: #fff;
        box-shadow: 0px 5px 100px rgba(0, 16, 131, 0.1);
        padding: 50px;
        margin-bottom: 70px;
        scroll-behavior: smooth;
    }

    .card-main {
        box-shadow: 0px 5px 100px rgba(0, 16, 131, 0.1) !important;
        @media screen and (max-width: 1903px) {
            width: auto;
        }

        .btn-add-new {
            font-family: "Noto Sans" !important;
            width: 120px !important;
            height: 50px !important;
            font-size: 18px !important;
            font-weight: 500;
            box-shadow: 0px 5px 100px rgba(0, 16, 131, 0.1) !important;
            @media screen and (max-width: 767px) {
                width: 100px !important;
                height: 40px !important;
                font-size: 15px !important;
            }
        }
    }

    .error {
        color: red;
        margin-left: 5px;
    }
</style>
