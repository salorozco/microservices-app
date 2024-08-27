<template>
  <div>
    <h2>Comment List</h2>
    <Comment v-for="comment in comments" :key="comment.id" :comment="comment" />
  </div>
</template>

<script>
import { mapState } from 'vuex';
import Comment from './Comment.vue';

export default {
  computed: {
    ...mapState('comments', ['comments']),
  },
  components: {
    Comment,
  },
  created() {
    this.$store.dispatch('comments/fetchComments');
  },
};
</script>
