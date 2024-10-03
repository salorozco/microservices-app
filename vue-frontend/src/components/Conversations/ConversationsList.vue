<!-- src/components/Conversations/ConversationsList.vue -->
<template>
  <div v-if="conversations.length > 0">
    <ul class="conversation-list">
      <li v-for="conversation in conversations" :key="conversation.id" class="conversation-item">
        <h4>{{ conversation.title }}</h4>
        <div class="messages">
          <div v-for="message in conversation.messages" :key="message.id" class="message">
            <strong>User {{ message.senderId }}:</strong> {{ message.content }}
            <span class="sent-at">{{ formatDate(message.sentAt.date) }}</span>
          </div>
        </div>
      </li>
    </ul>
  </div>
  <div v-else>
    <p>No conversations found.</p>
  </div>
</template>

<script setup>
import { defineProps } from 'vue';

const props = defineProps({
  conversations: {
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
.conversation-list {
  list-style: none;
  padding: 0;
}

.conversation-item {
  border-bottom: 1px solid #ddd;
  padding: 10px 0;
}

.messages {
  margin-top: 5px;
  padding-left: 10px;
}

.message {
  margin-bottom: 5px;
}

.sent-at {
  display: block;
  font-size: 0.8em;
  color: #666;
}
</style>
