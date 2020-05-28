<template>
    <div class="container education-flex">
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
    $lineColor: white;


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
            // display: flex;
            align-items: center;
            margin-bottom: 13px;

            .college-name {
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

        .education-body {

            .grade-title {
                color: black;
                font-weight: 700;
                font-size: 20px;
                margin-bottom: 36px;
            }

            .education-description,
            .education-description p {
                color: #838BA4;
                font-size: 17px;
            }
        }
    }
</style>