<template>
    <div class="container portfolio-flex">
        <div v-masonry="containerId" transition-duration="0.3s" item-selector=".item">
            <div v-masonry-tile class="item">
                <img src="/images/resume_themes/theme13/portfolio-img1.png" alt="">
                <div class="content">
                    <h2 class="title">Est irure in duis minim exercitation voluptate occaecat ullamco.</h2>
                    <div class="description">
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nulla, molestias obcaecati repellendus a magni quae praesentium non, aliquam, in consectetur est. Veritatis neque voluptatibus debitis deserunt quos nostrum officia aliquam.</p>
                    </div>
                </div>
            </div>
            <div v-masonry-tile class="item">
                <img src="/images/resume_themes/theme13/portfolio-img2.png" alt="">
                <div class="content">
                    <h2 class="title">Est irure in duis minim exercitation voluptate occaecat ullamco.</h2>
                    <div class="description">
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nulla, molestias obcaecati repellendus a magni quae praesentium non, aliquam, in consectetur est. Veritatis neque voluptatibus debitis deserunt quos nostrum officia aliquam.</p>
                    </div>
                </div>
            </div>
            <div v-masonry-tile class="item">
                <img src="/images/resume_themes/theme13/portfolio-img3.png" alt="">
                <div class="content">
                    <h2 class="title">Est irure in duis minim exercitation voluptate occaecat ullamco.</h2>
                    <div class="description">
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nulla, molestias obcaecati repellendus a magni quae praesentium non.</p>
                    </div>
                </div>
            </div>
        </div>
        <div v-masonry-tile class="item">
            <img src="/images/resume_themes/theme13/portfolio-img4.png" alt="">
            <div class="content">
                <h2 class="title">Est irure in duis minim exercitation voluptate occaecat ullamco.</h2>
                <div class="description">
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nulla, molestias obcaecati repellendus a magni quae praesentium non.</p>
                </div>
            </div>
        </div>
        <div v-masonry-tile class="item">
            <img src="/images/resume_themes/theme13/portfolio-img5.png" alt="">
            <div class="content">
                <h2 class="title">Est irure in duis minim exercitation voluptate occaecat ullamco.</h2>
                <div class="description">
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nulla, molestias obcaecati repellendus a magni quae praesentium non.</p>
                </div>
            </div>
        </div>
        <div v-masonry-tile class="item">
            <img src="/images/resume_themes/theme13/portfolio-img4.png" alt="">
            <div class="content">
                <h2 class="title">Est irure in duis minim exercitation voluptate occaecat ullamco.</h2>
                <div class="description">
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nulla, molestias obcaecati repellendus a magni quae praesentium non.</p>
                </div>
            </div>
        </div>
        <div v-masonry-tile class="item">
            <img src="/images/resume_themes/theme13/portfolio-img5.png" alt="">
            <div class="content">
                <h2 class="title">Est irure in duis minim exercitation voluptate occaecat ullamco.</h2>
                <div class="description">
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nulla, molestias obcaecati repellendus a magni quae praesentium non.</p>
                </div>
            </div>
        </div>
        <div v-masonry-tile class="item">
            <img src="/images/resume_themes/theme13/portfolio-img4.png" alt="">
            <div class="content">
                <h2 class="title">Est irure in duis minim exercitation voluptate occaecat ullamco.</h2>
                <div class="description">
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nulla, molestias obcaecati repellendus a magni quae praesentium non.</p>
                </div>
            </div>
        </div>
        <div v-masonry-tile class="item">
            <img src="/images/resume_themes/theme13/portfolio-img5.png" alt="">
            <div class="content">
                <h2 class="title">Est irure in duis minim exercitation voluptate occaecat ullamco.</h2>
                <div class="description">
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nulla, molestias obcaecati repellendus a magni quae praesentium non, aliquam, in consectetur est. Veritatis neque voluptatibus debitis deserunt quos nostrum officia aliquam.</p>
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
    .portfolio-flex {
        width: 100%;
        display: flex;
        justify-content: space-between;

        .flex-column {
            display: flex;
            flex-direction: column;
            align-items: center;
            
            .portfolio-item {
                grid-column: span 4;
                margin: 0 20px 129px;

                &:last-child {
                    margin-bottom: 0;
                }

                img {
                    width: 100%;
                    margin-right: 0;
                }

                .content {
                    .title {
                        font-size: 22px;
                        max-width: 337px;
                        margin-bottom: 20px;
                    }
                    .description p {
                        font-size: 19px;
                    }
                }
            }
        }

    }
</style>