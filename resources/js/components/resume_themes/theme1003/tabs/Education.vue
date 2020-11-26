<template>
  <div class="education">
    <div class="education-items">
      <ItemView
        v-for="edu in education"
        :title="edu.degree_title"
        :subtitle="edu.university_name"
        :description="edu.institution_type"
        :duration="edu.duration"
        :key="edu.id"
      />
    </div>
  </div>
</template>

<script>
import ItemView from '../components/education-experience/ItemView';

export default {
  name: 'education',

  props: {
    currentUser: {
      type: Object,
      required: true
    }
  },

  components: { ItemView },

  computed: {
    education() {
      return this.currentUser.education
        .filter(edu => edu.is_public)
        .map(edu => {
          edu.duration = `${edu.date_from}-`;
          edu.duration += edu.present ? 'present' : edu.date_to;

          return edu;
        });
    }
  }
};
</script>

<style lang="scss" scoped>
@import './../scss/variables';

.education {
  font-family: $roboto;
  padding-left: 7px;
  padding-right: 7px;

  .education-items {
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

    .education-items {
      max-width: 752px;
      margin: 0 auto;
      column-gap: 30px;
      row-gap: 30px;
    }
  }

  @include lg {
    .education-items {
      max-width: 1320px;
      grid-template-columns: 1fr 1fr 1fr;
    }
  }

  @include xl {
    padding-top: 25px;
    padding-bottom: 25px;

    .education-items {
      max-width: 1770px;
      grid-template-columns: 1fr 1fr 1fr 1fr;
    }
  }
}
</style>
