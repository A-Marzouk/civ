<template>
    <v-app>
        <div class="main-subscription-container"></div>

        <!-- dialog -->
            <v-dialog  v-model="priceModal" width="620" style="box-shadow: 0px 0px 130px rgba(0, 16, 133, 0.07);border-radius: 10px; z-index:1000; overflow-y:hidden;">
                <div class="sub-modal-content-wrapper">
                    <div class="sub-modal-content">
                        <div class="ad-text-wrapper">
                            <div class="ad-text" :class="{'purple': activeTab === '3months' }">
                                {{activeTab === '1month' ? 'most popular' : 'Best value: save 20%'}}
                            </div>
                        </div>
                        <div class="sub-options-wrapper">
                            <div class="sub-options">
                                <div class="option" :class="{'active' : activeTab === '1month'}" @click="changeTab('1month')">
                                    1 month
                                </div>
                                <div class="option" :class="{'active' : activeTab === '3months'}" @click="changeTab('3months')">
                                    3 month
                                </div>
                            </div>
                        </div>
                        <div class="features-wrapper">
                            <div class="features">
                                <div class="single-feature" v-for="feature in features">
                                    <img src="/images/new_resume_builder/green-tick.png" alt="">
                                    <div class="title">
                                        {{feature}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="promo-input-wrapper">
                            <div class="promo-input">
                                <input type="text" v-model="promocode" placeholder="Promo Code">
                                <span class="error" v-if="!!errors.promocode">{{errors.promocode}}</span>
                                <div class="apply-btn">
                                    <a href="javascript:void(0)" @click="applyPromoCode">
                                        <span v-if="isCodeLoading" class="loader"></span>
                                        <span v-else>
                                            Apply
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="payment-row-wrapper">
                            <div class="payment-row-content">
                                <div class="price">
                                    <div class="main">${{ activeTab === '1month' ? '19' : '49'}}</div>
                                    <div class="period">/month</div>
                                </div>
                                <div class="selection-input">
                                    <div class="select-box" @click="toggleSelection">
                                        <div class="option">{{currentPaymentMethod}}</div>
                                        <img src="/images/new_resume_builder/arrow-down.png" alt="arrow" class="arrow-img" :class="{'up' : isSelectionOpened}">
                                        <img src="/images/new_resume_builder/green-check.png" alt="arrow" class="right-check">
                                        <div class="selection-items" v-if="isSelectionOpened">
                                            <div class="item" @click="changePaymentMethod('Stripe')">
                                                Stripe
                                            </div>
                                            <div class="item" @click="changePaymentMethod('PayPal')">
                                                PayPal
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="payment-btn">
                                    <a href="javascript:void(0)" @click="subscribe">
                                        <span v-if="isPayLoading" class="loader green-loader"></span>
                                        <span class="d-flex align-items-center" v-else>
                                            Pay Now
                                            <img src="/images/new_resume_builder/arrow-white-right.png" alt="arrow">
                                        </span>
                                    </a>
                                </div>

                                <form action="/subscribe" method="post" id="subscribe_form">
                                    <input type="hidden" :value="csrf_token" name="_token">
                                    <input type="hidden" :value="activeTab" name="plan">
                                </form>
                            </div>
                        </div>
                        <div class="payment-icons-wrapper">
                            <div class="payment-icons">
                                <div class="single-payment-icon">
                                    <img src="/images/new_resume_builder/payment-icons/master.png" alt="payment icon master">
                                </div>
                                <div class="single-payment-icon">
                                    <img src="/images/new_resume_builder/payment-icons/visa.png" alt="payment icon visa">
                                </div>
                                <div class="single-payment-icon">
                                    <img src="/images/new_resume_builder/payment-icons/stripe.png" alt="payment icon stripe">
                                </div>
                                <div class="single-payment-icon">
                                    <img src="/images/new_resume_builder/payment-icons/paypal.png" alt="payment icon PayPal">
                                </div>
                                <div class="single-payment-icon">
                                    <img src="/images/new_resume_builder/payment-icons/visa-verfied.png" alt="payment icon visa">
                                </div>
                                <div class="single-payment-icon">
                                    <img src="/images/new_resume_builder/payment-icons/american-express.png" alt="payment icon ae">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
                isCodeLoading: false,
                isPayLoading: false,
                isSelectionOpened: false,
                features: [
                    "Portfolio Page",
                    "Digital interactive Cv",
                    "Your own webpage URL",
                    "Responsive  Design",
                    "3 Different Themes",
                    "Download to PDF",
                    "Integrate your links",
                    "Unlimited Storage",
                    "Quick Import - from PDF/Linkedin"
                ],
                csrf_token: $('meta[name="csrf-token"]').attr('content'),
                activeTab: '1month',
                promocode: "",
                promoCodeValid: false,
                currentPaymentMethod: 'Stripe',
                errors:{ promocode: ''},
            }
        },
        methods: {
            subscribe() {
                if(this.isPayLoading){
                    return;
                }

                this.isPayLoading = true;

                if(this.currentPaymentMethod === 'Stripe'){
                    $('#subscribe_form').submit();
                }else{
                    let frequency = this.activeTab === '1month' ? '1' : '3' ;
                    window.location = '/subscribe/paypal/monthly-custom/' + frequency ;
                }
            },
            applyPromoCode(){
                if(this.isCodeLoading){
                    return;
                }

                this.errors = { promocode: ''};
                this.isCodeLoading = true;

                axios.post('/api/user/apply-promo-code', {promocode : this.promocode})
                    .then( (response) => {
                        this.isCodeLoading = false;

                        if(response.data.error){
                            this.errors = { promocode: response.data.error} ;
                        }

                        if(response.data.data.id){
                            window.location = '/resume-builder' ;
                        }
                    })
                    .catch( (error) => {
                        console.log(error.response);
                        this.isCodeLoading = false;
                        this.errors = { promocode: 'Please make sure you used a valid promocode!'} ;
                    });
            },
            changeTab(tabName){
                this.activeTab = tabName;
            },
            
            // select functions 
            toggleSelection(){
                this.isSelectionOpened = !this.isSelectionOpened;
            },
            changePaymentMethod(paymentMethod){
                this.currentPaymentMethod = paymentMethod;
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

    .sub-modal-content-wrapper{
        background: white;
        height: 870px;
        border: 2.5px solid #F0F1F8;
        padding: 0 32px;
        border-radius: 25px;
        position: relative;

        .sub-modal-content{
            font-family: Noto Sans, sans-serif;
            width: 100%;

            .ad-text-wrapper{
                width: 100%;
                display: flex;
                justify-content: center;
                .ad-text{
                    font-weight: 500;
                    font-size: 24px;
                    line-height: 18px;
                    text-align: center;
                    text-transform: uppercase;
                    color: #001CE2;
                    background-color: #FBFF3F;
                    border-radius: 0px 0px 10px 10px;
                    width: 325px;
                    height: 65px;
                    margin-top: -2.5px;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    transition: background-color 0.3s, color 0.3s;

                    &.purple{
                        color: #ffffff;
                        background-color: #EF35B0;
                    }
                }
            }

            .sub-options-wrapper{
                margin-top: 30px;

                .sub-options{
                    display: flex;
                    align-items: center;
                    justify-content: space-around;
                    position: relative;

                    &::before {
                        content: "";
                        width: 100%;
                        bottom: -25px;
                        position: absolute;
                        height: 1px;
                        background: rgba(0, 11, 90, 0.1);
                    }

                    .option{
                        font-weight: bold;
                        font-size: 40px;
                        color: #001CE2;
                        text-transform: uppercase;
                        opacity: 0.3;
                        transition: all 0.2s;

                        &.active{
                            opacity: 1;
                            position: relative;

                            &::before {
                                content: "";
                                width: 60%;
                                left: 20%;
                                bottom: -25px;
                                position: absolute;
                                height: 5px;
                                background: #000B5A;
                                border-radius: 20px;
                            }
                        }

                        &:hover{
                            cursor: pointer;
                        }
                    }
                }
            }

            .features-wrapper{
                margin-top: 70px;

                .features{
                    margin-left: 12px;
                    max-height: 250px;
                    overflow-y: auto;
                    border-right: 1.5px solid rgba(0, 11, 90, 0.1);

                    .single-feature{
                        display: flex;
                        align-items: center;
                        margin-bottom: 25px;

                        img{
                            width: 35px;
                            height: 35px;
                            margin-right: 14px;
                        }
                        .title{
                            font-weight: 500;
                            font-size: 24px;
                            color: #888DB1;
                        }
                    }
                }
            }

            .promo-input-wrapper{
                margin-top: 30px;
                background: #F7F7F7;
                width: 100%;
                height: 115px;
                display: flex;
                align-items: center;
                justify-content: center;
                position: absolute;
                left: 0;

                .promo-input{
                    display: flex;
                    align-items: center;
                    position: relative;

                    input{
                        height: 50px;
                        border-radius: 10px;
                        border: none;
                        background: white;
                        padding-left: 20px;
                        font-size: 18px;
                        color:  rgba(136, 141, 177, 0.9);
                        &:focus{
                            outline: none;
                        }
                    }
                    .apply-btn{
                        margin-left: 14px;

                        a{
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            height: 50px;
                            width: 120px;
                            color: white;
                            font-weight: 500;
                            font-size: 18px;
                            line-height: 18px;
                            background: #001CE2;
                            border-radius: 10px;
                            text-decoration: none;
                        }
                    }
                    span.error{
                        position: absolute;
                        bottom: -25px;
                        left: 5px;
                        color: red;
                        font-size: 13px;
                        background-color: inherit !important;
                    }
                }
            }

            .payment-row-wrapper{
                margin-top: 190px;

                .payment-row-content{
                    display: flex;
                    justify-content: space-between;
                    align-items: flex-end;

                    .price{
                        font-style: normal;
                        display: flex;
                        align-items: baseline;
                        text-align: center;
                        line-height: 30px;
                        color: #001CE2;
                        .main{
                            font-size: 60px;
                            font-weight: bold;
                        }
                        .period{
                            font-size: 20px;
                            font-weight: 500;
                        }
                    }

                    .selection-input{
                        .select-box{
                            height: 56px;
                            width: 175px;
                            padding: 0 17px;
                            background: #F2F2F2;
                            border-radius: 13px;
                            display: flex;
                            align-items: center;
                            justify-content: space-between;
                            position: relative;
                            &:hover{
                                cursor: pointer;
                            }

                            .option{
                                font-size: 18px;
                                font-weight: 600;
                                color: #001CE2;
                            }

                            .arrow-img{
                                width: 26px;
                                padding: 6px;
                                margin-top: 6px;
                                margin-right: -6px;
                                &.up{
                                    transform: rotate(-180deg);
                                }
                            }
                            .right-check{
                                width: 18px;
                                position: absolute;
                                top: -6.5px;
                                right: -4.5px;
                            }

                            .selection-items{
                                position: absolute;
                                background: white;
                                width: 100%;
                                /* padding: 17px; */
                                left: 0;
                                top: 45px;
                                border-radius: 10px;
                                z-index: 99;
                                border: 1px solid #F2F2F2;
                                .item{
                                    padding: 10px 17px;
                                    border-bottom: 1px solid #F2F2F2;
                                    font-size: 16px;
                                    color: #001CE2;
                                    &:last-child{
                                        border-bottom: 0;
                                    }
                                    &:hover{
                                        cursor: pointer;
                                        background: whitesmoke;
                                    }
                                }
                            }
                        }
                    }

                    .payment-btn{
                        a{
                            height: 56px;
                            width: 175px;
                            background: #14D627;
                            box-shadow: 0px 4px 40px rgba(20, 214, 39, 0.2);
                            border-radius: 10px;
                            font-style: normal;
                            font-weight: bold;
                            font-size: 18px;
                            text-transform: capitalize;
                            color: #FFFFFF;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            text-decoration: none;

                            img{
                                margin-left: 12px;
                            }
                        }
                    }
                }
            }

            .payment-icons-wrapper{
                margin-top: 60px;
                .payment-icons{
                    display: flex;
                    align-items: center;
                    justify-content: space-between;

                    .single-payment-icon{
                        opacity: 0.4;
                        margin-right: 20px;
                        &:last-child{
                            margin-right: 0;
                        }
                        img{

                        }
                    }
                }
            }

        }
    }

    .loader {
        border: 4px solid #f3f3f3;
        border-radius: 50%;
        border-top: 4px solid #001CE2;
        width: 30px;
        height: 30px;
        -webkit-animation: spin 1.5s linear infinite;
        animation: spin 1.5s linear infinite;

        &.green-loader{
            border-top: 4px solid #14D627;
        }
    }
    /* Safari */
    @-webkit-keyframes spin {
        0% { -webkit-transform: rotate(0deg); }
        100% { -webkit-transform: rotate(360deg); }
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>

<style lang="scss">

    /* width */
    ::-webkit-scrollbar {
        width: 5px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
        background: none;
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
        border-radius: 25px;
        background: rgba(0, 11, 90, 0.75);
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
        background: rgba(0, 11, 90, 1);
    }


</style>