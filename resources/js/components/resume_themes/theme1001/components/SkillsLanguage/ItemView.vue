<template>
	<div class="item-view">
		<div class="item-view__header">
			<div class="header__title" v-text="title"></div>
			<div class="header__progress" v-text="`${progress}%`"></div>
		</div>
		<div class="item-view__progress">
			<ProgressBar :progress="progress" />
		</div>
	</div>
</template>

<script>
import ProgressBar from "./../ProgressBar";

export default {
	name: "item-view",

	props: {
		title: {
			type: String,
			required: true
		},
		progress: {
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
	font-family: $muli;

	.item-view__header {
		display: flex;
		justify-content: space-between;
		align-items: center;

		.header__title {
			color: #004fbc;
			font-size: 12px;
			line-height: 37px;
			font-weight: 500;
		}

		.header__progress {
			color: #aa9d93;
			font-weight: 700;
			font-size: 12px;
			line-height: 37px;
		}
	}
}

@media (min-width: 1600px) {
	.item-view {
		.item-view__header {
			.header__title {
				font-size: 21px;
				line-height: 64px;
			}

			.header__progress {
				font-size: 21px;
				line-height: 64px;
			}
		}

		.item-view__progress {
		}
	}
}
</style>
