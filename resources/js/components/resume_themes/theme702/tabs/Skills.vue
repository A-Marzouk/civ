<template>
  <div class="tm702-skill--proglang" v-if="currentTab === 5">
    <div class="tm702-skill-proglang--inner">
      <div
        v-for="{id, name, percentage} in programingLanguages"
        :key="id"
        class="tm702-skill-proglangs"
      >
        <span class="tm702-skill-proglangs--name">{{name}}</span>
        <span
          class="tm702-skill-proglangs--bar"
          :class="['tm702-skill-proglangs--bar', idIsPair(id) ? 'tm702-skill-proglangs-bar--pair' : 'tm702-skill-proglangs-bar--impair']"
        >
          <span
            :class="['tm702-skill-proglangs-bar--default', idIsPair(id) ? 'tm702-skill-proglangs-bar-default--pair' : 'tm702-skill-proglangs-bar-default--impair']"
            :style="{width:percentage + '%'}"
          ></span>
        </span>
        <span class="tm702-skill-proglangs-percentage">{{percentage}}%</span>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props: ["currentTab"],
  data() {
    return {
      tab: null,
      centered: false,
      grow: false,
      vertical: false,
      right: false,
      icons: false,
      programingLanguages: [
        { id: 1, name: "Photoshop", percentage: 90 },
        { id: 2, name: "Illustrator", percentage: 80 },
        { id: 3, name: "Photoshop", percentage: 50 },
        { id: 4, name: "Illustrator", percentage: 90 }
      ]
    };
  },
  methods: {
    idIsPair: function(id) {
      console.log(id % 2);
      if (id % 2 === 0) return true;
      return false;
    }
  }
};
</script>
<style lang="scss">
.tm702-skill--proglang {
  .tm702-skill-proglang--inner {
    display: grid;
    grid-template-columns: repeat(1, minmax(0, 1fr));
    grid-row-gap: 47px;
    margin-top: 60px;
    @media screen and (min-width: 768px) {
      grid-row-gap: 71px;
    }
  }
  .tm702-skill-proglangs {
    display: grid;
    grid-gap: 2rem;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    grid-template-rows: auto auto;
    grid-row-gap: 7px;
    align-items: center;
    width: 90%;
    justify-self: center;
    @media screen and (min-width: 768px) {
      margin-left: 2.1875‬rem;
      margin-right: 2.1875‬rem;
    }
    @media screen and (min-width: 1200px) {
      margin-left: 0;
      margin-right: 0;
      grid-template-columns: 150px 17fr 1fr;
      grid-template-rows: auto;
      grid-row-gap: 15px;
    }
    span {
      --grid-column: 1 / 2;
      --grid-row: 1 / 2;
      --font-size: 14px;
      --line-height: 17px;
      grid-column: var(--grid-column);
      grid-row: var(--grid-row);
      font-size: var(--font-size);
      line-height: var(--line-height);
      @media screen and (min-width: 768px) {
        --font-size: 24px;
        --line-height: 29px;
      }
    }
    .tm702-skill-proglangs--name {
      font-style: normal;
      font-weight: 800;
      font-style: normal;
      font-weight: normal;
      font-size: 14px;
      line-height: 19px;
      color: var(--blue);
      @media screen and (min-width: 768px) {
        font-size: 30px;
        line-height: 41px;
      }
    }
    .tm702-skill-proglangs--bar {
      --grid-column: 1 / 3;
      --grid-row: 2 / 3;
      background-color: #fff;
      display: flex;
      @media screen and (min-width: 1200px) {
        --grid-column: 2 / 3;
        --grid-row: 1 / 2;
      }
      .tm702-skill-proglangs-bar--default {
        height: 11px;
        @media screen and (min-width: 768px) {
          height: 14px;
        }
      }
      .tm702-skill-proglangs-bar-default--pair {
        background-color: var(--yellow);
      }
      .tm702-skill-proglangs-bar-default--impair {
        background-color: var(--blue);
      }
    }
    .tm702-skill-proglangs-bar--pair {
      border: 1px solid var(--yellow);
    }
    .tm702-skill-proglangs-bar--impair {
      border: 1px solid var(--blue);
    }
    .tm702-skill-proglangs-percentage {
      --grid-column: 2 / 3;
      --grid-row: 1 / 2;
      justify-self: flex-end;
      color: var(--blue);
      font-style: normal;
      font-weight: normal;
      font-size: 14px;
      line-height: 19px;
      @media screen and (min-width: 768px) {
        font-size: 24px;
        line-height: 33px;
      }
      @media screen and (min-width: 1200px) {
        --grid-column: 3 / 4;
        --grid-row: 1 / 2;
      }
    }
  }
}
</style>
