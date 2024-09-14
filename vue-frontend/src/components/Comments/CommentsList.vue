<template>
  <div>
    <div v-for="comment in comments" :key="comment.id">
      <Comment :comment="comment"></Comment>
    </div>
  </div>
</template>

<script setup>
import Comment from './Comment.vue';
const props = defineProps(['comments']);
</script>
