<template>
	<nav class="tabs-navigation">
		<ul class="navigation">
			<li class="navigation__link" :class="{'active': currentTab==='portfolio'}">
				<a href="#" @click.prevent="$emit('tabChanged', 'portfolio')">Portfolio</a>
			</li>
			<li class="navigation__link" :class="{'active': ['work-experience', 'education'].includes(currentTab) }">
				<a href="#" @click.prevent="$emit('tabChanged', 'education')">Work experience & Education</a>
			</li>
			<li class="navigation__link" :class="{'active': ['skills', 'language'].includes(currentTab) }">
				<a href="#" @click.prevent="$emit('tabChanged', 'skills')">Skills & Language</a>
			</li>
			<li class="navigation__link" :class="{'active': currentTab==='about-me'}">
				<a href="#" @click.prevent="$emit('tabChanged', 'about-me')">About Me</a>
			</li>
		</ul>
	</nav>
</template>

<script>
export default {
	name: "tabs-navigation",

	props: {
		currentTab: {
			type: String,
			required: true
		}
	}
};
</script>

<style lang="scss" scoped>
@import "./../scss/variables";

.tabs-navigation {
	background: #3d5ed4;
}

.navigation {
	overflow-x: scroll;
	display: flex;
	align-items: center;
	height: 35px;
	list-style: none;
	padding: 0;
	margin: 0;

	&::-webkit-scrollbar {
		height: 0;
	}
}

.navigation__link {
	font-size: 10px;
	white-space: nowrap;
	color: rgba(255, 255, 255, 0.67);
	height: 100%;
}

.navigation__link a {
	display: flex;
	align-items: center;
	height: 100%;
	padding: 0 17px;
	transition: all 0.3s ease-in;

	&:hover {
		color: #ffffff;
		text-decoration: none;
	}
}

.navigation__link.active a {
	color: #ffffff;
	font-weight: 700;

	&:hover {
		transform: scale(1.05);
	}
}

@media (min-width: $sm) {
	.navigation {
		height: 50px;
	}

	.navigation__link {
		font-size: 14px;
	}
}

@media (min-width: $md) {
}
</style>
