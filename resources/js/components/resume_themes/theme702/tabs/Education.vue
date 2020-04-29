<template>
    <div class="tm702-education" v-if="currentTab === 4">
        <div class="tm702-education--inner">
            <div v-for="{id, university} in educations">
                <span>University</span>
                <h1>California Institute of Technology</h1>
                <div>
                    <span>M.Sc in HCI,</span>
                    <span>Dec 19 - Present</span>
                </div>
                <p>I'm a paragraph. Click here to add your own text and edit me. It’s easy. Just click “Edit Text” or double click me to add your own content and make changes.</p>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        props: ["currentTab"],
        data() {
            return {
                educations: [{
                    id: 1,
                    university: "California Institute of Technology"
                }, {
                    id: 2,
                    university: "California Institute of Technology"
                }, {
                    id: 3,
                    university: "California Institute of Technology"
                }, {
                    id: 4,
                    university: "California Institute of Technology"
                }]
            };
        }
    };

</script>
<style lang="scss">
    .tm702-education {
        * {
            font-family: 'Open Sans', sans-serif;
        }

        .tm702-education--inner {
            padding-left: 25px;
            padding-right: 21px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            grid-row-gap: 35px;

            >div {
                span {}

                h1 {
                    color: var(--blue);
                    font-size: 21px;
                    font-weight: normal;
                    line-height: 1.4;
                    display: flex;
                    flex-direction: column;
                    margin-bottom: 40px;

                    &::after {
                        content: " ";
                        width: 57px;
                        height: 4px;
                        background-color: var(--blue);
                    }
                }

                >div {
                    margin-bottom: 14px;

                    span {
                        font-weight: 300;
                        color: var(--blue);
                        font-size: 18px;
                    }
                }

                p {
                    font-weight: 300;
                    color: var(--gray-p);
                    font-size: 12px;
                }
            }
        }

    }

</style>
