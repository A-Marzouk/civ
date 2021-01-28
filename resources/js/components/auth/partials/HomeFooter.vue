<template>
  <div class="custom-footer">
    <!-- logo -->
        <img
                class="logo-footer"
                src="/images/welcome_landing_page/logo/civie_logo-01.webp"
        />
        <!-- end logo-->

        <!-- Follow us-->
        <div class="follow-us-text">
          <label>Follow Us:</label>
          <a
                  class="footer-social-icon"
                  href="https://www.facebook.com/civieapp"
          >
            <img
                    src="/images/welcome_landing_page/icons/social_icons/facebook.png"
                    alt="facebook"
            />
          </a>
          <span class="followers">14,044 Followers</span>
          <a
                  class="footer-social-icon"
                  href="https://www.instagram.com/civ.ie_/"
          >
            <img
                    src="/images/welcome_landing_page/icons/social_icons/instagram.png"
                    alt="instagram"
            />
          </a>
          <span>733 Followers</span>
        </div>
        <!-- End Follow us-->

        <!-- Contact us-->
        <div class="follow-us-text">
          <label>Contact Us:</label>
          <a
                  class="footer-social-icon"
                  v-for="icon in contactIcons"
                  :key="icon.title"
                  :href="icon.url"
          >
            <img :src="getContactIcons(icon.title)" />
          </a>
        </div>
        <!-- End Contact us-->
  </div>
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