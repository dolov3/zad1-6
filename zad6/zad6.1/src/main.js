import { createApp } from 'vue';
import ClientList from './components/ClientList.vue';
import ClientDetails from './components/ClientDetails.vue';
import Router from 'vue-router';

//Tutaj można zmienić, co będzie wyświetlane: ClientList lub ClientDetails.
const app = createApp(ClientDetails);


app.component('ClientList', ClientList);
app.component('ClientDetails', ClientDetails);
app.use(Router)
app.mount('#app')
