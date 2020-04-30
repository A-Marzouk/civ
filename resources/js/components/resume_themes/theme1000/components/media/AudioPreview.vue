<template>
	<div v-if="true || media.id===1" class="audio-preview">
		<div class="audio-preview__thumbnail">
			<img :src="media.thumbnail">
		</div>
		<div class="audio-preview__detail tw-font-poppins">
			<h4 class="detail__title" v-text="media.title"></h4>
			<div class="detail__artist-name" v-text="media.artist"></div>
			<div class="detail__track-duration tw-text-black" v-text="media.duration"></div>
		</div>
	</div>

</template>

<script>
export default {
	name: "audio-preview",

	props: {
		media: {
			type: Object,
			required: true
		}
	}
};
</script>

<style lang="scss" scoped>
@import "./../../scss/variables";

.audio-preview {
	height: 130px;
	display: flex;
	align-items: center;
	background: #eeeff1;
	border-radius: 9px;

	.audio-preview__thumbnail {
		padding-left: 25px;

		img {
			width: 70px;
			height: 70px;
			border-radius: 9px;
		}
	}

	.audio-preview__detail {
		flex: 1;
		padding-left: 20px;

		.detail__title {
			font-size: 13px;
			word-break: break-word;
			line-height: 27px;
			font-weight: 700;
		}

		.detail__artist-name {
			color: rgba(0, 0, 0, 0.55);
			font-size: 12px;
			line-height: 18px;
		}

		.detail__track-duration {
			font-size: 12px;
			line-height: 18px;
		}
	}
}

@media (min-width: $sm) {
	.audio-preview {
		height: 87px;
		border-radius: 9px;

		.audio-preview__thumbnail {
			padding-left: 8.5px;
		}

		.audio-preview__detail {
			padding-left: 8.5px;

			.detail__title {
				font-size: 13px;
				line-height: 18px;
				font-weight: 700;
			}

			.detail__artist-name {
				font-size: 12px;
				color: rgba(0, 0, 0, 0.55);
			}

			.detail__track-duration {
				font-size: 12px;
			}
		}
	}
}

@media (min-width: $md) {
	.audio-preview {
		height: 126px;

		.audio-preview__thumbnail {
			padding-left: 30px;
		}

		.audio-preview__detail {
			padding-left: 20px;

			.detail__title {
				font-size: 18px;
				line-height: 27px;
			}

			.detail__artist-name {
			}

			.detail__track-duration {
			}
		}
	}
}

@media (min-width: $lg) {
	.audio-preview {
		height: 86px;
		border-radius: 9px;

		.audio-preview__thumbnail {
			padding-left: 8.5px;
		}

		.audio-preview__detail {
			padding-left: 8.5px;

			.detail__title {
				font-size: 13px;
				line-height: 18px;
				font-weight: 700;
			}

			.detail__artist-name {
				font-size: 12px;
				color: rgba(0, 0, 0, 0.55);
			}

			.detail__track-duration {
				font-size: 12px;
			}
		}
	}
}

@media (min-width: 1600px) {
	.audio-preview {
		height: 135px;

		.audio-preview__thumbnail {
			padding-left: 30px;
		}

		.audio-preview__detail {
			padding-left: 20px;

			.detail__title {
				font-size: 18px;
				line-height: 27px;
			}

			.detail__artist-name {
			}

			.detail__track-duration {
			}
		}
	}
}
</style>
