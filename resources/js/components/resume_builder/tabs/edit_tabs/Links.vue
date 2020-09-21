<template>
  <div id="linksSection" data-app class="pa-md-0 pa-sm-0 pa-10">
    <!-- Tabs -->
    <v-tabs class="resume-builder__tab-bar" hide-slider height="51">
      <v-tab
        class="resume-builder__tab tabName"
        v-for="tab in tabs"
        :key="tab"
        @click="setLinkCategory(tab)"
      >{{tab}}</v-tab>
    </v-tabs>

    <!-- Content -->
    <div class="resume-builder__scroll " style="padding-right: 20px;">
      <div class="links-content" v-if="links">
        <div class="link-inputs-row">
          <v-select
            class="resume-builder__input civie-select icon-prepended"
            outlined
            hint="Select platform"
            persistent-hint
            :items="getCurrentCategories()"
            label="Category"
            color="#001CE2"
            v-model="editedLink.link_title"
          >
            <button class="dropdown-icon icon" slot="append">
              <svg-vue :icon="`dropdown-caret`"></svg-vue>
            </button>

            <button class="input-prepended-icon" slot="prepend">
              <img
                :src="`/images/resume_builder/${linkCategory}_icons/${editedLink.link_title.toLowerCase().replace(' ','_')}-1.svg`"
                alt="link icon"
              />
            </button>
          </v-select>

          <v-text-field
            class="resume-builder__input civie-input"
            outlined
            color="#001CE2"
            :class="{'resume-builder__input--disabled': false}"
            :disabled="false"
            :label="getLabel()"
            :error="!!errors.link"
            :error-messages="errors.link"
            v-model="editedLink.link"
          ></v-text-field>

          <div class="d-flex mt-1">
            <v-btn
              class="resume-builder__btn civie-btn filled"
              depressed
              raised
              @click="saveLink"
            >{{editedLink.id !== '' ? 'Update' : 'Add New'}}</v-btn>

            <v-btn
              class="resume-builder__btn civie-btn cancel-btn"
              depressed
              raised
              @click="clearLink"
              v-show="editedLink.id !== '' "
            >Cancel</v-btn>
          </div>
        </div>

        <draggable
          class="links-items"
          v-model="links"
          @start="drag=true"
          @end="drag=false"
          handle=".mover"
        >
          <div
            class="link-item"
            v-for="link in links"
            :key="link.id"
            v-if="link.link && link.category === linkCategory"
            :class="{'half-opacity' : !link.is_active}"
          >
            <div class="link-data">
              <div class="mover">
                <img src="/images/new_resume_builder/three-dots.svg" alt="mover icon" />
              </div>
              <div class="link-text">
                <img
                  :src="`/images/resume_builder/${linkCategory}_icons/${link.link_title.toLowerCase().replace(' ','_')}-1.svg`"
                  alt="link icon"
                />
                <span>{{link.link}}</span>
              </div>
            </div>
            <div class="action-btns">
              <div class="resume-builder__action-buttons-container">
                <v-btn class="btn-icon civie-btn" depressed @click="toggleLink(link)">
                  <svg-vue icon="eye-icon" class="icon" :class="{'visible' : link.is_active}"></svg-vue>
                </v-btn>
                <v-btn class="btn-icon civie-btn" depressed @click="editLink(link)">
                  <svg-vue
                    icon="edit-icon"
                    class="icon"
                    :class="{'visible' : link.id === editedLink.id}"
                  ></svg-vue>
                </v-btn>

                <v-btn class="btn-icon civie-btn" depressed @click="deleteLink(link)">
                  <svg-vue icon="trash-delete-icon" class="icon"></svg-vue>
                </v-btn>
              </div>
            </div>
          </div>
        </draggable>
      </div>
    </div>
  </div>
</template>

<script>
import draggable from "vuedraggable";

