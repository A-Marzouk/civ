<template>
    <div class="container education-flex">
        <div class="education-item" v-for="(educationItem, i) in currentUser.education.filter(edu => edu.is_public)" :key="educationItem.university_name + i" >
            <div class="education-header">
                <div class="education-icon">
                    <img src="/images/resume_themes/theme103/education-icon.png" />
                </div>
                <div class="date">
		    {{ educationItem.date_from.split('-')[0] }} - {{ educationItem.present ? 'Now' : educationItem.date_to.split('-')[0] }}
		</div>
                <h2 class="college-name">{{ educationItem.university_name }}</h2>
            </div>
            <div class="education-body">
                <div class="grade-title">{{ educationItem.degree_title }}</div>
                <div class="education-description">
		    {{ educationItem.description }}
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: [
	'currentUser'
    ],
    data: () => ({

    })
}
</script>

<style scoped lang="scss">
    $mainColor: #2E77D1;
    $purple: #0556B6;


    .education-flex {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        max-width: 1300px;
    }

    .education-item {
        max-width: 529px;
        width: 47%;
        margin-bottom: 74px;
        padding: 0 20px;

        .education-header {
            display: flex;
            flex-wrap: wrap;
            margin-bottom: 13px;

            .education-icon {
                display: flex;
                justify-content: center;
                align-items: center;
                margin-right: 18.6px;
                border: 1px solid $purple;
                border-radius: 50%;
                width: 26px;
                height: 26px;
                position: relative;
            }

            .college-name {
                color: $purple;
                font-weight: 700;
                font-size: 32px;
                width: 100%;
            }

            .date {
                margin-bottom: 13px;
                position: relative;
                color: #616887;
                font-size: 19px;
                font-weight: 500;
            }

            @media (max-width: 1200px) {
                .education-icon {
                    width: 28px;
                    height: 28px;
                    margin-right: 14px;

                    &::after {
                        width: 31px;
                        right: calc(-13px - 31px);
                    }

                    img {
                        width: 12px;
                    }
                }

                .college-name {
                    font-size: 24px;
                }

                .date {
                    font-size: 14px;
                    margin-top: 3px;
                }
            }

            @media (max-width: 600px) {
                margin-bottom: 10px;

                .college-name {
                    font-size: 21px;
                }
            }
        }

        .education-body {

            .grade-title {
                color: $mainColor;
                font-weight: 700;
                font-size: 20px;
                margin-bottom: 36px;
            }

            .education-description,
            .education-description p {
                color: #838BA4;
                font-size: 17px;
            }

            @media (max-width: 1200px) {
                .grade-title,
                .education-description p {
                    font-size: 13px;

                }
            }

            @media (max-width: 600px) {

                .grade-title {
                    margin-bottom: 16px;
                }
                
                .grade-title,
                .education-description p {
                    font-size: 11px;

                }
            }
        }

        @media (max-width: 600px) {
            width: 100%;
            margin-bottom: 48px;
        }

        @media (max-width: 600px) {
            width: 100%;
            margin-bottom: 48px;
        }
    }
</style>
