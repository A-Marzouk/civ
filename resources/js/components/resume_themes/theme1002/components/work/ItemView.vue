<template>
	<div>
		<h3 v-text="title"></h3>
		<p v-text="description"></p>
	</div>
</template>

<script>
export default {
	name: "ItemView",

	props: {
		title: {
			type: String,
			required: true
		},

		description: {
			type: String,
			required: true
		}
	}
};
</script>

<style lang="scss" scoped>
</style>
