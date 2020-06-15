<template>
	<div class="my-account-dropdown">
		<a href="#" class="account-avatar" @click.prevent="show = !show" :class="{'active' : isActive}" :style="`background-image: url(${avatar});`"></a>

		<div class="custom-drop-down" :class="{'show' :show, 'openMenu': openMenu}">
			<div class="drop-down-item">
				<router-link id='myAccount' data-target="myAccount" @click.native="onItemClick('tabChanged')" to="/resume-builder">
					Account Settings
				</router-link>
			</div>

			<hr>

			<div class="drop-down-item">
				<a href="javascript:void(0)" @click="onItemClick('loggedOut')" class="sign-out">
					Sign Out
				</a>
			</div>
		</div>
	</div>
</template>

<script>
export default {
	name: "my-account-dropdown",

	props: {
		avatar: {
			type: String,
			default: "/images/resume_builder/profile/holder.png"
		},

		isActive: {
			type: Boolean,
			default: false
		},

		openMenu: {
			type: Boolean,
			default: false
		}
	},

	data() {
		return {
			show: false
		};
	},

	methods: {
		onItemClick(eventName) {
			this.show = false;
			this.$emit(eventName);
		}
	}
};
</script>

<style lang="scss" scoped>
@import "../../../../../sass/media-queries";

.my-account-dropdown {
	position: relative;

	.account-avatar {
		background-color: #e6e8fc;
		background-size: cover;
		background-repeat: no-repeat;
		background-position: center;
		display: block;
		width: 50px;
		height: 50px;
		overflow: hidden;
		border-radius: 100px;

		&.active {
		}
	}

	.custom-drop-down {
		display: none;
		font-family: Noto Sans, "sans-serif";
		background: white;
		white-space: nowrap;
		position: absolute;
		top: 60px;
		right: 0;
		z-index: 20;
		padding: 15px;
		border-radius: 3px;
		border: 1px solid #f4f7fa;
		box-shadow: 0 1px 4px -4px rgba(0, 0, 0, 0.32),
			0 -1px 4px -4px rgba(0, 0, 0, 0.32);

		&.show.openMenu {
			display: block;
		}

		&::before {
			content: "";
			position: absolute;
			top: -7px;
			right: 18px;
			width: 0;
			height: 0;
			border-bottom: solid 7px #f1f1f2;
			border-left: solid 7px transparent;
			border-right: solid 7px transparent;
		}

		.drop-down-item {
			a {
				display: block;
				color: #a0aec0;
				font-size: 16px;
				line-height: 24px;
				padding: 15px 10px;

				&:hover {
					text-decoration: none;
					color: #888db1;
				}
			}

			hr {
				background: #888db1;
			}
		}
	}

	@include gt-xs {
		.custom-drop-down {
			&.show {
				display: block;
			}
		}
	}
}
</style>
