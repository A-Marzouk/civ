<template>
    <div class="container skills-container">
        <div class="skill">
            <img src="/images/resume_themes/theme109/ux-icon.png" alt="">
            <div class="skill-info">
                <div class="percentage">85%</div><div class="skill-name">User Experience</div>
            </div>
        </div>
        <div class="skill">
            <img src="/images/resume_themes/theme109/usability-icon.png" alt="">
            <div class="skill-info">
                <div class="percentage">80%</div><div class="skill-name">Usability</div>
            </div>
        </div>
        <div class="skill">
            <img src="/images/resume_themes/theme109/interaction-icon.png" alt="">
            <div class="skill-info">
                <div class="percentage">75%</div><div class="skill-name">Interaction</div>
            </div>
        </div>
        <div class="skill">
            <img src="/images/resume_themes/theme109/graphic-design-icon.png" alt="">
            <div class="skill-info">
                <div class="percentage">85%</div><div class="skill-name">Graphic Design</div>
            </div>
        </div>
        <div class="skill">
            <img src="/images/resume_themes/theme109/development-icon.png" alt="">
            <div class="skill-info">
                <div class="percentage">50%</div><div class="skill-name">Development</div>
            </div>
        </div>
        <div class="skill">
            <img src="/images/resume_themes/theme109/ux-icon.png" alt="">
            <div class="skill-info">
                <div class="percentage">35%</div><div class="skill-name">Research</div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data: () => ({

    })
}
</script>

<style lang="scss" scoped>
    .skills-container {
        margin: 0 auto;
        margin-top: 34px;
        display: grid;
        grid-template-columns: repeat(6, 1fr);
        grid-template-rows: minmax(140px, 200px);
        grid-auto-rows: minmax(140px, 200px);
        grid-gap: 100px;
        max-width: 1400px !important;
        width: 85%;
        padding-bottom: 50px;
        height: 100%;

        .skill {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            grid-column: span 2;
            align-self: start;

            img {
                height: 77px;
                margin-bottom: 42.7px;
            }

            .skill-info {
                display: flex;

                .skill-name {
                    font-size: 30px;
                    font-weight: 700;
                    color: white;
                }

                .percentage {
                    margin-right: 10px;
                    font-size: 30px;
                    font-weight: 700;
                    color: #56EDF0;
                }
            }
        }

        @media (max-width: 1200px) {
            grid-gap: 20px 60px;

            .skill {
                img {
                    height: 46px;
                    margin-bottom: 28px;
                }

                .skill-info {
                    .skill-name {
                        font-size: 19px;   
                    }

                    .percentage {
                        font-size: 19px;
                    }
                }
            }
        }

        @media (max-width: 600px) {
            grid-gap: 0 30px;
            margin-top: 60px;
            width: 100%;

            .skill {
                grid-column: span 3;
            }
        }

        @media (max-width: 370px) {
            .skill {
                grid-column: span 6;
                align-items: center;
            }
        }
    }
</style>