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
        availableNext() {
            if (this.available == 2) {
                this.available = 0;
            } else this.available++;
        },
        availablePrev() {
            if (this.available == 0) {
                this.available = 0;
            } else this.available--;
        },
        paymentInfoNext() {
            if (this.paymentInfo == 2) {
                this.paymentInfo = 0;
            } else this.paymentInfo++;
        },
        paymentInfoPrev() {
            if (this.paymentInfo == 0) {
                this.paymentInfo = 0;
            } else this.paymentInfo--;
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