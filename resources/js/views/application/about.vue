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
</template>
<script>
export default {};
</script>
<style></style>
