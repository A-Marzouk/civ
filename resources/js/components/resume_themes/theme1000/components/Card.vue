<template>
	<div class="card">
		<div class="card__body tw-flex tw-justify-between tw-items-center">
			<div class="card__body--header">
				<h4 class="card__title tw-font-bold tw-text-black tw-text-lg" v-text="details.title"></h4>
				<div class="card__subtitle tw-text-black tw-font-medium tw-text-lg" v-text="details.subtitle"></div>
			</div>
			<div class="card__body--icon tw-flex tw-items-center tw-justify-center" :class="`bg-${iconBgColor}`">
				<slot></slot>
			</div>
		</div>
		<div class="card__footer">
			<div class="card__footer--description tw-leading-tight tw-text-xs tw-text-black" v-html="details.description"></div>
			<div class="card__footer--duration tw-leading-tight tw-text-black tw-opacity-50 tw-pt-5" v-text="details.duration"></div>
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
@import "./../scss/variables";

.card {
	background: #eeeff1;
	border-radius: 10px;
	padding: 18px 25px 25px;
}

.card__title {
	line-height: 21px;
}

.card__subtitle {
	line-height: 21px;
	padding-top: 10px;
}

.card__body--icon {
	border-radius: 9px;
	width: 60px;
	height: 60px;
}

.card__footer--description {
	padding-top: 10px;
}

.card__footer {
	padding-right: 92px;
}

@media (min-width: $md) {
	.card {
		padding: 40px 54px 44px;
	}

	.card__title {
		font-size: 25px;
		line-height: 29px;
	}

	.card__subtitle {
		font-size: 20px;
		line-height: 23px;
		padding-top: 15px;
	}

	.card__footer {
		padding-right: 128px;
	}

	.card__footer--description {
		font-size: 20px;
		line-height: 23px;
		padding-top: 20px;
	}

	.card__footer--duration {
		padding-top: 40px;
	}
}

@media (min-width: $lg) {
	.card {
		padding: 15px;
	}

	.card__title {
		font-size: 22px;
		line-height: 26px;
	}

	.card__subtitle {
		font-size: 18px;
		line-height: 21px;
		padding-top: 10px;
	}

	.card__footer {
		padding-right: 0;
	}

	.card__footer--description {
		font-size: 14px;
		line-height: 18px;
		padding-top: 15px;
	}

	.card__footer--duration {
		padding-top: 15px;
	}
}

@media (min-width: 1600px) {
	.card {
		padding: 40px 54px 44px;
	}

	.card__title {
		font-size: 25px;
		line-height: 29px;
	}

	.card__subtitle {
		font-size: 20px;
		line-height: 23px;
		padding-top: 15px;
	}

	.card__footer--description {
		font-size: 20px;
		line-height: 23px;
		padding-top: 20px;
	}
}

/* Options for props iconBgColor*/
.bg-yellow {
	background: #ffb400;
}
.bg-lima {
	background: #46e72b;
}
</style>
