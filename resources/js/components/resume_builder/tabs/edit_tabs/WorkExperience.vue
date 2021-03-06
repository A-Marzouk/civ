<template>
    <div class="work-container" id="worksSection">

        <div class="d-flex reverse-on-phone">
            <!-- Tabs -->
            <v-tabs class="resume-builder__tab-bar" hide-slider height="51">
                <v-tab class="resume-builder__tab tabName" v-for="tab in tabs" :key="tab" @click="setWorkCategory(tab)">
                    {{tab}}
                </v-tab>
            </v-tabs>
        </div>

        <div class="outer-container resume-builder__scroll" v-if="works">
            <div class="links-content">
                <div class="link-inputs-row">
                    <div class="inputs">
                        <div class="left">
                            <v-text-field
                                    class="resume-builder__input civie-input"
                                    outlined
                                    color="#001CE2"
                                    placeholder="Company"
                                    :class="{'resume-builder__input--disabled': false}"
                                    :disabled="false"
                                    label="Company Name"
                                    :error="!!errors.company_name"
                                    :error-messages="errors.company_name"
                                    v-model="newWork.company_name"
                            >
                            </v-text-field>

                            <v-text-field
                                    class="resume-builder__input civie-input"
                                    outlined
                                    color="#001CE2"
                                    placeholder="Job Title"
                                    :class="{'resume-builder__input--disabled': false}"
                                    :disabled="false"
                                    label="Job Title"
                                    :error="!!errors.job_title"
                                    :error-messages="errors.job_title"
                                    v-model="newWork.job_title"
                            >
                            </v-text-field>

                            <v-text-field
                                    class="resume-builder__input civie-input"
                                    outlined
                                    color="#001CE2"
                                    placeholder="Website"
                                    :class="{'resume-builder__input--disabled': false}"
                                    :disabled="false"
                                    label="Website"
                                    :error="!!errors.website"
                                    :error-messages="errors.website"
                                    v-model="newWork.website"
                            >
                            </v-text-field>

                            <div class="date-group">
                                <div class="date-input">
                                    <label :class="{'error-label' : errors.date_from}">Date</label>
                                    <input type="month" class="pr-2" :class="{'error-input' : errors.date_from}" v-model="newWork.date_from">
                                </div>
                                <div class="date-input">
                                    <label :class="{'error-label' : errors.date_to}" class="light d-flex align-items-center">
                                        <input type="checkbox" class="checkbox" v-model="newWork.present"> <span class="present-text">Present</span>
                                    </label>
                                    <input type="month" class="pr-2" style="transition: all 1.5s;" :class="{'error-label' : errors.date_to, 'zero-opacity': newWork.present}"  v-model="newWork.date_to" :disabled="newWork.present"">
                                </div>
                            </div>
                        </div>

                        <div class="right">
                            <v-textarea
                                    class="ml-lg-custom3 resume-builder__input profile-input civie-textarea"
                                    outlined
                                    rows="1"
                                    auto-grow
                                    row-height="13"
                                    color="#001CE2"
                                    :class="{'resume-builder__input--disabled': false}"
                                    :disabled="false"
                                    :error="!!errors.description"
                                    placeholder="Describe your experience"
                                    :error-messages="errors.description"
                                    counter
                                    maxlength="1000"
                                    v-model="newWork.description"
                                    label="Description"
                            >
                            </v-textarea>
                        </div>
                    </div>
                    <div class="btns mt-2">
                        <v-btn class="resume-builder__btn civie-btn filled" depressed raised @click="addWorkEx">
                            {{newWork.id !== '' ? 'Update' : 'Add New'}}
                        </v-btn>

                        <v-btn class="resume-builder__btn civie-btn cancel-btn" depressed raised @click="clearWorkEx" v-show="newWork.id !== '' ">
                            Cancel
                        </v-btn>
                    </div>
                </div>
                <draggable class="education-list" v-model="works" @start="drag=true" @end="drag=false"  handle=".drag-handler">
                    <div
                            v-for="work in works"
                            v-show="work.category.toLowerCase() === activeTab.toLowerCase()"
                            class="education-item"
                            :class="{'closed' : expandedWorkID !== work.id, 'half-opacity' : !work.is_public}"
                            :key="work.id"
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
                                    {{work.company_name}},
                                    <span class="gray">{{work.website}}</span>
                                    <div class="grade-title">{{work.job_title}}</div>
                                </div>
                            </div>
                            <div
                                    class="resume-builder__action-buttons-container"
                            >
                                <v-btn
                                        class="btn-icon civie-btn"  @click="toggleWorkVisibility(work)"
                                        depressed
                                >
                                    <svg-vue
                                            icon="eye-icon"
                                            class="icon"
                                            :class="{'visible' : work.is_public}"
                                    ></svg-vue>
                                </v-btn>
                                <v-btn
                                        class="btn-icon civie-btn"  @click="editWork(work)"
                                        depressed
                                >
                                    <svg-vue
                                            icon="edit-icon"
                                            class="icon"
                                            :class="{'visible' : newWork.id === work.id}"
                                    ></svg-vue>
                                </v-btn>
                                <v-btn
                                        class="btn-icon civie-btn" @click="deleteWork(work)"
                                        depressed
                                >
                                    <svg-vue
                                            icon="trash-delete-icon"
                                            class="icon"
                                    ></svg-vue>
                                </v-btn>
                                <v-btn
                                        class="btn-icon mainBg civie-btn toogleDropdownBtn"
                                        :class="{'closed' : expandedWorkID !== work.id}"
                                        @click="toggleWorkCard(work)"
                                        depressed
                                ></v-btn>
                            </div>
                        </div>

                        <div class="education-item__content">
                            <div class="date">
                                {{ `${work.date_from}${work.present ? ' - Present' : ' - ' + work.date_to}` }}
                            </div>
                            <article class="description-text">
                                {{work.description}}
                            </article>
                        </div>
                    </div>
                </draggable>
            </div>
        </div>

    </div>
