<template>
<div class="social-buttons" :class="`--${screen}`">
    <v-icon v-if="activeLinks.length > maxVisible" class="social-buttons__prev mr-1" size="40" color="#5843BE" @click="prevLinks">mdi-chevron-left</v-icon>
    <v-btn
        class="custom-social-btn mx-1 px-0"
        href="javascript:void(0)"
        @click="goToExternalLink(userLink.link)"
        v-for="userLink in visibleLinks"
        :key="userLink.id + '_link'"
        target="_blank"
        color="#FAFAFA"
    >
        <img
            :width="userLink.link_title == 'facebook' ? '12' : '20'"
            x-large
            :src="getSocialIcon(userLink.link_title)"
        />
    </v-btn>
    <v-icon v-if="activeLinks.length > maxVisible" class="social-buttons__next ml-1" size="40" color="#5843BE" @click="nextLinks">mdi-chevron-right</v-icon>
</div>
</template>

<script>
    export default {
        name: 'SocialButtons',
        props: {
            links: { type: Array },
            screen: {
                type: String,
                validator: value => ['desktop', 'tablet', 'mobile'].includes(value)
            }
        },
        data() {
            const maxVisible = 3;

            return {
                maxVisible: maxVisible,
                activeRange: { from: 0, to: maxVisible }
            };
        },
        computed: {
            activeLinks() {
                return this.links.filter(l => l.is_active && l.is_public);
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
                if (this.activeRange.from <= 0) return;

                this.activeRange.to--;
                this.activeRange.from--;
            },
            nextLinks() {
                if (this.activeRange.to >= this.activeLinks.length) return;

                this.activeRange.to++;
                this.activeRange.from++;
            },
            getSocialIcon(title) {
                return `/images/resume_themes/theme206/social_icons/${title.toLowerCase()}.webp`;
            },
        }
    }
</script>

<style lang="scss" scoped>
.social-buttons {
    display: flex;
    align-items: center;
    justify-content: center;

    &.--desktop {
        margin-right: 16px;

        .social-buttons__prev {margin-right: 12px;}
        .social-buttons__next {margin-left: 12px;}

        .social-buttons__prev,
        .social-buttons__next {
            width: 30px;
            height: 30px;
        }

        .custom-social-btn {
            width: 50px;
            height: 50px !important;
            min-width: 40px !important;
        }
    }

    &.--tablet {
        .social-buttons__prev {margin-right: 16px;}
        .social-buttons__next {margin-left: 16px;}

        .social-buttons__prev,
        .social-buttons__next {
            width: 30px;
            height: 30px;
        }

        .custom-social-btn {
            width: 40px;
            height: 40px !important;
            min-width: 40px !important;
        }
    }
}
</style>
