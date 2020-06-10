<template>
  <v-container v-if="currentTab === 3">
    <v-row justify="center">
      <v-col lg="12">
        <v-row justify="center">
          <v-col v-for=" col in 4" :key="col" cols="11" sm="11" lg="5" class="mx-lg-12">
            <v-row justify="center">
              <v-col sm="3" cols="4" lg="4">
                <div class="head">Google</div>
                <div class="time mt-10">Duration:</div>
                <div class="duration">Dec 19 - Present</div>
              </v-col>
              <v-col sm="6" cols="8" lg="8">
                <div class="subhead pt-3">User interface designer</div>
                <div
                  class="para mt-10"
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
      works: [
        {
          id: 1,
          name: "google",
          dateFrom: new Date(),
          dateTo: new Date()
        },
        {
          id: 2,
          name: "google",
          dateFrom: new Date(),
          dateTo: new Date()
        },
        {
          id: 3,
          name: "google",
          dateFrom: new Date(),
          dateTo: new Date()
        },
        {
          id: 4,
          name: "google",
          dateFrom: new Date(),
          dateTo: new Date()
        },
        {
          id: 5,
          name: "google",
          dateFrom: new Date(),
          dateTo: new Date()
        },
        {
          id: 5,
          name: "google",
          dateFrom: new Date(),
          dateTo: new Date()
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
</style>
