<template>
  <v-container fluid v-if="activeTab === 'achievement'">
    <v-row>
      <v-col
        lg="6"
        md="6"
        cols="12"
        sm="12"
        class="px-lg-4 px-sm-4 px-2"
        v-for="achievement in achievements"
        :key="achievement.id"
        v-show="achievement.is_public"
      >
        <v-row no-gutters class="card pa-5">
          <v-col cols="12" sm="4" lg="4">
            <v-img :src="achievement.image_src" contain></v-img>
          </v-col>
          <v-col cols="12" sm="8" lg="8" class="px-lg-5 px-sm-3">
            <div class="newTitle">{{ achievement.title }}</div>
            <div class="newSub py-1">
              <span class="font-weight-bold">URL:</span>{{ achievement.url }}
            </div>
            <div class="newSub py-1">
              <span class="font-weight-bold">Description:</span
              >{{ achievement.description }}
            </div>
          </v-col>
        </v-row>
      </v-col>
    </v-row>
  </v-container>
</template>
<script>
export default {
  props: ["activeTab", "achievements"],
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
.newTitle {
  font-style: normal;
  font-weight: 500;
  font-size: 24px;
  line-height: 33px;
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