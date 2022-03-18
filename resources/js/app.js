require("./bootstrap");

import { createApp } from "vue";

import router from "./router";

const app = createApp({ components: {} }).use(router).mount("#app");
