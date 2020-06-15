<template>
  <v-container fluid v-if="currentTab===4">
    <v-row>
      <v-col>
        <div>media</div>
      </v-col>
    </v-row>
    <v-footer style="z-index:500" fixed color="#fff" class="media-player-tm903">
      <v-row justify="center" class="align-center">
        <v-col class="avatar-media-player-tm903" lg="2" cols="2" sm="3">
          <v-row justify="center" class="align-center">
            <v-col lg="3" md="4" cols="3" sm="6">
              <v-list-item-avatar height="65" width="65" color="transparent">
                <v-img src="/images/resume_themes/theme511/audio.png"></v-img>
              </v-list-item-avatar>
            </v-col>
            <v-col>
              <div class="audio-info-903">
                <span class="title-audio-tm903">AUDIO_04/09/2020</span>
                <br />
                <span class="subtitle-audio-tm903">Hean Prinsloo</span>
              </div>
            </v-col>
          </v-row>
        </v-col>
        <v-col class="linear-playing-audio-tm903" cols="3">
          <div class="ml-n12">
            <v-progress-linear
              height="54"
              color="transparent"
              rounded
              style="cursor:pointer;border-radius: 30px;"
              @click.native="setPosition()"
              :disabled="!loaded"
              v-model="percentage"
            >
              <v-img class="ml-6 mt-6 mb-6 mr-6" src="/images/resume_themes/theme511/bars.png"></v-img>
            </v-progress-linear>
            <div class="d-flex">
              <span class="timer-player-903">0:00</span>
              <v-spacer></v-spacer>
              <span class="timer-player-903">5:38</span>
            </div>
          </div>
        </v-col>
        <v-col lg="6" md="4" sm="8" cols="12">
          <div class="d-flex">
            <v-list-item-icon>
              <v-btn icon>
                <v-icon>mdi-shuffle</v-icon>
              </v-btn>
            </v-list-item-icon>
            <div>
              <v-btn
                style="margin-left:auto;margin-right:auto;"
                height="60"
                width="60"
                color="#39E1AA"
                outlined
                fab
              >
                <v-icon color="#39E1AA">mdi-chevron-double-left</v-icon>
              </v-btn>
              <v-btn
                style="margin-left:auto;margin-right:auto;"
                elevation="0"
                height="60"
                width="60"
                color="#39E1AA"
                dark
                fab
              >
                <v-icon @click="playing=false" v-if="playing">mdi-play</v-icon>
                <v-icon @click="playing=true" v-else>mdi-pause</v-icon>
              </v-btn>
              <v-btn
                style="margin-left:auto;margin-right:auto;"
                height="60"
                width="60"
                color="#39E1AA"
                outlined
                fab
              >
                <v-icon color="#39E1AA">mdi-chevron-double-right</v-icon>
              </v-btn>
            </div>
            <v-list-item-icon>
              <v-btn icon>
                <v-icon>mdi-repeat</v-icon>
              </v-btn>
            </v-list-item-icon>
          </div>
          <div class="hidden-sm-and-up">
            <v-progress-linear class="mt-2" color="#FFD43B" value="50" rounded height="10"></v-progress-linear>
            <span class="pl-7">2:00:00</span>
          </div>
        </v-col>
        <v-col class="full-media-player-tm903">
          <v-btn icon>
            <v-icon>mdi-fullscreen</v-icon>
          </v-btn>
        </v-col>
      </v-row>
    </v-footer>
  </v-container>
</template>
<script>
export default {
  props: ["currentTab"],
  data: () => ({})
};
</script>
<style lang="scss" scoped>
</style>