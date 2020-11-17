<template>
  <div class="tab-links">
    <TabLink
      v-for="(tab, index) in tabs"
      :tab="tab"
      :isActive="currentTab === tab.name"
      @click="$emit('skillchanged', $event)"
      :key="index"
    />
  </div>
</template>

<script>
import TabLink from './TabLink';

export default {
  name: 'tab-links',

  props: {
    currentTab: {
      type: String,
      required: true
    },
    tabs: { type: Array }
  },

  components: { TabLink },

  methods: {
    isLinkActive(label) {
      return label.toLowerCase() == this.currentTab.toLowerCase();
    }
  }
};
</script>

<style lang="scss" scoped>
@import './../../scss/variables';

.tab-links {
  display: flex;
  overflow-y: hidden;
  padding-left: 16px;
  padding-right: 16px;

  &::-webkit-scrollbar {
    height: 0;
  }

  @include md {
    margin-left: auto;
    margin-right: auto;
    max-width: 752px;
  }

  @include lg {
    max-width: 1320px;
  }

  @include xl {
    max-width: 1770px;
  }
}
</style>
