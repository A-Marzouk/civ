<template>
    <div>
        <img :src="images[0].src" alt="portfolio image" @click="modalOpened = true" class="project-main-image">

        <div class="slider-container-modal" :class="{'opened' : modalOpened}">
            <div class="slides-body">
                <VueSlickCarousel :arrows="true" :dots="false">
                    <div v-for="(image,index) in images" :key="index" class="image-container">
                        <img class="slider-image" :src="image.src" alt="image">
                    </div>
                </VueSlickCarousel>
                <div class="exit-btn">
                    <a href="javascript:void(0)" @click="modalOpened = false">x</a>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    import VueSlickCarousel from 'vue-slick-carousel'
    import 'vue-slick-carousel/dist/vue-slick-carousel.css'
    import 'vue-slick-carousel/dist/vue-slick-carousel-theme.css'
    export default {
        name: "ProjectSlider",
        props:['project'],
        components: { VueSlickCarousel },
        data(){
            return{
                modalOpened: false,
                activeSlide: {},
                currentImageIndex: 1,
                currentTouchPosition: ''
            };
        },
        methods:{
            changeActiveSlide(n){
                let newSlide = {} ;
                this.images.forEach( (image, index) => {
                    if(image.id === this.activeSlide.id){
                        newSlide = this.images[index+n];
                    }
                });
                if(newSlide){
                    this.currentImageIndex += n;
                    this.activeSlide = newSlide;
                }
            },
            changeSlide(image, index){
                this.activeSlide = image;
                this.currentImageIndex = index+1;
            },
            touchStart(e){
                this.currentTouchPosition = e.changedTouches[0].clientX;
            },
            touchEnd(e){
                if(e.changedTouches[0].clientX - this.currentTouchPosition < -60){
                    this.changeActiveSlide(1);
                }
                if(e.changedTouches[0].clientX - this.currentTouchPosition > 60){
                    this.changeActiveSlide(-1);
                }
            }
        },
        computed:{
            images(){
                return this.project.images
            },
            activeSlideSrc:{
                get() {
                    return this.activeSlide.src;
                },
                set(image) {
                    this.activeSlide = image;
                }
            }
        },
        mounted() {
            this.activeSlide = this.images[0]
        }

    }
</script>

<style lang="scss">

    .slider-container-modal {
        &.opened {
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.7);

            .slides-body {
                left: calc(50% - 70% / 2);
            }
        }

        transition: all 1s;

        .slides-body {
            font-family: SFMono-Regular, sans-serif;
            z-index: 999999;
            width: 70%;
            border-radius: 20px;
            position: fixed;
            left: -1650px;
            top: 150px;
            transition: all 1s;
            max-height: 600px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);

            .image-container{
                max-height: 75vh;
                border-radius: 25px;
                overflow: hidden;
                .slider-image{
                    padding: 5px;
                    width: 100% !important;
                    height: auto !important;
                }
            }
        }

        .exit-btn{
            position: absolute;
            top: -43px;
            background-color: rgba(0, 0, 0, 0.5);
            border-radius: 50%;
            right: 0;

            a{
                text-decoration: none;
                color: white;
                font-size: 18px;
                font-weight: 600;
                width: 40px;
                height: 40px;
                display: flex;
                align-items: center;
                justify-content: center;
            }
        }

    }

    @media screen and (max-width: 800px){
        .slider-container-modal {
            &.opened {
                position: fixed;
                .slides-body {
                    left: calc(50% - 95% / 2);
                }
            }

            .slides-body {
                width: 95%;
            }
        }
    }
    
</style>