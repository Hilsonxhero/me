<template>
    <div class="col-md-8 offset-lg-1 pb-5 mb-2 mb-lg-4 pt-md-5 mt-n3 mt-md-0">
        <div class="row">
            <div class="col-md-12">
                <div class="ps-md-3 ps-lg-0 mt-md-2 pt-md-4 pb-md-2">
                    <div
                        class="d-flex align-items-center justify-content-between pt-xl-1 mb-3 pb-2 pb-lg-3"
                    >
                        <h1 class="h2 m-0">gallery</h1>
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
                                        <th>sttaus</th>
                                        <th class="text-center">actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        v-for="(media, index) in media"
                                        :key="index"
                                    >
                                        <th class="middle">
                                            {{ media.id }}
                                        </th>
                                        <td>
                                            <img
                                                :src="media.banner_src"
                                                alt=""
                                                class="banner-ui"
                                            />
                                        </td>
                                        <td>{{ media.title }}</td>

                                        <td>
                                            <template v-if="media.status == 1">
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

                                        <td
                                            class="d-flex justify-content-center pt-4"
                                        >

                                            <router-link
                                                class="btn btn-outline-secondary px-3 px-xl-4 me-3"
                                                :to="{
                                                    name: 'panel admin portfolios gallery edit',
                                                    params: {
                                                        id: media.id,
                                                    },
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
                                                    deleteHandler(
                                                        media.id,
                                                        index
                                                    )
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
            <div class="col-md-12">
                <div class="ps-md-3 ps-lg-0 mt-md-2 pt-md-4 pb-md-2">
                    <div
                        class="d-flex align-items-center justify-content-between pt-xl-1 mb-3 pb-2 pb-lg-3"
                    >
                        <h1 class="h2 m-0">media</h1>
                    </div>

                    <div class="card p-2 border-0 shadow-sm p-md-4">
                        <form
                            class="needs-validation border-bottom pb-3 pb-lg-4"
                            novalidate=""
                        >
                            <div class="row pb-2">
                                <div class="col-sm-12 mb-4">
                                    <label for="fn" class="form-label fs-base"
                                        >title</label
                                    >
                                    <input
                                        v-model="form.title"
                                        type="text"
                                        id="fn"
                                        class="form-control form-control-lg"
                                        required=""
                                    />
                                    <div class="invalid-feedback">
                                        Please enter your first name!
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

                                <div class="col-12 my-5">
                                    <div
                                        class="form-check form-switch form-switch-success d-flex mb-4"
                                    >
                                        <input
                                            v-model="form.status"
                                            type="checkbox"
                                            id="activity"
                                            class="form-check-input flex-shrink-0"
                                        />
                                        <label
                                            for="activity"
                                            class="form-check-label ps-3"
                                        >
                                            <span class="h6 d-block mb-2"
                                                >published portfolio</span
                                            >
                                            <span class="fs-sm text-muted"
                                                >Is displayed on the home
                                                page</span
                                            >
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex mb-3">
                                <router-link
                                    class="btn btn-secondary me-3"
                                    :to="{ name: 'panel admin portfolios' }"
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
            </div>
        </div>
    </div>
</template>
<script setup>
import { reactive, onMounted, ref } from "vue";
import { useRoute, useRouter } from "vue-router";
import { ElNotification } from "element-plus";
let media = ref([]);
const id = ref(null);
const route = useRoute();
const router = useRouter();
const file = ref();
const src = ref();

const filename = ref();

const form = ref({
    title: "",
    status: true,
});

const selectedFile = (event) => {
    // const file = event.target.files[0];
    filename.value = event.target.files[0].name;
    src.value = URL.createObjectURL(event.target.files[0]);
    file.value = event.target.files[0];
};

const createHandler = () => {
    let data = new FormData();
    data.append("portfolio", id.value);
    data.append("title", form.value.title);
    data.append("status", form.value.status ? 1 : 0);
    data.append("file", file.value);
    axios
        .post("/api/admin/portfolios/gallery", data)
        .then(({ data }) => {
            form.value.title = "";
            form.value.status = true;
            src.value = null;
            file.value = null;
            fetchMedia();

            ElNotification.success({
                title: "Success",
                message: "Portfolio media created successfully",
            });
        })
        .catch((error) => {});
};

const deleteHandler = (id, index) => {
    axios
        .delete(`/api/admin/portfolios/gallery/${id}`)
        .then(({ data }) => {
            media.value.splice(index, 1);

            ElNotification.success({
                title: "Success",
                message: "Portfolio media deleted successfully",
            });
        })
        .catch((error) => {});
};

const fetchMedia = () => {
    axios
        .get(`/api/admin/portfolios/gallery/all/${id.value}`)
        .then(({ data }) => {
            media.value = data.data;
        })
        .catch((error) => {});
};

onMounted(() => {
    id.value = route.params.id;
    fetchMedia();
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
.banner__src {
    width: 200px;
    max-width: 200px;
}

.banner__src img {
    border-radius: 0.7rem;
    object-fit: cover;
}

.el-notification__title {
    color: #333 !important;
}
</style>
