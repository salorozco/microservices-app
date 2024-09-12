<template>
  <div>
    <h4 class="border-l">{{ user.name }}</h4>
    <p>{{ user.email }}</p>
  </div>
</template>

<script>
export default {
  props: {
    user: {
      type: Object,
      required: true,
    },
  },
};
</script>

<style scoped>
  h4{
    font-weight: bold;
  }
</style>
