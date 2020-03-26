<template>
  <v-container style="max-width: 1785px;">
    <v-layout row wrap>
      <!-- item 1 -->
      <v-flex v-for="item in items" :key="item.src" md4 xs12 pa-5>
        <v-img :src="getImageUrl(item.src)" alt="Loading..."></v-img>
      </v-flex>
      <!-- item 1 -->
    </v-layout>
  </v-container>
</template>

<script>
export default {
  name: "Portfolio",
  data: () => ({
    items: [
      {
        src: "fitness_club-statics_schedule_2x 1.png"
      },
      {
        src: "dribbble_fitness_2x_2x 1.png"
      },
      {
        src: "fitness2_2x_2x 1.png"
      },
      {
        src: "app_011.png"
      },
      {
        src: "tracker_3_2x 1.png"
      },
      {
        src: "image_processing20200116-657-105hy6m 1.png"
      }
    ]
  }),
  methods: {
    getImageUrl(pic) {
      return "/images/resume_themes/theme201/" + pic;
    }
  }
};
</script>

