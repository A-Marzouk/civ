<template>
  <div class="skills-languages">
    <div class="skills-languages__header">
      <div class="header__title">Skills</div>
      <div class="header__hint">What I bring to the table</div>
    </div>

    <div class="skills-languages__body">
      <div class="skills">
        <div
          class="item-view__wrapper"
          v-for="skill in currentUser.skills"
          v-show="skill.is_public"
          :key="`skill-${skill.id}`"
        >
          <ItemSkillView :title="skill.title" :progress="skill.percentage" />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import ItemSkillView from "./../components/SkillsLanguage/ItemSkillView";
import ItemLangView from "./../components/SkillsLanguage/ItemLangView";

export default {
  name: "skills-languages",
  props: ["currentUser"],
  components: { ItemSkillView, ItemLangView },

  data: () => {
    return {
      skills: [
        {
          id: 1,
          name: "Adobe Sketch",
          progress: 95
        },
        {
          id: 2,
          name: "Adobe XD",
          progress: 75
        },
        {
          id: 3,
          name: "Adobe Photoshop",
          progress: 75
        },
        {
          id: 4,
          name: "Adobe Illustrator",
          progress: 75
        },
        {
          id: 5,
          name: "Adobe After Effect",
          progress: 75
        },
        {
          id: 6,
          name: "Adobe Indesign",
          progress: 75
        },
        {
          id: 7,
          name: "Figma",
          progress: 75
        }
      ],
      languages: [
        {
          id: 1,
          name: "English",
          progress: 75
        },
        {
          id: 2,
          name: "French",
          progress: 75
        }
      ]
    };
  }
};
</script>

<style lang="scss" scoped>
@import "./../scss/variables";

.skills-languages {
  padding-top: 35px;
  padding-bottom: 35px;
  max-width: $sm;
  font-family: $muli;
  margin-left: auto;
  margin-right: auto;

  .skills-languages__header {
    .header__title {
      color: #172c7a;
      font-weight: 700;
      font-size: 18px;
      line-height: 18px;
    }

    .header__hint {
      color: #bec2d4;
      font-size: 11px;
      line-height: 13px;
      padding-top: 10px;
      text-transform: capitalize;
      font-style: italic;
      font-weight: 300;
    }
  }

  .skills-languages__body {
    .skills,
    .languages {
      padding-top: 35px;
      padding-bottom: 35px;
    }

    .item-view__wrapper {
      padding-top: 18px;
      padding-bottom: 18px;
    }

    .hr-separator {
      background: #d3d6e4;
      margin-top: 10px;
      margin-bottom: 10px;
    }
  }
}

@media (min-width: $sm) {
  .skills-languages {
    .skills-languages__header {
      .header__title {
        font-size: 20px;
        line-height: 20px;
      }

      .header__hint {
        font-size: 12.5px;
        padding-top: 12px;
      }
    }
  }
}

@media (min-width: $md) {
  .skills-languages {
    max-width: 775px;

    .skills-languages__header {
      .header__title {
        font-size: 30px;
        line-height: 24px;
      }

      .header__hint {
        padding-top: 18px;
        font-size: 19px;
        line-height: 24px;
      }
    }

    .skills-languages__body {
      .skills,
      .languages {
        display: flex;
        flex-wrap: wrap;
        margin-left: -35px;
        margin-right: -35px;
      }

      .item-view__wrapper {
        width: 50%;
        padding-left: 35px;
        padding-right: 35px;
      }
    }
  }
}

@media (min-width: $lg) {
  .skills-languages {
    max-width: 1305px;

    .skills-languages__body {
      .skills,
      .languages {
        margin-left: -53px;
        margin-right: -53px;
        padding-top: 45px;
        padding-bottom: 45px;
      }

      .item-view__wrapper {
        padding-left: 53px;
        padding-right: 53px;
      }
    }
  }
}

@media (min-width: 1600px) {
  .skills-languages {
    padding-top: 65px;
    padding-bottom: 65px;

    .skills-languages__header {
      .header__title {
        font-size: 42px;
        line-height: 42px;
      }

      .header__hint {
        font-size: 24px;
        line-height: 40px;
      }
    }

    .skills-languages__body {
      padding-top: 30px;
      padding-bottom: 30px;

      .skills,
      .languages {
        margin-left: -80px;
        margin-right: -80px;
      }

      .item-view__wrapper {
        padding-left: 80px;
        padding-right: 80px;
        padding-top: 30px;
        padding-bottom: 30px;
      }
    }
  }
}
</style>
