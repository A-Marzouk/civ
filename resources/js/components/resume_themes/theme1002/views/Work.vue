<template>
	<div class="work">
		<div class="items-view">
			<div class="item-view-wrapper" v-for="mission in missions" :key="mission.id">
				<ItemView :title="mission.title" :description="mission.description" />
			</div>
		</div>
	</div>
</template>

<script>
import ItemView from "./../components/work/ItemView";

export default {
	name: "Work",

	components: { ItemView },

	data() {
		return {
			missions: [
				{
					id: 1,
					title: "Ui/UX designer",
					description:
						"Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos"
				},
				{
					id: 2,
					title: "Graphic designer",
					description:
						"Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos"
				},
				{
					id: 3,
					title: "Ui designer",
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

.work {
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
	.work {
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
	.work {
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
	.work {
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
