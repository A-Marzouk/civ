<template>
	<div class="progress-card">
		<div class="tw-flex tw-justify-between tw-items-center">
			<h4 class="progress-card__title tw-font-bold tw-text-black tw-text-2xl" v-text="title"></h4>
			<div class="progress-card__icon tw-flex tw-items-center tw-justify-center" :class="`bg-${iconBgColor}`">
				<slot></slot>
			</div>
		</div>

		<div class="tw-pt-8">
			<ProgressBar :progress="progress" />
		</div>
	</div>
</template>

<script>
import ProgressBar from "./ProgressBar";

export default {
	name: "progress-card",

	props: {
		title: {
			type: String,
			required: true
		},
		progress: {
			type: Number,
			default: 0
		},
		iconBgColor: {
			type: String,
			default: "turquoise",
			validator: v => ["lima", "turquoise", "yellow"].includes(v)
		}
	},

	components: { ProgressBar }
};
</script>

<style lang="scss" scoped>
@import "./../scss/variables";

.progress-card {
	background: #eeeff1;
	border-radius: 10px;
	padding: 17px 25px 25px;
}

.progress-card__title {
	line-height: 30px;
}

.progress-card__icon {
	border-radius: 9px;
	height: 60px;
	width: 60px;
}

@media (min-width: $md) {
	.progress-card {
		padding: 40px 54px 44px;
	}
	.progress-card__title {
		font-size: 36px;
	}
}

@media (min-width: $lg) {
	.progress-card {
		padding-left: 40px;
		padding-right: 40px;
	}
	.progress-card__title {
		font-size: 30px;
	}
}

@media (min-width: $xl) {
	.progress-card__title {
		font-size: 36px;
	}
}

/* Options for props iconBgColor*/
.bg-yellow {
	background: #ffb400;
}
.bg-lima {
	background: #46e72b;
}
.bg-turquoise {
	background: #23ddbe;
}
</style>
