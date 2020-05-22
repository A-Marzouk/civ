<template>
    <div class="container">
        <div class="left">
            <div class="small">Services</div>
            <h1>Skills and Languages</h1>
            <div class="small">What I Bring To The Table</div>
        </div>
        <div class="right skills-container">
            <div v-for="(skill, index) in skillsList" :key="index + skill.name" class="skill">
                <div class="chart">
                    <radial-progress-bar :diameter="70.81"
                        :completed-steps="skill.percentage"
                        :total-steps="100"
                        startColor="black"
                        stopColor="black"
                        :strokeWidth="3"
                        innerStrokeColor="#EEEEEE"
                        strokeLinecap="round"
                    >
                    </radial-progress-bar>
                    <img :src="'/images/resume_themes/theme102/' + skill.icon" alt="">
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
$mainColor: black;

.container {
    margin-top: 34px;
    position: relative;
    display: flex !important;
    justify-content: space-between;
    max-width: 1500px !important;
    background-image: url('/images/resume_themes/theme110/skills-decoImg.png');
    background-position: 0 114%;
    background-repeat: no-repeat;

    .left {
        max-width: 228px;
        margin-right: 261px;

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
        }
    }
</style>