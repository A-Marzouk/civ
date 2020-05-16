<template>
	<header id="header">
		<div class="header-profile">
			<ProfileActions />

			<Avatar :src="currentUser.avatar" />

			<ProfileDetail :currentUser="currentUser" />
		</div>
	</header>
</template>

<script>
import Avatar from "./header/Avatar";
import ProfileActions from "./header/ProfileActions";
import ProfileDetail from "./header/ProfileDetail";

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

	components: { Avatar, ProfileActions, ProfileDetail },

	data: () => {
		return {};
	}
};
</script>

<style lang="scss" scoped>
@import "./../scss/variables";

#header {
	font-family: $muli;
	font-weight: 300;
	padding: 20px;
	padding-bottom: 25px;
	color: #ffffff;
	background-image: url("/images/resume_themes/theme1001/bg-header.png"),
		linear-gradient(#4870fc 100%, #4870fc 100%);
	background-size: cover;
}

.header-profile {
	position: relative;
	display: flex;
	font-family: inherit;
}

@media (min-width: $sm) {
	#header {
		padding: 25px;
	}
}

@media (min-width: $md) {
	#header {
		background-image: url("/images/resume_themes/theme1001/bg-header.png"),
			linear-gradient(#4870ff 100%, #4870ff 100%);
		background-size: contain;
	}

	.header-profile {
		align-items: center;
	}
}
</style>
