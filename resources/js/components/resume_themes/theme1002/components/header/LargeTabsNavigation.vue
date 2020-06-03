<template>
	<nav class="tabs-navigation">
		<div class="tabs-navigation-inner">
			<div class="navigation-wrapper">
				<ul class="navigation">
					<li v-for="(item, i) in items" class="navigation__link" :class="{'active': currentTab === item.tabName}" :key="`i-${i}`">
						<a href="#" @click.prevent="$emit('tabChanged', item.tabName)" v-text="item.label"></a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
</template>

<script>
export default {
	name: "LargeTabsNavigation",

	props: {
		currentTab: {
			type: String,
			required: true
		}
	},

	data() {
		return {
			items: [
				{
					tabName: "portfolio",
					label: "Portfolio",
					icon: "/images/resume_themes/theme1002/icons/portfolio.svg"
				},
				{
					tabName: "work",
					label: "Work",
					icon: "/images/resume_themes/theme1002/icons/work.svg"
				},
				{
					tabName: "skills",
					label: "Skills",
					icon: "/images/resume_themes/theme1002/icons/skills.svg"
				},
				{
					tabName: "education",
					label: "Education",
					icon: "/images/resume_themes/theme1002/icons/education.svg"
				}
			]
		};
	}
};
</script>

<style lang="scss" scoped>
@import "./../../scss/variables";

.tabs-navigation {
	padding-bottom: 45px;

	.tabs-navigation-inner {
		.navigation-wrapper {
			.navigation {
				display: flex;
				align-items: center;
				justify-content: space-around;
				width: 100%;

				.navigation__link {
					a {
						display: flex;
						align-items: center;
						justify-content: center;
						font-family: $nexa-bold;
						font-weight: 700;
						font-size: 28px;
						color: #205de5;
						border: 2px solid transparent;
						transition: border-color 0.3s;
						border-radius: 5px;
						height: 54px;
						width: 178px;

						&:hover {
							background: rgba(232, 239, 247, 0.55);
							text-decoration: none;
						}
					}

					&.active {
						a {
							border-color: #205de5;
						}
					}
				}
			}
		}
	}
}

@media (min-width: $xl) {
	.tabs-navigation {
		padding-bottom: 60px;

		.tabs-navigation-inner {
			.navigation-wrapper {
				.navigation {
					.navigation__link {
						a {
							font-size: 42px;
							height: 74px;
							width: 237px;
						}
					}
				}
			}
		}
	}
}

@media (min-width: $xxl) {
	.tabs-navigation {
		.tabs-navigation-inner {
			.navigation-wrapper {
				.navigation {
					.navigation__link {
						&.active {
						}
					}
				}
			}
		}
	}
}
</style>
