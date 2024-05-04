import './bootstrap';

import Alpine from 'alpinejs';
import { createApp } from 'vue';

window.Alpine = Alpine;

Alpine.start();


import AlertMessage from './components/AlertMessage.vue';
import DeleteButton from './components/DeleteButton.vue';



const app = createApp({
    components:{
        AlertMessage,
        DeleteButton
    }
});

app.mount("#app");
