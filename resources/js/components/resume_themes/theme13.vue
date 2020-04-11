<template>
    <v-app id="theme13" style="width: 100%">
        <div class="theme-header">

            <div class="bg-header">
                
            </div>

            <div class="user-info">

                <div class="left">
                    <div class="user-img">
                        <img src="" alt="">
                    </div>

                    <div class="user-data">
                        <div class="name">José Daniel Quintero</div>
                        <div class="profession">Fullstack Developer</div>
                        <ul class="speciallity">
                            <li class="item">Node js</li>
                            <li class="item">React js</li>
                            <li class="item">Laravel</li>
                        </ul>
                    </div>
                </div>

                <div class="right">
                    <div class="actions-wrapper">
                        <button class="action-btn">
                            <img class="icon" src="/images/resume_themes/theme13/chat-icon.png"> Start a chat
                        </button>
                        <button class="action-btn">
                            <img class="icon" src="/images/resume_themes/theme13/suitcase-icon.png">Upload interviews
                        </button>
                    </div>

                    <div class="payment-data">
                        <div class="hourly-rate">
                            $15
                            <small>Hourly rate</small>
                        </div>
                        <div class="hourly-availability">
                            40Hrs
                            <small>Weekly Availability</small>
                        </div>

                        <button class="hire-me-btn">
                            <img src="/images/resume_themes/theme13/hireMe-icon.png" alt="hire me icon" class="icon">
                            Hire Me
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="theme-body">
            <v-row
                justify="space-around"
            >
                <v-col lg="12">
                    <v-tabs
                        centered
                        :center="true"
                    >
                        <v-tabs-slider></v-tabs-slider>
                        <v-tab>Item One</v-tab>
                        <v-tab>Item Two</v-tab>
                        <v-tab>Item Three</v-tab>
                    </v-tabs>
                </v-col>
            </v-row>
        </div>
    </v-app>
</template>

<script>
export default {
    
}
</script>


<style lang="scss" scope>

@import '../../../sass/media-queries';
@import url('https://fonts.googleapis.com/css2?family=Muli:wght@400;700&display=swap');

$mainColor: #28404A;
$tabTextColor: #4D2F2D;
$purple: #686299;

#theme13 {
    font-family: 'Muli', sans-serif;
    width: 100%;
    color: $mainColor;
    background: #FFF7F3;

    .theme-header {
        width: 100%;

        .left {
            display: flex;

        }

        .right {
            display: flex;
            flex-direction: column;
            align-items: flex-end;

            .actions-wrapper {
                display: flex;
                justify-content: center;
                align-items: center;

                .action-btn {
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    padding: 22px 36px;
                    font-size: 18px;
                    font-weight: 400;
                    background: #fff;
                    outline: none;
                    border-radius: 9px;

                    &:first-child {
                        margin-right: 26px;
                    }

                    .icon {
                        margin-right: 10px;
                    }
                }
            }

            .payment-data {
                display: flex;
                justify-content: center;
                align-items: flex-end;
                margin-top: 46px;

                .hourly-rate,
                .hourly-availability {
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    font-size: 26px;
                    font-weight: 700;
                    margin-right: 35px;

                    small {
                        font-size: 15px;
                        font-weight: 400px;
                    }
                }

                .hire-me-btn {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    background: $purple;
                    padding: 23px 62px;
                    font-size: 18px;
                    font-weight: 700;
                    color: white;
                    border-radius: 9px;

                    .icon {
                        margin-right: 10px;
                    }
                }
            }
        }

        .user-info {
            display: flex;
            justify-content: space-between;
            padding: 56px 80px;

            .user-img {
                display: inline-block;
                width: 232px;
                height: 232px;
                border-radius: 50%;
            }

            .user-data {
                display: inline-block;
                font-size: 26px;
                font-weight: 400;

                .name {
                    font-weight: 700;
                    font-size: 30px;
                    margin-bottom: 20px;
                }

                .profession {
                    margin-bottom: 30px;
                }

                .speciallity {
                    display: flex;
                    
                    .item {
                        margin-right: 40px;
                        position: relative;

                        &:last-child {
                            margin-right: 0;

                            &::after {
                                display: none;
                            }
                        }

                        &::after {
                            content: "";
                            position: absolute;
                            width: 7px;
                            height: 7px;
                            background: #28404A;
                            border-radius: 50%;
                            right: -20px;
                            top: calc(50% - 3.5px);
                        }
                    }
                }
            }
        }
    }

    .theme-body {
        height: 400px;
        background: white;
        border-radius: 80px 80px 0 0;

        .v-tabs {
            font-family: 'Muli', sans-serif;
            color: $tabTextColor;
            margin-top: 61px;
            
            .v-tab {
                padding: 12px 40px;
                margin-right: 50px;

                &--active {
                    color: white !important;
                }
            }

            &-slider-wrapper {
                height: 100% !important;
                z-index: -1;

                .v-tabs-slider {
                    background: $purple;
                    border-radius: 25px;
                }
            }
        }

    }

}
    
</style>