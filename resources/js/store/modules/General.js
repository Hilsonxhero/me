export const namespaced = true;
export const state = () => ({
    general: {
        phone: null,
        email: null,
        about: null,
        address: null,
        instagram: null,
        telegram: null,
        logo: null,
    },
});
export const getters = {
    showGeneralData(state) {
        return state.data;
    },
};
export const mutations = {
    SET_GENERAL_DATA(state, payload) {
        state.data = payload;

        payload.map((item) => {
            state.general[item.title] = item.value;
        });
    },
};
export const actions = {
    generalHandler({ commit }) {
        return axios.get("/api/application/general").then(({ data }) => {
            commit("SET_GENERAL_DATA", data.data);
        });
    },
};
