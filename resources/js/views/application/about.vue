<template>
    <div ref="cvRef">
        <section class="position-relative overflow-hidden mb-3 pt-5">
            <div class="container">
                <div class="row row-cols-1 row-cols-md-2 gx-3 gx-lg-4">
                    <div class="col-md-6 mb-3 mb-md-0 d-none">
                        <div class="card bg-dark h-100 p-xl-4">
                            <div class="card-body">
                                <h2 class="display-1 text-light">420k</h2>
                                <p class="lead fw-medium text-light">
                                    <span class="opacity-70"
                                        >users are taking advantage of our</span
                                    >
                                    <span class="fw-bold"
                                        >Task Manager Tool</span
                                    ><span class="opacity-70"
                                        >. It’s a new transparent and efficient
                                        way to organize all of your daily
                                        tasks.</span
                                    >
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card border-0 shadow-sm p-4 p-xxl-5">
                            <div
                                class="d-flex justify-content-between pb-4 mb-2"
                            >
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

        <section class="container py-5">
            <div class="row mt-xl-2 mb-xl-3 pb-3 py-md-4 py-lg-5">
                <div class="col-12">
                    <h2
                        class="h1 text-center text-sm-start pb-2 pb-lg-0 mb-4 mb-lg-5"
                    >
                        Work experience
                    </h2>
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
                            <div class="border-bottom py-4">
                                <div class="row py-1 py-xl-3">
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <div class="h5 mb-1">
                                            10:30 – 11:30 am
                                        </div>
                                        <p class="text-muted mb-2 mb-sm-4">
                                            October 14th
                                        </p>
                                        <span
                                            class="badge bg-warning shadow-warning fs-sm"
                                            >Lecture</span
                                        >
                                    </div>
                                    <div class="col-sm-8">
                                        <h5>
                                            Product strategy: Defining your
                                            strategy, tactics, metrics &amp;
                                            roadmap
                                        </h5>
                                        <p class="mb-4">
                                            Pellentesque rhoncus viverra
                                            vestibulum, purus purus quisque
                                            quisque sed. Cras vestibulum
                                            facilisis dictumst consequat. In
                                            bibendum diam nunc dignissim magna
                                            morbi mattis.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Day 2 schedule -->
                        <div
                            class="tab-pane fade"
                            id="day-2"
                            role="tabpanel"
                            aria-labelledby="day-2-tab"
                        >
                            <div class="border-bottom pb-4">
                                <div class="row pb-1 pb-xl-3">
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <div class="h5 mb-1">
                                            9:30 – 10:30 am
                                        </div>
                                        <p class="text-muted mb-0">
                                            October 15th
                                        </p>
                                    </div>
                                    <div class="col-sm-8">
                                        <h5 class="mb-0">Day 2 registration</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="border-bottom py-4">
                                <div class="row py-1 py-xl-3">
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <div class="h5 mb-1">
                                            10:30 – 11:30 am
                                        </div>
                                        <p class="text-muted mb-2 mb-sm-4">
                                            October 15th
                                        </p>
                                        <span
                                            class="badge bg-success shadow-success fs-sm"
                                            >Workshop</span
                                        >
                                    </div>
                                    <div class="col-sm-8">
                                        <h5>
                                            Workshop: Top trends and predictions
                                            for content that will dominate next
                                            year
                                        </h5>
                                        <p class="mb-4">
                                            Nec, malesuada quisque lorem id amet
                                            posuere. Risus, elit, vel pharetra
                                            ac, dictum lorem nisl morbi. Lorem
                                            dui id aliquam eu feugiat arcu diam.
                                        </p>
                                        <div
                                            class="row row-cols-1 row-cols-md-2 g-3"
                                        >
                                            <div class="col">
                                                <div
                                                    class="d-flex align-items-center"
                                                >
                                                    <img
                                                        src="assets/img/avatar/01.jpg"
                                                        class="rounded-circle"
                                                        alt="Jerome Bell"
                                                        width="48"
                                                    />
                                                    <div class="ps-3">
                                                        <h6
                                                            class="fw-semibold mb-1"
                                                        >
                                                            Jerome Bell
                                                        </h6>
                                                        <p
                                                            class="fs-sm text-muted mb-0"
                                                        >
                                                            Strategic Advisor,
                                                            Shopify
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div
                                                    class="d-flex align-items-center"
                                                >
                                                    <img
                                                        src="assets/img/avatar/06.jpg"
                                                        class="rounded-circle"
                                                        alt="Jenny Wilson"
                                                        width="48"
                                                    />
                                                    <div class="ps-3">
                                                        <h6
                                                            class="fw-semibold mb-1"
                                                        >
                                                            Jenny Wilson
                                                        </h6>
                                                        <p
                                                            class="fs-sm text-muted mb-0"
                                                        >
                                                            UX Designer,
                                                            Glassdoor
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="border-bottom py-4">
                                <div class="row py-1 py-xl-3">
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <div class="h5 mb-1">
                                            11:30 am – 13:00 pm
                                        </div>
                                        <p class="text-muted mb-2 mb-sm-4">
                                            October 15th
                                        </p>
                                        <span
                                            class="badge bg-warning shadow-warning fs-sm"
                                            >Lecture</span
                                        >
                                    </div>
                                    <div class="col-sm-8">
                                        <h5>
                                            Product strategy: Defining your
                                            strategy, tactics, metrics &amp;
                                            roadmap
                                        </h5>
                                        <p class="mb-4">
                                            Pellentesque rhoncus viverra
                                            vestibulum, purus purus quisque
                                            quisque sed. Cras vestibulum
                                            facilisis dictumst consequat. In
                                            bibendum diam nunc dignissim magna
                                            morbi mattis.
                                        </p>
                                        <div class="d-flex align-items-center">
                                            <img
                                                src="assets/img/avatar/41.jpg"
                                                class="rounded-circle"
                                                alt="Marvin McKinney"
                                                width="48"
                                            />
                                            <div class="ps-3">
                                                <h6 class="fw-semibold mb-1">
                                                    Marvin McKinney
                                                </h6>
                                                <p
                                                    class="fs-sm text-muted mb-0"
                                                >
                                                    Product Manager, Google
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="border-bottom py-4">
                                <div class="row py-1 py-xl-3">
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <div class="h5 mb-1">
                                            13:00 – 14:00 pm
                                        </div>
                                        <p class="text-muted mb-0">
                                            October 15th
                                        </p>
                                    </div>
                                    <div class="col-sm-8">
                                        <h5 class="mb-0">
                                            Interlude: attendee dinner
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="border-bottom py-4">
                                <div class="row py-1 py-xl-3">
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <div class="h5 mb-1">
                                            14:00 – 16:00 pm
                                        </div>
                                        <p class="text-muted mb-2 mb-sm-4">
                                            October 15th
                                        </p>
                                        <span
                                            class="badge bg-info shadow-info fs-sm"
                                            >Panel</span
                                        >
                                    </div>
                                    <div class="col-sm-8">
                                        <h5>Panel: State of speed tooling</h5>
                                        <p class="mb-4">
                                            Volutpat aliquam quam eget sit.
                                            Aliquam dui pellentesque egestas
                                            duis amet malesuada eget. Ut
                                            faucibus dignissim maecenas dui
                                            tristique vestibulum facilisis
                                            dictumst consequat.
                                        </p>
                                        <div class="d-flex align-items-center">
                                            <img
                                                src="assets/img/avatar/07.jpg"
                                                class="rounded-circle"
                                                alt="Cameron Williamson"
                                                width="48"
                                            />
                                            <div class="ps-3">
                                                <h6 class="fw-semibold mb-1">
                                                    Cameron Williamson
                                                </h6>
                                                <p
                                                    class="fs-sm text-muted mb-0"
                                                >
                                                    Co-Founder, Invision LTD
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="border-bottom py-4">
                                <div class="row py-1 py-xl-3">
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <div class="h5 mb-1">
                                            16:00 – 17:00 pm
                                        </div>
                                        <p class="text-muted mb-2 mb-sm-4">
                                            October 15th
                                        </p>
                                        <span
                                            class="badge bg-warning shadow-warning fs-sm"
                                            >Lecture</span
                                        >
                                    </div>
                                    <div class="col-sm-8">
                                        <h5>
                                            Group discussion: How to align and
                                            empower cross-team success
                                        </h5>
                                        <p class="mb-4">
                                            Pellentesque rhoncus viverra
                                            vestibulum, purus purus quisque
                                            quisque sed. Cras vestibulum
                                            facilisis.
                                        </p>
                                        <div
                                            class="row row-cols-1 row-cols-md-2 g-3"
                                        >
                                            <div class="col">
                                                <div
                                                    class="d-flex align-items-center"
                                                >
                                                    <img
                                                        src="assets/img/avatar/05.jpg"
                                                        class="rounded-circle"
                                                        alt="Albert Flores"
                                                        width="48"
                                                    />
                                                    <div class="ps-3">
                                                        <h6
                                                            class="fw-semibold mb-1"
                                                        >
                                                            Albert Flores
                                                        </h6>
                                                        <p
                                                            class="fs-sm text-muted mb-0"
                                                        >
                                                            Principal
                                                            Consultant, Twitch
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div
                                                    class="d-flex align-items-center"
                                                >
                                                    <img
                                                        src="assets/img/avatar/03.jpg"
                                                        class="rounded-circle"
                                                        alt="Esther Howard"
                                                        width="48"
                                                    />
                                                    <div class="ps-3">
                                                        <h6
                                                            class="fw-semibold mb-1"
                                                        >
                                                            Esther Howard
                                                        </h6>
                                                        <p
                                                            class="fs-sm text-muted mb-0"
                                                        >
                                                            VP of Strategy,
                                                            Stretto Inc.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pt-4">
                                <div class="row pt-1 pt-xl-3">
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <div class="h5 mb-1">
                                            17:00 – 19:00 pm
                                        </div>
                                        <p class="text-muted mb-0">
                                            October 15th
                                        </p>
                                    </div>
                                    <div class="col-sm-8">
                                        <h5 class="mb-0">
                                            Closing farewell party
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="container py-5 my-md-2 my-lg-4 my-xl-5">
            <div
                class="row justify-content-center pt-1 pb-1 mb-2 mb-md-3 mb-lg-4"
            >
                <div class="col-lg-8 col-md-9 text-center">
                    <h2 class="h1 mb-4">Integrate Top Work Tools</h2>
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
                        <div class="card-body tools_img">
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
import { ref, computed } from "vue";
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
]);

const cvRef = ref(null);

const convertToPDF = () => {
    const element = cvRef.value.cloneNode(true);
    element.classList.add("invoice-container");
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
