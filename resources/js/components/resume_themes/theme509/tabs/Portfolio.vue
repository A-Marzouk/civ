<template>
  <v-container v-if="currentTab === 1">
    <v-row justify="center" align="center" class="mt-12" no-gutters>
      <v-col md="4" cols="12" sm="12" class="pa-6" v-for="img in images" :key="img.id">
        <v-img
          :src="img.src"
          :aspect-ratio="1.2"
          style="box-shadow: 0px 4px 30px rgba(0, 0, 0, 0.15);border-radius:20px;"
        ></v-img>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
export default {
  props: ["currentTab"],
  data() {
    return {
      images: [
        {
          id: 1,
          src: "/images/resume_themes/theme509/img1.png"
        },
        {
          id: 2,
          src: "/images/resume_themes/theme509/img2.png"
        },
        {
          id: 3,
          src: "/images/resume_themes/theme509/img3.png"
        },
        {
          id: 4,
          src: "/images/resume_themes/theme509/img4.png"
        },
        {
          id: 5,
          src: "/images/resume_themes/theme509/img5.png"
        },
        {
          id: 6,
          src: "/images/resume_themes/theme509/img6.png"
        }
      ]
    };
  }
};
</script>

<style >
.theme--light.v-application {
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
