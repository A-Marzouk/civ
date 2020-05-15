<template>
	<div class="profile__hireme">
		<div class="hireme">
			<div class="hireme-rate">
				<strong>${{ hourlyRate }}</strong>
				<span>Hour rate</span>
			</div>

			<div class="hireme-rate">
				<strong>{{ weeklyAvailability }} Hr</strong>
				<span>Weekly availability</span>
			</div>
		</div>

		<HireMeButton />
	</div>
</template>

<script>
import HireMeButton from "./HireMeButton";

export default {
	name: "profile-hire-me",

	props: {
		hourlyRate: {
			type: Number,
			required: true
		},
		weeklyAvailability: {
			type: Number,
			required: true
		}
	},

	components: { HireMeButton }
};
</script>

<style lang="scss" scoped>
@import "./../../scss/variables";

.profile__hireme {
	font-family: $muli;
	padding-top: 18px;
	display: flex;
}

.profile__hireme .hireme {
	display: flex;
	align-items: center;
	flex: 1;
}

.profile__hireme .hireme-rate {
	display: flex;
	flex-direction: column;
	font-family: $muli;

	&:nth-child(2) {
		padding-left: 15px;
	}

	span {
		font-family: inherit;
		font-size: 8px;
		font-weight: 300;
		color: #ffffff;
	}

	strong {
		font-family: inherit;
		font-size: 15px;
		font-weight: 700;
	}
}

@media (min-width: 375px) {
	.profile__hireme .hireme-rate:nth-child(2) {
		padding-left: 25px;
	}
}

@media (min-width: $sm) {
	.profile__hireme {
		padding-top: 25px;

		.hireme-rate {
			line-height: 22.5px;
			strong {
				font-size: 18px;
			}

			span {
				font-size: 10px;
			}
		}
	}
}
</style>
