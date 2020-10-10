<template>
  <v-container fluid class="margTop">
    <v-row no-gutters>
      <v-col>
        <v-row no-gutters>
          <v-col lg="11" cols="12">
            <v-row no-gutters>
              <v-col
                cols="12"
                lg="5"
                v-for="(m, mediaIndex) in currentUser.media"
                :key="mediaIndex"
                v-show="m.is_public"
                class="margBottom"
              >
                <v-row no-gutters justify="center" align="center" class="mb-8">
                  <v-col
                    cols="2"
                    sm="2"
                    align-self="center"
                    class="hidden-xs-only"
                  >
                    <div class="mediaSerial">0{{ mediaIndex + 1 }}</div>
                  </v-col>
                  <v-col cols="12" sm="10">
                    <Audio
                      v-if="m.type == 'audio'"
                      :title="getFormattedData(m.created_at)"
                      :file="m.url"
                      :user_name="currentUser.name"
                      img="/images/resume_themes/theme1001/media/audio-1.png"
                    ></Audio>
                    <Video
                      v-if="m.type == 'video'"
                      :title="getFormattedData(m.created_at)"
                      :link="m.url"
                      :user_name="currentUser.name"
                      img="/images/resume_themes/theme1001/media/video-1.png"
                    ></Video>
                  </v-col>
                </v-row>
              </v-col>
            </v-row>
          </v-col>
        </v-row>
      </v-col>
    </v-row>
  </v-container>
</template>
<script>
import Audio from "./../components/media/Audio";
import Video from "./../components/media/Video";
export default {
  components: { Audio, Video },
  props: ["currentUser"],
  data: () => ({
    playing: true,
    loaded: false,
    percentage: 0,
    mediaFiles: [
      {
        id: "01",
        audio: "/images/resume_themes/theme511/audio-1.mp3",
        img: "/images/resume_themes/theme1001/media/audio-1.png",
      },
      {
        id: "02",
        audio: "/images/resume_themes/theme511/audio-1.mp3",
        img: "/images/resume_themes/theme1001/media/audio-2.png",
      },
      {
        id: "03",
        video: "/images/resume_themes/theme903/video.mp4",
        img: "/images/resume_themes/theme1001/media/video-1.png",
      },
      {
        id: "04",
        video: "/images/resume_themes/theme903/video.mp4",
        img: "/images/resume_themes/theme1001/media/video-2.png",
      },
    ],
    audio_lists: [
      {
        file: "/images/resume_themes/theme511/audio-1.mp3",
        img: "/images/resume_themes/theme511/audio_thumb-1.png",
      },
      {
        file: "/images/resume_themes/theme511/audio-2.mp3",
        img: "/images/resume_themes/theme511/audio_thumb-2.png",
      },
    ],
    video_lists: [
      {
        link: "/images/resume_themes/theme903/video.mp4",
        img: "/images/resume_themes/theme903/video1.png",
      },
      {
        link: "/images/resume_themes/theme903/video.mp4",
        img: "/images/resume_themes/theme903/video2.png",
      },
      {
        link: "/images/resume_themes/theme903/video.mp4",
        img: "/images/resume_themes/theme903/video3.png",
      },
    ],
  }),
  methods: {
    setPosition() {
      this.audio.currentTime = parseInt(
        (this.audio.duration / 100) * this.percentage
      );
    },
    getFormattedData(date) {
      let d = new Date(date);
      return d.getDate() + "-" + d.getMonth() + "-" + d.getFullYear();
    },
  },
};
</script>
<style lang="scss" scoped>
@import "./../scss/variables";
.mediaSerial {
  font-style: normal;
  font-weight: 900;
  font-size: 40px;
  line-height: 65px;
  text-align: center;
  color: #f8ab08;
}
.margBottom {
  margin-bottom: 2rem;
  margin-right: 1rem;
  margin-left: 1rem;
}
.margTop {
  margin-top: 1rem;
  margin-bottom: 10rem;
}
@media screen and (max-width: 475px) {
  .margTop {
    margin-top: 2rem;
    margin-bottom: 12rem;
  }
  .hidden-xs-only {
    display: none;
  }
  .margBottom {
    margin-bottom: 2rem;
    margin-right: 0rem;
    margin-left: 0rem;
  }
}
</style>