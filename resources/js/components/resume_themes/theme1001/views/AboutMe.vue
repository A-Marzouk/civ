<template>
  <div class="about-me">
    <div class="about-me__header">
      <h2 class="about-me__title">Welcome to My profile!</h2>
    </div>

    <div class="about-me__detail">
      <div class="left-side">
        <div class="box" v-if="currentUser.personal_info.date_of_birth">
          <div class="title">Date of Birth</div>
          <div class="subtitle">
            {{ currentUser.personal_info.date_of_birth }}
          </div>
        </div>
        <div class="box" v-if="currentUser.personal_info.nationality">
          <div class="title">Nationality</div>
          <div class="subtitle">
            {{ currentUser.personal_info.nationality }}
          </div>
        </div>
        <div class="box" v-if="currentUser.personal_info.hometown">
          <div class="title">Hometown</div>
          <div class="subtitle">{{ currentUser.personal_info.hometown }}</div>
        </div>
        <div class="box" v-if="currentUser.languages[0]">
          <div class="title">Languages</div>
          <div
            class="subtitle"
            v-for="(language, i) in currentUser.languages"
            :key="i"
          >
            {{ language }}
          </div>
        </div>
      </div>
      <div class="right-side">
        <div
          class="box vertical-space"
          v-if="currentUser.personal_info.overview"
        >
          <div class="title">Overview Sumary</div>
          <div class="subtitle">
            {{ currentUser.personal_info.overview }}
          </div>
        </div>
        <div class="box" v-if="currentUser.personal_info.about">
          <div class="title">About Me</div>
          <div class="subtitle">
            {{ currentUser.personal_info.about }}
          </div>
        </div>
        <div class="box" v-if="currentUser.personal_info.quote">
          <div class="title">Quote</div>
          <div class="subtitle">{{ currentUser.personal_info.quote }}</div>
        </div>
        <div class="box" v-if="currentUser.personal_info.location">
          <div class="title">Location</div>
          <div class="subtitle">{{ currentUser.personal_info.location }}</div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "about-me",
  props: ["currentUser"],
};
</script>

<style lang="scss" scoped>
@import "./../scss/variables";

.left-side {
  width: 20%;
  height: auto;
  .box {
    width: 100%;
    padding-bottom: 2rem;
    .title {
      font-family: $muli;
      color: #f8ab08;
      font-size: 24px;
      line-height: 30px;
      font-weight: 500;
    }
    .subtitle {
      font-family: $muli;
      color: #cfd2df;
      font-size: 32px;
      line-height: 40px;
    }
  }
}
.right-side {
  width: 80%;
  height: auto;
  .box {
    width: 100%;
    padding-bottom: 3rem;
    .title {
      font-family: $muli;
      color: #172c7a;
      font-size: 30px;
      line-height: 40px;
      font-weight: bold;
      margin-bottom: 1.5rem;
    }
    .subtitle {
      font-family: $muli;
      color: #cfd2df;
      font-size: 20px;
      line-height: 26px;
    }
  }
}
@media (max-width: $md) {
  .left-side {
    width: 100%;
    height: auto;

    .box {
      width: 50%;
      float: left;
      padding-bottom: 0.8rem;
    }
  }
  .right-side {
    width: 100%;
    height: auto;

    .box {
      width: 100%;
      float: left;
      padding-bottom: 1rem;
    }
    .vertical-space {
      margin-top: 1.5rem;
    }
  }
}
@media (max-width: $sm) {
  .left-side {
    width: 100%;
    height: auto;

    .box {
      width: 50%;
      float: left;
      padding-bottom: 0.8rem;
      .title {
        font-size: 20px;
        line-height: 26px;
      }
      .subtitle {
        font-size: 26px;
        line-height: 30px;
      }
    }
  }
  .right-side {
    width: 100%;
    height: auto;

    .box {
      width: 100%;
      float: left;
      padding-bottom: 1rem;
      .title {
        font-size: 20px;
        line-height: 26px;
      }
      .subtitle {
        font-size: 20px;
        line-height: 26px;
      }
    }
    .vertical-space {
      margin-top: 1.5rem;
    }
  }
}

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
