<template>
	<div v-if="screen==='mobile'" class="contact__links --mobile">
		<a v-for="link in _links" :href="link.link" :class="`contact__link ${link.icon.class}`" :key="link.id">
			<svg class="tw-fill-current" :viewBox="link.icon.viewBox" fill="none" xmlns="http://www.w3.org/2000/svg" v-html="link.icon.path"></svg>
		</a>
	</div>
	<div v-else class="current-user__detail--contact">
		<a v-for="link in _links" :href="link.link" :class="`contact__link ${link.icon.class}`" :key="link.id">
			<svg class="tw-fill-current" :viewBox="link.icon.viewBox" fill="none" xmlns="http://www.w3.org/2000/svg" v-html="link.icon.path"></svg>
		</a>

		<!-- Hire Me link -->
		<a href="#" class="contact__link contact__link--hireme" @click.prevent="$emit('showmodal', 'PaymentMethods')">
			<svg class="tw-fill-current" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M19.9998 2.00012C19.9998 0.900122 19.0998 0.00012207 17.9998 0.00012207H1.99976C0.899756 0.00012207 -0.000244141 0.900122 -0.000244141 2.00012V14.0001C-0.000244141 15.1001 0.899756 16.0001 1.99976 16.0001H17.9998C19.0998 16.0001 19.9998 15.1001 19.9998 14.0001V2.00012ZM17.9998 2.00012L9.99976 7.00012L1.99976 2.00012H17.9998ZM17.9998 14.0001H1.99976V4.00012L9.99976 9.00012L17.9998 4.00012V14.0001Z" />
			</svg>

			<span>Hire me</span>
		</a>
	</div>
</template>

