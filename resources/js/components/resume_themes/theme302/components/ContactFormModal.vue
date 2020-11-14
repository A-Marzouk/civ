<template>
  <v-dialog
    @input="$emit('input', $event)"
    :value="value"
    persistent
    max-width="912"
    overlay-opacity="0.87"
    overlay-color="#656565"
    content-class="contact-form-modal"
  >
    <v-card class="form-wrap bg-gray">
      <v-form ref="contactForm" class="contact-form sky-style">
        <v-container>
          <v-row class="form-row">
            <v-col lg="12" sm="12" cols="12">
              <v-text-field
                v-model="formMessage.name"
                :rules="formMessage.nameRules"
                placeholder="Name"
                required
                color="#202124"
              ></v-text-field>
            </v-col>
            <v-col lg="12" sm="12" cols="12">
              <v-text-field
                v-model="formMessage.email"
                :rules="formMessage.emailRules"
                placeholder="E-mail"
                required
                color="#202124"
              ></v-text-field>
            </v-col>
            <v-col lg="12" sm="12" cols="12">
              <v-textarea
                v-model="formMessage.message"
                filled
                rows="3"
                :no-resize="true"
                color="#202124"
                placeholder="Message"
              ></v-textarea>
            </v-col>
          </v-row>
          <v-row class="form-actions">
            <v-btn depressed small @click="sendMessage" class="btn-send">
              Send Message
            </v-btn>
            <v-btn text small @click="hideDialog">Cancel</v-btn>
          </v-row>
        </v-container>
      </v-form>
    </v-card>
  </v-dialog>
</template>

<script>
export default {
  name: 'ContactFormModal',
  props: { value: { type: Boolean } },
  data() {
    return {
      formMessage: {
        name: '',
        nameRules: [
          v => !!v || 'Name is required',
          v => (v && v.length <= 10) || 'Name must be less than 10 characters'
        ],
        email: '',
        emailRules: [v => !!v || 'E-mail is required', v => /.+@.+\..+/.test(v) || 'E-mail must be valid'],
        message: ''
      },
      formHasErrors: false
    };
  },
  methods: {
    sendMessage() {
      console.log('sendMessage');
    },
    hideDialog() {
      this.$emit('input', false);
      this.$refs.contactForm.reset();
    }
  }
};
</script>

<style lang="scss">
#resumeTheme302 {
  .contact-form-modal {
    @media only screen and (max-width: 413px) {
      .v-dialog {
        margin: 10px;
        .v-card.form-wrap .container {
          padding-top: 10px;
        }
      }
    }

    .form-wrap {
      .contact-form.sky-style {
        .form-row {
          @media only screen and (max-width: 413px) {
            & > div[class*='col'] {
              padding: 0 0 12px;
            }
          }
        }

        .v-input {
          .v-input__slot {
            padding: 0 !important;
          }

          input {
            height: 67px;
            min-height: 67px;
          }

          textarea,
          input {
            padding: 5px 14px;
            font-size: 22px;

            &::placeholder {
              color: #104efb;
              opacity: 0.3;
            }
          }

          .v-messages__message {
            font-size: 14px;
            line-height: 1;
          }
        }
      }

      @media only screen and (min-width: 1024px) {
        .container {
          padding: 56px 85px 36px;
        }

        .contact-form.sky-style {
          .v-input {
            textarea,
            input {
              font-size: 36px;
              line-height: 50px;
            }

            .v-messages__message {
              font-size: 18px;
            }
          }
        }
      }
    }
  }
}
</style>
<style lang="scss" scoped>
@import '../scss/variables';

.v-dialog {
  .v-card {
    padding-bottom: 80px;

    &.form-wrap {
      padding: 0;

      .container {
        padding: 20px;
      }

      .form-actions {
        justify-content: center;
        margin-top: 10px;
      }

      .v-btn {
        &.btn-send {
          max-width: 255px;
          text-align: center;
          border: 2px solid $colorBlue;
          font-family: 'Raleway';
          font-size: 24px;
          line-height: 28px;
          color: $colorBlue;
          text-decoration: none;
          background: #fff;
          outline: none;
        }

        min-width: 255px;
        font-family: 'Raleway';
        font-style: normal;
        font-weight: normal;
        font-size: 24px;
        line-height: 28px;
        color: #104efb;
        min-height: 75px;
        text-transform: capitalize;
        letter-spacing: normal;
        text-indent: 0px;
        border-radius: 0px;
      }
    }

    .v-card__actions {
      padding: 30px;
      display: flex;
      justify-content: flex-end;
    }
    .close-icon {
      color: $colorBlue;
      font-size: 46px;
    }
  }

  /** Only dialogs fixes on mobile */
  @media only screen and (max-width: 768px) {
    .v-card {
      padding-bottom: 50px;

      .container {
        padding: 20px;
      }
      &.form-wrap {
        .v-btn {
          min-width: 180px;
          font-size: 18px;
          min-height: 50px;

          &.btn-send {
            font-size: 18px;
          }
        }
      }
      .v-card__actions {
        padding: 20px;
      }
    }
  }

  @media only screen and (max-width: 480px) {
    .v-card {
      .container {
        padding: 0 20px;
      }
      &.form-wrap {
        .v-btn {
          min-width: 100px;
          font-size: 14px;
          padding: 0 15px;

          &.btn-send {
            font-size: 14px;
          }
        }
      }
      .close-icon {
        font-size: 30px;
      }
    }
  }
}
</style>
