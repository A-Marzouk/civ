<template>
  <v-container fluid pa-0>
    <v-row>
      <v-col></v-col>
    </v-row>
  </v-container>
</template>

<script>
export default {};
</script>

<style lang="scss">
.tm700-media {
  --column-start: 2;
  --column-end: 3;
  --row-start: 2;
  --row-end: 3;
  grid-column-start: var(--column-start);
  grid-column-end: var(--column-end);
  grid-row-start: var(--row-start);
  grid-row-end: var(--row-start);
  align-self: start;
  padding-top: 19px;
  @media only screen and (min-width: 768px) {
    --column-start: 3;
    --column-end: 4;
    --row-start: 1;
    --row-end: 2;
    align-self: end;
    padding-top: 0;
  }
  @media only screen and (min-width: 1200px) {
    --column-start: 2;
    --column-end: 3;
    --row-start: 2;
    --row-end: 3;
    align-self: start;
  }
  > div {
    display: flex;
    align-items: center;
    a {
      border-radius: 9999px;
      background-color: var(--gray-3);
      margin-right: 12px;
      padding: 1rem;
      display: flex;
      align-items: center;
      justify-content: center;
      @media screen and (min-width: 768px) {
        padding: 1.25rem;
      }
      @media screen and (min-width: 992px) {
        margin-left: 0;
        margin-right: 25px;
        padding: 13px;
      }
      // Mail icon
      --width: 48px;
      --height: 48px;
      width: var(--width);
      height: var(--height);
      @media screen and (min-width: 768px) {
        --width: 57px;
        --height: 57px;
      }
      svg {
        --min-width: 19px;
        --min-height: 17px;
        min-width: var(--min-width);
        min-height: var(--min-height);
        @media screen and (min-width: 768px) {
          --min-width: 22px;
          --min-height: 20px;
        }
      }
      &.tm700-media__mail {
        // get the first proprieties without setting up
      }
      // video player icon
      &.tm700-video__player {
        --width: 35px;
        --height: 34px;
        @media screen and (min-width: 768px) {
          --width: 41px;
          --height: 40px;
        }
        svg {
          --min-width: 15px;
          --min-height: 11px;
          @media screen and (min-width: 768px) {
            --min-width: 17px;
            --min-height: 13px;
          }
        }
      }
      &.tm700-headphones {
        --width: 35px;
        --height: 34px;
        @media screen and (min-width: 768px) {
          --width: 42px;
          --height: 40px;
        }
        svg {
          --min-width: 14px;
          --min-height: 13px;
          @media screen and (min-width: 768px) {
            --min-width: 17px;
            --min-height: 16px;
          }
        }
      }
    }
  }
}
</style>