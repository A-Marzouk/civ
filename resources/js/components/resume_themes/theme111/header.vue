<template>
    <div class="theme-header">

        <!-- <div class="bg-header">
            <img src="/images/resume_themes/theme111/bg-header-bottom-right.svg" alt="" class="bg-header-bottom-right" />
        </div> -->

        <div class="user-info">
            <div class="left">
                <div class="user-img">
                    <img src="/images/resume_builder/default-user.jpg" alt="">
                </div>

                <div class="user-data">
                    <div class="name">José Daniel Quintero</div>
                    <div class="profession">Fullstack Developer</div>
                    <div class="overview">Overview here</div>
                </div>

                <div class="more-icon">
                    <img @click="showMore = !showMore" :class="{hide: showMore}" src="/images/resume_themes/theme111/more-icon.png" alt="">
                    <font-awesome-icon @click="showMore = !showMore" :class="{hide: !showMore}" :icon="['fas', 'times']"></font-awesome-icon>
                </div>
            </div>

            <div class="right">
                <div class="actions-wrapper" :class="{hide: !showMore}">
                    <button class="action-btn">
                        <img class="icon hideIconOnMobile" src="/images/resume_themes/theme111/chat-icon.png">
                        <img class="icon showIconOnMobile" src="/images/resume_themes/theme111/chat-icon-mob.png"> Start a chat
                    </button>
                    <button class="action-btn">
                        <img class="icon hideIconOnMobile" src="/images/resume_themes/theme111/suitcase-icon.png">
                        <img class="icon showIconOnMobile" src="/images/resume_themes/theme111/suitcase-icon-mob.png"> Upload interviews
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
                        <img src="/images/resume_themes/theme111/hireMe-icon.png" alt="hire me icon" class="icon">
                        Hire Me
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data: () => ({
        showMore: false
    })
}
</script>

<style lang="scss">
$mainColor: #2BFAFE;
$tabTextColor: #4D2F2D;
$purple: #686299;

