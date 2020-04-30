<template>
    <div class="container skills-container">
        <div class="skill">
            <img src="/images/resume_themes/theme9/ux-icon.png" alt="">
            <div class="skill-info">
                <div class="skill-name">User Experience</div> <div class="percentage">85%</div>
            </div>
        </div>
        <div class="skill">
            <img src="/images/resume_themes/theme9/usability-icon.png" alt="">
            <div class="skill-info">
                <div class="skill-name">Usability</div> <div class="percentage">80%</div>
            </div>
        </div>
        <div class="skill">
            <img src="/images/resume_themes/theme9/interaction-icon.png" alt="">
            <div class="skill-info">
                <div class="skill-name">Interaction</div> <div class="percentage">75%</div>
            </div>
        </div>
        <div class="skill">
            <img src="/images/resume_themes/theme9/graphic-design-icon.png" alt="">
            <div class="skill-info">
                <div class="skill-name">Graphic Design</div> <div class="percentage">85%</div>
            </div>
        </div>
        <div class="skill">
            <img src="/images/resume_themes/theme9/development-icon.png" alt="">
            <div class="skill-info">
                <div class="skill-name">Development</div> <div class="percentage">50%</div>
            </div>
        </div>
        <div class="skill">
            <img src="/images/resume_themes/theme9/ux-icon.png" alt="">
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
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        padding: 0 100px !important;

        .skill {
            display: flex;
            flex-direction: column;
            max-width: 310px;
            margin: 35px 100px;

            img {
                width: 92px;
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
                    margin-left: 10px;
                    font-size: 30px;
                    font-weight: 700;
                    color: #56EDF0;
                }
            }
        }
    }
</style>