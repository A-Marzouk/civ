<template>
    <div class="resume-container">

        <nav class="resume-builder-nav d-flex align-items-start justify-content-between">
            <a href="/resume-builder" class="brand-link">
                <img class="brand-image" src="/images/logo_new.png" alt="123workforce icon"/>
            </a>

            <a href="javascript:;" class="menu-link" @click='openMenu = true'>
                <img class="menu-icon" src="/icons/menu-icon.svg" alt="menu icon 123workforce"/>
            </a>

            <div class="nav-icons">
                <router-link id='editCV' data-target="editCV" v-on:click.native="changeTab" to="/resume-builder/edit" class="">
                    <div class="icon">
                        <img src="/images/new_resume_builder/icons/main/Edit-1.png" alt="profile-pic">
                    </div>
                </router-link>
                <router-link id='viewCV' data-target="viewCV" v-on:click.native="changeTab" to="/resume-builder/view" class="">
                    <div class="icon">
                        <img src="/images/new_resume_builder/icons/main/Theme-1.png" alt="profile-pic">
                    </div>
                </router-link>
                <router-link id='coverLetter' data-target="coverLetter" v-on:click.native="changeTab" to="/resume-builder/cover-letter" class="">
                    <div class="icon">
                        <img src="/images/new_resume_builder/icons/main/coverletter-1.png" alt="profile-pic">
                    </div>
                </router-link>
                <router-link id='jobAlert' data-target="jobAlert" v-on:click.native="changeTab" to="/resume-builder/jobs" class="">
                    <div class="icon">
                        <img src="/images/new_resume_builder/icons/main/job-1.png" alt="profile-pic">
                    </div>
                </router-link>
                <router-link id='myAccount' data-target="myAccount" v-on:click.native="changeTab" to="/resume-builder" class="">
                    <div class="icon">
                        <img :src="personalInfo.profile_pic" alt="profile-pic">
                    </div>
                </router-link>
            </div>

        </nav>

        <div class="side-menu" :class="{ opened: openMenu }">
            <div class="bg-action" @click='openMenu = false'></div>
            <div class="side-bg-panel">
                <div class="links-wrapper">

                    <a href="javascript:;" class="close-btn" @click='openMenu = false'>
                        <img class="close-icon" src="/icons/close-icon.svg" alt="close icon 123workforce"/>
                    </a>

                    <div id="mainLinksWrapperMobile" class="links-group d-flex align-items-center justify-content-between">
                        <router-link id='editCVMobile' data-target="editCV" v-on:click.native="setActiveTab('editCV')" to="/resume-builder/edit" class="second has-inside-routes main-tab-link">
                            <svg-vue class="nav-icon" :icon="`editCV-icon`"></svg-vue>
                        </router-link>
                        <router-link id='viewCVMobile' data-target="viewCV" v-on:click.native="setActiveTab('viewCV')" to="/resume-builder/view" class="third has-inside-routes main-tab-link">
                            <svg-vue class="nav-icon" :icon="`view-icon`"></svg-vue>
                        </router-link>
                        <!-- <router-link id='importMobile' data-target="import" v-on:click.native="setActiveTab('import')" to="/resume-builder/import" class="third has-inside-routes main-tab-link">
                            <svg-vue class="nav-icon" :icon="`import`"></svg-vue>
                        </router-link> -->
                        <router-link id='myAccountMobile' data-target="myAccount" v-on:click.native="setActiveTab('myAccount')" to="/resume-builder" class="first main-tab-link">
                            <svg-vue class="nav-icon" :icon="`account-icon`"></svg-vue>
                        </router-link>
                    </div>
                </div>

                <edit-menu v-show='activeTab === "editCV"'></edit-menu>
                <a class="btn-logout" href="javascript:;" @click="logout">
                    <font-awesome-icon :icon="['fas','sign-out-alt']" size="2x" color="#001CE2"/>
                </a>
            </div>
        </div>

        <div class="content" 
            :class="{ 'hideInfoWrapper': activeTab === 'viewCV' }"
        >
            <div class="info-wrapper justify-content-between" v-if="personalInfo">
                <div class="d-flex align-items-center">
                    <div class="avatar">
                        <img :src="personalInfo.profile_pic" alt="profile-pic">
                    </div>
                    <div class="name-title-wrapper">
                        <div class="user-name">
                            {{user.name}}
                        </div>
                        <div class="job-title" v-if="personalInfo">
                            {{personalInfo.designation}}
                        </div>
                    </div>
                </div>

                <div class="auto-import-btn NoDecor" v-show="$route.name === 'my-account'">
                    <button class="btn btn-filled" @click="logout">
                        Log Out
                    </button>
                </div>
            </div>
        </div>


        <transition :duration="590" class="mt-5 content" name="fade" mode="out-in">
            <router-view style="min-height: 100vh;"></router-view>
        </transition>


        <!-- Notifications and progress bar | to be moved to component-->

        <div class="modal fade" id="fullScreenNotificationModal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content border-0" style="border:none !important;">
                    <div class="modal-body">
                        <!-- image and notification text are set on stor.js (while sending the event) - default value is for success-->
                        <div class="thank-you-pop d-flex">
                            <img src="" id="notificationIconSrc" alt="notification modal">
                            <div class="success-message-text" id="notificationText"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="flying-notification" id="flyingNotification">
            <div class="d-flex align-items-center justify-content-center">
                <img src="" id="flyingNotificationIconSrc" alt="notification modal">
                <div class="text" id="flyingNotificationText"></div>
            </div>
        </div>

        <div class="flying-notification delete" id="flyingNotificationDelete">
            <div class="d-flex align-items-center justify-content-center">
                <img src="/images/resume_builder/delete-icon-red.png" alt="notification modal">
                <div class="text">Deleted</div>
            </div>
        </div>

        <div class="progressBar" id="progressBar"></div>


        <div class="modal importModal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="prices" aria-hidden="true" style="overflow: hidden!important;">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-body">
                        <div class="close-btn" data-dismiss="modal">
                            <a href="javascript:void(0)">
                                <img src="/images/resume_builder/my_account/close-modal.png" alt="Close icon">
                            </a>
                        </div>
                        <div class="importModalContent">
                            <div class="title">
                                Import from
                            </div>

                            <div class="importOptions">
                                <div class="item">
                                    <img src="/images/resume_builder/my_account/word.png" alt="Word icon">
                                    Word
                                </div>
                                <div class="item">
                                    <img class="behance" src="/images/resume_builder/my_account/behance.png" alt="Behance icon">
                                    Behance
                                </div>
                                <div class="item">
                                    <img src="/images/resume_builder/my_account/download.png" alt="Upload icon" style="transform: scaleY(-1);">
                                    Upload PDF
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</template>

