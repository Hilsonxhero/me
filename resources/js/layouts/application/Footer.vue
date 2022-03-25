<template>
    <!-- Footer -->
    <footer class="footer pt-5 pb-4 pb-lg-5">
        <div class="container text-center pt-lg-3">
            <div
                class="navbar-brand justify-content-center text-dark mb-2 mb-lg-4"
            >
                <img
                    :src="$store.state.General.general.logo"
                    class="me-2"
                    width="120"
                    alt="Logo"
                />
            </div>
            <ul class="nav justify-content-center pt-3 pb-4 pb-lg-5">
                <li class="nav-item">
                    <router-link class="nav-link" :to="{ name: 'home' }"
                        >Home</router-link
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
                        :to="{ name: 'portfolios index' }"
                        >Portfolios</router-link
                    >
                </li>

                <li class="nav-item">
                    <router-link class="nav-link" :to="{ name: 'contact' }"
                        >Contacts</router-link
                    >
                </li>
                <li class="nav-item">
                    <router-link class="nav-link" :to="{ name: 'about' }"
                        >About us</router-link
                    >
                </li>
            </ul>

            <div class="d-flex justify-content-center pt-4 mt-lg-3">
                <a
                    :href="$store.state.General.general.instagram"
                    class="btn btn-icon btn-secondary btn-instagram mx-2"
                >
                    <i class="bx bxl-instagram"></i>
                </a>
                <a
                    :href="$store.state.General.general.telegram"
                    class="btn btn-icon btn-secondary btn-twitter mx-2"
                >
                    <i class="bx bxl-telegram"></i>
                </a>
            </div>
            <p class="fs-sm text-center pt-5 mt-lg-4 mb-0">
                <span class="opacity-80">© All rights reserved </span>
            </p>
        </div>
    </footer>
</template>
<script>
export default {};
</script>
<style></style>
