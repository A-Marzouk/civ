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

        <router-link
          id="viewCV"
          class="nav-action"
          :class="{'active' : activeTab === 'viewCV'}"
          data-target="viewCV"
          v-on:click.native="setActiveTab('viewCV')"
          to="/resume-builder/view"
        >
          <svg
            width="23"
            height="23"
            viewBox="0 0 23 23"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <g clip-path="url(#clip0)">
              <path
                d="M4.9 8.78711C3.52789 8.78711 2.41162 9.90338 2.41162 11.2755C2.41162 12.6476 3.52789 13.7639 4.9 13.7639C6.2721 13.7639 7.38837 12.6476 7.38837 11.2755C7.38837 9.90338 6.2721 8.78711 4.9 8.78711ZM4.9 12.411C4.2739 12.411 3.76447 11.9016 3.76447 11.2755C3.76447 10.6493 4.2739 10.14 4.9 10.14C5.52609 10.14 6.03552 10.6493 6.03552 11.2755C6.03552 11.9016 5.52609 12.411 4.9 12.411Z"
                fill="#888DB1"
              />
              <path
                d="M9.3062 14.6646C7.93414 14.6646 6.81787 15.7808 6.81787 17.1529C6.81787 18.525 7.93414 19.6413 9.3062 19.6413C10.6783 19.6413 11.7946 18.525 11.7946 17.1529C11.7946 15.7808 10.6783 14.6646 9.3062 14.6646ZM9.3062 18.2884C8.6801 18.2884 8.17072 17.779 8.17072 17.1529C8.17072 16.5267 8.6801 16.0174 9.3062 16.0174C9.93234 16.0174 10.4417 16.5267 10.4417 17.1529C10.4418 17.779 9.93234 18.2884 9.3062 18.2884Z"
                fill="#888DB1"
              />
              <path
                d="M22.3768 14.6428C22.3723 14.6384 22.3678 14.6341 22.3633 14.6298L20.021 12.4195C21.3322 11.428 21.9245 9.67311 21.3858 8.04968C18.8464 0.388285 9.08826 -2.04232 3.27382 3.68428C-1.0809 7.97319 -1.04026 14.8887 3.09144 19.1472C6.80323 22.9729 12.6519 23.5102 16.9686 20.6846C18.9901 19.3618 18.0607 16.213 15.6418 16.213C13.8351 16.213 13.5315 13.687 15.2381 13.2545L19.3647 17.6278C19.369 17.6324 19.3734 17.6369 19.3778 17.6414C20.2051 18.4705 21.5488 18.4727 22.3782 17.6432C23.2075 16.814 23.2075 15.4717 22.3768 14.6428ZM13.6367 16.7672C14.1802 17.2822 14.8922 17.5658 15.6418 17.5658C16.7222 17.5658 17.1295 18.9626 16.2278 19.5527C12.4497 22.0258 7.31843 21.5612 4.0624 18.2052C0.410451 14.4412 0.431962 8.40058 4.2381 4.65672C9.33837 -0.360072 17.8689 1.73879 20.1017 8.47549C20.4801 9.61571 20.0073 10.8547 19.0157 11.4709L15.2584 7.9253C15.4859 6.83311 15.1708 5.68171 14.3453 4.85628C13.3093 3.8202 10.0454 3.30378 8.63092 3.15013C8.2019 3.10341 7.83864 3.46609 7.88532 3.89574C8.04023 5.31574 8.55362 8.57223 9.59151 9.61016C10.4175 10.4361 11.5695 10.7505 12.6608 10.5231L14.2435 12.2004C12.5582 13.1153 12.216 15.4208 13.6367 16.7672ZM10.5481 8.65354C10.0383 8.1438 9.5829 6.20508 9.34243 4.60721C10.9403 4.84762 12.8791 5.30311 13.3888 5.81286C14.1737 6.59774 14.1738 7.86843 13.3888 8.65354C12.6056 9.43676 11.3347 9.44014 10.5481 8.65354ZM21.4217 16.6867C21.1236 16.9848 20.6411 16.9861 20.3413 16.6915C19.995 16.3245 14.2855 10.2737 13.9674 9.93658C14.2343 9.73837 14.4735 9.49917 14.672 9.23201L21.4269 15.6063C21.7218 15.9065 21.7202 16.3881 21.4217 16.6867Z"
                fill="#888DB1"
              />
            </g>
            <defs>
              <clipPath id="clip0">
                <rect width="23" height="23" fill="white" />
              </clipPath>
            </defs>
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
        max-width: 230px;
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
