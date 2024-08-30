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

<style>
.user-list-container {
  margin-top: 40px;
}
.user-list {
  list-style-type: disc;
  padding-left: 0;
  margin-left: 1.2em;
}

.user-list-item {
  display: block; /* Ensures that list items don't have extra spaces */
  margin-bottom: 10px;
}

.user-link {
  display: inline-block;
}
</style>