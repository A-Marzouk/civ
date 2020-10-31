<template>
  <v-card color="transparent" flat>
    <v-card-text>
      <v-row>
        <v-col
          cols="12"
          sm="6"
          md="3"
          v-for="project in currentUser.projects"
          :key="project.id"
          v-show="project.is_public"
        >
          <v-card class="card-portfolio" hover>
            <v-img
              :aspect-ratio="1.2"
              :src="getProjectMainImage(project)"
            ></v-img>
          </v-card>
        </v-col>
      </v-row>
    </v-card-text>
  </v-card>
</template>
<script>
export default {
  name: "Portfolio",
  props: {
    currentUser: {
      type: Object,
    },
  },
  data() {
    return {};
  },
  methods: {
    getProjectMainImage(project) {
      let mainImage = "";

      let images = project.images;
      images.forEach((image) => {
        if (image.is_main) {
          mainImage = image;
        }
      });

      return mainImage.src;
    },
  },
};
</script>
<style scoped lang="scss">
.card-portfolio {
  border-radius: 30px !important;
}
</style>