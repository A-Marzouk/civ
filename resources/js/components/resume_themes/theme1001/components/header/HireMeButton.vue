<template>
	<a href="#" class="hireme-button">
		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10.969 12.124">
			<path d="M7.969,12.124H3a3,3,0,0,1-3-3V3A3,3,0,0,1,3,0H7.969a3,3,0,0,1,3,3V9.123A3,3,0,0,1,7.969,12.124ZM5.479,6.062a3.17,3.17,0,0,0-2.071.686,2.848,2.848,0,0,0-.97,2.042.376.376,0,0,0,.114.217.229.229,0,0,0,.132.086H8.276a.246.246,0,0,0,.186-.068.319.319,0,0,0,.068-.235,2.764,2.764,0,0,0-.956-2.061A3.254,3.254,0,0,0,5.479,6.062Zm.005-3.03A1.212,1.212,0,1,0,6.7,4.244,1.217,1.217,0,0,0,5.485,3.031Z" transform="translate(0 0)" fill="#fff" />
		</svg>

		<span>Hire me</span>
	</a>
</template>

<script>
export default {
	name: "hire-me-button"
};
</script>

<style lang="scss" scoped>
@import "./../../scss/variables";

.hireme-button {
	font-family: $muli;
	display: flex;
	font-size: 10px;
	font-weight: 700;
	color: #ffffff;
	background: #f8ab08;
	justify-content: center;
	align-items: center;
	border-radius: 5px;
	width: 100px;
	height: 40px;

	span {
		margin-left: 5px;
		color: inherit;
		font-size: inherit;
		font-weight: inherit;
	}

	svg {
		height: 13px;
	}
}

@media (min-width: $sm) {
	.hireme-button {
		width: 115px;
		height: 45px;
		font-size: 13px;

		svg {
			height: 15px;
		}

		span {
			margin-left: 7px;
		}
	}
}

@media (min-width: $md) {
	.hireme-button {
		border-radius: 9px;
		width: 129px;
		height: 40px;
	}
}
</style>
