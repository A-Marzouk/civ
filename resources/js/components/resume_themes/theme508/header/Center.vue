<template>
  <v-container class="mt-n6 pa-0">
    <v-row no-gutters>
      <v-col v-for="n in 3" :key="n" cols="12" sm="4" md="12" class="grey lighten-5">
        <v-card class="pa-2" outlined tile>One of three columns</v-card>
      </v-col>
    </v-row>
  </v-container>
</template>
<style lang="scss" scoped>
</style>