<script>
export default {
	name: 'SocialLinks',
	props: {
		links: { type: Array },
		screen: {
			type: String,
			default: 'desktop',
			validator: val => {
				return ['mobile', 'desktop'].includes(val);
			}
		}
	},
	computed: {
		_links() {
			const socialLinkIcons = {
				twitter: {
					viewBox: '0 0 24 20',
					class: 'contact__link--twitter',
					path: `<path d="M21.533 5.11163C21.5482 5.32482 21.5482 5.53805 21.5482 5.75124C21.5482 12.2537 16.599 19.7461 7.5533 19.7461C4.76648 19.7461 2.17767 18.939 0 17.538C0.395953 17.5837 0.776625 17.5989 1.18781 17.5989C3.48727 17.5989 5.60405 16.8223 7.29441 15.4974C5.13197 15.4517 3.31978 14.0355 2.69541 12.0863C3 12.1319 3.30455 12.1624 3.62437 12.1624C4.06598 12.1624 4.50764 12.1014 4.91878 11.9949C2.66498 11.538 0.974578 9.55833 0.974578 7.16747V7.10658C1.62937 7.47206 2.39086 7.70049 3.19791 7.73091C1.87303 6.84764 1.00505 5.34005 1.00505 3.63446C1.00505 2.72077 1.24866 1.88321 1.67508 1.15224C4.09641 4.137 7.73602 6.08621 11.8172 6.29944C11.7411 5.93396 11.6954 5.55328 11.6954 5.17257C11.6954 2.46188 13.8883 0.253784 16.6141 0.253784C18.0304 0.253784 19.3095 0.847691 20.208 1.80708C21.3197 1.59389 22.3857 1.18271 23.3299 0.619269C22.9643 1.76142 22.1877 2.72082 21.1674 3.32991C22.1573 3.22336 23.1167 2.94919 23.9999 2.56852C23.33 3.5431 22.4924 4.41108 21.533 5.11163Z" />`
				},
				facebook: {
					viewBox: '0 0 13 24',
					class: 'contact__link--facebook',
					path: `<path d="M10.1156 3.98438H12.375V0.16875C11.9859 0.117187 10.6453 0 9.08438 0C5.82656 0 3.59531 1.9875 3.59531 5.63906V9H0V13.2656H3.59531V24H8.00156V13.2656H11.4516L12 9H8.00156V6.06094C8.00156 4.82812 8.34375 3.98438 10.1156 3.98438Z" />`
				},
				instagram: {
					viewBox: '0 0 21 22',
					class: 'contact__link--instagram',
					path: `<path d="M10.5045 5.60916C7.52329 5.60916 5.1186 8.01384 5.1186 10.9951C5.1186 13.9763 7.52329 16.381 10.5045 16.381C13.4858 16.381 15.8905 13.9763 15.8905 10.9951C15.8905 8.01384 13.4858 5.60916 10.5045 5.60916ZM10.5045 14.4967C8.57798 14.4967 7.00298 12.9263 7.00298 10.9951C7.00298 9.06384 8.57329 7.49353 10.5045 7.49353C12.4358 7.49353 14.0061 9.06384 14.0061 10.9951C14.0061 12.9263 12.4311 14.4967 10.5045 14.4967ZM17.367 5.38884C17.367 6.08728 16.8045 6.64509 16.1108 6.64509C15.4124 6.64509 14.8545 6.08259 14.8545 5.38884C14.8545 4.69509 15.417 4.13259 16.1108 4.13259C16.8045 4.13259 17.367 4.69509 17.367 5.38884ZM20.9342 6.66384C20.8545 4.98103 20.4702 3.49041 19.2374 2.26228C18.0092 1.03416 16.5186 0.64978 14.8358 0.565405C13.1014 0.466968 7.90298 0.466968 6.1686 0.565405C4.49048 0.645093 2.99985 1.02947 1.76704 2.25759C0.534229 3.48572 0.154541 4.97634 0.070166 6.65915C-0.0282715 8.39353 -0.0282715 13.592 0.070166 15.3263C0.149854 17.0092 0.534229 18.4998 1.76704 19.7279C2.99985 20.956 4.48579 21.3404 6.1686 21.4248C7.90298 21.5232 13.1014 21.5232 14.8358 21.4248C16.5186 21.3451 18.0092 20.9607 19.2374 19.7279C20.4655 18.4998 20.8499 17.0092 20.9342 15.3263C21.0327 13.592 21.0327 8.39822 20.9342 6.66384ZM18.6936 17.1873C18.328 18.106 17.6202 18.8138 16.6967 19.1842C15.3139 19.7326 12.0327 19.606 10.5045 19.606C8.97642 19.606 5.69048 19.7279 4.31235 19.1842C3.3936 18.8185 2.68579 18.1107 2.31548 17.1873C1.76704 15.8045 1.8936 12.5232 1.8936 10.9951C1.8936 9.46697 1.77173 6.18103 2.31548 4.80291C2.6811 3.88416 3.38892 3.17634 4.31235 2.80603C5.69517 2.25759 8.97642 2.38416 10.5045 2.38416C12.0327 2.38416 15.3186 2.26228 16.6967 2.80603C17.6155 3.17166 18.3233 3.87947 18.6936 4.80291C19.242 6.18572 19.1155 9.46697 19.1155 10.9951C19.1155 12.5232 19.242 15.8092 18.6936 17.1873Z" />`
				},
				behance: {
					viewBox: '0 0 24 24',
					class: 'contact__link--behance',
					path: `<path d="M22 7h-7V5h7v2zm1.726 10c-.442 1.297-2.029 3-5.101 3-3.074 0-5.564-1.729-5.564-5.675 0-3.91 2.325-5.92 5.466-5.92 3.082 0 4.964 1.782 5.375 4.426.078.506.109 1.188.095 2.14H15.97c.13 3.211 3.483 3.312 4.588 2.029h3.168zm-7.686-4h4.965c-.105-1.547-1.136-2.219-2.477-2.219-1.466 0-2.277.768-2.488 2.219zm-9.574 6.988H0V5.021h6.953c5.476.081 5.58 5.444 2.72 6.906 3.461 1.26 3.577 8.061-3.207 8.061zM3 11h3.584c2.508 0 2.906-3-.312-3H3v3zm3.391 3H3v3.016h3.341c3.055 0 2.868-3.016.05-3.016z"/>`
				},
				linkedin: {
					viewBox: '0 0 24 24',
					class: 'contact__link--linkedin',
					path: `<path d="M4.98 3.5C4.98 4.881 3.87 6 2.5 6S.02 4.881.02 3.5C.02 2.12 1.13 1 2.5 1s2.48 1.12 2.48 2.5zM5 8H0v16h5V8zm7.982 0H8.014v16h4.969v-8.399c0-4.67 6.029-5.052 6.029 0V24H24V13.869c0-7.88-8.922-7.593-11.018-3.714V8z"/>`
				},
				default: {
					viewBox: '0 0 20 20',
					class: 'contact__link--default',
					path: `<path d="M10 20a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm7.75-8a8.01 8.01 0 0 0 0-4h-3.82a28.81 28.81 0 0 1 0 4h3.82zm-.82 2h-3.22a14.44 14.44 0 0 1-.95 3.51A8.03 8.03 0 0 0 16.93 14zm-8.85-2h3.84a24.61 24.61 0 0 0 0-4H8.08a24.61 24.61 0 0 0 0 4zm.25 2c.41 2.4 1.13 4 1.67 4s1.26-1.6 1.67-4H8.33zm-6.08-2h3.82a28.81 28.81 0 0 1 0-4H2.25a8.01 8.01 0 0 0 0 4zm.82 2a8.03 8.03 0 0 0 4.17 3.51c-.42-.96-.74-2.16-.95-3.51H3.07zm13.86-8a8.03 8.03 0 0 0-4.17-3.51c.42.96.74 2.16.95 3.51h3.22zm-8.6 0h3.34c-.41-2.4-1.13-4-1.67-4S8.74 3.6 8.33 6zM3.07 6h3.22c.2-1.35.53-2.55.95-3.51A8.03 8.03 0 0 0 3.07 6z"/>`
				}
			};

			return this.links.map(link => {
				const title = link.link_title.toLowerCase();

				link.icon = Object.prototype.hasOwnProperty.call(socialLinkIcons, title)
					? socialLinkIcons[title]
					: socialLinkIcons['default'];

				return link;
			});
		}
	}
};
</script>

<style lang="scss" scoped>
@import './../scss/variables';

