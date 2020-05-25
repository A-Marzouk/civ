<template>
    <div class="container">
        <div class="portfolio-grid">
            <div v-for="(project, index) in projects" class="portfolio-item" :class="{ isLarge: isLarge(project) }" :key="'project-' + index">
                <img :src="project.img" alt="">
                <div class="content">
                    <h2 class="title">{{ project.title }}</h2>
                    <p>Company Name</p>
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
                img: '/images/resume_themes/theme102/portfolio1.png'
            },
            {
                title: 'Project title',
                img: '/images/resume_themes/theme102/portfolio2.png'
            },
            {
                title: 'Project title',
                img: '/images/resume_themes/theme102/portfolio3.png'
            },
            {
                title: 'Project title',
                img: '/images/resume_themes/theme102/portfolio4.png'
            },
            {
                title: 'Project title',
                img: '/images/resume_themes/theme102/portfolio5.png'
            },
            {
                title: 'Project title',
                img: '/images/resume_themes/theme102/portfolio6.png'
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
        gap: 51px;
        padding: 0;
            
        .portfolio-item {
            grid-column: span 4;
            position: relative;
            overflow: hidden;
            background-size: cover;
            background-position: top center;

            &.isLarge {
                grid-column: span 8;
            }

            &:last-child {
                margin-bottom: 0;
            }

            img {
                width: 100%;
                margin-right: 0;
            }

            .content {
                width: 100%;
                margin-top: 33px;

                .title {
                    font-size: 25px;
                    font-weight: 700;
                    width: 100%;
                    margin-bottom: 20px;
                    text-align: center;
                    color: black;
                }

                p {
                    text-align: center;
                    color: #555456;
                    font-size: 18px;
                    margin-bottom: 0;
                }
            }
        }
    }
</style>