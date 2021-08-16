import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex)

import categories from './modules/category';
import brand from './modules/brand'
import sizes from './modules/size'

export default new Vuex.Store({
    modules: {
        categories,
        brand,
        sizes
    }
})
