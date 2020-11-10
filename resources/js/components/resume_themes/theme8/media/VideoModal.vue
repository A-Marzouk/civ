<template>
    <div class="media" v-if="videoToggle">
        <div class="media__contentV">
            <v-container fluid class="pt-6">
                <v-row no-gutters>
                    <v-col cols="12">
                        <div class="float-left">
                            <div class="media-title">My Video</div>
                        </div>
                        <div class="float-right">
                            <v-btn
                                outlined
                                color="#005BD1"
                                fab
                                depressed
                                x-small
                            >
                                <v-icon
                                    color="#005BD1"
                                    @click.prevent="closeVideo()"
                                >
                                    mdi-close
                                </v-icon>
                            </v-btn>
                        </div>
                    </v-col>
                    <v-col cols="12">
                        <div class="float-left mt-8">
                            <div class="media-subtitle">
                                Video-{{ media.length }}
                            </div>
                        </div>
                    </v-col>
                </v-row>
            </v-container>
            <div class="media__contentV__video">
                <div class="media__content__audio">
                    <VueSlickCarousel
                        v-bind="settings"
                        class="video_carousel"
                        :style="{ height: '400px' }"
                    >
                        <VideoPlayer
                            v-for="(video, index) in media"
                            :key="index"
                            :link="video.url"
                            :index="index"
                            :img="video.media_preview"
                        ></VideoPlayer>

                        <template #customPaging="i">
                            <div class="custom-dot">
                                <div class="d-none">{{ i }}</div>
                            </div>
                        </template>
                    </VueSlickCarousel>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import VideoPlayer from "./VideoPlayer";
import VueSlickCarousel from "vue-slick-carousel";
import "vue-slick-carousel/dist/vue-slick-carousel-theme.css";

export default {
    props: ["media", "videoToggle", "closeVideo"],
    components: {
        VueSlickCarousel,
        VideoPlayer
    },
    data() {
        return {
            settings: {
                arrows: false,
                dots: true,
                infinite: true,
                slidesToShow: 2,
                slidesToScroll: 2,

                responsive: [
                    {
                        breakpoint: 1050,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2,
                            vertical: true,
                            verticalSwiping: true
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2,
                            vertical: true,
                            verticalSwiping: true
                        }
                    },
                    {
                        breakpoint: 475,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2,
                            vertical: true,
                            verticalSwiping: true
                        }
                    }
                ]
            }
        };
    }
};
</script>
<style lang="scss" scoped>
.media-title {
    font-family: "Open Sans";
    font-style: normal;
    font-weight: 300;
    font-size: 36px;
    line-height: 49px;
    color: #005bd1;
}
.media-subtitle {
    font-family: "Open Sans";
    font-style: normal;
    font-weight: 300;
    font-size: 24px;
    line-height: 33px;
    color: #005bd1;
}
@mixin modalPostion {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}
@mixin modalPostionTablet {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}
@mixin modalPostionMobile {
    position: absolute;
    top: 40%;
    left: 50%;
    transform: translate(-50%, -50%);
}
.media {
    width: 100%;
    height: 100vh;
    z-index: 9999;
    position: fixed;
    top: 0;
    left: 0;
    background: rgba(0, 0, 0, 0.5);

    &__contentV {
        @include modalPostion;
        width: 95%;
        height: 40rem;
        background: #333232;
        border-radius: 30px;
        padding: 1.5rem;
        @media only screen and (min-width: 650px) and (max-width: 1024px) {
            @include modalPostionTablet;
            width: 88%;
            height: 60rem;
            padding: 1rem;
        }
        @media only screen and (min-width: 320px) and (max-width: 500px) {
            top: 52%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 90%;
            height: auto;
            padding: 0.5rem;
        }
        &_close {
            width: 30px;
            height: 30px;

            border-radius: 50%;
            background: #5289e7;
            color: #fff;
            float: right;
            margin-top: 1.5rem;
            margin-right: 1.5rem;

            a > img {
                width: 25px;
                height: 25px;
                margin: auto;
                margin-top: 2px;
            }
        }

        &__video {
            margin-top: 2%;
            @media only screen and (min-width: 650px) and (max-width: 1024px) {
                margin-top: 5%;
            }
            @media only screen and (min-width: 320px) and (max-width: 500px) {
                margin-top: 5%;
            }
        }
    }
}
</style>
