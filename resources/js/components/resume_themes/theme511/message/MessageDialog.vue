<template>
  <div class="msg" v-show="messageToggle">
    <div class="msg__content">
      <v-container>
        <v-row class="px-4">
          <v-col cols="12" class="mt-sm-8 mt-2">
            <v-row no-gutters>
              <v-col cols="10">
                <div class="msg-title">Message</div>
              </v-col>
              <v-col cols="auto" class="ml-auto">
                <v-icon dark large @click="closeDialog()">mdi-close</v-icon>
              </v-col>
            </v-row>

            <v-form class="mt-sm-8 mt-2">
              <v-row justify="center">
                <v-col cols="12">
                  <div class="input--label ml-6">Name</div>
                  <v-text-field class="input--field" elevation="0" placeholder="Name" solo></v-text-field>
                </v-col>
              </v-row>
              <v-row justify="center">
                <v-col cols="12">
                  <div class="input--label ml-6">Email</div>
                  <v-text-field
                    class="input--field"
                    elevation="0"
                    label="Email"
                    placeholder="Email"
                    solo
                    type="email"
                  ></v-text-field>
                </v-col>
              </v-row>
              <v-row justify="center">
                <v-col cols="12">
                  <div class="input--label ml-6 pb-1">Message</div>
                  <textarea placeholder="Message" class="message"></textarea>
                </v-col>
              </v-row>
              <v-row justify="center" class="py-1">
                <v-col cols="12" sm="12" lg="12" class="text-center">
                  <v-btn class="button--payment" height="60">
                    <div class="text-capitalize paytitle">Send message</div>
                  </v-btn>
                </v-col>
              </v-row>
            </v-form>
          </v-col>
        </v-row>
      </v-container>
    </div>
  </div>
</template>

<script>
export default {
    props:["messageToggle","closeDialog"],
    
    
}
</script>

<style lang="scss" scoped>
.msg {
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
    width: 500px;
    height: auto;
    background: #6764c8;
    border-radius: 50px;

    @media screen and (max-width: 475px) {
      width: 95%;
      height: 90vh;
      background: #6764c8;
      border-radius: 50px;
    }
  }
}

//message-modal-style
.message {
  width: 100%;
  height: 147px;
  border: 5px solid #39e1aa;
  background-color: #ffff;
  border-radius: 40px;
  padding: 20px;
}
.message:focus,
textarea:focus {
  outline: none !important;
  border-color: #39e1aa;
}
.v-label {
  color: #000000;

  opacity: 0.5 !important;
}
.input--label {
  font-family: Poppins;
  font-style: normal;
  font-weight: normal;
  font-size: 0.8rem;
  line-height: 24px;
  color: #ffffff;
}
.msg-title {
  text-align: left;
  font-family: Poppins;
  font-style: normal;
  font-weight: 800;
  font-size: 1.5rem;
  line-height: 1.5rem;
  color: #ffffff;
}

.input--field {
  border-radius: 50px;
  box-sizing: border-box;
  height: 58px;
  border: 5px solid #39e1aa;
}
.input--field .message {
  border-radius: 50px;
  box-sizing: border-box;
  height: 147px;
  border: 5px solid #39e1aa;
}
.button--payment {
  border-radius: 50px;
  box-sizing: border-box;

  border: 5px solid #f56068;
  width: 233px;
}

.paytitle {
  font-family: Poppins;
  font-style: normal;
  font-weight: bold;
  font-size: 1.2rem;
  line-height: 1.5rem;

  color: #f56068;
}
//message-modal-style
// Mobile Version
@media screen and (max-width: 475px) {
  .message {
    height: 80px;
  }
}
// Mobile Version
</style>