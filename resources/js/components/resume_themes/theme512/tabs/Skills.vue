<template>
  <v-container fluid pa-0>
    <v-row no-gutters justify-lg="center">
      <v-col cols="12" lg="7" xl="6">
        <v-tabs
          grow
          centered
          background-color="transparent"
          v-model="skillTab"
          slider-color="#2bf1e9"
          slider-size="3"
          show-arrows
          dark
        >
          <template v-slot:next-icon>
            <v-icon class="red--text">mdi-arrow-left</v-icon>
          </template>
          <v-tab
            class="skillTab-title text-capitalize"
            v-for="(sT, i) in skillTabs"
            :key="i"
          >
            {{ sT.title }}
          </v-tab>
        </v-tabs>
        <v-tabs-items v-model="skillTab" style="background-color:transparent;">
          <v-tab-item v-for="(sT, i) in skillTabs" :key="i">
            <v-container fluid pa-0>
              <v-row no-gutters justify="center">
                <v-col cols="auto" align="center" justify="center">
                  <div class="pt-12 pb-8">
                    <v-btn
                      fab
                      class="skill-border mx-4"
                      outlined
                      color="#100083"
                      v-for="(skill, index) in sT.skills"
                      :key="index"
                      :width="skillBtnSize"
                      :height="skillBtnSize"
                    >
                      <v-img
                        :src="skill.src"
                        :max-width="skillBtnImgSize"
                        contain
                      ></v-img>
                    </v-btn>
                  </div>
                </v-col>
              </v-row>
            </v-container>
          </v-tab-item>
        </v-tabs-items>
      </v-col>
    </v-row>
  </v-container>
</template>
<script>
export default {
  data: () => ({
    skillTab: 0,
    skillTabs: [
      {
        title: "Programming Languages",
        skills: [
          { src: "/images/resume_themes/theme512/PS.png" },
          { src: "/images/resume_themes/theme512/Ai.png" },
          { src: "/images/resume_themes/theme512/Xd.png" },
          { src: "/images/resume_themes/theme512/Lr.png" },
          { src: "/images/resume_themes/theme512/Id.png" }
        ]
      },
      {
        title: "Frameworks/Databases",
        skills: [
          { src: "/images/resume_themes/theme512/PS.png" },
          { src: "/images/resume_themes/theme512/Ai.png" },
          { src: "/images/resume_themes/theme512/Id.png" },
          { src: "/images/resume_themes/theme512/Lr.png" },
          { src: "/images/resume_themes/theme512/Xd.png" }
        ]
      },
      {
        title: "Design Skills",
        skills: [
          { src: "/images/resume_themes/theme512/PS.png" },
          { src: "/images/resume_themes/theme512/Ai.png" },
          { src: "/images/resume_themes/theme512/Id.png" },
          { src: "/images/resume_themes/theme512/Lr.png" },
          { src: "/images/resume_themes/theme512/Xd.png" }
        ]
      },
      {
        title: "Software",
        skills: [
          { src: "/images/resume_themes/theme512/PS.png" },
          { src: "/images/resume_themes/theme512/Ai.png" },
          { src: "/images/resume_themes/theme512/Id.png" },
          { src: "/images/resume_themes/theme512/Lr.png" },
          { src: "/images/resume_themes/theme512/Xd.png" }
        ]
      }
    ]
  }),

  computed: {
    skillBtnSize() {
      switch (this.$vuetify.breakpoint.name) {
        case "xs":
          return 40;
        case "sm":
          return 40;
        case "lg":
          return 50;
      }
    },
    skillBtnImgSize() {
      switch (this.$vuetify.breakpoint.name) {
        case "xs":
          return 18;
        case "sm":
          return 18;
        case "lg":
          return 18;
        case "xl":
          return 24;
      }
    }
  }
};
</script>
<style lang="scss" scoped>
.skillTab-title {
  font-family: "Archivo", sans-serif;
  font-style: normal;
  font-weight: 600;
  font-size: 0.9rem;
  line-height: 22px;
}
.v-tab--active {
  color: #2bf1e9 !important;
}
.v-tab:not(.v-tab--active) {
  color: #dc266c !important;
}
.skill-border {
  background: #100083;
  border: 2px solid #51e9f1;
  box-sizing: border-box;
  box-shadow: 0px 4px 30px #0902de !important;
  border-radius: 50px;
}
</style>