import { createRouter, createWebHistory } from "vue-router";

const routes = [
    {
        path: "/",
        name: "home",
        component: () => import("../views/application/landing"),
    },

    {
        path: "/",
        component: () => import("../layout/app"),
        children: [
            {
                path: "",
                name: "home",
                component: () => import("../views/application/landing"),
            },

            {
                path: "about",
                name: "about",
                component: () => import("../views/application/about"),
            },

            {
                path: "contact",
                name: "contact",
                component: () => import("../views/application/contact"),
            },

            {
                path: "portfolios",
                name: "portfolios index",
                component: () =>
                    import("../views/application/portfolios/index"),
            },

            {
                path: "portfolios/:id/:slug",
                name: "portfolios show",
                component: () => import("../views/application/portfolios/show"),
            },

            {
                path: "articles",
                name: "articles index",
                component: () =>
                    import("../views/application/articles/index"),
            },

            {
                path: "articles/:id/:slug",
                name: "articles show",
                component: () => import("../views/application/articles/show"),
            },
        ],
    },
];

export default createRouter({
    history: createWebHistory(),
    routes,
    scrollBehavior(to, from, savedPosition) {
        // always scroll to top
        return { top: 0 }
      },
});
