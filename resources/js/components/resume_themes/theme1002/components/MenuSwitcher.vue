<template>
	<div class="menu-switcher">
		<a class="prev" @click.prevent="prev" href="#">&#10094;</a>

		<div v-for="(item, i) in activeItems" class="switcher__item" :class="{'active': currentTab === item.data.tabName}" :key="`i-${i}`">
			<a href="#" @click.prevent="currentTabChanged(item.data, item.index)">
				<img class="switcher__item--icon" :src="item.data.icon">
				<span class="switcher__item--label" v-text="item.data.label"></span>
			</a>
		</div>

		<a class="next" @click.prevent="next" href="#">&#10095;</a>
	</div>
</template>

<script>
export default {
	name: "menu-switcher",

	props: {
		currentTab: {
			type: String,
			required: true
		},

		items: {
			type: Array,
			required: true
		}
	},

	data() {
		return {
			currentIndex: 0
		};
	},

	computed: {
		activeItems() {
			const count = 4;
			const currentIndex = Math.abs(this.currentIndex) % count;

			let indexes = [];

			if (currentIndex === count - 1) {
				indexes = [2, 3, 0];
			} else if (currentIndex === 0) {
				indexes = [3, 0, 1];
			} else {
				indexes = [currentIndex - 1, currentIndex, currentIndex + 1];
			}

			const [b, m, e] = indexes;

			return [
				{ index: b, data: this.items[b] },
				{ index: m, data: this.items[m] },
				{ index: e, data: this.items[e] }
			];
		},
		currentItem() {
			const currentIndex =
				Math.abs(this.currentIndex) % this.items.length;
			return this.items[currentIndex];
		}
	},

	methods: {
		currentTabChanged(item, index) {
			this.$emit("changeCurrentTab", item.tabName);
			this.currentIndex = index;
		},

		next() {
			this.currentIndex++;
			this.$emit("changeCurrentTab", this.currentItem.tabName);
		},

		prev() {
			this.currentIndex--;
			this.$emit("changeCurrentTab", this.currentItem.tabName);
		}
	}
};
</script>

<style lang="scss" scoped>
.menu-switcher {
	width: 100%;
	height: 85px;
	max-width: 290px;
	margin-left: auto;
	margin-right: auto;

	.switcher__items {
		display: flex;
		align-items: center;
		justify-content: space-between;
		height: 82px;
	}

	.switcher__item {
		a {
			display: flex;
			align-items: center;
			justify-content: center;
			width: 52.81px;
			height: 52.81px;
			border-radius: 100px;
			background: rgba(32, 93, 229, 0.25);

			.switcher__item--icon {
				width: 29px;
				height: 26px;
			}

			.switcher__item--label {
				display: none;
			}
		}

		&.active {
			a {
				width: 85px;
				height: 85px;
				background: #205de5;

				.switcher__item--icon {
					width: 44.47px;
					height: 42.98px;
				}
			}
		}
	}
}
</style>
