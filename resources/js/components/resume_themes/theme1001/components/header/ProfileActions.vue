<template>
  <div class="profile-actions">
    <a href="#" class="actions-toggle-button" @click.prevent="open">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22 20">
        <g transform="translate(-318.538 -40)">
          <circle
            cx="4"
            cy="4"
            r="4"
            transform="translate(318.538 40)"
            fill="#f8ab29"
          />
          <circle
            cx="4"
            cy="4"
            r="4"
            transform="translate(332.538 40)"
            fill="#f8ab29"
          />
          <circle
            cx="4"
            cy="4"
            r="4"
            transform="translate(332.538 52)"
            fill="#f8ab29"
          />
          <circle
            cx="4"
            cy="4"
            r="4"
            transform="translate(318.538 52)"
            fill="#f8ab29"
          />
        </g>
      </svg>
    </a>

    <div
      class="profile-actions__links"
      :class="{ open: isOpen }"
      @click="stopProp"
    >
      <a class="action__button" href="#" @click.prevent>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 13 13">
          <g transform="translate(0.347 0.201)">
            <rect
              width="13"
              height="13"
              transform="translate(-0.347 -0.201)"
              fill="none"
            />
            <path
              d="M1.535,3.07a.505.505,0,0,1-.358-.154L.154,1.893a.5.5,0,0,1,0-.716.494.494,0,0,1,.716,0l.665.665L3.224.154a.5.5,0,0,1,.716,0,.5.5,0,0,1,0,.716L1.893,2.917A.505.505,0,0,1,1.535,3.07Z"
              transform="translate(1.068 8.009)"
              fill="#fff"
            />
            <path
              d="M8,7H4.991A4.122,4.122,0,0,0,.833,3.231,4.327,4.327,0,0,0,0,3.312V2A2,2,0,0,1,2,0H8a2,2,0,0,1,2,2V5A2,2,0,0,1,8,7ZM1.389.942a.418.418,0,0,0-.367.212.389.389,0,0,0-.034.3.405.405,0,0,0,.2.244L4.8,3.587a.433.433,0,0,0,.4,0L8.808,1.7a.4.4,0,0,0,.2-.243.39.39,0,0,0-.033-.3A.42.42,0,0,0,8.611.942a.429.429,0,0,0-.2.049L5,2.772,1.587.991A.426.426,0,0,0,1.389.942Z"
              transform="translate(1.653 2.799)"
              fill="#fff"
            />
          </g>
        </svg>
        <span>Start A Chat!</span>
      </a>
      <a class="action__button" href="#" @click.prevent>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 13 13">
          <g transform="translate(0.021 0.201)">
            <rect
              width="13"
              height="13"
              transform="translate(-0.021 -0.201)"
              fill="none"
            />
            <g transform="translate(2.136 1.454)">
              <g>
                <path
                  d="M.364,110a1.188,1.188,0,0,0-.364.871v4.584a1.188,1.188,0,0,0,.364.871,1.188,1.188,0,0,0,.871.364h.353v-7.053H1.234A1.188,1.188,0,0,0,.364,110Z"
                  transform="translate(0 -108.224)"
                  fill="#fff"
                />
                <path
                  d="M114.573,37.077a.527.527,0,0,0-.529-.529H110.87a.527.527,0,0,0-.529.529v.882h-.705v7.053h5.642V37.958h-.705Zm-.705.882h-2.821v-.705h2.821Z"
                  transform="translate(-107.52 -36.548)"
                  fill="#fff"
                />
                <path
                  d="M430.623,110a1.188,1.188,0,0,0-.871-.364H429.4v7.053h.353a1.242,1.242,0,0,0,1.234-1.234v-4.584A1.188,1.188,0,0,0,430.623,110Z"
                  transform="translate(-421.113 -108.224)"
                  fill="#fff"
                />
              </g>
            </g>
          </g>
        </svg>
        <span>Upload Interviews</span>
      </a>
    </div>
  </div>
</template>

<script>
export default {
  name: "profile-actions",

  data: () => {
    return {
      isOpen: false
    };
  },

  computed: {
    popupAnimation() {
      return this.isOpen ? "open" : "close";
    }
  },

  methods: {
    open(e) {
      if (!this.isOpen) {
        this.stopProp(e);
      }

      this.isOpen = true;
    },

    close() {
      this.isOpen = false;
    },

    stopProp(e) {
      e.stopPropagation();
    }
  },

  mounted() {
    window.addEventListener("click", this.close);
  },

  destroyed() {
    window.removeEventListener("click", this.close);
  }
};
</script>

<style lang="scss" scoped>
@import "./../../scss/variables";

.profile-actions .actions-toggle-button {
  display: block;
  height: 20px;
  width: 22px;
  position: absolute;
  top: 0;
  right: 0;
}

.profile-actions .profile-actions__links {
  position: absolute;
  top: -100vh;
  right: 0;
  z-index: 99;
  background: #ffffff;
  width: 100%;
  opacity: 0;
  user-select: none;
  border-radius: 25px;
  padding: 45px 35px;
  box-shadow: 0 30px 30px rgba(16, 44, 44, 0.1);
  transition: opacity 0.5s;

  &.open {
    top: 37px;
    opacity: 1;
  }
}

.profile-actions__links .action__button {
  display: flex;
  color: #28404a;

  svg {
    height: 24px;
    fill: currentColor;

    path {
      fill: currentColor;
    }
  }

  span {
    color: inherit;
    font-family: $muli;
    font-size: 18px;
    margin-left: 10px;
  }

  &:nth-child(2) {
    margin-top: 35px;
  }
}

@media (min-width: $sm) {
  .profile-actions .profile-actions__links {
    padding: 50px 45px;
  }
}

@media (min-width: $md) {
  .profile-actions .actions-toggle-button {
    display: none;
  }

  .profile-actions .profile-actions__links {
    display: flex;
    opacity: 1;
    top: 0;
    background: unset;
    width: unset;
    border-radius: unset;
    padding: unset;
    box-shadow: unset;
  }

  .profile-actions__links .action__button {
    font-family: $muli;
    display: flex;
    font-size: 11px;
    font-weight: 300;
    color: #ffffff;
    background: #3d5ed4;
    justify-content: center;
    align-items: center;
    border-radius: 9px;
    width: 134px;
    height: 42px;
    transition: margin-top 0.1s;

    span {
      margin-left: 7px;
      color: inherit;
      font-size: inherit;
      font-weight: inherit;
    }

    svg {
      height: 15px;
    }

    &:nth-child(2) {
      margin-top: 0;
      margin-left: 15px;
    }

    &:hover {
      text-decoration: none;
      box-shadow: 0 3px 7px -4px rgba(0, 0, 0, 0.5);
    }
  }
}

@media (min-width: 1600px) {
  .profile-actions__links .action__button {
    font-size: 14px;
    width: 178px;
    height: 55px;
  }

  .profile-actions__links .action__button svg {
    height: 22px;
  }
}

@media (min-width: $lg) {
}
</style>
