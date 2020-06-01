<template>
  <v-row no-gutters justify="center" class="mt-10" v-if="currentTab === 4">
    <v-col md="8" lg="10" cols="11">
      <v-tabs
        v-model="tab"
        background-color="transparent"
        height="60"
        color="#C10FA0"
        center-active
        hide-arrows
        grow
        class="tabmargn"
      >
        <v-tabs-slider style="height:0px;padding:0 0 !important;"></v-tabs-slider>
        <v-tab
          v-for="item in items"
          :key="item.id"
          exact
          class="subtitle-1 text-capitalize textcol"
          active-class="font-weight-bold"
        >{{ item.name }}</v-tab>
      </v-tabs>

      <v-row no-gutters class="mt-12" justify="center" align="center">
        <v-col md="12" sm="12" cols="11">
          <v-tabs-items v-model="tab" style="background-color:transparent;">
            <v-tab-item v-for="item in items" :key="item.id">
              <v-row class="justify-center py-2" align="center" no-gutters>
                <v-col
                  xl="6"
                  lg="6"
                  md="6"
                  sm="12"
                  cols="11"
                  v-for="(s, index) in item.skills"
                  :key="index"
                  class="px-md-6 my-6 px-xs-2 mx-xs-2"
                >
                  <v-row
                    no-gutters
                    class="mx-md-0 mx-lg-0 mx-xl-0 mx-sm-12 mx-xs-4"
                    justify="center"
                    align="center"
                  >
                    <v-col cols="6" sm="6" md="2" lg="2">
                      <div
                        class="skilltext text-left grey--text text--lighten-2 mb-sm-1 mb-xs-1 mr-6"
                      >{{ s.name }}</div>
                    </v-col>
                    <v-col cols="6" sm="6" class="hidden-md-and-up">
                      <div class="skilltext textcol text-right mb-sm-1 mb-xs-1">{{ s.val }}</div>
                    </v-col>
                    <v-col cols="12" sm="12" md="8" lg="8">
                      <div class="pro-back ml-md-11">
                        <div class="progress" style="width:70%;"></div>
                      </div>
                    </v-col>
                    <v-col md="2" lg="2" class="hidden-sm-and-down">
                      <div class="skilltext textcol font-weight-bold text-left ml-6">{{ s.val }}</div>
                    </v-col>
                  </v-row>
                </v-col>
              </v-row>
            </v-tab-item>
          </v-tabs-items>
        </v-col>
      </v-row>
    </v-col>
  </v-row>
</template>

<script>
export default {
  name: "skills",
  props: ["currentTab"],
  data() {
    return {
      tab: null,
      items: [
        {
          id: 1,
          name: "Programming Languages",
          skills: [
            {
              name: "Photoshop",
              val: "90%",
              icon: "ph"
            },

            {
              name: "Illustrator",
              val: "80%",
              icon: "ill"
            },

            {
              name: "Figma",
              val: "75%",
              icon: "fig"
            },
            {
              name: "Photoshop",
              val: "90%",
              icon: "ph"
            },

            {
              name: "Illustrator",
              val: "80%",
              icon: "ill"
            },

            {
              name: "Figma",
              val: "75%",
              icon: "fig"
            }
          ]
        },
        {
          id: 2,
          name: "Frameworks/ Databases",
          skills: [
            {
              name: "Photoshop",
              val: "90%",
              icon: "ph"
            },
            {
              name: "Illustrator",
              val: "80%",
              icon: "ill"
            },

            {
              name: "Figma",
              val: "75%",
              icon: "fig"
            },
            {
              name: "Figma",
              val: "75%",
              icon: "fig"
            }
          ]
        },
        {
          id: 3,
          name: "Design Skills",
          skills: [
            {
              name: "Photoshop",
              val: "90%",
              icon: "ph"
            },
            {
              name: "Photoshop",
              val: "90%",
              icon: "ph"
            },

            {
              name: "Figma",
              val: "75%",
              icon: "fig"
            },
            {
              name: "Figma",
              val: "75%",
              icon: "fig"
            }
          ]
        },
        {
          id: 4,
          name: "Software",
          skills: [
            {
              name: "Photoshop",
              val: "90%",
              icon: "ph"
            },

            {
              name: "Figma",
              val: "75%",
              icon: "fig"
            }
          ]
        }
      ]
    };
  }
};
</script>

<style scoped>
.skilltext {
  font-size: 1.5rem !important;
}
.pro-back {
  background: linear-gradient(
    131.18deg,
    #ffffff 12.14%,
    rgba(255, 255, 255, 0.1) 95.04%
  );
  border-radius: 15px;
  max-width: 100%;
  z-index: 10;
}
.progress {
  height: 15px;
  background: #51ebf7;
  box-shadow: 2px 5px 30px rgba(81, 235, 247, 0.3);
  border-radius: 15px;
}
.textcol {
  color: #52edfa !important;
}
.v-tabs {
  position: relative;
}
.v-tabs:after {
  content: "";
  position: absolute;
  height: 2px;
  width: 90%;
  background-color: rgba(34, 45, 104, 0.1);

  margin: 0 50px 0 50px;
  bottom: 0;
}

.v-tab--active:hover {
  color: #52edfa !important;
}
.theme--light.v-application {
  background: transparent;
  color: rgba(0, 0, 0, 0.87);
}

.basil--text {
  color: #104efb !important;
}
.v-tabs .v-tab--active:after {
  content: "";
  position: absolute;
  height: 5px;
  width: 30%;
  background: #51ebf7;
  box-shadow: 2px 5px 30px rgba(192, 18, 159, 0.37);
  border-radius: 15px;

  margin: auto;
  bottom: 0;
}
.margleft {
  margin-left: 24px;
}
@media only screen and (max-width: 600px) {
  .tabmargn {
    margin-left: -52px;
  }
  .v-tabs .v-tab--active:after {
    content: "";
    position: absolute;
    height: 5px;
    width: 100%;
    background: #51ebf7;
    box-shadow: 2px 5px 30px rgba(192, 18, 159, 0.37);
    border-radius: 15px;

    margin: auto;
    bottom: 0;
  }
  .v-tabs-bar.v-slide-group--is-overflowing.v-tabs-bar--is-mobile:not(.v-tabs-bar--show-arrows):not(.v-slide-group--has-affixes)
    .v-slide-group__prev {
    display: none !important;
    visibility: hidden;
  }

  .v-tabs--grow > .v-tabs-bar .v-tab {
    -webkit-box-flex: 1;
    -ms-flex: 1 0 auto;
    flex: 1 0 auto;
    max-width: 20% !important;

    text-align: left !important;
  }
  .theme--light.v-tabs > .v-tabs-bar .v-tab:not(.v-tab--active),
  .theme--light.v-tabs > .v-tabs-bar .v-tab:not(.v-tab--active) > .v-icon {
    max-width: 20% !important;
  }
  .skilltext {
    font-size: 1.5rem !important;
  }
}
</style>
