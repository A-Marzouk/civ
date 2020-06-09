<template>
  <v-container fluid class="back">
    <v-row no-gutters>
      <!-- mobile -->

      <v-col lg="5" md="5" sm="5" cols="12">
        <v-row no-gutters>
          <v-col cols="12" class="hidden-sm-and-up">
            <v-row no-gutters justify="space-between">
              <v-col cols="2">
                <div class="subtitle-1 white--text ml-4">9:41</div>
              </v-col>
              <v-col cols="3" align="end">
                <v-img
                  v-for="(m,i) in mobile"
                  :key="i"
                  :src="m.icon"
                  :height="m.height"
                  :width="m.width"
                  class="d-inline-block ml-1"
                ></v-img>
              </v-col>
            </v-row>
          </v-col>
          <v-col cols="12" class="hidden-sm-and-up mt-6">
            <v-row no-gutters justify="space-between">
              <v-col cols="2" align="center">
                <v-img src="/images/resume_themes/theme508/menu.svg" width="17.65" height="12.35"></v-img>
              </v-col>
              <v-col cols="4" align="center">
                <div class="subtitle-2 white--text">MY RESUME</div>
              </v-col>
              <v-col cols="2" align="center">
                <v-img src="/images/resume_themes/theme508/close.svg" width="20.73" height="20.73"></v-img>
              </v-col>
            </v-row>
          </v-col>
        </v-row>
        <!-- left -->
        <Left />
      </v-col>
      <v-col lg="4" md="4" sm="4" cols="12" class="hidden-xs-only">
        <!-- center -->
        <Center />
      </v-col>
      <v-col lg="3" md="3" sm="3" class="ml-auto mr-8 mr-sm-0 mr-md-0 pl-sm-2 hidden-xs-only">
        <!-- right -->
        <Right />
      </v-col>
    </v-row>
  </v-container>
</template>


<script>
import Left from "./header/Left";
import Right from "./header/Right";
import Center from "./header/Center";
export default {
  components: { Left, Right, Center },
  data() {
    return {
      mobile: [
        {
          icon: "/images/resume_themes/theme508/mob_net.svg",
          height: "11.76",
          width: "18.75"
        },
        {
          icon: "/images/resume_themes/theme508/wifi.svg",
          height: "12.09",
          width: "16.84"
        },
        {
          icon: "/images/resume_themes/theme508/battery.svg",
          height: "12.5",
          width: "26.83"
        }
      ]
    };
  }
};
</script>

<style lang="scss" scoped>
.back {
  background: linear-gradient(to right, #7a39db, #6048ff);
}
@media only screen and (max-width: 425px) {
  .back {
    background: linear-gradient(to bottom, #7a39db, #6048ff);
    font-family: "'SF UI Text Regular'";
  }
}
</style>