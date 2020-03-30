<template>
    <div>
        <div @click="() => false" class="edit-links d-flex flex-column mr-5">
            <div @click="setActive" v-for="(section) in asideSections" :key="section.name" class="aside-link d-flex align-items-center" :class="{ active: activeTab === section.name }">
                <svg-vue class="aside-icon" :icon="`${section.name}-icon`"></svg-vue>
                <router-link :to="`/resume-builder/edit/${section.name}`">
                    {{formatSectionString(section.name)}}
                </router-link>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data: () => ({
        asideSections: [
            {
                name: 'profile',
                icon: null
            },
            {
                name: 'summary',
                icon: null
            },
            {
                name: 'work-experience',
                icon: null
            },
            {
                name: 'education',
                icon: null
            },
            {
                name: 'skills',
                icon: null
            },
            {
                name: 'projects',
                icon: null
            },
            {
                name: 'achievement',
                icon: null
            },
            {
                name: 'hobbies',
                icon: null
            },
            {
                name: 'audio-video',
                icon: null
            },
            {
                name: 'pay-availability',
                icon: null
            },
            {
                name: 'imports',
                icon: null
            },
            {
                name: 'references',
                icon: null
            }
        ]
    }),
    computed: {
        activeTab () {
            return window.location.pathname.split('/')[3]
        }
    },
    methods: {
        formatSectionString: (str) => {
            /**
             * Convert the url in a friendly text
             * @param String str
             * @returns String formated
             */

            let strArray = str.split('-');

            let formatedString = "";

            strArray.forEach((strItem, idx) => {
                formatedString += strItem.charAt(0).toUpperCase() + strItem.slice(1)
                if (idx < strArray.length - 1) formatedString += " "
            });

            return formatedString;
        },
        setActive (e) {
            let activeNow = document.querySelector('.aside-link.active')
            activeNow && activeNow.classList.toggle('active')
            e.target.parentNode.classList.toggle('active')

            $([document.documentElement, document.body]).animate({
                scrollTop: 130
            }, 600);

        }
    }
}
</script>

<style lang="scss">
@import '../../../../sass/media-queries';

$activeColor: #001CE2;
$disabledColor: #9f9e9e;
.edit-links {
    width: 100%;
    position: relative;
    padding: 10px 40px;
    // Check it
    overflow: auto;
}

.aside-link {
    font-size: 14px;
    padding-right: 32px;

    .aside-icon {
        path {
            fill: none;
            stroke: $disabledColor;
            transition: all .5s ease;
        }

        circle {
            fill: none;
            stroke: $disabledColor;
            transition: all .5s ease;
        }
    }

    &.active {
        a {
            color: $activeColor;
            transition: all 1s ease;
        }

        .aside-icon {
            path {
                fill: $activeColor;
                stroke: #fff;
                transition: all .5s ease;
            }

            circle {
                fill: $activeColor;
                stroke: #fff;
                transition: all .5s ease;
            }
        }
    }

    a {
        padding: 13px 0;
        color: $disabledColor;
        transition: all 1s ease;
        display: block;
        width: 100%;
        height: 100%;

        &:active,
        &:hover {
            text-decoration: none;
            cursor: pointer;
        }
    }
}
.aside-icon {
    margin-right: 22px;
    width: 33.5px;
}
</style>