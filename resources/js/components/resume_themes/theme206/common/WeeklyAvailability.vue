<template>
    <v-list-item
        two-line
        class="availibilty-col ml-lg-0 ml-md-n10 ml-sm-n12 ml-0"
    >
        <v-list-item-avatar size="16">
            <img
                width="16"
                src="/images/resume_themes/theme206/icons/watch.png"
            />
        </v-list-item-avatar>
        <v-list-item-content>
            <v-list-item-subtitle>
                <v-card color="transparent" flat tile>
                    <span class="hour-rate">Weekly availibility</span>
                </v-card>
            </v-list-item-subtitle>
            <v-list-item-subtitle v-if="availabilityInfo">
                <v-card color="transparent" class="pa-0 ma-0" flat tile>
                    <span class="rate">{{
                        availabilityInfo[0].available_hours
                    }}</span>
                </v-card>
            </v-list-item-subtitle>
        </v-list-item-content>
    </v-list-item>
</template>

<script>
export default {
    name: "WeeklyAvailability",
    props: { availabilityInfo: { type: Array } }
};
</script>

<style lang="scss" scoped>
// .availibilty-col {
//   @media screen and (min-width: 1025px) {
//     margin-left: -52px;
//   }
//   @media screen and (max-width: 1024px) {
//     margin-left: -20px;
//   }
// }

.hour-rate {
  font-family: "Poppins", sans-serif !important;
  color: rgba(88, 67, 190, 0.5) !important;
  font-size: 0.625rem;
  line-height: 1.313rem;
  text-transform: uppercase;
}

.rate {
  font-family: "Poppins", sans-serif !important;
  color: #5843be !important;
  font-size: 2.5rem;
  line-height: 3rem;
  font-weight: bold;
}
</style>
