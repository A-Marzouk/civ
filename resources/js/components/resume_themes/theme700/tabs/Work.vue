<template>
  <v-container v-if="currentTab === 2">
    <v-row>
      <v-col class="mb-lg-12" cols="12" sm="12" lg="6" v-for="(col,index) in 4" :key="index">
        <v-row dense justify="start">
          <v-col cols="1" lg="1">
            <div class="serial white--text pt-2 pl-2 ml-2 ml-lg-0">{{work.id+index}}.</div>
          </v-col>
          <v-col cols="10">
            <div class="head">{{work.title}}</div>
            <div class="subtitle py-4">{{work.subtitle}}</div>
            <div class="subtitle pt-4 pb-12">{{work.duration}}</div>
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
      work: {
        id: 1,
        title: "Google Inc. Introduction Google",
        subtitle: "User interface designer",
        duration: "2012- Current"
      }
    };
  }
};
</script>
<style lang="scss" scoped>
@font-face {
  font-family: "Gotham Pro";
  src: local("Gotham Pro"), url("/fonts/GothaProReg.woff") format("woff");
}
.serial {
  background: #513ecd;
  border-radius: 50%;
  width: 2.5rem;
  height: 2.5rem;
  font-family: Montserrat;
  font-style: normal;
  font-weight: bold;
  font-size: 15px;
  line-height: 22px;
}
.head {
  font-family: "Gotham Pro";
  font-style: normal;
  font-weight: bold;
  font-size: 1.5rem;
  line-height: 23px;
  color: #513ecd;
}
.subtitle {
  font-family: "Gotham Pro";
  font-style: normal;
  font-weight: bold;
  font-size: 0.67rem;
  line-height: 11px;
  text-transform: capitalize;

  color: #000000;
}
@media screen and (min-width: 768px) and (max-width: 1024px) {
  .serial {
    background: #513ecd;
    border-radius: 50%;
    width: 2rem;
    height: 2rem;
    font-family: Montserrat;
    font-style: normal;
    font-weight: bold;
    font-size: 15px;
    line-height: 22px;
  }
}
@media screen and (min-width: 320px) and (max-width: 767px) {
  .serial {
    background: #513ecd;
    border-radius: 50%;
    width: 2rem;
    height: 2rem;
    font-family: Montserrat;
    font-style: normal;
    font-weight: bold;
    font-size: 15px;
    line-height: 22px;
  }
  .head {
    margin-left: 10px;
    font-family: "Gotham Pro";
    font-style: normal;
    font-weight: bold;
    font-size: 1.2rem;
    line-height: 23px;
    color: #513ecd;
  }
  .subtitle {
    margin-left: 10px;
    font-family: "Gotham Pro";
    font-style: normal;
    font-weight: bold;
    font-size: 0.67rem;
    line-height: 11px;
    text-transform: capitalize;
    color: #000000;
  }
}
</style>
