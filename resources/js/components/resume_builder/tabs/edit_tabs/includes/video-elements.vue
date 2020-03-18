<template>
    <div class="video-element">
        <div class="video-name">{{name}}</div>
        <div class="video-player d-flex align-items-center">
            <svg-vue class="video-play-icon" icon="video-play-icon"></svg-vue>

            <div class="order-controls d-flex flex-column">
                <button class="icon">
                    <svg-vue icon="arrow-up"></svg-vue>
                </button>
                <button class="icon">
                    <svg-vue icon="arrow-down"></svg-vue>
                </button>
            </div>
            
            <div class="input-select select-audio-options dropdown">
                <button class="audio-options dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Option
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">
                        <svg-vue class="option-icon" icon="edit-icon"></svg-vue>Edit
                    </a>
                    <a class="dropdown-item" href="#">
                        <svg-vue class="option-icon" icon="trash-delete-icon"></svg-vue>Delete
                    </a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['name'],
    data: () => ({
    })
}
</script>

<style lang="scss">
$mainBlue: #001CE2; 
    .video-element {
        position: relative;
        margin-bottom: 50px;
        
        .video-name {
            font-family: "Noto Sans", Arial, Helvetica, sans-serif;
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 18px;
        }
        .order-controls {
            right: -27px;
            position: absolute;
            z-index: 2;
            .icon {
                padding: 0 !important;
                background: none;
                border: none;
                outline:none;
                position: relative;
                display: flex;
                justify-content: center;
                align-items: center;
                svg {
                    width: 12px;
                    height: 15px;
                    margin-right:97px;
                }
                
                &:first-child {
                    margin-bottom: 15px;
                }
            }
        }
        .select-audio-options {
            position: absolute;
            bottom: 15px;
            right: 106px;
            height: 22px;
            border-radius: 5px;
            border: 1px solid $mainBlue;
            width: 67px;
            display: flex;
            align-items: center;
            .caret-icon {
                position: absolute;
                z-index: 3;
                height: 5px;
                width: 10px;
                right: 6px;
            }
        }
    }
    .video-player {
        border: 1px solid $mainBlue;
        border-radius: 22px;
        height: 150px;
        width: 260px;
        padding-left: 36px;
        .video-play-icon {
            width: 40px;
            margin-left:70px;
        }
        
    }
</style>