<script>

    import { moveTabsHelper } from './helpers/tab-animations'
    import editMenu from './components/aside-menu'

    export default {
        name: "Main",
        components: {
            'edit-menu': editMenu
        },
        data() {
            return {
                openMenu: false,
                activeTab: 'myAccount'
            }
        },
        computed: {
            user() {
              return this.$store.state.user;
            },
            personalInfo(){
                return this.$store.state.user.personal_info;
            }
        },
        methods: {
            setActiveTab(tab) {
                this.activeTab = tab
            },
            changeTab (e) {
                let _this = this

                let inputs = document.querySelectorAll('#myAccountTab input');
                inputs.forEach(input => {
                    input.value = '';
                    input.placeholder = ''
                })

                moveTabsHelper(e, 'mainLinksWrapper', _this)
            },
            logout(){
                axios.post('/logout').then((response) =>{
                        // remove access token from cookies:
                        Vue.$cookies.remove('access_token');
                        window.location.href = '/';
                    }
                )
            }
        },
        mounted() {
            this.$store.dispatch('setCurrentUser', this.$attrs.tempuser);
            let currentTab = 'myAccount';
            let pathArray = window.location.pathname.split('/');
            pathArray.forEach( (tab) => {
                if(tab === 'resume-builder'){
                     currentTab = pathArray[pathArray.indexOf(tab) + 1];
                }
            });

            switch (currentTab) {
                // edit Tab
                case 'edit':
                    this.changeTab({ target: document.getElementById('editCV')}, 'mainLinksWrapper', this);
                    break;


                // view CV Tab
                case 'view':
                    this.changeTab({ target: document.getElementById('viewCV')}, 'mainLinksWrapper', this);
                    break;

                case 'import':
                    this.changeTab({ target: document.getElementById('import')}, 'mainLinksWrapper', this);
                    break


                // my Account Tab
                default:
                    this.changeTab({ target: document.getElementById('myAccount')}, 'mainLinksWrapper', this);
                    break;
            }

        }
    }
</script>

<style lang="scss" scoped>

