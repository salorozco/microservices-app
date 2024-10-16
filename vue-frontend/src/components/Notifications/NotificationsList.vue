<template>
  <div v-if="notifications.length > 0">
    <ul class="notification-list">
      <li v-for="notification in notifications" :key="notification.id" class="notification-item">
        <h4>{{ notification.message }}</h4>
        <span class="sent-at">{{ formatDate(notification.createdAt.date) }}</span>
      </li>
    </ul>
  </div>
  <div v-else>
    <p>No notifications found.</p>
  </div>
</template>

<script setup>
import { defineProps } from 'vue';

const props = defineProps({
  notifications: {
    type: Array,
    required: true,
  },
});

const formatDate = (dateStr) => {
  const date = new Date(dateStr);
  return date.toLocaleString();
};
</script>

<style scoped>
.notification-list {
  list-style: none;
  padding: 0;
}

.notification-item {
  border-bottom: 1px solid #ddd;
  padding: 10px 0;
}

.sent-at {
  display: block;
  font-size: 0.8em;
  color: #666;
}
</style>
