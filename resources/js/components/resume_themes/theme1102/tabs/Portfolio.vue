<template>
    <div class="portfolio__slide">
        <portfolio__mobile></portfolio__mobile>
        <v-slide-group
            id="slide__portfolio"
            v-model="model"
            center-active
            show-arrows
            class="pa-4"
            prev-icon="arrow_back"
            next-icon="arrow_forward"
        >

            <v-slide-item

            >
                <img class="portfolio__image" src="/images/resume_themes/theme1102/portfolio/1.jpg"
                     alt="portfolio image">

            </v-slide-item>
            <v-slide-item

            >
                <img class="portfolio__image" src="/images/resume_themes/theme1102/portfolio/2.jpg"
                     alt="portfolio image">

            </v-slide-item>
            <v-slide-item

            >
                <img class="portfolio__image" src="/images/resume_themes/theme1102/portfolio/3.jpg"
                     alt="portfolio image">

            </v-slide-item>
            <v-slide-item

            >
                <img class="portfolio__image" src="/images/resume_themes/theme1102/portfolio/1.jpg"
                     alt="portfolio image">

            </v-slide-item>
            <v-slide-item

            >
                <img class="portfolio__image" src="/images/resume_themes/theme1102/portfolio/2.jpg"
                     alt="portfolio image">

            </v-slide-item>
            <v-slide-item

            >
                <img class="portfolio__image" src="/images/resume_themes/theme1102/portfolio/3.jpg"
                     alt="portfolio image">

            </v-slide-item>
            <v-slide-item

            >
                <img class="portfolio__image" src="/images/resume_themes/theme1102/portfolio/1.jpg"
                     alt="portfolio image">

            </v-slide-item>
            <v-slide-item

            >
                <img class="portfolio__image" src="/images/resume_themes/theme1102/portfolio/2.jpg"
                     alt="portfolio image">

            </v-slide-item>
            <v-slide-item

            >
                <img class="portfolio__image" src="/images/resume_themes/theme1102/portfolio/3.jpg"
                     alt="portfolio image">

            </v-slide-item>
            <v-slide-item

            >
                <img class="portfolio__image" src="/images/resume_themes/theme1102/portfolio/1.jpg"
                     alt="portfolio image">

            </v-slide-item>
            <v-slide-item

            >
                <img class="portfolio__image" src="/images/resume_themes/theme1102/portfolio/2.jpg"
                     alt="portfolio image">

            </v-slide-item>
            <v-slide-item

            >
                <img class="portfolio__image" src="/images/resume_themes/theme1102/portfolio/3.jpg"
                     alt="portfolio image">

            </v-slide-item>


        </v-slide-group>


    </div>
</template>

<script>
    import portfolio__mobile from "./portfolio__mobile"

    export default {
        components:{portfolio__mobile},
        data: () => {
            return {
                model: null,
            };
        },


    };
</script>

<style lang="scss">
    .portfolio__slide {
        #slide__portfolio {
            @media only screen and (max-width: 700px) {
                display: none;
                visibility: hidden;
            }

            .portfolio {
                &__image {
                    height: 400px;
                    width: 300px;
                    margin: 0 70px;
                    border-radius: 15px;
                    @media only screen and (max-width: 900px) {
                        margin: 0 15px;

                    }
                    @media only screen and (max-width: 783px) {
                        margin: 0 30px;
                        height: 350px;
                        width: 250px;

                    }

                }
            }
        }
    }

    #slide__portfolio {


        .theme--light.v-icon {
            color: #9d440e;
            padding: 10px 10px;
            background-color: white;
            border-radius: 50%;
        }
    }
</style>
