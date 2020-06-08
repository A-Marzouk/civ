<template>
	<div class="item-view">
		<hr class="card-hr" />

		<div class="view-card">
			<div class="card-duration" v-text="duration"></div>
			<h4 class="card-title" v-text="title"></h4>
			<div class="card-subtitle" v-text="subtitle"></div>
			<div class="card-description" v-text="description"></div>
		</div>
	</div>
</template>

<script>
export default {
	name: "ItemView",

	props: {
		title: {
			type: String,
			required: true
		},
		subtitle: {
			type: String,
			required: true
		},
		description: {
			type: String,
			required: true
		},
		duration: {
			type: String,
			required: true
		}
	}
};
</script>

<style lang="scss" scoped>
@import "./../../scss/variables";

.item-view {
	color: #000000;
	background: #f5f6f8;
	font-family: $roboto;
	padding: 20px 10px;

	.card-hr {
		border-top-width: 10px;
		border-top-color: #df136c;
	}

	.view-card {
		padding: 35px 5px 40px;

		.card-duration {
			font-size: 12px;
			line-height: 14px;
			opacity: 0.5;
		}

		.card-title {
			font-size: 24px;
			line-height: 28px;
			font-weight: 700;
			padding-top: 20px;
		}

		.card-subtitle {
			font-size: 12px;
			line-height: 14px;
			font-weight: 700;
			padding-top: 10px;
		}

		.card-description {
			font-size: 12px;
			line-height: 14px;
			padding-top: 15px;
		}
	}

	@include md {
		padding: 20px;

		.view-card {
			padding: 20px 0 40px;
		}
	}
}
</style>
