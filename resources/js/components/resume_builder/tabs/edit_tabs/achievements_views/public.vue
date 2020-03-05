<template>
    <div class="certificates-section">
        <div class="add-certificate">
            <div class="upload-image">
                <div class="img-label">
                    Upload video or images
                </div>
                <div class="upload-image-box">
                    <img src="/images/resume_builder/achievements/download.png" alt="download">
                    <div class="upload-text">
                        Upload
                    </div>
                </div>
            </div>
            <div class="certification-details-form">
                <div class="certification-input">
                    <label for="publicTitle">Title</label>
                    <input type="text" id="publicTitle">
                </div>
                <div class="certification-input">
                    <label for="publicDescription">Description</label>
                    <textarea name="description" id="publicDescription"></textarea>
                </div>
                <div class="action-btns">
                    <div class="add-award-btn NoDecor">
                        <a href="javascript:void(0)" class="short">
                            <img src="/images/resume_builder/work-ex/mark.png" alt="mark">
                            Add now
                        </a>
                    </div>
                    <div class="auto-import-btn NoDecor">
                        <a href="javascript:void(0)">
                            <img src="/images/resume_builder/work-ex/add-box.png" alt="add">
                            Auto import
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data: () => ({
        
    })
}
</script>