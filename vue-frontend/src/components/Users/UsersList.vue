<template>
  <div class="user-list-container">
    <h2>User List</h2>
    <p v-if="isLoading">Loading users...</p>
    <p v-if="!isLoading && !users.length">No users found.</p>
    <ul v-if="!isLoading && users.length" class="user-list">
      <li v-for="user in users" :key="user.id" class="user-list-item">
        <RouterLink :to="{ name: 'User', params: { id: user.id } }"  class="user-link">
          <User :user="user" />
        </RouterLink>
      </li>
    </ul>
    <p v-if="error">{{ error }}</p>
  </div>
</template>

<script setup>
import { ref, onMounted, computed } from 'vue';
import { useUserStore } from '@/stores/users';
import User from "@/components/Users/User.vue";

const userStore = useUserStore();

const users = computed(() => userStore.users);
const isLoading = computed(() => userStore.isLoading);
const error = computed(() => userStore.error);

// Fetch users when the component is mounted
onMounted(() => {
  userStore.fetchUsers();
});
</script>

<style scoped>
.user-list-container {
  margin-top: 40px;
}

.user-list {
  list-style-type: none; /* Remove default list style */
  padding-left: 0; /* Remove default padding */
  margin-left: 0; /* Remove default margin */
}

.user-list-item {
  display: block; /* Ensures that list items don't have extra spaces */
  margin-bottom: 20px; /* Space between each user */
  padding: 15px; /* Padding inside each item */
  border: 1px solid #ddd; /* Border around each user */
  border-radius: 5px; /* Rounded corners */
  background-color: #f9f9f9; /* Light background for contrast */
}

.user-link {
  display: block;
  text-decoration: none; /* Remove link underline */
  color: inherit; /* Inherit text color */
  font-size: 18px; /* Increase font size */
}

.user-link:hover {
  background-color: #e0e0e0; /* Highlight on hover */
  border-radius: 5px; /* Maintain rounded corners on hover */
}
</style>