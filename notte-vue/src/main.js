window.API_BASE = import.meta.env.VITE_API_URL // eeeeviiiil global var for the sake of a bit of brevity

import 'sugar'
import axios from 'axios'
axios.defaults.headers.common["Accept"] = "application/json";

import { createApp } from 'vue'
import { createPinia } from 'pinia'

import App from './App.vue'
import router from './router'

const app = createApp(App)

app.use(createPinia())
app.use(router)

app.mount('#app')
