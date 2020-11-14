<template>
  <div class="social-links" :class="`--${screen}`">
    <button v-if="activeLinks.length > maxVisible" class="social-links__prev-btn" @click="prevLinks">
      <v-icon :light="true" size="32" color="white">
        mdi-chevron-left
      </v-icon>
    </button>
    <div class="social-links__wrapper">
      <a
        v-for="userLink in visibleLinks"
        :key="`${userLink.id}_link`"
        class="social-links__link"
        :href="userLink.link"
        target="_blank"
      >
        <img :src="iconSrc(userLink.link_title)" alt="social icon" />
      </a>
    </div>
    <button v-if="activeLinks.length > maxVisible" class="social-links__next-btn" @click="nextLinks">
      <v-icon :light="true" size="32" color="white">
        mdi-chevron-right
      </v-icon>
    </button>
  </div>
</template>

<script>
export default {
  name: 'SocialLinks',
  props: {
    links: { type: Array },
    screen: {
      type: String,
      validator: value => ['desktop', 'mobile'].includes(value)
    }
  },
  data() {
    const maxVisible = 4;

    return {
      maxVisible: maxVisible,
      activeRange: { from: 0, to: maxVisible }
    };
  },
  computed: {
    activeLinks() {
      return this.links.filter(l => l.is_active && l.is_public);
    },
    visibleLinks() {
      return this.activeLinks.slice(this.activeRange.from, this.activeRange.to);
    }
  },
  methods: {
    prevLinks() {
      // [\1, 2, 3, 4\, 5, 6, 7]
      if (this.activeRange.from <= 0) return;

      this.activeRange.to--;
      this.activeRange.from--;
    },
    nextLinks() {
      if (this.activeRange.to >= this.activeLinks.length) return;

      this.activeRange.to++;
      this.activeRange.from++;
    },
    iconSrc(title = null) {
      let src = '/images/resume_themes/theme8/social_icons/';
      src += title ? `${title.toLowerCase()}.webp` : 'social_icon.webp';
      return src;
    }
  }
};
</script>

<style lang="scss" scoped>
.social-links {
  display: flex;
  align-items: center;
  justify-content: center;
  margin-top: 20px;

  &.--desktop {
    display: none;
  }

  .social-links__wrapper {
    display: flex;
    align-items: center;
    padding: 0 14px;
  }

  .social-links__prev-btn,
  .social-links__next-btn {
    &:focus {
      outline: none;
    }
  }

  .social-links__link {
    margin-right: 30px;

    &:last-child {
      margin-right: unset;
    }

    img {
      width: 30px;
      height: auto;
      @media screen and (max-width: 500px) {
        width: 24px;
      }
    }

    @media screen and (max-width: 500px) {
      margin-right: 20px;
    }
  }

  @media screen and (min-width: 425px) {
  }

  @media screen and (min-width: 768px) {
    margin-top: unset;

    &.--mobile {
      display: none;
    }

    &.--desktop {
      display: flex;
    }
  }
}
</style>
