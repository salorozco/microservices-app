<template>
  <div class="comment-container">
    <div class="comment-date">Commented on: {{ formatDate( comment.createdAt.date ) }}</div>
    <div class="comment-content">{{ comment.content }}</div>

  </div>
</template>

<script setup>
import { formatDate } from '@/utils/dateUtils';

const props = defineProps(['comment']);
</script>

<style scoped>
.comment-container {
  background-color: #f0f0f0;
  padding: 10px;
  margin-top: 10px;
  border-radius: 5px;
}

.comment-content {
  font-size: 14px;
  color: #444;
}

.comment-date{
  font-size: 12px;
  color: #666;
  margin-top: 5px;
}
</style>


