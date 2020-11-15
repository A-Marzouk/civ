<template>
  <div class="experience">
    <div class="experience-items">
      <ItemView
        v-for="item in experiences"
        :title="item.title"
        :subtitle="item.subtitle"
        :description="item.description"
        :duration="item.duration"
        :key="item.id"
      />
    </div>
  </div>
</template>

<script>
import ItemView from '../components/education-experience/ItemView';

export default {
  name: 'WorkExperience',

  components: { ItemView },

  data: () => {
    return {
      experiences: [
        {
          id: 1,
          title: 'Civie - FrontEnd Developer',
          subtitle: 'London',
          description: 'Parallel to the Potsgraduate degree in computer security, I studied Digital Marketing.',
          duration: '2010-2013'
        },
        {
          id: 2,
          title: 'Civie - FrontEnd Developer',
          subtitle: 'London',
          description: 'Parallel to the Potsgraduate degree in computer security, I studied Digital Marketing.',
          duration: '2010-2013'
        }
      ]
    };
  },

  computed: {
    isLastExperience() {
      return experience => {
        if (experience.length === 0) {
          return true;
        }

        return experience.id !== this.experiences[this.experiences.length - 1].id;
      };
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
