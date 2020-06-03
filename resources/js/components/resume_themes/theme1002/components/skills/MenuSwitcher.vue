<template>
	<div class="menu-switcher">
		<a class="prev" @click.prevent="prev" href="#">
			<svg class="lg-icon" xmlns="http://www.w3.org/2000/svg" width="10.531" height="18.234" viewBox="0 0 10.531 18.234">
				<path d="M0,0,8.41,8.41,0,16.82" transform="translate(9.824 17.527) rotate(180)" fill="none" stroke="#205de5" stroke-width="2" />
			</svg>
			<svg class="xs-icon" xmlns="http://www.w3.org/2000/svg" width="7.716" height="12.603" viewBox="0 0 7.716 12.603">
				<path d="M0,0,5.595,5.595,0,11.189" transform="translate(7.009 11.896) rotate(180)" fill="none" stroke="#205de5" stroke-width="2" />
			</svg>
		</a>

		<div class="switcher__tabs--sm">
			<a href="#" @click.prevent v-text="tabs[activeIndex].label"></a>
		</div>

		<div class="switcher__tabs--lg">
			<a v-for="(tab, i) in tabs" href="#" :class="{'active': tab.name === tabs[activeIndex].name}" @click.prevent="tabChanged(tab.name)" :key="`tab-${i}`" v-text="tab.label"></a>
		</div>

		<a class="next" @click.prevent="next" href="#">
			<svg class="lg-icon" xmlns="http://www.w3.org/2000/svg" width="10.531" height="18.234" viewBox="0 0 10.531 18.234">
				<path d="M-6684.7-800.938l8.41,8.41-8.41,8.41" transform="translate(6685.403 801.645)" fill="none" stroke="#205de5" stroke-width="2" />
			</svg>
			<svg class="xs-icon" xmlns="http://www.w3.org/2000/svg" width="7.716" height="12.603" viewBox="0 0 7.716 12.603">
				<path d="M-6684.7-800.938l5.595,5.595-5.595,5.594" transform="translate(6685.403 801.645)" fill="none" stroke="#205de5" stroke-width="2" />
			</svg>
		</a>
	</div>
</template>

<script>
import { throttle, debounce } from "lodash";

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
				{
					name: "programing-languages",
					label: "Programing Languages"
				},
				{
					name: "frameworks-databases",
					label: "Frameworks/Databases"
				},
				{
					name: "design-skills",
					label: "Design Skills"
				},
				{
					name: "software",
					label: "Software"
				}
			],

			activeIndex: 0
		};
	},

	methods: {
		touchmove: debounce(function(e) {}, 500),
		touchend: debounce(function(e) {}, 500),

		tabChanged(skill) {
			this.activeIndex = this.skillIndex(skill);
			this.$emit("skillChanged", skill);
		},

		next: throttle(function() {
			this.activeIndex++;
			if (this.activeIndex >= this.tabs.length) this.activeIndex = 0;
			this.$emit("skillChanged", this.tabs[this.activeIndex].name);
		}, 500),

		prev: throttle(function() {
			this.activeIndex--;
			if (this.activeIndex < 0) this.activeIndex = this.tabs.length - 1;
			this.$emit("skillChanged", this.tabs[this.activeIndex].name);
		}, 500),

		skillIndex(skill) {
			let index = 0;

			for (let i = 0; i < this.tabs.length; i++) {
				const tab = this.tabs[i];

				if (tab.name === skill) {
					index = i;
					break;
				}
			}

			return index;
		}
	},

	mounted() {
		this.activeIndex = this.skillIndex(this.currentTab);
	}
};
</script>

<style lang="scss" scoped>
@import "./../../scss/variables";

.menu-switcher {
	width: 100%;
	display: flex;
	align-items: center;

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

	.switcher__tabs--sm {
		flex: 1;

		a {
			display: block;
			font-family: $nexa-bold;
			font-weight: 700;
			color: #205de5;
			text-align: center;
			white-space: nowrap;
			font-size: 20px;
			line-height: 28px;

			&:hover {
				text-decoration: none;
			}
		}
	}

	.switcher__tabs--lg {
		display: none;
	}
}

@media (min-width: $sm) {
	.menu-switcher {
		.switcher__tabs--sm {
			a {
				font-size: 22px;
				line-height: 32px;
			}
		}
	}
}

@media (min-width: $md) {
	.menu-switcher {
		margin: 0 auto;
		max-width: 470px;

		.next,
		.prev {
			.lg-icon {
				display: block;
			}

			.xs-icon {
				display: none;
			}
		}

		.switcher__tabs--sm {
			a {
				font-size: 32px;
				line-height: 48px;
			}
		}
	}
}

@media (min-width: $lg) {
	.menu-switcher {
		max-width: none;

		.next,
		.prev {
			display: none;
		}

		.switcher__tabs--sm {
			display: none;
		}

		.switcher__tabs--lg {
			width: 100%;
			display: flex;
			justify-content: space-between;

			a {
				display: block;
				font-family: $nexa-light;
				color: #205de5;
				text-align: center;
				white-space: nowrap;
				font-size: 24px;
				line-height: 38px;

				&:hover {
					text-decoration: none;
				}

				&.active {
					font-family: $nexa-bold;
					font-weight: 700;
				}
			}
		}
	}
}

@media (min-width: $xl) {
	.menu-switcher {
		.switcher__tabs--lg {
			a {
				font-size: 38px;
				line-height: 67px;
			}
		}
	}
}
</style>
