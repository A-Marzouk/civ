<template>
    <div>
        <img :src="activeSlideSrc" alt="portfolio image" @click="openSlider">
        <div class="slider-container" :class="{'opened': project.id === openedProjectID}">
            <div class="slides">
                <div class="main-slide" @touchstart="touchStart" @touchend="touchEnd">
                    <div class="slides-numbers">
                        {{currentImageIndex}} / {{images.length}}
                    </div>
                    <img :src="activeSlideSrc" alt="main slide">
                    <div class="arrow-slide right" @click="changeActiveSlide(1)">❯</div>
                    <div class="arrow-slide left"  @click="changeActiveSlide(-1)">❮</div>
                </div>
            </div>
            <div class="title-bar">
                <div class="title">
                    {{projectTitle}}
                </div>
            </div>
            <div class="previews">
                <div class="single-preview" @click="changeSlide(image,index)" :class="{ 'active' : activeSlide.id === image.id }" v-for="(image, index) in images" :key="image.id">
                    <img :src="image.src" alt="preview">
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ProjectSlider",
        props:['project'],
        data(){
            return{
                activeSlide: {},
                currentImageIndex: 1,
                currentTouchPosition: '',
                openedProjectID: 0
            }
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
            },
            openSlider(){
                this.openedProjectID = this.project.id;
            }
        },
        computed:{
            images(){
              return this.project.images
            },
            projectTitle(){
              return this.project.title;
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

<style lang="scss" scoped>
    
    .slider-container{
        display: none;

        &.opened{
            display: block;
        }

        width: 100%;
        max-width: 1020px;
        border-radius: 15px;
        overflow: hidden;
        .slides{
            .main-slide{
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                width: 100%;
                max-height: 500px;
                overflow: hidden;
                position: relative;

                img{
                    width: 100%;
                }

                .slides-numbers{
                    position: absolute;
                    color: white;
                    font-weight: bold;
                    font-size: 20px;
                    top: 16px;
                    left: 16px;
                    background-color: rgba(0, 0, 0, 0.7);
                    border-radius: 9px;
                    padding: 10px;
                }

                .arrow-slide{
                    cursor: pointer;
                    position: absolute;
                    width: auto;
                    padding: 16px;
                    color: white;
                    font-weight: bold;
                    font-size: 20px;
                    border-radius: 0 9px 9px 0;
                    &:hover{
                        background-color: rgba(0, 0, 0, 0.7);
                    }
                    &.right{
                        right: 0;
                        border-radius: 9px 0 0 9px;
                    }
                    &.left{
                        left: 0;
                    }
                }

            }
        }

        .title-bar{
            background: black;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 60px;
            .title{
                color: white;
                font-size: 20px;
                font-weight: 500;
            }
        }


        .previews{
            border-top: 1px solid;
            display: flex;
            .single-preview{
                border: 1px solid lightgray;
                height: 175px;
                display: flex;
                justify-content: center;
                align-items: center;
                overflow: hidden;
                opacity: 0.4;
                &:hover{
                    cursor: pointer;
                    opacity: 1;
                }
                &.active{
                    opacity: 1;
                }
                img{
                    
                }
            }
        }
    }
    
</style>