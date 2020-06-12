<template>
    <div
        class="education-wrapper"
    >
        <div class="float-container">
            <v-form
                class="flex-form"
                ref="form"
                :lazy-validation="lazy"
            >
                <div class="input-group">
                    <v-text-field
                        id="collegeName"
                        v-model="form.collegeName.value"
                        class="resume-builder__input civie-input"
                        outlined
                        label="Institution Name"
                        color="#001CE2"
                        :rules="form.collegeName.rules"
                    ></v-text-field>
                    <v-text-field
                        id="website"
                        v-model="form.website.value"
                        class="resume-builder__input civie-input"
                        outlined
                        label="Website"
                        color="#001CE2"
                        :rules="form.website.rules"
                    ></v-text-field>
                </div>
                <div class="input-group">
                    <v-text-field
                        id="gradeTitle"
                        v-model="form.gradeTitle.value"
                        class="resume-builder__input civie-input"
                        outlined
                        label="Title"
                        color="#001CE2"
                        :rules="form.gradeTitle.rules"
                    ></v-text-field>

                    <div class="inputs-wrapper">
                        <v-menu
                            v-model="startDateMenu"
                            :close-on-content-click="false"
                            transition="scale-transition"
                            offset-y
                            min-width="290px"
                        >
                            <template v-slot:activator="{ on, attrs }">
                                <v-text-field
                                    v-model="form.startDate.dateFormatted"
                                    class="resume-builder__input civie-datepicker"
                                    label="Session"
                                    color="#001CE2"
                                    readonly
                                    v-on="on"
                                    v-bind="attrs"
                                    outlined
                                    placeholder="dd/mm/yyyy"
                                    @blur="form.startDate.value = parseDate(form.startDate.dateFormatted)"
                                >
                                    <button
                                        class="dropdown-icon icon"
                                        slot="append"
                                    >
                                        <svg-vue
                                            :icon="`dropdown-caret`"
                                        ></svg-vue>
                                    </button>
                                </v-text-field>
                            </template>
                            <v-date-picker v-model="form.startDate.value" @input="startDateMenu = false" no-title scrollable color="#001CE2"></v-date-picker>
                        </v-menu>                    
                        <div class="input-checkbox-wrapper">
                            <v-menu
                                v-model="endDateMenu"
                                :close-on-content-click="false"
                                transition="scale-transition"
                                offset-y
                                min-width="290px"
                            >
                                <template v-slot:activator="{ on, attrs }">
                                    <v-text-field
                                        v-model="form.endDate.dateFormatted"
                                        class="resume-builder__input civie-datepicker"
                                        color="#001CE2"
                                        readonly
                                        v-on="on"
                                        v-bind="attrs"
                                        outlined
                                        placeholder="dd/mm/yyyy"
                                        @blur="form.endDate.value = parseDate(form.endDate.dateFormatted)"
                                    >
                                        <button
                                            class="dropdown-icon icon"
                                            slot="append"
                                        >
                                            <svg-vue
                                                :icon="`dropdown-caret`"
                                            ></svg-vue>
                                        </button>
                                    </v-text-field>
                                </template>
                                <v-date-picker v-model="form.endDate.value" @input="endDateMenu = false" no-title scrollable color="#001CE2"></v-date-picker>
                            </v-menu>
                            <v-checkbox
                                v-model="form.actuallyStudying"
                                class="resume-builder__input civie-checkbox"
                                label="Actually Studying"
                                color="#001CE2"
                            ></v-checkbox>
                        </div>
                    </div> 
                </div>
                <div class="input-group">
                    <v-text-field
                        id="location"
                        v-model="form.location.value"
                        class="resume-builder__input civie-input"
                        outlined
                        label="Location"
                        color="#001CE2"
                        :rules="form.location.rules"
                    ></v-text-field>
                    <v-select
                        id="currentStatus"
                        class="resume-builder__input civie-select"
                        v-model="form.currentStatus.value"
                        outlined
                        placeholder="Select an option"
                        :items="currentStatusOptions"
                        label="Current Status"
                    >
                        <button
                            class="dropdown-icon icon"
                            slot="append"
                        >
                            <svg-vue
                                :icon="`dropdown-caret`"
                            ></svg-vue>
                        </button>
                    </v-select>
                </div>
                <div class="input-group">
                    <v-textarea
                        id="description"
                        v-model="form.description.value"
                        class="resume-builder__input civie-textarea"
                        outlined
                        label="Description"
                        color="#001CE2"
                        :rules="form.description.rules"
                    ></v-textarea>
                </div>
                <div class="input-group">
                    <v-btn
                        class="resume-builder__btn civie-btn filled"
                        depressed
                    >Add New</v-btn>
                </div>
            </v-form>
            <div class="education-list">
                <div 
                    v-for="education in educationList" 
                    class="education-item"
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
                                {{education.schoolName}}, 
                                <span class="gray">{{education.location}}</span>
                                <div class="grade-title">{{education.gradeTitle}}</div>
                            </div>
                        </div>
                        <div
                            class="resume-builder__action-buttons-container"
                        >
                            <v-btn
                                class="btn-icon civie-btn"
                                depressed
                            >
                                <svg-vue
                                    icon="eye-icon"
                                    class="icon"
                                ></svg-vue>
                            </v-btn>
                            <v-btn
                                class="btn-icon civie-btn"
                                depressed
                            >
                                <svg-vue
                                    icon="edit-icon"
                                    class="icon"
                                ></svg-vue>
                            </v-btn>
                            <v-btn
                                class="btn-icon civie-btn"
                                depressed
                            >
                                <svg-vue
                                    icon="trash-delete-icon"
                                    class="icon"
                                ></svg-vue>
                            </v-btn>
                            <v-btn
                                class="btn-icon mainBg civie-btn toogleDropdownBtn"
                                depressed
                            ></v-btn>
                        </div>
                    </div>

                    <div class="education-item__content">
                        <div class="date">
                            {{ `${education.currentStatus}, ${education.startDate}${education.actuallyStudying ? '' : ' - ' + education.endDate}` }}
                        </div>
                        <article>
                            {{education.description}}
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data: (vm) => ({
        form: {
            collegeName: {
                value: '',
                disabled: false,
                rules: [
                    value => !!value || 'Please fill this field.',
                ]
            },
            website: {
                value: '',
                disabled: false,
                rules: [
                    value => !!value || 'Please fill this field.',
                ]
            },
            gradeTitle: {
                value: '',
                disabled: false,
                rules: [
                    value => !!value || 'Please fill this field.',
                ]
            },
            startDate: {
                value: '',
                disabled: false,
                formatedDate: vm.formatDate(new Date().toISOString().substr(0, 10)),
                rules: [
                    value => !!value || 'Please fill this field.',
                ] 
            },
            endDate: {
                value: '',
                disabled: false,
                formatedDate: vm.formatDate(new Date().toISOString().substr(0, 10)),
                rules: [
                    value => !!value || 'Please fill this field.',
                ] 
            },
            actuallyStudying: false,
            location: {
                value: '',
                disabled: false,
                rules: [
                    value => !!value || 'Please fill this field.',
                ]
            },
            currentStatus: {
                value: '',
                disabled: false,
                rules: [
                    value => !!value || 'Please fill this field.',
                ]
            },
            description: {
                value: '',
                disabled: false,
                rules: [
                    value => !!value || 'Please fill this field.',
                ]
            },
        },
        educationList: [
            {
                id: 0,                
                schoolName: "Simon Bolívar University",
                location: "Ccs, Venezuela",
                gradeTitle: "Lic. Mathematics: Computing and Statistics",
                startDate: "2014",
                currentStatus: 'Completed',
                actuallyStudying: false,
                endDate: "2019",
                description: "Id non culpa qui non cillum nulla est eiusmod est fugiat ex qui.Cillum culpa veniam ipsum incididunt cupidatat esse cupidatat."
            },
            {
                id: 1,                
                schoolName: "Simon Bolívar University",
                location: "Ccs, Venezuela",
                gradeTitle: "Lic. Mathematics: Computing and Statistics",
                startDate: "2014",
                currentStatus: 'Completed',
                actuallyStudying: false,
                endDate: "2019",
                description: "Veniam qui sunt excepteur Lorem velit nulla fugiat magna ea consequat.Labore duis veniam exercitation consectetur voluptate eu eiusmod adipisicing aute do laboris."
            },
            {
                id: 2, 
                schoolName: "Simon Bolívar University",
                location: "Ccs, Venezuela",
                gradeTitle: "Lic. Mathematics: Computing and Statistics",
                startDate: "2014",
                currentStatus: 'Completed',
                actuallyStudying: false,
                endDate: "2019",
                description: "Ad ad culpa mollit anim non cupidatat officia ipsum laboris sit.Tempor nisi nulla tempor laborum aliqua labore velit id occaecat nulla est."
            }
        ],
        lazy: false,
        startDateMenu: false,
        endDateMenu: false,
        currentStatusOptions: ['Completed', 'Starting', 'Studying']
    }),
    computed: {
      computedDateFormatted () {
        return this.formatDate(this.date)
      },
    },
    watch: {
      "form.startDate.value": function (val) {
        this.form.startDate.formatDate = this.formatDate(this.form.startDate.value)
      },
      "form.endDate.value": function (val) {
        this.form.endDate.formatDate = this.formatDate(this.form.endDate.value)
      },
    },
    methods: {
        toggleInput(inputData) {
            inputData.disabled = !inputData.disabled
        },
        validate () {
            this.$refs.form.validate()
        },
        reset () {
            this.$refs.form.reset()
        },
        resetValidation () {
            this.$refs.form.resetValidation()
        },
        formatDate (date) {
            if (!date) return null

            const [year, month, day] = date.split('-')
            return `${day}/${month}/${year}`
        },
        parseDate (date) {
            if (!date) return null

            const [month, day, year] = date.split('/')
            return `${year}-${month.padStart(2, '0')}-${day.padStart(2, '0')}`
        },
    }
}
</script>

