<template>
  <v-container fluid v-if="activeTab === 'references'">
    <v-row>
      <v-col
        lg="6"
        cols="12"
        sm="12"
        class="px-lg-4 px-sm-4 px-2"
        v-for="(reference, i) in references"
        :key="i"
        v-show="reference.is_public"
      >
        <v-row no-gutters class="card pa-4 pa-sm-6 pa-lg-8">
          <v-col cols="12" lg="10">
            <v-row no-gutters>
              <v-col cols="12">
                <div class="head">{{ reference.name }}</div></v-col
              >
            </v-row>
            <v-row no-gutters class="py-3">
              <v-col cols="6" sm="8" md="10"
                ><div class="newSub">{{ reference.title }}</div></v-col
              >
              <v-col cols="6" sm="4" md="2"
                ><div class="newSub">{{ reference.email }}</div></v-col
              >
              <v-col cols="6" sm="8" md="10">
                <div class="newSub">{{ reference.address }}</div></v-col
              >
              <v-col cols="6" sm="4" md="2">
                <div class="newSub">{{ reference.phone }}</div></v-col
              >
            </v-row>

            <div class="newSub py-1">
              {{ reference.reference_text }}
            </div>
          </v-col>
        </v-row>
      </v-col>
    </v-row>
  </v-container>
</template>
<script>
export default {
  props: ["activeTab", "references"],
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
.newSub {
  font-style: normal;
  font-weight: normal;
  font-size: 16px;
  line-height: 25px;
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