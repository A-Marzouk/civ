<template>
	<div class="tab-item">
		<a href="#" @click.prevent="tabChanged">
			<img class="tab-item--icon" :src="item.data.icon">
		</a>
	</div>
</template>

<script>
import _ from "lodash";

export default {
	name: "TabItem",

	props: {
		isActive: {
			type: Boolean,
			default: false
		},

		item: {
			type: Object,
			required: true
		}
	},

	methods: {
		tabChanged: _.throttle(function() {
			this.$emit("tabChanged", {
				item: this.item.data,
				index: this.item.index
			});
		}, 600)
	},

	updated() {
		this.$el.classList.remove("active");

		if (this.isActive) {
			setTimeout(() => {
				this.$el.classList.add("active");
			}, 0);
		}
	},

	mounted() {
		if (this.isActive) {
			setTimeout(() => {
				this.$el.classList.add("active");
			}, 0);
		}
	}
};
</script>

<style lang="scss" scoped>
@import "./../../scss/variables";

.tab-item {
	a {
		display: flex;
		align-items: center;
		justify-content: center;
		width: 52.81px;
		height: 52.81px;
		border-radius: 100px;
		background: rgba(32, 93, 229, 0.25);

		.tab-item--icon {
			width: 29px;
			height: 26px;
		}
	}

	&.active a {
		width: 85px;
		height: 85px;
		background: #205de5;
		animation: scaleUpSmLink 0.3s forwards;

		.tab-item--icon {
			width: 44.47px;
			height: 42.98px;
			animation: scaleUpSmIcon 0.3s forwards;
		}
	}
}

@media (min-width: $md) {
	.tab-item {
		a {
			width: 75px;
			height: 75px;

			.tab-item--icon {
				width: 39.54px;
				height: 38.22px;
			}
		}

		&.active a {
			width: 125px;
			height: 125px;
			animation: scaleUpMdLink 0.3s forwards;

			.tab-item--icon {
				width: 78.11px;
				height: 70.18px;
				animation: scaleUpMdIcon 0.3s forwards;
			}
		}
	}
}

/* Animations */
@keyframes scaleUpSmLink {
	from {
		width: 52.81px;
		height: 52.81px;
		background: rgba(32, 93, 229, 0.25);
	}

	to {
		width: 85px;
		height: 85px;
		background: #205de5;
	}
}

@keyframes scaleUpSmIcon {
	from {
		width: 29px;
		height: 26px;
	}
	to {
		width: 44.47px;
		height: 42.98px;
	}
}

@keyframes scaleUpMdLink {
	from {
		width: 75px;
		height: 75px;
	}

	to {
		width: 125px;
		height: 125px;
	}
}

@keyframes scaleUpMdIcon {
	from {
		width: 39.54px;
		height: 38.22px;
	}

	to {
		width: 78.11px;
		height: 70.18px;
	}
}
</style>
