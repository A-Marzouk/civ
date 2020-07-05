<template data-app>
    <div
            class="education-wrapper"
    >
        <div class="float-container">
            <v-form
                    class="grid-form"
                    ref="form"
                    :lazy-validation="lazy"
            >
                <v-text-field
                        id="collegeName"
                        v-model="newEducation.university_name"
                        class="resume-builder__input civie-input"
                        outlined
                        label="Institution Name"
                        color="#001CE2"
                ></v-text-field>
                <v-text-field
                        id="gradeTitle"
                        v-model="newEducation.degree_title"
                        class="resume-builder__input civie-input"
                        outlined
                        label="Title"
                        color="#001CE2"
                ></v-text-field>
                <v-text-field
                        id="location"
                        v-model="newEducation.location"
                        class="resume-builder__input civie-input"
                        outlined
                        label="Location"
                        color="#001CE2"
                ></v-text-field>
                <v-textarea
                        id="description"
                        v-model="newEducation.description"
                        class="resume-builder__input civie-textarea"
                        outlined
                        label="Description"
                        color="#001CE2"
                ></v-textarea>
                <v-text-field
                        id="website"
                        v-model="newEducation.website"
                        class="resume-builder__input civie-input"
                        outlined
                        label="Website"
                        color="#001CE2"
                ></v-text-field>
                <div class="inputs-wrapper">
                    <div class="date-group">
                        <div class="date-input">
                            <label for="">Date</label>
                            <input type="date"  v-model="newEducation.date_from">
                            <div class="error" v-if="errors.date_from">
                                {{ Array.isArray(errors.date_from) ? errors.date_from[0] : errors.date_from}}
                            </div>
                        </div>
                        <div class="date-text">

                        </div>
                        <div class="date-input">
                            <label for="" class="light d-flex align-items-center">
                                <input type="checkbox" class="checkbox" v-model="newEducation.present"> Present
                            </label>
                            <input type="date"  v-model="newEducation.date_to" :disabled="newEducation.present">
                            <div class="error" v-if="errors.date_to">
                                {{ Array.isArray(errors.date_to) ? errors.date_to[0] : errors.date_to}}
                            </div>
                        </div>
                    </div>
                </div>
                <v-select
                        id="currentStatus"
                        class="resume-builder__input civie-select"
                        v-model="newEducation.institution_type"
                        outlined
                        placeholder="Select an option"
                        :items="institutionTypes"
                        label="Education Type"
                >
                    <button
                            class="dropdown-icon icon ml-4" @click.prevent
                            slot="append"
                    >
                        <svg-vue
                                :icon="`dropdown-caret`"
                        ></svg-vue>
                    </button>
                </v-select>
                <div>
                    <v-btn class="resume-builder__btn civie-btn filled" raised @click="addEducation">
                        {{newEducation.id !== '' ? 'Update' : 'Add New'}}
                    </v-btn>

                    <v-btn class="resume-builder__btn civie-btn ml-2" raised @click="clearEducation" v-show="newEducation.id !== '' ">
                        Cancel
                    </v-btn>
                </div>
            </v-form>
            <draggable class="education-list" v-model="educations" @start="drag=true" @end="drag=false"  handle=".drag-handler">
                <div
                        v-for="education in educations"
                        class="education-item"
                        :class="{'closed' : expandedEducationID !== education.id}"
                        :key="education.id"
                >
                    <div class="drag-handler">
                        <span class="circle"></span>
                        <span class="circle"></span>
                        <span class="circle"></span>
                    </div>

                    <div class="education-item__header">
                        <div class="description">
                            <svg-vue :icon="'work-experience-icon'" class='icon'></svg-vue>
                            <div class="school-name">
                                {{education.university_name}},
                                <span class="gray">{{education.website}}</span>
                                <div class="grade-title">{{education.degree_title}}</div>
                            </div>
                        </div>
                        <div
                                class="resume-builder__action-buttons-container"
                        >
                            <v-btn
                                    class="btn-icon civie-btn"  @click="toggleEducationVisibility(education)"
                                    depressed
                            >
                                <svg-vue
                                        icon="eye-icon"
                                        class="icon"
                                        :class="{'visible' : education.is_public}"
                                ></svg-vue>
                            </v-btn>
                            <v-btn
                                    class="btn-icon civie-btn"
                                    depressed
                                    @click="editEducation(education)"
                            >
                                <svg-vue
                                        icon="edit-icon"
                                        class="icon"
                                        :class="{'visible' : newEducation.id === education.id}"
                                ></svg-vue>
                            </v-btn>
                            <v-btn
                                    class="btn-icon civie-btn"  @click="deleteEducation(education)"
                                    depressed
                            >
                                <svg-vue
                                        icon="trash-delete-icon"
                                        class="icon"
                                ></svg-vue>
                            </v-btn>
                            <v-btn
                                    class="btn-icon mainBg civie-btn toogleDropdownBtn"
                                    :class="{'closed' : expandedEducationID !== education.id}"
                                    @click="toggleEducationCard(education)"
                                    depressed
                            ></v-btn>
                        </div>
                    </div>

                    <div class="education-item__content">
                        <div class="date">
                            {{ `${education.date_from}${education.present ? ' - Present' : ' - ' + education.date_to}` }}
                        </div>
                        <article>
                            {{education.description}}
                        </article>
                    </div>
                </div>
            </draggable>
        </div>
    </div>
