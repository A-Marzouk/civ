<template>
    <div class="container portfolio-grid">
        
        <div class="portfolio-item">
            <img src="/images/resume_themes/theme113/portfolio-img1.png" alt="">
            <div class="content">
                <h2 class="title">Est irure in duis minim exercitation voluptate occaecat ullamco.</h2>
                <a href="javascript:;" class="seeMore">See Project <img src="/images/resume_themes/theme12/project-link.png" alt=""></a>
            </div>
        </div>
        <div class="portfolio-item">
            <img src="/images/resume_themes/theme113/portfolio-img2.png" alt="">
            <div class="content">
                <h2 class="title">Est irure in duis minim exercitation voluptate occaecat ullamco.</h2>
                <a href="javascript:;" class="seeMore">See Project <img src="/images/resume_themes/theme12/project-link.png" alt=""></a>
            </div>
        </div>
        <div class="portfolio-item">
            <img src="/images/resume_themes/theme113/portfolio-img3.png" alt="">
            <div class="content">
                <h2 class="title">Est irure in duis minim exercitation voluptate occaecat ullamco.</h2>
                <a href="javascript:;" class="seeMore">See Project <img src="/images/resume_themes/theme12/project-link.png" alt=""></a>
            </div>
        </div>
        <div class="portfolio-item">
            <img src="/images/resume_themes/theme113/portfolio-img4.png" alt="">
            <div class="content">
                <h2 class="title">Est irure in duis minim exercitation voluptate occaecat ullamco.</h2>
                <a href="javascript:;" class="seeMore">See Project <img src="/images/resume_themes/theme12/project-link.png" alt=""></a>
            </div>
        </div>
        <div class="portfolio-item">
            <img src="/images/resume_themes/theme113/portfolio-img5.png" alt="">
            <div class="content">
                <h2 class="title">Est irure in duis minim exercitation voluptate occaecat ullamco.</h2>
                <a href="javascript:;" class="seeMore">See Project <img src="/images/resume_themes/theme12/project-link.png" alt=""></a>
            </div>
        </div>
        <div class="portfolio-item">
            <img src="/images/resume_themes/theme113/portfolio-img4.png" alt="">
            <div class="content">
                <h2 class="title">Est irure in duis minim exercitation voluptate occaecat ullamco.</h2>
                <a href="javascript:;" class="seeMore">See Project <img src="/images/resume_themes/theme12/project-link.png" alt=""></a>
            </div>
        </div>
        <div class="portfolio-item">
            <img src="/images/resume_themes/theme113/portfolio-img5.png" alt="">
            <div class="content">
                <h2 class="title">Est irure in duis minim exercitation voluptate occaecat ullamco.</h2>
                <a href="javascript:;" class="seeMore">See Project <img src="/images/resume_themes/theme12/project-link.png" alt=""></a>
            </div>
        </div>
        <div class="portfolio-item">
            <img src="/images/resume_themes/theme113/portfolio-img4.png" alt="">
            <div class="content">
                <h2 class="title">Est irure in duis minim exercitation voluptate occaecat ullamco.</h2>
                <a href="javascript:;" class="seeMore">See Project <img src="/images/resume_themes/theme12/project-link.png" alt=""></a>
            </div>
        </div>
        <div class="portfolio-item">
            <img src="/images/resume_themes/theme113/portfolio-img5.png" alt="">
            <div class="content">
                <h2 class="title">Est irure in duis minim exercitation voluptate occaecat ullamco.</h2>
                <a href="javascript:;" class="seeMore">See Project <img src="/images/resume_themes/theme12/project-link.png" alt=""></a>
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
        display: grid;
        grid-template-columns: repeat(12, 1fr);
        grid-gap: 51px;
            
        .portfolio-item {
            grid-column: span 4;
            position: relative;
            height: 455px;
            overflow: hidden;

            &:last-child {
                margin-bottom: 0;
            }

            img {
                width: 100%;
                margin-right: 0;
            }

            .content {
                position: absolute;
                z-index: 1;
                width: 100%;
                bottom: 0;
                left: 0;
                padding: 22px;

                background: linear-gradient(to top, #000, rgba(0,0,0,0));

                .title {
                    font-size: 22px;
                    font-weight: 700;
                    max-width: 337px;
                    margin-bottom: 20px;
                }

                .seeMore {
                    font-size: 19px;
                    font-weight: 700;
                    color: white;
                    display: flex;
                    align-items: center;

                    img {
                        height: 20px;
                        width: 20px;
                        margin-left: 8.6px;
                    }
                }


            }
        }
    }
</style>