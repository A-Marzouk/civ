<template>
	<div class="bg-card tw-rounded-10px tw-px-25px tw-pb-25px tw-pt-4">
		<div class="tw-flex tw-justify-between tw-items-center">
			<h4 class="tw-font-bold tw-leading-30px tw-text-black tw-text-2xl" v-text="title"></h4>
			<div class="tw-flex tw-items-center tw-justify-center tw-rounded-9px tw-w-60px tw-h-60px" :class="`bg-${iconBgColor}`">
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
.bg-card {
	background: #eeeff1;
}

.bg-yellow {
	background: #ffb400;
}
.bg-lima {
	background: #46e72b;
}
.bg-turquoise {
	background: #23ddbe;
}
.tw-rounded-9px {
	border-radius: 9px;
}
</style>
