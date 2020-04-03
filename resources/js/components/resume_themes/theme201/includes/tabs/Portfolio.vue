<template>
  <v-container style="max-width: 1785px;">
    <v-row>
      <!-- item 1 -->
      <v-col cols="12" md="4" class="pa-5" v-for="project in projects" :key="project.id + '_project'" >
        <v-card style="border-radius:12px;" flat>
          <v-img :src="getMainImageUrl(project)" alt="Project image"></v-img>
        </v-card>
      </v-col>
    </v-row>
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

