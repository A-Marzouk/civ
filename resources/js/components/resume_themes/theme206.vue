<template>
  <v-app style="width:100%;">
    <v-container fluid ma-0 pa-0 style="width:100%;">
      <v-app-bar color="#fafafa" height="250">
        <v-avatar size="120" class>
          <v-img src="/images/resume_themes/theme206/avatar.png"></v-img>
        </v-avatar>
        <div class="half-circle"></div>
        <v-row class="mx-3">
          <v-col md="7">
            <v-card flat color="transparent">
              <v-card-title class="custom-profile-title">Hean Prinsloo</v-card-title>
              <v-card-subtitle class="custom-profile-subtitle">Graphic Designer</v-card-subtitle>
              <v-card-text
                class="custom-profile-text"
              >Donec a augue gravida, vulputate ligula et, pellentesque arcu. Morbi feugiat eros nec sem ultrices...</v-card-text>
            </v-card>
          </v-col>
          <v-col md="5">
            <v-card flat color="transparent">
              <div class="d-flex flex-row">
                <div class="mr-3 d-flex flex-column">
                  <div class="p-2"><v-icon>fa-dollar-sign</v-icon></div>
                  <div class="p-2">Flex item 1</div>
                </div>
                <div class="mr-3 d-flex flex-column">
                  <div class="p-2">Flex item 1</div>
                  <div class="p-2">Flex item 1</div>
                </div>

                <div class="mr-3 d-flex flex-column">
                  <div class="p-2">Flex item 1</div>
                  <div class="p-2">Flex item 1</div>
                </div>
              </div>
            </v-card>
          </v-col>
        </v-row>
      </v-app-bar>
    </v-container>
  </v-app>
</template>

<script>
export default {};
</script>

<style scoped lang="scss">
@import url("https://fonts.googleapis.com/css?family=Open+Sans&display=swap");
@import url("https://fonts.googleapis.com/css2?family=Poppins&display=swap");
.custom-profile-title {
  font-family: "Open Sans" !important;
  font-size: 2.5rem;
  line-height: 3.375rem;
  color: #333333 !important;
}

.custom-profile-subtitle {
  font-family: "Poppins", sans-serif !important;
  color: #333333 !important;
  font-size: 1.25rem !important;
  font-weight: bold;
  line-height: 1.875rem;
}

.custom-profile-text {
  font-family: "Poppins", sans-serif !important;
  color: #000000;
  font-size: 1.125rem;
  line-height: 1.6888rem;
}
</style>