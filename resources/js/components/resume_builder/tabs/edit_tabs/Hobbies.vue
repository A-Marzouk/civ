<template>
    <div id="hobbiesSection">
        <div class="section-title">
            <div class="title-light">Add</div>
            <h2>Hobbies</h2>
        </div>
        <div class="section-body-wrapper">
            <div class="add-award-section">
                <div class="civ-input">
                    <label for="category">Category</label>
                    <div class="civ-custom-select">
                        <div class="civ-select-input" @click="showCategoryOptions = !showCategoryOptions">
                            <input type="text" id="category" disabled placeholder="Soccer" v-model="hobby.category" :class="{'with-border' : !showCategoryOptions}">
                            <img src="/images/resume_builder/arrow-down.png" alt="arrow" :class="{'toggled':showCategoryOptions}">
                        </div>
                        <div class="civ-custom-options" v-show="showCategoryOptions">
                            <div v-for="(category,index) in categoryOptions" :key="index + '_category'" @click="selectCategory(category.title)">
                                {{category.title}}
                            </div>
                        </div>
                    </div>
                    <div class="error" v-if="errors.new.category">
                        {{ Array.isArray(errors.new.category) ? errors.new.category[0] : errors.new.category}}
                    </div>
                </div>
                <div class="award-input">
                    <label for="awardTitle">New Hobby</label>
                    <input type="text" id="awardTitle" v-model="hobby.title">
                    <div class="error" v-if="errors.new.title">
                        {{ Array.isArray(errors.new.title) ? errors.new.title[0] : errors.new.title}}
                    </div>
                </div>
                <div class="action-btns">
                    <a class="btn btn-filled" href="javascript:void(0)" @click="addHobby">
                        <img class="icon" src="/images/resume_builder/work-ex/mark.png" alt="add">
                        Add hobby now
                    </a>
                    <!-- <a class="btn btn-outline" href="javascript:void(0)">
                        Cancel
                    </a> -->
                </div>
            </div>

            <div class="work-ex-list">
                <div class="work-ex-item" v-for="hobby in hobbies" :key="hobby.id + 'hobby_key' ">
                   <div class="d-flex justify-content-between">
                       <div class="d-flex">
                           <div class="work-ex-info">
                               <div class="work-ex-title">
                                   {{hobby.title}} <small>{{hobby.category}}</small>
                               </div>
                                <div class="optionsBtns showOnMd">
                                    <a href="">
                                        <svg-vue class='icon' :icon="'edit-icon'"></svg-vue>
                                    </a>

                                    <a href="">
                                        <svg-vue class='icon' :icon="'trash-delete-icon'"></svg-vue>
                                    </a>
                                </div>
                           </div>
                       </div>
                       <div class="options hideOnMd">
                           <div class="options-btn NoDecor"
                                @click="optionHobbyId === hobby.id ? optionHobbyId=0 : optionHobbyId=hobby.id">
                               <a href="javascript:void(0)" :class="{'opened':optionHobbyId === hobby.id}">
                                   Options
                                   <img src="/images/resume_builder/arrow-down.png" alt=""
                                        :class="{'optionsOpened':optionHobbyId === hobby.id}">
                               </a>
                           </div>
                           <div class="extended-options" v-show="optionHobbyId === hobby.id"
                                :class="{'opened':optionHobbyId === hobby.id}">
                               <div class="edit-btn NoDecor" @click="editHobby(hobby)">
                                   <img src="/images/resume_builder/edit-icon.png" alt="edit icon">
                                   Edit
                               </div>
                               <div class="delete-btn NoDecor" @click="deleteHobby(hobby)">
                                   <img src="/images/resume_builder/delete-icon.png" alt="delete icon">
                                   Delete
                               </div>
                           </div>
                       </div>
                   </div>

                    <div class="editForm">
                        <div class="add-award-section mt-0 mb-5" v-show="editedHobby.id === hobby.id">
                            <div class="award-input short">
                                <label>Category</label>
                                <input type="text" v-model="editedHobby.category" required>
                                <div class="error" v-if="errors.edit.category">
                                    {{ Array.isArray(errors.edit.category) ? errors.edit.category[0] : errors.edit.category}}
                                </div>
                            </div>
                            <div class="award-input">
                                <label>Title</label>
                                <input type="text" v-model="editedHobby.title">
                                <div class="error" v-if="errors.edit.title">
                                    {{ Array.isArray(errors.edit.title) ? errors.edit.title[0] : errors.edit.title}}
                                </div>
                            </div>
                            <div class="action-btns d-flex flex-row">
                                <div class="add-award-btn NoDecor">
                                    <a href="javascript:void(0)" @click="applyEdit">
                                        <img src="/images/resume_builder/work-ex/mark.png" alt="mark">
                                        Save
                                    </a>
                                </div>
                                <div class="auto-import-btn NoDecor">
                                    <a href="javascript:void(0)" @click="cancelEdit">
                                        Cancel
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
    export default {
        name: "Hobbies",
        data() {
            return {
                hobby: {
                    category: 'select',
                    title: ''
                },
                categoryOptions:[
                    {
                        title:'Sports',
                        value:'sports'
                    },
                    {
                        title:'Ice skating',
                        value:'ice_skating'
                    },
                    {
                        title:'Cycling',
                        value:'cycling'
                    },
                    {
                        title:'Parkour',
                        value:'parkour'
                    }
                ],
                showCategoryOptions:false,
                optionHobbyId: 0,
                editedHobby: {},
                errors: {
                    new: {},
                    edit: {}
                }
            }
        },
        computed: {
            hobbies() {
                return this.$store.state.user.hobbies;
            }
        },
        methods: {
            selectCategory(title){
                this.hobby.category = title;
                this.showCategoryOptions = false;
            },
            addHobby() {
                if (this.validateHobby()) {
                    axios.post('/api/user/hobbies', this.hobby)
                        .then((response) => {
                            let addedHobby = response.data.data;
                            this.hobbies.push(addedHobby);
                            this.clearHobby();
                            this.$store.dispatch('fullScreenNotification');
                        })
                        .catch((error) => {
                            if (typeof error.response.data === 'object') {
                                this.errors.new = error.response.data.errors;
                            } else {
                                this.errors.new  = 'Something went wrong. Please try again.';
                            }
                        });
                }
            },
            validateHobby() {
                this.errors = {
                    new:{},
                    edit:{}
                };

                if (this.hobby.title && this.hobby.category) {
                    return true;
                }

                if (!this.hobby.title) {
                    this.errors.new.title = 'Title required.';
                }
                if (!this.hobby.category) {
                    this.errors.new.category = 'Category required.';
                }

                return false;
            },
            clearHobby() {
                this.hobby = {
                    category: '',
                    title: ''
                };
            },

            editHobby(hobby) {
                this.editedHobby = {
                    id: hobby.id,
                    category: hobby.category,
                    title: hobby.title
                };
                this.closeOptionsBtn();
            },
            applyEdit() {
                axios.put('/api/user/hobbies', this.editedHobby)
                    .then((response) => {
                        this.EditedSuccessfully(response.data.data);
                        this.clearErrors();
                        this.$store.dispatch('fullScreenNotification');
                    })
                    .catch((error) => {
                        if (typeof error.response.data === 'object') {
                            this.errors.edit = error.response.data.errors;
                        } else {
                            this.errors = 'Something went wrong. Please try again.';
                        }
                    });
            },
            deleteHobby(hobby) {
                if (!confirm('Do you want to delete this hobby [' + hobby.title + '] ?')) {
                    return;
                }
                axios.delete('/api/user/hobbies/' + hobby.id)
                    .then((response) => {
                        this.$store.dispatch('flyingNotificationDelete');
                        this.hobbies.forEach( (hobby,index) => {
                            if(hobby.id === response.data.data.id){
                                this.hobbies.splice(index,1);
                            }
                        });

                        this.closeOptionsBtn();
                    })
                    .catch(error => {
                        console.log(error);
                    })
            },

            EditedSuccessfully(editedHobby) {
                this.clearEditedHobby();
                // replace the edited hobby with the new one:
                this.hobbies.forEach((hobby, index) => {
                    if (hobby.id === editedHobby.id) {
                        this.hobbies[index] = editedHobby;
                    }
                });
            },
            closeOptionsBtn() {
                this.optionHobbyId = 0;
                this.clearErrors();
            },
            clearEditedHobby() {
                this.editedHobby = {};
            },
            cancelEdit() {
                this.clearEditedHobby();
                this.closeOptionsBtn();
            },
            clearErrors () {
                this.errors = {
                    new:{},
                    edit:{}
                }
            }
        },
        mounted() {
            $('#hobbiesSection').on('click',  (e) => {
                if(this.showCategoryOptions && !$(e.target).parents('.civ-input').length){
                    this.showCategoryOptions = false;
                }
            })
        }
    }
