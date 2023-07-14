<template>
  <div>
    <h1>Add Client</h1>
    <form @submit.prevent="addClient">
      <label>Name:</label>
      <input type="text" v-model="newClientName" required>
      <button type="submit">Add</button>
    </form>
  </div>
</template>

<script>
import eventBus from '../EventBus';

export default {
  data() {
    return {
      newClientName: '',
    };
  },
  methods: {
    addClient() {
      if (this.newClientName.trim() !== '') {
        // Emit an event with the new client name
        eventBus.emit('client-added', this.newClientName);

        // Reset the input field
        this.newClientName = '';
      }
    },
  },
};
</script>