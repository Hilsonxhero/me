<template>
    <div class="col-md-8 offset-lg-1 pb-5 mb-2 mb-lg-4 pt-md-5 mt-n3 mt-md-0">
        <div class="ps-md-3 ps-lg-0 mt-md-2 py-md-4">
            <h1 class="h2 pt-xl-1 pb-3">Edit category</h1>

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
                            >parent</label
                        >
                        <select
                            v-model="form.parent_id"
                            id="country"
                            class="form-select form-select-lg"
                            required=""
                        >
                            <option value="">Choose parent</option>

                            <option
                                v-for="(category, index) in categories"
                                :key="index"
                                :value="category.id"

                            >
                                {{ category.title }}
                            </option>
                        </select>
                    </div>
                </div>
                <div class="d-flex mb-3">

                    <router-link
                        class="btn btn-secondary me-3"
                        :to="{ name: 'panel admin categories' }"
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
import { useRoute,useRouter } from "vue-router";

const route = useRoute();
const router = useRouter();

const form = ref({});

let categories = ref([]);

let id = ref();

const editHandler = () => {
    const data = {
        title: form.value.title,
        parent: form.value.parent_id,
    };
    console.log("data",data);
    axios
        .patch(`/api/admin/categories/${id.value}`, data)
        .then(({ data }) => {
             router.push({ name: "panel admin categories" });
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
        .get(`/api/admin/categories/${id.value}`)
        .then(({ data }) => {
            form.value = data.data;
        })
        .catch((error) => {});
});
</script>
<style></style>
