<template>
  <v-container v-if="currentTab === 2">
    <v-row justify="center" class="mt-12">
      <v-col lg="10" md="10" sm="12" cols="12">
        <v-row justify="center">
          <v-col lg="6" md="6" sm="11" cols="11" v-for="n in 4" :key="n">
            <v-row justify="start" class="layer ma-md-4 pa-12 ma-2" no-gutters>
              <v-col cols="12">
                <v-row no-gutters class="py-4">
                  <v-col lg="4" md="2" sm="3" cols="12">
                    <h1 class="textcol head font-weight-bold">{{ temp.title }}</h1>
                  </v-col>
                  <v-col lg="8" md="8" sm="7" cols="12" class="text-left">
                    <h1 class="subhead grey--text text--lighten-2 mt-2">{{ temp.sub }}</h1>
                  </v-col>

                  <v-col lg="4" md="3" sm="3" cols="12" class="mt-sm-8 mt-2">
                    <h1 class="d-block subtitle-2 grey--text text--lighten-2">Duration :</h1>
                    <h1
                      class="d-block subtitle-2 font-weight-bold textcol"
                      style="color:#F97CB3;"
                    >{{ temp.duration }}</h1>
                  </v-col>
                  <v-col lg="8" md="8" sm="9" cols="12" class="mt-sm-8 mt-2">
                    <h1 class="grey--text text--lighten-1 sfont">{{ temp.para }}</h1>
                  </v-col>
                </v-row>
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
      temp: {
        icon: "/images/resume_themes/theme509/work.svg",
        title: "Google",
        sub: "User interface designer",
        duration: "Dec 19 - Present",
        para:
          "I'm a paragraph. Click here to add your own text and edit me. It’s easy. Just click “Edit Text” or double click me to add your own content and make changes."
      }
    };
  }
};
</script>

<style scoped>
.head {
  font-family: "Lato", sans-serif;
  font-size: 1.3rem;
}
.subhead {
  font-family: "Open Sans", sans-serif;
  font-size: 0.8rem;
}

.sfont {
  font-size: 0.62rem;
  font-weight: 300;
}
.theme--light.v-application {
  background: transparent;
  color: rgba(0, 0, 0, 0.87);
}
.layer {
  background: #3546c1;
  box-shadow: 6px 6px 30px rgba(0, 0, 0, 0.1);
  border-radius: 30px;
}
.textcol {
  color: #52edfa !important;
}
.workicon {
  height: 50px !important;
  width: 50px !important;
}
.iconimg {
  height: 26px !important;
  width: 26px !important;
}
.subtitle-2 {
  font-size: 0.7rem !important;
}
@media only screen and (max-width: 1024px) {
  .head {
    font-family: "Lato", sans-serif;
    font-size: 1.5rem;
  }
  .subhead {
    font-family: "Open Sans", sans-serif;
    font-size: 1rem;
  }
  .sfont {
    font-size: 0.89rem;
    font-weight: 300;
  }
}
@media only screen and (max-width: 600px) {
  .workicon {
    height: 40px !important;
    width: 40px !important;
  }
  .iconimg {
    height: 18px !important;
    width: 18px !important;
  }
  .layer {
    background: #3546c1;
    box-shadow: 6px 6px 30px rgba(0, 0, 0, 0.1);
    border-radius: 30px;
  }
  .sfont {
    font-size: 0.8rem;
  }
}
</style>
