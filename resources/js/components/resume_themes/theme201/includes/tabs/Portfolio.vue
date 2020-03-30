<template>
  <v-container style="max-width: 1785px;">
    <v-layout row wrap>
      <!-- item 1 -->
      <v-flex v-for="project in projects" :key="project.id + '_project'" md4 xs12 pa-5>
        <v-card style="border-radius:12px;" flat>
          <v-img :src="getMainImageUrl(project)" alt="Project image"></v-img>
        </v-card>
      </v-flex>
    </v-layout>
  </v-container>
</template>

<script>
export default {
  name: "Portfolio",
  methods: {
    getMainImageUrl(project) {
      let mainImage = "";

      let images = project.images;
      images.forEach(image => {
        if (image.is_main) {
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
  }
};
</script>

