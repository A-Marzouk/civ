<template>
	<div class="skills-tab tw-px-4 tw-py-6">
		<TabLinks :tabsLabel="tabsLabel" :activeLabel="activeLabel" @activeLabelChanged="changeActiveLabel" />

		<div class="skills-tab__inner tw-pt-8">
			<!-- Programming languages -->
			<template v-if="isLabelActive('Programming languages')">
				<div class="skills-tab__inner--item" v-for="programmingLanguage in skills.programmingLanguages" :key="programmingLanguage.id">
					<ProgressCard :title="programmingLanguage.language" :progress="programmingLanguage.progress">
						<svg width="25" height="24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path fill="#fff" d="M6.75 17c.688 0 1.25.563 1.25 1.25 0 1.375-1.125 2.5-2.5 2.5-.213 0-.412-.025-.625-.063A4.933 4.933 0 005.5 18.25c0-.688.563-1.25 1.25-1.25zM21.337.75a1.28 1.28 0 00-.887.363l-11.2 11.2 3.438 3.437 11.2-11.2a1.245 1.245 0 000-1.762l-1.676-1.675a1.22 1.22 0 00-.875-.363zM6.75 14.5A3.745 3.745 0 003 18.25c0 1.637-1.45 2.5-2.5 2.5 1.15 1.525 3.112 2.5 5 2.5 2.762 0 5-2.238 5-5a3.745 3.745 0 00-3.75-3.75z" />
						</svg>
					</ProgressCard>
				</div>
			</template>

			<!-- Frameworks -->
			<template v-else-if="isLabelActive('Frameworks')">
				<div class="skills-tab__inner--item" v-for="framework in skills.frameworks" :key="framework.id">
					<ProgressCard :title="framework.framework" :progress="framework.progress">
						<svg width="25" height="24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path fill="#fff" d="M6.75 17c.688 0 1.25.563 1.25 1.25 0 1.375-1.125 2.5-2.5 2.5-.213 0-.412-.025-.625-.063A4.933 4.933 0 005.5 18.25c0-.688.563-1.25 1.25-1.25zM21.337.75a1.28 1.28 0 00-.887.363l-11.2 11.2 3.438 3.437 11.2-11.2a1.245 1.245 0 000-1.762l-1.676-1.675a1.22 1.22 0 00-.875-.363zM6.75 14.5A3.745 3.745 0 003 18.25c0 1.637-1.45 2.5-2.5 2.5 1.15 1.525 3.112 2.5 5 2.5 2.762 0 5-2.238 5-5a3.745 3.745 0 00-3.75-3.75z" />
						</svg>
					</ProgressCard>
				</div>
			</template>

			<!-- Design Skills -->
			<template v-else-if="isLabelActive('Design Skills')">
				<div class="skills-tab__inner--item" v-for="designSkill in skills.designSkills" :key="designSkill.id">
					<ProgressCard :title="designSkill.skill" :progress="designSkill.progress">
						<svg width="25" height="24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path fill="#fff" d="M6.75 17c.688 0 1.25.563 1.25 1.25 0 1.375-1.125 2.5-2.5 2.5-.213 0-.412-.025-.625-.063A4.933 4.933 0 005.5 18.25c0-.688.563-1.25 1.25-1.25zM21.337.75a1.28 1.28 0 00-.887.363l-11.2 11.2 3.438 3.437 11.2-11.2a1.245 1.245 0 000-1.762l-1.676-1.675a1.22 1.22 0 00-.875-.363zM6.75 14.5A3.745 3.745 0 003 18.25c0 1.637-1.45 2.5-2.5 2.5 1.15 1.525 3.112 2.5 5 2.5 2.762 0 5-2.238 5-5a3.745 3.745 0 00-3.75-3.75z" />
						</svg>
					</ProgressCard>
				</div>
			</template>

			<!-- Software -->
			<template v-else-if="isLabelActive('Software')">
				<div class="skills-tab__inner--item" v-for="software in skills.softwares" :key="software.id">
					<ProgressCard :title="software.software" :progress="software.progress">
						<svg width="25" height="24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path fill="#fff" d="M6.75 17c.688 0 1.25.563 1.25 1.25 0 1.375-1.125 2.5-2.5 2.5-.213 0-.412-.025-.625-.063A4.933 4.933 0 005.5 18.25c0-.688.563-1.25 1.25-1.25zM21.337.75a1.28 1.28 0 00-.887.363l-11.2 11.2 3.438 3.437 11.2-11.2a1.245 1.245 0 000-1.762l-1.676-1.675a1.22 1.22 0 00-.875-.363zM6.75 14.5A3.745 3.745 0 003 18.25c0 1.637-1.45 2.5-2.5 2.5 1.15 1.525 3.112 2.5 5 2.5 2.762 0 5-2.238 5-5a3.745 3.745 0 00-3.75-3.75z" />
						</svg>
					</ProgressCard>
				</div>
			</template>
		</div>
	</div>
</template>

<script>
import ProgressCard from "./../components/ProgressCard";
import TabLinks from "./../components/skills/TabLinks";

export default {
	name: "skills",

	components: { ProgressCard, TabLinks },

	data: () => {
		return {
			activeLabel: "Programming languages",
			tabsLabel: [
				"Programming languages",
				"Frameworks",
				"Design Skills",
				"Software"
			],
			skills: {
				programmingLanguages: [
					{
						id: 1,
						language: "Flutter",
						progress: 54
					},
					{
						id: 2,
						language: "PHP",
						progress: 64
					},
					{
						id: 3,
						language: "C",
						progress: 45
					},
					{
						id: 4,
						language: "Python",
						progress: 5
					},
					{
						id: 5,
						language: "Javascript",
						progress: 67
					},
					{
						id: 6,
						language: "Java",
						progress: 43
					}
				],
				frameworks: [
					{
						id: 1,
						framework: "Flutter",
						progress: 54
					}
				],
				designSkills: [
					{
						id: 1,
						skill: "UI/UX",
						progress: 65
					},
					{
						id: 2,
						skill: "Material Design",
						progress: 74
					}
				],
				softwares: [
					{
						id: 1,
						software: "Photoshop",
						progress: 43
					},
					{
						id: 2,
						software: "Word 2007",
						progress: 65
					}
				]
			}
		};
	},

	methods: {
		isLabelActive(label) {
			return label.toLowerCase() == this.activeLabel.toLowerCase();
		},

		changeActiveLabel(label) {
			this.activeLabel = label;
		}
	}
};
</script>

<style lang="scss" scoped>
@import "./../scss/variables";

.skills-tab__inner {
	margin-left: -10px;
	margin-right: -10px;
}
.skills-tab__inner--item {
	margin: 10px;
}

@media (min-width: $md) {
	.skills-tab {
		padding-left: 37px;
		padding-right: 37px;
	}

	.skills-tab__inner--item {
		margin-bottom: 20px;
	}
}

@media (min-width: $lg) {
	.skills-tab__inner {
		display: flex;
		flex-wrap: wrap;
		padding-top: 60px;
		padding-left: 0;
		padding-right: 0;
	}

	.skills-tab__inner--item {
		width: calc(33.333333% - 20px);
		margin-bottom: 10px;
	}
}
</style>
