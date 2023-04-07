import { createStore } from "vuex";

import * as Auth from "@/store/modules/Auth";
import * as General from "@/store/modules/General";

// Create a new store instance.
const store = createStore({
    modules: {
        General,
        Auth,
    },
});

export default store;
