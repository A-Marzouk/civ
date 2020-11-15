<template>
  <div class="portfolio">
    <div class="portfolio-items">
      <div class="portfolio-item" v-for="item in portfolio" :key="item.id">
        <div class="portfolio-item-thumbnail">
          <div class="thumbnail-ratio">
            <img :src="item.thumbnail" :alt="item.title" />
          </div>
        </div>
        <h3 class="portfolio-item-title" v-text="item.title"></h3>
        <p class="portfolio-item-description" v-text="item.description"></p>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'portfolio',

  props: {
    currentUser: {
      type: Object,
      required: true
    }
  },

  computed: {
    portfolio() {
      return this.currentUser.projects
        .filter(project => project.is_public)
        .map(project => {
          let thumbnail = project.images.find(image => image.is_main);

          return {
            id: project.id,
            title: project.name,
            thumbnail: thumbnail ? thumbnail.src : null,
            description: project.description
          };
        });
    }
  }
};
</script>

<style lang="scss" scoped>
@import './../scss/variables';

.portfolio {
  font-family: $roboto;
  padding-left: 7px;
  padding-right: 7px;

  .portfolio-items {
    display: grid;
    grid-template-columns: auto;
    row-gap: 25px;

    .portfolio-item {
      padding: 15px 15px 25px;
      background: #ececec;

      .portfolio-item-thumbnail {
        width: 100%;

        .thumbnail-ratio {
          height: 0;
          width: 100%;
          position: relative;
          padding-bottom: 55.352%;

          img {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
          }
        }
      }

      .portfolio-item-title {
        font-size: 16px;
        font-weight: 700;
        line-height: 19px;
        padding-top: 15px;
      }

      .portfolio-item-description {
        padding-top: 7px;
        font-size: 12px;
        line-height: 14px;
      }
    }
  }

  @include xs {
    padding-left: 16px;
    padding-right: 16px;

    .portfolio-items {
      .portfolio-item {
        padding-left: 17px;
        padding-right: 17px;

        .portfolio-item-title {
          padding-top: 17px;
        }

        .portfolio-item-description {
          padding-top: 9px;
        }
      }
    }
  }

  @include md {
    padding: 10px 15px;

    .portfolio-items {
      max-width: 752px;
      margin: 0 auto;
      grid-template-columns: auto auto;
      column-gap: 30px;
      row-gap: 30px;

      .portfolio-item {
        margin: 0;

        .portfolio-item-title {
        }

        .portfolio-item-description {
        }
      }
    }
  }

  @include lg {
    .portfolio-items {
      max-width: 1320px;
      grid-template-columns: auto auto auto;
    }
  }

  @include xl {
    .portfolio-items {
      max-width: 1770px;
      grid-template-columns: auto auto auto auto;
    }
  }
}
</style>
