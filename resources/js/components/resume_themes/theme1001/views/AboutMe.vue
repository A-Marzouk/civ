<template>
  <div class="about-me">
    <div class="about-me__header">
      <h2 class="about-me__title">Welcome to My profile!</h2>
    </div>

    <div class="about-me__detail">
      <div class="detail__paragraph">
        {{ currentUser.personal_info.about }}
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "about-me",
  props: ["currentUser"]
};
</script>

<style lang="scss" scoped>
@import "./../scss/variables";

.about-me {
  font-family: $muli;
  padding-top: 90px;
  padding-bottom: 90px;
  max-width: 540px;
  margin-left: auto;
  margin-right: auto;

  .about-me__header {
    .about-me__title {
      color: #0a4fbc;
      font-size: 18px;
      line-height: 24px;
      font-weight: 500;
    }
  }

  .about-me__detail {
    padding-top: 30px;

    .detail__paragraph {
      color: #616887;
      font-size: 13px;
      line-height: 26px;
      font-weight: 300;
      margin-bottom: 18px;
      max-width: 540px;
    }
  }
}

@media (min-width: $md) {
  .about-me {
    display: flex;
    max-width: 852px;

    .about-me__header {
      width: 275px;

      .about-me__title {
        font-size: 26px;
        line-height: 31px;
        width: 150px;
      }
    }

    .about-me__detail {
      width: calc(100% - 275px);
      padding-top: unset;
    }
  }
}

@media (min-width: $lg) {
  .about-me {
    max-width: 1368px;
    .about-me__header {
      width: 33.3333%;
    }

    .about-me__detail {
      display: flex;
      flex-wrap: wrap;
      width: 66.6666%;

      .detail__paragraph {
        width: 50%;
        font-size: 12px;
        padding-left: 15px;
        padding-right: 15px;
      }
    }
  }
}

@media (min-width: 1600px) {
  .about-me {
    .about-me__header {
      .about-me__title {
        width: 234px;
        font-size: 40px;
        line-height: 58px;
      }
    }

    .about-me__detail {
      .detail__paragraph {
        font-size: 18px;
        line-height: 32px;
        margin-bottom: 45px;
      }
    }
  }
}
</style>
