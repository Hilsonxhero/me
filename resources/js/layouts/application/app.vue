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
import { ElLoading } from "element-plus";
import { mapActions, mapState, mapGetters } from "vuex";
export default {
    components: { Header, Footer },

    data() {
        return {
            loading: null,
        };
    },

    methods: {
        ...mapActions("General", ["generalHandler"]),

        enableInterceptor() {
            this.axiosInterceptor = window.axios.interceptors.request.use(
                (config) => {
                    this.loading = ElLoading.service({
                        lock: true,
                        text: "Loading",
                        background: "rgba(0, 0, 0, 1)",
                    });
                    return config;
                },
                (error) => {
                    this.loading.close();
                    return Promise.reject(error);
                }
            );

            window.axios.interceptors.response.use(
                (response) => {
                    this.loading.close();
                    return response;
                },
                (error) => {
                    this.loading.close();

                    return Promise.reject(error);
                }
            );
        },
    },

    mounted() {
        this.loading = ElLoading.service({
            lock: true,
            text: "Loading",
            background: "rgba(0, 0, 0, 1)",
        });
        this.enableInterceptor();
        this.generalHandler();
    },
};
</script>
<style lang="sass">
@import "@/assets/sass/style"
</style>
