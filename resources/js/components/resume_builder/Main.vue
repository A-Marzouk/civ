<template>
    <div class="resume-container" >

        <nav class="resume-builder-nav d-flex align-items-start">
            <a href="/freelancer/dashboard" class="brand-link">
                <img class="brand-image" src="/images/resume_builder/123 icon.png" alt="123workforce icon"/>
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

        <div class="info-wrapper">
            <div class="avatar">
                <img src="/images/resume_themes/theme5/profile.png" alt="profile-pic">
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
            <router-view></router-view>
        </transition>
    </div>
</template>

<script>

    import { moveTabsHelper } from './helpers/tab-animations'

    export default {
        name: "Main",
        components: {},
        data() {
            return {
                activeTab: 'my-account'
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

                // Move decorator on tabs
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

    $mainColor: #001CE2;
    .resume-container {
        padding: 160px 100px 30px;
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

        .brand-image {
            width: 40px;
            margin-right: 262px;
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

            .action-btn {
                background: transparent;
                border: 0;
                width: 40px;
                margin-right: 58px;
                position: relative;

                img {
                    width: 100%;
                }

                &.user-profile {
                    width: 46px;
                    margin: 0;

                    img {
                        border-radius: 50%;
                        width: 100%;
                    }
                }
            }

        }

    }
</style>
