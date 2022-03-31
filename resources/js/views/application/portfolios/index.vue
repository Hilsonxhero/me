<template>
    <div>
        <section class="container mb-5 mt-5" v-if="portfolios">
            <div class="row">
                <div
                    class="col-lg-6"
                    v-for="(portfolio, index) in portfolios"
                    :key="index"
                >
                    <!-- Article -->
                    <article
                        class="card border-0 shadow-sm overflow-hidden mb-4"
                    >
                        <div class="row g-0">
                            <div
                                class="col-sm-5 position-relative bg-position-center bg-repeat-0 bg-size-cover"
                                style="min-height: 15rem"
                                :style="`background-image: url(${portfolio.banner_src})`"
                            >
                                <router-link
                                    class="position-absolute top-0 start-0 w-100 h-100"
                                    :to="{
                                        name: 'portfolios show',
                                        params: {
                                            id: portfolio.id,
                                            slug: portfolio.slug,
                                        },
                                    }"
                                >
                                </router-link>
                                <a
                                    href="#"
                                    class="btn btn-icon btn-light bg-white border-white btn-sm rounded-circle position-absolute top-0 end-0 zindex-5 me-3 mt-3"
                                    data-bs-toggle="tooltip"
                                    data-bs-placement="left"
                                    title=""
                                    data-bs-original-title="Read later"
                                >
                                    <i class="bx bx-bookmark"></i>
                                </a>
                            </div>
                            <div class="col-sm-7">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-3">
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
                                    <hr class="my-4" />
                                    <div
                                        class="d-flex flex-wrap align-items-center"
                                    >
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
<style></style>
