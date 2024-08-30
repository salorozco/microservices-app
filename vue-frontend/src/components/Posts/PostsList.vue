<template>
  <div>
    <h2>Post List</h2>
    <Post v-for="post in posts" :key="post.id" :post="post" />
  </div>
</template>

<script>
import { mapState } from 'vuex';
import Post from './Post.vue';

export default {
  computed: {
    ...mapState('posts', ['posts']),
  },
  components: {
    Post,
  },
  created() {
    this.$store.dispatch('posts/fetchPosts');
  },
};
</script>
