<template>
	<div class="edit-cv">
		<sidebar :activeTab="activeTab" @onChange="activeTab=$event" />

		<main class="edit-cv-content">
			<transition name="fade" mode="out-in" class="d-flex flex-column">
				<router-view></router-view>
			</transition>

			<div class="cv-content-preview">
				<div class="cv-preview-link">
					<a v-if="user.username" :href="`https://civ.ie/${user.username}`" target="_blank" v-text="`https://civ.ie/${user.username}`"></a>
				</div>
				<div class="cv-preview-theme-wrapper">
					<div class="cv-preview-theme">
						<user-theme v-if="user.personal_info" :user="user" :is_preview="false"></user-theme>
					</div>
				</div>
			</div>
		</main>
	</div>
</template>

<script>
import sidebar from "./../components/edit-tabs/sidebar";

export default {
	name: "EditCV",

	components: {
		sidebar: sidebar,
		"user-theme": () => import("../../resume_themes/theme8")
	},

	data: () => ({
		asideSections: [
			{
				name: "profile",
				icon: null
			},
			{
				name: "links",
				icon: null
			},
			{
				name: "work-experience",
				icon: null
			},
			{
				name: "education",
				icon: null
			},
			{
				name: "skills",
				icon: null
			},
			{
				name: "portfolios",
				icon: null
			},
			{
				name: "achievements",
				icon: null
			},
			{
				name: "hobbies",
				icon: null
			},
			{
				name: "audio-video",
				icon: null
			},
			{
				name: "imports",
				icon: null
			},
			{
				name: "references",
				icon: null
			},
			{
				name: "pay-availability",
				icon: null
			}
		],
		activeTab: "profile"
	}),

	computed: {
		user() {
			return this.$store.state.user;
		}
	},

	created() {
		this.activeTab = window.location.pathname.split("/")[3];
	}
};
</script>

<style lang="scss" scoped>
$activeColor: #001ce2;
$disabledColor: #9f9e9e;

@import "../../../../sass/media-queries";

.edit-cv {
	.edit-cv-content {
		padding: 40px 30px;
	}

	@include gt-md {
		display: flex;

		.edit-cv-content {
			flex: 1;
			overflow: hidden;
		}
	}
}

.cv-content-preview {
	padding-top: 40px;

	.cv-preview-link {
		height: 50px;
		display: flex;
		align-items: center;
		border-radius: 5px;
		padding-left: 25px;
		margin-right: 10px;
		border: 1px solid #e6e8fc;

		a {
			color: #888db1;
			font-family: "Roboto", "sans-serif";
			font-size: 20px;
			line-height: 22px;

			&:hover {
				color: inherit;
			}
		}
	}

	.cv-preview-theme-wrapper {
		overflow-y: scroll;
		padding-right: 5px;
		max-height: 540px;

		.cv-preview-theme {
			overflow-x: scroll;

			&::-webkit-scrollbar {
				height: 0;
			}

			&::-webkit-scrollbar-thumb {
				height: 0;
			}
		}

		&::-webkit-scrollbar {
			width: 5px;
			height: 0;
			background: #e5e5e5;
			border-radius: 5px 0 0 5px;
		}

		&::-webkit-scrollbar-thumb {
			background: #001ce2;
			border-radius: 5px 0 0 5px;
		}
	}

	@include gt-xs {
		.cv-preview-link {
			margin-right: 15px;
		}

		.cv-preview-theme-wrapper {
			.cv-preview-theme {
			}

			&::-webkit-scrollbar {
				width: 10px;
				border-radius: 10px 0 0 10px;
			}

			&::-webkit-scrollbar-thumb {
				border-radius: 10px 0 0 10px;
			}
		}
	}
}

.unused {
	.linkBar {
		width: 100%;
		height: 50px;
		display: flex;
		align-items: center;
		padding-left: 25px;
		font-size: 20px;
		line-height: 22px;
		color: #888db1;
		border: 1px solid #e6e8fc;
		border-radius: 5px;
	}

	.aside-bar {
		min-width: 290px;
		position: relative;
		max-height: calc(61px * 12);
		// Check it
		overflow-y: auto;

		@include lt-lg {
			display: none !important;
		}

		&::after {
			content: "";
			position: absolute;
			top: 0;
			right: 0;
			height: 100%;
			width: 6px;
			background-color: #e2e5fc;
		}

		#scrollItem {
			position: absolute;
			top: 0;
			right: 0;
			width: 6px;
			height: 61px;
			z-index: 5;
			background-color: $activeColor;
		}
	}
}

.aside-link {
	font-size: 22px;
	padding-right: 32px;

	.icon {
		width: 45px;
		height: 45px;
		margin-right: 20px;
	}

	.aside-icon {
		path {
			fill: none;
			stroke: $disabledColor;
			transition: all 0.5s ease;
		}

		circle {
			fill: none;
			stroke: $disabledColor;
			transition: all 0.5s ease;
		}
	}

	&.active {
		a {
			color: $activeColor;
			transition: all 1s ease;
		}

		.aside-icon {
			path {
				fill: $activeColor;
				stroke: #fff;
				transition: all 0.5s ease;
			}

			circle {
				fill: $activeColor;
				stroke: #fff;
				transition: all 0.5s ease;
			}
		}
	}

	a {
		padding: 13px 0;
		color: $disabledColor;
		transition: all 1s ease;
		display: block;
		width: 100%;
		height: 100%;

		&:active,
		&:hover {
			text-decoration: none;
			cursor: pointer;
		}
	}
}
.aside-icon {
	margin-right: 22px;
	width: 40px;
}

.fade-enter-active {
	transition: all 0.6s ease;
}

.fade-leave-active {
	transition: all 0.6s cubic-bezier(1, 0.5, 0.8, 1);
}

.fade-enter, .fade-leave-to
    /* .fade-leave-active below version 2.1.8 */
 {
	opacity: 0;
}
</style>
