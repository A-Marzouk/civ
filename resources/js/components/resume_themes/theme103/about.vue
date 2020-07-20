<template>
    <div class="container about">
        <h1 class="about-title">Welcome to my profile!</h1>
        <vue-markdown class="content">{{ currentUser.personal_info.about }}</vue-markdown>
    </div>
</template>

<script>
import VueMarkdown from 'vue-markdown'

export default {
    props: [
        'currentUser'
    ],
    components: {
        'vue-markdown': VueMarkdown
    },
    data: () => ({

    })
}
</script>

<style lang="scss" scoped>

$mainColor: #2E77D1;
$purple: #0556B6;

    .about {
        display: flex;
        max-width: 1400px !important;
        justify-content: space-between;
        
        .about-title {
            font-size: 40px;
            color: $purple;
            font-weight: 700;
        }

        .content {
            width: 80%;
            margin-top: 0;
            column-count: 2;
            column-gap: 58px;
            font-size: 20px;
            color: #616887;

            p {
                font-size: 20px;
                color: #616887;
            }
        }

        @media (max-width: 1200px) {
            max-width: 1000px !important;

            .about-title {
                font-size: 22px;
                max-width: 143px;
            }

            .content {
                width: 70%;

                p {
                    font-size: 11px;
                }
            }
        }

        @media (max-width: 600px) {
            flex-wrap: wrap;
            margin: 0 auto;
            flex-direction: column;
            justify-content: flex-start;

            .about-title {
                width: 100%;
                margin-bottom: 28px;
                max-width: 100%;
                font-size: 18px;
            }

            .content {
                column-count: 1;
                width: 100%;

                p {
                    font-size: 12px;
                }
            }
        }
    }
</style>