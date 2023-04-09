<template>
    <div class="">
        <section class="container-fluid position-relative px-0">
            <div class="row g-0">
                <div class="col-xl-7 col-lg-6 pe-lg-5 d-lg-block">
                    <div class="d-flex h-100 pe-xl-4">
                        <video
                            class="w-100"
                            autoplay=""
                            muted=""
                            loop=""
                            style="object-fit: cover"
                            preload="false"
                        >
                            <source
                                src="assets/videos/hero-video.mp4"
                                type="video/mp4"
                            />
                        </video>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6 position-relative py-5">
                    <img
                        src="assets/img/hero-bg.png"
                        class="position-absolute top-50 translate-middle-y ms-lg-n4"
                        width="866"
                        alt="Background shapes"
                        loading="lazy"
                    />
                    <div
                        class="position-relative zindex-5 text-center text-lg-start px-3 px-lg-0 py-xl-4 py-xxl-5 mt-lg-3 mx-auto mx-lg-0"
                        style="max-width: 530px"
                    >
                        <h2 class="h3 text-primary">
                            {{ $store.state.General.general.subtitle }}
                        </h2>
                        <h1 class="display-1 pb-lg-3 mb-3">
                            {{ $store.state.General.general.title }}
                        </h1>
                        <div
                            class="d-flex justify-content-center justify-content-lg-start text-start mb-2"
                        >
                            <i class="bx bx-map fs-4 text-primary me-2"></i>
                            <div class="fs-xl">
                                {{ $store.state.General.general.address }}
                            </div>
                        </div>
                        <div
                            class="d-flex flex-column flex-sm-row justify-content-center justify-content-lg-start py-4 py-lg-5"
                        >
                            <!-- <a
                                href="#"
                                class="btn btn-primary shadow-primary btn-lg me-sm-3 me-xl-4 mb-3"
                                >About us</a
                            > -->
                            <router-link
                                class="btn btn-primary shadow-primary btn-lg me-sm-3 me-xl-4 mb-3"
                                :to="{ name: 'about' }"
                                >About me
                            </router-link>
                            <!-- <a
                                href="#"
                                class="btn btn-outline-primary btn-lg mb-3"
                            >
                                <i
                                    class="bx bx-calendar-check fs-xl me-2 ms-n1"
                                ></i>
                                Add to calendar
                            </a> -->

                            <a
                                target="_blank"
                                class="btn btn-outline-primary btn-lg mb-3"
                                href="https://github.com/hilsonxhero"
                            >
                                <i class="bx bxl-github fs-xl me-2 ms-n1"></i>
                                Github
                            </a>
                        </div>
                        <div
                            class="d-flex align-items-center justify-content-center justify-content-lg-start text-start pb-2 pt-lg-2 pb-xl-0 pt-xl-5 mt-xxl-5"
                        >
                            <span class="fs-sm"
                                ><span class="text-primary fw-semibold"
                                    >200+</span
                                >
                                attendees are already with me</span
                            >
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="position-absolute d-none d-lg-block bottom-0 start-0 w-100 zindex-5 pb-xxl-5"
            >
                <div class="container pb-4 mb-3 mb-xxl-0">
                    <a
                        href="#speakers"
                        class="d-table text-light opacity-80 text-decoration-none w-auto py-4"
                        data-scroll=""
                        data-scroll-offset="70"
                    >
                        <span class="d-flex align-items-center">
                            Scroll for more
                            <i class="bx bx-down-arrow-circle fs-3 ms-2"></i>
                        </span>
                    </a>
                </div>
            </div>
        </section>

        <!-- Features (Icon + Text) -->

        <section
            class="container mb-5 pt-md-4 m mt-5"
            v-if="portfolios.length > 0"
        >
            <div
                class="d-flex flex-md-row flex-column align-items-center justify-content-between mb-4 pb-1 pb-md-3"
            >
                <h2 class="h1 mb-sm-0">Latest Portfolios</h2>

                <router-link
                    class="btn btn-lg btn-outline-primary d-none d-md-flex mt-3 mt-md-0"
                    :to="{ name: 'portfolios index' }"
                >
                    All portfolios
                    <i class="bx bx-right-arrow-alt ms-1 me-n1 lh-1 lead"></i>
                </router-link>
            </div>

            <div class="row justify-content-center justify-content-md-start">
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
                                loading="lazy"
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
                <div class="col-12 flex justify-content-center">
                    <router-link
                        class="btn btn-lg btn-outline-primary d-flex d-md-none mt-3 mt-md-0"
                        :to="{ name: 'portfolios index' }"
                    >
                        All portfolios
                        <i
                            class="bx bx-right-arrow-alt ms-1 me-n1 lh-1 lead"
                        ></i>
                    </router-link>
                </div>
            </div>
        </section>

        <!-- News slider -->
        <section
            class="bg-secondary border-bottom border-light pt-4 pb-2 mt-5"
            v-if="articles.length > 0"
        >
            <div class="container">
                <h2 class="h1 text-center pb-2">News &amp; Insights</h2>
                <div class="position-relative mx-md-2 px-md-5">
                    <button
                        type="button"
                        id="news-prev"
                        class="btn btn-prev btn-icon btn-sm position-absolute top-50 start-0 translate-middle-y d-none d-md-inline-flex"
                    >
                        <i class="bx bx-chevron-left"></i>
                    </button>
                    <button
                        type="button"
                        id="news-next"
                        class="btn btn-next btn-icon btn-sm position-absolute top-50 end-0 translate-middle-y d-none d-md-inline-flex"
                    >
                        <i class="bx bx-chevron-right"></i>
                    </button>

                    <carousel
                        :options="{
                            autoplay: {
                                delay: 500,
                            },
                            slidesPerView: 3,
                            navigation: {
                                nextEl: `#news-next`,
                                prevEl: `#news-prev`,
                            },
                            pagination: {
                                el: `#news-pagination`,
                            },
                            breakpoints: {
                                1200: {
                                    slidesPerView: 3,
                                },
                                768: {
                                    slidesPerView: 2.5,
                                },
                                568: {
                                    slidesPerView: 2,
                                },
                                360: {
                                    slidesPerView: 1.4,
                                },
                            },
                        }"
                    >
                        <div
                            class="swiper-slide h-auto py-3"
                            v-for="(article, index) in articles"
                            :key="index"
                        >
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
                    </carousel>

                    <div
                        id="news-pagination"
                        class="swiper-pagination position-relative mt-5"
                    ></div>
                </div>
            </div>
        </section>

        <!-- Back to top button -->
        <a href="#top" class="btn-scroll-top" data-scroll>
            <span class="btn-scroll-top-tooltip text-muted fs-sm me-2"
                >Top</span
            >
            <i class="btn-scroll-top-icon bx bx-chevron-up"></i>
        </a>
    </div>
</template>

<script setup>
import { onMounted, reactive, ref, computed } from "vue";

import { useHead } from "@vueuse/head";

import "swiper/css";
import Carousel from "@/components/carousel";

const portfolios = ref([]);
const articles = ref([]);

useHead({
    title: computed(() => "home page"),
    // meta: [
    //     {
    //         name: `description`,
    //         content: computed(() => portfolio.value.description),
    //         key: "description",
    //     },
    // ],
});

// const truncate = computed((value, length) => {
//     console.log(value);
//     if (value.length > length) {
//         return value.substring(0, length) + "...";
//     } else {
//         return value;
//     }
// });

const www = computed((value) => "test");

onMounted(() => {
    axios
        .get("/api/application/portfolios")
        .then(({ data }) => {
            portfolios.value = data.data;
        })
        .catch((error) => {});

    axios
        .get("/api/application/articles")
        .then(({ data }) => {
            articles.value = data.data;
        })
        .catch((error) => {});
});
</script>

<style>
.portfolio-cover-ui {
    object-fit: cover;
    /*object-position: left;*/
    height: 100%;
    width: 100%;
}

.portfolio-cover-image img {
    height: 100%;
    width: 100%;
    object-fit: cover;
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
        height: 200px;
    }
}
</style>
