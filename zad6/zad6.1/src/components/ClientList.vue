<template>
  <div>
    <h1>Client List</h1>
    <ul>
      <li v-for="client in clients" :key="client.id">
        <router-link :to="{ name: 'ClientDetails', params: { id: client.id }}">
          {{ client.name }}
        </router-link>
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  data() {
    return {
      clients: [
        { id: 1, name: 'John' },
        { id: 2, name: 'Alice' },
        // ...
      ],
    };
  },
};
</script>