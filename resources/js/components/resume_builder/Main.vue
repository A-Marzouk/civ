<template>
    <div class="resume-container" >

        <nav class="resume-builder-nav d-flex align-items-start">
            <a href="/resume-builder" class="brand-link">
                <img class="brand-image" src="/images/resume_builder/123 icon.png" alt="123workforce icon"/>
            </a>

            <a href="javascript:;" class="menu-link" @click='openMenu = true'>
                <img class="menu-icon" src="/icons/menu-icon.svg" alt="menu icon 123workforce"/>
            </a>

            <!-- Replace this with vue-tabs -->
            <div id="mainLinksWrapper" class="links-group d-flex align-items-center justify-content-between">
                <router-link id='myAccount' data-target="myAccount" v-on:click.native="changeTab" to="/resume-builder" class="first main-tab-link">
                    My account
                </router-link>
                <router-link id='editCV' data-target="editCV" v-on:click.native="changeTab" to="/resume-builder/edit" class="second has-inside-routes main-tab-link">
                    Edit CV
                </router-link>
                <router-link id='viewCV' data-target="viewCV" v-on:click.native="changeTab" to="/resume-builder/view" class="third has-inside-routes main-tab-link">
                    View CV
                </router-link>

                <div class="decorator"></div>
            </div>

            <div class="actions-group d-flex align-items-center justify-content-between">
                <button class="action-btn">
                    <img src="/images/resume_builder/notification.png" alt="notification icon">
                </button>
                <button class="action-btn">
                    <img src="/images/resume_builder/settings-icon.svg" alt="settings icon" @click="logout">
                </button>
                <button class="action-btn user-profile">
                    <img src="/images/resume_builder/default-user.jpg" alt="user profile picture">
                </button>
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
                        <router-link id='myAccountMobile' data-target="myAccount" v-on:click.native="setActiveTab('myAccount')" to="/resume-builder" class="first main-tab-link">
                            <svg-vue class="nav-icon" :icon="`account-icon`"></svg-vue>
                        </router-link>
                        <router-link id='editCVMobile' data-target="editCV" v-on:click.native="setActiveTab('editCV')" to="/resume-builder/edit" class="second has-inside-routes main-tab-link">
                            <svg-vue class="nav-icon" :icon="`editCV-icon`"></svg-vue>
                        </router-link>
                        <router-link id='viewCVMobile' data-target="viewCV" v-on:click.native="setActiveTab('viewCV')" to="/resume-builder/view" class="third has-inside-routes main-tab-link">
                            <svg-vue class="nav-icon" :icon="`view-icon`"></svg-vue>
                        </router-link>
                    </div>
                </div>

                <edit-menu v-show='activeTab === "editCV"'></edit-menu>
            </div>
        </div>

        <div class="info-wrapper" v-if="personalInfo">
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
            this.$store.dispatch('getCurrentUser');
            let pathArray = window.location.pathname.split('/')

            switch (pathArray[2]) {
                // edit Tab
                case 'edit':
                    this.changeTab({ target: document.getElementById('editCV')}, 'mainLinksWrapper', this)
                    break
                    

                // view CV Tab
                case 'view':
                    this.changeTab({ target: document.getElementById('viewCV')}, 'mainLinksWrapper', this)
                    break

                // my Account Tab
                default:
                    this.changeTab({ target: document.getElementById('myAccount')}, 'mainLinksWrapper', this)
                    break
            }
        }
    }
</script>

<style lang="scss">

@import '../../../sass/media-queries';
    body.modal-open {
        overflow: visible !important;
    }

    .info-wrapper {
        display: flex;
        align-items: center;

        @include lt-md {
            display: none;
        }

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

    $mainColor: #001CE2;
    .resume-container {
        padding: 160px 100px 30px;
        width: 100%;
        overflow-x: hidden;

        @include lt-md {
            padding: 50px 36px;
        }
    }

    .side-menu {
        display: none;
        transform: translateX(-100%);
        position: fixed;
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

        @include lt-md {
            display: block;

            &.opened {
                transform: translateX(0);
                transition: all ease .2s;
            }
        }

        .close-icon {

        }
    }

    .resume-builder-nav {
        width: 100vw;
        position: absolute;
        left: 0;
        top: 0;
        box-shadow: 0 6px 12px #6565653b;
        padding: 50px 100px;
        height: 129px;
        background: #fff;
        z-index: 500;
        overflow-x: hidden;

        @include lt-md {
            padding: 26px 37px;
            height: auto;
            box-shadow: none;
        }

        .brand-image {
            width: 40px;
            margin-right: 262px;

            @include lt-md {
                display: none;
            }
        }

        .menu-link {
            margin-top: 10px;
        }

        .menu-icon {
            display: none;
            // margin:

            @include lt-md {
                display: block;
            }
        }

        #mainLinksWrapper {
            @include lt-md {
                display: none !important;
            }
        }

        .links-group {
            height: 100%;
            position: relative;

            .decorator {
                position: absolute;
                display: block;
                height: 5px;
                background-color: $mainColor;
                border-radius: 5px 5px 0 0;
                transform: translateX(0);
                transition: .6s;
                bottom: -50px;
            }

            a {
                margin-right: 100px;
                width: 205px;
                text-align: center;
                color: #747474;
                font-weight: bold;
                display: block;
                padding: 0 30px;
                height: 100%;
                font-size: 25px;
                transition: color 1s;
                border-bottom-color: transparent;

                &:hover,
                &:active {
                    text-decoration: none;
                }

                &.router-link-exact-active, &.router-link-active.has-inside-routes{
                    position: relative;
                    color: $mainColor;
                }



                &:last-child {
                    margin: 0;
                }
            }
        }

        .actions-group {
            position: absolute;
            right: 100px;

            @include lt-md {
                right: 37px;
            }

            .action-btn {
                background: transparent;
                border: 0;
                width: 40px;
                margin-right: 58px;
                position: relative;

                @include lt-md {
                    width: 20px;
                    margin-right: 24px;
                }

                img {
                    width: 100%;
                }

                &.user-profile {
                    width: 46px;
                    margin: 0;

                    @include lt-md {
                        width: 27px;
                    }

                    img {
                        border-radius: 50%;
                        width: 100%;
                    }
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

    .flying-notification{
        position: fixed;
        display: none;
        bottom: 30px;
        right: 50px;
        width: 145px;
        height: 65px;
        background: whitesmoke;
        padding: 15px;
        border-radius: 8px;
        box-shadow: 0 0 15px white;

        img{
            width: 40px;
            margin-right: 15px;
        }

        .text{
            font-weight: 600;
            font-size:18px;
        }

        &.delete{
            img{
                width: 26px;
                margin-right: 15px;
            }

            .text{
                color: #f92727;
            }
        }


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

    // Responsive

    // Mobile responsive
    @include lt-md {

    }
</style>
