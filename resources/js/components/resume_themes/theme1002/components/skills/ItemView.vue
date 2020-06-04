<template>
	<div class="item-view">
		<img class="item-icon" :src="icon">

		<div class="item-detail">
			<h3 class="item-title" v-text="title"></h3>
			<ProgressBar :level="level" />
		</div>

	</div>
</template>

<script>
import ProgressBar from "./../ProgressBar";

export default {
	name: "ItemView",

	props: {
		title: {
			type: String,
			required: true
		},

		icon: {
			type: String,
			required: true
		},

		level: {
			type: Number,
			required: true
		}
	},

	components: { ProgressBar }
};
</script>

<style lang="scss" scoped>
@import "./../../scss/variables";

.item-view {
	display: flex;
	.item-icon {
		width: 64px;
		height: 64px;
	}
	.item-detail {
		width: 100%;
		display: flex;
		flex-direction: column;
		justify-content: space-between;
		padding-left: 25px;

		.item-title {
			font-family: $poppins;
			font-weight: 700;
			font-size: 23px;
			color: #205de5;
		}
	}
}

@media (min-width: $lg) {
	.item-view {
		.item-icon {
			width: 82px;
			height: 82px;
		}

		.item-detail {
			justify-content: center;

			.item-title {
				font-size: 24px;
			}
		}
	}
}

@media (min-width: $xl) {
	.item-view {
		.item-icon {
			width: 132px;
			height: 132px;
		}

		.item-detail {
			justify-content: center;

			.item-title {
				font-size: 30px;
				line-height: 42px;
			}
		}
	}
}

@media (min-width: $xxl) {
	.item-view {
		.item-icon {
			width: 162px;
			height: 162px;
		}
	}
}
</style>
