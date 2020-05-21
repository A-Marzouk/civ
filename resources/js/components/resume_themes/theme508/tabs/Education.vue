<template>
  <v-container v-if="currentTab === 4" fluid>
    <v-row justify="center" class="mt-12">
      <v-col
        v-for="edu in educations"
        :key="edu.id"
        lg="3"
        md="4"
        cols="11"
        sm="11"
        align="center"
        class="mx-0 mx-sm-6 mx-md-6 mx-lg-6"
      >
        <div class="gradient"></div>
        <v-card width="auto" class="text-left textcol shadow">
          <v-row justify="center">
            <v-col md="9">
              <v-img :src="edu.img" class="imgcard"></v-img>
              <div class="subtitle-2 py-1">26th October,2019</div>
              <div class="headline font-weight-bold py-1">{{edu.title}}</div>
              <div class="subtitle-1 font-weight-bold py-1">Data Science</div>
              <div class="py-2">
                <div class="subhead">
                  <v-icon color="#6545F8" small left>mdi-map-marker</v-icon>Paderborn University
                </div>
                <div class="subhead pl-6">Paderborn, Germany</div>
              </div>
              <div class="eduline my-2"></div>
              <div
                class="subhead my-3"
              >Lorem ipsum dolor sit amet,Stet clita kasd lorem ipsum dolor sit amet. sed diam eirmod tempor dolore.Lorem ipsum dolor sit amet,Stet clita kasd lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet</div>
              <div class="title font-weight-bold my-2 pb-8" style="color:#45F957;">{{edu.line}}</div>
            </v-col>
          </v-row>
        </v-card>
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
          title: "PhD",
          img: "/images/resume_themes/theme508/edu-1.svg",
          line: "Successfully Completed"
        },
        {
          id: 2,
          title: "MSc",
          img: "/images/resume_themes/theme508/edu-2.svg",
          line: "CGPA 1.00 on German Grade"
        }
      ]
    };
  }
};
</script>

<style lang="scss" scoped>
@import url("https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;700;800;900&display=swap");
.textcol {
  color: #6247fd;
}
.shadow {
  box-shadow: 1px 7px 20px 0px rgba(0, 0, 0, 0.2);
}
.imgcard {
  width: 300px;
  height: 300px;
}
.gradient {
  width: 100%;
  height: 10px;
  background: linear-gradient(to left, #7a39db, #6048ff);
}
.eduline {
  width: 150px;
  background-color: #6247fd;
  height: 1px;
}
.head {
  font-family: "Heebo", sans-serif;
  font-style: normal;
  font-weight: 800;
  font-size: 1.5rem;
}
.subhead {
  font-family: "Heebo", sans-serif;
  font-style: normal;
  font-weight: 400;
  font-size: 1rem;
  line-height: 20px;
}
@media screen and (max-width: 425px) {
  .imgcard {
    width: 200px;
    height: 200px;
  }
  .shadow {
    padding: 0 15px;
  }
  .eduline {
    width: 150px;
    background-color: #6247fd;
    height: 1px;
  }
  .head {
    font-family: "Heebo", sans-serif;
    font-style: normal;
    font-weight: 800;
    font-size: 1rem;
  }
  .subhead {
    font-family: "Heebo", sans-serif;
    font-style: normal;
    font-weight: 400;
    font-size: 0.67rem;
    line-height: 20px;
  }
  .title {
    font-size: 1rem !important;
  }
}
</style>
