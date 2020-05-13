<template>
	<div class="modal-component__wrapper tw-flex tw-items-center tw-justify-center tw-w-full tw-fixed tw-top-0 tw-right-0 tw-bottom-0 tw-left-0 tw-z-50" v-if="isOpen">
		<div class="modal-component tw-relative tw-rounded-md tw-p-8">
			<div class="modal-component__header">
				<div class="close-icon tw-absolute tw-top-0 tw-right-0 tw-text-black tw-cursor-pointer" @click="$emit('onClose')">
					<svg viewBox="0 0 9 10" class="tw-fill-current" xmlns="http://www.w3.org/2000/svg">
						<path d="M9.19998 0.806647C8.93998 0.546647 8.51998 0.546647 8.25998 0.806647L4.99998 4.05998L1.73998 0.79998C1.47998 0.53998 1.05998 0.53998 0.79998 0.79998C0.53998 1.05998 0.53998 1.47998 0.79998 1.73998L4.05998 4.99998L0.79998 8.25998C0.53998 8.51998 0.53998 8.93998 0.79998 9.19998C1.05998 9.45998 1.47998 9.45998 1.73998 9.19998L4.99998 5.93998L8.25998 9.19998C8.51998 9.45998 8.93998 9.45998 9.19998 9.19998C9.45998 8.93998 9.45998 8.51998 9.19998 8.25998L5.93998 4.99998L9.19998 1.73998C9.45331 1.48665 9.45331 1.05998 9.19998 0.806647Z" />
					</svg>
				</div>
			</div>
			<div class="modal-component__body">
				<slot />
			</div>
		</div>
	</div>
</template>

<script>
export default {
	name: "modal",

	props: {
		isOpen: {
			type: Boolean,
			default: false
		}
	}
};
</script>

<style lang="scss" scoped>
@import "./../scss/variables";

.modal-component__wrapper {
	padding: 25px;
}

.modal-component {
	width: 100%;
	max-width: 770px;
	background: #fafafa;
	box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.15);
}

.close-icon {
	padding-top: 14px;
	padding-right: 14px;

	svg {
		width: 10px;
		height: 10px;
	}
}

@media (min-width: $md) {
	.modal-component {
		padding: 72px 82px;
		border-radius: 10px;
	}

	.close-icon {
		padding-top: 30px;
		padding-right: 30px;

		svg {
			width: 18px;
			height: 18px;
		}
	}
}

@media (min-width: $lg) {
	.modal-component {
		padding: 92px 137px;
	}

	.close-icon {
		padding-top: 30px;
		padding-right: 30px;

		svg {
			width: 22px;
			height: 22px;
		}
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
}
</style>
