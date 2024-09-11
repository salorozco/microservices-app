<template>
  <div>
    <div v-for="post in posts" :key="post.id" class="post-container">
      <Post :post="post" />
    </div>
  </div>
</template>

<script setup>
import Post from './Post.vue';
const props = defineProps(['posts']);
</script>