<template>
	<div v-if="true" class="header">
		<div class="header__current-user--detail">
			<div class="current-user__avatar">
				<a href="#" @click.prevent>
					<img :src="currentUser.personal_info.profile_pic" />
				</a>
			</div>
			<div class="current-user__detail-wrapper">
				<div class="current-user__detail">
					<div class="tw-flex-1">
						<h3 class="current-user__detail--fullname" v-text="currentUser.personal_info.full_name"></h3>
						<h4 class="current-user__detail--job-title" v-text="currentUser.personal_info.designation"></h4>
						<div class="current-user__detail--motivation" v-html="getShortString(currentUser.personal_info.about)"></div>
						<div class="current-user__detail--work-rate">
							<div class="work-rate__hour-rate">
								Hour rate <strong>${{ currentUser.payment_info[0].salary }}</strong>
							</div>
							<div class="work-rate__weekly-availability">
								Weekly availability <strong>{{ currentUser.availability_info[0].available_hours }}</strong>
							</div>
						</div>
					</div>

					<SocialLinks :links="currentUser.links" @showmodal="$emit('showmodal', $event)" />
				</div>
			</div>
		</div>

		<TabsNavigation :currentTab="currentTab" :currentUser="currentUser" @tabchanged="$emit('tabchanged', $event)" />
	</div>
</template>

<script>
import SocialLinks from './SocialLinks';
import TabsNavigation from './TabsNavigation';

export default {
	name: 'Header',

	props: {
		currentTab: {
			type: String,
			required: true
		},
		currentUser: {
			type: Object,
			required: true
		}
	},

	components: { SocialLinks, TabsNavigation },

	data: () => {
		return {
			sm: 426
		};
	},

	computed: {
		links() {
			return this.currentUser.links.map(link => {
				const title = link.link_title.toLowerCase();

				link.icon = Object.prototype.hasOwnProperty.call(this.socialLinkIcons, title)
					? this.socialLinkIcons[title]
					: this.socialLinkIcons['default'];

				return link;
			});
		}
	},

	methods: {
		getShortString(str, length = 98) {
			if (!str) return;

			let substr = str.substr(0, length);

			if (length < str.length) {
				substr += "<span class='tw-text-indigo-500'>.&#x1f6b2;</span>";
			}

			return substr;
		}
	}
};
</script>

<style lang="scss" scoped>
@import './../scss/variables';

.header {
	color: #000000;
	font-family: $poppins;

	.header__current-user--detail {
		display: flex;
		background: #f5f6f8;

		.current-user__avatar > a {
			display: block;
			width: 94px;
			height: 89px;

			img {
				height: 100%;
				width: 100%;
				object-fit: cover;
			}
		}

		.current-user__detail-wrapper {
			flex: 1;
			display: flex;
			align-items: center;
			padding-left: 10px;
			padding-right: 10px;

			.current-user__detail {
				width: 100%;
				display: flex;
				justify-content: space-between;

				.current-user__detail--fullname {
					font-weight: 800;
					font-size: 16px;
					line-height: 24px;
					color: #312050;
				}

				.current-user__detail--job-title {
					font-weight: bold;
					font-size: 10px;
					line-height: 15px;
					color: #000000;
				}

				.current-user__detail--motivation,
				.current-user__detail--work-rate {
					display: none;
				}
			}
		}
	}

	@include xs {
		.header__current-user--detail {
			.current-user__avatar > a {
				width: 107px;
				height: 100px;
			}

			.current-user__detail-wrapper {
				padding-left: 15px;
				padding-right: 15px;
			}
		}
	}

	@include sm {
		.header__current-user--detail {
			.current-user__detail-wrapper {
				padding-left: 20px;
				padding-right: 20px;
			}
		}
	}

	@include md {
		.header__current-user--detail {
			.current-user__avatar > a {
				width: 215px;
				height: 215px;
			}

			.current-user__detail-wrapper {
				padding-left: 30px;
				padding-right: 30px;

				.current-user__detail {
					.current-user__detail--fullname {
						font-size: 24px;
						line-height: 36px;
					}

					.current-user__detail--job-title {
						font-size: 12px;
						line-height: 18px;
						padding-top: 14px;
					}

					.current-user__detail--motivation {
						display: block;
						font-size: 12px;
						line-height: 18px;
						padding-top: 10px;
						max-width: 276px;
					}

					.current-user__detail--work-rate {
						display: flex;
						justify-content: space-between;
						align-items: center;
						font-size: 14px;
						line-height: 21px;
						max-width: 360px;
						text-transform: uppercase;
						padding-top: 20px;

						.work-rate__hour-rate,
						.work-rate__weekly-availability {
							display: flex;
							justify-content: space-between;
							align-items: center;
						}

						strong {
							font-size: 20px;
							line-height: 30px;
							margin-left: 15px;
						}
					}
				}
			}
		}
	}

	@include lg {
		.header__current-user--detail {
			.current-user__detail-wrapper {
				.current-user__detail {
					.current-user__detail--fullname {
						font-size: 32px;
						line-height: 40px;
					}

					.current-user__detail--job-title {
						font-size: 16px;
						line-height: 22px;
					}

					.current-user__detail--motivation {
						max-width: 418px;
					}

					.current-user__detail--work-rate {
						padding-top: 15px;
						max-width: 300px;
						font-size: 13px;
						line-height: 23px;

						strong {
							margin-left: 7px;
							font-size: 16px;
							line-height: 23px;
						}
					}
				}
			}
		}
	}

	@include xl {
		.header__current-user--detail {
			.current-user__avatar > a {
				width: 349px;
				height: 326px;
			}

			.current-user__detail-wrapper {
				.current-user__detail {
					.current-user__detail--fullname {
						font-size: 60px;
						line-height: 90px;
					}

					.current-user__detail--job-title {
						font-size: 30px;
						line-height: 45px;
					}

					.current-user__detail--motivation {
						max-width: 710px;
						font-size: 20px;
						line-height: 29px;
					}

					.current-user__detail--work-rate {
						font-size: 18px;
						line-height: 27px;
						max-width: 455px;

						strong {
							margin-left: 10px;
							font-size: 30px;
							line-height: 45px;
						}
					}
				}
			}
		}
	}

	@include xxl {
		.header__current-user--detail {
			.current-user__avatar > a {
				width: 480px;
				height: 449px;
			}

			.current-user__detail-wrapper {
				align-items: normal;
				padding: 70px;

				.current-user__detail {
					.current-user__detail--fullname {
					}
					.current-user__detail--job-title {
						padding-top: 10px;
					}
					.current-user__detail--motivation {
					}
					.current-user__detail--work-rate {
						padding-top: 24px;
					}
				}
			}
		}
	}
}
</style>
