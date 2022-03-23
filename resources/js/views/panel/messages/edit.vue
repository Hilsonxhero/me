<template>
    <div class="col-md-8 offset-lg-1 pb-5 mb-2 mb-lg-4 pt-md-5 mt-n3 mt-md-0">
        <div class="ps-md-3 ps-lg-0 mt-md-2 py-md-4">
            <h1 class="h2 pt-xl-1 pb-3">messages</h1>

            <!-- Basic info -->
            <h2 class="h5 text-primary mb-4">Basic info</h2>
            <form
                class="needs-validation border-bottom pb-3 pb-lg-4"
                novalidate=""
            >
                <div class="row pb-2">
                    <div class="col-sm-6 mb-4">
                        <label for="fn" class="form-label fs-base">title</label>
                        <input
                            v-model="form.name"
                            type="text"
                            id="fn"
                            class="form-control form-control-lg"
                            required=""
                        />
                    </div>

                    <div class="col-sm-6 mb-4">
                        <label for="fn" class="form-label fs-base">email</label>
                        <input
                            v-model="form.email"
                            type="text"
                            id="fn"
                            class="form-control form-control-lg"
                            required=""
                        />
                    </div>

                    <div class="col-12 mb-4">
                        <label class="form-label fs-base">answer </label>
                        <!-- <textarea
                            v-model="form.answer"
                            class="form-control form-control-lg"
                            rows="4"
                            placeholder="answer"
                        ></textarea> -->

                        <TiptapEditor
                            v-model="content"
                            :content="content"
                            ref="tiptap"
                        ></TiptapEditor>
                    </div>
                </div>
                <div class="d-flex mb-3">
                    <router-link
                        class="btn btn-secondary me-3"
                        :to="{ name: 'panel admin messages' }"
                    >
                        Cancel</router-link
                    >
                    <button
                        type="button"
                        class="btn btn-primary"
                        @click="editHandler"
                    >
                        Save changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>
<script setup>
import { reactive, onMounted, ref } from "vue";
import { useRoute, useRouter } from "vue-router";

import Multiselect from "@suadelabs/vue3-multiselect";
import TiptapEditor from "@/components/tiptap-editor";
import { ElNotification } from "element-plus";

const route = useRoute();
const router = useRouter();
const content = ref("");
const tiptap = ref(null);
const form = ref({
    title: "",
    answer: "",
    category: null,
    status: true,
});

let categories = ref([]);
let tags = ref([]);

let id = ref();

const editHandler = () => {
    let data = new FormData();

    data.append("id", id.value);
    data.append("answer", content.value);
    data.append("status", form.value.status ? 1 : 0);

    axios
        .post("/api/admin/messages/update", data)
        .then(({ data }) => {
            router.push({ name: "panel admin messages" });

            ElNotification.success({
                title: "Success",
                message: "Message updated successfully",
            });
        })
        .catch((error) => {});
};

onMounted(() => {
    id.value = route.params.id;
    axios
        .get("/api/admin/categories")
        .then(({ data }) => {
            categories.value = data.data;
        })
        .catch((error) => {});

    axios
        .get("/api/admin/tags")
        .then(({ data }) => {
            tags.value = data.data;
        })
        .catch((error) => {});

    axios
        .get(`/api/admin/messages/${id.value}`)
        .then(({ data }) => {
            form.value = data.data;

            form.value.status == 1
                ? (form.value.status = true)
                : (form.value.status = false);

            content.value = form.value.answer;

            tiptap.value.editor.commands.setContent(form.value.answer);
        })
        .catch((error) => {});
});
</script>

<style>
.w-50 {
    width: 50%;
}
.el-notification__title {
    color: #333 !important;
}
.banner__src {
    width: 200px;
    max-width: 200px;
}
.banner__src img {
    border-radius: 0.7rem;
    object-fit: cover;
}

/* .multiselect__tags {
    background: rgba(255, 255, 255, 0.05);
    border: 1px solid rgba(255, 255, 255, 0.2) !important;
} */

/* .multiselect__input,
.multiselect__single {
    background: rgba(255, 255, 255, 0.05) !important;
}

.multiselect__content-wrapper {
    background: rgba(255, 255, 255, 0.05) !important;
    border: 1px solid rgba(255, 255, 255, 0.2) !important;
} */
</style>
