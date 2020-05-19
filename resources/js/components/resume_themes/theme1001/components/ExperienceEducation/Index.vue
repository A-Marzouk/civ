<template>
	<div>
		<div class="tab-navigation">
			<button class="tab-item">
				<div class="tab-item__option" :class="{'active': activeTab==='experience'}" @click="activeTab='experience'">
					<div>
						<h3 class="option__title">Experience</h3>
						<div class="option__hint">Where I've worked</div>
					</div>
				</div>
			</button>

			<button class="tab-item">
				<div class="tab-item__option" :class="{'active': activeTab==='education'}" @click="activeTab='education'">
					<div>
						<h3 class="option__title">Education</h3>
						<div class="option__hint">Where I've learned</div>
					</div>
				</div>
			</button>
		</div>

		<Experience v-if="activeTab==='experience'" />
		<Education v-if="activeTab==='education'" />
	</div>
</template>

<script>
import Education from "./../../views/Education";
import Experience from "./../../views/Experience";

export default {
	name: "experience-education",

	data: () => {
		return {
			activeTab: "experience"
		};
	},

	components: { Education, Experience }
};
</script>

<style lang="scss" scoped>
@import "./../../scss/variables";

.tab-navigation {
	display: flex;
	justify-content: space-between;
	font-family: $muli;
}

.tab-item {
	width: 50%;
	padding: 15px 10px;
	max-width: 125px;

	&:focus {
		outline: none;
		background: transparent;
	}
}

.tab-item__option {
	position: relative;
	display: flex;
	flex-direction: column;
	align-items: center;
	padding: 10px 5px;

	&::after {
		content: "";
		width: 100%;
		height: 2px;
		border-radius: 1px;
		background: transparent;
		position: absolute;
		bottom: 0;
		left: 0;
		transition: all 0.3s;
	}

	&.active::after {
		background: #0a4fbc;
	}

	.option__title {
		color: rgba(10, 79, 188, 0.76);
		font-size: 18px;
		line-height: 18px;
		font-weight: 700;
	}

	&.active .option__title {
		color: rgba(10, 79, 188, 1);
	}

	.option__hint {
		color: #bec2d4;
		font-size: 11px;
		font-weight: 300;
		line-height: 13px;
		padding-top: 10px;
	}

	&.active {
		.option__title {
			color: #0a4fbc;
		}

		&::after {
			background: #0a4fbc;
		}
	}
}
</style>
