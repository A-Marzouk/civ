<template>
	<div v-if="isOpen" ref="imagePreview" class="image-preview tw-z-10" @click="onClose">
		<div class="image-preview__inner tw-relative tw-w-5/6 tw-z-20">
			<div class="close-icon tw-absolute tw-top-0 tw-right-0 tw-text-black tw-cursor-pointer" @click="$emit('onClose')">
				<svg viewBox="0 0 9 10" class="tw-fill-current" xmlns="http://www.w3.org/2000/svg">
					<path d="M9.19998 0.806647C8.93998 0.546647 8.51998 0.546647 8.25998 0.806647L4.99998 4.05998L1.73998 0.79998C1.47998 0.53998 1.05998 0.53998 0.79998 0.79998C0.53998 1.05998 0.53998 1.47998 0.79998 1.73998L4.05998 4.99998L0.79998 8.25998C0.53998 8.51998 0.53998 8.93998 0.79998 9.19998C1.05998 9.45998 1.47998 9.45998 1.73998 9.19998L4.99998 5.93998L8.25998 9.19998C8.51998 9.45998 8.93998 9.45998 9.19998 9.19998C9.45998 8.93998 9.45998 8.51998 9.19998 8.25998L5.93998 4.99998L9.19998 1.73998C9.45331 1.48665 9.45331 1.05998 9.19998 0.806647Z" />
				</svg>
			</div>
			<img :src="url" class="image-preview__thumbnail tw-w-full">
		</div>
	</div>
</template>

<script>
export default {
	name: "image-preview",

	props: {
		isOpen: {
			type: Boolean,
			default: false
		},
		url: {
			type: String,
			required: true
		}
	},

	methods: {
		onClose(e) {
			if (this.$refs.imagePreview === e.target) {
				this.$emit("onClose");
			}
		}
	}
};
</script>

<style lang="scss" scoped>
@import "./../../scss/variables";

.image-preview {
	position: fixed;
	top: 0;
	right: 0;
	bottom: 0;
	left: 0;
	display: flex;
	align-items: center;
	padding: 14px;
	justify-content: center;
	background: rgba(0, 0, 0, 0.25);
}

.close-icon {
	padding-top: 14px;
	padding-right: 14px;

	svg {
		width: 14px;
		height: 14px;
	}
}

.image-preview__thumbnail {
	border-radius: 10px;
}

@media (min-width: $md) {
	.image-preview__inner {
		width: 65%;
	}

	.close-icon {
		padding-top: 30px;
		padding-right: 30px;

		svg {
			width: 18px;
			height: 18px;
		}
	}

	.image-preview__thumbnail {
		border-radius: 25px;
	}
}

@media (min-width: $lg) {
	.close-icon {
		padding-top: 30px;
		padding-right: 30px;

		svg {
			width: 22px;
			height: 22px;
		}
	}

	.image-preview__thumbnail {
		border-radius: 35px;
	}
}
@media (min-width: $xl) {
	.close-icon {
		padding-top: 40px;
		padding-right: 40px;

		svg {
			width: 32px;
			height: 32px;
		}
	}

	.image-preview__thumbnail {
		border-radius: 50px;
	}
}
</style>
