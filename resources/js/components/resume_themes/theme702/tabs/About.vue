<template>
  <v-container v-if="currentTab === 1" fluid pa-0>
    <v-row justify="center">
      <v-col lg="10" sm="11" cols="11">
        <v-row>
          <v-col cols="12" class="text-lg-center text-left mt-12">
            <div class="headline textcol font-weight-bold">About</div>
          </v-col>
          <v-col cols="12">
            <div
              v-for="i in 4"
              :key="i"
              class="para text-lg-center text-left my-3"
            >I'm Conor, I'm a product manager from London. I'm currently looking for new permanent job opportunities within London area that will allow my career to develop...</div>
          </v-col>
        </v-row>
      </v-col>
    </v-row>
  </v-container>
</template>
<script>
export default {
  props: ["currentTab"]
};
</script>
<style lang="scss">
.textcol {
  color: #005bd1;
}
.para {
  font-family: Open Sans;
  font-style: normal;
  font-weight: normal;
  font-size: 1rem;
  line-height: 25px;
  /* or 107% */

  color: #bdbdbd;
}
</style>
