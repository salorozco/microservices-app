<template>
  <div>
    <h3>{{ post.title }}</h3>
    <p>{{ post.content }}</p>
  </div>
</template>

<script>
export default {
  props: {
    post: Object,
  },
};
</script>
