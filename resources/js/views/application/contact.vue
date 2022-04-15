<template>
    <!-- Page content -->
    <section class="container">
        <!-- Breadcrumb -->
        <nav class="pt-4 mt-lg-3" aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <router-link :to="{ name: 'home' }">
                        <i class="bx bx-home-alt fs-lg me-1"></i>Home
                    </router-link>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Contacts
                </li>
            </ol>
        </nav>

        <!-- Page title -->
        <h1 class="pt-4 mt-lg-3 pb-3 pb-lg-4">Contact Us</h1>

        <div class="row pb-5 mb-md-2 mb-lg-4 mb-xl-5 gy-4">
            <!-- Contact details -->
            <div class="col-xl-4 col-md-12 mb-4 mb-md-0">
                <div class="card card-hover mb-3">
                    <div class="card-body d-flex align-items-start">
                        <i
                            class="bx bx-envelope fs-3 bg-secondary text-primary d-inline-block rounded-circle p-3"
                        ></i>
                        <div class="ps-4">
                            <h3 class="h4 pb-1 mb-2">Email us</h3>
                            <p class="pb-1 mb-2">
                                Please feel free to drop us a line. We will
                                respond as soon as possible.
                            </p>
                            <a
                                :href="`mailto:${general.email}`"
                                class="btn btn-link stretched-link fs-base px-0"
                            >
                                Leave a message
                                <i class="bx bx-right-arrow-alt fs-4 ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card card-hover mb-3">
                    <div class="card-body d-flex align-items-start">
                        <i
                            class="bx bx-phone-call fs-3 bg-secondary text-primary d-inline-block rounded-circle p-3"
                        ></i>
                        <div class="ps-4">
                            <h3 class="h4 pb-1 mb-2">Call any time</h3>
                            <p class="pb-1 mb-2">
                                If you need immediate assistance feel free to
                                call us any time.
                            </p>
                            <a
                                :href="'tel:' + general.phone"
                                class="btn btn-link stretched-link fs-base px-0"
                                >{{ general.phone }}</a
                            >
                        </div>
                    </div>
                </div>
                <div class="card card-hover">
                    <div class="card-body d-flex align-items-start">
                        <i
                            class="bx bx-map fs-3 bg-secondary text-primary d-inline-block rounded-circle p-3"
                        ></i>
                        <div class="ps-4">
                            <h3 class="h4 pb-1 mb-2">Visit us</h3>
                            <p class="pb-1 mb-2">
                                {{ general.address }}
                            </p>
                            <a
                                href="#"
                                class="btn btn-link stretched-link fs-base px-0"
                            >
                                Get directions
                                <i class="bx bx-right-arrow-alt fs-4 ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Map -->
            <div class="col-xl-8 order-first order-md-last">
                <!-- Contact form -->
                <div class="bg-secondary rounded-3 py-4 px-4 px-sm-0 mb-xl-4">
                    <Form
                        @submit="sendMessageHandler"
                        :validation-schema="validationSchema"
                        class="needs-validation row justify-content-center py-lg-3 py-xl-4"
                    >
                        <div class="col-xl-8 col-lg-9 col-md-10 col-sm-11">
                            <h2 class="h1 pb-lg-1 mb-4">Leave Us a Message</h2>
                            <p class="fs-lg text-muted pb-lg-1 mb-4">
                                Have a project in mind? To request a quote
                                contact us directly or fill out the form and let
                                us know how we can help.
                            </p>
                            <div class="row">
                                <div class="col-sm-6 mb-4">
                                    <label for="name" class="form-label fs-base"
                                        >Full name</label
                                    >
                                    <Field
                                        type="text"
                                        id="name"
                                        name="name"
                                        class="form-control form-control-lg"
                                        required
                                        v-model="form.name"
                                    />

                                    <div class="invalid-feedback d-block">
                                        <ErrorMessage name="name" />
                                    </div>
                                </div>
                                <div class="col-sm-6 mb-4">
                                    <label
                                        for="email"
                                        class="form-label fs-base"
                                        >Email address</label
                                    >
                                    <Field
                                        type="email"
                                        id="email"
                                        name="email"
                                        class="form-control form-control-lg"
                                        required
                                        v-model="form.email"
                                    />

                                    <div class="invalid-feedback d-block">
                                        <ErrorMessage name="email" />
                                    </div>
                                </div>
                                <div class="col-12 mb-4">
                                    <label
                                        for="content"
                                        class="form-label fs-base"
                                        >Message</label
                                    >

                                    <Field name="content" v-slot="{ field }">
                                        <textarea
                                            v-bind="field"
                                            id="content"
                                            name="content"
                                            class="form-control form-control-lg"
                                            rows="4"
                                            required
                                            v-model="form.content"
                                        ></textarea>
                                    </Field>
                                    <div class="invalid-feedback d-block">
                                        <ErrorMessage name="content" />
                                    </div>
                                </div>
                            </div>

                            <button
                                type="submit"
                                class="btn btn-primary btn-lg shadow-primary"
                            >
                                Send message
                            </button>
                        </div>
                    </Form>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { ref, computed } from "vue";
import { ElNotification } from "element-plus";
import { ErrorMessage, Field, Form } from "vee-validate";
import * as Yup from "yup";
import { mapActions, mapState, mapGetters } from "vuex";
import { useStore } from "vuex";
import { useHead } from "@vueuse/head";

useHead({
    title: computed(() => "contact page"),
    // meta: [
    //     {
    //         name: `description`,
    //         content: computed(() => portfolio.value.description),
    //         key: "description",
    //     },
    // ],
});
const form = ref({
    name: "",
    email: "",
    content: "",
});

const store = useStore();

const validationSchema = Yup.object().shape({
    name: Yup.string().required().label("name"),
    email: Yup.string().email().required().label("email"),
    content: Yup.string().required().label("content"),
});

const sendMessageHandler = (values, { resetForm }) => {
    const data = new FormData();

    data.append("name", form.value.name);
    data.append("email", form.value.email);
    data.append("content", form.value.content);

    axios
        .post("/api/application/message/user", data)
        .then(({ data }) => {
            form.value.name = "";
            form.value.email = "";
            form.value.content = "";
            resetForm();
            ElNotification.success({
                title: "Success",
                message: "Your message has been sent",
            });
        })
        .catch((error) => {});
};

const general = computed(() => store.state.General.general);
</script>
<style></style>
