<template>
    <div class="container">
        <div class="left">
            <div class="small">Services</div>
            <h1>Skills and Languages</h1>
            <div class="small">What I Bring To The Table</div>
        </div>
        <div class="right skills-container">
            <div v-for="(skill, index) in skillsList" :key="index + skill.name" class="skill">
                <div class="chart hideOnTablet">
                    <radial-progress-bar :diameter="70.81"
                        :completed-steps="skill.percentage"
                        :total-steps="100"
                        startColor="#492163"
                        stopColor="#492163"
                        :strokeWidth="3"
                        :innerStrokeWidth="3"
                        innerStrokeColor="#EEEEEE"
                        strokeLinecap="round"
                    >
                    </radial-progress-bar>
                    <img :src="'/images/resume_themes/theme110/' + skill.icon" alt="">
                </div>
                <div class="chart showOnTablet hideChartOnMobile">
                    <radial-progress-bar :diameter="38"
                        :completed-steps="skill.percentage"
                        :total-steps="100"
                        startColor="#492163"
                        stopColor="#492163"
                        :strokeWidth="3"
                        :innerStrokeWidth="3"
                        innerStrokeColor="#EEEEEE"
                        strokeLinecap="round"
                    >
                    </radial-progress-bar>
                    <img :src="'/images/resume_themes/theme110/' + skill.icon" alt="">
                </div>
                <div class="chart showOnMobile">
                    <radial-progress-bar :diameter="39"
                        :completed-steps="skill.percentage"
                        :total-steps="100"
                        startColor="#492163"
                        stopColor="#492163"
                        :strokeWidth="1"
                        :innerStrokeWidth="1"
                        innerStrokeColor="#EEEEEE"
                        strokeLinecap="round"
                    >
                    </radial-progress-bar>
                    <img :src="'/images/resume_themes/theme110/' + skill.icon" alt="">
                </div>
                <div class="skill-info">
                    <div class="skill-name">{{ skill.name }}</div>
                    <div class="skill-percentage">{{ skill.percentage }} %</div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import RadialProgressBar from 'vue-radial-progress'

export default {
    components: {
        RadialProgressBar
    },
    data: () => ({
        options: {

        },
        skillsList: [
            {
                name: 'Adobe XD',
                percentage: 75,
                icon: "adobe-xd-icon.png"
            },
            {
                name: 'Adobe Indesign',
                percentage: 80,
                icon: "adobeIndesign-icon.png"
            },
            {
                name: 'Adobe Illustrator',
                percentage: 67,
                icon: "adobeIllustrator-icon.png"
            },
            {
                name: 'Adobe Photoshop',
                percentage: 50,
                icon: "adobePhotoshop-icon.png"
            }
        ]
    })
}
</script>

<style lang="scss" scoped>
$mainColor: #492163;

.container {
    margin-top: 34px;
    position: relative;
    display: flex !important;
    justify-content: space-between;
    align-items: flex-start;
    max-width: 1500px !important;
    position: relative;
    z-index: 1;
    padding: 5%;
    background-image: url('/images/resume_themes/theme110/skills-decoImg.png');
    background-position: 0 93%;
    background-repeat: no-repeat;

    .left {
        max-width: 228px;

        .small {
            font-size: 24px;
            color: #616887;
        }

        h1 {
            margin-top: 22px;
            margin-bottom: 38px;
            line-height: 50px;
            font-size: 40px;
            color: $mainColor;
        }

        @media (max-width: 1200px) {
            margin-right: 20px;
            
            .small {
                font-size: 13px;
            }

            h1 {
                font-size: 21px;
                line-height: 25px;
                margin-top: 12px;
                margin-bottom: 22px;
            }
        }

        @media (max-width: 600px) {
            display: none;
        }
    }

    @media (max-width: 600px) {
        background-image: none;
    }
}
    .skills-container {
        display: grid;
        grid-template-columns: repeat(12, 1fr);
        grid-gap: 50px 90px;

        .skill {
            max-width: 310px;
            grid-column: span 4;

            .chart {
                position: relative;
                width: 70.8px;
                display: flex;
                justify-content: center;
                align-items: center;

                img {
                    position: absolute;
                    width: 27.25px;
                }

                &.showOnTablet,
                &.showOnMobile {
                    display: none;
                }
            }


            .skill-info {
                display: flex;
                flex-direction: column;
                margin-top: 24.3px;

                .skill-name {
                    font-size: 30px;
                    font-weight: 700;
                    color: $mainColor;
                }

                .skill-percentage {
                    margin-left: 32.4px;
                    font-size: 20px;
                    font-weight: 700;
                    color: #616887;
                    position: relative;

                    &::after {
                        content: "";
                        top: 50%;
                        position: absolute;
                        background: #616887;
                        height: 2px;
                        width: 24px;
                        left: -32.4px;
                    }
                }
            }

            @media (max-width: 1200px) {
                .chart {
                    &.hideOnTablet {
                        display: none;
                    }

                    &.showOnTablet {
                        display: flex;

                    }
                    
                    img {
                        width: 14px;
                    }
                }
                
                .skill-info {
                    margin-top: 13px;

                    .skill-name {
                        font-size: 16px;
                    }

                    .skill-percentage {
                        font-size: 10px;

                        &::after {
                            width: 13px;
                            height: 1px;
                        }
                    }
                }
            }

            @media (max-width: 600px) {
                grid-column: span 6;
                max-width: 100%;

                .chart {
                    &.hideChartOnMobile {
                        display: none;
                    }

                    &.showOnMobile {
                        display: flex;

                    }
                    
                    img {
                        width: 14px;
                    }
                }

                .skill-info {
                    .skill-percentage {
                        margin-left: 20.4px;

                        &::after {
                            left: -20.4px;
                        }
                    }
                }
            }
        }

        @media (max-width: 1500px) {
            grid-gap: 50px;
        }

        @media (max-width: 1350px) {
            grid-gap: 30px;
        }

        @media (max-width: 600px) {
            width: 100%;
        }
    }
</style>