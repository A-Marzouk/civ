<template>
  <div class="experience">
    <div
      class="item-view__wrapper"
      v-for="experience in work_experience"
      :key="experience.id"
      v-show="experience.is_public"
    >
      <ItemExpView :item="experience">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          width="44"
          height="44"
          viewBox="0 0 44 44"
        >
          <g transform="translate(0 0.118)">
            <g
              transform="translate(0 -0.118)"
              fill="#fff"
              stroke="#f8ab08"
              stroke-width="1"
            >
              <circle cx="22" cy="22" r="22" stroke="none" />
              <circle cx="22" cy="22" r="21.5" fill="none" />
            </g>
            <g transform="translate(9 9.157)">
              <g transform="translate(4 -31.824)">
                <g transform="translate(0 36.548)">
                  <path
                    d="M.681,110.315A2.225,2.225,0,0,0,0,111.946v8.585a2.224,2.224,0,0,0,.681,1.63,2.224,2.224,0,0,0,1.63.681h.66V109.634h-.66A2.224,2.224,0,0,0,.681,110.315Z"
                    transform="translate(0 -106.992)"
                    fill="#f8ab08"
                  />
                  <path
                    d="M118.882,37.539a.986.986,0,0,0-.99-.991h-5.944a.986.986,0,0,0-.991.991V39.19h-1.321V52.4H120.2V39.19h-1.321Zm-1.321,1.651h-5.283V37.869h5.283Z"
                    transform="translate(-105.673 -36.548)"
                    fill="#f8ab08"
                  />
                  <path
                    d="M431.691,110.315a2.225,2.225,0,0,0-1.63-.681h-.66v13.208h.66a2.325,2.325,0,0,0,2.311-2.311v-8.585A2.225,2.225,0,0,0,431.691,110.315Z"
                    transform="translate(-413.88 -106.992)"
                    fill="#f8ab08"
                  />
                </g>
              </g>
            </g>
          </g>
        </svg>
      </ItemExpView>
    </div>
  </div>
</template>

<script>
import ItemExpView from "./../components/ExperienceEducation/ItemExpView";

export default {
  name: "experience",

  components: { ItemExpView },
  props: ["work_experience"],
  data: () => {
    return {};
  }
};
</script>

<style lang="scss" scoped>
@import "./../scss/variables";

.experience {
  padding-top: 25px;
  padding-bottom: 25px;
}

.item-view__wrapper {
  padding-top: 25px;
  padding-bottom: 25px;
}

@media (min-width: $md) {
  .experience {
    width: 50%;
    padding-left: 0;
  }
}

@media (min-width: 1600px) {
  .item-view__wrapper {
    padding-top: 45px;
    padding-bottom: 45px;
  }
}
</style>
