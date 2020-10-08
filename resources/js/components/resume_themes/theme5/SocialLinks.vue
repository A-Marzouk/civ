<template>
  <div class="social-menu">
    <div class="social-label">Follow Me</div>
    <div class="social-carousel-wrapper">
      <div
        class="social-carousel--nav__left"
        @click="moveCarousel(-1)"
        v-if="currentUser.links.length > 5"
        :disabled="atHeadOfList"
      >
        <v-icon color="#5F45FF" large>mdi-chevron-left</v-icon>
      </div>
      <div class="social-carousel">
        <div class="social-carousel--overflow-container">
          <div
            class="social-carousel-group"
            :style="{
              transform: 'translateX' + '(' + currentOffset + 'px' + ')',
            }"
            ref="track"
          >
            <v-btn
              href="javascript:void(0)"
              @click="goToExternalLink(userLink.link)"
              v-for="userLink in currentUser.links"
              :key="userLink.id + '_link'"
              target="_blank"
              class="mx-1"
              color="#E6E8FC"
              style="
                width: 40px;
                min-width: 40px;
                height: 40px;
                box-shadow: rgba(81, 91, 212, 0.4) 0px 10px 30px -8px;
              "
              v-show="userLink.is_active && userLink.is_public"
            >
              <v-img
                contain
                width="18"
                height="18"
                :src="`/images/resume_themes/theme5/social_icons/${userLink.link_title.toLowerCase()}.svg`"
                alt="social-icon"
              ></v-img>
            </v-btn>
          </div>
        </div>
      </div>

      <div
        class="social-carousel--nav__right"
        @click="moveCarousel(1)"
        v-if="currentUser.links.length > 5"
        :disabled="atEndOfList"
      >
        <v-icon color="#5F45FF" large>mdi-chevron-right</v-icon>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "social-links",

  props: {
    currentUser: {
      type: undefined,
      required: true,
    },
  },
  data() {
    return {
      currentOffset: 0,
      windowSize: 3,
      paginationFactor: 60,
      dragDistance: 0,
      dragStartX: 0,
      dragStartY: 0,
      isMouseDown: false,
    };
  },
  computed: {
    atEndOfList() {
      return (
        this.currentOffset <=
        this.paginationFactor *
          -1 *
          (this.currentUser.links.length - this.windowSize)
      );
    },
    atHeadOfList() {
      return this.currentOffset === 0;
    },
  },

  methods: {
    goToExternalLink(link) {
      if (!link.includes("http")) {
        link = "http://" + link;
      }
      window.location.href = link;
    },
    moveCarousel(direction) {
      // Find a more elegant way to express the :style. consider using props to make it truly generic
      if (direction === 1 && !this.atEndOfList) {
        this.currentOffset -= this.paginationFactor;
      } else if (direction === -1 && !this.atHeadOfList) {
        this.currentOffset += this.paginationFactor;
      }
    },
    handleMouseMove(e) {
      let positionX;
      let positionY;
      if (e.type.indexOf("touch") !== -1) {
        positionX = e.touches[0].clientX;
        positionY = e.touches[0].clientY;
      }

      let dragDistanceX = Math.abs(positionX - this.dragStartX);
      let dragDistanceY = Math.abs(positionY - this.dragStartY);
      if (dragDistanceX > 3 * dragDistanceY) {
        console.log(positionX);
        this.currentOffset = positionX - this.dragStartX;
      }
    },
    handleMouseDown(e) {
      this.isMouseDown = true;

      if (e.type.indexOf("touch") !== -1) {
        this.dragStartX = e.touches[0].clientX;
        this.dragStartY = e.touches[0].clientY;
      }
    },

    handleMouseUp() {
      this.isMouseDown = false;
    },
  },
  mounted() {
    // Mouse and touch events
    this.$refs.track.addEventListener("touchstart", this.handleMouseDown);
    this.$refs.track.addEventListener("touchend", this.handleMouseUp);
    this.$refs.track.addEventListener("touchmove", this.handleMouseMove);
  },
  beforeDestroy() {
    // Mouse and touch events
    this.$refs.track.removeEventListener("touchstart", this.handleMouseDown);
    this.$refs.track.removeEventListener("touchend", this.handleMouseUp);
    this.$refs.track.removeEventListener("touchmove", this.handleMouseMove);
  },
};
</script>

<style lang="scss" scoped>
@import "./scss/variables";

//social_carousel
.social-carousel-wrapper {
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 5px 0 5px;
}
.social-carousel {
  display: flex;
  justify-content: center;
  width: 190px;

  &--overflow-container {
    overflow: hidden;
  }

  &--nav__left,
  &--nav__right {
    display: inline-block;

    cursor: pointer;

    transition: transform 150ms linear;
    &[disabled] {
      opacity: 0.2;
    }
  }
}

.social-carousel-group {
  display: flex;
  transition: transform 150ms ease-out;
  transform: translatex(0px);

  .social-carousel--btn {
    &:first-child {
      margin-left: 0;
    }

    &:last-child {
      margin-right: 0;
    }
  }
}

//social_carousel

.social {
  background: transparent;
  border: 2px solid #fff;
  box-sizing: border-box;
  border-radius: 50px;

  .icon {
    height: 24px;
    width: 24px;
    fill: #fff;
  }
}
.social-menu {
  display: block;
  align-items: center;
  justify-content: center;
  overflow: hidden;
  width: 100%;

  text-align: center;
  border-top: 0px solid #d3d6e4;
  transition: all 0.3s;

  &.social-menu--open {
    border-top-width: 1px;
    height: auto;
    padding: 5px 0px;
    .v-btn--fab.v-size--small {
      height: 40px;
      width: 40px;
      margin: 5px;
    }
  }
}

.social-label {
  font-size: 15px;
  white-space: nowrap;
  color: rgba(0, 0, 0, 0.87);
}
.social_groups {
  max-width: 260px;
}
.social-links {
  display: flex;
  padding-left: 10px;
}

.social-links a {
  display: block;
  border: 2px solid #d3d6e4;
  border-radius: 100px;
  width: 30px;
  transition: background 0.3s;
}

.social-links a:hover {
  background: transparent;
}

@media (min-width: $sm) {
  .social-menu.social-menu--open {
    height: auto;
    padding: 5px 0px;
  }
}

@media (min-width: $md) {
  .social-menu.social-menu--open {
    height: auto;
    padding: 5px 0px;
  }
  .v-btn--fab.v-size--small {
    height: 40px;
    width: 40px;
    margin: 5px;
  }
}

@media (min-width: $lg) {
  .social-menu {
    width: auto;
    height: auto;
  }

  .social-menu.social-menu--open {
    height: auto;
    border-top-width: 0;
  }

  .toggle-social-menu {
    display: none;
  }

  .social-label {
    font-size: 12px;
  }
}

@media (min-width: 1600px) {
  .social-label {
    font-size: 18px;
  }
}
</style>
