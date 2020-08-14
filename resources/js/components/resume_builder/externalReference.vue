<template>
    <v-app>
        <v-container class="main-bar">
            <v-app-bar color="transparent" flat tile height="100">
                <v-spacer></v-spacer>
                <a href="/" class="link-back2">Home</a>
            </v-app-bar>
        </v-container>


        <div class="external-reference-content-wrapper">
            External reference page.
        </div>


        <!-- Footer -->
        <v-footer color="#0F4CEE" class="custom-footer">
            <v-container class="footer-container">
                <v-row justify="center" align="center" class="justify-space-around">
                    <v-col md="2" cols="12" :align="windowWidth <=959 ?'center':'left' ">
                        <v-card flat color="transparent" tile>
                            <img
                                    class="logo-footer hidden-sm-and-down"
                                    src="/images/welcome_landing_page/logo/civie_logo-01.png"
                            />
                            <img
                                    class="logo-footer hidden-md-and-up"
                                    src="/images/welcome_landing_page/logo/civie_logo-01.png"
                            />
                        </v-card>
                    </v-col>
                    <v-col md="6" cols="6" align="right" class="hidden-sm-and-down">
                        <v-card flat tile color="transparent">
                            <v-card-text class="follow-us-text">
                                <label>Follow Us:</label>
                                <v-btn fab x-small color="#ffffff" class="footer-social-icon ml-md-2 ml-sm-0 ml-0"  href="https://www.facebook.com/civieapp">
                                    <img
                                            src="/images/welcome_landing_page/icons/social_icons/facebook.png"
                                            alt="facebook"
                                    />
                                </v-btn>
                                <span class="followers">14,044 Followers</span>
                                <v-btn fab x-small color="#ffffff" class="footer-social-icon ml-md-1 ml-sm-0 ml-0">
                                    <img
                                            src="/images/welcome_landing_page/icons/social_icons/instagram.png"
                                            alt="instagram"
                                    />
                                </v-btn>
                                <span>733 Followers</span>
                            </v-card-text>
                        </v-card>
                    </v-col>

                    <v-col md="4" cols="12" align="right" class="hidden-sm-and-down">
                        <v-card color="transparent" flat tile>
                            <v-card-text class="follow-us-text">
                                <label>Contact Us:</label>
                                <v-btn
                                        fab
                                        x-small
                                        color="#ffffff"
                                        class="footer-social-icon mx-1"
                                        v-for="icon in contactIcons"
                                        :key="icon.title"
                                        :href="icon.url"
                                >
                                    <img :src="getContactIcons(icon.title)" />
                                </v-btn>
                            </v-card-text>
                        </v-card>
                    </v-col>

                    <v-col sm="4" cols="4" class="hidden-md-and-up mt-n12">
                        <v-card flat tile color="transparent" align="center" class>
                            <v-card-subtitle class="follow-us-text">Follow Us</v-card-subtitle>
                            <v-card-subtitle>
                                <v-btn fab x-small color="#ffffff" class="footer-social-icon mx-sm-2 mx-1 mt-n2"  href="https://www.facebook.com/civieapp">
                                    <img
                                            src="/images/welcome_landing_page/icons/social_icons/facebook.png"
                                            alt="facebook"
                                    />
                                </v-btn>
                                <v-btn fab x-small color="#ffffff" class="footer-social-icon mx-sm-2 mx-auto mt-n2">
                                    <img
                                            src="/images/welcome_landing_page/icons/social_icons/instagram.png"
                                            alt="instagram"
                                    />
                                </v-btn>
                            </v-card-subtitle>
                        </v-card>
                    </v-col>

                    <v-col sm="8" cols="8" class="hidden-md-and-up mt-n12" align="right">
                        <v-card flat tile color="transparent" class="ml-md-0 ml-sm-0 ml-8">
                            <v-card-subtitle class="follow-us-text" align="center">Contact Us</v-card-subtitle>
                            <v-card-subtitle align="center">
                                <v-btn
                                        fab
                                        x-small
                                        color="#ffffff"
                                        class="footer-social-icon mx-sm-2 mx-1 mt-n2"
                                        v-for="icon in contactIcons"
                                        :key="icon.title"
                                        :href="icon.url"
                                >
                                    <img :src="getContactIcons(icon.title)" />
                                </v-btn>
                            </v-card-subtitle>
                        </v-card>
                    </v-col>
                </v-row>
            </v-container>
        </v-footer>
        <!-- footer -->

    </v-app>
</template>

<script>
    export default {
        name: "externalReference",
        props:['username'],
        data(){
            return{
                windowWidth: window.innerWidth,
                contactIcons: [
                    { id: 1, title: "email", url:'mailto:hi@civ.ie' },
                    { id: 2, title: "messenger", url: "https://www.facebook.com/civieapp" },
                    { id: 3, title: "skype", url:'skype:magictime.uk'},
                    { id: 4, title: "whatsapp", url: 'https://wa.me/353868447832'},
                    { id: 4, title: "telegram", url: 'https://t.me/conormarjoram'},
                ],
            }
        },
        methods:{
            getContactIcons(title) {
                return `/images/welcome_landing_page/icons/contact_icons/${title}.png`;
            },
        },
        computed:{},
        mounted() {

        }

    }
</script>

<style lang="scss" scoped>
    .main-bar {
        display: flex;
        width: 100%;
        justify-content: space-between;
        align-items: center;
        padding: 25px 25px 0 25px;

        .back-btn {
            img {
                width: 54px;
                height: 54px;
            }
            &:hover {
                cursor: pointer;
            }
        }

        .home-text {
            a {
                font-family: Montserrat, sans-serif;
                font-style: normal;
                font-weight: bold;
                font-size: 18px;
                line-height: 22px;
                color: #0046fe;

                &:hover {
                    text-decoration: none;
                }
            }
        }
        //
        .div-back-btn {
            .btn-back {
                width: 54px !important;
                height: 54px !important;
                border: 5px solid #f8f8f8 !important;
                box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.15) !important;
                margin-top: -7px;
                @media screen and (max-width: 599px) {
                    width: 35px !important;
                    height: 35px !important;
                    img {
                        width: 14px !important;
                        height: 11px !important;
                    }
                }
            }

            .link-back {
                font-family: "Montserrat" !important;
                font-weight: 500;
                font-size: 18px;
                line-height: 22px;
                color: #0046fe !important;
                margin-left: 8px;
            }
        }
        .link-back2 {
            font-family: "Montserrat" !important;
            font-weight: 500;
            font-size: 18px;
            line-height: 22px;
            color: #0046fe !important;
        }
    }

    .external-reference-content-wrapper{
        min-height:72vh;
    }
</style>