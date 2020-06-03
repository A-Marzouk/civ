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
			<div class="switcher__item">
				<a href="#" @click.prevent="$emit('skillChanged', 'programing-languages')">Programing Languages</a>
				<a href="#" @click.prevent="$emit('skillChanged', 'frameworks-databases')">Frameworks/Databases</a>
				<a href="#" @click.prevent="$emit('skillChanged', 'design-skills')">Design Skills</a>
				<a href="#" @click.prevent="$emit('skillChanged', 'software')">Software</a>
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
import { throttle } from "lodash";

export default {
	name: "MenuSwitcher",

	props: {
		currentTab: {
			type: String,
			required: true
		}
	},

	data() {
		return {
			tabs: [
				"programing-languages",
				"frameworks-databases",
				"design-skills",
				"software"
			],

			activeIndex: 0
		};
	},

	methods: {
		next: throttle(function() {
			this.activeIndex++;
			if (this.activeIndex >= this.tabs.length) this.activeIndex = 0;
			this.$emit("skillChanged", this.tabs[this.activeIndex]);
		}, 500),

		prev: throttle(function() {
			this.activeIndex--;
			if (this.activeIndex < 0) this.activeIndex = this.tabs.length - 1;
			this.$emit("skillChanged", this.tabs[this.activeIndex]);
		}, 500)
	}
};
</script>

<style lang="scss" scoped>
@import "./../../scss/variables";

.menu-switcher {
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
</style>
