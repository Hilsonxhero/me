<template>
    <!-- Navbar -->
    <!-- Remove "navbar-sticky" class to make navigation bar scrollable with the page -->
    <header
        v-if="$store.state.General.general.logo"
        class="header navbar navbar-expand-lg navbar-light position-absolute navbar-sticky navbar-stuck"
    >
        <div class="container px-3">
            <router-link class="navbar-brand pe-3" :to="{ name: 'home' }">
                <img
                    :src="$store.state.General.general.logo"
                    width="120"
                    alt="Logo"
                />
            </router-link>
            <div
                id="navbarNav"
                class="offcanvas offcanvas-end"
                :class="[toggle ? 'visible show' : '']"
            >
                <div class="offcanvas-header border-bottom">
                    <h5 class="offcanvas-title">Menu</h5>
                    <button
                        @click="toggle = !toggle"
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="offcanvas"
                        aria-label="Close"
                    ></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li
                            @click="toggle = !toggle"
                            class="nav-item"
                            v-for="(item, index) in items"
                            :key="index"
                        >
                            <router-link
                                class="nav-link"
                                :to="{ name: item.route }"
                                >{{ item.title }}</router-link
                            >
                        </li>
                    </ul>
                </div>
                <div class="offcanvas-footer border-top">
                    <router-link
                        class="btn btn-primary w-100"
                        :to="{ name: 'login' }"
                    >
                        <i class="bx bx-user-circle fs-4 lh-1 me-1"></i>
                        &nbsp;Sign in
                    </router-link>
                </div>
            </div>
            <!-- <div
                class="form-check form-switch mode-switch pe-lg-1 ms-auto me-4"
                data-bs-toggle="mode"
            >
                <input
                    type="checkbox"
                    class="form-check-input"
                    id="theme-mode"
                />
                <label
                    class="form-check-label d-none d-sm-block"
                    for="theme-mode"
                    >Light</label
                >
                <label
                    class="form-check-label d-none d-sm-block"
                    for="theme-mode"
                    >Dark</label
                >
            </div> -->
            <button
                type="button"
                class="navbar-toggler"
                @click="togglerHandler"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- <template v-if="!isLoggedIn">
                <router-link
                    class="btn btn-primary btn-sm fs-sm rounded d-none d-lg-inline-flex"
                    :to="{ name: 'login' }"
                >
                    <i class="bx bx-user-circle fs-5 lh-1 me-1"></i>
                    &nbsp;Sign in
                </router-link>
            </template> -->
            <template v-if="isLoggedIn">
                <router-link
                    class="btn btn-primary btn-sm fs-sm rounded d-none d-lg-inline-flex"
                    :to="{ name: 'panel admin dashboard' }"
                >
                    <i class="bx bx-user-circle fs-5 lh-1 me-1"></i>
                    &nbsp;Profile
                </router-link>
            </template>
            <template v-if="toggle">
                <div
                    @click="toggle = !toggle"
                    class="offcanvas-backdrop d-lg-none fade"
                    :class="{ show: toggle }"
                ></div>
            </template>
        </div>
    </header>
</template>
<script>
import { mapState, mapGetters } from "vuex";

export default {
    data() {
        return {
            toggle: false,
            items: [
                { title: "Home", route: "home" },
                { title: "Portfolios", route: "portfolios index" },
                { title: "Articles", route: "articles index" },
                { title: "About me", route: "about" },
                { title: "Contact me", route: "contact" },
            ],
        };
    },
    computed: {
        ...mapState("Auth", ["user"]),
        ...mapState("Auth", ["isLoggedIn"]),
    },
    methods: {
        togglerHandler() {
            this.toggle = !this.toggle;
        },
    },

    mounted() {},
};
</script>
<style>
.visible {
    visibility: visible;
}
</style>