export default {
  name: "links",
  components: {
    draggable,
  },
  data: () => ({
    tabs: ["professional", "social", "contact"],
    professionalLinksCategories: [
      "GitHub",
      "LinkedIn",
      "Behance",
      "Dribbble",
      "Website",
      "PDF",
    ],
    socialLinksCategories: ["Facebook", "Instagram", "Pinterest", "Twitter"],
    contactLinksCategories: [
      "Email",
      "Messenger",
      "Telegram",
      "Whatsapp",
      "Skype",
      "Phone",
      "G. Calendar",
      "Calendly",
      "Zoom",
      "Hangouts",
    ],
    socialLinks: [],
    professionalLinks: [],
    contactLinks: [],
    errors: {},
    linkCategory: "professional",
    editedLink: {
      id: "",
      link_title: "Website",
      link: "",
      is_active: true,
    },
    linkHolder: {},
  }),
  methods: {
    editLink(link) {
      this.editedLink.id = link.id;
      this.editedLink.link_title = link.link_title;
      this.editedLink.link = link.link;
    },
    getLabel() {
      switch (this.editedLink.link_title) {
        case "Skype":
          return "ID";
        case "Whatsapp":
          return "Phone number";
        case "Phone":
          return "Phone number";
        case "Email":
          return "Email";
        default:
          return "URL";
      }
    },
    setLinkCategory(category) {
      this.linkCategory = category;
      this.clearLink();
    },
    toggleLink(link) {
      link.is_active = !link.is_active;
      axios
        .put("/api/user/links", link)
        .then((response) => {
          this.$store.dispatch("flyingNotification");
          this.closeOptionsBtn();
        })
        .catch((error) => {
          if (typeof error.response.data === "object") {
            this.errors.edit = error.response.data.errors;
          } else {
            this.errors.edit = "Something went wrong. Please try again.";
          }
          this.$store.dispatch("flyingNotification", {
            message: "Error",
            iconSrc: "/images/resume_builder/error.png",
          });
        });
    },
    setActiveTab(tab) {
      this.activeTab = tab;
    },
    deleteLink(link) {
      if (!confirm("Do you want to delete this link [" + link.link + "] ?")) {
        return;
      }
      axios
        .delete("/api/user/links/" + link.id)
        .then((response) => {
          this.$store.dispatch("flyingNotificationDelete");
          this.links.forEach((link, index) => {
            if (link.id === response.data.data.id) {
              this.links.splice(index, 1);
            }
          });

          this.closeOptionsBtn();
        })
        .catch((error) => {
          console.log(error);
        });
    },
    saveLink() {
      this.errors = {};

      if (
        !this.validURL(this.editedLink.link) &&
        !this.validPhone(this.editedLink.link)
      ) {
        this.errors = { link: "Not a valid link!" };
        return;
      }

      let edit = false;
      if (this.editedLink.id !== "") {
        edit = true;
      }
      this.editedLink.user_id = this.$store.state.user.id;
      this.editedLink.category = this.linkCategory;

      axios
        .post("/api/user/links", this.editedLink)
        .then((response) => {
          if (!edit) {
            let addedLink = response.data.data;
            this.links.push(addedLink);
          } else {
            this.links.forEach((link, index) => {
              if (link.id === response.data.data.id) {
                this.links.splice(index, 1, response.data.data);
              }
            });
          }
          this.clearLink();
          this.$store.dispatch("flyingNotification");
        })
        .catch((error) => {
          if (typeof error.response.data === "object") {
            this.errors = error.response.data.errors;
          } else {
            this.errors = "Something went wrong. Please try again.";
          }
          this.$store.dispatch("flyingNotification", {
            message: "Error",
            iconSrc: "/images/resume_builder/error.png",
          });
        });
    },
    cancelEdit() {},
    clearLink() {
      // link title depending on the link category:
      let link_title = "Website";
      if (this.linkCategory === "social") {
        link_title = "Facebook";
      }
      if (this.linkCategory === "contact") {
        link_title = "Email";
      }
      this.editedLink = {
        id: "",
        link_title: link_title,
        category: this.linkCategory,
        link: "",
        is_active: true,
        user_id: this.$store.state.user.id,
      };
    },
    validURL(str) {
      let pattern = new RegExp(
        "^(https?:\\/\\/)?" + // protocol
          "((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|" + // domain name
          "((\\d{1,3}\\.){3}\\d{1,3}))" + // OR ip (v4) address
          "(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*" + // port and path
          "(\\?[;&a-z\\d%_.~+=-]*)?" + // query string
          "(\\#[-a-z\\d_]*)?$",
        "i"
      ); // fragment locator
      if (this.editedLink.link_title === "Skype") {
        return this.testSkypeUrl(str);
      }
      if (this.editedLink.link_title === "Email") {
        return this.testEmail(str);
      }
      return !!pattern.test(str);
    },

    validPhone(str) {
      let pattern = new RegExp(
        "^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\\s\\./0-9]*$"
      ); // fragment locator
      return !!pattern.test(str);
    },
    testSkypeUrl(skype_url) {
      let skypePattern = /skype:/gi;
      return skypePattern.test(skype_url);
    },
    testEmail(email) {
      let emailPattern = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      return emailPattern.test(email);
    },
    getCurrentCategories() {
      if (this.linkCategory === "professional") {
        return this.professionalLinksCategories;
      } else if (this.linkCategory === "social") {
        return this.socialLinksCategories;
      } else {
        return this.contactLinksCategories;
      }
    },
  },
  computed: {
    links: {
      get() {
        return this.$store.state.user.links;
      },
      set(links) {
        this.$store.commit("updateLinks", links);
      },
    },
  },
  mounted() {},
};
</script>

