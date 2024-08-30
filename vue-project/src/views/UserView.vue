<template>
  <div>
    <h2>User Details</h2>
    <User v-if="user" :user="user" />
    <p v-else>Loading...</p>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { useUserStore } from '@/stores/users';
import User from "@/components/Users/User.vue";

// Props received from the route
const props = defineProps(['id']);
const userStore = useUserStore();
const user = ref(null);

onMounted(async () => {
  await userStore.fetchUserById(props.id);
  user.value = userStore.user;
});
</script>
