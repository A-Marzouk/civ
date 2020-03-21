<template>
  <v-container style="max-width: 1785px; !important" v-if="skills">
    <v-row wrap>
      <!-- shows only on tabs and desktop -->
      <v-flex md8 class="skills-middle hidden-xs-only">
        <v-card flat>
          <v-layout row class="skills" v-for="(skill,index) in skills" :key="skill.id">
            <v-flex xs12 sm3 md3 class="skills-text" align="center">{{skill.title}}</v-flex>
            <v-flex xs12 sm7 md7>
              <v-row align="center" class="mx-0">
                <v-progress-linear color="black" height="11" :value="skill.percentage"></v-progress-linear>
              </v-row>
            </v-flex>
            <v-flex xs12 sm2 md2 class="skills-text">
              <div class="skills-percent">{{skill.percentage}}%</div>
            </v-flex>
          </v-layout>
        </v-card>
      </v-flex>

      <v-flex xs12 class="hidden-sm-and-up">
        <v-card flat>
          <v-layout row class="skills">
            <v-flex xs6 class="skills-text">Photoshop</v-flex>
            <v-flex xs6 class="skills-text">
              <div class="skills-percent">90%</div>
            </v-flex>
            <v-flex xs12>
              <v-row align="center" class="mx-0">
                <v-progress-linear color="black" height="11" value="90"></v-progress-linear>
              </v-row>
            </v-flex>
          </v-layout>
        </v-card>
      </v-flex>
    </v-row>
  </v-container>
</template>

<script>
export default {
  name: "Skills",
  data(){
    return{

    }
  },
  computed:{
    skills(){
      return this.$store.state.themeUser.skills ;
    }
  }
};
</script>

<style>

</style>
