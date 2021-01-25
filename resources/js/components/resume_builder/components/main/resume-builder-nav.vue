<template>
  <nav class="resume-builder-nav">
    <div class="builder-nav-container">
      <div class="builder-nav-logo-wrapper">
        <sidebar :activeTab="editActiveTab" class="sidebar-component" @onChange="editActiveTab=$event"/>

        <a href="/resume-builder" class="brand-link">
          <img class="brand-image" src="/images/logo_new.png" alt="civ.ie icon" />
        </a>
      </div>

      <div class="builder-nav-actions">
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
import sidebar from "../edit-tabs/sidebar";

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

  data(){
    return{
      editActiveTab: "profile",
      editMenuOn: false
    }
  },

  components: {
    "my-account-dropdown": myAccountDropdown,
    sidebar: sidebar,
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

    toggleMenu(){
      this.editMenuOn = ! this.editMenuOn;
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
      display: flex;
      align-items: center;
      justify-content: space-between;
      background: white;
      z-index: 10;


      @media screen and (max-width: 550px) {
        justify-content: flex-start;
      }

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
      right: 20px;
      bottom: 0;
      height: 100%;
      padding-left: 10px;
      display: flex;
      align-items: center;
      justify-content: flex-end;
      margin-bottom: 0;
      transition: all 0.3s;
      z-index: 999;
      margin-top: 2px;

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
        margin-left: 20px;
        @media screen and (max-width: 920px) {
          margin-left: 10px;
        }
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
