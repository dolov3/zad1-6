import { createStore } from 'vuex';

export default createStore({
  state: {
    user: null,
    users: [
      { id: 1, username: 'John' },
      { id: 2, username: 'Alice' },
      // Dodaj więcej użytkowników
    ],
  },
  mutations: {
    setUser(state, user) {
      state.user = user;
    },
    addUser(state, user) {
      state.users.push(user);
    },
  },
  getters: {
    isLoggedIn: state => state.user !== null,
    userName: state => state.user ? state.user.username : '',
    users: state => state.users,
  },
});
