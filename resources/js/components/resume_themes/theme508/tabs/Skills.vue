<template>
  <v-container fluid v-if="currentTab === 3" class="pa-0">
    <v-row no-gutters>
      <v-col cols="3" md="3" lg="2" sm="3" class="shade" align="center">
        <v-row no-gutters>
          <v-col
            cols="12"
            v-for="s in skills"
            :key="s.id"
            @click="skilltab = s.id"
            :class="[
              skilltab == s.id
                ? 'active '
                : 'ma-auto', 'ma-auto '
            ]"
          >
            <div class="text-center my-8">
              <radial-progress-bar
                :diameter="radialDiameter"
                :strokeWidth="5"
                :innerStrokeWidth="5"
                :completed-steps="s.steps"
                :total-steps="100"
                :startColor="s.srt_color"
                :stopColor="s.stp_color"
                innerStrokeColor="#F7F7F7"
                class="box ma-auto"
              >
                <div class="title font-weight-bold" style="color:#5D5D5D;">{{ s.steps }}%</div>
              </radial-progress-bar>
              <div
                :class="[
              skilltab == s.id
                ? 'd-none '
                : 'd-block',  'subhead mt-2'
            ]"
              >{{s.name}}</div>
            </div>
          </v-col>
        </v-row>
      </v-col>
      <v-col cols="9" md="9">
        <v-row justify="center">
          <v-col md="10" cols="12" class="mt-sm-6">
            <v-row justify="center">
              <v-col md="6" cols="5" class="pa-md-12">
                <v-img src="/images/resume_themes/theme508/port-7.png" contain></v-img>
              </v-col>
              <v-col md="6" cols="5" class="pa-md-12">
                <v-img src="/images/resume_themes/theme508/port-8.png" contain></v-img>
              </v-col>
              <v-col md="11" cols="10" class="mt-sm-8">
                <div
                  class="ptext textcol text-center text-sm-right"
                >Lorem ipsum dolor sit amet,Stet clita kasd lorem ipsum dolor sit amet. sed diam eirmod tempor dolore.Lorem ipsum dolor sit amet,Stet clita kasd lorem ipsum dolor sit amet. sed diam eirmod tempor dolore.Lorem ipsum dolor sit amet,Stet clita kasd lorem ipsum dolor sit amet. sed diam eirmod tempor dolore.Lorem ipsum dolor sit amet,Stet clita kasd lorem ipsum dolor sit amet. sed diam eirmod tempor dolore.</div>
              </v-col>
              <v-col md="11" cols="10" class="text-right mt-sm-6">
                <div v-for="s in skills" :key="s.id">
                  <div v-if="skilltab==s.id" class="head">{{s.name}}</div>
                </div>
              </v-col>
            </v-row>
          </v-col>
        </v-row>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
// import RadialProgressBar from "vue-radial-progress";
import RadialProgressBar from "../progressBar/RadialProgressBar";
export default {
  components: {
    RadialProgressBar
  },
  props: ["currentTab"],
  data() {
    return {
      skilltab: 1,
      completedSteps: 75,
      totalSteps: 100,
      skills: [
        {
          id: 1,
          name: "Adobe XD",
          srt_color: "#F5317F",
          stp_color: "#FF7C6E",
          steps: 75
        },
        {
          id: 2,
          name: "Adobe Photoshop",
          srt_color: "#59C2FF",
          stp_color: "#1270E3",
          steps: 95
        },
        {
          id: 3,
          name: "Adobe Illustrator",
          srt_color: "#FF63DE",
          stp_color: "#B122E5",
          steps: 70
        },
        {
          id: 4,
          name: "Adobe Premiere",
          srt_color: "#46EEAA",
          stp_color: "#2CBFC7",
          steps: 60
        }
      ]
    };
  },
  computed: {
    radialDiameter() {
      switch (this.$vuetify.breakpoint.name) {
        case "xs":
          return 60;
        case "sm":
          return 70;
        case "md":
          return 90;
        case "lg":
          return 100;
        case "xl":
          return 120;
      }
    }
  }
};
</script>

<style lang="scss" scoped>
.radial-progress-bar {
  background-color: #000;
}
.textcol {
  color: rgba(101, 69, 248, 0.8);
}
.shade {
  box-shadow: 9px -1px 10px -5px rgba(0, 0, 0, 0.2);
}
.box {
  background-color: #fff;
  border-radius: 50%;
  box-shadow: 0px 0px 10px 2px rgba(0, 0, 0, 0.05);
  position: relative;
}
.active {
  position: relative;
  z-index: 10;
}
.active:before {
  content: "";
  position: absolute;
  left: 0px;
  top: 0px;
  right: 0px;
  bottom: 0;
  width: 88%;
  height: 225px;
  background-color: #6545f9;
  border-top-right-radius: 50%;
  border-bottom-right-radius: 50%;
  z-index: -1;
}
.ptext {
  font-size: 1.8rem;
  line-height: 50px;
}
.head {
  font-size: 2.5rem;
  font-weight: 300;
}
@media only screen and (max-width: 1600px) {
  .active:before {
    content: "";
    position: absolute;
    left: 0px;
    top: 0px;
    right: 0px;
    bottom: 0;
    width: 85%;
    height: 175px;
    background-color: #6545f9;
    border-top-right-radius: 50%;
    border-bottom-right-radius: 50%;
    z-index: -1;
  }
}
@media only screen and (max-width: 1024px) {
  .active:before {
    content: "";
    position: absolute;
    left: 0px;
    top: 5px;
    right: 0px;
    bottom: 0;
    width: 75%;
    height: 150px;
    background-color: #6545f9;
    border-top-right-radius: 50%;
    border-bottom-right-radius: 50%;
    z-index: -1;
  }
}
@media only screen and (max-width: 768px) {
  .active:before {
    content: "";
    position: absolute;
    left: 0px;
    top: 10px;
    right: 0px;
    bottom: 0;
    width: 80%;
    height: 125px;
    background-color: #6545f9;
    border-top-right-radius: 50%;
    border-bottom-right-radius: 50%;
    z-index: -1;
  }
  .ptext {
    font-size: 1.2rem;
    line-height: 40px;
  }
}
@media only screen and (max-width: 425px) {
  .subhead {
    font-size: 0.65rem;
  }
  .active:before {
    content: "";
    position: absolute;
    left: 0px;
    top: 22px;
    right: 0px;
    bottom: 0;
    width: 95%;
    height: 90px;
    background-color: #6545f9;
    border-top-right-radius: 50%;
    border-bottom-right-radius: 50%;
    z-index: -1;
  }
  .ptext {
    font-size: 0.65rem;
    line-height: 20px;
  }
  .head {
    font-size: 1rem;
  }
  .title {
    font-size: 0.8rem !important;
  }
}
</style>
