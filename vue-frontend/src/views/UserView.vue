<template>
  <div class="profile-container">
    <h2 class="profile-header">User Profile</h2>
    <div class="user-details">
      <User v-if="userData" :user="userData" />
    </div>

    <h3 class="posts-header">Posts</h3>
    <PostsList v-if="userData && userData.posts" :posts="userData.posts" />

    <p v-else>Loading...</p>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { useUserStore } from '@/stores/users';
import User from "@/components/Users/User.vue";
import PostsList from "@/components/Posts/PostsList.vue";

// Props received from the route
const props = defineProps(['id']);
const userStore = useUserStore();
const userData = ref(null);

onMounted(async () => {
  await userStore.fetchUserProfile(props.id);
  userData.value = userStore.user;
});
</script>

<style scoped>
/* User Profile Styles */
.profile-container {
  max-width: 800px;
  margin: 0 auto;
  padding: 20px;
  background-color: #f9f9f9;
}

.profile-header, .posts-header {
  font-size: 24px;
  margin-bottom: 20px;
  color: #333;
}

.user-details {
  background-color: #fff;
  padding: 15px;
  border: 1px solid #ddd;
  margin-bottom: 30px;
  border-radius: 5px;
}

.posts-header {
  font-size: 20px;
  margin-top: 40px;
  color: #555;
}

/* Post List Styling */
.post-container {
  background-color: #fff;
  padding: 20px;
  margin-bottom: 20px;
  border-radius: 8px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.post-header {
  font-weight: bold;
  font-size: 18px;
  margin-bottom: 10px;
}

.post-content {
  font-size: 16px;
  margin-bottom: 10px;
  color: #333;
}

.post-footer {
  font-size: 14px;
  color: #888;
}

/* Comments Styling */
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

.comment-footer {
  font-size: 12px;
  color: #666;
  margin-top: 5px;
}
</style>
