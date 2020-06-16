<template>
  <v-container>
    <v-row>
      <v-col></v-col>
    </v-row>
  </v-container>
</template>
<script>
export default {};
</script>
<style lang="scss">
.tm700-center {
  display: flex;
  flex-direction: column;
  align-items: stretch;
  align-self: end;
  @media screen and (min-width: 1200px) {
    align-self: center;
  }
  .tm700-center__inner {
    > div {
      h1 {
        font-size: 18px;
        line-height: 1.4;
        @media screen and (min-width: 768px) {
          font-size: 36px;
        }
      }
    }
  }
}
</style>
