<template>
	<div class="header">
		<div class="tw-flex tw-items-center tw-px-3 tw-py-4 md:tw-hidden">
			<div @click="isSidebarOpen=true">
				<img class="tw-w-12 tw-h-12 tw-rounded-lg" :src="currentUser.avatar" />
			</div>
			<h3 class="tw-font-bold tw-text-white tw-leading-snug tw-pl-6">
				{{ currentUser.fullname }}
			</h3>
		</div>
		<div class="tw-hidden tw-mx-auto tw-max-w-4xl md:tw-block">
			<div class="tw-flex tw-justify-between tw-pt-30px tw-px-30px">
				<div class="tw-pl-22px tw-pt-30px">
					<img class="tw-w-125px tw-h-125px tw-rounded-lg" :src="currentUser.avatar" />
				</div>
				<div class="tw-flex-1 tw-pl-63px">
					<h3 class="tw-font-open-sans tw-font-bold tw-text-4xl tw-text-white tw-leading-snug" v-text="currentUser.fullname"></h3>
					<h4 class="tw-font-poppins tw-font-bold tw-text-base tw-leading-24px tw-text-white tw-pt-10px" v-text="currentUser.jobTitleDescription"></h4>
					<div class="tw-font-poppins tw-text-xs tw-leading-18px tw-text-white tw-pt-15px tw-max-w-sm" v-html="getShortString(currentUser.motivationLetter)"></div>
					<div class="tw-font-poppins tw-flex tw-pt-5">
						<div class="tw-uppercase tw-text-14px tw-leading-21px text-semi-white">Hour rate <strong class="tw-text-white tw-text-xl tw-ml-15px">${{ currentUser.hourRate }}</strong></div>
						<div class="tw-uppercase tw-text-14px tw-leading-21px text-semi-white tw-ml-20px">Weekly availability <strong class="tw-text-white tw-text-xl tw-ml-15px">${{ currentUser.weeklyAvailability }}</strong></div>
					</div>

					<!-- social media links -->
					<div class="tw-flex tw-pt-30px tw-pb-50px">
						<!-- Hire Me link -->
						<a href="#" class="tw-flex tw-items-center tw-justify-center tw-font-poppins tw-h-60px tw-px-53px tw-font-bold tw-bg-white tw-text-14px tw-leading-21px hire-btn tw-rounded-3px">
							<svg width="20" height="16" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path fill="#FFB400" d="M20 2c0-1.1-.9-2-2-2H2C.9 0 0 .9 0 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V2zm-2 0l-8 5-8-5h16zm0 12H2V4l8 5 8-5v10z" />
							</svg>
							<span class="tw-pl-5 tw-text-xl tw-leading-30px">Hire me</span>
						</a>

						<!-- Twitter icon -->
						<a href="#" class="tw-flex tw-items-center tw-justify-center tw-w-60px tw-h-60px tw-bg-white tw-rounded-3px tw-ml-5">
							<svg width="24" height="20" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path fill="#43A8BE" d="M21.533 5.112c.015.213.015.426.015.64 0 6.502-4.949 13.994-13.995 13.994A13.9 13.9 0 010 17.538c.396.046.777.06 1.188.06a9.85 9.85 0 006.106-2.1 4.927 4.927 0 01-4.599-3.412c.305.046.61.076.93.076.441 0 .883-.06 1.294-.167A4.92 4.92 0 01.975 7.167v-.06a4.954 4.954 0 002.223.624 4.915 4.915 0 01-2.193-4.097c0-.913.244-1.75.67-2.482A13.981 13.981 0 0011.817 6.3a5.554 5.554 0 01-.122-1.126 4.917 4.917 0 014.92-4.92c1.415 0 2.695.595 3.593 1.554A9.684 9.684 0 0023.33.62a4.906 4.906 0 01-2.163 2.71A9.86 9.86 0 0024 2.57a10.572 10.572 0 01-2.467 2.543z" />
							</svg>
						</a>

						<!-- Facebook icon -->
						<a href="#" class="tw-flex tw-items-center tw-justify-center tw-w-60px tw-h-60px tw-bg-white tw-rounded-3px tw-ml-5">
							<svg width="13" height="24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path fill="#434FBE" d="M10.116 3.984h2.259V.17C11.985.117 10.645 0 9.085 0c-3.258 0-5.49 1.988-5.49 5.64V9H0v4.266h3.595V24h4.407V13.266h3.45L12 9H8.002V6.06c0-1.232.342-2.076 2.114-2.076z" />
							</svg>
						</a>

						<!-- Instagram icon -->
						<a href="#" class="tw-flex tw-items-center tw-justify-center tw-w-60px tw-h-60px tw-bg-white tw-rounded-3px tw-ml-5">
							<svg width="21" height="22" viewBox="0 0 21 22" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path fill="#F40FED" d="M10.5046 5.60916C7.52338 5.60916 5.11869 8.01384 5.11869 10.9951C5.11869 13.9763 7.52338 16.381 10.5046 16.381C13.4859 16.381 15.8906 13.9763 15.8906 10.9951C15.8906 8.01384 13.4859 5.60916 10.5046 5.60916ZM10.5046 14.4967C8.57807 14.4967 7.00307 12.9263 7.00307 10.9951C7.00307 9.06384 8.57338 7.49353 10.5046 7.49353C12.4359 7.49353 14.0062 9.06384 14.0062 10.9951C14.0062 12.9263 12.4312 14.4967 10.5046 14.4967ZM17.3671 5.38884C17.3671 6.08728 16.8046 6.64509 16.1109 6.64509C15.4124 6.64509 14.8546 6.08259 14.8546 5.38884C14.8546 4.69509 15.4171 4.13259 16.1109 4.13259C16.8046 4.13259 17.3671 4.69509 17.3671 5.38884ZM20.9343 6.66384C20.8546 4.98103 20.4703 3.49041 19.2374 2.26228C18.0093 1.03416 16.5187 0.64978 14.8359 0.565405C13.1015 0.466968 7.90307 0.466968 6.1687 0.565405C4.49057 0.645093 2.99995 1.02947 1.76713 2.25759C0.53432 3.48572 0.154633 4.97634 0.0702576 6.65915C-0.0281799 8.39353 -0.0281799 13.592 0.0702576 15.3263C0.149945 17.0092 0.53432 18.4998 1.76713 19.7279C2.99995 20.956 4.48588 21.3404 6.1687 21.4248C7.90307 21.5232 13.1015 21.5232 14.8359 21.4248C16.5187 21.3451 18.0093 20.9607 19.2374 19.7279C20.4656 18.4998 20.8499 17.0092 20.9343 15.3263C21.0328 13.592 21.0328 8.39822 20.9343 6.66384ZM18.6937 17.1873C18.3281 18.106 17.6203 18.8138 16.6968 19.1842C15.314 19.7326 12.0328 19.606 10.5046 19.606C8.97651 19.606 5.69057 19.7279 4.31244 19.1842C3.39369 18.8185 2.68588 18.1107 2.31557 17.1873C1.76713 15.8045 1.8937 12.5232 1.8937 10.9951C1.8937 9.46697 1.77182 6.18103 2.31557 4.80291C2.6812 3.88416 3.38901 3.17634 4.31244 2.80603C5.69526 2.25759 8.97651 2.38416 10.5046 2.38416C12.0328 2.38416 15.3187 2.26228 16.6968 2.80603C17.6156 3.17166 18.3234 3.87947 18.6937 4.80291C19.2421 6.18572 19.1156 9.46697 19.1156 10.9951C19.1156 12.5232 19.2421 15.8092 18.6937 17.1873Z" />
							</svg>

						</a>
					</div>
				</div>
			</div>
		</div>

		<TabsNavigation :currentTab="currentTab" @tabChanged="$emit('tabChanged', $event)" />
		<Sidebar :isOpen="isSidebarOpen" :currentUser="currentUser" @onClose="isSidebarOpen=false" />
	</div>
