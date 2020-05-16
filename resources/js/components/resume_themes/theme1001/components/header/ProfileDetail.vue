<template>
	<div class="profile-detail">
		<h3 class="title" v-text="currentUser.fullname"></h3>
		<h4 class="sub-title" v-text="currentUser.jobTitle"></h4>

		<ProfileHireMe :hourly-rate="currentUser.hourRate" :weekly-availability="currentUser.weeklyAvailability" />
	</div>
</template>

<script>
import ProfileHireMe from "./ProfileHireMe";

export default {
	name: "profile-detail",

	props: {
		currentUser: {
			type: Object,
			required: true
		}
	},

	components: { ProfileHireMe }
};
</script>

<style lang="scss" scoped>
@import "./../../scss/variables";

.profile-detail {
	flex: 1;
	font-family: inherit;
	padding-left: 12px;
}

.title {
	font-family: inherit;
	font-size: 14px;
	line-height: 18px;
	font-weight: 700;
}

.sub-title {
	font-family: inherit;
	font-size: 10px;
	line-height: 17px;
	color: #ffffff;
	margin-top: 7px;
}

@media (min-width: $sm) {
	.title {
		font-size: 18px;
		line-height: 24px;
	}

	.sub-title {
		font-size: 12px;
		line-height: 21px;
	}
}

@media (min-width: $md) {
	.profile-detail {
		padding-left: 30px;
	}

	.title {
		font-size: 20px;
	}

	.sub-title {
		font-size: 16px;
	}
}

@media (min-width: $lg) {
	.title {
		color: #d3d6e4;
	}
}
</style>
