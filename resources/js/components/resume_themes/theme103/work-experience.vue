<template>
    <div class="container work-flex">
        <div class="work-item">
            <div class="work-header">
                <div class="work-icon">
                    <img src="/images/resume_themes/theme103/work-icon.png" />
                </div>
                <div class="date">2019 - 2020</div>
                <h2 class="company-name">123Workforce</h2>
            </div>
            <div class="work-body">
                <div class="job-title">Fullstack Developer</div>
                <div class="work-description">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat voluptatum ipsum eius, nihil commodi obcaecati, deleniti non distinctio consectetur minus ratione. Sit totam eaque et, eos ex esse ab ullam.</p>
                </div>
            </div>
        </div>
        <div class="work-item">
            <div class="work-header">
                <div class="work-icon">
                    <img src="/images/resume_themes/theme103/work-icon.png" />
                </div>
                <div class="date">2019 - 2020</div>
                <h2 class="company-name">123Workforce</h2>
            </div>
            <div class="work-body">
                <div class="job-title">Fullstack Developer</div>
                <div class="work-description">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat voluptatum ipsum eius, nihil commodi obcaecati, deleniti non distinctio consectetur minus ratione. Sit totam eaque et, eos ex esse ab ullam.</p>
                </div>
            </div>
        </div>
        <div class="work-item">
            <div class="work-header">
                <div class="work-icon">
                    <img src="/images/resume_themes/theme103/work-icon.png" />
                </div>
                <div class="date">2019 - 2020</div>
                <h2 class="company-name">123Workforce</h2>
            </div>
            <div class="work-body">
                <div class="job-title">Fullstack Developer</div>
                <div class="work-description">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat voluptatum ipsum eius, nihil commodi obcaecati, deleniti non distinctio consectetur minus ratione. Sit totam eaque et, eos ex esse ab ullam.</p>
                </div>
            </div>
        </div>
        <div class="work-item">
            <div class="work-header">
                <div class="work-icon">
                    <img src="/images/resume_themes/theme103/work-icon.png" />
                </div>
                <div class="date">2019 - 2020</div>
                <h2 class="company-name">123Workforce</h2>
            </div>
            <div class="work-body">
                <div class="job-title">Fullstack Developer</div>
                <div class="work-description">
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


    .work-flex {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        max-width: 1300px;
    }

    .work-item {
        max-width: 529px;
        width: 48%;
        margin:0 41px;
        margin-bottom: 74px;

        .work-header {
            display: flex;
            flex-wrap: wrap;
            margin-bottom: 13px;

            .work-icon {
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

            .company-name {
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
        }

        .work-body {

            .job-title {
                color: $mainColor;
                font-weight: 700;
                font-size: 20px;
                margin-bottom: 36px;
            }

            .work-description,
            .work-description p {
                color: #838BA4;
                font-size: 17px;
            }
        }
    }
</style>