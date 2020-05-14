<template>
	<div id="wrapper_theme1000" class="tw-w-full tw-bg-white tw-font-roboto">
		<Header :currentTab="currentTab" :currentUser="currentUser" @tabChanged="currentTab=$event" @openSidebar="isSidebarOpen=true" @openPaymentModal="openPaymentModal" />

		<Sidebar :isOpen="isSidebarOpen" :currentUser="currentUser" @onClose="isSidebarOpen=false" @openPaymentModal="openPaymentModal" />

		<TabsContent :currentTab="currentTab" />

		<Modal :isOpen="isPaymentModalOpen" @onClose="isPaymentModalOpen=false">
			<PaymentForm @openPaymentSuccessModal="openPaymentSuccessModal" />
		</Modal>

		<Modal :isOpen="isPaymentSuccessModalOpen" @onClose="isPaymentSuccessModalOpen=false">
			<PaymentSuccessMessage />
		</Modal>
	</div>
</template>

<script>
import Header from "./components/Header";
import TabsContent from "./components/TabsContent";
import Sidebar from "./components/Sidebar";
import Modal from "./components/Modal";
import PaymentForm from "./components/PaymentForm";
import PaymentSuccessMessage from "./components/PaymentSuccessMessage";

export default {
	name: "resume-theme-1000",

	components: {
		Header,
		TabsContent,
		Sidebar,
		Modal,
		PaymentForm,
		PaymentSuccessMessage
	},

	data: () => {
		return {
			currentTab: "portfolio",
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
			isSidebarOpen: false,
			isPaymentModalOpen: true,
			isPaymentSuccessModalOpen: false
		};
	},

	methods: {
		openPaymentModal() {
			if (this.isSidebarOpen) this.isSidebarOpen = false;
			this.isPaymentModalOpen = true;
		},

		openPaymentSuccessModal() {
			this.isPaymentModalOpen = false;
			this.isPaymentSuccessModalOpen = true;
		}
	}
};
</script>

<style lang="scss" scoped>
</style>
