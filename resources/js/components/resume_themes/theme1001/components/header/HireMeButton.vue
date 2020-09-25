<template>
  <div>
    <a
      class="hireme-button"
      href="#"
      @click.prevent="hireMeModal = !hireMeModal"
    >
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10.969 12.124">
        <path
          d="M7.969,12.124H3a3,3,0,0,1-3-3V3A3,3,0,0,1,3,0H7.969a3,3,0,0,1,3,3V9.123A3,3,0,0,1,7.969,12.124ZM5.479,6.062a3.17,3.17,0,0,0-2.071.686,2.848,2.848,0,0,0-.97,2.042.376.376,0,0,0,.114.217.229.229,0,0,0,.132.086H8.276a.246.246,0,0,0,.186-.068.319.319,0,0,0,.068-.235,2.764,2.764,0,0,0-.956-2.061A3.254,3.254,0,0,0,5.479,6.062Zm.005-3.03A1.212,1.212,0,1,0,6.7,4.244,1.217,1.217,0,0,0,5.485,3.031Z"
          transform="translate(0 0)"
          fill="#fff"
        />
      </svg>

      <span>Hire Me</span>
    </a>
    <div class="hireme__modal" v-show="hireMeModal">
      <div class="hireme__content">
        asdasd
      </div>
    </div>
  </div>
</template>

<script>
import HireModal from "./../hireModal/HireModal";

export default {
	name: "hire-me-button",
	components:{
		HireModal
	},
	data(){
		return {
			hireMeModal: false,
		}
	},
	methods:{
		closeHireMeModal(){
        console.log('closeHireMeModal');
        this.hireMeModal = false;
      },
	}
};
</script>

<style lang="scss" scoped>
@import "./../../scss/variables";

.hireme {
  height: 100vh;
  width: 100%;
  position: fixed;
  top: 0;
  left: 0;
  background-color: rgba(0, 0, 0, 0.9);
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
      height: auto;
      background: #6764c8;
      border-radius: 50px;
    }
  }
}
.hireme-button {
  font-family: $muli;
  display: flex;
  font-size: 11px;
  font-weight: 700;
  color: #ffffff;
  background: #f8ab08;
  justify-content: center;
  align-items: center;
  border-radius: 5px;
  width: 74px;
  height: 32px;

  &:hover {
    box-shadow: 0 3px 7px -4px rgba(0, 0, 0, 0.5);
    text-decoration: none;
  }
}

.hireme-button span {
  margin-left: 5px;
  color: inherit;
  font-size: inherit;
  font-weight: inherit;
}

.hireme-button svg {
  height: 13px;
}

@media (min-width: 375px) {
  .hireme-button {
    width: 100px;
    height: 38px;
  }
}

@media (min-width: $sm) {
  .hireme-button {
    width: 115px;
    height: 40px;
    font-size: 12px;

    svg {
      height: 13px;
    }

    span {
      margin-left: 7px;
    }
  }
}

@media (min-width: $md) {
  .hireme-button {
    border-radius: 9px;
    width: 129px;
  }

  .hireme-button svg {
    height: 13px;
  }

  .hireme-button span {
    font-size: 12px;
    line-height: 18px;
  }
}

@media (min-width: 1600px) {
  .hireme-button {
    height: 55px;
    width: 178px;
  }

  .hireme-button svg {
    height: 18px;
  }

  .hireme-button span {
    font-size: 16px;
    line-height: 20px;
  }
}

@media (min-width: $lg) {
}
</style>
