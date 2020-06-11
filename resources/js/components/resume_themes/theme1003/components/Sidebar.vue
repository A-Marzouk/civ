<template>
	<div class="sidebar-wrapper tw-overflow-hidden tw-z-30 screen425px:tw-hidden" :class="{'open': isOpen}" ref="sidebar" @click="onClose">
		<div class="sidebar tw-relative tw-overflow-x-hidden tw-pb-10">
			<div class="tw-absolute tw-top-0 tw-right-0 tw-text-white tw-p-5px tw-mt-20px tw-mr-25px tw-cursor-pointer" @click="$emit('onClose')">
				<svg viewBox="0 0 9 10" class="tw-w-10px tw-h-10px tw-fill-current" xmlns="http://www.w3.org/2000/svg">
					<path d="M9.19998 0.806647C8.93998 0.546647 8.51998 0.546647 8.25998 0.806647L4.99998 4.05998L1.73998 0.79998C1.47998 0.53998 1.05998 0.53998 0.79998 0.79998C0.53998 1.05998 0.53998 1.47998 0.79998 1.73998L4.05998 4.99998L0.79998 8.25998C0.53998 8.51998 0.53998 8.93998 0.79998 9.19998C1.05998 9.45998 1.47998 9.45998 1.73998 9.19998L4.99998 5.93998L8.25998 9.19998C8.51998 9.45998 8.93998 9.45998 9.19998 9.19998C9.45998 8.93998 9.45998 8.51998 9.19998 8.25998L5.93998 4.99998L9.19998 1.73998C9.45331 1.48665 9.45331 1.05998 9.19998 0.806647Z" />
				</svg>
			</div>

			<div class="tw-pt-10 tw-pl-4">
				<img class="tw-w-24 tw-h-24 tw-rounded-lg" :src="currentUser.avatar" />
			</div>

			<div class="sidebar__body">
				<h3 class="user__fullname tw-font-open-sans tw-text-white tw-font-bold">
					{{ currentUser.fullname }}
				</h3>

				<p class="user__jobtitle tw-font-poppins tw-text-white">{{ currentUser.jobTitle }}</p>

				<!-- social media links -->
				<div class="social-media-links">
					<!-- Twitter link -->
					<a href="#" class="social-media__link">
						<svg width="14" height="12" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path fill="#7EC3D2" d="M12.56 3.148c.01.125.01.25.01.374 0 3.793-2.887 8.163-8.164 8.163A8.108 8.108 0 010 10.397c.231.027.453.036.693.036a5.746 5.746 0 003.562-1.226 2.874 2.874 0 01-2.683-1.99c.178.027.356.044.542.044.258 0 .515-.035.755-.097a2.87 2.87 0 01-2.3-2.816v-.036a2.89 2.89 0 001.296.364 2.867 2.867 0 01-1.279-2.39c0-.532.142-1.02.391-1.447A8.156 8.156 0 006.893 3.84a3.239 3.239 0 01-.07-.657c0-1.581 1.278-2.87 2.869-2.87.826 0 1.572.347 2.096.907a5.649 5.649 0 001.821-.693 2.862 2.862 0 01-1.261 1.581A5.752 5.752 0 0014 1.665a6.169 6.169 0 01-1.44 1.483z" />
						</svg>
					</a>

					<!-- Facebook link -->
					<a href="#" class="social-media__link tw-ml-5">
						<svg width="8" height="14" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path fill="#434FBE" d="M5.9 2.324H7.22V.098A17.607 17.607 0 005.299 0C3.4 0 2.097 1.16 2.097 3.29v1.96H0v2.488h2.097V14h2.57V7.738H6.68L7 5.25H4.668V3.536c0-.72.2-1.212 1.233-1.212z" />
						</svg>
					</a>

					<!-- Instagram link -->
					<a href="#" class="social-media__link tw-ml-5">
						<svg width="13" height="14" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path fill="#F40FED" d="M6.128 3.855a3.137 3.137 0 00-3.142 3.142 3.137 3.137 0 003.142 3.142A3.137 3.137 0 009.27 6.997a3.137 3.137 0 00-3.142-3.142zm0 5.185a2.046 2.046 0 01-2.043-2.043c0-1.126.916-2.042 2.043-2.042 1.126 0 2.042.916 2.042 2.042A2.046 2.046 0 016.128 9.04zm4.003-5.313a.731.731 0 01-.733.733.733.733 0 11.733-.733zm2.08.744c-.046-.982-.27-1.852-.99-2.568-.716-.716-1.585-.94-2.567-.99C7.643.856 4.61.856 3.598.913c-.978.047-1.848.27-2.567.987-.72.717-.94 1.586-.99 2.568-.057 1.012-.057 4.044 0 5.056.046.981.27 1.85.99 2.567.719.717 1.586.94 2.567.99 1.012.058 4.045.058 5.056 0 .982-.046 1.851-.27 2.568-.99.716-.716.94-1.586.99-2.567.057-1.012.057-4.042 0-5.053zm-1.306 6.138a2.068 2.068 0 01-1.165 1.165c-.807.32-2.72.246-3.612.246-.892 0-2.808.071-3.612-.246A2.068 2.068 0 011.35 10.61c-.32-.806-.246-2.72-.246-3.612 0-.891-.071-2.808.246-3.612A2.068 2.068 0 012.516 2.22c.806-.32 2.72-.246 3.612-.246.891 0 2.808-.071 3.612.246.536.213.949.626 1.165 1.165.32.807.246 2.72.246 3.612 0 .892.074 2.808-.246 3.612z" />
						</svg>
					</a>
				</div>

				<!-- Hire me link -->
				<div class="hire-me">
					<a href="#" class="hire-me__link tw-font-poppins tw-flex tw-items-center tw-justify-center tw-w-full tw-h-10 tw-font-bold" @click.prevent="$emit('openPaymentModal')">
						<svg width="20" height="16" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path fill="#012166" d="M20 2c0-1.1-.9-2-2-2H2C.9 0 0 .9 0 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V2zm-2 0l-8 5-8-5h16zm0 12H2V4l8 5 8-5v10z" />
						</svg>
						<span class="tw-pl-5">Hire me</span>
					</a>
				</div>

				<div class="about-me">
					<h2 class="about-me__title tw-font-poppins tw-font-bold tw-text-white tw-text-xs">About me</h2>
					<p class="about-me__detail tw-font-poppins tw-text-white tw-text-xs">Donec a augue gravida, vulputate ligula et, pellentesque arcu. Morbi feugiat eros nec sem ultrices, et venenatis velit posuere. Donec bibendum commodo dui, eget sollicitudin urna sagittis non. Donec ac commodo tortor..</p>
				</div>

				<div class="user__rate tw-pt-10">
					<div class="hour-rate">Hour rate <strong class="tw-text-white tw-text-xl">${{ currentUser.hourRate }}</strong></div>
					<div class="weekly-availibility">Weekly availability <strong class="tw-text-white tw-text-xl">${{ currentUser.weeklyAvailability }}</strong></div>
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

	watch: {
		isOpen(val) {
			document.body.style.overflow = val ? "hidden" : "";
		}
	},

	methods: {
		onClose(e) {
			if (this.$refs.sidebar === e.target) {
				this.$emit("onClose");
			}
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

.sidebar-wrapper {
	position: absolute;
	top: 0;
	right: 100%;
	bottom: 0;
	left: 0;
	transition: all 0.3s;

	.sidebar {
		height: 100%;
		width: 0;
		background: linear-gradient(180deg, #012e84 0%, #012166 100%);
		transition: all ease-out 0.3s;
	}

	&.open {
		right: 0;

		.sidebar {
			width: 320px;
		}
	}
}

.sidebar__body {
	width: 320px;
	padding: 30px 37px 0 20px;
}

@media (min-width: $sm) {
	.sidebar-wrapper {
		&.open {
			.sidebar {
				width: 360px;
			}
		}
	}

	.sidebar__body {
		width: 360px;
	}
}

.user__fullname {
	font-size: 24px;
	line-height: 21px;
}

.user__jobtitle {
	font-size: 14px;
	line-height: 21px;
	padding-top: 5px;
}

.social-media-links {
	display: flex;
	padding-top: 15px;

	.social-media__link {
		display: flex;
		align-items: center;
		justify-content: center;
		width: 30px;
		height: 30px;
		background: #ffffff;
		border-radius: 3px;
	}
}

.hire-me {
	padding-top: 30px;

	.hire-me__link {
		background: #f0f0f3;
		font-size: 14px;
		line-height: 21px;
		border-radius: 3px;
		font-weight: 700;
		color: #012166;

		span {
			font-family: inherit;
			font-weight: inherit;
			color: inherit;
		}
	}
}

.about-me {
	padding-top: 30px;

	.about-me__title {
		line-height: 18px;
	}

	.about-me__detail {
		line-height: 18px;
	}
}

.user__rate {
	.hour-rate,
	.weekly-availibility {
		text-transform: uppercase;
		color: rgba(255, 255, 255, 0.5);
		font-size: 14px;
		line-height: 21px;

		strong {
			margin-left: 15px;
		}
	}

	.weekly-availibility {
		padding-top: 18px;
	}
}
.text-semi-white {
}
</style>
