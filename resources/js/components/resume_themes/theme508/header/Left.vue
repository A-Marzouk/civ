<template>
  <v-container>
    <v-row>
      <v-col cols="12" sm="4" md="4">
        <div class="avatar ma-2">
          <v-img src="/images/resume_themes/theme508/avatar.png" class="profile"></v-img>
        </div>
      </v-col>
      <v-col cols="12" sm="8" md="8" class="pt-8">
        <div class="head font-weight-bold white--text pl-4">Wilkerson Doe</div>
        <div class="subhead white--text pl-4">Web & visual Designer</div>
        <div class="mt-4">
          <v-btn v-for="c in connect" :key="c.name" text dark class="pa-0 mr-5" height="80">
            <v-card color="transparent" flat class="text-center" align-self="center">
              <v-img :src="c.icon" contain class="connect ma-1"></v-img>
              <div class="d-block text-capitalize subtitle-1">{{c.name}}</div>
            </v-card>
          </v-btn>
        </div>
      </v-col>
    </v-row>
  </v-container>
</template>
<script>
export default {
  data() {
    return {
      connect: [
        {
          name: "Chat",
          icon: "/images/resume_themes/theme508/chat.svg"
        },
        {
          name: "Audio",
          icon: "/images/resume_themes/theme508/audio.svg"
        },
        {
          name: "Video",
          icon: "/images/resume_themes/theme508/video.svg"
        }
      ]
    };
  }
};
</script>

<style lang="scss" scoped>
.avatar {
  border-radius: 50%;
  border: 8px solid #fff;
}
.profile {
  border-radius: 50%;
  border: 8px solid #7734e3;
}
.head {
  font-size: 3rem;
  font-family: "trebuchet ms", Arial, Helvetica, sans-serif;
}
.subhead {
  font-size: 1.3rem;
  font-family: "Open Sans";
  font-weight: semi-bold;
}
.connect {
  width: 24px;
  height: 24px;
}
</style>