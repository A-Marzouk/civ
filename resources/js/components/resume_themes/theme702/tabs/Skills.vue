<template>
  <v-container v-if="currentTab === 5">
    <v-row justify="center">
      <v-col lg="10">
        <v-row justify="center">
          <v-col v-for="(p, index) in programingLanguages" :key="index" cols="11" lg="8" sm="10">
            <v-row justify="center">
              <v-col lg="4" cols="3" class="order-lg-0 mr-sm-auto mr-auto mr-lg-0">
                <div class="skillname pl-lg-6" :style=" 'color:' + p.color + ';'">{{p.name}}</div>
              </v-col>
              <v-col
                lg="7"
                cols="12"
                class="order-last order-sm-last order-lg-1"
                align-self="center"
              >
                <v-progress-linear
                  :value="p.percentage"
                  background-color="white"
                  :color="p.color"
                  height="15"
                  :style="'border: 1px solid' + p.color +';'"
                  reactive
                ></v-progress-linear>
              </v-col>
              <v-col lg="1" cols="3" class="order-1 order-sm-1 order-lg-last">
                <div
                  class="skillname text-sm-right text-right text-lg-center"
                  :style=" 'color:' + p.color + ';'"
                >{{p.percentage}}%</div>
              </v-col>
            </v-row>
          </v-col>
        </v-row>
      </v-col>
    </v-row>
  </v-container>
</template>
<script>
export default {
  props: ["currentTab"],
  data() {
    return {
      tab: null,
      centered: false,
      grow: false,
      vertical: false,
      right: false,
      icons: false,
      programingLanguages: [
        { id: 1, name: "Photoshop", percentage: 90, color: "#005BD1" },
        { id: 2, name: "Illustrator", percentage: 80, color: "#FFB340" },
        { id: 3, name: "Photoshop", percentage: 50, color: "#005BD1" },
        { id: 4, name: "Illustrator", percentage: 90, color: "#FFB340" }
      ]
    };
  }
};
</script>
<style lang="scss" scoped>
.skillname {
  font-family: Open Sans;
  font-style: normal;
  font-weight: normal;
  font-size: 1.5rem;
  line-height: 65px;
}
</style>