@import '../../../sass/media-queries';
    body.modal-open {
        overflow: visible !important;
    }

    .content {
        width: 100%;

        &.hideInfoWrapper {
            margin: 0;

            .info-wrapper {
                display: none;
            }
        }

        .info-wrapper {
           @include lt-md {
                display: none !important;
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
                border-radius: 50%;
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

    $mainBlue: #001CE2;
    .resume-container {
        padding: 160px 100px 30px;
        width: 100%;
        overflow-x: hidden;

        @include lt-md {
            padding: 80px 80px 50px;
        }

        @include lt-sm {
            padding: 100px 20px 50px;
        }
    }

    .side-menu {
        display: none;
        transform: translateX(-100%);
        position: fixed;
        display: flex;
        flex-direction: column;
        left: 0;
        top: 0;
        height: 100%;
        width: 100vw;
        z-index: 510;
        background: rgba(255, 255, 255, 0.6);
        transition: all ease .4s;

        .decorator { 
            display: none;
        }

        .side-bg-panel {
            background: rgba(255, 255, 255, 0.9);
            width: 80%;
            height: 100%;
            max-width: 265px;
            box-shadow: 0 12px 12px rgba(0, 0, 0, .1);
            overflow: auto;
        }

        .bg-action {
            position: absolute;
            width: 100%;
            height: 100%;
            z-index: -1;
        }

        .links-wrapper {
            padding: 40px;
            background: white;
            box-shadow: 0 9px 10px rgba(0, 0, 0, .04);
            
            .links-group {
                margin-top: 38px;
            }

            .nav-icon {
                width: 30px;
                height: 30px;
            }
        }

        @include lt-lg {
            display: block;

            &.opened {
                transform: translateX(0);
                transition: all ease .2s;
            }
        }

        .btn-logout {
            display: flex;
            justify-content: flex-end;
            width: 100%;
            padding: 1rem 2rem;

            path {
                fill: $mainBlue;
            }

        }
    }

    .resume-builder-nav {
        width: 100vw;
        position: fixed;
        left: 0;
        top: 0;
        box-shadow: 0 6px 12px #6565653b;
        padding: 50px 100px;
        height: 129px;
        background: #fff;
        z-index: 500;
        overflow: hidden;

        @include lt-lg {
            padding: 26px 80px;
            height: 90px;
        }

        @include lt-sm {
            padding: 36px;
            height: auto;
            overflow-x: hidden;
            // box-shadow: none;
        }

        .btn {
            max-width: 110px !important;
            margin-top: 0 !important;

            @include lt-md {
                max-width: 80px !important;
            }
            
            @include lt-sm {
                max-width: 60px !important;
            }
        }

        .brand-link {
            flex-grow:0.4;
            margin-top: -12px;
            @include lt-lg {
                display: none;
            }
            img{
                width:143px;
                height:52px;
            }
        }

        .brand-image {
            width: 40px;
            margin-right: 50px;

            @include lt-lg {
                display: none;
            }
        }

        .menu-link {
            margin-top: 5px;
            display: none;

            @include lt-lg {
                display: block;
            }

            @include lt-md {
                margin-top: 10px;
            }
        }

        .menu-icon {
            display: none;
            height: 20px;
            // margin:

            @include lt-lg {
                display: block;
            }

            @include lt-sm {
                height: auto;
            }
        }

        #mainLinksWrapper {
            width: 800px;

            @include lt-lg {
                display: none !important;
            }
        }

        .links-group {
            height: 100%;
            position: relative;

            @include lt-lg {

            }

            .decorator {
                position: absolute;
                display: block;
                height: 5px;
                background-color: $mainBlue;
                border-radius: 5px 5px 0 0;
                transform: translateX(0);
                transition: .6s;
                bottom: -50px;
            }

            a {
                // margin-right: 100px;
                max-width: 205px;
                width: 45%;
                text-align: center;
                color: #747474;
                font-weight: bold;
                display: block;
                padding: 0 30px;
                height: 100%;
                font-size: 25px;
                transition: color 1s;
                border-bottom-color: transparent;
                white-space: nowrap;
                &:hover,
                &:active {
                    text-decoration: none;
                }

                &.router-link-exact-active, &.router-link-active.has-inside-routes {
                    position: relative;
                    color: $mainBlue;
                }



                &:last-child {
                    margin: 0;
                }
            }
        }

        .actions-group {
            // position: absolute;
            // right: 100px;

            // @include lt-lg {
            //     right: 37px;
            // }

            align-self: center;

            .action-btn {
                background: transparent;
                border: 0;
                width: 40px;
                margin-right: 58px;
                position: relative;

                @include lt-md {
                    width: 26px;
                    margin-right: 33px;
                }

                @include lt-sm {
                    width: 20px;
                    margin-right: 24px;
                }

                img {
                    width: 100%;
                }

                &.user-profile {
                    width: 46px;
                    margin: 0;

                    @include lt-sm {
                        width: 27px;
                    }

                    img {
                        border-radius: 50%;
                        width: 100%;
                    }
                }
            }

        }

        .nav-icons{
            display: flex;
            margin-top: -12px;
            .icon{
                margin-left:10px;
                img{
                    width:50px;
                    height:50px;
                    border-radius:50%;
                }
            }
        }

    }


    .thank-you-pop {
        width: 100%;
        display:flex;
        align-items:center ;
        justify-content: center;

        img {
            width: 99px;
            height: 99px;
            margin-right:64px;
        }

        p {
            font-size: 20px;
            margin-bottom: 27px;
            color: #5C5C5C;
        }

        h3.cupon-pop {
            font-size: 25px;
            margin-bottom: 40px;
            color: #222;
            display: inline-block;
            text-align: center;
            padding: 10px 20px;
            border: 2px dashed #222;
            clear: both;
            font-weight: normal;

            span {
                color: #03A9F4;
            }
        }

        a {
            display: inline-block;
            margin: 0 auto;
            padding: 9px 20px;
            color: #fff;
            text-transform: uppercase;
            font-size: 14px;
            background-color: #8BC34A;
            border-radius: 17px;

            i {
                margin-right: 5px;
                color: #fff;
            }
        }
    }

    #fullScreenNotificationModal .modal-header {
        border: 0px;
    }

    .success-message-text{
        font-weight: 600;
        font-size: 33px;
        text-align: left;
        color: #505050;
    }


    #fullScreenNotificationModal{
        align-items: center;
        background: rgba(255, 255, 255, 0.9);
        overflow-y: hidden;
        .modal-dialog{
            max-width: 736px !important;
            height: 100vh !important;
            display: flex;
        }

        .modal-content{
            border: none;
            border-radius: 45px;
            margin: auto !important;
            height: fit-content !important;
        }
        .modal-body{
            height:303px;
            display:flex;
            align-items:center ;
            justify-content: center;
        }

    }


    .progressBar{
        position:fixed;
        width:0%;
        height:7px;
        bottom:0;
        left: 0;
        background:#1EC300;
    }

