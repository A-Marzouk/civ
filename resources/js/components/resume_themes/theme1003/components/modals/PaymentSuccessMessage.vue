<template>
	<div class="payment-success-message">
		<p>
			<span class="thanku-msg">Thank you,</span>
			<span>your payment was successful</span>
		</p>
	</div>
</template>

<script>
export default {
	name: "payment-success-message"
};
</script>

<style lang="scss" scoped>
@import "./../../scss/variables";

.payment-success-message {
	display: flex;
	font-family: $poppins;
	align-items: center;
	justify-content: center;
	padding: 40px 15px 50px;

	p {
		display: flex;
		align-items: center;
		justify-content: center;
		flex-direction: column;
		font-weight: 700;
		font-size: 16px;

		.thanku-msg {
			font-weight: 800;
			font-size: 22px;
		}
	}

	@include md {
		padding-top: 180px;
		padding-bottom: 200px;

		p {
			flex-direction: row;
			font-weight: 800;
			font-size: 28px;

			.thanku-msg {
				font-size: 28px;
				margin-right: 15px;
			}
		}
	}

	@include lg {
		padding-top: 230px;
		padding-bottom: 250px;

		p,
		p .thanku-msg {
			font-size: 40px;
			line-height: 60px;
		}
	}
}
</style>
