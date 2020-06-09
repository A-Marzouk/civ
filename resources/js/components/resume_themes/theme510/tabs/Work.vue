<template>
  <v-row justify="center" class="mt-12" v-if="currentTab === 2">
    <v-col md="10" sm="12">
      <v-row>
        <v-col md="6" sm="12" cols="12">
          <v-row justify="center">
            <v-col md="2" sm="3" cols="5" class="pr-6">
              <h1 class="textcol font mt-2">Graphic & Web Designer</h1>
              <h1 class="textcol subfont mt-12">2018 - 2019</h1>
            </v-col>
            <v-col md="9" sm="7" cols="7" class="margleft">
              <h1 class="textcol point pb-2">Company "React"</h1>
              <ul class="textcol subpoint">
                <li>- Turning creative concepts into finished websites.</li>
                <li>- Drawing up detailed website s pecifications.</li>
                <li>- Building websites that are easy to understand, navigate and use.</li>
                <li>- Designing sample page layouts.</li>
                <li>- Ensuring that the website complies with the company’s brand guidelines.</li>
              </ul>
            </v-col>
          </v-row>
        </v-col>
        <v-col md="6" sm="12" cols="12">
          <v-row justify="center">
            <v-col md="2" sm="3" cols="5" class="pr-6">
              <h1 class="textcol font mt-2">Graphic & Web Designer</h1>
              <h1 class="textcol subfont mt-12">2018 - 2019</h1>
            </v-col>
            <v-col md="9" sm="7" cols="7" class="margleft">
              <h1 class="textcol point pb-2">Company "React"</h1>
              <ul class="textcol subpoint">
                <li>- Turning creative concepts into finished websites.</li>
                <li>- Drawing up detailed website s pecifications.</li>
                <li>- Building websites that are easy to understand, navigate and use.</li>
                <li>- Designing sample page layouts.</li>
                <li>- Ensuring that the website complies with the company’s brand guidelines.</li>
              </ul>
            </v-col>
          </v-row>
        </v-col>
      </v-row>
      <v-row class="mt-8">
        <v-col md="6" sm="12" cols="12">
          <v-row justify="center">
            <v-col md="2" sm="3" cols="5" class="pr-6">
              <h1 class="textcol font mt-2">Graphic & Web Designer</h1>
              <h1 class="textcol subfont mt-12">2018 - 2019</h1>
            </v-col>
            <v-col md="9" sm="7" cols="7" class="margleft">
              <h1 class="textcol point pb-2">Company "React"</h1>
              <ul class="textcol subpoint">
                <li>- Turning creative concepts into finished websites.</li>
                <li>- Drawing up detailed website s pecifications.</li>
                <li>- Building websites that are easy to understand, navigate and use.</li>
                <li>- Designing sample page layouts.</li>
                <li>- Ensuring that the website complies with the company’s brand guidelines.</li>
              </ul>
            </v-col>
          </v-row>
        </v-col>
        <v-col md="6" sm="12" cols="12">
          <v-row justify="center">
            <v-col md="2" sm="3" cols="5" class="pr-6">
              <h1 class="textcol font mt-2">Graphic & Web Designer</h1>
              <h1 class="textcol subfont mt-12">2018 - 2019</h1>
            </v-col>
            <v-col md="9" sm="7" cols="7" class="margleft">
              <h1 class="textcol point pb-2">Company "React"</h1>
              <ul class="textcol subpoint">
                <li>- Turning creative concepts into finished websites.</li>
                <li>- Drawing up detailed website s pecifications.</li>
                <li>- Building websites that are easy to understand, navigate and use.</li>
                <li>- Designing sample page layouts.</li>
                <li>- Ensuring that the website complies with the company’s brand guidelines.</li>
              </ul>
            </v-col>
          </v-row>
        </v-col>
      </v-row>
    </v-col>
  </v-row>
</template>

<script>
export default {
  name: "work",
  props: ["currentTab"]
};
</script>

<style scoped>
.margleft {
  margin-left: 24px !important;
}
@media only screen and (max-width: 600px) {
  .margleft {
    margin-left: 0px !important;
  }
  .font {
    padding-left: 24px;
  }
  .subfont {
    padding-left: 24px;
  }
  .subpoint {
    padding-right: 10px;
  }
}
@media only screen and (max-width: 1000px) and (min-width: 650px) {
  .margleft {
    margin-left: 0px !important;
  }
  .font {
    padding-left: 24px;
  }
  .subfont {
    padding-left: 24px;
  }
}

.font {
  font-family: "Montserrat", sans-serif;
  font-style: normal;

  font-weight: 300;
  font-size: 12px;
  line-height: 15px;
}
.subfont {
  font-family: "Montserrat", sans-serif;
  font-style: normal;
  font-weight: 300;
  font-size: 12px;
  line-height: 19px;
}

.point {
  font-family: "Montserrat", sans-serif;
  font-style: normal;
  font-weight: 400;
  font-size: 14px;
  line-height: 15px;
}
.subpoint {
  font-family: "Montserrat", sans-serif;
  font-style: normal;
  font-weight: 300;
  font-size: 10px;
  line-height: 18px;
}

.v-application ol,
.v-application ul {
  padding-left: 0px !important;
}
ul li {
  list-style: none;
}
.large_dot:before {
  bottom: 0;
  content: "";
  height: 0px;
  position: absolute;
  top: 0px;
  width: 0px;
}

.theme--light.v-application {
  background: transparent;
  color: rgba(0, 0, 0, 0.87);
}
.textcol {
  color: #104efb !important;
}
</style>
