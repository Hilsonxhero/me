<template>
    <div ref="cvRef" class="cv-container">
        <section class="position-relative overflow-hidden mb-2 pt-1">
            <div class="container">
                <div class="row row-cols-1 row-cols-md-2 gx-3 gx-lg-4 mt-3">
                    <div class="col-md-12">
                        <div class="cardd border-0 p-0">
                            <div
                                class="d-flex justify-content-between pb-2 mb-2"
                            >
                                <span
                                    class="btn btn-icon btn-primary btn-lg shadow-primary pe-none"
                                >
                                    <i class="bx bxs-quote-left"></i>
                                </span>
                                <span
                                    @click="convertToPDF()"
                                    class="btn btn-icon btn-info btn-lg shadow-primary cursor-pointer download-cv-btn"
                                >
                                    <i class="bx bxs-cloud-download"></i>
                                </span>
                            </div>

                            <div class="swiper-slide h-auto">
                                <figure
                                    class="card h-100 position-relative border-0 bg-transparent"
                                >
                                    <blockquote class="card-body p-0 mb-0">
                                        <p
                                            class="fs-lg mb-0 about-text"
                                            v-html="
                                                $store.state.General.general
                                                    .about
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

        <section class="container">
            <div class="row mt-xl-2 mb-xl-3 pb-3 py-md-2">
                <div class="col-12">
                    <h4
                        class="h4 text-center text-sm-start pb-2 pb-lg-0 mb-1 mb-lg-1"
                    >
                        Work experience
                    </h4>
                </div>

                <div class="col-lg-12">
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <!-- Day 1 schedule -->
                        <div
                            class="tab-pane fade show active"
                            id="day-1"
                            role="tabpanel"
                            aria-labelledby="day-1-tab"
                        >
                            <div
                                class="border-bottom py-2"
                                v-for="(
                                    experiences_work, index
                                ) in experiences_works"
                            >
                                <div class="row py-1 py-xl-3">
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <div class="h5 mb-1">
                                            {{ experiences_work.date }}
                                        </div>
                                        <p class="text-muted mb-2 mb-sm-4">
                                            {{ experiences_work.location }}
                                        </p>
                                        <span
                                            class="badge bg-warning shadow-warning fs-sm"
                                        >
                                            {{ experiences_work.label }}</span
                                        >
                                    </div>
                                    <div class="col-sm-8">
                                        <h5>
                                            {{ experiences_work.title }}
                                        </h5>
                                        <p class="mb-4">
                                            {{ experiences_work.description }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="container">
            <div class="row mt-xl-2 mb-xl-3 pb-3 py-md-2">
                <div class="col-12">
                    <h4
                        class="h4 text-center text-sm-start pb-2 pb-lg-0 mb-1 mb-lg-1"
                    >
                        educational experience
                    </h4>
                </div>

                <div class="col-lg-12">
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <!-- Day 1 schedule -->
                        <div
                            class="tab-pane fade show active"
                            id="day-1"
                            role="tabpanel"
                            aria-labelledby="day-1-tab"
                        >
                            <div
                                class="border-bottom py-2"
                                v-for="(
                                    experiences_educational, index
                                ) in experiences_educationals"
                            >
                                <div class="row py-1 py-xl-3">
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <div class="h5 mb-1">
                                            {{ experiences_educational.date }}
                                        </div>
                                        <p class="text-muted mb-2 mb-sm-4">
                                            {{
                                                experiences_educational.location
                                            }}
                                        </p>
                                        <span
                                            class="badge bg-warning shadow-warning fs-sm"
                                        >
                                            {{
                                                experiences_educational.label
                                            }}</span
                                        >
                                    </div>
                                    <div class="col-sm-8">
                                        <h5>
                                            {{ experiences_educational.title }}
                                        </h5>
                                        <p class="mb-4">
                                            {{
                                                experiences_educational.description
                                            }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="container my-md-2 my-lg-4 my-xl-5">
            <div class="row justify-content-center pt-1 pb-1 mb-2 mb-md-2">
                <div class="col-lg-8 col-md-9 text-center">
                    <h4 class="h4 mb-1">Integrate Top Work Tools</h4>
                    <!-- <p class="fs-lg text-muted mb-0">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    Proin volutpat mollis egestas. Nam luctus facilisis
                    ultrices. Pellentesque volutpat ligula est. Mattis
                    fermentum, at nec lacus.
                </p> -->
                </div>
            </div>

            <div class="row justify-content-center">
                <div
                    class="tools_item"
                    v-for="(tool, index) in tools"
                    :key="index"
                >
                    <a href="#" class="card card-hover border-0 shadow-sm">
                        <div class="px-2 py-2 tools_img">
                            <img
                                :src="tool.img"
                                class="d-block mx-auto"
                                alt=""
                            />
                        </div>
                    </a>
                </div>
            </div>

            <!-- <div class="text-center my-3 mt-4">
            <a href="#" class="btn btn-primary">View all integrations</a>
        </div> -->
        </section>
    </div>
</template>
<script setup>
import { ref, computed, onMounted } from "vue";
import { useHead } from "@vueuse/head";
import html2pdf from "html2pdf.js";

useHead({
    title: computed(() => "about page"),
    // meta: [
    //     {
    //         name: `description`,
    //         content: computed(() => portfolio.value.description),
    //         key: "description",
    //     },
    // ],
});

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
    { img: "/assets/img/langs/docker-base.svg" },
    { img: "/assets/img/langs/elastic-search.svg" },
]);

const cvRef = ref(null);

const convertToPDF = () => {
    const element = cvRef.value.cloneNode(true);
    element.classList.add("cv-container-pdf");
    var opt = {
        margin: 0,
        filename: `cv.pdf`,
        image: { type: "jpeg", quality: 0.98 },
        html2canvas: { scale: 1 },
        jsPDF: { unit: "in", format: "a4", orientation: "p" },
    };
    html2pdf()
        .set(opt)
        .from(element)
        .then(() => {})
        .save();
};

const experiences_educationals = ref();

const experiences_works = ref();

onMounted(() => {
    axios
        .get("/api/application/experiences/educational")
        .then(({ data }) => {
            experiences_educationals.value = data.data;
        })
        .catch((error) => {});
    axios
        .get("/api/application/experiences/work")
        .then(({ data }) => {
            experiences_works.value = data.data;
        })
        .catch((error) => {});
});
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

.about-text {
    text-align: justify;
    line-height: 2;
}
.dark-mode .about-text {
    color: #fff !important;
}
</style>
