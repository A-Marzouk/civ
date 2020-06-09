<template>
  <v-row justify="center" class="mt-12" v-if="currentTab === 3">
    <v-col md="10" sm="12" cols="12">
      <v-row justify="center">
        <v-col md="6" sm="11" cols="11" v-for="n in 4" :key="n">
          <v-row justify="center" class="layer ma-4 py-6 px-8 py-sm-6 px-sm-12">
            <v-col cols="12" md="12" class="px-8">
              <v-row no-gutters>
                <v-col md="3" sm="3" cols="3" class="my-2 hidden-xs-only">
                  <h1 class="grey--text text--lighten-3 subhead">{{ temp.sub }}</h1>
                </v-col>
                <v-col md="12" sm="12" cols="12" class="my-2">
                  <h1 class="textcol head">{{ temp.title }}</h1>
                </v-col>
                <v-row no-gutters class>
                  <v-col md="12" sm="12" cols="12" class="my-2">
                    <h1 class="subhead grey--text text--lighten-2">{{ temp.duration }}</h1>
                  </v-col>

                  <v-col md="12" sm="12" cols="12" class="my-2">
                    <h1 class="grey--text text--lighten-1 sfont">{{ temp.para }}</h1>
                  </v-col>
                </v-row>
              </v-row>
            </v-col>
          </v-row>
        </v-col>
      </v-row>
    </v-col>
  </v-row>
</template>

<script>
export default {
  props: ["currentTab"],
  data() {
    return {
      temp: {
        icon: "/images/resume_themes/theme509/education.svg",
        title: "California Institute of Technology",
        sub: "University",
        duration: "M.Sc in HCI, Dec 19 - Present",
        para:
          "I'm a paragraph. Click here to add your own text and edit me. It’s easy. Just click “Edit Text” or double click me to add your  and make changes."
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
