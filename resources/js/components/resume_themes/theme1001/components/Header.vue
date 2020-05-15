<template>
	<header id="header">
		<div class="header-profile">
			<ProfileActions />

			<Avatar :src="currentUser.avatar" />
			<div class="profile__detail">
				<h3 class="fullname" v-text="currentUser.fullname"></h3>
				<h4 class="job-title" v-text="currentUser.jobTitle"></h4>

				<ProfileHireMe :hourly-rate="currentUser.hourRate" :weekly-availability="currentUser.weeklyAvailability" />
			</div>
		</div>
	</header>
</template>

<script>
import Avatar from "./header/Avatar";
import ProfileActions from "./header/ProfileActions";
import ProfileHireMe from "./header/ProfileHireMe";

export default {
	name: "Header",

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

	components: { Avatar, ProfileActions, ProfileHireMe },

	data: () => {
		return {};
	}
};
</script>

<style lang="scss" scoped>
@import "./../scss/variables";

#header {
	font-family: $muli;
	padding: 15px;
	padding-bottom: 25px;
	color: #ffffff;
	background: url("/images/resume_themes/theme1001/header-mobile-bg-pattern.png"),
		linear-gradient(#4870fc 100%, #4870fc 100%);
}

.header-profile {
	position: relative;
	font-family: inherit;
	display: flex;
	flex-wrap: wrap;
}

.header-profile .profile__detail {
	flex: 1;
	font-family: inherit;
	padding-left: 12px;
}

.header-profile .profile__detail .fullname {
	font-weight: 700;
	font-family: inherit;
	font-size: 12px;
	line-height: 15px;
	margin-top: 5px;
}

.header-profile .profile__detail .job-title {
	font-family: inherit;
	line-height: 13px;
	font-size: 10px;
	font-weight: 300;
	margin-top: 5px;
}

@media (min-width: 375px) {
	#header {
		padding: 25px;
		padding-bottom: 35px;
	}
}

@media (min-width: $md) {
	#header {
		background: url("/images/resume_themes/theme1001/header-desktop-bg-pattern.png"),
			linear-gradient(#4870ff 100%, #4870ff 100%);
	}
}

@media (min-width: $sm) {
	.header-profile .profile__detail {
		.fullname {
			font-size: 18px;
			line-height: 21px;
		}

		.job-title {
			line-height: 18px;
			font-size: 14px;
		}
	}
}

@media (min-width: $lg) {
}
</style>
