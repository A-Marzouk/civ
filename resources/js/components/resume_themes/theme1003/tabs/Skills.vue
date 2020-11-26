<template>
  <div class="skills">
    <TabLinks :currentTab="currentCategory" :tabs="categories" @skillchanged="currentCategory = $event" />

    <ItemsView :items="skills[currentCategory]" />
  </div>
</template>

<script>
import utilsMixin from '../mixins/utilsMixin';
import TabLinks from './../components/skills/TabLinks';
import ItemsView from './../components/skills/ItemsView';

export default {
  name: 'skills',

  props: {
    currentUser: {
      type: Object,
      required: true
    }
  },

  mixins: [utilsMixin],

  components: { ItemsView, TabLinks },

  data() {
    const currentCategory = this.currentUser.skills.length ? this.currentUser.skills[0].category : '';

    return {
      currentCategory: currentCategory
    };
  },

  computed: {
    categories() {
      const categories = [];
      this.currentUser.skills.forEach(skill => {
        if (categories.findIndex(category => category.name === skill.category) !== -1) return;

        categories.push({ name: skill.category, label: this.formatTitle(skill.category) });
      });

      return categories;
    },
    skills() {
      let formattedSkill = {};
      this.categories.forEach(category => {
        formattedSkill[category.name] = this.currentUser.skills
          .filter(skill => skill.is_public)
          .filter(skill => skill.category === category.name)
          .map(skill => {
            return {
              id: skill.id,
              title: this.capitalize(skill.title),
              level: skill.percentage
            };
          });
      });
      return formattedSkill;
    }
  },

  methods: {
    formatTitle(str) {
      return str
        .split('_')
        .map(substr => this.capitalize(substr))
        .join(' ');
    }
  }
};
</script>

<style lang="scss" scoped>
@import './../scss/variables';

.skills {
  padding-top: 15px;

  @include xl {
    padding-top: 25px;
  }
}
</style>
