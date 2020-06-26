<template>
    <div class="container education-grid">
        <div class="education-item">
            <div class="education-header">
                <div class="num">01</div>
                <h2 class="college-name">Simon Bolivar University</h2>
            </div>
            <div class="education-body">
                <div class="grade-title">Computing Mathematics <div class="date">2014 - 2019</div></div>
                <div class="education-description">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat voluptatum ipsum eius, nihil commodi obcaecati, deleniti non distinctio consectetur minus ratione. Sit totam eaque et, eos ex esse ab ullam.</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit ipsum expedita tenetur placeat voluptas vel nisi repellat voluptatibus cupiditate quae quidem temporibus ea laudantium quod atque, quas fugiat eius suscipit!</p>
                </div>
            </div>
        </div>
        <div class="education-item">
            <div class="education-header">
                <div class="num">02</div>
                <h2 class="college-name">Simon Bolivar University</h2>
            </div>
            <div class="education-body">
                <div class="grade-title">Computing Mathematics <div class="date">2014 - 2019</div></div>
                <div class="education-description">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat voluptatum ipsum eius, nihil commodi obcaecati, deleniti non distinctio consectetur minus ratione. Sit totam eaque et, eos ex esse ab ullam.</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit ipsum expedita tenetur placeat voluptas vel nisi repellat voluptatibus cupiditate quae quidem temporibus ea laudantium quod atque, quas fugiat eius suscipit!</p>
                </div>
            </div>
        </div>
        <div class="education-item">
            <div class="education-header">
                <div class="num">03</div>
                <h2 class="college-name">Simon Bolivar University</h2>
            </div>
            <div class="education-body">
                <div class="grade-title">Computing Mathematics <div class="date">2014 - 2019</div></div>
                <div class="education-description">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat voluptatum ipsum eius, nihil commodi obcaecati, deleniti non distinctio consectetur minus ratione. Sit totam eaque et, eos ex esse ab ullam.</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit ipsum expedita tenetur placeat voluptas vel nisi repellat voluptatibus cupiditate quae quidem temporibus ea laudantium quod atque, quas fugiat eius suscipit!</p>
                </div>
            </div>
        </div>
        <div class="education-item">
            <div class="education-header">
                <div class="num">04</div>
                <h2 class="college-name">Simon Bolivar University</h2>
            </div>
            <div class="education-body">
                <div class="grade-title">Computing Mathematics <div class="date">2014 - 2019</div></div>
                <div class="education-description">
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


    .education-grid {
        display: grid;
        grid-template-columns: repeat(6, 1fr);
        grid-gap: 83.5px;
        max-width: 1500px !important;
        margin: 0 auto;
        width: 85%;

        @media (max-width: 1200px) {
            grid-gap: 40px 60px;
        }

        @media (max-width: 670px) {
            width: 100%;
            grid-gap: 56px 0;
        }
    }

    .education-item {
        max-width: 529px;
        grid-column: span 2;
        margin-bottom: 74px;

        .education-header {
            display: grid;
            align-items: center;
            margin-bottom: 24.5px;
            position: relative;

            .college-name {
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

        .education-body {   

            .grade-title {
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

            .education-description,
            .education-description p {
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

        @media (max-width: 670px) {
            grid-column: span 6;
        }
    }
</style>