</template>

<script>
    import draggable from "vuedraggable";

    export default {
        props:['activeTab'],
        components: {
            draggable
        },
        data: () => ({
            lazy: false,
            institutionTypes: ['School', 'University', 'College', 'Seminar', 'Course', 'Training'],
            newEducation: {
                id:'',
                institution_type:'',
                university_name:'',
                degree_title:'',
                description:'',
                website:'',
                date_from:'',
                date_to:'',
                present:false,
            },
            errors: {},
            expandedEducationID: 0,
        }),
        computed: {
            computedDateFormatted() {
                return this.formatDate(this.date)
            },
            educations: {
                get() {
                    return this.$store.state.user.education;
                },
                set(educations) {
                    this.$store.commit("updateEducation", educations);
                }
            }
        },
        watch: {

        },
        methods: {
            toggleInput(inputData) {
                inputData.disabled = !inputData.disabled
            },
            validate() {
                this.$refs.form.validate()
            },
            reset() {
                this.$refs.form.reset()
            },
            resetValidation() {
                this.$refs.form.resetValidation()
            },
            formatDate(date) {
                if (!date) return null

                const [year, month, day] = date.split('-')
                return `${day}/${month}/${year}`
            },
            parseDate(date) {
                if (!date) return null

                const [month, day, year] = date.split('/')
                return `${year}-${month.padStart(2, '0')}-${day.padStart(2, '0')}`
            },

        //    functions for backend
            toggleEducationCard(education){
                this.expandedEducationID === education.id ?  this.expandedEducationID = 0 :  this.expandedEducationID = education.id ;
            },
            toggleEducationVisibility(education){
                education.is_public = !education.is_public;
                axios.put("/api/user/education", education)
                    .then(response => {
                        this.$store.dispatch("flyingNotification");
                    })
                    .catch(error => {
                        if (typeof error.response.data === "object") {
                            this.errors = error.response.data.errors;
                        } else {
                            this.errors = "Something went wrong. Please try again.";
                        }
                        this.$store.dispatch("flyingNotification", {
                            message: "Error",
                            iconSrc: "/images/resume_builder/error.png"
                        });
                    });
            },
            editEducation(education) {
                this.newEducation = {
                    id:education.id,
                    institution_type:education.institution_type,
                    university_name:education.university_name,
                    degree_title:education.degree_title,
                    description:education.description,
                    website:education.website,
                    date_from:education.date_from,
                    date_to:education.date_to,
                    present:education.present,
                }
            },
            deleteEducation(education){
                if (!confirm('Do you want to delete this education ?')) {
                    return;
                }
                axios.delete('/api/user/education/' + education.id)
                    .then((response) => {
                        this.$store.dispatch('flyingNotificationDelete');
                        this.educations.forEach( (myEducation,index) => {
                            if(myEducation.id === response.data.data.id){
                                this.educations.splice(index,1);
                            }
                        });

                        this.closeOptionsBtn();
                    })
                    .catch(error => {
                        console.log(error);
                    })
            },
            addEducation(){
                this.errors = {};
                this.newEducation.user_id = this.$store.state.user.id;
                this.newEducation.category = this.activeTab;

                let edit = false;
                if (this.newEducation.id !== "") {
                    edit = true;
                }

                axios.post('/api/user/education', this.newEducation)
                    .then((response) => {

                        if(!edit){
                            this.educations.unshift(response.data.data);
                        }else{
                            this.educations.forEach( (myEducation,index) => {
                                if(myEducation.id === response.data.data.id){
                                    this.educations[index] = response.data.data;
                                }
                            });
                        }

                        this.clearEducation();
                        this.$store.dispatch('flyingNotification');
                    })
                    .catch((error) => {
                        if (typeof error.response.data === 'object') {
                            this.errors = error.response.data.errors;
                        } else {
                            this.errors  = 'Something went wrong. Please try again.';
                        }
                        this.$store.dispatch('flyingNotification', {
                            message: 'Error',
                            iconSrc: '/images/resume_builder/error.png'
                        });
                    });
            },
            clearEducation(){
                this.newEducation = {
                    id:'',
                    institution_type:'',
                    university_name:'',
                    degree_title:'',
                    description:'',
                    website:'',
                    date_from:'',
                    date_to:'',
                    present:false,
                }
            },
        }
    }
