<template>
    <div class="container education-flex">
        <div class="education-item">
            <div class="education-header">
                <div class="education-icon">
                    <img src="/images/resume_themes/theme13/education-icon.png" />
                </div>
                <h2 class="college-name">Simon Bolívar University</h2><div class="date">2014 - 2020</div>
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
                <div class="education-icon">
                    <img src="/images/resume_themes/theme13/education-icon.png" />
                </div>
                <h2 class="college-name">Simon Bolívar University</h2><div class="date">2014 - 2020</div>
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
                <div class="education-icon">
                    <img src="/images/resume_themes/theme13/education-icon.png" />
                </div>
                <h2 class="college-name">Simon Bolívar University</h2><div class="date">2014 - 2020</div>
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
                <div class="education-icon">
                    <img src="/images/resume_themes/theme13/education-icon.png" />
                </div>
                <h2 class="college-name">Simon Bolívar University</h2><div class="date">2014 - 2020</div>
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
    $lineColor: #BEC2D4;


    .education-flex {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        max-width: 1300px;
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
                color: black;
                font-weight: 700;
                font-size: 20px;
            }

            .date {
                color: $lineColor;
                font-size: 15px;
                margin-left: 13px;
            }
        }

        .education-body {
            padding-left: calc(81px + 44px);

            .grade-title {
                color: black;
                font-size: 17px;
                margin-bottom: 10px;
            }

            .education-description,
            .education-description p {
                color: $lineColor;
                font-size: 17px;
            }
        }
    }
</style>