require("./bootstrap");

import { createApp } from "vue";

import router from "@/router";
import store from "@/store";
import "@suadelabs/vue3-multiselect/dist/vue3-multiselect.css";
import ElementPlus from "element-plus";
import "element-plus/dist/index.css";
import { createHead } from '@vueuse/head'

router.beforeEach((to, from, next) => {
    if (to.meta.guest && store.state.Auth.isLoggedIn) {
        next({ name: "home" });
    }
    if (
        (to.meta.auth || to.matched.some((parent) => parent.meta.auth)) &&
        !store.state.Auth.isLoggedIn
    ) {
        next({ name: "login" });
    }
    if (to.meta.verified && store.state.Auth.user.isVerified !== 2) {
        next({ name: "login" });
    }

    if (
        (to.meta.admin || to.matched.some((parent) => parent.meta.auth)) &&
        store.state.Auth.user.isAdmin !== 1
    ) {
        next({ name: "login" });
    }
    next();
});

const app = createApp({ components: {} });
const head = createHead()
app.use(head)
app.use(router);
app.use(store);
app.use(ElementPlus);



app.mount("#app");
