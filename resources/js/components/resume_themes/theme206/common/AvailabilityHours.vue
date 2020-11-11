<template>
<v-list-item two-line class>
    <v-list-item-avatar size="18">
        <img
            width="18"
            src="/images/resume_themes/theme206/icons/usd.png"
        />
    </v-list-item-avatar>
    <v-list-item-content>
        <v-list-item-subtitle>
            <v-card color="transparent" flat class="pa-0 ma-0" tile>
                <div class="rate-content">
                    <span class="rate-label">Availibility</span>
                    <span class="rate-frequency">
                        <v-icon
                            class="rate-frequency__prev"
                            size="14"
                            color="#5843BE"
                            @click="prevFrequency"
                        >
                            mdi-chevron-left
                        </v-icon>
                        <span class="rate-frequency__value">
                            {{ activeFrequency }}
                        </span>
                        <v-icon
                            class="rate-frequency__next"
                            size="14"
                            color="#5843BE"
                            @click="nextFrequency"
                        >
                            mdi-chevron-right
                        </v-icon>
                    </span>
                </div>
            </v-card>
        </v-list-item-subtitle>
        <v-list-item-subtitle v-if="availabilityInfo">
            <v-card color="transparent" flat tile>
                <span class="available-hours">{{ activeAvailability }}</span>
            </v-card>
        </v-list-item-subtitle>
    </v-list-item-content>
</v-list-item>
</template>

<script>
export default {
    name: "AvailabilityHours",
    props: { availabilityInfo: { type: Array, required: true } },
    data() {
        return {
            availabilityFrequencyIndex: 0
        };
    },
    computed: {
        availabilityFrequencies() {
            return this.availabilityInfo.map(i => i.available_hours_frequency);
        },
        activeFrequency() {
            return this.capitalize(
                this.availabilityFrequencies[this.availabilityFrequencyIndex]
            );
        },
        activeAvailability() {
            return this.availabilityInfo[this.availabilityFrequencyIndex].available_hours;
        }
    },
    methods: {
        prevFrequency() {
            if (this.availabilityFrequencyIndex === 0) {
                this.availabilityFrequencyIndex = this.availabilityInfo.length - 1;
                return;
            }

            this.availabilityFrequencyIndex--;
        },
        nextFrequency() {
            if (this.availabilityFrequencyIndex === this.availabilityInfo.length - 1) {
                this.availabilityFrequencyIndex = 0;
                return;
            }

            this.availabilityFrequencyIndex++;
        },
        capitalize(str) {
            return str.charAt(0).toUpperCase() + str.slice(1);
        }
    }
};
</script>

<style lang="scss" scoped>
.rate-content {
    height: 42px;
    display: flex;
    align-items: self-end;
    flex-direction: column;
    font-family: "Poppins", sans-serif !important;

    .rate-label {
        color: rgba(88, 67, 190, 0.5) !important;
        font-size: 0.625rem;
        line-height: 1.313rem;
        text-transform: uppercase;
    }
    .rate-frequency {
        display: flex;
        min-width: 100px;
        align-items: center;
        justify-content: center;

        .rate-frequency__value {
            display: inline-flex;
            min-width: 60px;
            font-weight: 500;
            justify-content: center;
        }

        .rate-frequency__prev,
        .rate-frequency__next {
            width: 14px;
            height: 14px;
        }
    }
}

.available-hours {
    font-family: "Poppins", sans-serif !important;
    color: #5843be !important;
    font-size: 2.5rem;
    line-height: 3rem;
    font-weight: bold;
}
</style>
