<template>
    <div>
        <section class="container mb-5 mt-5" v-if="portfolios">
            <div class="row">
                <div
                    class="col-sm-10 col-md-6 col-lg-4 col-xl-3 mb-4"
                    v-for="(portfolio, index) in portfolios"
                    :key="index"
                >
                    <article>
                        <div
                            class="d-block position-relative rounded-3 mb-3 portfolio-cover-image"
                        >
                            <router-link
                                class="position-absolute top-0 start-0 w-100 h-100 rounded-3"
                                :to="{
                                    name: 'portfolios show',
                                    params: {
                                        id: portfolio.id,
                                        slug: portfolio.slug,
                                    },
                                }"
                            >
                            </router-link>

                            <img
                                :src="portfolio.banner_src"
                                class="rounded-3"
                                alt="Image"
                            />
                        </div>
                        <div class="d-flex align-items-center mb-2">
                            <a
                                href="#"
                                class="badge fs-sm text-nav bg-secondary text-decoration-none"
                                >{{ portfolio.category.title }}</a
                            >
                            <span
                                class="fs-sm text-muted border-start ps-3 ms-3"
                                >{{ portfolio.created_at }}</span
                            >
                        </div>
                        <h3 class="h5">
                            <router-link
                                :to="{
                                    name: 'portfolios show',
                                    params: {
                                        id: portfolio.id,
                                        slug: portfolio.slug,
                                    },
                                }"
                            >
                                {{ portfolio.title }}
                            </router-link>
                        </h3>
                        <div class="d-flex flex-wrap align-items-center">
                            <template
                                v-for="(
                                    technology, index
                                ) in portfolio.technologies"
                                :key="index"
                            >
                                <span
                                    class="badge bg-primary mb-2 me-2"
                                    v-if="index <= 3"
                                >
                                    {{ technology.title }}
                                </span>
                            </template>
                        </div>
                        <!--                        <a href="blog-podcast.html" class="btn btn-link px-0 mt-3">-->
                        <!--                            <i class="bx bx-play-circle fs-lg me-2"></i>-->
                        <!--                            Read now-->
                        <!--                        </a>-->
                    </article>
                </div>
            </div>
        </section>
    </div>
</template>
<script setup>
import { onMounted, reactive, ref, computed } from "vue";

import { useHead } from "@vueuse/head";
useHead({
    title: computed(() => "portfolios page"),
    // meta: [
    //     {
    //         name: `description`,
    //         content: computed(() => portfolio.value.description),
    //         key: "description",
    //     },
    // ],
});

const portfolios = ref([]);

onMounted(() => {
    axios
        .get("/api/application/portfolios/all/index")
        .then(({ data }) => {
            portfolios.value = data.data;
        })
        .catch((error) => {});
});
</script>
<style>
.portfolio-cover-image img {
    height: 100%;
    width: 100%;
}
.portfolio-cover-image {
    height: 270px;
}

@media (min-width: 576px) {
    .portfolio-cover-image {
        height: 300px;
    }
}

@media (min-width: 768px) {
    .portfolio-cover-image {
        height: 250px;
    }
}

@media (min-width: 992px) {
    .portfolio-cover-image {
        height: 220px;
    }
}

@media (min-width: 1200px) {
    .portfolio-cover-image {
        height: 220px;
    }
}
</style>