</template>

<script>
    import draggable from "vuedraggable";


    export default {
        name: "work-experience",
        components: {
            draggable
        },
        data() {
            return {
                tabs: [
                    'paid',
                    'voluntary',
                    'internship'
                ],
                newWork: {
                    id:'',
                    company_name:'',
                    job_title:'',
                    description:'',
                    website:'',
                    is_public:true,
                    date_from:'',
                    date_to:'',
                    present:false,
                },
                errors: {},
                expandedWorkID: 0,
                activeTab: 'paid',
            }
        },
        computed: {
            works: {
                get() {
                    return this.$store.state.user.work_experience;
                },
                set(works) {
                    this.$store.commit("updateWorks", works);
                }
            }
        },
        methods: {
            setWorkCategory(category){
                this.activeTab = category ;
                this.clearWorkEx();
            },
            toggleWorkVisibility(work){
                work.is_public = !work.is_public;
                axios.put("/api/user/work-experience", work)
                    .then( response => {
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
            toggleWorkCard(work){
                this.expandedWorkID === work.id ?  this.expandedWorkID = 0 :  this.expandedWorkID = work.id ;
            },
            editWork(work) {
                this.newWork = {
                    id: work.id,
                    company_name:work.company_name,
                    job_title:work.job_title,
                    description:work.description,
                    website:work.website,
                    date_from:work.date_from,
                    date_to:work.date_to,
                    present:work.present,
                }
            },
            deleteWork(work){
                if (!confirm('Do you want to delete this work ?')) {
                    return;
                }
                axios.delete('/api/user/work-experience/' + work.id)
                    .then((response) => {
                        this.$store.dispatch('flyingNotificationDelete');
                        this.works.forEach( (myWork,index) => {
                            if(myWork.id === response.data.data.id){
                                this.works.splice(index,1);
                            }
                        });


                    })
                    .catch(error => {
                        console.log(error);
                    })
            },
            addWorkEx(){
                this.errors = {};
                this.newWork.user_id = this.$store.state.user.id;
                this.newWork.category = this.activeTab;

                let edit = false;
                if (this.newWork.id !== "") {
                    edit = true;
                }

                axios.post('/api/user/work-experience', this.newWork)
                    .then((response) => {

                        if(!edit){
                            this.works.unshift(response.data.data);
                        }else{
                            this.works.forEach( (myWork,index) => {
                                if(myWork.id === response.data.data.id){
                                    this.works.splice(index, 1, response.data.data);
                                }
                            });
                        }

                        this.clearWorkEx();
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
            clearWorkEx(){
                this.newWork = {
                    id:'',
                    company_name:'',
                    job_title:'',
                    description:'',
                    website:'',
                    is_public:true,
                    date_from:'',
                    date_to:'',
                    present:false,
                }
            },
        },
        mounted() {

        }
    }
</script>

<style scoped lang="scss">
    @import '../../../../../sass/media-queries';
    @import '../../../../../sass/variables';

    $mainBlue: #001CE2;
    $inputTextColor: #888DB1;

    .ml-lg-custom3{
        
        
        @media screen and (min-width: 1468px) and (max-width: 1903px){
            margin-left: 25px !important;
        }

        @media screen and (min-width: 1441px) {
            margin-left: 25px !important;
        }
    }

    .present-text{
        margin-right: 58px;
    }

    .work-container {
        width: 100%;
    }


    .error {
        color: red;
        margin-left: 5px;
    }

    #worksSection {
        @include lt-sm{
            max-width: 94%;
            margin-right: auto;
            margin-left: auto;
        }

        .outer-container{
            height: 450px;
            overflow-y: scroll;
            padding-right:23px;
            box-shadow: 0 0 50px 0 rgba(0, 16, 131, 0.1);
            background: rgb(245, 245, 245,0.9);
        }

        .links-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            background: #fff;
            padding: 50px;

            @include lt-md{
                padding: 35px 10px;
            }

            @include lt-sm{
                padding: 12px;
            }
        }

        .tabName {
            text-transform: capitalize;
        }

        .link-inputs-row {
            width: 100%;
            .inputs{
                display: flex;
                flex-wrap: wrap;

                .civie-input, .civie-textarea, .date-group{
                    max-width: 300px;
                    min-width: 300px;

                    @media screen and (min-width: 320px) and (max-width : 370px) {
                        min-width: 280px;
                    }
                }

                .left{

                    display: flex;
                    flex-wrap: wrap;
                    justify-content: space-between;
                    max-width: 620px; //adjusted | 640px

                    @include lt-md{

                    }

                    @include lt-sm{
                        margin-top:25px;
                        justify-content: center;
                    }

                    .date-group {
                        display: flex;
                        justify-content: space-between;
                        margin-top: 28px;

                        @include lt-lg {


                        }

                        @include lt-md {

                        }


                        .date-input {
                            display: flex;
                            flex-direction: column;
                            width: 137px;
                            position: relative;

                            &:first-child{
                                margin-right: 5px;
                            }

                            @include lt-sm {

                            }

                            label {
                                text-align: left;
                                position: absolute;
                                top: -29px;
                                letter-spacing: 0;
                                font-size: 15px; // adjusted | 18px
                                font-weight: 400; //added
                                line-height: 25px;
                                color: #888DB1;
                                opacity: 1;

                                @include lt-md {
                                    font-size: 18px;
                                    color: #888DB1;
                                }
                            }

                            label.light {
                                font-size: 15px; // adjusted | 18px
                                letter-spacing: 0;
                                right: 0;
                                opacity: 1;

                                @include lt-md {
                                    color: #888DB1;
                                }
                            }

                            input {
                                height: 48px; // adjusted | 50px
                                border: none;
                                border-bottom: 1.95px solid #C4C9F5 !important;
                                border-radius: 0;
                                opacity: 1;
                                color: grey;

                                @include lt-lg {

                                }

                                @include lt-md {

                                }
                            }

                            input.error-input{
                                border: 2px solid red !important;
                            }

                            input:focus{
                                outline: none;
                            }

                            input.checkbox {
                                width: 14px;
                                height: 14px;
                                padding-left: 0;
                                margin-right: 8px;
                                @media screen and (max-width:767px){
                                    width: 18px;
                                    height: 18px;
                                }
                            }
                        }
                    }
                }

                .right{
                    margin-left: 0;
                    @include lt-xl{
                        
                    }

                    @include lt-md{

                    }

                    @include lt-sm{
                        margin-top:25px;
                        display: flex;
                        width: 100%;
                        justify-content: center;
                    }
                }
            }

            .civie-select {
                .v-input__slot {

                }

                .input-prepended-icon {


                    img {

                    }
                }
            }

            .civie-input {

                @include lt-sm{

                }
            }

            .civie-btn {


            }
        }

        .links-items {
            .link-item {
                width: 100%;
                height: 50px;
                display: flex;
                margin-bottom: 30px;
                align-items: center;
                justify-content: space-between;
                background: white;
                box-shadow: 0 5px 20px rgba(0, 16, 131, 0.15);

                .link-data {
                    display: flex;
                    height: 50px;

                    .mover {
                        width: 50px;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        border-right: 1px solid #E6E8FC;

                        img {
                            width: 12px;
                            height: 16px;
                        }

                        &:hover {
                            cursor: grab;
                        }
                    }

                    .link-text {
                        display: flex;
                        align-items: center;
                        margin-left: 10px;
                        font-size: 18px;
                        line-height: 25px;
                        color: #888DB1;

                        img {
                            width: 45px;
                            height: auto;
                        }
                    }
                }

                .action-btns {
                    margin-right: 10px;

                    .resume-builder__action-buttons-container {
                        position: static;
                    }
                }
            }

        }

        ::-webkit-calendar-picker-indicator {
            color:red;
        }
    }

    .education-list {
        display: flex;
        flex-direction: column;
        width: 100%;
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
                    word-break: break-all;
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

    .btns{
        @include lt-sm{

        }
    }

    .error-label{
        color: red !important;
    }

    .error-input{
        border: 1.5px solid red !important;
    }
</style>

<style lang="scss">
    @import '../../../../../sass/media-queries';

    .reverse-on-phone{
        @include lt-sm{
            display: flex;
            flex-direction: column-reverse;
            align-items: flex-end;
        }
    }
</style>