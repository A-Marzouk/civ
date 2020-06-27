<template>
    <div class="container education-flex">
        <div class="education-item">
            <div class="education-header">
                <div class="education-icon">
                    <img src="/images/resume_themes/theme103/education-icon.png" />
                </div>
                <div class="date">2014 - 2019</div>
                <h2 class="college-name">Simon Bolivar University</h2>
            </div>
            <div class="education-body">
                <div class="grade-title">Computing and Statistic Mathemathics</div>
                <div class="education-description">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat voluptatum ipsum eius, nihil commodi obcaecati, deleniti non distinctio consectetur minus ratione. Sit totam eaque et, eos ex esse ab ullam.</p>
                </div>
            </div>
        </div>
        <div class="education-item">
            <div class="education-header">
                <div class="education-icon">
                    <img src="/images/resume_themes/theme103/education-icon.png" />
                </div>
                <div class="date">2014 - 2019</div>
                <h2 class="college-name">Simon Bolivar University</h2>
            </div>
            <div class="education-body">
                <div class="grade-title">Computing and Statistic Mathemathics</div>
                <div class="education-description">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat voluptatum ipsum eius, nihil commodi obcaecati, deleniti non distinctio consectetur minus ratione. Sit totam eaque et, eos ex esse ab ullam.</p>
                </div>
            </div>
        </div>
        <div class="education-item">
            <div class="education-header">
                <div class="education-icon">
                    <img src="/images/resume_themes/theme103/education-icon.png" />
                </div>
                <div class="date">2014 - 2019</div>
                <h2 class="college-name">Simon Bolivar University</h2>
            </div>
            <div class="education-body">
                <div class="grade-title">Computing and Statistic Mathemathics</div>
                <div class="education-description">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat voluptatum ipsum eius, nihil commodi obcaecati, deleniti non distinctio consectetur minus ratione. Sit totam eaque et, eos ex esse ab ullam.</p>
                </div>
            </div>
        </div>
        <div class="education-item">
            <div class="education-header">
                <div class="education-icon">
                    <img src="/images/resume_themes/theme103/education-icon.png" />
                </div>
                <div class="date">2014 - 2019</div>
                <h2 class="college-name">Simon Bolivar University</h2>
            </div>
            <div class="education-body">
                <div class="grade-title">Computing and Statistic Mathemathics</div>
                <div class="education-description">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat voluptatum ipsum eius, nihil commodi obcaecati, deleniti non distinctio consectetur minus ratione. Sit totam eaque et, eos ex esse ab ullam.</p>
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
    $mainColor: #2E77D1;
    $purple: #0556B6;


    .education-flex {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        max-width: 1300px;
    }

    .education-item {
        max-width: 529px;
        width: 47%;
        margin-bottom: 74px;
        padding: 0 20px;

        .education-header {
            display: flex;
            flex-wrap: wrap;
            margin-bottom: 13px;

            .education-icon {
                display: flex;
                justify-content: center;
                align-items: center;
                margin-right: 18.6px;
                border: 1px solid $purple;
                border-radius: 50%;
                width: 26px;
                height: 26px;
                position: relative;
            }

            .college-name {
                color: $purple;
                font-weight: 700;
                font-size: 32px;
                width: 100%;
            }

            .date {
                margin-bottom: 13px;
                position: relative;
                color: #616887;
                font-size: 19px;
                font-weight: 500;
            }

            @media (max-width: 1200px) {
                .education-icon {
                    width: 28px;
                    height: 28px;
                    margin-right: 14px;

                    &::after {
                        width: 31px;
                        right: calc(-13px - 31px);
                    }

                    img {
                        width: 12px;
                    }
                }

                .college-name {
                    font-size: 24px;
                }

                .date {
                    font-size: 14px;
                    margin-top: 3px;
                }
            }

            @media (max-width: 768px) {
                margin-bottom: 10px;

                .college-name {
                    font-size: 21px;
                }
            }
        }

        .education-body {

            .grade-title {
                color: $mainColor;
                font-weight: 700;
                font-size: 20px;
                margin-bottom: 36px;
            }

            .education-description,
            .education-description p {
                color: #838BA4;
                font-size: 17px;
            }

            @media (max-width: 1200px) {
                .grade-title,
                .education-description p {
                    font-size: 13px;

                }
            }

            @media (max-width: 768px) {

                .grade-title {
                    margin-bottom: 16px;
                }
                
                .grade-title,
                .education-description p {
                    font-size: 11px;

                }
            }
        }

        @media (max-width: 620px) {
            width: 100%;
            margin-bottom: 48px;
        }

        @media (max-width: 620px) {
            width: 100%;
            margin-bottom: 48px;
        }
    }
</style>