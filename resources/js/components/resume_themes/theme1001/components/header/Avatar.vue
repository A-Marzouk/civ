<template>
	<div class="avatar">
		<a href="#" :style="`background-image: url(${src})`" @click.prevent></a>
	</div>
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

.avatar a {
	display: block;
	width: 50px;
	height: 50px;
	border-radius: 9999px;
	background-position: center;
	background-size: cover;
}

@media (min-width: $sm) {
	.avatar a {
		width: 65px;
		height: 65px;
	}
}

@media (min-width: $lg) {
	.avatar a {
		width: 124px;
		height: 124px;
		border: 4px solid #ffffff;
	}
}

@media (min-width: $xl) {
	.avatar a {
		width: 232px;
		height: 232px;
	}
}
</style>
