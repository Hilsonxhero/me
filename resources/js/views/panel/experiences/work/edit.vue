<template>
    <div class="col-md-8 offset-lg-1 pb-5 mb-2 mb-lg-4 pt-md-5 mt-n3 mt-md-0">
        <div class="ps-md-3 ps-lg-0 mt-md-2 py-md-4">
            <h1 class="h2 pt-xl-1 pb-3">update work experiences</h1>

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
                        <label for="fn" class="form-label fs-base">date</label>
                        <input
                            v-model="form.date"
                            type="text"
                            id="fn"
                            class="form-control form-control-lg"
                            required=""
                        />
                    </div>

                    <div class="col-sm-6 mb-4">
                        <label class="form-label fs-base">label</label>
                        <input
                            v-model="form.label"
                            type="text"
                            class="form-control form-control-lg"
                            required=""
                        />
                    </div>

                    <div class="col-sm-6 mb-4">
                        <label class="form-label fs-base">location</label>
                        <input
                            v-model="form.location"
                            type="text"
                            class="form-control form-control-lg"
                            required=""
                        />
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
                </div>
                <div class="d-flex mb-3">
                    <router-link
                        class="btn btn-secondary me-3"
                        :to="{ name: 'panel admin experiences work index' }"
                    >
                        Cancel</router-link
                    >
                    <button
                        type="button"
                        class="btn btn-primary"
                        @click="updateHandler"
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

import { ElNotification } from "element-plus";

const route = useRoute();
const router = useRouter();
let id = ref();
const form = ref({
    title: "",
    label: "",
    date: "",
    location: "",
    description: "",
});

const updateHandler = () => {
    const data = {
        id: id.value,
        title: form.value.title,
        label: form.value.label,
        date: form.value.date,
        location: form.value.location,
        description: form.value.description,
    };

    axios
        .put(`/api/admin/experiences/work/${id.value}`, data)
        .then(({ data }) => {
            router.push({ name: "panel admin experiences work index" });
            ElNotification.success({
                title: "Success",
                message: "work experience updated successfully",
            });
        })
        .catch((error) => {});
};

onMounted(() => {
    id.value = route.params.id;

    axios
        .get(`/api/admin/experiences/work/${id.value}`)
        .then(({ data }) => {
            console.log("data.data", data.data);
            form.value = data.data;
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
