<template>
  <v-container fluid v-if="currentTab===3">
    <v-row justify="center">
      <v-col lg="10">
        <v-tabs
          background-color="transparent"
          v-model="tablet"
          color="#000"
          slider-size="5"
          center-active
        >
          <v-tab v-for="(s,i) in skilltab" :key="i" class="mr-6">
            <div class="text-capitalize tabtitle">{{s.title}}</div>
          </v-tab>
        </v-tabs>
      </v-col>
    </v-row>
    <v-row>
      <v-col cols="12">
        <v-tabs-items v-model="tablet" style="background-color:transparent;">
          <v-tab-item v-for="(s,i) in skilltab" :key="i">
            <v-row>
              <v-col
                lg="4"
                cols="12"
                sm="12"
                v-for="(skill,i) in s.skills"
                :key="i"
                class="px-lg-4 px-sm-4 px-2"
              >
                <v-row no-gutters class="card pa-5">
                  <v-col cols="3" class="py-5 text-center" align-self="center">
                    <div class="head">{{skill.name}}</div>
                  </v-col>
                  <v-col cols="1" class="py-5" align-self="center" align="center" justify="center">
                    <div class="line"></div>
                  </v-col>

                  <v-col cols="6" class="py-5" align-self="center">
                    <div class="value">{{skill.value}}%</div>
                  </v-col>
                  <v-col cols="2" class="ml-auto">
                    <v-btn fab large color="#F56068" elevation="0">
                      <v-img src="/images/resume_themes/theme511/skill.svg" contain max-width="20"></v-img>
                    </v-btn>
                  </v-col>
                </v-row>
              </v-col>
            </v-row>
          </v-tab-item>
        </v-tabs-items>
      </v-col>
    </v-row>
  </v-container>
</template>
<script>
export default {
  props: ["currentTab"],
  data: () => ({
    tablet: null,
    skilltab: [
      {
        title: "Programming languages",
        skills: [
          {
            name: "Node Js",
            value: 58
          },
          {
            name: "Laravel",
            value: 86
          },
          {
            name: "PHP",
            value: 74
          }
        ]
      },
      {
        title: "Frameworks",
        skills: [
          {
            name: "Vue",
            value: 58
          },
          {
            name: "React",
            value: 86
          },
          {
            name: "Django",
            value: 74
          }
        ]
      },
      {
        title: "Design Skills",
        skills: [
          {
            name: "CSS",
            value: 58
          },
          {
            name: "SASS",
            value: 86
          },
          {
            name: "Jquery",
            value: 74
          }
        ]
      },
      {
        title: "Software",
        skills: [
          {
            name: "Adobe XD",
            value: 58
          },
          {
            name: "Figma",
            value: 86
          },
          {
            name: "Sketch",
            value: 74
          }
        ]
      }
    ]
  })
};
</script>
<style lang="scss" scoped>
.card {
  background: #ffffff;
  border-radius: 20px;
}
.v-tabs-slider {
  background-color: currentColor;
  height: 100%;
  width: 80% !important;
  margin: auto !important;
}
.v-tabs-slider-wrapper {
  height: 5px;
  left: 375px;
  width: 100px;
}
.v-tab {
  align-items: center;
  display: flex;
  flex: 0 1 auto;
  font-size: 0.875rem;
  font-weight: 500;
  justify-content: center;
  letter-spacing: 0.0892857143em;
  line-height: normal;
  min-width: 90px;
  max-width: 360px;
  outline: none;
  padding: 0 2px;
  position: relative;
  text-align: center;
  text-decoration: none;
  text-transform: uppercase;
  transition: none;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}
.head {
  font-family: Roboto;
  font-style: normal;
  font-weight: bold;
  font-size: 24px;
  line-height: 28px;

  color: #000000;
}
.line {
  background: #f56068;
  border-radius: 50px;
  width: 5px;
  height: 100px;
}
.value {
  font-family: Roboto;
  font-style: normal;
  font-weight: 900;
  font-size: 48px;
  line-height: 56px;

  color: rgba(13, 0, 26, 0.2);
}
</style>