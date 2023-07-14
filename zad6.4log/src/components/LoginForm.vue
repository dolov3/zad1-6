<template>
  <div>
    <h1>Login</h1>
    <form @submit.prevent="login">
      <label>Username:</label>
      <select v-model="selectedUser">
        <option value="" disabled>Select a user</option>
        <option v-for="user in users" :key="user.id" :value="user.id">{{ user.username }}</option>
      </select>
      <label>or enter a username:</label>
      <input type="text" v-model="customUsername" :disabled="selectedUser !== ''">
      <label>Password:</label>
      <input type="password" v-model="password" required>
      <button type="submit">Login</button>
    </form>
    <div v-if="users.length > 0">
      <h2>Users:</h2>
      <ul>
        <li v-for="user in users" :key="user.id">{{ user.username }}</li>
      </ul>
    </div>
  </div>
</template>

<script>
export default {
  name: 'LoginForm',
  data() {
    return {
      selectedUser: '',
      customUsername: '',
      password: '',
    };
  },
  computed: {
    users() {
      return this.$store.getters.users;
    },
  },
  methods: {
    login() {
      let username = '';
      if (this.selectedUser !== '') {
        // Wybierz nazwę użytkownika z listy
        const selectedUser = this.users.find(user => user.id === this.selectedUser);
        if (selectedUser) {
          username = selectedUser.username;
        }
      } else {
        // Użytkownik wprowadza nazwę ręcznie
        username = this.customUsername.trim();
        // Dodaj nowego użytkownika do listy w store
        if (username !== '' && !this.users.some(user => user.username === username)) {
          const newUser = {
            id: Date.now(),
            username: username,
          };
          this.$store.commit('addUser', newUser);
        }
      }

      if (username !== '') {
        const user = {
          id: Date.now(),
          username: username,
        };
        this.$store.commit('setUser', user);
        this.password = '';
        this.customUsername = '';
      }
    },
  },
};
</script>

<style>
/* Your styles here */
</style>
