<template>
    <header class="tm701-header">
        <div class="tm701-header--inner">
            <div class="tm701-header--top">
                <!-- left -->
                <Left />
                <!-- center -->
                <Center />
                <!-- right -->
                <Right />
            </div>
        </div>
    </header>
</template>
<script>
import Left from "./header/Left";
import Right from "./header/Right";
import Center from "./header/Center";
export default {
    components: { Left, Right, Center }
};
</script>
<style lang="scss">
.tm701-header {
    background-image: url("../../../../../public/images/resume_themes/theme701/header-mask.png");
    background-color: #dbdec4;
    .tm701-header--inner {
        padding: 0;
        width: 100%;
        margin-top: 0;
        margin-bottom: 0;
        margin-left: auto;
        margin-right: auto;
        max-width: 100%;
        padding-top: 65px;
        padding-bottom: 65px;
        @media screen and (min-width: 1200px) {
            max-width: 1767px;
        }
    }
    .tm701-header--top {
        display: grid;
        align-items: center;
        grid-template-columns: 1fr 4fr 2fr;
        @media (min-width: 1280px) {
            grid-template-columns: 1fr 4fr 3fr;
            grid-template-rows: auto;
        }
    }
}
</style>
