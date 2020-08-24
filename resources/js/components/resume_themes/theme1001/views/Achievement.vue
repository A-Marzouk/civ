<template>
  <div class="achievement_container my-5">
    <div
      v-for="(achievement, index) in currentUser.achievements"
      :key="index"
      class="achievement__card"
    >
      <!-- left -->
      <div class="card__left">
        <img
          :src="achievement.image_src"
          alt="certificate"
          class="certificate_img"
        />
      </div>

      <!-- right -->
      <div class="card__right">
        <div class="card__title font-weight-bold mb-2">
          {{ achievement.title }}
        </div>
        <div class="card__url mb-3">URL: {{ achievement.url }}</div>
        <div class="card__description">{{ achievement.description }}</div>
      </div>
    </div>
  </div>
</template>

<script>
    export default {
        props: ["currentUser"],
        data: () => ({
            achievements: [
                {
                    src: '/images/resume_themes/theme1001/certificate.png',
                    title: 'National Award, 2015',
                    url: 'https://awwwards.com',
                    description: 'Description: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo consequuntur. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo consequuntur. Lorem ipsum dolor sit amet, consectetur adipisicing elit.'
                },
                {
                    src: '/images/resume_themes/theme1001/certificate.png',
                    title: 'National Award, 2015',
                    url: 'https://awwwards.com',
                    description: 'Description: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo consequuntur. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo consequuntur. Lorem ipsum dolor sit amet, consectetur adipisicing elit.'
                },
                {
                    src: '/images/resume_themes/theme1001/certificate.png',
                    title: 'National Award, 2015',
                    url: 'https://awwwards.com',
                    description: 'Description: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo consequuntur. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo consequuntur. Lorem ipsum dolor sit amet, consectetur adipisicing elit.'
                },
                {
                    src: '/images/resume_themes/theme1001/certificate.png',
                    title: 'National Award, 2015',
                    url: 'https://awwwards.com',
                    description: 'Description: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo consequuntur. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo consequuntur. Lorem ipsum dolor sit amet, consectetur adipisicing elit.'
                }
            ]
        })
    }
</script>

<style scoped>
.achievement_container {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  grid-gap: 1.5rem;
}

.achievement__card {
  padding: 1.6rem;
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  grid-gap: 1.4rem;
  color: #172c7a;
  background-color: #f1f4ff;
  border-radius: 8px;
}

/* left */
.card__left {
  
}

.certificate_img {
  height: auto;
  width: auto;
}

/* right */
.card__right {
}

.card__title {
  font-size: 1.2rem;
}

.card__description {
  font-size: 0.8rem;
}

/* media queries */

/* md screen */
@media only screen and (max-width: 1600px) {
  .achievement__card {
    grid-template-columns: repeat(2, 1fr);
  }
}

/* md screen */
@media only screen and (max-width: 1137px) {
  .achievement_container {
    grid-template-columns: 1fr;
  }
}

/* sm screen */
@media only screen and (max-width: 700px) {
  .achievement__card {
    grid-template-columns: 1fr;
  }

  .card__title {
    text-align: center;
  }
}
</style>