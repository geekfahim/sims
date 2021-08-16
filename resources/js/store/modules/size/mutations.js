import * as mutations from '../../mutation-types'

export default {
    [mutations.SET_SIZES](state, payload) {
        console.log(payload)
        state.sizes = payload
    }

}
