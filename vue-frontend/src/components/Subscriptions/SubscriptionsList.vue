<template>
  <div v-if="subscriptions.length > 0">
    <ul class="notification-list">
      <li v-for="subscription in subscriptions" :key="subscription.id" class="subscription-item">
        <h4>User {{ subscription.targetId }}</h4>
        <span class="sent-at">{{ formatDate(subscription.createdAt.date) }}</span>
      </li>
    </ul>
  </div>
  <div v-else>
    <p>No subscriptions found.</p>
  </div>
</template>

<script setup>
import { defineProps } from 'vue';

const props = defineProps({
  subscriptions: {
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
.subscription-list {
  list-style: none;
  padding: 0;
}

.subscription-item {
  border-bottom: 1px solid #ddd;
  padding: 10px 0;
}

.sent-at {
  display: block;
  font-size: 0.8em;
  color: #666;
}
</style>
