<template>
  <v-container v-if="currentTab === 0" fluid>
    <v-row justify="center" align="center" class="pt-12">
      <v-col md="4" cols="12" sm="12" class="px-6">
        <v-img src="/images/resume_themes/theme510/port1.png"></v-img>
      </v-col>
      <v-col md="4" cols="12" sm="12" class="px-6">
        <v-img src="/images/resume_themes/theme510/port2.png"></v-img>
      </v-col>
    </v-row>
    <!-- <v-row v-if="currentTab === 1" no-gutters justify="end" align="end" class="hidden-xs-only">
      <v-col md="2" sm="6" class="navblade py-3" style="text-align: center;">
        <v-btn dark fab outlined color="#fff" disabled small class="ma-3">
          <v-icon small>mdi-arrow-left</v-icon>
        </v-btn>
        <v-btn dark fab outlined color="#fff" small class="ma-3">
          <v-icon small>mdi-arrow-right</v-icon>
        </v-btn>
      </v-col>
    </v-row>-->
  </v-container>
</template>

<script>
export default {
  name: "portfolio",
  props: ["currentTab"]
};
</script>

<style >
.theme--light.v-application {
  background: transparent;
  color: rgba(0, 0, 0, 0.87);
}
</style>
