<template>
<div class="container">
    <div class="education-flex">
        <div class="education-item">
            <div class="education-header">
                <div class="education-icon">
                    <img src="/images/resume_themes/theme107/education-icon.png" />
                </div>
                <h2 class="college-name">Simon Bolivar University</h2>
                <div class="date">2014 - 2019</div>
            </div>
            <div class="education-body">
                <div class="grade-title">Computing Mathematics</div>
                <div class="education-description">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat voluptatum ipsum eius, nihil commodi obcaecati, deleniti non distinctio consectetur minus ratione. Sit totam eaque et, eos ex esse ab ullam.</p>
                </div>
            </div>
        </div>
        <div class="education-item">
            <div class="education-header">
                <div class="education-icon">
                    <img src="/images/resume_themes/theme107/education-icon.png" />
                </div>
                <h2 class="college-name">Simon Bolivar University</h2>
                <div class="date">2014 - 2019</div>
            </div>
            <div class="education-body">
                <div class="grade-title">Computing Mathematics</div>
                <div class="education-description">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat voluptatum ipsum eius, nihil commodi obcaecati, deleniti non distinctio consectetur minus ratione. Sit totam eaque et, eos ex esse ab ullam.</p>
                </div>
            </div>
        </div>
        <div class="education-item">
            <div class="education-header">
                <div class="education-icon">
                    <img src="/images/resume_themes/theme107/education-icon.png" />
                </div>
                <h2 class="college-name">Simon Bolivar University</h2>
                <div class="date">2014 - 2019</div>
            </div>
            <div class="education-body">
                <div class="grade-title">Computing Mathematics</div>
                <div class="education-description">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat voluptatum ipsum eius, nihil commodi obcaecati, deleniti non distinctio consectetur minus ratione. Sit totam eaque et, eos ex esse ab ullam.</p>
                </div>
            </div>
        </div>
        <div class="education-item">
            <div class="education-header">
                <div class="education-icon">
                    <img src="/images/resume_themes/theme107/education-icon.png" />
                </div>
                <h2 class="college-name">Simon Bolivar University</h2>
                <div class="date">2014 - 2019</div>
            </div>
            <div class="education-body">
                <div class="grade-title">Computing Mathematics</div>
                <div class="education-description">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat voluptatum ipsum eius, nihil commodi obcaecati, deleniti non distinctio consectetur minus ratione. Sit totam eaque et, eos ex esse ab ullam.</p>
                </div>
            </div>
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

<style scoped lang="scss">
    $mainColor: #28404A;
    $lineColor: #DBE0C2;

    .education-flex {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        max-width: 1300px !important;
        padding: 0 60px;
        margin: 0 auto;

        @media (max-width: 830px) {
            padding: 0;
        }
    }

    .education-item {
        max-width: 529px;
        width: 48%;
        margin-bottom: 74px;

        .education-header {
            display: flex;
            align-items: center;
            margin-bottom: 24.5px;

            .education-icon {
                display: flex;
                justify-content: center;
                align-items: center;
                margin-right: 81px;
                border: 1px solid $lineColor;
                border-radius: 50%;
                width: 44px;
                height: 44px;
                position: relative;

                &::after {
                    content: "";
                    width: 48px;
                    height: 1px;
                    background: $lineColor;
                    position: absolute;
                    right: calc(-17px - 48px);
                }
            }

            .college-name {
                color: $mainColor ;
                font-weight: 700;
                font-size: 20px;
            }

            .date {
                color: #838BA4;
                font-size: 15px;
                margin-left: 13px;
                margin-top: 4px;
            }

            @media (max-width: 1200px) {
                .education-icon {
                    width: 28px;
                    height: 28px;
                    margin-right: 52px;

                    &::after {
                        width: 31px;
                        right: calc(-13px - 31px);
                    }

                    img {
                        width: 12px;
                    }
                }

                .college-name {
                    font-size: 12px;
                }

                .date {
                    font-size: 9px;
                }
            }

            @media (max-width: 600px) {
                margin-bottom: 16px;

                .college-name {
                    font-size: 13px;
                }
            }
        }

        .education-body {
            padding-left: calc(81px + 44px);

            .grade-title {
                color: $mainColor;
                font-size: 17px;
                margin-bottom: 10px;
                position: relative;
            }

            .education-description,
            .education-description p {
                color: #838BA4;
                font-size: 17px;
            }

            @media (max-width: 1200px) {
                padding-left: calc(58px + 28px);

                .grade-title,
                .education-description p {
                    font-size: 10px;

                }
            }

            @media (max-width: 600px) {
                
                .grade-title,
                .education-description p {
                    font-size: 11px;

                }
            }
        }

        @media (max-width: 600px) {
            width: 100%;
            margin-bottom: 48px;
        }
    }
</style>