import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex)

import categories from './modules/category';
import brand from './modules/brand'
import sizes from './modules/size'
import products from './modules/products';
import errors from  './modules/utils/errors'


export default new Vuex.Store({
    modules: {
        errors,
        categories,
        brand,
        sizes,
        products
    }
})
