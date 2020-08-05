<template>
  <nav class="resume-builder-nav" :class="{'collapsed': !openMenu}">
    <div class="builder-nav-container">
      <div class="builder-nav-logo-wrapper">
        <a href="/resume-builder" class="brand-link">
          <img class="brand-image" src="/images/logo_new.png" alt="123workforce icon" />
        </a>

        <a v-if="openMenu" href="#" @click.prevent="$emit('onClose')" class="builder-nav-toggle">
          <svg
            width="16"
            height="16"
            viewBox="0 0 16 16"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M13.7985 2.94662L3.19189 13.5532"
              stroke="#001CE2"
              stroke-width="3"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
            <path
              d="M13.6066 13.6066L3 3"
              stroke="#001CE2"
              stroke-width="3"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
          </svg>
        </a>
        <a v-else href="#" @click.prevent="$emit('onOpen')" class="builder-nav-toggle">
          <svg
            width="19"
            height="16"
            viewBox="0 0 19 16"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M17 14H2"
              stroke="#001CE2"
              stroke-width="3"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
            <path
              d="M17 8H2"
              stroke="#001CE2"
              stroke-width="3"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
            <path
              d="M17 2H2"
              stroke="#001CE2"
              stroke-width="3"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
          </svg>
        </a>
      </div>

      <div class="builder-nav-actions" :class="{'collapsed': !openMenu}">
        <router-link
          id="editCV"
          class="nav-action"
          :class="{'active' : activeTab === 'editCV'}"
          data-target="editCV"
          v-on:click.native="setActiveTab('editCV')"
          to="/resume-builder/edit"
        >
          <svg
            width="18"
            height="18"
            viewBox="0 0 20 20"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M18.4584 12.5631C18.1833 12.5631 17.9603 12.786 17.9603 13.0611V17.4836C17.9593 18.3085 17.291 18.9768 16.4661 18.9778H2.49041C1.66546 18.9768 0.997135 18.3085 0.996162 17.4836V4.50408C0.997135 3.67932 1.66546 3.01081 2.49041 3.00983H6.91282C7.18793 3.00983 7.4109 2.78686 7.4109 2.51175C7.4109 2.23664 7.18793 2.01367 6.91282 2.01367H2.49041C1.11562 2.01523 0.0015565 3.1293 0 4.50408V17.4836C0.0015565 18.8583 1.11562 19.9724 2.49041 19.974H16.4661C17.8408 19.9724 18.9549 18.8583 18.9565 17.4836V13.0611C18.9565 12.786 18.7335 12.5631 18.4584 12.5631Z"
              fill="#888DB1"
            />
            <path
              d="M18.7593 0.732143C17.8832 -0.141834 16.4652 -0.141834 15.5893 0.732143L6.70303 9.61841C6.64232 9.67931 6.59816 9.7548 6.5752 9.83749L5.40685 14.0558C5.35879 14.2288 5.40763 14.414 5.53448 14.541C5.66153 14.6679 5.84675 14.7167 6.01972 14.6689L10.238 13.5003C10.3209 13.4774 10.3966 13.4332 10.4575 13.3723L10.4857 13.3439L19.3434 4.48623C20.2187 3.61109 20.2187 2.19214 19.3434 1.317L18.7593 0.732143ZM7.31959 10.8825L9.19304 12.7561L6.60146 13.4741L7.31959 10.8825ZM10.1338 12.9921V12.9917L10.4585 13.3165L10.1338 12.9921ZM10.1338 12.2878L7.7881 9.94217L15.0609 2.66941L17.4063 5.01467L10.1338 12.2878ZM18.6391 3.78192L18.1106 4.31035L15.7654 1.96489L16.2938 1.43646C16.7802 0.951026 17.568 0.951026 18.0546 1.43646L18.6391 2.02151C19.1255 2.50753 19.1255 3.2959 18.6391 3.78192Z"
              fill="#888DB1"
            />
          </svg>
        </router-link>

        <my-account-dropdown
          :avatar="personalInfo ? personalInfo.profile_pic : null"
          :isActive="activeTab === 'myAccount'"
          :openMenu="openMenu"
          @loggedOut="logout"
          @tabChanged="setActiveTab('myAccount')"
        />
      </div>
    </div>
  </nav>
