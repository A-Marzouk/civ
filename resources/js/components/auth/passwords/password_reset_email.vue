<template>
    <v-app style="width:100%;" class="app-container">
        <!-- main container -->
        <v-container class="main-bar">
            <v-app-bar color="transparent" flat tile height="100">
                <div class="div-back-btn">
                    <v-btn fab color="#0046FE" depressed dark class="btn-back">
                        <img src="/images/pricing/icons/left-arrow.svg" />
                    </v-btn>
                    <a href="/" class="link-back">Back</a>
                </div>
                <v-spacer></v-spacer>
                <a href="/" class="link-back2">Home</a>
            </v-app-bar>
        </v-container>

        <v-container style="margin-top: 40px;">
            <password-reset-email></password-reset-email>
        </v-container>
    </v-app>
</template>

<script>
    import ResetForm from "../partials/passwords/password_reset_email";
    export default {
        name: "password_reset",
        components: {
            "password-reset-email": ResetForm
        },
        data(){
            return{

            }
        },
        methods:{

        }
    };
</script>

<style lang="scss" scoped>
    .main-bar {
        display: flex;
        width: 100%;
        justify-content: space-between;
        align-items: center;
        padding: 25px 25px 0 25px;
        max-height:80px;

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
</style>
