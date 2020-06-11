<template>
  <v-container v-if="currentTab === 4">
    <v-row justify="center">
      <v-col lg="12">
        <v-row justify="center">
          <v-col v-for=" col in 4" :key="col" cols="11" sm="11" lg="5" class="mx-lg-12">
            <v-row justify="center">
              <v-col cols="12" lg="12" sm="9">
                <div class="subhead">University</div>
                <div class="mb-5 head">California Institute of Technology</div>
                <div class="my-5 duration">
                  M.Sc in HCI,
                  <span class="pl-4">Dec 19 - Present</span>
                </div>

                <div
                  class="my-5 para pr-lg-12"
                >I'm a paragraph. Click here to add your own text and edit me. It’s easy. Just click “Edit Text” or double click me to add your own content and make changes.</div>
              </v-col>
            </v-row>
          </v-col>
        </v-row>
      </v-col>
    </v-row>
  </v-container>
</template>
<script>
export default {
  props: ["currentTab"],
  data() {
    return {
      educations: [
        {
          id: 1,
          university: "California Institute of Technology"
        },
        {
          id: 2,
          university: "California Institute of Technology"
        },
        {
          id: 3,
          university: "California Institute of Technology"
        },
        {
          id: 4,
          university: "California Institute of Technology"
        }
      ]
    };
  }
};
</script>
<style lang="scss" scoped>
.head {
  font-family: Open Sans;
  font-style: normal;
  font-weight: normal;
  font-size: 1.5rem;
  line-height: 49px;
  position: relative;
  color: #005bd1;
}
.head:after {
  content: "";
  position: absolute;
  left: 0;
  top: 40px;
  width: 40px;
  height: 3px;
  background: #005bd1;
}
.subhead {
  font-family: Open Sans;
  font-style: normal;
  font-weight: normal;
  font-size: 1rem;
  line-height: 30px;
  /* identical to box height */

  color: #6d6d6d;
}
.time {
  font-family: Open Sans;
  font-style: normal;
  font-weight: 300;
  font-size: 0.85rem;
  line-height: 20px;
  /* or 158% */

  color: #575757;
}
.duration {
  font-family: Open Sans;
  font-style: normal;
  font-weight: 300;
  font-size: 0.85rem;
  line-height: 20px;
  /* or 158% */

  color: #99c1eb;
}
.para {
  font-family: Open Sans;
  font-style: normal;
  font-weight: 300;
  font-size: 0.75rem;
  line-height: 20px;
  /* or 164% */

  color: #4e4e4e;
}
@media screen and (min-width: 320px) and (max-width: 475px) {
  .head {
    font-family: Open Sans;
    font-style: normal;
    font-weight: normal;
    font-size: 1.3rem;
    line-height: 49px;
    position: relative;
    color: #005bd1;
  }
}
</style>
