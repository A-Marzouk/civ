<template>
  <div class="tm701-portfolio" v-if="currentTab === 1">
    <div class="inner tw-w-full tw-max-w-1727px tw-mx-auto">
      <div class="tw-mr-63px tw-ml-56px">
        <div class="tw-grid tw-grid-cols-3 tw-gap-6">
          <div>
            <img
              class="tw-mb-36px tw-w-494px tw-h-603px"
              src="/images/resume_themes/theme701/portfolio1.png"
            />
            <div class="tw-w-2/3">
              <h2 class="tw-mb-18px tw-text-22px tw-font-bold tw-leading-36px tw-text-tm701-1">
                Strategic vision and execution of a newly
                integrated ecosystem of financial tools
              </h2>
              <span
                class="tw-text-18px tw-font-normal tw-leading-36px tw-text-tm701-1"
              >Foe Malakoff mesmeric Humains</span>
            </div>
          </div>
          <div>
            <div class="tw-mb-135px">
              <img
                class="tw-mb-36px tw-w-494px tw-h-279px"
                src="/images/resume_themes/theme701/portfolio2.png"
              />
              <div class="tw-w-2/3">
                <h2 class="tw-mb-18px tw-text-22px tw-font-bold tw-leading-36px tw-text-tm701-1">
                  Protocol for validating interventions Impact
                  on populations with anxiety
                </h2>
                <span
                  class="tw-text-18px tw-font-normal tw-leading-36px tw-text-tm701-1"
                >Foe Malakoff mesmeric Humains</span>
              </div>
            </div>
            <div>
              <img
                class="tw-mb-36px tw-w-494px tw-h-286px"
                src="/images/resume_themes/theme701/portfolio3.png"
              />
              <h2 class="tw-mb-18px tw-text-22px tw-font-bold tw-leading-36px tw-text-tm701-1">
                Strategic vision and execution of a newly
                integrated ecosystem of financial tools
              </h2>
              <span
                class="tw-text-18px tw-font-normal tw-leading-36px tw-text-tm701-1"
              >Foe Malakoff mesmeric Humains</span>
            </div>
          </div>
          <div>
            <div class="tw-mb-135px">
              <img
                class="tw-mb-36px tw-w-494px tw-h-440px"
                src="/images/resume_themes/theme701/portfolio4.png"
              />
              <div class="tw-w-2/3">
                <h2 class="tw-mb-18px tw-text-22px tw-font-bold tw-leading-36px tw-text-tm701-1">
                  Dynamic model of digital interventions
                  attribution with high predictive validity
                  for people with diabetes
                </h2>
                <span
                  class="tw-text-18px tw-font-normal tw-leading-36px tw-text-tm701-1"
                >Foe Malakoff mesmeric Humains</span>
              </div>
            </div>
            <div>
              <img
                class="tw-mb-36px tw-w-494px tw-h-286px"
                src="/images/resume_themes/theme701/portfolio5.png"
              />
              <h2 class="tw-mb-18px tw-text-22px tw-font-bold tw-leading-36px tw-text-tm701-1">
                Strategic vision and execution of a newly
                integrated ecosystem of financial tools
              </h2>
              <span
                class="tw-text-18px tw-font-normal tw-leading-36px tw-text-tm701-1"
              >Foe Malakoff mesmeric Humains</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["currentTab"],
  data() {
    return {
      portfolios: [
        {
          id: 1,
          url: "/images/resume_themes/theme700/portfolio1.png"
        },
        {
          id: 2,
          url: "/images/resume_themes/theme700/portfolio2.png"
        },
        {
          id: 3,
          url: "/images/resume_themes/theme700/portfolio3.png"
        },
        {
          id: 4,
          url: "/images/resume_themes/theme700/portfolio4.png"
        },
        {
          id: 5,
          url: "/images/resume_themes/theme700/portfolio5.png"
        },
        {
          id: 6,
          url: "/images/resume_themes/theme700/portfolio6.png"
        }
      ]
    };
  }
};
</script>

<style lang="scss"></style>
