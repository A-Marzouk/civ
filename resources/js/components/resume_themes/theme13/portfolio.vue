<template>
    <div class="container portfolio-grid">
        <div class="grid-item">
            <img src="/images/resume_themes/theme13/portfolio-img1.png" alt="">
            <div class="content">
                <h2 class="title">Est irure in duis minim exercitation voluptate occaecat ullamco.</h2>
                <div class="description">
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nulla, molestias obcaecati repellendus a magni quae praesentium non, aliquam, in consectetur est. Veritatis neque voluptatibus debitis deserunt quos nostrum officia aliquam.</p>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consequuntur culpa odit perspiciatis corrupti eius amet qui temporibus et veniam repellat eos provident minima, in aliquam libero! Inventore, eum quibusdam! Neque.</p>
                </div>
            </div>
        </div>
        <div class="grid-item">
            <img src="/images/resume_themes/theme13/portfolio-img2.png" alt="">
            <div class="content">
                <h2 class="title">Est irure in duis minim exercitation voluptate occaecat ullamco.</h2>
                <div class="description">
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nulla, molestias obcaecati repellendus a magni quae praesentium non, aliquam, in consectetur est. Veritatis neque voluptatibus debitis deserunt quos nostrum officia aliquam.</p>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consequuntur culpa odit perspiciatis corrupti eius amet qui temporibus et veniam repellat eos provident minima, in aliquam libero! Inventore, eum quibusdam! Neque.</p>
                </div>
            </div>
        </div>
        <div class="grid-item">
            <img src="/images/resume_themes/theme13/portfolio-img3.png" alt="">
            <div class="content">
                <h2 class="title">Est irure in duis minim exercitation voluptate occaecat ullamco.</h2>
                <div class="description">
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nulla, molestias obcaecati repellendus a magni quae praesentium non, aliquam, in consectetur est. Veritatis neque voluptatibus debitis deserunt quos nostrum officia aliquam.</p>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consequuntur culpa odit perspiciatis corrupti eius amet qui temporibus et veniam repellat eos provident minima, in aliquam libero! Inventore, eum quibusdam! Neque.</p>
                </div>
            </div>
        </div>
        <div class="grid-item">
            <img src="/images/resume_themes/theme13/portfolio-img4.png" alt="">
            <div class="content">
                <h2 class="title">Est irure in duis minim exercitation voluptate occaecat ullamco.</h2>
                <div class="description">
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nulla, molestias obcaecati repellendus a magni quae praesentium non, aliquam, in consectetur est. Veritatis neque voluptatibus debitis deserunt quos nostrum officia aliquam.</p>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consequuntur culpa odit perspiciatis corrupti eius amet qui temporibus et veniam repellat eos provident minima, in aliquam libero! Inventore, eum quibusdam! Neque.</p>
                </div>
            </div>
        </div>
        <div class="grid-item">
            <img src="/images/resume_themes/theme13/portfolio-img5.png" alt="">
            <div class="content">
                <h2 class="title">Est irure in duis minim exercitation voluptate occaecat ullamco.</h2>
                <div class="description">
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nulla, molestias obcaecati repellendus a magni quae praesentium non, aliquam, in consectetur est. Veritatis neque voluptatibus debitis deserunt quos nostrum officia aliquam.</p>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consequuntur culpa odit perspiciatis corrupti eius amet qui temporibus et veniam repellat eos provident minima, in aliquam libero! Inventore, eum quibusdam! Neque.</p>
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
    .portfolio-grid {
        width: 100%;
        height: 900px;
        display: grid;
        grid-template-columns: repeat(12, 1fr); 
        grid-template-rows: repeat(auto-fit, minmax(80px,  1fr));
        grid-auto-rows: minmax(80px, 1fr);
        grid-auto-flow: row dense;
        grid-gap: 40px;

        .grid-item {
            grid-column: span 4;
            grid-row: span 5;
            border: 1px solid black;

            img {
                width: 100%;
            }

            &:nth-child(2n) {
                grid-row: span 7;
            }

            &:nth-child(5n) {
                grid-row: span 9; 
            }
        }
    }
</style>