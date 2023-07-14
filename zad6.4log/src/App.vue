<!-- App.vue -->
<template>
  <div id="app">
    <div v-if="isUserLoggedIn">
      <h1>Logged In User: {{ $store.getters.userName }}</h1>
      <router-view />
    </div>
    <LoginForm v-else /> <!-- Show login form if user is not logged in -->
  </div>
</template>

<script>
import { computed } from 'vue';
import { useStore } from 'vuex';

import LoginForm from './components/LoginForm.vue';

export default {
  name: 'App',
  components: {
    LoginForm,
  },
  setup() {
    const store = useStore();

    // Computed property to check if the user is logged in
    const isUserLoggedIn = computed(() => {
      return store.state.user !== null;
    });

    // Computed property to get the user's name
    const userName = computed(() => {
      return store.state.user ? store.state.user.username : '';
    });

    return {
      isUserLoggedIn,
      userName,
    };
  },
};
</script>

<style>
/* Your styles here */
</style>