</script>

<style lang="scss">
    @import '../../../../../../sass/variables';
    @import '../../../../../../sass/media-queries';

    .education-wrapper {
        position: relative;
        padding: 60px 50px;

        @include lt-sm{
            padding: 30px 15px;
        }

        .float-container {
            background-color: $secondaryColor;
            width: 100%;
            height: 100%;
            position: relative;
            z-index: 1;
        }

        .grid-form {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            grid-auto-rows: 90px;
            gap: 20px 40px;

            .resume-builder__input {
                grid-column: span 1;
                margin-bottom: 20px;
            }

            .civie-textarea {
                height: 100%;
                grid-column: 4 / 5;
                grid-row: 1 / 3;
            }

            .civie-btn {
                align-items: start;
                justify-self: start;
            }

            .inputs-wrapper {
                display: flex;
                justify-content: space-between;
                width: 100%;

                .civie-datepicker {
                    max-width: 150px;
                }

                .input-checkbox-wrapper {
                    position: relative;
                    margin-left: 15px;

                    .civie-checkbox {
                        position: absolute;
                        left: 0;
                        top: -48px;
                        margin-top: 0;

                        .v-input--selection-controls__input {
                            margin-right: 7px;
                        }

                        .v-input--selection-controls__ripple {
                            height: 22px;
                            width: 22px;
                            top: calc(50% - 12px);
                            left: 1.19px;
                            margin: 0;
                        }

                        .v-icon {
                            font-size: 14px;
                        }

                        label {
                            font-size: 12px;
                        }
                    }
                }
            }

            // Exceptions on breakpoint
            @media (max-width: 1770px) {
                gap: 20px;
            }

            @media (max-width: 1680px) {
                .resume-builder__input,
                .inputs-wrapper {
                    grid-column: span 2;
                }

                .inputs-wrapper {
                    & > .civie-datepicker,
                    .input-checkbox-wrapper {
                        max-width: 48%;
                        width: 48%;

                        .civie-datepicker {
                            width: 100%;
                            max-width: 100%;
                        }
                    }
                }

                .civie-textarea {
                    grid-row: 3 / 5;
                }
            }

            @include lt-md {
                .civie-textarea {
                    grid-column: span 4;
                    grid-row: 4 / 6;
                }

                .inputs-wrapper {
                    grid-row: 2 / 3;
                    grid-column: 3 / 5;
                }
            }

            @media (max-width: 750px) {
                .inputs-wrapper,
                .resume-builder__input {
                    grid-column: span 4;
                }

                .civie-textarea {
                    grid-row: 7 / 9
                }
            }
        }

        .education-list {
            display: flex;
            flex-direction: column;
            margin-top: 25px;

            .education-item {
                height: auto;
                max-width: 842px;
                width: 100%;
                padding: 20px 38px 20px 60px;
                position: relative;
                margin: 15px 0;
                box-shadow: 0 5px 20px rgba($color: #001083, $alpha: 0.1);

                &.closed {
                    .education-item__content {
                        height: 0;
                        transition: height .5s ease;
                    }
                }

                .drag-handler {
                    position: absolute;
                    display: flex;
                    justify-content: center;
                    flex-direction: column;
                    align-items: center;
                    top: 11px;
                    left: 0;
                    width: 50px;
                    height: 50px;

                    &:hover {
                        cursor: grab;
                    }

                    .circle {
                        display: block;
                        background: $inputTextColor;
                        height: 2px;
                        width: 2px;
                        border: solid 0.5px $inputTextColor;
                        margin-bottom: 3px;

                        &:last-child {
                            margin: 0;
                        }
                    }
                }

                &__header {
                    display: flex;
                    justify-content: space-between;

                    .description {
                        display: flex;

                        .icon {
                            width: 24px;
                            height: 24px;
                            fill: transparent;
                            margin-top: 2px;
                            margin-right: 20px;
                        }

                        .school-name {
                            font-size: 20px;
                            color: $mainColor;
                            font-weight: bold;
                            text-transform: uppercase;

                            .gray {
                                color: $inputTextColor;
                            }

                            .grade-title {
                                font-size: 14px;
                                color: $inputTextColor;
                            }
                        }
                    }
                }

                &__content {
                    margin-top: 25px;
                    height: 120px;
                    transition: height .5s ease;
                    overflow: auto;

                    .date {
                        font-size: 14px;
                        font-style: italic;
                        color: $inputTextColor;
                    }

                    article {
                        font-size: 16px;
                        color: $inputTextColor;
                        margin-top: 20px;
                        overflow: auto;
                    }
                }

                @include lt-md {
                    padding: 20px 30px 20px 50px;

                    &__header {
                        .description {
                            .school-name {
                                font-size: 16px;
                            }
                        }
                    }
                }

                @include lt-sm {
                    padding: 17px 15px;

                    &__header {
                        flex-wrap: wrap;
                        flex-direction: column;
                        align-items: flex-end;
                        justify-content: flex-start;

                        .description {
                            width: 100%;
                            order: 2;

                            .school-name {
                                font-size: 20px;

                                .grade-title {
                                    font-size: 16px;
                                }
                            }
                        }

                        .resume-builder__action-buttons-container {
                            align-self: flex-end;
                            margin-bottom: 20px;
                        }
                    }

                    &__content {

                        article {
                            font-size: 14px;
                        }
                    }
                }
            }
        }
    }

    .date-group {
        display: flex;
        justify-content: space-between;
        margin-top: 28px;

        @include lt-lg {


        }

        @include lt-md {

        }

        .date-text {
            font: 500 26px/26px Noto Sans;
            letter-spacing: 0;
            color: #888DB1;
            opacity: 1;
            margin: 10px 9px;

            @include lt-lg {

            }

            @include lt-md {
                font-size: 16px;
            }

            @include lt-sm {
                font-size: 12px;

            }
        }

        .date-input {
            display: flex;
            flex-direction: column;
            width: 137px;
            position: relative;

            @include lt-sm {

            }

            label {
                text-align: left;
                position: absolute;
                top: -29px;
                letter-spacing: 0;
                font-weight: 500;
                font-size: 18px;
                line-height: 25px;
                color: #888DB1;
                opacity: 1;

                @include lt-md {
                    font-size: 18px;
                    color: #888DB1;
                }

                @include lt-sm {
                    font-size: 15px;
                }
            }

            label.light {
                font-size: 12px;
                letter-spacing: 0;
                opacity: 1;

                @include lt-lg {
                    font-size: 15px;
                }

                @include lt-md {
                    font-size: 11px;
                    color: #888DB1;
                }
            }

            input {
                height: 50px;
                border: 2px solid #C4C9F5 !important;
                border-radius: 10px;
                opacity: 1;
                color: #c4c9f5;
                padding-left: 12px;

                @include lt-lg {

                }

                @include lt-md {

                }
            }

            input:focus{
                outline: none;
            }

            input.checkbox {
                width: 12px;
                height: 12px;
                padding-left: 0;
                margin-right: 8px;
            }
        }
    }

</style>