<template>
    <div class="container skills-container">
        <div class="skill">
            <img src="/images/resume_themes/theme113/ux-icon.png" alt="">
            <div class="skill-info">
                <div class="skill-name">User Experience</div> <div class="percentage">85%</div>
            </div>
        </div>
        <div class="skill">
            <img src="/images/resume_themes/theme113/usability-icon.png" alt="">
            <div class="skill-info">
                <div class="skill-name">Usability</div> <div class="percentage">80%</div>
            </div>
        </div>
        <div class="skill">
            <img src="/images/resume_themes/theme113/interaction-icon.png" alt="">
            <div class="skill-info">
                <div class="skill-name">Interaction</div> <div class="percentage">75%</div>
            </div>
        </div>
        <div class="skill">
            <img src="/images/resume_themes/theme113/graphic-design-icon.png" alt="">
            <div class="skill-info">
                <div class="skill-name">Graphic Design</div> <div class="percentage">85%</div>
            </div>
        </div>
        <div class="skill">
            <img src="/images/resume_themes/theme113/development-icon.png" alt="">
            <div class="skill-info">
                <div class="skill-name">Development</div> <div class="percentage">50%</div>
            </div>
        </div>
        <div class="skill">
            <img src="/images/resume_themes/theme113/ux-icon.png" alt="">
            <div class="skill-info">
                <div class="skill-name">Research</div> <div class="percentage">35%</div>
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
        margin-top: 34px;
        display: grid;
        grid-template-columns: repeat(6, 1fr);
        grid-gap: 100px;
        padding: 0 100px !important;

        .skill {
            display: flex;
            flex-direction: column;
            width: 45%;
            margin: 35px 0;

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
    }
</style>