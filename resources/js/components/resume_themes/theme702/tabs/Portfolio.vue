<template>
  <div class="tm702-portfolio" v-if="currentTab === 2">
    <div class="tm702-portfolio-container">
      <a href="#" v-for="{id, url, alt} in portfolios" :key="id">
        <img :src="url" :alt="alt" />
      </a>
    </div>
  </div>
</template>
<script>
export default {
  props: ["currentTab"],
  data() {
    return {
      portfolios: [
        {
          id: 1,
          url: "/images/resume_themes/theme702/portfolio1.png",
          alt: "alt"
        },
        {
          id: 2,
          url: "/images/resume_themes/theme702/portfolio2.png",
          alt: "alt"
        },
        {
          id: 3,
          url: "/images/resume_themes/theme702/portfolio3.png",
          alt: "alt"
        },
        {
          id: 4,
          url: "/images/resume_themes/theme702/portfolio4.png",
          alt: "alt"
        },
        {
          id: 5,
          url: "/images/resume_themes/theme702/portfolio5.png",
          alt: "alt"
        },
        {
          id: 6,
          url: "/images/resume_themes/theme702/portfolio6.png"
        }
      ]
    };
  }
};
</script>
<style lang="scss">
.tm702-portfolio {
  .tm702-portfolio-container {
    padding-left: 23px;
    padding-right: 21px;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(620px, 1fr));
    grid-row-gap: 26px;
    grid-column-gap: 10px;
  }
}
</style>
