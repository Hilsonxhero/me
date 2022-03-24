<template>
    <div class="col-md-8 offset-lg-1 pb-5 mb-2 mb-lg-4 pt-md-5 mt-n3 mt-md-0">
        <div class="ps-md-3 ps-lg-0 mt-md-2 py-md-4">
            <h1 class="h2 pt-xl-1 pb-3">Setting</h1>



            <el-tabs
                v-model="activeName"
                class="demo-tabs"
                @tab-click="handleClick"
            >
                <el-tab-pane label="Personal Info" name="info">
                    <form class="needs-validation border-bottom pb-3 pb-lg-4">
                        <div class="row pb-2">
                            <div class="col-sm-6 mb-4">
                                <label for="fn" class="form-label fs-base"
                                    >email</label
                                >
                                <input
                                    v-model="form.email"
                                    type="text"
                                    id="fn"
                                    class="form-control form-control-lg"
                                    required=""
                                />
                            </div>

                            <div class="col-sm-6 mb-4">
                                <label class="form-label fs-base">phone</label>
                                <input
                                    v-model="form.phone"
                                    type="text"
                                    class="form-control form-control-lg"
                                    required=""
                                />
                            </div>

                            <div class="col-12 mb-4">
                                <label class="form-label fs-base"
                                    >address
                                </label>
                                <textarea
                                    v-model="form.address"
                                    class="form-control form-control-lg"
                                    rows="4"
                                    placeholder="address"
                                ></textarea>
                            </div>

                            <!-- <div class="col-12 my-5">
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
                                            >Is displayed on the home page</span
                                        >
                                    </label>
                                </div>
                            </div> -->
                        </div>
                    </form>
                </el-tab-pane>
                <el-tab-pane label="Social media" name="social">
                    <div class="row">
                        <div class="col-sm-6 mb-4">
                            <label for="fn" class="form-label fs-base"
                                >instagram</label
                            >
                            <input
                                v-model="form.instagram"
                                type="text"
                                id="fn"
                                class="form-control form-control-lg"
                                required=""
                            />
                        </div>

                        <div class="col-sm-6 mb-4">
                            <label class="form-label fs-base">telegram</label>
                            <input
                                v-model="form.telegram"
                                type="text"
                                class="form-control form-control-lg"
                                required=""
                            />
                        </div>
                    </div>
                </el-tab-pane>
                <el-tab-pane label="About us" name="about">
                    <div class="row">
                        <div class="col-12 mb-4">
                            <label class="form-label fs-base">about us </label>
                            <textarea
                                v-model="form.about"
                                class="form-control form-control-lg"
                                rows="4"
                                placeholder="address"
                            ></textarea>
                        </div>
                    </div>
                </el-tab-pane>
                <el-tab-pane label="General" name="general">
                    <div class="row">
                        <div class="col-12 mb-4">
                            <label class="form-label fs-base d-block pb-2"
                                >logo
                            </label>
                            <label
                                class="custom-file-upload btn btn-outline-success btn-block"
                            >
                                <input
                                    class="d-none w-full"
                                    type="file"
                                    @change="selectedFile"
                                />
                                <template v-if="filename">
                                    {{ filename }}
                                </template>

                                <template v-else>select file</template>
                            </label>
                            <template v-if="form.logo">
                                <div class="banner__src d-block my-4">
                                    <img :src="form.logo" alt="" />
                                </div>
                            </template>
                        </div>
                    </div>
                </el-tab-pane>
            </el-tabs>

            <div class="d-flex mb-3">

                <button
                    type="button"
                    class="btn btn-primary"
                    @click="createHandler"
                >
                    Save changes
                </button>
            </div>
        </div>
    </div>
</template>
<script setup>
import { reactive, onMounted, ref } from "vue";
import { useRoute, useRouter } from "vue-router";

import Multiselect from "@suadelabs/vue3-multiselect";

import { ElNotification, ElLoading, ElSkeleton } from "element-plus";

const selectedTechnologies = ref([]);

const route = useRoute();
const router = useRouter();
const file = ref();
const src = ref();
const filename = ref();

const activeName = ref("info");

const form = ref({
    email: "",
    phone: "",
    address: "",
    about: "",
    instagram: "",
    telegram: "",
});

const selectedFile = (event) => {
    filename.value = event.target.files[0].name;
    src.value = URL.createObjectURL(event.target.files[0]);
    file.value = event.target.files[0];
};

const createHandler = () => {
    let data = new FormData();

    data.append("email", form.value.email);
    data.append("phone", form.value.phone);
    data.append("address", form.value.address);
    data.append("about", form.value.about);
    data.append("instagram", form.value.instagram);
    data.append("telegram", form.value.telegram);
    if (file.value) {
        data.append("file", file.value);
    }
    axios
        .post("/api/admin/setting/update", data)
        .then(({ data }) => {
            router.push({ name: "panel admin setting" });

            ElNotification.success({
                title: "Success",
                message: "setting updated successfully",
            });
        })
        .catch((error) => {});
};

onMounted(() => {
    axios
        .get("/api/admin/setting")
        .then(({ data }) => {
            data.data.map((item) => {
                form.value[item.title] = item.value;
            });
        })
        .catch((error) => {});
});
</script>

<style>
.form-switch .form-check-input {
    width: 1.5em;
}
.demo-tabs > .el-tabs__content {
    padding: 32px;
    color: #6b778c;
    font-size: 32px;
    font-weight: 600;
}

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

.demo-tabs > .el-tabs__content {
    padding: 0px;
}

/* .el-tabs__item {
    color: #fff !important;
} */
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
