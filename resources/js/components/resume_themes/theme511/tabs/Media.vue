<template>
  <v-container fluid v-if="activeTab === 'media'">
    <v-row>
      <v-col>
        <v-row>
          <v-col lg="8" cols="12">
            <v-row no-gutters>
              <v-col
                cols="12"
                lg="5"
                v-for="(m, index) in media"
                :key="index"
                class="mx-3"
              >
                <v-row no-gutters justify="center" align="center" class="mb-8">
                  <v-col cols="2" sm="2" class="hidden-xs-only">
                    <div class="mediaSerial">{{ index + 1 }}</div>
                  </v-col>
                  <v-col cols="12" sm="10">
                    <Audio
                      v-if="m.type == 'audio'"
                      :file="m.url"
                      :title="getFormattedData(m.created_at)"
                      :user_name="user_name"
                      img="/images/resume_themes/theme511/audio_thumb-1.png"
                    ></Audio>
                    <Video
                      v-if="m.type == 'video'"
                      :link="m.url"
                      :title="getFormattedData(m.created_at)"
                      :user_name="user_name"
                      img="/images/resume_themes/theme511/video-thumb.png"
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
    import Audio from "./../media/Audio";
    import Video from "./../media/Video";

    export default {
        props: ["activeTab", "media", "user_name"],
        components: {Audio, Video},
        data: () => ({
            playing: true,
            loaded: false,
            percentage: 0,
            mediaFiles: [
                {
                    id: "01",
                    audio: "/images/resume_themes/theme511/audio-1.mp3",
                    img: "/images/resume_themes/theme511/audio_thumb-1.png"
                },
                {
                    id: "02",
                    audio: "/images/resume_themes/theme511/audio-1.mp3",
                    img: "/images/resume_themes/theme511/audio_thumb-2.png"
                },
                {
                    id: "03",
                    video: "/images/resume_themes/theme903/video.mp4",
                    img: "/images/resume_themes/theme511/video-thumb.png"
                },
                {
                    id: "04",
                    video: "/images/resume_themes/theme903/video.mp4",
                    img: "/images/resume_themes/theme511/video-thumb.png"
                }
            ],
            audio_lists: [
                {
                    file: "/images/resume_themes/theme511/audio-1.mp3",
                    img: "/images/resume_themes/theme511/audio_thumb-1.png"
                },
                {
                    file: "/images/resume_themes/theme511/audio-2.mp3",
                    img: "/images/resume_themes/theme511/audio_thumb-2.png"
                }
            ],
            video_lists: [
                {
                    link: "/images/resume_themes/theme903/video.mp4",
                    img: "/images/resume_themes/theme903/video1.png"
                },
                {
                    link: "/images/resume_themes/theme903/video.mp4",
                    img: "/images/resume_themes/theme903/video2.png"
                },
                {
                    link: "/images/resume_themes/theme903/video.mp4",
                    img: "/images/resume_themes/theme903/video3.png"
                }
            ]
        }),
        methods: {
            setPosition() {
                this.audio.currentTime = parseInt(
                    (this.audio.duration / 100) * this.percentage
                );
            },
            getFormattedData(date) {
                let d = new Date(date);
                return d.getDate() + '-' + d.getMonth() + '-' + d.getFullYear() ;
            }
        }
    };
</script>
<style lang="scss" scoped>
.mediaSerial {
  font-family: Roboto;
  font-style: normal;
  font-weight: 900;
  font-size: 48px;
  line-height: 56px;
  text-align: center;
  color: rgba(13, 0, 26, 0.2);
}
</style>