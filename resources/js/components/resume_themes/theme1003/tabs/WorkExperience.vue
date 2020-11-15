<template>
  <div class="experience">
    <div class="experience-items">
      <ItemView
        v-for="experience in experiences"
        :title="experience.job_title"
        :subtitle="experience.company_name"
        :description="experience.description"
        :duration="experience.duration"
        :key="experience.id"
      />
    </div>
  </div>
</template>

<script>
import ItemView from '../components/education-experience/ItemView';

export default {
  name: 'WorkExperience',

  props: {
    currentUser: {
      type: Object,
      required: true
    }
  },

  components: { ItemView },

  computed: {
    experiences() {
      return this.currentUser.work_experience
        .filter(wExperience => wExperience.is_public)
        .map(wExperience => {
          wExperience.duration = `${wExperience.date_from}-`;
          wExperience.duration += wExperience.present ? 'present' : wExperience.date_to;

          return wExperience;
        });
    }
  }
};
</script>

<style lang="scss" scoped>
@import './../scss/variables';

.experience {
  font-family: $roboto;
  padding-left: 7px;
  padding-right: 7px;

  .experience-items {
    display: grid;
    grid-template-columns: 1fr;
    row-gap: 25px;
  }

  @include xs {
    padding-left: 16px;
    padding-right: 16px;
  }

  @include md {
    padding: 10px 15px;

    .experience-items {
      max-width: 752px;
      margin: 0 auto;
      column-gap: 30px;
      row-gap: 30px;
    }
  }

  @include lg {
    .experience-items {
      max-width: 1320px;
      grid-template-columns: 1fr 1fr 1fr;
    }
  }

  @include xl {
    padding-top: 25px;
    padding-bottom: 25px;

    .experience-items {
      max-width: 1770px;
      grid-template-columns: 1fr 1fr 1fr 1fr;
    }
  }
}
</style>
