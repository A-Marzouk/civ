<template>
    <div>
        <div class="pa-md-0 pa-sm-0 pa-3 content-container">
            <v-tabs class="resume-builder__tab-bar" hide-slider v-model="importTab">
                <v-tab
                        class="resume-builder__tab"
                        v-for="(tabName,i) in tabs"
                        :key="i"
                >{{tabName.replace('_',' ')}}
                </v-tab>
            </v-tabs>
            <v-card class="card-main pa-10 resume-builder__scroll pay-content" :class="{'shortened' : extractedText.length > 1}" flat id="payContent">
                <v-tabs-items v-model="importTab">
                    <v-tab-item class="import-tab-item">
                        <div class="title">
                            <img src="/icons/edit-cv-sidebar/imports-table.svg" alt="downloads icon">
                            <span>Please Upload Your CV from PDF or docx format</span>
                        </div>

                        <div class="dropzone-area" v-if="extractedText.length < 1">
                            <div class="import-btn">
                                <v-btn class="resume-builder__btn civie-btn filled" raised @click="openBrowse">
                                    Import File
                                </v-btn>
                                <v-btn class="resume-builder__btn civie-btn filled" raised v-if="file" href="javascript:void(0)" @click="uploadPDFFile">
                                    Extract info
                                </v-btn>
                            </div>
                            <div class="drop-zone" v-if="extractedText.length < 1">
                                <vue-dropzone
                                        class="sm-image"
                                        id="dropzone"
                                        :options="dropzoneOptions"
                                        :useCustomSlot="true"
                                        v-on:vdropzone-file-added="handlingEvent"
                                        ref="newImport">
                                    <div class="dropzone-custom-content">
                                        <span>
                                            Or Drag Your File
                                        </span>
                                        <img src="/icons/edit-cv-sidebar/imports-table.svg" alt="imports icon">
                                    </div>
                                </vue-dropzone>
                            </div>
                            <div class="progress-bar-wrapper" v-show="progress > 0" v-if="extractedText.length < 1">
                                <div class="upload-progress-bar" id="upload-progress-bar"></div>
                                <div class="progress-bar-value">
                                    {{progress}}%
                                </div>
                            </div>
                        </div>

                        <div class="file-name" v-show="file">
                            <img src="/images/resume_builder/import/pic.png" alt="icon">
                            {{file.name}}
                            <img class="close" src="/images/resume_builder/my_account/close-modal.png" alt="icon"
                                 @click="clearAll">
                        </div>
                        <input type="file" id="uploadFileButton" ref="file" @change="handleFileUpload"
                               style="opacity:0; position: absolute; left:-500px;">

                    </v-tab-item>

                    <v-tab-item class="import-tab-item">

                        <div class="title">
                            <img src="/icons/edit-cv-sidebar/imports-table.svg" alt="downloads icon">
                            <span>Import from Behance</span>
                        </div>

                        <div class="dropzone-area">
                            <span class="v-label v-label--active theme--light" style="color: #888DB1;">
                            <!-- Added a label here due to prepend-inner slot change -->
                             URL
                            </span>
                            <v-text-field
                                    style="margin-top: -15px;"
                                    class="resume-builder__input top-input-margin url mt-n6"
                                    :outlined="true"
                            >
                                <template slot="prepend-inner">
                                    <span class="inner-text" style="margin-top:-3px;">behance.com/</span>
                                </template>
                            </v-text-field>
                            <div class="import-btn">
                                <v-btn class="resume-builder__btn civie-btn filled" raised>
                                    Import CV
                                </v-btn>
                            </div>
                        </div>


                    </v-tab-item>

                    <v-tab-item class="import-tab-item">

                        <div class="title">
                            <img src="/icons/edit-cv-sidebar/imports-table.svg" alt="downloads icon">
                            <span>Import from Linkedin</span>
                        </div>

                        <div class="dropzone-area">
                            <span class="v-label v-label--active theme--light" style="color: #888DB1;">
                            <!-- Added a label here due to prepend-inner slot change -->
                             URL
                            </span>
                            <v-text-field
                                    style="margin-top: -15px;" v-model="linkedInProfile"
                                    class="resume-builder__input top-input-margin url mt-n6"
                                    :outlined="true"
                                    :error="!!errors.linkedInUrl"
                                    :error-messages="errors.linkedInUrl"
                            >
                                <template slot="prepend-inner">
                                    <span class="inner-text" style="margin-top:-3px;"></span>
                                </template>
                            </v-text-field>
                            <div class="import-btn">
                                <v-btn class="resume-builder__btn civie-btn filled" raised @click="importLinkedInProfile" :class="{disabled : importing}">
                                    {{importing ? 'Extracting...' : 'Import CV'}}
                                </v-btn>
                            </div>
                        </div>

                    </v-tab-item>
                </v-tabs-items>
            </v-card>
        </div>

        <div class="outer-container information-container"  v-if="extractedText.length > 0" >
            <div class="title">
                <img src="/icons/edit-cv-sidebar/information-icon.svg" alt="info icon">
                <span>Please pick your information</span>
            </div>
            <div class="dns-main-content-container resume-builder__scroll">
                <div class="dns-main-content">
                    <div class="import-cv-wrapper">
                        <div>

                            <div class="import-results">
                                <div class="sections">
                                    <div class="section" v-for="section in sections" :key="section.title">
                                        <div class="checkbox" @click="toggleSelectionOfSection(section)">
                                            <img v-show="section.selected" src="/images/resume_builder/import/checkedBox.svg"
                                                 alt="checkbox">
                                            <img v-show="!section.selected" src="/images/resume_builder/import/uncheckedBox.svg"
                                                 alt="checkbox">
                                        </div>
                                        <div class="section-content" :class="{active : section.selected}">
                                            <div class="import-section-title">
                                                <span @click="toggleSelectionOfSection(section)">{{section.title.replace('_',' ')}}</span>
                                                <img src="/images/resume_builder/import/edit-icon.svg" alt="edit icon"
                                                     @click="openEdit(section)" v-show="!section.edited && section.title !== 'work_experience' && section.title !== 'education'">
                                                <img src="/images/resume_builder/import/exit.svg" alt="close icon"
                                                     @click="closeEdit(section)" v-show="section.edited && section.title !== 'work_experience' && section.title !== 'education'">
                                            </div>

                                            <div class="section-content-items" v-show="section.title === 'profile'">
                                                <div class="edit-inputs" v-if="section.edited">
                                                    <input type="email" placeholder="Email" v-model="personalInfo.email">
                                                    <input type="text" placeholder="Phone" v-model="personalInfo.phone">
                                                    <input type="text" placeholder="Location" v-model="personalInfo.location">
                                                    <input type="text" placeholder="Designation" v-model="personalInfo.designation">
                                                </div>
                                                <div class="items" v-else>
                                                    <div class="content-item">
                                                        <div class="bold">Email:</div>
                                                        <div> {{personalInfo.email ? personalInfo.email : "Couldn't find email" }}</div>
                                                    </div>
                                                    <div class="content-item">
                                                        <div class="bold">Phone:</div>
                                                        <div> {{personalInfo.phone ? personalInfo.phone : "Couldn't find phone" }}</div>
                                                    </div>
                                                    <div class="content-item">
                                                        <div class="bold">Location:</div>
                                                        <div> {{personalInfo.location ? personalInfo.location : "Couldn't find location"}}
                                                        </div>
                                                    </div>
                                                    <div class="content-item">
                                                        <div class="bold">Designation:</div>
                                                        <div> {{personalInfo.designation ? personalInfo.designation : "Couldn't find designation"}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="section-content-items" v-show="section.title === 'summary'">
                                                <div class="edit-inputs" v-if="section.edited">
                                                    inputs here
                                                </div>
                                                <div class="items" v-else>
                                                    <div class="content-item">
                                                        <div class="bold"> About:</div>
                                                        <div> {{personalInfo.about ? personalInfo.about : "Couldn't find about information"}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="section-content-items" v-show="section.title === 'languages'">
                                                <div class="edit-inputs skills" v-if="section.edited">
                                                    <div v-for="(language,index) in freelancerData.languages" :key="language + index +'_language'">
                                                        <div class="skill-item">
                                                            {{language}}
                                                            <img src="/images/resume_builder/import/exit.svg" alt="remove skill" @click="removeLanguage(index)">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="items" v-else>
                                                    <div class="content-item">
                                                        <div class="bold"> Languages:</div>
                                                        <div>
                                                            <div v-if="freelancerData.languages.length > 0" class="d-flex flex-wrap">
                                                                <div v-for="(language,index) in freelancerData.languages" :key="index"
                                                                     v-if="language.length > 0">
                                                                    {{language}} <span
                                                                        v-if="index+1 < freelancerData.languages.length"> |</span>
                                                                </div>
                                                            </div>

                                                            <div v-else>
                                                                Couldn't find languages
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="section-content-items" v-show="section.title === 'work_experience'">
                                                <div class="edit-inputs">
                                                    <div v-for="work in work_experience">
                                                        <div class="d-flex align-items-center">
                                                            <div style="font-size: 2em">
                                                                {{work.job_title}}
                                                            </div>
                                                            <div class="ml-4">
                                                                <img src="/images/resume_builder/import/edit-icon.svg" alt="edit icon"
                                                                     @click="editedWork = work.uuid" v-show="editedWork !== work.uuid">
                                                                <img src="/images/resume_builder/import/exit.svg" alt="close icon"
                                                                     @click="editedWork = 0" v-show="editedWork === work.uuid">
                                                            </div>
                                                        </div>

                                                        <div v-if="editedWork === work.uuid" class="pt-3 pb-4">
                                                            <input class='shorter' type="text" placeholder="Company name" v-model="work.company_name">
                                                            <div class="error" v-if="errors.company_name">
                                                                {{ Array.isArray(errors.company_name) ? errors.company_name[0] : errors.company_name}}
                                                            </div>
                                                            <input type="text"  placeholder="Job title" v-model="work.job_title">
                                                            <div class="error" v-if="errors.job_title">
                                                                {{ Array.isArray(errors.job_title) ? errors.job_title[0] : errors.job_title}}
                                                            </div>
                                                            <textarea type="text"  placeholder="Description" v-model="work.description"></textarea>
                                                            <div class="error" v-if="errors.description">
                                                                {{ Array.isArray(errors.description) ? errors.description[0] : errors.description}}
                                                            </div>
                                                            <input type="text" placeholder="Website" v-model="work.website">
                                                            <div class="error" v-if="errors.website">
                                                                {{ Array.isArray(errors.website) ? errors.website[0] : errors.website}}
                                                            </div>
                                                            <input type="date" v-model="work.date_from">
                                                            <div class="error" v-if="errors.date_from">
                                                                {{ Array.isArray(errors.date_from) ? errors.date_from[0] : errors.date_from}}
                                                            </div>
                                                            <label for="dateTo" class="light d-flex align-items-center mt-4">
                                                                <input type="checkbox" class="checkbox" v-model="work.present"> I currently work here.
                                                            </label>
                                                            <input type="date"  v-model="work.date_to" :disabled="work.present">
                                                            <div class="error" v-if="errors.date_to">
                                                                {{ Array.isArray(errors.date_to) ? errors.date_to[0] : errors.date_to}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="items">
                                                    <div class="content-item">
                                                        <div class="bold"></div>
                                                        <div>
                                                            <div v-if="work_experience.length < 1">
                                                                Couldn't find work experience
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="section-content-items" v-show="section.title === 'education'">
                                                <div class="edit-inputs">
                                                    <div v-for="education in educations">
                                                        <div class="d-flex align-items-center">
                                                            <div style="font-size: 2em">
                                                                {{education.university_name}}
                                                            </div>
                                                            <div class="ml-4">
                                                                <img src="/images/resume_builder/import/edit-icon.svg" alt="edit icon"
                                                                     @click="editedEducation = education.uuid" v-show="editedEducation !== education.uuid">
                                                                <img src="/images/resume_builder/import/exit.svg" alt="close icon"
                                                                     @click="editedEducation = 0" v-show="editedEducation === education.uuid">
                                                            </div>
                                                        </div>

                                                        <div v-if="editedEducation === education.uuid" >
                                                            <input type="text"  placeholder="Institution type"  class="shorter" v-model="education.institution_type">
                                                            <div class="error" v-if="errors.institution_type">
                                                                {{ Array.isArray(errors.institution_type) ? errors.institution_type[0] : errors.institution_type}}
                                                            </div>
                                                            <input type="text" placeholder="University name" v-model="education.university_name">
                                                            <div class="error" v-if="errors.university_name">
                                                                {{ Array.isArray(errors.university_name) ? errors.university_name[0] : errors.university_name}}
                                                            </div>
                                                            <input type="text" placeholder="Degree title"  class="shorter" v-model="education.degree_title">
                                                            <div class="error" v-if="errors.degree_title">
                                                                {{ Array.isArray(errors.degree_title) ? errors.degree_title[0] : errors.degree_title}}
                                                            </div>
                                                            <input type="date"  v-model="education.date_from">
                                                            <div class="error" v-if="errors.date_from">
                                                                {{ Array.isArray(errors.date_from) ? errors.date_from[0] : errors.date_from}}
                                                            </div>
                                                            <label  class="light d-flex align-items-center mt-4">
                                                                <input type="checkbox" class="checkbox" v-model="education.present"> I currently study here.
                                                            </label>
                                                            <input type="date"  v-model="education.date_to" :disabled="education.present">
                                                            <div class="error" v-if="errors.date_to">
                                                                {{ Array.isArray(errors.date_to) ? errors.date_to[0] : errors.date_to}}
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="items">
                                                    <div class="content-item">
                                                        <div v-if="work_experience.length < 1">
                                                            Couldn't find work experience
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="section-content-items" v-show="section.title === 'skills'">
                                                <div class="edit-inputs skills" v-if="section.edited">
                                                    <div v-for="(skill,index) in freelancerData.skills" :key="skill + index +'_skill'">
                                                        <div class="skill-item">
                                                            {{skill}}
                                                            <img src="/images/resume_builder/import/exit.svg" alt="remove skill" @click="removeSkill(index)">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="items" v-else>
                                                    <div class="content-item">
                                                        <div class="bold"> Skills:</div>
                                                        <div>
                                                            <div v-if="freelancerData.skills.length > 0" class="d-flex flex-wrap">
                                                                <div v-for="(skill,index) in freelancerData.skills" :key="index"
                                                                     v-if="skill.length > 0">
                                                                    {{skill}} <span v-if="index+1 < freelancerData.skills.length"> |</span>
                                                                </div>
                                                            </div>

                                                            <div v-else>
                                                                Couldn't find skills
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="section-content-items" v-show="section.title === 'achievements'">
                                                <div class="edit-inputs" v-if="section.edited"></div>
                                                <div class="items" v-else>
                                                    <div class="content-item">
                                                        <div class="bold"></div>
                                                        <div> {{freelancerData.achievements.length > 0 ? freelancerData.achievements : "Couldn't find achievements"}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="section-content-items" v-show="section.title === 'hobbies'">
                                                <div class="edit-inputs" v-if="section.edited"></div>
                                                <div class="items" v-else>
                                                    <div class="content-item">
                                                        <div class="bold"></div>
                                                        <div> {{freelancerData.hobbies.length > 0 ? freelancerData.hobbies : "Couldn't find hobbies" }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="section-content-items" v-show="section.title === 'references'">
                                                <div class="edit-inputs" v-if="section.edited"></div>
                                                <div class="items" v-else>
                                                    <div class="content-item">
                                                        <div class="bold"></div>
                                                        <div> {{freelancerData.references.length > 0 ? freelancerData.references : "Couldn't find references" }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="import-action-btns no-background mb-5">
                                <div class="d-flex justify-space-between">
                                    <div class="d-flex">
                                        <a class="btn btn-outline short" href="javascript:void(0)" @click="importAvailableData" :class="{disabled : importingExtractedData}">
                                            <img class="icon" src="/images/resume_builder/work-ex/add-box.png" alt="add">
                                            {{importingExtractedData ? 'Importing.. ' : 'Import'}}
                                        </a>
                                        <div class="auto-import-btn NoDecor">
                                            <a href="javascript:void(0)" @click="toggleSelectAll">
                                                {{ isAllSelected ? 'Deselect' : 'Select'}} all
                                                <img class="extract" src="/images/resume_builder/import/extract.png" alt="add">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="eye-icon"  @click="showFullText = !showFullText"
                                         @mouseenter="showToolTip = true" @mouseleave="showToolTip = false">
                                        <img src="/images/resume_builder/imports/eye.png" alt="eye icon">
                                        <div class="custom-tooltip" v-show="showToolTip">
                                            {{ showFullText ? 'Hide' : 'Show'}} full CV text
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pl-5 pr-5" v-show="showFullText">
                                <div class="row w-100">
                                    <div class="col-12 border-dark m-3 p-2" style="white-space: pre-line; border:1px dotted blue !important;"
                                         v-show="extractedText.length > 0">
                                        {{extractedText}}
                                    </div>
                                </div>

                                <div v-show="errors.cv" style="color: red;" class="mt-3">
                                    {{errors.cv}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="outer-container">
            <div class="title">
                <img src="/icons/edit-cv-sidebar/imports-table.svg" alt="imports icon">
                <span>Manage Imports</span>
            </div>
            <div class="dns-main-content-container resume-builder__scroll">
                <div class="dns-main-content">
                    <table class="table table-bordered dns-table table-responsive-sm">
                        <thead>
                        <tr>
                            <th scope="col">
                                <div class="left-col">
                                    File Name
                                </div>
                            </th>
                            <th scope="col" class="sm-col">
                                <div class="center-col">
                                    Date
                                </div>
                            </th>

                            <!-- hide on screens smaller than medium -->
                            <th scope="col" class="sm-col d-none d-lg-table-cell">
                                <div class="center-col">
                                    View
                                </div>
                            </th>
                            <th scope="col" class="sm-col d-none d-lg-table-cell">
                                <div class="center-col">
                                    Download
                                </div>
                            </th>
                            <th scope="col" class="sm-col d-none d-lg-table-cell">
                                <div class="center-col">
                                    Delete
                                </div>
                            </th>

                            <!-- hide on screens wider than medium -->
                            <th scope="col" class="sm-col d-lg-none">
                                <div class="center-col">
                                    Options
                                </div>
                            </th>

                        </tr>
                        </thead>
                        <tbody>
                        <draggable @start="drag=true" @end="drag=false" handle=".drag-handler" style="display: contents">
                            <tr v-for="i in 10" :key="i">
                                <td>
                                    <div class="table-file">
                                        <img src="/icons/edit-cv-sidebar/drag-btn-icon.svg" alt="drag" class="drag-handler">
                                        <span>Theme_0{{i}}_file.pdf</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="center-col">
                                        01/03/2020
                                    </div>
                                </td>
                                <td class="d-none d-lg-table-cell">
                                    <div class="center-col">
                                        <img src="/icons/view.svg" alt="view icon">
                                    </div>
                                </td>
                                <td class="d-none d-lg-table-cell">
                                    <div class="center-col">
                                        <img src="/icons/download.svg" alt="download icon">
                                    </div>
                                </td>
                                <td class="d-none d-lg-table-cell">
                                    <div class="center-col">
                                        <img src="/icons/delete.svg" alt="delete icon">
                                    </div>
                                </td>
                                <td class="d-lg-none">
                                    <div class="center-col">
                                        <img src="/icons/view.svg" alt="view icon">
                                        <img src="/icons/download.svg" alt="download icon">
                                        <img src="/icons/delete.svg" alt="delete icon">
                                    </div>
                                </td>

                            </tr>
                        </draggable>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import draggable from "vuedraggable";
    import vue2Dropzone from "vue2-dropzone";
    import pdfExtractor from "../../components/ImportCV";

    export default {
        name: "Imports",
        components: {
            draggable,
            vueDropzone: vue2Dropzone,
            pdfExtractor
        },
        data() {
            return {
                tabs: ["PDF/DOC", "Behance", "LinkedIn"],
                importTab: 0,
                dropzoneOptions: {
                    url: "https://httpbin.org/post",
                    maxFilesize: 25,
                    maxFiles: 1,
                    acceptedFiles: "application/pdf,.doc,.docx,",
                },


                // extract:
                translationLanguage: 'select',
                file: '',
                extractedText: '',
                originalText: '',
                arrayOfExtractedText: [],
                errors: {
                    linkedInUrl:''
                },
                freelancerData: {
                    'work_experience': '',
                    'education': '',
                    'skills': [],
                    'languages': [],
                    'links': [],
                    'achievements': [],
                    'hobbies': [],
                    'references': [],
                },
                personalInfo: {
                    'phone': '',
                    'email': '',
                    'designation': '',
                    'location': ''
                },
                summary:{
                    'about': '',
                },
                educations:[],
                work_experience:[],
                editedWork:0,
                editedEducation:0,
                countryList: [
                    "Afghanistan",
                    "Albania",
                    "Algeria",
                    "American Samoa",
                    "Andorra",
                    "Angola",
                    "Anguilla",
                    "Antarctica",
                    "Antigua and Barbuda",
                    "Argentina",
                    "Armenia",
                    "Aruba",
                    "Australia",
                    "Austria",
                    "Azerbaijan",
                    "Bahamas (the)",
                    "Bahrain",
                    "Bangladesh",
                    "Barbados",
                    "Belarus",
                    "Belgium",
                    "Belize",
                    "Benin",
                    "Bermuda",
                    "Bhutan",
                    "Bolivia (Plurinational State of)",
                    "Bonaire, Sint Eustatius and Saba",
                    "Bosnia and Herzegovina",
                    "Botswana",
                    "Bouvet Island",
                    "Brazil",
                    "British Indian Ocean Territory (the)",
                    "Brunei Darussalam",
                    "Bulgaria",
                    "Burkina Faso",
                    "Burundi",
                    "Cabo Verde",
                    "Cambodia",
                    "Cameroon",
                    "Canada",
                    "Cayman Islands (the)",
                    "Central African Republic (the)",
                    "Chad",
                    "Chile",
                    "China",
                    "Christmas Island",
                    "Cocos (Keeling) Islands (the)",
                    "Colombia",
                    "Comoros (the)",
                    "Congo (the Democratic Republic of the)",
                    "Congo (the)",
                    "Cook Islands (the)",
                    "Costa Rica",
                    "Croatia",
                    "Cuba",
                    "Curaçao",
                    "Cyprus",
                    "Czechia",
                    "Côte d'Ivoire",
                    "Denmark",
                    "Djibouti",
                    "Dominica",
                    "Dominican Republic (the)",
                    "Ecuador",
                    "Egypt",
                    "El Salvador",
                    "Equatorial Guinea",
                    "Eritrea",
                    "Estonia",
                    "Eswatini",
                    "Ethiopia",
                    "Falkland Islands (the) [Malvinas]",
                    "Faroe Islands (the)",
                    "Fiji",
                    "Finland",
                    "France",
                    "French Guiana",
                    "French Polynesia",
                    "French Southern Territories (the)",
                    "Gabon",
                    "Gambia (the)",
                    "Georgia",
                    "Germany",
                    "Ghana",
                    "Gibraltar",
                    "Greece",
                    "Greenland",
                    "Grenada",
                    "Guadeloupe",
                    "Guam",
                    "Guatemala",
                    "Guernsey",
                    "Guinea",
                    "Guinea-Bissau",
                    "Guyana",
                    "Haiti",
                    "Heard Island and McDonald Islands",
                    "Holy See (the)",
                    "Honduras",
                    "Hong Kong",
                    "Hungary",
                    "Iceland",
                    "India",
                    "Indonesia",
                    "Iran (Islamic Republic of)",
                    "Iraq",
                    "Ireland",
                    "Isle of Man",
                    "Israel",
                    "Italy",
                    "Jamaica",
                    "Japan",
                    "Jersey",
                    "Jordan",
                    "Kazakhstan",
                    "Kenya",
                    "Kiribati",
                    "Korea (the Democratic People's Republic of)",
                    "Korea (the Republic of)",
                    "Kuwait",
                    "Kyrgyzstan",
                    "Lao People's Democratic Republic (the)",
                    "Latvia",
                    "Lebanon",
                    "Lesotho",
                    "Liberia",
                    "Libya",
                    "Liechtenstein",
                    "Lithuania",
                    "Luxembourg",
                    "Macao",
                    "Madagascar",
                    "Malawi",
                    "Malaysia",
                    "Maldives",
                    "Mali",
                    "Malta",
                    "Marshall Islands (the)",
                    "Martinique",
                    "Mauritania",
                    "Mauritius",
                    "Mayotte",
                    "Mexico",
                    "Micronesia (Federated States of)",
                    "Moldova (the Republic of)",
                    "Monaco",
                    "Mongolia",
                    "Montenegro",
                    "Montserrat",
                    "Morocco",
                    "Mozambique",
                    "Myanmar",
                    "Namibia",
                    "Nauru",
                    "Nepal",
                    "Netherlands (the)",
                    "New Caledonia",
                    "New Zealand",
                    "Nicaragua",
                    "Niger (the)",
                    "Nigeria",
                    "Niue",
                    "Norfolk Island",
                    "Northern Mariana Islands (the)",
                    "Norway",
                    "Oman",
                    "Pakistan",
                    "Palau",
                    "Palestine, State of",
                    "Panama",
                    "Papua New Guinea",
                    "Paraguay",
                    "Peru",
                    "Philippines (the)",
                    "Pitcairn",
                    "Poland",
                    "Portugal",
                    "Puerto Rico",
                    "Qatar",
                    "Republic of North Macedonia",
                    "Romania",
                    "Russian Federation (the)",
                    "Rwanda",
                    "Réunion",
                    "Saint Barthélemy",
                    "Saint Helena, Ascension and Tristan da Cunha",
                    "Saint Kitts and Nevis",
                    "Saint Lucia",
                    "Saint Martin (French part)",
                    "Saint Pierre and Miquelon",
                    "Saint Vincent and the Grenadines",
                    "Samoa",
                    "San Marino",
                    "Sao Tome and Principe",
                    "Saudi Arabia",
                    "Senegal",
                    "Serbia",
                    "Seychelles",
                    "Sierra Leone",
                    "Singapore",
                    "Sint Maarten (Dutch part)",
                    "Slovakia",
                    "Slovenia",
                    "Solomon Islands",
                    "Somalia",
                    "South Africa",
                    "South Georgia and the South Sandwich Islands",
                    "South Sudan",
                    "Spain",
                    "Sri Lanka",
                    "Sudan (the)",
                    "Suriname",
                    "Svalbard and Jan Mayen",
                    "Sweden",
                    "Switzerland",
                    "Syrian Arab Republic",
                    "Taiwan (Province of China)",
                    "Tajikistan",
                    "Tanzania, United Republic of",
                    "Thailand",
                    "Timor-Leste",
                    "Togo",
                    "Tokelau",
                    "Tonga",
                    "Trinidad and Tobago",
                    "Tunisia",
                    "Turkey",
                    "Turkmenistan",
                    "Turks and Caicos Islands (the)",
                    "Tuvalu",
                    "Uganda",
                    "Ukraine",
                    "United Arab Emirates (the)",
                    "United Kingdom of Great Britain and Northern Ireland (the)",
                    "United States Minor Outlying Islands (the)",
                    "United States of America (the)",
                    "Uruguay",
                    "Uzbekistan",
                    "Vanuatu",
                    "Venezuela (Bolivarian Republic of)",
                    "Viet Nam",
                    "Virgin Islands (British)",
                    "Virgin Islands (U.S.)",
                    "Wallis and Futuna",
                    "Western Sahara",
                    "Yemen",
                    "Zambia",
                    "Zimbabwe",
                    "Åland Islands"
                ],
                skillsList: [
                    'JavaScript',
                    'HTML',
                    'CSS.',
                    'SASS',
                    'SQL',
                    'Python',
                    'Java',
                    'Bash/Shell/PowerShell',
                    'C#',
                    'PHP',
                    'TypeScript',
                    // 'C++',
                    'C Language',
                    'Ruby',
                    'Go',
                    'Swift',
                    'Kotlin',
                    'R Language',
                    'VBA',
                    'Objective-C',
                    'Assembly',
                    'Scala',
                    'Rust',

                    'jQuery',
                    'Angular/Angular.js',
                    'React.js',
                    'Meteor.js',
                    'Socket.io',
                    'Cordova',
                    'Android',
                    'Bootstrap',
                    'Keystone.js',
                    'Vue.js',
                    'AWS',
                    'Redux',
                    'Hapi.js',
                    'React Native',
                    'Microservices',
                    'ASP.NET',
                    'Express',
                    'Spring',
                    'Vue.js',
                    'Django',
                    'Flask',
                    'Laravel',
                    'Ruby,on,Rails',
                    'Drupal',
                    'Node.js',
                    '.NET',
                    '.NET,Core',
                    'Pandas',
                    'React,Native',
                    'Ansible',
                    'TensorFlow',
                    'Unity,3D',
                    'Cordova',
                    'Xamarin',
                    'Apache,Spark',
                    'Hadoop',
                    'Flutter',
                    'Wordpress',

                    'MySQL',
                    'PostgreSQL',
                    'Microsoft,SQL,Server',
                    'SQLite',
                    'MongoDB',
                    'Redis',
                    'MariaDB',
                    'Oracle',
                    'Elasticsearch',
                    'Firebase',
                    'DynamoDB',
                    'Cassandra',
                    'Couchbase',

                    'Adobe After Effects',
                    'Sketch',
                    'Adobe Illustrator',
                    'Adobe XD',
                    'Photoshop',
                    'Autocad',
                    'Solidworks',
                    'Adobe Flash',
                    'Digital Drawing Tablet',
                    'Adobe Indesign',
                    'CorelDraw',
                    '3d Max'
                ],
                languages: [
                    "Abkhaz",
                    "Afar",
                    "Afrikaans",
                    "Akan",
                    "Albanian",
                    "Amharic",
                    "Arabic",
                    "Aragonese",
                    "Armenian",
                    "Assamese",
                    "Avaric",
                    "Avestan",
                    "Aymara",
                    "Azerbaijani",
                    "Bambara",
                    "Bashkir",
                    "Basque",
                    "Belarusian",
                    "Bengali",
                    "Bihari",
                    "Bislama",
                    "Bosnian",
                    "Breton",
                    "Bulgarian",
                    "Burmese",
                    "Catalan; Valencian",
                    "Chamorro",
                    "Chechen",
                    "Chichewa; Chewa; Nyanja",
                    "Chinese",
                    "Chuvash",
                    "Cornish",
                    "Corsican",
                    "Croatian",
                    "Czech",
                    "Danish",
                    "Divehi; Dhivehi; Maldivian;",
                    "Dutch",
                    "English",
                    "Esperanto",
                    "Estonian",
                    "Faroese",
                    "Fijian",
                    "Finnish",
                    "French",
                    "Fula; Fulah; Pulaar; Pular",
                    "Galician",
                    "Georgian",
                    "German",
                    "Greek, Modern",
                    "Guaraní",
                    "Gujarati",
                    "Haitian; Haitian Creole",
                    "Hausa",
                    "Hebrew (modern)",
                    "Herero",
                    "Hindi",
                    "Hiri Motu",
                    "Hungarian",
                    "Interlingua",
                    "Indonesian",
                    "Interlingue",
                    "Irish",
                    "Igbo",
                    "Inupiaq",
                    "Ido",
                    "Icelandic",
                    "Italian",
                    "Inuktitut",
                    "Japanese",
                    "Javanese",
                    "Kalaallisut, Greenlandic",
                    "Kannada",
                    "Kanuri",
                    "Kashmiri",
                    "Kazakh",
                    "Khmer",
                    "Kikuyu, Gikuyu",
                    "Kinyarwanda",
                    "Kirghiz, Kyrgyz",
                    "Komi",
                    "Kongo",
                    "Korean",
                    "Kurdish",
                    "Kwanyama, Kuanyama",
                    "Latin",
                    "Luxembourgish, Letzeburgesch",
                    "Luganda",
                    "Limburgish, Limburgan, Limburger",
                    "Lingala",
                    "Lao",
                    "Lithuanian",
                    "Luba-Katanga",
                    "Latvian",
                    "Manx",
                    "Macedonian",
                    "Malagasy",
                    "Malay",
                    "Malayalam",
                    "Maltese",
                    "Māori",
                    "Marathi (Marāṭhī)",
                    "Marshallese",
                    "Mongolian",
                    "Nauru",
                    "Navajo, Navaho",
                    "Norwegian Bokmål",
                    "North Ndebele",
                    "Nepali",
                    "Ndonga",
                    "Norwegian Nynorsk",
                    "Norwegian",
                    "Nuosu",
                    "South Ndebele",
                    "Occitan",
                    "Ojibwe, Ojibwa",
                    "Old Church Slavonic, Church Slavic, Church Slavonic, Old Bulgarian, Old Slavonic",
                    "Oromo",
                    "Oriya",
                    "Ossetian, Ossetic",
                    "Panjabi, Punjabi",
                    "Pāli",
                    "Persian",
                    "Polish",
                    "Pashto, Pushto",
                    "Portuguese",
                    "Quechua",
                    "Romansh",
                    "Kirundi",
                    "Romanian, Moldavian, Moldovan",
                    "Russian",
                    "Sanskrit (Saṁskṛta)",
                    "Sardinian",
                    "Sindhi",
                    "Northern Sami",
                    "Samoan",
                    "Sango",
                    "Serbian",
                    "Scottish Gaelic; Gaelic",
                    "Shona",
                    "Sinhala, Sinhalese",
                    "Slovak",
                    "Slovene",
                    "Somali",
                    "Southern Sotho",
                    "Spanish; Castilian",
                    "Sundanese",
                    "Swahili",
                    "Swati",
                    "Swedish",
                    "Tamil",
                    "Telugu",
                    "Tajik",
                    "Thai",
                    "Tigrinya",
                    "Tibetan Standard, Tibetan, Central",
                    "Turkmen",
                    "Tagalog",
                    "Tswana",
                    "Tonga (Tonga Islands)",
                    "Turkish",
                    "Tsonga",
                    "Tatar",
                    "Tahitian",
                    "Uighur, Uyghur",
                    "Ukrainian",
                    "Urdu",
                    "Uzbek",
                    "Venda",
                    "Vietnamese",
                    "Volapük",
                    "Walloon",
                    "Welsh",
                    "Wolof",
                    "Western Frisian",
                    "Xhosa",
                    "Yiddish",
                    "Yoruba",
                    "Zhuang, Chuang"
                ],
                progress: 0,
                downloadProgress: 0,
                importing: false,
                importingExtractedData: false,
                sections: [
                    {
                        title: 'profile',
                        selected: 1,
                        edited: 0,

                    },
                    {
                        title: 'summary',
                        selected: 0,
                        edited: 0
                    },
                    {
                        title: 'languages',
                        selected: 0,
                        edited: 0
                    },
                    {
                        title: 'work_experience',
                        selected: 0,
                        edited: 0
                    },
                    {
                        title: 'education',
                        selected: 0,
                        edited: 0
                    },
                    {
                        title: 'skills',
                        selected: 0,
                        edited: 0
                    },
                    {
                        title: 'achievements',
                        selected: 0,
                        edited: 0
                    },
                    {
                        title: 'hobbies',
                        selected: 0,
                        edited: 0
                    },
                    {
                        title: 'references',
                        selected: 0,
                        edited: 0
                    }
                ],
                isAllSelected:false,
                showFullText: false,
                showToolTip: false,
                linkedInProfile:''

            }
        },
        methods: {

            // extract
            // handle file upload
            openBrowse() {
                $('#uploadFileButton').click();
            },
            goToExternalURL(link) {
                if (link.includes('http')) {
                    window.open(link, '_blank');

                } else {
                    window.open('http://' + link, '_blank');
                }

            },

            importLinkedInProfile() {
                if(this.importing){
                    return;
                }
                this.importing = true;
                this.errors = {};
                if(!this.validateLinkedInUrl()){
                    this.errors.linkedInUrl = 'Not a valid url';
                    this.importing = false;
                    return;
                }

                axios.post('https://pup-it.herokuapp.com/api/profile',
                    {
                        id: this.$uuid.v1(),
                        link: this.linkedInProfile
                    },
                    {
                        responseType: 'arraybuffer',
                        onDownloadProgress: progressEvent => {
                            this.downloadProgress = Math.ceil( (progressEvent.loaded / progressEvent.total) * 100);
                        },
                    }
                )
                    .then((response) => {
                        let blob = new Blob([response.data], {type: 'application/pdf'});
                        blob.name = 'LinkedIn imported profile';
                        this.file = blob;
                        this.uploadPDFFile();
                        this.downloadProgress = 0 ;
                        this.importing = false;
                    }).catch( (error) => {
                    this.importing = false;
                });
            },
            validateLinkedInUrl(){
                let url = this.linkedInProfile;
                let linkedInRegex = /(https?)?:?(\/\/)?(([w]{3}||\w\w)\.)?linkedin.com(\w+:{0,1}\w*@)?(\S+)(:([0-9])+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/ ;
                return url.match(linkedInRegex);
            },
            uploadPDFFile() {
                this.errors = [];
                let formData = new FormData();
                formData.append('cv', this.file);
                const config = {
                    onUploadProgress: progressEvent => {
                        this.progress =Math.ceil( (progressEvent.loaded / progressEvent.total) * 100);
                        $('#upload-progress-bar').css('width', this.progress + '%');
                    },
                    headers: {'Content-Type': 'multipart/form-data'}
                };

                if (this.file.type === 'application/pdf') {
                    axios.post('/resume-builder/import/pdf', formData, config)
                        .then((response) => {
                            if (response.data.length > 0) {
                                this.extractedText = response.data;
                                this.originalText = response.data;
                                this.clearFreelancerData();
                            } else {
                                this.extractedText = 'This file does not contain any text to be extracted!';
                            }
                            this.arrayOfExtractedText = this.extractedText.split("\n");
                            this.searchForData();
                        })
                        .catch((error) => {
                            if (typeof error.response.data === 'object') {
                                this.errors = error.response.data.errors;
                            } else {
                                this.errors = ['Something went wrong. Please try again.'];
                            }
                            this.$store.dispatch('flyingNotification', {
                                message: 'Error',
                                iconSrc: '/images/resume_builder/error.png'
                            });
                        });
                } else {
                    axios.post('/resume-builder/import/docx', formData, config)
                        .then((response) => {
                            this.extractDocText(response.data);
                        })
                        .catch((error) => {
                            if (typeof error.response.data === 'object') {
                                this.errors = error.response.data.errors;
                            } else {
                                this.errors = ['Something went wrong. Please try again.'];
                            }
                            this.$store.dispatch('flyingNotification', {
                                message: 'Error',
                                iconSrc: '/images/resume_builder/error.png'
                            });
                        });
                }

            },
            clearFreelancerData() {
                this.freelancerData = {
                    'education': [],
                    'achievements': [],
                    'hobbies': [],
                    'references': [],
                    'skills': [], //done
                    'languages': [], // done
                    'links': [], // done (might need more work for special social links)
                };
                this.personalInfo = {
                    'phone': '',
                    'email': '',
                    'designation': '',
                    'about': '',
                    'location': ''
                };
                this.summary = {
                    'about': ''
                };
                this.educations =[];
                this.work_experience= [];
            },
            clearAll() {
                this.clearFreelancerData();
                this.$refs.newImport.removeAllFiles();

                this.file = '';
                this.extractedText = '';
                this.progress = 0;
                this.linkedInProfile = '';
                this.linkedInProfile = '';
                this.importingExtractedData = false;
            },
            handleFileUpload() {
                this.file = this.$refs.file.files[0];
            },


            // dropzone funcions
            handlingEvent: function (file) {
                this.file = file
            },
            // document extracting text funtions:
            extractDocText(sections) {
                sections.forEach(section => {
                    section.elements.forEach(element => {
                        if (element.elements.length > 0) {
                            if (element.elements[0].text) {
                                this.extractedText += element.elements[0].text;
                                this.arrayOfExtractedText.push(element.elements[0].text);
                            }
                        }
                    });
                });

                this.searchForData();
            },


            // selection:
            toggleSelectionOfSection(section) {
                section.selected = !section.selected;
            },
            toggleSelectAll(){
                if(this.isAllSelected){
                    this.DeSelectAllSections();
                    return;
                }
                this.SelectAllSections();
            },
            SelectAllSections(){
                this.isAllSelected = true;
                this.sections.forEach( (section) => {
                    section.selected = true;
                })
            },
            DeSelectAllSections(){
                this.isAllSelected = false;
                this.sections.forEach( (section) => {
                    section.selected = false;
                })
            },


            // search functions
            searchForData() {
                let arrayOfData = this.arrayOfExtractedText;

                arrayOfData.forEach((textLine) => {
                    // check for single fields:

                    if (!this.personalInfo.email) {
                        this.searchForEmail(textLine);
                    }
                    if (!this.personalInfo.phone) {
                        this.searchForPhone(textLine);
                    }
                    if (!this.personalInfo.designation) {
                        this.searchForJobTitle(textLine);
                    }
                    if (!this.personalInfo.location) {
                        this.searchForCountry(textLine);
                    }

                    // check for array fields :
                    this.searchForSkills(textLine);
                    this.searchForLanguages(textLine);
                    this.searchForLinks(textLine);

                });

                // check for long text fields like education, work experience and references :

                this.searchForEducationText(arrayOfData);
                this.searchForExperienceText(arrayOfData);
                this.searchForSummary();
                this.searchForReferencesText();

            },

            searchForSummary(){
                let summary = this.extractedText.substring(
                    this.extractedText.lastIndexOf("Summary") + 7,
                    this.extractedText.lastIndexOf("Experience")
                );

                this.personalInfo.about = summary;


                if(summary.length > 1){
                    this.sections.forEach( (section) => { section.title === 'summary' ? section.selected = true : ''} );
                }
            },

            searchForEducationText(arrayOfData) {

                // check if any word of the text line is a country name
                arrayOfData.forEach( (textLine) => {
                    let possibleUniversityTitles = ['university', 'institute', 'college','academy', 'school','Faculty'];
                    let cleanTextLine = textLine.replace(/-/g, "");

                    for (let i = 0; i < possibleUniversityTitles.length; i++) {
                        let universityNameReg = new RegExp(possibleUniversityTitles[i], 'ig');
                        let education = {
                            uuid:this.$uuid.v1(),
                            university_name:'',
                            degree_title:'Not set',
                            institution_type:'',
                            date_from:'2020-04-04',
                            date_to:'2020-04-04',
                            present: false,
                            user_id: this.$store.state.user.id
                        };
                        if (universityNameReg.test(cleanTextLine)) {
                            education.university_name = cleanTextLine;
                            education.institution_type = possibleUniversityTitles[i];

                            let repeated = false;
                            this.educations.forEach((my_education) => {
                                if(my_education.university_name === cleanTextLine ){
                                    repeated = true;
                                }
                            });

                            if(!repeated){
                                this.educations.push(education);
                            }
                        }
                    }

                });


                if(this.educations.length > 1){
                    this.sections.forEach( (section) => { section.title === 'education' ? section.selected = true : ''} );
                }
            },
            searchForExperienceText(arrayOfData) {
                // check if any word of the text line is a country name
                arrayOfData.forEach( (textLine) => {
                    let possibleWorkTitles = ['developer', 'software engineer', 'designer','junior', 'middle','senior','freelancer'];
                    let cleanTextLine = textLine.replace(/-/g, "");
                    for (let i = 0; i < possibleWorkTitles.length; i++) {
                        let work = {
                            uuid: this.$uuid.v1(),
                            company_name:'not-set',
                            job_title:'',
                            description:'',
                            website:'not-set',
                            date_from:'2020-04-04',
                            date_to:'2020-04-04',
                            present:false,
                            user_id: this.$store.state.user.id
                        };

                        let jobNameReg = new RegExp(possibleWorkTitles[i], 'ig');
                        if (jobNameReg.test(cleanTextLine)) {
                            work.job_title = cleanTextLine;
                            work.description = possibleWorkTitles[i];

                            let repeated = false;
                            this.work_experience.forEach((my_work) => {
                                if(my_work.job_title === cleanTextLine ){
                                    repeated = true;
                                }
                            });

                            if(!repeated){
                                this.work_experience.push(work);
                            }
                        }
                    }

                });


                if(this.work_experience.length > 1){
                    this.sections.forEach( (section) => { section.title === 'work_experience' ? section.selected = true : ''} );
                }
            },
            searchForReferencesText() {
                // this.freelancerData.references = this.extractedText.match(/((?<=References)|(?<=REFEREES)|(?<=REFERENCES)|(?<=Referees))[\S\s]*?((?=Education)|(?=Skills)|(?=SKILLS)|(?=CAREER OBJECTIVE)|(?=Carrer Objective)|(?=Experience)|(?=EXPERIENCE)|(?=Languages)|(?=LANGUAGES)|(?=Technologies)|(?=TECHNOLOGIES)|(?=Summary)|(?=SUMMURY)|(?=Projects)|(?=PROJECTS))/);
            },
            nl2br(str) {
                let breakTag = ' ';
                return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2');
            },
            searchForEmail(textLine) {
                let cleanTextLine = textLine.replace(/\s/g, "");
                let emailRegex = /([a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z0-9_-]+)/gi;
                if (cleanTextLine.match(emailRegex)) {
                    cleanTextLine = cleanTextLine.replace(/[&\/\\#,+()$~%'":*?<>{}]/g, '');
                    cleanTextLine = cleanTextLine.replace('Email', '');
                    this.personalInfo.email = cleanTextLine;
                }
            },
            searchForPhone(textLine) {
                let cleanTextLine = textLine.replace(/\s/g, "");
                cleanTextLine = cleanTextLine.replace(/-/g, "");
                let phoneRegex = /(?:(?:\+?([1-9]|[0-9][0-9]|[0-9][0-9][0-9])\s*(?:[.-]\s*)?)?(?:\(\s*([2-9]1[02-9]|[2-9][02-8]1|[2-9][02-8][02-9])\s*\)|([0-9][1-9]|[0-9]1[02-9]|[2-9][02-8]1|[2-9][02-8][02-9]))\s*(?:[.-]\s*)?)?([2-9]1[02-9]|[2-9][02-9]1|[2-9][02-9]{2})\s*(?:[.-]\s*)?([0-9]{4})(?:\s*(?:#|x\.?|ext\.?|extension)\s*(\d+))?/;
                let arrayOfNumbers = cleanTextLine.match(phoneRegex);
                if (arrayOfNumbers) {
                    cleanTextLine = cleanTextLine.replace(/\D/g, '');
                    this.personalInfo.phone = cleanTextLine;
                }
            },
            searchForLinks(textLine) {
                let cleanTextLine = textLine.replace(/\s/g, "");
                let linkRegex = /(https?:\/\/(?:www\.|(?!www))[^\s]+\.[^\s]{2,}|www\.[^\s]+\.[^\s]{2,}|[^\s]+\.com|[^\s]+\.net|[^\s]+\.org|[^\s]+\.gov)/gi;
                let link = cleanTextLine.match(linkRegex);
                if (link !== null) {
                    // check and remove if email  :
                    let emailRegex = /([a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z0-9_-]+)/gi;
                    if (!emailRegex.test(cleanTextLine)) {
                        this.freelancerData.links.push(cleanTextLine);
                    }
                }

                this.freelancerData.links = Array.from(new Set(this.freelancerData.links))
            },
            searchForCountry(textLine) {
                // check if any word of the text line is a country name
                let cleanTextLine = textLine.replace(/\s/g, "");
                cleanTextLine = cleanTextLine.replace(/-/g, "");
                for (let i = 0; i < this.countryList.length; i++) {
                    let countryRegex = new RegExp(this.countryList[i], 'ig');
                    if (countryRegex.test(cleanTextLine)) {
                        this.personalInfo.location = this.countryList[i];
                        break;
                    }
                }

            },
            searchForJobTitle(textLine) {
                let cleanTextLine = textLine.replace(/\s/g, "");
                let jobTitleRegex = /developer|designer|programmer|senior|junior|middle|full-stack/ig;
                if (jobTitleRegex.test(cleanTextLine)) {
                    this.personalInfo.designation = textLine
                }
            },
            searchForSkills(textLine) {
                let cleanTextLine = textLine.replace(/\s/g, "");
                let skillRegex = new RegExp(this.skillsList.join('|'), 'ig');
                let skills = cleanTextLine.match(skillRegex);
                if (skills !== null) {
                    this.sections.forEach( (section) => { section.title === 'skills' ? section.selected = true : ''} );
                    this.freelancerData.skills.push(...skills);
                }
                // filter repeated elements in skills :
                this.freelancerData.skills = Array.from(new Set(this.freelancerData.skills))
            },
            searchForLanguages(textLine) {
                let cleanTextLine = textLine.replace(/\s/g, "");
                let languageRegex = new RegExp(this.languages.join('|'), 'ig');
                let languages = cleanTextLine.match(languageRegex);
                if (languages !== null) {
                    this.sections.forEach( (section) => { section.title === 'languages' ? section.selected = true : ''} );
                    this.freelancerData.languages.push(...languages);
                }
                // filter repeated elements in languages :
                this.freelancerData.languages = Array.from(new Set(this.freelancerData.languages))
            },


            // edit function
            openEdit(section) {
                section.edited = true ;
            },
            closeEdit(section) {
                section.edited = false ;
            },
            removeSkill(index){
                this.freelancerData.skills.splice(index,1);
            },
            removeLanguage(index){
                this.freelancerData.languages.splice(index,1);
            },


            // import available Data:
            async importAvailableData(){
                if(this.importingExtractedData){
                    return;
                }

                this.importingExtractedData = true;

                this.errors = {};

                await this.savePersonalData()
                    .then( () => {
                        return this.saveSkills();
                    })
                    .then( () => {
                        return this.saveLanguages();
                    })
                    .then( () => {
                        return this.saveEducation();
                    })
                    .then( () => {
                        return this.saveWork();
                    })
                    .then( () => {
                        this.updateUserInfo();
                    })
            },


            // saving data:
            async savePersonalData() {
                if(!this.isSectionSelected('profile')){
                    return;
                }
                let validatedData = {
                    user_id : this.$store.state.user.id
                };

                $.each( this.personalInfo , (key,value) => {
                    if(value.length > 0){
                        validatedData[key] = value ;
                    }
                });

                await axios.put('/api/user/personal-info',validatedData)
                    .then((response) => {

                    })
                    .catch((error) => {
                        if (typeof error.response.data === 'object') {
                            this.errors = error.response.data.errors;
                        } else {
                            this.errors = 'Something went wrong. Please try again.';
                        }
                    });

            },
            async saveSkills() {
                if(!this.isSectionSelected('skills')){
                    return;
                }

                let skills = [];

                this.freelancerData.skills.forEach( (skill_title) => {
                    skills.push({
                        title: skill_title,
                        user_id: this.$store.state.user.id,
                        category:'programming_languages',
                        percentage:85
                    });
                });

                await axios.post('/api/user/skills-many', skills)
                    .then((response) => {

                    })
                    .catch((error) => {
                        if (typeof error.response.data === 'object') {
                            this.errors = error.response.data.errors;
                        } else {
                            this.errors  = 'Something went wrong. Please try again.';
                        }
                    });
            },
            async saveLanguages() {
                // we have only the language title
                if(!this.isSectionSelected('languages')){
                    return;
                }

                await axios.post('/api/user/languages-many', {langs: this.freelancerData.languages, 'user_id' : this.$store.state.user.id})
                    .then((response) => {

                    })
                    .catch((error) => {
                        if (typeof error.response.data === 'object') {
                            this.errors = error.response.data.errors;
                        } else {
                            this.errors = 'Something went wrong. Please try again.';
                        }
                    });
            },
            async saveEducation() {
                // we have only the language title
                if(!this.isSectionSelected('education')){
                    return;
                }

                await axios.post('/api/user/education-many', this.educations )
                    .then((response) => {

                    })
                    .catch((error) => {
                        if (typeof error.response.data === 'object') {
                            this.errors = error.response.data.errors;
                        } else {
                            this.errors = 'Something went wrong. Please try again.';
                        }
                    });
            },
            async saveWork() {
                // we have only the language title
                if(!this.isSectionSelected('work_experience')){
                    return;
                }

                await axios.post('/api/user/work-experience-many', this.work_experience )
                    .then((response) => {
                        this.importingExtractedData = false;
                    })
                    .catch((error) => {
                        this.importingExtractedData = false;
                        if (typeof error.response.data === 'object') {
                            this.errors = error.response.data.errors;
                        } else {
                            this.errors = 'Something went wrong. Please try again.';
                        }
                    });
            },

            isSectionSelected(section_title){
                let selectedSections = this.sections.filter( (item) => { return item.selected});
                let selected = false;
                selectedSections.forEach( (section) => {
                    if(section.title === section_title){
                        selected =  true;
                    }
                });

                return selected;
            },
            updateUserInfo(){
                if(Object.keys(this.errors).length === 0){
                    this.$store.dispatch('setCurrentUser',{});
                    this.$store.dispatch('flyingNotification');
                    this.clearAll();
                }else{
                    console.log(this.errors);
                    this.$store.dispatch('flyingNotification', {
                        message: 'Error',
                        iconSrc: '/images/resume_builder/error.png'
                    });
                }
            },
        },
        mounted() {

        }
    }
</script>

<style scoped lang="scss">
    @import '../../../../../sass/media-queries';

    .content-container{
        width: 100%;
        @include lt-sm {
            width: 96%;
            margin: auto;
        }
    }
    .pay-content {
        &.shortened{
            height: 220px;
        }
        height: 420px;
        background: #fff;
        box-shadow: 0px 5px 100px rgba(0, 16, 131, 0.1);
        padding: 50px;
        margin-bottom: 70px;
        scroll-behavior: smooth;
        -webkit-transition: all 1s;
        -moz-transition: all 1s;
        -ms-transition: all 1s;
        -o-transition: all 1s;
        transition: all 1s;
        @media screen and (max-width: 768px) {
            padding: 20px;
        }
    }

    .card-main {
        box-shadow: 0 5px 100px rgba(0, 16, 131, 0.1) !important;
        @media screen and (max-width: 1903px) {
            width: auto;
        }
    }

    .import-tab-item{
        .title {
            display: flex;
            align-items: center;

            @include lt-sm{
                align-items: flex-start;
                img{
                    margin-top: 6px;
                }
            }

            img {
                width: 24px;
                height: 24px;
                margin-right: 6px;
            }

            span {
                font-weight: 500;
                font-size: 22px;
                line-height: 30px;
                color: #888DB1;
            }
        }

        .dropzone-area{
            display: flex;
            flex-direction: column;
            padding: 30px;
            max-width: 600px;
            margin-top: 20px;
            background: #F8F8FF;
            border-radius: 10px;

            .import-btn{
                margin-bottom: 30px;
                .civie-btn{
                    width: 160px !important;
                }
            }
        }
    }


    .outer-container {
        width: 100%;
        background: #FFFFFF;
        padding: 40px 30px 40px 40px;
        border: solid whitesmoke 0.5px;
        box-shadow: 0 5px 100px rgba(0, 16, 131, 0.1);

        &.information-container{
            margin-bottom: 60px;
            .dns-main-content-container {
                height: 700px;
            }
        }

        @media screen and (max-width: 1024px){
            padding: 20px 10px 20px 20px;
        }

        .title {
            display: flex;
            align-items: flex-end;

            img {
                width: 24px;
                height: 24px;
                margin-right: 6px;
            }

            span {
                font-weight: 500;
                font-size: 22px;
                line-height: 30px;
                color: #888DB1;
            }
        }

        @include lt-sm {
            width: 96%;
            margin: auto;
        }

        .dns-main-content-container {
            margin-top: 25px;
            border-radius: 0;
            height: 350px;

            .dns-main-content {
                margin-right: 20px;

                .dns-table {
                    width: 100%;
                    border: 1px solid #E6E8FC;
                    box-shadow: 0px 5px 20px rgba(0, 16, 131, 0.06);

                    .center-col {
                        display: flex;
                        width: 100%;
                        height: 100%;
                        align-items: center;
                        justify-content: center;

                        img:hover {
                            cursor: pointer;
                        }

                        @media screen and (max-width: 1024px){
                            img{
                                width: 25px;
                                height: 25px;
                                margin-right: 5px;
                            }
                        }
                    }

                    .left-col {
                        display: flex;
                        width: 100%;
                        min-width:250px;
                        height: 100%;
                        align-items: center;
                        justify-content: flex-start;
                        padding-left: 20px;
                    }

                    .sm-col {
                        width: 130px;
                    }

                    thead {
                        background: #F2F3FF;

                        tr {
                            th {
                                font-weight: 600;
                                font-size: 18px;
                                line-height: 25px;
                                color: #888DB1;
                                border: 0;
                                height: 70px;
                            }
                        }
                    }

                    tbody {
                        tr {
                            td {
                                font-weight: normal;
                                font-size: 18px;
                                line-height: 25px;
                                color: #888DB1;
                                height: 70px;
                                @media screen and (max-width: 1024px){
                                    font-size: 14px;
                                    line-height: 14px;
                                }
                            }

                            &:hover {
                                background: rgba(249, 249, 255, 1);
                            }
                        }
                    }

                    .table-file {
                        display: flex;
                        align-items: center;
                        height: 100%;
                        padding-left: 20px;

                        img {
                            width: 30px;
                            height: 28px;
                            margin-right: 20px;

                            &:hover {
                                cursor: grab;
                            }
                        }

                        span {
                            font-weight: normal;
                            font-size: 18px;
                            line-height: 25px;
                            color: #888DB1;
                        }
                    }
                }

            }

        }
    }



</style>


<!-- extract styles -->
<style scoped lang="scss">
    @import '../../../../../sass/media-queries';

    $activeColor: #001CE2;

    .pre-formatted {
        white-space: pre-line;
    }


    .progress-bar-wrapper {
        margin-top: 78px;
        display: flex;
        align-items: center;
        width: 958px;

        .upload-progress-bar {
            width: 1%;
            height: 5px;
            border-radius: 5px;
            background: #081FE2;
        }

        .progress-bar-value {
            font-weight: normal;
            font-size: 38px;
            text-align: left;
            color: #081fe2;
            margin-left: 22.5px;
            margin-bottom: 10px;
        }
    }

    .file-name {
        display: flex;
        align-items: center;
        margin-top: 32px;
        padding-bottom: 101px;
        font-size: 20px;
        color: #081fe2;

        img {
            width: 25px;
            height: 25px;
            margin-right: 15px;

        }

        img.close {
            width: 16px;
            height: auto;
            position: relative;
            right: -100px;
            margin-bottom: 5px;

            &:hover {
                cursor: pointer;
            }
        }
    }

    .import-from-linkedIn{
        .input{
            input{
                border: 2px solid blue;
                max-width: 600px;
                border-radius: 10px;
                height: 70px;
                width: 100%;
                margin-top: 10px;
                padding-left: 10px;
                &:focus{
                    outline: 0;
                }
            }
        }

        a.disabled{
            &:hover{
                cursor: not-allowed;
            }
        }

        .btn{
            max-width: 120px !important;
            a{
                &:focus{
                    outline:none;
                }
            }
        }
    }

    .import-cv-wrapper {
        width: 100%;


        .title {
            display: flex;
            align-content: center;
            font-weight: 600;
            font-size: 40px;
            text-align: left;
            color: #081fe2;

            @include lt-md {
                font-size: 30px;
            }

            span {
                font-weight: 500;
                margin-left: 10px;
            }

            img {
                width: 49.79px;
                height: 49.79px;
                margin-right: 28px;
            }
        }

        .eye-icon {
            width: fit-content;
            max-height: 50px;
            margin-top: 5px;

            img {
                width: fit-content;
                padding: 10px;
                border: whitesmoke solid 2px;
                border-radius: 10px;

                &:hover {
                    cursor: pointer;
                }
            }

            .custom-tooltip {
                position: relative;
                bottom: 190%;
                left: 50%;
                border-radius: 5px;
                padding: 5px;
                width: 140px;
                background-color: black;
                color: #fff;
                text-align: center;
                margin-left: -77px;

                &::after {
                    content: "";
                    position: absolute;
                    top: 100%;
                    left: 50%;
                    margin-left: -5px;
                    border-width: 5px;
                    border-style: solid;
                    border-color: black transparent transparent transparent;
                }
            }
        }


        .import-action-btns {
            margin-top: 70px;
            display: flex;
            align-items: flex-start;
            flex-direction: column;
            width: 100%;
            height: auto;
            background: whitesmoke;
            &.no-background{
                background: none;
                padding: 0;
                margin-top: 30px;
            }
            padding: 60px 70px;

            .d-flex {
                justify-content: flex-start;
                width: 100%;

                @include lt-sm {
                    flex-wrap: wrap;
                }
            }
            @include lt-sm {
                padding: 40px;

                .btn {
                    width: 100%;
                    min-width: 90px !important;
                }
            }
            .auto-import-btn {
                margin-left: 15px;
                width: 40%;

                @include lt-sm {
                    height: 56px;
                    margin-top: 1rem;
                    width: 100%;
                }

                a {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    max-width: 260px;
                    height: 72px;

                    border: 1.5px solid #001CE2;
                    border-radius: 8px;
                    opacity: 1;
                    background: white;

                    font: 500 20px Noto Sans;
                    letter-spacing: 0;
                    color: #001CE2;

                    @include lt-sm {
                        padding: 10px 15px;
                        font-size: 10px;
                        height: 56px;
                    }

                    &.short{
                        width:200px;
                    }

                    span {
                        font-weight: 600;
                        margin-left: 6px;
                        margin-right: 6px;
                    }

                    img {
                        // width: 31.12px;
                        // height: 31.12px;
                        margin-right: 18.5px;
                    }

                    img.extract {
                        width: 50.74px;
                        height: 32.74px;
                        margin-left: 34px;

                        @include lt-md {
                            margin-left: 18px;
                            height: 16px;
                            width: auto;
                        }
                    }
                }
            }



        }

        .import-results {
            .title {
                display: flex;
                align-items: center;
                font-weight: 600;
                font-size: 36px;
                text-align: left;
                color: #081fe2;

                span {
                    font-weight: 300;
                }
            }

            .sections {

                width: 100%;
                height: auto;
                background: whitesmoke;
                padding: 60px 70px;

                .section {
                    display: flex;
                    align-items: flex-start;
                    border-bottom: 1px solid #EEEEEE;
                    padding-bottom: 16px;
                    padding-top: 16px;

                    .checkbox {
                        margin-right: 20px;

                        img {
                            width: 35px;
                            height: 35px;
                            margin-top: 16px;
                        }
                    }


                    .section-content {
                        line-height: normal;
                        color: #777777;
                        width: 100%;

                        .import-section-title {
                            display: flex;
                            align-items: center;
                            font-weight: bold;
                            font-size: 46px;
                            text-align: left;
                            text-transform: capitalize;
                            width: fit-content;

                            span {
                                &:hover {
                                    cursor: pointer;
                                }
                            }

                            img {
                                width: 42px;
                                height: 42px;
                                margin-left: 24px;
                                opacity: 0.6;
                                filter: grayscale(100%);

                                &:hover {
                                    cursor: pointer;
                                }
                            }
                        }

                        .section-content-items {
                            .items{
                                .content-item {
                                    display: flex;
                                    color: inherit;
                                    font-size: 24px;
                                    text-align: left;
                                    text-transform: capitalize;
                                    margin-top: 22px;

                                    .bold {
                                        font-weight: bold;
                                        margin-right: 6px;
                                    }

                                }
                            }

                            .edit-inputs{
                                display: flex;
                                flex-direction: column;
                                &.skills{
                                    flex-direction: row;
                                    flex-wrap: wrap;
                                }
                                input,textarea{
                                    font-size: 24px;
                                    margin-top:22px;
                                    width: 100%;
                                    padding:10px;
                                    border: 1px solid;
                                    border-radius: 10px;
                                    max-width: 600px;
                                    &:focus{
                                        outline: none;
                                    }
                                    &::placeholder{
                                        color: blue;
                                        opacity: 0.3;
                                    }

                                    &.checkbox{
                                        font-size: 10px;
                                        width: 20px;
                                        height: 20px;
                                        margin-top:0;
                                    }
                                }

                                .skill-item{
                                    display: flex;
                                    align-items:center;
                                    font-size: 24px;
                                    border: 1px solid;
                                    padding: 10px;
                                    margin: 10px;
                                    border-radius: 10px;

                                    img{
                                        width: 24px;
                                        height: 24px;
                                        margin-left: 8px;
                                        &:hover{
                                            cursor: pointer;
                                        }
                                    }
                                }
                            }

                        }


                        &.active {
                            color: #081fe2;

                            .import-section-title {
                                img {
                                    filter: grayscale(0%);
                                    opacity: 1;
                                }
                            }
                        }

                    }
                }
            }
        }
    }

    .error{
        color:red;
        font-weight: bold;
        margin-top: 8px;
    }
</style>

<style lang="scss">
    .drop-zone{
        .vue-dropzone{
            border: 2px dotted #e5e4e4;
        }

        .dropzone-custom-content{
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            font-weight: 500;
            font-size: 18px;
            line-height: 32px;
            text-align: center;
            color: #888DB1;

            img{
                margin-top: 20px;
                width: 30px;
                height: 30px;
            }
        }
    }
</style>