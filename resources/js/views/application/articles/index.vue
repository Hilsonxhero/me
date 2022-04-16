<template>
    <section class="container mb-5 mt-5" v-if="articles">
        <div class="row">
            <div
                class="col-lg-4 mb-4"
                v-for="(article, index) in articles"
                :key="index"
            >
                <!-- Article -->
                <article
                    class="card p-md-3 p-2 border-0 shadow-sm card-hover-primary h-100 mx-2"
                >
                    <div class="card-body pb-0">
                        <div
                            class="d-flex align-items-center justify-content-between mb-3"
                        >
                            <a
                                href="#"
                                class="badge fs-sm text-nav bg-secondary text-decoration-none position-relative zindex-2"
                            >{{ article.category.title }}</a
                            >
                            <span class="fs-sm text-muted">{{
                                    article.created_at
                                }}</span>
                        </div>
                        <h3 class="h4">
                            <router-link
                                class="stretched-link"
                                :to="{
                                                name: 'articles show',
                                                params: {
                                                    id: article.id,
                                                    slug: article.slug,
                                                },
                                            }"
                            >
                                {{ article.title }}
                            </router-link>
                        </h3>
                        <p class="mb-0">
                            {{ article.description }}
                        </p>
                    </div>
                    <div
                        class="card-footer d-flex align-items-center py-4 text-muted border-top-0 d-none"
                    >
                        <div class="d-flex align-items-center me-3">
                            <i class="bx bx-like fs-lg me-1"></i>
                            <span class="fs-sm">2</span>
                        </div>
                        <div class="d-flex align-items-center me-3">
                            <i class="bx bx-comment fs-lg me-1"></i>
                            <span class="fs-sm">0</span>
                        </div>
                        <div class="d-flex align-items-center">
                            <i
                                class="bx bx-share-alt fs-lg me-1"
                            ></i>
                            <span class="fs-sm">3</span>
                        </div>
                    </div>
                </article>
            </div>


        </div>
    </section>
</template>
<script setup>
import { onMounted, reactive, ref,computed } from "vue";
import { useHead } from "@vueuse/head";
useHead({
    title: computed(() => "articles page"),
    // meta: [
    //     {
    //         name: `description`,
    //         content: computed(() => portfolio.value.description),
    //         key: "description",
    //     },
    // ],
});

const articles = ref([]);

onMounted(() => {
    axios
        .get("/api/application/articles/all/index")
        .then(({ data }) => {
            articles.value = data.data;
        })
        .catch((error) => {});
});
</script>
<style></style>