<style lang="scss" scoped>
@import "../../../../../sass/media-queries";

$mainBlue: #001ce2;

#linksSection {
  @include lt-sm {
    margin: 3%;
  }

  .links-content {
    height: 450px;
    background: #fff;
    box-shadow: 0px 5px 100px rgba(0, 16, 131, 0.1);
    padding: 50px;
    margin-bottom: 70px;

    @include lt-sm {
      height: 450px;
      padding: 20px;
    }
  }

  .tabName {
    text-transform: capitalize;
  }

  .link-inputs-row {
    display: grid;
    align-items: center;
    grid-auto-rows: 78px;
    grid-template-columns: minmax(0px, 210px) minmax(0, 350px) auto;
    grid-gap: 20px; //adjusted | 30px
    // margin-top: 12px;
    margin-bottom: 50px; //adjusted | 30px

    .civie-select {
      max-width: 210px;

      .v-input__slot {
        padding-left: 30px !important;
      }

      .input-prepended-icon {
        position: absolute;
        top: 37px; // adjusted | 39px
        left: 5px;

        img {
          width: 33px;
        }
      }
    }

    .civie-input {
      max-width: 350px;
    }

    .civie-btn {
      width: 120px;
      align-self: end;
    }

    @include lt-md {
      display: flex;
      align-items: center;
      flex-wrap: wrap;
      margin-bottom: 25px;
      // .civie-select {
      // 	margin-right: 30px;
      // }

      // .civie-input {
      // 	margin-right: 30px;
      // }
    }

    @include lt-sm {
      .civie-select {
        grid-column: span 3;
        max-width: 100%;
        width: 100%;
      }

      .civie-input {
        max-width: 100%;
        width: 100%;
        grid-column: span 3;
        grid-row: 2 / 3;
        // margin-top: 15px;
      }

      .civie-btn {
        grid-column: span 3;
        grid-row: 3 / 4;
      }
    }
  }

  .links-items {
    max-width: 714px;
    width: 100%;

    .link-item {
      width: 100%;
      height: 50px;
      display: flex;
      margin-bottom: 30px;
      align-items: center;
      justify-content: space-between;
      background: white;
      box-shadow: 0 5px 20px rgba(0, 16, 131, 0.15);

      .link-data {
        display: flex;
        height: 50px;
        max-width: calc(100% - 125px);

        .mover {
          width: 50px;
          display: flex;
          justify-content: center;
          align-items: center;
          border-right: 1px solid #e6e8fc;

          img {
            width: 12px;
            height: 16px;
          }

          &:hover {
            cursor: grab;
          }

          @include lt-sm {
            width: 22px;
          }
        }

        .link-text {
          display: flex;
          align-items: center;
          margin-left: 10px;
          font-size: 18px;
          line-height: 25px;
          color: #888db1;
          overflow: hidden;
          white-space: nowrap;
          text-overflow: ellipsis;

          img {
            width: 45px;
            height: auto;
            // TODO: Don't leave spaces in the image
          }

          span {
            padding-right: 10px;
            display: block;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
          }

          @include lt-sm {
            font-size: 13px;
            margin-left: 0;
          }
        }
      }

      .action-btns {
        margin-right: 10px;

        .resume-builder__action-buttons-container {
          position: static;
        }
      }
    }
  }
}

.error {
  color: red;
  padding-top: 5px;
  padding-left: 3px;
}

//Custom fix 1.0

.tabName {
  text-transform: capitalize;
  font-size: 1rem;
  padding: 1.6rem;
}
</style>
