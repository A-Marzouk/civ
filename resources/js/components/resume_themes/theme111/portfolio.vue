<template>
    <div class="container">
        <div class="portfolio-grid">
            <div v-for="(project, index) in projects" class="portfolio-item" :class="{ isLarge: isLarge(project) }" :style="{ backgroundImage: `url(${project.img})` }" :key="'project-' + index" style>
                <div class="content">
                    <h2 class="title">{{ project.title }}</h2>
                    <a href="javascript:;" class="seeMore">See Project <img src="/images/resume_themes/theme112/project-link.png" alt=""></a>
                </div>
            </div>
        </div>
        
    </div>
</template>

<script>
export default {
    data: () => ({
        projects: [
            {
                title: 'Project title',
                img: '/images/resume_themes/theme113/portfolio-img1.png'
            },
            {
                title: 'Project title',
                img: '/images/resume_themes/theme109/portfolio-img2.png'
            },
            {
                title: 'Project title',
                img: '/images/resume_themes/theme109/portfolio-img1.png'
            },
            {
                title: 'Project title',
                img: '/images/resume_themes/theme109/portfolio-img3.png'
            },
            {
                title: 'Project title',
                img: '/images/resume_themes/theme109/portfolio-img4.png'
            }
        ]
    }),
    methods: {
        isLarge (project) {
            let img = new Image()
            img.src = project.img
            img.onload = e => {
                e.target
            }

            return img.width > img.height
        }
    }
}
</script>

<style scoped lang="scss">
    .portfolio-grid {
        display: grid;
        grid-template-columns: repeat(12, 1fr);
        grid-gap: 51px;
        padding: 0 50px !important;
            
        .portfolio-item {
            grid-column: span 4;
            position: relative;
            height: 455px;
            overflow: hidden;
            background-size: cover;
            background-position: top center;

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
                    color: white;
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

            @media (max-width: 1200px) {
                height: 340px;

                .content {
                    padding: 11px;

                    .title {
                        margin-bottom: 6px;
                    }

                    .title,
                    .seeMore {
                        font-size: 16px;
                    }
                }
            }

            @media (max-width: 970px) {
                grid-column: span 6;

                .content {
                    .title,
                    .seeMore {
                        font-size: 14px;
                    }
                }
            }
            
            @media (max-width: 600px) {
                grid-column: span 12;
            }
        }

        @media (max-width: 1200px) {
            padding: 0 50px !important;
        }

        @media (max-width: 970px) {
            padding: 0 !important;
            grid-gap: 20px;            
        }
    }
</style>