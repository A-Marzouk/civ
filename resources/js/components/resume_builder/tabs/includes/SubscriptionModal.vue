<template>
    <v-app>
        <div class="main-subscription-container"></div>

        <!-- dialog -->
        <v-dialog
                v-model="priceModal"
                max-width="550"
                style="box-shadow: 0px 0px 130px rgba(0, 16, 133, 0.07);border-radius: 10px; z-index:1000; overflow-y:hidden;"
        >

            <v-card>
                <v-card-text class="pt-5">
                    <v-tabs centered v-model="priceTab" hide-slider>
                        <v-tab class="custom-tab1" active-class="custom-active">Monthly</v-tab>
                        <v-tab class="custom-tab2" active-class="custom-active">Yearly</v-tab>
                    </v-tabs>
                </v-card-text>
                <v-card-text>
                    <v-tabs-items v-model="priceTab">
                        <v-tab-item>
                            <v-card-text align="center" class="padding-sm-1">
                                <v-row align="center" justify="center">
                                    <v-col cols="12">
                                        <div class="now-only-text mt-sm-n5 mt-n7">Now Only</div>
                                    </v-col>
                                    <v-col cols="12" class="mt-sm-n5 mt-n7">
                                        <div class="rate-text">
                                            <span class="old-price mr-5">$10</span>
                                            <span class="new-price">$5</span>
                                            <sub>/month</sub>
                                        </div>
                                    </v-col>
                                    <v-col cols="12">
                                        <div class="save-text mt-n7">(Save 50%)</div>
                                    </v-col>
                                </v-row>

                                <hr class="hr-line"/>
                            </v-card-text>
                            <v-card-text class="padding-sm-1">
                                <v-row align="center" v-for="(item,index) in price_options" :key="index">
                                    <v-col xl="1" lg="1" md="1" sm="1" cols="2" offset="1"
                                           class="mt-xl-0 mt-lg-n3 mt-md-0 mt-sm-0 mt-n2  padding-sm-1">
                                        <img src="/images/new_resume_builder/icons/main/check.svg" class="check-img"/>
                                    </v-col>
                                    <v-col xl="6" lg="6" md="6" sm="6" cols="6"
                                           class="mt-xl-0 mt-lg-n3 mt-md-0 mt-sm-0 mt-n2  padding-sm-1">
                                        <span class="price-option">{{item}}</span>
                                    </v-col>
                                </v-row>
                            </v-card-text>
                            <v-card-text align="center" class="padding-sm-1 mt-xl-0 mt-lg-n3">
                                <v-btn color="#001CE2" dark class="btn-modal-subscribe">Subscribe Now</v-btn>
                            </v-card-text>
                            <v-card-text align="center" class="pb-md-0 mt-n5">
                                <v-row align="center" justify="center">
                                    <v-col xl="3" lg="3" md="3" sm="3" cols="3">
                                        <form action="/subscribe" method="post" id="subscribe_form">
                                            <input type="hidden" :value="csrf_token" name="_token">
                                            <input type="hidden" :value=" priceTab === 0 ? 'monthly' : 'yearly' "
                                                   name="plan">
                                        </form>
                                        <a href="javascript:void(0)" @click="subscribe" class="payment-link">
                                            <img
                                                    :src="stripeHover === false ?stripeInactive  :stripeActive"
                                                    @mouseover="stripeHover = true"
                                                    @mouseleave="stripeHover = false"
                                                    alt="Stripe Logo"
                                                    class="payment-logo-stripe"
                                            />
                                        </a>
                                    </v-col>
                                    <v-col xl="3" lg="3" md="3" sm="3" cols="3">
                                        <a href="/subscribe/paypal/monthly" class="payment-link">
                                            <img
                                                    :src="paypalHover == false? paypalInactive : paypalActive"
                                                    @mouseover="paypalHover=true"
                                                    @mouseleave="paypalHover=false"
                                                    alt="Paypal Logo"
                                                    class="payment-logo-paypal"
                                            />
                                        </a>
                                    </v-col>
                                </v-row>
                            </v-card-text>
                        </v-tab-item>
                        <v-tab-item>
                            <v-card-text align="center" class="padding-sm-1">
                                <v-row align="center" justify="center">
                                    <v-col cols="12">
                                        <div class="now-only-text mt-sm-n5 mt-n7">Now Only</div>
                                    </v-col>
                                    <v-col cols="12" class="mt-sm-n5 mt-n7">
                                        <div class="rate-text">
                                            <span class="old-price mr-5">$100</span>
                                            <span class="new-price">$50</span>
                                            <sub>/month</sub>
                                        </div>
                                    </v-col>
                                    <v-col cols="12">
                                        <div class="save-text mt-n7">(Save 50%)</div>
                                    </v-col>
                                </v-row>

                                <hr class="hr-line"/>
                            </v-card-text>
                            <v-card-text class="padding-sm-1">
                                <v-row align="center" v-for="(item,index) in price_options" :key="index">
                                    <v-col xl="1" lg="1" md="1" sm="1" cols="2" offset="1"
                                           class="mt-xl-0 mt-lg-n3 mt-md-0 mt-sm-0 mt-n2 padding-sm-1">
                                        <img src="/images/new_resume_builder/icons/main/check.svg" class="check-img"/>
                                    </v-col>
                                    <v-col xl="6" lg="6" md="6" sm="6" cols="6"
                                           class="mt-xl-0 mt-lg-n3 mt-md-0 mt-sm-0 mt-n2 padding-sm-1">
                                        <span class="price-option">{{item}}</span>
                                    </v-col>
                                </v-row>
                            </v-card-text>
                            <v-card-text align="center" class="mt-xl-0 mt-lg-n3 padding-sm-1">
                                <v-btn color="#001CE2" dark class="btn-modal-subscribe">Subscribe Now</v-btn>
                            </v-card-text>
                            <v-card-text align="center" class="pb-md-0 mt-n5">
                                <v-row align="center" justify="center">
                                    <v-col xl="3" lg="3" md="3" sm="3" cols="3">
                                        <a href="javascript:void(0)" @click="subscribe" class="payment-link">
                                            <img
                                                    :src="stripeHover === false ?stripeInactive  :stripeActive"
                                                    @mouseover="stripeHover = true"
                                                    @mouseleave="stripeHover = false"
                                                    alt="Stripe Logo"
                                                    class="payment-logo-stripe"
                                            />
                                        </a>
                                    </v-col>
                                    <v-col xl="3" lg="3" md="3" sm="3" cols="3">
                                        <a href="/subscribe/paypal/yearly" class="payment-link">
                                            <img
                                                    :src="paypalHover == false? paypalInactive : paypalActive"
                                                    @mouseover="paypalHover=true"
                                                    @mouseleave="paypalHover=false"
                                                    alt="Paypal Logo"
                                                    class="payment-logo-paypal"
                                            />
                                        </a>
                                    </v-col>
                                </v-row>
                            </v-card-text>
                        </v-tab-item>
                    </v-tabs-items>
                </v-card-text>
            </v-card>
        </v-dialog>
        <!-- dialog -->

    </v-app>

</template>

<script>
    export default {
        name: "SubscriptionModal",
        data() {
            return {
                priceModal: true,
                priceTab: 0,
                price_options: [
                    "Online Resume",
                    "20+ Theme",
                    "Export PDF",
                    "Visual Builder",
                    "Free Domain URL"
                ],
                csrf_token: $('meta[name="csrf-token"]').attr('content'),
                stripeInactive: "/images/pricing/icons/stripe-logo-inactive.png",
                stripeActive: "/images/pricing/icons/stripe-logo-active.svg",
                paypalInactive: "/images/pricing/icons/paypal-logo-inactive.svg",
                paypalActive: "/images/pricing/icons/paypal-logo-active.png",
                paypalHover: false,
                stripeHover: false,
                selectedPlan: "monthly",
                selectedBtn: "monthly",
            }
        },
        methods: {
            subscribe() {
                $('#subscribe_form').submit();
            }
        }
    }
</script>

<style lang="scss" scoped>
    .main-subscription-container {
        background-image: url("/images/new_resume_builder/my_account_preview.png");
        background-size: cover;
        height: 100vh;
        filter: blur(6px);
        -webkit-filter: blur(6px);
    }
</style>