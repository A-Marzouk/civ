<template>
    <div>
        <div class="section-title">
            <div class="title-light">Add</div>
            <h2>Hobbies</h2>
        </div>
        <div class="section-body-wrapper">
            <div class="add-award-section">
                <div class="award-input short">
                    <label for="category">Category</label>
                    <input type="text" id="category"  v-model="hobby.category">
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
                <div class="add-award-btn NoDecor">
                    <a href="javascript:void(0)" @click="addHobby">
                        <img src="/images/resume_builder/work-ex/mark.png" alt="add">
                        Add hobby now
                    </a>
                </div>
                <div class="auto-import-btn NoDecor">
                    <a href="javascript:void(0)">
                        <img src="/images/resume_builder/work-ex/add-box.png" alt="add">
                        Auto import
                    </a>
                </div>
            </div>

            <div class="work-ex-list">
                <div class="work-ex-item" v-for="(hobby,index) in hobbies" :key="hobby.id + 'hobby_key' ">
                   <div class="d-flex justify-content-between">
                       <div class="d-flex">
                           <div class="work-ex-info">
                               <div class="work-ex-title">
                                   {{hobby.title}} <small>{{hobby.category}}</small>
                               </div>
                           </div>
                       </div>
                       <div class="options">
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
                    category: '',
                    title: ''
                },
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
            addHobby() {
                if (this.validateHobby()) {
                    axios.post('/api/user/hobbies', this.hobby)
                        .then((response) => {
                            let addedHobby = response.data.data;
                            this.hobbies.push(addedHobby);
                            this.clearHobby();
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
            console.log(this.$store.state.user.hobbies);
        }
    }
</script>

<style scoped lang="scss">
    .section-body-wrapper {
        width: 1337px;

        .add-award-section {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            margin-top: 71px;

            .award-input {
                input,select {
                    width: 530px;
                    height: 76px;
                    border: 2px solid #505050;
                    border-radius: 10px;
                    opacity: 1;
                    padding-left: 18px;
                    margin-right:30px;
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
            margin-top: 90px;
            .work-ex-item{
                width: 757px;

                .work-icon{
                    width: 38px;
                    height: 27px;
                    margin-right: 33px;
                }

                .work-ex-info{
                    margin-right: 30px;
                    .work-ex-title{
                        font: 700 30px/41px Noto Sans;
                        letter-spacing: 0;
                        color: #001CE2;
                        margin-bottom: 12px;
                        opacity: 1;
                    }
                    .work-ex-sub-title{
                        font: 700 19px Noto Sans;
                        letter-spacing: 0;
                        color: #001CE2;
                        opacity: 1;
                        margin-bottom: 16px;
                    }
                    .work-ex-detials{
                        font: 500 16px Noto Sans;
                        letter-spacing: 0;
                        color: #001CE2;
                        opacity: 1;
                    }
                }

                .options {

                    .options-btn {
                        a {
                            width: 100px;
                            height: 40px;

                            display: flex;
                            justify-content: center;
                            align-items: center;

                            background: #FFFFFF 0 0 no-repeat padding-box;
                            border: 1px solid #505050;
                            border-radius: 5px;
                            opacity: 1;

                            font: 600 15px Noto Sans;
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
                        position: absolute;
                        background: #FFFFFF 0 0 no-repeat padding-box;
                        border: 1px solid #505050;
                        border-radius: 5px;
                        opacity: 1;
                        margin-top: 8px;
                        width: 100px;
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

    .error {
        position: absolute;
        color: red;
        font-weight: 600;
        margin-left: 5px;
    }
</style>
