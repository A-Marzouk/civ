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
                                            height="45"
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
                                            <sub>/year</sub>
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
                price_options_higher: [
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

    $text-color: #4374de;
    $primary: #1f5de4;
    $bg-color: white;
    $input-bg: #f1f8fc;
    $placeholder-color: #9ba1ad;

    .subscription-modal {
        .v-dialog {
            max-width: 550px;
            @include lt-md {
                max-width: 500px;
            }
        }
    }

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
            background: rgba(196, 196, 196, 0.2);
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

    .plans {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        position: relative;

        & > .dot-bg {
            position: absolute;
            bottom: -6rem;
            left: -18rem;
            z-index: 1;
            height: 160px;
        }
    }


    .toggle-panel.smaller {
        width: 110px;

        .aux-fill {
            width: 183%;
            position: absolute;
            background: #001CE2;
            border-radius: 20px;
            height: 38px;
            top: 0;
            z-index: 1;
        }
    }

    .toggle-panel {
        border: solid 1.3px #001CE2;
        border-radius: 50px;
        position: relative;
        overflow: hidden;
        padding: 5px 10px;
        height: 40px;
        width: 200px;
        display: flex;
        justify-content: center;
        align-items: center;

        .aux-fill {
            width: 100%;
            position: absolute;
            background: $primary;
            border-radius: 20px;
            height: 40px;
            top: 0;
            z-index: 1;

            &.left {
                animation-name: swipeToLeft;
                animation-duration: 0.3s;
                animation-timing-function: ease;
                animation-fill-mode: forwards;

                & ~ .buttons .monthly {
                    color: $bg-color;
                    transition: color 0.5s ease;
                }
            }

            &.right {
                animation-name: swipeToRight;
                animation-duration: 0.3s;
                animation-timing-function: ease;
                animation-fill-mode: forwards;

                & ~ .buttons .yearly {
                    color: $bg-color;
                    transition: color 0.5s ease;
                }
            }
        }

        .buttons {
            position: absolute;
            right: 0;
            height: 40px;
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 5px;
            z-index: 2;

            button {
                background: transparent;
                border: none;
                color: $primary;
                font-weight: 700;
                width: 100px;
                outline: none;
                transition: color 0.5s ease;

                &:hover {
                    cursor: pointer;
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

    .rate-text {
        font-family: "Noto Sans" !important;

        .old-price {
            font-weight: bold;
            font-size: 50px;
            line-height: 60px;
            color: #001ce2;
            opacity: 0.3;
            text-decoration: line-through;
            @media screen and (min-width: 1264px) and (max-width: 1903px) {
                font-size: 36px !important;
            }
            @media screen and(max-width: 599px) {
                font-size: 24px !important;
            }
        }

        .new-price {
            font-weight: bold;
            font-size: 70px;
            line-height: 50px;
            color: #001ce2 !important;
            @media screen and (min-width: 1264px) and (max-width: 1903px) {
                font-size: 50px !important;
            }
            @media screen and (max-width: 599px) {
                font-size: 36px !important;
            }
        }

        sub {
            font-weight: bold;
            font-size: 20px;
            line-height: 50px;
            color: #001ce2;
            margin-left: -5px;
            @media screen and (min-width: 1264px) and (max-width: 1903px) {
                font-size: 18px !important;
            }
            @media screen and (max-width: 599px) {
                font-size: 14px !important;
            }
        }
    }

    .price-option {
        font-family: "Noto Sans" !important;
        font-size: 20px !important;
        line-height: 32px;
        color: #888db1 !important;
        @media screen and (min-width: 1264px) and (max-width: 1903px) {
            margin-top: -10px;
            font-size: 18px !important;
            line-height: 0px;
        }
        @media screen and (max-width: 599px) {
            font-size: 14px !important;
            line-height: 0;
        }
    }

    @keyframes swipeToRight {
        from {
            transform: translateX(-95px);
        }
        to {
            transform: translateX(95px);
        }
    }

    @keyframes swipeToLeft {
        from {
            transform: translateX(95px);
        }
        to {
            transform: translateX(-95px);
        }
    }

    //dialog css
    .now-only-text {
        font-family: "Noto Sans" !important;
        font-size: 20px;
        line-height: 30px;
        color: #888db1 !important;
    }

    //dialog css

    // Transitions effects
    .fade-enter-active,
    .fade-leave-active {
        transition: opacity 0.5s ease;
    }

    .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */
    {
        opacity: 0;
    }

    .slide-fade-enter-active {
        transition: all 0.3s ease;
    }

    .slide-fade-leave-active {
        transition: all 0.8s cubic-bezier(1, 0.5, 0.8, 1);
    }

    .slide-fade-enter, .slide-fade-leave-to
        /* .slide-fade-leave-active below version 2.1.8 */
    {
        transform: translateX(10px);
        opacity: 0;
    }

    .plan-container {
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
        color: $text-color;
        margin-top: 15px;
        box-shadow: none !important;

        .dot-bg {
            position: absolute;
            top: -18px;
            right: -78px;
            display: none;
        }

        .circle-bg {
            position: absolute;
            bottom: -60px;
            right: -40px;
            display: none;
        }
    }

    .plan-details {
        background: white;
        padding: 0 !important;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        border-radius: 17px;
        position: relative;
        z-index: 1;

        .plan-original-price {
            position: relative;
            margin-top: 15px;
            font-size: 50px !important;

            img {
                position: absolute;
                right: 0;
                top: 0;
                height: 100%;
            }

            @media (max-width: 1480px) {
                right: 0;
            }
        }

        .plan-offer {
            color: $primary;
            font-size: 65px;
            position: relative;

            small,
            sup {
                font-size: 22px;
            }

            small {
                font-weight: 700;

                &:first-child {
                    margin-right: 10px;
                }

                &.not-bold {
                    font-weight: normal;
                }
            }

            sup {
                position: absolute;
                top: 25px;
                left: 92px;
            }

            @media (max-width: 1480px) {
                font-size: 42px;

                small,
                sup {
                    font-size: 20px;
                }

                sup {
                    top: 15px;
                    left: 90px;
                }
            }

            @media (max-width: 576px) {
                font-size: 36px;

                small,
                sup {
                    font-size: 16px;
                }

                sup {
                    left: 75px;
                }
            }
        }

        .btn {
            height: 60px;
            line-height: 1rem;

            small {
                display: block;
                font-size: 10px;
            }

            @media (max-width: 480px) {
                width: 100%;
            }
        }

        @media (max-width: 960px) {
            padding: 50px;
        }
    }

    .help-text {
        font-size: 22px;

        @media (max-width: 1480px) {
            font-size: 14px;
        }
    }

    .plan-info {
        width: 100%;
        padding: 3rem 5rem;

        img {
            height: 14px;
            margin-right: 5px;
        }

        @media (max-width: 576px) {
            padding: 2rem;
        }
    }

    .fade-enter-active,
    .fade-leave-active {
        transition: opacity 0.8s ease;
        opacity: 1 !important;

        .form-title,
        label,
        .section-title,
        .aside-bar {
            opacity: 1 !important;
            transition: all 0.8s ease;
        }
    }

    .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */
    {
        opacity: 1 !important;
        transition: opacity 0.8s ease;

        .form-title,
        label,
        .section-title,
        .aside-bar {
            opacity: 0 !important;
            transition: all 0.8s ease;
        }
    }

    // Main component transitions
    @for $j from 1 through 6 {
        @keyframes moveInput#{$j} {
            from {
                transform: translate(0);
            }
            to {
                transform: translate(
                                calc((-1) * (50vw - 50% - 380px - 3rem - 1.17%)),
                                375px
                );
            }
        }
    }

    .fade-leave-active {
        #myAccountTab {
            overflow: visible;

            @for $i from 1 through 6 {
                .input-field {
                    &:nth-child(#{ $i }) {
                        animation-name: moveInput#{$i};
                        animation-duration: 0.6s;
                        animation-fill-mode: forwards;
                        animation-timing-function: cubic-bezier(0.8, 0.6, 0.45, 0.4);
                    }
                }
            }
        }
    }

    /* new input styles */
    .inner-text {
        padding-top: 4px;
        white-space: nowrap;
        color: #aeaeae;
    }


    .padding-sm-1 {
        @include lt-sm {
            padding: 5px !important;
        }
        @include lt-md {
            padding: 5px !important;
        }
    }

    .error {
        color: red !important;
    }

    .custom-tab1 {
        border-top: 2px solid #001ce2 !important;
        border-bottom: 2px solid #001ce2 !important;
        border-left: 2px solid #001ce2 !important;
        font-family: "Noto Sans" !important;
        font-weight: 600;
        font-size: 14px;
        line-height: 18px;
        color: #001ce2 !important;
        text-transform: capitalize !important;
        border-top-left-radius: 10px;
        border-bottom-left-radius: 10px;
    }

    .custom-tab2 {
        border-top: 2px solid #001ce2 !important;
        border-bottom: 2px solid #001ce2 !important;
        border-right: 2px solid #001ce2 !important;
        font-family: "Noto Sans" !important;
        font-weight: 600;
        font-size: 14px;
        line-height: 18px;
        color: #001ce2 !important;
        text-transform: capitalize !important;
        border-top-right-radius: 10px;
        border-bottom-right-radius: 10px;
    }

    .custom-active {
        background: #001ce2 !important;
        color: #ffffff !important;
    }

    .now-only-text {
        font-family: "Noto Sans" !important;
        font-size: 20px !important;
        line-height: 30px;
        color: #888db1 !important;
        @media screen and (min-width: 1264px) and (max-width: 1903px) {
            font-size: 18px !important;
        }
        @media screen and (max-width: 599px) {
            font-size: 14px !important;
        }
    }


    .hr-line {
        width: 80%;
        border: 2px solid #e6e8fc;
    }

    .save-text {
        font-family: "Noto Sans" !important;
        font-size: 20px !important;
        line-height: 30px;
        color: #888db1 !important;
        margin-left: -8px;
        @media screen and (max-width: 599px) {
            font-size: 14px !important;
        }
    }

    .btn-modal-subscribe {
        width: 220px !important;
        height: 60px !important;
        border-radius: 5px !important;
        text-transform: capitalize !important;
        font-family: "Noto Sans", sans-serif !important;
        font-size: 18px !important;
        font-weight: 500;
        line-height: 18px;
    }

    .check-img {
        @media screen and (max-width: 599px) {
            width: 16px;
        }
    }

    .payment-link {
        .payment-logo-stripe {
        }

        .payment-logo-paypal {
        }
    }

    .payment-link:hover {
        cursor: pointer;
    }

    .v-dialog:not(.v-dialog--fullscreen) {
        max-height: 100% !important;
    }

    .centered-input input {
        margin-top: 6px !important;
    }

    .input-margin-3 input {
        margin-top: 0px !important;
    }
</style>