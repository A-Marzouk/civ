<template>
    <div>
        <div style="width:100%;" class="main-container pay-class pa-md-0 pa-sm-0 pa-3">
            <v-tabs class="resume-builder__tab-bar" hide-slider v-model="payTabOrder" height="51">
                <v-tab
                        class="resume-builder__tab"
                        v-for="(tabName,i) in tabs"
                        :key="i"
                >{{tabName.replace('_',' ')}}
                </v-tab>
            </v-tabs>
            <div>
                <v-card class="card-main pa-10 resume-builder__scroll pay-content" flat id="payContent">
                    <v-tabs-items v-model="payTabOrder">
                        <v-tab-item>
                            <v-container style="width: 100%;" v-if="currentPayment">
                                <v-form>
                                    <v-row align="center" class="align-items-center">
                                        <v-col xl="3" lg="4" md="6" sm="6" cols="12">
                                            <v-select
                                                    class="resume-builder__input civie-select"
                                                    outlined
                                                    placeholder="Select an option"
                                                    :items="payFrequency"
                                                    label="Frequency"
                                                    color="#001CE2"
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
                                        <v-col xl="1" lg="1" md="1" sm="1" cols="12">
                                            <v-tooltip top>
                                                <template v-slot:activator="{ on, attrs }">
                                                    <div class="resume-builder__action-buttons-container">
                                                        <v-btn class="btn-icon civie-btn" depressed v-on="on"
                                                               v-bind="attrs"
                                                               @click="toggleVisibility">
                                                            <svg-vue icon="eye-icon" class="icon"
                                                                     :class="{'visible' : currentPayment.is_public}"></svg-vue>
                                                        </v-btn>
                                                    </div>
                                                </template>
                                                <span>Visibility</span>
                                            </v-tooltip>
                                        </v-col>
                                        <v-col xl="3" lg="4" md="6" sm="6" cols="12">
                                            <v-btn
                                                    class="resume-builder__btn civie-btn filled btn-add-new"
                                                    @click="updatePaymentInfo"
                                            >Save
                                            </v-btn>
                                        </v-col>
                                    </v-row>
                                </v-form>
                            </v-container>
                        </v-tab-item>
                        <v-tab-item>
                            <v-container style="width: 100%;" v-if="currentAvailability">
                                <v-form>
                                    <v-row align="center" class="align-items-center">
                                        <v-col xl="3" lg="4" md="6" sm="6" cols="12">
                                            <v-select
                                                    class="resume-builder__input civie-select"
                                                    outlined
                                                    placeholder="Select an option"
                                                    :items="hoursFrequency"
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
                                            ></v-text-field>
                                        </v-col>
                                        <v-col xl="1" lg="1" md="1" sm="1" cols="12">
                                            <v-tooltip top>
                                                <template v-slot:activator="{ on, attrs }">
                                                    <div class="resume-builder__action-buttons-container">
                                                        <v-btn class="btn-icon civie-btn" depressed v-on="on"
                                                               v-bind="attrs"
                                                               @click="toggleAvailabilityVisibility">
                                                            <svg-vue icon="eye-icon" class="icon"
                                                                     :class="{'visible' : currentAvailability.is_public}"></svg-vue>
                                                        </v-btn>
                                                    </div>
                                                </template>
                                                <span>Visibility</span>
                                            </v-tooltip>
                                        </v-col>
                                        <v-col xl="3" lg="4" md="6" sm="6" cols="12">
                                            <v-btn
                                                    class="resume-builder__btn civie-btn filled btn-add-new"
                                                    @click="updateAvailabilityInfo"
                                            >Save
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
                                                    :items="paymentMethodItems"
                                                    label="Payment Method"
                                                    color="#001CE2"
                                                    :error="!!errors.name"
                                                    :error-messages="errors.name"
                                                    v-model="paymentMethodObject.name"
                                            >
                                                <button class="dropdown-icon icon" slot="append" @click.prevent>
                                                    <svg-vue :icon="`dropdown-caret`"></svg-vue>
                                                </button>
                                            </v-select>
                                        </v-col>

                                        <v-col xl="3" lg="4" md="6" sm="6" cols="12">
                                            <v-text-field
                                                    class="resume-builder__input civie-input"
                                                    outlined
                                                    color="#001CE2"
                                                    :class="{'resume-builder__input--disabled': false}"
                                                    label="Payment Link"
                                                    placholder="https://pay.stripe.com/john-doe"
                                                    :error="!!errors.link"
                                                    :error-messages="errors.link"
                                                    v-model="paymentMethodObject.link"
                                            ></v-text-field>
                                        </v-col>
                                        <v-col xl="3" lg="4" md="6" sm="6" cols="12">
                                            <v-btn @click="addPaymentMethod"
                                                   class="resume-builder__btn civie-btn filled btn-add-new mt-md-0 mt-sm-0 mt-n5 btn-add-new-custom"
                                            >
                                                {{isEditing ? 'Update' : 'Add'}}
                                            </v-btn>
                                            <v-btn v-if="isEditing" @click="clearPaymentMethod"
                                                   class="resume-builder__btn civie-btn filled btn-add-new mt-md-0 mt-sm-0 mt-n5 btn-add-new-custom">
                                                Cancel
                                            </v-btn>
                                        </v-col>
                                    </v-row>
                                </v-form>

                                <div class="stripe-btn">
                                    <a href="javascript:void(0)" @click="connectToStripe">Connect to stripe</a>
                                    <span class="status true" v-if="stripeAccountStatus">Connected</span>
                                    <span class="status false" v-else>Not Connected</span>
                                </div>

                            </v-container>
                            <draggable
                                    class="links-items"
                                    v-model="paymentMethods"
                                    @start="drag=true"
                                    @end="drag=false"
                                    handle=".mover"
                            >
                                <div
                                        class="link-item"
                                        v-for="paymentMethod in paymentMethods"
                                        :key="paymentMethod.id"
                                        v-if="paymentMethod.name !== 'stripe_connected'"
                                        :class="{'half-opacity' : !paymentMethod.is_active}"
                                >
                                    <div class="link-data">
                                        <div class="mover">
                                            <img src="/images/new_resume_builder/three-dots.svg" alt="mover icon"/>
                                        </div>
                                        <div class="link-text">
                                            <span>{{paymentMethod.link}}</span>
                                        </div>
                                    </div>
                                    <div class="action-btns">
                                        <div class="resume-builder__action-buttons-container">
                                            <v-tooltip top>
                                                <template v-slot:activator="{ on, attrs }">
                                                    <v-btn class="btn-icon civie-btn" depressed v-on="on" v-bind="attrs"
                                                           @click="togglePaymentMethodPrimarity(paymentMethod)">
                                                        <svg-vue icon="tick-icon" class="icon"
                                                                 :class="{'visible' : paymentMethod.is_primary}"></svg-vue>
                                                    </v-btn>
                                                </template>
                                                <span>Make Primary</span>
                                            </v-tooltip>

                                            <v-tooltip top>
                                                <template v-slot:activator="{ on, attrs }">
                                                    <v-btn class="btn-icon civie-btn" depressed v-on="on" v-bind="attrs"
                                                           @click="togglePaymentMethod(paymentMethod)">
                                                        <svg-vue icon="eye-icon" class="icon"
                                                                 :class="{'visible' : paymentMethod.is_active}"></svg-vue>
                                                    </v-btn>
                                                </template>
                                                <span>Hide/Show</span>
                                            </v-tooltip>

                                            <v-btn class="btn-icon civie-btn" depressed
                                                   @click="editPaymentMethod(paymentMethod)">
                                                <svg-vue
                                                        icon="edit-icon"
                                                        class="icon"
                                                        :class="{'visible' : paymentMethod.id === paymentMethodObject.id}"
                                                ></svg-vue>
                                            </v-btn>
                                            <v-btn class="btn-icon civie-btn" depressed
                                                   @click="deletePaymentMethod(paymentMethod)">
                                                <svg-vue icon="trash-delete-icon" class="icon"></svg-vue>
                                            </v-btn>
                                        </div>
                                    </div>
                                </div>
                            </draggable>
                        </v-tab-item>
                    </v-tabs-items>
                </v-card>
            </div>
        </div>
    </div>
