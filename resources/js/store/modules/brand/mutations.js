import *  as mutations from '../../mutation-types'


export default {
    [mutations.SET_BRAND](state, payload) {
        // console.log(payload)
        state.brand = payload
    }
}
