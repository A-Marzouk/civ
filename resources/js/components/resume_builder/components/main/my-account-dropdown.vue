<template>
  <div class="my-account-dropdown">
    <a
      href="#"
      class="account-avatar"
      @click.prevent="show = !show"
      :style="`background-image: url(${avatar});`"
    ></a>

    <div class="custom-drop-down" :class="{'show' :show}">
      <div class="drop-down-item" :class="{'active' : activeTabMenu === 'builder'}">
        <router-link
                id="resumeBuilder"
                data-target="resumeBuilder"
                @click.native="onItemClick('tabChanged','builder')"
                to="/resume-builder/edit"
        >CV builder</router-link>
      </div>
      <hr />

      <div class="drop-down-item" :class="{'active' : activeTabMenu === 'account'}">
        <router-link
          id="myAccount"
          data-target="myAccount"
          @click.native="onItemClick('tabChanged','account')"
          to="/resume-builder"
        >Account Settings</router-link>
      </div>
      <hr />

      <div class="drop-down-item">
        <a href="javascript:void(0)" @click="onItemClick('loggedOut')" class="sign-out">Sign Out</a>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "my-account-dropdown",

  props: {
    avatar: {
      type: String,
      default: "/images/resume_builder/profile/holder.png"
    },

    isActive: {
      type: Boolean,
      default: false
    },

    openMenu: {
      type: Boolean,
      default: false
    }
  },

  data() {
    return {
      show: false,
      activeTabMenu: '',
    };
  },

  methods: {
    onItemClick(eventName, tabName) {
      this.show = false;
      this.activeTabMenu = tabName;
      this.$emit(eventName);
    }
  },

  mounted(){
    let pathArray = window.location.pathname.split("/");
    let currentTab = "builder";
    pathArray.forEach(tab => {
      if (tab === "resume-builder") {
        currentTab = pathArray[pathArray.indexOf(tab) + 1];
      }
    });

    switch (currentTab) {
      case "edit":
        this.activeTabMenu = 'builder';
        break;
      default:
        this.activeTabMenu = 'account';
        break;
    }
  }

};
</script>

<style lang="scss" scoped>
@import "../../../../../sass/media-queries";

.my-account-dropdown {
  position: relative;

  &.active {
    &::after {
      content: "";
      display: block;
      background: #001ce2;
      position: absolute;
      bottom: -20px;
      left: 0;
      width: 100%;
      height: 5px;
      border-radius: 10px 10px 0px 0px;

      @include lt-sm {
        bottom: -24px;
      }
    }
  }

  .account-avatar {
    background-color: #e6e8fc;
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    display: block;
    width: 45px;
    height: 45px;
    overflow: hidden;
    border-radius: 100px;
  }

  .custom-drop-down {
    display: none;
    max-width:200px;
    font-family: Noto Sans, "sans-serif";
    background: white;
    white-space: nowrap;
    position: absolute;
    top: 55px;
    right: 0;
    z-index: 20;
    padding: 15px;
    border-radius: 3px;
    border: 1px solid #f4f7fa;
    box-shadow: 0 1px 4px -4px rgba(0, 0, 0, 0.32),
      0 -1px 4px -4px rgba(0, 0, 0, 0.32);

    &.show {
      display: block;
    }

    .drop-down-item {
      a {
        display: block;
        color: #a0aec0;
        font-size: 16px;
        line-height: 24px;
        padding: 15px 10px;

        &:hover {
          text-decoration: none;
          color: #0046fe;
        }
      }

      &.active {
        a{
          color: #0046fe;
        }
      }

      hr {
        background: #888db1;
      }
    }
  }

  @include gt-xs {
    .custom-drop-down {
      &.show {
        display: block;
      }
    }
  }
}
</style>
