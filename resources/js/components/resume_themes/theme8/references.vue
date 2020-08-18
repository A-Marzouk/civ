<template>
    <div
        class="references"
    >
        <div
            class="reference"
            v-for="reference in currentUser.references"
            :key="'ref-' + reference.id"
        >
            <div class="left">
                <h2 class="reference-name">{{ reference.name }}</h2>
                <div class="reference-profession">{{ reference.title }}</div>
                <div class="reference-company">{{ reference.company }}</div>
                <!-- <div class="reference-date">{{ reference.date }}</div> -->
                <div class="reference-comment">{{ reference.reference_text }}</div>
            </div>
            <div class="right">
                <div class="address">{{ reference.address }}</div>
                <div class="phone">{{ reference.phone }}</div>
                <a
                    :href="reference.url"
                    target="_blank"
                    class="website"
                >{{ reference.url }}</a>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['currentUser'],
    data: () => ({

    })
}
</script>

<style lang="scss">
    .references {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        grid-gap: 32px 53px;
    }

    .reference {
        grid-column: span 1;
        min-height: 337px;
        width: 100%;
        padding: 40px 34px;
        border-radius: 20px;
        font-family: 'Thabit', 'Courier New', Courier, monospace;
        color: #fff;
        background: #333232;
        display: flex;

        .left {
            width: 70%;

            .reference-name {
                font-size: 40px;
                line-height: 52px;
            }

            .reference-profession {
                font-size: 21px;
                line-height: 27px;
                color: #005BD1;
            }

            .reference-company {
                font-size: 24px;
                margin-top: 14px;
            }

            .reference-date {
                font-size: 18px;
                margin-bottom: 24px;
            }

            .reference-comment {
                font-size: 18px;
                line-height: 23px;
            }
        }

        .right {
            width: 30%;
            
            * {
                font-size: 14px;
                line-height: 18px;
                text-decoration: underline;
            }
        }
    }

    @media only screen and (max-width: 1500px) {
        .reference {
            flex-wrap: wrap;

            .left, .right {
                width: 100%;
            }

            .right {
                margin-top: 15px;

                * {
                    margin-bottom: 10px;
                }
            }
        }
    }

    @media only screen and (max-width: 1200px) {
        .reference {
            .left {
                .reference-name {
                    font-size: 36px;
                    line-height: 52px;
                }

                .reference-profession {
                    font-size: 18px;
                    line-height: 27px;
                }

                .reference-company {
                    font-size: 22px;
                    margin-top: 14px;
                }

                .reference-date {
                    font-size: 16px;
                    margin-bottom: 24px;
                    color: #005BD1;
                }

                .reference-comment {
                    font-size: 16px;
                    line-height: 23px;
                }
            }
        }
    }

    @media only screen and (max-width: 976px) {
        .reference {
            grid-column: span 2;
            flex-wrap: nowrap;

            .left {
                width: 70%;
            }

            .right {
                width: 30%;
            }
        }
    }

    @media only screen and (max-width: 600px) {
        .reference {
            flex-wrap: wrap;

            .left, .right {
                width: 100%;
            }
        }
    }
</style>