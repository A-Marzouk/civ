<template>
    <div class="portfolio">
        <div class="images">
            <div
                v-for="project in currentUser.projects"
                :key="project.id + '_project'"
                class="work-img"
                :style="{
                    backgroundImage: `url('${getProjectMainImage(project)}')`
                }"
            ></div>
        </div>

        <div class="loading d-none">
            <img src="/images/resume_themes/theme5/loading.svg" alt="loading" />
            <div>Loading more items</div>
        </div>
    </div>
</template>

<script>
export default {
    props: ["currentUser"],
    data: () => ({}),
    methods: {
        getProjectMainImage(project) {
            let mainImage = "";

            let images = project.images;
            images.forEach(image => {
                if (image.is_main) {
                    mainImage = image;
                }
            });

            return mainImage.src;
        }
    }
};
</script>

<style lang="scss" scoped>
.portfolio {
    width: 100%;

    .images {
        display: grid;
        grid-template-columns: repeat(6, 1fr);
        grid-gap: 20px;

        .work-img {
            grid-column: span 2;
            height: 300px;
            background-size: cover;
            background-position: center;
            border-radius: 16px;

            @media screen and (min-width: 425px) {
                height: 381px;
            }
        }
    }

    .loading {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-top: 50px;
        color: #3c3748cf;
        font-size: 16px;

        img {
            width: 40px;
            height: 40px;
            margin-bottom: 8px;
        }
    }
}

@media only screen and (max-width: 768px) {
    .portfolio {
        .images {
            .work-img {
                grid-column: span 3;
                border-radius: 10px;
            }
        }
    }
}

@media only screen and (max-width: 610px) {
    .portfolio {
        .images {
            .work-img {
                grid-column: span 6;
            }
        }
    }
}
</style>
