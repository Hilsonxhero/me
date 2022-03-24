import { createStore } from "vuex";

import * as Auth from "@/store/modules/Auth";

// Create a new store instance.
const store = createStore({
    modules: {
        Auth,
    },
});

export default store;
