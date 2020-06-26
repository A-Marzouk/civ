<template>
    <div class="container education-grid">
        <div class="education-item">
            <div class="education-header">
                <div class="date">2014 - 2020</div>
                <h2 class="college-name">Simon Bolívar University</h2>
            </div>
            <div class="education-body">
                <div class="grade-title">Applied Mathematics</div>
                <div class="education-description">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat voluptatum ipsum eius, nihil commodi obcaecati, deleniti non distinctio consectetur minus ratione. Sit totam eaque et, eos ex esse ab ullam.</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit ipsum expedita tenetur placeat voluptas vel nisi repellat voluptatibus cupiditate quae quidem temporibus ea laudantium quod atque, quas fugiat eius suscipit!</p>
                </div>
            </div>
        </div>
        <div class="education-item">
            <div class="education-header">
                <div class="date">2014 - 2020</div>
                <h2 class="college-name">Simon Bolívar University</h2>
            </div>
            <div class="education-body">
                <div class="grade-title">Applied Mathematics</div>
                <div class="education-description">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat voluptatum ipsum eius, nihil commodi obcaecati, deleniti non distinctio consectetur minus ratione. Sit totam eaque et, eos ex esse ab ullam.</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit ipsum expedita tenetur placeat voluptas vel nisi repellat voluptatibus cupiditate quae quidem temporibus ea laudantium quod atque, quas fugiat eius suscipit!</p>
                </div>
            </div>
        </div>
        <div class="education-item">
            <div class="education-header">
                <div class="date">2014 - 2020</div>
                <h2 class="college-name">Simon Bolívar University</h2>
            </div>
            <div class="education-body">
                <div class="grade-title">Applied Mathematics</div>
                <div class="education-description">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat voluptatum ipsum eius, nihil commodi obcaecati, deleniti non distinctio consectetur minus ratione. Sit totam eaque et, eos ex esse ab ullam.</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit ipsum expedita tenetur placeat voluptas vel nisi repellat voluptatibus cupiditate quae quidem temporibus ea laudantium quod atque, quas fugiat eius suscipit!</p>
                </div>
            </div>
        </div>
        <div class="education-item">
            <div class="education-header">
                <div class="date">2014 - 2020</div>
                <h2 class="college-name">Simon Bolívar University</h2>
            </div>
            <div class="education-body">
                <div class="grade-title">Applied Mathematics</div>
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
    $lineColor: #838BA4;


    .education-grid {
        display: grid;
        grid-template-columns: repeat(12, 1fr);
        grid-gap: 82px;
        max-width: 1500px !important;
        width: 85%;
        padding: 0 30px;

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
        grid-column: span 4;
        margin-bottom: 74px;

        .education-header {
            // display: flex;
            align-items: center;
            margin-bottom: 13px;

            .college-name {
                color: white;
                font-weight: 700;
                font-size: 32px;
            }

            .date {
                margin-left: calc(17px + 48px);
                margin-bottom: 13px;
                position: relative;
                color: white;
                font-size: 19px;
                font-weight: 500;
                
                &::after {
                    content: "";
                    width: 48px;
                    height: 1px;
                    background: white;
                    position: absolute;
                    left: calc(-17px - 48px);
                    top: 50%;
                }
            }

            @media (max-width: 1200px) {
                .college-name {
                    font-size: 23px;
                }

                .date {
                    font-size: 14px;

                    &::after {
                        width: 36px;
                        left: calculate(-17px - 36px);
                    }
                }
            }
        }

        .education-body {

            .grade-title {
                color: white;
                font-weight: 700;
                font-size: 20px;
                margin-bottom: 36px;
            }

            .education-description,
            .education-description p {
                color: $lineColor;
                font-size: 17px;
            }

            @media  (max-width: 1200px) {

                .grade-title {
                    font-size: 14px;
                    margin-bottom: 28px;
                }

                .job-description,
                .job-description p {
                    font-size: 12px;
                }
            }
        }

        @media (max-width: 1200px) {
            grid-column: span 6;
        }

        @media (max-width: 670px) {
            grid-column: span 12;
        }
    }
</style>