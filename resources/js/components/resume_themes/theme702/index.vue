<template>
  <div id="wrapper_theme702" class="index-container">
    <Header />
  </div>
</template>

<script>
import Header from "./Header";
import Main from "./Main";
export default {
  components: { Header, Main },
  data() {
    return {};
  },

  methods: {}
};
</script>

<style>
@import url('https://fonts.googleapis.com/css2?family=Open+Sans&display=swap');
:root {
	--blue: #005BD1;
	--gray: #767676;
	--gray-shadow: #2466CA;
	--size: 24px;
	--bg-color: #F9F9F9;
	--email: #6AEFBF;
}
* {
	background-color: var(--bg-color);
}
h2 {
	color: var(--blue);
	font-size: 22px;
	font-weight: bold
}
span {
	color: var(--gray);
	font-weight: normal;
	font-size: 12px;
}
.index-container {
	width: 100%;
	max-width: 375px;
	box-sizing: border-box;
	font-family: 'Open Sans', sans-serif;
}
</style>
