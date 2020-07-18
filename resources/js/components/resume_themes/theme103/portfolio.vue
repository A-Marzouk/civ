<template>
    <div class="container">
        <div class="portfolio-grid">
            <div v-for="(project, index) in currentUser.projects" class="portfolio-item" :key="'project-' + index">
                <a :href="project.link">
                    <img :src="project.images[0].src" :alt="project.desctiption + project.skills">
                    <div class="content">
                        <h2 class="title">{{ project.name }}</h2>
                        <div class="type">{{ project.skills }}</div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['currentUser'],
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
    })
}
</script>

<style scoped lang="scss">
$mainColor: #2E77D1;
$purple: #0556B6;

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
                    font-size: 17px !important;
                    font-weight: 700;
                    max-width: 337px;
                    margin-bottom: 7.3px;
                    color: $purple;
                }

                .type {
                    font-size: 14px !important;
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

            @media (max-width: 976px) {
                grid-column: span 6;
            }
            
            @media (max-width: 590px) {
                grid-column: span 12;
                
                .content {
                    margin-top: 14px;

                    .title {
                        font-size: 15px !important;
                        margin-bottom: 4px;
                    }

                    .type {
                        font-size: 12px !important;
                    }
                }
            }
        }

        @media (max-width: 768px) {
            grid-gap: 30px;
        }

        @media (max-width: 590px) {
            grid-gap: 40px 0;
        }
    }
</style>