// import modal styles:

.importModal{

    .modal-dialog{
        display: flex;
        justify-content: center;
        margin-top: 15%;

        .modal-content{
            width:889px;
            border-radius: 20px;

            .modal-body{
                width: 889px;
                height:340px;

                border:1.5px solid #001CE2;
                border-radius:20px;

                display: flex;
                align-items: flex-start;
                justify-content: center;

                padding-left:120px;
                padding-right:120px;

                .importModalContent{
                    width: 100%;
                    display: flex;
                    align-items: center;
                    flex-direction: column;

                    .title{
                        margin-top:20px;
                        margin-bottom:40px;
                        font-weight: bold;
                        font-size: 48px;
                        text-align: left;
                        color: #001ce2;
                    }

                    .importOptions{
                        display: flex;
                        justify-content: space-between;
                        width: 100%;

                        .item{
                            display: flex;
                            flex-direction: column;
                            align-items: center;
                            justify-content: flex-end;

                            font-weight: normal;
                            font-size: 22px;
                            text-align: left;
                            color: #001ce2;
                            img{
                                margin-bottom: 15px;
                                width: 57.05px;
                                height:54.68px;
                            }
                            img.behance{
                                height:38.68px;
                            }

                            &:hover{
                                cursor:pointer;
                            }
                        }
                    }
                }

                .close-btn{
                    position: absolute;
                    top: 50px;
                    left: 58px;
                    &:hover{
                        cursor:pointer;
                    }
                }

            }
        }
    }
}

.auto-import-btn {
    a {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 226px;
        height: 62px;

        border: 1.5px solid #001CE2;
        border-radius: 8px;
        opacity: 1;

        font: 600 19px Noto Sans;
        letter-spacing: 0;
        color: #001CE2;

        img {
            width: 27px;
            height: 27px;
            margin-right: 14px;
        }
    }
}


// Responsive

    // Mobile responsive
    @include lt-sm {

    }


</style>
