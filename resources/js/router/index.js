import { createRouter, createWebHistory } from "vue-router";

const routes = [
    {
        path: "/auth",
        component: () => import("../layouts/auth/app"),
        children: [
            {
                path: "register",
                component: () => import("../views/auth/register"),
                name: "register",
            },
            {
                path: "login",
                component: () => import("../views/auth/login"),
                name: "login",
            },
        ],
    },

    // errors page

    {
        path: "/404",
        component: () => import("../views/utility/404"),
        name: "not-found",
    },

    {
        path: "/500",
        component: () => import("../views/utility/500"),
        name: "server-error",
    },

    {
        path: "/",
        component: () => import("../layouts/application/app"),
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
                component: () => import("../views/application/articles/index"),
            },

            {
                path: "articles/:id/:slug",
                name: "articles show",
                component: () => import("../views/application/articles/show"),
            },

            {
                path: "/:match(.*)",
                redirect: "/404",
            },
        ],
    },

    {
        path: "/panel/admin",
        component: () => import("../layouts/panel/app"),
        children: [
            {
                path: "dashboard",
                name: "panel admin dashboard",
                component: () => import("../views/panel/dashboard"),
            },

            {
                path: "categories",
                name: "panel admin categories",
                component: () => import("@/views/panel/categories/index"),
            },

            {
                path: "categories/create",
                name: "panel admin categories create",
                component: () => import("@/views/panel/categories/create"),
            },

            {
                path: "categories/edit/:id",
                name: "panel admin categories edit",
                component: () => import("@/views/panel/categories/edit"),
            },

            {
                path: "tags",
                name: "panel admin tags",
                component: () => import("@/views/panel/tags/index"),
            },

            {
                path: "tags/create",
                name: "panel admin tags create",
                component: () => import("@/views/panel/tags/create"),
            },

            {
                path: "tags/edit/:id",
                name: "panel admin tags edit",
                component: () => import("@/views/panel/tags/edit"),
            },

            {
                path: "technologies",
                name: "panel admin technologies",
                component: () => import("@/views/panel/technologies/index"),
            },

            {
                path: "technologies/create",
                name: "panel admin technologies create",
                component: () => import("@/views/panel/technologies/create"),
            },

            {
                path: "technologies/edit/:id",
                name: "panel admin technologies edit",
                component: () => import("@/views/panel/technologies/edit"),
            },

            {
                path: "portfolios",
                name: "panel admin portfolios",
                component: () => import("../views/panel/portfolios/index"),
            },

            {
                path: "portfolios/create",
                name: "panel admin portfolios create",
                component: () => import("../views/panel/portfolios/create"),
            },

            {
                path: "portfolios/edit/:id",
                name: "panel admin portfolios edit",
                component: () => import("../views/panel/portfolios/edit"),
            },

            {
                path: "portfolios/gallery/:id",
                name: "panel admin portfolios gallery",
                component: () => import("../views/panel/portfolios/gallery"),
            },

            {
                path: "portfolios/gallery/edit/:id",
                name: "panel admin portfolios gallery edit",
                component: () =>
                    import("../views/panel/portfolios/gallery/edit"),
            },

            {
                path: "articles",
                name: "panel admin articles",
                component: () => import("../views/panel/articles/index"),
            },

            {
                path: "articles/create",
                name: "panel admin articles create",
                component: () => import("../views/panel/articles/create"),
            },

            {
                path: "articles/edit/:id",
                name: "panel admin articles edit",
                component: () => import("../views/panel/articles/edit"),
            },

            {
                path: "messages",
                name: "panel admin messages",
                component: () => import("../views/panel/messages/index"),
            },

            {
                path: "messages/edit/:id",
                name: "panel admin messages edit",
                component: () => import("../views/panel/messages/edit"),
            },

            {
                path: "setting",
                name: "panel admin setting",
                component: () => import("../views/panel/setting/index"),
            },
        ],
    },
];

export default createRouter({
    history: createWebHistory(),
    routes,
    scrollBehavior(to, from, savedPosition) {
        // always scroll to top
        return { top: 0 };
    },
});
