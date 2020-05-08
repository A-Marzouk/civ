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
                        startColor="#E43CC6"
                        stopColor="#E43CC6"
                        :strokeWidth="3"
                        innerStrokeColor="#D3D6E4"
                        strokeLinecap="square"
                    >
                    </radial-progress-bar>
                    <img src="/images/resume_themes/theme12/adobexd-icon.png" alt="">
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
                name: 'UX/UI Design',
                percentage: 75
            },
            {
                name: 'Javascript',
                percentage: 80
            },
            {
                name: 'Python',
                percentage: 67
            },
            {
                name: 'C#',
                percentage: 50
            },
            {
                name: "Php",
                percentage: 70
            },
            {
                name: "Laravel",
                percentage: 70
            },
            {
                name: "Node.js",
                percentage: 80
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
    max-width: 1500px;

    .left {
        max-width: 228px;

        .small {
            font-size: 24px;
            color: #C2C6D8;
        }

        h1 {
            margin-top: 22px;
            margin-bottom: 38px;
            line-height: 50px;
            font-size: 40px;
            color: white;
        }
    }
}
    .skills-container {
        display: grid;
        grid-template-columns: repeat(12, 1fr);
        grid-gap: 30px;

        .skill {
            max-width: 310px;
            margin: 35px 100px;
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
                    color: white;
                }

                .skill-percentage {
                    margin-left: 32.4px;
                    font-size: 20px;
                    font-weight: 700;
                    color: #C2C6D8;
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