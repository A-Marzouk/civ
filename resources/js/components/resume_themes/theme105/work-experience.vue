<template>
    <div class="container work-grid">
        <div class="work-item">
            <div class="work-header">
                <div class="num">01</div>
                <h2 class="company-name">123Workforce</h2>
            </div>
            <div class="work-body">
                <div class="job-title">Fullstack Developer <div class="date">2019 - 2020</div></div>
                <div class="work-description">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat voluptatum ipsum eius, nihil commodi obcaecati, deleniti non distinctio consectetur minus ratione. Sit totam eaque et, eos ex esse ab ullam.</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit ipsum expedita tenetur placeat voluptas vel nisi repellat voluptatibus cupiditate quae quidem temporibus ea laudantium quod atque, quas fugiat eius suscipit!</p>
                </div>
            </div>
        </div>
        <div class="work-item">
            <div class="work-header">
                <div class="num">02</div>
                <h2 class="company-name">123Workforce</h2>
            </div>
            <div class="work-body">
                <div class="job-title">Fullstack Developer <div class="date">2019 - 2020</div></div>
                <div class="work-description">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat voluptatum ipsum eius, nihil commodi obcaecati, deleniti non distinctio consectetur minus ratione. Sit totam eaque et, eos ex esse ab ullam.</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit ipsum expedita tenetur placeat voluptas vel nisi repellat voluptatibus cupiditate quae quidem temporibus ea laudantium quod atque, quas fugiat eius suscipit!</p>
                </div>
            </div>
        </div>
        <div class="work-item">
            <div class="work-header">
                <div class="num">03</div>
                <h2 class="company-name">123Workforce</h2>
            </div>
            <div class="work-body">
                <div class="job-title">Fullstack Developer <div class="date">2019 - 2020</div></div>
                <div class="work-description">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat voluptatum ipsum eius, nihil commodi obcaecati, deleniti non distinctio consectetur minus ratione. Sit totam eaque et, eos ex esse ab ullam.</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit ipsum expedita tenetur placeat voluptas vel nisi repellat voluptatibus cupiditate quae quidem temporibus ea laudantium quod atque, quas fugiat eius suscipit!</p>
                </div>
            </div>
        </div>
        <div class="work-item">
            <div class="work-header">
                <div class="num">04</div>
                <h2 class="company-name">123Workforce</h2>
            </div>
            <div class="work-body">
                <div class="job-title">Fullstack Developer <div class="date">2019 - 2020</div></div>
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


    .work-grid {
        display: grid;
        grid-template-columns: repeat(6, 1fr);
        grid-gap: 83.5px;
        max-width: 1500px !important;
        margin: 0 auto;
        width: 85%;

        @media (max-width: 1200px) {
            grid-gap: 40px 60px;
        }

        @media (max-width: 600px) {
            width: 100%;
            grid-gap: 56px 0;
        }
    }

    .work-item {
        max-width: 529px;
        grid-column: span 2;
        margin-bottom: 74px;

        .work-header {
            display: grid;
            align-items: center;
            margin-bottom: 24.5px;
            position: relative;

            .company-name {
                color: #28404A;
                font-weight: 700;
                font-size: 32px;
            }

            .num {
                position: absolute;
                font-size: 99px;
                line-height: 99px;
                left: -55px;
                top: -15px;
                color: white;
                opacity: 0.05;
                -webkit-text-stroke: 2px #28404A;
            }

            @media (max-width: 900px) {
                .college-name {
                    font-size: 23px;
                }

                .num {
                    font-size: 70px;
                    line-height: 70px;
                    left: -20px;
                }
            }
        }

        .work-body {            

            .job-title {
                color: #28404A;
                font-size: 19px;
                margin-bottom: 31px;
                display: flex;

                .date {
                    color: #28404A;
                    font-size: 19px;
                    margin-left: 22px;
                    position: relative;

                    &::after {
                        content: "";
                        position: absolute;
                        top: 4px;
                        left: -11px;
                        height: 21px;
                        width: 2px;
                        background: #D3D6E4;
                    }
                }
            }

            .work-description,
            .work-description p {
                color: #838BA4;
                font-size: 17px;
                line-height: 1.5;
            }

            @media  (max-width: 1200px) {

                .grade-title {
                    font-size: 14px;
                    margin-bottom: 28px;

                    .date {
                        font-size: 14px;

                        &::after {
                            height: 16px;
                        }
                    }
                }

                .job-description,
                .job-description p {
                    font-size: 12px;
                }
            }
        }

        @media (max-width: 1200px) {
            grid-column: span 3;
        }

        @media (max-width: 600px) {
            grid-column: span 6;
        }
    }
</style>