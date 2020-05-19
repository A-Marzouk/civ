<template>
	<div class="item-view">
		<div class="view-header">
			<div class="header__icon">
				<slot />
			</div>
			<div class="header__title" v-text="item.title"></div>
			<div class="header__duration" v-if="duration" v-text="duration"></div>
		</div>
		<div class="view-body">
			<div class="sub-item" v-for="(subItem, i) in item.subItems" :key="i">
				<div class="sub-item-header">
					<div class="sub-item__title" v-text="subItem.title"></div>
					<div class="sub-item__type" v-if="subItem.type" v-text="subItem.type"></div>
				</div>
				<div class="sub-item-detail" v-text="subItem.detail"></div>
			</div>
		</div>
	</div>
</template>

<script>
export default {
	name: "item-view",

	props: {
		item: {
			type: Object,
			required: true
		}
	},

	computed: {
		duration() {
			if (!this.item.duration) return undefined;

			return `${this.item.duration.from} - ${this.item.duration.to}`;
		}
	}
};
</script>

<style lang="scss" scoped>
@import "./../../scss/variables";

.item-view {
	font-family: $muli;
	margin-bottom: 50px;

	&:last-child {
		margin-bottom: 0;
	}
}

.view-header {
	display: flex;
	align-items: center;
}

.header__icon svg {
	height: 24px;
	width: 24px;
}

.header__title {
	position: relative;
	color: #172c7a;
	font-weight: 700;
	font-size: 14px;
	padding-left: 35px;
	margin-left: 10px;

	&::before {
		content: "";
		display: flex;
		background: #bec2d4;
		align-items: center;
		position: absolute;
		top: 50%;
		left: 0;
		width: 25px;
		height: 1px;
		transform: translateY(50%);
	}
}

.header__duration {
	font-size: 10px;
	color: #838ba4;
	padding-left: 10px;
}

.sub-item {
	padding-left: 50px;
	padding-top: 7px;

	&:first-child {
		padding-top: 0;
	}
}

.sub-item-header {
	display: flex;
	justify-content: space-between;
	padding-top: 15px;
}

.sub-item__title {
	color: #172c7a;
	font-family: $poppins;
	font-size: 12px;
	line-height: 13px;
}

.sub-item__type {
	display: flex;
	align-items: center;
	justify-content: center;
	background: rgba(248, 171, 8, 0.25);
	color: #f8ab08;
	font-size: 6.66px;
	font-weight: 300;
	width: 34px;
	height: 13px;
	border-radius: 100px;
}

.sub-item-detail {
	font-size: 11px;
	font-weight: 300;
	color: #838ba4;
	line-height: 16px;
	padding-top: 10px;
}
</style>
