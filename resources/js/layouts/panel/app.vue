<template>
    <div>
        <Header />
        <main class="page-wrapper">
            <section class="container">
                <div class="row">
                    <Sidebar />
                    <router-view :key="$route.fullPath"></router-view>
                </div>
            </section>
        </main>

        <Footer />
    </div>
</template>
<script>
import Header from "@/layouts/application/Header.vue";
import Footer from "@/layouts/application/Footer.vue";
import Sidebar from "@/layouts/panel/sidebar.vue";
export default { components: { Header, Footer, Sidebar } };
</script>
<style lang="sass">
@import "@/assets/sass/style"
</style>
