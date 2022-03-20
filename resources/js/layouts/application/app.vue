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
import Header from "@/layouts/application/Header.vue";
import Footer from "@/layouts/application/Footer.vue";
export default { components: { Header, Footer } };
</script>
<style lang="sass">
@import "@/assets/sass/style"
</style>
