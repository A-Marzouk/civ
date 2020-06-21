<template>
    <div class="theme-header">

        <div class="user-info">
            <div class="left">
                <div class="user-img">
                    <img src="/images/resume_builder/default-user.jpg" alt="">
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

                <div class="more-icon">
                    <img @click="showMore = !showMore" :class="{hide: showMore}" src="/images/resume_themes/theme110/more-icon.png" alt="">
                    <font-awesome-icon @click="showMore = !showMore" :class="{hide: !showMore}" :icon="['fas', 'times']"></font-awesome-icon>
                </div>
            </div>

            <div class="right">
                <div class="actions-wrapper" :class="{hide: !showMore}">
                    <button class="action-btn">
                        <img class="icon" src="/images/resume_themes/theme110/chat-icon.png"> Start a chat
                    </button>
                    <button class="action-btn">
                        <img class="icon" src="/images/resume_themes/theme110/suitcase-icon.png">Upload interviews
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
                        <img src="/images/resume_themes/theme110/hireMe-icon.png" alt="hire me icon" class="icon">
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
$mainColor: #492163;
$tabTextColor: #4D2F2D;
$purple: #686299;

$gradient: linear-gradient(to right, #9434CD, #EE3DC6);

#theme110 {
    .theme-header {
        width: 100%;
        position: relative;

        .bg-header {
            width: 100%;
            height: 100%;
            position: absolute;

            &-bottom-right {
                position: absolute;
                right: 0;
                opacity: 1;
                bottom: -100px;
            }
        }

        .left {
            display: flex;
            position: relative;

            .more-icon {
                display: none;
                position: relative;
                
                @media (max-width: 700px) {
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
            
            @media (max-width: 700px) {
                width: 100%;
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
                    padding: 22px 36px;
                    font-size: 18px;
                    font-weight: 400;
                    background: #fff;
                    outline: none;
                    color: $mainColor;
                    border-radius: 9px;

                    &:first-child {
                        margin-right: 26px;
                    }

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
                        width: 120px;
                        height: 35px;
                        font-size: 10px;

                        .icon {
                            height: 10px;
                        }
                    }
                }

                @media (max-width: 700px) {
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

                        &:first-child {
                            margin-bottom: 35px !important;
                        }

                        .icon {
                            height: 16px;
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
                        color: $mainColor;
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
                    
                    @media (max-width: 700px) {
                        margin-right: 0;
                        align-items: flex-start;
                    }
                }

                .hire-me-btn {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    background: $mainColor;
                    padding: 23px 62px;
                    font-size: 18px;
                    font-weight: 700;
                    color: white;
                    border-radius: 9px;

                    .icon {
                        margin-right: 10px;
                    }

                    @media (max-width: 1400px) {
                        font-size: 16px;
                        padding: 23px 42px;
                        min-width: 144px;

                        .icon {
                            height: 20px;
                        }
                    }
                    
                    @media (max-width: 1200px) {
                        font-size: 11px;
                        width: 115px;
height: 36px;

                        .icon {
                            height: 12px;
                        }
                    }
                    
                    @media (max-width: 700px) {
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

                @media (max-width: 700px) {
                    margin-top: 0;
                    justify-content: space-between;
                    width: 100%;
                }
            }

            @media (max-width: 1200px) {
                margin-top: 27px;
            }

            @media (max-width: 700px) {
                margin-top: 0;
                padding-left: 60px;
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
            
            @media (max-width: 700px) {
                flex-wrap: wrap;
                padding: 30px 17px;
            }

            .user-img {
                display: inline-block;
                width: 232px;
                height: 232px;
                margin-right: 55px;

                img {
                    width: 100%;
                    border-radius: 50%;
                }

                @media (max-width: 1400px) {
                    width: 184px;
                    height: 184px;
                    margin-right: 33px;
                }
                
                @media (max-width: 1200px) {
                    width: 141px;
                    height: 141px;
                }
                
                @media (max-width: 876px) {
                    margin-right: 20px;
                }

                @media (max-width: 700px) {
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
                    color: $mainColor;

                    @media (max-width: 1200px) {
                        margin-bottom: 20px;
                    }
                }

                .speciallity {
                    display: flex;
                    padding: 0;
                    color: $mainColor;
                    
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
                            background: $mainColor;
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

                    @media (max-width: 876px) {
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

                @media (max-width: 700px) {

                    .name {
                        font-size: 12px;
                        margin-bottom: 5px;
                    }

                    .profession {
                        font-size: 10px;
                        margin-bottom: 18px;
                    }

                    .speciallity {
                        display: none;
                    }
                }
            }
        }
    }
}
</style>