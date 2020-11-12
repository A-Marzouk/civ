<template>
  <v-container fluid>
    <v-row dense>
      <v-col cols="2" lg="2" sm="3" align="center" align-self="center">
        <v-img
          @click.stop="drawer = !drawer"
          src="/images/resume_themes/theme511/avatar.png"
          alt="avatar"
          contain
        ></v-img>

        <v-navigation-drawer
          color="rgba(103, 100, 200, 0.95)"
          v-model="drawer"
          absolute
          hide-overlay
          temporary
          class="hidden-sm-and-up"
        >
          <div class="text-right mt-4">
            <v-btn text small>
              <v-icon color="#fff">close</v-icon>
            </v-btn>
          </div>
          <v-list-item>
            <v-list-item-content>
              <v-list-item-title class="menu text-left">Menu</v-list-item-title>
            </v-list-item-content>
          </v-list-item>

          <v-divider></v-divider>

          <v-list dense>
            <v-list-item
              v-for="item in items"
              :key="item.id"
              @click="newTab(item.id)"
            >
              <v-list-item-content class="menu--tabs text-left">
                <v-list-item-title>{{ item.title }}</v-list-item-title>
              </v-list-item-content>
            </v-list-item>
          </v-list>
        </v-navigation-drawer>
      </v-col>
      <v-col cols="auto" lg="4" class="pl-lg-8" sm="6" align-self="center">
        <div class="head">Amy Williams</div>
        <div class="subhead">BackEnd Developer</div>
        <div class="details hidden-xs-only">
          Donec a augue gravida, vulputate ligula et, pellentesque arcu. Morbi
          feugiat eros nec sem ultrices.🚲
        </div>
        <div class="hidden-xs-only">
          <div class="info-text d-inline-block mr-6 mr-sm-2">
            hour rate
            <div class="info-rate d-inline-block mx-2 mx-sm-1">$20</div>
          </div>
          <div class="info-text d-inline-block">
            Weekly availability
            <div class="info-rate d-inline-block mx-2 mx-sm-1">250</div>
          </div>
        </div>
      </v-col>
      <v-col
        cols="auto"
        sm="3"
        lg="4"
        class="ml-auto align-self-sm-start"
        align-self="center"
      >
        <div class="text-right mt-lg-4 hidden-md-and-down">
          <v-btn
            v-for="(s, i) in social"
            :key="i"
            class="social mx-3"
            fab
            elevation="0"
          >
            <v-img :src="s.src" contain max-width="24" height="24"></v-img>
          </v-btn>
          <v-btn
            class="hire text-right ml-1 mr-lg-8"
            height="60"
            width="200"
            min-width="60"
            elevation="0"
            v-if="findPreference('hourly_rate')"
          >
            <div class="text-capitalize hire-text mr-lg-8">hire me</div>
            <v-btn
              color="#39E1AA"
              class="email"
              height="50"
              min-width="50"
              max-width="50"
              elevation="0"
            >
              <v-img
                src="/images/resume_themes/theme511/email.svg"
                contain
                max-width="24"
                height="24"
              ></v-img>
            </v-btn>
          </v-btn>
        </div>
        <div class="text-sm-center text-right mt-sm-4 hidden-lg-and-up">
          <v-btn
            class="hire"
            height="40"
            width="135"
            min-width="40"
            elevation="0"
            v-if="findPreference('hourly_rate')"
          >
            <div class="text-capitalize hire-text mr-6">hire me</div>
            <v-btn
              color="#39e1aa"
              class="email hidden-xs-only"
              height="40"
              min-width="40"
              max-width="40"
              elevation="0"
            >
              <v-img
                src="/images/resume_themes/theme511/email.svg"
                contain
                max-width="24"
                height="24"
              ></v-img>
            </v-btn>
            <v-btn
              color="#ffff"
              class="email hidden-sm-and-up"
              height="40"
              min-width="40"
              max-width="40"
              elevation="0"
            >
              <v-img
                src="/images/resume_themes/theme511/emailmob.svg"
                contain
                max-width="24"
                height="24"
              ></v-img>
            </v-btn>
          </v-btn>
        </div>
      </v-col>
    </v-row>
  </v-container>
</template>
<script>
export default {
  data: () => ({
    drawer: null,

    items: [
      { title: "Portfolio", id: 0 },
      { title: "Education", id: 1 },
      { title: "Experience", id: 2 },
      { title: "Skills", id: 3 },
      { title: "Media", id: 4 },
      { title: "About Me", id: 5 },
    ],
    social: [
      { src: "/images/resume_themes/theme511/twitter.svg" },
      { src: "/images/resume_themes/theme511/facebook.svg" },
      { src: "/images/resume_themes/theme511/instagram.svg" },
    ],
  }),

  computed: {
    hireColor() {
      switch (this.$vuetify.breakpoint.name) {
        case "xs":
          return "#ffff";
        case "sm":
          return "#39E1AA";
        case "md":
          return "#39E1AA";
      }
    },
    newTab(id) {
      // this.currentTab = id
      return (this.currentTab = id);
    },
  },
};
</script>
<style lang="scss" scoped>
.menu {
  font-family: Poppins;
  font-style: normal;
  font-weight: 500;
  font-size: 20px;
  line-height: 30px;
  /* identical to box height */

  color: #ffffff;

  opacity: 0.5;
}
.social {
  background: #fbffff;
  border: 5px solid #f56068;
  box-sizing: border-box;
  border-radius: 50px;
}
.hire {
  background: #fbffff;
  border: 5px solid #39e1aa;
  box-sizing: border-box;
  border-radius: 50px;
  position: relative;
}
.email {
  position: absolute;
  background: #39e1aa;
  border-radius: 50px;
  right: -17px;
}

