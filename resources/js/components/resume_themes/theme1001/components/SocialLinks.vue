<template>
  <div class="social-menu" :class="{ 'social-menu--open': isOpen }">
    <div class="social-label">Follow Me On :</div>
    <div class="social_groups">
      <v-btn
        v-for="userLink in currentUser.links"
        :key="userLink.id + '_link'"
        v-show="userLink.is_active || userLink.is_public"
        href="javascript:void(0)"
        @click="goToExternalLink(userLink.link)"
        target="_blank"
        class="social mx-2"
        fab
        outlined
        color="#fff"
        elevation="0"
        small
      >
        <v-img
          width="18"
          height="18"
          contain
          :src="`/images/resume_themes/theme1001/social_icons/${userLink.link_title.toLowerCase()}.svg`"
        ></v-img>
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
      default: false,
    },
    currentUser: {
      type: undefined,
      required: true,
    },
  },

  methods:{
    goToExternalLink(link){
      if(!link.includes('http')){
        link = 'http://' + link ;
      }
      window.location.href = link ;
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
    padding: 15px 10px;
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
