<template>
	<div class="tw-flex tw-items-center">
		<div class="tw-flex-1 tw-relative tw-h-10px tw-rounded-full md:tw-h-15px" :class="`bg-${color}`">
			<div class="bg-gray tw-absolute tw-top-0 tw-bottom-0 tw-left-0 tw-rounded-full" :style="{width:  progress+'%'}"></div>
		</div>
		<div class="tw-leading-21px tw-text-black tw-text-lg tw-pl-3 md:tw-text-2xl md:tw-leading-27px">{{ progress }}%</div>
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
.bg-yellow {
	background: #ffb400;
}
.bg-lima {
	background: #46e72b;
}
.bg-turquoise {
	background: #23ddbe;
}
.bg-gray {
	background: #acacac;
}
</style>
