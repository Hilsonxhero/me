<template>
    <div class="mt-5" v-if="portfolio">
        <!-- Page title -->
        <section class="container pb-4 mb-2 mb-lg-3">
            <h1>{{ portfolio.title }}</h1>

            <!-- Breadcrumb -->
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <router-link :to="{ name: 'home' }">
                        <i class="bx bx-home-alt fs-lg me-1"></i>Home
                    </router-link>
                </li>
                <li class="breadcrumb-item">
                    <router-link :to="{ name: 'portfolios index' }">
                        portfolios
                    </router-link>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    {{ portfolio.title }}
                </li>
            </ol>
        </section>

        <!-- Hero image (Parallax) -->
        <section class="jarallax" data-jarallax data-speed="0.5">
            <div
                class="jarallax-img bg-fixed"
                :style="`background-image: url(${portfolio.banner_src})`"
            ></div>
            <div class="d-none d-xxl-block" style="height: 800px"></div>
            <div
                class="d-none d-lg-block d-xxl-none"
                style="height: 600px"
            ></div>
            <div
                class="d-none d-md-block d-lg-none"
                style="height: 450px"
            ></div>
            <div class="d-md-none" style="height: 400px"></div>
        </section>

        <!-- About project -->
        <section class="container py-5 my-1 my-md-4 my-lg-5">
            <div class="row">
                <div class="col-lg-7 mb-4 mb-lg-0">
                    <div class="pe-lg-4 me-lg-3 pe-xl-0 me-xl-0">
                        <h2 class="h1 mb-4">About</h2>
                        <p class="fs-lg mb-0">
                            {{ portfolio.description }}
                        </p>
                    </div>
                </div>

                <div class="col-lg-5 col-xl-4 offset-xl-1 border-start-lg">
                    <div class="ps-lg-4 ms-lg-3">
                        <h3 class="h5 d-flex align-items-center">
                            <i
                                class="bx bx-help-circle text-primary fs-4 me-2"
                            ></i>
                            Services
                        </h3>
                        <p class="pb-4 mb-0 mb-lg-3">
                            {{ portfolio.services }}
                        </p>
                        <h3 class="h5 d-flex align-items-center">
                            <i class="bx bx-globe text-primary fs-4 me-2"></i>
                            website
                        </h3>
                        <p class="pb-4 mb-0 mb-lg-3">
                            {{ portfolio.web }}
                        </p>

                        <h3 class="h5 d-flex align-items-center">
                            <i class="bx bx-atom text-primary fs-4 me-2"></i>
                            technologies
                        </h3>
                        <div class="d-flex flex-wrap align-items-center">
                            <span
                                class="badge bg-primary mb-2 me-2"
                                v-for="(
                                    technology, index
                                ) in portfolio.technologies"
                                :key="index"
                                >{{ technology.title }}</span
                            >
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Image grid (Parallax) -->
        <section class="container position-relative pt-1 pt-md-3">
            <div class="row">
                <div
                    class="col-lg-3"
                    v-for="(media, index) in portfolio.galleries"
                >
                    <div class="card card-portfolio">
                        <div class="card-img portfolio__media">
                            <img :src="media.banner_src" alt="Image" class="" />
                        </div>
                        <div class="card-body">
                            <h3 class="h4 mb-2">
                                <a class="stretched-link">{{ media.title }}</a>
                            </h3>
                            <!-- <div class="card-portfolio-meta">
                                <span class="text-muted"
                                    >Mobile App Desig / UI / UX</span
                                >
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>
<script setup>
import { onMounted, reactive, ref,computed } from "vue";

import { useRoute } from "vue-router";

import { useHead } from "@vueuse/head";

const portfolio = ref([]);

useHead({
    title: computed(() => portfolio.value.title),
    // meta: [
    //     {
    //         name: `description`,
    //         content: computed(() => portfolio.value.description),
    //         key: "description",
    //     },
    // ],
});

const route = useRoute();

const id = ref(null);

onMounted(() => {
    id.value = route.params.id;
    axios
        .get(`/api/application/portfolios/${id.value}`)
        .then(({ data }) => {
            portfolio.value = data.data;
        })
        .catch((error) => {});
});
</script>
<style>
.bg-fixed {
    background-attachment: fixed;
}
.portfolio__media {
    height: 280px;
    object-fit: cover;
}
.portfolio__media img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}
</style>
