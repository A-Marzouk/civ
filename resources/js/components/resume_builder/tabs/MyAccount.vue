<template>
    <div v-if="currentUser">
        <div id="myAccountTab" class="my-account-tab-wrapper">

            <div class="profile-pic-row" v-if="personalInfo">
                <div class="profile-pic"  @click="clickUploadInput">
                    <img :src="personalInfo.profile_pic" alt="">
                </div>
                <div class="info">
                    <div class="name">
                        {{accountData.name}}
                    </div>
                    <div class="job-title">
                        {{personalInfo.designation}}
                    </div>
                </div>
            </div>

            <div class="profile-pic-row-holder" v-else></div>

            <div class="error" v-if="profile_pic_error">
                {{profile_pic_error}}
            </div>
            <input type="file" ref="profile_picture" id="profile_picture"
                   style="width: 1px; height: 1px; opacity: 0; right:145%;"
                   @change=handleProfilePictureUpload>


            <div class="form-wrapper">
                <div class="content-wrapper">
                    <div class="mar-form">
                        <v-text-field class="resume-builder__input input-margin" label="Full name" v-model="accountData.name" :outlined="true"
                                       :class="{'resume-builder__input--disabled': false}" :error="!!errors.name" :disabled="false">
                        </v-text-field>

                        <v-text-field class="resume-builder__input input-margin" label="Email" v-model="accountData.email" :outlined="true"
                                      :class="{'resume-builder__input--disabled': false}" :error="!!errors.email" :disabled="canEditEmail()">
                        </v-text-field>


                        <v-text-field class="resume-builder__input input-margin" label="Password"  type="password" v-model="accountData.password" placeholder="*********" :outlined="true"
                                      :class="{'resume-builder__input--disabled': false}" :error="!!errors.password">
                        </v-text-field>

                        <v-text-field class="resume-builder__input" label="Re-Type Password"  type="password" v-model="accountData.password_confirmation" placeholder="*********" :outlined="true"
                                      :class="{'resume-builder__input--disabled': false}" :error="!!errors.password">
                        </v-text-field>


                        <div class="my-subscription">
                            <div class="form-title sub">
                                My Subscription
                            </div>
                            <div class="toggle-panel smaller" v-if="accountData.subscription === null">
                                <div class="aux-fill" :class="{left: subscription === 'on',right: subscription === 'off'}"></div>
                                <div class="buttons">
                                    <button class="toggle-btn monthly" @click="subscription = 'on' ">On
                                    </button>
                                    <button class="toggle-btn yearly"  @click="subscription = 'off' ">Off
                                    </button>
                                </div>
                            </div>
                            <div v-else class="view-sub-btn NoDecor">
                                <a href="javascript:void(0)"  data-toggle="modal" data-target="#subscription">
                                    View
                                </a>
                            </div>
                        </div>

                        <div class="action-btns NoDecor">
                            <a href="/subscription" class="purchase-btn" data-toggle="modal" data-target="#prices" v-if="subscription==='on'">
                                Purchase Subscription
                            </a>
                        </div>

                        <span class="v-label v-label--active theme--light" style="color: #888DB1;">
                            <!-- Added a label here due to prepend-inner slot change -->
                            My URL
                        </span>
                        <v-text-field class="resume-builder__input top-input-margin"  v-model="accountData.username" :outlined="true"
                                      :class="{'resume-builder__input--disabled': false}" :error="!!errors.username">
                            <template slot="prepend-inner">
                                <span class="inner-text">www.civ.ie/</span>
                            </template>
                        </v-text-field>
                    </div>

                    <div class="action-btns NoDecor">
                        <a class="save-btn" href="javascript:void(0)" @click="submitForm">
                            Save Changes
                        </a>
                    </div>
                </div>
            </div>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="prices" tabindex="-1" role="dialog" aria-labelledby="prices" aria-hidden="true" style="overflow: hidden!important;">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body" style="min-height: 600px;">
                        <div class="plans">
                            <div class="toggle-panel">
                                <div class="aux-fill" :class="{left: selectedBtn === 'monthly',right: selectedBtn === 'yearly'}"></div>
                                <div class="buttons">
                                    <button @click="setPlan('monthly')" class="toggle-btn monthly">Monthly
                                    </button>
                                    <button @click="setPlan('yearly')" class="toggle-btn yearly">Yearly
                                    </button>
                                </div>
                            </div>
                            <transition name="fade">
                                <monthly-plan v-if="selectedPlan === 'monthly'"></monthly-plan>
                                <yearly-plan  v-if="selectedPlan === 'yearly'"></yearly-plan>
                            </transition>
                            <img class="dot-bg" src="/images/resume_builder/dotbox.png" alt/>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="subscription" tabindex="-1" role="dialog" aria-labelledby="subscription" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body d-flex align-items-center" v-if="accountData.subscription">
                        You have a {{accountData.subscription.sub_frequency}} subscription
                        <br/>
                        Amount: {{accountData.subscription.sub_frequency === 'monthly' ? '15 USD/month' : '99 USD/year'}}
                        <br/>
                        Payment method: {{accountData.subscription.payment_method}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import monthlyPlan from "./includes/monthly_plan";
    import yearlyPlan from "./includes/yearly_plan";

    export default {
        name: "MyAccount",
        components: {monthlyPlan, yearlyPlan},

        data() {
            return {
                selectedPlan: "monthly",
                selectedBtn: "monthly",
                subscription: "on",
                errors: {},
                successes: {},
                currentUser: {},
                isLoading: false,
                notificationMessage: '',
                usernameOldValue: '',
                fields: {
                    name: '',
                    email: '',
                    username: '',
                    password: '',
                },
                rules: {
                    required: value => !!value || 'Required.',
                    min: v => v.length >= 3 || 'Min 3 characters'
                },
                tempPic:'',
                profile_pic_error:'',
            }
        },
        computed: {
            accountData() {
                let user = this.currentUser = this.$store.state.user;
                this.usernameOldValue = this.currentUser.username;

                return {
                    id: user.id,
                    name: user.name,
                    email: user.email,
                    username: user.username,
                    userNameChanged: false,
                    password: '',
                    password_confirmation: '',
                    subscription:user.subscription
                }
            },
            personalInfo() {
                return this.$store.state.user.personal_info;
            },
        },
        methods: {
            clickUploadInput(){
                $('#profile_picture').click();
            },
            handleProfilePictureUpload() {
                // validate uploaded file :
                let isValid = this.validateUploadedFile(this.$refs.profile_picture.files[0]);
                if(isValid){
                    this.personalInfo.profile_pic = this.$refs.profile_picture.files[0];
                    this.tempPic =  URL.createObjectURL(this.$refs.profile_picture.files[0]) ;
                    this.profile_pic_error = '';
                    this.applyEdit('auto');
                }else{
                    console.log('error in pic');
                    this.profile_pic_error = 'Incorrect file chosen!';
                }
            },
            validateUploadedFile(file){
                let isValid = true ;
                if(file.type.search('image') === -1){
                    isValid = false;
                }
                if(file.size > 25000000){
                    isValid = false;
                }
                return isValid;
            },
            applyEdit(savingType) {
                let formData = new FormData();
                formData.append("_method", "put");
                formData.append("user_id", this.currentUser.id);

                $.each(this.personalInfo, (field) => {
                    if(this.personalInfo[field] !== null){
                        if(field !== 'email' && this.personalInfo[field].length){
                            formData.append(field, this.personalInfo[field]);
                        }
                        if(field === 'profile_pic'){
                            formData.append(field,this.personalInfo[field]);
                        }
                    }
                });

                this.errors={};

                axios.post('/api/user/personal-info',formData,{headers:{'Content-Type': 'multipart/form-data'}})
                    .then((response) => {
                        console.log(response.data);
                        if(savingType === 'manual'){
                            this.$store.dispatch('fullScreenNotification');
                        }else{
                            this.$store.dispatch('flyingNotification');
                        }
                        this.personalInfo.profile_pic = response.data.data.profile_pic;
                    })
                    .catch((error) => {
                        if (typeof error.response.data === 'object') {
                            console.log(error.response.data.errors);
                            this.errors = error.response.data.errors;
                        } else {
                            this.errors = 'Something went wrong. Please try again.';
                        }
                        this.$store.dispatch('flyingNotification', {
                            message: 'Error',
                            iconSrc: '/images/resume_builder/error.png'
                        });
                    });
            },

            copyCivLink() {
                let $temp = $("<input>");
                $("body").append($temp);
                $temp.val(this.baseUrl() + this.accountData.username).select();
                document.execCommand("copy");
                $temp.remove();
                this.$store.dispatch('flyingNotification',{message:'Copied',iconSrc:'/images/resume_builder/tick.svg'});
            },
            openCivLink() {
               window.location = this.baseUrl() + this.accountData.username ;
            },
            setPlan(plan){
                this.selectedPlan = 0 ;
                this.selectedBtn = plan;
                setTimeout(() => {
                    this.selectedPlan = plan ;
                },700)
            },


            focusFiledStyles(field_name) {
                let label = $("[for=" + field_name + "]");
                if (label.hasClass('labelFocused')) {
                    label.removeClass('labelFocused');
                } else {
                    label.addClass('labelFocused');
                }
            },

            submitForm() {

                this.clearErrors();
                this.isLoading = true;

                if (this.isUsernameChanged()) {
                    this.accountData.userNameChanged = true;
                }

                axios.post('/api/user/account/submit', this.accountData)
                    .then((response) => {
                        // changes saved pop-up
                        this.$store.dispatch('fullScreenNotification');
                    })
                    .catch((error) => {
                        if (typeof error.response.data === 'object') {
                            this.errors = error.response.data.errors;
                            this.updateErrors(error.response.data.errors);
                        } else {
                            this.errors = ['Something went wrong. Please try again.'];
                        }
                        this.$store.dispatch('flyingNotification', {
                            message: 'Error',
                            iconSrc: '/images/resume_builder/error.png'
                        });
                    })
            },
            clearErrors() {
                $.each(this.errors, (error) => {
                    this.errors[error] = '';
                });
            },
            clearSuccesses() {
                $.each(this.fields, (field) => {
                    this.fields[field] = '';
                });
            },
            updateErrors(responseErrors) {
                $.each(this.errors, (error) => {
                    if (responseErrors[error]) {
                        this.errors[error] = responseErrors[error][0];
                    }
                });
            },
            baseUrl() {
                let getUrl = window.location;
                return getUrl.protocol + "//" + getUrl.host + '/';
            },
            canEditEmail() {
                return !(this.currentUser.instagram_id !== null && !this.isEmail(this.currentUser.email));
            },
            isUsernameChanged() {
                if (!this.currentUser.username) {
                    return;
                } else {
                    return this.usernameOldValue.trim() !== this.accountData.username.trim(); // return true if  changed
                }
            },
            isEmail(email) {
                var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                return re.test(String(email).toLowerCase());
            }
        },
        mounted() {
            let searchParams = new URLSearchParams(window.location.search);

            if (searchParams.has('redirect_from')) {
                let redirect_from = searchParams.get('redirect_from');
                let status = searchParams.get('status');
                if(status === 'success'){
                    setTimeout(() => {
                        this.$store.dispatch('flyingNotification',{message:'Subscribed',iconSrc:'/images/resume_builder/tick.svg'});
                    },1500);
                }else{
                    setTimeout(() => {
                        this.$store.dispatch('flyingNotification',{message:'Error',iconSrc:'/images/resume_builder/error.png'});
                    },1500);
                }
            }
        }

    }
</script>

<style lang="scss">

    @import '../../../../sass/media-queries';

    $text-color: #4374de;
    $primary: #1f5de4;
    $bg-color: white;
    $input-bg: #f1f8fc;
    $placeholder-color: #9ba1ad;


    .view-sub-btn{

        a{
            border: 1px solid $primary;
            width: 60px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: $primary;
            border-radius: 15px;
        }

    }

    .my-account-tab-wrapper {

        .profile-pic-row-holder{
            height: 110px;
            width: 25%;
            background:whitesmoke;
        }
        .profile-pic-row{
            display: flex;
            align-items:center;
            .profile-pic{
                img{
                    width:110px;
                    height:110px;
                    border-radius: 50%;
                }
            }

            .info{
                margin-left:21px;
                .name{
                    font-family: Noto Sans, sans-serif;
                    font-style: normal;
                    font-weight: 600;
                    font-size: 24px;
                    line-height: 36px;
                    color: #888DB1;
                }

                .job-title{
                    font-family: Noto Sans, sans-serif;
                    font-style: normal;
                    font-weight: 600;
                    font-size: 18px;
                    line-height: 25px;
                    color: #888DB1;
                }
            }
        }

        .info-wrapper {
            display: flex;
            align-items: center;

            .avatar {
                margin-right: 32px;

                img {
                    width: 167px;
                    height: 167px;
                }
            }

            .name-title-wrapper {
                .user-name {
                    margin-bottom: 4px;
                    font: Bold 34px/46px Noto Sans;
                    letter-spacing: 0;
                    color: #413A5D;
                    opacity: 1;
                }

                .job-title {
                    margin-left: 4px;
                    font: Medium 18px/24px Noto Sans;
                    letter-spacing: 0;
                    color: #413A5D;
                    opacity: 1;
                }
            }
        }

        .form-wrapper {
            margin-top: 73px;
            display: flex;
            flex-direction: column;
            align-items: flex-start;

            .content-wrapper {
                
                width: 100%;
                max-width: 430px;

                .form-title {
                    margin-bottom: 44px;
                    font: 500 51px Noto Sans;
                    letter-spacing: 0;
                    color: #001CE2;
                    opacity: 1;

                    @include lt-md {
                        font-size: 37px;
                    }
                }

                .form-title.sub {
                    font-weight: 600;
                    font-size: 20px;
                    line-height: 18px;
                    color: #888DB1;
                    margin-bottom: 0;

                    @include lt-md {
                        font-size: 15px;
                    }
                }

                .mar-form {

                    .input-margin{
                        margin-bottom: 20px;
                    }

                    .top-input-margin{
                        margin-top: 6px;
                    }



                    .input-field {
                        display: flex;
                        flex-direction: column-reverse;
                        margin-bottom: 25px;

                        label {
                            text-align: left;
                            font: 500 17px/23px Noto Sans;
                            line-height: 30px;
                            letter-spacing: 0;
                            color: #505050;
                            opacity: 1;

                            @include lt-md {
                                font-size: 15px;
                            }
                        }

                        label.labelFocused {
                            color: #001CE2;
                        }

                        input {
                            opacity: 1;
                        }

                        input:focus {
                            border: 2px solid #001CE2;
                            color: #001CE2;
                            outline: none;
                        }

                        img {
                            width: 36px;
                            height: 36px;
                            right: 20px;
                            position: absolute;
                        }
                    }

                    .input-field.active {
                        label {
                            color: #1EC300;
                            font: 600 17px/23px Noto Sans;
                        }

                        input {
                            border: 2px solid #1EC300;
                            color: #1EC300;
                        }
                    }

                    .input-field.error {
                        label {
                            color: #E20000;
                            font: 600 17px/23px Noto Sans;
                        }

                        input {
                            border: 2px solid #E20000;
                            color: #E20000;
                        }
                    }

                    .my-subscription {
                        display: flex;
                        justify-content: space-between;
                        align-items: center;
                        margin-bottom:20px ;

                        .toggle-label {
                            position: relative;
                            display: block;
                            width: 135px;
                            height: 55px;
                            margin-bottom: 0 !important;
                            border-radius: 41px;

                            input[type="checkbox"] {
                                opacity: 0;
                                position: absolute;
                                width: 100%;
                                height: 100%;

                                + .back {
                                    position: absolute;
                                    width: 100%;
                                    height: 100%;
                                    background: white;
                                    border-radius: 41px;
                                    transition: background 150ms linear;
                                }

                                &:checked {
                                    + .back {
                                        background: white;

                                        /*green*/
                                    }

                                    + .back .toggle {
                                        margin-left: 76px;
                                    }
                                }

                                + .back .toggle {
                                    display: block;
                                    position: absolute;
                                    content: " ";
                                    background: #001BDE;
                                    width: 50%;
                                    height: 100%;
                                    transition: margin 150ms linear;
                                    border: none;
                                    border-radius: 41px;
                                }
                            }

                            .label {
                                display: block;
                                position: absolute;
                                width: 50%;
                                line-height: 54px;
                                margin-right: 6px;
                                text-align: center;
                                font-size: 18px;
                                font-weight: bold;
                                filter: grayscale(0%) !important;

                                &.on {
                                    left: 0;
                                    color: white;
                                    opacity: 1 !important;
                                }

                                &.off {
                                    right: 0;
                                    color: #001BDE !important;
                                    opacity: 1 !important;
                                    margin-right: -6px;

                                }
                            }

                            input[type="checkbox"] {
                                &:checked {
                                    + .back .label.on {
                                        color: #001BDE;
                                    }

                                    + .back .label.off {
                                        color: #fff !important;
                                    }
                                }

                                + .back .label.off {
                                    color: #fff;
                                }
                            }
                        }
                    }
                }

                .actions-row {
                    margin-bottom: 25px;
                    background: #F6F6F6;
                    border-radius: 8px;
                    padding: 10px 25px;
                    max-width: 218px;
                    display: flex;
                    justify-content: space-between;
                    // box-shadow: rgba(0,0,0,.16);

                    @include lt-md {
                        max-width: 100%;
                        // margin-top: 1rem;
                    }

                    img {
                        width: 35px;
                        height: 35px;
                        margin-right: 20px;

                        &:last-child {
                            margin: 0;
                        }

                        &:hover{
                            cursor: pointer;
                        }
                    }
                }

                .action-btns {
                    display: flex;
                    justify-content: space-between;
                    width: 100%;
                    margin-bottom: 20px;

                    @include lt-md {
                        .btn {
                            width: 48%;
                            min-width: 10px !important;
                        }
                    }

                    .save-btn {
                        width: 200px;
                        height: 50px;
                        display: flex;
                        justify-content: center;
                        align-items: center;

                        background: #001CE2;
                        border-radius: 5px;

                        font-family: Noto Sans, sans-serif;
                        font-style: normal;
                        font-weight: 500;
                        font-size: 18px;
                        line-height: 25px;
                        color: #FFFFFF;
                    }

                    .purchase-btn {
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        opacity: 1;
                        height: 50px;
                        width:250px;
                        letter-spacing: 0;
                        padding: 0 !important;
                        border: 2px solid #001CE2;
                        box-sizing: border-box;
                        border-radius: 5px;
                        font-weight: 600;
                        font-size: 18px;
                        line-height: 25px;
                        color: #001CE2;

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

    .toggle-panel.smaller{
        width:110px;
        .aux-fill{
            width: 183%;
            position: absolute;
            background: #1f5de4;
            border-radius: 20px;
            height: 38px;
            top: 0;
            z-index: 1;
        }
    }

    .toggle-panel {
        border: solid 1.3px $primary;
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
        transition: all .3s ease;
    }
    .slide-fade-leave-active {
        transition: all .8s cubic-bezier(1.0, 0.5, 0.8, 1.0);
    }
    .slide-fade-enter, .slide-fade-leave-to
        /* .slide-fade-leave-active below version 2.1.8 */ {
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

    .fade-enter-active, .fade-leave-active {
        transition: opacity .8s ease;
        opacity: 1 !important;

        .form-title,
        label,
        .section-title,
        .aside-bar {
            opacity: 1 !important;
            transition: all .8s ease;
        }
    }
    .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
        opacity: 1 !important;
        transition: opacity .8s ease;

        .form-title,
        label,
        .section-title,
        .aside-bar {
            opacity: 0 !important;
            transition: all .8s ease;
        }
    }

    // Main component transitions
    @for $j from 1 through 6 {
        @keyframes moveInput#{$j} {
            from {
                transform: translate(0);
            } to {
                transform: translate(calc((-1) * (50vw - 50% - 380px - 3rem - 1.17%)), 375px);
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
                        animation-duration: .6s;
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
        color: #aeaeae;
    }


    .error {
        color: red;
        font-weight: 600;
        margin-left: 10px;
        margin-top: 25px;
    }


</style>
