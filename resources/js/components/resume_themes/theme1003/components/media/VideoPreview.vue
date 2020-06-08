<template>
	<div class="video-preview tw-relative tw-flex tw-items-center tw-justify-center" :style="`background: url(${media.thumbnail}) center/cover no-repeat ; height: ${getHeight}px;`">
		<div class="video-preview__button--play bg-violet tw-flex tw-items-center tw-justify-center tw-w-16 tw-h-16 tw-rounded-full">
			<svg width="17" height="19" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path fill="#fff" d="M16.5 8.634a1 1 0 010 1.732L2.25 18.593a1 1 0 01-1.5-.866V1.273a1 1 0 011.5-.866L16.5 8.634z" />
			</svg>
		</div>
		<div class="video-preview__duration tw-absolute tw-bottom-0 tw-left-0">
			<div class="duration__value tw-bg-black tw-flex tw-items-center tw-justify-center tw-font-poppins tw-text-white tw-text-xs" v-text="media.duration"></div>
		</div>
	</div>
</template>

<script>
export default {
	name: "video-preview",

	props: {
		media: {
			type: Object,
			required: true
		},
		aspectRatio: {
			type: String,
			default: "73:56"
		}
	},

	data: () => {
		return {
			width: 0
		};
	},

	computed: {
		calculatedAspectRatio() {
			return this.aspectRatio.split(":").reduce((a, b) => {
				return a / b;
			});
		},

		getHeight() {
			return this.width / this.calculatedAspectRatio;
		}
	},

	mounted() {
		this.width = this.$el.offsetWidth;
		window.onresize = () => {
			this.width = this.$el.offsetWidth;
		};
	}
};
</script>

<style lang="scss" scoped>
@import "./../../scss/variables";

.video-preview {
	border-radius: 9px;
	padding: 28px;
}

.video-preview__duration {
	padding-left: 30px;
	padding-bottom: 20px;

	.duration__value {
		line-height: 18px;
		height: 35px;
		width: 75px;
	}
}

@media (min-width: $sm) {
	.video-preview__button-play {
		height: 45px;
		width: 45px;

		svg {
			height: calc(19 * 0.7);
			width: calc(17 * 0.7);
		}
	}

	.video-preview__duration {
		padding-bottom: 8.5px;
		padding-left: 8.5px;
	}
}

@media (min-width: $md) {
	.video-preview__duration {
		padding-left: 30px;
		padding-bottom: 20px;
	}
}

@media (min-width: $lg) {
	.video-preview__duration {
		/* 	padding-bottom: 20px; */
	}
}

.bg-violet {
	background: #3f38dd;
}
.tw-w-75px {
	width: 75px;
}
</style>
