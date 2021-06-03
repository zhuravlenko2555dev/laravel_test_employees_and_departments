export default {
    state: {
        departments: {},
    },
    mutations: {
        departments(state, departments) {
            state.departments = departments
        }
    },
    actions: {
        departments({ commit }, perPage = 10) {
            return new Promise((resolve, reject) => {
                axios({ url: '/api/departments', method: 'GET' })
                    .then(resp => {
                        const departments = resp.data

                        commit('departments', departments)
                        resolve(resp)
                    })
                    .catch(err => {
                        reject(err)
                    })
            })
        }
    },
    getters : {
        departments: state => state.departments,
    }
}
