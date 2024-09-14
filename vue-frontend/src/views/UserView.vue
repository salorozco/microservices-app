<template>
  <main>
   <div class="profile-container">
    <h2 class="profile-header">User Profile</h2>
    <div class="user-details">
      <User v-if="userData" :user="userData" />
    </div>

    <PostsList v-if="userData && userData.posts" :posts="userData.posts" />
    <p v-else>Loading...</p>
    </div>
  </main>
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
  display: block;
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

</style>
