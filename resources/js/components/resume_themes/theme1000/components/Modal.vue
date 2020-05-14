<template>
	<div v-if="isOpen" class="modal-component__wrapper">
		<div class="modal-component">
			<div class="modal-component__header">
				<a href="#" @click.prevent="$emit('onClose')">
					<svg viewBox="0 0 9 10" class="tw-fill-current" xmlns="http://www.w3.org/2000/svg">
						<path d="M9.19998 0.806647C8.93998 0.546647 8.51998 0.546647 8.25998 0.806647L4.99998 4.05998L1.73998 0.79998C1.47998 0.53998 1.05998 0.53998 0.79998 0.79998C0.53998 1.05998 0.53998 1.47998 0.79998 1.73998L4.05998 4.99998L0.79998 8.25998C0.53998 8.51998 0.53998 8.93998 0.79998 9.19998C1.05998 9.45998 1.47998 9.45998 1.73998 9.19998L4.99998 5.93998L8.25998 9.19998C8.51998 9.45998 8.93998 9.45998 9.19998 9.19998C9.45998 8.93998 9.45998 8.51998 9.19998 8.25998L5.93998 4.99998L9.19998 1.73998C9.45331 1.48665 9.45331 1.05998 9.19998 0.806647Z" />
					</svg>
				</a>
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
	position: fixed;
	top: 0;
	right: 0;
	bottom: 0;
	left: 0;
	display: flex;
	flex-direction: column;
	align-items: center;
	justify-content: center;
	z-index: 9999;

	.modal-component {
		background: white;
		border-radius: 10px;
		box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.15);
		width: 90%;
		max-width: 770px;

		.modal-component__header {
			position: relative;
			height: 45px;

			a {
				position: absolute;
				top: 0;
				right: 0;
				display: block;
				padding: 10px;
				margin-top: 15px;
				margin-right: 15px;

				svg {
					width: 13.5px;
					height: 13.5px;
				}
			}
		}
	}
}

@media (min-width: $md) {
	.modal-component__wrapper {
		.modal-component {
			width: 100%;

			.modal-component__header {
				height: 60px;

				a {
					margin-top: 35px;
					margin-right: 35px;
				}
			}
		}
	}
}

@media (min-width: $lg) {
	.modal-component__wrapper {
		.modal-component {
			max-width: 1024px;

			.modal-component__header {
				height: 55px;

				a {
					margin-top: 35px;
					margin-right: 35px;
				}
			}
		}
	}
}
</style>
