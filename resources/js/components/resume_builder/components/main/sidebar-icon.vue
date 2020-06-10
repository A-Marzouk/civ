<template>
	<svg :width="activeIcon.width" :height="activeIcon.height" fill="none" :viewBox="activeIcon.viewBox" xmlns="http://www.w3.org/2000/svg" v-html="activeIcon.content"></svg>
</template>
<script>
export default {
	name: "sidebar-icon",

	props: {
		icon: {
			type: String,
			validator: function(value) {
				return [
					"profile",
					"links",
					"work-experience",
					"education",
					"skills",
					"portfolios",
					"audio-video",
					"hobbies",
					"achievement",
					"imports",
					"references",
					"pay-availability"
				].includes(value);
			}
		}
	},

	data() {
		return {
			activeIcon: {
				width: 0,
				height: 0,
				viewBox: "0 0 0 0",
				content: ""
			},

			availableIcons: {
				profile: {
					content: `<path d="M20 21V19C20 17.9391 19.5786 16.9217 18.8284 16.1716C18.0783 15.4214 17.0609 15 16 15H8C6.93913 15 5.92172 15.4214 5.17157 16.1716C4.42143 16.9217 4 17.9391 4 19V21" stroke="#888DB1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M12 11C14.2091 11 16 9.20914 16 7C16 4.79086 14.2091 3 12 3C9.79086 3 8 4.79086 8 7C8 9.20914 9.79086 11 12 11Z" stroke="#888DB1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>`,
					viewBox: "0 0 24 24",
					width: 24,
					height: 24
				},
				links: {
					content: `<path d="M10 13C10.4295 13.5741 10.9774 14.0491 11.6065 14.3929C12.2357 14.7367 12.9315 14.9411 13.6466 14.9923C14.3618 15.0435 15.0796 14.9403 15.7513 14.6897C16.4231 14.4392 17.0331 14.047 17.54 13.54L20.54 10.54C21.4508 9.59695 21.9548 8.33394 21.9434 7.02296C21.932 5.71198 21.4061 4.45791 20.4791 3.53087C19.5521 2.60383 18.298 2.07799 16.987 2.0666C15.676 2.0552 14.413 2.55918 13.47 3.46997L11.75 5.17997" stroke="#888DB1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M14.0002 11C13.5707 10.4259 13.0228 9.9508 12.3937 9.60704C11.7645 9.26328 11.0687 9.05886 10.3535 9.00765C9.63841 8.95643 8.92061 9.05961 8.24885 9.3102C7.5771 9.56079 6.96709 9.95291 6.4602 10.46L3.4602 13.46C2.54941 14.403 2.04544 15.666 2.05683 16.977C2.06822 18.288 2.59407 19.542 3.52111 20.4691C4.44815 21.3961 5.70221 21.922 7.01319 21.9334C8.32418 21.9447 9.58719 21.4408 10.5302 20.53L12.2402 18.82" stroke="#888DB1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>`,
					viewBox: "0 0 24 24",
					width: 24,
					height: 24
				},
				workExperience: {
					content: `<path d="M20 7H4C2.89543 7 2 7.89543 2 9V19C2 20.1046 2.89543 21 4 21H20C21.1046 21 22 20.1046 22 19V9C22 7.89543 21.1046 7 20 7Z" stroke="#888DB1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M16 21V5C16 4.46957 15.7893 3.96086 15.4142 3.58579C15.0391 3.21071 14.5304 3 14 3H10C9.46957 3 8.96086 3.21071 8.58579 3.58579C8.21071 3.96086 8 4.46957 8 5V21" stroke="#888DB1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>`,
					viewBox: "0 0 24 24",
					width: 24,
					height: 24
				},
				education: {
					content: `<path d="M12 15C15.866 15 19 11.866 19 8C19 4.13401 15.866 1 12 1C8.13401 1 5 4.13401 5 8C5 11.866 8.13401 15 12 15Z" stroke="#888DB1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M8.21 13.8899L7 22.9999L12 19.9999L17 22.9999L15.79 13.8799" stroke="#888DB1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>`,
					viewBox: "0 0 24 24",
					width: 24,
					height: 24
				},
				skills: {
					content: `<path d="M12 19L19 12L22 15L15 22L12 19Z" stroke="#888DB1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M18 13L16.5 5.5L2 2L5.5 16.5L13 18L18 13Z" stroke="#888DB1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M2 2L9.586 9.586" stroke="#888DB1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M11 13C12.1046 13 13 12.1046 13 11C13 9.89543 12.1046 9 11 9C9.89543 9 9 9.89543 9 11C9 12.1046 9.89543 13 11 13Z" stroke="#888DB1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>`,
					viewBox: "0 0 24 24",
					width: 24,
					height: 24
				},
				portfolios: {
					content: `<path d="M17 1H3C1.89543 1 1 1.89543 1 3V17C1 18.1046 1.89543 19 3 19H17C18.1046 19 19 18.1046 19 17V3C19 1.89543 18.1046 1 17 1Z" stroke="#888DB1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M6.5 8C7.32843 8 8 7.32843 8 6.5C8 5.67157 7.32843 5 6.5 5C5.67157 5 5 5.67157 5 6.5C5 7.32843 5.67157 8 6.5 8Z" stroke="#888DB1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M19 13L14 8L3 19" stroke="#888DB1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>`,
					viewBox: "0 0 24 24",
					width: 24,
					height: 24
				},
				audioVideo: {
					content: `<path d="M18.82 1H3.18C1.97602 1 1 1.97602 1 3.18V18.82C1 20.024 1.97602 21 3.18 21H18.82C20.024 21 21 20.024 21 18.82V3.18C21 1.97602 20.024 1 18.82 1Z" stroke="#888DB1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M6 1V21" stroke="#888DB1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M16 1V21" stroke="#888DB1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M1 11H21" stroke="#888DB1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M1 6H6" stroke="#888DB1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M1 16H6" stroke="#888DB1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M16 16H21" stroke="#888DB1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M16 6H21" stroke="#888DB1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>`,
					viewBox: "0 0 24 24",
					width: 24,
					height: 24
				},
				hobbies: {
					content: `<path d="M11 21C16.5228 21 21 16.5228 21 11C21 5.47715 16.5228 1 11 1C5.47715 1 1 5.47715 1 11C1 16.5228 5.47715 21 11 21Z" stroke="#888DB1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M13.3101 7L19.0501 16.94" stroke="#888DB1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M8.68994 7H20.1699" stroke="#888DB1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M6.37988 11.0001L12.1199 1.06006" stroke="#888DB1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M8.6902 15.0001L2.9502 5.06006" stroke="#888DB1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M13.3101 15H1.83008" stroke="#888DB1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M15.6199 11L9.87988 20.94" stroke="#888DB1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>`,
					viewBox: "0 0 24 24",
					width: 24,
					height: 24
				},
				achievement: {
					content: `<path d="M21 15.9999V7.9999C20.9996 7.64918 20.9071 7.30471 20.7315 7.00106C20.556 6.69742 20.3037 6.44526 20 6.2699L13 2.2699C12.696 2.09437 12.3511 2.00195 12 2.00195C11.6489 2.00195 11.304 2.09437 11 2.2699L4 6.2699C3.69626 6.44526 3.44398 6.69742 3.26846 7.00106C3.09294 7.30471 3.00036 7.64918 3 7.9999V15.9999C3.00036 16.3506 3.09294 16.6951 3.26846 16.9987C3.44398 17.3024 3.69626 17.5545 4 17.7299L11 21.7299C11.304 21.9054 11.6489 21.9979 12 21.9979C12.3511 21.9979 12.696 21.9054 13 21.7299L20 17.7299C20.3037 17.5545 20.556 17.3024 20.7315 16.9987C20.9071 16.6951 20.9996 16.3506 21 15.9999Z" stroke="#888DB1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M7.5 4.20996L12 6.80996L16.5 4.20996" stroke="#888DB1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M7.5 19.79V14.6L3 12" stroke="#888DB1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M21 12L16.5 14.6V19.79" stroke="#888DB1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M3.27002 6.95996L12 12.01L20.73 6.95996" stroke="#888DB1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M12 22.08V12" stroke="#888DB1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>`,
					viewBox: "0 0 24 24",
					width: 24,
					height: 24
				},
				imports: {
					content: `<path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="#888DB1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M16 12L12 8L8 12" stroke="#888DB1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M12 16V8" stroke="#888DB1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>`,
					viewBox: "0 0 24 24",
					width: 24,
					height: 24
				},
				references: {
					content: `<path d="M17 21V19C17 17.9391 16.5786 16.9217 15.8284 16.1716C15.0783 15.4214 14.0609 15 13 15H5C3.93913 15 2.92172 15.4214 2.17157 16.1716C1.42143 16.9217 1 17.9391 1 19V21" stroke="#888DB1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M9 11C11.2091 11 13 9.20914 13 7C13 4.79086 11.2091 3 9 3C6.79086 3 5 4.79086 5 7C5 9.20914 6.79086 11 9 11Z" stroke="#888DB1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M23 20.9999V18.9999C22.9993 18.1136 22.7044 17.2527 22.1614 16.5522C21.6184 15.8517 20.8581 15.3515 20 15.1299" stroke="#888DB1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M16 3.12988C16.8604 3.35018 17.623 3.85058 18.1676 4.55219C18.7122 5.2538 19.0078 6.11671 19.0078 7.00488C19.0078 7.89305 18.7122 8.75596 18.1676 9.45757C17.623 10.1592 16.8604 10.6596 16 10.8799" stroke="#888DB1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>`,
					viewBox: "0 0 24 24",
					width: 24,
					height: 24
				},

				payAvailability: {
					content: `<path d="M21 4H3C1.89543 4 1 4.89543 1 6V18C1 19.1046 1.89543 20 3 20H21C22.1046 20 23 19.1046 23 18V6C23 4.89543 22.1046 4 21 4Z" stroke="#888DB1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M1 10H23" stroke="#888DB1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>`,
					viewBox: "0 0 24 24",
					width: 24,
					height: 24
				}
			}
		};
	},

	methods: {
		snakeToCamel(str) {
			return str.replace(/([-_][a-z])/g, group => {
				return group
					.toUpperCase()
					.replace("-", "")
					.replace("_", "");
			});
		}
	},

	created() {
		this.activeIcon = this.availableIcons[this.snakeToCamel(this.icon)];
	}
};
</script>

<style lang="scss" scoped>
</style>
