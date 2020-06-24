<template>
	<div>
		<div @click="() => false" class="edit-links d-flex flex-column mr-5">
			<div @click="setActiveTab(section.name)" v-for="(section) in asideSections" :key="section.name" class="aside-link d-flex align-items-center" :class="{ active: activeTab === section.name }">
				<img :src="activeTab === section.name ? '/images/new_resume_builder/icons/tabs_icons/' + section.name + '.png' : '/images/new_resume_builder/icons/tabs_icons/' + section.name + '-1.png'" alt="">
				<router-link :to="`/resume-builder/edit/${section.name}`">
					{{formatSectionString(section.name)}}
				</router-link>
			</div>
		</div>
	</div>
</template>

<script>
import { moveTabsHelper } from "./../../helpers/tab-animations";

export default {
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
		activeTab: null
	}),
	methods: {
		formatSectionString: str => {
			/**
			 * Convert the url in a friendly text
			 * @param String str
			 * @returns String formated
			 */

			let strArray = str.split("-");

			let formatedString = "";

			strArray.forEach((strItem, idx) => {
				formatedString +=
					strItem.charAt(0).toUpperCase() + strItem.slice(1);
				if (idx < strArray.length - 1) formatedString += " ";
			});

			return formatedString;
		},
		setActiveTab(tab) {
			this.activeTab = tab;

			$([document.documentElement, document.body]).animate(
				{
					scrollTop: 130
				},
				600
			);
		}
	},
	mounted() {
		this.activeTab = window.location.pathname.split("/")[3];
	}
};
</script>

<style lang="scss">
@import "../../../../../sass/media-queries";

$activeColor: #001ce2;
$disabledColor: #9f9e9e;
.edit-links {
	width: 100%;
	position: relative;
	padding: 10px 40px;
	// Check it
	overflow: auto;
}

.aside-link {
	font-size: 22px;
	padding-right: 32px;

	@include lt-sm {
		font-size: 14px;
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

	&.active,
	&.router-link-exact-active.router-link-active {
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
	width: 33.5px;
}
</style>
