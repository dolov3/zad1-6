<template>
  <div>
    <h1>Client List</h1>
    <ul>
      <li v-for="client in clients" :key="client.id">
        {{ client.name }}
        <button @click="editClient(client.id)">Edit</button>
        <button @click="deleteClient(client.id)">Delete</button>
      </li>
    </ul>
    <form @submit.prevent="addClient">
      <label>Name:</label>
      <input type="text" v-model="newClientName" required>
      <button type="submit">Add</button>
    </form>
  </div>
</template>

<script>
import { ref } from 'vue';
import eventBus from '../EventBus';

export default {
  setup() {
    const clients = ref([
      { id: 1, name: 'John' },
      { id: 2, name: 'Alice' },
    ]);
    const newClientName = ref('');

    const addClient = () => {
      if (newClientName.value.trim() !== '') {
        const newClient = {
          id: clients.value.length + 1,
          name: newClientName.value.trim(),
        };
        clients.value.push(newClient);
        newClientName.value = '';
        eventBus.emit('client-added', newClient.name);
      }
    };

    const editClient = (id) => {
      eventBus.emit('edit-client', id);
    };

    const deleteClient = (id) => {
      clients.value = clients.value.filter((client) => client.id !== id);
    };

    eventBus.on('client-edited', (editedClient) => {
      const index = clients.value.findIndex((client) => client.id === editedClient.id);
      if (index !== -1) {
        clients.value.splice(index, 1, editedClient);
      }
    });

    return {
      clients,
      newClientName,
      addClient,
      editClient,
      deleteClient,
    };
  },
};
</script>
