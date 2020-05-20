<template>
  <v-container style="max-width: 1785px; !important" v-if="skills">
    <v-row align="center" justify="center">
      <!-- shows only on tabs and desktop -->
      <v-col md="8" class="skills-middle hidden-xs-only">
        <v-card flat>
          <v-row class="skills" v-for="(skill,index) in skills" :key="index + '_skill'">
            <v-col cols="12" sm="3" md="3" class="skills-text" align="center">{{skill.title}}</v-col>
            <v-col cols="12" sm="7" md="7">
              <v-row align="center" class="mx-0">
                <v-progress-linear color="rgba(92,92,92,1)" height="11" :value="skill.percentage"></v-progress-linear>
              </v-row>
            </v-col>
            <v-col cols="12" sm="2" md="2" class="skills-text">
              <div class="skills-percent">{{skill.percentage}}%</div>
            </v-col>
          </v-row>
        </v-card>
      </v-col>
      <!-- shows only on tabss and desktops -->
      <v-col cols="12" class="hidden-sm-and-up">
        <v-card flat>
          <v-row class="skills" v-for="(skill,index) in skills" :key="index + '_skill'">
            <v-col cols="6" class="skills-text">{{skill.title}}</v-col>
            <v-col cols="6" class="skills-text">
              <div class="skills-percent">{{skill.percentage}}%</div>
            </v-col>
            <v-col cols="12">
              <v-row align="center" class="mx-0">
                <v-progress-linear color="rgba(92,92,92,1)" height="11" :value="skill.percentage"></v-progress-linear>
              </v-row>
            </v-col>
          </v-row>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
export default {
  name: "Skills",
  computed:{
    skills(){
      return this.$store.state.themeUser.skills ;
    }
  }
};
</script>