</template>

<script>
// import { moveTabsHelper } from "./../../helpers/tab-animations";
import myAccountDropdown from "./my-account-dropdown";

export default {
  name: "resume-builder-nav",

  props: {
    openMenu: {
      type: Boolean,
      default: false
    },

    activeTab: {
      type: String,
      default: ""
    }
  },

  components: {
    "my-account-dropdown": myAccountDropdown
  },

  computed: {
    personalInfo() {
      return this.$store.state.user.personal_info;
    }
  },

  methods: {
    setActiveTab(activeTab) {
      this.$emit("onClose");
      this.$emit("onChange", activeTab);
    },

    logout() {
      axios.post("/logout").then(response => {
        Vue.$cookies.remove("access_token");
        window.location.href = "/";
      });
    }
  }
};
</script>

<style lang="scss" scoped>
@import "../../../../../sass/media-queries";

$resume-builder-nav-height: 90px;

.resume-builder-nav {
  position: fixed;
  left: 0;
  top: 0;
  width: 100%;
  background: #fff;
  box-shadow: 0px 0px 50px rgba(0, 19, 156, 0.05) !important;
  z-index: 10;
  padding-bottom: $resume-builder-nav-height;
  transition: all 0.3s;

  &.collapsed {
    padding-bottom: 0;
  }

  .builder-nav-container {
    position: relative;
    width: 100%;
    height: $resume-builder-nav-height;
    box-shadow: 0px 0px 50px rgba(0, 19, 156, 0.05) !important;
    @media screen and (min-width: 1280px) {
      max-width: 100% !important;
    }

    .builder-nav-logo-wrapper {
      position: absolute;
      left: 0;
      bottom: 0;
      width: 100%;
      height: 100%;
      padding: 24px 20px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      background: white;
      z-index: 10;

      .brand-link {
        height: 52px;

        .brand-image {
          height: 100%;
        }
      }
    }

    .builder-nav-actions {
      background: transparent;
      position: absolute;
      right: 0;
      bottom: 0;
      width: 100%;
      height: 100%;
      padding-left: 10px;
      padding-right: 10px;
      display: flex;
      align-items: center;
      justify-content: space-around;
      margin-bottom: -$resume-builder-nav-height;
      transition: all 0.3s;
      margin-top: 2px;
      @media screen and (max-width: 599px){
        margin-bottom: -88px;
      }

      &.collapsed {
        margin-bottom: 10px;
        .nav-action {
          &.active {
            &::after {
              bottom: -20px;
            }
          }
        }
      }

      .nav-action {
        display: flex;
        align-items: center;
        justify-content: center;
        background: #e6e8fc;
        width: 45px;
        height: 45px;
        border-radius: 100px;

        &.active {
          position: relative;
          background: #001ce2;

          &::after {
            content: "";
            display: block;
            background: #001ce2;
            position: absolute;
            bottom: -24px;
            left: 0;
            width: 100%;
            height: 5px;
            border-radius: 10px 10px 0px 0px;
          }

          svg {
            [fill] {
              fill: #ffffff;
            }

            [stroke] {
              stroke: #ffffff;
            }
          }
        }
      }
    }

    .builder-nav-toggle {
      display: flex;
      align-items: center;
      justify-content: center;
      height: 24px;
      width: 24px;
    }
  }

  @include gt-xs {
    position: static;

    .builder-nav-container {
      display: flex;
      max-width: 1024px;
      margin-left: auto;
      margin-right: auto;

      .builder-nav-logo-wrapper {
        position: static;
        width: auto;
        padding: 0;
        margin-left: 30px;
        margin-right: auto;
      }

      .builder-nav-actions,
      .builder-nav-actions .collapsed {
        position: static;
        margin-right: 30px;
        margin-left: auto;
        max-width: 160px;
      }

      .builder-nav-toggle {
        display: none;
      }
    }
  }

  @include gt-md {
    .builder-nav-container {
      max-width: #{$screen-lg-min};
    }
  }

  @include gt-lg {
    .builder-nav-container {
      max-width: #{$screen-xl-min};
    }
  }
}
</style>
