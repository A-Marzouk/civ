<template>
    <v-card-text class="ml-xl-0 ml-lg-12 ml-md-0">
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
                        <span class="hour-rate">Hour Rate</span>
                    </v-card>
                </v-list-item-subtitle>
                <v-list-item-subtitle v-if="paymentInfo">
                    <v-card color="transparent" flat tile>
                        <span class="rate">{{
                            paymentInfo[0].salary
                        }}</span>
                    </v-card>
                </v-list-item-subtitle>
            </v-list-item-content>
        </v-list-item>
    </v-card-text>
</template>

<script>
export default {
    name: "HourRate",
    props: { paymentInfo: { type: Array } }
};
</script>

<style lang="scss" scoped>
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
