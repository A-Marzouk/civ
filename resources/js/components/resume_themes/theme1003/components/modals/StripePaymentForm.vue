<template>
	<form class="stripe-payment-form" @submit.prevent>
		<p class="payment-form__title">Fill in your details</p>

		<div class="payment-form__inputs">
			<div class="payment-form__input">
				<FormInput name="email" type="text" label="E-mail" placeholder="example@civie.com" v-model="form.email" />
			</div>
			<div class="payment-form__input">
				<FormInput name="password" type="password" label="Password" placeholder="password" v-model="form.password" />
			</div>
		</div>

		<a class="payment-form__submit" href="#" @click.prevent="$emit('showmodal', 'PaymentSuccessMessage')">Pay</a>
	</form>
</template>

<script>
import FormInput from './FormInput';

export default {
	name: 'stripe-payment-form',

	components: { FormInput },

	data: () => {
		return {
			form: {
				email: '',
				password: ''
			}
		};
	}
};
</script>


<style lang="scss" scoped>
@import './../../scss/variables';

.stripe-payment-form {
	font-family: $poppins;
	padding: 30px 15px;

	.payment-form__title {
		font-weight: 800;
		font-size: 22px;
		line-height: 36px;
		color: #000000;
	}

	.payment-form__inputs {
		.payment-form__input {
			padding-top: 15px;
		}
	}

	.payment-form__submit {
		display: flex;
		align-items: center;
		justify-content: center;
		padding: 18px;
		margin-top: 14px;
		color: #000000;
		font-size: 20px;
		line-height: 30px;
		font-weight: 700;
		background: #df136c;
	}

	@include md {
		padding-top: 40px;
		padding-bottom: 50px;
		max-width: 660px;
		margin-left: auto;
		margin-right: auto;

		.payment-form__title {
			text-align: center;
			font-size: 34px;
			line-height: 60px;
		}

		.payment-form__inputs {
			padding-top: 50px;
			display: grid;
			grid-template-columns: auto auto;
			gap: 25px;
		}

		.payment-form__submit {
			width: 280px;
			margin-left: auto;
			margin-right: auto;
			margin-top: 100px;
		}
	}

	@include lg {
		max-width: 790px;
		padding-bottom: 60px;

		.payment-form__title {
			font-size: 40px;
		}

		.payment-form__inputs {
			padding-top: 70px;
			gap: 30px;
		}

		.payment-form__submit {
			margin-top: 139px;
		}
	}
}
</style>
