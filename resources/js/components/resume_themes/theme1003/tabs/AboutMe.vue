<template>
	<div class="about-me">
		<div class="about-me__detail" v-text="currentUser.personal_info.about"></div>

		<div class="about-me__work-rate">
			<div class="work-rate__hour-rate">
				Hour rate <strong>${{ currentUser.payment_info[0].salary }}</strong>
			</div>
			<div class="work-rate__weekly-availability">
				Weekly availability <strong>{{ currentUser.availability_info[0].available_hours }}</strong>
			</div>
		</div>

		<div class="about-me__contact">
			<h3 class="contact__title">Follow me</h3>

			<SocialLinks :links="currentUser.links" screen="mobile" />
		</div>
	</div>
</template>

<script>
import SocialLinks from '../components/SocialLinks';
export default {
	name: 'about-me',

	components: { SocialLinks },

	props: {
		currentUser: {
			type: Object,
			required: true
		}
	}
};
</script>

<style lang="scss" scoped>
@import './../scss/variables';

.about-me {
	padding: 10px;
	font-family: $poppins;
	color: #000000;

	.about-me__detail {
		font-size: 12px;
		line-height: 18px;
	}

	.about-me__work-rate {
		display: flex;
		justify-content: space-between;
		padding-top: 40px;

		.work-rate__hour-rate,
		.work-rate__weekly-availability {
			display: flex;
			align-items: center;
			font-size: 13px;
			line-height: 21px;
			text-transform: uppercase;
			white-space: nowrap;

			strong {
				color: #df136c;
				font-weight: bold;
				font-size: 18px;
				line-height: 26px;
				margin-left: 10px;
			}
		}
	}

	.about-me__contact {
		padding-top: 40px;

		.contact__title {
			font-weight: bold;
			font-size: 12px;
			line-height: 18px;
		}
	}

	@include xs {
		.about-me__work-rate {
			padding-top: 50px;

			.work-rate__hour-rate,
			.work-rate__weekly-availability {
				font-size: 14px;

				strong {
					margin-left: 15px;
					font-size: 20px;
					line-height: 30px;
				}
			}
		}

		.about-me__contact {
			padding-top: 50px;
		}
	}

	@include md {
		margin-left: auto;
		margin-right: auto;
		max-width: 665px;

		.about-me__detail {
			font-size: 18px;
			line-height: 27px;
		}

		.about-me__work-rate {
			display: none;
		}

		.about-me__contact {
			.contact__title {
				font-weight: 600;
				font-size: 18px;
				line-height: 27px;
			}
		}
	}

	@include lg {
		max-width: $lg;

		.about-me__contact {
			display: none;
		}
	}

	@include xl {
		max-width: $xl;
	}
}
</style>
