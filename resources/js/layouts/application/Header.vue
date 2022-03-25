<template>
    <!-- Navbar -->
    <!-- Remove "navbar-sticky" class to make navigation bar scrollable with the page -->
    <header
        class="header navbar navbar-expand-lg navbar-light position-absolute navbar-sticky navbar-stuck"
    >
        <div class="container px-3">
            <router-link class="navbar-brand pe-3" :to="{ name: 'home' }">
                <img
                    :src="$store.state.General.general.logo"
                    width="47"
                    alt="Silicon"
                />
            </router-link>
            <div id="navbarNav" class="offcanvas offcanvas-end">
                <div class="offcanvas-header border-bottom">
                    <h5 class="offcanvas-title">Menu</h5>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="offcanvas"
                        aria-label="Close"
                    ></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <router-link
                                class="nav-link"
                                :to="{ name: 'portfolios index' }"
                                >Portfolios</router-link
                            >
                        </li>
                        <li class="nav-item">
                            <router-link
                                class="nav-link"
                                :to="{ name: 'articles index' }"
                                >Articles</router-link
                            >
                        </li>
                        <li class="nav-item">
                            <router-link
                                class="nav-link"
                                :to="{ name: 'about' }"
                                >About us</router-link
                            >
                        </li>

                        <li class="nav-item">
                            <router-link
                                class="nav-link"
                                :to="{ name: 'contact' }"
                                >Contact us</router-link
                            >
                        </li>
                    </ul>
                </div>
                <div class="offcanvas-footer border-top">
                    <!-- <a
                        href=""
                        class="btn btn-primary w-100"
                        target="_blank"
                        rel="noopener"
                    >
                        <i class="bx bx-cart fs-4 lh-1 me-1"></i>
                        &nbsp;Sign in
                    </a> -->

                    <router-link
                        class="btn btn-primary w-100"
                        :to="{ name: 'login' }"
                    >
                        <i class="bx bx-cart fs-4 lh-1 me-1"></i>
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
            <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-icon"></span>
            </button>
            <template v-if="!isLoggedIn">
                <router-link
                    class="btn btn-primary btn-sm fs-sm rounded d-none d-lg-inline-flex"
                    :to="{ name: 'login' }"
                >
                    <i class="bx bx-user-circle fs-5 lh-1 me-1"></i>
                    &nbsp;Sign in
                </router-link>
            </template>
            <template v-else>
                <router-link
                    class="btn btn-primary btn-sm fs-sm rounded d-none d-lg-inline-flex"
                    :to="{ name: 'panel admin dashboard' }"
                >
                    <i class="bx bx-user-circle fs-5 lh-1 me-1"></i>
                    &nbsp;Profile
                </router-link>
            </template>
        </div>
    </header>
</template>
<script>
import { computed } from "vue";

import { mapState, mapGetters } from "vuex";
// const auth = computed(
//     ...mapState({
//         auth: (state) => state.user.isLoggedIn,
//     })
// );

export default {
    computed: {
        ...mapState("Auth", ["user"]),
        ...mapState("Auth", ["isLoggedIn"]),
    },

    mounted() {},
};
</script>
<style></style>
