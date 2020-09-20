<template>
  <div class="chat" v-show="chatToggle">
    <div class="chat__content">
      <div class="form">
        <div class="input">
          <input class="input-field" placeholder="Name" />
        </div>
        <div class="input">
          <input class="input-field" placeholder="Email" />
        </div>
        <div class="input">
          <textarea placeholder="Message" class="message"></textarea>
        </div>

        <div class="button-section">
          <div class="left">
            <a href="#" class="send-button"> Send </a>
          </div>
        </div>
      </div>
      <div class="chat__close">
        <a href="#" class="chat__close_button" @click.prevent="closeChat()">
          <img src="/images/resume_themes/theme8/close.svg" alt="close" />
        </a>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props: ["chatToggle", "closeChat"],
};
</script>
<style lang="scss" scoped>
.chat {
  height: 100vh;
  width: 100%;
  position: fixed;
  top: 0;
  left: 0;
  background-color: rgba(0, 0, 0, 0.6);
  z-index: 9999;

  &__content {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 600px;
    height: auto;
    background: #333232;
    border-radius: 30px;
    padding: 1.5rem 1rem;

    @media screen and (max-width: 475px) {
      width: 90%;
      height: auto;
      background: #333232;
      border-radius: 30px;
    }
    .chat__close {
      width: auto;
      float: left;
      &_button {
        float: right;
        border-radius: 50%;
        border: 2px solid #005bd1;
        padding: 7px;

        img {
          width: 14px;
          height: 14px;
        }
      }
    }
    .form {
      width: 94%;
      float: left;
      margin-top: 2rem;
      padding: 1rem 1.5rem 1rem 3.5rem;
      @media screen and (max-width: 475px) {
        width: 90%;
        float: left;
        margin-top: 2rem;
        padding: 1rem 0rem 1rem 2rem;
      }
      @media screen and (max-width: 375px) {
        width: 88%;
        float: left;
        margin-top: 2rem;
        padding: 1rem 0rem 1rem 1rem;
      }
      .input {
        width: 100%;
        .label {
          font-family: "Muli-Regular", sans-serif;
          color: #172c7a;
          font-size: 14px;
          padding-left: 15px;
        }
        .input-field {
          font-family: "Open Sans";
          font-style: normal;
          font-weight: normal;
          font-size: 20px;
          line-height: 30px;
          border: none;
          border-bottom: 2px solid #fff;
          color: #fff;
          width: 100%;
          padding: 10px;
        }
        .input-field:focus {
          border: none;
          border-bottom: 2px solid #005bd1;
          color: #005bd1;
          width: 100%;
          outline: none;
        }
        .input-field::-webkit-input-placeholder {
          color: #fff;
        }
        .input-field:focus::-webkit-input-placeholder {
          color: #005bd1;
        }

        .message::-webkit-input-placeholder {
          color: #fff;
        }

        .message:focus::-webkit-input-placeholder {
          color: #005bd1;
        }
        .message {
          font-family: "Open Sans";
          font-style: normal;
          font-weight: normal;
          font-size: 20px;
          line-height: 30px;
          width: 100%;
          height: 80px;
          border: none;
          border-bottom: 2px solid #fff;
          color: #fff;
          padding: 10px;
        }
        .message:focus {
          border: none;
          border-bottom: 2px solid #005bd1;
          color: #005bd1;
          width: 100%;
          outline: none;
        }
      }
      .button-section {
        display: flex;
        width: 100%;
        justify-content: space-around;
        margin-top: 3.5rem;
        margin-bottom: 1rem;
        .left {
          width: 45%;
          float: left;
          text-align: center;
          .send-button {
            font-family: "Open Sans";
            font-style: normal;
            font-weight: normal;
            font-size: 24px;
            line-height: 33px;
            color: #ffffff;
            height: 60px;
            justify-content: center;
            display: flex;
            background: #005bd1;
            box-shadow: 0px 0px 40px rgba(0, 91, 209, 0.4);
            border-radius: 100px;
            text-align: center;
            align-items: center;
          }
          a:hover {
            color: #fff;
            text-decoration: none;
          }
        }
      }
    }
  }
}
</style>