import Vue from 'vue';
import Router from 'vue-router';
import ClientList from './components/ClientList.vue';
import ClientDetails from './components/ClientDetails.vue';
import ClientForm from './components/ClientForm.vue';

Vue.use(Router);

export default new Router({
  routes: [
    {
      path: '/',
      name: 'ClientList',
      component: ClientList,
    },
    {
      path: '/client/:id',
      name: 'ClientDetails',
      component: ClientDetails,
      props: true,
    },
    {
      path: '/add-client',
      name: 'ClientForm',
      component: ClientForm,
    },
  ],
});
