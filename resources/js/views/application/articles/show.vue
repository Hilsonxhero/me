<template>
    <div v-if="article">
        <!-- Breadcrumb -->
        <nav class="container pt-4 mt-lg-3" aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <router-link :to="{ name: 'home' }">
                        <i class="bx bx-home-alt fs-lg me-1"></i>Home
                    </router-link>
                </li>
                <li class="breadcrumb-item">
                    <router-link :to="{ name: 'articles index' }">
                        articles
                    </router-link>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    {{ article.title }}
                </li>
            </ol>
        </nav>

        <!-- Post title + Meta  -->
        <section class="container mt-4 pt-lg-2 pb-3">
            <h1 class="pb-3" style="max-width: 970px">
                {{ article.title }}
            </h1>
            <div
                class="d-flex flex-md-row flex-column align-items-md-center justify-content-md-between mb-3"
            >
                <div
                    class="d-flex align-items-center flex-wrap text-muted mb-md-0 mb-4"
                >
                    <div class="fs-xs border-end pe-3 me-3 mb-2">
                        <span
                            v-if="article.category"
                            class="badge bg-faded-primary text-primary fs-base"
                        >{{ article.category.title }}</span
                        >
                    </div>
                    <div class="fs-sm border-end pe-3 me-3 mb-2">
                        {{ article.created_at }}
                    </div>
                    <div class="d-flex mb-2 d-none">
                        <div class="d-flex align-items-center me-3">
                            <i class="bx bx-like fs-base me-1"></i>
                            <span class="fs-sm">8</span>
                        </div>
                        <div class="d-flex align-items-center me-3">
                            <i class="bx bx-comment fs-base me-1"></i>
                            <span class="fs-sm">4</span>
                        </div>
                        <div class="d-flex align-items-center">
                            <i class="bx bx-share-alt fs-base me-1"></i>
                            <span class="fs-sm">2</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Post image (parallax) -->
        <div
            class="jarallax mb-lg-5 mb-4"
            data-jarallax
            data-speed="0.4"
            style="height: 36.45vw; min-height: 300px"
        >
            <div
                class="jarallax-img background-fixed"
                :style="`background-image: url(${article.banner_src})`"
            ></div>
        </div>

        <!-- Post content + Sharing -->
        <section class="container mb-5 pt-4 pb-2 py-mg-4">
            <div class="row gy-4">
                <!-- Content -->
                <div class="col-lg-9">
                    <div class="article__dec" v-html="article.content"></div>
                    <!-- Tags -->
                    <hr class="mb-4"/>
                    <div class="d-flex flex-sm-row flex-column pt-2">
                        <div class="d-flex flex-wrap align-items-center">
                            <span
                                class="badge bg-primary mb-2 me-2"
                                v-for="(tag, index) in article.tags"
                                :key="index"
                            >{{ tag.title }}</span
                            >
                        </div>
                    </div>
                </div>

                <!-- Sharing -->
                <div class="col-lg-3 position-relative">
                    <div
                        class="sticky-top ms-xl-5 ms-lg-4 ps-xxl-4"
                        style="top: 105px !important"
                    >
                        <!-- <span class="d-block mb-3">5 min read</span> -->
                        <h6>Share this post:</h6>
                        <div class="mb-4 pb-lg-3">
                            <a
                                href="#"
                                target="_blank"
                                class="btn btn-icon btn-secondary btn-linkedin me-2 mb-2"
                            >
                                <i class="bx bxl-facebook-square"></i>
                            </a>
                            <a
                                target="_blank"
                                :href="`https://t.me/share/url?url=${path}&text=${article.title}`"
                                class="btn btn-icon btn-secondary btn-facebook me-2 mb-2"
                            >
                                <i class="bx bx-paper-plane"></i>
                            </a>
                            <a
                                target="_blank"
                                :href="'whatsapp://send?text=' + path"
                                class="btn btn-icon btn-secondary btn-twitter me-2 mb-2"
                            >
                                <i class="bx bxl-whatsapp"></i>
                            </a>
                            <a
                                target="_blank"
                                :href="`https://www.instagram.com/?url=${path}`"
                                class="btn btn-icon btn-secondary btn-instagram me-2 mb-2"
                            >
                                <i class="bx bxl-instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Related articles (Slider below lg breakpoint) -->
        <section class="container mb-5 pt-md-4">
            <div
                class="d-flex flex-sm-row flex-column align-items-center justify-content-between mb-4 pb-1 pb-md-3"
            >
                <h2 class="h1 mb-sm-0">Related Articles</h2>

                <router-link
                    class="btn btn-lg btn-outline-primary ms-4"
                    :to="{ name: 'articles index' }"
                >
                    All posts
                    <i class="bx bx-right-arrow-alt ms-1 me-n1 lh-1 lead"></i>
                </router-link>
            </div>

            <div class="row">
                <div
                    class="col-12 col-md-6 col-lg-4 col-xl-4 col-xxl-3 mb-4"
                    v-for="(related_article, index) in related_articles"
                    :key="index"
                >
                    <article class="card border-0 shadow-sm h-100 mx-2">
                        <div class="position-relative portfolio-media-cover">
                            <router-link
                                class="position-absolute top-0 start-0 w-100 h-100"
                                :to="{
                                    name: 'articles show',
                                    params: {
                                        id: related_article.id,
                                        slug: related_article.slug,
                                    },
                                }"
                            ></router-link>

                            <img
                                :src="related_article.banner_src"
                                class="card-img-top"
                                alt="Image"
                            />
                        </div>
                        <div class="card-body pb-4">
                            <div
                                class="d-flex align-items-center justify-content-between mb-3"
                            >
                                <a
                                    v-if="related_article.category"
                                    href="#"
                                    class="badge fs-sm text-nav bg-secondary text-decoration-none"
                                >{{ related_article.category.title }}</a
                                >
                                <span class="fs-sm text-muted">{{
                                        related_article.created_at
                                    }}</span>
                            </div>
                            <h3 class="h5 mb-0">
                                <router-link
                                    class="h5 mb-0"
                                    :to="{
                                        name: 'articles show',
                                        params: {
                                            id: related_article.id,
                                            slug: related_article.slug,
                                        },
                                    }"
                                >
                                    {{ related_article.title }}
                                </router-link>
                            </h3>
                        </div>
                    </article>
                </div>
            </div>
        </section>
    </div>
