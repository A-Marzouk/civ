<template>
  <v-container style="max-width: 1785px;">
    <v-row wrap class="justify-content-between">
      <v-col cols="12" md="5"  class="tablet-mobile-flex mt-5" v-for="(education,index) in educations" :key="index + '_education'">
        <v-card flat>
          <v-card-title>
            <h1 class="custom-h1">{{education.university_name}}</h1>
          </v-card-title>
          <v-card-text>
            <div class="my-4 subtitle-1">{{education.degree_title}},  {{education.date_from}} - {{education.present ? "present" : education.date_to}}</div>
            <div>
              {{education.institution_type}}
            </div>
          </v-card-text>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
export default {
  name: "Education",
  data: () => ({
  }),
  computed: {
    educations() {
      return this.$store.state.themeUser.education;
    }
  },
};
</script>

<style scoped lang="scss">
.custom-h1 {
  font-style: normal;
  font-weight: normal;
  font-size: 1.5rem;
  line-height: 44px;
  /* identical to box height */

  color: #1d1d1d;
}

.subtitle-1 {
  font-size: 12px;
}




@media screen and (min-width: 960px) and (max-width: 1263px) {
  .custom-h1{
    font-size:20px;
    color: #1d1d1d;
  }
}


@media screen and (min-width: 290px) and (max-width: 522px) {
  .custom-h1{
    font-weight: bold;
    font-size:15px;
    color: #1d1d1d;
  }
 
}
</style>
