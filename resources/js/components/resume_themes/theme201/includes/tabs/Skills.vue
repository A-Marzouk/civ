<template>
  <v-container style="max-width: 1785px; !important">
    <v-row wrap>
      <!-- shows only on tabs and desktop -->
      <v-flex md8 class="skills-middle hidden-xs-only">
        <v-card flat>
          <v-layout row class="skills" >
            <v-flex xs12 sm3 md3 class="skills-text" align="center">Photoshop</v-flex>
            <v-flex xs12 sm7 md7>
              <v-row align="center" class="mx-0">
                <v-progress-linear color="black" height="11" value="90"></v-progress-linear>
              </v-row>
            </v-flex>
            <v-flex xs12 sm2 md2 class="skills-text">
              <div class="skills-percent">90%</div>
            </v-flex>
          </v-layout>

          <v-layout row class="skills">
            <v-flex xs12 sm3 md3 class="skills-text">Photoshop</v-flex>
            <v-flex xs12 sm7 md7>
              <v-row align="center" class="mx-0">
                <v-progress-linear color="black" height="11" value="90"></v-progress-linear>
              </v-row>
            </v-flex>
            <v-flex xs12 sm2 md2 class="skills-text">
              <div class="skills-percent">90%</div>
            </v-flex>
          </v-layout>

          <v-layout row class="skills">
            <v-flex xs12 sm3 md3 class="skills-text">Photoshop</v-flex>
            <v-flex xs12 sm7 md7>
              <v-row align="center" class="mx-0">
                <v-progress-linear color="black" height="11" value="90"></v-progress-linear>
              </v-row>
            </v-flex>
            <v-flex xs12 sm2 md2 class="skills-text">
              <div class="skills-percent">90%</div>
            </v-flex>
          </v-layout>

          <v-layout row class="skills">
            <v-flex xs12 sm3 md3 class="skills-text">Photoshop</v-flex>
            <v-flex xs12 sm7 md7>
              <v-row align="center" class="mx-0">
                <v-progress-linear color="black" height="11" value="90"></v-progress-linear>
              </v-row>
            </v-flex>
            <v-flex xs12 sm2 md2 class="skills-text">
              <div class="skills-percent">90%</div>
            </v-flex>
          </v-layout>
        </v-card>
      </v-flex>
      <!-- shows only on tabss and desktops -->

      <v-flex xs12 class="hidden-sm-and-up">
        <v-card flat>
          <!-- 1st -->
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
          <!-- 1st -->

          <!-- 2nd -->
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
          <!-- 2nd -->

          <!-- 3rd -->
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
          <!-- 3rd -->

          <!-- 4th -->
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
          <!-- 4th -->
        </v-card>
      </v-flex>
    </v-row>
  </v-container>
</template>

<script>
export default {
  name: "Skills"
};
</script>

