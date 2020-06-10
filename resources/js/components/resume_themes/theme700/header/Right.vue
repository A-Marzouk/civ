<template>
  <v-container fluid pa-0>
    <v-row no-gutters justify="center" class="mt-lg-12 mt-sm-12 mt-10">
      <v-col cols="3" class="text-center">
        <div class="inform">Hourly rate</div>
        <div class="amount">$ 25 USD</div>
      </v-col>
      <v-col cols="1" align="center" justify="center" class="mx-1 mx-sm-n6 mx-lg-n3">
        <div style="background-color:#D7D7D7;width:1px;height:2rem;margin-top:10px;"></div>
      </v-col>
      <v-col cols="3" class="text-center">
        <div class="inform">Available for</div>
        <div class="amount">8 hours</div>
      </v-col>
      <v-col cols="4" class="text-center" align-self="center">
        <v-btn color="#513ecd" dark rounded width="90%" height="40px">
          <div class="text-capitalize hire">Hire Me</div>
        </v-btn>
      </v-col>
    </v-row>
  </v-container>
</template>
<script>
export default {};
</script>
<style lang="scss" scoped>
.textcol {
  color: #513ecd;
}
.inform {
  font-family: Montserrat;
  font-style: normal;
  font-weight: normal;
  font-size: 0.7rem;
  line-height: 22px;
  color: #484848;
}
.amount {
  font-family: Montserrat;
  font-style: normal;
  font-weight: bold;
  font-size: 1rem;
  line-height: 29px;
  color: #513ecd;
}
.hire {
  font-family: Montserrat;
  font-style: normal;
  font-weight: bold;
  font-size: 0.8rem;
  line-height: 22px;
}
</style>
