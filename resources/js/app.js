require("./bootstrap");

import { createApp } from "vue";

import router from "./router";
import '@suadelabs/vue3-multiselect/dist/vue3-multiselect.css';

const app = createApp({ components: {} });
app.use(router);
app.mount("#app");
