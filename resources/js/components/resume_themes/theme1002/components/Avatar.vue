<template>
	<div class="avatar">
		<a href="#">
			<img :src="src">
		</a>

		<a href="#" class="start-chat">
			<svg xmlns="http://www.w3.org/2000/svg" width="31.433" height="28.241" viewBox="0 0 31.433 28.241">
				<path d="M246.614,100a.614.614,0,1,0,.614.614A.614.614,0,0,0,246.614,100Zm0,0" transform="translate(-230.897 -93.861)" fill="#fff" />
				<path d="M80.614,261.228a.614.614,0,1,0-.614-.614A.614.614,0,0,0,80.614,261.228Zm0,0" transform="translate(-75.089 -244.038)" fill="#fff" />
				<path d="M20.628,0C15.1,0,10.565,3.811,10.214,8.611,4.95,8.875,0,12.67,0,17.8a8.579,8.579,0,0,0,2.394,5.871,3.734,3.734,0,0,1-.987,3.518.614.614,0,0,0,.434,1.048,6.772,6.772,0,0,0,4.692-1.9,13.99,13.99,0,0,0,4.271.669c5.526,0,10.062-3.81,10.414-8.609a13.805,13.805,0,0,0,3.68-.655,6.772,6.772,0,0,0,4.692,1.9.614.614,0,0,0,.434-1.048,3.734,3.734,0,0,1-.987-3.518,8.579,8.579,0,0,0,2.394-5.871C31.433,3.875,26.1,0,20.628,0ZM10.805,25.785A12.411,12.411,0,0,1,6.6,25.061a.614.614,0,0,0-.68.156,5.54,5.54,0,0,1-2.755,1.635A4.965,4.965,0,0,0,3.538,23.2a.613.613,0,0,0-.15-.259A7.378,7.378,0,0,1,1.228,17.8c0-4.326,4.386-7.981,9.577-7.981,4.9,0,9.209,3.409,9.209,7.981C20.014,22.2,15.883,25.785,10.805,25.785Zm17.24-11.442a.616.616,0,0,0-.15.259,4.965,4.965,0,0,0,.374,3.654,5.538,5.538,0,0,1-2.755-1.635.614.614,0,0,0-.68-.156,12.094,12.094,0,0,1-3.617.709A8.788,8.788,0,0,0,17.9,11.051h8.008a.614.614,0,1,0,0-1.228H16.014a11.45,11.45,0,0,0-4.569-1.21c.353-4.123,4.337-7.385,9.183-7.385,5.192,0,9.577,3.655,9.577,7.981A7.378,7.378,0,0,1,28.045,14.343Zm0,0" fill="#fff" />
				<path d="M128.349,260h-7.736a.614.614,0,1,0,0,1.228h7.736a.614.614,0,1,0,0-1.228Zm0,0" transform="translate(-112.633 -244.038)" fill="#fff" />
				<path d="M90.805,320H80.614a.614.614,0,1,0,0,1.228H90.805a.614.614,0,0,0,0-1.228Zm0,0" transform="translate(-75.089 -300.354)" fill="#fff" />
				<path d="M294.349,100h-7.736a.614.614,0,0,0,0,1.228h7.736a.614.614,0,1,0,0-1.228Zm0,0" transform="translate(-268.442 -93.861)" fill="#fff" />
			</svg>
		</a>
	</div>
</template>

<script>
export default {
	name: "avatar",

	props: {
		src: {
			type: String,
			required: true
		}
	}
};
</script>

<style lang="scss" scoped>
@import "./../scss/variables";

.avatar {
	position: relative;

	a {
		display: flex;
		align-items: center;
		justify-content: center;
		width: 113px;
		height: 113px;
		border-radius: 9999px;
		overflow: hidden;
		background: rgba(232, 239, 247, 0.55);
		border: 1px solid #186aa5;

		img {
			width: 61px;
			height: 61px;
			object-fit: cover;
		}
	}

	.start-chat {
		display: flex;
		align-items: center;
		justify-content: center;
		background: #205de5;
		border: 1px solid #205de5;
		width: 40px;
		height: 40px;
		border-radius: 100px;
		position: absolute;
		bottom: 0;
		right: 0;
		transition: all 0.3s;

		svg {
			width: 24.33px;
			height: 21.85px;
		}

		&:hover {
			background: #f8fafe;

			svg path {
				fill: #205de5;
			}
		}
	}
}
</style>
