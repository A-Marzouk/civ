<template>
  <div class="social-menu" :class="{ 'social-menu--open': isOpen }">
    <div class="social-label">Follow Me On :</div>
    <IconCarousel
      :currentUser="currentUser"
      themeNumber="theme1001"
      btnWidth="40"
      btnHeight="40"
      iconWidth="22"
      iconHeight="22"
      border="2px solid #d3d6e4"
      borderRadius="100"
    ></IconCarousel>
  </div>
</template>

<script>
import IconCarousel from "./../../reusable/IconCarousel";
export default {
  name: "social-links",
  components: {
    IconCarousel,
  },

  props: {
    isOpen: {
      type: Boolean,
      default: false,
    },
    currentUser: {
      type: undefined,
      required: true,
    },
  },
};
</script>

<style lang="scss" scoped>
@import "./../scss/variables";

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
  width: 220px;

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
  display: flex;
  align-items: center;
  justify-content: center;
  overflow: hidden;
  width: 100%;
  height: 0;
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
  color: rgba(255, 255, 255, 0.67);
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
