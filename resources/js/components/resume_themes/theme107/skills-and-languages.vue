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
                        startColor="#28404A"
                        stopColor="#28404A"
                        :strokeWidth="3"
                        innerStrokeColor="#EEEEEE"
                        strokeLinecap="square"
                    >
                    </radial-progress-bar>
                    <img :src="'/images/resume_themes/theme105/' + skill.icon" alt="">
                </div>
                <div class="chart showOnTablet">
                    <radial-progress-bar :diameter="38"
                        :completed-steps="skill.percentage"
                        :total-steps="100"
                        startColor="#28404A"
                        stopColor="#28404A"
                        :strokeWidth="3"
                        innerStrokeColor="#EEEEEE"
                        strokeLinecap="square"
                    >
                    </radial-progress-bar>
                    <img :src="'/images/resume_themes/theme105/' + skill.icon" alt="">
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
                icon: "adobeXD-icon.png"
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
.container {
    margin-top: 34px;
    display: flex !important;
    justify-content: space-between;
    max-width: 1500px !important;

    .left {
        max-width: 228px;
        margin-right: 261px;

        .small {
            font-size: 24px;
            color: #28404A;
        }

        h1 {
            margin-top: 22px;
            margin-bottom: 38px;
            line-height: 50px;
            font-size: 40px;
            color: #28404A;
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

        @media (max-width: 756px) {
            display: none;
        }
    }
}
    .skills-container {
        display: grid;
        grid-template-columns: repeat(12, 1fr);
        grid-gap: 50px 90px;
        margin: 0 auto;

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
            }


            .skill-info {
                display: flex;
                flex-direction: column;
                margin-top: 24.3px;

                .skill-name {
                    font-size: 30px;
                    font-weight: 700;
                    color: #28404A;
                }

                .skill-percentage {
                    margin-left: 32.4px;
                    font-size: 20px;
                    font-weight: 700;
                    color: #28404A;
                    position: relative;

                    &::after {
                        content: "";
                        top: 50%;
                        position: absolute;
                        background: #28404A;
                        height: 2px;
                        width: 24px;
                        left: -32.4px;
                    }
                }
            }

            @media (max-width: 1200px) {
                .chart {
                    @media (max-width: 1200px) {
                        &.hideOnTablet {
                            display: none;
                        }

                        &.showOnTablet {
                            display: flex;

                        }
                        
                        img {
                            width: 14.76px;
                        }
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

            @media (max-width: 756px) {
                grid-column: span 6;
            }
        }

        @media (max-width: 1200px) {
            grid-gap: 50px;
        } 
        
        @media (max-width: 756px) {
            grid-gap: 35px;
        }
    }
</style>