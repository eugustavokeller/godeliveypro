import "../css/app.css";
import api from "./axios";

import { createApp } from "vue";
import router from "./router";
import App from "./components/App.vue";

// Tornar api disponível globalmente
window.api = api;

const app = createApp(App);

app.use(router);

app.mount("#app");
