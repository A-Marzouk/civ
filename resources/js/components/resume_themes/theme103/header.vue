<template>
    <div class="theme-header">

        <div class="user-info">
            <div class="left">
                <div class="user-img">
                    <img src="/images/resume_builder/default-user.jpg" alt="">
                </div>

                <div class="user-data">
                    <div class="name">{{ currentUser.personal_info.full_name }}</div>
                    <div class="profession">{{ currentUser.personal_info.designation }}</div>
                    <div v-if="currentUser.personal_info.is_overview_active" class="overview">{{ currentUser.personal_info.overview }}</div>
                </div>

                <div class="more-icon">
                    <img @click="showMore = !showMore" :class="{hide: showMore}" src="/images/resume_themes/theme103/more-icon.png" alt="">
                    <font-awesome-icon @click="showMore = !showMore" :class="{hide: !showMore}" :icon="['fas', 'times']"></font-awesome-icon>
                </div>
            </div>

            <div class="right">
                <div class="actions-wrapper" :class="{hide: !showMore}">
                    <button class="action-btn">
                        <img class="icon" src="/images/resume_themes/theme103/chat-icon.png"> Start a chat
                    </button>
                    <button class="action-btn">
                        <img class="icon" src="/images/resume_themes/theme103/suitcase-icon.png">Upload interviews
                    </button>
                </div>

                <div class="payment-data">
                    <div class="hourly-rate">
                        {{ formatedSalary }}
                        <small>{{ currentUser.payment_info[paymentSelected_Idx].salary_frequency }} rate</small>
                    </div>
                    <div class="hourly-availability">
                        {{ currentUser.availability_info[availabilitySelected_Idx].available_hours }}Hrs
                        <small>{{ currentUser.availability_info[availabilitySelected_Idx].available_hours_frequency }} Availability</small>
                    </div>

                    <button class="hire-me-btn">
                        <img src="/images/resume_themes/theme103/hireMe-icon.png" alt="hire me icon" class="icon">
                        Hire Me
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props:[
        'currentUser'
    ],
    data: (vm) => ({
        showMore: false,
        paymentSelected_Idx: 0, // Index of payment rate choice
        availabilitySelected_Idx: 0 // Index of available hours choice
    }),
    computed: {
        formatedSalary: function () {
            const { salary, currency } = this.currentUser.payment_info[this.paymentSelected_Idx]

            return new Intl.NumberFormat('en-US', { style: 'currency', currency, maximumFractionDigits: 2, minimumFractionDigits: 0 }).format(salary)
        }
    },
    mounted () {}
}
</script>

<style lang="scss">
$mainColor: #0A4FBC;
$tabTextColor: #4D2F2D;
$purple: #0A4FBC;

$gradient: linear-gradient(to right, #9434CD, #EE3DC6);

#theme103 {
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
                    background: #fff;
                    outline: none;
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
                            height: 16px;
                        }
                    }
                    
                    @media (max-width: 1200px) {
                        width: 133px;
                        height: 42px;
                        padding: 0;
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
                    color: $purple;

                    small {
                        font-size: 15px;
                        font-weight: normal;
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
                    
                    @media (max-width: 600px) {
                        margin-right: 0;
                        align-items: flex-start;
                    }
                }

                .hire-me-btn {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    background: $purple;
                    width: 220px;
                    height: 68px;
                    font-size: 18px;
                    font-weight: 700;
                    color: white;
                    border-radius: 9px;

                    .icon {
                        margin-right: 10px;
                    }

                    @media (max-width: 1400px) {
                        font-size: 16px;

                        .icon {
                            height: 16px;
                        }
                    }
                    
                    @media (max-width: 1200px) {
                        font-size: 11px;
                        width: 133px;
                        height: 42px;
                        padding: 0;

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
                    justify-content: space-between;
                    width: 100%;
                }
            }

            @media (max-width: 600px) {
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
                    color: $purple;
                }

                .profession {
                    margin-bottom: 30px;

                    @media (max-width: 1200px) {
                        margin-bottom: 20px;
                    }
                }

                .overview {
                    padding: 0;
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

                    // .overview {
                    //     display: none;
                    // }
                }
            }
        }
    }
}
</style>