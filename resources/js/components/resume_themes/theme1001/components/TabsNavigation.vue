<template>
  <nav class="tabs-navigation">
    <div class="tabs-navigation-inner">
      <div class="navigation-wrapper">
        <ul class="navigation">
          <li v-for="tab in currentUser.tabs" v-if="!excludedTabs.includes(tab.title)" v-show="tab.is_public" :key="tab.id"
            class="navigation__link"
            :class="[
              { active: builderCurrentTabTitle === tab.title},
            ]"
          >
            <a href="#" @click.prevent="$emit('tab-changed', tab.title)"
              >{{tab.label}}</a
            >
          </li>
        </ul>

        <a href="#" class="toggle-social-links" @click="isOpen = !isOpen">
          <svg
            class="toggle__icon--close"
            :class="{ 'toggle__icon--hide': !isOpen }"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 20 20"
          >
            <path
              d="M10 8.586L2.929 1.515 1.515 2.929 8.586 10l-7.071 7.071 1.414 1.414L10 11.414l7.071 7.071 1.414-1.414L11.414 10l7.071-7.071-1.414-1.414L10 8.586z"
            />
          </svg>
          <svg
            class="toggle__icon--open"
            :class="{ 'toggle__icon--hide': isOpen }"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 20 20"
          >
            <path
              d="M10 12a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0-6a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 12a2 2 0 1 1 0-4 2 2 0 0 1 0 4z"
            />
          </svg>
        </a>
      </div>

      <SocialLinks :isOpen="isOpen" :currentUser="currentUser" />
    </div>
  </nav>
</template>

<script>
import SocialLinks from "./SocialLinks";

export default {
  name: "tabs-navigation",

  props: {
    currentUser: {
      type: undefined,
      required: true,
    },
    builderCurrentTabTitle:{
      type: undefined,
    }
  },
  methods:{

  },

  components: { SocialLinks },

  data: () => {
    return {
      isOpen: false,
      excludedTabs:[
        'structure',
        'imports',
        'manager',
        'themes',
        'links',
        'pay_availability',
        'profile', // main tab | can not be hidden
      ]
    };
  },
  watch: {

  },
};
</script>

<style lang="scss" scoped>
@import "./../scss/variables";

.tabs-navigation {
  background: #3d5ed4;
}

.tabs-navigation-inner {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  width: 100%;
}

.navigation-wrapper {
  position: relative;
  flex: 1;
  display: flex;
  height: 48px;
  justify-content: space-between;
  align-items: center;
  width: 100%;
}

.navigation {
  overflow-x: scroll;
  display: flex;
  flex: 1;
  align-items: center;
  height: 100%;
  width: 90%;
  list-style: none;
  padding: 0 25px;
  margin: 0;
}

.navigation::-webkit-scrollbar {
  display: none;
  -webkit-appearance: none;
  scrollbar-width: none;
  height: 0;
}

.navigation__link {
  white-space: nowrap;
  color: rgba(255, 255, 255, 0.67);
  height: 100%;
  padding: 0 10px;
}

.navigation__link a {
  display: flex;
  font-size: 15px;
  align-items: center;
  height: 100%;
  padding: 0 10px;
  transition: all 0.3s ease-in;

  &:hover {
    color: #ffffff;
    text-decoration: none;
  }
}

.navigation__link.active a {
  color: #ffffff;
  font-weight: 700;
}

.toggle-social-links {
  height: 48px;
  width: 48px;
  display: flex;
  align-items: center;
  justify-content: center;
  color: #ffffff;
}

.toggle-social-links svg {
  fill: currentColor;
  opacity: 1;
  transition: opacity 0.3s;

  &.toggle__icon--open {
    height: 20px;
    width: 20px;
  }

  &.toggle__icon--close {
    height: 18px;
    width: 18px;
  }

  &.toggle__icon--hide {
    opacity: 0;
    height: 0;
    width: 0;
  }
}

@media (min-width: $sm) {
  .navigation-wrapper {
    height: 60px;
  }

  .toggle-social-links {
    height: 60px;
    width: 60px;
  }
}

@media (min-width: $md) {
  .navigation-wrapper {
    height: 62px;
  }

  .navigation__link a {
    position: relative;
    padding: 0 15px;

    &::after {
      content: "";
      background: #ffffff;
      opacity: 0;
      border-radius: 100px;
      position: absolute;
      bottom: 0;
      height: 4px;
      left: 0;
      right: 0;
      transition: opacity 0.3s;
    }
  }

  .navigation__link.active a::after {
    opacity: 1;
  }

  .toggle-social-links {
    height: 62px;
    width: 62px;
  }
}

@media (min-width: $lg) {
  .tabs-navigation {
    display: flex;
    padding-left: 25px;
  }

  .navigation {
    padding: 0;
  }

  .tabs-navigation-inner {
    max-width: $lg;
    margin: 0 auto;
  }

  .navigation__link {
    padding-left: 10px; //adjusted 20px
    padding-right: 10px; //adjusted 20px

    &:last-child {
      padding-right: unset;
    }
  }

  .navigation__link a {
    font-size: 12px;
  }

  .toggle-social-links {
    display: none;
  }
}

@media (min-width: 1600px) {
  .tabs-navigation {
    padding-right: 25px;
  }

  .tabs-navigation-inner {
    max-width: 1600px;
  }

  .navigation-wrapper {
    height: 75px;
  }

  .navigation__link {
    // padding: 0 30px;
  }

  .navigation__link a {
    font-size: 18px;
  }
}

@media (min-width: $xl) {
  .tabs-navigation-inner {
    max-width: $xl;
  }
}
</style>
