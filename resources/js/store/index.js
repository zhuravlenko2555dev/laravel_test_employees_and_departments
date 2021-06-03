import Vue from 'vue';
import Vuex from 'vuex';

import employes from './employes';
import departments from './departments';

Vue.use(Vuex);

let store = new Vuex.Store({
    modules: {
        employes,
        departments
    }
});

export default store;
