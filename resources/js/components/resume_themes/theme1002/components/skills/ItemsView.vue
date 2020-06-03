<template>
	<div class="items-view">
		<div v-for="item in items" class="item-wrapper" :key="item.id">
			<ItemView :title="item.title" :level="item.level" :icon="item.icon" />
		</div>
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
	padding-top: 25px;
	padding-bottom: 25px;

	.item-wrapper {
		width: 100%;
		padding-top: 25px;
		padding-bottom: 25px;
	}
}

@media (min-width: $md) {
	.items-view {
		display: flex;
		flex-wrap: wrap;
		padding-top: 45px;
		padding-bottom: 45px;

		.item-wrapper {
			width: 50%;
			padding: 35px 25px;
		}
	}
}

@media (min-width: $lg) {
	.items-view {
		.item-wrapper {
			padding: 35px;
		}
	}
}

@media (min-width: $xl) {
	.items-view {
		padding-top: 100px;
		padding-bottom: 100px;

		.item-wrapper {
			padding: 50px 35px 50px 100px;
		}
	}
}
</style>
