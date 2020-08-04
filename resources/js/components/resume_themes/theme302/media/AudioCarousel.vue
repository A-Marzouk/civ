<template>
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
</template>
<script>
import AudioPlayer from "./AudioPlayer";
import VueSlickCarousel from "vue-slick-carousel";
import "vue-slick-carousel/dist/vue-slick-carousel-theme.css";

export default {
  components: {
    VueSlickCarousel,
    AudioPlayer
  },
  data() {
    return {
      media: [
        {
          name: "Herio Syndeile",
          type: "audio",
          url:
            "http://soundbible.com/mp3/Elevator Ding-SoundBible.com-685385892.mp3",
          img: "/images/resume_themes/theme511/audio_thumb-1.png"
        },
        {
          name: "Herio Syndeile",
          type: "audio",
          url:
            "http://soundbible.com/mp3/Air Plane Ding-SoundBible.com-496729130.mp3",
          img: "/images/resume_themes/theme511/audio_thumb-1.png"
        },
        {
          name: "Herio Syndeile",
          type: "audio",
          url:
            "http://soundbible.com/mp3/Elevator Ding-SoundBible.com-685385892.mp3",
          img: "/images/resume_themes/theme511/audio_thumb-1.png"
        },
        {
          name: "Herio Syndeile",
          type: "audio",
          url:
            "http://soundbible.com/mp3/Air Plane Ding-SoundBible.com-496729130.mp3",
          img: "/images/resume_themes/theme511/audio_thumb-1.png"
        },
        {
          name: "Herio Syndeile",
          type: "audio",
          url:
            "http://soundbible.com/mp3/Elevator Ding-SoundBible.com-685385892.mp3",
          img: "/images/resume_themes/theme511/audio_thumb-1.png"
        },
        {
          name: "Herio Syndeile",
          type: "audio",
          url:
            "http://soundbible.com/mp3/Air Plane Ding-SoundBible.com-496729130.mp3",
          img: "/images/resume_themes/theme511/audio_thumb-1.png"
        },
        {
          name: "Herio Syndeile",
          type: "audio",
          url:
            "http://soundbible.com/mp3/Elevator Ding-SoundBible.com-685385892.mp3",
          img: "/images/resume_themes/theme511/audio_thumb-1.png"
        },
        {
          name: "Herio Syndeile",
          type: "audio",
          url:
            "http://soundbible.com/mp3/Air Plane Ding-SoundBible.com-496729130.mp3",
          img: "/images/resume_themes/theme511/audio_thumb-1.png"
        },
        {
          name: "Herio Syndeile",
          type: "audio",
          url:
            "http://soundbible.com/mp3/Elevator Ding-SoundBible.com-685385892.mp3",
          img: "/images/resume_themes/theme511/audio_thumb-1.png"
        }
      ],
      carouselSetting: {
        arrows: false,
        dots: true,
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 3,
        vertical: true,
        verticalSwiping: true
      }
    };
  }
};
</script>
<style lang="scss" scoped>
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