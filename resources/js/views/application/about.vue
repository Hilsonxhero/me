<template>
    <section class="position-relative overflow-hidden mb-3 pt-5">
        <div class="container">
            <div class="row row-cols-1 row-cols-md-2 gx-3 gx-lg-4">
                <div class="col-md-6 mb-3 mb-md-0">
                    <div class="card bg-dark h-100 p-xl-4">
                        <div class="card-body">
                            <h2 class="display-1 text-light">420k</h2>
                            <p class="lead fw-medium text-light">
                                <span class="opacity-70"
                                    >users are taking advantage of our</span
                                >
                                <span class="fw-bold">Task Manager Tool</span
                                ><span class="opacity-70"
                                    >. It’s a new transparent and efficient way
                                    to organize all of your daily tasks.</span
                                >
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm p-4 p-xxl-5">
                        <div class="d-flex justify-content-between pb-4 mb-2">
                            <span
                                class="btn btn-icon btn-primary btn-lg shadow-primary pe-none"
                            >
                                <i class="bx bxs-quote-left"></i>
                            </span>
                        </div>

                        <div class="swiper-slide h-auto">
                            <figure
                                class="card h-100 position-relative border-0 bg-transparent"
                            >
                                <blockquote class="card-body p-0 mb-0">
                                    <p
                                        class="fs-lg mb-0"
                                        v-html="
                                            $store.state.General.general.about
                                        "
                                    ></p>
                                </blockquote>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Integrations -->
    <section class="container py-5 my-md-2 my-lg-4 my-xl-5">
        <div class="row justify-content-center pt-1 pb-1 mb-2 mb-md-3 mb-lg-4">
            <div class="col-lg-8 col-md-9 text-center">
                <h2 class="h1 mb-4">Integrate Top Work Tools</h2>
                <p class="fs-lg text-muted mb-0">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    Proin volutpat mollis egestas. Nam luctus facilisis
                    ultrices. Pellentesque volutpat ligula est. Mattis
                    fermentum, at nec lacus.
                </p>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="tools_item" v-for="(tool, index) in tools" :key="index">
                <a href="#" class="card card-hover border-0 shadow-sm">
                    <div class="card-body tools_img">
                        <img :src="tool.img" class="d-block mx-auto" alt="" />
                    </div>
                </a>
            </div>
        </div>

        <div class="text-center my-3 mt-4">
            <a href="#" class="btn btn-primary">View all integrations</a>
        </div>
    </section>
</template>
<script setup>
import { ref } from "vue";
import "swiper/css";
import Carousel from "@/components/carousel";

const tools = ref([
    { img: "/assets/img/langs/react.svg" },
    { img: "/assets/img/langs/vue.svg" },
    { img: "/assets/img/langs/javascript.svg" },
    { img: "/assets/img/langs/typescript.svg" },
    { img: "/assets/img/langs/nuxt.svg" },
    { img: "/assets/img/langs/nextjs.svg" },
    { img: "/assets/img/langs/sass.svg" },
    { img: "/assets/img/langs/tailwind.svg" },
    { img: "/assets/img/langs/php.svg" },
    { img: "/assets/img/langs/laravel.svg" },
    { img: "/assets/img/langs/mysql.svg" },
    { img: "/assets/img/langs/redis.svg" },
]);
</script>
<style>
.tools_item {
    width: auto;
    display: flex;
    margin: 1rem 0;
}
.tools_img {
    width: 140px;
    height: 140px;
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
}

.tools_img img {
    width: auto;
    position: relative;
    max-height: 70px;
    max-width: 90%;
}
</style>
