<template>
    <div>
        <v-dialog
                v-model="slidesDialog"
                width="1200"
        >
            <template v-slot:activator="{ on, attrs }">
                <a v-bind="attrs" v-on="on">
                    <slot></slot>
                </a>
            </template>

            <div class="imagesModalCarousel">
                <slick-slides :options="slickOptions" ref="slick">
                    <div v-for="image in images" :key="image.id">
                        <div class="image-row">
                            <img :src="image.src.replace('400x300','1200x800')" alt="project image" @load="loaded(image.id)">
                            <div class="loading-text" v-show=" ! loadedImages.includes(image.id)">
                                Loading Image...
                            </div>
                        </div>
                    </div>
                </slick-slides>

                <div class="controllers"v-if="images.length > 1">
                    <a class="mr-3" @click="prev" href="javascript:void(0)">
                        <img src="/icons/slide-arrow.svg" alt="slide arrow">
                    </a>
                    <a @click="next" href="javascript:void(0)">
                        <img src="/icons/slide-arrow.svg" style="transform: rotate(-180deg);" alt="slide arrow">
                    </a>
                </div>

            </div>

        </v-dialog>
    </div>
</template>

<script>
    import Slick from "vue-slick";
    export default {
        name: "ImagesCarouselModal",
        components:{'slick-slides' : Slick},
        props:['images'],
        data(){
            return{
                slidesDialog: false,
                slickOptions: {
                    dots: false,
                    arrows: false
                },
                loadedImages:[]
            }
        },
        methods:{
            next() {
                this.$refs.slick.next();
            },

            prev() {
                this.$refs.slick.prev();
            },
            loaded(image_id){
                this.loadedImages.push(image_id);
            }
        }
    }
</script>

<style lang="scss" scoped>
    .imagesModalCarousel{
        width: 100%;
        background: antiquewhite;
        position: relative;
        .image-row{
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }
    }

    .controllers{
        display: flex;
        align-items: center;
        justify-content: center;
        position: absolute;
        bottom: 15px;
        margin: auto;
        right: 0;
        left: 0;
        img{
            width: 20px;
            height: 20px;
        }
    }

    .loading-text{
        padding: 50px;
        color: black;
        font-weight: 500;
        font-size: 20px;
    }
</style>