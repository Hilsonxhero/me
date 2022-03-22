require("./bootstrap");

import { createApp } from "vue";

import router from "./router";
import "@suadelabs/vue3-multiselect/dist/vue3-multiselect.css";

import ElementPlus from "element-plus";


import "element-plus/dist/index.css";

const app = createApp({ components: {} });
app.use(router);
app.use(ElementPlus);
app.mount("#app");
