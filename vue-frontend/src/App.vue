<script setup>
import { RouterLink, RouterView } from 'vue-router'
import HelloWorld from './components/HelloWorld.vue'
</script>

<template>
  <div class="app-container">
  <header>
    <img alt="Vue logo" class="logo" src="@/assets/logo.svg" width="125" height="125" />

    <div class="wrapper">
      <HelloWorld msg="Vue Frontend!" />

      <nav>
        <RouterLink to="/">Home</RouterLink>
        <RouterLink to="/users">Users</RouterLink>
      </nav>
    </div>
  </header>
      <RouterView />
  </div>
</template>

<style scoped>
/* This container will allow you to structure the layout with the header at the top */
.app-container {
  display: flex;
  flex-direction: column;
  min-height: 100vh;
}

/* Make the header's content vertically aligned */
header {
  display: flex;
  flex-direction: column;
  align-items: center;
  text-align: center;
  padding: 20px;
}

.logo {
  margin-bottom: 1rem;
}

nav {
  font-size: 16px;
  margin-top: 1rem;
}

nav a {
  display: inline-block;
  padding: 0 1rem;
  text-decoration: none;
}

nav a.router-link-exact-active {
  color: var(--color-text);
}

/* Ensure main content is placed below the header */
main {
  flex: 1;
  padding: 20px;
  margin-top: 20px;
}



</style>