<template>
	<div class="education">
		<div class="items-view">
			<div class="item-view-wrapper" v-for="item in education" :key="item.id">
				<ItemView :title="item.title" :description="item.description" />
			</div>
		</div>
	</div>
</template>

<script>
import ItemView from "./../components/SimpleItemView";

export default {
	name: "Education",

	components: { ItemView },

	data() {
		return {
			education: [
				{
					id: 1,
					title: "Udemy",
					description:
						"Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos"
				},
				{
					id: 2,
					title: "Oxford University",
					description:
						"Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos"
				},
				{
					id: 3,
					title: "Cours Ui designe",
					description:
						"Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos"
				}
			]
		};
	}
};
</script>

<style lang="scss" scoped>
@import "./../scss/variables";

.education {
	margin-right: -40px;
	margin-left: -40px;

	.items-view {
		display: flex;
		align-items: center;
		flex-direction: column;
		padding-top: 10px;
		padding-bottom: 10px;

		.item-view-wrapper {
			padding-top: 24px;
			padding-bottom: 24px;
			padding-left: 30px;
		}
	}
}

@media (min-width: $md) {
	.education {
		.items-view {
			padding-top: 20px;
			padding-bottom: 20px;

			.item-view-wrapper {
				padding-left: unset;
			}
		}
	}
}

@media (min-width: $lg) {
	.education {
		margin-right: unset;
		margin-left: unset;

		.items-view {
			padding-top: 40px;
			padding-bottom: 40px;

			.item-view-wrapper {
				padding-top: 30px;
				padding-bottom: 30px;
			}
		}
	}
}

@media (min-width: $xl) {
	.education {
		.items-view {
			.item-view-wrapper {
				max-width: 1500px;
				padding-top: 35px;
				padding-bottom: 35px;
			}
		}
	}
}
</style>
