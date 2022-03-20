<template>
    <div>
        <Header />
        <main class="page-wrapper">
            <router-view :key="$route.fullPath"></router-view>
        </main>

        <Footer />
    </div>
</template>
<script>
import Header from "@/layouts/panel/Header.vue";
import Footer from "@/layouts/panel/Footer.vue";
export default { components: { Header, Footer } };
</script>
<style lang="sass">
@import "@/assets/sass/style"
</style>
