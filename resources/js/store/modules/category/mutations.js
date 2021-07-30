
import *  as mutations from '../../mutation-types'


export default {
    [mutations.SET_CATEGORIES](state, payload) {
        // console.log(payload)
        state.categories = payload
    }
}
