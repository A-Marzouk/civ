<template>
  <div class="tm702-portfolio" v-if="currentTab === 2">
    <div class="tm702-portfolio-container">
      <a href="#" v-for="{ id, url, alt } in portfolios" :key="id">
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
    display: grid;
    grid-template-columns: repeat(1, minmax(0, 1fr));
    grid-row-gap: 26px;
    grid-column-gap: 10px;
    margin-top: 39px;

    @media screen and(min-width: 768px) {
      margin-top: 83px;
    }
    @media screen and(min-width: 1200px) {
      margin-top: 108px;
      grid-template-columns: repeat(2, minmax(0, 1fr));
      padding-left: 80px;
      padding-right: 80px;
    }
    @media screen and(min-width: 1800px) {
      grid-template-columns: repeat(3, minmax(0, 1fr));
    }
  }
  a {
    display: block;
    margin: auto;
    img {
      width: 332px;
      height: 260px;
      @media screen and(min-width: 768px) {
        width: 677px;
        height: 530px;
      }
      @media screen and(min-width: 1200px) {
        width: 488px;
        height: 382px;
      }
    }
  }
}
</style>
