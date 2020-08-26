<template>
  <div
    class="pa-xl-4 pa-lg-4 pa-md-4 pa-sm-12 pa-3"
    v-if="achievement.is_public"
  >
    <v-card
      class="card-achievement pa-5"
      flat
      style="border: 1px solid rgba(16, 78, 251, 0.2);"
    >
      <div
        :class="windowWidth <= 599 ? 'd-flex flex-column' : 'd-flex flex-row'"
      >
        <img
          style="width: 320px;"
          :src="achievement.image_src"
          alt="certificate"
        />
        <div class="ml-5 mt-sm-0 mt-5">
          <div class="title">{{ achievement.title }} {{ windowWidth }}</div>
          <div class="url">
            <span>URL:</span> {{ achievement.url }}
            award
          </div>
          <div class="desc">
            <span>Description:</span>
            {{ achievement.description }}
          </div>
        </div>
      </div>
    </v-card>
  </div>
</template>

<script>
export default {
  props:["achievement"]
    
}
</script>
<style lang="scss" scoped>
//card achievement
.card-achievement {
  width: 810px;
  height: 297px;
  border: 1px solid rgba(16, 78, 251, 0.2);
  @media screen and (max-width: 1903px) {
    width: auto;
    height: auto;
  }
  .title {
    font-family: "Raleway" !important;
    font-style: normal;
    font-weight: 500;
    font-size: 24px;
    line-height: 28px;
    color: #104efb !important;
  }
  .url {
    font-family: "Raleway" !important;
    font-style: normal;
    font-weight: normal;
    font-size: 14px;
    line-height: 16px;
    color: #104efb;
    margin-top: 10px;
    span {
      font-weight: 500;
    }
  }
  .desc {
    font-family: "Raleway" !important;
    font-style: normal;
    font-weight: normal;
    font-size: 16px;
    line-height: 25px;
    color: #104efb !important;
    margin-top: 10px;
    span {
      font-weight: 500;
    }
  }
}
//card achievement
</style>