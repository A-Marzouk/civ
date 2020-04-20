<template>
    <div class="container skills-container">
        <div v-for="(skill, index) in skillsList" :key="index + skill.name" class="skill">
            <div class="chart">
                <Apexchart type="radialBar"
                    :options="{
                        labels: [''],
                        chart: {
                            width: '100%',
                            heigth: 'auto'
                        },
                        plotOptions: {
                            radialBar: {
                                hollow: {
                                    margin: 15,
                                    size: '70%'
                                }
                            }
                        }
                    }"
                    :series="[skill.percentage]"
                ></Apexchart>
            </div>
        </div>
    </div>
</template>

<script>

export default {
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
            }
        ]
    })
}
</script>

<style lang="scss" scope>
    .skills-container {
        margin-top: 34px;
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;

        .skill {
            display: flex;
            flex-direction: column;
            max-width: 310px;
            margin: 35px 100px;

            .chart {
                width: 70.81px;
                position: relative;
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

                .skill-name {
                    font-size: 30px;
                    font-weight: 700;
                    color: #455A51;
                }

                .percentage {
                    margin-left: 10px;
                    font-size: 30px;
                    font-weight: 700;
                    color: #E38682;
                }
            }
        }
    }
</style>