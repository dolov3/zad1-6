<template>
  <div>
    <h1>Client List</h1>
    <div>
      <label>Search:</label>
      <input type="text" v-model="searchQuery">
    </div>
    <div>
      <label>Sort By:</label>
      <select v-model="sortBy">
        <option value="name">Name</option>
        <option value="totalSpendings">Total Spendings</option>
       
      </select>
    </div>
    <ul>
      <li v-for="client in filteredClients" :key="client.id">
        {{ client.name }}
        <button @click="editClient(client.id)">Edit</button>
        <button @click="deleteClient(client.id)">Delete</button>
      </li>
    </ul>
    <div>
      <button @click="previousPage" :disabled="currentPage === 1">Previous</button>
      <span>Page {{ currentPage }} of {{ totalPages }}</span>
      <button @click="nextPage" :disabled="currentPage === totalPages">Next</button>
    </div>
    <form @submit.prevent="submitAddClient">
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
      clients: [
        { id: 1, name: 'John', totalSpendings: 100 },
        { id: 2, name: 'Alice', totalSpendings: 50 },
        // ...
      ],
      searchQuery: '',
      sortBy: 'name',
      itemsPerPage: 10,
      currentPage: 1,
      newClientName: '',
    };
  },
  computed: {
    filteredClients() {
      let filtered = this.clients;

      
      if (this.searchQuery !== '') {
        filtered = filtered.filter(client => client.name.toLowerCase().includes(this.searchQuery.toLowerCase()));
      }

      
      filtered.sort((a, b) => {
        if (this.sortBy === 'name') {
          return a.name.localeCompare(b.name);
        } else if (this.sortBy === 'totalSpendings') {
          return a.totalSpendings - b.totalSpendings;
        }
    
      });

     
      const startIndex = (this.currentPage - 1) * this.itemsPerPage;
      const endIndex = startIndex + this.itemsPerPage;
      return filtered.slice(startIndex, endIndex);
    },
    totalPages() {
      return Math.ceil(this.filteredClients.length / this.itemsPerPage);
    },
  },
  methods: {
    previousPage() {
      if (this.currentPage > 1) {
        this.currentPage--;
      }
    },
    nextPage() {
      if (this.currentPage < this.totalPages) {
        this.currentPage++;
      }
    },
    submitAddClient() {
      if (this.newClientName.trim() !== '') {
        const newClient = {
          id: this.clients.length + 1,
          name: this.newClientName.trim(),
          totalSpendings: 0,
        };
        this.clients.push(newClient);
        eventBus.emit('client-added', newClient);
        this.newClientName = ''; 
      }
    },
    editClient(id) {
      eventBus.emit('edit-client', id);
    },
    deleteClient(id) {
      this.clients = this.clients.filter(client => client.id !== id);
    },
  },
  mounted() {
    eventBus.on('client-edited', editedClient => {
      const index = this.clients.findIndex(client => client.id === editedClient.id);
      if (index !== -1) {
        this.clients.splice(index, 1, editedClient);
      }
    });
  },
};
</script>
