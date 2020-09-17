<template>
  <!-- Audio Modal -->
  <div class="media" v-if="audioToggle">
    <div class="media__content">
      <v-container fluid class="pt-6">
        <v-row no-gutters>
          <v-col cols="12">
            <div class="float-left">
              <div class="media-title">My Audio</div>
            </div>
            <div class="float-right">
              <v-btn outlined color="#005BD1" fab depressed x-small>
                <v-icon color="#005BD1" @click.prevent="closeAudio()"
                  >mdi-close</v-icon
                >
              </v-btn>
            </div>
          </v-col>
          <v-col cols="12">
            <div class="float-left mt-8">
              <div class="media-subtitle">Audio-{{ media.length }}</div>
            </div>
          </v-col>
        </v-row>
      </v-container>

      <div class="audio-player">
        <div class="media__content__audio">
          <VueSlickCarousel
            v-bind="carouselSetting"
            class="vertically_carousel"
            :style="{ height: '400px' }"
          >
            <AudioPlayer
              v-for="(audio, index) in media"
              :key="index"
              :file="audio.url"
              :index="index"
            ></AudioPlayer>

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
  <!-- Audio Modal -->
</template>
<script>
import AudioPlayer from "./AudioPlayer";
import VueSlickCarousel from "vue-slick-carousel";
import "vue-slick-carousel/dist/vue-slick-carousel-theme.css";
export default {
  props: ["media", "audioToggle", "closeAudio"],
  components: {
    VueSlickCarousel,
    AudioPlayer,
  },
  data() {
    return {
      carouselSetting: {
        arrows: false,
        dots: true,
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 3,
        vertical: true,
        verticalSwiping: true,
      },
    };
  },
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
  &__content {
    @include modalPostion;
    width: 95%;
    height: 40rem;
    background-color: #333232;
    border-radius: 30px;
    padding: 1.5rem;
    @media only screen and (min-width: 650px) and (max-width: 1024px) {
      @include modalPostionTablet;
      width: 90%;
      height: 30rem;
    }
    @media only screen and (min-width: 320px) and (max-width: 500px) {
      @include modalPostionMobile;
      width: 92%;
      height: 30rem;
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
    &__audio {
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
.vertically_carousel {
  width: 100%;

  .slick-list {
    height: 300px !important;

    @media only screen and (min-width: 650px) and (max-width: 1024px) {
      width: 100% !important;
    }
    @media only screen and (min-width: 320px) and (max-width: 500px) {
      width: 100% !important;
    }
    .slick-track {
      opacity: 1;
      transform: translate3d(0px, -490px, 0px);
      height: 500px !important;
    }
  }
}

.slick-vertical .slick-slide {
  width: 100% !important;
  display: block;
  height: auto;
  padding: 0 1rem;
  margin: 20px 0 !important;
  border: 1px solid transparent;
}
.slick-active .custom-dot {
  background-color: #104efb;
  opacity: 1 !important;
  width: 15px;
  height: 15px;
}
.slick-dots {
  position: absolute;
  bottom: -25px;
  display: inline-block;
  width: 300px;

  padding: 0;
  right: 0;
  margin: 0;
  list-style: none;
  text-align: center;
}
.custom-dot {
  background-color: #104efb;
  opacity: 0.6;
  border-radius: 50%;
  width: 15px;

  height: 15px;
}

.slick-active .custom-dot:after {
  content: "";

  position: absolute;
  top: -4px;
  left: -4px;
  right: 0px;

  border-radius: 50%;
  border: 1px solid #104efb;
  width: 24px;
  height: 24px;
}
</style>