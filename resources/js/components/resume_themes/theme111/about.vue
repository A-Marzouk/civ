<template>
    <div class="container about">
        <h1 class="about-title">Welcome to my profile!</h1>
        <div class="content">
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae porro officia aperiam quibusdam at! Sed hic soluta nam aut magni fugit, beatae similique ullam vero, cumque ab aliquid placeat ipsa. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptate dolore molestias modi non praesentium temporibus harum dolorem sint, provident molestiae. Nostrum, sunt et. A ducimus illum deserunt dolor enim nihil!
            </p>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi fugit dicta vel consequatur, facilis reprehenderit voluptatibus quibusdam. Voluptate harum natus itaque dolore architecto, saepe numquam debitis, quos ullam fugiat veritatis.
            </p>
        </div>
    </div>
</template>

<script>
export default {
    data: () => ({

    })
}
</script>

<style lang="scss" scoped>
    .about {
        display: flex;
        max-width: 1400px !important;
        
        .about-title {
            font-size: 40px;
            color: white;
            font-weight: 700;
            max-width: 270px;
            width: 100%;
            margin-right: 192px;
        }

        .content {
            width: 80%;
            margin-top: 0;
            column-count: 2;
            column-gap: 58px;

            p {
                font-size: 20px;
                color: #E2E7FF;
                font-family: 'Muli', sans-serif;
                line-height: 2;
                margin-bottom: 40px;
            }
        }

        @media (max-width: 1200px) {
            max-width: 1000px !important;

            .about-title {
                font-size: 22px;
                max-width: 143px;
            }

            .content {
                width: 70%;

                p {
                    font-size: 11px;
                }
            }
        }

        @media (max-width: 700px) {
            flex-wrap: wrap;
            margin: 0 auto;

            .about-title {
                width: 100%;
                margin-bottom: 28px;
                max-width: 100%;
                font-size: 18px;
            }

            .content {
                column-count: 1;
                width: 100%;
                flex-direction: column;
                justify-content: flex-start;

                p {
                    font-size: 12px;
                }
            }
        }
    }
</style>