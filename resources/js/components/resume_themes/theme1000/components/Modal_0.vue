<template>
	<div class="modal-component__wrapper tw-flex tw-items-center tw-justify-center tw-w-full tw-fixed tw-top-0 tw-right-0 tw-bottom-0 tw-left-0 tw-z-50" v-if="isOpen">
		<div class="modal-component tw-relative tw-rounded-md">
			<div class="close-icon tw-absolute tw-top-0 tw-right-0 tw-text-black tw-cursor-pointer" @click="$emit('onClose')">
				<svg viewBox="0 0 9 10" class="tw-fill-current" xmlns="http://www.w3.org/2000/svg">
					<path d="M9.19998 0.806647C8.93998 0.546647 8.51998 0.546647 8.25998 0.806647L4.99998 4.05998L1.73998 0.79998C1.47998 0.53998 1.05998 0.53998 0.79998 0.79998C0.53998 1.05998 0.53998 1.47998 0.79998 1.73998L4.05998 4.99998L0.79998 8.25998C0.53998 8.51998 0.53998 8.93998 0.79998 9.19998C1.05998 9.45998 1.47998 9.45998 1.73998 9.19998L4.99998 5.93998L8.25998 9.19998C8.51998 9.45998 8.93998 9.45998 9.19998 9.19998C9.45998 8.93998 9.45998 8.51998 9.19998 8.25998L5.93998 4.99998L9.19998 1.73998C9.45331 1.48665 9.45331 1.05998 9.19998 0.806647Z" />
				</svg>
			</div>

			<div class="modal-component__body tw-w-full tw-h-full">
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
	},

	watch: {
		isOpen(val) {
			document.body.style.overflow = val ? "hidden" : "";
		}
	},

	mounted() {
		if (this.isOpen) {
			document.body.style.overflow = "hidden";
		}
	}
};
</script>

<style lang="scss" scoped>
@import "./../scss/variables";

.modal-component__wrapper {
	padding: 25px;
}

.modal-component__body {
	padding: 15px;
}

.modal-component {
	display: flex;
	align-items: center;
	justify-content: center;
	width: 100%;
	padding-top: 70px;
	max-width: 770px;
	background: #fafafa;
	box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.15);
}

.close-icon {
	padding: 5px;
	margin-top: 20px;
	margin-right: 20px;

	svg {
		width: 13.5px;
		height: 13.5px;
	}
}

@media (min-width: $md) {
	.modal-component {
		justify-items: start;
		border-radius: 10px;
	}

	.close-icon {
		margin-top: 40px;
		margin-right: 40px;
	}
}

@media (min-width: $lg) {
	.modal-component {
		max-width: 1024px;
		padding: 187px 52px;
	}

	.close-icon {
		margin-top: 50px;
		margin-right: 50px;
	}
}
</style>
