<template>
  <v-container fluid v-if="currentTab === 2">
    <v-row justify="center">
      <v-col md="12" lg="10" cols="12">
        <v-row justify="center">
          <v-col cols="12" md="5" lg="5" v-for="w in works" :key="w.id" class="ma-6">
            <v-card class="tab px-sm-8 py-sm-10 px-3 py-1" width="600">
              <v-row class="textcol">
                <v-col md="4" sm="3" cols="3" lg="3" align="center" align-sm="start">
                  <v-img :src="w.img" class="imgheight" contain></v-img>
                </v-col>
                <v-col md="8" sm="9" cols="9" lg="9" class="text-padd">
                  <div
                    class="subtitle-1 mt-sm-3 mt-md-2 mb-sm-1 mt-1 mb-1 mt-lg-2"
                  >26th October,2019</div>
                  <div class="head">{{w.name}}</div>
                </v-col>
                <v-col md="12" sm="12" cols="12">
                  <div class="subhead">Example IT Limited</div>
                  <div class="line"></div>
                </v-col>
                <v-col md="12" sm="12" cols="12">
                  <div
                    class="subtitle-2 pr-8"
                  >Lorem ipsum dolor sit amet,Stet clita kasd lorem ipsum dolor sit amet. sed diam eirmod tempor dolore.Lorem ipsum dolor sit amet,Stet clita kasd lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet</div>
                </v-col>
                <v-col md="12" sm="12" cols="12">
                  <div class="local">
                    <v-icon color="#6545F8" left small>mdi-map-marker</v-icon>Baridhara, Dhaka, Bangladesh
                  </div>
                </v-col>
              </v-row>
            </v-card>
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
      works: [
        {
          id: 1,
          name: "UI Designer",
          img: "/images/resume_themes/theme508/exp-1.svg"
        },
        {
          id: 2,
          name: "Photographar",
          img: "/images/resume_themes/theme508/exp-2.svg"
        },
        {
          id: 3,
          name: "Videographar",
          img: "/images/resume_themes/theme508/exp-3.svg"
        },
        {
          id: 4,
          name: "Developer",
          img: "/images/resume_themes/theme508/exp-4.svg"
        }
      ]
    };
  }
};
</script>

<style lang="scss" scoped>
@import url("https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;700;800;900&display=swap");
.tab {
  box-shadow: 1px 1px 10px 2px rgba(0, 0, 0, 0.1);
}
.textcol {
  color: #6247fd;
}
.head {
  font-family: "Heebo", sans-serif;
  font-style: normal;
  font-weight: 800;
  font-size: 1.5rem;
}
.subhead {
  font-family: "Heebo", sans-serif;
  font-style: normal;
  font-weight: 400;
  font-size: 1.5rem;
}
.line {
  width: 300px;
  background-color: #6247fd;
  height: 2px;
  margin-top: 10px;
}
.imgheight {
  height: 135;
  width: 145;
}
@media only screen and (max-width: 1600px) {
  .imgheight {
    height: 100;
    width: 145;
  }
  .text-padd {
    padding-left: 100px;
  }
}
@media only screen and (max-width: 1024px) {
  .imgheight {
    height: 120;
    width: 145;
  }
  .text-padd {
    padding-left: 50px;
  }
}
@media only screen and (max-width: 425px) {
  .subtitle-2 {
    font-size: 0.67rem !important;
  }
  .imgheight {
    height: 65;
    width: 145;
  }
  .local {
    font-size: 0.8rem;
  }
  .subhead {
    font-size: 1rem;
  }
}
</style>
