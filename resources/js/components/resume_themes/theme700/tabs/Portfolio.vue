<template>
  <v-container v-if="currentTab === 1" fluid pa-0>
    <v-row justify="center">
      <v-col
        cols="11"
        sm="11"
        lg="4"
        v-for="(portfolio, id) in portfolios"
        :key="id"
        class="pr-lg-12 pb-lg-12 my-lg-0 my-sm-4 my-4"
      >
        <v-img
          :src="portfolio.url"
          contain
          style="border-radius:20px;box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.05);"
          elevation="4"
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
      portfolios: [
        {
          id: 1,
          url: "/images/resume_themes/theme700/portfolio1.png"
        },
        {
          id: 2,
          url: "/images/resume_themes/theme700/portfolio2.png"
        },
        {
          id: 3,
          url: "/images/resume_themes/theme700/portfolio3.png"
        },
        {
          id: 4,
          url: "/images/resume_themes/theme700/portfolio3.png"
        },
        {
          id: 5,
          url: "/images/resume_themes/theme700/portfolio2.png"
        },
        {
          id: 6,
          url: "/images/resume_themes/theme700/portfolio1.png"
        }
      ]
    };
  }
};
</script>

<style lang="scss">
</style>
