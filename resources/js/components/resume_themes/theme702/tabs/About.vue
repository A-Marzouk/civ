<template>
  <div class="tm702-about" v-if="currentTab === 1">
    <div class="tm702-about-container">
      <h1>About</h1>
      <div>
        <p>I'm Conor, I'm a product manager from London. I'm currently looking for new permanent job opportunities within London area that will allow my career to develop...</p>
        <p>I'm Conor, I'm a product manager from London. I'm currently looking for new permanent job opportunities within London area that will allow my career to develop...</p>
        <p>I'm Conor, I'm a product manager from London. I'm currently looking for new permanent job opportunities within London area that will allow my career to develop...</p>
        <p>I'm Conor, I'm a product manager from London. I'm currently looking for new permanent job opportunities within London area that will allow my career to develop...</p>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props: ["currentTab"]
};
</script>
<style lang="scss">
.tm702-about {
  .tm702-about-container {
    margin-top: 61px;
    padding-left: 12px;
    padding-right: 26px;
    @media screen and(min-width: 768px) {
      margin-top: 52px;
      padding-left: 34px;
      padding-right: 39px;
    }
    @media screen and(min-width: 1200px) {
      margin-top: 102px;
      text-align: center;
    }
  }

  h1 {
    color: var(--blue);
    font-size: 18px;
    line-height: 25px;
    font-weight: bold;
    margin-bottom: 23px;
    font-style: normal;
    @media screen and (min-width: 768px) {
      font-size: 36px;
      line-height: 42px;
    }
    @media screen and (min-width: 1200px) {
      font-size: 30px;
      line-height: 41px;
    }
  }

  p {
    margin-bottom: 10px;
    font-style: normal;
    font-weight: normal;
    font-size: 14px;
    line-height: 19px;
    color: var(--gray-about);
    @media screen and (min-width: 768px) {
      font-size: 18px;
      line-height: 25px;
    }
    @media screen and (min-width: 1200px) {
      font-size: 14px;
      line-height: 15px;
    }
  }
}
</style>
