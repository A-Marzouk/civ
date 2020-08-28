<template>
  <div class="pa-xl-4 pa-lg-4 pa-md-4 pa-sm-12 pa-0" v-if="reference.is_public">
    <v-card
      flat
      style="border: 1px solid rgba(16, 78, 251, 0.2);"
      class="card-ref pa-sm-5 pa-2 pa-md-8"
    >
      <v-card-title class="ref-title">{{ reference.name }}</v-card-title>
      <v-card-subtitle class="ref-subtitle">
        <v-row justify="space-between" dense>
          <v-col sm="6" cols="6" class="designation">{{
            reference.title
          }}</v-col>
          <v-col sm="6" cols="6" align="right" class="designation">{{
            reference.email
          }}</v-col>
        </v-row>
        <v-row justify="space-between" class="mt-n5">
          <v-col sm="6" cols="6" class="designation">{{
            reference.address
          }}</v-col>
          <v-col sm="6" cols="6" align="right" class="designation">{{
            reference.phone
          }}</v-col>
        </v-row>
      </v-card-subtitle>

      <v-card-text class="ref-desc">
        {{ reference.reference_text }}</v-card-text
      >
    </v-card>
  </div>
</template>

<script>
export default {
  props:["reference"]
    
}
</script>
<style lang="scss" scoped>
.card-ref {
  border: 1px solid rgba(16, 78, 251, 0.2);
  @media screen and (max-width: 1903px) {
    width: auto;
    height: auto;
  }
  .ref-title {
    font-family: "Raleway" !important;
    font-weight: 500;
    font-size: 28px;
    line-height: 33px;
    color: #104efb !important;
  }
  .ref-subtitle {
    font-family: "Raleway" !important;
    font-style: normal;
    font-weight: normal;
    font-size: 16px;
    line-height: 25px;
    color: #104efb !important;

    @media screen and (max-width: 599px) {
      font-size: 14px;
    }
  }
  .ref-desc {
    font-family: "Raleway" !important;
    font-style: normal;
    font-weight: normal;
    font-size: 16px;
    line-height: 30px;
    color: #104efb !important;
    @media screen and (max-width: 599px) {
      font-size: 14px;
    }
  }
}
</style>