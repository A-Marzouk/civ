<template>
	<div>
		<div v-for="mission in missions" :key="mission.id">
			<ItemView :title="mission.title" :description="mission.description" />
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
</style>
