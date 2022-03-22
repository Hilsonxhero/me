<template>
    <div class="col-md-8 offset-lg-1 pb-5 mb-2 mb-lg-4 pt-md-5 mt-n3 mt-md-0">
        <div class="ps-md-3 ps-lg-0 mt-md-2 pt-md-4 pb-md-2">
            <div
                class="d-flex align-items-center justify-content-between pt-xl-1 mb-3 pb-2 pb-lg-3"
            >
                <h1 class="h2 m-0">articles</h1>

                <router-link
                    class="btn btn-outline-primary ps-4"
                    :to="{ name: 'panel admin articles create' }"
                >
                    <i class="bx bx-plus fs-xl me-2"></i>
                    Add new article
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
                                <th>media</th>
                                <th>title</th>
                                <th>category</th>
                                <th>published</th>
                                <th class="text-center">actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                v-for="(article, index) in articles"
                                :key="index"
                            >
                                <th class="middle">{{ article.id }}</th>
                                <td>
                                    <img
                                        :src="article.banner_src"
                                        alt=""
                                        class="banner-ui"
                                    />
                                </td>
                                <td>{{ article.title }}</td>

                                <td>{{ article.category.title }}</td>

                                <td>
                                    <template v-if="article.is_published == 1">
                                        <span
                                            class="badge bg-success rounded-pill"
                                            >published</span
                                        >
                                    </template>

                                    <template v-else>
                                        <span
                                            class="badge bg-danger rounded-pill"
                                            >not published</span
                                        >
                                    </template>
                                </td>

                                <td class="d-flex justify-content-center pt-4">
                                    <router-link
                                        class="btn btn-outline-secondary px-3 px-xl-4 me-3"
                                        :to="{
                                            name: 'panel admin articles edit',
                                            params: { id: article.id },
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
                                            deleteHandler(article.id, index)
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
let articles = ref([]);

const deleteHandler = (id, index) => {
    axios
        .delete(`/api/admin/articles/${id}`)
        .then(({ data }) => {
            articles.value.splice(index, 1);

            ElNotification.success({
                title: "Success",
                message: "article deleted successfully",
            });
        })
        .catch((error) => {});
};

onMounted(() => {
    axios
        .get("/api/admin/articles")
        .then(({ data }) => {
            articles.value = data.data;
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
