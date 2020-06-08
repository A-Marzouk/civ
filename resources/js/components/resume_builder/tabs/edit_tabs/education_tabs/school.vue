<template>
    <div
        class="education-wrapper"
    >
        <v-form
            ref="form"
            :lazy-validation="lazy"
        >
            <v-container>
                <v-row>
                    <v-col>
                        <v-row>
                            <!-- College Name -->
                            <v-text-field
                                id="collegeName"
                                v-model="form.collegeName.value"
                                class="resume-builder__input civie-input"
                                outlined
                                color="#001CE2"
                                :rules="form.collegeName.rules"
                                :class="{'resume-builder__input--disabled': form.collegeName.disabled}"
                                :disabled="form.collegeName.disabled"
                            >
                                <button
                                    v-if="inputProps.showToggleInputIcon"
                                    class="eye-icon trigger-icon icon"
                                    :class="{'icon--disabled': disabledInput}"
                                    slot="append"
                                    @click="toggleInput(form.collegeName)" 
                                >
                                    <svg-vue
                                        :icon="`eye-icon`" 
                                    ></svg-vue>
                                </button>
                            </v-text-field>
                        </v-row>
                        <v-row>

                        </v-row>  
                    </v-col>
                    <v-col>
                        <v-row>
                        </v-row>
                        <v-row>
                        </v-row> 
                    </v-col>
                    <v-col>
                        <v-row>
                        </v-row>
                        <v-row>
                        </v-row> 
                    </v-col>
                    <v-col>
                        
                    </v-col>
                </v-row>
            </v-container>
        </v-form>
    </div>
</template>

<script>
export default {
    data: () => ({
        form: {
            collegeName: {
                value: '',
                disabled: false,
                rules: [
                    value => !!value || 'Please fill this field.',
                ]
            },
            website: {}
        },
        educationList: [
            {
                id: 0,                
                schoolName: "Simon Bolívar University",
                location: "Caracas, Venezuela",
                gradeTitle: "Lic. Mathematics: Computing and Statistics",
                startDate: "2014",
                actualStudying: false,
                endDate: "2019"
            },
            {
                id: 1,                
                schoolName: "Simon Bolívar University",
                location: "Caracas, Venezuela",
                gradeTitle: "Lic. Mathematics: Computing and Statistics",
                startDate: "2014",
                actualStudying: false,
                endDate: "2019"
            },
            {
                id: 2, 
                schoolName: "Simon Bolívar University",
                location: "Caracas, Venezuela",
                gradeTitle: "Lic. Mathematics: Computing and Statistics",
                startDate: "2014",
                actualStudying: false,
                endDate: "2019"
            }
        ]
    }),
    methods: {
        toggleInput(inputData) {
            inputData.disabled = !inputData.disabled
        }
    }
}
</script>