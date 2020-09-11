<template>
  <v-app style="max-height: 50px;">
    <div class="switch custom-switch mr-xl-5 mr-lg-5 mr-md-5 mr-sm-5 mr-5" v-if="userTabs">
      <div class="switch-text">ON/OFF</div>
      <template v-for="tab in userTabs">
        <v-switch
          :ripple="false"
          :key="tab.id"
          v-if="tab.title === currentTabTitle"
          v-model="tab.is_public"
          @change="toggleTab(tab)"
          color="#001CE2"
        ></v-switch>
      </template>
    </div>
  </v-app>
</template>

<script>
export default {
  name: "TabSwitcher",
  props: ["currentTabTitle"],
  data() {
    return {};
  },
  methods: {
    toggleTab(tab) {
      axios.put("/api/user/tabs/toggle-tab", tab).then((response) => {
        console.log(response.data);
        this.$store.dispatch("flyingNotification");
      });
    },
  },
  computed: {
    userTabs() {
      return this.$store.state.user.tabs;
    },
  },
};
</script>

<style scoped lang="scss">
@import "../../../../../../sass/media-queries";

.switch {
  display: flex;
  align-items: baseline;
  margin-top: -3px;
  margin-right: 10px;

  .switch-text {
    margin-right: 10px;
    font-size: 18px;
    color: #888db1;
  }

  @include lt-sm {
    .v-input--selection-controls.v-input--switch {
      margin-top: 0 !important;
      padding-top: 0 !important;
      .v-input__control {
        height: 28px !important;
        .v-input__slot {
          margin-bottom: 0 !important;
        }
      }
    }
  }
}
</style>

<style lang="scss">
.custom-switch {
  .v-input--switch__track {
    border-radius: 15px !important;
    opacity: 0.1;
    width: 46px;
    height: 24px;
    left: -5px;
    top: calc(50% - 14px) !important;
  }
  .v-input--switch__thumb {
    height: 16px;
    width: 16px;
  }
}
</style>
