export default {
    props: ["user", "is_preview", "builderCurrentTabTitle"],

    data() {
        return {
            currentUser: this.user,
            indexOfActiveTab: 0,
            available: 0,
            paymentInfo: 0,
            activeTab: "portfolio",
        }
    },
    methods: {
        findPreference(title) {
            if (!this.currentUser) {
                return;
            }
            let currentPrefer = null;
            this.currentUser.preferences.forEach((prefer) => {
                if (prefer.title === title) {
                    currentPrefer = prefer;
                }
            });
            if (currentPrefer) {
                return currentPrefer.is_public;
            }
            return "";
        },
        paymentInfoNext() {
            let paymentList = this.filterPaymentInfoList;
            this.paymentInfo++;
            if (this.paymentInfo >= paymentList.length) {
              this.paymentInfo = 0;
            }
          },
          availableInfoNext() {
            let availableList = this.filterAvailabilityInfoList;
            this.available++;
            if (this.available >= availableList.length) {
              this.available = 0;
            }
          },
          paymentInfoPrev() {
            let paymentList = this.filterPaymentInfoList;
            this.paymentInfo--;
            if (this.paymentInfo <= 0) {
              this.paymentInfo = 0;
            }
          },
          availableInfoPrev() {
            let availableList = this.filterAvailabilityInfoList;
            this.available--;
            if (this.available <= 0) {
              this.available = 0;
            }
          },
        getFirstActiveTabTitle() {
            let title = "";
            this.currentUser.tabs.forEach((tab) => {
                if (tab.is_public && !this.excludedTabs.includes(tab.title)) {
                    if (title === "") {
                        title = tab.title;
                    }
                }
            });

            return title;
        },
        setTabIndex() {
            this.indexOfActiveTab = this.currentUser.tabs.findIndex(
                (tab) => tab.title === this.activeTab
            );
        },
        goToExternalLink(link) {
            if (!link.includes("http")) {
                link = "http://" + link;
            }
            window.location.href = link;
        },

        setDummyUser() {
            this.currentUser = this.$store.state.dummyUser;
        },

        setActiveTabByURL() {
            const pathSplit = this.$route.path.split("/");
            let currentActiveTab = pathSplit[pathSplit.length - 1];
            if (!this.defaultTabs.includes(currentActiveTab)) {
                this.activeTab = this.getFirstActiveTabTitle();
            } else {
                this.activeTab = currentActiveTab;
            }

            this.setTabIndex();
        },
    },
    computed: {
        filterPaymentInfoList() {
            return this.currentUser.payment_info.filter(a => a.is_public);
          },
          filterAvailabilityInfoList() {
            return this.currentUser.availability_info.filter(a => a.is_public);
          },
        defaultTabs() {
            return this.$store.state.defaultTabs;
        },
        excludedTabs() {
            return this.$store.state.excludedTabs;
        },
    },
    watch: {
        // if current tab changed, change the active tab as well.
        builderCurrentTabTitle: function (val) {
            if (!this.defaultTabs.includes(val)) {
                this.activeTab = this.getFirstActiveTabTitle();
            } else {
                this.activeTab = val;
            }

            this.setTabIndex();
        },
    },
    mounted() {
        // if there is no user or the preview is true, set dummy user
        if (!this.currentUser || this.is_preview) {
            this.setDummyUser();
        }

        // let user accessible in included components.
        this.$store.dispatch("updateThemeUser", this.currentUser);
    },
    created() {
        // set active tab
        this.setActiveTabByURL();
    },
};