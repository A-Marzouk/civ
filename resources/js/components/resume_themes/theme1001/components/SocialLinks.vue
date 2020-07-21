<template>
  <div class="social-menu" :class="{ 'social-menu--open': isOpen }">
    <div class="social-label">Follow Me On :</div>
    <div class="social_groups">
      <v-btn
        v-for="Userlink in currentUser.links"
        :key="Userlink.id + '_link'"
        v-show="Userlink.is_active && Userlink.is_public"
        :href="Userlink.link"
        target="_blank"
        class="social mx-2"
        fab
        outlined
        color="#fff"
        elevation="0"
        small
      >
        <v-icon dark>mdi-{{ Userlink.link_title.toLowerCase() }} </v-icon>
      </v-btn>
    </div>
  </div>
</template>

<script>
export default {
  name: "social-links",

  props: {
    isOpen: {
      type: Boolean,
      default: false
    },
    currentUser: {
      type: undefined,
      required: true
    }
  }
};
</script>

<style lang="scss" scoped>
@import "./../scss/variables";
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
    height: 48px;
  }
}

.social-label {
  font-size: 15px;
  white-space: nowrap;
  color: rgba(255, 255, 255, 0.67);
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
    height: 60px;
  }
}

@media (min-width: $md) {
  .social-menu.social-menu--open {
    height: 62px;
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