$gradient: linear-gradient(to right, #9434CD, #EE3DC6);

#theme111 {
    .theme-header {
        width: 100%;
        position: relative;

        .left {
            display: flex;
            position: relative;

            .more-icon {
                display: none;
                position: relative;
                
                @media (max-width: 600px) {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    position: absolute;
                    top: 15px;
                    right: 17px;
                }

                img,
                svg {
                    opacity: 1;
                    transition: opacity .4s ease;
                    position: absolute;

                    &.hide {
                        opacity: 0;
                        transition: opacity .4s ease;
                    }
                }

                img {
                    max-width: 100px !important;
                }
            }
            
            @media (max-width: 768px) {
                margin-right: 15px;
            }
            
            @media (max-width: 600px) {
                width: 100%;
                margin-right: 0;
            }
        }

        .right {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            justify-content: center;

            .actions-wrapper {
                display: flex;
                justify-content: center;
                align-items: center;

                .action-btn {
                    width: 220px;
                    height: 68px;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    font-size: 18px;
                    font-weight: 400;
                    background: transparent;
                    border: 2px solid #56EDF0;
                    outline: none;
                    color: white;
                    border-radius: 9px;

                    &:first-child {
                        margin-right: 26px;
                    }

                    .icon {
                        margin-right: 10px;

                        &.showIconOnMobile {
                            display: none;
                        }
                    }

                    @media (max-width: 1400px) {
                        font-size: 16px;

                        .icon {
                            height: 20px;
                        }
                    }
                    
                    @media (max-width: 1200px) {
                        width: 133px;
                        height: 42px;
                        font-size: 10px;

                        .icon {
                            height: 12px;
                        }
                    }
                }

                @media (max-width: 600px) {
                    position: absolute;
                    opacity: 1;
                    transform: translateY(0px);
                    transition: all .4s ease;
                    flex-direction: column;
                    padding: 44px 36px;
                    background: white;
                    width: 90%;
                    border-radius: 25px;
                    z-index: 100;
                    box-shadow: 0 30px 30px rgba(16, 44, 44, 0.1);

                    .action-btn {
                        width: 100%;
                        font-size: 18px;
                        border-radius: 0;
                        background: transparent;
                        margin: 0 !important;
                        justify-content: flex-start;
                        padding: 0;
                        color: #4030A1;
                        border: none;

                        &:first-child {
                            margin-bottom: 35px !important;
                        }

                        .icon {
                            height: 16px;
                            
                            &.showIconOnMobile {
                                display: block;
                            }

                            &.hideIconOnMobile {
                                display: none;
                            }
                        }
                    }

                    &.hide {
                        transition: all .4s ease;                        
                        transform: translateY(-260px);
                        opacity: 0;
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
                    text-align: center;
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    font-size: 26px;
                    font-weight: 700;
                    margin-right: 35px;

                    small {
                        font-size: 15px;
                        font-weight: 400px;
                        color: white;
                    }

                    @media (max-width: 1400px) {
                        font-size: 22px;

                        small {
                            font-size: 13px;
                        }
                    }
                    
                    @media (max-width: 1200px) {
                        font-size: 15px;

                        small {
                            font-size: 8px;
                        }
                    }

                    @media (max-width: 825px) {
                        margin-right: 20px;
                    }
                    
                    @media (max-width: 600px) {
                        margin-right: 0;
                        align-items: flex-start;
                    }
                }

                .hire-me-btn {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    background: $mainColor;
                    width: 220px;
                    height: 68px;
                    font-size: 18px;
                    font-weight: 700;
                    color: #4030A1;
                    border-radius: 9px;

                    .icon {
                        margin-right: 10px;
                    }

                    @media (max-width: 1400px) {
                        font-size: 16px;
                        
                        

                        .icon {
                            height: 20px;
                        }
                    }
                    
                    @media (max-width: 1200px) {
                        width: 133px;
                        height: 42px;
                        font-size: 10px;

                        .icon {
                            height: 12px;
                        }
                    }
                    
                    @media (max-width: 600px) {
                        font-size: 10px;
                        padding: 14px 24px;
                        min-width: 80px;

                        .icon {
                            height: 12px;
                        }
                    }
                }

                @media (max-width: 1200px) {
                    margin-top: 27px;
                }

                @media (max-width: 600px) {
                    margin-top: 0;
                    padding-left: 60px;
                    justify-content: space-between;
                    width: 100%;
                }
            }

            

            @media (max-width: 600px) {
                margin-top: 0;
                justify-content: space-between;
                width: 100%;
            }
        }

        .user-info {
            display: flex;
            justify-content: space-between;
            padding: 56px 80px;
            z-index: 1;
            position: relative;

            @media (max-width: 1400px) {
                padding: 56px;
            }
            
            @media (max-width: 1200px) {
                padding: 37px 40px;
            }
            
            @media (max-width: 768px) {
                padding: 30px 17px;
            }
            
            @media (max-width: 600px) {
                flex-wrap: wrap;
            }

            .user-img {
                display: inline-block;
                width: 232px;
                height: 232px;
                margin-right: 55px;

                img {
                    width: 100%;
                    border-radius: 50%;
                    border: 6px solid $mainColor;
                    box-shadow: 0px 0px 40px rgba(86, 237, 240, 0.6);
                }

                @media (max-width: 1400px) {
                    width: 184px;
                    height: 184px;
                    margin-right: 33px;
                }
                
                @media (max-width: 1200px) {
                    width: 141px;
                    height: 141px;

                    img {
                        border-width: 2px;
                    }
                }
                
                @media (max-width: 600px) {
                    margin-right: 20px;
                }

                @media (max-width: 600px) {
                    width: 50px;
                    height: 50px;
                    margin-right: 12px;
                }
            }

            .user-data {
                display: flex;
                justify-content: center;
                flex-direction: column;
                font-size: 26px;
                font-weight: 400;

                .name {
                    font-weight: 700;
                    font-size: 30px;
                    margin-bottom: 20px;
                }

                .profession {
                    margin-bottom: 30px;
                    color: white;

                    @media (max-width: 1200px) {
                        margin-bottom: 20px;
                    }
                }

                .overview {
                    display: flex;
                    padding: 0;
                    color: white;
                    
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
                            background: #FFFFFF;
                            border-radius: 50%;
                            right: -20px;
                            top: calc(50% - 3.5px);
                        }

                        @media (max-width: 1200px) {

                            &::after {
                                height: 5px;
                                width: 5px;
                            }
                        }
                    }

                    @media (max-width: 780px) {
                        flex-wrap: wrap;
                    }
                }

                @media (max-width: 1400px) {
                    font-size: 22px;

                    .name {
                        font-size: 28px;
                    }
                }
                
                @media (max-width: 1200px) {
                    font-size: 15px;

                    .name {
                        font-size: 17px;
                        margin-bottom: 13px;
                    }
                }

                @media (max-width: 600px) {

                    .name {
                        font-size: 12px;
                        margin-bottom: 5px;
                    }

                    .profession {
                        font-size: 10px;
                        margin-bottom: 18px;
                    }

                    .overview {
                        display: none;
                    }
                }
            }
        }
    }
}
</style>