<template>
  <div class="portfolios">
    <div class="portfolio-topbar">
      <div class="portfolio-categories">
        <a
          v-for="(categ, i) in categories"
          class="portfolio-category"
          :class="{ active: categ === category }"
          :key="i"
          href="#"
          @click.prevent="changeCategory(categ)"
          v-text="categ"
        ></a>
      </div>

      <div class="portfolio-option">
        <a
          :class="{ active: displayMode === 'simple' }"
          href="#"
          @click.prevent="displayMode = 'simple'"
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="50"
            height="45"
            viewBox="0 0 50 45"
          >
            <g transform="translate(-1781 -494)">
              <rect
                id="option-rect"
                width="50"
                height="45"
                rx="9"
                transform="translate(1781 494)"
                fill="#d4ddff"
              />
              <rect
                width="23"
                height="23"
                rx="3"
                transform="translate(1795 505)"
                fill="#fff"
              />
            </g>
          </svg>
        </a>

        <a
          :class="{ active: displayMode === 'detail' }"
          href="#"
          @click.prevent="displayMode = 'detail'"
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="50"
            height="45"
            viewBox="0 0 50 45"
          >
            <g transform="translate(-1783 -492)">
              <rect
                id="option-rect"
                width="50"
                height="45"
                rx="9"
                transform="translate(1783 492)"
                fill="#3d5ed4"
              />
              <rect
                width="26"
                height="20"
                rx="1"
                transform="translate(1795 503)"
                fill="#fff"
              />
              <rect
                width="26"
                height="2"
                rx="1"
                transform="translate(1795 525)"
                fill="#fff"
              />
            </g>
          </svg>
        </a>
      </div>
    </div>

    <div class="portfolio-items">
      <div
        v-for="portfolio in filterCategory(category)"
        :key="portfolio.id"
        v-show="portfolio.is_public"
        class="portfolio-item"
      >
        <div class="item-wrapper">
          <ImagesCarouselModal :images="portfolio.images">
            <Thumbnail
              v-if="portfolio.is_public"
              :src="portfolio.images[0].src"
            />
          </ImagesCarouselModal>

          <div v-show="displayMode === 'detail'" class="item-detail">
            <h3 class="item-detail__title" v-text="portfolio.name"></h3>
            <div
              class="item-detail__excerpt"
              v-text="portfolio.description"
            ></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Thumbnail from "../components/Thumbnail";
import ImagesCarouselModal from "../../reusable/ImagesCarouselModal";

export default {
  name: "portfolio",

  components: { Thumbnail, ImagesCarouselModal },
  props: ["currentUser"],
  data: () => {
    return {
      displayMode: "detail",

      category: "All",

      categories: ["All"],
    };
  },
  created() {
    let uniqueCategories = [
      ...new Set(this.currentUser.projects.map((project) => project.category)),
    ];
    this.categories = this.categories.concat(uniqueCategories);
  },
  computed: {
    filtredPortfolios() {
      return this.portfolios.filter((portfolio) =>
        portfolio.categories.includes(this.category)
      );
    },
  },

  methods: {
    filterCategory(category) {
      if (category == "All") {
        return this.currentUser.projects;
      }
      var filterArray = this.currentUser.projects.filter(
        (a) => a.category === category
      );
      return filterArray;
    },
    changeCategory(category) {
      this.category = category;
    },
  },
};
</script>

<style lang="scss" scoped>
@import "./../scss/variables";

.portfolio-topbar {
  display: none;
  font-family: $muli;
  padding-top: 25px;
}

.portfolio-categories {
  display: flex;
  align-items: center;
  flex-wrap: wrap;
}

.portfolio-category {
  color: #b4afc4;
  border-radius: 9px;
  display: block;
  font-size: 14px;
  font-weight: 300;
  margin-right: 10px;
  padding: 10px;
  text-transform: capitalize;
  transition: all 0.3s;

  &:last-child {
    margin-right: unset;
  }

  &:hover {
    text-decoration: none;
    color: #3d5ed4;
  }

  &.active {
    font-weight: 700;
    background: #d4ddff;
    color: #3d5ed4;
  }
}

.portfolio-option {
  flex: 1;
  display: flex;
  align-items: center;
  justify-content: flex-end;

  a {
    display: block;
    margin-right: 10px;

    &:last-child {
      margin-right: unset;
    }

    svg {
      height: 39px;
      width: 43.33px;
    }

    #option-rect {
      fill: #d4ddff;
      transition: all 0.3s;
    }

    &.active {
      #option-rect {
        fill: #3d5ed4;
      }
    }
  }
}

.portfolio-items {
  padding-top: 25px;
  padding-bottom: 50px;
}

.portfolio-item {
  padding-top: 25px;
}

.item-wrapper > img {
  border-radius: 9px;
  width: 100%;
}

.item-detail {
  padding-top: 25px;
  padding-left: 1%;

  padding: 25px;
  padding-left: 50px;
}

.item-detail__title {
  position: relative;
  font-family: $poppins;
  font-weight: 500;
  text-transform: uppercase;
  font-size: 11px;
  line-height: 11px;
  color: #172c7a;

  &::before {
    content: "";
    width: 25px;
    height: 1px;
    background: #172c7a;
    position: absolute;
    left: -50px;
    top: 50%;
    transform: translateY(50%);
  }
}

.item-detail__excerpt {
  font-family: $muli;
  padding-top: 10px;
  font-size: 13px;
  font-weight: 300;
  line-height: 16px;
  color: #656870;
}

@media (min-width: $sm) {
  .portfolio-items {
    max-width: 426px;
    margin: 0 auto;
  }

  .item-detail__title {
    font-size: 14px;
    line-height: 14px;
  }

  .item-detail__excerpt {
    font-size: 16px;
    line-height: 26px;
  }
}

@media (min-width: $md) {
  .portfolio-topbar {
    display: flex;
  }

  .portfolio-items {
    display: flex;
    flex-wrap: wrap;
    max-width: unset;
    margin: unset;
  }

  .portfolio-item {
    width: 50%;
    padding-left: 10px;
    padding-right: 10px;
  }
}

@media (min-width: $lg) {
  .portfolio-item {
    width: 33.333333%;
  }

  .portfolio-topbar {
    padding-top: 50px;
  }

  .portfolio-category {
    font-size: 15px;
    margin-right: 25px;
  }

  .item-detail__title {
    font-size: 11px;
    line-height: 14px;
  }

  .item-detail__excerpt {
    max-width: 198px;
    font-size: 12px;
    line-height: 22px;
  }
}

@media (min-width: 1600px) {
  .portfolio-item {
    padding-top: 35px;
  }

  .portfolio-option a svg {
    width: 50px;
    height: 45px;
  }

  .portfolio-category {
    font-size: 18px;
    padding: 12px 16px;
    margin-right: 45px;
  }

  .item-detail {
    padding-left: 80px;
  }

  .item-detail__title {
    font-size: 15px;
    line-height: 21px;

    &::before {
      left: -80px;
      width: 42px;
    }
  }

  .item-detail__excerpt {
    max-width: 282px;
    font-size: 17px;
    line-height: 27px;
  }
}

@media (min-width: $xl) {
  .portfolio-category {
    font-size: 22px;
    padding: 14px 18px;
    margin-right: 55px;
  }

  .portfolio-topbar {
    padding-top: 60px;
  }

  .portfolio-item {
    padding-top: 30px;
    padding-left: 15px;
    padding-right: 15px;
  }

  .item-detail__excerpt {
    padding-top: 15px;
  }
}
</style>
