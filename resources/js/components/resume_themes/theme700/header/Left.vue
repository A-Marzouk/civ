<template>
	<v-container fluid pa-0>
		<v-row no-gutters justify-sm="center" justify-lg="start">
			<v-col cols="3" sm="2" lg="2" class="bgavatar">
				<v-img :src="logo" class="avatar"></v-img>
			</v-col>
			<v-col cols="8" sm="9" lg="auto" class="pl-5 pl-sm-0 pl-lg-0" offset="1" align-self="center">
				<div class="head textcol font-weight-bold d-sm-inline-block">
					Carla Pipin Ranga
					<div class="mt-lg-3 d-none d-lg-none d-sm-inline-flex align-sm-center tw-align-middle ml-6">
						<v-btn elevation="0" fab :width="40" :height="40" class="mr-5" color="#EBEBEB">
							<v-img src="/images/resume_themes/theme700/email.svg" contain :width="14" :height="14"></v-img>
						</v-btn>
						<VideoModal />
						<AudioModal />
					</div>
				</div>
				<div class="caption">Web Ui/Ux Designer, Graphiс Designer</div>

				<div class="d-flex align-center mt-lg-3 d-lg-flex align-lg-center d-md-none d-sm-none mt-3">
					<v-btn elevation="0" fab :width="40" :height="40" class="mr-5" color="#EBEBEB">
						<v-img src="/images/resume_themes/theme700/email.svg" contain :width="14" :height="14"></v-img>
					</v-btn>
					<VideoModal />
					<AudioModal />
				</div>
			</v-col>
			<v-col cols="12" sm="8" lg="auto" class="mt-lg-12 mt-sm-0 mt-6">
				<div class="ml-lg-4 ml-sm-0 text-center">
					<v-btn v-for="(s,i) in social" :key="i" elevation="0" fab width="40" height="40" class="mx-3 mx-sm-5 mx-lg-3" color="#EBEBEB">
						<v-img :src="s.src" :width="16" :height="16" contain></v-img>
					</v-btn>
				</div>
			</v-col>
		</v-row>
	</v-container>
</template>
<script>
import VideoModal from "./VideoModal";
import AudioModal from "./AudioModal";

export default {
	components: { VideoModal, AudioModal },

	data() {
		return {
			logo: "/images/resume_themes/theme700/header-icon.png",
			media: [
				{
					src: "/images/resume_themes/theme700/email.svg",
					width: 40,
					imgwd: 14
				},
				{
					src: "/images/resume_themes/theme700/video.svg",
					width: 30,
					imgwd: 12
				},
				{
					src: "/images/resume_themes/theme700/headphones.svg",
					width: 30,
					imgwd: 14
				}
			],
			social: [
				{
					src: "/images/resume_themes/theme700/behance.svg"
				},
				{
					src: "/images/resume_themes/theme700/dribbble.svg"
				},
				{
					src: "/images/resume_themes/theme700/instagram.svg"
				},
				{
					src: "/images/resume_themes/theme700/linkdin.svg"
				},
				{
					src: "/images/resume_themes/theme700/google-plus.svg"
				}
			]
		};
	}
};
</script>
<style lang="scss" scoped>
.textcol {
	color: #513ecd;
}
.bgavatar {
	background-color: #513ecd;
	position: relative;
	height: 180px;
}
.avatar {
	position: absolute;
	left: 8rem;
	top: 1.5rem;
	border-radius: 50%;
	border: 15px solid #fff;
	width: 132px;
	height: 132px;
}
.head {
	font-family: "Montserrat";
	font-style: normal;
	font-weight: bold;
	font-size: 1.5rem;
	line-height: 25px;
}
.subhead {
	font-family: "Montserrat";
	font-style: normal;
	font-weight: 500;
	font-size: 0.6rem;
	line-height: 15px;
}
@media screen and (min-width: 1601px) and (max-width: 2500px) {
	.avatar {
		position: absolute;
		left: 8rem;
		top: 1.5rem;
		border-radius: 50%;
		border: 15px solid #fff;
		width: 132px;
		height: 132px;
	}
}
@media screen and (min-width: 1025px) and (max-width: 1600px) {
	.avatar {
		position: absolute;
		left: 6rem;
		top: 1.5rem;
		border-radius: 50%;
		border: 15px solid #fff;
		width: 132px;
		height: 132px;
	}
}
@media screen and (min-width: 426px) and (max-width: 1024px) {
	.avatar {
		position: absolute;
		left: 4rem;
		top: 1.5rem;
		border-radius: 50%;
		border: 15px solid #fff;
		width: 132px;
		height: 132px;
	}
	.bgavatar {
		background-color: #513ecd;
		position: relative;
		height: 180px;
	}
}

@media screen and (min-width: 320px) and (max-width: 425px) {
	.avatar {
		position: absolute;
		left: 3.5rem;
		top: 1rem;
		border-radius: 50%;
		border: 10px solid #fff;
		width: 98px;
		height: 98px;
	}
	.bgavatar {
		background-color: #513ecd;
		position: relative;
		height: 140px;
	}
}
</style>
