<template>
  <div class="post-container">
    <div class="post-header">Posted on: {{ formatDate( post.created_at.date ) }}</div>
    <div class="post-footer">{{ post.content }}</div>
    <CommentList v-if="post.comments && post.comments.length" :comments="post.comments" />
  </div>
</template>

<script setup>
import CommentList from '@/components/Comments/CommentsList.vue';
import { formatDate } from '@/utils/dateUtils';
const props = defineProps(['post']);
</script>

<style scoped>
.post-container {
  background-color: #fff;
  padding: 20px;
  margin-bottom: 20px;
  border-radius: 8px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.post-footer{
  font-weight: bold;
  font-size: 18px;
  margin-bottom: 10px;
}

.post-header {
  font-size: 14px;
  color: #888;
}
</style>