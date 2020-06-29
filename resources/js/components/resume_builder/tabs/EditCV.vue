<template>
	<div class="edit-cv">
		<sidebar :activeTab="activeTab" @onChange="activeTab=$event" />

		<main class="edit-cv-content">
			<transition name="fade" mode="out-in" class="d-flex flex-column">
				<router-view></router-view>
			</transition>

			<div class="cv-content-preview-wrapper">
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
		"user-theme": () => import(/* webpackChunkName: "userTheme" */ "../../resume_themes/theme5/index")
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
				name: "portfolio",
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
		padding: 40px 20px 20;
	}

	@include gt-xs {
		padding: 40px 30px 30px;

		.edit-cv-content {
			padding-left: unset;
			padding-right: unset;
		}
	}

	@include gt-md {
		display: flex;

		.edit-cv-content {
			flex: 1;
			overflow: hidden;
			padding-left: 30px;
		}
	}
}

.cv-content-preview-wrapper {
	margin-right: -10px;
	margin-left: -10px;
	overflow-y: scroll;
	margin-top: 40px;
	padding: 10px;
	max-height: 600px;
	max-width: 350px;
	margin-left: auto;
	margin-right: auto;

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

	.cv-content-preview {
		.cv-preview-link {
			height: 50px;
			display: flex;
			align-items: center;
			border-radius: 5px;
			padding-left: 25px;
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
			.cv-preview-theme {
				overflow-x: scroll;

				&::-webkit-scrollbar {
					height: 0;
				}

				&::-webkit-scrollbar-thumb {
					height: 0;
				}
			}
		}
	}

	@include gt-xs {
		padding: 10px;
		padding-right: 20px;
		max-width: unset;
		margin-left: -10px;

		&::-webkit-scrollbar {
			width: 10px;
			border-radius: 10px 0 0 10px;
		}

		&::-webkit-scrollbar-thumb {
			border-radius: 10px 0 0 10px;
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
justify-content: flex-start;
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

<style>
	.v-application--wrap{
		min-height: 450px !important;
	}
</style>