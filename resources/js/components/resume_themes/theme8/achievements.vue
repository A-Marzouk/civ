<template>
    <div
        class="achievements"
    >
        <div
            class="achievement"
            v-for="achievement in currentUser.achievements"
            :key="'achievement-' + achievement.id"
        >
            <div class="left">
                <img :src="achievement.image_src" :alt="`achievement theme8 civie ${achievement.title}`">
            </div>
            <div class="right">
                <!-- <div class="date">2019</div> -->
                <div class="achievement-title">{{ achievement.title }}</div>
                <div class="achievement-code">URL: {{ achievement.url }}</div>
                <div class="achievement-description hideOnTablet">{{ achievement.description }}</div>
            </div>
            <div class="showOnTablet achievement-description">{{ achievement.description }}</div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['currentUser'],
    data: () => ({})
}
</script>

<style lang="scss" scoped>
    .achievements {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        grid-gap: 32px 53px;
    }

    .achievement {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        min-height: 337px;
        background: #333232;
        border-radius: 20px;
        grid-column: span 1;
        padding: 30px;

        .left {
            position: relative;
            margin-right: 40px;
            min-width: 280px;
            max-width: 332px;
            padding: 5px;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #FFFFFF;
            border-radius: 20px;

            img {
                width: 100%;
            }
        }

        .right {
            max-width: 55%;
            color: #fff;

            .date {
                font-size: 24px;
                line-height: 31px;
            }

            .achievement-title {
                font-size: 40px;
                line-height: 52px;
            }

            .achievement-code {
                font-size: 24px;
                line-height: 23px;
                margin-top: 25px;
            }

            .achievement-description {
                font-size: 18px;
                line-height: 23px;
                margin-top: 23px;
            }
        }

        .achievement-description.showOnTablet {
            display: none;
        }
    }

    @media only screen and (max-width: 1500px) {
        .achievement {
            flex-wrap: wrap;

            .right, .left {
                width: 100%;
                max-width: 100%;
                margin-right: 0;
            }

            .right {
                margin-top: 25px;
            }
        }
    }

    @media only screen and (max-width: 1200px) {
        .achievement {
            flex-wrap: wrap;

            .left {
                max-width: 42%;
                min-width: 0;
            }

            .right {
                max-width: 55%;
                margin-top: 0;

                .date {
                    font-size: 20px;
                    line-height: 27px;
                }

                .achievement-title {
                    font-size: 30px;
                    line-height: 42px;
                }

                .achievement-code {
                    font-size: 20px;
                    line-height: 20px;
                    margin-top: 25px;
                    overflow: hidden;
                    text-overflow: ellipsis;
                    width: 100%;
                }     

                .achievement-description.hideOnTablet {
                    display: none;
                }
            }
            
            .achievement-description.showOnTablet {
                display: block;
                color: #fff;
                font-size: 16px;
                line-height: 20px;
                margin-top: 20px;
                width: 100%;
            }                
        }
    }

    @media only screen and (max-width: 976px) {
        .achievement {
            grid-column: span 2;
            flex-wrap: nowrap;

            .achievement-description.showOnTablet {
                display: none;
            }

            .right {
                .achievement-description.hideOnTablet {
                    display: block;
                }
            }
        }
    }

    @media only screen and (max-width: 600px) {
        .achievement {
            .right {
                .date {
                    font-size: 18px;
                    line-height: 27px;
                }

                .achievement-title {
                    font-size: 28px;
                    line-height: 42px;
                }

                .achievement-code {
                    font-size: 18px;
                    line-height: 20px;
                    margin-top: 25px;
                    overflow: hidden;
                    text-overflow: ellipsis;
                    width: 100%;
                }

                .achievement-description {
                    font-size: 16px;
                }
            }
        }
    }

    @media only screen and (max-width: 576px) {
        .achievement {
            flex-wrap: wrap;

            .right, .left {
                width: 100%;
                max-width: 100%;
            }

            .right {
                margin-top: 20px;
            }
        }
    }
</style>