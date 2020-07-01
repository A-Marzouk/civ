<template>
    <div class="container work-flex">
        <div class="work-item">
            <div class="work-header">
                <div class="work-icon">
                    <img src="/images/resume_themes/theme113/work-exp-icon.png" />
                </div>
                <h2 class="company-name">123Workforce</h2><div class="date">2019 - 2020</div>
            </div>
            <div class="work-body">
                <div class="job-title">Fullstack Developer</div>
                <div class="work-description">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat voluptatum ipsum eius, nihil commodi obcaecati, deleniti non distinctio consectetur minus ratione. Sit totam eaque et, eos ex esse ab ullam.</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit ipsum expedita tenetur placeat voluptas vel nisi repellat voluptatibus cupiditate quae quidem temporibus ea laudantium quod atque, quas fugiat eius suscipit!</p>
                </div>
            </div>
        </div>
        <div class="work-item">
            <div class="work-header">
                <div class="work-icon">
                    <img src="/images/resume_themes/theme113/work-exp-icon.png" />
                </div>
                <h2 class="company-name">123Workforce</h2><div class="date">2019 - 2020</div>
            </div>
            <div class="work-body">
                <div class="job-title">Fullstack Developer</div>
                <div class="work-description">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat voluptatum ipsum eius, nihil commodi obcaecati, deleniti non distinctio consectetur minus ratione. Sit totam eaque et, eos ex esse ab ullam.</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit ipsum expedita tenetur placeat voluptas vel nisi repellat voluptatibus cupiditate quae quidem temporibus ea laudantium quod atque, quas fugiat eius suscipit!</p>
                </div>
            </div>
        </div>
        <div class="work-item">
            <div class="work-header">
                <div class="work-icon">
                    <img src="/images/resume_themes/theme113/work-exp-icon.png" />
                </div>
                <h2 class="company-name">123Workforce</h2><div class="date">2019 - 2020</div>
            </div>
            <div class="work-body">
                <div class="job-title">Fullstack Developer</div>
                <div class="work-description">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat voluptatum ipsum eius, nihil commodi obcaecati, deleniti non distinctio consectetur minus ratione. Sit totam eaque et, eos ex esse ab ullam.</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit ipsum expedita tenetur placeat voluptas vel nisi repellat voluptatibus cupiditate quae quidem temporibus ea laudantium quod atque, quas fugiat eius suscipit!</p>
                </div>
            </div>
        </div>
        <div class="work-item">
            <div class="work-header">
                <div class="work-icon">
                    <img src="/images/resume_themes/theme113/work-exp-icon.png" />
                </div>
                <h2 class="company-name">123Workforce</h2><div class="date">2019 - 2020</div>
            </div>
            <div class="work-body">
                <div class="job-title">Fullstack Developer</div>
                <div class="work-description">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat voluptatum ipsum eius, nihil commodi obcaecati, deleniti non distinctio consectetur minus ratione. Sit totam eaque et, eos ex esse ab ullam.</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit ipsum expedita tenetur placeat voluptas vel nisi repellat voluptatibus cupiditate quae quidem temporibus ea laudantium quod atque, quas fugiat eius suscipit!</p>
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
    $lineColor: #BEC2D4;


    .work-flex {
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

    .work-item {
        max-width: 529px;
        width: 48%;
        margin-bottom: 74px;

        .work-header {
            display: flex;
            align-items: center;
            margin-bottom: 24.5px;

            .work-icon {
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

            .company-name {
                color: black;
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
                .work-icon {
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

                .company-name {
                    font-size: 12px;
                }

                .date {
                    font-size: 9px;
                }
            }

            @media (max-width: 600px) {
                margin-bottom: 16px;

                .company-name {
                    font-size: 13px;
                }
            }
        }

        .work-body {
            padding-left: calc(81px + 44px);

            .job-title {
                color: black;
                font-size: 17px;
                margin-bottom: 10px;
                position: relative;
            }

            .work-description,
            .work-description p {
                color: #838BA4;
                font-size: 17px;
            }

            @media (max-width: 1200px) {
                padding-left: calc(58px + 28px);

                .job-title,
                .work-description p {
                    font-size: 10px;

                }
            }

            @media (max-width: 600px) {
                
                .job-title,
                .work-description p {
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