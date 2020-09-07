<template>
  <div class="education">
    <div
      class="item-view__wrapper"
      v-for="education in educations"
      :key="education.id"
      v-show="education.is_public"
    >
      <ItemEduView :item="education">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          width="44"
          height="44"
          viewBox="0 0 44 44"
        >
          <g transform="translate(0 0.466)">
            <g
              transform="translate(0 -0.466)"
              fill="#fff"
              stroke="#f8ab08"
              stroke-width="1"
            >
              <circle cx="22" cy="22" r="22" stroke="none" />
              <circle cx="22" cy="22" r="21.5" fill="none" />
            </g>
            <g transform="translate(8 -152.813)">
              <path
                d="M168,404.869l-8.3-2.553v4.264c0,1.971,3.715,3.57,8.3,3.57s8.3-1.6,8.3-3.57c0-.016-.005-.031-.005-.046v-4.218Z"
                transform="translate(-154.092 -227.609)"
                fill="#f8ab08"
              />
              <path
                d="M0,171.771l2.964,1.06.253-.541,1.089-.093.155.162-.934.222-.136.4s-2.11,4.411-1.8,6.57a2.722,2.722,0,0,0,2.634,0l.35-5.9v-.491l1.96-.442-.138.341-1.461.475.676.241,8.3,2.553,8.3-2.553,5.609-2.006-13.9-5.35Z"
                transform="translate(0 0)"
                fill="#f8ab08"
              />
            </g>
          </g>
        </svg>
      </ItemEduView>
    </div>
  </div>
</template>

<script>
import ItemEduView from "./../components/ExperienceEducation/ItemEduView";

export default {
  name: "education",

  components: { ItemEduView },
  props: ["educations"],
  data: () => {
    return {};
  }
};
</script>

<style lang="scss" scoped>
@import "./../scss/variables";

.education {
  padding-top: 25px;
  padding-bottom: 25px;
}

.item-view__wrapper {
  width: 50%;
  float: left;
  padding-top: 25px;
  padding-bottom: 25px;
}

@media (min-width: $md) {
  .education {
    width: 100%;
    padding-left: unset;
  }
}

@media (min-width: 1600px) {
  .item-view__wrapper {
    width: 50%;
    float: left;
    padding-top: 45px;
    padding-bottom: 45px;
  }
}
@media (max-width: 500px) {
  .item-view__wrapper {
    width: 75%;
    float: left;
    padding-top: 45px;
    padding-bottom: 45px;
  }
}
</style>
