<template>
	<div class="menu-switcher">
		<a class="prev" @click.prevent="prev" href="#">
			<svg class="lg-icon" xmlns="http://www.w3.org/2000/svg" width="15.043" height="27.253" viewBox="0 0 15.043 27.253">
				<path d="M14.341 26.546L1.419 13.627 14.341.708" fill="none" stroke="#205de5" stroke-width="2" />
			</svg>

			<svg class="xs-icon" xmlns="http://www.w3.org/2000/svg" width="5.677" height="8.526" viewBox="0 0 5.677 8.526">
				<path d="M0,0,3.556,3.556,0,7.112" transform="translate(4.97 7.819) rotate(180)" fill="none" stroke="#205de5" stroke-width="2" />
			</svg>
		</a>

		<div class="switcher__items">
			<div v-for="(item, i) in activeItems" class="switcher__item" :key="`i-${i}`">
				<TabItem :item="item" :isActive="currentTab === item.data.tabName" @tabChanged="currentTabChanged" />
			</div>
		</div>

		<a class="next" @click.prevent="next" href="#">
			<svg class="lg-icon" xmlns="http://www.w3.org/2000/svg" width="15.043" height="27.253" viewBox="0 0 15.043 27.253">
				<path d="M.702.707l12.922 12.919L.702 26.545" fill="none" stroke="#205de5" stroke-width="2" />
			</svg>
			<svg class="xs-icon" xmlns="http://www.w3.org/2000/svg" width="5.678" height="8.526" viewBox="0 0 5.678 8.526">
				<path d="M-6684.7-800.937l3.557,3.556-3.557,3.556" transform="translate(6685.402 801.645)" fill="none" stroke="#205de5" stroke-width="2" />
			</svg>
		</a>
	</div>
</template>

<script>
import TabItem from "./TabItem";
import _ from "lodash";

export default {
	name: "MenuSwitcher",

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

	components: { TabItem },

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
		currentTabChanged({ item, index }) {
			this.$emit("changeCurrentTab", item.tabName);
			this.currentIndex = index;
		},

		next: _.throttle(function() {
			this.currentIndex++;
			this.$emit("changeCurrentTab", this.currentItem.tabName);
		}, 600),

		prev: _.throttle(function() {
			this.currentIndex--;
			this.$emit("changeCurrentTab", this.currentItem.tabName);
		}, 600)
	}
};
</script>

<style lang="scss" scoped>
@import "./../../scss/variables";

.menu-switcher {
	display: flex;
	justify-content: space-between;
	align-items: center;
	width: 100%;
	max-width: 290px;
	margin-top: 15px;
	margin-left: auto;
	margin-right: auto;

	.next,
	.prev {
		display: inline-block;
		padding: 10px;

		.lg-icon {
			display: none;
		}

		&:hover {
			text-decoration: none;
		}
	}

	.switcher__items {
		flex: 1;
		display: flex;
		align-items: center;
		justify-content: space-between;
		height: 82px;
	}
}

@media (min-width: $md) {
	.menu-switcher {
		margin-top: 45px;
		max-width: 537px;

		.next,
		.prev {
			padding: 25px;

			.lg-icon {
				display: block;
			}

			.xs-icon {
				display: none;
			}
		}

		.switcher__items {
			height: 126px;
			padding-right: 25px;
			padding-left: 25px;
		}
	}
}
</style>
