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
                class=" margBottom"
              >
                <v-row no-gutters justify="center" align="center">
                  <v-col
                    cols="2"
                    sm="2"
                    align-self="center"
                    class="hidden-xs-only"
                  >
                    <div class="mediaSerial">0{{ mediaIndex + 1 }}</div>
                  </v-col>
                  <v-col cols="12" sm="10" v-if="currentUser">
                    <Audio
                      v-if="m.type == 'audio'"
                      :title="getFormattedData(m.created_at)"
                      :file="m.url"
                      :user_name="currentUser.name"
                      :img="currentUser.personal_info.profile_pic"
                    ></Audio>
                    <Video
                      v-if="m.type == 'video'"
                      :title="getFormattedData(m.created_at)"
                      :link="m.url"
                      :user_name="currentUser.name"
                      :img="currentUser.personal_info.profile_pic"
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
    }
  },
  mounted() {
    console.log(this.currentUser);
  }
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
}
@media screen and (max-width: 475px) {
  .margTop {
    margin-top: 2rem;
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