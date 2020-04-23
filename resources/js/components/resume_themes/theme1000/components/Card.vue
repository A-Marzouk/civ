<template>
	<div class="tw-flex tw-justify-between education-card tw-rounded-10px tw-px-25px tw-pb-25px tw-pt-4">
		<div>
			<h4 class="tw-font-bold tw-leading-21px tw-text-black tw-text-lg" v-text="details.title"></h4>
			<div class="tw-font-medium tw-leading-21px tw-text-black tw-text-lg tw-pt-10px" v-text="details.subtitle"></div>
			<p class="tw-leading-tight tw-text-xs tw-text-black tw-pt-10px" v-html="details.description"></p>
			<div class="tw-leading-tight tw-text-black tw-opacity-50 tw-pt-5" v-text="details.duration"></div>
		</div>
		<div>
			<div class="tw-flex tw-items-center tw-justify-center tw-rounded-9px tw-w-60px tw-h-60px" :class="`bg-${iconBgColor}`">
				<slot></slot>
			</div>
		</div>
	</div>
</template>

<script>
export default {
	name: "card",

	props: {
		details: {
			type: Object,
			required: true
		},
		iconBgColor: {
			type: String,
			default: "yellow",
			validator: v => ["lima", "yellow"].includes(v)
		}
	}
};
</script>

<style lang="scss" scoped>
.education-card {
	background: #eeeff1;
}

.bg-yellow {
	background: #ffb400;
}
.bg-lima {
	background: #46e72b;
}
.tw-rounded-9px {
	border-radius: 9px;
}
</style>
