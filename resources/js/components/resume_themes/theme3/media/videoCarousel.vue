<template>
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
        :img="video.img"
        :details="video.description"
      ></VideoPlayer>

      <template #customPaging="i">
        <div class="custom-dot">
          <div class="d-none">{{ i }}</div>
        </div>
      </template>
    </VueSlickCarousel>
  </div>
</template>
<script>
import VideoPlayer from "./videoPlayer";
import VueSlickCarousel from "vue-slick-carousel";
import "vue-slick-carousel/dist/vue-slick-carousel-theme.css";

export default {
  components: {
    VueSlickCarousel,
    VideoPlayer
  },
  data() {
    return {
      media: [
        {
          name: "Herio Syndeile",
          description:
            "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut",
          type: "video",
          url: "/images/resume_themes/theme903/video.mp4",
          img: "/images/resume_themes/theme3/portfolio1.png"
        },
        {
          name: "Herio Syndeile",
          description:
            "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut",
          type: "video",
          url: "/images/resume_themes/theme903/video.mp4",
          img: "/images/resume_themes/theme3/portfolio2.png"
        },
        {
          name: "Herio Syndeile",
          description:
            "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut",
          type: "video",
          url: "/images/resume_themes/theme903/video.mp4",
          img: "/images/resume_themes/theme3/portfolio1.png"
        },
        {
          name: "Herio Syndeile",
          description:
            "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut",
          type: "video",
          url: "/images/resume_themes/theme903/video.mp4",
          img: "/images/resume_themes/theme3/portfolio2.png"
        },
        {
          name: "Herio Syndeile",
          description:
            "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut",
          type: "video",
          url: "/images/resume_themes/theme903/video.mp4",
          img: "/images/resume_themes/theme3/portfolio1.png"
        },
        {
          name: "Herio Syndeile",
          description:
            "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut",
          type: "video",
          url: "/images/resume_themes/theme903/video.mp4",
          img: "/images/resume_themes/theme3/portfolio2.png"
        },
        {
          name: "Herio Syndeile",
          description:
            "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut",
          type: "video",
          url: "/images/resume_themes/theme903/video.mp4",
          img: "/images/resume_themes/theme3/portfolio1.png"
        },
        {
          name: "Herio Syndeile",
          description:
            "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut",
          type: "video",
          url: "/images/resume_themes/theme903/video.mp4",
          img: "/images/resume_themes/theme3/portfolio2.png"
        }
      ],
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
.video_carousel {
  width: 80%;
  margin: auto;
  .slick-list {
    height: 300px !important;
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
  background-color: #5289e7 !important;
  opacity: 1;
  width: 15px;
  height: 15px;
}

.custom-dot {
  border: 1px solid #5289e7;
  margin-top: 2rem;
  border-radius: 50%;
  width: 15px;
  height: 15px;
  @media only screen and (min-width: 650px) and (max-width: 1024px) {
    margin-top: 28rem;
  }
  @media only screen and (min-width: 320px) and (max-width: 500px) {
    margin-top: 14rem;
  }
}
</style>