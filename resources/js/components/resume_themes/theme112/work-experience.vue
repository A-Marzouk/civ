<template>
    <div class="container work-grid">
        <div class="work-item">
            <div class="work-header">
                <div class="work-icon">
                    <img src="/images/resume_themes/theme113/work-icon.png" />
                </div>
                <div class="date">2019 - 2020</div>
                <h2 class="company-name">123Workforce</h2>
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
                    <img src="/images/resume_themes/theme113/work-icon.png" />
                </div>
                <div class="date">2019 - 2020</div>
                <h2 class="company-name">123Workforce</h2>
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
                    <img src="/images/resume_themes/theme113/work-icon.png" />
                </div>
                <div class="date">2019 - 2020</div>
                <h2 class="company-name">123Workforce</h2>
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
                    <img src="/images/resume_themes/theme113/work-icon.png" />
                </div>
                <div class="date">2019 - 2020</div>
                <h2 class="company-name">123Workforce</h2>
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
    $lineColor: #838BA4;


    .work-grid {
        display: grid;
        grid-template-columns: repeat(12, 1fr);
        grid-gap: 82px;
        max-width: 1300px;
    }

    .work-item {
        max-width: 529px;
        grid-column: span 4;
        margin:0 41px;
        margin-bottom: 74px;

        .work-header {
            // display: flex;
            align-items: center;
            margin-bottom: 13px;

            .work-icon {
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

            .company-name {
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

        .work-body {

            .job-title {
                color: white;
                font-weight: 700;
                font-size: 20px;
                margin-bottom: 36px;
            }

            .work-description,
            .work-description p {
                color: $lineColor;
                font-size: 17px;
            }
        }
    }
</style>