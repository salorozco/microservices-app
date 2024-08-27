<template>
  <div>
    <h3>{{ comment.content }}</h3>
    <p>By User ID: {{ comment.userId }}</p>
  </div>
</template>

<script>
export default {
  props: {
    comment: Object,
  },
};
</script>
