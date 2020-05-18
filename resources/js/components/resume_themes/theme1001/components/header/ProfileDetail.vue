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
	font-size: 16px;
	line-height: 21px;
	font-weight: 700;
}

.sub-title {
	font-family: inherit;
	font-size: 13px;
	line-height: 20px;
	color: #ffffff;
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
		line-height: 34px;
	}

	.sub-title {
		color: #d3d6e4;
		font-size: 16px;
		line-height: 21px;
	}
}

@media (min-width: 1600px) {
	.title {
		font-size: 26px;
		line-height: 42px;
	}

	.sub-title {
		padding-top: 5px;
		font-size: 20px;
		line-height: 36px;
	}
}
</style>
