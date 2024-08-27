<template>
  <div>
    <h2>User Details</h2>
    <User :user="user" />
  </div>
</template>

<script>

import User from "@/components/Users/User.vue";

export default {
  components: {
    User,
  },
  props: {
    user: Object,
  },
  computed: {
    user() {
      return this.$route.state ? this.$route.state.user : null;
    }
  }
};
</script>
