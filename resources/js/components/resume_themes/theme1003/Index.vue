<template>
	<div id="wrapper_theme1003" class="tw-w-full tw-bg-white tw-font-roboto">
		<Header :currentTab="currentTab" :currentUser="currentUser" @tabChanged="currentTab=$event" @openSidebar="isSidebarOpen=true" @openPaymentModal="openPaymentModal" />

		<Sidebar :isOpen="isSidebarOpen" :currentUser="currentUser" @onClose="isSidebarOpen=false" @openPaymentModal="openPaymentModal" />

		<!-- <TabsContent :currentTab="currentTab" /> -->

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
	name: "resume-theme-1003",

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
				avatar: "/images/resume_themes/theme1003/avatar.png",
				fullname: "Lorem campbell",
				jobTitle: "BackEnd Developer",
				motivationLetter:
					"Donec a augue gravida, vulputate ligula et, pellentesque arcu. Morbi feugiat eros nec sem ultrices.🚲",
				hourRate: 20,
				weeklyAvailability: 250
			},
			isSidebarOpen: false,
			isPaymentModalOpen: false,
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
