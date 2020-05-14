<template>
  <v-container>
    <v-row>
      <v-col>
        <v-row>
          <v-col v-for="n in portfolios" :key="n.id">
            <v-img :src="n.url"></v-img>
          </v-col>
        </v-row>
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
          url: "/images/resume_themes/theme508/port-1.png"
        },
        {
          id: 2,
          url: "/images/resume_themes/theme508/port-2.png"
        },
        {
          id: 3,
          url: "/images/resume_themes/theme508/port-3.png"
        },
        {
          id: 4,
          url: "/images/resume_themes/theme508/port-4.png"
        },
        {
          id: 5,
          url: "/images/resume_themes/theme508/port-5.png"
        },
        {
          id: 6,
          url: "/images/resume_themes/theme508/port-6.png"
        },
        {
          id: 7,
          url: "/images/resume_themes/theme508/port-7.png"
        },
        {
          id: 8,
          url: "/images/resume_themes/theme508/port-8.png"
        }
      ]
    };
  }
};
</script>

<style lang="scss"></style>
