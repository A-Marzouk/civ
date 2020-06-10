<template>
  <div>
    <v-container fluid class="pa-0">
      <v-row no-gutters justify="center">
        <!-- left -->
        <v-col cols="12" sm="12" lg="8">
          <Left />
          <!-- center -->
        </v-col>
        <!-- <v-col cols="1">
          <Center />
        </v-col>-->
        <!-- Media -->
        <!-- <v-col>
          <Media />
        </v-col>-->
        <!-- social media -->
        <!-- <v-col>
          <SocialMedia />
        </v-col>-->
        <!-- right -->
        <v-col cols="12" sm="8" lg="4" class="ml-lg-auto">
          <Right />
        </v-col>
      </v-row>
    </v-container>
  </div>
</template>
<script>
import Left from "./header/Left";
import Right from "./header/Right";
import Center from "./header/Center";
import Media from "./header/Media";
import SocialMedia from "./header/SocialMedia";
export default {
  components: {
    Left,
    Right,
    Center,
    Media,
    SocialMedia
  },
  data() {
    return {
      logo: "/images/resume_themes/theme700/header-icon.png"
    };
  }
};
</script>
<style lang="scss" scoped>
</style>
