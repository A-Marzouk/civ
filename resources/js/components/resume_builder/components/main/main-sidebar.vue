<template>
	<div class="main-sidebar">
		<div class="sidebar-link-activator">

			<a href="#" @click.prevent="open=!open" class="activator-preview-link">
				<div class="link-icon">
					<sidebar-icon :icon="currentSidebarLink.icon" />
				</div>
				{{ currentSidebarLink.label }}
			</a>

			<a href="#" @click.prevent="open=!open" class="link-activator-caret" :class="{'open' :open}">
				<svg width="14" height="8" viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M1 1L7 7L13 1" stroke="#001CE2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
				</svg>
			</a>
		</div>

		<div class="sidebar-links" :class="{'open' :open}">
			<div v-for="sidebarLink in sidebarLinks" class="sidebar-link" :class="{'active': activeLink === sidebarLink.icon}" :key="sidebarLink.icon">
				<router-link :to="sidebarLink.url" @click.native="open=false; $emit('activeLinkChanged', sidebarLink.icon)">
					<div class="link-icon">
						<sidebar-icon :icon="sidebarLink.icon" />
					</div>
					{{ sidebarLink.label }}
				</router-link>
			</div>
		</div>

	</div>
</template>

<script>
import sidebarIcon from "./sidebar-icon";

export default {
	name: "main-sidebar",

	props: {
		activeTab: {
			type: String,
			default: ""
		},

		activeLink: {
			type: String,
			default: "profile"
		}
	},

	components: { "sidebar-icon": sidebarIcon },

	data() {
		return {
			open: false,

			sidebarLinks: [
				{
					url: "#",
					icon: "profile",
					label: "Profile"
				},
				{
					url: "#",
					icon: "links",
					label: "Links"
				},
				{
					url: "#",
					icon: "work-experience",
					label: "Work experience"
				},
				{
					url: "#",
					icon: "education",
					label: "Education"
				},
				{
					url: "#",
					icon: "skills",
					label: "Skills"
				},
				{
					url: "#",
					icon: "portfolios",
					label: "Portfolios"
				},
				{
					url: "#",
					icon: "audio-video",
					label: "Audio video"
				},
				{
					url: "#",
					icon: "hobbies",
					label: "Hobbies"
				},
				{
					url: "#",
					icon: "achievement",
					label: "Achievement"
				},
				{
					url: "#",
					icon: "imports",
					label: "Imports"
				},
				{
					url: "#",
					icon: "references",
					label: "References"
				},
				{
					url: "#",
					icon: "pay-availability",
					label: "Pay availability"
				}
			],

			currentSidebarLink: {
				icon: "profile",
				label: "Profile"
			}
		};
	}
};
</script>

<style lang="scss" scoped>
@import "../../../../../sass/media-queries";

.main-sidebar {
	font-family: Noto Sans, "sans-serif";
	padding: 10px 32px;

	.sidebar-links,
	.sidebar-link-activator {
		a {
			display: flex;
			align-items: center;
			font-size: 20px;
			line-height: 20px;
			color: #001ce2;

			.link-icon {
				background: #f2f3fd;
				height: 35px;
				width: 35px;
				display: flex;
				align-items: center;
				justify-content: center;
				border-radius: 5px;
				margin-right: 10px;
			}

			&:hover {
				text-decoration: none;
			}
		}

		&.sidebar-link-activator {
			height: 60px;
			display: flex;
			align-items: center;
			border: 2px solid #e6e8fc;
			border-radius: 10px;

			.activator-preview-link {
				flex: 1;
				padding: 12px 15px;
			}

			.link-activator-caret {
				height: 60px;
				width: 60px;
				display: flex;
				align-items: center;
				justify-content: center;
				svg {
					transition: all 0.3s;
				}

				&.open svg {
					transform: rotateX(180deg);
				}
			}
		}

		&.sidebar-links {
			max-height: 0;
			overflow: hidden;
			transition: all 0.3s;

			&.open {
				max-height: 250px;
				overflow-y: scroll;
				padding-right: 8px;
				opacity: 1;
				margin-top: 5px;
			}

			.sidebar-link {
				padding-top: 5px;
				padding-bottom: 5px;

				a {
					padding: 7.5px 15px;
					border-radius: 10px;
					transition: all 0.3s;
					border: 1px solid #e5e5e5;

					&:hover {
						background-color: #f9f9f9;
						text-decoration: none;
					}
				}

				&.active a {
					background-color: #f9f9f9;
				}
			}

			&::-webkit-scrollbar {
				width: 8px;
				background: #e5e5e5;
				border-radius: 8px 0 0 8px;
			}

			&::-webkit-scrollbar-thumb {
				background: #001ce2;
				border-radius: 8px 0 0 8px;
			}
		}
	}
}

.side-menu_0 {
	display: none;
	transform: translateX(-100%);
	position: fixed;
	display: flex;
	flex-direction: column;
	left: 0;
	top: 0;
	height: 100%;
	width: 100vw;
	z-index: 510;
	background: rgba(255, 255, 255, 0.6);
	transition: all ease 0.3s;

	.decorator {
		display: none;
	}

	.side-bg-panel {
		background: rgba(255, 255, 255, 0.9);
		width: 80%;
		height: 100%;
		max-width: 265px;
		box-shadow: 0 12px 12px rgba(0, 0, 0, 0.1);
		overflow: auto;
	}

	.bg-action {
		position: absolute;
		width: 100%;
		height: 100%;
		z-index: -1;
	}

	.links-wrapper {
		padding: 40px;
		background: white;
		box-shadow: 0 9px 10px rgba(0, 0, 0, 0.04);

		.links-group {
			margin-top: 38px;
		}

		.nav-icon {
			width: 30px;
			height: 30px;
		}
	}

	@include lt-lg {
		display: block;

		&.opened {
			transform: translateX(0);
			transition: all ease 0.2s;
		}
	}

	.btn-logout {
		display: flex;
		justify-content: flex-end;
		width: 100%;
		padding: 1rem 2rem;

		path {
			/* fill: $mainBlue; */
		}
	}
}
</style>
