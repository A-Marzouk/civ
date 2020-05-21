<template>
  <v-container fluid>
    <v-row>
      <v-col lg="5" md="5" sm="6" cols="12">
        <!-- left -->
        <Left />
      </v-col>
      <v-col lg="4" md="4" sm="4" cols="12">
        <!-- center -->
        <Center />
      </v-col>
      <v-col lg="3" md="3" sm="2" class="ml-auto mr-8 mr-sm-0 mr-md-0 hidden-xs-only">
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