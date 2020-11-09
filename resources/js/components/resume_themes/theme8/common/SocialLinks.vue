<template>
    <div class="social-links">
        <button
            v-if="visibleLinks.length > activeRange.to"
            class="social-links__prev-btn"
            @click="prevLinks"
        >
            <v-icon :light="true" size="32" color="white">
                mdi-chevron-left
            </v-icon>
        </button>
        <div class="social-links__wrapper">
            <a
                v-for="userLink in visibleLinks"
                :key="`${userLink.id}_link`"
                class="social-links__link"
                :href="userLink.link"
                target="_blank"
            >
                <img :src="iconSrc(userLink.link_title)" alt="social icon" />
            </a>
        </div>
        <button
            v-if="visibleLinks.length > activeRange.to"
            class="social-links__next-btn"
            @click="nextLinks"
        >
            <v-icon :light="true" size="32" color="white">
                mdi-chevron-right
            </v-icon>
        </button>
    </div>
</template>

<script>
export default {
    name: "SocialLinks",
    props: { links: { type: Array } },
    data() {
        return {
            activeRange: { from: 0, to: 4 }
        };
    },
    computed: {
        activeLinks() {
            return this.links.filter(l => l.is_active);

            return [
                {
                    id: 0.8467649448718326,
                    category: "social_link",
                    link: "https://instagram.com",
                    link_title: "Instagram",
                    is_active: true,
                    is_public: 1
                },
                {
                    id: 0.9437630189864001,
                    category: "social_link",
                    link: "https://instagram.com",
                    link_title: "Behance",
                    is_active: false,
                    is_public: 1
                },
                {
                    id: 0.9970980687615405,
                    category: "social_link",
                    link: "https://instagram.com",
                    link_title: "Linkedin",
                    is_active: true,
                    is_public: 1
                },
                {
                    id: 0.9970980687615406,
                    category: "social_link",
                    link: "https://instagram.com",
                    link_title: "Linkedin",
                    is_active: true,
                    is_public: 1
                },
                {
                    id: 0.8467649448714326,
                    category: "social_link",
                    link: "https://instagram.com",
                    link_title: "Instagram",
                    is_active: true,
                    is_public: 1
                },
                {
                    id: 0.9437630183864001,
                    category: "social_link",
                    link: "https://instagram.com",
                    link_title: "Behance",
                    is_active: false,
                    is_public: 1
                }
            ];
        },
        visibleLinks() {
            return this.activeLinks.slice(
                this.activeRange.from,
                this.activeRange.to
            );
        }
    },
    methods: {
        prevLinks() {
            // [\1, 2, 3, 4\, 5, 6, 7]
            if (this.activeRange.from <= 0) return;

            this.activeRange.to--;
            this.activeRange.from--;
        },
        nextLinks() {
            if (this.activeRange.to >= this.activeLinks.length) return;

            this.activeRange.to++;
            this.activeRange.from++;
        },
        iconSrc(title = null) {
            let src = "/images/resume_themes/theme8/social_icons/";
            src += title ? `${title.toLowerCase()}.webp` : "social_icon.webp";
            return src;
        }
    }
};
</script>

<style lang="scss" scoped>
.social-links {
    display: flex;
    align-items: center;

    .social-links__wrapper {
        display: flex;
        align-items: center;
        padding: 0 14px;
    }

    .social-links__prev-btn,
    .social-links__next-btn {
        &:focus {
            outline: none;
        }
    }

    .social-links__link {
        margin-right: 30px;

        &:last-child {
            margin-right: unset;
        }

        img {
            width: 30px;
            height: auto;
            @media screen and (max-width: 500px) {
                width: 24px;
            }
        }

        @media screen and (max-width: 500px) {
            margin-right: 20px;
        }
    }
}
</style>
