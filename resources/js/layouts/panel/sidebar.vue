<template>
    <aside class="col-lg-3 col-md-4 border-end pb-5 mt-n5">
        <div class="position-sticky top-0">
            <div class="text-center pt-5">
                <div
                    class="d-table position-relative mx-auto mt-2 mt-lg-4 pt-5 mb-3"
                >
                    <img
                        src="/assets/img/profile.jpg"
                        class="d-block rounded-circle"
                        width="120"
                        alt="John Doe"
                    />
                    <button
                        type="button"
                        class="btn btn-icon btn-light bg-white btn-sm border rounded-circle shadow-sm position-absolute bottom-0 end-0 mt-4"
                        data-bs-toggle="tooltip"
                        data-bs-placement="bottom"
                        title="Change picture"
                    >
                        <i class="bx bx-refresh"></i>
                    </button>
                </div>
                <h2 class="h5 mb-1" v-if="user">{{ user.username }}</h2>
                <p class="mb-3 pb-3" v-if="user">{{ user.email }}</p>
                <button
                    type="button"
                    class="btn btn-secondary w-100 d-md-none mt-n2 mb-3"
                    data-bs-toggle=""
                    data-bs-target="#account-menu"
                >
                    <i class="bx bxs-user-detail fs-xl me-2"></i>
                    Account menu
                    <i class="bx bx-chevron-down fs-lg ms-1"></i>
                </button>
                <div
                    id="account-menu"
                    class="list-group list-group-flush d-md-block"
                >
                    <router-link
                        exact
                        class="list-group-item list-group-item-action d-flex align-items-center fs-sm"
                        :to="{ name: 'panel admin categories' }"
                    >
                        <i class="bx bx-collection fs-xl opacity-60 me-2"></i>
                        Categories
                    </router-link>

                    <router-link
                        exact
                        class="list-group-item list-group-item-action d-flex align-items-center fs-sm"
                        :to="{ name: 'panel admin portfolios' }"
                    >
                        <i
                            class="bx bx-credit-card-front fs-xl opacity-60 me-2"
                        ></i>
                        Portfolios
                    </router-link>

                    <router-link
                        exact
                        class="list-group-item list-group-item-action d-flex align-items-center fs-sm"
                        :to="{ name: 'panel admin experiences work index' }"
                    >
                        <i
                            class="bx bx-credit-card-front fs-xl opacity-60 me-2"
                        ></i>
                        Work experience
                    </router-link>

                    <router-link
                        exact
                        class="list-group-item list-group-item-action d-flex align-items-center fs-sm"
                        :to="{
                            name: 'panel admin experiences educational index',
                        }"
                    >
                        <i
                            class="bx bx-credit-card-front fs-xl opacity-60 me-2"
                        ></i>
                        Educational experience
                    </router-link>

                    <router-link
                        exact
                        class="list-group-item list-group-item-action d-flex align-items-center fs-sm"
                        :to="{ name: 'panel admin articles' }"
                    >
                        <i class="bx bx-file fs-xl opacity-60 me-2"></i>
                        Articles
                    </router-link>

                    <router-link
                        exact
                        class="list-group-item list-group-item-action d-flex align-items-center fs-sm"
                        :to="{ name: 'panel admin messages' }"
                    >
                        <i class="bx bx-chat fs-xl opacity-60 me-2"></i>
                        Messages
                    </router-link>

                    <router-link
                        exact
                        class="list-group-item list-group-item-action d-flex align-items-center fs-sm"
                        :to="{ name: 'panel admin technologies' }"
                    >
                        <i class="bx bxs-zap fs-xl opacity-60 me-2"></i>
                        Technologies
                    </router-link>

                    <router-link
                        exact
                        class="list-group-item list-group-item-action d-flex align-items-center fs-sm"
                        :to="{ name: 'panel admin tags' }"
                    >
                        <i class="bx bx-layer fs-xl opacity-60 me-2"></i>
                        Tags
                    </router-link>

                    <a
                        href="account-security.html"
                        class="list-group-item list-group-item-action d-flex align-items-center fs-sm"
                    >
                        <i class="bx bx-lock-alt fs-xl opacity-60 me-2"></i>
                        Security
                    </a>

                    <router-link
                        exact
                        class="list-group-item list-group-item-action d-flex align-items-center fs-sm"
                        :to="{ name: 'panel admin setting' }"
                    >
                        <i class="bx bx-cog fs-xl opacity-60 me-2"></i>
                        Setting
                    </router-link>

                    <a
                        @click="logoutUser"
                        class="list-group-item list-group-item-action d-flex align-items-center fs-sm"
                    >
                        <i class="bx bx-log-out fs-xl opacity-60 me-2"></i>
                        Sign Out
                    </a>
                </div>
            </div>
        </div>
    </aside>
</template>
<script>
import { mapActions, mapState, mapGetters } from "vuex";
export default {
    computed: {
        ...mapState("Auth", ["user"]),
        ...mapState("Auth", ["isLoggedIn"]),
    },

    methods: {
        ...mapActions("Auth", ["logout"]),
        logoutUser() {
            this.logout()
                .then(() => {
                    this.$router.push({ name: "home" });
                })
                .catch((error) => {
                    console.log(error);
                })
                .finally(() => {});
        },

        toggleMenu() {
            this.$parent.toggleMenu();
        },
    },
};
</script>
<style></style>
