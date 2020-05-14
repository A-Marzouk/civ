<template>
  <v-container fluid>
    <v-row>
      <v-col md="5">
        <!-- left -->
        <Left />
      </v-col>
      <v-col md="4">
        <!-- center -->
        <Center />
      </v-col>
      <v-col md="3">
        <!-- right -->
        <Right />
      </v-col>
    </v-row>
  </v-container>
</template>


<script>
import Left from "./header/Left";
import Right from "./header/Right";
import Center from "./header/Center";
export default {
  components: { Left, Right, Center }
};
</script>

<style lang="scss" scoped>
.back {
  background: linear-gradient(#7a39db, #6048ff);
}
</style>