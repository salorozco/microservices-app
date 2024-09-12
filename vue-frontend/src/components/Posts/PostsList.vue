<template>
  <div class="post-list">
    <div v-for="post in posts" :key="post.id">
      <Post :post="post" />
    </div>
  </div>
</template>

<script setup>
import Post from './Post.vue';
const props = defineProps(['posts']);
</script>