.contact__links.--mobile {
	display: flex;
	padding-top: 20px;

	.contact__link {
		position: relative;
		width: 30px;
		height: 30px;
		display: flex;
		align-items: center;
		justify-content: center;
		color: #ffffff;
		background: #312050;

		&:hover {
			text-decoration: none;

			&::after {
				width: 100%;
			}
		}

		&::after {
			content: '';
			position: absolute;
			bottom: 0;
			left: 0;
			display: block;
			background: #312050;
			height: 2px;
			width: 0;
			transition: width 0.3s;
		}

		&.contact__link--twitter {
			margin-left: 15px;
			transition: all 0.15s;

			svg {
				width: calc(0.7 * 24px);
				height: calc(0.7 * 20px);
			}
		}

		&.contact__link--facebook {
			margin-left: 15px;
			transition: all 0.15s;

			svg {
				width: calc(0.7 * 13px);
				height: calc(0.7 * 24px);
			}
		}

		&.contact__link--instagram {
			margin-left: 15px;
			transition: all 0.15s;

			svg {
				width: calc(0.7 * 21px);
				height: calc(0.7 * 22px);
			}
		}

		&.contact__link--behance {
			margin-left: 15px;
			transition: all 0.15s;

			svg {
				width: calc(0.7 * 24px);
				height: calc(0.7 * 24px);
			}
		}

		&.contact__link--linkedin {
			margin-left: 15px;
			transition: all 0.15s;

			svg {
				width: calc(0.7 * 24px);
				height: calc(0.7 * 24px);
			}
		}

		&.contact__link--default {
			margin-left: 15px;
			transition: all 0.15s;

			svg {
				width: calc(0.7 * 20px);
				height: calc(0.7 * 20px);
			}
		}

		&:first-child {
			margin-left: unset;
		}
	}
}

.current-user__detail--contact {
	.contact__link {
		position: relative;
		display: none;
		width: 40px;
		height: 40px;
		align-items: center;
		justify-content: center;
		color: #ffffff;
		background: #312050;

		&:hover {
			text-decoration: none;

			&::after {
				width: 100%;
			}
		}

		&::after {
			content: '';
			position: absolute;
			bottom: 0;
			left: 0;
			display: block;
			background: #312050;
			height: 2px;
			width: 0;
			transition: width 0.3s;
		}

		&.contact__link--hireme {
			display: flex;
			background: #df136c;
			font-size: 12px;
			line-height: 18px;
			font-weight: 700;
			margin-left: 15px;
			transition: all 0.15s;

			&::after {
				background: #df136c;
			}

			&:hover {
				color: #df136c;
				background: #ffffff;
			}

			svg {
				width: 20px;
				height: 16px;
			}

			span {
				display: none;
				white-space: nowrap;
				color: inherit;
				font-weight: inherit;
				font-size: inherit;
				line-height: inherit;
				margin-left: 7px;
			}
		}
	}
}

@include xs {
}

@include md {
	.contact__links.--mobile {
		padding-top: 15px;
	}

	.current-user__detail--contact {
		display: flex;

		.contact__link {
			&.contact__link--hireme {
				width: auto;
				padding-left: 20px;
				padding-right: 20px;

				span {
					display: inline;
				}
			}
		}
	}
}

@include lg {
	.current-user__detail--contact {
		.contact__link {
			display: flex;

			&:hover {
				color: #312050;
				background: #ffffff;
			}

			&.contact__link--twitter {
				margin-left: 15px;
				transition: all 0.15s;

				svg {
					width: calc(0.8 * 24px);
					height: calc(0.8 * 20px);
				}
			}

			&.contact__link--facebook {
				margin-left: 15px;
				transition: all 0.15s;

				svg {
					width: calc(0.8 * 13px);
					height: calc(0.8 * 24px);
				}
			}

			&.contact__link--instagram {
				margin-left: 15px;
				transition: all 0.15s;

				svg {
					width: calc(0.8 * 21px);
					height: calc(0.8 * 22px);
				}
			}

			&.contact__link--behance {
				margin-left: 15px;
				transition: all 0.15s;

				svg {
					width: calc(0.8 * 24px);
					height: calc(0.8 * 24px);
				}
			}

			&.contact__link--linkedin {
				margin-left: 15px;
				transition: all 0.15s;

				svg {
					width: calc(0.8 * 24px);
					height: calc(0.8 * 24px);
				}
			}

			&.contact__link--default {
				margin-left: 15px;
				transition: all 0.15s;

				svg {
					width: calc(0.8 * 20px);
					height: calc(0.8 * 20px);
				}
			}

			&:first-child {
				margin-left: unset;
			}

			&.contact__link--hireme {
				span {
					margin-left: 15px;
				}
			}
		}
	}
}

@include xl {
	.current-user__detail--contact {
		height: 90px;
		align-items: center;

		.contact__link {
			width: 60px;
			height: 60px;

			&.contact__link--hireme {
				padding-left: 38px;
				padding-right: 38px;
			}
		}
	}
}

@include xxl {
	.current-user__detail--contact {
		align-items: normal;
	}
}
</style>
