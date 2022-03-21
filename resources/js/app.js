require("./bootstrap");

import { createApp } from "vue";

import router from "./router";

import Vuesax from 'vuesax3'

import 'vuesax3/dist/vuesax.css'


const app = createApp({ components: {} }).use(router).use(Vuesax).mount("#app");
