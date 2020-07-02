<template>
  <v-container fluid v-if="currentTab === 2" class="backText">
    <v-row no-gutters justify="center">
      <v-col cols="12" lg="10">
        <v-container fluid pa-0>
          <v-row
            class="timeline-item"
            justify="center"
            v-for="(edu, index) in education"
            :key="index"
          >
            <v-col cols="2" sm="1" lg="auto">
              <div class="timeline-item--serial">0{{ index + 1 }}</div>
            </v-col>
            <v-col cols="10" sm="11" lg="11" class="timeline-item--content ">
              <div class="timeline-item--title pb-2">{{ edu.position }}</div>
              <div class="timeline-item--position py-2">
                {{ edu.location }}
                <span class="timeline-item--duration">
                  / {{ edu.duration }}
                </span>
              </div>
              <div class="timeline-item--description pt-4 pr-sm-2">
                Partners with clients, ranging from small businesses to Fortune
                500 companies, to create cutting-edge digital marketing designs
                targeting the American market. Forms a creative vision and
                clearly conveys ideas using both visual and verbal
                communication. Collaborates with a creative team consisting of
                web developers, content creators, and digital designers, to
                create engaging digital collateral. Creates the end-to-end
                design for responsive websites using a mobile-first approach.
              </div>
            </v-col>
          </v-row>
        </v-container>
      </v-col>
    </v-row>
  </v-container>
</template>
<script>
export default {
  props: ["currentTab"],
  data: () => ({
    education: [
      {
        position: "Udemy",
        location: "UI/UX DESIGN COURSE",
        duration: "September 2015 - December 2015"
      },
      {
        position: "Oxford University",
        location: "COMPUTER SCIENCE & TECHNOLOGY",
        duration: "September 2011 - July 2015"
      },
      {
        position: "Mount Agnes University",
        location: "Bachelor of Arts in Design",
        duration: "May 2010 - July 2011"
      }
    ]
  })
};
</script>
<style lang="scss" scoped>
@import url('https://fonts.googleapis.com/css2?family=Archivo:wght@400;500;600;700&display=swap');
.timeline-item--serial {
  font-family: "Archivo", sans-serif;
  font-style: normal;
  font-weight: bold;
  font-size: 3.2rem;
  line-height: 50px;
  color: rgba(220, 38, 108, 0.4);
  position: relative;
}
.timeline-item--serial:after {
  content: "";
  position: absolute;
  width: 1px;
  height: 200px;
  left: 28px;

  top: 50px;
  background-color: rgba(220, 38, 108, 0.4);
}
.timeline-item--content {
  padding-top: 4rem;
}
.timeline-item--title {
  font-family: "Archivo", sans-serif;
  font-style: normal;
  font-weight: bold;
  font-size: 24px;
  line-height: 26px;
  color: #dc266c;
}
.timeline-item--position {
  font-family: "Archivo", sans-serif;
  font-style: normal;
  font-weight: 600;
  font-size: 14px;
  line-height: 15px;
  text-transform: uppercase;
  color: #4ddbea;
}
.timeline-item--duration {
  font-family: "Archivo", sans-serif;
  font-style: normal;
  font-style: italic;
  font-weight: 600;
  font-size: 12px;
  line-height: 15px;
  color: #acacac;
}
.timeline-item--description {
  font-family: "Archivo", sans-serif;
  font-style: normal;
  font-weight: normal;
  font-size: 18px;
  line-height: 30px;
  color: #9ca4c1;
}
.backText {
  position: relative;
}
.backText:before {
  content: "EDUCA";
  position: absolute;
  top: 260px;
  right: -260px;
  transform: rotate(-90deg);
  font-family: "Archivo", sans-serif;
  font-style: normal;
  font-weight: bold;
  font-size: 200px;
  line-height: 272px;
  color: rgba(220, 38, 108, 0.15);
}
@media screen and (min-width: 605px) and (max-width: 1024px) {
  .timeline-item--serial:after {
    content: "";
    position: absolute;
    width: 1px;
    height: 285px;
    left: 28px;
    top: 50px;
    background-color: rgba(220, 38, 108, 0.4);
  }
}

@media screen and (min-width: 200px) and (max-width: 599px) {
  .timeline-item--serial:after {
    content: "";
    position: absolute;
    width: 1px;
    height: 495px;
    left: 28px;

    top: 50px;
    background-color: rgba(220, 38, 108, 0.4);
  }
}
</style>