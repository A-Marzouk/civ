<template>
  <v-container v-if="currentTab === 1">
    <v-row justify="center" align="center" class="mt-12">
      <v-col md="5" cols="12" sm="12" class="px-6">
        <v-img src="/images/resume_themes/theme510/port1.png"></v-img>
      </v-col>
      <v-col md="5" cols="12" sm="12" class="px-6">
        <v-img src="/images/resume_themes/theme510/port2.png"></v-img>
      </v-col>
    </v-row>
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
.navblade {
  position: relative;
  background-color: #104efb;
  border-top-left-radius: 300px;
  border-bottom-left-radius: 0;
  border-top-right-radius: 0;
  border-bottom-right-radius: 0;
}
</style>