.hire-text {
  font-family: Poppins;
  font-style: normal;
  font-weight: bold;
  font-size: 20px;
  line-height: 30px;
  /* identical to box height */

  color: #39e1aa;
}
.head {
  font-family: Poppins;
  font-style: normal;
  font-weight: 600;
  font-size: 2.5rem;
  line-height: 90px;
  /* identical to box height */
  color: #000000;
}
.subhead {
  font-family: Poppins;
  font-style: normal;
  font-weight: 500;
  font-size: 1.2rem;
  line-height: 45px;
  /* identical to box height */
  color: #000000;
}
.details {
  font-family: Poppins;
  font-style: normal;
  font-weight: normal;
  font-size: 1rem;
  line-height: 30px;

  color: #000000;
}
.info-text {
  display: inline-block;
  font-family: Poppins;
  font-style: normal;
  font-weight: normal;
  font-size: 1rem;
  line-height: 27px;
  display: flex;
  align-items: center;
  text-transform: uppercase;
  color: #000000;
}
.info-rate {
  display: inline-block;
  font-family: Poppins;
  font-style: normal;
  font-weight: bold;
  font-size: 1.5rem;
  line-height: 45px;
  display: flex;
  align-items: center;
  color: #000000;
}
.menu--tabs {
  font-family: Poppins;
  font-style: normal;
  font-weight: normal;
  font-size: 18px;
  line-height: 27px;
  /* identical to box height */

  color: #ffffff;
}

@media screen and (max-width: 1024px) and (min-width: 700px) {
  .head {
    font-family: Poppins;
    font-style: normal;
    font-weight: 500;
    font-size: 24px;
    line-height: 40px;
  }
  .subhead {
    font-family: Poppins;
    font-style: normal;
    font-weight: 500;
    font-size: 12px;
    line-height: 24px;
    /* identical to box height */

    color: #000000;
  }
  .details {
    font-family: Poppins;
    font-style: normal;
    font-weight: normal;
    font-size: 12px;
    line-height: 24px;

    color: #000000;
  }
  .hire {
    background: #ffffff;
    border: 2px solid #39e1aa;
    box-sizing: border-box;
    border-radius: 50px;
  }
  .hire-text {
    font-family: Poppins;
    font-style: normal;
    font-weight: bold;
    font-size: 12px;
    line-height: 18px;
    /* identical to box height */

    color: #39e1aa;
  }
  .info-text {
    font-family: Poppins;
    font-style: normal;
    font-weight: normal;
    font-size: 14px;
    line-height: 21px;
    display: flex;
    align-items: center;
    text-transform: uppercase;

    color: #000000;
  }
  .info-rate {
    font-family: Poppins;
    font-style: normal;
    font-weight: bold;
    font-size: 20px;
    line-height: 30px;
    display: flex;
    align-items: center;

    color: #000000;
  }
}
@media screen and (max-width: 699px) and (min-width: 200px) {
  .head {
    font-family: Poppins;
    font-style: normal;
    font-weight: 800;
    font-size: 16px;
    line-height: 24px;
    color: #000000;
  }
  .subhead {
    font-family: Poppins;
    font-style: normal;
    font-weight: normal;
    font-size: 10px;
    line-height: 15px;
    /* identical to box height */

    color: #000000;
  }
  .details {
    font-family: Poppins;
    font-style: normal;
    font-weight: normal;
    font-size: 12px;
    line-height: 24px;

    color: #000000;
  }
  .hire {
    background: #f56068 !important;
    border-radius: 50px;
    border: 2px solid #f56068;
  }
  .hire-text {
    font-family: Poppins;
    font-style: normal;
    font-weight: bold;
    font-size: 14px;
    line-height: 21px;
    display: flex;
    align-items: center;

    color: #faf7f1;
  }
  .email {
    position: absolute;
    background: #39e1aa;
    border-radius: 50px;
    right: -19px;
  }
  .info-text {
    font-family: Poppins;
    font-style: normal;
    font-weight: normal;
    font-size: 14px;
    line-height: 21px;
    display: flex;
    align-items: center;
    text-transform: uppercase;

    color: #000000;
  }
  .info-rate {
    font-family: Poppins;
    font-style: normal;
    font-weight: bold;
    font-size: 20px;
    line-height: 30px;
    display: flex;
    align-items: center;

    color: #000000;
  }
}
</style>