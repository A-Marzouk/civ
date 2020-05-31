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
        padding: 0 190px !important;
        
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
            column-count: 2;
            column-gap: 58px;
            margin-top: 0;

            p {
                font-size: 20px;
                color: #C2C6D8;
                font-family: 'Muli', sans-serif;
            }
        }
    }
</style>