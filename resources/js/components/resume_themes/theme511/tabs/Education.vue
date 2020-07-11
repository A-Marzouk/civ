<template>
  <v-container fluid v-if="activeTab === 'education'">
    <v-row>
      <v-col
        lg="4"
        cols="12"
        sm="12"
        class="px-lg-4 px-sm-4 px-2"
        v-for="edu in education"
        :key="edu.id"
        v-show="edu.is_public"
      >
        <v-row no-gutters class="card pa-5">
          <v-col cols="10">
            <div class="head">{{ edu.university_name }}</div>
            <div class="subhead py-2">{{ edu.degree_title }}</div>
            <div class="para py-2">
              {{ edu.description }}
            </div>
            <div class="date py-2">{{ edu.date_from }} - {{ edu.date_to }}</div>
          </v-col>
          <v-col cols="2">
            <v-btn fab large color="#19AAC9" elevation="0">
              <v-img
                src="/images/resume_themes/theme511/edu.svg"
                contain
                max-width="30"
              ></v-img>
            </v-btn>
          </v-col>
        </v-row>
      </v-col>
    </v-row>
  </v-container>
</template>
<script>
export default {
  props: ["activeTab", "education"],
  data: () => ({})
};
</script>
<style lang="scss" scoped>
.card {
  background: #ffffff;
  border-radius: 20px;
}
.head {
  font-family: Roboto;
  font-style: normal;
  font-weight: bold;
  font-size: 24px;
  line-height: 28px;

  color: #000000;
}
.subhead {
  font-family: Roboto;
  font-style: normal;
  font-weight: 500;
  font-size: 18px;
  line-height: 21px;
  /* identical to box height */

  color: #000000;
}
.para {
  font-family: Roboto;
  font-style: normal;
  font-weight: normal;
  font-size: 12px;
  line-height: 14px;

  color: #000000;
}
.date {
  font-family: Roboto;
  font-style: normal;
  font-weight: normal;
  font-size: 13px;
  line-height: 15px;

  color: #b2b2b2;
}
</style>