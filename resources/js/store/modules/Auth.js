
    export const namespaced = true
    export const state = () => ({
        user: window.user,
        isLoggedIn: !!window.user,
    })
    export const getters = {
        // showFeedbacks(state) {
        //     return state.feedbacks;
        // },
    }
    export const mutations = {
        LOGIN(state, payload) {
            state.isLoggedIn = true
            state.user = {
                id: payload.id,
                name: payload.name,
                email: payload.email,
                isVerified: payload.email_verified_at == null ? 1 : 2,
                isAdmin : payload.is_superuser
            }
        },

        LOGOUT(state) {
            state.isLoggedIn = false
            state.user = null
        },

    }
    export const actions = {
        login({ commit }, payload) {

            return axios.post('/api/application/auth/login', payload)
            .then(({ data }) => {
                console.log(data);
                commit('LOGIN', data.data)
            })

        },

        logout({ commit }) {
            return axios.post('/api/application/auth/logout')
                .then(() => {
                    commit('LOGOUT')
                })
        },
    }

