<template>
    <div class="col-md-8 offset-lg-1 pb-5 mb-2 mb-lg-4 pt-md-5 mt-n3 mt-md-0">
        <div class="ps-md-3 ps-lg-0 mt-md-2 py-md-4">
            <h1 class="h2 pt-xl-1 pb-3">Create technology</h1>

            <!-- Basic info -->
            <h2 class="h5 text-primary mb-4">Basic info</h2>
            <form
                class="needs-validation border-bottom pb-3 pb-lg-4"
                novalidate=""
            >
                <div class="row pb-2">
                    <div class="col-sm-12 mb-4">
                        <label for="fn" class="form-label fs-base">title</label>
                        <input
                            v-model="form.title"
                            type="text"
                            id="fn"
                            class="form-control form-control-lg"
                            required=""
                        />
                    </div>
                </div>
                <div class="d-flex mb-3">
                    <router-link
                        class="btn btn-secondary me-3"
                        :to="{ name: 'panel admin technologies' }"
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

const route = useRoute();
const router = useRouter();

const form = reactive({
    title: "",
});


const createHandler = () => {
    const data = {
        title: form.title,
    };
    axios
        .post("/api/admin/technologies", data)
        .then(({ data }) => {
            router.push({ name: "panel admin technologies" });
        })
        .catch((error) => {});
};

onMounted(() => {});
</script>
<style></style>
