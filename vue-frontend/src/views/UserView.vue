<template>
  <main>
   <div class="profile-container">
    <h2 class="profile-header">User Profile
      <span
          class="icon-button"
          @click="showConversations"
          title="View Conversations"
          aria-label="View Conversations"
        >
        <i class="fas fa-comments"></i>
      </span>
    </h2>
    <div class="user-details">
      <User
          v-if="userData"
          :user="userData"S
        />
    </div>

    <PostsList
        v-if="userData && userData.posts"
        :posts="userData.posts"
      />
    <p v-else>Loading...</p>
    </div>

    <ConversationsModal
        :visible="isModalVisible"
        :conversations="userData.conversations"
        @close="isModalVisible = false"
      />
  </main>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { useUserStore } from '@/stores/users';
import User from "@/components/Users/User.vue";
import PostsList from "@/components/Posts/PostsList.vue";
import ConversationsModal from "@/components/Conversations/ConversationsModal.vue";

// Props received from the route
const props = defineProps(['id']);
const userStore = useUserStore();
const userData = ref({
  user: null,
  posts: [],
  conversations: []
});
const isModalVisible = ref(false);

const showConversations = () => {
    isModalVisible.value = true;
};

onMounted(async () => {
  await userStore.fetchUserProfile(props.id);
  userData.value = userStore.user;
});

</script>

<style scoped>
/* User Profile Styles */
.profile-container {
  display: block;
  margin: 0 auto;
  padding: 20px;
  background-color: #f9f9f9;
}

.profile-header, .posts-header {
  font-size: 24px;
  margin-bottom: 20px;
  color: #333;
  display: flex;
  align-items: center;
  justify-content: space-between;
}

/* Style for the Icon Button */
.icon-button {
  background: none; /* Remove default button background */
  border: none;     /* Remove default button border */
  cursor: pointer;  /* Change cursor to pointer on hover */
  margin-left: 10px; /* Space between text and icon */
  color: #007BFF;   /* Icon color */
  font-size: 1.2rem; /* Icon size */
  padding: 0;       /* Remove default padding */
}

.icon-button:hover {
  color: #0056b3; /* Darker color on hover */
}

.icon-button:focus {
  outline: none; /* Remove default focus outline */
  box-shadow: 0 0 0 2px rgba(0, 123, 255, 0.5); /* Add custom focus outline for accessibility */
}

.user-details {
  background-color: #fff;
  padding: 15px;
  border: 1px solid #ddd;
  margin-bottom: 30px;
  border-radius: 5px;
}

</style>
