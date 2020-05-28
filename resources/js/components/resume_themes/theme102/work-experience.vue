<template>
    <div class="container work-flex">
        <div class="work-item">
            <div class="work-header">
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
    $lineColor: white;


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
            // display: flex;
            align-items: center;
            margin-bottom: 13px;

            .company-name {
                color: black;
                font-weight: 700;
                font-size: 32px;
            }

            .date {
                margin-left: calc(17px + 48px);
                margin-bottom: 13px;
                position: relative;
                color: #616887;
                font-size: 19px;
                font-weight: 500;
                
                &::after {
                    content: "";
                    width: 48px;
                    height: 1px;
                    background: #616887;
                    position: absolute;
                    left: calc(-17px - 48px);
                    top: 50%;
                }
            }
        }

        .work-body {

            .job-title {
                color: black;
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