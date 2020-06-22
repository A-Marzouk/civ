<template>
    <div class="container skills-container">
        <div class="skill">
            <img src="/images/resume_themes/theme113/ux-icon.png" alt="">
            <div class="skill-info">
                <div class="skill-name">User Experience <div class="percentage">85%</div></div>
            </div>
        </div>
        <div class="skill">
            <img src="/images/resume_themes/theme113/usability-icon.png" alt="">
            <div class="skill-info">
                <div class="skill-name">Usability <div class="percentage">80%</div></div>
            </div>
        </div>
        <div class="skill">
            <img src="/images/resume_themes/theme113/interaction-icon.png" alt="">
            <div class="skill-info">
                <div class="skill-name">Interaction <div class="percentage">75%</div></div>
            </div>
        </div>
        <div class="skill">
            <img src="/images/resume_themes/theme113/graphic-design-icon.png" alt="">
            <div class="skill-info">
                <div class="skill-name">Graphic Design <div class="percentage">85%</div></div>
            </div>
        </div>
        <div class="skill">
            <img src="/images/resume_themes/theme113/development-icon.png" alt="">
            <div class="skill-info">
                <div class="skill-name">Development <div class="percentage">50%</div></div>
            </div>
        </div>
        <div class="skill">
            <img src="/images/resume_themes/theme113/ux-icon.png" alt="">
            <div class="skill-info">
                <div class="skill-name">Research <div class="percentage">35%</div></div>
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
        grid-template-rows: 140px;
        grid-auto-rows: 140px;
        grid-gap: 70px 100px;
        max-width: 1400px !important;
        width: 85%;
        padding-bottom: 50px;
        height: 100%;

        .skill {
            display: flex;
            flex-direction: column;
            grid-column: span 2;
            align-self: end;

            img {
                width: 92px;
                margin-bottom: 42.7px;
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

        @media (max-width: 1200px) {
            grid-gap: 0 60px;

            .skill {
                img {
                    width: 55px;
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

        @media (max-width: 700px) {
            grid-gap: 0 30px;
            margin-top: 60px;
            width: 100%;

            .skill {
                grid-column: span 3;
            }
        }
    }
</style>