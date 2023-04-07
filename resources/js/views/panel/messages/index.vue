<template>
    <div class="col-md-8 offset-lg-1 pb-5 mb-2 mb-lg-4 pt-md-5 mt-n3 mt-md-0">
        <div class="ps-md-3 ps-lg-0 mt-md-2 pt-md-4 pb-md-2">
            <div
                class="d-flex align-items-center justify-content-between pt-xl-1 mb-3 pb-2 pb-lg-3"
            >
                <h1 class="h2 m-0">messages</h1>
            </div>

            <div
                class="card p-2 d-sm-flex flex-sm-row align-items-sm-center justify-content-between border-0 shadow-sm p-md-4"
            >
                <div class="table-responsive w-100">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>name</th>
                                <th>email</th>
                                <th>status</th>
                                <th class="text-center">actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                v-for="(message, index) in messages"
                                :key="index"
                            >
                                <th class="middle">{{ message.id }}</th>

                                <td>{{ message.name }}</td>

                                <td>{{ message.email }}</td>

                                <td>
                                    <template v-if="message.status == 1">
                                        <span
                                            class="badge bg-success rounded-pill"
                                            >displayed</span
                                        >
                                    </template>

                                    <template v-else>
                                        <span
                                            class="badge bg-danger rounded-pill"
                                            >not displayed</span
                                        >
                                    </template>
                                </td>

                                <td class="d-flex justify-content-center pt-4">
                                    <router-link
                                        class="btn btn-outline-secondary px-3 px-xl-4 me-3"
                                        :to="{
                                            name: 'panel admin messages edit',
                                            params: { id: message.id },
                                        }"
                                    >
                                        <i
                                            class="bx bx-edit fs-xl me-lg-1 me-xl-2"
                                        ></i>
                                        <span class="d-none d-lg-inline"
                                            >Edit</span
                                        >
                                    </router-link>
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
let messages = ref([]);

const deleteHandler = (id, index) => {
    axios
        .delete(`/api/admin/messages/${id}`)
        .then(({ data }) => {
            messages.value.splice(index, 1);

            ElNotification.success({
                title: "Success",
                message: "message deleted successfully",
            });
        })
        .catch((error) => {});
};

onMounted(() => {
    axios
        .get("/api/admin/messages")
        .then(({ data }) => {
            messages.value = data.data;
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
