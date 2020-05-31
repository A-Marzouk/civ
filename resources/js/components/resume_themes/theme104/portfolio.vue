<template>
    <div class="container">
        <div class="portfolio-grid">
            <div v-for="(project, index) in projects" class="portfolio-item" :class="{ isLarge: isLarge(project) }" :key="'project-' + index">
                <img :src="project.img" alt="">
                <div class="content">
                    <h2 class="title">{{ project.title }}</h2>
                    <div class="type">Web Design</div>
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
                img: '/images/resume_themes/theme113/portfolio-img3.png'
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
$mainColor: #172C7A;
$purple: #FB423A;

    .portfolio-grid {
        display: grid;
        grid-template-columns: repeat(12, 1fr);
        grid-gap: 51px;
            
        .portfolio-item {
            grid-column: span 4;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            &:last-child {
                margin-bottom: 0;
            }

            img {
                width: 100%;
                margin-right: 0;
            }

            .content {
                z-index: 1;
                width: calc(100% - (13px + 38px));
                margin-left: calc(13px + 38px);
                margin-top: 25px;
                position: relative;

                .title {
                    font-size: 17px;
                    font-weight: 700;
                    max-width: 337px;
                    margin-bottom: 7.3px;
                    color: $mainColor;
                }

                .type {
                    font-size: 14px;
                    color: $mainColor;
                }

                &::after {
                    position: absolute;
                    content: "";
                    width: 38px;
                    height: 1px;
                    background: $mainColor;

                    left: -51px;
                    top: 13px;
                }
            }
        }
    }
</style>