</template>

<script>
    import Slick from "vue-slick";
    import draggable from "vuedraggable";

    export default {
        name: "pay-availability",
        components: {
            Slick,
            draggable,
        },
        data() {
            return {
                tabs: ["Rate Card", "Availability", "Payment Methods"],
                payTabOrder: 0,
                errors: {},

                // first tab | rate card
                salary_frequency: "hourly",
                payFrequency: [
                    {
                        text: "Hourly",
                        value: "hourly",
                    },
                    {
                        text: "Weekly",
                        value: "weekly",
                    },
                    {
                        text: "Monthly",
                        value: "monthly",
                    },
                    {
                        text: "Yearly",
                        value: "yearly",
                    },
                ],
                currencies: [
                    {
                        text: "USD",
                        value: "usd",
                    },
                    {
                        text: "EUR",
                        value: "eur",
                    },
                    {
                        text: "GBP",
                        value: "gbp",
                    },
                    {
                        text: "CAD",
                        value: "cad",
                    },
                    {
                        text: "COP",
                        value: "cop",
                    },
                    {
                        text: "INR",
                        value: "inr",
                    },
                ],


                // second tab | availability:
                hoursFrequency: [
                    {
                        text: "Weekly",
                        value: "weekly",
                    },
                    {
                        text: "Monthly",
                        value: "monthly",
                    },
                    {
                        text: "Yearly",
                        value: "yearly",
                    },
                ],
                availability_frequency: "weekly",


                // third tab | payment methods:
                paymentMethodItems: ['PayPal'],

                paymentMethodObject: {
                    id: '',
                    name: '',
                    link: '',
                    order: 1,
                    is_active: true,
                    is_primary: false,
                },

                stripe_connected_status: false
            };
        },
        computed: {
            currentPayment: {
                get() {
                    let info = this.$store.state.user.payment_info;
                    if (info) {
                        return info.find(paymentInfo => {
                            return paymentInfo.salary_frequency === this.salary_frequency
                        });
                    }
                }
            },
            currentAvailability: {
                get() {
                    let info = this.$store.state.user.availability_info;
                    if (info) {
                        return info.find(availabilityInfo => {
                            return availabilityInfo.available_hours_frequency === this.availability_frequency
                        });
                    }
                }
            },
            paymentMethods: {
                get() {
                    return this.$store.state.user.payment_methods;
                },
                set(paymentMethods) {
                    this.$store.commit("updatePaymentMethods", paymentMethods);
                }
            },
            stripeAccountStatus: {
                get() {
                    let payment_methods = this.$store.state.user.payment_methods;

                    if (payment_methods) {
                        let status = false;

                        payment_methods.forEach((method) => {
                            if (method.stripe_account_id !== null) {
                                status = true;
                            }
                        });

                        return status;
                    }

                },
            },
            isEditing() {
                return (this.paymentMethodObject.id !== "")
            }
        },

        methods: {
            updatePaymentInfo() {
                this.errors = {};

                axios.put("/api/user/payment-info", this.currentPayment)
                    .then((response) => {
                        this.$store.dispatch("flyingNotification");
                    })
                    .catch((error) => {
                        if (typeof error.response.data === "object") {
                            console.log(error.response.data.errors);
                            this.errors = error.response.data.errors;
                        } else {
                            this.errors = "Something went wrong. Please try again.";
                        }
                        this.$store.dispatch("flyingNotification", {
                            message: "Error",
                            iconSrc: "/images/resume_builder/error.png",
                        });
                    });
            },
            updateAvailabilityInfo() {
                this.errors = {};

                axios.put("/api/user/availability-info", this.currentAvailability)
                    .then((response) => {
                        this.$store.dispatch("flyingNotification");
                    })
                    .catch((error) => {
                        if (typeof error.response.data === "object") {
                            console.log(error.response.data.errors);
                            this.errors = error.response.data.errors;
                        } else {
                            this.errors = "Something went wrong. Please try again.";
                        }
                        this.$store.dispatch("flyingNotification", {
                            message: "Error",
                            iconSrc: "/images/resume_builder/error.png",
                        });
                    });
            },
            addPaymentMethod() {
                this.paymentMethodObject.user_id = this.$store.state.user.id;

                axios.post("/api/user/payment-methods", this.paymentMethodObject)
                    .then((response) => {
                        if (!this.isEditing) {
                            let newPaymentMethod = response.data.data;
                            this.paymentMethods.push(newPaymentMethod);
                        } else {
                            this.paymentMethods.forEach((paymentMethod, index) => {
                                if (paymentMethod.id === response.data.data.id) {
                                    this.paymentMethods.splice(index, 1, response.data.data);
                                }
                            });
                        }

                        this.clearPaymentMethod();
                        this.$store.dispatch("flyingNotification");
                    })
                    .catch(error => {
                        if (typeof error.response.data === "object") {
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
            editPaymentMethod(paymentMethod) {
                this.paymentMethodObject = {
                    id: paymentMethod.id,
                    name: paymentMethod.name,
                    link: paymentMethod.link,
                    is_active: paymentMethod.is_active,
                    is_primary: paymentMethod.is_primary,
                    order: paymentMethod.order,
                    user_id: paymentMethod.user_id
                };
            },
            togglePaymentMethod(paymentMethod) {
                paymentMethod.is_active = !paymentMethod.is_active;
                axios.post("/api/user/payment-methods", paymentMethod)
                    .then(() => {
                        this.$store.dispatch("flyingNotification");
                    })
                    .catch((error) => {
                        if (typeof error.response.data === "object") {
                            this.errors.edit = error.response.data.errors;
                        } else {
                            this.errors.edit = "Something went wrong. Please try again.";
                        }
                        this.$store.dispatch("flyingNotification", {
                            message: "Error",
                            iconSrc: "/images/resume_builder/error.png",
                        });
                    });
            },
            togglePaymentMethodPrimarity(paymentMethod) {
                if (paymentMethod.is_primary) {
                    return
                }
                axios.post("/api/user/payment-methods/make-primary", paymentMethod)
                    .then(() => {
                        this.paymentMethods.forEach((pm) => {
                            pm.is_primary = false;
                        });
                        paymentMethod.is_primary = true;
                        this.$store.dispatch("flyingNotification");
                    })
                    .catch((error) => {
                        if (typeof error.response.data === "object") {
                            this.errors.edit = error.response.data.errors;
                        } else {
                            this.errors.edit = "Something went wrong. Please try again.";
                        }
                        this.$store.dispatch("flyingNotification", {
                            message: "Error",
                            iconSrc: "/images/resume_builder/error.png",
                        });
                    });
            },
            deletePaymentMethod(paymentMethod) {
                if (
                    !confirm("Do you want to delete this Payment Method [" + paymentMethod.name + "] ?")
                ) {
                    return;
                }
                axios
                    .delete("/api/user/payment-methods/" + paymentMethod.id)
                    .then(response => {
                        this.$store.dispatch("flyingNotificationDelete");
                        this.paymentMethods.forEach((paymentMethod, index) => {
                            if (paymentMethod.id === response.data.data.id) {
                                this.paymentMethods.splice(index, 1);
                            }
                        });
                    })
                    .catch(error => {
                        console.log(error);
                    });
            },
            clearPaymentMethod() {
                this.paymentMethodObject = {
                    id: '',
                    name: '',
                    link: '',
                    order: 1,
                    is_active: true,
                    is_primary: false,
                }
            },
            toggleVisibility() {
                this.currentPayment.is_public = !this.currentPayment.is_public;
            },
            toggleAvailabilityVisibility() {
                this.currentAvailability.is_public = !this.currentAvailability.is_public;
            },

            // stripe connected account:
            connectToStripe() {
                axios.post('/stripe/onboard-user')
                    .then((res) => {
                        window.location = res.data.url;
                    })
                    .catch((err) => {
                        console.log(err)
                    })
            }
        },

        mounted() {


        },
    };
</script>

<style scoped lang="scss">
    @import "../../../../../sass/media-queries";

    .pay-content {
        height: 450px;
        background: #fff;
        box-shadow: 0px 5px 100px rgba(0, 16, 131, 0.1);
        padding: 50px;
        margin-bottom: 70px;
        scroll-behavior: smooth;
    }

    .pay-class {
        @include lt-sm {
            max-width: 94%;
            margin-right: auto;
            margin-left: auto;
        }
    }

    .card-main {
        box-shadow: 0px 5px 100px rgba(0, 16, 131, 0.1) !important;
        @media screen and (max-width: 1903px) {
            width: auto;
        }

        .btn-add-new-custom {
            @media screen and (min-width: 1264px) {
                margin-top: 28px !important;
            }
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

    .links-items {
        max-width: 714px;
        width: 100%;

        .link-item {
            width: 100%;
            height: 50px;
            display: flex;
            margin-bottom: 30px;
            align-items: center;
            justify-content: space-between;
            background: white;
            box-shadow: 0 5px 20px rgba(0, 16, 131, 0.15);

            .link-data {
                display: flex;
                height: 50px;
                max-width: calc(100% - 125px);

                .mover {
                    width: 50px;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    border-right: 1px solid #e6e8fc;

                    img {
                        width: 12px;
                        height: 16px;
                    }

                    &:hover {
                        cursor: grab;
                    }

                    @include lt-sm {
                        width: 22px;
                    }
                }

                .link-text {
                    display: flex;
                    align-items: center;
                    margin-left: 10px;
                    font-size: 18px;
                    line-height: 25px;
                    color: #888db1;
                    overflow: hidden;
                    white-space: nowrap;
                    text-overflow: ellipsis;

                    img {
                        width: 45px;
                        height: auto;
                        // TODO: Don't leave spaces in the image
                    }

                    span {
                        padding-right: 10px;
                        display: block;
                        overflow: hidden;
                        white-space: nowrap;
                        text-overflow: ellipsis;
                    }

                    @include lt-sm {
                        font-size: 13px;
                        margin-left: 0;
                    }
                }
            }

            .action-btns {
                margin-right: 10px;

                .resume-builder__action-buttons-container {
                    position: static;
                }
            }
        }
    }

    .stripe-btn {
        margin-bottom: 30px;
        display: flex;
        align-items: flex-end;

        a {
            background: blue;
            color: white;
            font-size: 18px;
            font-weight: 600;
            padding: 12px;
            border-radius: 5px;
        }

        a:hover {
            text-decoration: none;
        }
    }

    .status {
        font-size: 14px;
        font-weight: 600;
        padding-left: 12px;

        &.true {
            color: lightgreen;
        }

        &.false {
            color: orangered;
        }
    }

</style>
