<template>
  <v-container fluid v-if="activeTab === 'hobbies'">
    <v-row>
      <v-col
        xl="2"
        lg="3"
        md="3"
        cols="12"
        sm="6"
        class="px-lg-4 px-sm-4 px-2"
        v-for="hobby in hobbies"
        :key="hobby.id"
        v-show="hobby.is_public"
      >
        <v-row no-gutters class="card px-5 py-12">
          <v-col cols="8" justify="center" align-self="center" align="center">
            <div class="head">{{ hobby.title }}</div>
          </v-col>
          <v-col cols="4" justify="center" align-self="center" align="center">
            <v-btn fab small color="#6764C8" elevation="0">
              <v-img
                src="/images/resume_themes/theme511/hobbies.svg"
                contain
                max-width="24"
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
  props: ["activeTab", "hobbies"],
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