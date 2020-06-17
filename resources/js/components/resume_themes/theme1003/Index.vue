<template>
	<div id="wrapper_theme1003" class="tw-w-full tw-bg-white tw-font-roboto">
		<Header :currentTab="currentTab" :currentUser="currentUser" @tabChanged="currentTab=$event" @showModal="showModal" />

		<TabsContent :currentTab="currentTab" />

		<Modal :isOpen="isModalOpen" @onClose="isModalOpen=false">
			<keep-alive>
				<component @showModal="showModal" :is="currentModal"></component>
			</keep-alive>
		</Modal>
	</div>
</template>

<script>
import Header from "./components/Header";
import TabsContent from "./components/TabsContent";
import Modal from "./components/modals/Modal";
import PaymentMethods from "./components/modals/PaymentMethods";
import PaymentSuccessMessage from "./components/modals/PaymentSuccessMessage";
import PaypalPaymentForm from "./components/modals/PaypalPaymentForm";
import StripePaymentForm from "./components/modals/StripePaymentForm";

export default {
	name: "resume-theme-1003",

	components: {
		Header,
		TabsContent,
		Modal,
		PaymentMethods,
		PaymentSuccessMessage,
		PaypalPaymentForm,
		StripePaymentForm
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
			isPaymentModalOpen: false,
			isPaymentSuccessModalOpen: false,

			currentModal: "PaymentForm",
			isModalOpen: false
		};
	},

	methods: {
		showModal(currentModal) {
			console.log("showModal", currentModal);

			this.isModalOpen = true;
			this.currentModal = currentModal;
		},

		openPaymentModal() {
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
