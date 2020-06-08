<template>
	<div class="tw-flex tw-items-center">
		<div class="progress__outline tw-flex-1 tw-relative" :class="`bg-${color}`">
			<div class="progress__bar tw-absolute tw-top-0 tw-bottom-0 tw-left-0" :style="{width:  progress+'%'}"></div>
		</div>
		<div class="progress__label tw-text-black tw-text-lg tw-pl-3">{{ progress }}%</div>
	</div>
</template>

<script>
export default {
	name: "progress-bar",

	props: {
		progress: {
			type: Number,
			required: true
		},
		color: {
			type: String,
			default: "turquoise",
			validator: v => ["lima", "turquoise", "yellow"].includes(v)
		}
	}
};
</script>

<style lang="scss" scoped>
@import "./../scss/variables";

.progress__outline {
	height: 10px;
	border-radius: 9999px;
}

.progress__bar {
	background: #acacac;
	border-radius: 9999px;
}

.progress__label {
	line-height: 21px;
}

@media (min-width: $md) {
	.progress__outline {
		height: 15px;
	}

	.progress__label {
		font-size: 24px;
		line-height: 27px;
	}
}

/* Options for props Color */
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
