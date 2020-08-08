<template>
  <div
    class="profile-detail"
    :class="{ 'active-indicator': currentTab === 'profile' }"
  >
    <h3 class="title" v-text="currentUser.personal_info.full_name"></h3>
    <h4 class="sub-title" v-text="currentUser.personal_info.designation"></h4>

    <ProfileHireMe
      v-if="currentUser.payment_info && currentUser.availability_info"
      :hourly-rate="currentUser.payment_info[0].salary"
      :weekly-availability="currentUser.availability_info[0].available_hours"
    />
  </div>
</template>

<script>
import ProfileHireMe from "./ProfileHireMe";

export default {
  name: "profile-detail",

  props: {
    currentUser: {
      type: undefined,
      required: true
    },
    currentTab:{
      type:undefined
    }
  },

  components: { ProfileHireMe }
};
</script>

<style lang="scss" scoped>
@import "./../../scss/variables";

.profile-detail {
  flex: 1;
  font-family: inherit;
  padding-left: 12px;
}

.title {
  font-family: inherit;
  font-size: 16px;
  line-height: 21px;
  font-weight: 700;
}

.sub-title {
  font-family: inherit;
  font-size: 13px;
  line-height: 20px;
  color: #ffffff;
}

@media (min-width: $sm) {
  .title {
    font-size: 18px;
    line-height: 24px;
  }

  .sub-title {
    font-size: 12px;
    line-height: 21px;
  }
}

@media (min-width: $md) {
  .profile-detail {
    padding-left: 30px;
  }

  .title {
    font-size: 20px;
    line-height: 34px;
  }

  .sub-title {
    color: #d3d6e4;
    font-size: 16px;
    line-height: 21px;
  }
}

@media (min-width: 1600px) {
  .title {
    font-size: 26px;
    line-height: 42px;
  }

  .sub-title {
    padding-top: 5px;
    font-size: 20px;
    line-height: 36px;
  }
}
</style>
