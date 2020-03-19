<template>
  <v-container style="max-width: 1785px;" v-if="user">
    <v-layout align-center justify-center>
      <v-flex xs12>
        <v-card flat>
          <v-card-title class="justify-center hidden-sm-and-down">
            <h1 class="title-header">About</h1>
          </v-card-title>

          <v-card-title class="hidden-md-and-up">
            <h1 class="title-header">About</h1>
          </v-card-title>

          <v-card-text>
            <p class="about-p">
                {{user.personal_info.about}}
            </p>
          </v-card-text>
        </v-card>
      </v-flex>
    </v-layout>
  </v-container>
</template>

<script>
export default {
  name: "About",
    data(){
      return{

      }
    },
    computed: {
        user() {
            return this.$store.state.themeUser;
        }
    },
};
</script>

<style>
h1 {
  font-family: Open Sans;
  font-style: normal;
  font-weight: bold;
  font-size: 40px;
  line-height: 41px;
  color: #1d1d1d;
}

.about-p {
  height: 138px;
  left: 21.82%;
  right: 21.82%;
  top: 639px;

  font-style: normal;
  font-weight: 300;
  font-size: 18px;
  line-height:28px;
  /* or 107% */

  text-align: center;
  color: #1d1d1d;
}

@media screen and (max-width: 800px) {
  .about-p {
    text-align: left;
  }
}
</style>
