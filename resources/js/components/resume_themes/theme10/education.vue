<template>
  <div class="education container">
    <div class="row">
      <div class="content-title col-12 col-md-4">
        <p class="job_title">{{ education.degree_title }}</p>
        <span class="date">
          <b
            >{{ (education.date_from) }} -
            {{
              education.present
                ? "Present"
                : (education.date_to)
            }}</b
          >
        </span>
      </div>
      <div class="col-12 col-md-8">
        <h4 class="company-name">{{university_name}}</h4>
        <p class="education-description">{{ education.institution_type }}</p>
      </div>
    </div>
  </div>
</template>

<script>
import moment from "moment";

export default {
  props: ["education"],
  methods: {

  }
};
</script>

<style lang="scss" scoped>
$primaryColor: #104efb;

.education {
  margin-bottom: 5rem;
  overflow-y: auto;
  color: $primaryColor;

  .job_title {
    margin-bottom: 41px;
    font-size: 20px;

    @media only screen and (max-width: 768px) {
      order: 2;
    }
  }

  @media only screen and (max-width: 768px) {
    .content-title {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
    }

    .date {
      margin-right: 10px;
    }
  }

  .company-name {
    font-weight: 700;
  }
}
</style>
