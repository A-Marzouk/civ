<template>
    <div class="container skills-container">
        <div v-for="(skill, index) in skillsList" :key="index + skill.name" class="skill">
            <div class="skill-info">
                <div class="skill-name">{{ skill.name }}</div>
                <div class="skill-percentage">{{ skill.percentage }} %</div>
            </div>
            <div class="skill-progress">
                <div class="value" :style="{width: skill.percentage + '%'}"></div>
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

$mainColor: #2E77D1;
$purple: #0556B6;

    .skills-container {
        margin-top: 34px;
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        padding: 0 100px !important;

        .skill {
            width: 45%;
            margin-bottom: 60px;
            grid-column: span 4;

            .skill-info {
                display: flex;
                justify-content: space-between;
                margin-top: 24.3px;

                .skill-name {
                    font-size: 16px;
                    font-weight: normal;
                    color: $purple;
                }

                .skill-percentage {
                    margin-left: 32.4px;
                    font-size: 16px;
                    font-weight: normal;
                    color: #AA9D93;
                    position: relative;
                }
            }

            .skill-progress {
                position: relative;
                width: 100%;
                height: 6px;
                border-radius: 3px;
                background: #D3D6E4;
                margin-top: 25px;

                .value {
                    position: absolute;
                    height: 100%;
                    content: "";
                    background: $purple;
                    border-radius: 3px;
                }
            }
        }

        @media (max-width: 976px) {
            padding: 0 50px !important;

            .skill {
                margin-bottom: 40px;

                .skill-info {
                    .skill-name,
                    .skill-percentage {
                        font-size: 14px;
                    }
                }

                .skill-progress {
                    margin-top: 15px;
                }
            }
        }

        @media (max-width: 600px) {
            padding: 0 17px !important;

            .skill {
                width: 100%;
                margin-bottom: 20px;

                .skill-info {
                    .skill-name,
                    .skill-percentage {
                        font-size: 10px;
                    }
                }

                .skill-progress {
                    margin-top: 9px;
                }
            }
        }
    }
</style>