<template>
  <v-container class="mt-n6 pa-0">
    <v-row no-gutters class="hidden-xs-only">
      <v-col cols="12" sm="12" md="12" class="grey lighten-5">
        <v-container>
          <v-row class="textcol py-6" justify="center">
            <v-col md="5" sm="5">
              <div class="display-1">
                $50
                <span class="title">USD</span>
              </div>
              <div class="subtitle-1">Hourly rate</div>
            </v-col>
            <v-col md="5" sm="5">
              <div class="display-1">
                15
                <span class="title">Hours</span>
              </div>
              <div class="subtitle-1">Weekly Availability</div>
            </v-col>
          </v-row>
        </v-container>
      </v-col>
      <v-col cols="12" sm="12" md="12" class="my-1" style="height:10px;background-color:#fff;"></v-col>
      <v-col cols="12" sm="12" md="12" class="mt-4">
        <v-container class="pa-0">
          <v-row justify="space-between" no-gutters>
            <v-col md="6" sm="5" lg="5">
              <div class="subtitle-1 white--text">Watch My Previous Interviews</div>
            </v-col>
            <v-col md="6" sm="6" lg="5" class="text-right">
              <v-btn outlined dark fab large class="mr-4 mr-md-1">
                <v-img
                  src="/images/resume_themes/theme508/audio-spec.svg"
                  class="ma-2"
                  style="width: 30px;height: 30px;"
                  contain
                ></v-img>
              </v-btn>
              <v-btn outlined dark fab large class="ml-4 ml-md-1">
                <v-img
                  src="/images/resume_themes/theme508/video-cam.svg"
                  class="ma-1"
                  style="width: 18px;height: 18px;"
                  contain
                ></v-img>
              </v-btn>
            </v-col>
          </v-row>
        </v-container>
      </v-col>
    </v-row>
    <v-row no-gutters class="hidden-sm-and-up text-center white--text" justify="center">
      <v-col cols="6">
        <div class="caption">
          Hourly
          <span class="subtitle-1 font-weight-bold ml-2">$50 USD</span>
        </div>
      </v-col>
      <v-col cols="6">
        <div class="caption">
          Weekly
          <span class="subtitle-1 font-weight-bold ml-2">15 Hours</span>
        </div>
      </v-col>
    </v-row>
  </v-container>
</template>
<style lang="scss" scoped>
.textcol {
  color: #6247fd;
}
.spec {
  width: 18px;
  height: 18px;
}

.v-btn--outlined {
  border: 3px solid #fff;
}
</style>