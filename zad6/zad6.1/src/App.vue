<template>
  <div>
    <ClientList></ClientList>
    <ClientDetails :clientId="currentClientId"></ClientDetails>
  </div>
</template>

<script>
import { ref, onBeforeUnmount } from 'vue';
import ClientList from './components/ClientList.vue';
import ClientDetails from './components/ClientDetails.vue';
import eventBus from './EventBus';

export default {
  components: {
    ClientList,
    ClientDetails,
  },
  setup() {
    const currentClientId = ref(null);

    const handleEditClient = (id) => {
      currentClientId.value = id;
    };

    eventBus.on('edit-client', handleEditClient);

    onBeforeUnmount(() => {
      eventBus.off('edit-client', handleEditClient);
    });

    return {
      currentClientId,
    };
  },
};
</script>

<!-- eslint-disable-next-line -->
<style>
/* Styles for the App component */
</style>