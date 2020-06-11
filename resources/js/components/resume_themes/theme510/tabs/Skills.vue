<template>
  <v-row no-gutters justify="center" class="mt-10" v-if="currentTab === 1">
    <v-col md="8">
      <v-tabs
        v-model="tab"
        background-color="transparent"
        color="#104EFB"
        center-active
        show-arrows
        grow
      >
        <v-tabs-slider style="height:0px;padding:0 0 !important;">
          <div class="tabid"></div>
        </v-tabs-slider>
        <v-tab
          v-for="item in items"
          :key="item.name"
          exact
          class="subtitle-1 text-capitalize"
          active-class="font-weight-bold"
        >{{ item.name }}</v-tab>
      </v-tabs>

      <v-row no-gutters class="mt-12">
        <v-col md="12" sm="12" cols="12">
          <v-tabs-items v-model="tab" v-for="item in items" :key="item.name">
            <v-tab-item v-for="(s,index) in item.skills" :key="index">
              <v-row class="justify-center py-2" align="center">
                <v-col cols="3" sm="1" md="1">
                  <v-img :src="s.src" width="38" class="margleft"></v-img>
                </v-col>
                <v-col sm="7" md="7" cols="7">
                  <v-progress-linear rounded :value="s.per" color="#104EFB"></v-progress-linear>
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
          name: "Programming Languages",
          skills: [
            {
              src: "/images/resume_themes/theme510/php.svg",
              per: 67
            },
            {
              src: "/images/resume_themes/theme510/html.svg",
              per: 56
            },
            {
              src: "/images/resume_themes/theme510/css.svg",
              per: 78
            },
            {
              src: "/images/resume_themes/theme510/html.svg",
              per: 56
            },
            {
              src: "/images/resume_themes/theme510/js.svg",
              per: 86
            }
          ]
        },

        {
          name: "Frameworks/ Databases",
          skills: [
            {
              src: "/images/resume_themes/theme510/html.svg",
              per: 56
            },
            {
              src: "/images/resume_themes/theme510/css.svg",
              per: 78
            },
            {
              src: "/images/resume_themes/theme510/html.svg",
              per: 56
            },
            {
              src: "/images/resume_themes/theme510/js.svg",
              per: 86
            }
          ]
        },

        {
          name: "Design Skills",
          skills: [
            {
              src: "/images/resume_themes/theme510/php.svg",
              per: 67
            },
            {
              src: "/images/resume_themes/theme510/html.svg",
              per: 56
            },

            {
              src: "/images/resume_themes/theme510/html.svg",
              per: 56
            },
            {
              src: "/images/resume_themes/theme510/js.svg",
              per: 86
            }
          ]
        },

        {
          name: "Software",
          skills: [
            {
              src: "/images/resume_themes/theme510/php.svg",
              per: 67
            },

            {
              src: "/images/resume_themes/theme510/html.png",
              per: 56
            },
            {
              src: "/images/resume_themes/theme510/js.png",
              per: 86
            }
          ]
        }
      ],
      skills: [
        {
          src: "/images/resume_themes/theme510/php.png",
          per: 67
        },
        {
          src: "/images/resume_themes/theme510/html.png",
          per: 56
        },
        {
          src: "/images/resume_themes/theme510/css.png",
          per: 78
        },
        {
          src: "/images/resume_themes/theme510/html.png",
          per: 56
        },
        {
          src: "/images/resume_themes/theme510/js.png",
          per: 86
        }
      ]
    };
  }
};
</script>

<style scoped>
.v-tabs {
  position: relative;
}
.v-tabs:after {
  content: "";
  position: absolute;
  height: 1px;
  width: 90%;
  background-color: #104efb;

  margin: 0 50px 0 50px;
  bottom: 0;
}
.theme--light.v-application {
  background: transparent;
  color: rgba(0, 0, 0, 0.87);
}

.basil--text {
  color: #104efb !important;
}
.margleft {
  margin-left: 24px;
}
@media only screen and (max-width: 1000px) and (min-width: 650px) {
  .margleft {
    margin-left: 0px;
  }
}
</style>