</script>

<style scoped lang="scss">
@import '../../../../../sass/media-queries';
$mainBlue: #001CE2;

#hobbiesSection {
    width: 100%;

    .section-body-wrapper {
        max-width: 1337px;
        width: 100%;

        .add-award-section {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            margin-top: 71px;

            @media (max-width: 1580px) {
                flex-wrap: wrap;
            }

            .action-btns {
                display: flex;
                justify-content: space-between;
                width: 38%;

                @media (max-width: 1580px) {
                    margin-top: 1.5rem;
                    width: 60%;
                }

                @include lt-md {
                    width: 100%;
                    max-width: 530px;
                }

                .btn {
                    width: 48%;
                    min-width: 240px;
                    max-width: 250px;

                    @include lt-sm {
                        min-width: 150px;
                        max-width: 138px;
                        height: 52px;
                        font-size: 12px !important;
                    }
                }

                .btn-filled {
                    margin-right: 1rem;
                }
            }

            .award-input {
                width: 40%;
                margin-right: 1rem;

                @media (max-width: 1580px) {
                   width: 55%;
                   margin-right: 0;
                }

                @include lt-md {
                    width: 100%;
                    margin-top: 1rem;
                    display: flex;
                    flex-wrap: wrap;
                }

                input, select {
                    max-width: 530px;
                    width: 100%;  
                    height: 76px;
                    border: 2px solid #505050;
                    border-radius: 10px;
                    opacity: 1;
                    padding-left: 18px;
                    margin-right:30px;

                    @include lt-md {
                        width: 100%;
                        border-color: $mainBlue;
                        margin-right: 0;
                    }

                    @include lt-sm {
                        font-size: 14px;
                    }
                }
                input:focus,select:focus {
                    outline: none;
                }

                label {
                    text-align: left;
                    font: 600 22px Noto Sans;
                    letter-spacing: 0;
                    color: #505050;
                    opacity: 1;

                    @include lt-md {
                        margin-bottom: 20px;
                        width: 100%;
                        color: $mainBlue;
                        font-size: 18px;
                    }

                    @include lt-sm {
                        font-size: 12px;
                    }
                }
            }
            .award-input.short{
                select,input {
                    width: 269px;
                }
            }



            .add-award-btn {
                margin-right: 31px;
                margin-bottom: 7px;
                a {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    width: 247px;
                    height: 62px;

                    background: #001CE2 0% 0% no-repeat padding-box;
                    border-radius: 8px;

                    font: 600 19px Noto Sans;
                    letter-spacing: 0;
                    color: #FFFFFF;
                    opacity: 1;

                    img {
                        width: 27px;
                        height: 27px;
                        margin-right: 10px;
                    }
                }
            }

            .auto-import-btn {
                margin-bottom: 7px;
                a {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    width: 226px;
                    height: 62px;

                    border: 2px solid #001CE2;
                    border-radius: 8px;
                    opacity: 1;

                    font: 600 19px Noto Sans;
                    letter-spacing: 0;
                    color: #001CE2;

                    img {
                        width: 27px;
                        height: 27px;
                        margin-right: 10px;
                    }
                }
            }

        }
        .work-ex-list{
            margin-top: 64px;


            .work-ex-item{
                position: relative;
                display: flex;
                justify-content: flex-start;
                max-width: 757px;
                width: 100%;
                margin-bottom: 40px;

                .item-grid {
                    width: 100%;
                    display: grid;
                    grid-template-columns: 38px 1fr;
                    grid-gap: 18px;

                    @include lt-sm {
                        grid-gap: 6px;
                    }
                }

                .work-icon{
                    width: 100%;
                    margin-top: 10px;

                    img {
                        width: 100%;
                        height: auto;
                    }

                    @include lt-md {
                        img {
                            width: 34px;
                        }
                    }

                    @include lt-sm {
                        grid-gap: 12px;
                        
                        img {
                            width: 28px;
                        }
                    }
                }

                .work-ex-info{

                    .work-ex-title{
                        font: 700 30px/41px Noto Sans;
                        letter-spacing: 0;
                        color: $mainBlue;
                        margin-bottom: 12px;
                        opacity: 1;

                        @include lt-md {
                            font-size: 26px;
                        }

                        @include lt-md {
                            font-size: 16px;
                        }
                    }
                    .work-ex-sub-title{
                        font: 700 19px Noto Sans;
                        letter-spacing: 0;
                        color: #3C3748;
                        opacity: 1;
                        margin-bottom: 16px;

                        @include lt-md {
                            font-size: 18px;
                        }

                        @include lt-md {
                            font-size: 14px;
                        }
                    }
                    .work-ex-detials{
                        font: 500 16px Noto Sans;
                        letter-spacing: 0;
                        color: #555060;
                        opacity: 1;

                        @include lt-md {
                            font-size: 12px;
                        }

                        @include lt-md {
                            font-size: 11px;
                        }
                    }
                }

                .optionsBtns {
                    width: 250px;
                    background: #F9F9F9;
                    box-shadow: 0 9px 12px rgba(0,0,0,.03);
                    justify-content: space-between;
                    padding: 12px 37px;
                    border-radius: 2px;
                    margin: 1rem auto 0;

                    @include lt-md {
                        display: flex !important;
                    }

                    @include lt-sm {
                        // max-width: 250px;
                        width: 100%;
                    }

                    a {
                        height: 20px;
                        display: block;

                        @include lt-sm {
                            height: 16px;
                        }

                        .icon {
                            height: 100%;
                            color: $mainBlue;
                            fill: $mainBlue;

                            path {
                                fill: $mainBlue;
                            }
                        }
                    }
                }

                .options {
                    position: absolute;
                    right: 14px;
                    top: 14px;

                    .options-btn {
                        a {
                            width: 130px;
                            height: 44px;

                            display: flex;
                            justify-content: center;
                            align-items: center;

                            background: #FFFFFF 0 0 no-repeat padding-box;
                            border: 1px solid #505050;
                            border-radius: 5px;
                            opacity: 1;

                            font: 600 13px Noto Sans;
                            letter-spacing: 0;
                            color: #505050;

                            img {
                                width: 13.3px;
                                height: 6.8px;
                                margin-left: 8px;
                            }

                            img.optionsOpened {
                                -webkit-transform: scaleY(-1);
                                transform: scaleY(-1);
                            }
                        }

                        a.opened {
                            border: 1px solid #1F5DE4;
                        }

                        a:focus {
                            outline: none !important;
                            box-shadow: none !important;
                        }
                    }

                    .extended-options {
                        background: #FFFFFF 0 0 no-repeat padding-box;
                        border: 1px solid #505050;
                        border-radius: 5px;
                        opacity: 1;
                        margin-top: 8px;
                        width: 130px;
                        height: 60px;
                        padding-top: 7px;
                        padding-left: 8px;

                        .edit-btn, .delete-btn {
                            display: flex;
                            justify-content: flex-start;
                            align-items: center;
                            font: 600 13px Noto Sans;
                            letter-spacing: 0;
                            color: #505050;

                            img {
                                width: 15.75px;
                                height: 14px;
                                margin-right: 6px;
                            }

                            &:hover {
                                cursor: pointer;
                            }
                        }

                        .delete-btn {
                            margin-top: 8px;

                            img {
                                width: 10.89px;
                                height: 14px;
                                margin-right: 9.5px;
                            }
                        }
                    }

                    .extended-options.opened {
                        border: 1px solid #1F5DE4;
                    }
                }
            }
        }
    }

    .civ-input{
        width: 32%;
        max-width:269px;
        margin-right: 30px;

        @media (max-width: 1580px) {
            width: 40%;
            margin-right: 0;
        }

        @include lt-md {
            width: 100%;
            margin-bottom: 1rem;
        }

        label{
            text-align: left;
            font: 600 22px Noto Sans;
            letter-spacing: 0;
            color: #505050;
            opacity: 1;

            @include lt-md {
                color: $mainBlue;
                margin-bottom: 20px;
                font-size: 18px;
            }

            @include lt-sm {
                font-size: 12px;
            }
        }

        .civ-custom-select{

            position: relative;

            @include lt-md {

                border-color: $mainBlue;
            }

            .civ-select-input{
                img{
                    width:24px ;
                    height:12px;
                    position: absolute;
                    top: 35px;
                    right: 20px;

                    &.toggled{
                        -webkit-transform: scaleY(-1);
                        transform: scaleY(-1);
                    }
                }

                ::placeholder {
                    opacity: .3;
                    font-weight: normal;
                }

                input{
                    width: 100%;
                    height:76px;
                    border: 1.5px #505050 solid;
                    padding-left:23px;
                    border-radius: 10px 10px 0 0;
                    border-bottom: 0;
                    color: black;
                    font-weight: bold;
                    font-size: 22px;

                    @include lt-md {
                        background: white;
                        border-color: $mainBlue;
                    }

                    @include lt-sm {
                        font-size: 14px;
                    }

                    &:focus{
                        outline: none !important;
                    }
                    &:hover{
                        cursor: pointer;
                    }

                    &.with-border{
                        border-bottom: 1.5px #505050 solid;
                        border-radius: 10px;

                        @include lt-md {

                            border-color: $mainBlue;
                        }
                    }
                }

            }

            .civ-custom-options{
                background: #f8fafc;
                position: absolute;
                border: 1.5px #505050 solid;
                border-radius: 0 0 10px 10px;
                opacity: 1;
                margin-top: 0;
                width:269px;
                border-top: 0;
                height: auto;

                @include lt-md {
                    border-color: $mainBlue;
                }

                div{
                    font-size: 22px;
                    padding-left: 23px;
                    margin-left: 1px;

                    @include lt-sm {
                        font-size: 14px;
                    }

                    &:hover{
                        cursor: pointer;
                        background: lightcyan;
                    }

                    &:last-child:hover{
                        border-radius:0 0 10px 10px ;
                    }
                }
            }
        }

    }
}


    .error {
        position: absolute;
        color: red;
        font-weight: 600;
        margin-left: 5px;
    }

    .fade-enter-active, .fade-leave-active {
        transition: opacity .5s;
    }
    .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
        opacity: 0;
    }
</style>
