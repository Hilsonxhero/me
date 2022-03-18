import { createRouter, createWebHistory } from "vue-router";

const routes = [
    {
        path: "/",
        name: "home",
        component: () => import("../views/application/landing"),
    },
];

export default createRouter({
    history: createWebHistory(),
    routes,
});
