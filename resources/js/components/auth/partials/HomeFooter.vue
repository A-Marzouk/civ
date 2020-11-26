<template>
  <v-footer color="#0F4CEE" class="custom-footer">
    <v-container class="footer-container">
      <v-row justify="center" align="center" class="justify-space-around">
        <v-col md="2" cols="12" :align="windowWidth <=959 ?'center':'left' ">
          <v-card flat color="transparent" tile>
            <img
              class="logo-footer hidden-sm-and-down"
              src="/images/welcome_landing_page/logo/civie_logo-01.webp"
            />
            <img
              class="logo-footer hidden-md-and-up"
              src="/images/welcome_landing_page/logo/civie_logo-01.webp"
            />
          </v-card>
        </v-col>
        <v-col md="6" cols="6" align="right" class="hidden-sm-and-down">
          <v-card flat tile color="transparent">
            <v-card-text class="follow-us-text">
              <label>Follow Us:</label>
              <v-btn
                fab
                x-small
                color="#ffffff"
                class="footer-social-icon ml-md-2 ml-sm-0 ml-0"
                href="https://www.facebook.com/civieapp"
              >
                <img
                  src="/images/welcome_landing_page/icons/social_icons/facebook.png"
                  alt="facebook"
                />
              </v-btn>
              <span class="followers">14,044 Followers</span>
              <v-btn
                fab
                x-small
                color="#ffffff"
                class="footer-social-icon ml-md-1 ml-sm-0 ml-0"
                href="https://www.instagram.com/civ.ie_/"
              >
                <img
                  src="/images/welcome_landing_page/icons/social_icons/instagram.png"
                  alt="instagram"
                />
              </v-btn>
              <span>733 Followers</span>
            </v-card-text>
          </v-card>
        </v-col>

        <v-col md="4" cols="12" align="right" class="hidden-sm-and-down">
          <v-card color="transparent" flat tile>
            <v-card-text class="follow-us-text">
              <label>Contact Us:</label>
              <v-btn
                fab
                x-small
                color="#ffffff"
                class="footer-social-icon mx-1"
                v-for="icon in contactIcons"
                :key="icon.title"
                :href="icon.url"
              >
                <img :src="getContactIcons(icon.title)" />
              </v-btn>
            </v-card-text>
          </v-card>
        </v-col>

        <v-col sm="4" cols="4" class="hidden-md-and-up mt-n12">
          <v-card flat tile color="transparent" align="center" class>
            <v-card-subtitle class="follow-us-text">Follow Us</v-card-subtitle>
            <v-card-subtitle>
              <v-btn fab x-small color="#ffffff" class="footer-social-icon mx-sm-2 mx-1 mt-n2">
                <img
                  src="/images/welcome_landing_page/icons/social_icons/facebook.png"
                  alt="facebook"
                />
              </v-btn>
              <v-btn
                fab
                x-small
                color="#ffffff"
                class="footer-social-icon mx-sm-2 mx-auto mt-n2"
                href="https://www.instagram.com/civ.ie_/"
              >
                <img
                  src="/images/welcome_landing_page/icons/social_icons/instagram.png"
                  alt="instagram"
                />
              </v-btn>
            </v-card-subtitle>
          </v-card>
        </v-col>

        <v-col sm="8" cols="8" class="hidden-md-and-up mt-n12" align="right">
          <v-card flat tile color="transparent" class="ml-md-0 ml-sm-0 ml-8">
            <v-card-subtitle class="follow-us-text" align="center">Contact Us</v-card-subtitle>
            <v-card-subtitle align="center">
              <v-btn
                fab
                x-small
                color="#ffffff"
                class="footer-social-icon mx-sm-2 mx-1 mt-n2"
                v-for="icon in contactIcons"
                :key="icon.title"
                :href="icon.url"
              >
                <img :src="getContactIcons(icon.title)" />
              </v-btn>
            </v-card-subtitle>
          </v-card>
        </v-col>
      </v-row>
    </v-container>
  </v-footer>
</template>
<script>
export default {
  props: {
    windowWidth: {
      type: Number,
    },
  },
  data() {
    return {
      contactIcons: [
        { id: 1, title: "email", url: "mailto:hi@civ.ie" },
        { id: 2, title: "messenger", url: "https://www.facebook.com/civieapp" },
        { id: 3, title: "skype", url: "skype:magictime.uk" },
        { id: 4, title: "whatsapp", url: "https://wa.me/353868447832" },
        { id: 4, title: "telegram", url: "https://t.me/conormarjoram" },
      ],
    };
  },

  methods: {
    getContactIcons(title) {
      return `/images/welcome_landing_page/icons/contact_icons/${title}.png`;
    },
  },
};
</script>

<style lang="scss" scoped>
  
</style>