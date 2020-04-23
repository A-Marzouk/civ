<template>
	<div class="sidebar-wrapper tw-overflow-hidden tw-z-30" :class="{'open': isOpen}" ref="sidebar" @click="onClose">
		<div class="sidebar tw-relative tw-overflow-x-hidden tw-pb-10">
			<div class="tw-absolute tw-top-0 tw-right-0 tw-text-white tw-p-5px tw-mt-20px tw-mr-25px tw-cursor-pointer" @click="$emit('onClose')">
				<svg viewBox="0 0 9 10" class="tw-w-10px tw-h-10px tw-fill-current" xmlns="http://www.w3.org/2000/svg">
					<path d="M9.19998 0.806647C8.93998 0.546647 8.51998 0.546647 8.25998 0.806647L4.99998 4.05998L1.73998 0.79998C1.47998 0.53998 1.05998 0.53998 0.79998 0.79998C0.53998 1.05998 0.53998 1.47998 0.79998 1.73998L4.05998 4.99998L0.79998 8.25998C0.53998 8.51998 0.53998 8.93998 0.79998 9.19998C1.05998 9.45998 1.47998 9.45998 1.73998 9.19998L4.99998 5.93998L8.25998 9.19998C8.51998 9.45998 8.93998 9.45998 9.19998 9.19998C9.45998 8.93998 9.45998 8.51998 9.19998 8.25998L5.93998 4.99998L9.19998 1.73998C9.45331 1.48665 9.45331 1.05998 9.19998 0.806647Z" />
				</svg>
			</div>

			<div class="tw-pt-10 tw-pl-4">
				<img class="tw-w-24 tw-h-24 tw-rounded-lg" :src="currentUser.avatar" />
			</div>

			<div class="tw-pl-5 tw-pr-37px tw-pt-30px">
				<h3 class="tw-text-white tw-text-2xl tw-font-open-sans tw-font-bold tw-leading-21px">
					{{ currentUser.fullname }}
				</h3>

				<p class="tw-font-poppins tw-text-white tw-text-14px tw-leading-21px tw-pt-5px">{{ currentUser.jobTitle }}</p>

				<!-- social media links -->
				<div class="tw-flex tw-pt-15px">
					<!-- Twitter icon -->
					<a href="#" class="tw-flex tw-items-center tw-justify-center tw-w-30px tw-h-30px tw-bg-white tw-rounded-3px">
						<svg width="14" height="12" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path fill="#7EC3D2" d="M12.56 3.148c.01.125.01.25.01.374 0 3.793-2.887 8.163-8.164 8.163A8.108 8.108 0 010 10.397c.231.027.453.036.693.036a5.746 5.746 0 003.562-1.226 2.874 2.874 0 01-2.683-1.99c.178.027.356.044.542.044.258 0 .515-.035.755-.097a2.87 2.87 0 01-2.3-2.816v-.036a2.89 2.89 0 001.296.364 2.867 2.867 0 01-1.279-2.39c0-.532.142-1.02.391-1.447A8.156 8.156 0 006.893 3.84a3.239 3.239 0 01-.07-.657c0-1.581 1.278-2.87 2.869-2.87.826 0 1.572.347 2.096.907a5.649 5.649 0 001.821-.693 2.862 2.862 0 01-1.261 1.581A5.752 5.752 0 0014 1.665a6.169 6.169 0 01-1.44 1.483z" />
						</svg>
					</a>

					<!-- Facebook icon -->
					<a href="#" class="tw-flex tw-items-center tw-justify-center tw-w-30px tw-h-30px tw-bg-white tw-rounded-3px tw-ml-5">
						<svg width="8" height="14" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path fill="#434FBE" d="M5.9 2.324H7.22V.098A17.607 17.607 0 005.299 0C3.4 0 2.097 1.16 2.097 3.29v1.96H0v2.488h2.097V14h2.57V7.738H6.68L7 5.25H4.668V3.536c0-.72.2-1.212 1.233-1.212z" />
						</svg>
					</a>

					<!-- Instagram icon -->
					<a href="#" class="tw-flex tw-items-center tw-justify-center tw-w-30px tw-h-30px tw-bg-white tw-rounded-3px tw-ml-5">
						<svg width="13" height="14" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path fill="#F40FED" d="M6.128 3.855a3.137 3.137 0 00-3.142 3.142 3.137 3.137 0 003.142 3.142A3.137 3.137 0 009.27 6.997a3.137 3.137 0 00-3.142-3.142zm0 5.185a2.046 2.046 0 01-2.043-2.043c0-1.126.916-2.042 2.043-2.042 1.126 0 2.042.916 2.042 2.042A2.046 2.046 0 016.128 9.04zm4.003-5.313a.731.731 0 01-.733.733.733.733 0 11.733-.733zm2.08.744c-.046-.982-.27-1.852-.99-2.568-.716-.716-1.585-.94-2.567-.99C7.643.856 4.61.856 3.598.913c-.978.047-1.848.27-2.567.987-.72.717-.94 1.586-.99 2.568-.057 1.012-.057 4.044 0 5.056.046.981.27 1.85.99 2.567.719.717 1.586.94 2.567.99 1.012.058 4.045.058 5.056 0 .982-.046 1.851-.27 2.568-.99.716-.716.94-1.586.99-2.567.057-1.012.057-4.042 0-5.053zm-1.306 6.138a2.068 2.068 0 01-1.165 1.165c-.807.32-2.72.246-3.612.246-.892 0-2.808.071-3.612-.246A2.068 2.068 0 011.35 10.61c-.32-.806-.246-2.72-.246-3.612 0-.891-.071-2.808.246-3.612A2.068 2.068 0 012.516 2.22c.806-.32 2.72-.246 3.612-.246.891 0 2.808-.071 3.612.246.536.213.949.626 1.165 1.165.32.807.246 2.72.246 3.612 0 .892.074 2.808-.246 3.612z" />
						</svg>
					</a>
				</div>

				<div class="tw-pt-30px tw-font-poppins">
					<a href="#" class="tw-flex tw-items-center tw-justify-center tw-w-full tw-h-10 tw-font-bold tw-text-14px tw-leading-21px hire-me-bg tw-rounded-3px">
						<svg width="20" height="16" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path fill="#012166" d="M20 2c0-1.1-.9-2-2-2H2C.9 0 0 .9 0 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V2zm-2 0l-8 5-8-5h16zm0 12H2V4l8 5 8-5v10z" />
						</svg>
						<span class="tw-pl-5">Hire me</span>
					</a>
				</div>

				<div class="tw-pt-30px">
					<h2 class="tw-font-poppins tw-font-bold tw-text-white tw-text-xs tw-leading-18px">About me</h2>
					<p class="tw-font-poppins tw-text-white tw-text-xs tw-leading-18px">Donec a augue gravida, vulputate ligula et, pellentesque arcu. Morbi feugiat eros nec sem ultrices, et venenatis velit posuere. Donec bibendum commodo dui, eget sollicitudin urna sagittis non. Donec ac commodo tortor..</p>
				</div>

				<div class="tw-pt-10 ">
					<div class="tw-uppercase tw-text-14px tw-leading-21px text-semi-white">Hour rate <strong class="tw-text-white tw-text-xl tw-ml-15px">${{ currentUser.hourRate }}</strong></div>
					<div class="tw-uppercase tw-text-14px tw-leading-21px text-semi-white tw-pt-18px">Weekly availability <strong class="tw-text-white tw-text-xl tw-ml-15px">${{ currentUser.weeklyAvailability }}</strong></div>
				</div>
			</div>

		</div>
	</div>
</template>

<script>
export default {
	name: "sidebar",

	props: {
		currentUser: {
			type: Object,
			required: true
		},
		isOpen: {
			type: Boolean,
			default: false
		}
	},

	methods: {
		onClose(e) {
			if (this.$refs.sidebar === e.target) {
				this.$emit("onClose");
			}
		}
	}
};
</script>

<style lang="scss" scoped>
.sidebar-wrapper {
	position: absolute;
	top: 0;
	right: 100%;
	bottom: 0;
	left: 0;
	transition: all ease-out 0.3s;

	.sidebar {
		height: 100%;
		width: 0;
		background: linear-gradient(180deg, #012e84 0%, #012166 100%);
		transition: all ease-out 0.3s;
	}

	&.open {
		right: 0;

		.sidebar {
			width: 360px;
		}
	}
}

.hire-me-bg {
	background: #f0f0f3;
}

.text-semi-white {
	color: rgba(255, 255, 255, 0.5);
}
</style>
