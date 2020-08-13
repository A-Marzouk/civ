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

                            <div class="promocode">
                                <div class="promo-input">
                                    <v-text-field
                                            outlined
                                            class="promo-input-field"
                                            label="Promo Code"
                                            v-model="promocode"
                                            :error="!!errors.promocode"
                                            :error-messages="errors.promocode"
                                    >
                                    </v-text-field>
                                </div>
                                <div class="apply-btn">
                                    <v-btn class="resume-builder__btn civie-btn filled" filled @click="applyPromoCode">Apply</v-btn>
                                </div>
                            </div>


                            <div class="pay-with-row">
                                <div class="line"></div>
                                <div class="text">
                                    Pay with
                                </div>
                                <div class="line"></div>
                            </div>

                            <div class="payment-row">
                                <div class="payment-link">
                                    <form action="/subscribe" method="post" id="subscribe_form">
                                        <input type="hidden" :value="csrf_token" name="_token">
                                        <input type="hidden" :value=" priceTab === 0 ? 'monthly' : 'yearly' "
                                               name="plan">
                                    </form>
                                    <a href="javascript:void(0)" @click="subscribe">
                                        <img
                                                :src="stripeIcon"
                                                @mouseover="stripeHover = true"
                                                @mouseleave="stripeHover = false"
                                                alt="Stripe Logo"
                                                class="payment-logo-stripe"
                                        />
                                    </a>
                                </div>
                                <div class="mr-2 ml-2">
                                    or
                                </div>
                                <div class="payment-link">
                                    <a href="/subscribe/paypal/monthly" >
                                        <img
                                                :src="paypalIcon"
                                                alt="Paypal Logo"
                                                class="payment-logo-paypal"
                                        />
                                    </a>
                                </div>
                            </div>



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


                            <div class="promocode">
                                <div class="promo-input">
                                    <v-text-field
                                            outlined
                                            class="promo-input-field"
                                            label="Promo Code"
                                            v-model="promocode"
                                            :error="!!errors.promocode"
                                            :error-messages="errors.promocode"
                                    >
                                    </v-text-field>
                                </div>
                                <div class="apply-btn">
                                    <v-btn class="resume-builder__btn civie-btn filled" filled @click="applyPromoCode">Apply</v-btn>
                                </div>
                            </div>

                            <div class="pay-with-row">
                                <div class="line"></div>
                                <div class="text">
                                    Pay with
                                </div>
                                <div class="line"></div>
                            </div>

                            <div class="payment-row">
                                <div class="payment-link">
                                    <a href="javascript:void(0)" @click="subscribe" >
                                        <img
                                                :src="stripeIcon"
                                                @mouseover="stripeHover = true"
                                                @mouseleave="stripeHover = false"
                                                alt="Stripe Logo"
                                                class="payment-logo-stripe"
                                        />
                                    </a>
                                </div>
                                <div class="mr-2 ml-2">
                                    or
                                </div>
                                <div class="payment-link">
                                    <a href="/subscribe/paypal/yearly" >
                                        <img
                                                :src="paypalIcon"
                                                alt="Paypal Logo"
                                                class="payment-logo-paypal"
                                        />
                                    </a>
                                </div>
                            </div>
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
                stripeIcon: "/images/pricing/icons/stripe-logo.svg",
                paypalIcon: "/images/pricing/icons/paypal-logo.svg",
                paypalHover: false,
                stripeHover: false,
                selectedPlan: "monthly",
                selectedBtn: "monthly",
                promocode: "",
                promoCodeValid: false,
                errors:{ promocode: ''},
            }
        },
        methods: {
            subscribe() {
                $('#subscribe_form').submit();
            },
            applyPromoCode(){
                this.errors = { promocode: ''};
                axios.post('/api/user/apply-promo-code', {promocode : this.promocode})
                    .then( (response) => {
                        if(response.data.error){
                            this.errors = { promocode: response.data.error} ;
                        }

                        if(response.data.data.id){
                            window.location = '/resume-builder' ;
                        }
                    });
            }
        }
    }
</script>

<style lang="scss" scoped>
    @import "../../../../../sass/media-queries";

    .main-subscription-container {
        background-image: url("/images/new_resume_builder/my_account_preview.png");
        background-size: cover;
        height: 100vh;
        filter: blur(6px);
        -webkit-filter: blur(6px);
    }

    .pay-with-row{
        display: flex;
        align-items: center;
        flex-direction: row;
        flex-wrap: nowrap;
        margin-top: 10px;
        margin-bottom: 40px;

        .line{
            height: 2px;
            width:100%;
            background: #888DB1;
        }

        .text{
            font-weight: 500;
            font-size: 18px;
            line-height: 18px;
            color: #001CE2;
            min-width: 100px;
            text-align: center;
        }
    }

    .payment-row{
        display: flex;
        flex-direction: row;
        justify-content: space-evenly;
        align-items: center;
        padding-bottom: 20px;

        .payment-link{
            background: rgba(196, 196, 196, 0.4);
            width: 210px;
            height: 90px;
            border-radius: 13px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            font-weight: 500;
            @include lt-sm{
                width: 130px;
                height: 60px;
            }
            a{
                img{
                    @include lt-sm{
                        width: 80px;
                    }
                }
            }
        }
    }

    .promocode{
        display: flex;
        justify-content: space-around;
        align-items: baseline;

        .promo-input{
            width: 293px;
        }

        .apply-btn{

        }
    }

</style>