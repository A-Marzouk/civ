<template>
  <div class="about-me">
    <div class="about-me__detail">
      <div class="left-side">
        <div class="box">
          <div class="title">Date of Birth</div>
          <div class="subtitle">01/14/90</div>
        </div>
        <div class="box">
          <div class="title">Nationality</div>
          <div class="subtitle">Ukrainian</div>
        </div>
        <div class="box">
          <div class="title">Hometown</div>
          <div class="subtitle">Kiev</div>
        </div>
        <div class="box">
          <div class="title">Languages</div>
          <div class="subtitle">English</div>
          <div class="subtitle">Arabic</div>
          <div class="subtitle">Franch</div>
        </div>
      </div>
      <div class="right-side">
        <div class="box vertical-space">
          <div class="title">Overview Sumary</div>
          <div class="subtitle">
            В работе дизайнера есть много пространства для креатива, но это
            только на первый взгляд кажется, что такие специалисты полагаются
            исключительно на фантазию.
          </div>
        </div>
        <div class="box">
          <div class="title">About Me</div>
          <div class="subtitle">
            В работе дизайнера есть много пространства это только на кажется,
            что такие специалисты полагаются исключительно на фантазию.
          </div>
        </div>
        <div class="box">
          <div class="title">Quote</div>
          <div class="subtitle">B создавать графический контент.</div>
        </div>
        <div class="box">
          <div class="title">Location</div>
          <div class="subtitle">Ireland, Dublin</div>
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
.left-side {
  width: 20%;
  height: auto;
  .box {
    width: 100%;
    padding-bottom: 1rem;
    .title {
      color: #005bd1;
      font-size: 24px;
      line-height: 30px;
      font-weight: 500;
    }
    .subtitle {
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
    padding-bottom: 1rem;
    .title {
      color: #005bd1;
      font-size: 30px;
      line-height: 40px;
      font-weight: bold;
      margin-bottom: 0.5rem;
    }
    .subtitle {
      color: #cfd2df;
      font-size: 20px;
      line-height: 26px;
    }
  }
}
@media (max-width: 768px) {
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
@media (max-width: 600px) {
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
  margin-left: auto;
  margin-right: auto;
  padding: 0px 0px;
  border-radius: 0px;
  background: transparent;

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

@media (min-width: 768px) {
  .about-me {
    display: flex;
    max-width: 852px;
    padding: 40px 34px;
    border-radius: 20px;
    background: #333232;

    .about-me__detail {
      padding-top: unset;
    }
  }
}

@media (min-width: 1600px) {
  .about-me {
    max-width: 1368px;
    padding: 40px 34px;
    border-radius: 20px;
    background: #333232;

    .about-me__detail {
      display: flex;
      flex-wrap: wrap;

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
