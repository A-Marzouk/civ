<template>
	<a class="avatar" href="#" :style="`background-image: url(${src})`" @click.prevent></a>
</template>

<script>
export default {
	name: "avatar",

	props: {
		src: {
			type: String,
			required: true
		}
	}
};
</script>

<style lang="scss" scoped>
@import "./../../scss/variables";

.avatar {
	display: block;
	width: 50px;
	height: 50px;
	border-radius: 9999px;
	background-position: center;
	background-size: cover;
}

@media (min-width: $sm) {
	.avatar {
		width: 75px;
		height: 75px;
	}
}

@media (min-width: $md) {
	.avatar {
		width: 124px;
		height: 124px;
		border: 4px solid #ffffff;
	}
}

@media (min-width: $lg) {
	.avatar {
		width: 232px;
		height: 232px;
	}
}
</style>
