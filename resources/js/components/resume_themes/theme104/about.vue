<template>
    <div class="container about">
        <h1 class="about-title">Welcome to my profile!</h1>
        <div class="content">
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae porro officia aperiam quibusdam at! Sed hic soluta nam aut magni fugit, beatae similique ullam vero, cumque ab aliquid placeat ipsa. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptate dolore molestias modi non praesentium temporibus harum dolorem sint, provident molestiae. Nostrum, sunt et. A ducimus illum deserunt dolor enim nihil!
            </p>
            <p>
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Amet commodi dolor dolores aut voluptatem recusandae facere tempora ipsam illum. Aspernatur, ut? Dolor dolores fugiat libero autem accusantium impedit nemo unde? Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur laboriosam error tempore voluptatibus incidunt a doloremque sint enim, modi ullam minima fuga sit iure repudiandae. Doloremque, excepturi. Perspiciatis, nesciunt numquam? Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae impedit harum ex fuga nihil quis, dolorem veritatis? Ut quidem culpa consequatur explicabo illum quas, dicta consectetur doloremque quaerat accusantium similique.
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

$mainColor: #2E77D1;
$purple: #172C7A;

    .about {
        display: flex;
        max-width: 1400px;
        width: 85%;
        justify-content: space-between;
        margin: 0 auto;
        
        .about-title {
            font-size: 40px;
            color: $purple;
            font-weight: 700;
        }

        .content {
            width: 80%;
            margin-top: 0;
            column-count: 2;
            column-gap: 58px;

            p {
                font-size: 20px;
                color: #616887;
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

        @media (max-width: 600px) {
            flex-wrap: wrap;
            margin: 0 auto;
            flex-direction: column;
            justify-content: flex-start;

            .about-title {
                width: 100%;
                margin-bottom: 28px;
                max-width: 100%;
                font-size: 18px;
            }

            .content {
                column-count: 1;
                width: 100%;

                p {
                    font-size: 12px;
                }
            }
        }
    }
</style>