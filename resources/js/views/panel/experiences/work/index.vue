<template>
    <div class="col-md-8 offset-lg-1 pb-5 mb-2 mb-lg-4 pt-md-5 mt-n3 mt-md-0">
        <div class="ps-md-3 ps-lg-0 mt-md-2 pt-md-4 pb-md-2">
            <div
                class="d-flex align-items-center justify-content-between pt-xl-1 mb-3 pb-2 pb-lg-3"
            >
                <h1 class="h2 m-0">work experiences</h1>

                <router-link
                    class="btn btn-outline-primary ps-4"
                    :to="{ name: 'panel admin experiences work create' }"
                >
                    <i class="bx bx-plus fs-xl me-2"></i>
                    Add new experience
                </router-link>
            </div>

            <div
                class="card p-2 d-sm-flex flex-sm-row align-items-sm-center justify-content-between border-0 shadow-sm p-md-4"
            >
                <div class="table-responsive w-100">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>title</th>
                                <th>date</th>
                                <th>label</th>
                                <th>location</th>
                                <th class="text-center">actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                v-for="(experience, index) in experiences"
                                :key="index"
                            >
                                <th class="middle">{{ experience.id }}</th>
                                <td>{{ experience.title }}</td>
                                <td>{{ experience.date }}</td>
                                <td>{{ experience.label }}</td>
                                <td>{{ experience.location }}</td>

                                <td class="d-flex justify-content-center pt-4">
                                    <router-link
                                        class="btn btn-outline-secondary px-3 px-xl-4 me-3"
                                        :to="{
                                            name: 'panel admin experiences work edit',
                                            params: { id: experience.id },
                                        }"
                                    >
                                        <i
                                            class="bx bx-edit fs-xl me-lg-1 me-xl-2"
                                        ></i>
                                        <span class="d-none d-lg-inline"
                                            >Edit</span
                                        >
                                    </router-link>
                                    <button
                                        @click="
                                            deleteHandler(experience.id, index)
                                        "
                                        type="button"
                                        class="btn btn-outline-danger px-3 px-xl-4"
                                    >
                                        <i
                                            class="bx bx-trash-alt fs-xl me-lg-1 me-xl-2"
                                        ></i>
                                        <span class="d-none d-lg-inline"
                                            >Delete</span
                                        >
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>
<script setup>
import { reactive, onMounted, ref } from "vue";
import { ElNotification } from "element-plus";
let experiences = ref([]);

const deleteHandler = (id, index) => {
    axios
        .delete(`/api/admin/experiences/work/${id}`)
        .then(({ data }) => {
            experiences.value.splice(index, 1);

            ElNotification.success({
                title: "Success",
                message: "experience deleted successfully",
            });
        })
        .catch((error) => {});
};

onMounted(() => {
    axios
        .get("/api/admin/experiences/work")
        .then(({ data }) => {
            experiences.value = data.data;
        })
        .catch((error) => {});
});
</script>
<style>
.text-center {
    text-align: center;
}

.banner-ui {
    width: 85px;
    min-width: 85px;
    height: 75px;
    object-fit: cover;
    border-radius: 0.7rem;
}
table tbody tr {
    border-color: transparent !important;
}
table tbody tr td {
    vertical-align: middle;
}
table thead tr th {
    vertical-align: middle;
}
.middle {
    vertical-align: middle;
}
</style>
