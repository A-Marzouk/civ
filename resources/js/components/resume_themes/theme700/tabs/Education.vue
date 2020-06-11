<template>
  <v-container v-if="currentTab === 3">
    <v-row>
      <v-col class="mb-lg-12" cols="12" sm="12" lg="6" v-for="(col,index) in 4" :key="index">
        <v-row dense justify="start">
          <v-col cols="1">
            <div class="serial white--text pt-2 pl-2 ml-2 ml-lg-0">{{edu.id+index}}.</div>
          </v-col>
          <v-col cols="10">
            <div class="head">{{edu.title}}</div>
            <div class="subtitle py-6">
              {{edu.subtitle}}
              <span class="pl-4 subtitle">{{edu.duration}}</span>
            </div>

            <div class="para pb-12">
              I'm a paragraph. Click here to add your own text and
              edit me. It’s easy. Just click “Edit Text” or double
              click me to add your own content and make changes.
            </div>
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
      edu: {
        id: 1,
        title: "California Institute of Technology",
        subtitle: "M.Sc in HCI,",
        duration: "Dec 19 - Present"
      }
    };
  }
};
</script>

<style lang="scss" scoped>
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
  font-weight: bolder;
  font-size: 1.5rem;
  line-height: 23px;
  color: #000;
}
.subtitle {
  font-family: "Gotham Pro";
  font-style: normal;
  font-weight: bolder;
  font-size: 0.67rem;
  line-height: 11px;
  text-transform: capitalize;

  color: #513ecd;
}
.para {
  font-family: "Gotham Pro";
  font-style: normal;
  font-weight: 300;
  font-size: 0.67rem;
  line-height: 23px;

  color: #2d2d2d;
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
  .para {
    margin-left: 10px;
    font-family: "Gotham Pro";
    font-style: normal;
    font-weight: 300;
    font-size: 0.67rem;
    line-height: 23px;

    color: #2d2d2d;
  }
}
</style>
