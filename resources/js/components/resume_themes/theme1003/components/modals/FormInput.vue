<template>
	<div class="form-input">
		<label class="tw-font-poppins" :for="_id" v-text="label"></label>
		<input class="tw-font-poppins" :id="_id" :name="name" :type="type" :placeholder="placeholder">
	</div>
</template>

<script>
export default {
	name: "form-input",

	props: {
		id: {
			type: String,
			default: ""
		},
		name: {
			type: String,
			default: ""
		},
		type: {
			validator: value => {
				return (
					[
						"text",
						"email",
						"password",
						"date",
						"tel",
						"date"
					].indexOf(value) !== -1
				);
			},
			default: "text"
		},
		label: {
			type: String,
			default: ""
		},
		placeholder: {
			type: String,
			default: ""
		}
	},

	data: () => {
		return {};
	},

	computed: {
		_id() {
			return this.id ? this.id : this.randomString();
		}
	},

	methods: {
		randomString(len = 8) {
			let text = "";
			let chars = "abcdefghijklmnopqrstuvwxyz";

			for (let i = 0; i < len; i++) {
				text += chars.charAt(Math.floor(Math.random() * chars.length));
			}

			return text;
		}
	}
};
</script>

<style lang="scss" scoped>
.form-input {
	display: flex;
	flex-direction: column;

	label {
		font-size: 16px;
		line-height: 24px;
		color: #000000;
		padding-left: 30px;
	}

	input {
		border: 1px solid #dbdbdb;
		padding: 16px 16px 16px 30px;
		font-size: 16px;
		line-height: 24px;

		&:focus {
			outline: none;
			box-shadow: 0 0 6px -2px rgba(0, 0, 0, 0.25);
		}
	}
}
</style>