</template>

<script>
import TabsNavigation from "./header/TabsNavigation";
import Sidebar from "./Sidebar";

export default {
	name: "Header",

	props: {
		currentTab: {
			type: String,
			required: true
		}
	},

	components: { TabsNavigation, Sidebar },

	data: () => {
		return {
			currentUser: {
				avatar: "/images/resume_themes/theme1000/avatar.png",
				fullname: "Hean Prinsloo",
				jobTitle: "Graphic Designer",
				jobTitleDescription: "UXUI  Designer and Frontend",
				motivationLetter:
					"Donec a augue gravida, vulputate ligula et, pellentesque arcu. Morbi feugiat eros nec sem ultrices, et venenatis velit posuere. Donec bibendum commodo dui, eget sollicitudin urna sagittis non. Donec ac commodo tortor a augue gravida, vulputate ligula et, pellentesque arcu.",
				hourRate: 20,
				weeklyAvailability: 250
			},
			isSidebarOpen: false
		};
	},

	methods: {
		getShortString(str, length = 98) {
			let substr = str.substr(0, length);

			if (length < str.length) {
				substr +=
					"<span class='tw-text-lg tw-text-indigo-500'>...</span>";
			}

			return substr;
		}
	}
};
</script>

<style lang="scss" scoped>
.header {
	background: linear-gradient(180deg, #012e84 0%, #012166 100%);
	box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.15);
}

.text-semi-white {
	color: rgba(255, 255, 255, 0.5);
}

.hire-btn {
	color: #ffb400;
}

@media (min-width: 768px) {
	.header {
		box-shadow: 0px 10px 6px rgba(0, 0, 0, 0.15);
	}
}
</style>
