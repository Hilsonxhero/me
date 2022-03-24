<template>
    <div>
        <Header />
        <main class="page-wrapper">
            <router-view :key="$route.fullPath"></router-view>
        </main>
    </div>
</template>
<script>
import Header from "@/layouts/application/Header.vue";
export default { components: { Header } };
</script>
<style lang="sass">
@import "@/assets/sass/style"
</style>
