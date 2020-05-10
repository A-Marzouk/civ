<template>
    <div class="container education-grid">
        <div class="education-item">
            <div class="education-header">
                <div class="education-icon">
                    <img src="/images/resume_themes/theme111/education-icon.png" />
                </div>
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
                <div class="education-icon">
                    <img src="/images/resume_themes/theme111/education-icon.png" />
                </div>
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
                <div class="education-icon">
                    <img src="/images/resume_themes/theme111/education-icon.png" />
                </div>
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
                <div class="education-icon">
                    <img src="/images/resume_themes/theme111/education-icon.png" />
                </div>
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
        max-width: 1300px;
    }

    .education-item {
        max-width: 529px;
        grid-column: span 4;
        margin-bottom: 74px;

        .education-header {
            // display: flex;
            align-items: center;
            margin-bottom: 13px;

            .education-icon {
                // display: flex;
                display: none;
                justify-content: center;
                align-items: center;
                margin-right: 81px;
                border: 1px solid $lineColor;
                border-radius: 50%;
                width: 44px;
                height: 44px;
                position: relative;
            }

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
                color: #E2E7FF;
                font-size: 17px;
            }
        }
    }
</style>