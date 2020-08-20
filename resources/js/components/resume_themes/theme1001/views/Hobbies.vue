<template>
  <div class="hobbies-container mt-5">
    <div
      v-for="(hobby, index) in currentUser.hobbies"
      :key="index"
      class="hobby__item"
    >
      <div class="inline-dot"></div>
      <div class="ct-line"></div>
      <div class="hobby_text font-weight-bold">{{ hobby.title }}</div>
    </div>
  </div>
</template>

<script>
    export default {
        props: ["currentUser"],
        data: () => ({
            hobbies: [
                { hobby: 'Cycling' },
                { hobby: 'Reading' },
                { hobby: 'Writing' },
                { hobby: 'Travelling' },
                { hobby: 'Eating' },
                { hobby: 'Cycling' },
                { hobby: 'Gardening' },
                { hobby: 'Cycling' },
                { hobby: 'Writing' },
                { hobby: 'travelling' },
                { hobby: 'Writing' },
                { hobby: 'travelling' }
            ]
        })
    }
</script>

<style scoped>
.hobbies-container {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  grid-gap: 1.5rem;
}

.hobby__item {
  display: flex;
  justify-content: space-around;
  align-items: center;
  padding: 2.4rem 1.8rem;
  background-color: #f1f4ff;
  border-radius: 6px;
}

.inline-dot {
  padding: 0.4rem;
  background-color: #f8ab08;
  border-radius: 10px;
}

.ct-line {
  height: 0.5px;
  width: 30%;
  background-color: #bec2d4;
}

.hobby_text {
  font-size: 1.1rem;
  color: #172c7a;
}

/* media queries */

/* md screen  */
@media only screen and (max-width: 982px) {
  .hobbies-container {
    grid-template-columns: repeat(2, 1fr);
    grid-gap: 1.1rem;
  }
}

/* sm screen  */
@media only screen and (max-width: 500px) {
  .hobbies-container {
    grid-template-columns: repeat(1, 1fr);
    grid-gap: 1.1rem;
  }
}
</style>