<template>
  <div id="profileTab" class="profile-hold">
    <div class="section-title">
      <div class="title-light">Add</div>
      <h2>Audio / Video</h2>
    </div>

    <div class="achievements-bar" id="profileLinksWrapper">
      <div
        class="bar-item"
        v-for="(tabName,i) in tabs"
        :key="i"
        :index="i"
        :item="tabName"
        :data-target="tabName"
        @click="changeTab"
        :class="{ active : activeTab === tabName}"
      >{{tabName}}</div>

      <div class="decorator"></div>
    </div>

    <transition :duration="590" class="mt-5 content" name="hide" mode="out-in">
      <Video v-if="activeTab === 'Video'"></Video>
      <Audio v-else></Audio>
    </transition>
  </div>
</template>

<script>
import vTabNames from "./includes/vtab_onincludes";
import Audio from "./audio_views/Audio";
import Video from "./audio_views/Video";

// Tab animation helper
import { moveTabsHelper } from "../../helpers/tab-animations";

export default {
  name: "AudioVideo",
  components: {
    vTabNames,
    Video,
    Audio
  },
  data() {
    return {
      activeTab: "Video",
      tabs: ["Video", "Audio"],
    };
  },
  methods: {
    changeTab(e) {
      moveTabsHelper(e, "profileLinksWrapper", this);
    },
    setActiveTab(tab) {
      this.activeTab = tab;
    },

  },
  mounted() {
    this.changeTab({
      target: document.querySelector(`.bar-item[data-target=${this.activeTab}]`)
    });
  }
};

Array.prototype.moveItem = function(from, to) {
  this.splice(to, 0, this.splice(from, 1)[0]);
  return this;
};
</script>

<style lang="scss" scoped>
@import '../../../../../sass/media-queries';
$mainBlue: #001ce2;

.achievements-bar {
  max-width: 500px;

  @include lt-md {
    margin: 0 auto;
    width: 100%;
    max-width: 418px;
    margin-top: 45px;

    .bar-item {
      font-size: 26px;
      padding: 1rem 2rem;
    }
  }
}

.audio-recorder{

}

.achievements-bar.sub-bar {
  margin-top: 50px;
}

.title-blue {
  font-family: "Nexa";
  font-size: 60px;
  line-height: 67px;
  color: #001ce2;
}

$colorPrimary: #001ce2;
$colorGray: #505050;

.profile-hold {
  justify-content: flex-start;
  max-width: 1363px;
  width: 100%;
  flex-flow: column;
}

.hold-edit {
  font-family: "Noto Sans";
  padding: 40px 20px;

  .user-cover {
    max-width: 144px;
    min-height: 144px;
    border-radius: 100%;
    border: 5px solid #fff;
    box-shadow: -5px 16px 30px rgba(90, 90, 90, 0.12);
    background: #ddd;
  }
  .upload-section {
    display: inline-block;
    vertical-align: middle;
    margin-left: 22px;

    h5 {
      font-size: 22px;
      font-weight: bold;
      color: $colorPrimary;
    }
    p {
      font-size: 16px;
      color: $colorGray;
    }
  }
}
.input_photoFile {
  position: relative;
  text-decoration: none;
  font-size: 15px;
  max-width: 203px;
  color: #fff;
  min-height: 48px;
  padding: 0 24.5px;
  background: $colorPrimary;
  display: inline-block;
  border-radius: 8px;

  &:hover {
    opacity: 0.8;
    color: #fff;
    text-decoration: none;
  }
}
.input_photoFile::-webkit-file-upload-button {
  visibility: hidden;
}
.input_photoFile::before {
  content: "Choose photo now";
  outline: none;
  white-space: nowrap;
  -webkit-user-select: none;
  cursor: pointer;
  line-height: 47px;
  position: absolute;
  background: url("/images/resume_builder/profile/icon-file.png") center left
    no-repeat;
  padding-left: 22px;
}

.form-edit_profile {
  display: flex;
  justify-content: center;
  flex-flow: column;
  margin-top: 40px;

  .actions {
    display: flex;
    max-width: 490px;
    margin-top: 12.5px;
  }
}

.btn btn-filled {
  text-decoration: none;
  font-size: 15px;
  min-width: 203px;
  max-width: 216px;
  color: #fff;
  min-height: 51px;
  padding: 0 15.8px 0 21.4px;
  background: $colorPrimary;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  border-radius: 8px;
  font-family: "Noto Sans";

  img {
    margin-right: 10.5px;
  }

  &:hover {
    opacity: 0.8;
    color: #fff;
    text-decoration: none;
  }
}

.hold-tab {
  justify-content: flex-start;
  display: flex;
  align-items: center;
  margin-top: 55px;

  .input-field {
    max-width: 100%;
    min-width: 50.8%;

    label {
      font-size: 23px;
      font-weight: 500;
      color: #3c3748;
    }

    input,
    select {
      font-size: 22px;
      min-height: 76px;
      color: #505050;
    }
  }

  .btn btn-filled {
    min-width: 294px;
    min-height: 75px;
    margin-left: 5%;
    font-size: 23px;
    font-weight: 500;
    border: 1.5px solid #1f5de4;
  }
  &.social {
    flex-flow: column;
    align-items: flex-start;
  }
  &.wrapp {
    flex-wrap: wrap;
    align-items: center;
  }
}

