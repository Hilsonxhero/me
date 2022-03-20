<template>
    <section class="mt-5">
        <div class="container">
         <div class="row">
                <div
                    class="col-md-6"
                    v-for="(portfolio, index) in 6"
                    :key="index"
                >
                    <!-- Article -->
                    <article
                        class="card border-0 shadow-sm overflow-hidden mb-4"
                    >
                        <div class="row g-0">
                            <div
                                class="col-sm-5 position-relative bg-position-center bg-repeat-0 bg-size-cover"
                                style="
                                    background-image: url(https://silicon.createx.studio/assets/img/landing/digital-agency/blog/02.jpg);
                                    min-height: 15rem;
                                "
                            >
                                <router-link
                                    class="position-absolute top-0 start-0 w-100 h-100"
                                    :to="{
                                        name: 'portfolios show',
                                        params: { id: 2, slug: 'test' },
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
                                            >Design</a
                                        >
                                        <span
                                            class="fs-sm text-muted border-start ps-3 ms-3"
                                            >1 day ago</span
                                        >
                                    </div>
                                    <h3 class="h5">
                                        <router-link
                                            :to="{
                                                name: 'portfolios show',
                                                params: { id: 2, slug: 'test' },
                                            }"
                                        >
                                            Brand analysis: second step to the
                                            brand identity
                                        </router-link>
                                    </h3>
                                    <hr class="my-4" />
                                    <div
                                        class="d-flex flex-wrap align-items-center justify-content-between"
                                    >
                                        <span
                                            class="badge badge bg-light mb-2"
                                            v-for="(tag, index) in 6"
                                            :key="index"
                                            >test</span
                                        >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>

            </div>
        </div>
    </section>
</template>
<script>
export default {};
</script>
<style></style>
