<template>
  <div class="pa-md-4 pa-sm-12" v-if="hobby.is_public">
    <v-card class="card-hobby pa-12" flat align="center">
      <v-card-text class="hobby-title">
        <v-row class="mt-n4">
          <v-col xl="2" sm="3" cols="3">
            <span></span>
          </v-col>
          <v-col xl="10" sm="9" cols="9">
            <div class="hobby-title">
              {{ hobby.title }}
            </div>
          </v-col>
        </v-row>
      </v-card-text>
    </v-card>
  </div>
</template>
<script>
export default {
  props:["hobby"]
}
</script>
<style lang="scss" scoped>
// card hobbies
.card-hobby {
  width: 310px;
  height: 150px;
  border: 1px solid rgba(16, 78, 251, 0.2) !important;

  .hobby-title {
    font-family: "Roboto-Medium" !important;
    font-weight: 500;
    font-size: 25px;
    line-height: 29px;
    color: #104efb;

    span {
      display: inline-block;
      width: 20px;
      border: 1px solid #104efb;
      margin-bottom: 5px;
      margin-right: 10px;
    }
  }
}
// card hobbies
</style>