.quick-opts {
  background: #f6f6f6;
  padding: 18.5px 30px;
  display: inline-flex;
  justify-content: center;
  align-items: center;
  margin-left: 29px;
  border-radius: 8px;

  a {
    text-decoration: none;
    margin-right: 37px;

    &:last-child {
      margin: 0;
    }

    .edit {
      background: url("/images/resume_builder/profile/icon-edit.png") no-repeat;
      width: 44px;
      height: 39px;
      display: block;
    }
    .copy {
      background: url("/images/resume_builder/profile/icon-copy.png") no-repeat;
      width: 33.7px;
      height: 39px;
      display: block;
    }
    .share {
      background: url("/images/resume_builder/profile/icon-share.png") no-repeat;
      width: 44px;
      height: 39px;
      display: block;
    }
  }
}

/** Social tab */
.btn-outline {
  min-width: 226px;
  min-height: 62px;
  font-family: "Noto Sans";
  font-size: 21px;
  font-weight: 500;
  color: #001ce2;
  display: inline-flex;
  justify-content: center;
  align-items: center;
  border: 1px solid #1f5de4;
  border-radius: 8px;
  text-decoration: none;
  outline: none;
  background: #fff;

  &::before {
    content: "";
    width: 31.4px;
    height: 31.4px;
    background: url("/images/resume_builder/profile/icon-plus.png");
    margin-right: 12px;
  }

  &:hover {
    text-decoration: none;
  }

  + .btn-outline {
    margin-left: 46px;
  }
}

.btn-close {
  min-width: 62px;
  min-height: 62px;
  font-family: "Noto Sans";
  font-size: 21px;
  font-weight: 500;
  color: #001ce2;
  display: inline-flex;
  justify-content: center;
  align-items: center;
  border: 1px solid #1f5de4;
  border-radius: 8px;
  text-decoration: none;
  outline: none;
  background: #fff;
  text-transform: uppercase;

  &:hover {
    text-decoration: none;
  }
}

/** Add new links flow */
.addItem-wrap {
  display: flex;
  justify-content: flex-start;
  align-items: center;
  min-width: 60%;

  .input-field {
    min-width: 100%;
  }
}

.list-links {
  margin-top: 56.2px;

  ul {
    margin: 0;
    padding: 0;
    list-style: none;
    display: flex;
    flex-direction: column;
    position: relative;

    li {
      display: flex;
      margin-bottom: 57.9px;
      min-height: 45px;
      opacity: 1;
      transition: all 0.5s ease-out;
      transform: translateY(0px);

      span {
        font-size: 25px;
        font-weight: 500;
        font-family: "Noto Sans";
        color: #505050;

        &.info-link {
          img {
            margin-right: 20px;
            min-width: 45px;
          }
        }

        a {
          &.disable {
            opacity: 0.5;
            pointer-events: none;
          }
        }
      }
    }
  }
}

.input-select {
  &.__md {
    margin-left: 27.6px;
    min-height: 39px;

    .dropdown-toggle {
      font-size: 19px;
      padding: 0 15px;
    }
    .dropdown-menu {
      .dropdown-item {
        font-size: 19px;
        padding: 5px 19px;

        .option-icon {
          height: 14px;
        }
      }
      &.show {
        transform: translate3d(0px, 40px, 0px) !important;
      }
    }
  }
}

/** Reorder items */
.move-item {
  display: inline-flex;
  margin-right: 19.3px;
  flex-flow: column;
  justify-content: space-between;

  a {
    width: 18px;
    height: 12px;
  }

  .go_up {
    vertical-align: top;
    background: url("/images/resume_builder/profile/arrow-up.png");
    background-repeat: no-repeat;
  }
  .go_down {
    vertical-align: bottom;
    background: url("/images/resume_builder/profile/arrow-down.png");
    background-repeat: no-repeat;
  }
}

.lang-items {
  margin: 0;
  padding: 0;

  .lang-item {
    display: flex;
    justify-content: flex-start;
    align-items: center;

    .flagLang {
      margin: 0px 25px;
    }
    .nameLang {
      font-size: 39px;
      font-weight: 700;
      color: #001ce2;
    }
  }
}

/** Moving animate */
.animated {
  -webkit-animation-duration: 0.5s;
  animation-duration: 0.5s;
  -webkit-animation-fill-mode: both;
  animation-fill-mode: both;
}

@keyframes fadeIn {
  from {
    opacity: 0;
  }

  to {
    opacity: 1;
  }
}

.fadeIn {
  -webkit-animation-name: fadeIn;
  animation-name: fadeIn;

  &.movingUp {
    animation: transUp 1s ease-in;
  }
  &.movingDown {
    animation: transDown 1s ease-in;
  }
}

@keyframes transUp {
  50% {
    transform: translateY(-100px);
  }
}
@keyframes transDown {
  50% {
    transform: translateY(100px);
  }
}

.choose-photo-btn {
  a {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 203px;
    height: 48px;

    background: #001ce2 0% 0% no-repeat padding-box;
    border-radius: 8px;

    font: 500 15px Noto Sans;
    letter-spacing: 0;
    color: #ffffff;
    opacity: 1;

    img {
      width: 13px;
      height: 16px;
      margin-right: 7px;
    }
  }
}
</style>
