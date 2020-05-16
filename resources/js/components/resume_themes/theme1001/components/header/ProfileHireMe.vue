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
	padding-top: 15px;
	display: flex;
	align-items: center;
}

.hireme {
	display: flex;
	align-items: center;
}

.hireme-rate {
	display: flex;
	flex-direction: column;
	font-family: $muli;
	padding-right: 15px;
}

.hireme-rate span {
	font-family: inherit;
	font-size: 8px;
	line-height: 10px;
	white-space: nowrap;
	color: #d3d6e4;
}

.hireme-rate strong {
	font-family: inherit;
	font-size: 14px;
	line-height: 18px;
	font-weight: 700;
}

@media (min-width: $sm) {
	.profile__hireme {
		padding-top: 25px;
	}

	.hireme-rate {
		padding-right: 25px;
	}

	.hireme-rate strong {
		font-size: 20px;
		line-height: 25px;
	}

	.hireme-rate span {
		font-size: 10px;
		line-height: 13px;
	}
}

@media (min-width: $md) {
	.hireme {
		margin-right: 25px;
	}
}
</style>
