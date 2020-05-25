<template>
  <v-container v-if="currentTab === 4" fluid>
    <v-row justify="center" class="mt-8 mt-sm-12 mt-md-10 mt-lg-12">
      <v-col
        v-for="edu in educations"
        :key="edu.id"
        lg="3"
        md="4"
        cols="6"
        sm="5"
        align="center"
        class="mx-0 mx-sm-2 mx-md-6 mx-lg-6"
      >
        <div class="gradient"></div>
        <v-card width="auto" class="text-left textcol shadow">
          <v-row justify="center">
            <v-col md="9" sm="11" lg="9" cols="11">
              <v-img :src="edu.img" class="imgcard" contain></v-img>
              <div class="subtitle-2 py-1 py-sm-0">26th October,2019</div>
              <div class="headline font-weight-bold py-1 py-sm-0">{{edu.title}}</div>
              <div class="subtitle-1 font-weight-bold py-1 py-sm-0">Data Science</div>
              <div class="py-1 py-sm-1">
                <div class="subhead">
                  <v-icon color="#6545F8" small left>mdi-map-marker</v-icon>Paderborn University,Paderborn
                </div>
                <!-- <div class="subhead pl-6"></div> -->
              </div>
              <div class="eduline my-1 my-sm-2"></div>
              <div
                class="subhead my-2 my-sm-1"
              >Lorem ipsum dolor sit amet,Stet clita kasd is the most lorem ipsum dolor sit amet.</div>
              <div class="title font-weight-bold my-1 my-sm-1" style="color:#45F957;">{{edu.line}}</div>
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

@media screen and (max-width: 1024px) {
  .imgcard {
    height: 200px;
  }
  .title {
    font-size: 1rem !important;
  }
}

@media screen and (max-width: 768px) {
  .imgcard {
    height: 150px;
  }
  .subhead {
    font-family: "Heebo", sans-serif;
    font-style: normal;
    font-weight: 400;
    font-size: 0.7rem;
    line-height: 20px;
  }
  .title {
    font-size: 1rem !important;
  }
}
@media screen and (max-width: 425px) {
  .imgcard {
    height: 100px;
  }
  .shadow {
    padding: 0 0px;
  }
  .eduline {
    width: 100px;
    background-color: #6247fd;
    height: 1px;
  }
  .head {
    font-family: "Heebo", sans-serif;
    font-style: normal;
    font-weight: 800;
    font-size: 0.8rem;
  }
  .subhead {
    font-family: "Heebo", sans-serif;
    font-style: normal;
    font-weight: 400;
    font-size: 0.5rem;
    line-height: 10px;
  }
  .title {
    font-size: 0.8rem !important;
  }
  .headline {
    font-size: 1rem !important;
    line-height: 1rem !important;
  }
  .subtitle-1 {
    font-size: 1rem !important;
    font-weight: 400;
    letter-spacing: 0.009375em !important;
    line-height: 1rem !important;
    font-family: Roboto, sans-serif !important;
  }
}
</style>
