<template>
  <v-container v-if="currentTab === 1" fluid>
    <v-row justify="center">
      <v-col md="11" sm="11" cols="8">
        <v-tabs v-model="ptab" centered color="#6147FE" hide-slider class="marg">
          <v-tab v-for="c in catagory" :key="c.id">
            <div class="text-capitalize title font-regular slider">{{c.name}}</div>
          </v-tab>
        </v-tabs>
      </v-col>
      <v-col cols="3" justify="center" align="center" class="text-right hidden-sm-and-up mt-3">
        <v-btn
          color="#6743F4"
          outlined
          fab
          dark
          class="arrow mx-1"
          elevation="0"
          @click="ptabMinus"
        >
          <v-icon x-small>mdi-chevron-left</v-icon>
        </v-btn>
        <v-btn color="#6743F4" fab dark class="arrow mx-1" elevation="0" @click="ptabPlus">
          <v-icon x-small>mdi-chevron-right</v-icon>
        </v-btn>
      </v-col>
      <v-col md="11" sm="11" cols="12">
        <v-row justify="center" dense>
          <v-col v-for="n in portfolios" :key="n.id" md="3" sm="3" cols="6">
            <v-img :src="n.url" :aspect-ratio="1" contain class="ma-4 ma-1"></v-img>
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
      ptab: null,
      catagory: [
        {
          id: 1,
          name: "Web Design"
        },
        {
          id: 2,
          name: "App Design"
        },
        {
          id: 3,
          name: "Photography"
        },
        {
          id: 4,
          name: "Videography"
        },
        {
          id: 5,
          name: "Web Development"
        }
      ],
      portfolios: [
        {
          id: 1,
          url: "/images/resume_themes/theme508/port-1.png"
        },
        {
          id: 2,
          url: "/images/resume_themes/theme508/port-2.png"
        },
        {
          id: 3,
          url: "/images/resume_themes/theme508/port-3.png"
        },
        {
          id: 4,
          url: "/images/resume_themes/theme508/port-4.png"
        },
        {
          id: 5,
          url: "/images/resume_themes/theme508/port-5.png"
        },
        {
          id: 6,
          url: "/images/resume_themes/theme508/port-6.png"
        },
        {
          id: 7,
          url: "/images/resume_themes/theme508/port-7.png"
        },
        {
          id: 8,
          url: "/images/resume_themes/theme508/port-8.png"
        }
      ]
    };
  },
  methods: {
    ptabPlus() {
      this.ptab = this.ptab + 1;
    },
    ptabMinus() {
      this.ptab = this.ptab - 1;
    }
  }
};
</script>

<style lang="scss" scoped>
.slider {
  position: relative;
}
.v-tab--active .slider:after {
  content: "";
  position: absolute;
  bottom: 0px;
  top: 35px;
  left: 0;
  width: 60px;
  height: 1px;
  background-color: #6247fc;
}
@media only screen and (max-width: 425px) {
  .arrow {
    width: 24px;
    height: 24px;
  }
  .title {
    font-size: 0.8rem !important;
  }
  .v-tab--active .slider:after {
    content: "";
    position: absolute;
    bottom: 0px;
    top: 30px;
    left: 0;
    width: 40px;
    height: 1px;
    background-color: #6247fc;
  }
  .marg {
    margin-left: -70px;
  }
}
</style>
