<template>
	<div id="wrapper_theme1003" class="tw-w-full tw-bg-white tw-font-roboto">
		<Header :currentTab="$data._currentTab" :currentUser="currentUser" @tabchanged="$data._currentTab = $event" @showModal="showModal" />

		<TabsContent :currentTab="$data._currentTab" :currentUser="currentUser" />

		<Modal :isOpen="isModalOpen" @onClose="isModalOpen = false">
			<keep-alive>
				<component @showModal="showModal" :is="currentModal"></component>
			</keep-alive>
		</Modal>
	</div>
</template>

<script>
import Header from './components/Header';
import TabsContent from './components/TabsContent';
import Modal from './components/modals/Modal';
import PaymentMethods from './components/modals/PaymentMethods';
import PaymentSuccessMessage from './components/modals/PaymentSuccessMessage';
import PaypalPaymentForm from './components/modals/PaypalPaymentForm';
import StripePaymentForm from './components/modals/StripePaymentForm';

export default {
	name: 'resume-theme-1003',

	props: ['user', 'is_preview', 'currentTab'],

	components: {
		Header,
		TabsContent,
		Modal,
		PaymentMethods,
		PaymentSuccessMessage,
		PaypalPaymentForm,
		StripePaymentForm
	},

	data() {
		return {
			_currentTab: this.currentTab,
			currentUser: this.user,
			isPaymentModalOpen: false,
			isPaymentSuccessModalOpen: false,

			currentModal: 'PaymentForm',
			isModalOpen: false
		};
	},

	methods: {
		showModal(currentModal) {
			console.log('showModal', currentModal);

			this.isModalOpen = true;
			this.currentModal = currentModal;
		},

		openPaymentModal() {
			this.isPaymentModalOpen = true;
		},

		openPaymentSuccessModal() {
			this.isPaymentModalOpen = false;
			this.isPaymentSuccessModalOpen = true;
		},

		setDummyUser() {
			this.currentUser = this.$store.state.dummyUser;
		}
	},
	created() {
		if (!this.currentUser || this.is_preview) {
			this.setDummyUser();
		}

		if (!this.$data._currentTab) {
			this.$data._currentTab = this.currentUser.tabs.length ? this.currentUser.tabs[0].title : 'portfolio';
		}
	}
};
</script>

<style lang="scss" scoped></style>