</template>
<script setup>
import {onMounted, reactive, ref, computed} from "vue";
import {useRoute} from "vue-router";
import {useHead} from "@vueuse/head";

const article = ref([]);
const related_articles = ref([]);

const route = useRoute();

useHead({
    title: computed(() => article.value.title),
    meta: [
        {
            name: `description`,
            content: computed(() => article.value.description),
            key: "description",
        },
    ],
});

const id = ref(null);

const path = ref(null)

console.log("sss");
onMounted(() => {
    path.value = window.location.href
    id.value = route.params.id;
    axios
        .get(`/api/application/articles/${id.value}`)
        .then(({data}) => {
            article.value = data.data;
            related_articles.value = data.related_articles;
        })
        .catch((error) => {
        });
});
</script>
<style>
.article__dec p {
    line-height: 2;
    word-break: break-all;
}
.article__dec p{
    word-break: break-all !important;
}

.article__dec img {
    margin: 1.5rem 0;
    border-radius: 1.8rem;
}

.portfolio-media-cover img {
    height: 100%;
    width: 100%;
}


@media (min-width: 768px) {
    .portfolio-media-cover {
        height: 250px;
    }
}

@media (min-width: 992px) {
    .portfolio-media-cover {
        height: 250px;
    }
}

@media (min-width: 1200px) {
    .portfolio-media-cover {
        height: 220px;
    }
}

</style>