<style lang="scss">
$mainColor: #001CE2;
$secondaryColor: white;
$disabledColor: #888DB1;
$errorColor: #ff5252;
$inputTextColor: #888DB1;
$inputBorderColor--enabled: #C4C9F5;
$inputBorderColor--disabled: #E6E8FC;
$bgScrollBarColor: #E6E8FC;
$auxBgColor-bluegray: #E6E8FC;
$auxBgColor-gray: #F2F3FD;

@import '../../../../../../sass/media-queries';

    .education-wrapper {
        position: relative;
        padding: 60px 50px;
        
        .float-container {
            background-color: $secondaryColor;
            width: 100%;
            height: 100%;
            position: relative;
            z-index: 1;
        }

        .flex-form {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            
            .input-group {
                width: 23.5%;
                margin-right: 15px;

                &:nth-child(4),
                &:last-child {
                    margin-right: none;
                }

                .resume-builder__input {
                    margin-bottom: 20px;
                }

                .civie-textarea {
                    height: 100%;
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
                        margin-left : 15px;

                        .civie-checkbox {
                            position: absolute;
                            left: 0;
                            top: -34px;
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

                // Exception on breakpoint
                @media (max-width: 1770px) {
                    width: 45%;

                    .resume-builder__input {
                        width: 100%;
                    }
                }

                @include lt-md {
                    width: 100%;
                    margin-right: 0;
                    justify-content: space-between;

                    & > *,
                    .inputs-wrapper > * {
                        width: 48%;
                        max-width: 48%;
                    }

                    &:nth-child(4) > .resume-builder__input:last-child {
                        width: 100%;
                        max-width: 100%;
                    }
                }

                @include lt-sm {
                    & > *,
                    .inputs-wrapper > * {
                        width: 100%;
                        max-width: 100%;
                        
                    }

                    .inputs-wrapper {
                        & > * {
                            max-width: 50% !important;
                        }

                        .input-checkbox-wrapper .civie-datepicker {
                            max-width: 100%;
                        }
                    }
                }
            }
        }

        .education-list {
            display: flex;
            flex-direction: column;
            margin-top: 25px;

            .education-item {
                height: 249px;
                max-width: 842px;
                width: 100%;
                padding: 20px 60px;
                position: relative;
                margin: 15px 0;
                box-shadow: 0 5px 20px rgba($color: #001083, $alpha: 0.1);

                .drag-handler {
                    position: absolute;
                    display: flex;
                    flex-direction: column;
                    top: 28px;
                    left: 24px;

                    &:hover {
                        cursor: pointer;
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
            }
        }
    }


</style>