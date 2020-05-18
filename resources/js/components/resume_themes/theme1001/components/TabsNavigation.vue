<template>
	<nav class="tabs-navigation">
		<div class="navigation-wrapper">
			<ul class="navigation">
				<li class="navigation__link" :class="{'active': currentTab==='portfolio'}">
					<a href="#" @click.prevent="$emit('tabChanged', 'portfolio')">Portfolio</a>
				</li>
				<li class="navigation__link" :class="{'active': currentTab==='experience-education'}">
					<a href="#" @click.prevent="$emit('tabChanged', 'experience-education')">Work experience & Education</a>
				</li>
				<li class="navigation__link" :class="{'active': currentTab==='skills-language'}">
					<a href="#" @click.prevent="$emit('tabChanged', 'skills-language')">Skills & Language</a>
				</li>
				<li class="navigation__link" :class="{'active': currentTab==='about-me'}">
					<a href="#" @click.prevent="$emit('tabChanged', 'about-me')">About Me</a>
				</li>
			</ul>

			<SocialLinks />
		</div>
	</nav>
</template>

<script>
import SocialLinks from "./SocialLinks";

export default {
	name: "tabs-navigation",

	props: {
		currentTab: {
			type: String,
			required: true
		}
	},

	components: { SocialLinks }
};
</script>

<style lang="scss" scoped>
@import "./../scss/variables";

.tabs-navigation {
	background: #3d5ed4;
}

.navigation-wrapper {
	position: relative;
	display: flex;
	height: 48px;
	justify-content: space-between;
}

.navigation {
	overflow-x: scroll;
	display: flex;
	align-items: center;
	height: 100%;
	list-style: none;
	padding: 0 25px;
	margin: 0;
}

.navigation::-webkit-scrollbar {
	display: none;
	-webkit-appearance: none;
	scrollbar-width: none;
	height: 0;
}

.navigation__link {
	white-space: nowrap;
	color: rgba(255, 255, 255, 0.67);
	height: 100%;
	padding: 0 10px;
}

.navigation__link a {
	display: flex;
	font-size: 15px;
	align-items: center;
	height: 100%;
	padding: 0 10px;
	transition: all 0.3s ease-in;

	&:hover {
		color: #ffffff;
		text-decoration: none;
	}
}

.navigation__link.active a {
	color: #ffffff;
	font-weight: 700;
}

@media (min-width: $sm) {
	.navigation-wrapper {
		height: 60px;
	}
}

@media (min-width: $md) {
	.navigation-wrapper {
		height: 62px;
	}

	.navigation__link a {
		position: relative;
		padding: 0 15px;

		&::after {
			content: "";
			background: #ffffff;
			opacity: 0;
			border-radius: 100px;
			position: absolute;
			bottom: 0;
			height: 4px;
			left: 0;
			right: 0;
			transition: opacity 0.3s;
		}
	}

	.navigation__link.active a::after {
		opacity: 1;
	}
}

@media (min-width: $lg) {
	.tabs-navigation {
		padding: 0 50px;
	}

	.navigation {
		padding: 0;
	}

	.navigation-wrapper {
		max-width: $lg;
		margin: 0 auto;
	}

	.navigation__link {
		padding: 0 25px;
	}

	.navigation__link a {
		font-size: 12px;
	}
}

@media (min-width: 1600px) {
	.tabs-navigation {
		padding: 0 100px;
	}

	.navigation-wrapper {
		max-width: 1600px;
		height: 75px;
	}

	.navigation__link {
		padding: 0 35px;
	}

	.navigation__link a {
		font-size: 18px;
	}
}

@media (min-width: $xl) {
	.navigation-wrapper {
		max-width: $xl;
	}

	.navigation__link {
		padding: 0 45px;
	}
}
</style>
