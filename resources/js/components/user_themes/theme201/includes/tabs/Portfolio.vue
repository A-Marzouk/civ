<template>
  <v-container style="max-width: 1785px;">
    <v-layout row wrap>
      <!-- item 1 -->
      <v-flex v-for="project in projects" :key="project.id" md4 xs12 pa-5>
        <v-img :src="getMainImageUrl(project)" alt="Loading..." class="projectImage"></v-img>
      </v-flex>
      <!-- item 1 -->
    </v-layout>
  </v-container>
</template>

<script>
export default {
  name: "Portfolio",
  data: () => ({

  }),
  methods: {
    getMainImageUrl(project){
      let mainImage = '';

      let images = project.images;
      images.forEach((image) => {
        if (image.is_main){
          mainImage = image;
        }
      });

      return mainImage;
    }
  },
  computed: {
    projects() {
      return this.$store.state.themeUser.projects;
    }
  },
};
</script>

<style lang="scss" scoped>
  .projectImage{
    height: 415px;
    width:530px;
    border-radius:12px;
  }
</style>
