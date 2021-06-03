export default {
    state: {
        employes: {},
    },
    mutations: {
        employes(state, employes) {
            state.employes = employes
        }
    },
    actions: {
        employes({ commit }, page = 1, perPage = 10) {
            return new Promise((resolve, reject) => {
                axios({ url: '/api/employes?page=' + page + '&perPage=' + perPage, method: 'GET' })
                    .then(resp => {
                        const employes = resp.data

                        commit('employes', employes)
                        resolve(resp)
                    })
                    .catch(err => {
                        reject(err)
                    })
            })
        }
    },
    getters : {
        employes: state => state.employes,
    }
}
