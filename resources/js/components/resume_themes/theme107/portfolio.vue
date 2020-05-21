<template>
    <div class="container portfolio-flex">
        <masonry
            :cols="{default: 3, 959: 1, 599: 1}"
            :gutter="{default: '39px', 1200: '22px', 700: '15px'}"
            class="masonry"
        >
            <v-card
                v-for="item in portfolioItems"
                :key="item.id"
                align="left"
                flat
                color="transparent" tile
                >
                <v-img class="custom-portfolio-img" :src="getPortfolioItems(item.id)" ></v-img>
                <v-card-title class="custom-portfolio-title">{{item.title}}</v-card-title>
                <v-card-subtitle class="custom-portfolio-subtitle">{{item.subtitle}}</v-card-subtitle>
            </v-card>
            <v-card
                align="left"
                flat
                color="transparent" tile
            >
                <v-img src="/images/resume_themes/theme113/portfolio-img1.png" alt=""></v-img>
                <div class="content">
                    <v-card-title class="title">Est irure in duis minim exercitation voluptate occaecat ullamco.</v-card-title>
                    <div class="description">
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
                    </div>
                </div>
            </v-card>

            <v-card
                align="left"
                flat
                color="transparent" tile
            >        
                <v-img src="/images/resume_themes/theme113/portfolio-img2.png" alt=""></v-img>
                <div class="content">
                    <v-card-title class="title">Est irure in duis minim exercitation voluptate occaecat ullamco.</v-card-title>
                    <div class="description">
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
                    </div>
                </div>
            </v-card>

            <v-card
                align="left"
                flat
                color="transparent" tile
            >
                <v-img src="/images/resume_themes/theme113/portfolio-img3.png" alt=""></v-img>
                <div class="content">
                    <v-card-title class="title">Est irure in duis minim exercitation voluptate occaecat ullamco.</v-card-title>
                    <div class="description">
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
                    </div>
                </div>
            </v-card>

            <v-card
                align="left"
                flat
                color="transparent" tile
            >
                <v-img src="/images/resume_themes/theme113/portfolio-img4.png" alt=""></v-img>
                <div class="content">
                    <v-card-title class="title">Est irure in duis minim exercitation voluptate occaecat ullamco.</v-card-title>
                    <div class="description">
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
                    </div>
                </div>
            </v-card>

            <v-card
                align="left"
                flat
                color="transparent" tile
            >
                <v-img src="/images/resume_themes/theme113/portfolio-img5.png" alt=""></v-img>
                <div class="content">
                    <v-card-title class="title">Est irure in duis minim exercitation voluptate occaecat ullamco.</v-card-title>
                    <div class="description">
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
                    </div>
                </div>
            </v-card>

            <v-card
                align="left"
                flat
                color="transparent" tile
            >
                <v-img src="/images/resume_themes/theme113/portfolio-img4.png" alt=""></v-img>
                <div class="content">
                    <v-card-title class="title">Est irure in duis minim exercitation voluptate occaecat ullamco.</v-card-title>
                    <div class="description">
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
                    </div>
                </div>
            </v-card>

            <v-card
                align="left"
                flat
                color="transparent" tile
            >
                <v-img src="/images/resume_themes/theme113/portfolio-img5.png" alt=""></v-img>
                <div class="content">
                    <v-card-title class="title">Est irure in duis minim exercitation voluptate occaecat ullamco.</v-card-title>
                    <div class="description">
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
                    </div>
                </div>
            </v-card>

            <v-card
                align="left"
                flat
                color="transparent" tile
            >
                <v-img src="/images/resume_themes/theme113/portfolio-img4.png" alt=""></v-img>
                <div class="content">
                    <v-card-title class="title">Est irure in duis minim exercitation voluptate occaecat ullamco.</v-card-title>
                    <div class="description">
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
                    </div>
                </div>
            </v-card>

            <v-card
                align="left"
                flat
                color="transparent" tile
            >
                <v-img src="/images/resume_themes/theme113/portfolio-img5.png" alt=""></v-img>
                <div class="content">
                    <v-card-title class="title">Est irure in duis minim exercitation voluptate occaecat ullamco.</v-card-title>
                    <div class="description">
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
                    </div>
                </div>
            </v-card>
        </masonry>
    </div>
</template>

<script>
export default {
    data: () => ({

    })
}
</script>

<style lang="scss">

#theme107 {

    .portfolio-flex {
        width: 100%;
        max-width: 1400px;
        display: flex;
        justify-content: space-between;

        .masonry {
            width: 100%;
            margin: 0 auto !important;
            
            .v-card {
                grid-column: span 4;
                margin-bottom: 129px !important;

                &:last-child {
                    margin-bottom: 0;
                }

                img {
                    width: 100%;
                    margin-right: 0;
                }

                .content {
                    .title {
                        font-size: 22px !important;
                        padding: 0 !important;
                        max-width: 337px;
                        padding: 0;
                        margin-right: 0;
                        margin-bottom: 20px;
                        color: #28404A;
                        font-family: 'Muli', sans-serif !important;
                        font-weight: 700;
                    }
                    .description p {
                        font-size: 19px !important;
                        line-height: 1.5;
                        color: #28404A;
                        font-family: 'Muli', sans-serif !important;
                    }

                    @media (max-width: 1200px) {

                        margin-top: 19px;

                        .title,
                        .description p {
                            font-size: 10px !important;
                            max-width: 45%;
                        }

                        .title {
                            line-height: 1.4;
                        }
                    }

                    @media (max-width: 700px) {
                        .title,
                        .description p {
                            font-size: 13px !important;
                            max-width: 70%;
                        }
                    }
                }

                @media (max-width: 1200px) {
                    margin-bottom: 76px !important;
                }
                
                @media (max-width: 700px) {
                    margin-bottom: 42px !important;
                }
            }
        }

    }
}
</style>