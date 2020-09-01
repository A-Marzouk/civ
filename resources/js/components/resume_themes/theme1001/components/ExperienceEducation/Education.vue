<template>
  <div>
    <div class="tab-navigation">
      <div class="tab-item">
        <div class="tab-action">
          <div
            class="tab-item__option"
            :class="{ active: activeTab === 'education' }"
            @click="activeTab = 'education'"
          >
            <div>
              <h3 class="option__title">Education</h3>
              <div class="option__hint">Where I've learned</div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div :class="{ education: windowWidth >= 768 }">
      <Education
        :educations="currentUser.education"
        v-if="activeTab === 'education' || windowWidth >= 768"
      />
    </div>
  </div>
</template>

<script>
import Education from "./../../views/Education";
import Experience from "./../../views/Experience";

export default {
  name: "education",

  components: { Education, Experience },
  props: ["currentUser"],
  data: () => {
    return {
      activeTab: "education",
      windowWidth: 0
    };
  },

  methods: {
    onResize() {
      this.windowWidth = window.innerWidth;
    }
  },

  mounted() {
    this.onResize();
    window.addEventListener("resize", this.onResize);
  },

  beforeDestroy() {
    window.removeEventListener("resize", this.onResize);
  }
};
</script>

<style lang="scss" scoped>
@import "./../../scss/variables";
.tab-navigation {
  display: flex;
  justify-content: space-between;
  font-family: $muli;
}

.tab-action {
  width: 100%;
  padding: 15px 10px;
  max-width: 125px;
  text-align: left;

  &:focus {
    outline: none;
    background: transparent;
  }
}

.tab-item__option {
  position: relative;
  display: flex;
  flex-direction: column;
  align-items: center;
  padding: 10px 5px;

  &::after {
    content: "";
    width: 100%;
    height: 2px;
    border-radius: 1px;
    background: transparent;
    position: absolute;
    bottom: 0;
    left: 0;
    transition: all 0.3s;
  }

  &.active::after {
    background: #0a4fbc;
  }

  .option__title {
    color: rgba(10, 79, 188, 0.76);
    font-size: 18px;
    line-height: 18px;
    font-weight: 700;
  }

  &.active .option__title {
    color: rgba(10, 79, 188, 1);
  }

  .option__hint {
    color: #bec2d4;
    font-size: 11px;
    font-weight: 300;
    font-style: italic;
    text-transform: capitalize;
    line-height: 13px;
    padding-top: 10px;
  }

  &.active {
    .option__title {
      color: #0a4fbc;
    }

    &::after {
      background: #0a4fbc;
    }
  }
}

.tab-navigation,
.experience-education {
  max-width: 687px;
  margin: 0 auto;
}

.experience-education {
  display: flex;
}

@media (min-width: $md) {
  .tab-navigation {
    padding-top: 25px;
  }

  .tab-item {
    width: 100%;
  }

  .tab-action {
    padding: unset;
    max-width: unset;
  }

  .tab-item__option {
    padding: unset;
    align-items: start;

    &::after {
      content: none;
    }

    .option__title {
      color: rgba(10, 79, 188, 1);
      font-size: 24px;
      line-height: 24px;
    }

    .option__hint {
      font-size: 13px;
      line-height: 20px;
    }
  }
}

@media (min-width: $lg) {
  .tab-navigation {
    padding-top: 35px;
  }

  .tab-item__option {
    .option__title {
      font-size: 26px;
      line-height: 26px;
    }

    .option__hint {
      font-size: 14px;
      line-height: 24px;
    }
  }
}

@media (min-width: 1600px) {
  .tab-navigation {
    padding-top: 65px;
  }

  .tab-navigation,
  .experience-education {
    max-width: 1298px;
  }

  .tab-item__option {
    .option__title {
      font-size: 42px;
      line-height: 42px;
    }

    .option__hint {
      padding-top: 18px;
      font-size: 23px;
      line-height: 40px;
    }
  }
}
</style>
