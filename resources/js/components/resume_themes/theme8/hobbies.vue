<template>
    <div class="hobbies">
        <div class="hobbies-container">
            <div v-for="hobby in hobbies" class="hobbie" :key="hobby.id">
                <div class="hobbie-icon">
                    <img
                        src="/images/resume_themes/theme8/football-skill.svg"
                        :alt="hobby.title"
                    />
                </div>
                <div class="hobbie-name" v-text="hobby.title"></div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: { currentUser: { type: Object } },
    computed: {
        hobbies() {
            return this.currentUser.hobbies;
        }
    }
};
</script>

<style lang="scss" scoped>
.hobbies {
    width: 100%;

    .hobbies-container {
        width: 100%;
        display: grid;
        grid-template-columns: repeat(6, 1fr);
        grid-gap: 26px 49px;

        .hobbie {
            display: flex;
            align-items: center;
            background: #333232;
            border-radius: 20px;
            color: white;
            padding: 42px;
            align-items: center;
            grid-column: span 2;
            height: 194px;

            .hobbie-icon {
                background-color: #fff;
                width: 112px;
                height: 112px;
                border-radius: 50%;
                display: flex;
                justify-content: center;
                align-items: center;

                img {
                    align-self: center;
                }
            }

            .hobbie-name {
                font-size: 28px;
                margin-left: 37px;
                display: inline-block;
            }
        }
    }
}

@media only screen and (max-width: 1600px) {
    .hobbies {
        .hobbies-container {
            grid-gap: 26px;

            .hobbie {
                grid-column: span 3;
                padding: 20px;
                height: 170px;

                .hobbie-icon {
                    width: 90px;
                    height: 90px;

                    img {
                        height: 60px;
                    }
                }

                .hobbie-name {
                    margin-left: 20px;
                    font-size: 26px;
                }
            }
        }
    }
}

@media only screen and (max-width: 1200px) {
    .hobbies {
        .hobbies-container {
            grid-gap: 26px;

            .hobbie {
                grid-column: span 3;

                .hobbie-name {
                    font-size: 18px;
                }
            }
        }
    }
}

@media only screen and (max-width: 600px) {
    .hobbies {
        .hobbies-container {
            .hobbie {
                height: 120px;
                grid-column: span 6;
            }
        }
    }
}
</style>
