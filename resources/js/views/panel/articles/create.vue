<template>
    <div class="col-md-8 offset-lg-1 pb-5 mb-2 mb-lg-4 pt-md-5 mt-n3 mt-md-0">
        <div class="ps-md-3 ps-lg-0 mt-md-2 py-md-4">
            <h1 class="h2 pt-xl-1 pb-3">create article</h1>

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
                            v-model="form.title"
                            type="text"
                            id="fn"
                            class="form-control form-control-lg"
                            required=""
                        />
                    </div>
                    <div class="col-sm-6 mb-4">
                        <label for="sn" class="form-label fs-base"
                            >category</label
                        >
                        <select
                            v-model="form.category"
                            id="country"
                            class="form-select form-select-lg"
                            required=""
                        >
                            <option value="">Choose category</option>

                            <option
                                v-for="(category, index) in categories"
                                :key="index"
                                :value="category.id"
                            >
                                {{ category.title }}
                            </option>
                        </select>
                    </div>

                    <div class="col-12 mb-4">
                        <label class="form-label fs-base">content </label>

                        <TiptapEditor
                            v-model="content"
                            :content="content"
                            ref="tiptap"
                        ></TiptapEditor>
                    </div>

                    <div class="col-12 mb-4">
                        <label class="form-label fs-base">description </label>
                        <textarea
                            v-model="form.description"
                            class="form-control form-control-lg"
                            rows="4"
                            placeholder="description"
                        ></textarea>
                    </div>

                    <div class="col-12 mb-4">
                        <label class="form-label fs-base">tags </label>

                        <multiselect
                            :multiple="true"
                            label="title"
                            track-by="id"
                            v-model="selectedTags"
                            :options="tags"
                        >
                        </multiselect>
                    </div>

                    <div class="col-12 my-5">
                        <div
                            class="form-check form-switch form-switch-success d-flex mb-4"
                        >
                            <input
                                v-model="form.is_published"
                                type="checkbox"
                                id="activity"
                                class="form-check-input flex-shrink-0"
                            />
                            <label for="activity" class="form-check-label ps-3">
                                <span class="h6 d-block mb-2"
                                    >published article</span
                                >
                                <span class="fs-sm text-muted"
                                    >Is displayed on the home page</span
                                >
                            </label>
                        </div>
                    </div>

                    <div class="col-12 mb-4">
                        <label
                            class="custom-file-upload btn btn-outline-success btn-block"
                        >
                            <input
                                class="d-none"
                                type="file"
                                @change="selectedFile"
                            />
                            <template v-if="filename">
                                {{ filename }}
                            </template>

                            <template v-else>select file</template>
                        </label>
                        <template v-if="src">
                            <div class="banner__src d-block my-4">
                                <img :src="src" alt="" />
                            </div>
                        </template>
                    </div>
                </div>
                <div class="d-flex mb-3">
                    <router-link
                        class="btn btn-secondary me-3"
                        :to="{ name: 'panel admin articles' }"
                    >
                        Cancel</router-link
                    >
                    <button
                        type="button"
                        class="btn btn-primary"
                        @click="createHandler"
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

const selectedTags = ref([]);

const route = useRoute();
const router = useRouter();
const file = ref();
const src = ref();
const filename = ref();
const content = ref("");

const form = ref({
    title: "",
    web: "",
    services: "",
    description: "",
    category: null,
    is_published: true,
});

let categories = ref([]);
let tags = ref([]);

const selectedFile = (event) => {
    // const file = event.target.files[0];
    filename.value = event.target.files[0].name;
    src.value = URL.createObjectURL(event.target.files[0]);
    file.value = event.target.files[0];
};

const createHandler = () => {
    console.log("content", content.value);
    let data = new FormData();

    data.append("title", form.value.title);
    data.append("description", form.value.description);
    data.append("content", content.value);
    data.append("category_id", form.value.category);
    data.append("tags", JSON.stringify(selectedTags.value));
    data.append("is_published", form.value.is_published ? 1 : 0);
    data.append("file", file.value);
    axios
        .post("/api/admin/articles", data)
        .then(({ data }) => {
            router.push({ name: "panel admin articles" });

            ElNotification.success({
                title: "Success",
                message: "Article created successfully",
            });
        })
        .catch((error) => {});
};

onMounted(() => {
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
});
</script>

<!-- <style src="vue3-multiselect/dist/vue3-multiselect.css"></style> -->

<style>
.w-50 {
    width: 50%;
}
.el-notification__title {
    color: #333 !important;
}

.tag-input__tag {
    /* height: 30px; */
    float: left;
    margin-right: 10px;
    background-color: #eee;
    color: #333;
    /* margin-top: 10px;
    line-height: 30px; */
    padding: 0 5px;
    border-radius: 5px;
}
.tag-input__tag span {
    cursor: pointer;
    opacity: 0.75;
}
.tag-input__text {
    color: #fff;
    border: none;
    outline: none;
    font-size: 0.9rem;
    /* line-height: 50px; */
    background: none;
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
