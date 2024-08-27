<template>
  <div>
    <h2>User List</h2>
    <p v-if="!users.length">Loading users...</p>
    <ul>
      <li v-for="user in users" :key="user.id">
        <RouterLink :to="{ name: 'User', params: { id: user.id } }">
          <User :user="user" />
        </RouterLink>
      </li>
    </ul>
  </div>
</template>

<script>
import { useUserStore } from '@/stores/users.js';
import { onMounted } from 'vue';
import User from "@/components/Users/User.vue";

export default {
  components: {
    User,
  },
  setup() {
    const userStore = useUserStore();

    onMounted(() => {
      userStore.fetchUsers();
    });

    return {
      users: userStore.users
    };
  },
};
</script>
