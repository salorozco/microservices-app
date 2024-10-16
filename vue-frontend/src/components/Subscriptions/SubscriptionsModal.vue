<template>
  <Teleport to="body">
    <transition name="fade">
      <div
          v-if="visible"
          class="modal-overlay"
          @click.self="close"
          role="dialog"
          aria-modal="true"
          aria-labelledby="modal-title"
        >
        <div class="modal-content">
          <div class="modal-header">
            <h2 id="modal-title">Followers</h2>
            <button class="close-button" @click="close" aria-label="Close">&times;</button>
          </div>
          <div class="modal-body">
            <SubscriptionsList
                v-if="subscriptions.length"
                :subscriptions="subscriptions"
                />
            <p v-else> No Subscriptions Found</p>
          </div>
        </div>
      </div>
    </transition>
  </Teleport>
</template>
<script setup>
import { defineProps, defineEmits, onMounted, onBeforeUnmount } from 'vue';
import SubscriptionsList from "@/components/Subscriptions/SubscriptionsList.vue";

const props = defineProps({
  visible: {
    type: Boolean,
    required: true,
  },
  subscriptions: {
    type: Array,
    required: true,
  },
});

const emit = defineEmits(['close']);

const close = () => {
  emit('close');
};

const handleEsc = (event) => {
  if (event.key === 'Escape') {
    close();
  }
};

onMounted(() => {
  window.addEventListener('keydown', handleEsc);
});

onBeforeUnmount(() => {
  window.removeEventListener('keydown', handleEsc);
});
</script>

<style scoped>
/* Define transition classes for the 'fade' transition */
.fade-enter-active, .fade-leave-active {
  transition: opacity 0.5s ease;
}
.fade-enter-from, .fade-leave-to {
  opacity: 0;
}

.modal-overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  display: flex;
  align-items: center;
  justify-content: center;
  z-index: 1000;
}

.modal-content {
  background-color: #fff;
  padding: 20px;
  border-radius: 8px;
  width: 80%;
  max-width: 600px;
  max-height: 80%;
  overflow-y: auto;
}

.modal-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 10px;
}

.close-button {
  background: none;
  border: none;
  font-size: 1.5rem;
  cursor: pointer;
}

.close-button:hover {
  color: red;
}
</style>