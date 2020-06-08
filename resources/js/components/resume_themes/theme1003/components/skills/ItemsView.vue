<template>
	<div class="items-view">
		<ItemView v-for="item in items" :title="item.title" :level="item.level" :key="item.id" />
	</div>
</template>

<script>
import ItemView from "./ItemView";

export default {
	name: "ItemsView",

	props: {
		items: {
			type: Array,
			required: true
		}
	},

	components: { ItemView }
};
</script>

<style lang="scss" scoped>
@import "./../../scss/variables";

.items-view {
	display: grid;
	grid-template-columns: 1fr;
	row-gap: 25px;
	padding-top: 25px;
	padding-bottom: 25px;

	@include xs {
		padding-left: 16px;
		padding-right: 16px;
	}

	@include md {
		max-width: 752px;
		margin: 0 auto;
		column-gap: 30px;
		row-gap: 30px;
	}

	@include lg {
		max-width: 1320px;
		grid-template-columns: 1fr 1fr 1fr;
	}

	@include xl {
		max-width: 1770px;
		grid-template-columns: 1fr 1fr 1fr 1fr;
	}
}
</style>
