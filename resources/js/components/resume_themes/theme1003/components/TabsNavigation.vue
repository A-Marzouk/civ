<template>
	<div class="tabs-navigation">
		<TabButton label="Portfolio" :isActive="currentTab == 'portfolio'" @click="$emit('tabChanged', 'portfolio')">
			<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
				<path d="M21.6 2.4V16.8H7.2V2.4H21.6ZM21.6 0H7.2C5.88 0 4.8 1.08 4.8 2.4V16.8C4.8 18.12 5.88 19.2 7.2 19.2H21.6C22.92 19.2 24 18.12 24 16.8V2.4C24 1.08 22.92 0 21.6 0ZM11.4 11.604L13.428 14.316L16.404 10.596L20.4 15.6H8.4L11.4 11.604ZM0 4.8V21.6C0 22.92 1.08 24 2.4 24H19.2V21.6H2.4V4.8H0Z" />
			</svg>
		</TabButton>
		<TabButton label="Education" :isActive="currentTab == 'education'" @click="$emit('tabChanged', 'education')">
			<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
				<path d="M11 0L0 6L4 8.18V14.18L11 18L18 14.18V8.18L20 7.09V14H22V6L11 0ZM17.82 6L11 9.72L4.18 6L11 2.28L17.82 6ZM16 12.99L11 15.72L6 12.99V9.27L11 12L16 9.27V12.99Z" />
			</svg>
		</TabButton>
		<TabButton label="Experience" :isActive="currentTab == 'experience'" @click="$emit('tabChanged', 'experience')">
			<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
				<path d="M12 4V2H8V4H12ZM2 6V17H18V6H2ZM18 4C19.11 4 20 4.89 20 6V17C20 18.11 19.11 19 18 19H2C0.89 19 0 18.11 0 17L0.00999999 6C0.00999999 4.89 0.89 4 2 4H6V2C6 0.89 6.89 0 8 0H12C13.11 0 14 0.89 14 2V4H18Z" />
			</svg>
		</TabButton>
		<TabButton label="Skills" :isActive="currentTab == 'skills'" @click="$emit('tabChanged', 'skills')">
			<svg viewBox="0 0 20 18" xmlns="http://www.w3.org/2000/svg">
				<path d="M5.00024 13C5.55024 13 6.00025 13.45 6.00025 14C6.00025 15.1 5.10024 16 4.00024 16C3.83024 16 3.67024 15.98 3.50024 15.95C3.81024 15.4 4.00024 14.74 4.00024 14C4.00024 13.45 4.45024 13 5.00024 13ZM16.6702 0C16.4102 0 16.1602 0.1 15.9602 0.29L7.00025 9.25L9.75025 12L18.7102 3.04C19.1002 2.65 19.1002 2.02 18.7102 1.63L17.3702 0.29C17.1702 0.09 16.9202 0 16.6702 0ZM5.00024 11C3.34024 11 2.00024 12.34 2.00024 14C2.00024 15.31 0.840244 16 0.000244141 16C0.920244 17.22 2.49024 18 4.00024 18C6.21025 18 8.00025 16.21 8.00025 14C8.00025 12.34 6.66024 11 5.00024 11Z" />
			</svg>
		</TabButton>
		<TabButton label="Media" :isActive="currentTab == 'media'" @click="$emit('tabChanged', 'media')">
			<svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
				<path d="M2 4H0V18C0 19.1 0.9 20 2 20H16V18H2V4ZM18 0H6C4.9 0 4 0.9 4 2V14C4 15.1 4.9 16 6 16H18C19.1 16 20 15.1 20 14V2C20 0.9 19.1 0 18 0ZM18 14H6V2H18V14ZM10 3.5V12.5L16 8L10 3.5Z" />
			</svg>
		</TabButton>
		<TabButton class="sm--hidden" label="About Me" :isActive="currentTab == 'about-me'" @click="$emit('tabChanged', 'about-me')">
			<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
				<path d="M10 2.5C11.375 2.5 12.5 3.625 12.5 5C12.5 6.375 11.375 7.5 10 7.5C8.625 7.5 7.5 6.375 7.5 5C7.5 3.625 8.625 2.5 10 2.5ZM10 15C13.375 15 17.25 16.6125 17.5 17.5H2.5C2.7875 16.6 6.6375 15 10 15ZM10 0C7.2375 0 5 2.2375 5 5C5 7.7625 7.2375 10 10 10C12.7625 10 15 7.7625 15 5C15 2.2375 12.7625 0 10 0ZM10 12.5C6.6625 12.5 0 14.175 0 17.5V20H20V17.5C20 14.175 13.3375 12.5 10 12.5Z" />
			</svg>
		</TabButton>
	</div>
</template>

<script>
import TabButton from "./TabButton";

export default {
	props: {
		currentTab: {
			type: String,
			required: true
		}
	},

	name: "TabsNavigation",

	components: { TabButton }
};
</script>

<style lang="scss" scoped>
@import "./../scss/variables";

.tabs-navigation {
	display: flex;
	align-items: center;
	justify-content: center;
	padding: 25px 10px 0;

	@include xs {
		padding: 30px 15px 0;
		padding-top: 30px;
	}

	@include sm {
		max-width: calc(#{$sm} + 40px);
		margin-left: auto;
		margin-right: auto;
		padding-left: 20px;
		padding-right: 20px;
	}

	@include lg {
		max-width: calc(#{$lg} + 40px);
	}

	@include xl {
		padding-left: 45px;
		padding-right: 45px;
		max-width: calc(#{$xl} + 90px);
	}
}
</style>
